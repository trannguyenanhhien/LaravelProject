@extends('admin.template.admin_template')
@section('content')
<div class="body_scroll">
    <div class="block-header">
        <div class="row">
            <div class="col-lg-7 col-md-6 col-sm-12">
                <h2>My team</h2>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/admin/index"><i class="zmdi zmdi-home"></i> Trang chủ</a></li>
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
        <div class="row clearfix">
            <div class="col-lg-6 col-md-12">
                <div class="card mcard_3">
                    <div class="body">
                        <a href="/admin/profile/3"><img height="200px" width="200px"
                                src="https://scontent.fsgn2-1.fna.fbcdn.net/v/t31.0-8/p960x960/24132007_811143392380347_6773020926246026771_o.jpg?_nc_cat=107&_nc_eui2=AeEjKtLjiOBKFUjuQ_KYcA_x9_2v5FQmGBexdl2wYbh_zOGgoQc2CHSDQFAVZt-A-Vi4sHl0693c0KqnRD4l8iev12uKu8pd_WQdZr4a7N8dyA&_nc_oc=AQkEOpgLJj_2JprgUcckxJ_jPz0T3FHSbBptzhA6PkJIA526xzb_J8dqN0TOy8ZG4Is&_nc_ht=scontent.fsgn2-1.fna&oh=8b62d834afee0131669425016032a905&oe=5E50FE22"
                                class="rounded-circle shadow " alt="profile-image"></a>
                        <h4 class="m-t-10">Võ Nhật Bảo(Leader)</h4>
                        <div class="row">
                            <div class="col-12">
                                <ul class="social-links list-unstyled">
                                    <li><a title="facebook" href="javascript:void(0);"><i
                                                class="zmdi zmdi-facebook"></i></a></li>
                                    <li><a title="twitter" href="javascript:void(0);"><i
                                                class="zmdi zmdi-twitter"></i></a></li>
                                    <li><a title="instagram" href="javascript:void(0);"><i
                                                class="zmdi zmdi-instagram"></i></a></li>
                                </ul>
                                <p class="text-muted">795 Folsom Ave, Suite 600 San Francisco, CADGE 94107</p>
                            </div>
                            <div class="col-4">
                                <small>Following</small>
                                <h5>852</h5>
                            </div>
                            <div class="col-4">
                                <small>Followers</small>
                                <h5>13k</h5>
                            </div>
                            <div class="col-4">
                                <small>Post</small>
                                <h5>234</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mcard_3">
                    <div class="body">
                        <a href="/admin/profile/2"><img height="200px" width="200px"
                                src="https://scontent.fsgn2-3.fna.fbcdn.net/v/t1.0-9/p960x960/73324144_1181827322006520_1929047839028019200_o.jpg?_nc_cat=106&_nc_eui2=AeFxnIP6InM6X5C3lDBv_M-abtrgIrkXZu4n_6bFWWZBWD8RjQv_ozMbBeUAcLMdXQnkost48_MX6SAoOYIcoWJrC4KXjzOf8M-SWgV36pf4lw&_nc_oc=AQkkkD6WBXXQuImDywlsOHg7pX6ZAINLEvogGL5iWRhKLiSiVMxOu2zHjpkbr2GY9_Y&_nc_ht=scontent.fsgn2-3.fna&oh=09d8f52fc638feffccf151ccb480b523&oe=5E52A7FD"
                                class="rounded-circle shadow " alt="profile-image"></a>
                        <h4 class="m-t-10">Trần Nguyễn Anh Hiển</h4>
                        <div class="row">
                            <div class="col-12">
                                <ul class="social-links list-unstyled">
                                    <li><a title="facebook" href="javascript:void(0);"><i
                                                class="zmdi zmdi-facebook"></i></a></li>
                                    <li><a title="twitter" href="javascript:void(0);"><i
                                                class="zmdi zmdi-twitter"></i></a></li>
                                    <li><a title="instagram" href="javascript:void(0);"><i
                                                class="zmdi zmdi-instagram"></i></a></li>
                                </ul>
                                <p class="text-muted">HCMC National University Dormitory Zone A</p>
                            </div>
                            <div class="col-4">
                                <small>Following</small>
                                <h5>852</h5>
                            </div>
                            <div class="col-4">
                                <small>Followers</small>
                                <h5>13k</h5>
                            </div>
                            <div class="col-4">
                                <small>Post</small>
                                <h5>234</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="card mcard_3">
                    <div class="body">
                        <a href="/admin/profile/1"><img height="200px" width="200px"
                                src="https://scontent.fsgn2-1.fna.fbcdn.net/v/t1.0-9/p960x960/70906418_1350377618471842_1424057674697277440_o.jpg?_nc_cat=111&_nc_eui2=AeGObWaUlFEbhwnRbscEBPdhXizkRP6Vr6Q8abc_n2NyXXTk9cpSd_wJvfbXbxLtKEy8dT9xlnaKPxhMhHKRhjaXqyJmFHIl2esL_kSJV6-Z9Q&_nc_oc=AQmwosZEtqIrVaaOQolaOSW7GxKGUQ8hwaAyFDPm9dCxkq0ugwdvRzyt3D1EqaKJVwg&_nc_ht=scontent.fsgn2-1.fna&oh=fd233487b706c6d8722c2d05ba578781&oe=5E520E1B"
                                class="rounded-circle shadow " alt="profile-image"></a>
                        <h4 class="m-t-10">Võ Trung Hiếu</h4>
                        <div class="row">
                            <div class="col-12">
                                <ul class="social-links list-unstyled">
                                    <li><a title="facebook" target="_blank" href="https://www.facebook.com/tin.ho.52"><i
                                                class="zmdi zmdi-facebook"></i></a></li>
                                    <li><a title="twitter" target="_blank" href="https://twitter.com/VTrungH76654611"><i
                                                class="zmdi zmdi-twitter"></i></a></li>
                                    <li><a title="instagram" target="_blank"
                                            href="https://www.instagram.com/hieuvo044/"><i
                                                class="zmdi zmdi-instagram"></i></a></li>
                                </ul>
                                <p class="text-muted">HCMC National University Dormitory Zone B</p>
                            </div>
                            <div class="col-4">
                                <small>Following</small>
                                <h5>852</h5>
                            </div>
                            <div class="col-4">
                                <small>Followers</small>
                                <h5>13k</h5>
                            </div>
                            <div class="col-4">
                                <small>Post</small>
                                <h5>234</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mcard_3">
                    <div class="body">
                        <a href="/admin/profile/4" class="profile"><img height="200px" width="200px"
                                src="https://scontent.fsgn2-4.fna.fbcdn.net/v/t1.0-1/p960x960/70006907_1395076867313695_3764400189104717824_o.jpg?_nc_cat=101&_nc_eui2=AeEhP8xa7834dhZ0ImZ5LMJ2JNnebNkEnW6TPo8gN5LCrYiQUWN6NnwRoKZVe8mIS4EcehXXYX_IH7mqFPsKab_9gU27puhdpFrAPUpMCRyuNw&_nc_oc=AQmbXN2fmb-XqR6cNVHnBGwX-XKd9aayl9Z89F6zXZARPzRu2V_edv_EWGlN2wd29JE&_nc_ht=scontent.fsgn2-4.fna&oh=72a6f6b37a1d896b4f371a810e2e7fca&oe=5E8B4375"
                                class="rounded-circle shadow " alt="profile-image"></a>
                        <h4 class="m-t-10">Nguyễn Văn Mạnh</h4>
                        <div class="row">
                            <div class="col-12">
                                <ul class="social-links list-unstyled">
                                    <li><a title="facebook" href="javascript:void(0);"><i
                                                class="zmdi zmdi-facebook"></i></a></li>
                                    <li><a title="twitter" href="javascript:void(0);"><i
                                                class="zmdi zmdi-twitter"></i></a></li>
                                    <li><a title="instagram" href="javascript:void(0);"><i
                                                class="zmdi zmdi-instagram"></i></a></li>
                                </ul>
                                <p class="text-muted">795 Folsom Ave, Suite 600 San Francisco, CADGE 94107</p>
                            </div>
                            <div class="col-4">
                                <small>Following</small>
                                <h5>852</h5>
                            </div>
                            <div class="col-4">
                                <small>Followers</small>
                                <h5>13k</h5>
                            </div>
                            <div class="col-4">
                                <small>Post</small>
                                <h5>234</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection