@extends('layouts.admin')

@section('contents')
    @if($orders->count())
        <div class="pt">
            <div class="ptc hc vt et">
                <table class="admlist" style="max-width: 768px;">
                    <caption>Order list</caption>
                    <tr>
                        <th style="width: 5%;">#</th>
                        <th class="la" style="width: 15%;">User</th>
                        <th style="width: 15%;">Email</th>
                        <th style="width: 15%;">Telephone</th>
                        <th style="width: 35%;">Ordered item</th>
                        <th style="width: 15%;">Price (RUR)</th>
                    </tr>
                    <tbody class="adb">
                    @foreach($orders as $order)
                        <tr>
                            <td class="ca">{{ $order->id }}</td>
                            <td>{{ $order->name }}</td>
                            <td>{{ $order->email }}</td>
                            <td class="ca">{{ $order->phone }}</td>
                            <td>{{ $order->product()->withTrashed()->find($order->product_id)->name }}</td>
                            <td class="ra">{{ sprintf('%01.2f', $order->product()->withTrashed()->find($order->product_id)->price) }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tr>
                        <td colspan="6">{{ $orders->links('paginator') }}</td>
                    </tr>
                </table>
            </div>
        </div>
    @else
        @include('noorders')
    @endif
@endsection
