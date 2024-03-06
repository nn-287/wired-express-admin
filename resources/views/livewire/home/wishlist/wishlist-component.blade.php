<div>
<div>
    
    <div>
    @include('livewire.home.layouts.header')
    
    
    <section class="padding-y bg-light">
    <div class="container">
    
    <!-- =================== COMPONENT CART+SUMMARY ====================== -->
    <div class="row">
        <div class="col-lg-9">
    
            <div class="card">
            <div class="content-body">
                <h4 class="card-title mb-4">Wishlist</h4>
                @foreach($wishlists as $wishlist)
                @php($discount = $wishlist->product->discount)
	            @php($discount_amount = $wishlist->product->discount_type=='amount'? $wishlist->product->discount : ($wishlist->product->price * $wishlist->product->discount) /100)
                <article class="row gy-3 mb-4">
                    <div class="col-lg-5">
                        <figure class="itemside me-lg-5">
                            <div class="aside"><img src="{{ asset('storage/product/' . $wishlist->product->image) }}" class="img-sm img-thumbnail"></div>
                            <figcaption class="info">
                                @if(!empty($wishlist))
                                    <a href="#" class="title">{{$wishlist->product->name}}</a>
                                    @php($variations = is_array($wishlist->product->variations) ? $wishlist->product->variations : json_decode($wishlist->product->variations, true))
                                    @foreach(array_slice($variations, 0, 2) as $item)
                                    <p class="text-muted">{{$item->type}}</p>
                                    @endforeach
                                @endif
                            </figcaption>
                        </figure>
                    </div>
                    
                    <div class="col-lg-2 col-sm-4 col-6">
                        <div class="price-wrap lh-sm"> 
                            <var class="price h6">${{$wishlist->product->price}}</var>  <br>
                            @if($wishlist->product->discount > 0)
                            <small class="text-muted"> ${{$wishlist->product->price - $discount_amount}} </small> 
                            @endif
                        </div> <!-- price-wrap .// -->
                    </div>
                    <div class="col-lg col-sm-4">
                        <div class="float-lg-end">
                            <a wire:click="removeFromWishlist('{{ $wishlist->product->id }}')" class="btn btn-light"> 
					        @if($wishlist->product)
						    <i class="fa fa-heart" style="color: red;"></i> 
						    @else
						    <i class="fa fa-heart"></i>
						    @endif 
					        </a>
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
            </div> -->
    
            </div> <!-- card.// -->
    
        </div> <!-- col.// -->
    
    
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

        @if(!empty($wishlists))
            <!-- for get all products Id for wishlist items  -->
            @php($wishlistProductIds = \App\Model\Wishlist::where('user_id', auth()->user()->id)->pluck('product_id')->toArray())
            
            <!-- for get categories id for every products id  -->
            @foreach($wishlistProductIds as $id)
            @php($categoryIds = \App\CentralLogics\ProductLogic::getProductCategoryIds($id))
            @endforeach
            
            <!-- depend on this categories id give all products have the same my categories id  -->
            @php($recommendProducts = \App\Model\Product::where(function ($query) use ($categoryIds) { 
                foreach ($categoryIds as $categoryId) { 
                $query->orWhereJsonContains('category_ids', ['id' => $categoryId]);}})->get())
                
                    <!-- to give the unique recommend product -->
            @php($wishlistProductIds = \App\Model\Wishlist::where('user_id', auth()->user()->id)->pluck('product_id')->toArray())
                @php($recommendedProducts = $recommendProducts->reject(function ($product) use ($wishlistProductIds) {
            return in_array($product->id, $wishlistProductIds);}))

        @else
            @php($recommendedProducts = \App\Model\Product::all())
        @endif
           
        <div class="row">
            @foreach($recommendedProducts as $recommendProduct)
            @php($discountAmount1 = $recommendProduct->discount_type=='amount'? $recommendProduct->discount : ($recommendProduct->price * $recommendProduct->discount) /100)
                <div class="col-lg-3 col-sm-6 col-12">
                    <figure class="card card-product-grid">
                        <div class="img-wrap">
                            <span class="topbar">
                                <a href="#" class="float-end" wire:click="addToWishlist({{$recommendProduct->id}})">
                                    <i class="fa fa-heart"></i>
                                </a>
                                <span class="badge bg-danger"> Item 1 </span>
                            </span>
                            <a href="#"><img src="{{ asset('storage/product/' . $recommendProduct->image) }}"></a>
                        </div>
                        <figcaption class="info-wrap border-top">
                            <a href="#" class="title">{{$recommendProduct->name}}</a>
                                <div class="price-wrap mb-3">
                                    <strong class="price">${{$recommendProduct->price - $discountAmount1}}</strong>
                                    @if($recommendProduct->discount > 0)
                                        <del class="text-muted">${{$recommendProduct->price}} </del> 
                                    @endif
                                </div> <!-- price-wrap.// -->
                                @php($checkProduct = \App\Model\CartProduct::where('user_id', auth()->user()->id)->where('product_id', $recommendProduct->id)->first())
                                <a href="#" wire:click = "addToCart({{$recommendProduct->id}})">
                                @if($checkProduct)
								<i class="btn btn-success w-100">product Added</i>
								@else
								<i class="btn btn-outline-primary w-100">add to cart</i>
								@endif
                                </a>
                        </figcaption>
                    </figure> <!-- card // -->
                </div> <!-- col.// -->
            @endforeach

        </div> <!-- row.// -->
        
        
        
    </div> <!-- container .//  -->
    </section>
    <!-- ============== SECTION END// ============== -->
    
    </body>
    
    @include('livewire.home.layouts.footer')
    
    </div>
    
    
    </div>
    
</div>
