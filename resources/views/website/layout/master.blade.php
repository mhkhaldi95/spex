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

<!-- Main JS -->
<script src="{{asset('')}}website/assets/js/main.js"></script>

</body>
<!--end::Body-->

</html>
