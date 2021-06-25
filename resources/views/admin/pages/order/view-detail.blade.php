@extends('admin.layouts.master', ['pageTitle'=>'Chi tiết đơn hàng'])

@section('content')
    <div class="container-fluid plr_30 body_white_bg pt_30">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="mb_30">
                    <div class="row justify-content-center">
                        <div class="col-lg-12">
                            <div class="modal-content">
                                <div class="modal-header form-header">
                                    <h5 class="modal-title form-title">Chi tiết đơn hàng</h5>
                                </div>
                                <div class="modal-body pd">
                                    <div class="">
                                        <h4>{{$order->orderDetails->count()}} Sản phẩm</h4>
                                        <!-- table-responsive -->
                                        <table class="table table-striped">
                                            <thead class="thead-dark">
                                            <tr>
                                                <th scope="col">Ảnh</th>
                                                <th scope="col">Tên</th>
                                                <th scope="col">Số lượng</th>
                                                <th scope="col">Tổng tiền (<i>VND</i>)</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($order->orderDetails as $item)
                                                <tr>
                                                    <td>
                                                        <div class="image-td">
                                                            <img class="w-100"
                                                                 src="{{url('uploads')}}/{{$item->product->image}}"
                                                                 alt="{{$item->product->name}}">
                                                        </div>
                                                    </td>
                                                    <td>{{$item->product->name}}</td>
                                                    <td>{{$item->quantity}}</td>
                                                    <td>{{number_format($item->price*$item->quantity)}}</td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                            <tfoot>
                                            <tr>
                                                <td colspan="6" class="px-0">
                                                    <div class="row no-gutters align-items-center">
                                                        <div class="col-lg-9 col-md-6 mb-3 mb-md-0">
                                                        </div>
                                                        <div class="col-lg-3 col-md-6 text-left text-md-left">
                                                            <i><b>Tổng</b>: {{number_format($order->total_price)}} (VND)</i>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                    <div>
                                        <h4>Thông tin giao hàng:</h4>
                                        <ul class="order-info">
                                            <li>- Tên khách hàng: <i>{{$order->user->name}}</i></li>
                                            <li>- Số điện thoại: <i>{{$order->phone}}</i></li>
                                            <li>- Địa chỉ: <i>{{$order->address}}</i></li>
                                            <li>- Email: <i>{{$order->user->email}}</i></li>
                                            <li>- Số lượng sản phẩm: <i>{{$order->total_quantity}}</i></li>
                                            <li>- Tổng đơn hàng: <i>{{number_format($order->total_price)}} (VND)</i></li>
                                            <li>- Phương thức giao hàng:</li>
                                            <li>- Phương thức thanh toán:</li>
                                            <li>- Ngày đặt hàng: <i>{{$order->created_at}}</i></li>
                                            <li>- Ngày giao hàng(dự kiến): <i>{{$order->created_at}}</i></li>
                                        </ul>
                                    </div>
                                    <form class="form-action mt-3" method="post"
                                          action="{{route('orders.update', $order->id)}}"
                                          enctype="multipart/form-data">
                                        @method('PUT')
                                        @csrf
                                        <div class="form-group">
                                            <h4>Trạng thái:</h4>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="status"
                                                       id="status1" value="0" {{$order->status == 0 ? 'checked' : ''}}>
                                                <label class="form-check-label" for="status1">
                                                    Chờ xử lý
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="status"
                                                       id="status2" value="1" {{$order->status == 1 ? 'checked' : ''}}>
                                                <label class="form-check-label" for="status2">
                                                    Đang giao hàng
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="status"
                                                       id="status3" value="2" {{$order->status == 2 ? 'checked' : ''}}>
                                                <label class="form-check-label" for="status3">
                                                    Hoàn thành
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="status"
                                                       id="status4" value="3" {{$order->status == 3 ? 'checked' : ''}}>
                                                <label class="form-check-label" for="status4">
                                                    Đã hủy
                                                </label>
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
    </div>
@endsection
