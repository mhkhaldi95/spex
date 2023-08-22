<!DOCTYPE html>
<html lang="{{app()->getLocale() == 'ar'?'ar':'en'}}" dir="{{app()->getLocale() == 'ar'?'rtl':'ltr'}}">
<!--begin::Head-->
<head>
    <base href="">
    @include('website.layout.head')
</head>
<!--end::Head-->

<body class="sticky-header">

<!-- Start Header Area  -->
@include('website.layout.header')
<!-- End Header Area  -->


<main class="main-wrapper pv-main-wrapper">
    @yield('content')
</main>

<!-- Start Footer Area  -->
@include('website.layout.footer')
<!-- End Footer Area  -->

</body>


<!-- JS
============================================ -->
<!-- Modernizer JS -->
<script src="{{asset('')}}website/assets/js/vendor/modernizr.min.js"></script>
<!-- jQuery JS -->
<script src="{{asset('')}}website/assets/js/vendor/jquery.js"></script>
<!-- Bootstrap JS -->
<script src="{{asset('')}}website/assets/js/vendor/popper.min.js"></script>
<script src="{{asset('')}}website/assets/js/vendor/bootstrap.min.js"></script>
<script src="{{asset('')}}website/assets/js/vendor/slick.min.js"></script>
<script src="{{asset('')}}website/assets/js/vendor/js.cookie.js"></script>
<!-- <script src="assets/js/vendor/jquery.style.switcher.js"></script> -->
<script src="{{asset('')}}website/assets/js/vendor/jquery-ui.min.js"></script>
<script src="{{asset('')}}website/assets/js/vendor/jquery.ui.touch-punch.min.js"></script>
<script src="{{asset('')}}website/assets/js/vendor/jquery.countdown.min.js"></script>
<script src="{{asset('')}}website/assets/js/vendor/sal.js"></script>
<script src="{{asset('')}}website/assets/js/vendor/jquery.magnific-popup.min.js"></script>
<script src="{{asset('')}}website/assets/js/vendor/imagesloaded.pkgd.min.js"></script>
<script src="{{asset('')}}website/assets/js/vendor/isotope.pkgd.min.js"></script>
<script src="{{asset('')}}website/assets/js/vendor/counterup.js"></script>
<script src="{{asset('')}}website/assets/js/vendor/waypoints.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script>

    $('.cart-dropdown-btn').click(function () {
        window.location.href = '{{route('site.cart')}}'
    })
    @if(Session::has('message'))
        toastr.options = {
        "closeButton": false,
        "debug": false,
        "newestOnTop": false,
        "progressBar": false,
        @if(app()->getLocale() == 'ar')
        "positionClass": "toast-top-left",
        @else
        "positionClass": "toast-top-right",
        @endif
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut",
        "fontSize": "35px"
    };

    var type = "{{Session::get('alert-type','info')}}"
    switch (type) {
        case 'info':
            toastr.info("{{Session::get('message') }}");
            break;
        case 'success':
            toastr.success("{{Session::get('message') }}");
            break;
        case 'warning':
            toastr.warning("{{Session::get('message') }}");
            break;
        case 'error':
            toastr.error("{{Session::get('message') }}");
            break;
    }
    @endif
</script>
@yield('scripts')

<!-- Main JS -->
<script src="{{asset('')}}website/assets/js/main.js"></script>

</body>
<!--end::Body-->

</html>
