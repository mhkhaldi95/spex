@extends('website.layout.master')
@section('content')
    <!-- Start Cart Area  -->
    <div class="axil-product-cart-area axil-section-gap">
        <div class="container">
            <div class="axil-product-cart-wrap">
                <div class="product-table-heading">
                    <h4 class="title">Your Cart</h4>
{{--                    <a href="#" class="cart-clear">Clear Shoping Cart</a>--}}
                </div>
                <div class="table-responsive ">
                    <table class="table axil-product-table axil-cart-table" style="border: 0px ">
                        <thead>
                        <tr>
                            <th scope="col" class="product-remove"></th>
                            <th scope="col" class="product-thumbnail">Product</th>
                            <th scope="col" class="product-title"></th>
                            <th scope="col" class="product-color">Color</th>
                            <th scope="col" class="product-price">Price</th>
                            <th scope="col" class="product-quantity">Quantity</th>
                            <th scope="col" class="product-subtotal">Subtotal</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($cart->items as $item)
                            <tr>
                                <td class="product-remove"><a href="{{route('site.cart.product-remove',$item->id)}}" data-cart-item-id="{{$item->id}}" class="remove-wishlist"><i class="fal fa-times"></i></a></td>
                                <td class="product-thumbnail"><a href="#"><img src="{{$item->image}}" alt="Digital Product"></a></td>
                                <td class="product-title"><a href="#">{{$item->product->name}}</a></td>
                                <td class="product-color" data-title="Color">{{$item->color}}</td>
                                <td class="product-price" data-title="Price"><span class="currency-symbol">$</span>{{$item->price}}</td>
                                <td class="product-quantity" data-title="Qty">
                                    <div class="pro-qty">
                                        <input type="number" class="quantity-input" data-cart-id="{{$cart->id}}" data-product-price="{{$item->price}}"  data-product-color="{{$item->color}}" data-product-id="{{$item->product_id}}" value="{{$item->qty}}">
                                    </div>
                                </td>
                                <td class="product-subtotal" data-title="Subtotal"><span class="currency-symbol">$</span>{{$item->price * $item->qty}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="product-table-footer">
                    <a href="checkout.html" class="axil-btn btn-bg-primary checkout-btn">Make an Order</a>
                </div>
            </div>
        </div>
    </div>
    <!-- End Cart Area  -->
@endsection
@section('scripts')

    <script>



        $(document).ready(function() {
            $(document).on('click', '.qtybtn', function (e) {
                var $parentDiv = $(this).closest('.pro-qty');

                var product_id = $parentDiv.find('.quantity-input').data('product-id');
                var color = $parentDiv.find('.quantity-input').data('product-color')
                var price = $parentDiv.find('.quantity-input').data('product-price')
                var cart_id = $parentDiv.find('.quantity-input').data('cart-id')
                var qty = parseInt($parentDiv.find('.quantity-input').val());



                var qtys = [];
                var colors = [];
                var prices = [];
                var images = [];
                qtys.push(qty);
                colors.push(color);
                prices.push(price);

                axios.post('{{route('add-to-cart')}}',{
                    product_id: product_id, // Assuming product is defined elsewhere in your code
                    qtys: qtys,
                    colors: colors,
                    prices: prices,
                    images: images,
                    from_cart: true,
                }).then(function (response) {
                    console.log("response",response)
                    if (response.data.data) {
                        // toastr.success("Add to Cart Successfully");
                    }
                })


            })
        })
    </script>
@endsection
