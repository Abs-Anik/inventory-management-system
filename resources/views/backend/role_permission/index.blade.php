@extends('backend.layouts.master')
@section('title')
Role List
@endsection
@section('main-content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
       <div class="container-fluid">
          <div class="row mb-2">
             <div class="col-sm-6">
                <h1 class="m-0">Manage Role</h1>
             </div>
             <!-- /.col -->
             <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                   <li class="breadcrumb-item"><a href="#">Home</a></li>
                   <li class="breadcrumb-item active">Role</li>
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
                         Role List
                      </h3>
                      <div class="card-tools">
                         <ul class="nav nav-pills ml-auto">
                            <li class="nav-item">
                               <a href="{{ route('admin.roles.rolePermission.create') }}" class="btn btn-primary btn-sm float-right"><i class="fa fa-plus-circle" aria-hidden="true"></i> Add New Role & Permission</a>
                            </li>
                         </ul>
                      </div>
                   </div>
                   <!-- /.card-header -->
                   <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>SL</th>
                            <th>Role Name</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($roles as $role)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $role->name }}</td>
                                <td>
                                <a class="btn btn-xs-custome btn-primary edit_customer_group_button" href="{{ route('admin.roles.rolePermission.show', $role->id) }}"><i class="fa fa-eye"></i> View</a>

                                <a class="btn btn-xs-custome btn-success edit_customer_group_button" href="{{ route('admin.roles.rolePermission.edit', $role->id) }}"><i class="fa fa-edit"></i> Edit</a>

                                <form method="POST" action="{{ route('admin.roles.rolePermission.destroy', $role->id) }}" style="display:inline-block">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-xs-custome btn-danger show_confirm" style="cursor:pointer" id="delete"><i class="fa fa-trash"></i> Delete</button>
                                </form>

                            </td>
                            </tr>
                        @endforeach
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
