      <!-- jQuery -->
      <script src="{{asset('public/backend/plugins/jquery/jquery.min.js')}}"></script>
      <!-- jQuery UI 1.11.4 -->
      <script src="{{asset('public/backend/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
      <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
      <script>
         $.widget.bridge('uibutton', $.ui.button)
      </script>
      <!-- Bootstrap 4 -->
      <script src="{{asset('public/backend/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
      <!-- ChartJS -->
      <script src="{{asset('public/backend/plugins/chart.js/Chart.min.js')}}"></script>
      <!-- Sparkline -->
      <script src="{{asset('public/backend/plugins/sparklines/sparkline.js')}}"></script>
      <!-- JQVMap -->
      <script src="{{asset('public/backend/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
      <script src="{{asset('public/backend/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
      <!-- jQuery Knob Chart -->
      <script src="{{asset('public/backend/plugins/jquery-knob/jquery.knob.min.js')}}"></script>
      <!-- daterangepicker -->
      <script src="{{asset('public/backend/plugins/moment/moment.min.js')}}"></script>
      <script src="{{asset('public/backend/plugins/daterangepicker/daterangepicker.js')}}"></script>
      <!-- Tempusdominus Bootstrap 4 -->
      <script src="{{asset('public/backend/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
      <!-- Summernote -->
      <script src="{{asset('public/backend/plugins/summernote/summernote-bs4.min.js')}}"></script>
      <!-- overlayScrollbars -->
      <script src="{{asset('public/backend/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
      <!-- AdminLTE App -->
      <script src="{{asset('public/backend/dist/js/adminlte.js')}}"></script>
      <!-- AdminLTE for demo purposes -->
      <script src="{{asset('public/backend/dist/js/demo.js')}}"></script>
      <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
      <script src="{{asset('public/backend/dist/js/pages/dashboard.js')}}"></script>

      <!-- DataTables  & Plugins -->
    <script src="{{asset('public/backend/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('public/backend/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('public/backend/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('public/backend/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
    <script src="{{asset('public/backend/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('public/backend/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{asset('public/backend/plugins/jszip/jszip.min.js')}}"></script>
    <script src="{{asset('public/backend/plugins/pdfmake/pdfmake.min.js')}}"></script>
    <script src="{{asset('public/backend/plugins/pdfmake/vfs_fonts.js')}}"></script>
    <script src="{{asset('public/backend/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
    <script src="{{asset('public/backend/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
    <script src="{{asset('public/backend/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
    <!-- jquery-validation -->
    <script src="{{asset('public/backend/plugins/jquery-validation/jquery.validate.min.js')}}"></script>
    <script src="{{asset('public/backend/plugins/jquery-validation/additional-methods.min.js')}}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="{{asset('public/backend/summernote/summernote-bs4.min.js')}}"></script>
    <script src="{{ asset('public/backend/dropify/js/dropify.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.summernote').summernote({
                height: 100
            });
        });
    </script>
    <script>
        $(".dropify").dropify();
    </script>

    <script>
        $(function () {
          $("#example1").DataTable({
            "responsive": true, "lengthChange": false, "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print"]
          }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
          $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
          });
        });
      </script>
    <script>
        @if (Session::has('Message'))
            var type = "{{ Session::get('alert-type', 'info') }}";
            switch(type){
            case 'info':
            toastr.info("{{ Session::get('Message') }}");
            break;

            case 'warning':
            toastr.warning("{{ Session::get('Message') }}");
            break;

            case 'success':
            toastr.success("{{ Session::get('Message') }}");
            break;

            case 'error':
            toastr.error("{{ Session::get('Message') }}");
            break;
            }
        @endif
    </script>

    <script type="text/javascript">
        $('.show_confirm').click(function(event) {
        var form = $(this).closest("form");
        var name = $(this).data("name");
        event.preventDefault();
        swal({
            title: "Are you sure you want to delete this record?",
            text: "If you delete this, it will be gone forever.",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            })
            .then((willDelete) => {
            if (willDelete) {
                form.submit();
            }
            });
        });
    </script>