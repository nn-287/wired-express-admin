<div>
  @include('livewire.home.layouts.header')

  <!-- ============== SECTION PAGETOP ============== -->
  <section class="bg-primary padding-y-sm">
    <div class="container">
      <small style="color:white; cursor:pointer"> Home</small>
      <i style="color:white" class="dot"></i>
      @foreach($categories as $category)
  
      <small style="color:white; cursor:pointer"> {{$category->name}}</small>
      <i style="color:white" class="dot"></i>
      @endforeach


    </div> <!-- container //  -->
  </section>
  <!-- ============== SECTION PAGETOP END// ============== -->

  <!-- ============== SECTION CONTENT ============== -->
  <section class="padding-y">
    <div class="container">

      <div class="row">
        <aside class="col-lg-6">
          <article class="gallery-wrap">
            <div class="img-big-wrap img-thumbnail">
              <a data-fslightbox="mygalley" data-type="image" href="images/items/detail1/big.jpg">
                <img height="560" src="{{ asset('storage/product/' . $product->image) }}">
              </a>
            </div>

            <!-- <div class="thumbs-wrap">
      <a data-fslightbox="mygalley" data-type="image" href="images/items/detail1/big1.jpg" class="item-thumb"> 
        <img width="60" height="60" src="images/items/detail1/thumb1.jpg"> 
      </a>
    </div>  -->
          </article> <!-- gallery-wrap .end// -->
        </aside>


        <main class="col-lg-6">
          <article class="ps-lg-3">
            <h4 class="title text-dark concert-one-bold">{{$product->name}}</h4>
            <div class="rating-wrap my-3">
              <ul class="rating-stars">
                <li style="width:80%" class="stars-active"> <img src="images/misc/stars-active.svg" alt=""> </li>
                <li> 
                <i class="fas fa-star" style="color: @if(count($product->rating) >0) orange @endif"> </i>
                 </li>
              </ul>
              @if(count($product->rating) >0)
              <b class="label-rating text-warning">{{ number_format($product->rating[0]['average'], 1) }}</b>
              @else
              <b class="label-rating text-muted">0</b>
              @endif

              <i class="dot"></i>
              <span class="label-rating text-muted alata-regular"> <i class="fa fa-shopping-basket"></i> {{\App\Model\OrderDetail::where('product_id', $product->id)->count()}} </span>
              <i class="dot"></i>
              <!-- <span class="label-rating text-success">In stock</span> -->
            </div> <!-- rating-wrap.// -->

            <div class="mb-3">
              <!-- Display the price with a loading indicator -->
              <div wire:loading>
                <span>Loading price...</span>
              </div>
              @php
              $discount_amount = 0;
              if($product->discount_type == 'amount'){
              $discount_amount = $product->discount;
              }else{
              $discount_amount = ($product->discount * $price) / 100;
              }
              @endphp
              <!-- Conditional rendering based on the loading state -->
              <div wire:loading.remove>
                <!-- Render the price when it is not loading -->
                <var class="price h5 alata-regular">€{{ ($price - $discount_amount) * $quantity}}</var>
                <var class="price h5 alata-regular"> <s style="color: gray; font-size: smaller; font-weight: normal;">€{{ ($price) * $quantity}}</s></var>
              </div>
            </div>

            <dl class="row">
              <h4 class="title alata-regular grey" style="font-size:medium">{{$product->description}}</h4>
            </dl>

            <hr>

            <p>{{json_encode($variation_index)}}</p>
          
            <div class="row mb-4">
              @foreach($choice_options as $key_1 => $choice_option)
              <div class="col-md-4 col-6 mb-2">
                <label class="form-label">{{$choice_option['title']}}</label>
                <select class="form-select" wire:model="selected_option_new.{{ $key_1 }}" wire:change="handleSelection('{{ $key_1 }}', $event.target.value)">
                  @foreach($choice_option['options'] as $key_2 => $option)
                  <option value="{{ $option }}">{{ $option }}</option>
                  @endforeach
                </select>
              </div>
              @endforeach
            </div>

            <div class="row mb-4">
              <div wire:loading>
                <span>Loading..</span>
              </div>
              <div class="col-md-4 col-6 mb-3" wire:loading.remove>
                <label class="form-label d-block">Quantity</label>
                <div class="input-group input-spinner">
                  <button wire:click="decreaseQuantity" class="btn btn-icon btn-light" type="button">
                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="#999" viewBox="0 0 24 24">
                      <path d="M19 13H5v-2h14v2z"></path>
                    </svg>
                  </button>
                  <input wire:model="quantity" class="form-control text-center" placeholder="" value="{{ $quantity }}">
                  <button wire:click="increaseQuantity" class="btn btn-icon btn-light" type="button">
                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="#999" viewBox="0 0 24 24">
                      <path d="M19 13h-6v6h-2v-6H5v-2h6V5h2v6h6v2z"></path>
                    </svg>
                  </button>
                </div> <!-- input-group.// -->
              </div> <!-- col.// -->
            </div>


            @php($whishlist_product = \App\Model\Wishlist::where('user_id', auth()->user()->id)->where('product_id', $product->id)->first())
            <!-- <a wire:click="buyNow" class="btn  btn-warning"> Buy now </a> -->
            <a wire:click='addToCart' class="btn btn-primary">
              <i class="me-1 fa fa-shopping-basket"></i>
              Add to cart </a>
            <a wire:click="addToWhishlist('{{ $product->id }}')" class="btn  btn-light">
              @if($whishlist_product)
              <i class="fa fa-heart" style="color: red;"></i>
              @else
              <i class="fa fa-heart"></i>
              @endif
              </i> Save </a>
              @if ($show_cart_success_dialog)
          <div class="alert alert-success mt-3" style="width:300px;" id="success-dialog">
            Item added to cart successfully!
          </div>
          @endif
          </article> <!-- product-info-aside .// -->
          
        </main> <!-- col.// -->
      </div> <!-- row.// -->

    </div> <!-- container .//  -->
  </section>
  <!-- ============== SECTION CONTENT END// ============== -->

  <!-- ============== SECTION  ============== -->
  <section class="padding-y bg-light border-top">
    <div class="container">
      <div class="row">
        <div class="col-lg-8">
          <!-- =================== COMPONENT SPECS ====================== -->

          <!-- =================== COMPONENT SPECS .// ================== -->
        </div> <!-- col.// -->
        <aside class="col-lg-4">
          <!-- =================== COMPONENT ADDINGS ====================== -->
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Similar items</h5>

              @foreach($similar_products as $similar_product)
              @php($discount = $similar_product->discount)
              @php($discount_amount = $similar_product->discount_type=='amount'? $similar_product->discount : ($similar_product->price * $similar_product->discount) /100)
              <article class="itemside mb-3">
                <a href="{{route('product.details', [$similar_product->id])}}" class="aside">
                  <img src="{{ asset('storage/product/' . $similar_product->image) }}" width="96" height="96" class="img-md img-thumbnail">
                </a>
                <div class="info">
                  <a href="{{route('product.details', [$similar_product->id])}}" class="title mb-1"> {{$similar_product->name}} </a>

                  @php($start_at_txt = '')
                  @if(json_decode($similar_product->variations > 0))
                  @php($start_at_txt = 'Starts at:')
                  @endif

                  <strong class="price">{{$start_at_txt}} ${{$similar_product->price}}</strong> <!-- price.// -->
                  @if($similar_product->discount > 0)
                  <del class="price-old">€{{$similar_product->price - $discount_amount}}</del>
                  @endif
                </div>
              </article>
              @endforeach


            </div> <!-- card-body .// -->
          </div> <!-- card .// -->
          <!-- =================== COMPONENT ADDINGS .// ================== -->
        </aside> <!-- col.// -->
      </div>

      <br><br>

    </div><!-- container // -->
  </section>
  <!-- =============== SECTION  END// ============== -->

  @include('livewire.home.layouts.footer')

</div>