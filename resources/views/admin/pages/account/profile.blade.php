@extends('admin.layouts.master', ['pageTitle'=>'Thông tin tài khoản'])

@section('content')
    <div class="container-fluid plr_30 body_white_bg pt_30">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="mb_30">
                    <div class="row justify-content-center">
                        <div class="col-lg-12">
                            <div class="white_box mb_30">
                                <div class="box_header ">
                                    <div class="main-title">
                                        <h3 class="mb-0">Thông tin tài khoản</h3>
                                    </div>
                                </div>

                                <div class="profile_card_5">
                                    <div class="cover-photo">
                                        <img src="{{url('uploads')}}/{{Auth::guard('admin')->user()->avatar}}" class="profile">
                                    </div>
                                    <div class="profile-name">{{Auth::guard('admin')->user()->name}}</div>
                                    <form class="form-action" method="post" action="">
                                        @csrf
                                        <div class="row">
                                            <div class="col-8">
                                                <div class="form-group">
                                                    <label for="name">Họ tên:</label>
                                                    <input type="text" value="{{Auth::guard('admin')->user()->name}}" name="name" class="form-control" placeholder="Nhập tên">
                                                    <span class="error-msg" error-for="name"></span>
                                                </div>
                                                <div class="form-group">
                                                    <label for="email">Email:</label>
                                                    <input type="text" value="{{Auth::guard('admin')->user()->email}}" name="email" class="form-control" placeholder="Nhập email">
                                                    <span class="error-msg" error-for="email"></span>
                                                </div>
                                                <div class="form-group">
                                                    <label for="phone">Số điện thoại:</label>
                                                    <input type="text" value="{{Auth::guard('admin')->user()->phone}}" name="phone" class="form-control" placeholder="Nhập số điện thoại">
                                                    <span class="error-msg" error-for="phone"></span>
                                                </div>
                                                <div class="form-group">
                                                    <label for="address">Địa chỉ:</label>
                                                    <input type="text" value="{{Auth::guard('admin')->user()->address}}" name="address" class="form-control" placeholder="Nhập địa chỉ">
                                                    <span class="error-msg" error-for="address"></span>
                                                </div>
                                                <div class="form-group">
                                                    <label for="user_name">Tên đăng nhập:</label>
                                                    <input type="text" value="{{Auth::guard('admin')->user()->user_name}}" name="user_name" class="form-control" placeholder="Nhập tên đăng nhập">
                                                    <span class="error-msg" error-for="user_name"></span>
                                                </div>
                                                <div class="form-group">
                                                    <label for="password">Mật khẩu:</label>
                                                    <input type="password" name="password" class="form-control" placeholder="Nhập mật khẩu">
                                                    <span class="error-msg" error-for="password"></span>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="form-group text-center">
                                                    <input class="form-control" type="hidden" name="file" id="image">
                                                    <div>
                                                        <img class="w-100" id="img-show" src="{{url('uploads')}}/{{Auth::guard('admin')->user()->avatar}}" alt="">
                                                    </div>
                                                    <a class="btn btn-primary cl-white" data-toggle="modal" data-target="#filemanager">
                                                        Chọn ảnh
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <input type="submit" class="msg-btn" value="Cập nhập">
                                    </form>
                                    <button class="follow-btn">Đổi mật khẩu</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="filemanager" tabindex="-1" role="dialog" aria-labelledby="filemanagerTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:90%">
                <div class="modal-content" style="height: 700px">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <iframe class="modal-file w-100 h-100" src="{{url('filemanager')}}/dialog.php?field_id=image"></iframe>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
@endsection
