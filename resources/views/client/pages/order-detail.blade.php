@extends('client.layouts.master', ['pageTitle' => 'Chi tiết đơn hàng'])
@section('content')

    <div class="section">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="heading_s1">
                        <h4>Chi tiết hóa đơn</h4>
                    </div>
                    <div class="form-group">
                        <input disabled type="text" class="form-control" name="name" value="{{Auth::user()->name}}"
                               placeholder="Họ tên *">
                    </div>
                    <div class="form-group">
                        <input disabled type="text" class="form-control" name="address"
                               value="{{Auth::user()->address}}"
                               placeholder="Địa chỉ *">
                    </div>
                    <div class="form-group">
                        <input disabled class="form-control" type="text" name="phone" value="{{Auth::user()->phone}}"
                               placeholder="Điện thoại *">
                    </div>
                    <div class="form-group">
                        <input disabled class="form-control" type="text" name="email" value="{{Auth::user()->email}}"
                               placeholder="Email *">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="order_review">
                        <div class="heading_s1">
                            <h4>Đơn đặt hàng của bạn</h4>
                        </div>
                        <div class="table-responsive order_table">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>Sản phẩm</th>
                                    <th>Tổng tiền</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($order->orderDetails as $item)
                                    <tr>
                                        <td>
                                            {{$item->product->name}}
                                            <span class="product-qty">x {{$item->quantity}}</span>
                                            <div class="product-name">
                                                <p class="item-info">Màu sắc: {{$item->color->name}}</p>
                                                <p class="item-info">Size: {{$item->size->name}}</p>
                                            </div>
                                        </td>
                                        <td>₫{{number_format($item->price)}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>Tạm tính</th>
                                    <td class="product-subtotal">₫{{number_format($order->total_price)}}</td>
                                </tr>
                                <tr>
                                    <th>Phí giao hàng</th>
                                    <td>Miễn phí</td>
                                </tr>
                                <tr>
                                    <th>Tổng tiền</th>
                                    <td class="product-subtotal">₫{{number_format($order->total_price)}}</td>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
