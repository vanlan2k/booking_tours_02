
<script src="{{asset('dist/js/jquery.min.js')}}"></script>
<script src="{{asset('dist/js/popper.min.js')}}"></script>
<script src="{{asset('dist/js/bootstrap.min.js')}}"></script>
<script src="{{asset('dist/js/common_scripts_min.js')}}"></script>
<script src="{{asset('dist/js/validate.js')}}"></script>
<script src="{{asset('dist/js/jquery.tweet.min.js')}}"></script>
<script src="{{asset('dist/js/functions.js')}}"></script>

<!-- SPECIFIC SCRIPTS -->
<script src="{{asset('dist/layerslider/js/greensock.js')}}"></script>
<script src="{{asset('dist/layerslider/js/layerslider.transitions.js')}}"></script>
<script src="{{asset('dist/layerslider/js/layerslider.kreaturamedia.jquery.js')}}"></script>
<script src="{{asset('dist/js/bootstrap-datepicker.js')}}"></script>
<script>
    $('#date_pick').datepicker();
</script>
<script src="{{asset('dist/js/sidebar_carousel_detail_page_func.js')}}"></script>
<script src="{{asset('dist/js/map.js')}}"></script>
<script type="text/javascript">
    'use strict';
    $('#layerslider').layerSlider({
        autoStart: true,
        navButtons: false,
        navStartStop: false,
        showCircleTimer: false,
        responsive: true,
        responsiveUnder: 1280,
        layersContainer: 1200,
        skinsPath: '{{asset("dist/layerslider/skins/")}}'
        // Please make sure that you didn't forget to add a comma to the line endings
        // except the last line!
    });
</script>
<script src="{{asset('dist/js/toastr.min.js')}}"></script>
<script src="{{ asset('dist/js/libs/xeditable/bootstrap-editable.min.js') }}"></script>
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
