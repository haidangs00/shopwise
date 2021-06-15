@extends('admin.layouts.master', ['pageTitle'=>'Danh mục sản phẩm'])

@section('content')
    <div class="container-fluid plr_30 body_white_bg pt_30">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="QA_section">
                    <div class="white_box_tittle list_header">
                        <h4>Danh mục sản phẩm</h4>
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
                                <a href="{{route('categories.create')}}" class="btn_1">Thêm mới</a>
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
                            @foreach($categories as $category)
                            <tr>
                                <td>{{$category->name}}</td>
                                <td>{{$category->getParentsNames()}}</td>
                                <td>{{$category->slug}}</td>
                                <td class="status-switch">
                                    <input action="{{route('categories.update_status', $category->id)}}" class="js-status-switch" {{$category->status == 1 ? 'checked' : ''}} type="checkbox" id="switch-{{$category->id}}" /><label for="switch-{{$category->id}}">Toggle</label>
                                </td>
                                <td>
                                    <a href="{{route('categories.edit', $category->id)}}" class="btn_edit">Sửa</a>
                                    <a action="{{route('categories.destroy', $category->id)}}" class="btn_delete">Xóa</a>
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
