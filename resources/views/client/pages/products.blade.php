@extends('client.layouts.master', ['pageTitle' => 'Sản phẩm'])
@section('content')

    <!-- START SECTION SHOP -->
    <div class="section">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="row align-items-center mb-4 pb-1">
                        <div class="col-12">
                            <div class="product_header">
                                <div class="product_header_left">
                                    <div class="custom_select">
                                        <select class="form-control form-control-sm">
                                            <option value="order">Default sorting</option>
                                            <option value="popularity">Sort by popularity</option>
                                            <option value="date">Sort by newness</option>
                                            <option value="price">Sort by price: low to high</option>
                                            <option value="price-desc">Sort by price: high to low</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="product_header_right">
                                    <div class="products_view">
                                        <a href="javascript:Void(0);" class="shorting_icon grid"><i class="ti-view-grid"></i></a>
                                        <a href="javascript:Void(0);" class="shorting_icon list active"><i class="ti-layout-list-thumb"></i></a>
                                    </div>
                                    <div class="custom_select">
                                        <select class="form-control form-control-sm">
                                            <option value="">Showing</option>
                                            <option value="9">9</option>
                                            <option value="12">12</option>
                                            <option value="18">18</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row shop_container list">
                        @foreach($products as $product)
                        <div class="col-md-4 col-6">
                            <div class="product">
                                <div class="product_img">
                                    <a href="">
                                        <img src="{{url('uploads')}}/{{$product->image}}" alt="{{$product->name}}">
                                    </a>
                                    <div class="product_action_box">
                                        <ul class="list_none pr_action_btn">
                                            <li class="add-to-cart"><a href="#"><i class="icon-basket-loaded"></i> Thêm vào giỏ hàng</a></li>
                                            <li><a href="shop-compare.html" class="popup-ajax"><i class="icon-shuffle"></i></a></li>
                                            <li><a href="shop-quick-view.html" class="popup-ajax"><i class="icon-magnifier-add"></i></a></li>
                                            <li><a href="#"><i class="icon-heart"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="product_info">
                                    <h6 class="product_title"><a href="{{route('clients.product_detail', $product->id)}}">{{$product->name}}</a></h6>
                                    <div class="product_price">
                                        <span class="price">{{$product->promotional_price}}đ</span>
                                        <del>{{$product->regular_price}}đ</del>
                                        <div class="on_sale">
                                            <span>{{($product->regular_price - $product->promotional_price)/$product->regular_price *100}}% Off</span>
                                        </div>
                                    </div>
                                    <div class="rating_wrap">
                                        <div class="rating">
                                            <div class="product_rate" style="width:80%"></div>
                                        </div>
                                        <span class="rating_num">(21)</span>
                                    </div>
                                    <div class="pr_desc">
                                        <p>{{$product->description}}</p>
                                    </div>
                                    <div class="pr_switch_wrap">
                                        <div class="product_color_switch">
                                            <span class="active" data-color="#87554B"></span>
                                            <span data-color="#333333"></span>
                                            <span data-color="#DA323F"></span>
                                        </div>
                                    </div>
                                    <div class="list_product_action_box">
                                        <ul class="list_none pr_action_btn">
                                            <li class="add-to-cart"><a href="{{route('clients.add_to_cart', $product->id)}}"><i class="icon-basket-loaded"></i> Thêm vào giỏ hàng</a></li>
                                            <li><a href="shop-compare.html" class="popup-ajax"><i class="icon-shuffle"></i></a></li>
                                            <li><a href="shop-quick-view.html" class="popup-ajax"><i class="icon-magnifier-add"></i></a></li>
                                            <li><a href="#"><i class="icon-heart"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <ul class="pagination mt-3 justify-content-center pagination_style1">
                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#"><i class="linearicons-arrow-right"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 order-lg-first mt-4 pt-2 mt-lg-0 pt-lg-0">
                    <div class="sidebar">
                        <div class="widget">
                            <h5 class="widget_title">Danh mục sản phẩm</h5>
                            <ul class="widget_categories">
                                @foreach($categories as $category)
                                <li><a href="#"><span class="categories_name">{{$category->name}}</span><span class="categories_num">(9)</span></a></li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="widget">
                            <h5 class="widget_title">Filter</h5>
                            <div class="filter_price">
                                <div id="price_filter" data-min="0" data-max="500" data-min-value="50" data-max-value="300" data-price-sign="$"></div>
                                <div class="price_range">
                                    <span>Price: <span id="flt_price"></span></span>
                                    <input type="hidden" id="price_first">
                                    <input type="hidden" id="price_second">
                                </div>
                            </div>
                        </div>
                        <div class="widget">
                            <h5 class="widget_title">Brand</h5>
                            <ul class="list_brand">
                                <li>
                                    <div class="custome-checkbox">
                                        <input class="form-check-input" type="checkbox" name="checkbox" id="Arrivals" value="">
                                        <label class="form-check-label" for="Arrivals"><span>New Arrivals</span></label>
                                    </div>
                                </li>
                                <li>
                                    <div class="custome-checkbox">
                                        <input class="form-check-input" type="checkbox" name="checkbox" id="Lighting" value="">
                                        <label class="form-check-label" for="Lighting"><span>Lighting</span></label>
                                    </div>
                                </li>
                                <li>
                                    <div class="custome-checkbox">
                                        <input class="form-check-input" type="checkbox" name="checkbox" id="Tables" value="">
                                        <label class="form-check-label" for="Tables"><span>Tables</span></label>
                                    </div>
                                </li>
                                <li>
                                    <div class="custome-checkbox">
                                        <input class="form-check-input" type="checkbox" name="checkbox" id="Chairs" value="">
                                        <label class="form-check-label" for="Chairs"><span>Chairs</span></label>
                                    </div>
                                </li>
                                <li>
                                    <div class="custome-checkbox">
                                        <input class="form-check-input" type="checkbox" name="checkbox" id="Accessories" value="">
                                        <label class="form-check-label" for="Accessories"><span>Accessories</span></label>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="widget">
                            <h5 class="widget_title">Size</h5>
                            <div class="product_size_switch">
                                <span>xs</span>
                                <span>s</span>
                                <span>m</span>
                                <span>l</span>
                                <span>xl</span>
                                <span>2xl</span>
                                <span>3xl</span>
                            </div>
                        </div>
                        <div class="widget">
                            <h5 class="widget_title">Color</h5>
                            <div class="product_color_switch">
                                <span data-color="#87554B"></span>
                                <span data-color="#333333"></span>
                                <span data-color="#DA323F"></span>
                                <span data-color="#2F366C"></span>
                                <span data-color="#B5B6BB"></span>
                                <span data-color="#B9C2DF"></span>
                                <span data-color="#5FB7D4"></span>
                                <span data-color="#2F366C"></span>
                            </div>
                        </div>
                        <div class="widget">
                            <div class="shop_banner">
                                <div class="banner_img overlay_bg_20">
                                    <img src="assets/images/sidebar_banner_img.jpg" alt="sidebar_banner_img">
                                </div>
                                <div class="shop_bn_content2 text_white">
                                    <h5 class="text-uppercase shop_subtitle">New Collection</h5>
                                    <h3 class="text-uppercase shop_title">Sale 30% Off</h3>
                                    <a href="#" class="btn btn-white rounded-0 btn-sm text-uppercase">Shop Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END SECTION SHOP -->

@endsection
