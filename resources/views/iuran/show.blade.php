@section('js')

<script type="text/javascript">
$(document).ready(function() {
    $(".users").select2();
});
</script>
@stop

@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-md-12 d-flex align-items-stretch grid-margin">
        <div class="row flex-grow">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Detail <b>{{$data_atlet->nama}}</b></h4>
                        <form class="forms-sample">


                            <div class="form-group">
                                <label for="nama" class="col-md-4 control-label">Nama</label>
                                <div class="col-md-6">
                                    <input id="nama" type="text" class="form-control" name="name"
                                        value="{{ $data_atlet->name }}" readonly>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="tgl_registrasi" class="col-md-4 control-label">Tanggal Registrasi</label>
                                <div class="col-md-6">
                                    <input id="tgl_registrasi" type="text" class="form-control" name="tgl_regsitrasi"
                                        value="{{ $data_atlet->tgl_registrasi }}" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="tempat_lahir" class="col-md-4 control-label">Tempat Lahir</label>
                                <div class="col-md-6">
                                    <input id="tempat_lahir" type="text" class="form-control" name="tempat_lahir"
                                        value="{{ $data_atlet->tempat_lahir }}" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="tgl_lahir" class="col-md-4 control-label">Tanggal Lahir</label>
                                <div class="col-md-6">
                                    <input id="tgl_lahir" type="text" class="form-control" name="tgl_lahir"
                                        value="{{ $data_atlet->tgl_lahir }}" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="jenis_kelamin" class="col-md-4 control-label">Jenis Kelamin</label>
                                <div class="col-md-6">
                                    <select class="form-control" name="jenis_kelamin" required="" disabled="">
                                        value="{{$data_atlet->jenis_kelamin}}">
                                        <option value="L">Laki - Laki</option>
                                        <option value="P">Perempuan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="bb" class="col-md-4 control-label">Berat Badan</label>
                                <div class="col-md-6">
                                    <input id="bb" type="text" class="form-control" name="bb"
                                        value="{{ $data_atlet->bb }}" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="tb" class="col-md-4 control-label">Tinggi Badan</label>
                                <div class="col-md-6">
                                    <input id="tb" type="text" class="form-control" name="tb"
                                        value="{{ $data_atlet->tb }}" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="no_hp" class="col-md-4 control-label">No HP</label>
                                <div class="col-md-6">
                                    <input id="no_hp" type="text" class="form-control" name="no_hp"
                                        value="{{ $data_atlet->no_hp }}" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="tingkat_sabuk" class="col-md-4 control-label">Tingkat Sabuk</label>
                                <div class="col-md-6">
                                    <input id="tingkat_sabuk" type="text" class="form-control" name="tingkat_sabuk"
                                        value="{{ $data_atlet->tingkat_sabuk }}" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="tingkat_sabuk" class="col-md-4 control-label">Tingkat Sabuk</label>
                                <div class="col-md-6">
                                    <select class="form-control" name="jenis_kelamin" required="" readonly>
                                        value="{{$data_atlet->tingkat_sabuk}}">
                                        <option value="reguler">Reguler</option>
                                        <option value="pomsae">pomsae</option>
                                        <option value="kyorugi">Kyurugi</option>
                                    </select>
                                </div>
                            </div>
                            <a href="/iuran" class="btn btn-light pull-right">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</div>
@endsection