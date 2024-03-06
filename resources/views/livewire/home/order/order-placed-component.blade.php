<div>

@include('livewire.home.layouts.header')


<section class="padding-y bg-light">
<div class="container">

<div class="row">
	<main class="col-lg-8">
<!-- ============== COMPONENT FINAL =============== -->
<article class="card">
	<div class="card-body">

		<figure class="mt-4 mx-auto text-center" style="max-width:600px">
			<svg width="96px" height="96px" viewBox="0 0 96 96" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
			    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
			        <g id="round-check">
			            <circle id="Oval" fill="#D3FFD9" cx="48" cy="48" r="48"></circle>
			            <circle id="Oval-Copy" fill="#87FF96" cx="48" cy="48" r="36"></circle>
			            <polyline id="Line" stroke="#04B800" stroke-width="4" stroke-linecap="round" points="34.188562 49.6867496 44 59.3734993 63.1968462 40.3594229"></polyline>
			        </g>
			    </g>
			</svg>
			<figcaption class="my-3">
				<h4>Thank you for order</h4>
				<p>We're processing it with care and will deliver it as soon as possible. We appreciate your patience</p>
			</figcaption>
		</figure>

		<ul class="steps-wrap mx-auto" style="max-width: 600px">
			<li class="step active"> 
				<span class="icon">1</span>
				<span class="text">Order Placed</span>
			</li> <!-- step.// -->
			<li class="step {{($order->order_status == 'processing' || $order->order_status == 'out_for_delivery'  || $order->order_status == 'delivered') ? 'active' : ''}}">
				<span class="icon">2</span>
				<span class="text">Processing</span>
			</li> <!-- step.// -->
			<li class="step {{($order->order_status == 'out_for_delivery' || $order->order_status == 'delivered') ? 'active' : ''}}">
				<span class="icon">3</span>
				<span class="text">Out for delivery</span>
			</li> <!-- step.// -->
			<li class="step {{($order->order_status == 'delivered') ? 'active' : ''}}">
				<span class="icon">4</span>
				<span class="text">Delivered</span>
			</li> <!-- step.// -->
		</ul> <!-- tracking-wrap.// -->

		<br>

	</div>
</article>
<!-- ============== COMPONENT FINAL .// =============== -->
	</main> <!-- col.// -->
	<aside class="col-lg-4">

<!-- ============== COMPONENT RECEIPE =============== -->
<article class="card">
	<div class="card-body">
		<h5 class="card-title"> Receipe </h5>
		<figure class="itemside mb-3">
			
			<figcaption class="info lh-sm">
				<strong>Order ID: {{$order->id}}</strong> <br>
				<span class="text-muted">{{ \Carbon\Carbon::parse($order->created_at)->format('j M Y g:i a') }}</span>

			</figcaption>
		</figure>
		<dl class="dlist-align">
		  <dt>Method:</dt>
		  <dd>{{$order->payment_method}}</dd>
		</dl>
		@php($user = \app\User::find($order->user_id))
		<dl class="dlist-align">
		  <dt>Billed to:</dt>
		  <dd>{{$user->f_name}} {{$user->l_name}}</dd>
		</dl>
		<!-- @php($address = \App\Model\CustomerAddress::find($order->delivery_address_id))
		<dl class="dlist-align">
		  <dt >Address:</dt>
		  <dd style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">{{$address->address}}</dd>
		</dl> -->
		<dl class="dlist-align">
		  <dt>Amount:</dt>
		  <dd>€{{$order->order_amount}}</dd>
		</dl>
		<hr>
		<a href="#" class="btn btn-light">Download invoice</a>
	</div>
</article>
<!-- ============== COMPONENT RECEIPE .// =============== -->

	</aside> <!-- col.// -->
</div> <!-- row.// -->

<br><br>

</div> <!-- container end.//  -->
</section>


@include('livewire.home.layouts.footer')


</div>
