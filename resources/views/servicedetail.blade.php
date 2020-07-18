@extends('layout/app')

@section('title', 'Service')

@section('content')

<!--
    <section class="intro-single">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-lg-8">
            <div class="title-single-box">
              <h1 class="title-single">Service Detail</h1>
            </div>
          </div>
        </div>
      </div>
    </section><!-- End Intro Single-->
-->
    <section class="section-about">
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <div class="about-img-box">
              <img src="{{URL::asset('images/home_1.jpg')}}" alt="" class="img-fluid">
            </div>
            <div class="sinse-box">
              <h3 class="sinse-title">Cleaning Service
                <span></span>
                <br> Since 2017</h3>
              <p>Art & Creative</p>
            </div>
          </div>
          <div class="col-md-12 section-t8">
            <div class="row">
              <div class="col-md-6 col-lg-6">
                <img src="{{URL::asset('images')}}/{{$detail->image_path}}" alt="" class="img-fluid">
              </div>


              <div class="col-md-6 col-lg-6 section-md-t3">
                <div class="title-box-d">
                  <h1>
                    <span class="color-d">{{$detail->name}}</span>
                  </h1>
                </div>
                <p class="color-text-a">
                  {{$detail->detail}}
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <br>
      <br>
    </section>

@endsection