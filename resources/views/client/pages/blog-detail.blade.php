@extends('client.layouts.master', ['pageTitle' => 'Chi tiết tin tức'])
@section('content')

    <!-- START SECTION BLOG -->
    <div class="section">
        <div class="container">
            <div class="row">
                <div class="col-xl-9">
                    <div class="single_post">
                        <h2 class="blog_title">{{$blog->title}}</h2>
                        <ul class="list_none blog_meta">
                            <li><a href="#"><i class="ti-calendar"></i> {{date_format($blog->created_at, 'M d, Y')}}</a>
                            </li>
                            <li><a href="#"><i class="ti-comments"></i> 2 Comment</a></li>
                        </ul>
                        <div class="blog_img">
                            <img src="{{url('uploads')}}/{{$blog->image}}" alt="{{$blog->title}}">
                        </div>
                        <div class="blog_content">
                            <div class="blog_text">
                                {!! $blog->content !!}
                                <div class="blog_post_footer">
                                    <div class="row justify-content-between align-items-center">
                                        <div class="col-md-8 mb-3 mb-md-0">
                                            <div class="tags">
                                                <a href="#">General</a>
                                                <a href="#">Design</a>
                                                <a href="#">jQuery</a>
                                                <a href="#">Branding</a>
                                                <a href="#">Modern</a>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <ul class="social_icons text-md-right">
                                                <li><a href="#" class="sc_facebook"><i class="ion-social-facebook"></i></a>
                                                </li>
                                                <li><a href="#" class="sc_twitter"><i
                                                            class="ion-social-twitter"></i></a></li>
                                                <li><a href="#" class="sc_google"><i class="ion-social-googleplus"></i></a>
                                                </li>
                                                <li><a href="#" class="sc_youtube"><i
                                                            class="ion-social-youtube-outline"></i></a></li>
                                                <li><a href="#" class="sc_instagram"><i
                                                            class="ion-social-instagram-outline"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="post_navigation bg_gray">
                        <div class="row align-items-center justify-content-between p-4">
                            <div class="col-5">
                                <a href="#">
                                    <div class="post_nav post_nav_prev">
                                        <i class="ti-arrow-left"></i>
                                        <span>blanditiis praesentium</span>
                                    </div>
                                </a>
                            </div>
                            <div class="col-2">
                                <a href="#" class="post_nav_home">
                                    <i class="ti-layout-grid2"></i>
                                </a>
                            </div>
                            <div class="col-5">
                                <a href="#">
                                    <div class="post_nav post_nav_next">
                                        <i class="ti-arrow-right"></i>
                                        <span>voluptatum deleniti</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="related_post mt-5">
                        <div class="content_title">
                            <h5>Bài viết liên quan</h5>
                        </div>
                        <div class="row">
                            @foreach($blogs as $blog)
                                <div class="col-md-6">
                                    <div class="blog_post blog_style2 box_shadow1">
                                        <div class="blog_img">
                                            <a href="{{route('clients.blog_detail', $blog->id)}}">
                                                <img src="{{url('uploads')}}/{{$blog->image}}" alt="{{$blog->title}}">
                                            </a>
                                        </div>
                                        <div class="blog_content bg-white">
                                            <div class="blog_text">
                                                <h5 class="blog_title"><a href="{{route('clients.blog_detail', $blog->id)}}">{{$blog->title}}</a></h5>
                                                <ul class="list_none blog_meta">
                                                    <li><a href="#"><i class="ti-calendar"></i> {{date_format($blog->created_at, 'M d, Y')}}</a></li>
                                                    <li><a href="#"><i class="ti-comments"></i> 2 Comment</a></li>
                                                </ul>
                                                <p>{{$blog->summary}}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 mt-4 pt-2 mt-xl-0 pt-xl-0">
                    <div class="sidebar">
                        <div class="widget">
                            <div class="search_form">
                                <form>
                                    <input required="" class="form-control" placeholder="Tìm kiếm..." type="text">
                                    <button type="submit" title="Subscribe" class="btn icon_search" name="submit"
                                            value="Submit">
                                        <i class="ion-ios-search-strong"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                        <div class="widget">
                            <h5 class="widget_title">Bài viết mới nhất</h5>
                            <ul class="widget_recent_post">
                                @foreach($blogs as $blog)
                                    @if($loop->index < 3)
                                        <li>
                                            <div class="post_footer">
                                                <div class="post_img">
                                                    <a href="{{route('clients.blog_detail', $blog->id)}}"><img src="{{url('uploads')}}/{{$blog->image}}"
                                                                     alt="{{$blog->title}}"></a>
                                                </div>
                                                <div class="post_content">
                                                    <h6><a href="{{route('clients.blog_detail', $blog->id)}}">{{$blog->title}}</a></h6>
                                                    <p class="small m-0">{{date_format($blog->created_at, 'M d Y')}}</p>
                                                </div>
                                            </div>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                        <div class="widget">
                            <h5 class="widget_title">Bài viết theo ngày</h5>
                            <ul class="widget_archive">
                                @foreach($dates as $date)
                                    @if($blog->getDate())
                                        <li><a href="#"><span
                                                    class="archive_year">{{$date->month}} {{$date->day}} {{$date->year}}</span><span
                                                    class="archive_num">({{$date->data}})</span></a>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                        <div class="widget">
                            <div class="shop_banner">
                                <div class="banner_img overlay_bg_20">
                                    <img src="{{url('client')}}/images/sidebar_banner_img.jpg" alt="sidebar_banner_img">
                                </div>
                                <div class="shop_bn_content2 text_white">
                                    <h5 class="text-uppercase shop_subtitle">New Collection</h5>
                                    <h3 class="text-uppercase shop_title">Sale 30% Off</h3>
                                    <a href="#" class="btn btn-white rounded-0 btn-sm text-uppercase">Shop Now</a>
                                </div>
                            </div>
                        </div>
                        <div class="widget">
                            <h5 class="widget_title">tags</h5>
                            <div class="tags">
                                <a href="#">General</a>
                                <a href="#">Design</a>
                                <a href="#">jQuery</a>
                                <a href="#">Branding</a>
                                <a href="#">Modern</a>
                                <a href="#">Blog</a>
                                <a href="#">Quotes</a>
                                <a href="#">Advertisement</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END SECTION BLOG -->

@endsection
