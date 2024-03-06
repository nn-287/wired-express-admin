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
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">


<link href="https://fonts.googleapis.com/css2?family=Alata&family=Bebas+Neue&family=Concert+One&family=Rubik+Mono+One&display=swap" rel="stylesheet">

</head>
<body>

<header class="section-header">	
	<section class="header-main">
		<div class="container">
			<div class="row gy-3 align-items-center">
            @php($store_logo=\App\Model\BusinessSetting::where(['key'=>'logo'])->first()->value)
				<div class="col-lg-2 col-sm-4 col-4">
					<a href="{{ route('home') }}" class="navbar-brand">
						<img class="logo" height="40" src="{{asset('storage/store/'.$store_logo)}}">
						<!-- <img class="logo" height="40" src="storage/app/public/store/2024-01-12-65a0803383f0c.png"> -->

					</a> <!-- Logo end.// -->
				</div>
				<div class="order-lg-last col-lg-5 col-sm-8 col-8">
					<div class="float-end">
					    @auth
						<a href="{{route('account')}}" class="btn btn-light"> 
						    <i class="fa fa-user"></i>  <span class="ms-1 d-none d-sm-inline-block alata-regular">Account</span> 
						</a>
						@else
						<a href="{{route('login')}}" class="btn btn-light"> 
						    <i class="fa fa-user"></i>  <span class="ms-1 d-none d-sm-inline-block alata-regular">Sign in  </span> 
						</a>
						@endauth
						<a href="{{route('wishlist')}}" class="btn btn-light"> 
							<i class="fa fa-heart"></i>  <span class="ms-1 d-none d-sm-inline-block alata-regular">Wishlist</span>   
						</a>
						<a data-bs-toggle="offcanvas" href="{{route('cart.info')}} " class="btn btn-light"> 
							<i class="fa fa-shopping-cart"></i> <span class="ms-1 alata-regular">My cart </span> 
						</a>
			        </div>
				</div> <!-- col end.// -->
				
				<div class="col-lg-5 col-md-12 col-12">
		              <div class="input-group">
				
					  <input type="text" id="searchInput" value="{{ Request::segment(2) == 'list'? Request::segment(3) : '' }}" class="form-control" style="width:55%" placeholder="Search" required>
		                
						<button id="searchButton" class="btn btn-primary"> <i class="fa fa-search"></i> </button>
		              </div> <!-- input-group end.// -->
				</div> <!-- col end.// -->
				
			</div> <!-- row end.// -->
		</div> <!-- container end.// -->
	</section> <!-- header-main end.// -->

	<nav class="navbar navbar-light bg-primary navbar-expand-lg">
		<div class="container">
			<button class="navbar-toggler border" type="button" data-bs-toggle="collapse" data-bs-target="#navbar_main">
				<span class="navbar-toggler-icon"></span>
			</button>
			
			<div class="collapse navbar-collapse" id="navbar_main">
				<ul class="navbar-nav">
				@foreach(App\Model\Category::where(['position'=>0,'status'=>1])->get() as $category)
					<li class="nav-item">
<a class="nav-link ps-0 pr-5 concert-one-regular" style="color:white; text-transform: uppercase;" 
						href="{{ route('product.list', ['search' => ' ', 'categoryId' => $category->id]) }}"> {{$category->name}}</a>  
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

<script>
	const productListRoute = "{{ route('product.list', ':search') }}";

document.getElementById('searchButton').addEventListener('click', function() {
    // Get the search query and category ID
    var searchQuery = document.getElementById('searchInput').value.trim();

    // Construct the search URL with the search query parameter
    if (searchQuery !== '') { // Check if searchQuery is not empty
        var searchUrl = productListRoute.replace(':search', encodeURIComponent(searchQuery));

        // Redirect to the search URL
        window.location.href = searchUrl;
    } else {
        // Handle the case where the search query is empty
        alert('Search field is empty.');
    }
});

</script>

<style>
	.bebas-neue-regular {
  font-family: "Bebas Neue", sans-serif;
  font-weight: 400;
  font-style: normal;
  font-size: larger;
}


</style> 
</div>

