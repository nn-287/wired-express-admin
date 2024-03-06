<div>

  @include('livewire.home.layouts.header')

  <section class="padding-y bg-light">
    <div class="container">

      <!-- =========================  COMPONENT ACCOUNT 3 ========================= -->
      <div class="row">

        <!-- LEFT BAR -->
        @include('livewire.home.layouts.leftbar')
        <!-- END LEFT BAR -->

        @php($user_address = \App\Model\CustomerAddress::where('user_id', $user->id)->first())
        <main class="col-lg-9">
          <article class="card">
            <div class="card-body">
              <form wire:submit.prevent="updateSettings()">
                <div class="row">
                  <div class="col-lg-8">
                    <div class="row gx-3">
                      <div class="col-6 mb-3">
                        <label class="form-label">First name</label>
                        <div>
                          <input class="form-control" type="text" placeholder="Type here" wire:model="f_name" value="{{$user->f_name}}" required>
                          @error('f_name')
                          <span role="alert" style="color:red; font-size:smaller; font-style:italic">{{$message}}</span>
                          @enderror
                        </div>
                      </div> <!-- col .// -->
                      <div class="col-6  mb-3">
                        <label class="form-label">Last name</label>
                        <div>
                          <input class="form-control" type="text" placeholder="Type here" wire:model="l_name" required>
                          @error('l_name')
                          <span role="alert" style="color:red; font-size:smaller; font-style:italic">{{$message}}</span>
                          @enderror
                        </div>
                      </div> <!-- col .// -->
                      <div class="col-lg-6 col-md-6 mb-3">
                        <label class="form-label">Email</label>
                        <div>
                          <input class="form-control" type="email" placeholder="example@mail.com" wire:model="email" required>
                          @error('email')
                          <span role="alert" style="color:red; font-size:smaller; font-style:italic">{{$message}}</span>
                          @enderror
                        </div>
                      </div> <!-- col .// -->
                      <div class="col-lg-6 col-md-6 mb-3">
                        <label class="form-label">Phone</label>
                        <div>
                          <input class="form-control" type="tel" placeholder="+1234567890" wire:model="phone" required>
                          @error('phone')
                          <span role="alert" style="color:red; font-size:smaller; font-style:italic">{{$message}}</span>
                          @enderror
                        </div>
                      </div> <!-- col .// -->
                      <div class="col-lg-12  mb-3">
                        <label class="form-label">Address</label>
                        <div>
                          <input class="form-control" type="text" placeholder="Type here" wire:model="address" required>
                          @error('address')
                          <span role="alert" style="color:red; font-size:smaller; font-style:italic">{{$message}}</span>
                          @enderror
                        </div>
                      </div> <!-- col .// -->
                    </div> <!-- row.// -->
                  </div> <!-- col.// -->
                  <aside class="col-lg-4">
                    <figure class="text-lg-center mt-3">
                  
                      @if($user->image !=null)
                      <img class="img-lg mb-3 img-avatar" src="{{ asset('storage/user/' . $user->image )}}" alt="User Photo">
                      @else
                      <img class="img-lg mb-3 img-avatar" src="{{ asset('storage/user/user-icon.png')}}" alt="User Photo">
                      @endif
                      <figcaption>
                        <!-- Hidden file input -->
                        <input type="file" wire:model="file" id="fileInput" style="display: none;">
                        <!-- Upload button -->
                        <a class="btn btn-sm btn-light" href="#" onclick="document.getElementById('fileInput').click();">
                          <i class="fa fa-camera"></i> Upload
                        </a>
                        <!-- Delete button -->
                        <a class="btn btn-sm btn-outline-danger" href="#" wire:click="deleteImage()">
                          <i class="fa fa-trash"></i>
                        </a>
                      </figcaption>
                    </figure>
                  </aside> <!-- col.// -->
                </div> <!-- row.// -->
                <br>
                <button class="btn btn-primary" type="submit">Save changes</button>
                @if($successMessage)
                <div class="alert alert-success" role="alert" style="position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); padding: 20px; border: 1px solid #ccc; border-radius: 7px;">
                  {{ $successMessage }}
                  <br><br>
                  <a href="#" class="btn btn-sm btn-outline-success" wire:click="reloadPage()" style="margin-left:80px;">Ok</a>
                </div>
                @endif
              </form>


              <hr class="my-4">

              <div class="row" style="max-width:920px">
                <div class="col-md">
                  <article class="box mb-3 bg-light">
                    <a class="btn float-end btn-light btn-sm" href="{{route('profile.change-password')}}">Change</a>
                    <p class="title mb-0">Password</p>
                    <small class="text-muted d-block" style="width:70%">You can reset or change your password by clicking here</small>
                  </article>
                </div> <!-- col.// -->
                <div class="col-md">
                  <article class="box mb-3 bg-light">
                    <a class="btn float-end btn-outline-danger btn-sm" href="#" data-toggle="modal" data-target="#exampleModal">Deactivate</a>
                    <!-- Dialog for cancellation confirmation -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Confirm</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            Are you Sure youe want Remove Account ?
                          </div>
                          <div class="modal-footer">
                            <a class="btn btn-secondary" data-dismiss="modal">Close</a>
                            <a class="btn btn-primary" wire:click="removeAccount()">Remove Account</a>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- end dialog -->
                    <p class="title mb-0">Remove account</p>
                    <small class="text-muted d-block" style="width:70%">Once you delete your account, there is no going back.</small>
                  </article>
                </div> <!-- col.// -->
              </div> <!-- row.// -->


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