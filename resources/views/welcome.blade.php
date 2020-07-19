@extends('layout/app')
<link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
<link href="{{URL::asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

<script src="{{URL::asset('js/jquery-3.3.1.slim.min.js')}}" ></script>
<script src="{{URL::asset('js/popper.min.js')}}" ></script>
<script src="{{URL::asset('js/bootstrap.min.js')}}" ></script>
<script src="{{URL::asset('custom/calendar.js')}}" type="text/javascript"></script>
<script src="{{URL::asset('js/jquery.mask.min.js')}}" ></script>
<script src="{{URL::asset('js/jquery.validate.min.js')}}" ></script>

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
                <img src="{{URL::asset('images')}}/{{$service->image_path}}" alt="" class="img-a img-fluid"
                width="100%" >
              </div>
              <div class="card-overlay">
                <div class="card-overlay-a-content">
                  <div class="card-header-a">
                    <h2 class="card-title-a">
                      <a href="/service/{{$service->id}}">{{$service->name}}</a>
                    </h2>
                  </div>
                  <div class="card-body-a">


                    <a href="#"  style="color:white" data-val="{{$service->id}}" data-name="{{$service->name}}" data-toggle="modal" data-target="#order-modal" > Click here to order
                      <span class="ion-ios-arrow-forward"></span>
                    </a>
                  </div>
                </div>
              </div>
            </div>
            <br>
            <div class="curtail-text">
             <span>{{$service->summary}}</span>
            </div>
          </div>
          @endforeach

        </div>
      </div>
    </section><!-- End Latest Properties Section -->



    <!-- ======= Intro Single ======= -->
    <section class="intro-single">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-lg-8">
            <div class="title-single-box">
              <h1 class="title-single">Contact US</h1>
              <span class="color-text-a">
                Welcome to our service.
              </span>
            </div>
          </div>
        </div>
      </div>
    </section><!-- End Intro Single-->

    <!-- ======= Contact Single ======= -->
    <section class="contact">
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <div class="contact-map box">
              <div id="map" class="contact-map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3022.1422937950147!2d-73.98731968482413!3d40.75889497932681!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25855c6480299%3A0x55194ec5a1ae072e!2sTimes+Square!5e0!3m2!1ses-419!2sve!4v1510329142834" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
              </div>
            </div>
          </div>
          <div class="col-sm-12 section-t8">
            <div class="row">
              <div class="col-md-7">
                <img src="{{URL::asset('images/order_1.jpg')}}" alt="" class="img-b img-fluid" 
                style="height:300px;">
              </div>
              <div class="col-md-5 section-md-t3">
                <div class="icon-box section-b2">
                  <div class="icon-box-icon">
                    <span class="ion-ios-paper-plane"></span>
                  </div>
                  <div class="icon-box-content table-cell">
                    <div class="icon-box-title">
                      <h4 class="icon-title">Say Hello</h4>
                    </div>
                    <div class="icon-box-content">
                      <p class="mb-1">Email.
                        <span class="color-a">contact@example.com</span>
                      </p>
                      <p class="mb-1">Phone.
                        <span class="color-a">+12 345 678999</span>
                      </p>
                    </div>
                  </div>
                </div>
                <div class="icon-box section-b2">
                  <div class="icon-box-icon">
                    <span class="ion-ios-pin"></span>
                  </div>
                  <div class="icon-box-content table-cell">
                    <div class="icon-box-title">
                      <h4 class="icon-title">Find us in</h4>
                    </div>
                    <div class="icon-box-content">
                      <p class="mb-1">
                        Manhattan, Nueva York 10036,
                        <br> EE. UU.
                      </p>
                    </div>
                  </div>
                </div>
                <div class="icon-box">
                  <div class="icon-box-icon">
                    <span class="ion-ios-redo"></span>
                  </div>
                  <div class="icon-box-content table-cell">
                    <div class="icon-box-title">
                      <h4 class="icon-title">Social networks</h4>
                    </div>
                    <div class="icon-box-content">
                      <div class="socials-footer">
                        <ul class="list-inline">
                          <li class="list-inline-item">
                            <a href="#" class="link-one">
                              <i class="fa fa-facebook" aria-hidden="true"></i>
                            </a>
                          </li>
                          <li class="list-inline-item">
                            <a href="#" class="link-one">
                              <i class="fa fa-twitter" aria-hidden="true"></i>
                            </a>
                          </li>
                          <li class="list-inline-item">
                            <a href="#" class="link-one">
                              <i class="fa fa-instagram" aria-hidden="true"></i>
                            </a>
                          </li>
                          <li class="list-inline-item">
                            <a href="#" class="link-one">
                              <i class="fa fa-pinterest-p" aria-hidden="true"></i>
                            </a>
                          </li>
                          <li class="list-inline-item">
                            <a href="#" class="link-one">
                              <i class="fa fa-dribbble" aria-hidden="true"></i>
                            </a>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section><!-- End Contact Single-->
  <!-- The Modal -->
@endsection

