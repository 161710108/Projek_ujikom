<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>PERPUSTAKAAN SMPN 2 DAYEUHKOLOT</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="/assets/admin/vendors/iconfonts/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="/assets/admin/vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="/assets/admin/vendors/css/vendor.bundle.addons.css">

  <link rel="dns-prefetch" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
    <!-- Styles -->
    
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <link href="{{ asset('css/jquery.dataTables.css') }}" rel="stylesheet">
    <!-- <link href="{{ asset('css/dataTables.bootstrap4.min.css') }}" rel="stylesheet"> -->
  <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">  
  <link href="{{ asset('css/selectize.css')}}" rel="stylesheet">
  <link href="{{ asset('css/selectize.bootstrap3.css')}}" rel="stylesheet">
  <link rel="stylesheet" href="{{asset('/css/sweetalert.css')}}">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="/assets/admin/vendors/icheck/skins/all.css">
  <link rel="stylesheet" href="/assets/admin/css/style.css">

  <!-- endinject -->
  <link rel="shortcut icon" href="/assets/admin/images/book.png" />
</head>

<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
   @include('partials.nav')
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      @include('partials.side')
      <!-- partial -->
      <div class="main-panel">
      <div class="content-wrapper">
         <div class="row">
          @include('layouts._flash')
      @yield('content')
      <!-- main-panel ends -->
    </div>
  </div>
</div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
</div>
  <!-- plugins:js -->
  <script src="/assets/admin/vendors/js/vendor.bundle.base.js"></script>
  <script src="/assets/admin/vendors/js/vendor.bundle.addons.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="/assets/admin/js/off-canvas.js"></script>
  <script src="/assets/admin/js/misc.js"></script>
   {{--  JS  --}}
    <!-- <script src="{{ asset('js/app.js') }}"></script> -->
    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('js/selectize.min.js')}}"></script>
    <script src="{{ asset('js/custom.js')}}"></script>
    @yield('scripts')
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="/assets/admin/js/dashboard.js"></script>
  <!-- End custom js for this page-->
       <script src="{{asset('/js/sweetalert.min.js')}}"></script>
        @include('sweet::alert')
       
    <!-- <script src='https://www.google.com/recaptcha/api.js'></script> -->
   

</body>

</html>