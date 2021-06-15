@extends('admin.layouts.master', ['pageTitle'=>'Unauthorized'])

@section('content')
    <div class="text-center">
        <img style="width:100px" src="{{url('uploads')}}/401.jpg" alt="Unauthorized">
        <h5 class="modal-title form-title">Bạn không có quyền truy cập chức năng này!</h5>
    </div>
@endsection
