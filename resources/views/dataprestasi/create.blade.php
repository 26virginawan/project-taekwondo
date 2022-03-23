@section('js')

<script type="text/javascript">
$(document).ready(function() {
    $(".users").select2();
});
</script>

<script type="text/javascript">
function readURL() {
    var input = this;
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $(input).prev().attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}

$(function() {
    $(".uploads").change(readURL)
    $("#f").submit(function() {
        // do ajax submit or just classic form submit
        //  alert("fake subminting")
        return false
    })
})
</script>
@stop

@extends('layouts.app')

@section('content')
<form method="POST" action="{{ route('dataprestasi.store') }}" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="row">
        <div class="col-md-12 d-flex align-items-stretch grid-margin">
            <div class="row flex-grow">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Tambah Data Prestasi</h4>

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
                                    <input type="text" class="form-control" name="nama">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="nama_acara" class="col-md-4 control-label">Nama Acara</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="nama_acara">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="nama_acara" class="col-md-4 control-label">tgl_acara</label>
                                <div class="col-md-6">
                                    <input type="date" class="form-control" name="tgl_acara">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="lokasi" class="col-md-4 control-label">lokasi</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="lokasi">
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