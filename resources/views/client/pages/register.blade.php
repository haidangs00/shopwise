@extends('client.layouts.master', ['pageTitle' => 'Đăng ký'])
@section('content')

    <div class="login_register_wrap section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-md-10">
                    <div class="login_wrap">
                        <div class="padding_eight_all bg-white">
                            <div class="heading_s1">
                                <h3>Đăng ký tài khoản</h3>
                            </div>
                            <form class="form-action needs-validation" method="post" novalidate>
                                @csrf
                                <div class="form-group">
                                    <input type="text" class="form-control" name="name" placeholder="Họ tên" required>
                                    <div class="invalid-feedback" error-for="name">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="email" placeholder="Email" required>
                                    <div class="invalid-feedback" error-for="email">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="phone" placeholder="Số điện thoại" required>
                                    <div class="invalid-feedback" error-for="phone">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="address" placeholder="Địa chỉ">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="user_name" placeholder="Tên đăng nhập" required>
                                    <div class="invalid-feedback" error-for="user_name">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" type="password" name="password" placeholder="Mật khẩu" required>
                                    <div class="invalid-feedback" error-for="password">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" type="password" name="re_password" placeholder="Xác nhận mật khẩu" required>
                                    <div class="invalid-feedback" error-for="re_password">
                                    </div>
                                </div>
                                <div class="login_footer form-group">
                                    <div class="chek-form">
                                        <div class="custome-checkbox">
                                            <input class="form-check-input" type="checkbox" name="check" id="exampleCheckbox2" required>
                                            <label class="form-check-label" for="exampleCheckbox2"><span>Tôi đồng ý với các điều khoản & chính sách.</span></label>
                                        </div>
                                        <div class="invalid-feedback" error-for="check">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-fill-out btn-block" name="register">Đăng ký</button>
                                </div>
                            </form>
                            <div class="form-note text-center">Bạn đã có tài khoản? <a href="{{route('clients.login')}}">Đăng nhập</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
