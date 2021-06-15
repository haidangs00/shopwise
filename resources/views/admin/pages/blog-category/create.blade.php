@extends('admin.layouts.master', ['pageTitle'=>'Thêm mới danh mục bài viết'])

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
                                    <h5 class="modal-title form-title">Thêm mới danh mục bài viết</h5>
                                </div>
                                <div class="modal-body pd">
                                    <form class="form-action" method="post" action="{{route('blogCategories.store')}}">
                                        @csrf
                                        <div class="form-group">
                                            <label for="name">Tên danh mục bài viết:</label>
                                            <input type="text" name="name" class="form-control" placeholder="Nhập tên danh mục bài viết">
                                            <span class="error-msg" error-for="name"></span>
                                        </div>
                                        <div class="form-group">
                                            <label for="parent_id">Danh mục cha:</label>
                                            <select name="parent_id" class="default_sel mb_30 w-100">
                                                <option value="0" data-display="--Chọn danh mục cha--">Không</option>
                                                @foreach($blogCategories as $blogCategory)
                                                    <option value="{{$blogCategory->id}}">{{$blogCategory->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="slug">Slug:</label>
                                            <input type="text" name="slug" class="form-control" placeholder="Nhập slug">
                                        </div>
                                        <div class="form-group">
                                            <label for="status">Trạng thái:</label>
                                            <div class="radio">
                                                <input id="radio-1" name="status" type="radio" value="1" checked>
                                                <label for="radio-1" class="radio-label">Active</label>
                                            </div>
                                            <div class="radio">
                                                <input id="radio-2" name="status" type="radio" value="0">
                                                <label  for="radio-2" class="radio-label">Inactive</label>
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
