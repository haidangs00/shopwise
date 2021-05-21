@extends('client.layouts.master', ['pageTitle' => 'Danh sách yêu thích'])
@section('content')

    <!-- START SECTION SHOP -->
    <div class="section">
        <div class="container">
            @if($wishlist->all() !== [])
                <div class="row">
                    <div class="col-12">
                        <div class="table-responsive wishlist_table">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th class="product-thumbnail">Ảnh</th>
                                    <th class="product-name">Tên sản phẩm</th>
                                    <th class="product-price">Giá</th>
                                    <th class="product-stock-status">Trạng thái</th>
                                    <th class="product-add-to-cart"></th>
                                    <th class="product-remove">Xóa</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($wishlist as $item)
                                    <tr>
                                        <td class="product-thumbnail"><a href="{{route('clients.product_detail', $item->product_id)}}}"><img src="{{url('uploads')}}/{{$item->product->image}}"
                                                                                       alt="product3"></a></td>
                                        <td class="product-name" data-title="Product"><a href="{{route('clients.product_detail', $item->product_id)}}}">{{$item->product->name}}</a>
                                        </td>
                                        <td class="product-price" data-title="Price">₫{{number_format($item->product->promotional_price)}}</td>
                                        <td class="product-stock-status" data-title="Stock Status"><span
                                                class="badge badge-pill badge-success">Còn hàng</span></td>
                                        <td class="product-add-to-cart"><a href="{{route('clients.add_to_cart', $item->product_id)}}" class="btn btn-fill-out"><i
                                                    class="icon-basket-loaded"></i> Thêm vào giỏ hàng</a></td>
                                        <td class="product-remove" data-title="Remove"><a href="{{route('clients.remove_from_list', $item->product_id)}}"><i
                                                    class="ti-close"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            @else
                <div class="row">
                    <div class="col-12">
                        <div class="medium_divider text-center">Bạn chưa có sản phẩm nào!</div>
                        <div class="divider center_icon"><i class="ti-shopping-cart-full"></i></div>
                        <div class="medium_divider"></div>
                        <div class="text-center">
                            <a href="{{route('clients.products')}}" class="btn btn-fill-out">Mua sắm ngay</a>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
    <!-- END SECTION SHOP -->

@endsection
