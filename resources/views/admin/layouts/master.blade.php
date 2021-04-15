<!DOCTYPE html>
<html lang="zxx">


<!-- Mirrored from demo.dashboardpack.com/finance-html/ by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 06 Apr 2021 13:02:51 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>{{$pageTitle ?? 'Unknown'}}</title>

    <link rel="icon" href="{{url('backend')}}/images/favicon.png" type="image/png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{url('backend')}}/css/bootstrap.min.css" />
    <!-- themefy CSS -->
    <link rel="stylesheet" href="{{url('backend')}}/vendors/themefy_icon/themify-icons.css" />
    <!-- swiper slider CSS -->
    <link rel="stylesheet" href="{{url('backend')}}/vendors/swiper_slider/css/swiper.min.css" />
    <!-- select2 CSS -->
    <link rel="stylesheet" href="{{url('backend')}}/vendors/select2/css/select2.min.css" />
    <!-- select2 CSS -->
    <link rel="stylesheet" href="{{url('backend')}}/vendors/niceselect/css/nice-select.css" />
    <!-- owl carousel CSS -->
    <link rel="stylesheet" href="{{url('backend')}}/vendors/owl_carousel/css/owl.carousel.css" />
    <!-- gijgo css -->
    <link rel="stylesheet" href="{{url('backend')}}/vendors/gijgo/gijgo.min.css" />
    <!-- font awesome CSS -->
    <link rel="stylesheet" href="{{url('backend')}}/vendors/font_awesome/css/all.min.css" />
    <link rel="stylesheet" href="{{url('backend')}}/vendors/tagsinput/tagsinput.css" />
    <!-- datatable CSS -->
    <link rel="stylesheet" href="{{url('backend')}}/vendors/datatable/css/jquery.dataTables.min.css" />
    <link rel="stylesheet" href="{{url('backend')}}/vendors/datatable/css/responsive.dataTables.min.css" />
    <link rel="stylesheet" href="{{url('backend')}}/vendors/datatable/css/buttons.dataTables.min.css" />
    <!-- text editor css -->
    <link rel="stylesheet" href="{{url('backend')}}/vendors/text_editor/summernote-bs4.css" />
    <!-- morris css -->
    <link rel="stylesheet" href="{{url('backend')}}/vendors/morris/morris.css">
    <!-- metarial icon css -->
    <link rel="stylesheet" href="{{url('backend')}}/vendors/material_icon/material-icons.css" />

    <!-- menu css  -->
    <link rel="stylesheet" href="{{url('backend')}}/css/metisMenu.css">
    <!-- style CSS -->
    <link rel="stylesheet" href="{{url('backend')}}/css/style.css" />
    <link rel="stylesheet" href="{{url('backend')}}/css/colors/default.css" id="colorSkinCSS">
    <!-- custom CSS -->
    <link rel="stylesheet" href="{{url('backend')}}/css/custom.css" />

</head>
<body class="crm_body_bg">



<!-- main content part here -->

<!-- sidebar  -->
<!-- sidebar part here -->
<nav class="sidebar">
    <div class="logo d-flex justify-content-between">
        <a href="index-2.html"><img src="{{url('backend')}}/images/logo.png" alt=""></a>
        <div class="sidebar_close_icon d-lg-none">
            <i class="ti-close"></i>
        </div>
    </div>
    <ul id="sidebar_menu">
        <li class="mm-active">
            <a class=""  href="{{route('dashboard')}}"  aria-expanded="false">
                <!-- <i class="fas fa-th"></i> -->
                <img src="{{url('backend')}}/images/menu-icon/1.svg" alt="">
                <span>Dashboard</span>
            </a>
        </li>

        <li class="">
            <a   class="has-arrow" href="#" aria-expanded="false">
                <img src="{{url('backend')}}/images/menu-icon/6.svg" alt="">
                <span>Quản lý</span>
            </a>
            <ul>
                <li><a class="" href="{{route('categories.index')}}">Danh mục</a></li>
                <li><a href="{{route('products.index')}}">Sản phẩm</a></li>
            </ul>
        </li>

        <li class="">
            <a   class="has-arrow" href="#" aria-expanded="false">
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
            <a   class="has-arrow" href="#" aria-expanded="false">
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
            <a   class="has-arrow" href="#" aria-expanded="false">
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
            <a   class="has-arrow" href="#" aria-expanded="false">
                <img src="{{url('backend')}}/images/menu-icon/5.svg" alt="">
                <span>Widgets</span>
            </a>
            <ul>
                <li><a href="chart_box_1.html">Chart Boxes 1</a></li>
                <li><a href="profilebox.html">Profile Box</a></li>
            </ul>
        </li>

        <li class="">
            <a   class="has-arrow" href="#" aria-expanded="false">
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
<!-- sidebar part end -->
<!--/ sidebar  -->


