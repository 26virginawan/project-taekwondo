@section('js')

<script type="text/javascript">
$(document).ready(function() {
    $(".users").select2();
});
</script>
@stop

@extends('layouts.app')

@section('content')

<form method="POST" action="{{ route('dataatlet.store') }}" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="row">
        <div class="col-md-12 d-flex align-items-stretch grid-margin">
            <div class="row flex-grow">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Tambah Anggota baru</h4>
                            <div class="form-group">
                                <label for="email" class="col-md-4 control-label">Foto</label>
                                <div class="col-md-6">
                                    <img width="200" height="200" />
                                    <input type="file" class="uploads form-control" style="margin-top: 20px;"
                                        name="foto">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="nama" class="col-md-4 control-label">Nama</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="name">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="nama" class="col-md-4 control-label">Username</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="username">
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
                                <div class="col-md-2">
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
                                <div class="col-md-2">
                                    <input type="date" class="form-control" name="tgl_lahir">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="nama" class="col-md-4 control-label">jenis_kelamin</label>
                                <div class="col-md-6">
                                    <select class="form-control" name="jenis_kelamin" required="">
                                        <option value=""></option>
                                        <option value="Laki-Laki">Laki - Laki</option>
                                        <option value="Perempuan">Perempuan</option>
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
                                Submit
                            </button>
                            <button type="reset" class="btn btn-danger">
                                Reset
                            </button>
                            <a href="/dataatlet" class="btn btn-light pull-right">Back</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</form>
@endsection