@extends('admin.layouts.master', ['pageTitle'=>'Danh sách quản trị viên'])

@section('content')
    <div class="container-fluid plr_30 body_white_bg pt_30">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="QA_section">
                    <div class="white_box_tittle list_header">
                        <h4>Danh sách quản trị viên</h4>
                        <div class="box_right d-flex lms_block">
                            <div class="serach_field_2">
                                <div class="search_inner">
                                    <form Active="#">
                                        <div class="search_field">
                                            <input type="text" placeholder="Tìm kiếm...">
                                        </div>
                                        <button type="submit"> <i class="ti-search"></i> </button>
                                    </form>
                                </div>
                            </div>
                            <div class="add_button ml-10">
                                <a href="{{route('admins.create')}}" class="btn_1">Thêm mới</a>
                            </div>
                        </div>
                    </div>

                    <div class="QA_table ">
                        <!-- table-responsive -->
                        <table class="table lms_table_active">
                            <thead>
                            <tr>
                                <th scope="col">Avatar</th>
                                <th scope="col">Vai trò</th>
                                <th scope="col">Tên</th>
                                <th scope="col">Email</th>
                                <th scope="col">Ngày sinh</th>
                                <th scope="col">Số điện thoại</th>
                                <th scope="col">Địa chỉ</th>
                                <th scope="col">Tên đăng nhập</th>
                                <th scope="col">Trạng thái</th>
                                <th scope="col">Hành động</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($admins as $admin)
                                <tr>
                                    <td>
                                        <div class="image-td">
                                            <img class="w-100" src="{{url('uploads')}}/{{$admin->avatar}}" alt="{{$admin->name}}">
                                        </div>
                                    </td>
                                    <td>
                                        @foreach($admin->roles as $role)
                                            <span class="pro-size">{{$role->display_name}}</span>
                                        @endforeach
                                    </td>
                                    <td>{{$admin->name}}</td>
                                    <td>{{$admin->email}}</td>
                                    <td>{{$admin->birthday}}</td>
                                    <td>{{$admin->phone}}</td>
                                    <td>{{$admin->address}}</td>
                                    <td>{{$admin->user_name}}</td>
                                    <td class="status-switch">
                                        <input action="{{route('admins.update_status', $admin->id)}}" class="js-status-switch" {{$admin->status == 1 ? 'checked' : ''}} type="checkbox" id="switch-{{$admin->id}}" /><label for="switch-{{$admin->id}}">Toggle</label>
                                    </td>
                                    <td>
                                        <a href="{{route('admins.edit', $admin->id)}}" class="btn_edit">Sửa</a>
                                        <a action="{{route('admins.destroy', $admin->id)}}" class="btn_delete">Xóa</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
