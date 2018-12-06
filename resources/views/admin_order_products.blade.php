@extends('layouts.admin')

@section('contents')
    @if($products->count())
        <div class="pt">
            <div class="ptc hc vc">
                <div class="order_form">
                    <div class="form_caption">Make your order</div>
                        <form method="POST" action="{{ route('admin.orders.store') }}">
                            @csrf
                            <div class="form_row">
                                <label for="product_id">Select product</label>
                                <select id="product_id" class="form_item" name="product_id" size="1" tabindex="1" autofocus>
                                    @foreach($products as $id => $alldata)
                                        <option value="{{ $id }}">{{ $alldata }}</option>
                                    @endforeach
                                </select>
                            </div><br clear="all" />

                            <input id="name" type="hidden" name="name" value="{{ $User->name }}" />
                            <input id="email" type="hidden" name="email" value="{{ $User->email }}" />
                            <input id="phone" type="hidden" name="phone" value="{{ $User->phone }}" />

                            <div class="fmctrls">
                                <button type="submit" class="do" tabindex="2">Order it</button>
                            </div>
                         </form>
                    </div>
                </div>
            </div>
        </div>
    @else
        @include('noproducts')
    @endif
@endsection

@section('inform')
    <div class="inform">{{ session()->get('orderdone') }}</div>
@endsection