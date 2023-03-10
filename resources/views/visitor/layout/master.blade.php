 <!doctype html>
 <html class="no-js" lang="en">
 <head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>DoctorBari.com</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="favicon.ico" type="image/x-icon"/>
  <!--=== Reset Css ===-->
  <link rel="stylesheet" href=" {{ asset ('visitor/css/normalize.css' )}} ">
  <!--=== Animate ===-->
  <link rel="stylesheet" href=" {{ asset ('visitor/css/plugin/animate.css')}} ">
  <!--=== Hover Animation ===-->
  <link rel="stylesheet" href=" {{ asset ('visitor/css/plugin/hover-min.css')}} ">
  <!--=== Mean Menu ===-->
  <link rel="stylesheet" href=" {{ asset ('visitor/css/plugin/meanmenu.css')}} ">
  <!--=== Bootstrap ===-->
  <link rel="stylesheet" href=" {{ asset ('visitor/css/bootstrap.min.css')}} ">
  <!--=== Fontawesome icon ===-->
  <link rel="stylesheet" href=" {{ asset ('visitor/css/font-awesome.min.css')}} ">
  <!--=== Fontawesome icon ===-->
  <link rel="stylesheet" href=" {{ asset ('visitor/css/flaticon.css')}} ">
  <!--=== nivo slider ===-->
  <link rel="stylesheet" href=" {{ asset ('visitor/css/plugin/nivo-slider.css')}} ">
  <link rel="stylesheet" href=" {{ asset ('visitor/css/plugin/preview.css')}} " media="screen">
  <!-- ====carousel======= -->
  <!-- <link rel="stylesheet" href="assets/css/carousel/owl.carousel.css">
  <link rel="stylesheet" href="assets/css/carousel/owl.carousel.min.css">
  <link rel="stylesheet" href="assets/css/carousel/owl.theme.default.min.css"> -->
  <!--=== Owl carousel ===-->
  <link href="https://fonts.googleapis.com/css?family=Roboto:100i,300,300i,400,500,500i,700,700i,900,900i" rel="stylesheet">

  <link rel="stylesheet" href="{{ asset('admin/lib/select2/dist/css/select2.min.css')}}">

  <link rel="stylesheet" href=" {{ asset('visitor/css/icofont.css')}} ">

  <link rel="stylesheet" href=" {{ asset('visitor/css/plugin/owl.carousel.min.css')}} ">
  <!--=== Magnific PopUp ===-->
  <link rel="stylesheet" href=" {{ asset('visitor/css/plugin/magnific-popup.css')}} ">
  <!--=== Main Css ===-->
  <link rel="stylesheet" href=" {{ asset('visitor/css/style.css')}} ">
  <!--=== sass Css ===-->
<!--   <link rel="stylesheet" href=" {{ asset('visitor/scss/main.css')}} "> -->
  <!--=== Responsive Css ===-->
  <link rel="stylesheet" href=" {{ asset('visitor/css/responsive.css')}} ">
  <script src=" {{ asset('visitor/js/vendor/modernizr-2.8.3.min.js')}} "></script>

  @stack('styles')
