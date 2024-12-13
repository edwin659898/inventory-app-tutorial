@props(['product', 'selectedProductId'])
<li wire:click='selectProduct({{ $product->id }})'
    class="list-group-item {{ $product->id == $selectedProductId ? 'active' : '' }} d-flex ">
    <div class="me-auto">
        <img
            src="https://via.placeholder.com/150"
            class="img-fluid rounded-top"
            alt=""
            width="50%"
        />

    </div>
    <div class="me-auto">
        <h6 class="text-capitalize text-inv-primary">{{ $product->brand->name }}</h6>
        <h5>{{ $product->name }}</h5>
        <small class="text-muted">{{ $product->description }}</small>
    </div>

    <div class="ms-auto my-auto {{ $product->inventory_balance > 0 ? 'text-cash-green' : 'text-cash-red' }}">
        <h6 class="text-secondary">Balance of Units:</h6>
        <h5>
            {{ $product->inventory_balance }}
        </h5>
    </div>
</li>
