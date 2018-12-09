<p>Order #{{ $order->id }}</p>
<p>Dear {{ $order->name }}</p>
<p>You`ve ordered "{{ $order->product()->find($order->product_id)->name }}" that
    costs {{ $order->product()->find($order->product_id)->price }} RUR.</p>
<p>We`ll do our best to try to deliver your order soon.</p>
<p>Stay with us. We appreciate your choice.</p>
<p>Your Order team.</p>


