<?php

namespace App\Livewire\Admin;

use Carbon\Carbon;
use Carbon\CarbonInterval;
use Carbon\CarbonPeriod;
use Illuminate\Support\Facades\DB;
use Livewire\Component;


class Dashboard extends Component
{
    public $options = [
        'last_7_days',
        'last_28_days',
        'last_90_days',
        'last_365_days',
        'lifetime',
    ];

    public $selectedOption = 'last_28_days';
    public $dateRange = [];
    public $formattedDateRange = [];

    function mount(){
        $this->dateRange = $this->getDates()->toArray();
        foreach ($this->dateRange as $key => $date) {
            $this->formattedDateRange[] = $date->format('Y-m-d');
        }
    }

    public function getDates()
    {

        switch ($this->selectedOption) {
            case 'last_7_days':
                $dates = CarbonPeriod::create(Carbon::now()->subDays(7), '1 day', Carbon::now());
                break;
            case 'last_28_days':
                $dates = CarbonPeriod::create(Carbon::now()->subDays(28), '4 days', Carbon::now());
                break;
            case 'last_90_days':
                $dates = CarbonPeriod::create(Carbon::now()->subDays(90), '12 days', Carbon::now());
                break;
            case 'last_365_days':
                $dates = CarbonPeriod::create(Carbon::now()->subDays(365), '52 days', Carbon::now());
                break;

            default:
                $date1 =  DB::table('sales')
                    ->union(DB::table('purchases'))
                    ->min('created_at');
                $date2 = Carbon::now();
                $dateVariance = Carbon::parse($date1)->diffInDays($date2) / 7;
                $dates = CarbonPeriod::create($date1, $dateVariance, $date2);
                break;
        }
        return $dates;
    }

    public function updatedSelectedOption()
    {
        $this->dispatch(
            'chart-updated',
            [
                'dateRange' => $this->dateRange,
                'formattedDateRange' => $this->formattedDateRange
            ]
        );
    }

    function getPurchases() {}
    function getSales() {}



    public function render()
    {

        return view('livewire.admin.dashboard');
    }
}
