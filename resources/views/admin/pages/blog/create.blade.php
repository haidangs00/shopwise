@extends('admin.layouts.master', ['pageTitle'=>'Thêm mới bài viết'])

@section('content')
    <div class="container-fluid plr_30 body_white_bg pt_30">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="mb_30">
                    <div class="row justify-content-center">
                        <div class="col-lg-12">
                            <div class="modal-content">
                                <div class="modal-header form-header">
                                    <h5 class="modal-title form-title">Thêm mới bài viết</h5>
                                </div>
                                <div class="modal-body pd">
                                    <form class="form-action" method="post" action="{{route('blogs.store')}}"
                                          enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label for="title">Tiêu đề bài viết:</label>
                                            <input type="text" name="title" class="form-control"
                                                   placeholder="Nhập tiêu đề bài viết">
                                            <span class="error-msg" error-for="title"></span>
                                        </div>
                                        <div class="form-group">
                                            <label>Danh mục bài viết:</label>
                                            <select name="blog_category_id" class="default_sel w-100">
                                                <option value="">--Chọn danh mục--</option>
                                                @foreach($blogCategories as $blogCategory)
                                                    <option value="{{$blogCategory->id}}">{{$blogCategory->name}}</option>
                                                @endforeach
                                            </select>
                                            <span class="error-msg" error-for="blog_category_id"></span>
                                        </div>
                                        <div class="form-group">
                                            <label for="slug">Ảnh bài viết:</label>
                                            <a class="btn btn-primary cl-white" data-toggle="modal" data-target="#filemanager">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-card-image" viewBox="0 0 16 16">
                                                    <path d="M6.002 5.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
                                                    <path d="M1.5 2A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13zm13 1a.5.5 0 0 1 .5.5v6l-3.775-1.947a.5.5 0 0 0-.577.093l-3.71 3.71-2.66-1.772a.5.5 0 0 0-.63.062L1.002 12v.54A.505.505 0 0 1 1 12.5v-9a.5.5 0 0 1 .5-.5h13z"/>
                                                </svg>
                                                Chọn ảnh
                                            </a>
                                            <input class="form-control" type="hidden" name="file" id="image">
                                            <div>
                                                <img id="img-show" src="" alt="">
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
                                            <label for="summary">Tóm tắt:</label>
                                            <input type="text" name="summary" class="form-control"
                                                   placeholder="Nhập tóm tắt bài viết">
                                            <span class="error-msg" error-for="summary"></span>
                                        </div>
                                        <div class="form-group">
                                            <label>Nội dung:</label>
                                            <textarea class="form-control" name="content" rows="5"></textarea>
                                            <span class="error-msg" error-for="content"></span>
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
