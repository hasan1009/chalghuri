<!DOCTYPE html>
<html lang="en" class="body-full-height">

<head>
    <!-- META SECTION -->
    <title>Chalghuri Echo-Tourism</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link rel="icon" href="favicon.ico" type="image/x-icon" />
    <!-- END META SECTION -->

    <!-- CSS INCLUDE -->
    <link rel="stylesheet" type="text/css" id="theme" href="{{ url('public/css/theme-default.css') }}" />
    <!-- EOF CSS INCLUDE -->
</head>

<body>

    <div class="login-container">

        <div class="login-box animated fadeInDown">

            {{-- <div class="login-logo"></div> --}}
            <img src="https://scontent.fjsr17-1.fna.fbcdn.net/v/t39.30808-6/469246963_568669569414739_7545359842987209728_n.jpg?_nc_cat=102&ccb=1-7&_nc_sid=6ee11a&_nc_ohc=Cjzbb9sKKakQ7kNvgFe20l8&_nc_zt=23&_nc_ht=scontent.fjsr17-1.fna&_nc_gid=A7c6DzyKefsWX-6p_R3V0xB&oh=00_AYAhuL7U9q-OZDz6fVHpEKnF789lJvWcnf10yZBbyyDRuw&oe=67721272"
                style="height: 120px; width:399px;" alt="chalghuri">
            <div class="login-body">
                <div class="login-title"><strong>Log In</strong> to your account</div>
                <form action="index.html" class="form-horizontal" method="post">
                    <div class="form-group">
                        <div class="col-md-12">
                            <input type="text" class="form-control" placeholder="E-mail" />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <input type="password" class="form-control" placeholder="Password" />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6">
                            <a href="#" class="btn btn-link btn-block">Forgot your password?</a>
                        </div>
                        <div class="col-md-6">
                            <button class="btn btn-info btn-block">Log In</button>
                        </div>
                    </div>
                    {{-- <div class="login-or">OR</div> --}}
                    {{-- <div class="form-group">
                        <div class="col-md-4">
                            <button class="btn btn-info btn-block btn-twitter"><span class="fa fa-twitter"></span>
                                Twitter</button>
                        </div>
                        <div class="col-md-4">
                            <button class="btn btn-info btn-block btn-facebook"><span class="fa fa-facebook"></span>
                                Facebook</button>
                        </div>
                        <div class="col-md-4">
                            <button class="btn btn-info btn-block btn-google"><span class="fa fa-google-plus"></span>
                                Google</button>
                        </div>
                    </div> --}}
                    {{-- <div class="login-subtitle">
                        Don't have an account yet? <a href="#">Create an account</a>
                    </div> --}}
                </form>
            </div>

        </div>

    </div>

</body>

</html>
