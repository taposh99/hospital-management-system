@extends('visitor.layout.master')


@section('content')
 <!-- end of header area -->
 <!-- search blood area start -->
 <div class="b_search text-center">
     <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/donor/home') }}">
                    Donor Profile
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    &nbsp;
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/donor/login') }}">Login</a></li>
                        <li><a href="{{ url('/donor/register') }}">Register</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="{{ url('/donor/logout') }}"
                                        onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ url('/donor/logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

     <table class="table table-bordered">
       <tr><td style="background: #438ccc;color:#fff;font-family: comic-sans-ms;font-weight: 700;font-size: 28px;" colspan="2">{{ $donor->name }}</td></tr>

       <tr><td>Gender:</td><td> {{ $donor->gender }} </td></tr>

       <tr><td>Date of Birth:</td><td>{{ $donor->dob }}</td></tr>
        <tr><td>Blood Group:</td><td>{{ $donor->bg }}</td></tr>

       <tr><td>District:</td><td>{{ $donor->district }}</td></tr>

       <tr><td>Address:</td><td>{{ $donor->address }}</td></tr>
  
       
       <tr><td>Last Donation Time:</td><td>{{ $donor->ldt }}</td></tr>

       <tr><td>Contact Number:</td><td>{{ $donor->number }}</td></tr>

       <tr><td>Facebook Id:</td><td>{{ $donor->fid }}</td></tr>

       <tr><td>Email:</td><td>{{ $donor->email }}</td></tr>
       <tr><td></td><td> <a class="btn btn-info" href="{{ url('donor/update/'.$donor->id) }}">Edit dornor</a></td></tr>
     </table>

 </div>
 <!-- footer-area -->

@stop