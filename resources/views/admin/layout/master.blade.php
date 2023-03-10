<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  <title>DoctorBari</title>

  <!-- Favicons -->
  <link href=" {{ asset ('admin/img/favicon.png')}} "  rel="icon">
  <link href=" {{ asset ('admin/img/apple-touch-icon.png')}} "  rel="apple-touch-icon">


  <!-- Bootstrap core CSS -->
  <link href= " {{ asset('admin/lib/bootstrap/css/bootstrap.min.css')}} "  rel="stylesheet">
  <!--external css-->
  <link href=" {{ asset('admin/lib/font-awesome/css/font-awesome.css')}} "  rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href=" {{ asset('admin/css/zabuto_calendar.css')}} " >
  <link rel="stylesheet" type="text/css" href=" {{asset('admin/lib/gritter/css/jquery.gritter.css')}} "/>

  <link rel="stylesheet" href="{{ asset('admin/lib/select2/dist/css/select2.min.css')}}">
<!-- datatabls css -->

  <link href="{{ asset('admin/lib/datatables.net-bs/css/dataTables.bootstrap.min.css') }}" rel="stylesheet" />
  <!-- <link href="{{ asset('admin/lib/advanced-datatable/css/demo_table.css') }}" rel="stylesheet" /> -->

  <link rel="stylesheet" type="text/css" href=" {{asset('admin/css/toastr.min.css')}} "/>
  <!-- Custom styles for this template -->
  <script src="{{asset('admin/lib/chart-master/Chart.js')}} "></script>

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
  <section id="container">
    <!-- **********************************************************************************************************************************************************
        TOP BAR CONTENT & NOTIFICATIONS
        *********************************************************************************************************************************************************** -->
    <!--header start-->
    <header class="header black-bg">
      <div class="sidebar-toggle-box">
        <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
      </div>
      <!--logo start-->
      <a href="{{ route('admin.dashboard') }}" class="logo"><b>Doctor<span>Bari</span></b></a>
      <!--logo end-->

       

      <div class="nav notify-row" id="top_menu">
        <!--  notification start -->
        <ul class="nav top-menu">
          <!-- settings start -->
         
          <!-- settings end -->
          <!-- inbox dropdown start-->
          
          <!-- inbox dropdown end -->
          <!-- notification dropdown start-->
         
        <!--  notification end -->
      </div>
      <div class="top-menu">
        <ul class="nav pull-right top-menu">
          <li>
              <a class="logout" href="{{ route('admin.profile') }}">
               Profile  
              </a>
          </li>
          <li>
              <a class="logout" href="{{ url('/dashboard/logout') }}"
                  onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();">
                  Logout
              </a>

              <form id="logout-form" action="{{ url('/dashboard/logout') }}" method="POST" style="display: none;">
                  {{ csrf_field() }}
              </form>
          </li>
        </ul>
      </div>
    </header>
    <!--header end-->
    <!-- **********************************************************************************************************************************************************
        MAIN SIDEBAR MENU
        *********************************************************************************************************************************************************** -->
    <!--sidebar start-->
    <aside>
      <div id="sidebar" class="nav-collapse " style="">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
          <p class="centered"><a href="#"><img src="{{asset('image/user.png')}}" class="img-circle" width="80"></a></p>
          <h5 class="centered"> {{ Auth::guard('dashboard')->user()->name }}</h5>
          <p class="text-center">{{ strtoupper( Auth::guard('dashboard')->user()->roles[0]['name'] ) }}</p>
          <li>
            <a class="{{ Request::is('dashboard') ? 'active': '' }} " href="{{ url('dashboard') }}">
              <i class="fa fa-dashboard"></i>
              <span>Dashboard</span>
              </a>
          </li>
      
         <!-- change content for login error -->
          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-ambulance"></i>
              <span>Mnage User/Role</span>
              </a>
            <ul class="sub">
              <li><a href="{{route('user.index')}}">Manage Users</a></li>
              <li><a href="{{route('role')}}">Roles</a></li>
             
            </ul>
          </li>
		  
		 <!-- end  -->
        
          
          @if(Auth::guard('dashboard')->check() && Auth::guard('dashboard')->user()->hasRole(['admin']))
          <li class="sub-menu">
            <a class="{{ Request::is('dashboard/ambulance*') ? 'active': '' }} " href="{{ route('ambulance.index') }}">
              <i class="glyphicon glyphicon-adjust"></i>
              <span>Ambulance List</span>
              </a>
          </li>
          @endif

         @if(Auth::guard('dashboard')->check() && Auth::guard('dashboard')->user()->hasRole(['ambulance','hospital']))

          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-ambulance"></i>
              <span>Ambulance</span>
              </a>
            <ul class="sub">
              <li><a href="{{route('ambulance.create')}}">Add Ambulance</a></li>
              <li><a href="{{route('ambulance.index')}}">Ambulance List</a></li>
            </ul>
          </li>
          @endif

        @if(Auth::guard('dashboard')->check() && Auth::guard('dashboard')->user()->hasRole(['admin']))
          <li class="sub-menu">

            <a class="{{ Request::is('dashboard/doctor*') ? 'active': '' }} " 
            href="{{route('doctor.index')}}"><i class="glyphicon glyphicon-user"></i> Doctor List</a>
          </li>         
        @endif

         @if(Auth::guard('dashboard')->check() && Auth::guard('dashboard')->user()->hasRole('doctor'))
          <li class="sub-menu">
            <a class="{{ Request::is('dashboard/doctor/profile*') ? 'active': '' }} " href="{{ route('doc_profile') }}">
              <i class="glyphicon glyphicon-user"></i>
              <span>Doctor Details</span>
              </a>
          </li>
        @endif
        
        @if(Auth::guard('dashboard')->check() && Auth::guard('dashboard')->user()->hasRole('admin'))
          <li class="sub-menu">     
             <a class="{{ Request::is('dashboard/hospital*') ? 'active': '' }} " href="{{route('hospital.index')}}"> <i class="fa fa-h-square"></i> Hospital List</a>
          </li> 
        @endif
        @if(Auth::guard('dashboard')->check() && Auth::guard('dashboard')->user()->hasRole('hospital'))
          <li class="sub-menu">
            <a class="{{ Request::is('dashboard/hospitalp/profile') ? 'active': '' }} " href="{{ route('hospital_profile') }}">
              <i class="glyphicon glyphicon-tint"></i>
              <span>Hospital Profile</span>
              </a>
          </li>
        @endif

          @if(Auth::guard('dashboard')->check() && Auth::guard('dashboard')->user()->hasRole(['admin']))
          <li class="sub-menu">
            <a class="{{ Request::is('dashboard/donor*') ? 'active': '' }}" href="{{ route('donor.index') }}">
              <i class="glyphicon glyphicon-tint"></i>
              <span>Blood Donar</span>
              </a>
            <!-- <ul class="sub">
              <li><a href="grids.html">Donar List</a></li>        
            </ul> -->
          </li>
          @endif

          @if(Auth::guard('dashboard')->check() && Auth::guard('dashboard')->user()->hasRole(['hospital']))
           <li class="sub-menu">
            <a href="javascript:;" class="{{ Request::is('dashboard/cost*') ? 'dcjq-parent active': '' }} ">
              <i class="fa fa-h-square"></i>
              <span>Seat Cost</span>
              </a>
            <ul class="sub">
              <li><a href="{{route('cost.create')}}">Seat Cost</a></li>
              <li><a href="{{route('cost.index')}}">Cost List</a></li>                                   
            </ul>
          </li>

           <li class="sub-menu">
            <a href="javascript:;" class="{{ Request::is('dashboard/test*') ? 'dcjq-parent active': '' }} ">
              <i class="fa fa-h-square"></i>
              <span>Test</span>
              </a>
            <ul class="sub">
              <li><a href="{{route('test.create')}}">Add Test</a></li>
              <li><a href="{{route('test.index')}}">Test List</a></li>                                   
            </ul>
          </li>       
          
        @endif
        
         @if(Auth::guard('dashboard')->check() && Auth::guard('dashboard')->user()->hasRole(['admin']))
          <li class="sub-menu">
            <a href="javascript:;" class="{{ Request::is('dashboard/education*') ? 'dcjq-parent active': '' }} ">
              <i class="fa fa-youtube-play"></i>
              <span>Education</span>
              </a>
            <ul class="sub">
              <li><a href="{{route('education.create')}}">Add Video</a></li>
              <li><a href="{{route('education.index')}}">Video list</a></li>              
            </ul>
          </li>
        
        @endif

        @if(Auth::guard('dashboard')->check() && Auth::guard('dashboard')->user()->hasRole(['hospital','ambulance']))  
          <li>
            <a class="{{ Request::is('dashboard/ambulance_bookings*') ? 'dcjq-parent active': '' }}" href="{{ route('ambulance_bookings') }}" >
              <i class="fa fa-envelope"></i>
              <span>Bookings</span>
              </a>
          </li>
         @endif          
        </ul>
      </br>
      </br>
      </br>
        <!-- sidebar menu end-->
      </div>
    </aside>
    <!--sidebar end-->
    <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
    <!--main content start-->
    
    <section id="main-content">
      <section class="wrapper">
       @yield('content')
      </section>
    </section>
    <!--main content end-->
    
    <!--footer start-->
