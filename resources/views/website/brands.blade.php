@extends('website.layout.master')
@section('content')
    <!-- Start Page Demo Area  -->
    <div class="pv-demo-area" id="demos">
        <div class="container">
            <div class="section-title-wrapper">
                <h3 class="title text-center">Our Brands</h3>
            </div>
            <div class="row">
                <!-- Start Single Demo  -->
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="pv-single-demo">
                        <div class="thumb box">
                            <img src="{{asset('')}}website/assets/images/preview/home-07.png" alt="Most Unique eCommerce">
                            <a href="index-7.html" class="axil-btn btn-bg-primary right-icon view-btn">View Demo <i class="fal fa-long-arrow-right"></i></a>
                        </div>
                        <h5 class="title"><a href="index-7.html">Multipurpose</a></h5>
                    </div>
                </div>
                <!-- End Single Demo  -->
                <!-- Start Single Demo  -->
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="pv-single-demo p-10">
                        <div class="thumb box">
                            <img src="{{asset('')}}website/assets/images/preview/home-01.png" alt="Most Unique eCommerce">
                            <a href="index-1.html" class="axil-btn btn-bg-primary right-icon view-btn">View Demo <i class="fal fa-long-arrow-right"></i></a>
                        </div>
                        <h5 class="title"><a href="index-1.html">Electronics</a></h5>
                    </div>
                </div>
                <!-- End Single Demo  -->

            </div>
        </div>
    </div>
    <!-- End Page Demo Area  -->
@endsection
