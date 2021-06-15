@extends('admin.layouts.master', ['pageTitle'=>'Banner'])

@section('content')
    <div class="container-fluid plr_30 body_white_bg pt_30">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="QA_section">
                    <div class="white_box_tittle list_header">
                        <h4>Banner</h4>
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
                                <a href="{{route('banners.create')}}" class="btn_1">Thêm mới</a>
                            </div>
                        </div>
                    </div>

                    <div class="QA_table ">
                        <!-- table-responsive -->
                        <table class="table lms_table_active">
                            <thead>
                            <tr>
                                <th scope="col">Ảnh</th>
                                <th scope="col">Tên</th>
                                <th scope="col">Slug</th>
                                <th scope="col">Mô tả</th>
                                <th scope="col">Trạng thái</th>
                                <th scope="col">Ngày bắt đầu</th>
                                <th scope="col">Ngày kết thúc</th>
                                <th scope="col">Hành động</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($banners as $banner)
                                <tr>
                                    <td>
                                        <div class="image-td">
                                            <img class="w-100" src="{{url('uploads')}}/{{$banner->image}}" alt="{{$banner->name}}">
                                        </div>
                                    </td>
                                    <td>{{$banner->name}}</td>
                                    <td>{{$banner->slug}}</td>
                                    <td>{{$banner->note}}</td>
                                    <td>
                                        @if($banner->status == 1)
                                            <a href="#" class="status_btn">Active</a>
                                        @else
                                            <a href="#" class="status_inactive">Inactive</a>
                                        @endif
                                    </td>
                                    <td>{{date('m/d/Y',strtotime($banner->date_begin))}}</td>
                                    <td>{{date('m/d/Y',strtotime($banner->date_end))}}</td>
                                    <td>
                                        <a href="{{route('banners.edit', $banner->id)}}" class="btn_edit">Sửa</a>
                                        <a action="{{route('banners.destroy', $banner->id)}}" class="btn_delete">Xóa</a>
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
