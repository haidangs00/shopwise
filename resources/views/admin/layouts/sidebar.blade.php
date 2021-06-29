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
                <li><a class="{{ Request::routeIs('categories.*') ? 'active' : '' }}" href="{{route('categories.index')}}">Danh mục sản phẩm</a></li>
                <li><a class="{{ Request::routeIs('products.*') ? 'active' : '' }}" href="{{route('products.index')}}">Sản phẩm</a></li>
                <li><a class="{{ Request::routeIs('colors.*') ? 'active' : '' }}" href="{{route('colors.index')}}">Màu</a></li>
                <li><a class="{{ Request::routeIs('sizes.*') ? 'active' : '' }}" href="{{route('sizes.index')}}">Size</a></li>
                <li><a class="{{ Request::routeIs('brands.*') ? 'active' : '' }}" href="{{route('brands.index')}}">Nhãn hàng</a></li>
                <li><a class="{{ Request::routeIs('banners.*') ? 'active' : '' }}" href="{{route('banners.index')}}">Banner</a></li>
                <li><a class="{{ Request::routeIs('comments.*') ? 'active' : '' }}" href="{{route('comments.index')}}">Bình luận</a></li>
                <li><a class="{{ Request::routeIs('blogCategories.*') ? 'active' : '' }}" href="{{route('blogCategories.index')}}">Danh mục bài viết</a></li>
                <li><a class="{{ Request::routeIs('blogs.*') ? 'active' : '' }}" href="{{route('blogs.index')}}">Bài viết</a></li>
                <li><a class="{{ Request::routeIs('contacts.*') ? 'active' : '' }}" href="{{route('contacts.index')}}">Liên hệ của khách hàng</a></li>
                <li><a class="{{ Request::routeIs('orders.*') ? 'active' : '' }}" href="{{route('orders.index')}}">Đơn hàng</a></li>
                <li><a class="{{ Request::routeIs('payments.*') ? 'active' : '' }}" href="{{route('payments.index')}}">Phương thức thanh toán</a></li>
            </ul>
        </li>

        <li class="{{ Request::is('admin/account/*') ? 'mm-active' : '' }}">
            <a class="has-arrow" href="#" aria-expanded="false">
                <img src="{{url('backend')}}/images/menu-icon/3.svg" alt="">
                <span>Quản lý tài khoản</span>
            </a>
            <ul class="{{ Request::is('admin/account/*') ? 'mm-show' : '' }}">
                <li><a class="{{ Request::routeIs('admins.*') ? 'active' : '' }}" href="{{route('admins.index')}}">Quản trị viên</a></li>
                <li><a class="{{ Request::routeIs('users.*') ? 'active' : '' }}" href="{{route('users.index')}}">Khách hàng</a></li>
                <li><a class="{{ Request::routeIs('roles.*') ? 'active' : '' }}" href="{{route('roles.index')}}">Vai trò</a></li>
            </ul>
        </li>

    </ul>

</nav>
