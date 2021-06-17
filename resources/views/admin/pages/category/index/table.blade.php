<table class="table lms_table_active">
    <thead>
    <tr>
        <th scope="col">Tên</th>
        <th scope="col">Tên danh mục cha</th>
        <th scope="col">Slug</th>
        <th scope="col">Trạng thái</th>
        <th scope="col">Hành động</th>
    </tr>
    </thead>
    <tbody>
    @if(!$categories->isEmpty())
        @foreach($categories as $category)
            <tr>
                <td>{{$category->name}}</td>
                <td>{{$category->getParentsNames()}}</td>
                <td>{{$category->slug}}</td>
                <td class="status-switch">
                    <input action="{{route('categories.update_status', $category->id)}}" class="js-status-switch"
                           {{$category->status == 1 ? 'checked' : ''}} type="checkbox"
                           id="switch-{{$category->id}}"/><label for="switch-{{$category->id}}">Toggle</label>
                </td>
                <td>
                    <a href="{{route('categories.edit', $category->id)}}" class="btn_edit">Sửa</a>
                    <a action="{{route('categories.destroy', $category->id)}}" class="btn_delete">Xóa</a>
                </td>
            </tr>
        @endforeach
    @else
        <tr class="odd">
            <td colspan="8" class="dataTables_empty text-center">Không tìm thấy bản ghi nào!</td>
        </tr>
    @endif
    </tbody>
</table>
