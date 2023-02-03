<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Dastone - Admin & Dashboard Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="shortcut icon" href="{{ url('/images/favicon.ico') }}">
    <link href="{{ url('/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ url('/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ url('/css/app.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ url('/css/notify.min.css') }}" rel="stylesheet" type="text/css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Be Vietnam Pro', sans-serif;
        }
    </style>
</head>

<body class="account-body accountbg">
    <x:notify-messages />
    <div class="container">
        <div class="row vh-100 d-flex justify-content-center">
            <div class="col-12 align-self-center">
                <div class="row">
                    <div class="col-lg-5 mx-auto">
                        <div class="card">
                            <div class="card-body p-0 auth-header-box bg-white">
                                <div class="text-center p-3">
                                    <a href="index.html" class="logo logo-admin">
                                        <img src="{{ url('/images/kwm.jpg') }}" height="90" alt="logo" class="auth-logo">
                                    </a>
                                    <h4 class="mt-3 mb-1 fw-semibold text-white font-18">L O G I N</h4>
                                    <h3 class="text-muted mb-0">Selamat Datang di KWM</h3>
                                    <p class="text-muted mb-0">Silahkan masuk untuk melanjutkan</p>
                                </div>
                            </div>
                            <div class="card-body px-4">
                                <form class="form-horizontal auth-form" action="/login" method="POST">
                                    @csrf
                                    <div class="form-group mb-2">
                                        <label class="form-label" for="email">Email:</label>
                                        <div class="input-group">
                                            <input type="email" class="form-control" name="email" id="email" placeholder="Masukkan Email" required>
                                        </div>
                                    </div>
                                    <div class="form-group mb-2">
                                        <label class="form-label" for="userpassword">Password</label>
                                        <div class="input-group">
                                            <input type="password" class="form-control" name="password" id="userpassword" placeholder="Masukkan Password" required>
                                        </div>
                                    </div>
                                    <div class="form-group row my-3">
                                        <div class="col-sm-6">
                                            <div class="custom-control custom-switch switch-success">
                                                <input type="checkbox" class="custom-control-input" id="customSwitchSuccess">
                                                <label class="form-label text-muted" for="customSwitchSuccess">Ingat saya</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 text-end">
                                            <a href="auth-recover-pw.html" class="text-muted font-13"><i class="dripicons-lock"></i> Lupa password?</a>
                                        </div>
                                    </div>

                                    <div class="form-group mb-0 row">
                                        <div class="col-12">
                                            <input type="submit" value="Masuk" class="btn btn-dark w-100 waves-effect waves-light">
                                            <a href="" class=""></a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="card-body bg-light-alt text-center">
                                <span class="text-muted d-none d-sm-inline-block"> kwm © 2023</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery  -->
    <script src="{{ url('/js/jquery.min.js') }}"></script>
    <script src="{{ url('/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ url('/js/waves.js') }}"></script>
    <script src="{{ url('/js/feather.min.js') }}"></script>
    <script src="{{ url('/js/simplebar.min.js') }}"></script>
    @notifyJs

</body>

</html>