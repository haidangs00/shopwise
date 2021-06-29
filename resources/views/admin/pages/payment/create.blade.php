@extends('admin.layouts.master', ['pageTitle'=>'Thêm mới phương thức thanh toán'])

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
                                    <h5 class="modal-title form-title">Thêm mới phương thức thanh toán</h5>
                                </div>
                                <div class="modal-body pd">
                                    <form class="form-action" method="post" action="{{route('payments.store')}}">
                                        @csrf
                                        <div class="form-group">
                                            <label for="name">Tên:</label>
                                            <input type="text" name="name" class="form-control" placeholder="Nhập tên">
                                            <span class="error-msg" error-for="name"></span>
                                        </div>
                                        <div class="form-group">
                                            <label>Mô tả:</label>
                                            <textarea class="form-control" name="description" rows="5"></textarea>
                                            <span class="error-msg" error-for="description"></span>
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
@endsection
