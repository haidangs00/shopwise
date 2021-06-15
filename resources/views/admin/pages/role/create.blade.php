@extends('admin.layouts.master', ['pageTitle'=>'Thêm mới vai trò'])

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
                                    <h5 class="modal-title form-title">Thêm mới vai trò</h5>
                                </div>
                                <div class="modal-body pd">
                                    <form class="form-action" method="post" action="{{route('roles.store')}}">
                                        @csrf
                                        <div class="form-group">
                                            <label for="name">Tên vai trò:</label>
                                            <input type="text" name="name" class="form-control" placeholder="Nhập tên vai trò">
                                            <span class="error-msg" error-for="name"></span>
                                        </div>
                                        <div class="form-group">
                                            <label for="display_name">Tên hiển thị:</label>
                                            <input type="text" name="display_name" class="form-control" placeholder="Nhập tên hiển thị">
                                            <span class="error-msg" error-for="display_name"></span>
                                        </div>
                                        <div class="form-group">
                                            <label for="permission">Phân quyền:</label>
                                            <div>
                                                @foreach($permissions as $permission)
                                                    <label class="form-checkbox-label">
                                                        <input name=permissions[] value="{{$permission->id}}" class="form-checkbox-field"
                                                               type="checkbox"/>
                                                        <i class="form-checkbox-button"></i>
                                                        <span>{{$permission->display_name}}</span>
                                                    </label>
                                                @endforeach
                                            </div>
                                        </div>
                                        <input type="submit" class="btn btn-primary btn-add" value="Thêm mới">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