<!--     <footer class="site-footer">
      <div class="text-center">
        <p>
          &copy; Copyrights <strong>DoctorBari</strong>. All Rights Reserved
        </p>
        <div class="credits">
          
            You are NOT allowed to delete the credit link to TemplateMag with free version.
            You can delete the credit link only if you bought the pro version.
            Buy the pro version with working PHP/AJAX contact form: https://templatemag.com/dashio-bootstrap-admin-template/
            Licensing information: https://templatemag.com/license/
          
          Created with Dashio template by <a href="https://templatemag.com/">TemplateMag</a>
        </div>
        <a href="index.html#" class="go-top">
          <i class="fa fa-angle-up"></i>
          </a>
      </div>
    </footer> -->
    <!--footer end-->

  </section>
   <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
   @yield('scripts')
  <!-- js placed at the end of the document so the pages load faster -->

  <script src= " {{ asset('admin/lib/jquery/jquery.min.js')}} "></script>

  <script src= " {{ asset('admin/lib/bootstrap/js/bootstrap.min.js')}} "></script>
  <script class="include" type="text/javascript" src= " {{ asset('admin/lib/jquery.dcjqaccordion.2.7.js')}} "></script>

  <script src="{{ asset('admin/lib/jquery.scrollTo.min.js')}} "></script>

  <script src="{{ asset('admin/lib/toastr.min.js')}} "></script>
 

 <script src="{{ asset('admin/lib/jquery.nicescroll.js')}}" type="text/javascript"></script>

  <script src=" {{ asset('admin/lib/jquery.sparkline.js')}} "></script>
  <!--common script for all pages-->
  <script src=" {{ asset('admin/lib/common-scripts.js')}} "></script>

  <script src="{{ asset('admin/lib/select2/dist/js/select2.full.min.js') }}"></script>

   <!-- DataTables -->
  <script src="{{ asset('admin/lib/datatables.net/js/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('admin/lib/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>

  <script type="text/javascript" language="javascript" src="{{ asset('admin/lib/advanced-datatable/js/jquery.dataTables.js') }}"></script>
  <!-- 
  <script type="text/javascript" src=" {{ asset('admin/lib/gritter/js/jquery.gritter.js')}} "></script>
  <script type="text/javascript" src=" {{ asset('admin/lib/gritter-conf.js')}} "></script> -->
  <!--script for this page-->
  <script src=" {{ asset('admin/lib/sparkline-chart.js')}} "></script>
  <script src=" {{ asset('admin/lib/zabuto_calendar.js')}} "></script>



  {!! Toastr::message() !!}

  @stack('script')
  
  <script type="application/javascript">
    $(document).ready(function() {
      $("#date-popover").popover({
        html: true,
        trigger: "manual"
      });
      $("#date-popover").hide();
      $("#date-popover").click(function(e) {
        $(this).hide();
      });

      $("#my-calendar").zabuto_calendar({
        action: function() {
          return myDateFunction(this.id, false);
        },
        action_nav: function() {
          return myNavFunction(this.id);
        },
        ajax: {
          url: "show_data.php?action=1",
          modal: true
        },
        legend: [{
            type: "text",
            label: "Special event",
            badge: "00"
          },
          {
            type: "block",
            label: "Regular event",
          }
        ]
      });
    });

    function myNavFunction(id) {
      $("#date-popover").hide();
      var nav = $("#" + id).data("navigation");
      var to = $("#" + id).data("to");
      console.log('nav ' + nav + ' to: ' + to.month + '/' + to.year);
    }
  </script>

</body>
</html>