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

    <form method="POST" action="{{ route('dataatlet.store') }}" enctype="multipart/form-data">
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

                                <div class="form-group">
                                    <label for="nama" class="col-md-4 control-label">Nama</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="name">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="nama" class="col-md-4 control-label">Email</label>
                                    <div class="col-md-6">
                                        <input type="email" class="form-control" name="email">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="nama" class="col-md-4 control-label">tgl_registrasi</label>
                                    <div class="col-md-6">
                                        <input type="date" class="form-control" name="tgl_registrasi">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="nama" class="col-md-4 control-label">tempat Lahir</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="tempat_lahir">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="nama" class="col-md-4 control-label">tanggal Lahir</label>
                                    <div class="col-md-6">
                                        <input type="date" class="form-control" name="tgl_lahir">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="nama" class="col-md-4 control-label">jenis_kelamin</label>
                                    <div class="col-md-6">
                                        <select class="form-control" name="jenis_kelamin" required="">
                                            <option value=""></option>
                                            <option value="L">Laki - Laki</option>
                                            <option value="P">Perempuan</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="nama" class="col-md-4 control-label">bb</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="bb">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="nama" class="col-md-4 control-label">tb</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="tb">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="nama" class="col-md-4 control-label">no_hp</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="no_hp">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="nama" class="col-md-4 control-label">jenis_sabuk</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="tingkat_sabuk">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="nama" class="col-md-4 control-label">kelas</label>
                                    <div class="col-md-6">
                                        <select class="form-control" name="kelas" required="">
                                            <option value=""></option>
                                            <option value="reguler">Reguler</option>
                                            <option value="pomsae">pomsae</option>
                                            <option value="kyorugi">Kyorugi</option>
                                        </select>
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