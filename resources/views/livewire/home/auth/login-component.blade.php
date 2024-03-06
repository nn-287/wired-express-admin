<div>
<!DOCTYPE HTML>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Type some info">
  <meta name="author" content="Type name">

  <title>Wired-Express</title>

  <link rel="stylesheet" href="{{asset('assets/customer')}}/css/bootstrap.css?v=2.0"> 
 <!-- <link href="css/bootstrap.css?v=2.0" rel="stylesheet" type="text/css" /> -->
 <link href="{{asset('assets/customer')}}/css/bootstrap.css?v=2.0" rel="stylesheet" type="text/css" />

  <!-- Custom css -->
  <link href="{{asset('assets/customer')}}/css/ui.css?v=2.0" rel="stylesheet" type="text/css" />
  <link href="{{asset('assets/customer')}}/css/responsive.css?v=2.0" rel="stylesheet" type="text/css" />

  <!-- Font awesome 5 -->
  <link href="{{asset('assets/customer')}}/fonts/fontawesome/css/all.min.css" type="text/css" rel="stylesheet">

</head>
<body>

<header class="section-header border-bottom">	
	<section class="header-main">
		<div class="container">
			<div class="row gy-3 align-items-center">
            @php($store_logo=\App\Model\BusinessSetting::where(['key'=>'logo'])->first()->value)
				<div class="col-4">
					<a href="" class="brand-wrap">
						<img class="logo" height="40" src="{{asset('storage/store/'.$store_logo)}}">
					</a> <!-- brand-wrap end.// -->
				</div>
				<div class="col-8">
					<div class="float-end">
						<a href="#" class="btn btn-outline-primary">  Sign in </a>
						<a href="#" class="btn btn-primary">  Register </a>
			        </div>
				</div> <!-- col end.// -->
			</div> <!-- row end.// -->
		</div> <!-- container end.// -->
	</section> <!-- header-main end.// -->
</header> <!-- section-header end.// -->

<!-- ============== SECTION CONTENT  ============== -->
<section class="padding-y bg-light" style="min-height:90vh">
<div class="container">



<!-- ====== COMPONENT LOGIN  ====== -->
<div class="card shadow mx-auto" style="max-width:400px; margin-top:40px;">
	<div class="card-body">
	<h4 class="card-title mb-4">Sign in</h4>
    
	<form wire:submit.prevent="submit">
    @csrf

		<div class="mb-3">
			 <label class="form-label">Email</label>
			 <input wire:model="email" class="form-control" placeholder="Type email" type="text">
		</div> 
		
		<div class="mb-3">
			<label class="form-label">Password</label>
			<input wire:model="password" class="form-control" placeholder="At least 6 characters." type="password">
		</div>  
	
		<div class="mb-4">
		  <button type="submit" class="btn btn-primary w-100"> Login  </button>
		</div> 

		<div class="mb-4">
			<label class="form-check">
			  <input class="form-check-input" type="checkbox" checked value="">
			  <span class="form-check-label"> I agree with Terms and Conditions </span>
			</label>
		</div> 
	</form>
	<hr>
	<p class="text-center mb-2">New user? <a href="#">Sign up</a></p>

</div> <!-- card-body.// -->
</div> <!-- card .// -->

<!-- ====== COMPONENT LOGIN  END.// ====== -->

<br><br>

</div> <!-- container .//  -->
</section>
<!-- ============== SECTION CONTENT END// ============== -->
@include('livewire.home.layouts.footer')


</body>
</html>
</div>