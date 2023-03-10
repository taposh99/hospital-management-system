<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  <title>DoctorBari Dashboard | Login</title>

  <!-- Favicons -->
  <link href=" {{ asset ('admin/img/favicon.png')}} "  rel="icon">
  <link href=" {{ asset ('admin/img/apple-touch-icon.png')}} "  rel="apple-touch-icon">


  <!-- Bootstrap core CSS -->
  <link href= " {{ asset('admin/lib/bootstrap/css/bootstrap.min.css')}} "  rel="stylesheet">
  <!--external css-->
  <link href=" {{ asset('admin/lib/font-awesome/css/font-awesome.css')}} "  rel="stylesheet" />
  <!-- Custom styles for this template -->

  <link href="{{asset('admin/css/style.css')}} " rel="stylesheet">
  <link href="{{asset('admin/css/style-responsive.css')}} " rel="stylesheet">

  <!-- =======================================================
    Template Name: Dashio
    Template URL: https://templatemag.com/dashio-bootstrap-admin-template/
    Author: TemplateMag.com
    License: https://templatemag.com/license/
  ======================================================= -->
</head>

<body>
  <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
  <div id="login-page">
    <div class="container">

      <form class="form-login"" role="form" method="POST" action="{{ url('/dashboard/login') }}">
           {{ csrf_field() }}
      <h2 class="form-login-heading">Doctor Bari Admin</h2>
        <div class="login-wrap">
        
           <h5 class="text-center" style="color:red">
         @if ($errors->any())
                    <strong>{{ $errors->first() }}</strong>
         @endif</h5>
         

           <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} has-feedback">
            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}"  placeholder="Enter E-mail" autofocus>
            
          </div>

           <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} has-feedback">
                <input id="password" type="password" class="form-control" name="password" placeholder="Enter Password" >
           </div>
           <!--  <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="remember"> Remember Me
                        </label>
                    </div>
                </div>
            </div> -->
             <button class="btn btn-theme btn-block" href="index.html" type="submit"><i class="fa fa-lock"></i> SIGN IN</button>
        </form>
    </div>
  </div>
  <!-- js placed at the end of the document so the pages load faster -->
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  <!--BACKSTRETCH-->
  <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
  <script type="text/javascript" src="lib/jquery.backstretch.min.js"></script>
  <script>
    $.backstretch("img/login-bg.jpg", {
      speed: 500
    });
  </script>
</body>

</html>