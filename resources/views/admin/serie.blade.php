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
                    <h2>Series sản phẩm</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/admin/index"><i class="zmdi zmdi-home"></i> Trang chủ</a></li>
                        <li class="breadcrumb-item">Series</li>
                        <li class="breadcrumb-item active">{{$brand[0]->name}}</li>
                    </ul>
                    <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">                
                    <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i class="zmdi zmdi-arrow-right"></i></button>                                
                </div>
            </div>
        </div>

        <!-- The Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Thêm Series</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ url('admin/series/insert')}}" method="post">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Tên Series</label>
                                <input type="text" class="form-control" name="name" />
                            </div>
                            <div class="form-group">
                                    <label>Tên hãng sản xuất</label>
                                    <select class="form-control show-tick ms" id="selector" name="brand_id" placeholder="--> Chọn loại sản phẩm <--">
                                        @foreach ($brand as $item)
                                            <option value="{{$item->id}}" name="brand_id">{{$item->name}}</option>
                                        @endforeach
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
                            <h2><strong>Tổng hợp</strong> Series </h2>
                            <div class="float-right"><button type="button" style="margin-top: -50px;" class="btn btn-primary waves-effect waves-light add-form-series"
                                data-toggle="modal" data-target="#exampleModal"><i class="fa fa-cog mr-1"></i>
                                Thêm</button></div>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>STT</th>
                                            <th>Tên Series</th>
                                            <th>Chức năng</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @php
                                    $i =1 @endphp @foreach ($series as $item)
                                        <tr>
                                            <td>{{$i}}</td>
                                            <td>{{$item->name}}</td>
                                            <td width="15%" class="footable-last-visible" style="display: table-cell;">
                                                <a><button class="btn btn-primary btn-sm editseries" data-id="{{$item->id}}"
                                                        data-toggle="modal" data-target="#exampleModal"><i
                                                            class="zmdi zmdi-edit"></i> Sửa</button></a>
                                                <a href="/admin/series/delete/{{$item->id}}" class="delete"><button
                                                        class="btn btn-danger btn-sm"><i class="zmdi zmdi-delete"></i>
                                                        Xóa</button></a>
                                            </td>
                                        </tr>
                                    @php $i++;
                                    @endphp @endforeach
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
                $('.editseries').click(function(e) {
                    e.preventDefault();
                    var idSeries = $(this).attr('data-id');
                    $.ajax({
                        type: "post",
                        url: "/admin/series/edit",
                        data: {
                            'id': idSeries
                        },
                        dataType: "json",
                        success: function(res) {
                            $(".modal-body :nth-child(1) input").val(res[0].name);
                            $("#exampleModal form").attr('action', '/admin/series/update/'+res[0].id);
                        }
                    });
                });
            });
        </script>
    <script>
        $(document).ready(function () {
            $('.add-form-series').click(function(e) {
                e.preventDefault();
                for (var i = 1; i < 3; i++) {
                    $(".modal-body :nth-child(" + i + ")input").val('');
                }
                $("#exampleModal form").attr('action', '/admin/series/insert');
            });
        });
    </script>
    @endsection