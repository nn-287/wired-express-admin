<div>
	@include('livewire.home.layouts.header')


	<!-- ================ SECTION INTRO ================ -->


	<section class="section-intro padding-top-sm">
		<div class="container">
			<main class="card p-3">
				@php($banner_img = $selected_banner->image)
				<div class="row">
					<aside class="col-lg-3">
						<nav class="nav flex-column nav-pills">
							@foreach($banners as $banner)

							@if($selected_banner_id == $banner->id)
							@php($banner_img = $banner->image)
							<div class="nav-link active alata-regular" style="cursor: pointer" aria-current="page" wire:click="updateSelectedBanner('{{ $banner->id }}')">{{$banner->title}}</div>
							@else
							<div class="nav-link alata-regular" style="cursor: pointer;" wire:click="updateSelectedBanner('{{ $banner->id }}')">{{$banner->title}}</div>
							@endif
							@endforeach
						</nav>
					</aside>

					<div class="col-lg-9">
						<article class="card-banner p-5 bg-primary" style="background-image: url('{{ asset('storage/banner/' . $banner_img) }}');  
				              background-size: cover; background-position: center center; padding-y: 50px; height: 360px">
							<div style="max-width: 500px">
								<h2 class="text-white concert-one-regular">{{$selected_banner->title}} </h2>
								<p class="text-white alata-regular">{{$selected_banner->description}}</p>
            <a href="{{ route('product.list', ['search' => ' ', 'categoryId' => $selected_banner->category_id]) }}" class="btn btn-warning"> View more </a>
							</div>
						</article>
					</div>
				</div>
			</main>
		</div> <!-- container end.// -->
	</section>
	<!-- ================ SECTION INTRO END.// ================ -->


	<!-- ================ SECTION PRODUCTS ================ -->
	<section class="padding-top">
		<div class="container">

			<header class="section-heading">
				<h3 class="section-title concert-one-regular">Featured</h3>
			</header>

			<div class="row">
				@foreach($featured_products as $featured_product)
				@php($discount = $featured_product->discount)
				@php($discount_amount = $featured_product->discount_type=='amount'? $featured_product->discount : ($featured_product->price * $featured_product->discount) /100)
				@php($whishlist_product = \App\Model\Wishlist::where('user_id', auth()->user()->id)->where('product_id', $featured_product->id)->first())
				<div class="col-lg-3 col-md-6 col-sm-6">
				
				<figure class="card card-product-grid"> 
						<a href="{{route('product.details', [$featured_product->id])}}" class="img-wrap">
							@if($featured_product->discount > 0)
							<span class="topbar"> <b class="badge bg-primary"> {{$featured_product->discount_type=='amount'? '€': ''}}{{$featured_product->discount}} {{$featured_product->discount_type=='percent'? '%': ''}} OFF</b> </span>
							@endif
							<img src="{{ asset('storage/product/' . $featured_product->image) }}">
							<!-- <img src="{{ asset('storage/product/' . $featured_product->image) }}"> -->
						</a>

						<figcaption class="info-wrap border-top">
							<a wire:click="addToWhishlist('{{ $featured_product->id }}')" class="float-end btn btn-light btn-icon">
								@if($whishlist_product)
								<i class="fa fa-heart" style="color: red;"></i>
								@else
								<i class="fa fa-heart"></i>
								@endif
							</a>
             <a href="{{route('product.details', [$featured_product->id])}}" class="title text-truncate concert-one-regular" 
							style="font-size:large">{{$featured_product->name}}</a>

							@php($variations = json_decode($featured_product->variations, true))

							@php($start_at_txt = '')
							@if(count($variations) > 0)
							@php($start_at_txt = 'Starts at:')
							@endif

							@foreach(json_decode($featured_product->variations, true) as $variation)
							<!-- <small class="text-muted pr-2">{{$variation['type']}}</small> -->
							@endforeach

							<div class="price-wrap">

								<span class="price alata-regular">{{$start_at_txt}} €{{$featured_product->price - $discount_amount}}</span>
								@if($featured_product->discount > 0)
								<del class="price-old alata-regular">€{{$featured_product->price}}</del>
								@endif
							</div> <!-- price-wrap.// -->
						</figcaption>

					</figure>
				</div> <!-- col end.// -->
				@endforeach

			</div> <!-- row end.// -->

		</div> <!-- container end.// -->
	</section>
	<!-- ================ SECTION PRODUCTS END.// ================ -->


	<!-- ================ SECTION FEATURE ================ -->
	@php($featured_banner_one = \App\Model\Banner::where('banner_position', '1')->first())
	<section class="padding-top">
		<div class="container">
			<div class="row gy-4">
				<aside class="col-lg-6">
					<article class="card-banner p-5 bg-gray img-bg h-100" style="background-image: url('{{ asset('storage/banner/' . $featured_banner_one->image) }}'); 
                            background-size: cover; background-position: center center; padding-y: 50px; height: 360px; position: relative;">
						<div style="position: relative; z-index: 1; max-width: 500px;">
							<h2 class="text-white concert-one-bold">{{$featured_banner_one->title}}</h2>
							<p class="text-white alata-regular">{{$featured_banner_one->description}}</p>


