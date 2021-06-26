@extends('client.layouts.master', ['pageTitle' => 'Lấy lại mật khẩu'])
@section('content')

    <div class="login_register_wrap section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-md-10">
                    <div class="login_wrap">
                        <div class="padding_eight_all bg-white">
                            <div class="heading_s1">
                                <h3>Lấy lại mật khẩu</h3>
                            </div>
                            <form class="form-action" method="post">
                                @csrf
                                <div class="form-group">
                                    <input type="text" class="form-control" name="email" placeholder="Nhập email">
                                    <span class="error-msg" error-for="email"></span>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-fill-out btn-block" name="register">Gửi</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