<div class="modal fade" id="order-modal" tabindex="-1" role="dialog" aria-labelledby="my-modal" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">My Modal</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="row">
        <div class="col-md-12 order-md-1">
          <h4 class="mb-3">Your information</h4>
          <form action = "order" id="orderForm" name="orderForm" method = "POST" class="needs-validation" novalidate>
            @csrf
            <input type="text" class="service-id" name="service-type" class="mb-3" hidden>

            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="firstName">Name</label>
                <input type="text" class="form-control" name="name" placeholder="" required maxlength="30">
                <div class="invalid-feedback">
                  Valid name is required.
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" placeholder="you@example.com" required maxlength="30">
                <div class="invalid-feedback">
                  Please enter a valid email address for shipping updates.
                </div>
              </div>
            </div>
          
            <div class="row">
              <div class="col-md-4 mb-3">
                  <label for="cc-number">Mobile number</label>
                  <input type="text" class="form-control phone_us" name="mobilenumber" placeholder="" required maxlength="20">
                  <div class="invalid-feedback">
                    Mobile Number is required
                  </div>
                </div>
              <div class="col-md-8 mb-3">
                <label for="address">Address</label>
                <input type="text" class="form-control" name="address" placeholder="1234 Main St" required maxlength="40">
                <div class="invalid-feedback">
                  Please enter your address.
                </div>
              </div>
            </div>

            <hr class="mb-4">

            <div class="row">
              <div class="col-md-3 mb-3">
                <label>Start Date</label>
                <input id="startDate" type="date" name = "startDay" maxlength="20" class="form-control" required/>
              </div>
              <div class="col-md-3 mb-3">
                <label>End Date</label>
                <input id="endDate" name = "endDay" type="date" class="form-control" required maxlength="20"/>
              </div>
              <div class ="col-md-3 mb-3">
                <label>Start Time</label>
                <input id="starttimepicker" required type="time" name = "startTime" class="form-control" maxlength="10"/>
              </div>
              <div class ="col-md-3 mb-3">
                <label>End Time</label>
                <input id="endtimepicker" name = "endTime"  type="time" class="form-control" required maxlength="10"/>
              </div>
            </div>

            <hr class="mb-4">
            <h4 class="mb-3">Payment Info</h4>
            <div class="mb-3">
              <label for="email">Email</label>
              <input type="email" class="form-control" name="pay-email" placeholder="you@example.com" required maxlength="20">
              <div class="invalid-feedback">
                Please enter a valid email address of paypal account.
              </div>
            </div>
            <hr class="mb-4">
            <button class="btn btn-primary btn-lg btn-block" type="submit" id="formSubmit" name="formSubmit" >Order</button>
            <button style="display: none;" id="formReset" name="formReset" type="reset">Reset</button>
          </form>
        </div>
      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
    
  </div>
</div>
<!-- jQuery, Popper and Bootstrap JS -->

<script>
      (function() {
        'use strict';

        window.addEventListener('load', function() {
          // Fetch all the forms we want to apply custom Bootstrap validation styles to
          var forms = document.getElementsByClassName('needs-validation');

          // Loop over them and prevent submission
          var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
              if (form.checkValidity() === false) {
                event.preventDefault();
                event.stopPropagation();
              }
              form.classList.add('was-validated');
            }, false);
          });
        }, false);
      })();



$('#order-modal').on('show.bs.modal', function (event) {
  var name = $(event.relatedTarget).data('name');
  var id = $(event.relatedTarget).data('val');

  var btn = document.getElementById('formReset');
  btn.click();
  $("#formSubmit").attr('disabled', 'disabled');

  $(this).find(".modal-title").text('Order | '+name);
  $(this).find(".service-id").val(id);
});

var form = document.getElementById('formOrder');
$('.form-control', form).on('change', validate);
$('.form-control', form).on('keyup', validate);
function validate(e) {
  var controls = $('.form-control');
  for (var i = 0; i < controls.length; i ++) {
    if ($(controls[i]).val() == '') 
      return;
  }

  $('#formSubmit').removeAttr('disabled');
}
$('.phone_us').mask('(000) 000-0000');
$("#formOrder").validate({
  rules: {
    /*firstname: "required",
    lastname: "required",
    username: {
      required: true,
      minlength: 2
    },
    password: {
      required: true,
      minlength: 5
    },
    confirm_password: {
      required: true,
      minlength: 5,
      equalTo: "#password"
    },*/
    email: {
      required: true,
      email: true
    },
    mobilenumber: {
      minlength: 10
    },
    //agree: "required"
  },
  messages: {
    /*firstname: "Please enter your firstname",
    lastname: "Please enter your lastname",
    username: {
      required: "Please enter a username",
      minlength: "Your username must consist of at least 2 characters"
    },
    password: {
      required: "Please provide a password",
      minlength: "Your password must be at least 5 characters long"
    },
    confirm_password: {
      required: "Please provide a password",
      minlength: "Your password must be at least 5 characters long",
      equalTo: "Please enter the same password as above"
    },*/
    email: "Please enter a valid email address",
    mobilenumber: "Please enter a valid mobile number"
  }
});
</script>

