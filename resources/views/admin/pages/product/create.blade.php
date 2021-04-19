@extends('admin.layouts.master', ['pageTitle'=>'Thêm mới sản phẩm'])

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
                                    <h5 class="modal-title form-title">Thêm mới sản phẩm</h5>
                                </div>
                                <div class="modal-body pd">
                                    <form method="post" action="{{route('products.store')}}"
                                          enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label for="name">Tên sản phẩm:</label>
                                            <input type="text" name="name" class="form-control"
                                                   placeholder="Nhập tên sản phẩm">
                                            @error('name')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="parent_id">Danh mục:</label>
                                            <select name="category_id" class="default_sel mb_30 w-100">
                                                <option>--Chọn danh mục--</option>
                                                @foreach($categories as $category)
                                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="brand_id">Nhãn hàng:</label>
                                            <select name="brand_id" class="default_sel mb_30 w-100">
                                                <option>--Chọn nhãn hàng--</option>
                                                @foreach($brands as $brand)
                                                    <option value="{{$brand->id}}">{{$brand->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="slug">Slug:</label>
                                            <input type="text" name="slug" class="form-control" placeholder="Nhập slug">
                                        </div>
                                        <div class="form-group">
                                            <label for="slug">Ảnh sản phẩm:</label>
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <div class="file-upload">
                                                        <button class="file-upload-btn" type="button"
                                                                onclick="$('.file-upload-input').trigger( 'click' )">Ảnh
                                                        </button>

                                                        <div class="image-upload-wrap">
                                                            <input class="file-upload-input" name="file" type='file'
                                                                   onchange="readURL(this);" accept="image/*"/>
                                                            <div class="drag-text">
                                                                <h3>Kéo và thả tệp hoặc chọn thêm hình ảnh</h3>
                                                            </div>
                                                        </div>
                                                        <div class="file-upload-content">
                                                            <img class="file-upload-image" src="#" alt="your image"/>
                                                            <div class="image-title-wrap">
                                                                <button type="button" onclick="removeUpload()"
                                                                        class="remove-image">Remove <span
                                                                        class="image-title">Uploaded Image</span>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="filepond">Ảnh liên quan:</label>
                                            <span class="btn btn-upload fileinput-button">
                                                <span>Chọn ảnh</span>
                                                    <input type="file" name="images[]" id="files" multiple
                                                           accept="image/jpeg, image/png, image/gif,"><br/>
                                                </span>
                                            <output id="Filelist" class="d-block mt-3"></output>
                                        </div>
                                        <div class="form-group">
                                            <label for="status">Trạng thái:</label>
                                            <div class="radio">
                                                <input id="radio-1" name="status" type="radio" value="1" checked>
                                                <label for="radio-1" class="radio-label">Active</label>
                                            </div>
                                            <div class="radio">
                                                <input id="radio-2" name="status" type="radio" value="0">
                                                <label for="radio-2" class="radio-label">Inactive</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="color">Màu:</label>
                                            <select name="color_id" class="default_sel mb_30 w-100">
                                                <option>--Chọn màu--</option>
                                                @foreach($colors as $color)
                                                    <option value="{{$color->id}}">{{$color->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="size">Size:</label>
                                            <select name="size_id" class="default_sel mb_30 w-100">
                                                <option>--Chọn size--</option>
                                                @foreach($sizes as $size)
                                                    <option value="{{$size->id}}">{{$size->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="price">Giá gốc:</label>
                                            <input type="number" name="regular_price" class="form-control"
                                                   placeholder="Nhập giá gốc">
                                        </div>
                                        <div class="form-group">
                                            <label for="sale">Khuyến mãi(%):</label>
                                            <input type="number" name="sale" class="form-control"
                                                   placeholder="Nhập khuyến mãi">
                                        </div>
                                        <div class="form-group">
                                            <label>Giá khuyến mãi:</label>
                                            <input type="number" value="30000" class="form-control"
                                                   disabled>
                                        </div>
                                        <div class="form-group">
                                            <label>Mô tả:</label>
                                            <textarea name="description" id="product_description" rows="10" cols="80"></textarea>
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
