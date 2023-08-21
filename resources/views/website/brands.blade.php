@extends('website.layout.master')
@section('content')
    <!-- Start Page Demo Area  -->
    <div class="pv-demo-area" id="demos">
        <div class="container">
            <div class="section-title-wrapper">
                <h3 class="title text-center">Our Brands</h3>
            </div>
            <div class="row">
                @foreach($brands as $brand)
                    <!-- Start Single Demo  -->
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="pv-single-demo">
                            <div class="thumb box">
                                <div class="brand-image-parent">
                                    <div class="brand-image-child" style="background-image: url('{{$brand->image}}')">
                                    </div>
                                </div>
                                <a href="{{route('site.brands.collections',$brand->id)}}" class="axil-btn btn-bg-primary right-icon view-btn">Details <i
                                        class="fal fa-long-arrow-right"></i></a>
                            </div>
                            <h5 class="title"><a href="{{route('site.brands.collections',$brand->id)}}">{{$brand->name}}</a></h5>
                        </div>
                    </div>
                    <!-- End Single Demo  -->
                @endforeach

            </div>
        </div>
    </div>
    <!-- End Page Demo Area  -->
@endsection
