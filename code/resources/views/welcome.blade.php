@extends('layout/app')

@section('title', 'Home')

@section('content')


    <!-- ======= Latest Properties Section ======= -->
    <section class="section-property section-t8">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="title-wrap d-flex justify-content-between">
              <div class="title-box">
                <h2 class="title-a">How can we help</h2>
              </div>
              <div class="title-link">
                <a href="/service">All Services
                  <span class="ion-ios-arrow-forward"></span>
                </a>
              </div>
            </div>
          </div>
        </div>
        <div id="property-carousel" class="owl-carousel owl-theme">
          
          @foreach($services as $service)
          <div class="carousel-item-b">
            <div class="card-box-a card-shadow">
              <div class="img-box-a">
                <img src="{{URL::asset('images')}}/{{$service->image_path}}" alt="" class="img-a img-fluid">
              </div>
              <div class="card-overlay">
                <div class="card-overlay-a-content">
                  <div class="card-header-a">
                    <h2 class="card-title-a">
                      <a href="/service/{{$service->id}}">{{$service->name}}</a>
                    </h2>
                  </div>
                  <div class="card-body-a">
                   
                    <a href="/order/{{$service->id}}" class="link-a">Click here to order
                      <span class="ion-ios-arrow-forward"></span>
                    </a>
                  </div>
                </div>
              </div>
            </div>
            <p>{{$service->summary}}</p>
          </div>
          @endforeach

        </div>
      </div>
    </section><!-- End Latest Properties Section -->


@endsection

<!--
  class="summary-thumbnail-image loaded" data-parent-ratio="0.7" style="left: -2.84217e-14px; top: -28.3173px; width: 341px; height: 511.635px; position: absolute;" alt="Home" data-image-resolution="500w" 
-->