<a href="{{ route('product.list', ['search' => ' ', 'categoryId' => $featured_banner_one->category_id]) }}" class="btn btn-warning">View more</a>
						</div>
						<div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.5); z-index: 0;"></div>
					</article>


				</aside> <!-- col.// -->
				<aside class="col-lg-6">

					<div class="row mb-4">
						<div class="col-6">
							@php($featured_banner_two = \App\Model\Banner::where('banner_position', '2')->first())
							<article class="card bg-primary" style="background-image: url('{{ asset('storage/banner/' . $featured_banner_two->image) }}'); 
                                   background-size: cover; background-position: center center; padding-y: 50px; position: relative; min-height: 200px">
								<div class="card-body" style="position: relative; z-index: 1;">
									<h5 class="text-white concert-one-bold">{{$featured_banner_two->title}}</h5>
									<p class="text-white alata-regular">{{$featured_banner_two->description}} </p>
<a class="btn btn-outline-light btn-sm"
									 href="{{ route('product.list', ['search' => ' ', 'categoryId' => $featured_banner_two->category_id]) }}">Learn more</a>
								</div>
								<div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.7); z-index: 0;"></div>
							</article>
						</div>
						<div class="col-6">
							@php($featured_banner_three = \App\Model\Banner::where('banner_position', '3')->first())
							<article class="card bg-primary" style="background-image: url('{{ asset('storage/banner/' . $featured_banner_three->image) }}'); 
                 background-size: cover; background-position: center center; padding-y: 50px; position: relative; min-height: 200px">
								<div class="card-body" style="position: relative; z-index: 1;">
									<h5 class="text-white concert-one-bold">{{$featured_banner_three->title}}</h5>
									<p class="text-white alata-regular">{{$featured_banner_three->description}} </p>
<a class="btn btn-outline-light btn-sm" href="{{ route('product.list', ['search' => ' ', 'categoryId' => $featured_banner_three->category_id]) }}">Learn more</a>
								</div>
								<div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.7); z-index: 0;"></div>
							</article>
						</div>
					</div> <!-- row.// -->

					@php($featured_banner_four = \App\Model\Banner::where('banner_position', '4')->first())
				 	<article class="card bg-success" style="background-image: url('{{ asset('storage/banner/' . $featured_banner_four->image) }}'); 
                           background-size: cover; background-position: center center; padding-y: 50px; position: relative; min-height: 200px">
						<div class="card-body">
							<h5 class="text-white concert-one-bold">{{$featured_banner_four->title}}</h5>
							<p class="text-white-50 alata-regular" style="max-width:400px;">{{$featured_banner_four->description}}</p>
