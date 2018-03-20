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
     <link href="http://fonts.googleapis.com/css?family=Hind:300,400,500,600,700" rel="stylesheet" type="text/css">
        <link href="{{asset('vendor/simple-line-icons/css/simple-line-icons.css')}}" rel="stylesheet" type="text/css"/>
        <link href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css"/>

        <!-- PAGE LEVEL PLUGIN STYLES -->
        <link href="{{asset('css/animate.css')}}" rel="stylesheet">
        <link href="{{asset('vendor/swiper/css/swiper.min.css')}}" rel="stylesheet" type="text/css"/>

        <!-- THEME STYLES -->
        <link href="{{asset('css/layout.min.css')}}" rel="stylesheet" type="text/css"/>

        <!-- Favicon -->
        <link rel="shortcut icon" href="{{asset('favicon.ico')}}"/>


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
        <li class=" active">
          <a href="{{url('/aboutUs')}}">
            <i class="fa fa-users"></i> <span>About us</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green"></small>
            </span>
          </a>
        </li>
        <li class="treeview">
          <a href="{{'/Term&Conditions'}}">
            <i class="fa  fa-book"></i>
            <span>Terms & conditions</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
        </li>
        <li  >
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
        <li class="active">FAQs</li>
      </ol>
    </section>


    <!-- Main content -->
    <section>
    
    
    




   <div class="header fixed-top">
            <!-- Navbar -->
            <nav class="navbar" role="navigation">
                <div class="container">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="menu-container js_nav-item">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".nav-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="toggle-icon"></span>
                        </button>

                        <!-- Logo -->
                        <div class="logo">
                            <a class="logo-wrap" href="#body">
                                <!-- <img class="logo-img" src="img/logo.png" alt="Asentus Logo"> -->
                            </a>
                        </div>
                        <!-- End Logo -->
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse nav-collapse">
                        <div class="menu-container">
                            <ul class="nav navbar-nav ">
                                <li class="js_nav-item nav-item"><a class="nav-item-child nav-item-hover" href="#body">Home</a></li>
                                <li class="js_nav-item nav-item"><a class="nav-item-child nav-item-hover" href="#about">About</a></li>
                                <li class="js_nav-item nav-item"><a class="nav-item-child nav-item-hover" href="#contact">Contact</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- End Navbar Collapse -->
                </div>
            </nav>
            <!-- Navbar -->
        </div>
        <div class="promo-block">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <center>
                        <div class="margin-b-30">
                        <img src="img/profilePics/sachin.jpg" style="max-height:250px;width:150px; border-radius: 50%; " >
                            <h1 class="promo-block-title">Sachin<br/> Kumar</h1>
                            <p class="promo-block-text">IIT Kharagpur</p>
                        </div>
                        <ul class="list-inline">
                            <li><a href="https://www.facebook.com/sachinalok143" class="social-icons"><i class="icon-social-facebook"></i></a></li>
                            <li><a href="https://twitter.com/sachinalok143?lang=en" class="social-icons"><i class="icon-social-twitter"></i></a></li>
                            <li><a href="https://github.com/sachinalok143" class="social-icons"><i class="icon-social-github"></i></a></li>
                            <li><a href="https://www.linkedin.com/in/sachin-kumar-22097a113/" class="social-icons"><i class="icon-social-linkedin"></i></a></li>
                            <li><a href="http://sachinkumar.epizy.com" class="social-icons"><i class="icon-briefcase"></i></a></li>
                            
                        </ul>
                        </center>
                    </div>
                    <div class="col-sm-6 sm-margin-b-60">
                      <center>
                        <div class="margin-b-30">
                        <img src="img/profilePics/vinay.jpg" style="max-height:250px;max-width:150px; border-radius: 50%; " >
                            <h1 class="promo-block-title">Vinay <br/> Singh</h1>
                            <p class="promo-block-text">IIT Kharagpur</p>
                        </div>
                       
                    </div>
                </div>
                <!--// end row -->
            </div>
        </div>
        <!--========== SLIDER ==========-->

        <!--========== PAGE LAYOUT ==========-->
        <!-- About -->
        <div id="about" >
            <div class="container content-lg">
                <div class="row">
                   
                    <div class="col-sm-10 col-md-offset-1">
                        <div class="section-seperator margin-b-">
                          <h2>About Us</h2>
                          <p>I'm Sachin Kumar.I am a undergraduate student of department of <b>Computer Science and Engineering</b> in <b>IIT Kharagpur.</b>I did my schooling from <b>Jawaghar Navodaya Vidyalaya Sitapur.<b></p>
                          <p>I'm Vinay Singh.I am a undergraduate student of department of <b>Computer Science and Engineering</b> in <b>IIT Kharagpur.</b>I did my schooling from <b>Jawaghar Navodaya Vidyalaya .<b></p>
                        </div>

                        <h2>Our Skills</h2>
                        <!-- Progress Box -->
                        <div class="progress-box">
                            <h5>Web Developing<span class="color-heading pull-right">80%</span></h5>
                            <div class="progress">
                                <div class="progress-bar bg-color-base" role="progressbar" data-width="80"></div>
                            </div>
                        </div>
                        <div class="progress-box">
                            <h5>C Programming<span class="color-heading pull-right">85%</span></h5>
                            <div class="progress">
                                <div class="progress-bar bg-color-base" role="progressbar" data-width="85"></div>
                            </div>
                        </div>
                        <div class="progress-box">
                            <h5>Algorithms <span class="color-heading pull-right">75%</span></h5>
                            <div class="progress">
                                <div class="progress-bar bg-color-base" role="progressbar" data-width="77"></div>
                            </div>
                        </div>
                        <div class="progress-box">
                            <h5>Data structures <span class="color-heading pull-right">80%</span></h5>
                            <div class="progress">
                                <div class="progress-bar bg-color-base" role="progressbar" data-width="80"></div>
                            </div>
                        </div>
                         <h3>Programming Languages & Frameworks</h3>
                        <!-- Progress Box -->
                        <div class="col-md-6">
                        <div class="progress-box">
                            <h5>PHP<span class="color-heading pull-right">80%</span></h5>
                            <div class="progress">
                                <div class="progress-bar bg-color-base" role="progressbar" data-width="80"></div>
                            </div>
                        </div>
                        <div class="progress-box">
                            <h5>Larvel<span class="color-heading pull-right">85%</span></h5>
                            <div class="progress">
                                <div class="progress-bar bg-color-base" role="progressbar" data-width="85"></div>
                            </div>
                        </div>
                        <div class="progress-box">
                            <h5>JAVA <span class="color-heading pull-right">70%</span></h5>
                            <div class="progress">
                                <div class="progress-bar bg-color-base" role="progressbar" data-width="70"></div>
                            </div>
                        </div>
                        <div class="progress-box">
                            <h5>Python <span class="color-heading pull-right">50%</span></h5>
                            <div class="progress">
                                <div class="progress-bar bg-color-base" role="progressbar" data-width="50"></div>
                            </div>
                        </div>
                        </div>
                        <div class="col-md-6">
                        <div class="progress-box">
                            <h5>Javascript<span class="color-heading pull-right">80%</span></h5>
                            <div class="progress">
                                <div class="progress-bar bg-color-base" role="progressbar" data-width="80"></div>
                            </div>
                        </div>
                        <div class="progress-box">
                            <h5>AngularJs<span class="color-heading pull-right">85%</span></h5>
                            <div class="progress">
                                <div class="progress-bar bg-color-base" role="progressbar" data-width="85"></div>
                            </div>
                        </div>
                        <div class="progress-box">
                            <h5>C++<span class="color-heading pull-right">50%</span></h5>
                            <div class="progress">
                                <div class="progress-bar bg-color-base" role="progressbar" data-width="50"></div>
                            </div>
                        </div>
                        <div class="progress-box">
                            <h5>Mysql <span class="color-heading pull-right">60%</span></h5>
                            <div class="progress">
                                <div class="progress-bar bg-color-base" role="progressbar" data-width="60"></div>
                            </div>
                        </div>
                        </div>
                        <!-- End Progress Box -->
                    </div>
                </div>
                <!--// end row -->
            </div>
        </div>
        <!-- Promo Banner -->
        <div class="promo-banner parallax-window" data-parallax="scroll" data-image-src="img/1920x1080/01.jpg">
            <div class="container-sm content-lg">
                <h2 class="promo-banner-title">Special thanks </h2>
                <p class="promo-banner-text">Thank you! <b>Vinay Singh</b> for helping me in  this project.</p>
            </div>
        </div>
        <!-- End Promo Banner -->
            
        <!-- Contact -->
        <div id="contact">
            <div class="bg-color-sky-light">
                <div class="container content-lg">
                    <div class="row margin-b-40">
                        <div class="col-sm-6">
                           <h2>Contact Us</h2>
                            
                        </div>
                    </div>
                    <!--// end row -->

                    <div class="row">
                        <div class="col-md-3 ">
                            <h4>Location</h4>
                            <a href="#">
                              IIT kharagpur,<br>
                              West Usdinipur<br>
                              West Bengal,<br>
                              India<br>
                              721302<br>
                            </a>
                        </div>
                        <div class="col-md-3 ">
                            <h4>Phone</h4>
                            <a href="#">Sachin&nbsp;:&nbsp;+91 7525841599</a><br>
                             <a href="#">Vinay&nbsp;:&nbsp;+91 8436904441</a>
                        </div>
                        <div class="col-md-3 ">
                            <h4>Email</h4>
                            <a href="mailto:#">sachinalok143@gmail.com</a><br>
                             <a href="mailto:#">vinaysingh5894@gmail.com</a>
                        </div>
                        <div class="col-md-3 ">
                            <h4>Facebook</h4>
                            <a href="https://www.facebook.com/sachinalok143">facebook.com/sachinalok143</a><br><br>
                            <a href="https://www.facebook.com/profile.php?id=100005553733454&ref=br_rs">facebook.com/profile.php?id=100005553733454&ref=br_rs</a>
                        </div>
                            

                    </div>
                    <!--// end row -->
                </div>
            </div>
        </div>



    <!-- @include('otherView.addItemForm') -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
 
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.3.8
    </div>
    <strong>Copyright &copy; 2017-2020 <a >Sachin kumar</a>.</strong> All rights
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





 <script src="{{asset('vendor/jquery.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('vendor/jquery-migrate.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('vendor/bootstrap/js/bootstrap.min.js')}}" type="text/javascript"></script>

        <!-- PAGE LEVEL PLUGINS -->
        <script src="{{asset('vendor/jquery.easing.js')}}" type="text/javascript"></script>
        <script src="{{asset('vendor/jquery.back-to-top.js')}}" type="text/javascript"></script>
        <script src="{{asset('vendor/jquery.smooth-scroll.js')}}" type="text/javascript"></script>
        <script src="{{asset('vendor/jquery.wow.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('vendor/jquery.parallax.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('vendor/jquery.appear.js')}}" type="text/javascript"></script>
        <script src="{{asset('vendor/swiper/js/swiper.jquery.min.js')}}" type="text/javascript"></script>

        <!-- PAGE LEVEL SCRIPTS -->
        <script src="{{asset('js/layout.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('js/components/progress-bar.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('js/components/swiper.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('js/components/wow.min.js')}}" type="text/javascript"></script>



    
<!-- <script src="{{asset('dist/js/pages/dashboard.js')}}"></script> -->
<script src="{{asset('dist/js/app.min.js')}}"></script>


<!-- <script src="{{asset('/js/angularProviders/angular-file-upload.js')}}"></script> -->

<!-- <script src="{{asset('js/itemController.js')}}"></script> -->
<script src="{{asset('js/shopkeeperListController.js')}}"></script>
</body>
</html>
