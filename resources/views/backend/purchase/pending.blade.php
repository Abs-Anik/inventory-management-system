@extends('backend.layouts.master')
@section('title')
Pending List
@endsection
@section('main-content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
       <div class="container-fluid">
          <div class="row mb-2">
             <div class="col-sm-6">
                <h1 class="m-0">Manage Perchase</h1>
             </div>
             <!-- /.col -->
             <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                   <li class="breadcrumb-item"><a href="#">Home</a></li>
                   <li class="breadcrumb-item active">Pending</li>
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
                         Pending List
                      </h3>
                      {{-- <div class="card-tools">
                         <ul class="nav nav-pills ml-auto">
                            <li class="nav-item">
                               <a href="{{ route('admin.purchase.create') }}" class="btn btn-primary btn-sm float-right"><i class="fa fa-plus-circle" aria-hidden="true"></i> Add New Purchase</a>
                            </li>
                         </ul>
                      </div> --}}
                   </div>
                   <!-- /.card-header -->
                   <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped table-responsive">
                        <thead>
                        <tr>
                          <th>SL</th>
                          <th>Purchase No.</th>
                          <th>Date</th>
                          <th>Supplier Name</th>
                          <th>Category</th>
                          <th>Product Name</th>
                          <th>Description</th>
                          <th>Quantity</th>
                          <th>Unit Price</th>
                          <th>Buying Price</th>
                          <th>Status</th>
                          <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($purchasePendings as $purchase)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $purchase->purchase_no }}</td>
                                <td>{{ date('d-m-Y', strtotime($purchase->date)) }}</td>
                                <td><span style="text-transform: capitalize">{{ $purchase['supplier']['name'] }}</span></td>
                                <td><span style="text-transform: capitalize">{{ $purchase['category']['name'] }}</span></td>
                                <td><span style="text-transform: capitalize">{{ $purchase['product']['name'] }}</span></td>
                                <td>{!! $purchase->description !!}</td>
                                <td>
                                    {{ $purchase->buying_qty }}
                                    {{ $purchase['product']['unit']['name'] }}
                                </td>
                                <td>{{ $purchase->unit_price }}</td>
                                <td>{{ $purchase->buying_price }}</td>
                                <td>
                                    @if($purchase->status == 0)
                                        <span class="badge badge-warning p-2">Pending</span>
                                    @else
                                        <span class="badge badge-success p-2">Approved</span>
                                    @endif
                                </td>
                                <td>
                                   @if($purchase->status == 0)
                                    {{-- <form method="POST" action="{{ route('admin.purchase.destroy',$purchase->id) }}" style="display:inline-block">
                                        @csrf
                                        <button type="submit" class="btn btn-xs-custome btn-danger show_confirm btn-sm" style="cursor:pointer" id="delete"><i class="fa fa-trash"></i> Delete</button>
                                    </form> --}}
                                    <a title="Approve" href="{{route('admin.purchase.approve',$purchase->id)}}" class="btn btn-success btn-sm" id="approveBtn"> <i class="fa fa-check-circle"></i></a>
                                    @endif
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

@section('extra-script')
  <!-- Approve Sweet Alert -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
  <script type="text/javascript">
      $(function(){
          $(document).on('click', '#approveBtn', function(e){
              e.preventDefault();
              var link = $(this).attr("href");
              Swal.fire({
                  title: 'Are you sure?',
                  text: "You want to Approve this!",
                  icon: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Yes, Approve it!'
                  }).then((result) => {
                  if (result.isConfirmed) {
                      window.location.href = link;
                      Swal.fire(
                      'Approved!',
                      'Your file has been approved.',
                      'success'
                      )
                  }
                  })
          });
      });
  </script> 
@endsection
