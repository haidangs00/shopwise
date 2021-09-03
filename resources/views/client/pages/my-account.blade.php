@extends('client.layouts.master', ['pageTitle' => 'Quản lý tài khoản'])
@section('content')

    <div class="section">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-4">
                    <div class="dashboard_menu">
                        <ul class="nav nav-tabs flex-column" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="account-detail-tab" data-toggle="tab"
                                   href="#account-detail" role="tab" aria-controls="account-detail"
                                   aria-selected="true"><i class="ti-id-badge"></i>Chi tiết tài khoản</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="orders-tab" data-toggle="tab" href="#orders" role="tab"
                                   aria-controls="orders" aria-selected="false"><i class="ti-shopping-cart-full"></i>Đơn
                                    hàng</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="dashboard-tab" data-toggle="tab" href="#dashboard" role="tab"
                                   aria-controls="dashboard" aria-selected="false"><i class="ti-layout-grid2"></i>Đổi
                                    mật khẩu</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('clients.logout')}}"><i class="ti-lock"></i>Logout</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9 col-md-8">
                    <div class="tab-content dashboard_content">
                        <div class="tab-pane fade active show" id="account-detail" role="tabpanel"
                             aria-labelledby="account-detail-tab">
                            <div class="card">
                                <div class="card-header">
                                    <h3>Thông tin tài khoản</h3>
                                </div>
                                <div class="card-body">
                                    <form method="post" class="form-action" action="{{route('clients.change_info')}}">
                                        @csrf
                                        @method('PUT')
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <label>Tên đăng nhập</label>
                                                <input class="form-control" name="user_name"
                                                       value="{{$userLogged->user_name}}" type="text" disabled>
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label>Họ tên <span class="required">*</span></label>
                                                <input class="form-control" name="name" value="{{$userLogged->name}}"
                                                       type="text">
                                                <span class="error-msg" error-for="name"></span>
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label>Email <span class="required">*</span></label>
                                                <input disabled class="form-control" name="email"
                                                       value="{{$userLogged->email}}" type="email">
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label>Số điện thoại <span class="required">*</span></label>
                                                <input disabled class="form-control" name="phone"
                                                       value="{{$userLogged->phone}}" type="text">
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label>Địa chỉ</label>
                                                <input class="form-control" name="address"
                                                       value="{{$userLogged->address}}" type="text">
                                            </div>
                                            <div class="col-md-12">
                                                <button type="submit" class="btn btn-fill-out" name="submit"
                                                        value="Submit">Cập nhập thông tin
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="orders" role="tabpanel" aria-labelledby="orders-tab">
                            <div class="card">
                                <div class="card-header">
                                    <h3>Danh sách đơn hàng</h3>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                            <tr>
                                                <th>Đơn hàng</th>
                                                <th>Ngày đặt</th>
                                                <th>Trạng thái</th>
                                                <th>Tổng tiền(VND)</th>
                                                <th>#</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($orders as $order)
                                                <tr>
                                                    <td>#{{$loop->index + 1}}</td>
                                                    <td>{{date_format($order->created_at, 'd-m-Y')}}</td>
                                                    <td>
                                                        @if($order->status == 0)
                                                            Chờ xử lý
                                                        @elseif($order->status == 1)
                                                            Đang giao
                                                        @elseif($order->status == 2)
                                                            Hoàn thành
                                                        @else
                                                            Đã hủy
                                                        @endif
                                                    </td>
                                                    <td>{{number_format($order->total_price)}}</td>
                                                    <td><a href="{{route('clients.order_detail', $order->id)}}" class="btn btn-fill-out btn-sm">Chi tiết</a></td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
                            <div class="card">
                                <div class="card-header">
                                    <h3>Đổi mật khẩu</h3>
                                </div>
                                <div class="card-body">
                                    <form method="post" class="form-action"
                                          action="{{route('clients.change_password')}}">
                                        @csrf
                                        @method('PUT')
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <label>Mật khẩu hiện tại <span class="required">*</span></label>
                                                <input class="form-control" name="password" type="password">
                                                <span class="error-msg" error-for="password"></span>
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label>Mật khẩu mới <span class="required">*</span></label>
                                                <input class="form-control" name="npassword" type="password">
                                                <span class="error-msg" error-for="npassword"></span>
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label>Xác nhận mật khẩu <span class="required">*</span></label>
                                                <input class="form-control" name="cpassword" type="password">
                                                <span class="error-msg" error-for="cpassword"></span>
                                            </div>
                                            <div class="col-md-12">
                                                <button type="submit" class="btn btn-fill-out" name="submit"
                                                        value="Submit">Xác nhận
                                                </button>
                                            </div>
                                        </div>
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
