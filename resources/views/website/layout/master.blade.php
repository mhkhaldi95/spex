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

<div class="cart-dropdown" id="cart-dropdown">
    <div class="cart-content-wrap">
        <div class="cart-header">
            <h2 class="header-title">Cart review</h2>
            <button class="cart-close sidebar-close"><i class="fas fa-times"></i></button>
        </div>
        <div class="cart-body">
            <ul class="cart-item-list">
                <li class="cart-item">
                    <div class="item-img">
                        <a href="single-product.html"><img src="assets/images/product/electric/product-01.png" alt="Commodo Blown Lamp"></a>
                        <button class="close-btn"><i class="fas fa-times"></i></button>
                    </div>
                    <div class="item-content">
                        <h3 class="item-title"><a href="single-product-3.html">Wireless PS Handler</a></h3>
                        <div class="item-price"><span class="currency-symbol">$</span>155.00</div>
                        <div class="pro-qty item-quantity">
                            <input type="number" class="quantity-input" value="15">
                        </div>
                    </div>
                </li>
                <li class="cart-item">
                    <div class="item-img">
                        <a href="single-product-2.html"><img src="assets/images/product/electric/product-02.png" alt="Commodo Blown Lamp"></a>
                        <button class="close-btn"><i class="fas fa-times"></i></button>
                    </div>
                    <div class="item-content">
                        <h3 class="item-title"><a href="single-product-2.html">Gradient Light Keyboard</a></h3>
                        <div class="item-price"><span class="currency-symbol">$</span>255.00</div>
                        <div class="pro-qty item-quantity">
                            <input type="number" class="quantity-input" value="5">
                        </div>
                    </div>
                </li>
                <li class="cart-item">
                    <div class="item-img">
                        <a href="single-product-3.html"><img src="assets/images/product/electric/product-03.png" alt="Commodo Blown Lamp"></a>
                        <button class="close-btn"><i class="fas fa-times"></i></button>
                    </div>
                    <div class="item-content">
                        <h3 class="item-title"><a href="single-product.html">HD CC Camera</a></h3>
                        <div class="item-price"><span class="currency-symbol">$</span>200.00</div>
                        <div class="pro-qty item-quantity">
                            <input type="number" class="quantity-input" value="100">
                        </div>
                    </div>
                </li>
            </ul>
        </div>
        <div class="cart-footer">
            <h3 class="cart-subtotal">
                <span class="subtotal-title">Subtotal:</span>
                <span class="subtotal-amount">$610.00</span>
            </h3>
            <div class="group-btn">
                <a href="checkout.html" class="axil-btn btn-bg-secondary checkout-btn">Submit</a>
            </div>
        </div>
    </div>
</div>
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
