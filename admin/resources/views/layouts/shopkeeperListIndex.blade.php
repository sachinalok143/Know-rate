<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>KRT/lists</title>
     <!-- Bootstrap 3.3.6 -->
  <!-- <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css"> -->
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('dist/css/AdminLTE.min.css')}}">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{asset('dist/css/skins/_all-skins.min.css')}}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{asset('plugins/iCheck/flat/blue.css')}}">
  <!-- Morris chart -->
  <link rel="stylesheet" href="{{asset('plugins/morris/morris.css')}}">
  <!-- jvectormap -->
  <link rel="stylesheet" href="{{asset('plugins/jvectormap/jquery-jvectormap-1.2.2.css')}}">
  <!-- Date Picker -->
  <link rel="stylesheet" href="{{asset('plugins/datepicker/datepicker3.css')}}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{asset('plugins/daterangepicker/daterangepicker.css')}}">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="{{asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/angularjs-toaster/2.1.0/toaster.css">  
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/themes/vader/jquery-ui.css">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/angular-ui/0.4.0/angular-ui.css">    
        @yield('your_css')
    <!-- Styles -->
    <link href="{{ asset('css/app.css')}}" rel="stylesheet">
    <link href="{{ asset('css/addItem.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/angular-ui-select/0.17.1/select.css" />
  <!-- <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.3/themes/smoothness/jquery-ui.css"> -->
   
     <!-- <script src="https://angular-ui.github.com/angular-ui/build/angular-ui.js"></script> -->



</head>
<body class="hold-transition skin-blue sidebar-mini" ng-app="ShopkeeperList" ng-controller="shopkeeperListController">
<toaster-container></toaster-container>
<div > 
        @yield('content')
<div class="control-sidebar-bg"></div>
 </div>









<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
  

    <!-- Scripts -->
 <script src="{{asset('plugins/jQuery/jquery-2.2.3.min.js')}}"></script>
    <!-- <script src="http://code.jquery.com/jquery-1.8.2.min.js"></script> -->
<!-- <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script> -->
 <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>  -->




<!-- jQuery UI 1.11.4 -->
 <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>       
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.6 -->
<script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
<!-- Morris.js')}} charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="{{asset('plugins/morris/morris.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{asset('plugins/sparkline/jquery.sparkline.min.js')}}"></script>
<!-- jvectormap -->
<script src="{{asset('plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>
<script src="{{asset('plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset('plugins/knob/jquery.knob.js')}}"></script>
<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="{{asset('plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- datepicker -->
<script src="{{asset('plugins/datepicker/bootstrap-datepicker.js')}}"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="{{asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>
<!-- Slimscroll -->
<script src="{{asset('plugins/slimScroll/jquery.slimscroll.min.js')}}"></script>
<!-- FastClick -->
<script src="{{asset('plugins/fastclick/fastclick.js')}}"></script>
<!-- AdminLTE App -->

<!-- AdminLTE dashboard demo (This is only for demo purposes) -->

<!-- <script src="{{asset('dist/js/demo.js')}}"></script> -->
<!-- <script type="text/javascript" src="{{asset('js/offline.js')}}"></script> -->
<!-- <script type="text/javascript" src="{{asset('')}}"></script> -->
    <!-- <script src="{{ asset('js/app.js')}}"></script> -->
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.15/angular.min.js"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/angularjs-toaster/2.1.0/toaster.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/angular-google-chart/0.1.0/ng-google-chart.min.js"></script> 
 <script src="http://cdnjs.cloudflare.com/ajax/libs/angular.js/1.2.16/angular-animate.js"></script>
 <script src="http://cdnjs.cloudflare.com/ajax/libs/gsap/1.11.7/TweenMax.min.js"></script>
 <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.2.1/angular-sanitize.min.js"></script>


   <!-- <script src="https://code.angularjs.org/1.3.11/angular.js"></script> -->
    <script src="https://code.angularjs.org/1.3.11/angular-route.js"></script>
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script> -->
    <!-- <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.5.8/angular.min.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/angular-ui-bootstrap/2.5.0/ui-bootstrap-tpls.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/angular-ui-bootstrap/2.5.0/ui-bootstrap.js"></script>
  <!-- UI-Router -->

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/angular-ui-select/0.17.1/select.js" async></script>
     <script src="http://cdnjs.cloudflare.com/ajax/libs/angular-ui-router/0.2.18/angular-ui-router.min.js"></script>
  <script src="https://angular-ui.github.io/ui-router/release/angular-ui-router.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/angular-ui-router/1.0.3/angular-ui-router.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.15/angular-sanitize.min.js"></script>
  <!-- <script src="{{asset('js/ng_csv/build/ng-csv.js')}}"></script> -->
  <!-- <script src="{{asset('ui-bootstrap-tpls-0.12.0.min.js')}}"></script> -->
<!-- <script src="{{asset('angular-dragdrop.min.js')}}"></script> -->
<!-- <script src="{{asset('angular_drag_and_drop_lists.min.js')}}"></script> -->

<script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="http://cdn.oesmith.co.uk/morris-0.4.1.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/angular-ui/0.4.0/angular-ui-ieshiv.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/angular-ui/0.4.0/angular-ui.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/angular-ui-sortable/0.17.1/sortable.min.js"></script>

<!-- AdminLTE for demo purposes --> 
      @yield('your_script')
<!-- <script src="{{asset('dist/js/pages/dashboard.js')}}"></script> -->
<script src="{{asset('dist/js/app.min.js')}}"></script>


<!-- <script src="{{asset('/js/angularProviders/angular-file-upload.js')}}"></script> -->

<!-- <script src="{{asset('js/itemController.js')}}"></script> -->
<script src="{{asset('js/shopkeeperListController.js')}}"></script>
</body>
</html>
