@extends('visitor.layout.master')


@section('content')
 <!-- end of header area -->
  <!-- login-area  start-->
  <div class="login-area">
    <div class="container">
      <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
          <div class="login-wrapper">
            <form action="" method="">
              <table>
                 <tr><h2>Login</h2></tr>
                <tr><td>Email</td><td><input type="email" placeholder="Enter Your Email:"></td></tr>
                <tr><td>Password</td><td><input type="password" placeholder="Enter Your Password:"></td></tr>
                <tr><td><a href="#">Register?</a></td><td><input type="submit" value="Login"></td></tr>
              </table>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
 <!-- footer-area -->
@stop