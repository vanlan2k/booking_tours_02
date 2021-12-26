
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script src="{{asset('dist/js/pages/dashboard.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- ChartJS -->
<script src="{{asset('dist/js/chart.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{ asset('plugins/sparklines/sparkline.js') }}"></script>
<!-- JQVMap -->
<script src="{{ asset('plugins/jqvmap/jquery.vmap.min.js') }}"></script>
<script src="{{ asset('plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('plugins/jquery-knob/jquery.knob.min.js') }}"></script>
<!-- daterangepicker -->
<script src="{{ asset('plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<!-- Summernote -->
<script src="{{ asset('plugins/summernote/summernote-bs4.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.js') }}"></script>
<script src="{{asset('dist/js/toastr.min.js')}}"></script>
<script src="{{ asset('dist/js/libs/xeditable/bootstrap-editable.min.js') }}"></script>
<script src="{{asset('dist/js/select2.min.js')}}"></script>
<script src="{{asset('dist/js/pusher.min.js')}}"></script>
<script src="{{asset('dist/js/bootstrap-tagsinput.min.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function () {
        @if (Session::get('success'))
        toastr.success('{{Session::get('success')}}', '', {timeOut: 5000});
        @endif
        @if (Session::get('error'))
        toastr.error('{{Session::get('error')}}', '', {timeOut: 5000});
        @endif
    });
</script>
@include('admin.javascript.pusher')


