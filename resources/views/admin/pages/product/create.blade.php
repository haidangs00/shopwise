@extends('admin.layouts.master', ['pageTitle'=>'Thêm mới sản phẩm'])

@section('content')
    <div class="container-fluid plr_30 body_white_bg pt_30">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="mb_30">
                    <div class="row justify-content-center">
                        <div class="col-lg-12">
                            <div class="modal-content">
                                <div class="modal-header form-header">
                                    <h5 class="modal-title form-title">Thêm mới sản phẩm</h5>
                                </div>
                                <div class="modal-body pd">
                                    <form class="form-action" method="post" action="{{route('products.store')}}"
                                          enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label for="name">Tên sản phẩm:</label>
                                            <input type="text" name="name" class="form-control"
                                                   placeholder="Nhập tên sản phẩm">
                                            <span class="error-msg" error-for="name"></span>
                                        </div>
                                        <div class="form-group">
                                            <label>Danh mục:</label>
                                            <select name="category_id" class="default_sel w-100">
                                                <option value="">--Chọn danh mục--</option>
                                                @foreach($categories as $category)
                                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                                @endforeach
                                            </select>
                                            <span class="error-msg" error-for="category_id"></span>
                                        </div>
                                        <div class="form-group">
                                            <label>Nhãn hàng:</label>
                                            <select name="brand_id" class="default_sel w-100">
                                                <option value="">--Chọn nhãn hàng--</option>
                                                @foreach($brands as $brand)
                                                    <option value="{{$brand->id}}">{{$brand->name}}</option>
                                                @endforeach
                                            </select>
                                            <span class="error-msg" error-for="brand_id"></span>
                                        </div>
                                        <div class="form-group">
                                            <label for="slug">Ảnh sản phẩm:</label>
                                            <a class="btn btn-primary cl-white" data-toggle="modal" data-target="#filemanager">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-card-image" viewBox="0 0 16 16">
                                                    <path d="M6.002 5.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
                                                    <path d="M1.5 2A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13zm13 1a.5.5 0 0 1 .5.5v6l-3.775-1.947a.5.5 0 0 0-.577.093l-3.71 3.71-2.66-1.772a.5.5 0 0 0-.63.062L1.002 12v.54A.505.505 0 0 1 1 12.5v-9a.5.5 0 0 1 .5-.5h13z"/>
                                                </svg>
                                                Chọn ảnh
                                            </a>
                                            <input class="form-control" type="hidden" name="image" id="image">
                                            <div>
                                                <img id="img-show" src="" alt="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="filepond">Ảnh liên quan:</label>
                                            <a class="btn btn-primary cl-white" data-toggle="modal" data-target="#filemanager-list">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-card-image" viewBox="0 0 16 16">
                                                    <path d="M6.002 5.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
                                                    <path d="M1.5 2A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13zm13 1a.5.5 0 0 1 .5.5v6l-3.775-1.947a.5.5 0 0 0-.577.093l-3.71 3.71-2.66-1.772a.5.5 0 0 0-.63.062L1.002 12v.54A.505.505 0 0 1 1 12.5v-9a.5.5 0 0 1 .5-.5h13z"/>
                                                </svg>
                                                Chọn ảnh
                                            </a>
                                            <input class="form-control" type="hidden" name="imageList" id="image-list">
                                            <div class="row" id="img-show-list">

                                            </div>
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
                                            <div>
                                                @foreach($colors as $color)
                                                    <label class="form-checkbox-label">
                                                        <input name=colors[] value="{{$color->id}}" class="form-checkbox-field"
                                                               type="checkbox" />
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
                                                        <input name=sizes[] value="{{$size->id}}" class="form-checkbox-field"
                                                               type="checkbox"/>
                                                        <i class="form-checkbox-button"></i>
                                                        <span>{{$size->name}}</span>
                                                    </label>
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Giá gốc:</label>
                                            <input type="number" name="regular_price" class="form-control"
                                                   placeholder="Nhập giá gốc">
                                            <span class="error-msg" error-for="regular_price"></span>
                                        </div>
                                        <div class="form-group">
                                            <label>Giá khuyến mãi:</label>
                                            <input type="number" name="promotional_price" class="form-control"
                                                    placeholder="Nhập giá khuyến mãi">
                                            <span class="error-msg" error-for="promotional_price"></span>
                                        </div>
                                        <div class="form-group">
                                            <label>Mô tả:</label>
                                            <textarea class="form-control" name="description" rows="5"></textarea>
                                            <span class="error-msg" error-for="description"></span>
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

        <!-- Modal -->
        <div class="modal fade" id="filemanager" tabindex="-1" role="dialog" aria-labelledby="filemanagerTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:90%">
                <div class="modal-content" style="height: 700px">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <iframe class="modal-file w-100 h-100" src="{{url('filemanager')}}/dialog.php?field_id=image"></iframe>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="filemanager-list" tabindex="-1" role="dialog" aria-labelledby="filemanagerTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:90%">
                <div class="modal-content" style="height: 700px">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <iframe class="modal-file w-100 h-100" src="{{url('filemanager')}}/dialog.php?field_id=image-list"></iframe>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
