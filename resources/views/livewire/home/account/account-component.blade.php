<div>

@include('livewire.home.layouts.header')

<section class="padding-y bg-light">
<div class="container">

<!-- =========================  COMPONENT ACCOUNT 1 ========================= --> 
<div class="row">
	
 <!-- LEFT BAR -->
 @include('livewire.layouts.leftbar')
<!-- END LEFT BAR -->

    @php($user_addresses = \App\Model\CustomerAddress::where('user_id', $user->id)->get())
	<main class="col-lg-9">
		<article class="card">
		<div class="card-body">
			<figure class="itemside align-items-center">
				<div class="aside">
				@if($user->image !=null)
				<img src="{{ asset('storage/user/' . $user->image )}}" class="icon-md img-avatar">
				@else
				<img src="{{ asset('storage/user/user-icon.png')}}" class="icon-md img-avatar">
				@endif
					
				</div>
				<figcaption class="info">
				
					<h6 class="title">{{$user->f_name}} {{$user->l_name}}</h6>
					<p>Email: {{$user->email}} <i class="dot"></i> Phone: +1234567890988 
						<a href="{{route('profile.profile')}}" class="px-2"><i class="fa fa-pen"></i></a>
					</p>
				</figcaption>
			</figure>
			<hr>
			<p class="text-muted">Delivery addresses</p>
			<div class="row g-2 mb-3"> 
                @foreach($user_addresses as $user_address)
				<div class="col-md-6">
					<article class="box">
						<b class="mx-2 text-muted"><i class="fa fa-map-marker-alt"></i></b> 
						{{$user_address->address}}
					</article>
				</div> <!-- col.// -->
                @endforeach
			</div> <!-- row.// -->

			<a href="#" class="btn btn-outline-primary" wire:click = ""> <i class="me-2 fa fa-plus"></i> Add new address </a>

			<hr>

			<!-- <p  class="text-muted">Payment methods</p>

			<div class="row g-2 mb-3"> 
				<div class="col-md-6">
					<article class="box">
						<b class="mx-2 text-muted"><i class="fa fa-credit-card"></i></b> 
						Visaâ€†â€¢â€¢â€¢â€¢â€†9905, Exp: 12/21
					</article>
				</div> 
			</div> -->

			<!-- <a href="#" class="btn btn-outline-primary"> <i class="me-2 fa fa-plus"></i> Add payment method </a> -->

		</div> <!-- card-body .// -->
		</article> <!-- card .// --> 
	</main>
</div> <!-- row.// -->
<!-- =========================  COMPONENT ACCOUNT 1 END.// ========================= --> 


</div> <!-- container .//  -->
</section>

@include('livewire.home.layouts.footer')


</div>