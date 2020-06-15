@extends('admin.template.admin_template')
@section('head')
<link rel="stylesheet" href="{{asset('assets/admin/plugins/jquery-datatable/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/admin/plugins/dropify/css/dropify.min.css')}}">
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('content')
<div class="body_scroll">
    <div class="block-header">
        <div class="row">
            <div class="col-lg-7 col-md-6 col-sm-12">
                <h2>Banner quảng cáo</h2>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/admin/index"><i class="zmdi zmdi-home"></i> Trang chủ</a></li>
                    <li class="breadcrumb-item">banner</li>
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

    <!-- The Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title suaTen" id="exampleModalLabel">Thêm chiến dịch</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Tên chiến dịch</label>
                            <input type="text" class="form-control" name="name"/>
                        </div>
                        <div class="form-group">
                            <select class="form-control ms" id="select-banner" name="role" required>
                                <option value="0" selected disabled>--> Chọn khuyến mãi <--</option> </option>
                                <option value="1">Khuyến mãi</option>
                                <option value="2">Chiến dịch</option>
                            </select>
                        </div>
                        <div class="form-group-image">
                            <label>Hình ảnh</label>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Thoát</button>
                        <button type="submit" class="btn btn-primary">Lưu</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <!-- Basic Examples -->
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card">
                    <div class="header">
                        <h2><strong>Basic</strong> Examples </h2>

                        <div class="float-right"><button type="button" style="margin-top: -50px;"
                                class=" add-form-banner btn btn-primary waves-effect waves-light" data-toggle="modal"
                                data-target="#exampleModal"><i class="fa fa-cog mr-1"></i>
                                Thêm</button></div>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Tên chiến dịch</th>
                                        <th>Loại chiến dịch</th>
                                        <th>Chức năng</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i=1?> @foreach ($banner as $item)
                                    <tr>
                                        <td>{{$i}}</td>
                                        <td>{{$item->name}}</td>
                                        <td><?php if($item->role==1){echo 'Khuyến mãi';}else{echo 'Chiến dịch';}?></td>
                                        <td width="15%" class="footable-last-visible" style="display: table-cell;">
                                            <a><button class="btn btn-primary btn-sm editcategory" 
                                                    data-id="{{$item->id}}>" data-toggle="modal"
                                                    data-target="#exampleModal"><i class="zmdi zmdi-edit"></i>
                                                    Sửa</button></a>
                                            <a class="delete" href="/admin/banner/delete/{{$item->id}}"><button
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
<script src="{{asset('assets/admin/plugins/dropify/js/dropify.min.js')}}"></script>
<script src="{{asset('assets/admin/js/pages/forms/dropify.js')}}"></script>
<script src="{{asset('assets/admin/js/pages/tables/jquery-datatable.js')}}"></script>
<script>
    $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
    });
    $(document).ready(function() {
        $('.editcategory').click(function(e) {
            e.preventDefault();
            var idbanner = $(this).attr('data-id');
            $.ajax({
                type: "post",
                url: "/admin/banner/edit",
                data: {
                    'id': idbanner
                },
                dataType: "json",
                success: function(res) {
                    $(".modal-body .form-group input").val(res[0].name);
                    $("#exampleModal .form-group-image .dropify-wrapper").remove();
                    $("#exampleModal .form-group-image").append('<input type="file" accept=".webp,.png,.jpg" class="dropify" name="img"  data-default-file="'+res[0].url+'" />');
                    $(`#select-banner option[value=${res[0].role}]`).attr('selected', 'selected');
                    $('.dropify').dropify();
                    $("#exampleModal form").attr('action', '/admin/banner/update/'+res[0].id);
                }
            });
        });
        $('.add-form-banner').click(function(e) {
            e.preventDefault();
            $("#exampleModal .form-group-image .dropify-wrapper").remove();
            $("#exampleModal .form-group-image").append('<input type="file" class="dropify" name="img"/>');
            $('.dropify').dropify();
            $(".modal-body :nth-child(1) input").val('');
            $("#exampleModal form").attr('action', '/admin/banner/insert');
        });
    });
</script>
@endsection