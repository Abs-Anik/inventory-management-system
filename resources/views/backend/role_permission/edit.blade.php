@extends('backend.layouts.master')
@section('title')
Edit Role
@endsection
@section('extra-css')
<link rel="stylesheet" href="{{ asset('public/backend/role/css/role_permission.css')}}">
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
                {{-- <div class="card"> --}}
                   <!-- /.card-header -->
                   <div class="card pd-20 pd-sm-40">
                    <div class="card-header">
                        <h3 class="card-title">
                          Edit Role
                        </h3>
                        <div class="card-tools">
                           <ul class="nav nav-pills ml-auto">
                              <li class="nav-item">
                                 <a href="{{ route('admin.roles.rolePermission.index') }}" class="btn btn-primary btn-sm float-right"><i class="fa fa-list" aria-hidden="true"></i> Role & Permissions List</a>
                              </li>
                           </ul>
                        </div>
                     </div>
                    <form action="{{ route('admin.roles.rolePermission.update', $role->id) }}" method="POST" enctype="multipart/form-data" data-parsley-validate data-parsley-focus="first">
                        @csrf
                        @method('PUT')
                        <div class="form-body">
                            <div class="card-body">
                                <div class="row ">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label" for="name">Role Name <span class="required">*</span></label>
                                            <input type="text" class="form-control" id="name" name="name" value="{{ $role->name }}" placeholder="Enter Role Name" required=""/>
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-md-3">
                                        <label class="control-label" for="allManagement">Assign Permissions
                                            <span class="optional">(optional)</span>
                                        </label>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="allManagement" {{ App\Models\User::roleHasPermissions($role, $all_permissions) ? 'checked' : '' }}>
                                            <label class="custom-control-label" for="allManagement">
                                                <strong>All</strong>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <hr>

                                @php $i = 1;  @endphp
                                @foreach ($permissions_group as $group)
                                    <!-- Single Menu Roles -->
                                    <div class="row role-{{ $i }}-managements">
                                        @php
                                            $permissions = App\Models\User::getPermissionsByGroupName($group->name);
                                            $j = 1;
                                        @endphp

                                        <div class="col-md-3">
                                            <label class="control-label" for="{{ $i }}Management">{{ $group->title }}</label>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="{{ $i }}Management" onclick="checkPrmissions('role-{{ $i }}-managements', this)" {{ App\Models\User::roleHasPermissions($role, $permissions) ? 'checked' : '' }}>
                                                <label class="custom-control-label" for="{{ $i }}Management">
                                                    <strong>All</strong>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-9 role-{{ $i }}-managements-checkbox">
                                            @foreach ($permissions as $permission)
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="{{ $i }}-{{ $j }}" name="permissions[]"  value="{{ $permission->name }}" {{ $role->hasPermissionTo($permission->name) ? 'checked' : '' }} onclick="checkSinglePrmission('role-{{ $i }}-managements', '{{ $i }}Management', <?php echo count($permissions); ?>)">
                                                <label class="custom-control-label" for="{{ $i }}-{{ $j }}">{{ $permission->title }}</label>
                                            </div>
                                            @php $j++; @endphp
                                            @endforeach

                                        </div>
                                        <hr>
                                    </div>
                                    <hr>
                                    <!-- Single Menu Roles -->
                                    @php $i++; @endphp
                                @endforeach

                                <div class="row ">
                                    <div class="col-md-12">
                                        <div class="form-actions">
                                            <div class="card-body">
                                                <button type="submit" class="btn btn-success" style="cursor: pointer"> <i class="fa fa-check"></i> Save</button>
                                                <a href="{{ route('admin.roles.rolePermission.index') }}" class="btn btn-dark"><i class="fa fa-arrow-left"></i> Cancel</a>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </div>

                        </div>
                    </form>
                </div>
                   <!-- /.card-body -->
                {{-- </div> --}}
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
@section('extra-script')
@include('backend.layouts.partials.role_permission_script')
@endsection
