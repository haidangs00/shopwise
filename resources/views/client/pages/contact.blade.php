@extends('client.layouts.master', ['pageTitle' => 'Liên hệ'])
@section('content')

{{--    !-- START SECTION CONTACT -->--}}
    <div class="section pb_70">
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-md-6">
                    <div class="contact_wrap contact_style3">
                        <div class="contact_icon">
                            <i class="linearicons-map2"></i>
                        </div>
                        <div class="contact_text">
                            <span>Địa chỉ</span>
                            <p>123 Street, Old Trafford, London, UK</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6">
                    <div class="contact_wrap contact_style3">
                        <div class="contact_icon">
                            <i class="linearicons-envelope-open"></i>
                        </div>
                        <div class="contact_text">
                            <span>Email</span>
                            <a href="mailto:info@sitename.com">info@yourmail.com </a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6">
                    <div class="contact_wrap contact_style3">
                        <div class="contact_icon">
                            <i class="linearicons-tablet2"></i>
                        </div>
                        <div class="contact_text">
                            <span>Điện thoại</span>
                            <p>+ 457 789 789 65</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END SECTION CONTACT -->

    <!-- START SECTION CONTACT -->
    <div class="section pt-0">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="heading_s1">
                        <h2>Liên hệ với chúng tôi</h2>
                    </div>
                    <p class="leads">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus blandit massa enim. Nullam id varius nunc id varius nunc.</p>
                    <div class="field_form">
                        <form class="form-action" method="post" action="{{route('clients.send_contact')}}">
                            @csrf
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <input placeholder="Nhập Họ Tên *" id="first-name" class="form-control" name="name" type="text">
                                    <span class="error-msg" error-for="name"></span>
                                </div>
                                <div class="form-group col-md-6">
                                    <input placeholder="Nhập Email *" id="email" class="form-control" name="email" type="email">
                                    <span class="error-msg" error-for="email"></span>
                                </div>
                                <div class="form-group col-md-6">
                                    <input placeholder="Nhập Số Điện Thoại *" id="phone" class="form-control" name="phone">
                                    <span class="error-msg" error-for="phone"></span>
                                </div>
                                <div class="form-group col-md-6">
                                    <input placeholder="Nhập chủ đề" id="subject" class="form-control" name="subject">
                                    <span class="error-msg" error-for="subject"></span>
                                </div>
                                <div class="form-group col-md-12">
                                    <textarea placeholder="Nội dung *" id="description" class="form-control" name="message" rows="4"></textarea>
                                    <span class="error-msg" error-for="message"></span>
                                </div>
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-fill-out" value="Submit">Gửi</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-6 pt-2 pt-lg-0 mt-4 mt-lg-0">
                    <div id="map" class="contact_map2" data-zoom="12" data-latitude="40.680" data-longitude="-73.945" data-icon="{{url('client')}}/images/marker.png"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- END SECTION CONTACT -->

@endsection
