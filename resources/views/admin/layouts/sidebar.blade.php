<nav class="sidebar">
    <div class="logo d-flex justify-content-between">
        <a href="{{route('dashboard')}}"><img src="{{url('backend')}}/images/logo.png" alt=""></a>
        <div class="sidebar_close_icon d-lg-none">
            <i class="ti-close"></i>
        </div>
    </div>
    <ul id="sidebar_menu">
        <li class="">
            <a class="" href="{{route('dashboard')}}" aria-expanded="false">
                <!-- <i class="fas fa-th"></i> -->
                <img src="{{url('backend')}}/images/menu-icon/1.svg" alt="">
                <span>Dashboard</span>
            </a>
        </li>

        <li class="{{ Request::is('admin/manager/*') ? 'mm-active' : '' }}">
            <a class="has-arrow" href="#" aria-expanded="false">
                <img src="{{url('backend')}}/images/menu-icon/6.svg" alt="">
                <span>Quản lý</span>
            </a>
            <ul class="{{ Request::is('admin/manager/*') ? 'mm-show' : '' }}">
                <li><a class="{{ Request::routeIs('categories.index') ? 'active' : '' }}" href="{{route('categories.index')}}">Danh mục</a></li>
                <li><a class="{{ Request::routeIs('products.index') ? 'active' : '' }}" href="{{route('products.index')}}">Sản phẩm</a></li>
                <li><a class="{{ Request::routeIs('colors.index') ? 'active' : '' }}" href="{{route('colors.index')}}">Màu</a></li>
                <li><a class="{{ Request::routeIs('sizes.index') ? 'active' : '' }}" href="{{route('sizes.index')}}">Size</a></li>
                <li><a class="{{ Request::routeIs('brands.index') ? 'active' : '' }}" href="{{route('brands.index')}}">Nhãn hàng</a></li>
            </ul>
        </li>

        <li class="">
            <a class="has-arrow" href="#" aria-expanded="false">
                <img src="{{url('backend')}}/images/menu-icon/2.svg" alt="">
                <span>Pages</span>
            </a>
            <ul>
                <li><a href="login.html">Login</a></li>
                <li><a href="resister.html">Register</a></li>
                <li><a href="forgot_pass.html">Forgot Password</a></li>
            </ul>
        </li>

        <li class="">
            <a class="has-arrow" href="#" aria-expanded="false">
                <img src="{{url('backend')}}/images/menu-icon/3.svg" alt="">
                <span>Applications</span>
            </a>
            <ul>
                <li><a href="mail_box.html">Mail Box</a></li>
                <li><a href="chat.html">Chat</a></li>
                <li><a href="faq.html">FAQ</a></li>
            </ul>
        </li>

        <li class="">
            <a class="has-arrow" href="#" aria-expanded="false">
                <img src="{{url('backend')}}/images/menu-icon/4.svg" alt="">
                <span>UI Component</span>
            </a>
            <ul>
                <li><a href="#">Elements</a>
                    <ul>
                        <li><a href="buttons.html">Buttons</a></li>
                        <li><a href="dropdown.html">Dropdowns</a></li>
                        <li><a href="Badges.html">Badges</a></li>
                        <li><a href="Loading_Indicators.html">Loading Indicators</a></li>
                    </ul>
                </li>
                <li><a href="#">Components</a>
                    <ul>
                        <li><a href="notification.html">Notifications</a></li>
                        <li><a href="progress.html">Progress Bar</a></li>
                        <li><a href="carousel.html">Carousel</a></li>
                        <li><a href="cards.html">cards</a></li>
                        <li><a href="Pagination.html">Pagination</a></li>
                    </ul>
                </li>
            </ul>
        </li>

        <li class="">
            <a class="has-arrow" href="#" aria-expanded="false">
                <img src="{{url('backend')}}/images/menu-icon/5.svg" alt="">
                <span>Widgets</span>
            </a>
            <ul>
                <li><a href="chart_box_1.html">Chart Boxes 1</a></li>
                <li><a href="profilebox.html">Profile Box</a></li>
            </ul>
        </li>

        <li class="">
            <a class="has-arrow" href="#" aria-expanded="false">
                <img src="{{url('backend')}}/images/menu-icon/7.svg" alt="">
                <span>Charts</span>
            </a>
            <ul>
                <li><a href="chartjs.html">ChartJS</a></li>
                <li><a href="apex_chart.html">Apex Charts</a></li>
                <li><a href="chart_sparkline.html">chart sparkline</a></li>
            </ul>
        </li>

    </ul>

</nav>
