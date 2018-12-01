@extends('layouts.general')

@section('contents')
    @if($products->count())
        <div class="pt">
            <div class="ptc hc vc">
                <div class="order_form">
                    <div class="form_caption">Make your order</div>
                        <form method="POST" action="{{ route('orders.store') }}">
                            @csrf
                            <div class="form_row">
                                <label for="product_id">Select product</label>
                                <select id="product_id" class="form_item" name="product_id" size="1" tabindex="1" autofocus>
                                    @foreach($products as $id => $alldata)
                                        <option value="{{ $id }}">{{ $alldata }}</option>
                                    @endforeach
                                </select>
                            </div><br clear="all" />
                            <div class="form_row">
                                <label for="name">Your name</label>
                                <input id="name" type="text" class="form_item" name="name" tabindex="2" required>
                            </div><br clear="all" />
                            <div class="form_row">
                                <label for="email">Your email</label>
                                <input id="email" type="text" class="form_item" name="email" tabindex="3" required>
                            </div><br clear="all" />
                            <div class="form_row">
                                <label for="phone">Your phone</label>
                                <input id="phone" type="text" class="form_item" name="phone" tabindex="4" required>
                            </div><br clear="all" />
                            <div class="fmctrls">
                                <button type="submit" class="do" tabindex="5">Order it</button>
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