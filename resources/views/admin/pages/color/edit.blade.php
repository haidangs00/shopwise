@extends('admin.layouts.master', ['pageTitle'=>'Cập nhập màu'])

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
                                    <h5 class="modal-title form-title">Cập nhập màu</h5>
                                </div>
                                <div class="modal-body pd">
                                    <form method="post" action="{{route('colors.update', $color->id)}}">
                                        @method('PUT')
                                        @csrf
                                        <div class="form-group">
                                            <label for="name">Tên màu:</label>
                                            <input type="text" name="name" value="{{$color->name}}" class="form-control" placeholder="Nhập tên màu">
                                            @error('name')
                                            <span class="error-msg">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="parent_id">Mã màu:</label>
                                            <input type="color" name="color_code" value="{{$color->color_code}}">
                                            @error('color_code')
                                            <span class="error-msg">{{$message}}</span>
                                            @enderror
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