</head>
<body  onload ="getLocation()" >
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
            <![endif]-->
            <!--===============================================================================-->

            <!--====== Header Start ======-->
            <header>
             <div class="header-top-area clear-fix pt-20 pb-20">
               <div class="container">
                 <div class="row">
                   <div class="col-md-3">
                     <div class="social-icon-area">
                      <div class="social-links">
                        <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                        <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                        <a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
                        <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                        <a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a>

                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                   <div class="top-midle">
                     <li><span>Call Now</span><a href="#">01934838499</a></li>
                     <li><span>E-mail</span><a href="#">doctorbari@gmail.com</a></li>
                   </div>
                 </div>
                 <div class="col-md-3">
                   @if (Auth::guest())
                     <div class="dropdown">
                        <a href="#" class="dropdown-toggle btn btn-info" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true">Login/Register <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                          <li><a href="{{ url('donor/login') }}">Donor Login/Register</a></li>
                          <li><a href="{{ url('dashboard/login') }}">Admin Login</a></li>
                        </ul>
                      </div>
                      @endif
                 </div>
               </div>
             </div>
           </div>
           <div class="header-area pt-10 pb-10">
             <div class="container clear-fix">
               <div class="row">
                 <div class="col-md-2">
                   <div class="logo-area">
                    <h1>DoctorBari</h1>
                  </div>
                </div>
                <div class="col-md-9">
                 <div class="header-right">
                   <nav>
                    <ul>
                      <li><a href="{{ url('/') }}">Home</a></li>
                      <li><a href="{{ route('find-amb') }}">Find Ambulence</a>
                  <!--<li><a href="{{ route('find-amb') }}">Find Ambulence</a>-->
                    </li>
                    <li><a href="#">Blood</a>
                     <ul class="submenu">
                        <li  class="smooth-menu"><a href="{{ route('find-donor') }}">Find Donor</a></li>
                        <li  class="smooth-menu"><a href="{{ url('donor/register') }}">Be a Donor</a></li>                      
                      </ul>
                    </li>
                     <li><a href="{{ route('find-hospital')  }}">Hospitals</a></li>
                     <li>
                      <a href="{{ route('doc_show') }}">Doctors</a>
                    </li>
                    
                    <li><a href="{{ route('show_education') }}">Education</a></li>
                    <li><a href="{{ route('about') }}">About us</a></li>
                    
                  </ul>
                </nav>
              </div>
            </div>
            <div class="col-md-1">
             <div class="header-m-right">                  
           </div>
         </div>
       </div>
     </div>
   </div>
 </header>
 <!-- Doctor Search area start -->
 <!-- slider area-->

        @yield('content')

      <div class="footer-area">
  <div class="container">
   <div class="row">
     <div class="col-md-4">
       <div class="footer-left">
         <h2>DOCTORBARI</h2>
         <p>একটি হেলথ মেম্বারশীপ প্যাকেজ, যার মাধ্যমে আপনি বিশেষজ্ঞ ডাক্তারের অ্যাপয়েন্টমেন্ট, ঘরে বসে প্যাথলজিকাল টেস্টের স্যাম্পল কালেকশন ও রিপোর্ট ডেলিভারি, মেডিসিন অর্ডার করা, হাসপাতালে ভর্তি থাকাকালীন খরচের উপর সর্বোচ্চ ২০,০০০ টাকা পর্যন্ত এবং টেস্ট ও ডাক্তারি ফি এর উপর সর্বোচ্চ ৫,০০০ টাকা পর্যন্ত ক্যাশ-ব্যাক উপভোগ করতে পারবেন। এর ৪ টি প্যাকেজ রয়েছে: ই-স্বাস্থ্য বেসিক, ই-স্বাস্থ্য প্লাস, ই-স্বাস্থ্য প্রিমিয়াম ও ই-স্বাস্থ্য প্লাটিনাম।</p>
         <label for=""><input type="text" placeholder="Enter Your Email Address"></label>
         <a href="#">Subscribe us</a>
       </div>    
     </div>
          <div class="col-md-4">
       <div class="footer-midle d-flex">
         <h2>Usefull Links</h2>
        <div class="footer-midle-left">
           <li><a href="#">e-Sastho Premium</a></li>
           <li><a href="#">e-Sastho Plus</a></li>
           <li><a href="#">sinior care</a></li>
           <li><a href="#">Personal Care</a></li>
           <li><a href="#">Family care</a></li>
          
        </div>
        <div class="footer-midle-left">
             
            
        </div>
         
       </div>    
     </div>
          <div class="col-md-4">
       <div class="footer-right">
         <h2>Contact Us</h2>
         <h2>3rd floor, Daffodil Business Incubator,
102, Shukrabad Mirpur Road, Dhanmondi Dhaka-1207.</h2>
         <h3>Available 9:00 - 7:00 all days</h3>

          <hr>
           <h2>For business dealing</h2>
         <h2>01934838499</h2>
        
       </div>    
     </div>
   </div>
    
  </div>
</div>
<!--==================================================================-->
<script type="text/javascript" src=" {{ asset('visitor/js/jquery-3.2.0.min.js')}} "></script>
<script>window.jQuery || document.write('<script src=" {{ asset('visitor/js/vendor/jquery-1.12.0.min.js')}} "><\/script>')</script>
<!--=== All Plugin ===-->
<script type="text/javascript" src=" {{ asset('visitor/js/bootstrap.min.js')}} "></script>
<script type="text/javascript" src=" {{ asset('visitor/js/plugin/wow.min.js')}} "></script>
<!-- <script type="text/javascript" src=" {{ asset('visitor/js/plugin/jquery.sticky.js')}} "></script> -->
<script type="text/javascript" src=" {{ asset('visitor/js/plugin/jquery.scrolly.js')}} "></script>
<script type="text/javascript" src=" {{ asset('visitor/js/plugin/nivo-slider.js')}} "></script>
<script type="text/javascript" src=" {{ asset('visitor/js/plugin/jquery.meanmenu.min.js')}} "></script>
<!-- counter-area  start-->
<script type="text/javascript" src=" {{ asset('visitor/js/plugin/jquery.counterup.min.js')}} "></script>
<!-- <script src="http://cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js')}} "></script> -->
<!-- counter-area end -->
<!-- nivo-slider -->
<script type="text/javascript" src=" {{ asset('visitor/js/plugin/home.js')}} "></script>
<!-- <script type="text/javascript" src="assets/js/carousel/owl.carousel.min.js"></script> -->
<script type="text/javascript" src=" {{ asset('visitor/js/plugin/owl.carousel.min.js')}} "></script>
<script type="text/javascript" src=" {{ asset('visitor/js/plugin/jquery.magnific-popup.min.js')}} "></script>

<script src="{{ asset('admin/lib/select2/dist/js/select2.full.min.js') }}"></script>

<!--=== All Active ===-->
<script type="text/javascript" src=" {{ asset('visitor/js/main.js')}} "></script>

@stack('script')

<!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
<script>
 //  $(document).ready(function(){
 //   $('#menu').slicknav();
 //   $(".header_area").sticky({topSpacing:0});

 // });
</script>

<script>
var x = document.getElementById("demo");

function getLocation() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition);
  } else { 
    x.innerHTML = "Geolocation is not supported by this browser.";
  }
}

</script>

</body>
</html>