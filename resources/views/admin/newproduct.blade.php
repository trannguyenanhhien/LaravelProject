@extends('admin.template.admin_template')
@section('head')
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" href="{{asset('assets/admin/plugins/summernote/dist/summernote.css')}}" />
<link rel="stylesheet" href="{{asset('assets/admin/plugins/dropify/css/dropify.min.css')}}">
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('content')
<div class="body_scroll">
    <div class="block-header">
        <div class="row">
            <div class="col-lg-7 col-md-6 col-sm-12">
                <h2></h2>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html"><i class="zmdi zmdi-home"></i> Aero</a></li>
                    <li class="breadcrumb-item"><a href="/admin/products">Product</a></li>
                    <li class="breadcrumb-item active">
                    </li>
                </ul>
            </div>
            <div class="col-lg-5 col-md-6 col-sm-12">
                <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i
                        class="zmdi zmdi-arrow-right"></i></button>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <form
            action="<?php if(isset($products)){echo '/admin/product/update/'.$products->id;}else{echo '/admin/product/insert';}?>"
            method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="body">
                            <h2 class="card-inside-title">Tên sản phẩm</h2>
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <input type="text" name="name" class="form-control"
                                            value="<?php if(isset($products)){ echo $products->name;}?>" required>
                                    </div>
                                </div>
                            </div>
                            <div class="body">
                                <div class="row clearfix">
                                    <div class="col-sm-6">
                                        <label>Mục hàng</label>
                                        <select class="form-control ms" id="select-category" name="category_id"
                                            required>
                                            <option selected disabled>--> Chọn mục hàng <--</option>
                                                    <?php foreach (Category() as $item) {?> <option
                                                    @if((isset($products))&&($item->id ==
                                                    $products->category_id))
                                                    selected
                                                    @endif
                                                    value="<?= $item->id?>"><?= $item->name?></option>
                                            <?php }?>
                                        </select>
                                    </div>
                                    <div class="col-sm-6">
                                        <label>Loại hàng</label>
                                        <select class="form-control ms" id="select-subcategory" name="subcategory_id"
                                            selected>
                                            @if (isset($products))
                                            @foreach (Subcategory_id($products->category_id) as $item)
                                            <option @if ($item->id===$products->subcategory_id)
                                                selected
                                                @endif
                                                value={{$item->id}}>{{$item->name}}
                                            </option>
                                            @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="body">
                                <div class="row clearfix">
                                    <div class="col-sm-6">
                                        <label>Hãng sản xuất</label>
                                        <select class="form-control ms" id="select-brand" name="brand_id" required>
                                            <option selected disabled>--> Chọn hãng sản xuất <--</option>
                                                    <?php foreach (Brand() as $item) {?> <option
                                                    @if((isset($products))&&($item->id ==
                                                    $products->category_id))
                                                    selected
                                                    @endif
                                                    value="<?= $item->id?>"><?= $item->name?></option>
                                            <?php }?>
                                        </select>
                                    </div>
                                    <div class="col-sm-6">
                                        <label>Phiên bản</label>
                                        <select class="form-control ms" id="select-series" name="series_id"
                                            selected>
                                            @if (isset($products))
                                            @foreach (Series($products->brand_id) as $item)
                                            <option @if ($item->id===$products->series_id)
                                                selected
                                                @endif
                                                value={{$item->id}}>{{$item->name}}
                                            </option>
                                            @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <div class="header">
                                            <h2><strong>Mô tả</strong></h2>
                                        </div>
                                        <textarea class="summernote" name="description">
                                            <?php if(isset($products)){echo $products->description;}?>
                                        </textarea>

                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-sm-9 m-auto ">
                                    <div class="form-group">
                                        <div class="header">
                                            <h2><label>Hình ảnh sản phẩm</label></h2>
                                        </div>
                                        <div class="body">
                                            <input type="file" class="dropify" name="img[]" data-height="300px" multiple
                                                data-default-file="<?php if(isset($products)){ if(strpos($products->image,'uploads')==false){ echo $products->image;} else{echo explode('&', $products->image)[0];}}?>"
                                                data-allowed-file-extensions="jpg png">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Giá sản phẩm</label>
                                        <div class="input-group masked-input mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="zmdi zmdi-money"></i></span>
                                            </div>
                                            @if (isset($products))
                                            <input type="text" class="form-control price"
                                                placeholder="Ex: 100,000,000,000 vnđ" name="price" required
                                                value="{{$products->price}}">
                                            @else
                                            <input type="number" class="form-control price"
                                                placeholder="Ex: 100,000,000,000 vnđ" name="price" required>
                                            @endif

                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <label>Khuyến mãi</label>
                                    <select class="form-control ms" id="select-promotion" name="promotion_id" required>
                                        <option value="0" selected disabled>--> Chọn khuyến mãi <--</option>
                                                <?php foreach (Promotion() as $item) {?> <option
                                                @if((isset($products))&&($item->id == $products->promotion_id))
                                                selected
                                                @endif
                                                value="<?= $item->sale_present?>"><?= $item->name?>
                                        </option>
                                        <?php }?>
                                    </select>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Giá bán</label>
                                        <div class="input-group masked-input mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="zmdi zmdi-money"></i></span>
                                            </div>
                                        <input type="number" class="form-control price_sale" name="price_sale" value="@if(isset($products)){{$products->price_sale}}@endif" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <label>Tình trạng</label>
                                    <select class="form-control show-tick ms" name="instock" required>
                                        <option value="" selected disabled>-->Chọn loại hàng <--</option>
                                                @if(empty($products)) <option value="0">Còn hàng</option>
                                        <option value="1" style="color:red;">Hết hàng</option>
                                        @else
                                        <option @if ($products->instock===0)
                                            selected
                                            @endif
                                            value="0">Còn hàng</option>
                                        <option @if ($products->instock===1)
                                            selected
                                            @endif
                                            value="1" style="color:red;">Hết hàng</option>
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Thoát</button>
                                <button type="submit" class="btn btn-primary">Lưu</button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
