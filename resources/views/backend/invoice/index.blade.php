@extends('backend.layouts.master')
@section('title')
Invoice List
@endsection
@section('main-content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
       <div class="container-fluid">
          <div class="row mb-2">
             <div class="col-sm-6">
                <h1 class="m-0">Manage Invoice</h1>
             </div>
             <!-- /.col -->
             <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                   <li class="breadcrumb-item"><a href="#">Home</a></li>
                   <li class="breadcrumb-item active">Invoice</li>
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
                         Invoice List
                      </h3>
                      <div class="card-tools">
                         <ul class="nav nav-pills ml-auto">
                            <li class="nav-item">
                               <a href="{{ route('admin.invoice.create') }}" class="btn btn-primary btn-sm float-right"><i class="fa fa-plus-circle" aria-hidden="true"></i> Add New Invoice</a>
                            </li>
                         </ul>
                      </div>
                   </div>
                   <!-- /.card-header -->
                   <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped dt-responsive nowrap">
                        <thead>
                        <tr>
                          <th>SL</th>
                          <th>Customer Name</th>
                          <th>Invoice No</th>
                          <th>Date</th>
                          <th>Description</th>
                          <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>

                            <tr>
                                <td>1</td>
                                <td>Test</td>
                                <td>Test007</td>
                                <td>19-12-2021</td>
                                <td>Lorem ipsum dolor sit amet.</td>
                                <td>
                                    <button class="btn btn-success">Save</button>
                                </td>
                            </tr>

                        </tbody>
                      </table>
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
