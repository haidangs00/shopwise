@extends('admin.layouts.master', ['pageTitle'=>'Thêm mới màu'])

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
                                    <h5 class="modal-title form-title">Thêm mới màu</h5>
                                </div>
                                <div class="modal-body pd">
                                    <form class="form-action" method="post" action="{{route('colors.store')}}">
                                        @csrf
                                        <div class="form-group">
                                            <label for="name">Tên màu:</label>
                                            <input type="text" name="name" class="form-control" placeholder="Nhập tên màu">
                                            <span class="error-msg" error-for="name"></span>
                                        </div>
                                        <div class="form-group">
                                            <label for="parent_id">Mã màu:</label>
                                            <input type="color" name="color_code">
                                            <span class="error-msg" error-for="color_code"></span>
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
