@extends('layout/app')

@section('title', 'Service')

@section('content')

    <!-- ======= Intro Single ======= -->
    <section class="intro-single">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-lg-8">
            <div class="title-single-box">
              <h1 class="title-single">Our Amazing Services</h1>
              <span class="color-text-a">Grid News</span>
            </div>
          </div>
        </div>
      </div>
    </section><!-- End Intro Single-->


        <section class="news-grid grid">
      <div class="container">
        <div class="row">

        @foreach($services as $service)
          <div class="col-md-4">
            <div class="card-box-b card-shadow news-box">
              <div class="img-box-b">
                <img src="{{URL::asset('images')}}/{{$service->image_path}}" alt="" class="img-b img-fluid" 
                style="height:300px;">
              </div>
            </div>
              <div>
                <h1>{{$service->name}}</h1>
                <p>{{$service->summary}}</p>
              </div>
           
              <div class="footer">
                <a href="/service/{{$service->id}}" class="link-c link-icon">Read more
                  <span class="ion-ios-arrow-forward"></span>
                </a>
                <a href="/order/{{$service->id}}" style="align:right">Order</a>
              </div>
           </div>
        @endforeach

        </div>
        <div class="row">
          <div class="col-sm-12">
            <nav class="pagination-a">
              <ul class="pagination justify-content-end">
                <li class="page-item disabled">
                  <a class="page-link" href="#" tabindex="-1">
                    <span class="ion-ios-arrow-back"></span>
                  </a>
                </li>
                <li class="page-item">
                  <a class="page-link" href="#">1</a>
                </li>
                <li class="page-item active">
                  <a class="page-link" href="#">2</a>
                </li>
                <li class="page-item">
                  <a class="page-link" href="#">3</a>
                </li>
                <li class="page-item next">
                  <a class="page-link" href="#">
                    <span class="ion-ios-arrow-forward"></span>
                  </a>
                </li>
              </ul>
            </nav>
          </div>
        </div>
      </div>
    </section><!-- End Blog Grid-->

@endsection