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
    @if(!$products->isEmpty())
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
                    <input action="{{route('products.update_status', $product->id)}}" class="js-status-switch"
                           {{$product->status == 1 ? 'checked' : ''}} type="checkbox"
                           id="switch-{{$product->id}}"/><label for="switch-{{$product->id}}">Toggle</label>
                </td>
                <td>
                    <a href="{{route('products.edit', $product->id)}}" class="btn_edit">Sửa</a>
                    <a action="{{route('products.destroy', $product->id)}}" class="btn_delete">Xóa</a>
                </td>
            </tr>
        @endforeach
    @else
        <tr class="odd">
            <td colspan="11" class="dataTables_empty text-center">Không tìm thấy bản ghi nào!</td>
        </tr>
    @endif
    </tbody>
</table>
