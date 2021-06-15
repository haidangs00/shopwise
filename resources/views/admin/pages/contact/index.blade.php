@extends('admin.layouts.master', ['pageTitle'=>'Danh sách liên hệ khách hàng'])

@section('content')
    <div class="container-fluid plr_30 body_white_bg pt_30">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="QA_section">
                    <div class="white_box_tittle list_header">
                        <h4>Danh sách liên hệ khách hàng</h4>
                        <div class="box_right d-flex lms_block">
                            <div class="serach_field_2">
                                <div class="search_inner">
                                    <form Active="#">
                                        <div class="search_field">
                                            <input type="text" placeholder="Tìm kiếm...">
                                        </div>
                                        <button type="submit"> <i class="ti-search"></i> </button>
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
                                <th scope="col">Email</th>
                                <th scope="col">Số diện thoại</th>
                                <th scope="col">Chủ đề</th>
                                <th scope="col">Nội dung</th>
                                <th scope="col">Hành động</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($contacts as $contact)
                                <tr>
                                    <td>{{$contact->name}}</td>
                                    <td>{{$contact->email}}</td>
                                    <td>{{$contact->phone}}</td>
                                    <td>{{$contact->subject}}</td>
                                    <td>{{$contact->message}}</td>
                                    <td>
                                        <a href="#" class="btn_edit">Trả lời</a>
                                        <a action="{{route('contacts.destroy', $contact->id)}}" class="btn_delete">Xóa</a>
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
