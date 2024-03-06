<div>
	@include('livewire.home.layouts.header')

	<!-- ============== SECTION PAGETOP ============== -->

	<!-- ============== SECTION PAGETOP END// ============== -->

	<section class="padding-y bg-light">
		<div class="container">

			<!-- =================== COMPONENT CART+SUMMARY ====================== -->
			<div class="row">
				<div class="col-lg-9">

					<div class="card">
						<div class="content-body">
							<h4 class="card-title mb-4">Your shopping cart</h4>
							@foreach($cart_products as $cart_product)


							@php($variation_index = json_decode($cart_product->variation_index, true))
							@php($attributes = \app\CentralLogics\ProductLogic::product_attributes($cart_product->product_id, $variation_index))
							@php($price_info = \app\CentralLogics\ProductLogic::get_price_info($cart_product))


							<article class="row gy-3 mb-4">
								<div class="col-lg-5">
									<figure class="itemside me-lg-5">
										<div class="aside"><img src="{{ asset('storage/product/' . $cart_product->product->image) }}" class="img-sm img-thumbnail"></div>
										<figcaption class="info">
											<a href="#" class="title">{{$cart_product->product->name}}</a>
											<p class="text-muted"> {{$attributes}}</p>
										</figcaption>
									</figure>
								</div>


								<div class="col-auto">

									<div class="input-group input-spinner">
										<button wire:click="decreaseQuantity('{{ $cart_product->id }}')" wire:loading.attr="disabled" class="btn btn-icon btn-light" type="button">
											<svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="#999" viewBox="0 0 24 24">
												<path d="M19 13H5v-2h14v2z"></path>
											</svg>
										</button>
										<input wire:model="quantity" class="form-control text-center" placeholder="" value="{{ $cart_product->quantity }}" readonly>
										<button wire:click="increaseQuantity('{{ $cart_product->id }}')" wire:loading.attr="disabled" class="btn btn-icon btn-light" type="button">
											<svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="#999" viewBox="0 0 24 24">
												<path d="M19 13h-6v6h-2v-6H5v-2h6V5h2v6h6v2z"></path>
											</svg>
										</button>
									</div>
								</div>
								<div class="col-lg-2 col-sm-4 col-6">
									<div class="price-wrap lh-sm">
										<var class="price h6">€{{ ($price_info['price'] - $price_info['discount_amount'] ) * $cart_product['quantity']}} </var> <br>
										@if($price_info['discount_amount'] > 0)
										<del class="text-muted"> €{{ $price_info['price'] * $cart_product['quantity']}} </del>
										@endif
									</div> <!-- price-wrap .// -->
								</div>
								@php($whishlist_product = \App\Model\Wishlist::where('user_id', auth()->user()->id)->where('product_id', $cart_product->product->id)->first())
								<div class="col-lg col-sm-4">
									<div class="float-lg-end">
										<a wire:click="addToWhishlist('{{ $cart_product->product->id }}')" class="btn btn-light">
											@if($whishlist_product)
											<i class="fa fa-heart" style="color: red;"></i>
											@else
											<i class="fa fa-heart"></i>
											@endif
										</a>
										<a wire:click="removeCart('{{ $cart_product->id }}')" class="btn btn-light text-danger"> Remove</a>
									</div>
								</div>
							</article> <!-- row.// -->
							@endforeach


						</div> <!-- card-body .// -->

						<!-- <div class="content-body border-top">
			<p><i class="me-2 text-muted fa-lg fa fa-truck"></i> Free Delivery within 1-2 weeks</p>
			<p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
			quis nostrud exercitation ullamco laboris nisi ut aliquip</p>
		</div>  -->
					</div>

				</div> <!-- col.// -->


				<aside class="col-lg-3">

					<div class="card mb-3">
						<div class="card-body">

							<div>
								<label class="form-label">Have coupon?</label>
								<div class="input-group">
									<input type="text" class="form-control" wire:model="coupon_code" placeholder="Coupon code">
									<button wire:click="apply" class="btn btn-light">Apply</button>
								</div>
							</div>

						</div> <!-- card-body.// -->
					</div> <!-- card.// -->

					@php($price_info = \app\CentralLogics\ProductLogic::calculateCartPrice(auth()->user()->id))
					@php($price_with_discount = $price_info['total_price'] - $price_info['total_discount_amount'])

					@php($coupon_discount_amount = 0)
					@if($coupon!=null)
					@php($coupon_discount_amount = \app\CentralLogics\CouponLogic::calculateCouponDiscount($price_with_discount, $coupon))
					@endif

					@php($delivery_charge = 0)
					@if($zone!=null)
					@php($delivery_charge = $zone->delivery_fee)
					@else
					@php($delivery_charge = 0)
					@endif

					<div class="card">
						<div class="card-body">
							<dl class="dlist-align">
								<dt>Total price:</dt>
								<dd class="text-end"> €{{$price_info['total_price']}}</dd>
							</dl>
							<dl class="dlist-align">
								<dt>Discount:</dt>
								<dd class="text-end text-success"> - €{{$price_info['total_discount_amount']}} </dd>
							</dl>
							<dl class="dlist-align">
								<dt>Coupon discount:</dt>
								<dd class="text-end text-success"> - €{{$coupon_discount_amount}} </dd>
							</dl>
							<dl class="dlist-align">
								<dt>Delivery Fee:</dt>
								<dd class="text-end"> €{{$delivery_charge}} </dd>
							</dl>
							<hr>
							<dl class="dlist-align">
								<dt>Address</dt>
							</dl>

							<!-- <dl class="dlist-align">
							<dt style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;"><small>{{$selected_address->address}}</small></dt>

								<dd class="text-end">
								<dd class="text-end" wire:click="showAddressList"> <i class="fas fa-edit fa-1x"></i> </dd>
								</dd>
							</dl> -->


							@foreach($address_list as $address)
							<dl class="dlist-align">
								<dt style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;"><small>{{$address->address}}</small></dt>
								<dd class="text-end">


								<dd class="text-end" wire:click="selectAddress('{{$address->id}}')" style="cursor:pointer">
									@if ($address->id == $selected_address->id)
									<i class="fas fa-check-square fa-1x"></i>
									@else
									<i class="far fa-square fa-1x"></i>
									@endif
								</dd>
								</dd>

							</dl>
							@endforeach

							<hr>

							@if($zone == null)
							<p style="color:red">Sorry, service not available in your area</p>
							@else
							<dl class="dlist-align">
								<dt>Total:</dt>
								<dd class="text-end text-dark h5"> €{{$price_info['total_price'] - $price_info['total_discount_amount'] - $coupon_discount_amount + $delivery_charge }} </dd>
							</dl>

							<div class="d-grid gap-2 my-3">
								<a wire:click="placeOrder" class="btn btn-primary w-100">Place Order </a>
								<a href="#" class="btn btn-light w-100"> Back to shop </a>
							</div>
							@endif
							
						</div> <!-- card-body.// -->
					</div> <!-- card.// -->

				</aside> <!-- col.// -->

			</div> <!-- row.// -->
			<!-- =================== COMPONENT 1 CART+SUMMARY .//END  ====================== -->

			<br><br>

		</div> <!-- container .//  -->
	</section>

	<!-- ============== SECTION  ============== -->
	<section class="padding-y border-top">
		<div class="container">
			<header class="section-heading">
				<h4 class="section-title">Recommended items</h4>
			</header>

			<div class="row">

			@foreach($recommended_products as $recommended_product)
			@php($discount = $recommended_product->discount)
	        @php($discount_amount = $recommended_product->discount_type=='amount'? $recommended_product->discount : ($recommended_product->price * $recommended_product->discount) /100)
			@php($whishlist_product = \App\Model\Wishlist::where('user_id', auth()->user()->id)->where('product_id', $recommended_product->id)->first())
			<div class="col-lg-3 col-sm-6 col-12">
					<figure class="card card-product-grid">
						<div class="img-wrap">
							<span class="topbar">
								
								<a wire:click="addToWhishlist('{{ $recommended_product->id }}')" style="cursor:pointer" class="float-end">
									@if($whishlist_product)
									
									<i class="fa fa-heart" style="color:red"></i>
									@else
									<i class="fa fa-heart" style="color:grey"></i>
									@endif
								</a>
								@if($discount_amount > 0)
								@if($recommended_product->discount_type=='amount')
								<span class="badge bg-danger"> €{{$recommended_product->discount}} OFF </span>
								@else
								<span class="badge bg-danger"> {{$recommended_product->discount}} % OFF </span>
								@endif
								@endif
							</span>
							<a href="{{route('product.details', [$recommended_product->id])}}"><img src="{{ asset('storage/product/' . $recommended_product->image) }}"></a>
						</div>
						<figcaption class="info-wrap border-top">
							<a href="{{route('product.details', [$recommended_product->id])}}" class="title">{{$recommended_product->name}}</a>
							<div class="price-wrap mb-3">
								<strong class="price">€{{$recommended_product->price - $discount_amount}}</strong>
								@if($recommended_product->discount > 0)
								<del class="price-old">€{{$recommended_product->price}}</del>
								@endif
							</div> <!-- price-wrap.// -->
							<!-- <a  class="btn btn-outline-primary w-100">Add to cart</a> -->
						</figcaption>
					</figure> <!-- card // -->
				</div> <!-- col.// -->
				@endforeach

			</div> <!-- row.// -->
		
		</div> <!-- container .//  -->
	</section>
	<!-- ============== SECTION END// ============== -->



	@include('livewire.home.layouts.footer')


</div>