@extends('customer.template.customer_template')
@section('content')
<div class="product_page_bg">
    <div class="container">
        <div class="product_details_wrapper mb-55">
            <!--product details start-->
            <div class="product_details">
                <div class="row">
                    <div class="col-lg-5 col-md-6">
                        {{-- <div class="main"> --}}
                            <?php $image = explode('&',$product->image);?>
                            <div class="slider slider-for">
                                @foreach ($image as $item)
                                <div class="single-zoom zoom"><img src="{{$item}}" data-zoom-image="{{$item}}">
                                </div>
                                @endforeach
                            </div>
                            @if (count($image)>4)
                            <div class="slider slider-nav">
                                @foreach ($image as $item)
                                <div><img src="{{$item}}" data-zoom-image="{{$item}}" alt="big-1">
                                </div>
                                @endforeach
                            </div>
                            @endif
                        {{-- </div> --}}
                    </div>
                    <div class="col-lg-7 col-md-6">
                        <div class="product_d_right">
                            <h3><b>{{$product->name}}</b></h3>
                            <div class="price_box">
                                @if ($product->price_sale == $product->price)
                                <h3><b>Giá:</b><span class="current_price">{{number_format($product->price_sale)}}đ</h3>
                                @else    
                                    <h3><b>Giá Cũ:</b><span class="old_price"> {{number_format($product->price)}}đ</span></h3>
                                    <h3><b>Giá KM:</b><span class="current_price"> {{number_format($product->price_sale)}}đ</h3>
                                @endif
                            </div>
                            <div class="product_desc">
                                <h3><b>Nhà sản xuất:</b> {{$product->brand_name}}</h3>
                                <h3><b>Tình trạng:</b>
                                    <?php if($product->instock==0){echo 'Còn hàng';}else{echo 'Hết hàng';}?></h3>
                            </div>
                            <div class="product_variant quantity">
                                <label>quantity</label>
                                <input min="1" max="100" value="1" type="number">
                                <button class="button add_cart_detail" data-name="{{$product->name}}"
                                    data-price="{{$product->price_sale}}" data-id="{{$product->id}}">Mua sản
                                    phẩm</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--product details end-->

            <!--product info start-->
            <div class="product_d_info">
                <div class="row">
                    <div class="col-12">
                        <div class="product_d_inner">
                            <div class="product_info_button">
                                <ul class="nav" role="tablist">
                                    <li>
                                        <a class="active" data-toggle="tab" href="#info" role="tab" aria-controls="info"
                                            aria-selected="false">Mô tả sản phẩm</a>
                                    </li>
                                    <li>
                                        <a data-toggle="tab" href="#reviews" role="tab" aria-controls="reviews"
                                            aria-selected="false">Đánh giá sản phẩm</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="info" role="tabpanel">
                                    <div class="product_info_content">
                                        {!! $product->description !!} 
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="reviews" role="tabpanel">
                                    <div class="reviews_wrapper">
                                        @foreach ($comment as $item)
                                        <div class="reviews_comment_box">
                                            <div class="comment_thmb">
                                                <img src="{{$item->image}}" height="50px" width="50px" alt="">
                                            </div>
                                            <div class="comment_text">
                                                <div class="reviews_meta">
                                                    <p><strong>{{$item->name}} </strong>- {{$item->created_at}}</p>
                                                    <span>{{$item->content}}</span>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                        @if (isset(Auth::user()->name))
                                        <form action="/feedback" method="POST">
                                            @csrf
                                            <div class="product_review_form">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <label for="review_comment">Bình luận</label>
                                                        <input type="text" name="product_id" value="{{$product->id}}" hidden>
                                                        <textarea name="comment" id="review_comment"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div style="text-align: right;">
                                                <button class="btn btn-primary" type="submit">Bình luận</button>
                                            </div>
                                        </form>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--product info end-->
        </div>
        <!--product area start-->
        <section class="product_area upsell_products">
            <div class="row">
                <div class="col-12">
                    <div class="section_title">
                        <h2>Bạn có thể quan tâm</h2>
                    </div>
                </div>
            </div>
            <div class="product_carousel product_style product_column5 owl-carousel">
                @foreach (product_random() as $item)
                <article class="single_product">
                    <figure>
                        <div class="product_thumb">
                            <a class="primary_img" href="{{$item->url}}"><img src="{{$item->image}}" alt=""></a>
                            <a class="secondary_img" href="{{$item->url}}"><img src="{{$item->image}}" alt=""></a>
                            <div class="label_product">
                                <span class="label_sale">Sale</span>
                            </div>
                        </div>
                        <div class="product_content">
                            <div class="product_content_inner">
                                <h4 class="product_name"><a href="product-details.html">{{$item->name}}</a></h4>
                                <div class="price_box">
                                    @if ($item->price_sale == $item->price or $item->price==0)
                                        <span class="current_price">{{number_format($item->price_sale)}} đ</span>
                                    @else
                                        <span class="old_price">{{number_format($item->price)}} đ</span>
                                        <span class="current_price">{{number_format($item->price_sale)}} đ</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </figure>
                </article>
                @endforeach
            </div>
        </section>
        <!--product area end-->
    </div>
</div>
@endsection
@section('bot')
<script src="{{asset('assets/customer/js/slick.min.js')}}"></script>
<script>
    $(document).ready(function () {
    $('.slider-for').not('.slick-initialized').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        fade: true,
        asNavFor: '.slider-nav'
    });
    $('.slider-nav').not('.slick-initialized').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        asNavFor: '.slider-for',
        dots: true,
        focusOnSelect: true
    });
});       
</script>
<script>
    $(document).ready(function () {
    $('.add_cart_detail').click(function (e) { 
        e.preventDefault();
        var id = $(this).attr('data-id');
        var name = $(this).attr('data-name');
        var image = $(this).attr('data-image');
        var price = $(this).attr('data-price');
        var qty = $(this).prev().val();
        $.ajax({
            type: "post",
        	url: "/addcart",
        	data: {
        		'id': id,
        	    'name':name,
        		'image': image,
        		'price': price,	
        		'qty': qty
        	},
            dataType: "json",
        	success: function(data) {
                location.reload(true);
        	}
        });
    });
});
</script>
@endsection