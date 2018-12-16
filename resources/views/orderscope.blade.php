<p>Order Scope Information</p>
<p>Dear Customer,</p>
<p>
<p>During last hour you`ve ordered some prroducts.</p>
<ol>
@foreach($products as $product)
    <li>"{{ $product->name }}" that costs {{ $product->price }} RUR.</li>
@endforeach
</ol>
<p>We`ll do our best to try to deliver your order soon.</p>
<p>Stay with us. We appreciate your choice.</p>
<p>Your Order team.</p>


