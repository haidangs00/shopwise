@extends('admin.layouts.master', ['pageTitle'=>'Danh sách phương thức thanh toán'])

@section('content')
    <div class="container-fluid plr_30 body_white_bg pt_30">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="QA_section">
                    <div class="white_box_tittle list_header">
                        <h4>Danh sách phương thức thanh toán</h4>
                        <div class="box_right d-flex lms_block">
                            <div class="serach_field_2">
                                <div class="search_inner">
                                    <form class="js-search-form">
                                        <div class="search_field">
                                            <input type="text" name="search_key" placeholder="Tìm kiếm...">
                                        </div>
                                        <button type="submit"> <i class="ti-search"></i> </button>
                                    </form>
                                </div>
                            </div>
                            <div class="add_button ml-10">
                                <a href="{{route('payments.create')}}" class="btn_1">Thêm mới</a>
                            </div>
                        </div>
                    </div>

                    <div class="QA_table ">
                        <!-- table-responsive -->
                        <table class="table lms_table_active">
                            <thead>
                            <tr>
                                <th scope="col">Tên</th>
                                <th scope="col">Mô tả</th>
                                <th scope="col">Trạng thái</th>
                                <th scope="col">Hành động</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($payments as $payment)
                                <tr>
                                    <td>{{$payment->name}}</td>
                                    <td>{{$payment->description}}</td>
                                    <td class="status-switch">
                                        <input action="{{route('payments.update_status', $payment->id)}}" class="js-status-switch" {{$payment->status == 1 ? 'checked' : ''}} type="checkbox" id="switch-{{$payment->id}}" /><label for="switch-{{$payment->id}}">Toggle</label>
                                    </td>
                                    <td>
                                        <a href="{{route('payments.edit', $payment->id)}}" class="btn_edit">Sửa</a>
                                        <a action="{{route('payments.destroy', $payment->id)}}" class="btn_delete">Xóa</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
