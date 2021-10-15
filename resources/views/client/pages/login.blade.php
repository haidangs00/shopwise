@extends('client.layouts.master', ['pageTitle'=>'Đăng nhập'])
@section('content')

    <!-- START LOGIN SECTION -->
    <div class="login_register_wrap section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-md-10">
                    <div class="login_wrap">
                        <div class="padding_eight_all bg-white">
                            <div class="heading_s1">
                                <h3>Đăng nhập</h3>
                            </div>
                            <form class="form-action needs-validation" novalidate method="post">
                                @csrf
                                <input type="hidden" name="action" value="{{$url_prev}}">
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
                                <div class="login_footer form-group">
                                    <div class="chek-form">
                                        <div class="custome-checkbox">
                                            <input class="form-check-input" type="checkbox" name="remember" id="exampleCheckbox1" value="">
                                            <label style="color: #687188 !important" class="form-check-label" for="exampleCheckbox1"><span>Lưu tài khoản</span></label>
                                        </div>
                                    </div>
                                    <a href="{{route('clients.forgot_password')}}">Quên mật khẩu?</a>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-fill-out btn-block" name="login">Đăng nhập</button>
                                </div>
                            </form>
                            <div class="different_login">
                                <span> Hoặc</span>
                            </div>
                            <ul class="btn-login list_none text-center">
                                <li><a href="#" class="btn btn-facebook"><i class="ion-social-facebook"></i>Facebook</a></li>
                                <li><a href="{{route('clients.login_google')}}" class="btn btn-google"><i class="ion-social-googleplus"></i>Google</a></li>
                            </ul>
                            <div class="form-note text-center">Bạn chưa có tài khoản? <a href="{{route('clients.register')}}">Đăng ký ngay</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END LOGIN SECTION -->

@endsection
