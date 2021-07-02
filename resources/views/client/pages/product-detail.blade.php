@extends('client.layouts.master', ['pageTitle' => 'Chi tiết sản phẩm'])
@section('content')

    <!-- START SECTION SHOP -->
    <div class="section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 mb-4 mb-md-0">
                    <div class="product-image">
                        <div class="product_img_box">
                            <img id="product_img" src="{{url('uploads')}}/{{$product->image}}"
                                 data-zoom-image="{{url('uploads')}}/{{$product->image}}" alt="{{$product->name}}"/>
                            <a href="#" class="product_img_zoom" title="Zoom">
                                <span class="linearicons-zoom-in"></span>
                            </a>
                        </div>
                        <div id="pr_item_gallery" class="product_gallery_item slick_slider" data-slides-to-show="4"
                             data-slides-to-scroll="1" data-infinite="false">
                            @foreach($images as $image)
                                <div class="item">
                                    <a href="#" class="product_gallery_item active"
                                       data-image="{{url('uploads')}}/{{$image->path}}"
                                       data-zoom-image="{{url('uploads')}}/{{$image->path}}">
                                        <img src="{{url('uploads')}}/{{$image->path}}" alt="{{$product->name}}"/>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="pr_detail">
                        <form class="form-action" action="{{route('clients.add_to_cart', $product->id)}}">
                            @csrf
                            <div class="product_description">
                                <h4 class="product_title"><a href="#">{{$product->name}}</a></h4>
                                <div class="d-flex justify-content-between">
                                    <div class="product_price">
                                        <span class="price">₫{{number_format($product->promotional_price)}}</span>
                                        <del>₫{{number_format($product->regular_price)}}</del>
                                        <div class="on_sale">
                                            <span>Giảm {{floor((1 - ($product->promotional_price/$product->regular_price)) *100)}}%</span>
                                        </div>
                                    </div>
                                    <div class="rating_wrap">
                                        <div class="rating">
                                            <div class="product_rate"
                                                 style="width:{{100*($product->getRating()/5)}}%"></div>
                                        </div>
                                        <span class="rating_num">({{$product->countComment()}})</span>
                                    </div>
                                </div>
                                <div class="pr_desc">
                                    <p>{{$product->description}}</p>
                                </div>
                                <div class="product_sort_info">
                                    <ul>
                                        <li><i class="linearicons-shield-check"></i> 1 Year AL Jazeera Brand Warranty
                                        </li>
                                        <li><i class="linearicons-sync"></i> 30 Day Return Policy</li>
                                        <li><i class="linearicons-bag-dollar"></i> Cash on Delivery available</li>
                                    </ul>
                                </div>
                                <div class="pr_switch_wrap">
                                    <span class="switch_lable">Color</span>
                                    <div class="product_color_switch product_color_switch_s">
                                        @foreach($product->colors()->get() as $color)
                                            @if($loop->index == 0)
                                                <input type="hidden" name="color_id" id="color_id"
                                                       value="{{$color->id}}">
                                            @endif

                                            <span data-colorid="{{$color->id}}"
                                                  class="{{$loop->index == 0?'active':''}}"
                                                  data-color="{{$color->color_code}}"></span>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="pr_switch_wrap">
                                    <span class="switch_lable">Size</span>
                                    <div class="product_size_switch product_size_switch_s">
                                        @foreach($product->sizes()->get() as $size)
                                            @if($loop->index == 0)
                                                <input type="hidden" name="size_id" id="size_id" value="{{$size->id}}">
                                            @endif

                                            <span data-sizeid="{{$size->id}}"
                                                  class="{{$loop->index == 0?'active':''}}">{{$size->name}}</span>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <hr/>
                            <div class="cart_extra">
                                <div class="cart-product-quantity">
                                    <div class="quantity">
                                        <input type="button" value="-" class="minus">
                                        <input type="text" name="quantity" value="1" title="Qty" class="qty" size="4">
                                        <input type="button" value="+" class="plus">
                                    </div>
                                </div>
                                <div class="cart_btn">
                                    <button class="btn btn-fill-out btn-addtocart" type="submit"><i
                                            class="icon-basket-loaded"></i> Thêm vào giỏ hàng
                                    </button>
                                    <a class="add_compare" href="{{route('clients.add_compare', $product->id)}}"><i
                                            class="icon-shuffle"></i></a>
                                    <a class="btn-heart add_wishlist"
                                       href="{{route('clients.add_to_list', $product->id)}}"><i
                                            class="icon-heart"></i></a>
                                </div>
                            </div>
                        </form>
                        <hr/>
                        <ul class="product-meta">
                            <li>Nhãn hàng: <a href="{{route('clients.products', ['search_key' => $product->brand->name])}}">{{$product->brand->name}}</a></li>
                            <li>Danh mục: <a href="{{route('clients.products', ['search_key' => $product->category->name])}}">{{$product->category->name}}</a></li>
                            <li>Tags: <a href="#" rel="tag">Cloth</a>, <a href="#" rel="tag">printed</a></li>
                        </ul>

                        <div class="product_share">
                            <span>Share:</span>
                            <ul class="social_icons">
                                <li><a href="#"><i class="ion-social-facebook"></i></a></li>
                                <li><a href="#"><i class="ion-social-twitter"></i></a></li>
                                <li><a href="#"><i class="ion-social-googleplus"></i></a></li>
                                <li><a href="#"><i class="ion-social-youtube-outline"></i></a></li>
                                <li><a href="#"><i class="ion-social-instagram-outline"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="large_divider clearfix"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="tab-style3">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="Description-tab" data-toggle="tab" href="#Description"
                                   role="tab" aria-controls="Description" aria-selected="true">Mô tả</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="Additional-info-tab" data-toggle="tab" href="#Additional-info"
                                   role="tab" aria-controls="Additional-info" aria-selected="false">Thông tin thêm</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="Reviews-tab" data-toggle="tab" href="#Reviews" role="tab"
                                   aria-controls="Reviews" aria-selected="false">Đánh giá ({{$product->countComment()}}
                                    )</a>
                            </li>
                        </ul>
                        <div class="tab-content shop_info_tab">
                            <div class="tab-pane fade show active" id="Description" role="tabpanel"
                                 aria-labelledby="Description-tab">
                                <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a
                                    piece of classical Latin literature from 45 BC, making it over 2000 years old.
                                    Vivamus bibendum magna Lorem ipsum dolor sit amet, consectetur adipiscing
                                    elit.Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots
                                    in a piece of classical Latin literature from 45 BC, making it over 2000 years
                                    old.</p>
                                <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium
                                    voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint
                                    occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt
                                    mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et
                                    expedita distinctio.</p>
                            </div>
                            <div class="tab-pane fade" id="Additional-info" role="tabpanel"
                                 aria-labelledby="Additional-info-tab">
                                <table class="table table-bordered">
                                    <tr>
                                        <td>Capacity</td>
                                        <td>5 Kg</td>
                                    </tr>
                                    <tr>
                                        <td>Color</td>
                                        <td>Black, Brown, Red,</td>
                                    </tr>
                                    <tr>
                                        <td>Water Resistant</td>
                                        <td>Yes</td>
                                    </tr>
                                    <tr>
                                        <td>Material</td>
                                        <td>Artificial Leather</td>
                                    </tr>
                                </table>
                            </div>
                            <div class="tab-pane fade" id="Reviews" role="tabpanel" aria-labelledby="Reviews-tab">
                                <div class="comments">
                                    <h5 class="product_tab_title">{{$product->countComment() ? $product->countComment() : 'Chưa có'}}
                                        Đánh giá cho
                                        <span>{{$product->name}}</span></h5>
                                    <ul class="list_none comment_list mt-4">
                                        @foreach($product->getActiveComments() as $comment)
                                            <li>
                                                <div class="comment_img">
                                                    <img src="{{url('uploads')}}/{{$comment->user->avatar}}"
                                                         alt="{{$comment->user->name}}"/>
                                                </div>
                                                <div class="comment_block">
                                                    <div class="rating_wrap">
                                                             <span
                                                                 class="comment-date">{{date_format($comment->created_at, 'd-m-Y')}}</span>
                                                    </div>
                                                    <p class="customer_meta">
                                                        <span class="review_author">{{$comment->user->name}}</span>
                                                    </p>
                                                    <div class="description">
                                                        <p class="mb-1">{{$comment->content}}</p>
                                                        @foreach($comment->replies as $reply)
                                                            <div class="rating_wrap">
                                                             <span
                                                                 class="comment-date">{{date_format($reply->created_at, 'd-m-Y')}}</span>
                                                            </div>
                                                            <p class="customer_meta">
                                                                <span class="review_author" style="color:#FF324D">Phản hồi từ Shopwise</span>
                                                            </p>
                                                            <p class="mb-1">
                                                                {{$reply->content}}
                                                            </p>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="review_form field_form">
                                    <h5>Đánh giá sản phẩm</h5>
                                    <form class="row mt-3 form-review" method="post"
                                          action="{{route('clients.review_product')}}">
                                        @csrf
                                        <div class="form-group col-12">
                                            <div class="star_rating">
                                                <input type="hidden" name="product_id" value="{{$product->id}}">
                                                <input id="star" type="hidden" name="star" value="">
                                                @for($count = 1; $count <=5; $count++)
                                                    <span data-value="{{$count}}"><i
                                                            class="far fa-star"></i></span>
                                                @endfor
                                            </div>
                                        </div>
                                        <div class="form-group col-12">
                                            <textarea required="required" placeholder="Viết đánh giá của bạn *"
                                                      class="form-control" name="message" rows="4"></textarea>
                                        </div>

                                        <div class="form-group col-12">
                                            <button type="submit" class="btn btn-fill-out">
                                                Gửi đánh giá
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="small_divider"></div>
                    <div class="divider"></div>
                    <div class="medium_divider"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="heading_s1">
                        <h3>Releted Products</h3>
                    </div>
                    <div class="releted_product_slider carousel_slider owl-carousel owl-theme" data-margin="20"
                         data-responsive='{"0":{"items": "1"}, "481":{"items": "2"}, "768":{"items": "3"}, "1199":{"items": "4"}}'>
                        @foreach($relatedProducts as $product)
                        <div class="item">
                            <div class="product">
                                <div class="product_img">
                                    <a href="{{route('clients.product_detail', $product->id)}}">
                                        <img src="{{url('uploads')}}/{{$product->image}}" alt="{{$product->name}}">
                                    </a>
                                    <div class="product_action_box">
                                        <ul class="list_none pr_action_btn">
                                            <li class="add-to-cart"><a href="{{route('clients.product_detail', $product->id)}}"><i class="icon-basket-loaded"></i> Chọn mua</a></li>
                                            <li><a href="{{route('clients.add_compare', $product->id)}}" class="popup-ajax"><i class="icon-shuffle"></i></a></li>
                                            <li><a href="{{route('clients.quick_view_product', $product->id)}}" class="popup-ajax"><i class="icon-magnifier-add"></i></a></li>
                                            <li><a href="#"><i class="icon-heart"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="product_info">
                                    <h6 class="product_title"><a href="{{route('clients.product_detail', $product->id)}}">{{$product->name}}</a></h6>
                                    <div class="product_price">
                                        <span class="price">₫{{number_format($product->promotional_price)}}</span>
                                        <del>₫{{number_format($product->regular_price)}}</del>
                                        <div class="on_sale">
                                            <span>{{number_format(($product->regular_price - $product->promotional_price)/$product->regular_price *100)}}% Off</span>
                                        </div>
                                    </div>
                                    <div class="rating_wrap">
                                        <div class="rating">
                                            <div class="product_rate" style="width:{{100*($product->getRating()/5)}}%"></div>
                                        </div>
                                        <span class="rating_num">({{$product->countComment()}})</span>
                                    </div>
                                    <div class="pr_desc">
                                        <p>{{$product->description}}</p>
                                    </div>
                                    <div class="pr_switch_wrap">
                                        <div class="product_color_switch">
                                            @foreach($product->colors as $color)
                                                <span class="{{$loop->index == 0?'active':''}}"
                                                      data-color="{{$color->color_code}}"></span>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END SECTION SHOP -->

@endsection
