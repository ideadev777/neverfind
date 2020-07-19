<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Tom Cleaner | @yield('title')</title>
  <meta content="" name="descriptison">
  <meta content="" name="keywords">

  <!-- Favicons -->

  <link href="{{URL::asset('images/favicon.png')}}" rel="icon">
  <link href="{{URL::asset('images/apple-touch-icon.png')}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
<!--  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet"> -->
  <link href="{{URL::asset('custom.css')}}" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{URL::asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{URL::asset('assets/vendor/ionicons/css/ionicons.min.css')}}" rel="stylesheet">
  <link href="{{URL::asset('assets/vendor/animate.css/animate.min.css')}}" rel="stylesheet">
  <link href="{{URL::asset('assets/vendor/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
  <link href="{{URL::asset('assets/vendor/owl.carousel/assets/owl.carousel.min.css')}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{URL::asset('assets/css/style.css')}}" rel="stylesheet">
  <link href="{{URL::asset('custom/tomstyle.css')}}" rel="stylesheet">

  <!-- =======================================================
   -->


</head>

<body>

  <!-- ======= Header/Navbar ======= -->
  <nav class="navbar navbar-default navbar-trans navbar-expand-lg fixed-top">
    <div class="container">
      <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarDefault" aria-controls="navbarDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span></span>
        <span></span>
        <span></span>
      </button>
        <a class="navbar-brand" href="/"><img src="{{URL::asset('images/logo.png')}}" alt="image" style="width: 100px; height: 50px;"></a>
      <a class="navbar-brand text-brand" href="/">Cleaning &nbsp;<span class="color-b">Service</span></a>
      <div class="navbar-collapse collapse justify-content-center" id="navbarDefault">

      <ul class="navbar-nav mr-auto">
      </ul>        
      <ul class="navbar-nav">
          <li class="nav-item">
<!--            <a class="nav-link active" href="/">Home</a> -->
            <a class="nav-link" href="/">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/service">Service</a>
          </li>
        </ul>
      </div>
    </div>
  </nav><!-- End Header/Navbar -->

  <!-- ======= Intro Section ======= -->
  @if(isset($bgImg))
  <div class="intro intro-carousel">
    <div id="carousel" class="owl-carousel owl-theme">
      @foreach($bgImg as $post)
      <div class="carousel-item-a intro-item bg-image" style="background-image: url({{URL::asset('images')}}/{{$post[0]}}.jpg)">
        <div class="overlay overlay-a"></div>
        <div class="intro-content display-table">
          <div class="table-cell">
            <div class="container">
              <div class="row">
                <div class="col-lg-8">
                  <div class="intro-body">
                    <h1 class="intro-title mb-4">{{$post[1]}}</h1>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
     
  @endforeach
    </div>
  </div><!-- End Intro Section -->
  @endif

  <main id="main">

      @yield ('content')

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <nav class="nav-footer">
            <ul class="list-inline">
              <li class="list-inline-item">
                <a href="/">Home</a>
              </li>
              <li class="list-inline-item">
                <a href="/service">Services</a>
              </li>
            </ul>
          </nav>
          <div class="socials-a">
            <ul class="list-inline">
              <li class="list-inline-item">
                <a href="#">
                  <i class="fa fa-facebook" aria-hidden="true"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="fa fa-twitter" aria-hidden="true"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="fa fa-instagram" aria-hidden="true"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="fa fa-pinterest-p" aria-hidden="true"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="fa fa-dribbble" aria-hidden="true"></i>
                </a>
              </li>
            </ul>
          </div>
          <div class="copyright-footer">
            <p class="copyright color-text-a">
              &copy; Copyright
              <span class="color-a">Cleaning Service</span> All Rights Reserved.
            </p>
          </div>
          <div class="credits">
<!-- Bootstrap CSS -->
          </div>
        </div>
      </div>
    </div>
  </footer><!-- End  Footer -->


<div class="modal fade" id="successOrderModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Success</h4>
          <button type="button" class="close" data-dismiss="modal">×</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          Your order has been successfully sent.
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>

@if( session('success') )
<script>
$(function() {
    $('#successOrderModal').modal('show');
});
</script>
@endif


  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="{{URL::asset('assets/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{URL::asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{URL::asset('assets/vendor/jquery.easing/jquery.easing.min.js')}}"></script>
  <script src="{{URL::asset('assets/vendor/php-email-form/validate.js')}}"></script>
  <script src="{{URL::asset('assets/vendor/owl.carousel/owl.carousel.min.js')}}"></script>
  <script src="{{URL::asset('assets/vendor/scrollreveal/scrollreveal.min.js')}}"></script>



  <!-- Template Main JS File -->
  <script src="{{URL::asset('assets/js/main.js')}}"></script>

</body>

</html>