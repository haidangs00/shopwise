@extends('admin.layouts.master', ['pageTitle'=>'Danh sách bài viết'])

@section('content')
    <div class="container-fluid plr_30 body_white_bg pt_30">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="QA_section">
                    <div class="white_box_tittle list_header">
                        <h4>Bài viết</h4>
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
                                <a href="{{route('blogs.create')}}" class="btn_1">Thêm mới</a>
                            </div>
                        </div>
                    </div>

                    <div class="QA_table ">
                        <!-- table-responsive -->
                        <table class="table lms_table_active">
                            <thead>
                            <tr>
                                <th scope="col">Ảnh</th>
                                <th scope="col">Tiêu đề</th>
                                <th scope="col">Tên danh mục</th>
                                <th scope="col">Tóm tắt</th>
                                <th scope="col">Trạng thái</th>
                                <th scope="col">Hành động</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($blogs as $blog)
                                <tr>
                                    <td>
                                        <div class="image-td">
                                            <img class="w-100" src="{{url('uploads')}}/{{$blog->image}}" alt="{{$blog->title}}">
                                        </div>
                                    </td>
                                    <td>{{$blog->title}}</td>
                                    <td>{{$blog->blogCategory->name}}</td>
                                    <td>{{$blog->summary}}</td>
                                    <td class="status-switch">
                                        <input action="{{route('blogs.update_status', $blog->id)}}" class="js-status-switch" {{$blog->status == 1 ? 'checked' : ''}} type="checkbox" id="switch-{{$blog->id}}" /><label for="switch-{{$blog->id}}">Toggle</label>
                                    </td>
                                    <td>
                                        <a href="{{route('blogs.edit', $blog->id)}}" class="btn_edit">Sửa</a>
                                        <a action="{{route('blogs.destroy', $blog->id)}}" class="btn_delete">Xóa</a>
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
