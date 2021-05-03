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
                            <form method="post">
                                @csrf
                                <div class="form-group">
                                    <input type="text" class="form-control" name="name" placeholder="Họ tên">
                                    @error('name')
                                    <span class="error-msg">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="email" placeholder="Email">
                                    @error('email')
                                    <span class="error-msg">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="phone" placeholder="Số điện thoại">
                                    @error('phone')
                                    <span class="error-msg">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="address" placeholder="Địa chỉ">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="user_name" placeholder="Tên đăng nhập">
                                    @error('user_name')
                                    <span class="error-msg">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input class="form-control" type="password" name="password" placeholder="Mật khẩu">
                                    @error('password')
                                    <span class="error-msg">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input class="form-control" type="password" name="re_password" placeholder="Xác nhận mật khẩu">
                                    @error('re_password')
                                    <span class="error-msg">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="login_footer form-group">
                                    <div class="chek-form">
                                        <div class="custome-checkbox">
                                            <input class="form-check-input" type="checkbox" name="check" id="exampleCheckbox2">
                                            <label class="form-check-label" for="exampleCheckbox2"><span>Tôi đồng ý với các điều khoản & chính sách.</span></label>
                                        </div>
                                        @error('check')
                                        <span class="error-msg">{{$message}}</span>
                                        @enderror
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
