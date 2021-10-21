<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>@yield('title', 'Inventory Management System || Dashboard')</title>
        @include('backend.layouts.partials.style')
        @yield('extra-css')
   </head>
   <body class="hold-transition sidebar-mini layout-fixed">
      <div class="wrapper">
         <!-- Preloader -->
         <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="{{asset('public/backend/dist/img/AdminLTELogo.png')}}" alt="AdminLTELogo" height="60" width="60">
         </div>
         <!-- Navbar -->
         <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
               <li class="nav-item">
                  <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
               </li>
               <li class="nav-item d-none d-sm-inline-block">
                  <a href="index3.html" class="nav-link">Home</a>
               </li>
               <li class="nav-item d-none d-sm-inline-block">
                  <a href="#" class="nav-link">Contact</a>
               </li>
               <li>
                  <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                  <i class="fas fa-search"></i>
                  </a>
                  <div class="navbar-search-block">
                     <form class="form-inline">
                        <div class="input-group input-group-sm">
                           <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                           <div class="input-group-append">
                              <button class="btn btn-navbar" type="submit">
                              <i class="fas fa-search"></i>
                              </button>
                              <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                              <i class="fas fa-times"></i>
                              </button>
                           </div>
                        </div>
                     </form>
                  </div>
               </li>
            </ul>
            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
               <!-- Notifications Dropdown Menu -->
               <li class="nav-item dropdown">
                  <a class="nav-link" data-toggle="dropdown" href="#">
                  <span style="text-transform:capitalize">{{ Auth::user()->name }}</span>
                  </a>
                  <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                     <div class="dropdown-divider"></div>
                     <a href="{{ route('admin.user.profile.show') }}" class="dropdown-item dropdown-footer"><i class="fa fa-user"></i> Profile Setting</a>
                     <div class="dropdown-divider"></div>
                     <a href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();" class="dropdown-item dropdown-footer"><i class="fas fa-sign-out-alt"></i> Logout</a>
                     <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                     </form>
                  </div>
               </li>
            </ul>
         </nav>
         <!-- /.navbar -->
         <!-- Main Sidebar Container -->
         <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="{{ route('home') }}" class="brand-link">
            <img src="{{asset('public/backend/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
            <span class="brand-text font-weight-light">Dashboard</span>
            </a>
            <!-- Sidebar -->
            <div class="sidebar">
               <!-- Sidebar user panel (optional) -->
               <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                  <div class="image">
                     @if(!empty(Auth::user()->image))
                     <img src="{{asset('public/backend/images/user_profile/'.Auth::user()->image)}}" alt="user" class="img-circle elevation-2">
                     @else
                     <img src="{{asset('public/backend/images/profile/avatar.jpg')}}" alt="user" class="img-circle elevation-2">
                     @endif
                  </div>
                  <div class="info">
                     <a href="{{ route('admin.user.profile.show') }}" class="d-block"><span style="text-transform:capitalize">{{ Auth::user()->name }}</span></a>
                  </div>
               </div>
               <!-- SidebarSearch Form -->
               <!-- Sidebar Menu -->
               @include('backend.layouts.partials.sidebar')
               <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
         </aside>
         <!-- Content Wrapper. Contains page content -->
         @yield('main-content')
         <!-- /.content-wrapper -->
         @include('backend.layouts.partials.footer')
      </div>
      <!-- ./wrapper -->
      @include('backend.layouts.partials.script')
      @yield('extra-script')

   </body>
</html>
