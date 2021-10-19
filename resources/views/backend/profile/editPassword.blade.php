@extends('backend.layouts.master')
@section('title')
Change Password
@endsection
@section('main-content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
       <div class="container-fluid">
          <div class="row mb-2">
             <div class="col-sm-6">
                <h1 class="m-0">Manage Password</h1>
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
             <section class="col-md-12">
                <!-- Custom tabs (Charts with tabs)-->
                <div class="card">
                   <div class="card-header">
                      <h3 class="card-title">
                        Edit Password
                      </h3>
                   </div>
                   <!-- /.card-header -->
                   <div class="card-body">
                    <form action="{{ route('admin.user.password.update') }}" method="POST" id="myForm">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="currentPassword">Current Password</label>
                                <input type="password" id="currentPassword" name="currentPassword" class="form-control @error('currentPassword') is-invalid @enderror" placeholder="Enter Current Password">
                                @error('currentPassword')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-md-4">
                                <label for="password">New Password</label>
                                <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Enter Password">
                                @error('password')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-md-4">
                                <label for="passwordConfirm">Confirm Password</label>
                                <input type="password" id="passwordConfirm" name="password_confirmation" class="form-control" placeholder="Enter Confirm Password">
                            </div>
                            <div class="form-group col-md-6">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> Update Password</button>
                            </div>
                        </div>
                    </form>
                   </div>
                   <!-- /.card-body -->
                </div>
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
