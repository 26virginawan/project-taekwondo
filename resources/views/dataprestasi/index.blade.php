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
    @if(Auth::user()->level == 'admin')
    <div class="col-lg-2">
        <a href="{{ route('dataprestasi.create') }}" class="btn btn-primary btn-rounded btn-fw"><i
                class="fa fa-plus"></i>
            Tambah Data Prestasi </a>
    </div>
    @endif
    <div class="col-lg-12">
        @if (Session::has('message'))
        <div class="alert alert-{{ Session::get('message_type') }}" id="waktu2" style="margin-top:10px;">
            {{ Session::get('message') }}</div>
        @endif
    </div>
</div>
<div class="row" style="margin-top: 20px;">
    <div class="col-lg-12 grid-margin stretch-card">
        @if(Auth::user()->level == 'admin')
        <div class="card">

            <div class="card-body">
                <h4 class="card-title">Daftar Prestasi</h4>

                <div class="table-responsive">
                    <table class="table table-striped" id="table">
                        <thead>
                            <tr>
                                <th>
                                    Nama
                                </th>
                                <th>
                                    Nama Kejuaraan
                                </th>
                                <th>
                                    Tingkat
                                </th>
                                <th>
                                    Kelas
                                </th>
                                <th>
                                    Kategori
                                </th>
                                <th>
                                    Perolehan
                                </th>
                                <th>
                                    Tanggal_acara
                                </th>
                                <th>
                                    Lokasi
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data_prestasi as $data)
                            <tr>
                                <td>
                                    {{$data->name}}
                                </td>
                                <td>
                                    {{$data->nama_kejuaraan}}
                                </td>
                                <td>
                                    {{$data->tingkat}}
                                </td>
                                <td>
                                    {{$data->kelas}}
                                </td>
                                <td>
                                    {{$data->kategori}}
                                </td>
                                <td>
                                    {{$data->perolehan}}
                                </td>
                                <td>
                                    {{$data->tgl_acara}}
                                </td>
                                <td>
                                    {{$data->lokasi}}
                                </td>
                                @if(Auth::user()->level == 'admin')
                                <td>
                                    <div class="btn-group dropdown">
                                        <button type="button" class="btn btn-success dropdown-toggle btn-sm"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Action
                                        </button>
                                        <div class="dropdown-menu" x-placement="bottom-start"
                                            style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 30px, 0px);">
                                            <a class="dropdown-item" href="{{route('dataprestasi.edit', $data->id)}}">
                                                Edit
                                            </a>
                                            <form action="{{ route('dataprestasi.destroy', $data->id) }}"
                                                class="pull-left" method="post">
                                                {{ csrf_field() }}
                                                {{ method_field('delete') }}
                                                <button class="dropdown-item"
                                                    onclick="return confirm('Anda yakin ingin menghapus data ini?')">
                                                    Delete
                                                </button>
                                            </form>

                                        </div>
                                    </div>
                                </td>
                                @endif
                                @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
        @endif
        @if(Auth::user()->level == 'user')

        <div class="card">

            <div class="card-body">
                <h4 class="card-title">Daftar Prestasi {{Auth::user()->name}}</h4>

                <div class="table-responsive">
                    <table class="table table-striped" id="table">
                        <thead>
                            <tr>
                                <th>
                                    Nama
                                </th>
                                <th>
                                    Nama Kejuaraan
                                </th>
                                <th>
                                    Tingkat
                                </th>
                                <th>
                                    Kelas
                                </th>
                                <th>
                                    Kategori
                                </th>
                                <th>
                                    Perolehan
                                </th>
                                <th>
                                    Tanggal_acara
                                </th>
                                <th>
                                    Lokasi
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($dataprofil as $data)
                            <tr>
                                <td>
                                    {{$data->name}}
                                </td>
                                <td>
                                    {{$data->nama_kejuaraan}}
                                </td>
                                <td>
                                    {{$data->tingkat}}
                                </td>
                                <td>
                                    {{$data->kelas}}
                                </td>
                                <td>
                                    {{$data->kategori}}
                                </td>
                                <td>
                                    {{$data->perolehan}}
                                </td>
                                <td>
                                    {{$data->tgl_acara}}
                                </td>
                                <td>
                                    {{$data->lokasi}}
                                </td>
                                @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
        @endif
    </div>
</div>
@endsection