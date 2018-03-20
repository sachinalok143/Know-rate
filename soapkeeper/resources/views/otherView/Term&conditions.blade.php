<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    
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

    <!-- Styles -->
    <link href="{{ asset('css/app.css')}}" rel="stylesheet">
    <link href="{{ asset('css/addItem.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/angular-ui-select/0.17.1/select.css" />
  <!-- <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.3/themes/smoothness/jquery-ui.css"> -->
   
     <!-- <script src="https://angular-ui.github.com/angular-ui/build/angular-ui.js"></script> -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">



</head>
<body class="hold-transition skin-blue sidebar-mini" ng-app="ShopkeeperList" ng-controller="shopkeeperListController">
<toaster-container></toaster-container>
<div > 

<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="{{url('/')}}" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>K</b>RT</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Know</b>RATE</span>
    </a>
    
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          @if (Auth::user() )
          
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="/uploads/User/{{Auth::user()->avatar}}" class="user-image" alt="User Image">
             <span class="hidden-xs">{{Auth::user()->name }}</span>
            
            </a>
            <ul class="dropdown-menu" >
              <!-- User image -->
              <li class="user-header">
                <img src="/uploads/User/{{Auth::user()->avatar}}" class="img-circle" alt="User Image">

                <p>
                @if(Auth::user())
                 {{Auth::user()->name}}
                 @endif
                  <small></small>
                </p>
              </li>
              <!-- Menu Body -->
             
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="{{url('/profile')}}" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="#" class="btn btn-default btn-flat" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">Sign out
                </a>
                 <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
                </form>
                </div>
              </li>
            </ul>
          </li>
          @endif
          @if (!Auth::user())
          <li class="dropdown tasks-menu">
            <a href="{{url('/login')}}" >
              Login
              <span class="label label-danger"></span>
            </a>
            
          </li>
           <li class="dropdown tasks-menu">
            <a href="{{url('/register')}}" >
              Signup
              <span class="label label-danger"></span>
            </a>
            
          </li>
            @endif
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar" style=" position: fixed;top: 0;bottom: 0;overflow: auto;">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
     @if(Auth::user())
      <div class="user-panel">
        <div class="pull-left image">
          <img src="/uploads/User/{{Auth::user()->avatar}}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <span><b>{{Auth::user()->name}}</b></span><br><br>
          <a href="#"><i style="color: green;" class="fa fa-circle text-success"></i> Online</a>
        </div>
        <br><br>
      </div>

      @endif
      <!-- search form -->
      
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <li class=" treeview">
          <a href="{{url('/Home')}}">
            <i class="fa fa-bank"></i> <span>Home</span>
            <span class="pull-right-container">
              <!-- <i class="fa fa-angle-left pull-right"></i> -->
            </span>
          </a>  
        </li>
        <li >
          <a href="{{url('/')}}">
            <i class="fa fa-files-o"></i>
            <span>Categories</span><SMALL></SMALL>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
        </li>
        
        <li>
          <a href="{{url('/aboutUs')}}">
            <i class="fa fa-users"></i> <span>About us</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green"></small>
            </span>
          </a>
        </li>
        <li class="active treeview">
          <a href="{{'/Term&Conditions'}}">
            <i class="fa  fa-book"></i>
            <span>Terms & conditions</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
        </li>
        <li class="  treeview">
          <a href="{{url('/FAQs')}}">
            <i class="fa  fa-question-circle"></i>
            <span>FAQs</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    
      <ol class="breadcrumb">
        <li><a href=""><i class="fa fa-bank"></i> Home</a></li>
        <li class="active">T&C</li>
      </ol>
    </section>


    <!-- Main content -->
    <section class="content">
<div class="container">


<div >
    <h1> T& C <small>Term & Conditions </small></h1>
</div>

<!-- Bootstrap FAQ - START -->
<div class="col-md-10 ">
    <div class="panel-group" id="accordion">
        

        <div class="panel panel-default">
            <div class="panel-heading" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                <h4 class="panel-title">
                    <a class="accordion-toggle " data-toggle="collapse" data-parent="#accordion" href="#collapseOne">Faulty item/service</a>
                </h4>
            </div>
            <div id="collapseOne" class="panel-collapse collapse in">
                <div class="panel-body"> <h5>
                 <strong>KnowRate</strong> is not responsible for any type of any type of fault in item/service.<strong>KnowRate</strong> is only for information puspose ,not a online shoping site. 
                 </h5>
                </div>
            </div>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading"  data-toggle="collapse" data-parent="#accordion" href="#collapseTen">
                <h4 class="panel-title">
                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTen">Wrong Item/Service</a>
                </h4>
            </div>
            <div id="collapseTen" class="panel-collapse collapse">
                <div class="panel-body">
                <h5>
                    <strong>KnowRate</strong> is not responsible for any wrong delivery of item. service.User have to contact from seller before taking item/service.They get the contact of seller from  <strong>KnowRate</strong>.
                    </h5> 
                </div>
            </div>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading" data-toggle="collapse" data-parent="#accordion" href="#collapseEleven">
                <h4 class="panel-title">
                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseEleven">Receipt and Bill payment</a>
                </h4>
            </div>
            <div id="collapseEleven" class="panel-collapse collapse">
                <div class="panel-body">
                  <h5>
                   Receipt and Bill payment will be done as seller want.<strong>KnowRate</strong> is not giving any receipt and responsible for bill payment.
                </h5>
                </div>
            </div>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading" data-toggle="collapse" data-parent="#accordion" href="#collapseFour">
                <h4 class="panel-title">
                    <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFour">Item/service verification</a>
                </h4>
            </div>
            <div id="collapseFour" class="panel-collapse collapse">
                <div class="panel-body"><h5>
                   <strong>KnowRate</strong> is not verifying any item/service.Any seller post ther item on this site without any verification.If <strong>KnowRate</strong> find some thing wrong in the posted item/service ,Admin will delete that post.  
                  </h5>
                </div>
            </div>
        </div>


<style>
  body{

  }
    .faqHeader {
        font-size: 27px;
        margin: 20px;
    }

    .panel-heading [data-toggle="collapse"]:after {
        font-family: 'Glyphicons Halflings';
        content: "\e072"; /* "play" icon */
        float: right;
        color: #F58723;
        font-size: 18px;
        line-height: 22px;
        /* rotate "play" icon from > (right arrow) to down arrow */
        -webkit-transform: rotate(-90deg);
        -moz-transform: rotate(-90deg);
        -ms-transform: rotate(-90deg);
        -o-transform: rotate(-90deg);
        transform: rotate(-90deg);
    }

    .panel-heading [data-toggle="collapse"].collapsed:after {
        /* rotate "play" icon from > (right arrow) to ^ (up arrow) */
        -webkit-transform: rotate(90deg);
        -moz-transform: rotate(90deg);
        -ms-transform: rotate(90deg);
        -o-transform: rotate(90deg);
        transform: rotate(90deg);
        color: #454444;
    }
</style>

<!-- Bootstrap FAQ - END -->

</div>














    <!-- @include('otherView.addItemForm') -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
 
    <div class="pull-right hidden-xs">
      <b>Version</b>1.0.0
    </div>
    <strong>Copyright &copy; 2017-2020 <a >Sachin Kumar</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
 
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>



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
