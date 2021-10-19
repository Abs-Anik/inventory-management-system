@extends('backend.layouts.master')
@section('title')
Edit User Profile
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
             <section class="col-md-12">
                <!-- Custom tabs (Charts with tabs)-->
                <div class="card">
                   <div class="card-header">
                      <h3 class="card-title">
                        Edit User
                      </h3>
                      <div class="card-tools">
                         <ul class="nav nav-pills ml-auto">
                            <li class="nav-item">
                               <a href="{{ route('admin.user.profile.show') }}" class="btn btn-primary btn-sm float-right"><i class="fa fa-user" aria-hidden="true"></i> Your Profile</a>
                            </li>
                         </ul>
                      </div>
                   </div>
                   <!-- /.card-header -->
                   <div class="card-body">
                    <form action="{{ route('admin.user.profile.update',$user->id) }}" method="POST" id="myForm" enctype="multipart/form-data">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label for="name">Name</label>
                                <input type="text" id="name" name="name" value="{{ $user->name }}" class="form-control @error('name') is-invalid @enderror" placeholder="Enter Name">
                                @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-md-3">
                                <label for="email">Email</label>
                                <input type="email" id="email" name="email" value="{{ $user->email }}" class="form-control @error('email') is-invalid @enderror" placeholder="Enter Email">
                                @error('email')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-md-3">
                                <label for="mobile">Mobile</label>
                                <input type="mobile" id="mobile" name="mobile" class="form-control @error('mobile') is-invalid @enderror" placeholder="Enter mobile" value="{{ $user->mobile }}">
                                @error('mobile')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group col-md-3">
                                <label for="gender">Gender</label>
                                <select name="gender" id="gender" class="form-control @error('gender') is-invalid @enderror">
                                    <option value="">Select Gender</option>
                                    <option value="Male" {{ $user->gender == 'Male' ? 'selected' : '' }}>Male</option>
                                    <option value="Female" {{ $user->gender == 'Female' ? 'selected' : '' }}>Female</option>
                                </select>
                                @error('gender')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group col-md-12">
                                <label for="address">Address</label>
                                <textarea cols="30" rows="10" class="form-control @error('address') is-invalid @enderror summernote" name="address">{{ $user->address }}</textarea>
                                @error('address')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            </div>
                            @if (!empty($user->image))
                            <div class="form-group col-md-12">
                                <label for="image">Profile Image</label>
                                <input type="file" class="form-control @error('image') is-invalid @enderror dropify" name="image" data-default-file="{{ asset('public/backend/images/user_profile/'.$user->image) }}">
                                @error('image')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            @else
                            <div class="form-group col-md-12">
                                <label for="image">Profile Image</label>
                                <input type="file" class="form-control @error('image') is-invalid @enderror dropify" name="image" data-default-file="{{ asset('public/backend/images/profile/avatar.jpg') }}">
                                @error('image')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            @endif
                            <div class="form-group col-md-6">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> Update</button>
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
