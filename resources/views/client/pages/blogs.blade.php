@extends('client.layouts.master', ['pageTitle' => 'Tin tức'])
@section('content')

    <!-- START SECTION BLOG -->
    <div class="section">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="row blog_thumbs">
                        @foreach($blogs as $blog)
                            <div class="col-12">
                                <div class="blog_post blog_style2">
                                    <div class="blog_img">
                                        <a href="{{route('clients.blog_detail', $blog->id)}}">
                                            <img src="{{url('uploads')}}/{{$blog->image}}" alt="{{$blog->title}}">
                                        </a>
                                    </div>
                                    <div class="blog_content bg-white">
                                        <div class="blog_text">
                                            <h6 class="blog_title"><a
                                                    href="{{route('clients.blog_detail', $blog->id)}}">{{$blog->title}}</a>
                                            </h6>
                                            <ul class="list_none blog_meta">
                                                <li><a href="#"><i
                                                            class="ti-calendar"></i> {{date_format($blog->created_at, 'M d, Y')}}
                                                    </a></li>
                                                <li><a href="#"><i class="ti-comments"></i> 14</a></li>
                                            </ul>
                                            <p>{{$blog->summary}}</p>
                                            <a href="{{route('clients.blog_detail', $blog->id)}}"
                                               class="btn btn-fill-line border-2 btn-xs rounded-0">Xem thêm</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="row">
                        <div class="col-12 mt-2 mt-md-4">
                            {{$blogs->render('vendor.pagination.default')}}
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 order-lg-first mt-4 pt-2 mt-lg-0 pt-lg-0">
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
                                                    <a href="#"><img src="{{url('uploads')}}/{{$blog->image}}"
                                                                     alt="{{$blog->title}}"></a>
                                                </div>
                                                <div class="post_content">
                                                    <h6><a href="#">{{$blog->title}}</a></h6>
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
