@extends('admin.layouts.default', ['pageTitle'=>'Đăng nhập'])
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
                                    <div class="modal-header form-header">
                                        <h5 class="modal-title">Đăng nhập</h5>
                                    </div>
                                    <div class="modal-body">
                                        <form class="form-login" method="post" action="{{route('admins.sign_in')}}">
                                            @csrf
                                            <div class="form-group">
                                                <input name="user_name" type="text" class="form-control" placeholder="Tên đăng nhập">
                                                <span class="error-msg" error-for="user_name"></span>
                                            </div>
                                            <div class="form-group">
                                                <input name="password" type="password" class="form-control" placeholder="Mật khẩu">
                                                <span class="error-msg" error-for="password"></span>
                                            </div>
                                            <button type="submit" class="btn_1 full_width text-center">Đăng nhập</button>
                                            <p>Chưa có tài khoản? <a href="{{route('admins.register')}}"> Đăng ký</a></p>
                                            <div class="text-center">
                                                <a href="#" data-toggle="modal" data-target="#forgot_password"
                                                   data-dismiss="modal" class="pass_forget_btn">Quên mật khẩu?</a>
                                            </div>
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
