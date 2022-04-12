@section('js')

<script type="text/javascript">
$(document).ready(function() {
    $(".users").select2();
});
</script>
@stop

@extends('layouts.app')

@section('content')

<form action="{{ route('dataprestasi.update', $data_prestasi->id) }}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    {{ method_field('put') }}
    <div class="row">
        <div class="col-md-12 d-flex align-items-stretch grid-margin">
            <div class="row flex-grow">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Edit Data Prestasi</h4>
                            <div class="form-group">
                                <div class="col-lg-11 col-md-6 col-sm-12 space-bottom">
                                    <label for="tgl_buka" class="col-md-4 control-label">Foto</label>
                                    <div class="col-md-6">
                                        <input type="file" name="image" class="form-control">
                                        <small>kosongkan jika tidak mengubah gambar</small>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-11 col-md-6 col-sm-12 space-bottom">
                                    <label for="tgl_buka" class="col-md-4 control-label">Nama</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="nama"
                                            value="{{$data_prestasi->nama}}"></br>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-11 col-md-6 col-sm-12 space-bottom">
                                    <label for="tgl_buka" class="col-md-4 control-label">Nama Acara</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="nama_acara"
                                            value="{{$data_prestasi->nama_acara}}"></br>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-11 col-md-6 col-sm-12 space-bottom">
                                    <label for="tgl_buka" class="col-md-4 control-label">Tanggal Acara</label>
                                    <div class="col-md-2">
                                        <input type="date" class="form-control" name="tgl_acara"
                                            value="{{$data_prestasi->tgl_acara}}"></br>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-11 col-md-6 col-sm-12 space-bottom">
                                    <label for="tgl_buka" class="col-md-4 control-label">Lokasi</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="lokasi"
                                            value="{{$data_prestasi->lokasi}}"></br>
                                    </div>
                                </div>
                            </div>


                            <button type="submit" class="btn btn-primary" id="submit">
                                Ubah
                            </button>
                            <button type="reset" class="btn btn-danger">
                                Reset
                            </button>
                            <a href="/dataukt" class="btn btn-light pull-right">Back</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</form>
@endsection