<section class="main_content dashboard_part">
    <!-- menu  -->
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
                                    <input type="text" placeholder="Search here..." >
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
                            <img src="{{url('backend')}}/images/client_img.png" alt="#">
                            <div class="profile_info_iner">
                                <p>Welcome Admin!</p>
                                <h5>Travor James</h5>
                                <div class="profile_info_details">
                                    <a href="#">My Profile <i class="ti-user"></i></a>
                                    <a href="#">Settings <i class="ti-settings"></i></a>
                                    <a href="#">Log Out <i class="ti-shift-left"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ menu  -->
    <div class="main_content_iner ">
        @yield('content')
    </div>

    <!-- footer part -->
    <div class="footer_part">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="footer_iner text-center">
                        <p>2020 © Influence - Designed by <a href="#"> <i class="ti-heart"></i> </a><a href="#"> Dashboard</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- main content part end -->

<!-- footer  -->
<!-- jquery slim -->
<script src="{{url('backend')}}/js/jquery-3.4.1.min.js"></script>
<!-- popper js -->
<script src="{{url('backend')}}/js/popper.min.js"></script>
<!-- bootstarp js -->
<script src="{{url('backend')}}/js/bootstrap.min.js"></script>
<!-- sidebar menu  -->
<script src="{{url('backend')}}/js/metisMenu.js"></script>
<!-- waypoints js -->
<script src="{{url('backend')}}/vendors/count_up/jquery.waypoints.min.js"></script>
<!-- waypoints js -->
<script src="{{url('backend')}}/vendors/chartlist/Chart.min.js"></script>
<!-- counterup js -->
<script src="{{url('backend')}}/vendors/count_up/jquery.counterup.min.js"></script>
<!-- swiper slider js -->
<script src="{{url('backend')}}/vendors/swiper_slider/js/swiper.min.js"></script>
<!-- nice select -->
<script src="{{url('backend')}}/vendors/niceselect/js/jquery.nice-select.min.js"></script>
<!-- owl carousel -->
<script src="{{url('backend')}}/vendors/owl_carousel/js/owl.carousel.min.js"></script>
<!-- gijgo css -->
<script src="{{url('backend')}}/vendors/gijgo/gijgo.min.js"></script>
<!-- responsive table -->
<script src="{{url('backend')}}/vendors/datatable/js/jquery.dataTables.min.js"></script>
<script src="{{url('backend')}}/vendors/datatable/js/dataTables.responsive.min.js"></script>
<script src="{{url('backend')}}/vendors/datatable/js/dataTables.buttons.min.js"></script>
<script src="{{url('backend')}}/vendors/datatable/js/buttons.flash.min.js"></script>
<script src="{{url('backend')}}/vendors/datatable/js/jszip.min.js"></script>
<script src="{{url('backend')}}/vendors/datatable/js/pdfmake.min.js"></script>
<script src="{{url('backend')}}/vendors/datatable/js/vfs_fonts.js"></script>
<script src="{{url('backend')}}/vendors/datatable/js/buttons.html5.min.js"></script>
<script src="{{url('backend')}}/vendors/datatable/js/buttons.print.min.js"></script>

<script src="{{url('backend')}}/js/chart.min.js"></script>
<!-- progressbar js -->
<script src="{{url('backend')}}/vendors/progressbar/jquery.barfiller.js"></script>
<!-- tag input -->
<script src="{{url('backend')}}/vendors/tagsinput/tagsinput.js"></script>
<!-- text editor js -->
<script src="{{url('backend')}}/vendors/text_editor/summernote-bs4.js"></script>

<script src="{{url('backend')}}/vendors/apex_chart/apexcharts.js"></script>

<!-- custom js -->
<script src="{{url('backend')}}/js/custom.js"></script>

<!-- active_chart js -->
<script src="{{url('backend')}}/js/active_chart.js"></script>
<script src="{{url('backend')}}/vendors/apex_chart/radial_active.js"></script>
<script src="{{url('backend')}}/vendors/apex_chart/stackbar.js"></script>
<script src="{{url('backend')}}/vendors/apex_chart/area_chart.js"></script>
<!-- <script src="vendors/apex_chart/pie.js"></script> -->
<script src="{{url('backend')}}/vendors/apex_chart/bar_active_1.js"></script>
<script src="{{url('backend')}}/vendors/chartjs/chartjs_active.js"></script>

<!-- script js -->
<script src="{{url('backend')}}/js/script.js"></script>

<!-- filepond js -->
<script src="{{url('backend')}}/js/filepond/filepond.min.js"></script>
<script src="{{url('backend')}}/js/filepond/filepond-plugin-image-preview.min.js"></script>
<script src="{{url('backend')}}/js/filepond/filepond-plugin-image-exif-orientation.min.js"></script>
<script src="{{url('backend')}}/js/filepond/filepond-plugin-file-validate-size.min.js"></script>
<script src="{{url('backend')}}/js/filepond/filepond-plugin-file-encode.min.js"></script>

</body>

<!-- Mirrored from demo.dashboardpack.com/finance-html/ by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 06 Apr 2021 13:03:26 GMT -->
</html>
