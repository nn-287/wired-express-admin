
<div>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Lacrostini">
  <meta name="author" content="Lacrostini">
      <!-- CSRF Token -->
	  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>Lacrostini</title>

 <!-- Bootstrap css -->

 <link rel="stylesheet" href="{{asset('assets/customer')}}/css/bootstrap.css?v=2.0"> 
 <!-- <link href="css/bootstrap.css?v=2.0" rel="stylesheet" type="text/css" /> -->
 <link href="{{asset('assets/customer')}}/css/bootstrap.css?v=2.0" rel="stylesheet" type="text/css" />

<!-- Custom css -->
<link href="{{asset('assets/customer')}}/css/ui.css?v=2.0" rel="stylesheet" type="text/css" />
<!-- <link href="css/ui.css?v=2.0" rel="stylesheet" type="text/css" /> -->

<link href="{{asset('assets/customer')}}/css/responsive.css?v=2.0" rel="stylesheet" type="text/css" />

<!-- Font awesome 5 -->
<link href="{{asset('assets/customer')}}/fonts/fontawesome/css/all.min.css" type="text/css" rel="stylesheet">
<!-- <link href="fonts/fontawesome/css/all.min.css" type="text/css" rel="stylesheet"> -->

</head>
<body>

<header class="section-header">	
	<section class="header-main">
		<div class="container">
			<div class="row gy-3 align-items-center">
            @php($store_logo=\App\Model\BusinessSetting::where(['key'=>'logo'])->first()->value)
				<div class="col-lg-2 col-sm-4 col-4">
					<a href="" class="navbar-brand">
						<img class="logo" height="40" src="{{asset('storage/store/'.$store_logo)}}">
						<!-- <img class="logo" height="40" src="storage/app/public/store/2024-01-12-65a0803383f0c.png"> -->

					</a> <!-- Logo end.// -->
				</div>
				<div class="order-lg-last col-lg-5 col-sm-8 col-8">
					<div class="float-end">
					    @auth
						@else
						<a href="{{route('login')}}" class="btn btn-light"> 
						    <i class="fa fa-user"></i>  <span class="ms-1 d-none d-sm-inline-block">Sign in  </span> 
						</a>
						@endauth
						<a href="{{route('wishlist')}}" class="btn btn-light"> 
							<i class="fa fa-heart"></i>  <span class="ms-1 d-none d-sm-inline-block">Wishlist</span>   
						</a>
						<a data-bs-toggle="offcanvas" href="{{route('cart.info')}}" class="btn btn-light"> 
							<i class="fa fa-shopping-cart"></i> <span class="ms-1">My cart </span> 
						</a>
			        </div>
				</div> <!-- col end.// -->
				<div class="col-lg-5 col-md-12 col-12">
					<form class="" wire:submit.prevent="submitSearch" >
		              <div class="input-group">
		                <input type="text" class="form-control" wire:model="searchQuery" style="width:55%" placeholder="Search">
		                <select class="form-select">
							@php($categories = \App\Model\Category::all())
						    @foreach($categories as $category)
							<option value="">{{$category->name}}</option>
							@endforeach
		                  <!-- <option value="">All type</option>
		                  <option value="codex">Special</option>
		                  <option value="comments">Only best</option>
		                  <option value="content">Latest</option> -->
		                </select>
		                <button class="btn btn-primary" wire:click="$emit('submitSearch')"> <i class="fa fa-search"></i> </button>
		              </div> <!-- input-group end.// -->
		            </form>
				</div> <!-- col end.// -->
				
			</div> <!-- row end.// -->
		</div> <!-- container end.// -->
	</section> <!-- header-main end.// -->

	<nav class="navbar navbar-light bg-gray-light navbar-expand-lg">
		<div class="container">
			<button class="navbar-toggler border" type="button" data-bs-toggle="collapse" data-bs-target="#navbar_main">
				<span class="navbar-toggler-icon"></span>
			</button>
			
			<div class="collapse navbar-collapse" id="navbar_main">
				<ul class="navbar-nav">
				@foreach(App\Model\Category::where(['position'=>0,'status'=>1])->get() as $category)
					<li class="nav-item">
						<a class="nav-link ps-0" href="#"> {{$category->name}}</a>
					</li>
				@endforeach
					
				</ul>
			</div> <!-- collapse end.// -->
		</div> <!-- container end.// -->
	</nav> <!-- navbar end.// -->
</header> <!-- section-header end.// -->


<!-- Bootstrap js -->
<script src="js/bootstrap.bundle.min.js"></script>

<!-- Custom js -->
<script src="js/script.js?v=2.0"></script>

</body>

</div>

