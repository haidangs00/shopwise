<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="Anil z" name="author">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Shopwise is Powerful features and You Can Use The Perfect Build this Template For Any eCommerce Website. The template is built for sell Fashion Products, Shoes, Bags, Cosmetics, Clothes, Sunglasses, Furniture, Kids Products, Electronics, Stationery Products and Sporting Goods.">
    <meta name="keywords" content="ecommerce, electronics store, Fashion store, furniture store,  bootstrap 4, clean, minimal, modern, online store, responsive, retail, shopping, ecommerce store">

    <!-- SITE TITLE -->
    <title>Shopwise - {{$pageTitle ?? 'Unknown'}}</title>
    <!-- Favicon Icon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{url('client')}}/images/favicon.png">
    <!-- Animation CSS -->
    <link rel="stylesheet" href="{{url('client')}}/css/animate.css">
    <!-- Latest Bootstrap min CSS -->
    <link rel="stylesheet" href="{{url('client')}}/bootstrap/css/bootstrap.min.css">
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800,900&amp;display=swap" rel="stylesheet">
    <!-- Icon Font CSS -->
    <link rel="stylesheet" href="{{url('client')}}/css/all.min.css">
    <link rel="stylesheet" href="{{url('client')}}/css/ionicons.min.css">
    <link rel="stylesheet" href="{{url('client')}}/css/themify-icons.css">
    <link rel="stylesheet" href="{{url('client')}}/css/linearicons.css">
    <link rel="stylesheet" href="{{url('client')}}/css/flaticon.css">
    <link rel="stylesheet" href="{{url('client')}}/css/simple-line-icons.css">
    <!--- owl carousel CSS-->
    <link rel="stylesheet" href="{{url('client')}}/owlcarousel/css/owl.carousel.min.css">
    <link rel="stylesheet" href="{{url('client')}}/owlcarousel/css/owl.theme.css">
    <link rel="stylesheet" href="{{url('client')}}/owlcarousel/css/owl.theme.default.min.css">
    <!-- Magnific Popup CSS -->
    <link rel="stylesheet" href="{{url('client')}}/css/magnific-popup.css">
    <!-- jquery-ui CSS -->
    <link rel="stylesheet" href="{{url('client')}}/css/jquery-ui.css">
    <!-- Slick CSS -->
    <link rel="stylesheet" href="{{url('client')}}/css/slick.css">
    <link rel="stylesheet" href="{{url('client')}}/css/slick-theme.css">
    <!-- Style CSS -->
    <link rel="stylesheet" href="{{url('client')}}/css/style.css">
    <link rel="stylesheet" href="{{url('client')}}/css/responsive.css">


</head>

<body>

<!-- START HEADER -->
@include('client.layouts.header')
<!-- END HEADER -->

@if(Route::is('clients.home'))
<!-- START SECTION BANNER -->
@include('client.layouts.banner')
<!-- END SECTION BANNER -->
@else
<!-- START SECTION BREADCRUMB -->
@include('client.layouts.breadcrumb')
<!-- END SECTION BREADCRUMB -->
@endif

<div class="main_content">
    @yield('content')
</div>

<!-- START SECTION SUBSCRIBE NEWSLETTER -->
<div class="section bg_default small_pt small_pb">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="heading_s1 mb-md-0 heading_light">
                    <h3>Subscribe Our Newsletter</h3>
                </div>
            </div>
            <div class="col-md-6">
                <div class="newsletter_form">
                    <form>
                        <input type="text" required="" class="form-control rounded-0" placeholder="Enter Email Address">
                        <button type="submit" class="btn btn-dark rounded-0" name="submit" value="Submit">Subscribe</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- START SECTION SUBSCRIBE NEWSLETTER -->

<!-- START FOOTER -->
@include('client.layouts.footer')
<!-- END FOOTER -->

<a href="#" class="scrollup" style="display: none;"><i class="ion-ios-arrow-up"></i></a>

<!-- Latest jQuery -->
<script src="{{url('client')}}/js/jquery-1.12.4.min.js"></script>
<script src="{{url('client')}}/js/jquery-ui.js"></script>
<!-- popper min js -->
<script src="{{url('client')}}/js/popper.min.js"></script>
<!-- Latest compiled and minified Bootstrap -->
<script src="{{url('client')}}/bootstrap/js/bootstrap.min.js"></script>
<!-- owl-carousel min js  -->
<script src="{{url('client')}}/owlcarousel/js/owl.carousel.min.js"></script>
<!-- magnific-popup min js  -->
<script src="{{url('client')}}/js/magnific-popup.min.js"></script>
<!-- waypoints min js  -->
<script src="{{url('client')}}/js/waypoints.min.js"></script>
<!-- parallax js  -->
<script src="{{url('client')}}/js/parallax.js"></script>
<!-- countdown js  -->
<script src="{{url('client')}}/js/jquery.countdown.min.js"></script>
<!-- imagesloaded js -->
<script src="{{url('client')}}/js/imagesloaded.pkgd.min.js"></script>
<!-- isotope min js -->
<script src="{{url('client')}}/js/isotope.min.js"></script>
<!-- jquery.dd.min js -->
<script src="{{url('client')}}/js/jquery.dd.min.js"></script>
<!-- slick js -->
<script src="{{url('client')}}/js/slick.min.js"></script>
<!-- elevatezoom js -->
<script src="{{url('client')}}/js/jquery.elevatezoom.js"></script>

<!-- sweetalert js -->
<script src="{{url('client')}}/sweetalert/dist/sweetalert.min.js"></script>

<!-- Google Map Js -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD7TypZFTl4Z3gVtikNOdGSfNTpnmq-ahQ&amp;callback=initMap"></script>

<!-- scripts js -->
<script src="{{url('client')}}/js/scripts.js"></script>
<script src="{{url('client')}}/js/customs.js"></script>
<script src="{{url('client')}}/js/form-valid.js"></script>

</body>

</html>
