
@extends('layout/app')

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
  <link href="{{URL::asset('css/image.css')}}" rel="stylesheet">

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



<div class='container'>
  
  <h1>Responsive equal height images with CSS</h1>
  
  <h2 class='muted'>A reminder for myself, with all credit to <a href='https://kartikprabhu.com/articles/equal-height-images-flexbox'>Kartik Prabhu</a></h2>
  
  <p>Wanna put a bunch of images in a row, and make them all the same height? Well, you can. Thanks, flexbox!</p>
  
  <div class='pics_in_a_row'>
    <div class='img1'>
      <img src='http://blimpage.com/pants/codepen/mm1.jpg'>
    </div>
    <div class='img2'>
      <img src='http://blimpage.com/pants/codepen/mm2.jpg'>
    </div>
  </div>
  
  <p>It's <em>slightly</em> trickier than I first hoped, though - you need to:</p>
  
  <ol>
    <li>Put all of your images inside a container div</li>
    <li>Set <code>display: flex;</code> on the container div</li>
    <li>Wrap each image in a div</li>
    <li>Set the <code>flex</code> property of each image's wrapper div to the image's aspect ratio (its width divided by its height)</li>
  </ol>
  
  <p>And boom! You're done!</p>
  
  <div class='pics_in_a_row'>
    <div class='img1'>
      <img src='http://blimpage.com/pants/codepen/mm1.jpg'>
    </div>
    <div class='img2'>
      <img src='http://blimpage.com/pants/codepen/mm2.jpg'>
    </div>
    <div class='img3'>
      <img src='http://blimpage.com/pants/codepen/mm3.jpg'>
    </div>
  </div>

  <p>The only real bummer is having to declare the aspect ratio for each image. Depending on your preference or authoring process, you could do it a few different ways:</p>
  
  <ul>
    <li>Declare the aspect ratio in your stylesheet, with a class name for each wrapper div (as I've done in this demo)</li>
    <li>Declare the aspect ratio inline, as a <code>style</code> attribute on each wrapper div</li>
    <li>Dynamically calculate the aspect ratio for each image using JavaScript</li>
  </ul>

  <p>That last option is tempting; not needing JavaScript is nice, but needing to specify the aspect ratio for each and every image is a pain.</p>
  
  <p>With the CSS methods, you do have a few options for specifying the aspect ratio:</p>
  
  <ul>
    <li>Work out the aspect ratio yourself and hard-code it into the CSS (as I've done in this demo)</li>
    <li>Use CSS's <code>calc()</code> to calculate the aspect ratio (e.g. <code>flex: calc(600/800);</code>)</li>
    <li>Use a preprocessor to calculate the aspect ratio at build time</li>
  </ul>
  
  <div class='pics_in_a_row'>
    <div class='img4'>
      <img src='http://blimpage.com/pants/codepen/mm4.jpg'>
    </div>
    <div class='img5'>
      <img src='http://blimpage.com/pants/codepen/mm5.jpg'>
    </div>
  </div>

  <p>Add as many images as you like - their widths will just shrink until they all fit.</p>
  
  <p>Use with discretion though - if you add too many, they'll all be too small to see. You might want to switch to a different layout at smaller viewport sizes.</p>
  
  <div class='pics_in_a_row'>
    <div class='img1'>
      <a href='https://www.guitarnerd.com.au/2011/07/fender-musicmaster-bass/'><img src='http://blimpage.com/pants/codepen/mm1.jpg'></a>
    </div>
    <div class='img2'>
      <a href='http://www.sheltonsguitars.com/2009/12-9-09/squier-musicmaster-bass-12-9-07.html'><img src='http://blimpage.com/pants/codepen/mm2.jpg'></a>
    </div>
    <div class='img3'>
      <a href='http://www.seymourduncan.com/forum/showthread.php?73445-Hot-Rails-as-a-single-for-Fender-Musicmaster-bass-guitar'><img src='http://blimpage.com/pants/codepen/mm3.jpg'></a>
    </div>
    <div class='img4'>
      <a href='http://imageevent.com/firstflight/fendermusicmasterbass'><img src='http://blimpage.com/pants/codepen/mm4.jpg'></a>
    </div>
    <div class='img5'>
      <a href='https://www.muffwiggler.com/forum/viewtopic.php?p=1810400'><img src='http://blimpage.com/pants/codepen/mm5.jpg'></a>
    </div>
  </div>
  
  <p>Remember to vendor prefix those flexbox properties!</p>
  
  <p class='muted'>Click any of the images in that last row for their sources. Thanks, bass enthusiasts of the internet!</p>
  
</div>





      <div class="container">

        <div class="tab-content">
        <?php 
        $cnt = count($services) ;
        for( $i = 0; $i < $cnt; $i += 9 )
        {
        ?>
        <div id="a{{$i}}" class="container tab-pane {{$i?'fade':'active'}}">
        <div class="row ">
        <?php for( $j = 0; $j < 9 && $i+$j < $cnt; $j++ )
          {
            $service = $services[$j+$i] ; 
        ?>
          <div class="col-md-4">
            <div class="card-box-b card-shadow news-box">
              <div class="img-box-b">
                <img src="{{URL::asset('images')}}/{{$service->image_path}}" alt="" class="img-b img-fluid" >
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
                <a href="#" class="my_link" data-val="{{$service->id}}" data-name="{{$service->name}}" data-toggle="modal" data-target="#order-modal">Order</a>
<!--                <a href="/order/{{$service->id}}" style="align:right">Order</a> -->
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


        <div class="row">
          <div class="col-sm-12">
            <nav class="pagination-a">
              <ul class="nav nav-tabs justify-content-end">
                <?php
                  for( $i = 0; $i < $cnt; $i+=9 )
                  {
                ?>
                <li class="nav-item {{$i?' ':'active'}}">
                  <a class="nav-link" data-toggle="tab" href="#a{{$i}}">{{1+$i/9}}</a>
                </li>
                <?php                        
                  }
                ?> 
              </ul>
            </nav>
          </div>
        </div>
      </div>
    </section><!-- End Blog Grid-->

@endsection

<link rel="stylesheet" href="{{URL::asset('css/bootstrap.min.css')}}" >
<div class="modal fade" id="order-modal" tabindex="-1" role="dialog" aria-labelledby="my-modal" aria-hidden="true">
  <div class="modal-dialog" role="document">
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
          <h4 class="mb-3">Billing address</h4>
          <form action = "order" method = "POST" class="needs-validation" novalidate>
            @csrf
            <input type="text" class="service-id" name="service-type" class="mb-3" hidden>
            <div class="row">
              <div class="col-md-12 mb-3">
                <label for="firstName">Name</label>
                <input type="text" class="form-control" name="name" placeholder="" required>
                <div class="invalid-feedback">
                  Valid name is required.
                </div>
              </div>
            </div>
            <div class="mb-3">
              <label for="email">Email</label>
              <input type="email" class="form-control" name="email" placeholder="you@example.com" required>
              <div class="invalid-feedback">
                Please enter a valid email address for shipping updates.
              </div>
            </div>
            <div class="mb-3">
                <label for="cc-number">Mobile number</label>
                <input type="text" class="form-control" name="mobile-number" placeholder="" required>
                <div class="invalid-feedback">
                  Mobile Number is required
                </div>
              </div>
            <div class="mb-3">
              <label for="address">Address</label>
              <input type="text" class="form-control" name="address" placeholder="1234 Main St" required>
              <div class="invalid-feedback">
                Please enter your address.
              </div>
            </div>
            <hr class="mb-4">
            <div class="mb-3">
              Here for date range  
            </div>
            <h4 class="mb-3">Payment</h4>
            <div class="mb-3">
              <label for="email">Email</label>
              <input type="email" class="form-control" name="pay-email" placeholder="you@example.com" required>
              <div class="invalid-feedback">
                Please enter a valid email address of paypal account.
              </div>
            </div>
            <hr class="mb-4">
            <button class="btn btn-primary btn-lg btn-block" type="submit">Order</button>
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
<script src="{{URL::asset('js/jquery-3.3.1.slim.min.js')}}" ></script>
<script src="{{URL::asset('js/popper.min.js')}}" ></script>
<script src="{{URL::asset('js/bootstrap.min.js')}}" ></script>

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
  $(this).find(".modal-title").text('Order | '+name);
  $(this).find(".service-id").val(id);
});

</script>
