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
                                <th scope="col">Giâ khuyến mãi</th>
                                <th scope="col">Số sao</th>
                                <th scope="col">Trạng thái</th>
                                <th scope="col">Hành động</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $product)
                                <tr>
                                    <td>
                                        <div class="image-td">
                                            <img class="w-100" src="{{url('uploads')}}/{{$product->image}}" alt="{{$product->name}}">
                                        </div>
                                    </td>
                                    <td>{{$product->name}}</td>
                                    <td>{{$product->category->name}}</td>
                                    <td>
                                        @foreach($product->productColors as $color)
                                            <span class="pro-color" style="background-color: {{$color->getColorCode()}}"></span>
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach($product->productSizes as $size)
                                            <span class="pro-size">{{$size->getSize()}}</span>
                                        @endforeach
                                    </td>
                                    <td>{{$product->brand->name}}</td>
                                    <td>{{$product->regular_price}}</td>
                                    <td>{{$product->promotional_price}}</td>
                                    <td>{{$product->star}}</td>
                                    <td class="status-switch">
                                        <input action="{{route('products.update_status', $product->id)}}" class="js-status-switch" {{$product->status == 1 ? 'checked' : ''}} type="checkbox" id="switch-{{$product->id}}" /><label for="switch-{{$product->id}}">Toggle</label>
                                    </td>
                                    <td>
                                        <a href="{{route('products.edit', $product->id)}}" class="btn_edit">Sửa</a>
                                        <a action="{{route('products.destroy', $product->id)}}" class="btn_delete">Xóa</a>
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
