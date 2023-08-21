@extends('website.layout.master')
@section('content')

    <main class="main-wrapper">
        <!-- Start Shop Area  -->
        <div class="axil-shop-area axil-section-gap bg-color-white">
            <div class="container p-5">
                <div class="section-title-wrapper">
                    <h3 class="title text-center">[{{$collection->name}}] Products</h3>
                </div>
                <div class="row row--15">
                    @foreach($products as $product)
                        <div class="col-xl-4 col-lg-4 col-sm-6">
                            <div class="pv-single-demo">
                                <div class="thumb box">
                                    <div class="product-image-parent">
                                        <div class="product-image-child"
                                             style="background-image: url('{{$product->avatar}}')">
                                        </div>
                                    </div>
                                    <a href="{{route('site.products.show',$product->id)}}"
                                       class="axil-btn btn-bg-primary right-icon view-btn">Details <i
                                            class="fal fa-long-arrow-right"></i></a>
                                </div>
                                <h5 class="title"><a
                                        href="{{route('site.products.show',$product->id)}}">{{$product->name}}</a>
                                </h5>
                            </div>
                        </div>
                    @endforeach

                </div>
                {{--                <div class="text-center pt--30">--}}
                {{--                    <a href="#" class="axil-btn btn-bg-lighter btn-load-more">Load more</a>--}}
                {{--                </div>--}}
            </div>
            <!-- End .container -->
        </div>
        <!-- End Shop Area  -->
    </main>

@endsection
