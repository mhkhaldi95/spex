
@extends('website.layout.master')
@section('content')

    <main class="main-wrapper">
        <!-- Start Shop Area  -->
        <div class="axil-single-product-area axil-section-gap pb--0 bg-color-white">
            <div class="single-product-thumb">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 mb--40">
                            <div class="row">
                                <div class="col-lg-10 order-lg-2">
                                    <div class="single-product-thumbnail-wrap zoom-gallery">
                                        <div class="single-product-thumbnail product-large-thumbnail-3 axil-product">
                                            @foreach($product->images as $image)
                                            <div class="thumbnail">
                                                <a href="{{$image->image}}" class="popup-zoom">
                                                    <img src="{{$image->image}}" alt="Product Images">
                                                </a>
                                            </div>
                                            @endforeach
                                        </div>
                                        <div class="label-block">
                                        </div>
                                        <div class="product-quick-view position-view">
                                            <a href="{{asset('')}}assets/images/product/product-big-01.png" class="popup-zoom">
                                                <i class="far fa-search-plus"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-2 order-lg-1">
                                    <div class="product-small-thumb-3 small-thumb-wrapper">
                                        <div class="small-thumb-img">
                                            <img src="{{asset('')}}website/assets/images/product/product-thumb/thumb-08.png" alt="thumb image">
                                        </div>
                                        <div class="small-thumb-img">
                                            <img src="{{asset('')}}website/assets/images/product/product-thumb/thumb-07.png" alt="thumb image">
                                        </div>
                                        <div class="small-thumb-img">
                                            <img src="{{asset('')}}website/assets/images/product/product-thumb/thumb-09.png" alt="thumb image">
                                        </div>
                                        <div class="small-thumb-img">
                                            <img src="{{asset('')}}website/assets/images/product/product-thumb/thumb-07.png" alt="thumb image">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 mb--40">
                            <div class="single-product-content">
                                <div class="inner">
                                    <h2 class="product-title">{{$product->name}}</h2>
                                    <p class="description">{{$product->description}}</p>

                                    <div class="product-variations-wrapper">

                                        <!-- Start Product Variation  -->
{{--                                        <div class="product-variation">--}}
{{--                                            <h6 class="title">Colors:</h6>--}}
{{--                                            <div class="color-variant-wrapper">--}}
{{--                                                <ul class="color-variant">--}}
{{--                                                    <li class="color-extra-01 active"><span><span class="color"></span></span>--}}
{{--                                                    </li>--}}
{{--                                                    <li class="color-extra-02"><span><span class="color"></span></span>--}}
{{--                                                    </li>--}}
{{--                                                    <li class="color-extra-03"><span><span class="color"></span></span>--}}
{{--                                                    </li>--}}
{{--                                                </ul>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
                                        <!-- End Product Variation  -->
                                    </div>

                                    <div class="axil-product-cart-wrap">
                                        <div class="table-responsive">
                                            <table class="table axil-product-table axil-cart-table mb--40">
                                                <thead>
                                                <tr >
                                                    <th scope="col" class="product-thumbnail">Product</th>
                                                    <th scope="col" class="product-title"> Color  </th>
                                                    <th scope="col" class="product-price">Price</th>
                                                    <th scope="col" class="product-quantity">Quantity</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($product->variations as $variation)
                                                <tr>
                                                    <td class="product-thumbnail"><a href="#"><img src="{{$variation->image}}" ></a></td>
                                                    <td class="product-title"><a href="single-product.html">{{$variation->color}}</a></td>
                                                    <td class="product-price" data-title="Price"><span class="currency-symbol">$</span>{{$variation->price}}</td>
                                                    <td class="product-quantity" data-title="Qty">
                                                        <div class="pro-qty">
                                                            <input type="number" class="quantity-input" value="1">
                                                        </div>
                                                    </td>
                                                </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                    <!-- Start Product Action Wrapper  -->
                                    <div class="product-action-wrapper d-flex-center">

                                        <!-- Start Product Action  -->
                                        <ul class="product-action d-flex-center mb--0">
                                            <li class="add-to-cart"><a href="cart.html" class="axil-btn btn-bg-primary">Add to Cart</a></li>
                                        </ul>
                                        <!-- End Product Action  -->

                                    </div>
                                    <!-- End Product Action Wrapper  -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End .single-product-thumb -->

        </div>
        <!-- End Shop Area  -->
    </main>

@endsection
