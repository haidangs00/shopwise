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

    <!-- text editor -->
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">

    <!-- style CSS -->
    <link rel="stylesheet" href="{{url('backend')}}/css/style.css" />
    <link rel="stylesheet" href="{{url('backend')}}/css/colors/default.css" id="colorSkinCSS">
    <!-- custom CSS -->
    <link rel="stylesheet" href="{{url('backend')}}/css/custom.css" />
    <!-- alert CSS -->
    <link rel="stylesheet" href="{{url('backend')}}/alertifyjs/build/css/alertify.min.css" />
    <link rel="stylesheet" href="{{url('backend')}}/alertifyjs/build/css/themes/default.min.css" />
</head>
<body class="crm_body_bg">

<!-- main content part here -->

<section class="">

    <div class="main_content_iner ">
        @yield('content')
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
{{--<script src="{{url('backend')}}/js/active_chart.js"></script>--}}
{{--<script src="{{url('backend')}}/vendors/apex_chart/radial_active.js"></script>--}}
{{--<script src="{{url('backend')}}/vendors/apex_chart/stackbar.js"></script>--}}
{{--<script src="{{url('backend')}}/vendors/apex_chart/area_chart.js"></script>--}}
<!-- <script src="vendors/apex_chart/pie.js"></script> -->
{{--<script src="{{url('backend')}}/vendors/apex_chart/bar_active_1.js"></script>--}}
{{--<script src="{{url('backend')}}/vendors/chartjs/chartjs_active.js"></script>--}}

<!-- ck js -->
<script src="//cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
<!-- alertjs -->
<script src="{{url('backend')}}/alertifyjs/build/alertify.min.js"></script>
<!-- script js -->
<script src="{{url('backend')}}/js/script.js"></script>

</body>

<!-- Mirrored from demo.dashboardpack.com/finance-html/ by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 06 Apr 2021 13:03:26 GMT -->
</html>
