@extends('admin.layouts.master', ['pageTitle'=>'Cập nhập quản trị viên'])

@section('content')
    <div class="container-fluid plr_30 body_white_bg pt_30">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="mb_30">
                    <div class="row justify-content-center">
                        <div class="col-lg-12">
                            <!-- sign_in  -->
                            <div class="modal-content">
                                <div class="modal-header form-header">
                                    <h5 class="modal-title form-title">Cập nhập quản trị viên</h5>
                                </div>
                                <div class="modal-body pd">
                                    <form class="form-action" method="post" action="{{route('admins.update', $admin->id)}}">
                                        @method('PUT')
                                        @csrf
                                        <div class="form-group">
                                            <label for="name">Tên:</label>
                                            <input type="text" value="{{$admin->name}}" name="name" class="form-control" placeholder="Nhập tên">
                                            <span class="error-msg" error-for="name"></span>
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Email:</label>
                                            <input type="text" value="{{$admin->email}}" name="email" class="form-control" placeholder="Nhập email">
                                        </div>
                                        <div class="form-group">
                                            <label for="phone">Số điện thoại:</label>
                                            <input type="text" value="{{$admin->phone}}" name="phone" class="form-control" placeholder="Nhập số điện thoại">
                                            <span class="error-msg" error-for="phone"></span>
                                        </div>
                                        <div class="form-group">
                                            <label for="address">Địa chỉ:</label>
                                            <input type="text" value="{{$admin->address}}" name="address" class="form-control" placeholder="Nhập địa chỉ">
                                            <span class="error-msg" error-for="address"></span>
                                        </div>
                                        <div class="form-group">
                                            <label for="user_name">Tên đăng nhập:</label>
                                            <input type="text" value="{{$admin->user_name}}" name="user_name" class="form-control" placeholder="Nhập tên đăng nhập">
                                            <span class="error-msg" error-for="user_name"></span>
                                        </div>
                                        <div class="form-group">
                                            <label for="slug">Ảnh đại diện:</label>
                                            <a class="btn btn-primary cl-white" data-toggle="modal" data-target="#filemanager">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-card-image" viewBox="0 0 16 16">
                                                    <path d="M6.002 5.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
                                                    <path d="M1.5 2A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13zm13 1a.5.5 0 0 1 .5.5v6l-3.775-1.947a.5.5 0 0 0-.577.093l-3.71 3.71-2.66-1.772a.5.5 0 0 0-.63.062L1.002 12v.54A.505.505 0 0 1 1 12.5v-9a.5.5 0 0 1 .5-.5h13z"/>
                                                </svg>
                                                Chọn ảnh
                                            </a>
                                            <input class="form-control" type="hidden" name="file" id="image">
                                            <div>
                                                <img id="img-show" src="{{url('uploads')}}/{{$admin->avatar}}" alt="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="status">Trạng thái:</label>
                                            <div class="radio">
                                                <input id="radio-1" name="status" type="radio" value="1" {{$admin->status=='1'?'checked':''}}>
                                                <label for="radio-1" class="radio-label">Active</label>
                                            </div>
                                            <div class="radio">
                                                <input id="radio-2" name="status" type="radio" value="0" {{$admin->status=='0'?'checked':''}}>
                                                <label for="radio-2" class="radio-label">Inactive</label>
                                            </div>
                                        </div>
                                        <input type="submit" class="btn btn-primary btn-add" value="Cập nhập">
                                    </form>
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
