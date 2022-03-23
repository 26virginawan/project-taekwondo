@section('js')
<script type="text/javascript">
$(document).ready(function() {
    $('#table').DataTable({
        "iDisplayLength": 50
    });

});
</script>
@stop
@extends('layouts.app')

@section('content')
<div class="row">

    <div class="col-lg-2">
        <a href="{{ route('dataprestasi.create') }}" class="btn btn-primary btn-rounded btn-fw"><i
                class="fa fa-plus"></i>
            Tambah Data Prestasi </a>
    </div>
    <div class="col-lg-12">
        @if (Session::has('message'))
        <div class="alert alert-{{ Session::get('message_type') }}" id="waktu2" style="margin-top:10px;">
            {{ Session::get('message') }}</div>
        @endif
    </div>
</div>
<div class="row" style="margin-top: 20px;">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">

            <div class="card-body">
                <h4 class="card-title">Daftar Prestasi</h4>

                <div class="table-responsive">
                    <table class="table table-striped" id="table">
                        <thead>
                            <tr>
                                <th>
                                    Foto
                                </th>
                                <th>
                                    Nama
                                </th>
                                <th>
                                    Nama Acara
                                </th>
                                <th>
                                    tanggal Acara
                                </th>
                                <th>
                                    lokasi
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data_prestasi as $data)
                            <tr>
                                <td class="py-1">
                                    <img src="{{asset('/storage/prestasi/'. $data->foto)}}" alt="image"
                                        style="margin-right: 10px;" />

                                </td>
                                <td>
                                    {{$data->nama}}
                                </td>
                                <td>
                                    {{$data->nama_acara}}
                                </td>
                                <td>
                                    {{$data->lokasi}}
                                </td>
                                <td>
                                    <a href="#" class="btn btn-primary ">Detail</a>
                                </td>

                                @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection