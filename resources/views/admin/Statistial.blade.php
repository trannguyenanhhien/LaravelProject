@extends('admin.template.admin_template')
@section('head')
<link rel="stylesheet" href="{{asset('assets/admin/plugins/jvectormap/jquery-jvectormap-2.0.3.min.css')}}" />
<link rel="stylesheet" href="{{asset('assets/admin/plugins/charts-c3/plugin.css')}}" />
<link rel="stylesheet" href="{{asset('assets/admin/plugins/morrisjs/morris.min.css')}}" />
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card">
                    <div class="header">
                        <div class="row">
                            <div class="col-lg-6">
                                <h2><strong><i class="zmdi zmdi-chart"></i> Thống kê doanh thu theo tháng</strong></h2>
                            </div>
                            <div class="col-lg-2 text-center m-auto">

                            </div>
                            <div class="col-lg-3 text-center m-auto">
                                <select name="Year" class="form-control show-tick ms" id="year">

                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="body">
                        <div id="chart-area-spline-sracked" class="c3_chart d_sales"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row clearfix">
            <div class="col-lg-8 col-md-6 col-sm-6">
                <div class="col-lg-12 text-center">
                    <h5 style="color:#e47297;">Top sản phẩm bán chạy tháng <?php echo date("m"); ?></h5>
                </div>
                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="products carousel-item active">
                            <div class="row clearfix ">
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="card mcard_4">
                                        <div class="body">
                                            <img src="{{top10()[0]->image}}" alt="profile-image">
                                            <div class="user">
                                                <h5 class="mt-3 mb-1 text-center">{{top10()[0]->name}}</h5>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="card w_data_1">
                                        <div class="body">
                                            <div class="w_icon pink"><i class="zmdi zmdi-money"></i></div>
                                            <h4 class="mt-3 mb-0">{{top10()[0]->DoanhThu}} VNĐ</h4>
                                            <span class="text-muted">Doanh thu</span>
                                            <div class="w_description text-success">
                                                <i class="zmdi zmdi-trending-up"></i>
                                                <span>TOP 1</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card w_data_1">
                                        <div class="body">
                                            <div class="w_icon cyan"><i class="zmdi zmdi-ticket-star"></i></div>
                                            <h4 class="mt-3 mb-1">{{price(top10()[0]->name)[0]->SL}}</h4>
                                            <span class="text-muted">Số lượng</span>
                                            <div class="w_description text-success">
                                                <i class="zmdi zmdi-trending-up"></i>
                                                <span>95.5%</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="products carousel-item ">
                            <div class="row clearfix ">
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="card mcard_4">
                                        <div class="body">

                                            <img src="{{top10()[1]->image}}" alt="profile-image">

                                            <div class="user">
                                                <h5 class="mt-3 mb-1 text-center">{{top10()[1]->name}}</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="card w_data_1">
                                        <div class="body">
                                            <div class="w_icon pink"><i class="zmdi zmdi-money"></i></div>
                                            <h4 class="mt-3 mb-0">{{top10()[1]->DoanhThu}} VNĐ</h4>
                                            <span class="text-muted">Doanh thu</span>
                                            <div class="w_description text-danger">
                                                <i class="zmdi zmdi-trending-down"></i>
                                                <span>TOP 2</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card w_data_1">
                                        <div class="body">
                                            <div class="w_icon cyan"><i class="zmdi zmdi-ticket-star"></i></div>
                                            <h4 class="mt-3 mb-1">{{price(top10()[1]->name)[0]->SL}}</h4>
                                            <span class="text-muted">Số lượng</span>
                                            <div class="w_description text-success">
                                                <i class="zmdi zmdi-trending-up"></i>
                                                <span>95.5%</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="products carousel-item ">
                            <div class="row clearfix ">
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="card mcard_4">
                                        <div class="body">

                                            <img src="{{top10()[2]->image}}" alt="profile-image">

                                            <div class="user">
                                                <h5 class="mt-3 mb-1 text-center">{{top10()[2]->name}}</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="card w_data_1">
                                        <div class="body">
                                            <div class="w_icon pink"><i class="zmdi zmdi-money"></i></div>
                                            <h4 class="mt-3 mb-0">{{top10()[2]->DoanhThu}} VNĐ</h4>
                                            <span class="text-muted">Doanh thu</span>
                                            <div class="w_description text-success">
                                                <i class="zmdi zmdi-trending-up"></i>
                                                <span>TOP 3</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card w_data_1">
                                        <div class="body">
                                            <div class="w_icon cyan"><i class="zmdi zmdi-ticket-star"></i></div>
                                            <h4 class="mt-3 mb-1">{{price(top10()[2]->name)[0]->SL}}</h4>
                                            <span class="text-muted">Số lượng</span>
                                            <div class="w_description text-success">
                                                <i class="zmdi zmdi-trending-up"></i>
                                                <span>95.5%</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="products carousel-item ">
                            <div class="row clearfix ">
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="card mcard_4">
                                        <div class="body">

                                            <img src="{{top10()[3]->image}}" alt="profile-image">

                                            <div class="user">
                                                <h5 class="mt-3 mb-1">{{top10()[3]->name}}</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="card w_data_1">
                                        <div class="body">
                                            <div class="w_icon pink"><i class="zmdi zmdi-money"></i></div>
                                            <h4 class="mt-3 mb-0">{{top10()[3]->DoanhThu}} VNĐ</h4>
                                            <span class="text-muted">Doanh thu</span>
                                            <div class="w_description text-danger">
                                                <i class="zmdi zmdi-trending-down"></i>
                                                <span>TOP 4</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card w_data_1">
                                        <div class="body">
                                            <div class="w_icon cyan"><i class="zmdi zmdi-ticket-star"></i></div>
                                            <h4 class="mt-3 mb-1">{{price(top10()[3]->name)[0]->SL}}</h4>
                                            <span class="text-muted">Số lượng</span>
                                            <div class="w_description text-success">
                                                <i class="zmdi zmdi-trending-up"></i>
                                                <span>95.5%</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="products carousel-item ">
                            <div class="row clearfix ">
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="card mcard_4">
                                        <div class="body">

                                            <img src="{{top10()[4]->image}}" alt="profile-image">

                                            <div class="user">
                                                <h5 class="mt-3 mb-1 text-center">{{top10()[4]->name}}</h5>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="card w_data_1">
                                        <div class="body">
                                            <div class="w_icon pink"><i class="zmdi zmdi-money"></i></div>
                                            <h4 class="mt-3 mb-0">{{top10()[4]->DoanhThu}} VNĐ</h4>
                                            <span class="text-muted">Doanh thu</span>
                                            <div class="w_description text-danger">
                                                <i class="zmdi zmdi-trending-down"></i>
                                                <span>TOP 5</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card w_data_1">
                                        <div class="body">
                                            <div class="w_icon cyan"><i class="zmdi zmdi-ticket-star"></i></div>
                                            <h4 class="mt-3 mb-1">{{price(top10()[4]->name)[0]->SL}}</h4>
                                            <span class="text-muted">Số lượng</span>
                                            <div class="w_description text-success">
                                                <i class="zmdi zmdi-trending-up"></i>
                                                <span>95.5%</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
            <div class="col-lg-4 col-md-12"">
                <div class=" card">
                <div class="header">
                    <h2><strong>Thống kê theo danh mục</strong></h2>
                </div>
                <div class="body text-center">
                    <div id="chart-pie" class="c3_chart d_distribution"></div>
                    <button class="btn btn-primary mt-4 mb-4">View More</button>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
