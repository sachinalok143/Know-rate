  @extends('layouts.shopkeeperListIndex')
@section('content')

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
         <!-- <li data-toggle="offcanvas">
         <a id="addItem" href="#" data-toggle="modal" data-target="#login-modal">
            <i class="fa  fa-cart-plus"></i> <span >Add Items</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green">new</small>
            </span>
          </a>
        </li> -->
        <li >
          <a href="{{url('/')}}">
            <i class="fa fa-files-o"></i>
            <span>Categories</span><SMALL></SMALL>
          </a>
          <ul class="treeview-menu" ng-if="categories">
             <li><a ng-click="getItemByCategory(0,'')"><i class="fa fa-circle-o"></i> All</a></li>
            <li><a ng-click="getItemByCategory(category.id,category.name)" ng-repeat="category in categories"><i class="fa fa-circle-o"></i> <%category.name%></a></li>
          </ul>
        </li>
         <li class=" active treeview">
          <a href="{{url('/get-shopkeeper-view')}}">
            <i class="fa fa-shopping-cart"></i> <span>Shop keepers</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green"></small>
            </span>
          </a>
        </li>
         <li>
          <a href="{{url('/get-user-view')}}">
            <i class="fa  fa-user"></i> <span>Users</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green"></small>
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
        <li class="treeview">
          <a href="{{'/Term&Conditions'}}">
            <i class="fa  fa-book"></i>
            <span>Terms & conditions</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
        </li>
        <li class=" treeview">
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
      <h2>
        Dashboard
        <small>Admin>Shopkeepers List></small>
      </h2>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-bank"></i> Home</a></li>
        <li class="active">shopkeeper list</li>
      </ol>
    </section>


    <!-- Main content -->
    <section class="content">
    
    @include('lists.shopkeepersList')
  
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
  <!-- @include('otherView.reviews') -->
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.3.8
    </div>
    <strong>Copyright &copy; 2014-2016 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
 
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>

@endsection