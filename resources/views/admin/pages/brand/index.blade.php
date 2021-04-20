@extends('admin.layouts.master', ['pageTitle'=>'Nhãn hàng'])

@section('content')
    <div class="container-fluid plr_30 body_white_bg pt_30">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="QA_section">
                    <div class="white_box_tittle list_header">
                        <h4>Nhãn hàng</h4>
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
                                <a href="{{route('brands.create')}}" class="btn_1">Thêm mới</a>
                            </div>
                        </div>
                    </div>

                    <div class="QA_table ">
                        <!-- table-responsive -->
                        <table class="table lms_table_active">
                            <thead>
                            <tr>
                                <th scope="col">Logo</th>
                                <th scope="col">Tên</th>
                                <th scope="col">Slug</th>
                                <th scope="col">Trạng thái</th>
                                <th scope="col">Hành động</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($brands as $brand)
                                <tr>
                                    <td>
                                        <div class="image-td">
                                            <img class="w-100" src="{{url('uploads')}}/{{$brand->logo}}" alt="{{$brand->name}}">
                                        </div>
                                    </td>
                                    <td>{{$brand->name}}</td>
                                    <td>{{$brand->slug}}</td>
                                    <td>
                                        @if($brand->status == 1)
                                            <a href="#" class="status_btn">Active</a>
                                        @else
                                            <a href="#" class="status_inactive">Inactive</a>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{route('brands.edit', $brand->id)}}" class="btn_edit">Sửa</a>
                                        <form class="d-inline-block" action="{{route('brands.destroy', $brand->id)}}" method="post">
                                            @method('delete')
                                            @csrf
                                            <button class="btn_delete">Xóa</button>
                                        </form>
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
