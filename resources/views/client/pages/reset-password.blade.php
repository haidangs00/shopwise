@extends('client.layouts.master', ['pageTitle' => 'Xác nhận mật khẩu'])
@section('content')

    <div class="login_register_wrap section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-md-10">
                    <div class="login_wrap">
                        <div class="padding_eight_all bg-white">
                            <div class="heading_s1">
                                <h3>Xác nhận mật khẩu mới</h3>
                            </div>
                            <form class="form-action" method="post">
                                @csrf
                                <div class="form-group">
                                    <input type="password" class="form-control" name="new_password"
                                           placeholder="Nhập mật khẩu mới">
                                    <span class="error-msg" error-for="new_password"></span>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" name="re_new_password"
                                           placeholder="Xác nhận mật khẩu mới">
                                    <span class="error-msg" error-for="re_new_password"></span>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-fill-out btn-block" name="register">Xác nhận
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
