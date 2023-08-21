
@extends('website.layout.master')
@section('content')

    <main class="main-wrapper">
        <!-- Start Shop Area  -->
        <div class="axil-shop-area axil-section-gap bg-color-white">
            <div class="container">
                <div class="section-title-wrapper">
                    <h3 class="title text-center">[{{$brand->name}}] Collections</h3>
                </div>
                <div class="row row--15">
                    @foreach($collections as $collection)
                    <div class="col-xl-4 col-lg-4 col-sm-6">
                        <div class="pv-single-demo">
                            <div class="thumb box">
                                <div class="collection-image-parent">
                                    <div class="collection-image-child" style="background-image: url('{{$collection->image}}')">
                                    </div>
                                </div>
                                <a href="{{route('site.collections.products',$collection->id)}}" class="axil-btn btn-bg-primary right-icon view-btn">Details <i
                                        class="fal fa-long-arrow-right"></i></a>
                            </div>
                            <h5 class="title"><a href="{{route('site.collections.products',$collection->id)}}">{{$collection->name}}</a></h5>
                        </div>
                    </div>
                    @endforeach
                    <!-- End Single Product  -->


                </div>
            </div>
            <!-- End .container -->
        </div>
        <!-- End Shop Area  -->
    </main>

@endsection
