@extends('customer.template.customer_template')
@section('content')
<!--breadcrumbs area start-->
<div class="breadcrumbs_area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb_content">
                    <ul>
                        <li><a href="http://gemingear.vn/">Trang chủ</a></li>
                        <li>Thanh toán</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!--breadcrumbs area end-->

<!--Checkout page section-->

<div class="checkout_page_bg">
    <div class="container">
        <div class="Checkout_section">
            <form action="/order" method="POST">
                @csrf
                <div class="checkout_form" style="font-family:Arial, Helvetica, sans-serif">
                    @if (Cart::count()>0)
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="checkout_form_left" style="font-family:Arial, Helvetica, sans-serif">
                                <h3>Thông tin khách hàng</h3>
                                <div class="row">
                                    <div class="col-lg-12 mb-20">
                                        <label>Họ và tên <span>*</span></label>
                                        <input type="text" name="name_customer"
                                            value="<?php if(isset(getUser()->name)){echo getUser()->name;}?>" required>
                                    </div>
                                    <div class="col-lg-7 mb-20">
                                        <label>Email<span>*</span></label>
                                        <input type="email" name="email"
                                            value="<?php if(isset(getUser()->email)){echo getUser()->email;}?>"
                                            required>

                                    </div>
                                    <div class="col-lg-5 mb-20">
                                        <label>Số điện thoại <span>*</span></label>
                                        <input type="tel" name="tel" value="<?php if(isset(getUser()->tel)){echo getUser()->tel;}?>" required>

                                    </div>
                                    @if(empty(getUser()->address))
                                    <div class="col-6 mb-20">
                                        <label for="city">Tỉnh/Thành phố<span>*</span></label>
                                        <select class="form-control city" name="city" required>
                                            <option value="0" class="option"> >> Chọn Tỉnh/Thành phố << </option>
                                        </select>
                                    </div>
                                    <div class="col-6 mb-20">
                                        <label for="city">Quận/Huyện<span>*</span></label>
                                        <select class="form-control country" name="country" required>
                                            <option value="0" class="option"> >> Chọn Quận/Huyện << </option>
                                        </select>
                                    </div>
                                    @endif
                                    <div class="col-12 mb-20">
                                        <label>Địa chỉ <span>*</span></label>
                                        <input placeholder="" type="text" name="address" value="<?php if(isset(getUser()->address)){echo getUser()->address;}?>" required>
                                    </div>
                                    <div class="col-12 mb-20">
                                        <div class="order-notes">
                                            <label for="order_note">Ghi chú sản phẩm</label>
                                           <textarea id="order_note" name="note" placeholder="Ghi chú thông tin mua hàng"></textarea>
                                       </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="checkout_form_right">
                                <h3>Thông tin đơn hàng</h3>
                                <div class="order_table table-responsive">
                                    <table>
                                        <thead>
                                            <tr>
                                                <th>Sản phẩm</th>
                                                <th>Giá tiền</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach (Cart::content() as $item)
                                            <tr>
                                                <td>{{$item->name}} <strong> × {{$item->qty}}</strong></td>
                                                <td> {{number_format($item->subtotal)}} đ</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Thành tiền</th>
                                                <td>{{Cart::subtotal()}} đ</td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                <div class="payment_method">
                                    <div class="panel-default">
                                        <input id="payment" name="check_method" type="radio"
                                            data-target="createp_account" value="cod" />
                                        <label for="payment" data-toggle="collapse" data-target="#method"
                                            aria-controls="method">Thanh toán khi nhận hàng</label>
                                    </div>
                                    <div class="panel-default">
                                        <input id="payment_defult" value="payment" name="check_method" type="radio" for="address"
                                            data-toggle="collapse" data-target="#collapsetwo"
                                            aria-controls="collapseOne" />
                                        <label>Thanh toán online<img
                                                src="{{asset('assets/customer/img/icon/papyel.png')}}" alt=""></label>
                                        <div id="collapsetwo" class="collapse one" data-parent="#accordion">
                                            <div class="row">
                                                <div class="col-lg-12 mb-20">
                                                    <input type="text" name="name_tk" placeholder="Họ và tên chủ thẻ">
                                                </div>
                                                <div class="col-lg-8 mb-20">
                                                    <input type="text" name="number_cart" placeholder="Số thẻ tín dụng/ ghi nợ" >
                                                </div>
                                                <div class="col-lg-4 mb-20">
                                                    <img src="{{asset('assets/customer/img/icon/papyel.png')}}" alt="">
                                                </div>
                                                <div class="col-12">
                                                    <label>Ngày hết hạn</label>
                                                </div>
                                                <div class="col-4 mb-20">
                                                    <input type="text" name="day" value="" placeholder="MM">
                                                </div>
                                                <div class="col-4 mb-20">
                                                    <input type="text" name="year" value="" placeholder="YYYY">
                                                </div>
                                                <div class="col-4 mb-20">
                                                    <input type="text" name="ccv" value="" placeholder="000">
                                                </div>
                                                <div class="col-12 mb-20">
                                                    <input type="text" value="" name="add_cart" placeholder="Địa chỉ hóa đơn">
                                                </div>
                                                <div class="col-12 mb-20">
                                                    <p>Chúng tôi hợp tác với CyberSouce, công ty thuộc tổ chức thẻ VISA,
                                                        nhằm đảm bảo thông tin thẻ Tín dụng/Ghi nợ của bạn luôn được bảo
                                                        mật và an toàn. Gemingear không có quyền truy cập vào bất cứ
                                                        thông tin nào</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="order_button" style="text-align: right;">
                                    <button class="col-12" type="submit">Thanh toán</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    @else
                    <div class="cart_submit" style="font-family:Verdana, Geneva, Tahoma, sans-serif">
                        <h3>Giỏ hàng của bạn trống</h3>
                        <a href="http://gemingear.vn/">>> Mua ngay <<</a>
                    </div>
                    @endif
                </div>
            </form>
        </div>
    </div>
</div>
<!--Checkout page section end-->
@endsection

@section('bot')
<script>
    $(document).ready(function () {
        $.ajax({
            type: "get",
            url: "city",
            data: "city",
            dataType: "json",
            success: function (data) {
                var str="";
                $.each(data.LtsItem, function (item, value) { 
                     str+=`<option value="${value.Title}" data-id="${value.ID}" class="option">${value.Title}</option>`;
                });
                $('.city').append(str);
                // console.log(data.LtsItem);
            }
        });
    });
    $(document).ready(function () {
        $('.city').change(function (e) { 
            e.preventDefault();
            var id = $(this).find(":selected").attr('data-id');
            $.ajax({
				type: "post",
				url: "/country",
				data: {
					'id': id,
				},
                dataType: "json",
				success: function(data) {
                    var str="";
                    $.each(data, function (item, value) { 
                        str+=`<option value="${value.Title}" class="option">${value.Title}</option>`;
                    });
                    $('.country').html(str);
				}
			});
        });
    });
    $('#payment').click(function () { 
        $("#collapsetwo").removeClass("show");
        $("#collapsetwo input").prop('required',false);
    });
    $('#payment_defult').click(function () { 
        $("#collapsetwo input").prop('required',true);
    });
</script>
@endsection