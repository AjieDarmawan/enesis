@extends('layouts.master')

@section('body') 
    <div class="wrapper">

            <!-- Main Header -->
            <header class="main-header">
            <!-- Logo -->
            <a href="../../index2.html" class="logo">
              <!-- mini logo for sidebar mini 50x50 pixels -->
              <span class="logo-mini">B<b>2</b>B</span>
              <!-- logo for regular state and mobile devices -->
              <span class="logo-lg"><b>B2B Enesis</b> Portal</span>
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top">
              <!-- Sidebar toggle button-->
              <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </a>

              <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                  <!-- User Account: style can be found in dropdown.less -->
                  <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                      <img src="../../dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
                      <!-- @foreach(Session::get('user_info') as $key => $user_info)
                        @if ($key == 1 ) { 
                          <span class="hidden-xs"> {{$user_info->name}} </span> }
                        @endif  
                      @endforeach --> 
                    </a>
                    <ul class="dropdown-menu">
                      <!-- User image  -->                      
                     <!--  @foreach(Session::get('user_info') as $key => $user_info)
                        @if ($key == 1 )    {                     
                          <li class="user-header">
                            <img src="../../dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                            <p>
                              {{$user_info->name}}
                              <small>Member since Nov. 2012</small>
                            </p>
                          </li>  }
                        @endif  
                      @endforeach -->

                            <!-- Menu Body -->
                            <li class="user-body">
                              <div class="row">
                                <div class="col-xs-4 text-center">
                                  <a href="#">Followers</a>
                                </div>
                                <div class="col-xs-4 text-center">
                                  <a href="#">Sales</a>
                                </div>
                                <div class="col-xs-4 text-center">
                                  <a href="#">Friends</a>
                                </div>
                              </div>
                              <!-- /.row -->
                            </li>
                            <!-- Menu Footer-->
                            <li class="user-footer">
                              <div class="pull-left">
                                <a href="#" class="btn btn-default btn-flat">Profile</a>
                              </div>
                              <div class="pull-right">
                                <a href="#" class="btn btn-default btn-flat">Sign out</a>
                              </div>
                            </li>
                          </ul>
                        </li>
                  <!-- Control Sidebar Toggle Button -->
                  <li>
                    <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                  </li>
                </ul>
              </div>
            </nav>
          </header>
        <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
                <!-- Sidebar Menu -->
               
                  @foreach(Session::get('user_info') as $user_info)               
                     <?= Menu::display(($user_info->menu_label),'layouts.menu-item-bck') ?>     
                  @endforeach 
                @endif      
                <!-- /.sidebar-menu -->
            </section>
            <!-- /.sidebar -->
        </aside>
      
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
           
            <section class="content-header">
                <!--show Errors!! -->
                @if ( count( $errors ) > 0 )
                   @foreach ($errors->all() as $error)
                      <div>{{ $error }}</div>
                   @endforeach
                @endif

                @yield('content_header')
            </section>

            <!-- Main content -->
            <section class="content">
                @yield('content')
            </section>

        </div>
        <!-- /.content-wrapper -->

    </div>
    <!-- ./wrapper -->
@stop

@section('adminlte_js')
    <script src="{{ asset('vendor/adminlte/dist/js/adminlte.min.js') }}"></script>
    @stack('js')
    @yield('js')
@stop
