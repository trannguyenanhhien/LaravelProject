<div class="row">
    @foreach ($product as $item)
    <div class="col-lg-3 col-sm-12">
        <article class="single_product">
            <figure>
                <div class="product_thumb">
                    <a class="primary_img" href="{{$item->url}}"><img height="300px" width="300px" src="{{$item->image}}" alt=""></a>
                    <a class="secondary_img" href="{{$item->url}}"><img height="300px" width="300px" src="{{$item->image}}" alt=""></a>
                    <div class="label_product">
                        @if ($item->price_sale != $item->price)
                        <span class="label_sale">Sale</span>
                        @endif
                    </div>
                </div>
                <div class="product_content">
                    <div class="product_content_inner" ">
                                <h4 class=" product_name" style="height:30%; text-overflow: clip;"><a
                            href="{{$item->url}}">{{$item->name}}</a></h4>
                        <div class="price_box">
                            @if ($item->price_sale == $item->price or $item->price==0)
                            <span class="current_price">{{number_format($item->price_sale)}} đ</span>
                            @else
                            <span class="old_price">{{number_format($item->price)}} đ</span>
                            <span class="current_price">{{number_format($item->price_sale)}} đ</span>
                            @endif
                        </div>
                    </div>
                    <div class="add_to_cart" data-id="{{$item->id}}" data-price="{{$item->price_sale}}"
                        data-name="{{$item->name}}" data-image="{{$item->image}}">
                        <a style="font-family:arial;">Thêm sản phẩm</a>
                    </div>
                </div>
            </figure>
        </article>
    </div>
    @endforeach
</div>
<div class="shop_toolbar t_bottom">{{$product->render()}}</div>