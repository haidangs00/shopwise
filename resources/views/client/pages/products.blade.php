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
                                        <a href="javascript:Void(0);" class="shorting_icon grid"><i
                                                class="ti-view-grid"></i></a>
                                        <a href="javascript:Void(0);" class="shorting_icon list active"><i
                                                class="ti-layout-list-thumb"></i></a>
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
                                                <li class="add-to-cart">
                                                    <a class="btn-add-cart"
                                                       href="{{route('clients.add_to_cart', $product->id)}}">
                                                        <i class="icon-basket-loaded"></i>
                                                        Thêm vào giỏ hàng
                                                    </a>
                                                </li>
                                                <li><a href="{{route('clients.add_compare', $product->id)}}"
                                                       class="add_compare"><i
                                                            class="icon-shuffle"></i></a></li>
                                                <li><a href="{{route('clients.quick_view_product', $product->id)}}"
                                                       class="popup-ajax"><i
                                                            class="icon-magnifier-add"></i></a></li>
                                                <li>
                                                    <a class="btn-heart"
                                                       href="{{route('clients.add_to_list', $product->id)}}">
                                                        <i class="icon-heart"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product_info">
                                        <h6 class="product_title"><a
                                                href="{{route('clients.product_detail', $product->id)}}">{{$product->name}}</a>
                                        </h6>
                                        <div class="product_price">
                                            <span class="price">₫{{number_format($product->promotional_price)}}</span>
                                            <del>₫{{number_format($product->regular_price)}}</del>
                                            <div class="on_sale">
                                                <span>{{number_format(($product->regular_price - $product->promotional_price)/$product->regular_price *100)}}% Off</span>
                                            </div>
                                        </div>
                                        <div class="rating_wrap">
                                            <div class="rating">
                                                <div class="product_rate" style="width:{{100*($product->getRating()/5)}}%"></div>
                                            </div>
                                            <span class="rating_num">(21)</span>
                                        </div>
                                        <div class="pr_desc">
                                            <p>{{$product->description}}</p>
                                        </div>
                                        <div class="pr_switch_wrap">
                                            <div class="product_color_switch">
                                                @foreach($product->productColors as $color)
                                                    <span class="{{$loop->index == 0?'active':''}}"
                                                          data-color="{{$color->getColorCode()}}"></span>
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="list_product_action_box">
                                            <ul class="list_none pr_action_btn">
                                                <li class="add-to-cart"><a class="btn-add-cart"
                                                                           href="{{route('clients.add_to_cart', $product->id)}}"><i
                                                            class="icon-basket-loaded"></i> Thêm vào giỏ hàng</a></li>
                                                <li><a class="add_compare"
                                                       href="{{route('clients.add_compare', $product->id)}}"><i
                                                            class="icon-shuffle"></i></a></li>
                                                <li><a class="popup-ajax"
                                                       href="{{route('clients.quick_view_product', $product->id)}}"><i
                                                            class="icon-magnifier-add"></i></a></li>
                                                <li><a class="btn-heart"
                                                       href="{{route('clients.add_to_list', $product->id)}}"><i
                                                            class="icon-heart"></i></a></li>
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
                                <li class="page-item"><a class="page-link" href="#"><i
                                            class="linearicons-arrow-right"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 order-lg-first mt-4 pt-2 mt-lg-0 pt-lg-0">
                    <div class="sidebar">
                        <form>
                            <div class="widget">
                                <h5 class="widget_title">Danh mục sản phẩm</h5>
                                <ul class="widget_categories">
                                    <li><a href="{{route('clients.products')}}"><span
                                                class="categories_name">Tất cả</span></a>
                                    </li>
                                    @foreach($categories as $category)
                                        @if($category->products_count > 0)
                                            <li><a href="{{route('clients.products', $category->slug)}}"><span
                                                        class="categories_name">{{$category->name}}</span><span
                                                        class="categories_num">({{$category->products_count}})</span></a>
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                            <div class="widget">
                                <h5 class="widget_title">Lọc theo giá</h5>
                                <div class="filter_price">
                                    <div id="price_filter" data-min="0" data-max="{{$maxPrice + 100000}}"
                                         data-min-value="{{$minPrice}}"
                                         data-max-value="{{$maxPrice}}" data-price-sign="₫"></div>
                                    <div class="price_range">
                                        <span>Khoảng giá: <span id="flt_price"></span></span>
                                        <input type="hidden" name="price_first" id="price_first">
                                        <input type="hidden" name="price_second" id="price_second">
                                    </div>
                                </div>
                            </div>
                            <div class="widget">
                                <h5 class="widget_title">Nhãn hàng</h5>
                                <ul class="list_brand">
                                    @foreach($brands as $brand)
                                        <li>
                                            <div class="custome-checkbox">
                                                <input class="form-check-input" type="checkbox" name="brands[]"
                                                       id="{{$brand->name}}"
                                                       value="{{$brand->id}}">
                                                <label class="form-check-label"
                                                       for="{{$brand->name}}"><span>{{$brand->name}}</span></label>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="widget">
                                <h5 class="widget_title">Size</h5>
                                <div class="product_size_switch">
                                    @foreach ($sizes as $size)
                                        <input type="hidden" name="" id="size-{{$size->id}}" value="">
                                        <span data-id="{{$size->id}}">{{$size->name}}</span>
                                    @endforeach
                                </div>
                            </div>
                            <div class="widget">
                                <h5 class="widget_title">Màu</h5>
                                <div class="product_color_switch">
                                    @foreach ($colors as $color)
                                        <div>
                                            <div class="custome-checkbox">
                                                <input class="form-check-input" type="checkbox" name="colors[]"
                                                       id="{{$color->name}}"
                                                       value="{{$color->id}}">
                                                <label class="form-check-label"
                                                       for="{{$color->name}}"><span data-color="{{$color->color_code}}"></span>{{$color->name}}</label>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="widget">
                                <button type="submit" class="btn btn-fill-out">Lọc</button>
                            </div>
                        </form>
{{--                        <div class="widget">--}}
{{--                            <div class="shop_banner">--}}
{{--                                <div class="banner_img overlay_bg_20">--}}
{{--                                    <img src="{{url('client')}}/images/sidebar_banner_img.jpg" alt="sidebar_banner_img">--}}
{{--                                </div>--}}
{{--                                <div class="shop_bn_content2 text_white">--}}
{{--                                    <h5 class="text-uppercase shop_subtitle">New Collection</h5>--}}
{{--                                    <h3 class="text-uppercase shop_title">Sale 30% Off</h3>--}}
{{--                                    <a href="#" class="btn btn-white rounded-0 btn-sm text-uppercase">Shop Now</a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END SECTION SHOP -->

@endsection
