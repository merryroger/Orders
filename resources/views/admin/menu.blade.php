<div class="lal links">
    @if(Route::currentRouteName() == 'admin.products.list')
        <span class="alink">Products<span class="plus" title="Add product" onclick="return requestEntity('{{ route('admin.products.add') }}')">+</span></span>
    @else
        <span><a href="{{ route('admin.products.list') }}">Products</a></span>
    @endif
    @if(Route::currentRouteName() == 'admin.orders.list')
         <span class="alink">Orders</span>
    @else
        <span><a href="{{ route('admin.orders.list') }}">Orders</a></span>
    @endif
</div>

