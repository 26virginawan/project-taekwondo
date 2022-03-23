@section('js')

<script type="text/javascript">
$(document).ready(function() {
    $(".users").select2();
});
</script>
@stop

@extends('layouts.app')

@section('content')

<form action="{{ route('dataukt.update', $data_ukt->id) }}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    {{ method_field('put') }}
    <div class="row">
        <div class="col-md-12 d-flex align-items-stretch grid-margin">
            <div class="row flex-grow">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Edit Data Ukt</h4>
                            <div class="form-group">
                                <div class="col-lg-11 col-md-6 col-sm-12 space-bottom">
                                    <label for="tgl_buka" class="col-md-4 control-label">Tanggal Dibuka</label>
                                    <div class="col-md-6">
                                        <input type="date" class="form-control" name="tgl_buka"
                                            value="{{$data_ukt->tgl_buka}}"></br>
                                    </div>


                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-11 col-md-6 col-sm-12 space-bottom">
                                    <label for="tgl_buka" class="col-md-4 control-label">Tanggal Ditutup</label>
                                    <div class="col-md-6">
                                        <input type="date" class="form-control" name="tgl_tutup"
                                            value="{{$data_ukt->tgl_tutup}}"></br>
                                    </div>


                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-11 col-md-6 col-sm-12 space-bottom">
                                    <label for="tgl_buka" class="col-md-4 control-label">Status</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="status"
                                            value="{{$data_ukt->status}}"></br>
                                    </div>


                                </div>
                            </div>


                            <!-- <div class="form-group{{ $errors->has('tgl_buka') ? ' has-error' : '' }}">

                                <input id="tgl_buka" type="date" class="form-control" name="tgl_buka"
                                    value="{{ $data_ukt->tgl_buka }}" required>
                                @if ($errors->has('tgl_buka'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('tgl_buka') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('tgl_tutup') ? ' has-error' : '' }}">
                            <label for="tgl_tutup" class="col-md-4 control-label">Tanggal Ditutup</label>
                            <div class="col-md-6">
                                <input id="tgl_tutup" type="date" class="form-control" name="tgl_tutup"
                                    value="{{ $data_ukt->tgl_tutup }}" required>
                                @if ($errors->has('tgl_tutup'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('tgl_tutup') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
                            <label for="status" class="col-md-4 control-label">Status</label>
                            <div class="col-md-6">
                                <input id="status" type="text" class="form-control" name="status"
                                    value="{{ $data_ukt->status }}" required>
                                @if ($errors->has('status'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('status') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div> -->
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