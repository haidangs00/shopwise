@extends('client.layouts.master', ['pageTitle' => 'So sánh sản phẩm'])
@section('content')

    <div class="section">
        <div class="container">
            @if($compare->count > 0)
                <div class="row">
                    <div class="col-md-12">
                        <div class="compare_box">
                            <div class="table-responsive">
                                <div class="table-compare">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <table class="table text-center table-b">
                                                <tbody>
                                                <tr class="pr_image">
                                                    <td class="row_title">Ảnh</td>
                                                </tr>
                                                <tr class="pr_title">
                                                    <td class="row_title">Tên sản phẩm</td>
                                                </tr>
                                                <tr class="pr_price">
                                                    <td class="row_title">Giá</td>
                                                </tr>
                                                <tr class="pr_rating">
                                                    <td class="row_title">Đánh giá</td>
                                                </tr>
                                                <tr class="pr_color">
                                                    <td class="row_title">Màu</td>
                                                </tr>
                                                <tr class="pr_size">
                                                    <td class="row_title">Sizes</td>
                                                </tr>
                                                <tr class="pr_stock">
                                                    <td class="row_title">Trạng thái</td>
                                                </tr>
                                                <tr class="pr_add_to_cart">
                                                    <td class="row_title">Thêm vào giỏ hàng</td>
                                                </tr>
                                                <tr class="pr_remove">
                                                    <td class="row_title">Xóa</td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        @foreach($compare->items as $item )
                                            <div class="col">
                                                <table class="table text-center">
                                                    <tbody>
                                                    <tr class="pr_image">
                                                        <td class="row_img"><img
                                                                src="{{url('uploads')}}/{{$item['image']}}"
                                                                alt="{{$item['name']}}"></td>
                                                    </tr>
                                                    <tr class="pr_title">
                                                        <td class="product_name"><a
                                                                href="{{route('clients.product_detail', $item['id'])}}">{{$item['name']}}</a>
                                                        </td>
                                                    </tr>
                                                    <tr class="pr_price">
                                                        <td class="product_price"><span
                                                                class="price">₫{{number_format($item['price'])}}</span>
                                                        </td>
                                                    </tr>
                                                    <tr class="pr_rating">
                                                        <td>
                                                            <div class="rating_wrap">
                                                                <div class="rating">
                                                                    <div class="product_rate" style="width:{{100*($item['rating']/5)}}%"></div>
                                                                </div>
                                                                <span class="rating_num">({{$item['countComment']}})</span>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr class="pr_color">
                                                        <td class="row_color">
                                                            <div class="product_color_switch">
                                                                @foreach ($item['colors'] as $color)
                                                                    <span data-color="{{$color->color_code}}"></span>
                                                                @endforeach
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr class="pr_size">
                                                        <td class="row_size"><span>
                                                            @foreach ($item['sizes'] as $size)
                                                                    <span class="pro-size">{{$size->name}}</span>
                                                                @endforeach
                                                        </span>
                                                        </td>
                                                    </tr>
                                                    <tr class="pr_stock">
                                                        <td class="row_stock"><span class="in-stock">In Stock</span>
                                                        </td>
                                                    </tr>
                                                    <tr class="pr_add_to_cart">
                                                        <td class="row_btn"><a
                                                                href="{{route('clients.product_detail', $item['id'])}}"
                                                                class="btn btn-fill-out"><i
                                                                    class="icon-basket-loaded"></i>
                                                                Chọn mua</a></td>
                                                    </tr>
                                                    <tr class="pr_remove">
                                                        <td class="row_remove">
                                                            <a href="{{route('clients.delete_compare', $item['id'])}}"><span>Remove</span>
                                                                <i class="fa fa-times"></i></a>
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <div class="row">
                    <div class="col-12">
                        <div class="medium_divider text-center">Bạn chưa có sản phẩm nào!</div>
                        <div class="divider center_icon"><i class="ti-shopping-cart-full"></i></div>
                        <div class="medium_divider"></div>
                        <div class="text-center">
                            <a href="{{route('clients.products')}}" class="btn btn-fill-out">Shop</a>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>

@endsection