@section('bot')

<script src="{{asset('assets/admin/js/pages/forms/basic-form-elements.js')}}"></script>
<script src="{{asset('assets/admin/plugins/dropify/js/dropify.min.js')}}"></script>
<script src="{{asset('assets/admin/js/pages/forms/dropify.js')}}"></script>
<script src="{{asset('assets/admin/plugins/summernote/dist/summernote.js')}}"></script>

<script>
    $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(document).ready(function () {
            $("#select-category").change(function (e) { 
                e.preventDefault();
                var selectedCategory = $(this).children("option:selected").val();
                $.ajax({
                    type: "post",
                    url: "/admin/product/loadsub",
                    data: {
                        'category_id': selectedCategory
                    },
                    dataType: "text",
                    success: function(res) {
                        $("#select-subcategory").attr('disabled', false);
                        $("#select-subcategory").empty();
                            $("#select-subcategory").append(res);
                    }
                });
            });
            $("#select-brand").change(function (e) { 
                e.preventDefault();
                var selectedBrand = $(this).children("option:selected").val();
                $.ajax({
                    type: "post",
                    url: "/admin/product/loadser",
                    data: {
                        'brand_id': selectedBrand
                    },
                    dataType: "text",
                    success: function(res) {
                        $("#select-series").attr('disabled', false);
                        $("#select-series").empty();
                        $("#select-series").append(res);
                    }
                });
            });
            $("#select-promotion").change(function (e) { 
                e.preventDefault();
                var selectedPro = $(this).children("option:selected").val();
                var price=$('.price').val();
                $('.price_sale').val(Math.floor(price*(100-selectedPro)/100));
            });
            $(".price").on('keyup change click', function () {
                $('.price_sale').val(($('.price').val()));
            });
        });
</script>
@endsection