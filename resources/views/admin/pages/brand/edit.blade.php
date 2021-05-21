@extends('admin.layouts.master', ['pageTitle'=>'Cập nhập nhãn hàng'])

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
                                    <h5 class="modal-title form-title">Cập nhập nhãn hàng</h5>
                                </div>
                                <div class="modal-body pd">
                                    <form class="form-action" method="post" action="{{route('brands.update', $brand->id)}}" enctype="multipart/form-data">
                                        @method('PUT')
                                        @csrf
                                        <div class="form-group">
                                            <label for="name">Tên nhãn hàng:</label>
                                            <input type="text" name="name" value="{{$brand->name}}" class="form-control" placeholder="Nhập tên nhãn hàng">
                                            <span class="error-msg" error-for="name"></span>
                                        </div>
                                        <div class="form-group">
                                            @if($brand->logo != NULL)
                                            <label>Ảnh:</label>
                                            <div class="wh200">
                                                <img src="{{url('uploads')}}/{{$brand->logo}}" alt="{{$brand->name}}">
                                            </div>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <div class="file-upload">
                                                        <button class="file-upload-btn" type="button"
                                                                onclick="$('.file-upload-input').trigger( 'click' )">Ảnh
                                                        </button>

                                                        <div class="image-upload-wrap">
                                                            <input name="file" class="file-upload-input" type='file'
                                                                   onchange="readURL(this);" accept="image/*"/>
                                                            <div class="drag-text">
                                                                <h3>Kéo và thả tệp hoặc chọn thêm hình ảnh</h3>
                                                            </div>
                                                        </div>
                                                        <div class="file-upload-content">
                                                            <img class="file-upload-image" src="#" alt="your image"/>
                                                            <div class="image-title-wrap">
                                                                <button type="button" onclick="removeUpload()"
                                                                        class="remove-image">Xóa <span class="image-title">Uploaded Image</span>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="slug">Slug:</label>
                                            <input type="text" name="slug" value="{{$brand->slug}}" class="form-control" placeholder="Nhập slug">
                                        </div>
                                        <div class="form-group">
                                            <label for="status">Trạng thái:</label>
                                            <div class="radio">
                                                <input id="radio-1" name="status" type="radio" value="1" {{$brand->status=='1'?'checked':''}}>
                                                <label for="radio-1" class="radio-label">Active</label>
                                            </div>
                                            <div class="radio">
                                                <input id="radio-2" name="status" type="radio" value="0" {{$brand->status=='0'?'checked':''}}>
                                                <label  for="radio-2" class="radio-label">Inactive</label>
                                            </div>
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
