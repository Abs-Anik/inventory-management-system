@extends('backend.layouts.master')
@section('title')
Create Supplier
@endsection
@section('main-content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
       <div class="container-fluid">
          <div class="row mb-2">
             <div class="col-sm-6">
                <h1 class="m-0">Manage Supplier</h1>
             </div>
             <!-- /.col -->
             <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                   <li class="breadcrumb-item"><a href="#">Home</a></li>
                   <li class="breadcrumb-item active">Supplier</li>
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
                        Add Supplier
                      </h3>
                      <div class="card-tools">
                         <ul class="nav nav-pills ml-auto">
                            <li class="nav-item">
                               <a href="{{ route('admin.supplier.list') }}" class="btn btn-primary btn-sm float-right"><i class="fa fa-list" aria-hidden="true"></i> Supplier List</a>
                            </li>
                         </ul>
                      </div>
                   </div>
                   <!-- /.card-header -->
                   <div class="card-body">
                    <form action="{{ route('admin.supplier.store') }}" method="POST" id="myForm">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="name">Name</label>
                                <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Enter Name">
                                @error('name')
                                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-md-4">
                                <label for="mobile_no">Mobile</label>
                                <input type="text" id="mobile_no" name="mobile_no" class="form-control @error('mobile_no') is-invalid @enderror" placeholder="Enter Mobile Number">
                                @error('mobile_no')
                                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-md-4">
                                <label for="email">Email</label>
                                <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Enter Email">
                                @error('email')
                                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-md-12">
                                <label for="address">Address</label>
                                <textarea cols="30" rows="10" class="form-control @error('address') is-invalid @enderror summernote" name="address"></textarea>
                                @error('address')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> Save</button>
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
