<div>
<div>

@include('livewire.home.layouts.header')

<section class="padding-y bg-light">
<div class="container">

<!-- =========================  COMPONENT ACCOUNT 2 ========================= --> 
<div class="row">
	 <!-- LEFT BAR -->
	 @include('livewire.home.layouts.leftbar')
     <!-- END LEFT BAR -->
	<main class="col-lg-9">
        @foreach($orders as $order)
		@php($user = \App\User::find($order->user_id))
        @php($delivery_man = \App\Model\DeliveryMan::where('id', $order->delivery_man_id)->first())
        @php($client_address = \App\Model\CustomerAddress::where('user_id', $order->user_id)->first())
        @php($products = \App\Model\OrderDetail::where('order_id', $order->id)->get())
        
		<article class="card mb-3">
		<div class="card-body">
			<header class="d-md-flex">
				<div class="flex-grow-1">
					<h6 class="mb-0"> 
						Order ID: {{$order->id}}<i class="dot"></i><span class="text-danger"> {{$order->order_status}} </span>
					</h6>
					<span>{{$order->delivery_date}}</span>
				</div>
				<div>
					<a href="#" class="btn btn-sm btn-primary">Track order</a> 
				</div>
			</header>
			<hr>
			<div class="row">
				<div class="col-md-4">
					<p class="mb-0 text-muted">Contact</p>
					<p class="m-0"> 
                    {{$client_address->contact_person_name}} <br>  Phone: {{$user->phone}} <br> Email: {{$user->email}} </p>
				</div> <!-- col.// -->
				<div class="col-md-4 border-start">
					<p class="mb-0 text-muted">Shipping address</p>
					<p class="m-0"> {{$order->user}} <br> 
						{{$client_address->address}}  </p>
				</div> <!-- col.// -->
				<div class="col-md-4 border-start">
					<p class="mb-0 text-muted">Payment</p>
					<p class="m-0">
						<span class="text-success"> {{$order->payment_method}}   </span> <br> 
						Shipping fee:  ${{$order->delivery_charge}} <br> 
					 	Total paid:  ${{$order->order_amount}} 
					</p>
				</div> <!-- col.// -->
			</div> <!-- row.// -->
			<hr>
			<ul class="row">
                
                @foreach($products as $product)
                @php($product_details = json_decode($product->product_details, true))
                @php($discount_amount = $product->discount_type=='amount'? $product->discount_on_product : ($product->price * $product->discount_on_product) /100)
                <li class="col-lg-4 col-md-6">
					<figure class="itemside mb-3">
						<div class="aside">
							<img width="72" height="72" src="{{ asset('storage/product/' . $product_details['image']) }}" class="img-sm rounded border">
						</div>
						<figcaption class="info">
							<p class="title">{{$product_details['name']}}</p>
							<strong> {{$product->quantity}}x = ${{$product->quantity * $discount_amount}} </strong>
						</figcaption>
					</figure> 
				</li>
                @endforeach
			</ul>
		</div> <!-- card-body .// -->
		</article> <!-- card .// --> 
        @endforeach

        <!-- pagenation -->
        <table>
            {{ $orders->links() }}
        </table>
        <!-- end pagenation -->
	</main>

    
</div> <!-- row.// -->
<!-- =========================  COMPONENT ACCOUNT 2 END.// ========================= --> 

</div> <!-- container .//  -->
</section>

@include('livewire.home.layouts.footer')


</div>
</div>