<a class="btn btn-outline-light btn-sm" href="{{ route('product.list', ['search' => ' ', 'categoryId' => $featured_banner_four->category_id]) }}">Learn more</a>
						</div>
					</article>

				</aside> <!-- col.// -->
			</div> <!-- row.// -->
		</div> <!-- container end.// -->
	</section>
	<!-- ================ SECTION FEATURE END.// ================ -->

	<!-- ================ SECTION PRODUCTS ================ -->
	<section class="padding-top">
		<div class="container">
			<header class="section-heading">
				<h3 class="section-title">Most New</h3>
			</header>

			@php($products = \App\Model\Product::active()->latest()->take(5)->get())

			<div class="row gy-3">
				@foreach($products as $product)
				
				<div class="col-lg-2 col-md-4 col-4">
					<div class="position-relative">
						<a href="{{route('product.details', [$product->id])}}" class="img-wrap">
							<img height="200" width="200" class="img-product" src="{{ asset('storage/product/' . $product->image) }}">
						</a>
<a href="{{route('product.details', [$product->id])}}" class="bottom-sticker">
						<span class="title concert-one-bold">{{ $product->name }}</span>
							<span class="price alata-regular">€{{ $product->price }}</span>
						</a>
					</div>
				</div>
				@endforeach
			</div> <!-- row end.// -->

		</div> <!-- container end.// -->
	</section>
	<!-- ================ SECTION PRODUCTS END.// ================ -->

	<section class="padding-y">
		<div class="container">
			<article class="card p-3 p-lg-5">
				<div class="row g-3">
					<div class="col-lg-3 col-md-6">
						<figure class="icontext">
							<div class="icon">
								<span class="icon-sm bg-warning-light text-warning rounded">
									<i class="fa fa-thumbs-up"></i>
								</span>
							</div>
							<figcaption class="text">
								<h6 class="title">Reasonable prices</h6>
								<p>Quality you can afford. </p>
							</figcaption>
						</figure> <!-- icontext // -->
					</div><!-- col // -->
					<div class="col-lg-3 col-md-6">
						<figure class="icontext">
							<div class="icon">
								<span class="icon-sm bg-warning-light text-warning rounded">
									<i class="fa fa-car"></i>
								</span>
							</div>
							<figcaption class="text">
								<h6 class="title">Fast shipping</h6>
								<p>Get it there quick! </p>
							</figcaption>
						</figure> <!-- icontext // -->
					</div><!-- col // -->
					<div class="col-lg-3 col-md-6">
						<figure class="icontext">
							<div class="icon">
								<span class="icon-sm bg-warning-light text-warning rounded">
									<i class="fa fa-star"></i>
								</span>
							</div>
							<figcaption class="text">
								<h6 class="title">Best ratings</h6>
								<p>Loved by our customers!</p>
							</figcaption>
						</figure> <!-- icontext // -->
					</div> <!-- col // -->
					<div class="col-lg-3 col-md-6">
						<figure class="icontext">
							<div class="icon">
								<span class="icon-sm bg-warning-light text-warning rounded">
									<i class="fa fa-phone"></i>
								</span>
							</div>
							<figcaption class="text">
								<h6 class="title">Help center</h6>
								<p>Get instant help</p>
							</figcaption>
						</figure> <!-- icontext // -->
					</div> <!-- col // -->
				</div> <!-- row // -->
			</article>
		</div><!-- //container -->
	</section>

	@include('livewire.home.layouts.footer')


	<style>
		.bottom-sticker {
			position: absolute;
			bottom: 0;
			left: 0;
			width: 100%;
			background-color: rgba(0, 0, 0, 0.7);
			color: #fff;
			padding: 5px;
			text-align: center;
		}

		.title,
		.price {
			display: block;
			font-size: 14px;
		}

		.price {
			font-weight: bold;
		}
	</style>
</div>