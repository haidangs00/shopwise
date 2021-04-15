@extends('admin.layouts.master', ['pageTitle'=>'Thêm mới danh mục sản phẩm'])

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
                                    <h5 class="modal-title form-title">Thêm mới danh mục sản phẩm</h5>
                                </div>
                                <div class="modal-body pd">
                                    <form method="post" action="{{route('categories.store')}}">
                                        @csrf
                                        <div class="form-group">
                                            <label for="name">Tên danh mục sản phẩm:</label>
                                            <input type="text" name="name" class="form-control" placeholder="Nhập tên danh mục sản phẩm">
                                            @error('name')
                                            <span class="error-msg">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="parent_id">Danh mục cha:</label>
                                            <select name="parent_id" class="default_sel mb_30 w-100">
                                                <option data-display="--Chọn danh mục cha--">Không</option>
                                                @foreach($categories as $category)
                                                <option value="{{$category->id}}">{{$category->name}}</option>
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
                                        <input type="submit" class="btn btn-primary" value="Thêm mới">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
