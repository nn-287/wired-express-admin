<div>

@include('livewire.home.layouts.header')

<section class="padding-y bg-light">
<div class="container">

<!-- =========================  COMPONENT ACCOUNT 3 ========================= --> 
<div class="row">
	<aside class="col-lg-3">
		<!--  COMPONENT MENU LIST  -->
		<div class="card p-3 h-100">
		   <nav class="nav flex-column nav-pills">
		      <a class="nav-link" href="{{route('account')}}">Account main</a>
		      <a class="nav-link" href="{{route('order.new')}}">New orders</a>
		      <a class="nav-link" href="{{route('order.history')}}">Orders history</a>
		      <a class="nav-link" href="#">My wishlist</a>
		      <a class="nav-link" href="#">Transactions</a>
		      <a class="nav-link active" href="{{route('profile.profile')}}">Profile setting</a>
		      <a class="nav-link" href="#">Log out</a>
		    </nav>
		</div>
		<!--   COMPONENT MENU LIST END .//   -->
	</aside>
    
	<main class="col-lg-9">
		<article class="card">
		<div class="card-body">
			<form wire:submit.prevent="updatePassword()">
              <div class="row">
                <div class="col-lg-8">
                  <div class="row gx-3">
                    <div class="col-6 mb-3">
                      <label class="form-label">Password</label>
					  <input class="form-control" type="password"  placeholder="password" wire:model="password" required>
					  <div>
                        @error('password') 
                            <div role="alert" style="color:red; font-size:smaller; font-style:italic">{{$message}}</div> 
                        @enderror
                      </div>

                    </div> <!-- col .// -->
                    <div class="col-6  mb-3">
                      <label class="form-label" >Comfirm Password</label>
					  <input class="form-control" type="password" placeholder="confirm password" wire:model="confirm_password" required> 
					  <div>
                        @error('confirm_password') 
                            <div role="alert" style="color:red; font-size:smaller; font-style:italic">{{$message}}</div> 
                        @enderror
                      </div>
                    </div> <!-- col .// -->
                    
              </div> <!-- row.// -->
              <br>
              <button class="btn btn-primary" type="submit" wire:click="updatePassword()">Update</button>
              @if($successMessage)
                  <div class="alert alert-success" role="alert" style="position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); padding: 20px; border: 1px solid #ccc; border-radius: 7px;">
                      {{ $successMessage }}
                      <br><br>
                      <a href="#" class="btn btn-sm btn-outline-success" wire:click="reloadPage()" style="margin-left:80px;">Ok</a>
                  </div>
              @endif
            </form>
		</div> <!-- card-body .// -->
		</article> <!-- card .// --> 
	</main>
</div> <!-- row.// -->
<!-- =========================  COMPONENT ACCOUNT 3 END.// ========================= --> 


<br> <br>

</div> <!-- container .//  -->
</section>

@include('livewire.home.layouts.footer')


</div>