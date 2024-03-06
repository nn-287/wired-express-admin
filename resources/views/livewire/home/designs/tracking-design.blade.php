<div>

@include('livewire.home.layouts.header')


<section class="padding-y bg-light">
<div class="container">



<div class="row">

  <aside class="col-lg-4">
    <!-- ================ COMPONENT STEPS 2 ================ -->
    <article class="card">
     <div class="card-body">
       <h5 class="card-title">Steps vertical (timeline) </h5>

       <br>

       <ul class="steps-vertical">
        <li class="step"> 
          <b class="icon"></b>
           <h6 class="title mb-0">Order received</h6> 
           <p class="text-muted"> Something happened on this period </p>
        </li>
        <li class="step">
          <b class="icon"></b>
           <h6 class="title  mb-0">Confirmation</h6> 
           <p class="text-muted"> That is confirmed by us </p>
        </li>
        <li class="step">
          <b class="icon"></b>
           <h6 class="title  mb-0">Out for delivery</h6> 
           <p class="text-muted">  Dummy info like we are an good </p>
        </li>
        <li class="step">
          <b class="icon"></b>
           <h6 class="title mb-0">Finalized</h6> 
           <p class="text-muted">  Lorem ipsum is not good info  </p>
        </li>
      </ul>
       
     </div>
   </article>
    <!-- ================ COMPONENT STEPS 2 END .// ================ -->
  </aside> <!-- col.// -->
</div>  <!-- row.// -->

<br><br>

</div> <!-- container .//  -->
</section>


@include('livewire.home.layouts.footer')


</div>