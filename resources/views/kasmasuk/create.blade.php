@section('js')

<script type="text/javascript">
$(document).ready(function() {
    $(".users").select2();
});
</script>
@stop

@extends('layouts.app')

@section('content')

<form method="POST" action="{{ route('kaskeluar.store') }}" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="row">
        <div class="col-md-12 d-flex align-items-stretch grid-margin">
            <div class="row flex-grow">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Tambah Kas Masuk</h4>
                            <div class="form-group">
                                <label for="nama" class="col-md-4 control-label">Tanggal</label>
                                <div class="col-md-3">
                                    <input type="date" class="form-control" name="tanggal">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="nama" class="col-md-4 control-label">Keterangan</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="keterangan">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="nama" class="col-md-4 control-label">Jumlah</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="jumlah">
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