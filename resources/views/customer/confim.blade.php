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
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!--breadcrumbs area end-->

<!--Checkout page section-->
@if (isset(Session::get('confim')['product']))
<div class="checkout_page_bg">
    <div class="container">
        <div class="Checkout_section">
            <form action="/order" method="POST">
                @csrf
                <div class="checkout_form" style="font-family:Arial, Helvetica, sans-serif">
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div class="checkout_form_left" style="font-family:Arial, Helvetica, sans-serif">
                                <h3 style="text-align: center;background-color:lightgreen;color:black;">Đơn hàng hoàn tất</h3>
                                <div class="row">
                                    <div class="col-lg-12 mb-20" style="text-align: center;">
                                        <h2 style="color:chartreuse;">Xin cảm ơn quý khách đã đặt hàng! Đơn hàng của quý khách đã được xác nhận</h2>
                                        <a href="http://gemingear.vn/" style="margin-top:2%;" class="btn btn-primary">Tiếp tục mua hàng</a>
                                    </div>
                                    <div class="col-lg-12 mb-20" >
                                        <h4>Thông tin người đặt hàng</h4>
                                    </div>
                                    <div class="col-lg-3 mb-20" >
                                        <h5>Họ và tên: {{Session::get('confim')['infomation']['name_customer']}}</h5>
                                    </div>
                                    <div class="col-lg-3 mb-20" >
                                        <h5>Số điện thoại: {{Session::get('confim')['infomation']['phone']}}</h5>
                                    </div>
                                    <div class="col-lg-3 mb-20" >
                                        <h5>Email: {{Session::get('confim')['infomation']['email']}}</h5>
                                    </div>
                                    <div class="col-lg-3 mb-20" >
                                        <h5>Địa chỉ: {{Session::get('confim')['infomation']['address']}}</h5>
                                    </div>
                                    <div class="col-lg-12 mb-20" >
                                        <h5>Ghi chú: {{Session::get('confim')['infomation']['note']}}</h5>
                                        <hr>
                                    </div>
                                    <h4>Thông tin đơn hàng</h4>
                                    <div class="order_table table-responsive">
                                        <table>
                                            <thead>
                                                <tr>
                                                    <th>Sản phẩm</th>
                                                    <th>Giá tiền</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach (Session::get('confim')['product'] as $item)
                                                <tr>
                                                    <td>{{$item['name']}} <strong> × {{$item['qty']}}</strong></td>
                                                    <td> {{number_format($item['price'])}} đ</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>Thành tiền</th>
                                                    <td>{{Session::get('confim')['infomation']['total']}} đ</td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@else
<div class="error_page_bg">
    <div class="container">
        <div class="error_section"> 
            <div class="row">
                <div class="col-12">
                    <div class="error_form">
                        <h1>404</h1>
                        <h2>Trang này không tồn tại</h2>
                        <p>Xin lỗi nhưng trang bạn đang tìm kiếm không tồn tại, đã bị <br> xóa, tên đã thay đổi hoặc tạm thời không có.</p>
                        <a href="http://gemingear.vn/">Trở về trang chủ</a>
                    </div>
                </div>
            </div>  
        </div>
    </div>
</div>
@endif
<!--Checkout page section end-->
@endsection