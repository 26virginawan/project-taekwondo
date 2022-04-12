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
                                <td><img src="{{ asset('storage/'.$data->foto) }}" height="400" width="200"></td>
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

                                @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection