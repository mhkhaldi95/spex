@extends('website.layout.master')
@section('content')

    <input type="hidden" id="stoke_type" value="{{$product->stoke_type}}">
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
                                                <div class="thumbnail product-image-view-parent">
                                                    <div class="product-image-view-child" data-image="{{$image->image}}"
                                                         style="background-image: url('{{$image->image}}')">

                                                    </div>
                                                </div>
                                            @endforeach
                                            @foreach($product->variations as $index=>$variation)
                                                <div class="thumbnail product-image-view-parent" >
                                                    <div class="product-image-view-child" data-image="{{$variation->image_path}}"
                                                         style="background-image: url('{{$variation->image_path}}')">

                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                        <div class="label-block">
                                        </div>
                                        <div class="product-quick-view position-view">
                                            {{--                                            <a href="{{asset('')}}assets/images/product/product-big-01.png" class="popup-zoom">--}}
                                            {{--                                                <i class="far fa-search-plus"></i>--}}
                                            {{--                                            </a>--}}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-2 order-lg-1">
                                    <div class="product-small-thumb-3 small-thumb-wrapper" >
                                        @foreach($product->images as $image)
                                            <div class="small-thumb-img" >
                                                <img src="{{$image->image}}" alt="thumb image">
                                            </div>
                                        @endforeach
                                            @foreach($product->variations as $index=>$variation)
                                            <div class="small-thumb-img" id="image_color_{{$index}}">
                                                <img src="{{$variation->image_path}}" alt="thumb image">
                                            </div>
                                        @endforeach

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
                                        <div class="product-variation">
                                            <h6 class="title">Colors:</h6>
                                            <div class="color-variant-wrapper">
                                                <ul class="color-variant">
                                                    @foreach($product->variations as $index=>$variation)
                                                        <li data-code-color="{{$variation->color_code}}" class="border_image_color" data-index="{{$index}}">
                                                            <span>
                                                                <span class="color" style="background: {{$variation->color_code}};"> </span>
                                                            </span>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                        <!-- End Product Variation  -->
                                    </div>

                                    <div class="axil-product-cart-wrap">
                                        <div class="table-responsive">
                                            <table class="table axil-product-table axil-cart-table mb--40">
                                                <thead>
                                                <tr>
                                                    <th scope="col" class="product-thumbnail">Product</th>
                                                    <th scope="col" class="product-title"> Color</th>
                                                    <th scope="col" class="product-price">Price</th>
                                                    <th scope="col" class="product-quantity">Quantity</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($product->variations as $variation)
                                                    <tr>
                                                        <td class="product-thumbnail"><a href="#"><img
                                                                    class="cart-image"
                                                                    data-image="{{$variation->image}}"
                                                                    src="{{$variation->image_path}}"></a></td>
                                                        <td class="product-title"><a href="#"
                                                                                     class="cart-color">{{$variation->color}}</a>
                                                        </td>
                                                        <td class="product-price" data-title="Price"><span
                                                                class="currency-symbol">$</span><span
                                                                class="cart-price">{{$variation->price}}</span></td>
                                                        <td class="product-quantity" data-title="Qty">
                                                            <div class="pro-qty">
                                                                <input type="number" class="quantity-input cart-qty" data-product-stoke="{{$variation->stoke}}"
                                                                       data-product-stoke-type="{{$product->stoke_type}}"   value="0">
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
                                            <li class="add-to-cart"><a
                                                    href="{{auth()->check()?'javascript:void(0)':route('login')}}"
                                                    class="axil-btn btn-bg-primary {{auth()->check()?'add-to-card-btn':''}}"
                                                    data-product-id="{{$product->id}}">Add to Cart</a></li>
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
@section('scripts')

    <script>


        $(document).ready(function () {
            $('.product-image-view-child').click(function () {
                var image = $(this).data('image')
                console.log("image", image)
                window.open(image, '_blank')
            })

            $(document).on('click', '.add-to-card-btn', function (e) {
                var stoke_type = $('#stoke_type').val();
                var product_id = $(this).data('product-id')

                var qtys = [];
                var colors = [];
                var prices = [];
                var images = [];
                $('.cart-qty').each(function (index) {
                    var qty = parseInt($(this).val());
                    var color = $('.cart-color').eq(index).html();
                    var image = $('.cart-image').eq(index).data('image');
                    var price = parseInt($('.cart-price').eq(index).html());
                    qtys.push(qty);
                    colors.push(color);
                    images.push(image);
                    prices.push(price);
                })
                var is_all_zero_qty = true;
                qtys.forEach(function (qty) {
                    if(qty > 0){
                        is_all_zero_qty = false
                        return;
                    }
                })
                if(is_all_zero_qty){
                    toastr.warning("Add Quantity");
                    return;
                }

                axios.post('{{route('add-to-cart')}}', {
                    product_id: product_id, // Assuming product is defined elsewhere in your code
                    qtys: qtys,
                    colors: colors,
                    prices: prices,
                    images: images
                }).then(function (response) {
                    console.log("response", response)
                    if (response.data.data) {
                        $('#cart-count').html(response.data.data.count_cart)
                        $('.cart-qty').each(function (index) {
                            $(this).val(0);
                        })
                        toastr.success("Add to Cart Successfully");
                    }
                })


            })

            $(document).on('click', '.border_image_color', function (e) {
                var index = $(this).data('index')
                console.log("index",index)
                $(`#image_color_${index}`).click()
            })
        })
    </script>
@endsection
