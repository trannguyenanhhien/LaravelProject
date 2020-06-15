@foreach ($product as $item)
<div class="col-lg-3 col-md-4 col-sm-6">
    <article class="single_product">
        <figure>
            <div class="product_thumb">
                <a class="primary_img" href="product-details.html"><img src="{{$item->image}}" alt=""></a>
                @php
                if($item->price_sale!=null) echo '<div class="label_product"><span class="label_sale">Sale</span></div>
                ';
                @endphp
            </div>

            <div class="product_content grid_content">
                <div class="product_content_inner">
                    <h4 class="product_name"><a href="product-details.html">{{$item->name}}</a></h4>
                    <div class="price_box">
                        <span class="old_price">{{$item->price}}</span>
                        <span class="current_price">{{$item->price_sale}}</span>
                    </div>
                </div>
                <div class="add_to_cart">
                    <a href="cart.html" title="Add to cart">Add to cart</a>
                </div>
            </div>
            <div class="product_content list_content">
                <h4 class="product_name"><a href="product-details.html">{{$item->name}}</a></h4>
                <div class="product_rating">
                    <ul>
                        <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                        <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                        <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                        <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                        <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                    </ul>
                </div>
                <div class="price_box">
                    <span class="old_price">{{$item->price}}</span>
                    <span class="current_price">{{$item->price_sale}}</span>
                </div>
                <div class="product_desc">
                    <p>{{$item->description}}</p>
                </div>
                <div class="add_to_cart">
                    <a href="cart.html" title="Add to cart">Add to cart</a>
                </div>
                <div class="action_links">
                    <ul>
                        <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><i
                                    class="ion-android-favorite-outline"></i> Add to Wishlist</a>
                        </li>
                        <li class="compare"><a href="#" title="Add to Compare"><i class="ion-ios-settings-strong"></i>
                                Compare</a></li>
                        <li class="quick_button"><a href="#" data-toggle="modal" data-target="#modal_box"
                                title="quick view"><i class="ion-ios-search-strong"></i> quick view</a></li>
                    </ul>
                </div>
            </div>
        </figure>
    </article>
</div>
@endforeach