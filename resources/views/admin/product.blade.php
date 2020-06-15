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
                <h2>Thông tin sản phẩm</h2>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/admin/index"><i class="zmdi zmdi-home"></i> Trang chủ</a></li>
                    <li class="breadcrumb-item active">Sản phẩm</li>
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

  

<div class="container-fluid">
    <!-- Basic Examples -->
    <div class="row clearfix">
        <div class="col-lg-12">
            <div class="card">
                <div class="header">
                    <h2><strong>Tổng hợp</strong> sản phẩm </h2>
                    <div class="float-right">
                        <form action="{{ url('admin/product/new')}}" method="post">
                            @csrf
                            <button type="submit" style="margin-top: -50px;"
                                class=" btn btn-primary waves-effect waves-light"><i class="fa fa-cog mr-1"></i>
                                Thêm</button>
                        </form>
                    </div>
                </div>
                <div class="body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Giá sản phẩm</th>
                                    <th>Loại sản phẩm</th>
                                    <th>Hãng sản xuất</th>
                                    <th>Khuyến mãi</th>
                                    <th>Tình trạng</th>
                                    <th>Chức năng</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php $i=1?> @foreach ($product as $item)
                                <tr>
                                    <td>{{$i}}</td>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->price}}</td>
                                    <td>{{$item->subcategory_name}}</td>
                                    <td>{{$item->series_name}}</td>
                                    <td>{{$item->promotion_name}}</td>
                                    <td><?php if($item->instock==0){echo 'Còn hàng';}else{echo 'Hết hàng';}?></td>
                                    <td width="16%" class="footable-last-visible" style="display: table-cell;">
                                        <form action="/admin/product/edit/{{$item->id}}" method="post">
                                            @csrf
                                            <button class="btn btn-primary btn-sm editproduct" data-id="{{$item->id}}"><i
                                                    class="zmdi zmdi-edit"></i> Sửa</button>
                                            <a class="delete" href="/admin/product/delete/{{$item->id}}">
                                            <button class="btn btn-danger btn-sm"><i class="zmdi zmdi-delete"></i>
                                                Xóa</button></a>
                                        </form>
                                        
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
<script src="{{asset('assets/admin/js/pages/tables/jquery-datatable.js')}}"></script>

<script>
    $(document).ready(function(){
            $('.insertcategory').click(function (e) { 
                e.preventDefault();
                $(".modal-body :nth-child(1) input").val('');
            });
        });
</script>
@endsection