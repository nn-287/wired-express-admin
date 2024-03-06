<div>

  @include('livewire.home.layouts.header')


  <!-- ============== SECTION PAGETOP ============== -->
  <section class="bg-primary padding-y-sm">
    <div class="container">
      <a href="{{ route('home') }}"><small style="color:white; cursor:pointer"> Home</small> </a>
      <i style="color:white" class="dot"></i>
      @php($category = \App\Model\Category::find($categoryId))
      @if($category)
      <small style="color:white; cursor:pointer"> {{$category->name}}</small>
      <i style="color:white" class="dot"></i>
      @endif

    </div> <!-- container //  -->
  </section>
  <!-- ============== SECTION PAGETOP END// ============== -->

  <!-- ============== SECTION CONTENT ============== -->
  <section class="padding-y">
    <div class="container">

      <div class="row">
        <aside class="col-lg-3">

          <button class="btn btn-outline-secondary mb-3 w-100  d-lg-none" data-bs-toggle="collapse" data-bs-target="#aside_filter">Show filter</button>

          <!-- ===== Card for sidebar filter ===== -->
          <div id="aside_filter" class="collapse card d-lg-block mb-5">

            <article class="filter-group">
              <header class="card-header">
                <a href="#" class="title" data-bs-toggle="collapse" data-bs-target="#collapse_aside1">
                  <i class="icon-control fa fa-chevron-down"></i>
                  Related items
                </a>
              </header>
              @php($categories = \App\Model\Category::all())
              <div class="collapse show" id="collapse_aside1">
                <div class="card-body">
                  <ul class="list-menu">
                    @foreach($categories as $category)
                    <li><a href="#">{{$category->name}}</a></li>
                    @endforeach
                  </ul>
                </div> <!-- card-body.// -->
              </div>

            </article> <!-- filter-group // -->
          </div> <!-- card.// -->

          <!-- ===== Card for sidebar filter .// ===== -->

        </aside> <!-- col .// -->
        <main class="col-lg-9">

          <header class="d-sm-flex align-items-center border-bottom mb-4 pb-3">
            <strong class="d-block py-2">{{count($products)}} Items Found</strong>
            
          </header>

          <!-- ========= content items ========= -->
          @foreach($products as $product)
          @php($ratingValue = \App\Model\Review::where('product_id', $product->id)->first())
          @php($ordersForProduct = \App\Model\OrderDetail::where('product_id', $product->id)->get())
          @php($discount_amount = $product->discount_type=='amount'? $product->discount : ($product->price * $product->discount) /100)
          @php($whishlist_product = \App\Model\Wishlist::where('user_id', auth()->user()->id)->where('product_id', $product->id)->first())
          <article class="card card-product-list">
            <div class="row g-0">
              <aside class="col-xl-3 col-md-4">
                <a href="{{route('product.details', [$product->id])}}" class="img-wrap"> <img src="{{asset('storage/product/' . $product->image )}}"> </a>
              </aside> <!-- col.// -->
              <div class="col-xl-6 col-md-5 col-sm-7">
                <div class="card-body">
                  <a href="{{route('product.details', [$product->id])}}" class="title h5"> {{$product->name}} </a>

                  <div class="rating-wrap mb-2">
                    <ul class="rating-stars">
                      <li> <i class="fas fa-star" style="color:  @if(isset($ratingValue) && $ratingValue->rating > 0) orange @endif"> </i> </li> 
                    </ul>
                    @if(isset($ratingValue) && $ratingValue->rating !== null)
                    <span class="label-rating text-warning">{{$ratingValue->rating}}</span>
                    @endif
                    <i class="dot"></i>
                    <span class="label-rating text-muted">{{count($ordersForProduct)}} orders</span>
                  </div> <!-- rating-wrap// -->
                  <p> {{$product->description}}</p>
                </div> <!-- card-body.// -->
              </div> <!-- col.// -->
              <aside class="col-xl-3 col-md-3 col-sm-5">
                <div class="info-aside">
                  <div class="price-wrap">
                    <span class="price h5"> $ {{$product->price - $discount_amount}}</span>
                    @if($product->discount > 0)
                    <del class="price-old"> ${{$product->price}}</del>
                    @endif
                  </div> <!-- info-price-detail // -->
                  @if($product->discount > 0 )
                  @if($product->discount > 5 )
                  <p class="text-success">{{$product->discount_type=='amount'? '€': ''}}{{$product->discount}} {{$product->discount_type=='percent'? '%': ''}} OFF</p>
                  @else
                  <p class="text-warning">{{$product->discount_type=='amount'? '€': ''}}{{$product->discount}} {{$product->discount_type=='percent'? '%': ''}} OFF</p>
                  @endif
                  @endif
                  <br>
                  <div class="mb-3">
                    <!-- <a wire:click="addToCart({{$product->id}})" class="btn btn-primary"> <i class="me-1 fa fa-shopping-basket"></i> Add to cart </a> -->
                    <!-- start cart -->
                    @php($checkProduct = \App\Model\CartProduct::where('user_id', auth()->user()->id)->where('product_id', $product->id)->first())
                    <a wire:click="addToCart({{$product->id}})" class="btn @if($checkProduct) btn-success @else btn-primary @endif">
                      @if($checkProduct)
                      <i class="me-1 fas fa-check-circle"></i> <!-- Use true icon -->
                      @else
                      <i class="me-1 fas fa-shopping-basket"></i> <!-- Use shopping basket icon -->
                      @endif
                      @if($checkProduct) Added to cart @else Add to cart @endif</a>

                    <a class="btn btn-light btn-icon" wire:click="addToWishlist({{$product->id}})">
                      @if($whishlist_product)
                      <i class="fa fa-heart" style="color: red;"></i>
                      @else
                      <i class="fa fa-heart"></i>
                      @endif
                    </a>
                  </div>
                </div> <!-- info-aside.// -->
              </aside> <!-- col.// -->
            </div> <!-- row.// -->
          </article>
          @endforeach
          <hr>

          <footer class="d-flex mt-4">
            <!-- pagenation -->
            <div class="btn-group">
              @for ($i = 1; $i <= $all_pages_count; $i++) <button wire:click="updateCurrentPageNumber('{{ $i }}')" class="btn {{ $current_page_number == $i ? 'btn-primary' : 'btn-outline-primary' }}"> {{$i}} </button>
              @endfor
          </footer>

        </main> <!-- col .// -->
      </div> <!-- row .// -->

    </div> <!-- container .//  -->
  </section>
  <!-- ============== SECTION CONTENT END// ============== -->

  @include('livewire.home.layouts.footer')


</div>