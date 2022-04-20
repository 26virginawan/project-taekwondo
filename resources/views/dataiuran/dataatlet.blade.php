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
        <a href="{{ route('dataatlet.create') }}" class="btn btn-primary btn-rounded btn-fw"><i class="fa fa-plus"></i>
            Tambah Atlet</a>
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
                <h4 class="card-title">Data Atlet</h4>

                <div class="table-responsive">
                    <table class="table table-striped" id="table">
                        <thead>
                            <tr>
                                <th>
                                    Nama
                                </th>
                                <th>
                                    tanggal registrasi
                                </th>
                                <!-- <th>
                                    TTL
                                </th>
                                <th>
                                    Jenis Kelamin
                                </th>
                                <th>
                                    BB
                                </th>
                                <th>
                                    TB
                                </th>
                                <th>
                                    No HP
                                </th> -->
                                <th>
                                    Tingkat Sabuk
                                </th>
                                <th>
                                    Kelas
                                </th>
                                <th>
                                    Opsi
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($atlet as $data)
                            <tr>
                                <td class="py-1">
                                    {{$data->name}}
                                </td>
                                <td>
                                    {{$data->tgl_registrasi}}
                                </td>
                                <!-- <td>{{$data->tempat_lahir}},&nbsp;{{$data->tgl_lahir}}</td>
                                <td>{{$data->jenis_kelamin}}</td>
                                <td>{{$data->bb}}</td>
                                <td>{{$data->tb}}</td>
                                <td>{{$data->no_hp}}</td> -->
                                <td>{{$data->tingkat_sabuk}}</td>
                                <td>{{$data->kelas}}</td>
                                <td>
                                    <div class="btn-group dropdown">
                                        <button type="button" class="btn btn-success dropdown-toggle btn-sm"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Action
                                        </button>
                                        <div class="dropdown-menu" x-placement="bottom-start"
                                            style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 30px, 0px);">
                                            <a class="dropdown-item" href="/dataiuran">
                                                Bayar SPP
                                            </a>
                                            <a class="dropdown-item" href="#"> Edit
                                            </a>
                                            <form action="#" class="pull-left" method="post">
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
                {{--  {!! $datas->links() !!} --}}
            </div>
        </div>
    </div>
</div>
@endsection