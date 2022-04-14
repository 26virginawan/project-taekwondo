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
                                    <label for="tgl_buka" class="col-md-4 control-label">Nama</label>
                                    <div class="col-md-4">
                                        <select class="form-control" name="name" required="" readonly>
                                            value="{{$data_prestasi->name}}">
                                            <option value="{{$data_prestasi->name}}">{{$data_prestasi->name}}</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-11 col-md-6 col-sm-12 space-bottom">
                                    <label for="tgl_buka" class="col-md-4 control-label">Nama Kejuaraan</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="nama_kejuaraan"
                                            value="{{$data_prestasi->nama_kejuaraan}}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-11 col-md-6 col-sm-12 space-bottom">
                                    <label for="tgl_buka" class="col-md-4 control-label">Tingkat</label>
                                    <div class="col-md-6">
                                        <select class="form-control" name="tingkat" required="">
                                            value="{{$data_prestasi->tingkat}}">
                                            <option value="internasional">Internasional</option>
                                            <option value="nasional">Nasional</option>
                                            <option value="provinsi">Procinsi</option>
                                            <option value="kabupaten">Kabupaten</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-11 col-md-6 col-sm-12 space-bottom">
                                    <label for="tgl_buka" class="col-md-4 control-label">Kelas</label>
                                    <div class="col-md-6">
                                        <select class="form-control" name="kelas" required="">
                                            value="{{$data_prestasi->kelas}}">
                                            <option value="pracadet">Pracadet</option>
                                            <option value="cadet">Cadet</option>
                                            <option value="junior">Junior</option>
                                            <option value="senior">Senior</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-11 col-md-6 col-sm-12 space-bottom">
                                    <label for="tgl_buka" class="col-md-4 control-label">Kategori</label>
                                    <div class="col-md-6">
                                        <select class="form-control" name="kategori" required="">
                                            value="{{$data_prestasi->kategori}}">
                                            <option value="prestasi">Prestasi</option>
                                            <option value="pemula">Pemula</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-11 col-md-6 col-sm-12 space-bottom">
                                    <label for="tgl_buka" class="col-md-4 control-label">Perolehan</label>
                                    <div class="col-md-6">
                                        <select class="form-control" name="perolehan" required="">
                                            value="{{$data_prestasi->perolehan}}">
                                            <option value="emas">Emas</option>
                                            <option value="perak">Perak</option>
                                            <option value="perunggu">Perunggu</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-11 col-md-6 col-sm-12 space-bottom">
                                    <label for="tgl_buka" class="col-md-4 control-label">Tanggal Acara</label>
                                    <div class="col-md-2">
                                        <input type="date" class="form-control" name="tgl_acara"
                                            value="{{$data_prestasi->tgl_acara}}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-11 col-md-6 col-sm-12 space-bottom">
                                    <label for="tgl_buka" class="col-md-4 control-label">Lokasi</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="lokasi"
                                            value="{{$data_prestasi->lokasi}}">
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