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
                        <li class="breadcrumb-item">Loại danh mục</li>
                        {{-- <li class="breadcrumb-item active">{{$subcategory[0]->name_category}}</li> --}}
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
                        <h5 class="modal-title" id="exampleModalLabel">Thêm Danh Mục</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ url('admin/subcategory/insert')}}" method="post">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Tên Danh Mục</label>
                                <input type="text" class="form-control" name="name" />
                            </div>
                            <div class="form-group">
                                    <label>Tên loại sản phẩm</label>
                                    <select class="form-control show-tick ms" id="selector" name="category_id" placeholder="--> Chọn loại sản phẩm <--">
                                        @foreach ($category as $item)
                                            <option value="{{$item->id}}" name="category_id">{{$item->name}}</option>
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
                            <h2><strong>Tổng hợp</strong> loại danh mục </h2>
                            <div class="float-right"><button type="button" style="margin-top: -50px;" class="btn btn-primary waves-effect waves-light add-form-subcategory"
                                data-toggle="modal" data-target="#exampleModal"><i class="fa fa-cog mr-1"></i>
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
                                    @php
                                    $i =1 @endphp @foreach ($subcategory as $item)
                                        <tr>
                                            <td>{{$i}}</td>
                                            <td>{{$item->name}}</td>
                                            <td width="15%" class="footable-last-visible" style="display: table-cell;">
                                                <a><button class="btn btn-primary btn-sm editcategory" data-id="{{$item->id}}"
                                                        data-toggle="modal" data-target="#exampleModal"><i
                                                            class="zmdi zmdi-edit"></i> Sửa</button></a>
                                                <a href="/admin/subcategory/delete/{{$item->id}}" class="delete"><button
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
            $('.editcategory').click(function(e) {
                e.preventDefault();
                var idCategory = $(this).attr('data-id');
                $.ajax({
                    type: "post",
                    url: "/admin/subcategory/edit",
                    data: {
                        'id': idCategory
                    },
                    dataType: "json",
                    success: function(res) {
                        $(".modal-body :nth-child(1) input").val(res[0].name);
                        $("#exampleModal form").attr('action', '/admin/subcategory/update/'+res[0].id);
                    }
                });
            });
            $('.add-form-subcategory').click(function(e) {
                e.preventDefault();
                for (var i = 1; i < 3; i++) {
                    $(".modal-body :nth-child(" + i + ")input").val('');
                }
                $("#exampleModal form").attr('action', '/admin/subcategory/insert');
            });
        });
    </script>
@endsection