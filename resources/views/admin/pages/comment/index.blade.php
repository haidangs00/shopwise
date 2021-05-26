@extends('admin.layouts.master', ['pageTitle'=>'Bình luận của khách hàng'])

@section('content')
    <div class="container-fluid plr_30 body_white_bg pt_30">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="QA_section">
                    <div class="white_box_tittle list_header">
                        <h4>Bình luận của khách hàng</h4>
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
                                <a href="#" class="btn_1">Thêm mới</a>
                            </div>
                        </div>
                    </div>

                    <div class="QA_table ">
                        <!-- table-responsive -->
                        <table class="table lms_table_active">
                            <thead>
                            <tr>
                                <th scope="col">Tên khách hàng</th>
                                <th scope="col">Bình luận</th>
                                <th scope="col">Sản phẩm</th>
                                <th scope="col">Số sao</th>
                                <th scope="col">Trạng thái</th>
                                <th scope="col">Hành động</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($comments as $comment)
                                <tr>
                                    <td>{{$comment->user->name}}</td>
                                    <td>{{$comment->content}}</td>
                                    <td>{{$comment->product->name}}</td>
                                    <td>3</td>
                                    <td>
                                        @if($comment->status == 1)
                                            <a href="#" class="status_btn">Active</a>
                                        @else
                                            <a href="#" class="status_inactive">Inactive</a>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="#" class="btn_edit">Trả lời</a>
                                        <a action="{{route('comments.destroy', $comment->id)}}" class="btn_delete">Xóa</a>
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
