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
                                <label for="nama" class="col-md-4 control-label">Nama</label>
                                <div class="col-md-4">
                                    <select name="name" class="form-control">
                                        @foreach($data_name as $data)
                                        <option value="{{$data->name}}">{{$data->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="nama_acara" class="col-md-4 control-label">Nama Kejuaraan</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="nama_kejuaraan">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="nama" class="col-md-4 control-label">Tingkat</label>
                                <div class="col-md-6">
                                    <select class="form-control" name="tingkat" required="">
                                        <option value=""></option>
                                        <option value="internasional">Internasional</option>
                                        <option value="nasional">Nasional</option>
                                        <option value="provinsi">Procinsi</option>
                                        <option value="kabupaten">Kabupaten</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="nama" class="col-md-4 control-label">Kelas</label>
                                <div class="col-md-6">
                                    <select class="form-control" name="kelas" required="">
                                        <option value=""></option>
                                        <option value="pracadet">Pracadet</option>
                                        <option value="cadet">Cadet</option>
                                        <option value="junior">Junior</option>
                                        <option value="senior">Senior</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="nama" class="col-md-4 control-label">Kategori</label>
                                <div class="col-md-6">
                                    <select class="form-control" name="kategori" required="">
                                        <option value=""></option>
                                        <option value="prestasi">Prestasi</option>
                                        <option value="pemula">Pemula</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="nama" class="col-md-4 control-label">Perolehan</label>
                                <div class="col-md-6">
                                    <select class="form-control" name="perolehan" required="">
                                        <option value=""></option>
                                        <option value="emas">Emas</option>
                                        <option value="perak">Perak</option>
                                        <option value="perunggu">Perunggu</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="nama_acara" class="col-md-4 control-label">tgl_acara</label>
                                <div class="col-md-2">
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