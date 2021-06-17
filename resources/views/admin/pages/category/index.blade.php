@extends('admin.layouts.master', ['pageTitle'=>'Danh mục sản phẩm'])

@section('content')
    <div class="container-fluid plr_30 body_white_bg pt_30">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="QA_section">
                    <div class="white_box_tittle list_header">
                        <h4>Danh mục sản phẩm</h4>
                        <div class="box_right d-flex lms_block">
                            <div class="serach_field_2">
                                <div class="search_inner">
                                    <form class="js-search-form" action="{{route('categories.index')}}"
                                          data-container="#js_list_categories">
                                        <div class="search_field">
                                            <input type="text" name="search_key" placeholder="Tìm kiếm...">
                                        </div>
                                        <button type="submit"><i class="ti-search"></i></button>
                                    </form>
                                </div>
                            </div>
                            <div class="add_button ml-10">
                                <a href="{{route('categories.create')}}" class="btn_1">Thêm mới</a>
                            </div>
                        </div>
                    </div>

                    <div id="js_list_categories" class="QA_table">
                        <!-- table-responsive -->
                        @include('admin.pages.category.index.table')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
