@extends('client.layouts.master', ['pageTitle' => 'Thanh toán'])
@section('content')

    <div class="section">
        @if(!$cart->total_quantity > 0)
            <div class="container">
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
            </div>
        @else
            <div class="container">
                @if(!Auth::check())
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="toggle_info">
                            <span><i class="fas fa-user"></i>Bạn phải đăng nhập trước khi thanh toán? <a
                                    href="{{route('clients.login')}}">Đăng nhập ngay</a></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="medium_divider"></div>
                            <div class="divider center_icon"><i class="linearicons-credit-card"></i></div>
                            <div class="medium_divider"></div>
                        </div>
                    </div>
                @else
                    <form class="form-checkout" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="heading_s1">
                                    <h4>Chi tiết hóa đơn</h4>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="name" value="{{Auth::user()->name}}"
                                           placeholder="Họ tên *">
                                    <span class="error-msg" error-for="name"></span>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="address"
                                           value="{{Auth::user()->address}}"
                                           placeholder="Địa chỉ *">
                                    <span class="error-msg" error-for="address"></span>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" type="text" name="phone" value="{{Auth::user()->phone}}"
                                           placeholder="Điện thoại *">
                                    <span class="error-msg" error-for="phone"></span>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" type="text" name="email" value="{{Auth::user()->email}}"
                                           placeholder="Email *">
                                    <span class="error-msg" error-for="email"></span>
                                </div>
                                <div class="heading_s1">
                                    <h4>Thông tin thêm</h4>
                                </div>
                                <div class="form-group mb-0">
                                <textarea rows="5" class="form-control" name="description"
                                          placeholder="Ghi chú"></textarea>
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
                                            @foreach($cart->items as $item)
                                                <tr>
                                                    <td>
                                                        {{$item['name']}}
                                                        <span class="product-qty">x {{$item['quantity']}}</span>
                                                        <div class="product-name">
                                                            <p class="item-info">Màu sắc: {{$item['color_name']}}</p>
                                                            <p class="item-info">Size: {{$item['size_name']}}</p>
                                                        </div>
                                                    </td>
                                                    <td>₫{{number_format($item['price'])}}</td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                            <tfoot>
                                            <tr>
                                                <th>Tạm tính</th>
                                                <td class="product-subtotal">₫{{number_format($cart->total_price)}}</td>
                                            </tr>
                                            <tr>
                                                <th>Phí giao hàng</th>
                                                <td>Miễn phí</td>
                                            </tr>
                                            <tr>
                                                <th>Tổng tiền</th>
                                                <td class="product-subtotal">₫{{number_format($cart->total_price)}}</td>
                                            </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                    <div class="payment_method">
                                        <div class="heading_s1">
                                            <h4>Phương thức thanh toán</h4>
                                        </div>
                                        <div class="payment_option">
                                            <div class="custome-radio">
                                                <input class="form-check-input" required="" type="radio"
                                                       name="payment_option"
                                                       id="exampleRadios3" value="option3" checked="">
                                                <label class="form-check-label" for="exampleRadios3">Direct Bank
                                                    Transfer</label>
                                                <p data-method="option3" class="payment-text">There are many variations
                                                    of
                                                    passages
                                                    of Lorem Ipsum available, but the majority have suffered
                                                    alteration. </p>
                                            </div>
                                            <div class="custome-radio">
                                                <input class="form-check-input" type="radio" name="payment_option"
                                                       id="exampleRadios4" value="option4">
                                                <label class="form-check-label" for="exampleRadios4">Check
                                                    Payment</label>
                                                <p data-method="option4" class="payment-text">Please send your cheque to
                                                    Store
                                                    Name,
                                                    Store Street, Store Town, Store State / County, Store Postcode.</p>
                                            </div>
                                            <div class="custome-radio">
                                                <input class="form-check-input" type="radio" name="payment_option"
                                                       id="exampleRadios5" value="option5">
                                                <label class="form-check-label" for="exampleRadios5">Paypal</label>
                                                <p data-method="option5" class="payment-text">Pay via PayPal; you can
                                                    pay
                                                    with
                                                    your
                                                    credit card if you don't have a PayPal account.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-fill-out btn-block">Đặt hàng</button>
                                </div>
                            </div>
                        </div>
                    </form>
                @endif
            </div>
        @endif
    </div>

@endsection
