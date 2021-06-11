<div class="container-fluid no-gutters">
    <div class="row">
        <div class="col-lg-12 p-0">
            <div class="header_iner d-flex justify-content-between align-items-center">
                <div class="sidebar_icon d-lg-none">
                    <i class="ti-menu"></i>
                </div>
                <div class="serach_field-area">
                    <div class="search_inner">
                        <form action="#">
                            <div class="search_field">
                                <input type="text" placeholder="Tìm kiếm..." >
                            </div>
                            <button type="submit"> <img src="{{url('backend')}}/images/icon/icon_search.svg" alt=""> </button>
                        </form>
                    </div>
                </div>
                <div class="header_right d-flex justify-content-between align-items-center">
                    <div class="header_notification_warp d-flex align-items-center">
                        <li>
                            <a href="#"> <img src="{{url('backend')}}/images/icon/bell.svg" alt=""> </a>
                        </li>
                        <li>
                            <a href="#"> <img src="{{url('backend')}}/images/icon/msg.svg" alt=""> </a>
                        </li>
                    </div>
                    <div class="profile_info">
                        <img src="{{url('uploads')}}/{{Auth::guard('admin')->user()->avatar}}" alt="{{Auth::guard('admin')->user()->name}}">
                        <div class="profile_info_iner">
                            <p>Xin chào Admin!</p>
                            @if(Auth::guard('admin')->user())
                            <h5>{{Auth::guard('admin')->user()->name}}</h5>
                            @endif
                            <div class="profile_info_details">
                                <a href="#">Hồ sơ của tôi <i class="ti-user"></i></a>
                                <a href="#">Cài đặt <i class="ti-settings"></i></a>
                                <a href="{{route('admins.logout')}}">Đăng xuất <i class="ti-shift-left"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
