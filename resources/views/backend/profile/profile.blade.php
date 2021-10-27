@extends('backend.layouts.master')
@section('title')
{{ Auth::user()->name }}'s Profile
@endsection
@section('main-content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
       <div class="container-fluid">
          <div class="row mb-2">
             <div class="col-sm-6">
                <h1 class="m-0">Manage Profile</h1>
             </div>
             <!-- /.col -->
             <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                   <li class="breadcrumb-item"><a href="#">Home</a></li>
                   <li class="breadcrumb-item active">Profile</li>
                </ol>
             </div>
             <!-- /.col -->
          </div>
          <!-- /.row -->
       </div>
       <!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
       <div class="container-fluid">
          <!-- Main row -->
          <div class="row">
             <!-- Left col -->
             <section class="col-md-4 offset-md-4">
                    <!-- Profile Image -->
                    <div class="card card-primary card-outline">
                      <div class="card-body box-profile">
                        <div class="text-center">
                            @if(!empty($user->image))
                            <img class="profile-user-img img-fluid img-circle"
                            src="{{asset('public/backend/images/user_profile/'.$user->image)}}"
                            alt="User profile picture">
                            @else
                            <img class="profile-user-img img-fluid img-circle"
                            src="{{asset('public/backend/images/profile/avatar.jpg')}}"
                            alt="User profile picture">
                            @endif
                        </div>

                        @if (!empty($user->name))
                        <h3 class="profile-username text-center"><span style="text-transform: capitalize">{{ $user->name }}</span></h3>
                        @else
                        <h3 class="text-center">Not Found</h3>
                        @endif
                        @if (!empty($user->address))
                        <p class="text-muted text-center" style="text-align: center"><span style="text-transform: capitalize">{!! $user->address !!}</span></p>
                        @else
                        <p class="text-center">Not Found</p>
                        @endif
                        <ul class="list-group list-group-unbordered mb-3">
                            @if (!empty($user->mobile))
                            <li class="list-group-item">
                                <b>Mobile No</b> <a class="float-right">{{ $user->mobile }}</a>
                              </li>
                            @else
                            <li class="list-group-item">
                                <b>Mobile No</b> <a class="float-right">Not Found</a>
                              </li>
                            @endif
                            @if (!empty($user->email))
                            <li class="list-group-item">
                                <b>Email</b> <a class="float-right">{{ $user->email }}</a>
                              </li>
                            @else
                            <li class="list-group-item">
                                <b>Email</b> <a class="float-right">Not Found</a>
                              </li>
                            @endif
                            @if (!empty($user->gender))
                            <li class="list-group-item">
                                <b>Gender</b> <a class="float-right">{{ $user->gender }}</a>
                              </li>
                            @else
                            <li class="list-group-item">
                                <b>Gender</b> <a class="float-right">Not Found</a>
                              </li>
                            @endif
                        </ul>

                        <a href="{{ route('admin.user.profile.edit') }}" class="btn btn-primary btn-block"><b>Edit Profile</b></a>
                      </div>
                      <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                    <!-- /.card -->
                <!-- /.card -->
                <!-- /.card -->
             </section>
             <!-- /.Left col -->
          </div>
          <!-- /.row (main row) -->
       </div>
       <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
 </div>
@endsection
