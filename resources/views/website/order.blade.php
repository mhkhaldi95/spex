@extends('website.layout.master')
@section('content')
    <!-- Start Cart Area  -->
    <div class="axil-product-cart-area axil-section-gap">
        <div class="container">
            <div class="axil-product-cart-wrap">
                <div class="product-table-heading">
                    <h4 class="title">Order Details</h4>
{{--                    <a href="#" class="cart-clear">Clear Shoping Cart</a>--}}
                </div>
                <div class="table-responsive ">
                    <table class="table axil-product-table axil-cart-table" style="border: 0px ">
                        <thead>
                        <tr>
                            <th scope="col" class="product-thumbnail">Product</th>
                            <th scope="col" class="product-title"></th>
                            <th scope="col" class="product-color">Color</th>
                            <th scope="col" class="product-price">Price</th>
                            <th scope="col" class="product-quantity">Quantity</th>
                            <th scope="col" class="product-subtotal">Subtotal</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($order->items as $item)
                            <tr>
                                <td class="product-thumbnail"><a href="{{route('site.products.show',$item->product_id)}}"><img src="{{$item->image_path}}" alt="Digital Product"></a></td>
                                <td class="product-title"><a href="{{route('site.products.show',$item->product_id)}}">{{$item->product->name}}</a></td>
                                <td class="product-color" data-title="Color">{{$item->color}}</td>
                                <td class="product-price" data-title="Price"><span class="currency-symbol">$</span>{{$item->price}}</td>
                                <td class="product-price" data-title="Qty">{{$item->qty}}</td>
                                <td class="product-subtotal" data-title="Subtotal"><span class="currency-symbol">$</span>{{$item->price * $item->qty}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
    <!-- End Cart Area  -->
@endsection

