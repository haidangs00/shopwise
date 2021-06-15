@extends('client.layouts.master', ['pageTitle' => 'Completed'])
@section('content')

    <div class="section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="text-center order_complete">
                        <i class="fas fa-check-circle"></i>
                        <div class="heading_s1">
                            <h3>Đặt hàng thành công!</h3>
                        </div>
                        <p>Cảm ơn đơn hàng của bạn. Bạn sẽ nhận được email khi đơn hàng hoàn thành!.</p>
                        <a href="{{route('clients.products')}}" class="btn btn-fill-out">Tiếp tục mua sắm</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
