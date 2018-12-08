@extends('layouts.admin')

@if($products->count())
    <div class="pt">
        <div class="ptc hc vt et">
            <table class="admlist" style="max-width: 512px;">
                <caption>Product list</caption>
                <tr>
                    <th style="width: 5%;">#</th>
                    <th class="la" style="width: 55%;">Name</th>
                    <th style="width: 20%;">Price</th>
                    <th style="width: 20%;">Actions</th>
                </tr>
                <tbody class="adb">
                @foreach($products as $product)
                    <tr>
                        <td class="ca">{{ $product->id }}</td>
                        <td>{{ $product->name }}</td>
                        <td class="ca">{{ sprintf('%01.2f', $product->price) }}</td>
                        <td class="ca">
                            @if($product->trashed())
                                <span class="delete" title="Restore"
                                      onclick="return requestEntity('{{ route('admin.products.restore', [$product->id, 'page' => $products->currentPage()]) }}')">
                                    Restore
                                </span>
                            @else
                                <span class="delete" title="Delete"
                                      onclick="return removeEntity('{{ route('admin.products.remove', [$product->id, 'page' => $products->currentPage()]) }}', 'You going to delete the selected item. Continue?')">
                                    Delete
                                </span>
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
                <tr>
                    <td class="ca" colspan="4">{{ $products->links('paginator') }}</td>
                </tr>
            </table>
            <form id="rm_form" method="post" class="h">
                @csrf
                @method('DELETE')
            </form>
        </div>
    </div>
@else
    @include('noproducts')
@endif
