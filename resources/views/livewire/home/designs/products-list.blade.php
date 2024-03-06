<div>

@include('livewire.home.layouts.header')


<!-- ============== SECTION PAGETOP ============== -->
<section class="bg-primary py-5">
<div class="container">
	<h2 class="text-white">Products</h2>
  <ol class="breadcrumb ondark mb-0">
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item"><a href="#">Library</a></li>
    <li class="breadcrumb-item active" aria-current="page">Data</li>
  </ol>
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
    <div class="collapse show" id="collapse_aside1">
      <div class="card-body">
        <ul class="list-menu">
          <li><a href="#">Category 1</a></li>
          <li><a href="#">Category 2 </a></li>
          <li><a href="#">Category 3 </a></li>
          <li><a href="#">Category 4 </a></li>
          <li><a href="#">Category 5 </a></li>
          <li><a href="#">Category 6 </a></li>
        </ul>
      </div> <!-- card-body.// -->
    </div>
  </article> <!-- filter-group // -->


  <article class="filter-group">
    <header class="card-header">
      <a href="#" class="title" data-bs-toggle="collapse" data-bs-target="#collapse_aside4">
        <i class="icon-control fa fa-chevron-down"></i> Ratings
      </a>
    </header>
    <div class="collapse show" id="collapse_aside4">
      <div class="card-body">
        
          <label class="form-check mb-2">
            <input class="form-check-input" type="checkbox" value="" checked="">
            <span class="form-check-label">
              <ul class="rating-stars">
                <li class="stars-active" style="width: 100%;">
                  <img src="images/misc/stars-active.svg" alt="">
                </li>
                <li> <img src="images/misc/starts-disable.svg" alt="">  </li>
              </ul>
            </span>
          </label> <!-- form-check end.// -->
          <label class="form-check mb-2">
            <input class="form-check-input" type="checkbox" value="" checked="">
            <span class="form-check-label">
              <ul class="rating-stars">
                <li class="stars-active" style="width: 80%;">
                  <img src="images/misc/stars-active.svg" alt="">
                </li>
                <li> <img src="images/misc/starts-disable.svg" alt="">  </li>
              </ul>
            </span>
          </label> <!-- form-check end.// -->
          <label class="form-check mb-2">
            <input class="form-check-input" type="checkbox" value="" checked="">
            <span class="form-check-label">
              <ul class="rating-stars">
                <li class="stars-active" style="width: 60%;">
                  <img src="images/misc/stars-active.svg" alt="">
                </li>
                <li> <img src="images/misc/starts-disable.svg" alt="">  </li>
              </ul>
            </span>
          </label> <!-- form-check end.// -->
          <label class="form-check mb-2">
            <input class="form-check-input" type="checkbox" value="" checked="">
            <span class="form-check-label">
              <ul class="rating-stars">
                <li class="stars-active" style="width: 40%;">
                  <img src="images/misc/stars-active.svg" alt="">
                </li>
                <li> <img src="images/misc/starts-disable.svg" alt="">  </li>
              </ul>
            </span>
          </label> <!-- form-check end.// -->
        

      </div> <!-- card-body.// -->
    </div> <!-- collapse.// -->
  </article>  <!-- filter-group // -->

</div> <!-- card.// -->

