@extends('admin.layouts.default', ['pageTitle'=>'Đăng ký'])
@section('content')
    <div class="main_content_iner ">
        <div class="container-fluid" style="background-color: #f7faff">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="container" style="min-height:100vh;">
                        <div class="row justify-content-center" style="position: relative; top: 50%; transform: translateY(12%);">
                            <div class="col-lg-4 col-md-6 col-8">
                                <div class="modal-content cs_modal">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Đăng ký</h5>
                                    </div>
                                    <div class="modal-body">
                                        <form class="form-login" method="post" action="{{route('admins.sign_up')}}" novalidate>
                                            @csrf
                                            <div class="form-group">
                                                <input name="name" type="text" class="form-control" placeholder="Họ tên">
                                                <span class="error-msg" error-for="name"></span>
                                            </div>
                                            <div class="form-group">
                                                <input name="email" type="email" class="form-control" placeholder="Email">
                                                <span class="error-msg" error-for="email"></span>
                                            </div>
                                            <div class="form-group">
                                                <input name="user_name" type="text" class="form-control" placeholder="Tên đăng nhập">
                                                <span class="error-msg" error-for="user_name"></span>
                                            </div>
                                            <div class="form-group">
                                                <input name="password" type="password" class="form-control" placeholder="Mật khẩu">
                                                <span class="error-msg" error-for="password"></span>
                                            </div>
                                            <div class="form-group">
                                                <input name="re_password" type="password" class="form-control" placeholder="Nhập lại mật khẩu">
                                                <span class="error-msg" error-for="re_password"></span>
                                            </div>
                                            <div class="input_wrap common_date_picker mb_20">
                                                <input name="birthday" class="input_form" id="start_datepicker" placeholder="Ngày sinh">
                                            </div>
                                            <div class="form-group">
                                                <input name="phone" type="text" class="form-control" placeholder="Số điện thoại">
                                            </div>
                                            <span class="error-msg" error-for="phone"></span>
                                            <div class="form-group">
                                                <input name="address" type="text" class="form-control" placeholder="Địa chỉ">
                                            </div>
                                            <button type="submit" class="btn_1 full_width text-center">Đăng ký</button>
                                            <p>Đã có tài khoản? <a href="{{route('admins.login')}}">Đăng nhập</a></p>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
