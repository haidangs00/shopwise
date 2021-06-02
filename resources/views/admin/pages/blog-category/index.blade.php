@extends('admin.layouts.master', ['pageTitle'=>'Danh mục bài viết'])

@section('content')
    <div class="container-fluid plr_30 body_white_bg pt_30">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="QA_section">
                    <div class="white_box_tittle list_header">
                        <h4>Danh mục bài viết</h4>
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
                                <a href="{{route('blogCategories.create')}}" class="btn_1">Thêm mới</a>
                            </div>
                        </div>
                    </div>

                    <div class="QA_table ">
                        <!-- table-responsive -->
                        <table class="table lms_table_active">
                            <thead>
                            <tr>
                                <th scope="col">Tên</th>
                                <th scope="col">Tên danh mục cha</th>
                                <th scope="col">Slug</th>
                                <th scope="col">Trạng thái</th>
                                <th scope="col">Hành động</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($blogCategories as $blogCategory)
                                <tr>
                                    <td>{{$blogCategory->name}}</td>
                                    <td>{{$blogCategory->getParentsNames()}}</td>
                                    <td>{{$blogCategory->slug}}</td>
                                    <td class="status-switch">
                                        <input action="{{route('blogCategories.update_status', $blogCategory->id)}}" class="js-status-switch" {{$blogCategory->status == 1 ? 'checked' : ''}} type="checkbox" id="switch-{{$blogCategory->id}}" /><label for="switch-{{$blogCategory->id}}">Toggle</label>
                                    </td>
                                    <td>
                                        <a href="{{route('blogCategories.edit', $blogCategory->id)}}" class="btn_edit">Sửa</a>
                                        <a action="{{route('blogCategories.destroy', $blogCategory->id)}}" class="btn_delete">Xóa</a>
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
