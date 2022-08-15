<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>ASST</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Facebook Opengraph integration: https://developers.facebook.com/docs/sharing/opengraph -->
  <meta property="og:title" content="">
  <meta property="og:image" content="">
  <meta property="og:url" content="">
  <meta property="og:site_name" content="">
  <meta property="og:description" content="">

  <!-- Twitter Cards integration: https://dev.twitter.com/cards/  -->
  <meta name="twitter:card" content="summary">
  <meta name="twitter:site" content="">
  <meta name="twitter:title" content="">
  <meta name="twitter:description" content="">
  <meta name="twitter:image" content="">

  <!-- Favicons -->
  <link href="{{asset('app-assets/img/favicon.png')}}" rel="icon">
  <link href="{{asset('app-assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Raleway:400,500,700|Roboto:400,900" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset('app-assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('app-assets/vendor/venobox/venobox.css')}}" rel="stylesheet">
  <link href="{{asset('app-assets/vendor/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{asset('app-assets/css/style.css')}}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Bell - v2.2.1
  * Template URL: https://bootstrapmade.com/bell-free-bootstrap-4-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Hero Section ======= -->
  <section class="hero">
    <div class="container text-center">
      <div class="row">
        <div class="col-md-12">
          <!-- <a class="hero-brand" href="{{ url('/') }}" title="Home"><img alt="AutoSecure Logo" src="{{asset('app-assets/img/logo.jpg')}}"></a> -->
        </div>
      </div>

      <div class="col-md-12">
        <h1>
        AutoSecure
        </h1>

        <p class="tagline">
          A one place solution for your society security needs.
        </p>
        <a class="btn btn-full scrollto" href="{{ url('/forms/society-register') }}">Register Society</a>
        <a class="btn btn-full scrollto" href="{{ route('register') }}">Register Member</a>
        <a class="btn btn-full scrollto" href="{{ route('login') }}">Login Member</a>
        <!-- <a class="btn btn-full scrollto" href="{{ url('/entry-dashboard/entry') }}">Entry dashboard</a> -->
      </div>
    </div>

  </section><!-- End Hero -->

  <!-- ======= Header ======= -->
  <header id="header">
    <div class="container">

      <div id="logo" class="pull-left">
        <a href="{{ url('/') }}"><img src="{{asset('app-assets/img/logo-nav.jpg')}}" alt=""></a>
        <!-- Uncomment below if you prefer to use a text image -->
        <!--<h1><a href="#hero">Bell</a></h1>-->
      </div>

      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li><a href="#about">About Us</a></li>
          <li><a href="#features">Features</a></li>
          <li><a href="#contact">Contact Us</a></li>
        </ul>
      </nav>
      <!-- #nav-menu-container -->

      <nav class="nav social-nav pull-right d-none d-lg-inline">
        <a href="#"><i class="fa fa-twitter"></i></a> <a href="#"><i class="fa fa-facebook"></i></a> <a href="#"><i class="fa fa-linkedin"></i></a> <a href="#"><i class="fa fa-envelope"></i></a>
      </nav>
    </div>
  </header><!-- End Header -->

  <main id="main">

    <!-- ======= About Section ======= -->
    <section class="about" id="about">

      <div class="container text-center">
        <h2>
          About AutoSecure
        </h2>

        <p>
          AutoSecure provides automated security to housing societies using Technology. It is a one stop solution to recording registered regular visitors and their temperatures.
        </p>

        <div class="row stats-row">
          <div class="stats-col text-center col-md-3 col-sm-6">
            <div class="circle">
              <span class="stats-no" >100%</span> Secure
            </div>
          </div>

          <div class="stats-col text-center col-md-3 col-sm-6">
            <div class="circle">
              <span class="stats-no" >100%</span> User Friendly
            </div>
          </div>

          <div class="stats-col text-center col-md-3 col-sm-6">
            <div class="circle">
              <span class="stats-no" >100%</span> Dashboard with insights
            </div>
          </div>

          <div class="stats-col text-center col-md-3 col-sm-6">
            <div class="circle">
              <span class="stats-no">100%</span> Easy installation
            </div>
          </div>
        </div>
      </div>

    </section><!-- End About Section -->

    <!-- ======= Welcome Section ======= -->
    <section class="welcome text-center">
      <h2>Welcome to AutoSecure</h2>
      <div class="container"><img alt="Theme image" style="width: 1000px;height: 350px;object-fit: cover;" class="gadgets-img hidden-md-down" src="{{asset('app-assets/img/gadgets.jpg')}}"></div>
    </section><!-- End Welcome Section -->

    <!-- ======= Features Section ======= -->
    <section class="features" id="features">

      <div class="container">
        <h2 class="text-center">
          Features
        </h2>

        <div class="row">
          <div class="feature-col col-lg-4 col-xs-12">
            <div class="card card-block text-center">
              <div>
                <div class="feature-icon">
                  <span class="fa fa-rocket"></span>
                </div>
              </div>

              <div>
                <h3>
                  Resposive UI
                </h3>

                <p>
                  Easy to use user interface for seemless navigation.
                </p>
              </div>
            </div>
          </div>

          <div class="feature-col col-lg-4 col-xs-12">
            <div class="card card-block text-center">
              <div>
                <div class="feature-icon">
                  <span class="fa fa-envelope"></span>
                </div>
              </div>

              <div>
                <h3>
                  Face recognition
                </h3>

                <p>
                  Accurate face recognition considering changes in visual appearances using continuous feed.
                </p>
              </div>
            </div>
          </div>

          <div class="feature-col col-lg-4 col-xs-12">
            <div class="card card-block text-center">
              <div>
                <div class="feature-icon">
                  <span class="fa fa-bell"></span>
                </div>
              </div>

              <div>
                <h3>
                  Temperature recording
                </h3>

                <p>
                  Contactless temperature recording in real time.
                </p>
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="feature-col col-lg-4 col-xs-12">
            <div class="card card-block text-center">
              <div>
                <div class="feature-icon">
                  <span class="fa fa-database"></span>
                </div>
              </div>

              <div>
                <h3>
                  Efficient log 
                </h3>

                <p>
                  Daily end of the day report.
                </p>
              </div>
            </div>
          </div>

          <div class="feature-col col-lg-4 col-xs-12">
            <div class="card card-block text-center">
              <div>
                <div class="feature-icon">
                  <span class="fa fa-cutlery"></span>
                </div>
              </div>

              <div>
                <h3>
                  Easy installation 
                </h3>

                <p>
                  Easy installation of hardware with society and member registerations.
                </p>
              </div>
            </div>
          </div>

          <div class="feature-col col-lg-4 col-xs-12">
            <div class="card card-block text-center">
              <div>
                <div class="feature-icon">
                  <span class="fa fa-dashboard"></span>
                </div>
              </div>

              <div>
                <h3>
                  Cost effective
                </h3>
                <p>
                  Inexpensive components and servies integrated.
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>

    </section><!-- End Features Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center">
            <h2 class="section-title">Contact Us</h2>
          </div>
        </div>

        <div class="row justify-content-center">
          <div class="col-lg-3 col-md-4">
            <div class="info">
              <div>
                <i class="fa fa-map-marker"></i>
                <p>AutoSecure<br>Mumbai</p>
              </div>

              <div>
                <i class="fa fa-envelope"></i>
                <p>autosecure@gmail.com</p>
              </div>

              <div>
                <i class="fa fa-phone"></i>
                <p>+91 9987680502</p>
              </div>

            </div>
          </div>

          <div class="col-lg-5 col-md-8">
            <div class="form">
              <form action="forms/contact.php" method="post" role="form" class="php-email-form">
                <div class="form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                  <div class="validate"></div>
                </div>
                <div class="form-group">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                  <div class="validate"></div>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                  <div class="validate"></div>
                </div>
                <div class="form-group">
                  <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
                  <div class="validate"></div>
                </div>
                <div class="mb-3">
                  <div class="loading">Loading</div>
                  <div class="error-message"></div>
                  <div class="sent-message">Your message has been sent. Thank you!</div>
                </div>
                <div class="text-center"><button type="submit">Send Message</button></div>
              </form>
            </div>
          </div>

        </div>
      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer class="site-footer">
    <div class="bottom">
      <div class="container">
        <div class="row">

          <div class="col-lg-6 col-xs-12 text-lg-left text-center">
            <p class="copyright-text">
              &copy; Copyright <strong>AutoSecure</strong>. All Rights Reserved
            </p>
            <div class="credits">
              <!--
              All the links in the footer should remain intact.
              You can delete the links only if you purchased the pro version.
              Licensing information: https://bootstrapmade.com/license/
              Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=Bell
            -->
              Designed by AutoSecure
            </div>
          </div>

          <div class="col-lg-6 col-xs-12 text-lg-right text-center">
            <ul class="list-inline">
              <li class="list-inline-item">
                <a href="{{ url('/') }}">Home</a>
              </li>

              <li class="list-inline-item">
                <a href="#about">About Us</a>
              </li>

              <li class="list-inline-item">
                <a href="#features">Features</a>
              </li>

              <li class="list-inline-item">
                <a href="#contact">Contact</a>
              </li>
            </ul>
          </div>

        </div>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a class="scrolltop" href="#"><span class="fa fa-angle-up"></span></a>

  <!-- Vendor JS Files -->
  <script type="text/javascript" src="{{asset('app-assets/vendor/jquery/jquery.min.js')}}" ></script>
  <script type="text/javascript" src="{{asset('app-assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}" ></script>
  <script type="text/javascript" src="{{asset('app-assets/vendor/jquery.easing/jquery.easing.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('app-assets/vendor/php-email-form/validate.js')}}"></script>
  <script type="text/javascript" src="{{asset('app-assets/vendor/counterup/counterup.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('app-assets/vendor/tether/js/tether.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('app-assets/vendor/jquery-sticky/jquery.sticky.js')}}"></script>
  <script type="text/javascript" src="{{asset('app-assets/vendor/venobox/venobox.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('app-assets/vendor/lockfixed/jquery.lockfixed.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('app-assets/vendor/waypoints/jquery.waypoints.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('app-assets/vendor/superfish/superfish.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('app-assets/vendor/hoverIntent/hoverIntent.js')}}"></script>

  <!-- Template Main JS File -->
  <script type="text/javascript" src="{{asset('app-assets/js/main.js')}}"></script>

</body>

</html>