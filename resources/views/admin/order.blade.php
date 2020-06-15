@extends('admin.template.admin_template')
@section('head')
<link rel="stylesheet" href="{{asset('assets/admin/plugins/jquery-datatable/dataTables.bootstrap4.min.css')}}">
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('content')
<div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Thông tin đơn hàng</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html"><i class="zmdi zmdi-home"></i> Aero</a></li>
                        <li class="breadcrumb-item active">Đơn hàng</li>
                    </ul>
                    <button class="btn btn-primary btn-icon mobile_menu" type="button"><i
                            class="zmdi zmdi-sort-amount-desc"></i></button>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i
                            class="zmdi zmdi-arrow-right"></i></button>
                </div>
            </div>
        </div>
</div>
        <div class="container-fluid">
            <!-- Basic Examples -->
            <div class="">
                <div class="btn-group">
                    <a href="/admin/order/0" class="btn btn-outline-secondary btn-sm">
                    <i class="zmdi zmdi-alert-circle"></i>&nbsp;&nbsp;Chưa duyệt&nbsp;&nbsp;
                    <span class="badge badge-danger">{{$count['status_2']}}</span></a>
                </div>
                <div class="btn-group">
                    <a href="/admin/order/1" class="btn btn-outline-secondary btn-sm">
                    <i class="zmdi zmdi-badge-check"></i>&nbsp;&nbsp;Đã duyệt&nbsp;&nbsp;
                    <span class="badge bg-green">{{$count['status_1']}}</span></a>
                </div>
            </div>
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>STT</th>
                                            <th>Tên khách hàng</th>
                                            <th>Số điện thoại</th>
                                            <th>Địa điểm</th>
                                            <th>Tổng tiền</th>
                                            <th>Trạng thái</th>
                                            <th>Chức năng</th>
                                        </tr>
                                    </thead>
                                    <tbody class="notify-order">
                                        <?php $i=1?> @foreach ($order as $item)
                                        <tr>
                                            <td>#BMHH19{{$item->id}}</td>
                                            <td>{{$item->name_customer}}</td>
                                            <td>{{$item->phone}}</td>
                                            <td>{{$item->address}}</td>
                                            <td>{{$item->total}} vnđ</td>
                                            <td><?php if($item->status==0){echo 'Chưa xác nhận';}else{echo 'đã xác nhận';}?></td>
                                            <td width="17%" class="footable-last-visible" style="display: table-cell;">
                                                <a href="/admin/order_detail/{{$item->id}}"><button class="btn btn-primary btn-sm editorder"><i class="zmdi zmdi-eye zmdi-hc-fw"></i>
                                                        Xem</button></a>
                                                <a class="delete" href="/admin/order/delete/{{$item->id}}"><button
                                                        class="btn btn-danger btn-sm"><i class="zmdi zmdi-delete"></i>
                                                        Xóa</button></a>
                                            </td>
                                        </tr>
                                        <?php $i++?> @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('bot')
<script src="{{asset('assets/admin/bundles/datatablescripts.bundle.js')}}"></script>
<script src="{{asset('assets/admin/plugins/jquery-datatable/buttons/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('assets/admin/plugins/jquery-datatable/buttons/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/admin/plugins/jquery-datatable/buttons/buttons.colVis.min.js')}}"></script>
<script src="{{asset('assets/admin/plugins/jquery-datatable/buttons/buttons.flash.min.js')}}"></script>
<script src="{{asset('assets/admin/plugins/jquery-datatable/buttons/buttons.html5.min.js')}}"></script>
<script src="{{asset('assets/admin/plugins/jquery-datatable/buttons/buttons.print.min.js')}}"></script>
<script src="{{asset('assets/admin/js/pages/tables/jquery-datatable.js')}}"></script>
@endsection