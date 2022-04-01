@section('js')

<script type="text/javascript">
$(document).ready(function() {
    $(".users").select2();
});
</script>
@stop

@extends('layouts.app')

@section('content')

<form action="{{ route('dataatlet.update', $data_atlet->id) }}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    {{ method_field('put') }}
    <div class="row">
        <div class="col-md-12 d-flex align-items-stretch grid-margin">
            <div class="row flex-grow">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Edit Anggota</h4>

                            <div class="form-group">
                                <div class="col-lg-11 col-md-6 col-sm-12 space-bottom">
                                    <label for="tgl_buka" class="col-md-4 control-label">Nama</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="nama"
                                            value="{{$data_atlet->nama}}"></br>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-11 col-md-6 col-sm-12 space-bottom">
                                    <label for="tgl_buka" class="col-md-4 control-label">Tanggal Registrasi</label>
                                    <div class="col-md-6">
                                        <input type="date" class="form-control" name="tgl_registrasi"
                                            value="{{$data_atlet->tgl_registrasi}}"></br>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-11 col-md-6 col-sm-12 space-bottom">
                                    <label for="tgl_buka" class="col-md-4 control-label">Tempat Lahir</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="tempat_lahir"
                                            value="{{$data_atlet->tempat_lahir}}"></br>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-11 col-md-6 col-sm-12 space-bottom">
                                    <label for="tgl_buka" class="col-md-4 control-label">Tanggal Lahir</label>
                                    <div class="col-md-6">
                                        <input type="date" class="form-control" name="tgl_lahir"
                                            value="{{$data_atlet->tgl_lahir}}"></br>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-11 col-md-6 col-sm-12 space-bottom">
                                    <label for="tgl_buka" class="col-md-4 control-label">Jenis Kelamin</label>
                                    <div class="col-md-6">
                                        <select class="form-control" name="jenis_kelamin" required="">
                                            value="{{$data_atlet->jenis_kelamin}}">
                                            <option value="L">Laki - Laki</option>
                                            <option value="P">Perempuan</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-11 col-md-6 col-sm-12 space-bottom">
                                    <label for="tgl_buka" class="col-md-4 control-label">Berat Badan</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="bb"
                                            value="{{$data_atlet->bb}}"></br>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-11 col-md-6 col-sm-12 space-bottom">
                                    <label for="tgl_buka" class="col-md-4 control-label">Tinggi Badan</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="tb"
                                            value="{{$data_atlet->tb}}"></br>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-11 col-md-6 col-sm-12 space-bottom">
                                    <label for="tgl_buka" class="col-md-4 control-label">No HP</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="no_hp"
                                            value="{{$data_atlet->no_hp}}"></br>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-11 col-md-6 col-sm-12 space-bottom">
                                    <label for="tgl_buka" class="col-md-4 control-label">Tingkat Sabuk</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="tingkat_sabuk"
                                            value="{{$data_atlet->tingkat_sabuk}}"></br>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-11 col-md-6 col-sm-12 space-bottom">
                                    <label for="tgl_buka" class="col-md-4 control-label">Kelas</label>
                                    <div class="col-md-6">
                                        <select class="form-control" name="kelas" required="">
                                            value="{{$data_atlet->kelas}}">
                                            <option value="reguler">Reguler</option>
                                            <option value="pomsae">pomsae</option>
                                            <option value="kyorugi">Kyorugi</option>
                                        </select>
                                    </div>


                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary" id="submit">
                                Ubah
                            </button>
                            <button type="reset" class="btn btn-danger">
                                Reset
                            </button>
                            <a href="{{route('anggota.index')}}" class="btn btn-light pull-right">Back</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</form>
@endsection