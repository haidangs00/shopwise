@extends('admin.layouts.master', ['pageTitle'=>'Danh sách sản phẩm'])

@section('content')
    <div class="container-fluid plr_30 body_white_bg pt_30">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="QA_section">
                    <div class="white_box_tittle list_header">
                        <h4>Sản phẩm</h4>
                        <div class="box_right d-flex lms_block">
                            <div class="serach_field_2">
                                <div class="search_inner">
                                    <form Active="#">
                                        <div class="search_field">
                                            <input type="text" placeholder="Search content here...">
                                        </div>
                                        <button type="submit"> <i class="ti-search"></i> </button>
                                    </form>
                                </div>
                            </div>
                            <div class="add_button ml-10">
                                <a href="{{route('products.create')}}" class="btn_1">Thêm mới</a>
                            </div>
                        </div>
                    </div>

                    <div class="QA_table ">
                        <!-- table-responsive -->
                        <table class="table lms_table_active">
                            <thead>
                            <tr>
                                <th scope="col">Ảnh</th>
                                <th scope="col">Tên</th>
                                <th scope="col">Tên danh mục</th>
                                <th scope="col">Màu</th>
                                <th scope="col">Size</th>
                                <th scope="col">Nhãn hàng</th>
                                <th scope="col">Giá gốc</th>
                                <th scope="col">Sale</th>
                                <th scope="col">Số sao</th>
                                <th scope="col">Mô tả</th>
                                <th scope="col">Trạng thái</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $product)
                                <tr>
                                    <td>{{$product->image}}</td>
                                    <td>{{$product->name}}</td>
                                    <td>{{$product->category_id}}</td>
                                    <td>{{$product->color}}</td>
                                    <td>{{$product->size}}</td>
                                    <td>{{$product->brand_id}}</td>
                                    <td>{{$product->regular_price}}</td>
                                    <td>{{$product->sale}}</td>
                                    <td>{{$product->star}}</td>
                                    <td>{{$product->description}}</td>
                                    <td>
                                        @if($product->status == 1)
                                            <a href="#" class="status_btn">Active</a>
                                        @else
                                            <a href="#" class="status_btn">Inactive</a>
                                        @endif
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
