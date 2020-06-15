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
                <h2>Danh mục</h2>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/admin/index"><i class="zmdi zmdi-home"></i> Trang chủ</a></li>
                    <li class="breadcrumb-item active">Danh mục</li>
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
                    <h5 class="modal-title" id="exampleModalLabel">Thêm mục sản phẩm</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ url('admin/category/insert')}}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Tên mục sản phẩm</label>
                            <input type="text" class="form-control" name="name" />
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
                        <h2><strong>Tổng hợp</strong> danh mục </h2>
                        <div class="float-right"><button type="button" style="margin-top: -50px;"
                                class=" insertcategory btn btn-primary waves-effect waves-light add-form-category " data-toggle="modal"
                                data-target="#exampleModal"><i class="fa fa-cog mr-1"></i>
                                Thêm</button></div>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Tên Danh Mục</th>
                                        <th>Chức năng</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i=1?> @foreach ($category as $item)
                                    <tr>
                                        <td>{{$i}}</td>
                                        <td>{{$item->name}}</td>
                                        <td width="15%" class="footable-last-visible" style="display: table-cell;">
                                            <a><button class="btn btn-primary btn-sm editcategory"
                                                    data-id="{{$item->id}}>" data-toggle="modal"
                                                    data-target="#exampleModal"><i class="zmdi zmdi-edit"></i>
                                                    Sửa</button></a>
                                            <a class="delete" href="/admin/category/delete/{{$item->id}}"><button
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
<script>
    $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(document).ready(function() {
            $('.editcategory').click(function(e) {
                e.preventDefault();
                var idCategory = $(this).attr('data-id');
                $.ajax({
                    type: "post",
                    url: "/admin/category/edit",
                    data: {
                        'id': idCategory
                    },
                    dataType: "json",
                    success: function(res) {
                        // alert(res[0].id)
                        $(".modal-body :nth-child(1) input").val(res[0].name);
                        $("#exampleModal form").attr('action', document.URL+'/update/'+res[0].id);
                    }
                });
            });
        });
</script>
<script>
    $(document).ready(function(){
            $('.insertcategory').click(function (e) { 
                e.preventDefault();
                $(".modal-body :nth-child(1) input").val('');
                $("#exampleModal form").attr('action', document.URL+'/insert');
            });
        });
</script>
@endsection