<div class="navbar-brand">
    <button class="btn-menu ls-toggle-btn" type="button"><i class="zmdi zmdi-menu"></i></button>
    <a href="/admin/index"><img src="{{asset('assets/admin/images/logo.svg')}}" width="25" alt="Aero"><span
            class="m-l-10">Gemingear.vn</span></a>
</div>
<div class="menu">
    <ul class="list">
        <li>
            <div class="user-info">
                <a style="pointer-events: none;cursor: default;" class="image" href="#"><img width="40px" height="40px"
                        src="@if(getUser()->image != null) {{getUser()->image}}@else {{asset('assets/customer/img/blog/comment3.png.jpg')}} @endif"
                        alt="User"></a>
                <div class="detail">
                    <h4>{{getUser()->name}}</h4>
                    <small>{{getUser()->email}}</small>
                </div>
            </div>
        </li>
        {{-- get URI menu check class active open --}}
        <?php
            $menu = Request::segment(2);
            $uri = Request::segment(3);
            $url = Request::segment(4);
        ?>
        <li class=""><a href="/admin/Dashboard"><i class="zmdi zmdi-home"></i><span>Báo cáo</span></a></li>
        @if (getUser()->role=='admin')
        <li class="<?php if($menu=='Users'){echo 'active open';}?>"><a href="{{url('admin/users')}}"><i
                    class="zmdi zmdi-account-circle"></i><span>Tài khoản</span></a></li>
        @endif
        <li class="cl <?php if($menu=='category'){echo 'active open';}?>"><a href="{{url('admin/category')}}"><i
                    class="zmdi zmdi-hc-fw"></i><span>Danh mục</span></a></li>
        <li class="cl <?php if($menu=='subcategory'){echo 'active open';}?>"><a href="javascript:void(0);"
                class="menu-toggle"><i class="zmdi zmdi-hc-fw"></i><span>Loại danh mục</span></a>
            <ul class="ml-menu">
                @foreach (Category() as $item)
                <li class="<?php if($item->url==$uri){echo 'active open';}?>"><a
                        href="/admin/subcategory/<?= $item->url?>"><span>{{$item->name}}</span></a></li>
                @endforeach
            </ul>
        </li>
        <li class="cl <?php if($menu=='product'){echo 'active open';}?>"><a href="{{url('admin/product')}}"><i
                    class="zmdi zmdi-shopping-cart"></i><span>Sản phẩm</span></a></li>
        <li class="<?php if($menu=='order'){echo 'active open';}?> order"><a href="{{url('admin/order')}}"><i
                    class="zmdi zmdi-grid"></i><span>Đơn hàng</span></a></li>
        <li class="<?php if($menu=='brands'){echo 'active open';}?> promotions"><a href="{{url('admin/brand')}}"><i
                    class="zmdi zmdi-flare"></i><span>Hãng</span></a></li>
        <li class="<?php if($menu=='promotions'){echo 'active open';}?> promotions"><a
                href="{{url('admin/promotion')}}"><i class="zmdi zmdi-star-half"></i><span>Khuyến mãi</span></a></li>
        <li class="cl <?php if($menu=='series'){echo 'active open';}?>"><a href="javascript:void(0);"
                class="menu-toggle"><i class="zmdi zmdi-hc-fw"></i><span>Series</span></a>
            <ul class="ml-menu">
                @foreach (Brand() as $item)
                <li class="<?php if($item->url==$uri){echo 'active open';}?>"><a
                        href="/admin/series/<?= $item->url?>"><span>{{$item->name}}</span></a></li>
                @endforeach
            </ul>
        </li>

        <li class="<?php if($menu=='banner'){echo 'active open';}?> banner"><a href="{{url('admin/banner')}}"><i
                    class="zmdi zmdi-collection-item"></i><span>Banner</span></a></li>

</div>
@section('bot')
<script>
    $(document).ready(function () {
            $('.cl').click(function (e) { 
                var userid=$(this).attr("value");
                $$.post("app.Helpers.Helper.php", {suggest: userid},
                    
                    "string"
                );
            });
        });
</script>
@endsection