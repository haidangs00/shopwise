@extends('admin.layouts.master', ['pageTitle'=>'Cập nhập vai trò'])

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
                                    <h5 class="modal-title form-title">Cập nhập vai trò</h5>
                                </div>
                                <div class="modal-body pd">
                                    <form class="form-action" method="post" action="{{route('roles.update', $role->id)}}">
                                        @method('PUT')
                                        @csrf
                                        <div class="form-group">
                                            <label for="name">Tên vai trò:</label>
                                            <input type="text" value="{{$role->name}}" name="name" class="form-control" placeholder="Nhập tên vai trò">
                                            <span class="error-msg" error-for="name"></span>
                                        </div>
                                        <div class="form-group">
                                            <label for="display_name">Tên hiển thị:</label>
                                            <input type="text" value="{{$role->display_name}}" name="display_name" class="form-control" placeholder="Nhập tên hiển thị">
                                            <span class="error-msg" error-for="display_name"></span>
                                        </div>
                                        <div class="form-group">
                                            <label for="permission">Phân quyền:</label>
                                            <div>
                                                @foreach($permissions as $permission)
                                                    <label class="form-checkbox-label">
                                                        <input name=permissions[] value="{{$permission->id}}" class="form-checkbox-field"
                                                               type="checkbox" {{in_array($permission->id, $role_permissions)?'checked':''}}/>
                                                        <i class="form-checkbox-button"></i>
                                                        <span>{{$permission->display_name}}</span>
                                                    </label>
                                                @endforeach
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
@endsection
