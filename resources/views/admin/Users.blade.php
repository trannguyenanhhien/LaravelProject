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
                <h2>Jquery DataTables</h2>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/admin/index"><i class="zmdi zmdi-home"></i> Trang chủ</a></li>
                    <li class="breadcrumb-item active">Tài khoản</li>
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
                    <h5 class="modal-title" id="exampleModalLabel">Thêm mục người dùng</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ url('admin/users/insert')}}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Tên người dùng</label>
                            <input type="text" class="form-control tenDN" name="name" />
                            <label>Email</label>
                            <input type="text" class="form-control Email" name="email" />
                            <label>Mật khẩu</label>
                            <input type="password" class="form-control password" name="password" />
                            <label for="">Quyền</label>
                            <select class="form-control role show-tick ms" name="role" id="role">
                                <option value="" selected disabled hidden>--> Chọn quyền <--</option> <option
                                        value="admin">admin</option>
                                <option value="nhanvien">Nhân viên</option>
                            </select>
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
                        <h2><strong>Tổng hợp</strong> tài khoản </h2>
                        <div class="float-right"><button type="button" style="margin-top: -50px;"
                                class="insertcategory btn btn-primary waves-effect waves-light" data-toggle="modal"
                                data-target="#exampleModal"><i class="fa fa-cog mr-1"></i>
                                Thêm</button></div>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Tên User</th>
                                        <th>Email</th>
                                        <th>Quyền</th>
                                        <th>Chức năng</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i=1?> @foreach ($Users as $item)
                                    <tr>
                                        <td>{{$i}}</td>
                                        <td>{{$item->name}}</td>
                                        <td>{{$item->email}}</td>
                                        <td>{{$item->role}}</td>
                                        <td width="30%" class="footable-last-visible" style="display: table-cell;">
                                            <a><button class="btn btn-primary btn-sm edituser" data-id="{{$item->id}}"
                                                    data-toggle="modal" data-target="#exampleModal"><i
                                                        class="zmdi zmdi-edit"></i> Sửa</button></a>
                                            <a class="delete" href="/admin/users/delete/{{$item->id}}">
                                                <button class="btn btn-danger btn-sm"><i class="zmdi zmdi-delete"></i>
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
            $('.edituser').click(function(e) {
                e.preventDefault();
                var iduser = $(this).attr('data-id');
                $.ajax({
                    type: "post",
                    url: "/admin/users/edit",
                    data: {
                        'id': iduser
                    },
                    dataType: "json",
                    success: function(res) {
                        $(".tenDN").val(res[0].name);
                        $(".Email").val(res[0].email);
                        $(".role option[value="+res[0].role+"]").attr('selected','selected');
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