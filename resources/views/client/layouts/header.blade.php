<header class="header_wrap fixed-top header_with_topbar">
    <div class="top-header">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="d-flex align-items-center justify-content-center justify-content-md-start">
                        <div class="lng_dropdown mr-2">
                            <select name="countries" class="custome_select">
                                <option value='fn' data-image="{{url('client')}}/images/vn.png" data-title="France">
                                    Tiếng Việt
                                </option>
                                <option value='en' data-image="{{url('client')}}/images/eng.png" data-title="English">
                                    Tiếng Anh
                                </option>
                            </select>
                        </div>
                        <div class="mr-3">
                            <select name="countries" class="custome_select">
                                <option value='USD' data-title="USD">USD</option>
                                <option value='EUR' data-title="EUR">EUR</option>
                                <option value='GBR' data-title="GBR">GBR</option>
                            </select>
                        </div>
                        <ul class="contact_detail text-center text-lg-left">
                            <li><i class="ti-mobile"></i><span>123-456-7890</span></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="text-center text-md-right">
                        <ul class="header_list">
                            <li><a href="{{route('clients.show_compare')}}"><i
                                        class="ti-control-shuffle"></i><span>So sánh</span></a></li>
                            <li><a href="{{route('clients.wishlist')}}"><i class="ti-heart"></i><span>Danh sách yêu thích</span></a>
                            </li>
                            @if(Auth::guard('web')->user())
                                <li><a href="{{route('clients.account')}}"><i
                                            class="ti-user"></i><span>{{Auth::guard('web')->user()->name}}</span></a>
                                </li>
                            @else
                                <li><a href="{{route('clients.login')}}"><i
                                            class="ti-user"></i><span>Đăng nhập</span></a></li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="bottom_header dark_skin main_menu_uppercase">
        <div class="container">
            <nav class="navbar navbar-expand-lg">
                <a class="navbar-brand" href="{{route('clients.home')}}">
                    <img class="logo_light" src="{{url('client')}}/images/logo_light.png" alt="logo"/>
                    <img class="logo_dark" src="{{url('client')}}/images/logo_dark.png" alt="logo"/>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-expanded="false">
                    <span class="ion-android-menu"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                    <ul class="navbar-nav">
                        <li class="dropdown">
                            <a class="nav-link nav_item {{ Request::routeIs('clients.home') ? 'active' : '' }}"
                               href="{{route('clients.home')}}">Trang chủ</a>
                        </li>
                        <li class="dropdown">
                            <a class="nav-link nav_item {{ Request::routeIs('clients.about_us') ? 'active' : '' }}"
                               href="{{route('clients.about_us')}}">Giới thiệu</a>
                        </li>
                        <li class="dropdown dropdown-mega-menu">
                            <a class="nav-link nav_item {{ Request::routeIs('clients.products') ? 'active' : '' }}"
                               href="{{route('clients.products')}}">Sản phẩm</a>
                        </li>
                        <li class="dropdown">
                            <a class="nav-link nav_item {{ Request::routeIs('clients.blogs') ? 'active' : '' }}"
                               href="{{route('clients.blogs')}}">Tin tức</a>
                        </li>
                        <li><a class="nav-link nav_item {{ Request::routeIs('clients.contact') ? 'active' : '' }}"
                               href="{{route('clients.contact')}}">Liên hệ</a></li>
                    </ul>
                </div>
                <ul class="navbar-nav attr-nav align-items-center">
                    <li><a href="javascript:void(0);" class="nav-link search_trigger"><i
                                class="linearicons-magnifier"></i></a>
                        <div class="search_wrap">
                            <span class="close-search"><i class="ion-ios-close-empty"></i></span>
                            <form>
                                <input type="text" placeholder="Tìm kiếm" class="form-control" id="search_input">
                                <button type="submit" class="search_icon"><i class="ion-ios-search-strong"></i></button>
                            </form>
                        </div>
                        <div class="search_overlay"></div>
                    </li>
                    <li class="dropdown cart_dropdown"><a class="nav-link cart_trigger" href="#" data-toggle="dropdown"><i
                                class="linearicons-cart"></i><span
                                class="cart_count">{{$cart->total_quantity}}</span></a>
                        @if($cart->total_quantity > 0)
                            <div class="cart_box dropdown-menu dropdown-menu-right">
                                <ul class="cart_list">
                                    @foreach($cart->items as $item)
                                        <li>
                                            <a action="{{route('clients.delete_cart', $item['id'])}}"
                                               class="btn-delete item_remove"><i
                                                    class="ion-close"></i></a>
                                            <a href="{{route('clients.product_detail', $item['id'])}}"><img
                                                    src="{{url('uploads')}}/{{$item['image']}}"
                                                    alt="cart_thumb1">{{$item['name']}}</a>
                                            <span class="cart_quantity"> {{$item['quantity']}} x <span
                                                    class="cart_amount"> </span>₫{{number_format($item['price'])}}
                                        </li>
                                    @endforeach
                                </ul>
                                <div class="cart_footer">
                                    <p class="cart_total"><strong>Tổng tiền:</strong> <span class="cart_price"> <span
                                                class="price_symbole">₫</span></span>{{number_format($cart->total_price)}}
                                    </p>
                                    <p class="cart_buttons">
                                        <a href="{{route('clients.show_cart')}}"
                                           class="btn btn-fill-line rounded-0 view-cart">Giỏ hàng</a>
                                        <a href="{{route('clients.checkout')}}"
                                           class="btn btn-fill-out rounded-0 checkout">Thanh toán</a>
                                    </p>
                                </div>
                            </div>
                        @endif
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</header>
