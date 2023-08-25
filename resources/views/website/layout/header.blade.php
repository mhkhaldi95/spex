@php
    use \App\Models\Cart;
    use \App\Models\Collection;
    use \App\Models\Brand;
    $cart_count = 0;
    if(auth()->check()){
        $cart = Cart::query()->firstOrCreate(['user_id' => auth()->id()]);
        $cart_count = $cart->items->count();
    }
    $collections = Collection::query()->active()->get();
    $brands = Brand::query()->active()->get();

@endphp
<header class="header axil-header header-style-1">
    <div class="header-top-campaign py-3">
        <div class="container position-relative">
            <div class="campaign-content">
                <p id="advertisements"></p>
            </div>
        </div>
        <button class="remove-campaign"><i class="fal fa-times"></i></button>
    </div>
    <!-- Start Mainmenu Area  -->
    <div id="axil-sticky-placeholder"></div>
    <div class="axil-mainmenu pt-5">
        <div class="container">
            <div class="header-navbar">
                <div class="header-brand" style="transform: scale(0.5)" >
                    <a href="#" class="logo" >
                        <img src="{{asset('')}}website/assets/images/logo/logo3.png" alt="Site Logo">
                    </a>
                </div>
                <div class="header-main-nav">
                    <!-- Start Mainmanu Nav -->
                    <nav class="mainmenu-nav">
                        <button class="mobile-close-btn mobile-nav-toggler"><i class="fas fa-times"></i></button>
                        <div class="mobile-nav-brand">
                            <a href="#" class="logo">
                                <img src="{{asset('')}}website/assets/images/logo/logo.png" alt="Site Logo">
                            </a>
                        </div>
                        <ul class="mainmenu">
                            <li class="menu-item-has-children">
                                <a href="#">Brands</a>
                                <ul class="axil-submenu">
                                    @foreach($brands as $brand)
{{--                                    <li><a href="#" class="active">Brand One</a></li>--}}
                                    <li><a href="{{route('site.brands.collections',$brand->id)}}">{{$brand->name}}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                            <li class="menu-item-has-children">
                                <a href="#">Collections</a>
                                <ul class="axil-submenu">
                                    @foreach($collections as $collection)
                                    <li><a href="{{route('site.collections.products',$collection->id)}}">{{$collection->name}}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                            <li><a href="{{route('site.about')}}">About Us</a></li>

                        </ul>
                    </nav>
                    <!-- End Mainmanu Nav -->
                </div>
                <div class="header-action">
                    <ul class="action-list">
                        <li class="shopping-cart">

                            <a href="{{route('site.cart')}}" class="cart-dropdown-btn">
                                <span class="cart-count" id="cart-count">{{$cart_count}}</span>
                                <i class="flaticon-shopping-cart"></i>
                            </a>
                        </li>
                        <li class="my-account">
                            <a href="javascript:void(0)">
                                <i class="flaticon-person"></i>
                            </a>
                            <div class="my-account-dropdown">
                                <ul>
                                    <li>
                                        <a href="{{auth()->check()?route('site.myaccount'):route('login')}}">My Account</a>
                                    </li>
                                    <li>
                                        <a href="{{auth()->check()?route('logout'):route('login')}}">
                                            {{auth()->check()?'Logout':'Sign in'}}
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="axil-mobile-toggle">
                            <button class="menu-btn mobile-nav-toggler">
                                <i class="flaticon-menu-2"></i>
                            </button>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Mainmenu Area -->
</header>
