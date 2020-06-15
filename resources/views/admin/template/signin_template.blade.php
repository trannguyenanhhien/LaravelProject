<!doctype html>
<html class="no-js " lang="en">


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="description" content="Responsive Bootstrap 4 and web Application ui kit.">

    <title>:: Aero Bootstrap4 Admin :: Sign In</title>
    <!-- Favicon-->
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <!-- Custom Css -->
    <link rel="stylesheet" href="{{asset('assets/admin/plugins/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/admin/css/style.min.css')}}">
</head>

<body class="theme-blush">

    <div class="authentication">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-sm-12">
                    <div class="card">
                        <img src="{{asset('assets/admin/images/signin.svg')}}" alt="Sign In" />
                    </div>
                </div>
                <div class="col-lg-4 col-sm-12">
                    <form class="card auth_form" action="/signin" method="post">
                        {{csrf_field()}}
                        <div class="header">
                            <img class="logo" src="{{asset('assets/admin/images/logo.svg')}}" alt="">
                            <h5>Log in</h5>
                        </div>
                        <div class="body">
                            <div class="input-group mb-3">
                                <input type="email" class="form-control" placeholder="Username" name="email">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="zmdi zmdi-account-circle"></i></span>
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <input type="password" class="form-control" placeholder="Password" name="password">
                                <div class="input-group-append">
                                    <span class="input-group-text"><a href="forgot-password.html" class="forgot"
                                            title="Forgot Password"><i class="zmdi zmdi-lock"></i></a></span>
                                </div>
                            </div>
                            <div class="checkbox">
                                <input id="remember_me" type="checkbox">
                                <label for="remember_me">Remember Me</label>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block waves-effect waves-light dn">SIGN
                                IN</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery Core Js -->
    <script src="{{asset('assets/admin/bundles/libscripts.bundle.js')}}"></script>
    <script src="{{asset('assets/admin/bundles/vendorscripts.bundle.js')}}"></script> <!-- Lib Scripts Plugin Js -->
    <script src="{{asset('https://cdn.jsdelivr.net/npm/sweetalert2@8')}}"></script>
    <!-- Success or fail -->
    <script type="text/javascript">
        $(document).ready(function () {
           
           @if(Session:: has('fail'))
           Swal.fire({
                type: 'error',
                title: '{{ Session:: get('fail') }}',
                showConfirmButton: false,
                text: 'Đăng nhập thất bại',
            });
           @endif

        });
     </script>  
</body>


</html>