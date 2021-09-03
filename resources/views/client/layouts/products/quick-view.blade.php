<div class="ajax_quick_view">
    <div class="row">
        <div class="col-lg-6 col-md-6 mb-4 mb-md-0">
            <div class="product-image">
                <div class="product_img_box">
                    <img id="product_img" src='{{url('uploads')}}/{{$product->image}}'
                         data-zoom-image="{{url('uploads')}}/{{$product->image}}" alt="{{$product->name}}"/>
                </div>
                <div id="pr_item_gallery" class="product_gallery_item slick_slider" data-slides-to-show="4"
                     data-slides-to-scroll="1" data-infinite="false">
                    @foreach($images as $image)
                        <div class="item">
                            <a href="#" class="product_gallery_item" data-image="{{url('uploads')}}/{{$image->path}}"
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
</div>

<!-- scripts js -->
<script src="{{url('client')}}/js/scripts.js"></script>
<script src="{{url('client')}}/js/customs.js"></script>
