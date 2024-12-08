<div>
    <x-slot:header>Accounts Summary</x-slot:header>
    <div class="row g-4">
        <!-- Revenue and Sales -->
        <div class="col-md-4">
            <div class="card text-center shadow-sm bg-inv-secondary text-inv-primary">
                <div class="card-body">
                    <i class="bi bi-currency-exchange display-4 text-inv-primary"></i>
                    <h5 class="card-title mt-2">Total Revenue</h5>
                    <p class="fs-3 fw-bold">KES {{ number_format($total_revenue, 2) }}</p>
                    <p class="text-success">+12% compared to last month</p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card text-center shadow-sm bg-inv-primary text-inv-secondary">
                <div class="card-body">
                    <i class="bi bi-receipt display-4 text-inv-secondary"></i>
                    <h5 class="card-title mt-2">Sales Count</h5>
                    <p class="fs-3 fw-bold">{{ number_format($sales_count) }} Items</p>
                    <p class="text-success">+18% compared to last month</p>
                </div>
            </div>
        </div>


        <!-- Inventory Metrics -->
        <div class="col-md-4">
            <div class="card text-center shadow-sm bg-inv-secondary text-inv-primary">
                <div class="card-body">
                    <i class="bi bi-box-seam display-4 text-inv-primary"></i>
                    <h5 class="card-title mt-2">Stock Value</h5>
                    <p class="fs-3 fw-bold">KES {{ number_format($stock_value, 2) }}</p>
                    <p class="text-muted">Current stock valuation</p>
                </div>
            </div>
        </div>


    </div>
</div
