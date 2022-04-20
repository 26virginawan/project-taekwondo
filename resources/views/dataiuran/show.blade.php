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

                        <form class="forms-sample">

                            <div class="form-group">
                                <label for="jenis_kelamin" class="col-md-4 control-label">Bulan</label>
                                <div class="col-md-6">
                                    <select class="form-control" name="bulan" required="" readonly>
                                        value="{{$data_iuran->jenis_kelamin}}">
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="nama" class="col-md-4 control-label">tgl_bayar</label>
                                <div class="col-md-3">
                                    <input id="nama" type="date" class="form-control" name="tgl_bayar"
                                        value="{{ $data_iuran->tgl_bayar }}" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="nama" class="col-md-4 control-label">keterangan</label>
                                <div class="col-md-3">
                                    <input id="nama" type="text" class="form-control" name="keterangan"
                                        value="{{ $data_iuran->keterangan }}" readonly>
                                </div>
                            </div>
                            <a href="/dataiuran" class="btn btn-light pull-right">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</div>
@endsection