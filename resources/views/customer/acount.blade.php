@extends('customer.template.customer_template')
@section('content')
<div class="breadcrumbs_area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb_content">
                    <ul>
                        <li><a href="http://gemingear.vn/">Trang chủ</a></li>
                        <li>Thông tin</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!--breadcrumbs area end-->

<!-- my account start  -->
<div class="account_page_bg">
    <div class="container">
        <section class="main_content_area">
            <div class="account_dashboard">
                <div class="row">
                    <div class="col-sm-12 col-md-3 col-lg-12 ">
                        <!-- Nav tabs -->
                        <div class="dashboard_tab_button">
                            <ul role="tablist" class="nav  dashboard-list text-center">
                                <li><a href="#account-details" data-toggle="tab" class="nav-link active">Thông tin</a>
                                </li>
                                <li> <a href="#orders" data-toggle="tab" class="nav-link">Đơn hàng đã đặt</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                    <div class="row">
                        <div class="col-sm-12 col-md-8 col-lg-8">
                            <!-- Tab panes -->
                            <div class="tab-content dashboard_content">
                                <div class="tab-pane fade" id="orders">
                                    <h3>Đơn hàng đã đặt</h3>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Số hóa đơn</th>
                                                    <th>Tên khách hàng</th>
                                                    <th>Trạng thái</th>
                                                    <th>Tổng tiền</th>
                                                    <th>Chi tiết</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach (order(getUser()->id) as $item)
                                                <tr>
                                                    <td>#BMHH19{{$item->id}}</td>
                                                    <td>{{$item->name_customer}}</td>
                                                    <td><span
                                                            class="success"><?php if($item->status==1) {echo "Hoàn thành";} else{ echo "Đang duyệt";}?></span>
                                                    </td>
                                                    <td>{{$item->total}}</td>
                                                    <td><a href="/bill/{{$item->id}}" class="view">Xem</a></td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane fade show active" id="account-details">
                                    <h3 class="text-center">Hồ sơ của tôi</h3>
                                    <div class="login">
                                        <div class="login_form_container">
                                            <div class="account_login_form">
                                                <form action="/update/profile/{{getUser()->id}}" method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    <label>Họ và tên:</label>
                                                    <input type="text" name="name" value="{{getUser()->name}}">
                                                    <label>Điện Thoại:</label>
                                                    <input type="text" name="tel" value="{{getUser()->tel}}">
                                                    <label>Email</label>
                                                    <input type="text" name="email" value="{{getUser()->email}}">
                                                    <label>Địa chỉ</label>
                                                    <input type="text" name="address"
                                                        value="{{getUser()->address}}">
                                                    <div class="save_button primary_btn default_button text-center">
                                                        <button type="submit">Cập nhật</button>
                                                    </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-4 info col-4 " style="font-family:Comfortaa,sans-serif;">
                            <div class="row">
                                <div class="card text-center col-9 m-auto">
                                    <div class="avatar-upload">
                                        <div class="avatar-edit">
                                            <input type='file' id="imageUpload" name="img" accept=".png, .jpg, .jpeg" />
                                            <label for="imageUpload"></label>
                                        </div>
                                        <div class="avatar-preview">
                                            <div id="imagePreview"
                                                style="background-image: url(@if(isset(getUser()->image)){{getUser()->image}}@else{{asset('assets/customer/img/blog/comment3.png.jpg')}} @endif);">
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <h4 class="card-title text-center">{{getUser()->name}}</h4>
                                            <div class="row">
                                                <div class="col-12">
                                                    <p class="text-muted">HCMC National University Dormitory - Zone B
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </section>
    </div>
</div>
@endsection
@section('bot')
<script>
    function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#imagePreview').css('background-image', 'url('+e.target.result +')');
            $('#imagePreview').hide();
            $('#imagePreview').fadeIn(650);
        }
        reader.readAsDataURL(input.files[0]);
    }
}
$("#imageUpload").change(function() {
    readURL(this);
});
</script>
@endsection