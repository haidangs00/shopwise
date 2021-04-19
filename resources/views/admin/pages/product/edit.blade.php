@extends('admin.layouts.master', ['pageTitle'=>'Cập nhập sản phẩm'])

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
                                    <h5 class="modal-title form-title">Cập nhập sản phẩm</h5>
                                </div>
                                <div class="modal-body pd">
                                    <form method="post" action="{{route('products.update', $product->id)}}"
                                          enctype="multipart/form-data">
                                        @method('PUT')
                                        @csrf
                                        <div class="form-group">
                                            <label for="name">Tên sản phẩm:</label>
                                            <input type="text" name="name" value="{{$product->name}}"
                                                   class="form-control"
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
                                                    <option
                                                        value="{{$category->id}}" {{$product->category_id==$category->id?'selected':''}}>{{$category->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="brand_id">Nhãn hàng:</label>
                                            <select name="brand_id" class="default_sel mb_30 w-100">
                                                <option>--Chọn nhãn hàng--</option>
                                                @foreach($brands as $brand)
                                                    <option
                                                        value="{{$brand->id}}" {{$product->brand_id==$brand->id?'selected':''}}>{{$brand->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="slug">Slug:</label>
                                            <input type="text" name="slug" value="{{$product->slug}}"
                                                   class="form-control" placeholder="Nhập slug">
                                        </div>
                                        <div class="form-group">
                                            <label for="slug">Ảnh sản phẩm:</label>
                                            <div class="wh200">
                                                <img src="{{url('uploads')}}/{{$product->image}}"
                                                     alt="{{$product->name}}">
                                            </div>
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
                                            <output id="Filelist" class="d-block mt-3">
                                                <ul class="thumb-Images" id="imgList">
                                                    @foreach($images as $image)
                                                        <li>
                                                            <div class="img-wrap"><span class="close">×</span>
                                                                <img
                                                                    class="thumb"
                                                                    src="{{url('uploads')}}/{{$image->path}}"
                                                                    title="{{$image->path}}" data-id="{{$image->path}}">
                                                            </div>
                                                            <div class="FileNameCaptionStyle">{{$image->path}}</div>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </output>
                                        </div>
                                        <div class="form-group">
                                            <label for="status">Trạng thái:</label>
                                            <div class="radio">
                                                <input id="radio-1" name="status" type="radio"
                                                       value="1" {{$product->status=="1"?'checked':''}}>
                                                <label for="radio-1" class="radio-label">Active</label>
                                            </div>
                                            <div class="radio">
                                                <input id="radio-2" name="status" type="radio"
                                                       value="0" {{$product->status=="0"?'checked':''}}>
                                                <label for="radio-2" class="radio-label">Inactive</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="color">Màu:</label>
                                            <div>
                                                @foreach($colors as $color)
                                                    <label class="form-checkbox-label">
                                                        <input name=color_id class="form-checkbox-field"
                                                               type="checkbox" {{$color->id==}} />
                                                        <i class="form-checkbox-button custom-i"></i>
                                                        <span class="show-color"
                                                              style="background-color: {{$color->color_code}}"></span>
                                                    </label>
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="size">Size:</label>
                                            <div>
                                                @foreach($sizes as $size)
                                                    <label class="form-checkbox-label">
                                                        <input name=color_id class="form-checkbox-field"
                                                               type="checkbox"/>
                                                        <i class="form-checkbox-button"></i>
                                                        <span>{{$size->name}}</span>
                                                    </label>
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="price">Giá gốc:</label>
                                            <input type="number" name="regular_price"
                                                   value="{{$product->regular_price}}" class="form-control"
                                                   placeholder="Nhập giá gốc">
                                        </div>
                                        <div class="form-group">
                                            <label for="sale">Khuyến mãi(%):</label>
                                            <input type="number" name="sale" value="{{$product->sale}}"
                                                   class="form-control"
                                                   placeholder="Nhập khuyến mãi">
                                        </div>
                                        <div class="form-group">
                                            <label>Giá khuyến mãi:</label>
                                            <input type="number" value="30000" class="form-control"
                                                   disabled>
                                        </div>
                                        <div class="form-group">
                                            <label>Mô tả:</label>
                                            <textarea name="description" id="product_description" rows="10" cols="80">
                                                {{$product->description}}
                                            </textarea>
                                        </div>
                                        <input type="submit" class="btn btn-primary" value="Cập nhập">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
