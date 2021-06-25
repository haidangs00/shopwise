@extends('admin.layouts.master', ['pageTitle'=>'Danh sách đơn hàng'])

@section('content')
    <div class="container-fluid plr_30 body_white_bg pt_30">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="QA_section">
                    <div class="white_box_tittle list_header">
                        <h4>Danh sách đơn hàng</h4>
                        <div class="box_right d-flex lms_block">
                            <div class="serach_field_2">
                                <div class="search_inner">
                                    <form class="js-search-form">
                                        <div class="search_field">
                                            <input type="text" name="search_key" placeholder="Tìm kiếm...">
                                        </div>
                                        <button type="submit"><i class="ti-search"></i></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="QA_table ">
                        <!-- table-responsive -->
                        <table class="table lms_table_active">
                            <thead>
                            <tr>
                                <th scope="col">Tên khách hàng</th>
                                <th scope="col">Số điện thoại</th>
                                <th scope="col">Địa chỉ</th>
                                <th scope="col">Tổng tiền</th>
                                <th scope="col">Trạng thái</th>
                                <th scope="col">Hành động</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($orders as $order)
                                <tr>
                                    <td>{{$order->user->name}}</td>
                                    <td>{{$order->phone}}</td>
                                    <td>{{$order->address}}</td>
                                    <td>{{$order->total_price}}</td>
                                    <td>
                                        @if($order->status == 0)
                                            <a href="#" class="status_processing">Chờ xử lý</a>
                                        @elseif($order->status == 1)
                                            <a href="#" class="status_processing">Đang giao</a>
                                        @elseif($order->status == 2)
                                            <a href="#" class="status_btn">Hoàn thành</a>
                                        @else
                                            <a href="#" class="status_inactive">Đã hủy</a>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{route('orders.show', $order->id)}}" class="btn_edit">Xem chi tiết</a>
                                        <a action="{{route('orders.destroy', $order->id)}}" class="btn_delete">Xóa</a>
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