@section('bot')
<script src="{{asset('assets/admin/bundles/jvectormap.bundle.js')}}"></script>
<script src="{{asset('assets/admin/bundles/sparkline.bundle.js')}}"></script>
<script src="{{asset('assets/admin/bundles/c3.bundle.js')}}"></script>
{{-- <script src="{{asset('assets/admin/js/pages/index.js')}}"></script> --}}
<script>
    $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
                 
    $(document).ready(function(){
        var name =[];
            $.ajax({
                type: "post",
                url: "Dashboard/category",
                dataType: "json",
                success: function (response) {                    
                    // $.each(response, function(i, item) {
                    //     for (let index = 0; index < 2; index++) {
                    //         demo +=`[${item.name},${item.DoanhThu}],`;
                    //     }
                    // });
                    for (let index = 0; index < 5; index++) {
                        var char ={};
                        if(response[index]!= null && response[index] != 'undefined')
                        {
                            char.name = response[index].name;
                            char.price = response[index].DoanhThu;
                            name.push(char)
                        }else{
                            char.name = "";
                            char.price = "";
                            name.push(char)
                        }
                    }
                    // console.log(name);
                    // console.log(color);
                var chart = c3.generate({
                bindto: '#chart-pie', // id of chart wrapper
                data: {
                    columns: [
                            [name[0].name, name[0].price],
                            [name[1].name, name[1].price],
                            [name[2].name, name[2].price],
                            [name[3].name, name[3].price],
                            [name[4].name, name[4].price],
                    ],  
                    type: 'pie', // default type of chart
                },
            });
            }
        });
           
    });
        
    $(document).ready(function(){
            var year= new Date().getFullYear();
            var DS=['data1',0,0,0,0,0,0,0,0,0,0,0,0];
            $('#year').append(`
                            <option selected disabled value="">-->   Chọn năm   <--</option>
                            <option>`+ (parseInt(year)-1)+`</option>
                            <option  >`+parseInt(year)+`</option>
                            <option >`+(parseInt(year)+1)+`</option>
                            `);
            $('#year').change(function (e) { 
                e.preventDefault();
                var Y= $(this).children("option:selected").val();
                        $.ajax({
                                    type: "post",
                                    url: "Dashboard/Year",
                                    data: {
                                            'year': Y
                                            },
                                    dataType: "json",
                                    success: function (response) {
                                         DS=['data1',0,0,0,0,0,0,0,0,0,0,0,0];
                                        for(var i=1;i<DS.length;i++)
                                        {
                                            if(response[i-1]!=undefined)
                                            {
                                                DS[response[i-1].month]=response[i-1].DoanhThu;
                                            }
                                            
                                        }
                                        var chart = c3.generate({
                                            bindto: '#chart-area-spline-sracked', // id of chart wrapper
                                            data: {
                                                columns: [
                                                    // each columns data
                                                    DS,
                                                ],
                                                type: 'area-spline', // default type of chart
                                                groups: [
                                                    [ 'data1']
                                                ],
                                                colors: {
                                                    'data1': Aero.colors["blue"],
                                                },
                                                names: {
                                                    // name of each serie
                                                    'data1': 'Doanh thu theo năm '+Y+' ',
                                                }
                                            },
                                            axis: {
                                                x: {
                                                    type: 'category',
                                                    // name of each category
                                                    categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'July', 'Aug', 'Sept', 'Oct','Nov','Dec']
                                                },
                                            },
                                            legend: {
                                                show: true, //hide legend
                                            },
                                            padding: {
                                                bottom: 0,
                                                top: 0
                                            },
                                        });  
                                    }
                        });
            });
            
            var chart = c3.generate({
                bindto: '#chart-area-spline-sracked', // id of chart wrapper
                data: {
                    columns: [
                        // each columns data
                        DS,
                    ],
                    type: 'area-spline', // default type of chart
                    groups: [
                        [ 'data1']
                    ],
                    colors: {
                        'data1': Aero.colors["blue"],
                    },
                    names: {
                        // name of each serie
                        'data1': 'Doanh thu theo năm ',
                    }
                },
                axis: {
                    x: {
                        type: 'category',
                        // name of each category
                        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'July', 'Aug', 'Sept', 'Oct','Nov','Dec']
                    },
                },
                legend: {
                    show: true, //hide legend
                },
                padding: {
                    bottom: 0,
                    top: 0
                },
            });
        });    
</script>
@endsection