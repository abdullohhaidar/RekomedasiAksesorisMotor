<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <title>DigiMedia - Creative SEO HTML5 Template</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">


    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('css/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('css/UserPage/defaultFix.css') }}">
    <link rel="stylesheet" href="{{ asset('css/animated.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.css') }}">
<!--

TemplateMo 568 DigiMedia

https://templatemo.com/tm-568-digimedia

-->
  </head>

<body>

  <!-- ***** Preloader Start ***** -->
  <div id="js-preloader" class="js-preloader">
    <div class="preloader-inner">
      <span class="dot"></span>
      <div class="dots">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
  </div>
  <!-- ***** Preloader End ***** -->

  <!-- Pre-header Starts -->
  <div class="pre-header">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-sm-8 col-7">
          <ul class="info">
            @if(session()->has('email') && session()->has('no_hp'))
              <li><a href="#"><i class="fa fa-envelope"></i> {{ session('email') }}</a></li>
              <li><a href="#"><i class="fa fa-phone"></i> {{ session('no_hp') }}</a></li>
            @else
              <li><a href="{{ route('loginUser') }}"><i class="fa fa-user"></i> Silakan login</a></li>
            @endif
          </ul>
        </div>
        <div class="col-lg-4 col-sm-4 col-5">
          <ul class="social-media">
            <li><a href="{{ route('logoutUser') }}"><i class="bi bi-box-arrow-right"></i></a></li>
            <li><p>Logout</p></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <!-- Pre-header End -->

  <!-- ***** Header Area Start ***** -->
  <header class="header-area header-sticky wow slideInDown" data-wow-duration="0.75s" data-wow-delay="0s">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <nav class="main-nav">
            <!-- ***** Logo Start ***** -->
            <a href="{{ route('home') }}" class="logo">
              <img src="{{ asset('images/logo_king.jpg') }}" alt="">
            </a>
            <!-- ***** Logo End ***** -->
            <!-- ***** Menu Start ***** -->
            <ul class="nav">
                <li class="scroll-to-section">
                    <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">Home</a>
                </li>
                <li class="scroll-to-section">
                    <a href="{{ route('etalaseVelg') }}" class="{{ request()->routeIs('etalaseVelg') ? 'active' : '' }}">Velg</a>
                </li>
                <li class="scroll-to-section">
                    <a href="{{ route('etalaseBan') }}" class="{{ request()->routeIs('etalaseBan') ? 'active' : '' }}">Tire</a>
                </li>
                <li class="scroll-to-section">
                    <a href="{{ route('etalaseSuspensi') }}" class="{{ request()->routeIs('etalaseSuspensi') ? 'active' : '' }}">Suspension</a>
                </li>

                <li class="scroll-to-section">
                    <a href="{{ route('historyLike') }}" class="{{ request()->routeIs('historyLike') ? 'active' : '' }}">History Like</a>
                </li>

                <li class="scroll-to-section">
                    <div class="border-first-button">
                        <a href="{{ route('rekomendasi') }}">Rekomendasi</a>
                    </div>
                </li> 
            </ul>        
            <a class='menu-trigger'>
                <span>Menu</span>
            </a>
            <!-- ***** Menu End ***** -->
          </nav>
        </div>
      </div>
    </div>
  </header>
  <!-- ***** Header Area End ***** -->

  

    <main>
        @yield('content')
    </main>

  <footer>
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <p>Copyright © 2022 DigiMedia Co., Ltd. All Rights Reserved. 
          <br>Design: <a href="https://templatemo.com" target="_parent" title="free css templates">TemplateMo</a></p>
        </div>
      </div>
    </div>
  </footer>


  <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('js/owl-carousel.js') }}"></script>
  <script src="{{ asset('js/animation.js') }}"></script>
  <script src="{{ asset('js/imagesloaded.js') }}"></script> 
  <script src="{{ asset('js/custom.js') }}"></script>

</body>
</html>