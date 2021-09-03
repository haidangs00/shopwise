@extends('client.layouts.master', ['pageTitle' => 'Giỏ hàng'])
@section('content')

    <div class="section">
        <div class="container">
            @if($cart->total_quantity > 0)
                <div class="row">
                    <div class="col-12">
                        <div class="table-responsive shop_cart_table">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th class="product-thumbnail">Ảnh</th>
                                    <th class="product-name">Tên sản phẩm</th>
                                    <th class="product-price">Giá</th>
                                    <th class="product-quantity">Số lượng</th>
                                    <th class="product-subtotal">Tổng tiền</th>
                                    <th class="product-remove">Xóa</th>
                                </tr>
                                </thead>
                                <form class="form-action" method="post" action="{{route('clients.update_cart')}}">
                                    @csrf
                                    <tbody>
                                    @foreach($cart->items as $item)
                                        <tr>
                                            <td class="product-thumbnail"><a href="#"><img
                                                        src="{{url('uploads')}}/{{$item['image']}}"
                                                        alt="{{$item['name']}}"></a></td>
                                            <td class="product-name" data-title="Product">
                                                <a href="{{route('clients.product_detail', $item['id'])}}">{{$item['name']}}</a>
                                                <p class="item-info">Màu sắc: {{$item['color_name']}}</p>
                                                <p class="item-info">Size: {{$item['size_name']}}</p>
                                            </td>
                                            <td class="product-price" data-title="Price">
                                                ₫{{number_format($item['price'])}}</td>
                                            <td class="product-quantity" data-title="Quantity">
                                                <div class="quantity">
                                                    <input type="button" value="-" class="minus">
                                                    <input type="number" name="quantity[{{$item['item_id']}}]"
                                                           value="{{$item['quantity']}}" title="Qty" class="qty"
                                                           size="4">
                                                    <input type="button" value="+" class="plus">
                                                </div>
                                            </td>
                                            <td class="product-subtotal" data-title="Total">
                                                ₫{{number_format($item['price']*$item['quantity'])}}</td>
                                            <td class="product-remove" data-title="Remove"><a class="btn-delete"
                                                                                              action="{{route('clients.delete_cart', $item['item_id'])}}"><i
                                                        class="ti-close"></i></a></td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <td colspan="6" class="px-0">
                                            <div class="row no-gutters align-items-center">

                                                <div class="col-lg-4 col-md-6 mb-3 mb-md-0">
{{--                                                    <div class="coupon field_form input-group">--}}
{{--                                                        <input type="text" value="" class="form-control form-control-sm"--}}
{{--                                                               placeholder="Enter Coupon Code..">--}}
{{--                                                        <div class="input-group-append">--}}
{{--                                                            <button class="btn btn-fill-out btn-sm" type="submit">Apply--}}
{{--                                                                Coupon--}}
{{--                                                            </button>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
                                                </div>
                                                <div class="col-lg-8 col-md-6 text-left text-md-right">
                                                    <button class="btn btn-line-fill btn-sm" type="submit">Cập nhập giỏ
                                                        hàng
                                                    </button>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    </tfoot>
                                </form>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="medium_divider"></div>
                        <div class="divider center_icon"><i class="ti-shopping-cart-full"></i></div>
                        <div class="medium_divider"></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6"></div>
                    <div class="col-md-6">
                        <div class="border p-3 p-md-4">
                            <div class="heading_s1 mb-3">
                                <h6>Tổng giỏ hàng</h6>
                            </div>
                            <div class="table-responsive">
                                <table class="table">
                                    <tbody>
                                    <tr>
                                        <td class="cart_total_label">Tạm tính</td>
                                        <td class="cart_total_amount">₫{{number_format($cart->total_price)}}</td>
                                    </tr>
                                    <tr>
                                        <td class="cart_total_label">Phí giao hàng</td>
                                        <td class="cart_total_amount">Miễn phí</td>
                                    </tr>
                                    <tr>
                                        <td class="cart_total_label">Tổng tiền</td>
                                        <td class="cart_total_amount">
                                            <strong>₫{{number_format($cart->total_price)}}</strong></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <a href="{{route('clients.checkout')}}" class="btn btn-fill-out">Thanh toán</a>
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
                            <a href="{{route('clients.products')}}" class="btn btn-fill-out">Mua sắm ngay</a>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>

@endsection