<!-- ===== Card for sidebar filter .// ===== -->

	</aside> <!-- col .// -->
	<main class="col-lg-9">
		
    <header class="d-sm-flex align-items-center border-bottom mb-4 pb-3">
        <strong class="d-block py-2">32 Items found </strong>
        <div class="ms-auto">
          <select class="form-select d-inline-block w-auto">
              <option value="0">Best match</option>
              <option value="1">Recommended</option>
              <option value="2">High rated</option>
              <option value="3">Randomly</option>
          </select>
          <div class="btn-group">
            <a href="#" class="btn btn-light" data-bs-toggle="tooltip" title="List view"> 
              <i class="fa fa-bars"></i>
            </a>
            <a href="#" class="btn btn-light active" data-bs-toggle="tooltip" title="Grid view"> 
              <i class="fa fa-th"></i>
            </a>
          </div> <!-- btn-group end.// -->
        </div>
    </header>

    <!-- ========= content items ========= -->
    <article class="card card-product-list">
      <div class="row g-0">
        <aside class="col-xl-3 col-md-4">
          <a href="#" class="img-wrap"> <img src="images/items/8.jpg"> </a>
        </aside> <!-- col.// -->
        <div class="col-xl-6 col-md-5 col-sm-7">
          <div class="card-body">
            <a href="#" class="title h5"> Product 1 </a>

            <div class="rating-wrap mb-2">
              <ul class="rating-stars">
                <li class="stars-active" style="width: 90%;">
                  <img src="images/misc/stars-active.svg" alt="">
                </li>
                <li> <img src="images/misc/starts-disable.svg" alt=""> </li>
              </ul>
              <span class="label-rating text-warning">4.5</span>
              <i class="dot"></i>
              <span class="label-rating text-muted">154 orders</span>
            </div> <!-- rating-wrap.// -->
            <p> Short description about the product goes here, for ex its features. Lorem ipsum dolor sit amet  with hapti you enter into any new area of science, you almost lorem ipsum is great text  consectetur adipisicing</p>
          </div> <!-- card-body.// -->
        </div> <!-- col.// -->
        <aside class="col-xl-3 col-md-3 col-sm-5">
          <div class="info-aside">
            <div class="price-wrap">
              <span class="price h5"> $34.50 </span>  
              <del class="price-old"> $198</del>
            </div> <!-- info-price-detail // -->
            <p class="text-success">15% OFF</p>
            <br>
            <div class="mb-3">
              <a href="#" class="btn btn-primary"> Add to cart </a>
              <a href="#" class="btn btn-light btn-icon">  <i class="fa fa-heart"></i>  </a>
            </div>
          </div> <!-- info-aside.// -->
        </aside> <!-- col.// -->
      </div> <!-- row.// -->
    </article>

    <article class="card card-product-list">
      <div class="row g-0">
        <aside class="col-xl-3 col-md-4">
          <a href="#" class="img-wrap"> <img src="images/items/9.jpg"> </a>
        </aside> <!-- col.// -->
        <div class="col-xl-6 col-md-5 col-sm-7">
          <div class="card-body">
            <a href="#" class="title h5"> Product 2  </a>

            <div class="rating-wrap mb-2">
              <ul class="rating-stars">
                <li class="stars-active" style="width: 40%;">
                  <img src="images/misc/stars-active.svg" alt="">
                </li>
                <li> <img src="images/misc/starts-disable.svg" alt=""> </li>
              </ul>
              <span class="label-rating text-warning">3.5</span>
              <i class="dot"></i>
              <span class="label-rating text-muted">74 orders</span>
            </div> <!-- rating-wrap.// -->
            <p> Re-engineered Digital Crown with hapti Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua
            tempor incididunt ut labore et dolore magna [...] </p>
          </div> <!-- card-body.// -->
        </div> <!-- col.// -->
        <aside class="col-xl-3 col-md-3 col-sm-5">
          <div class="info-aside">
            <div class="price-wrap">
              <span class="price h5"> $140.90 </span>  
            </div> <!-- info-price-detail // -->
            <p class="text-warning">5% OFF</p>
            <br>
            <div class="mb-3">
              <a href="#" class="btn btn-primary"> Add to cart </a>
              <a href="#" class="btn btn-light btn-icon">  <i class="fa fa-heart"></i>  </a>
            </div>
          </div> <!-- info-aside.// -->
        </aside> <!-- col.// -->
      </div> <!-- row.// -->
    </article>

    <article class="card card-product-list">
      <div class="row g-0">
        <aside class="col-xl-3 col-md-4">
          <a href="#" class="img-wrap"> <img src="images/items/10.jpg"> </a>
        </aside> <!-- col.// -->
        <div class="col-xl-6 col-md-5 col-sm-7">
          <div class="card-body">
            <a href="#" class="title h5"> Product 3</a>

            <div class="rating-wrap mb-2">
              <ul class="rating-stars">
                <li class="stars-active" style="width: 70%;">
                  <img src="images/misc/stars-active.svg" alt="">
                </li>
                <li> <img src="images/misc/starts-disable.svg" alt=""> </li>
              </ul>
              <span class="label-rating text-warning">3.5</span>
              <i class="dot"></i>
              <span class="label-rating text-muted">910 orders</span>
            </div> <!-- rating-wrap.// -->
            <p> The largest Apple Watch display yet. Electrical heart sensor. Crown with hapti Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua </p>
          </div> <!-- card-body.// -->
        </div> <!-- col.// -->
        <aside class="col-xl-3 col-md-3 col-sm-5">
          <div class="info-aside">
            <div class="price-wrap">
              <span class="price h5"> $99.00 </span>  
            </div> <!-- info-price-detail // -->
            <p class="text-success">10% OFF</p>
            <br>
            <div class="mb-3">
              <a href="#" class="btn btn-primary"> Add to cart </a>
              <a href="#" class="btn btn-light btn-icon">  <i class="fa fa-heart"></i>  </a>
            </div>
          </div> <!-- info-aside.// -->
        </aside> <!-- col.// -->
      </div> <!-- row.// -->
    </article>

    <hr>

    <footer class="d-flex mt-4">
      <div>
        <a href="javascript: history.back()" class="btn btn-light"> &laquo; Go back</a>
      </div>
      <nav class="ms-3">
        <ul class="pagination">
          <li class="page-item"><a class="page-link" href="#">1</a></li>
          <li class="page-item active" aria-current="page">
            <span class="page-link">2</span>
          </li>
          <li class="page-item"><a class="page-link" href="#">3</a></li>
          <li class="page-item">
            <a class="page-link" href="#">Next</a>
          </li>
        </ul>
      </nav>
    </footer>

    <!-- ========= content items .// ========= -->

    

	</main> <!-- col .// -->
</div> <!-- row .// -->

</div> <!-- container .//  -->
</section>
<!-- ============== SECTION CONTENT END// ============== -->

@include('livewire.home.layouts.footer')


</div>