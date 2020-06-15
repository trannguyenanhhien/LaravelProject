@extends('customer.template.customer_template')
@section('content')
<!--breadcrumbs area start-->
<div class="breadcrumbs_area">
    <div class="container">   
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb_content">
                    <ul>
                        <li><a href="http://doanweb1234.com/">Trang chủ</a></li>
                        <li>Giỏ hàng</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>                
</div>
    <!--breadcrumbs area end-->
<div class="cart_page_bg">
    <div class="container">
        <div class="shopping_cart_area">
            <form action="#">
                <div class="row">
                    <div class="col-12">
                        <div class="table_desc">
                            @if (Cart::count()>0)
                            <div class="cart_page table-responsive">
                                <table>
                                    <thead style="font-family:Arial, Helvetica, sans-serif">
                                        <tr>
                                            <th class="product_thumb">Sản phẩm</th>
                                            <th>Giá</th>
                                            <th class="product_quantity">Số lượng</th>
                                            <th class="product-price">Thành tiền</th>
                                            <th class="product_remove">Chức năng</th>
                                        </tr>
                                    </thead>
                                    <tbody style="font-family:Arial, Helvetica, sans-serif">
                                        @foreach (Cart::content() as $item)
                                        <tr data-id="{{$item->rowId}}">
                                            <td width="40%" class="product_thumb"><a href="#"><img
                                                        src="{{$item->options->size}}" alt="">{{$item->name}}</a></td>
                                            <td><a href="#">{{number_format($item->price)}}đ</a></td>
                                            <td><input class="product_qty" min="1" max="100" value="{{$item->qty}}" type="number"></td>
                                            <td>{{number_format($item->price*$item->qty)}}đ</td>
                                            <td class="product_remove remove_cart"><a
                                                    href="#"><i class="fa fa-trash-o"></i></a>
                                            </td>
                                        </tr>
                                        @endforeach
                                        <tr>
                                            <td colspan="3">Thành tiền</td>
                                            <td>{{Cart::subtotal()}}đ</td>
                                            <td></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="cart_submit" style="font-family:Verdana, Geneva, Tahoma, sans-serif">
                                {{-- <a href="http://gemingear.vn/"><button>Tiếp tục mua hàng</button></a> --}}
                                <a href="http://gemingear.vn/">Tiếp tục mua hàng</a>
                                <a href="/checkout">Thanh toán</a>
                            </div>
                            @else
                            <div class="cart_submit" style="font-family:Verdana, Geneva, Tahoma, sans-serif">
                                <h3>Giỏ hàng của bạn trống</h3>
                                <a href="http://gemingear.vn/">>> Mua ngay <<</a>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('bot')
<script>
$(document).ready(function () {
    $('.product_remove').click(function (e) { 
        e.preventDefault();
        var id = $(this).parent().attr('data-id');
        $.ajax({
            type: "get",
            url: "/removecart",
            data: {
                'rowId': id,
            },
            dataType: "json",
            success: function (data) {
                $('.cart_price').text(data.total);
                $('.cart_count').text(data.total_item);
                location.reload(true);
            }
        });
    });
    $('.product_qty').change(function (e) { 
        e.preventDefault();
        var id = $(this).parent().parent().attr('data-id');
        var qty = $(this).val();
        $.ajax({
            type: "post",
            url: "/updatecart",
            data: {
                'rowId': id,
                'qty' : qty,
            },
            dataType: "json",
            success: function (data) {
                $('.cart_price').text(data.total);
                $('.cart_count').text(data.total_item);
                location.reload(true);
            }
        });
    });
});
</script>
@endsection