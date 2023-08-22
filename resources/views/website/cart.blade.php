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
                <form action="{{route('site.order.store')}}" id="cart-form" method="post">
                    @csrf
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
                                    <input type="hidden" name="product_ids[]" value="{{$item->product_id}}">
                                    <input type="hidden" name="colors[]" value="{{$item->color}}">
                                    <input type="hidden" name="images[]" value="{{$item->image}}">
                                    <input type="hidden" name="prices[]" value="{{$item->price}}">
                                    <td class="product-remove"><a href="{{route('site.cart.product-remove',$item->id)}}" data-cart-item-id="{{$item->id}}" class="remove-wishlist"><i class="fal fa-times"></i></a></td>
                                    <td class="product-thumbnail"><a href="{{route('site.products.show',$item->product_id)}}"><img src="{{$item->image_path}}" alt="Digital Product"></a></td>
                                    <td class="product-title"><a href="{{route('site.products.show',$item->product_id)}}">{{$item->product->name}}</a></td>
                                    <td class="product-color" data-title="Color">{{$item->color}}</td>
                                    <td class="product-price" data-title="Price"><span class="currency-symbol">$</span>{{$item->price}}</td>
                                    <td class="product-quantity" data-title="Qty">
                                        <div class="pro-qty">
                                            <input type="number" name="qtys[]" class="quantity-input" data-product-stoke="{{$item->productVariation($item->color)->stoke}}" data-cart-id="{{$cart->id}}" data-product-price="{{$item->price}}"  data-product-color="{{$item->color}}" data-product-id="{{$item->product_id}}" value="{{$item->qty}}">
                                        </div>
                                    </td>
                                    <td class="product-subtotal" data-title="Subtotal"><span class="currency-symbol">$</span>{{$item->price * $item->qty}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="product-table-footer">
                        @if(count($cart->items) > 0)
                         <a href="javascript:void(0)" id="checkout-btn" class="axil-btn btn-bg-primary checkout-btn">Make an Order</a>
                        @endif
                    </div>
                </form>

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
                var stock = $parentDiv.find('.quantity-input').data('product-stoke')
                var cart_id = $parentDiv.find('.quantity-input').data('cart-id')
                var qty = parseInt($parentDiv.find('.quantity-input').val());

                if(qty >= parseInt(stock)){
                    return;
                }



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
                        toastr.success("Add to Cart Successfully");
                })


            })

            $(document).on('click', '#checkout-btn', function (e) {
                $('#cart-form').submit()
            })
        })
    </script>
@endsection
