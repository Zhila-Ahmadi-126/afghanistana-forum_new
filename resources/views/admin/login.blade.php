<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Skydash Admin</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{ asset('dashboard/vendors/feather/feather.css') }}">
 <link rel="stylesheet" href="{{ asset('dashboard/vendors/ti-icons/css/themify-icons.css') }}">

<link rel="stylesheet" href="{{ asset('dashboard/vendors/css/vendor.bundle.base.css') }}">

<!-- endinject -->

<!-- Plugin css for this page -->

<link rel="stylesheet" href="{{ asset('dashboard/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">

<link rel="stylesheet" href="{{ asset('dashboard/vendors/ti-icons/css/themify-icons.css') }}">

<link rel="stylesheet" type="text/css" href="{{ asset('dashboard/js/select.dataTables.min.css') }}">

<!-- End plugin css for this page -->

<!-- inject:css -->

<link rel="stylesheet" href="{{ asset('dashboard/css/vertical-layout-light/style.css') }}">

<link rel="stylesheet" href="{{ asset('dashboard/css/vertical-layout-light/dark-mode.css') }}">

<!-- endinject -->

<link rel="shortcut icon" href="{{ asset('dashboard/images/favicon.png') }}" />

<script src="{{ asset('dashboard/js/theme.js') }}"></script>

<link rel="stylesheet" href="{{ asset('dashboard/css/dark-mode.css') }}">
</head>
<style>
   .styleBg{
    background-image: url("{{ asset('dashboard/images/bg/bg_3.PNG') }}");
     /* background-color: rgba(7, 179, 79, 0.71); */
      background-repeat: no-repeat;
     /* background-repeat: repeat-y; */
       /* overflow: hidden; */
       background-size: 100% 750px;
       /* width: 700px;
       height: 750px; */
       /* background-color: rgba(240, 248, 255, 0); */
  }
   .logo{
    width: 150px ;
    height: 150px;
  }
  .mmmm{
     text-align: center;
  }
  
</style>
<body>
  <li class="nav-item d-flex align-items-center mr-3">
      <button id="theme-toggle" class="theme-toggle-btn">
          <span id="theme-icon">🌙</span>
      </button>
  </li>
  <!-- <div class="container"> -->
    
<div class="container justify-content-center w-100  ">

    <div class="row justify-content-center">
      <div class="styleBg col-sm-10 ">
        <div class="row justify-content-center ">
          <div class="col-lg-6 ">
            <div class="auth-form-light justify-content-center  py-5 px-4 px-sm-5 ">
              <div class=" justify-content-center  mmmm">
                <img src="{{ asset('dashboard/images/logo/logo-web-2.png') }}" class="logo" alt="logo">
              </div>
              <h4>Hello! let's get started</h4>
              <h6 class="font-weight-light">login to continue.</h6>
                    <form method="POST" action="{{ route('admin.login.submit') }}" class="pt-3">
                        @csrf

                       @if ($errors->any())
                          <div class="alert alert-danger">
                              <strong>Error:</strong>
                              {{ $errors->first('email') }}
                          </div>
                      @endif

                        <div class="form-group">
                            <input
                                type="email"
                                name="email"
                                class="form-control form-control-lg"
                                placeholder="Email"
                                value="{{ old('email') }}"
                                required
                                autofocus
                            >
                        </div>

                        <div class="form-group">
                            <input
                                type="password"
                                name="password"
                                class="form-control form-control-lg"
                                placeholder="Password"
                                required
                            >
                        </div>

                        <div class="mt-3">
                            <button
                                type="submit"
                                class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">
                                LOGIN
                            </button>
                        </div>

                        <div class="my-2 d-flex justify-content-between align-items-center">

                           <div class="form-check">
                                <label class="form-check-label text-muted">
                                    <input
                                        type="checkbox"
                                        class="form-check-input"
                                        name="remember"
                                        {{ old('remember') ? 'checked' : '' }}
                                    >
                                    Remember me signed in
                                </label>
                            </div>

                           <a href="#" class="text-info">
                                Forgot password?
                            </a>

                        </div>

                    </form>
            </div>
          </div>
        </div>
  <br><br><br><br>


      </div>
    </div>
</div>
  <!-- container-scroller -->
 <script src="{{ asset('dashboard/vendors/js/vendor.bundle.base.js') }}"></script>

<!-- endinject -->

<!-- Plugin js for this page -->

<script src="{{ asset('dashboard/vendors/chart.js/Chart.min.js') }}"></script>

<script src="{{ asset('dashboard/vendors/datatables.net/jquery.dataTables.js') }}"></script>

<script src="{{ asset('dashboard/vendors/datatables.net-bs4/dataTables.bootstrap4.js') }}"></script>

<script src="{{ asset('dashboard/js/dataTables.select.min.js') }}"></script>

<!-- End plugin js for this page -->

<!-- inject:js -->

<script src="{{ asset('dashboard/js/off-canvas.js') }}"></script>

<script src="{{ asset('dashboard/js/hoverable-collapse.js') }}"></script>

<script src="{{ asset('dashboard/js/template.js') }}"></script>

<script src="{{ asset('dashboard/js/settings.js') }}"></script>

<script src="{{ asset('dashboard/js/todolist.js') }}"></script>

<!-- endinject -->

<!-- Custom js for this page -->

<script src="{{ asset('dashboard/js/dashboard.js') }}"></script>

<script src="{{ asset('dashboard/js/Chart.roundedBarCharts.js') }}"></script>
 
  <!-- End custom js for this page-->
</body>

</html>

