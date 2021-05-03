@extends('admin.layouts.default', ['pageTitle'=>'Đăng ký'])
@section('content')
    <div class="main_content_iner ">
        <div class="container-fluid plr_30 body_white_bg pt_30">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="white_box mb_30">
                        <div class="row justify-content-center">
                            <div class="col-lg-4">
                                <!-- sign_in  -->
                                <div class="modal-content cs_modal">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Đăng ký</h5>
                                    </div>
                                    <div class="modal-body">
                                        <form method="post" action="{{route('admins.sign_up')}}" novalidate>
                                            @csrf
                                            <div class="form-group">
                                                <input name="name" type="text" class="form-control" placeholder="Họ tên">
                                                @error('name')
                                                <span class="error-msg">{{$message}}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <input name="email" type="email" class="form-control" placeholder="Email">
                                                @error('email')
                                                <span class="error-msg">{{$message}}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <input name="user_name" type="text" class="form-control" placeholder="Tên đăng nhập">
                                                @error('user_name')
                                                <span class="error-msg">{{$message}}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <input name="password" type="password" class="form-control" placeholder="Mật khẩu">
                                                @error('password')
                                                <span class="error-msg">{{$message}}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <input name="re_password" type="password" class="form-control" placeholder="Nhập lại mật khẩu">
                                                @error('re_password')
                                                <span class="error-msg">{{$message}}</span>
                                                @enderror
                                            </div>
                                            <div class="input_wrap common_date_picker mb_20">
                                                <input name="birthday" class="input_form" id="start_datepicker" placeholder="Ngày sinh">
                                            </div>
                                            <div class="form-group">
                                                <input name="phone" type="text" class="form-control" placeholder="Số điện thoại">
                                            </div>
                                            @error('phone')
                                            <span class="error-msg">{{$message}}</span>
                                            @enderror
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
@endsection
