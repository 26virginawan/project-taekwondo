@section('js')

<script type="text/javascript">
$(document).ready(function() {
    $(".users").select2();
});
</script>
@stop

@extends('layouts.app')

@section('content')

<form method="POST" action="{{ route('dataukt.store') }}" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="row">
        <div class="col-md-12 d-flex align-items-stretch grid-margin">
            <div class="row flex-grow">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Tambah Data Ukt</h4>

                            <div class="form-group">
                                <label for="nama" class="col-md-4 control-label">Tanggal Dibuka</label>
                                <div class="col-md-6">
                                    <input type="date" class="form-control" name="tgl_buka">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="nama" class="col-md-4 control-label">Tanggal Ditutup</label>
                                <div class="col-md-6">
                                    <input type="date" class="form-control" name="tgl_tutup">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="nama" class="col-md-4 control-label">Status</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="status">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary" id="submit">
                                Submit
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