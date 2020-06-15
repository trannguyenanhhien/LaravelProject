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
                        <li></li>
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
            <div class="checkout_form" style="font-family:Arial, Helvetica, sans-serif">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
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
                                        @foreach ($product as $item)
                                        <tr>
                                            <td>{{$item->product_name}} <strong> × {{$item->qty}}</strong></td>
                                            <td> {{number_format($item->price)}} đ</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Thành tiền</th>
                                            <td>{{$product[0]->total}} đ</td>
                                        </tr>
                                    </tfoot>
                                </table>
                                <div style="text-align: center; margin-top: 15px;">
                                    <a href="/user/account/profile" class="btn btn-primary"><i class="far fa-hand-point-left"></i> Trở về</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Checkout page section end-->
@endsection