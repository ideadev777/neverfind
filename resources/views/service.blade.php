
@extends('layout/app')
<!--
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
-->

<link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />

<link href="{{URL::asset('custom/gijgo.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{URL::asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

<script src="{{URL::asset('js/jquery-3.3.1.slim.min.js')}}" ></script>
<script src="{{URL::asset('js/jquery.mask.min.js')}}" ></script>
<script src="{{URL::asset('js/jquery.validate.min.js')}}" ></script>
<script src="{{URL::asset('js/additional-methods.min.js')}}" ></script>
<script src="{{URL::asset('js/popper.min.js')}}" ></script>
<script src="{{URL::asset('js/bootstrap.min.js')}}" ></script>
<script src="{{URL::asset('custom/calendar.js')}}" type="text/javascript"></script>


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


        <div class="tab-content">
        <?php 
        $cnt = count($services) ;
        for( $i = 0; $i < $cnt; $i += 9 )
        {
        ?>
        <div id="a{{$i}}" class="container tab-pane {{$i?'fade':'active'}}">
        <div class="row">
        <?php for( $j = 0; $j < 9 && $i+$j < $cnt; $j++ )
          {
            $service = $services[$j+$i] ; 
        ?>
          <div class="col-md-4">
            <div class="card-box-b card-shadow news-box">
              <div class="img-box-b">
                <img src="{{URL::asset('images')}}/{{$service->image_path}}" alt="" class="img-b img-fluid " width="100%">
              </div>
            </div>
             <h3>{{$service->name}}</h3>
              <div class="curtail-text">
                {{$service->summary}}
              </div>
           
              <div class="footer">
                <a href="/service/{{$service->id}}" ><button class="btn btn-success"> Read more
                  <span class="ion-ios-arrow-forward"></span>
                </button></a>
                <button href="#" class=" float-right my_link btn btn-primary" data-val="{{$service->id}}" data-name="{{$service->name}}" data-toggle="modal" data-target="#order-modal" style="align:right">Order</button>
<!--                <a href="/order/{{$service->id}}" style="align:right">Order</a> -->
                <br><br>
              </div>
           </div>

        <?php
          } ?>
        </div>
      </div>
        <?php
      }
        ?>
      </div>


      @if($cnt>9)
        <div class="row">
          <div class="col-sm-12">
            <nav class="pagination-a">
              <ul class="nav nav-tabs justify-content-end">
                <?php
                  for( $i = 0; $i < $cnt; $i+=9 )
                  {
                ?>
                <li class="nav-item ">
                  <a  class="nav-link {{$i?' ':'active'}}"  data-toggle="tab" href="#a{{$i}}">{{1+$i/9}}</a>
                </li>
                <?php                        
                  }
                ?> 
              </ul>
            </nav>
          </div>
        </div>
      @endif

      </div>
    </section><!-- End Blog Grid-->

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

<script>
  /*$('#endtimepicker').timepicker();
  $('#starttimepicker').timepicker();*/
</script>
<script>
        /*var today = new Date(new Date().getFullYear(), new Date().getMonth(), new Date().getDate());
        $('#startDate').datepicker({
            uiLibrary: 'bootstrap4',
            iconsLibrary: 'fontawesome',
            minDate: today,
            maxDate: function () {
                return $('#endDate').val();
            }
        });
        $('#endDate').datepicker({
            uiLibrary: 'bootstrap4',
            iconsLibrary: 'fontawesome',
            minDate: function () {
                return $('#startDate').val();
            }
        });*/
</script>