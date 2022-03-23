<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Register Taekwondo</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{asset('vendors/iconfonts/mdi/css/materialdesignicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('vendors/iconfonts/puse-icons-feather/feather.css')}}">
    <link rel="stylesheet" href="{{asset('vendors/css/vendor.bundle.base.css')}}">
    <link rel="stylesheet" href="{{asset('vendors/css/vendor.bundle.addons.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <!-- endinject -->
    <link rel="shortcut icon" href="{{asset('favicon.ico')}}" />
</head>

<body>
    <form method="POST" action="{{ route('user.store') }}">
        {{ csrf_field() }}
        <div class="container-scroller">
            <div class="container-fluid page-body-wrapper full-page-wrapper auth-page">
                <div class="content-wrapper d-flex align-items-center auth theme-one">

                    <div class="row w-100">
                        <div class="col-md-12" style="margin-bottom: 20px;">
                            <h2 style="text-align: center;">Daftar Atlet Baru</h2>
                        </div>
                        <div class="col-lg-6 mx-auto">
                            <div class="auto-form-wrapper">

                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                    <label for="name" class="col-md-4 control-label">Name</label>
                                    <div class="col-md-10">
                                        <input id="name" type="text" class="form-control" name="name"
                                            value="{{ old('name') }}" required>
                                        @if ($errors->has('name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                                    <label for="username" class="col-md-4 control-label">Username</label>
                                    <div class="col-md-10">
                                        <input id="username" type="text" class="form-control" name="username"
                                            value="{{ old('username') }}" required>
                                        @if ($errors->has('username'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('username') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label for="email" class="col-md-4 control-label">E-Mail Address</label>
                                    <div class="col-md-10">
                                        <input id="email" type="email" class="form-control" name="email"
                                            value="{{ old('email') }}" required>
                                        @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="email" class="col-md-4 control-label">Gambar</label>
                                    <div class="col-md-10">
                                        <img class="product" width="200" height="200" />
                                        <input type="file" class="uploads form-control" style="margin-top: 20px;"
                                            name="gambar">
                                    </div>
                                </div>


                                <div class="form-group{{ $errors->has('level') ? ' has-error' : '' }}">
                                    <label for="level" class="col-md-4 control-label">Level</label>
                                    <div class="col-md-10">
                                        <select class="form-control" name="level" required="">
                                            <option value=""></option>
                                            <option value="admin">Admin</option>
                                            <option value="user">User</option>
                                        </select>
                                    </div>
                                </div>


                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                    <label for="password" class="col-md-4 control-label">Password</label>
                                    <div class="col-md-10">
                                        <input id="password" type="password" class="form-control" onkeyup='check();'
                                            name="password" required>
                                        @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="password-confirm" class="col-md-4 control-label">Confirm
                                        Password</label>
                                    <div class="col-md-10">
                                        <input id="confirm_password" type="password" onkeyup="check()"
                                            class="form-control" name="password_confirmation" required>
                                        <span id='message'></span>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary" id="submit">
                                    Register
                                </button>
                                <!-- <button type="reset" class="btn btn-danger">
                                    Reset
                                </button> -->

                                <div class="text-center">
                                    <p>sudah punya akun? </p><a class="medium" href="{{ url('/login')}}">Login</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- content-wrapper ends Herziwp@gmail.com -->
            </div>
            <!-- page-body-wrapper ends -->
        </div>
    </form>
    <script src="{{asset('vendors/js/vendor.bundle.base.js')}}"></script>
    <script src="{{asset('vendors/js/vendor.bundle.addons.js')}}"></script>
</body>

</html>