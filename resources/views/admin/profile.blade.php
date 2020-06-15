@extends('admin.template.admin_template')
@section('head')
<link rel="stylesheet" href="{{asset('assets/admin/plugins/light-gallery/css/lightgallery.css')}}">
<link rel="stylesheet" href="{{asset('assets/admin/plugins/fullcalendar/fullcalendar.min.css')}}">
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('content')
<div class="container-fluid">
    <div class="row clearfix">
        <div class="col-lg-4 col-md-12">
            <div class="card mcard_3">
                <div class="body">
                    <a href="#"><img height="200px" width="200px" src={{$user['img_link']}} class="rounded-circle shadow " alt="profile-image"></a>
                    <h4 class="m-t-10">{{$user['name']}}</h4>                            
                    <div class="row">
                        <div class="col-12">
                            <ul class="social-links list-unstyled">
                                <li><a title="facebook" target="_blank" href={{$user['face_link']}}><i class="zmdi zmdi-facebook"></i></a></li>
                                <li><a title="twitter" target="_blank" href={{$user['tw_link']}}><i class="zmdi zmdi-twitter"></i></a></li>
                                <li><a title="instagram" target="_blank" href={{$user['ins_link']}}><i class="zmdi zmdi-instagram"></i></a></li>
                            </ul>
                            <a target="_blank" href="https://www.google.com/search?q=ktx%20khu%20b%20%C4%91hqg%20tphcm&oq=kt&aqs=chrome.0.69i59j0j69i57j69i60l3.1378j0j7&sourceid=chrome&ie=UTF-8&npsic=0&rflfq=1&rlha=0&rllag=10880423,106794466,1422&tbm=lcl&rldimm=7618501043519491695&ved=2ahUKEwjM4NDRwfDlAhUo-2EKHWXyDEkQvS4wAHoECAsQCA&rldoc=1&tbs=lrf:!3sIAE,lf:1,lf_ui:3&rlst=f#rldoc=1"><p class="text-muted">HCMC National University Dormitory Zone B</p></a>
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
            <div class="card">
                <div class="body">
                    <small class="text-muted">Email address: </small>
                    <p>{{$user['email']}}</p>
                    <hr>
                    <small class="text-muted">Phone: </small>
                    <p>{{$user['phone']}}</p>
                    <hr>
                    <ul class="list-unstyled">
                        @php
                            $color=array('l-blue','l-green','l-amber','l-blush','l-blue');
                        @endphp
                        @for ($i = 0; $i < count($user['skill']); $i++)
                              <li>
                                <div>{{$user['skill'][$i]['name']}}</div>
                                <div class="progress m-b-20">
                                    <div class="progress-bar {{$color[$i]}} " role="progressbar" aria-valuenow="{{$user['skill'][$i]['value']}}" aria-valuemin="0" aria-valuemax="100" style="width: {{$user['skill'][$i]['value']}}%"> <span class="sr-only">{{$user['skill'][$i]['value']}}% Complete</span> </div>
                                </div>
                            </li>
                        @endfor
                    </ul>
                    <span>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</span>
                </div>
            </div>                    
        </div>
        <div class="col-lg-8 col-md-12">
            <div class="card">
                <div class="body">
                    <div id="calendar"></div>
                </div>
            </div>
            <div class="card">
                <div class="header">
                    <h2><strong>Media</strong> Gallery</h2>
                </div>
                <div class="body">
                    <p>All pictures taken from <a href="https://pexels.com/" target="_blank">pexels.com</a></p>
                    <div id="aniimated-thumbnials" class="list-unstyled row clearfix">
                        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 m-b-30"> <a href="{{asset('assets/admin/images/image-gallery/1.jpg')}}"> <img class="img-fluid img-thumbnail" src="{{asset('assets/admin/images/image-gallery/1.jpg')}}" alt=""> </a> </div>
                        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 m-b-30"> <a href="{{asset('assets/admin/images/image-gallery/2.jpg')}}" > <img class="img-fluid img-thumbnail" src="{{asset('assets/admin/images/image-gallery/2.jpg')}}" alt=""> </a> </div>
                        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 m-b-30"> <a href="{{asset('assets/admin/images/image-gallery/3.jpg')}}" > <img class="img-fluid img-thumbnail" src="{{asset('assets/admin/images/image-gallery/3.jpg')}}" alt=""> </a> </div>
                        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 m-b-30"> <a href="{{asset('assets/admin/images/image-gallery/4.jpg')}}" > <img class="img-fluid img-thumbnail" src="{{asset('assets/admin/images/image-gallery/4.jpg')}}" alt=""> </a> </div>
                        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 m-b-30"> <a href="{{asset('assets/admin/images/image-gallery/5.jpg')}}" > <img class="img-fluid img-thumbnail" src="{{asset('assets/admin/images/image-gallery/5.jpg')}}" alt=""> </a> </div>
                        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 m-b-30"> <a href="{{asset('assets/admin/images/image-gallery/6.jpg')}}" > <img class="img-fluid img-thumbnail" src="{{asset('assets/admin/images/image-gallery/6.jpg')}}" alt=""> </a> </div>
                        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 m-b-30"> <a href="{{asset('assets/admin/images/image-gallery/7.jpg')}}" > <img class="img-fluid img-thumbnail" src="{{asset('assets/admin/images/image-gallery/7.jpg')}}" alt=""> </a> </div>
                        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 m-b-30"> <a href="{{asset('assets/admin/images/image-gallery/8.jpg')}}" > <img class="img-fluid img-thumbnail" src="{{asset('assets/admin/images/image-gallery/8.jpg')}}" alt=""> </a> </div>                                
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('bot')
<script src="{{asset('assets/admin/plugins/light-gallery/js/lightgallery-all.min.js')}}"></script>
<script src="{{asset('assets/admin/bundles/fullcalendarscripts.bundle.js')}}"></script>
<script src="{{asset('assets/admin/bundles/mainscripts.bundle.js')}}"></script>
<script src="{{asset('assets/admin/js/pages/medias/image-gallery.js')}}"></script>
<script src="{{asset('assets/admin/js/pages/calendar/calendar.js')}}"></script>
@endsection

