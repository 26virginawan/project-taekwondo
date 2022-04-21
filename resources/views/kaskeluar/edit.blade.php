@section('js')

<script type="text/javascript">
$(document).ready(function() {
    $(".users").select2();
});
</script>
@stop

@extends('layouts.app')

@section('content')

<form action="{{ route('kaskeluar.update', $kas_keluar->id) }}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    {{ method_field('put') }}
    <div class="row">
        <div class="col-md-12 d-flex align-items-stretch grid-margin">
            <div class="row flex-grow">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Edit Kas Keluar</h4>

                            <div class="form-group">
                                <div class="col-lg-11 col-md-6 col-sm-12 space-bottom">
                                    <label for="tgl_buka" class="col-md-4 control-label">Tanggal</label>
                                    <div class="col-md-3">
                                        <input type="date" class="form-control" name="tanggal"
                                            value="{{$kas_keluar->tanggal}}"></br>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-11 col-md-6 col-sm-12 space-bottom">
                                    <label for="tgl_buka" class="col-md-4 control-label">Keterangan</label>
                                    <div class="col-md-2">
                                        <input type="date" class="form-control" name="keterangan"
                                            value="{{$kas_keluar->keterangan}}"></br>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-11 col-md-6 col-sm-12 space-bottom">
                                    <label for="tgl_buka" class="col-md-4 control-label">Jumlah</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="jumlah"
                                            value="{{$kas_keluar->jumlah}}"></br>
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