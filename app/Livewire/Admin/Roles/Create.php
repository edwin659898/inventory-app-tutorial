<?php

namespace App\Livewire\Admin\Roles;

use App\Models\Role;
use Livewire\Component;

class Create extends Component
{
    public Role $role;

    function rules()
    {
        return [
            'role.title' => "required",
        ];
    }

    function mount()
    {
        $this->role = new Role();
    }

    function updated()
    {
        $this->validate();
    }

    function save()
    {
        $this->validate();
        try {
            $this->role->save();
            return redirect()->route('admin.roles.index');

        } catch (\Throwable $th) {
            $this->dispatch('done', error: "Something Went Wrong: " . $th->getMessage());
        }
    }
    public function render()
    {
        return view('livewire.admin.roles.create');
    }
}
