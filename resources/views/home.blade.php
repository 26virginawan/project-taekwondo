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
@if(Auth::user()->level == 'admin')
<div class="row">
    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 grid-margin stretch-card">
        <div class="card card-statistics">
            <div class="card-body">
                <div class="clearfix">
                    <div class="float-left">
                        <i class="mdi mdi-poll-box text-danger icon-lg"></i>
                    </div>
                    <div class="float-right">
                        <p class="mb-0 text-right">Atlet Pomsae</p>
                        <div class="fluid-container">
                            <h3 class="font-weight-medium text-right mb-0">
                                {{$data_atlet->where('kelas', 'pomsae')->count()}}</h3>
                            </h3>
                        </div>
                    </div>
                </div>
                <p class="text-muted mt-3 mb-0">
                    <i class="mdi mdi-alert-octagon mr-1" aria-hidden="true"></i> Total Atlet Pomsae
                </p>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 grid-margin stretch-card">
        <div class="card card-statistics">
            <div class="card-body">
                <div class="clearfix">
                    <div class="float-left">
                        <i class="mdi mdi-receipt text-warning icon-lg"></i>
                    </div>
                    <div class="float-right">
                        <p class="mb-0 text-right">Atlet Kyorugi</p>
                        <div class="fluid-container">
                            <h3 class="font-weight-medium text-right mb-0">
                                {{$data_atlet->where('kelas', 'kyorugi')->count()}}</h3>
                        </div>
                    </div>
                </div>
                <p class="text-muted mt-3 mb-0">
                    <i class="mdi mdi-calendar mr-1" aria-hidden="true"></i> Total Atlet Kyorugi
                </p>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 grid-margin stretch-card">
        <div class="card card-statistics">
            <div class="card-body">
                <div class="clearfix">
                    <div class="float-left">
                        <i class="mdi mdi-book text-success icon-lg" style="width: 40px;height: 40px;"></i>
                    </div>
                    <div class="float-right">
                        <p class="mb-0 text-right">Atlet reguler</p>
                        <div class="fluid-container">
                            <h3 class="font-weight-medium text-right mb-0">
                                {{$data_atlet->where('kelas', 'reguler')->count()}}</h3>
                            </h3>
                        </div>
                    </div>
                </div>
                <p class="text-muted mt-3 mb-0">
                    <i class="mdi mdi-book mr-1" aria-hidden="true"></i> Total Atlet reguler
                </p>
            </div>
        </div>
    </div>
</div>
<div class="row">
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
                                    Tanggal Registrasi
                                </th>
                                <th>
                                    TTL
                                </th>
                                <th>
                                    JK
                                </th>
                                <th>
                                    BB
                                </th>
                                <th>
                                    TB
                                </th>
                                <th>
                                    No HP
                                </th>
                                <th>
                                    Tingkat Sabuk
                                </th>
                                <th>
                                    Kelas
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data_atlet as $data)
                            <tr>
                                <td class="py-1">

                                    {{$data->name}}
                                </td>
                                <td>
                                    {{$data->tgl_registrasi}}
                                </td>
                                <td>{{$data->tempat_lahir}}, {{$data->tgl_lahir}}</td>
                                <td>{{$data->jenis_kelamin}}</td>
                                <td>{{$data->bb}}</td>
                                <td>{{$data->tb}}</td>
                                <td>{{$data->no_hp}}</td>
                                <td>{{$data->tingkat_sabuk}}</td>
                                <td>{{$data->kelas}}</td>
                                @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
@if(Auth::user()->level == 'user')

<div class="row">
    @foreach($dataprofil as $data)
    <div class="col-xl-4">
        <!-- Profile picture card-->
        <div class="card mb-4 mb-xl-0">
            <div class="card-header">foto Profil</div>
            <div class="card-body text-center">
                <!-- Profile picture image-->
                <img class="img-account-profile rounded-circle mb-2" src="{{ asset('storage/'.$data->foto) }}" alt=""
                    style="width: 200px;">
                <h4 class="font-weight-bold">{{$data->name}}</h4>
                <h5>- {{$data->kelas}} -</h5>
            </div>
        </div>
    </div>

    <div class="col-xl-8">
        <!-- Account details card-->
        <div class="card mb-4">
            <div class="card-header">Profil Saya</div>
            <div class="card-body">


                <!-- Form Group (username)-->
                <div class="mb-3">
                    <label class="medium mb-1 font-weight-bold" for="inputUsername">Name</label>

                    <p>{{$data->name}}</p>
                </div>

                <!-- Form Row-->
                <div class="mb-3">
                    <!-- Form Group (first name)-->

                    <label class="medium mb-1 font-weight-bold" for="inputUsername">Tempat Lahir</label>

                    <p>{{$data->tempat_lahir}}</p>

                    <!-- Form Group (last name)-->

                </div>
                <div class="mb-3">

                    <label class="medium mb-1 font-weight-bold" for="inputUsername">Tanggal Lahir</label>

                    <p>{{$data->tgl_lahir}}</p>

                </div>
                <!-- Form Row        -->
                <div class="row gx-3 mb-3">
                    <!-- Form Group (organization name)-->
                    <div class="col-md-4">
                        <label class="medium mb-1 font-weight-bold" for="inputUsername">Jenis Kelamin</label>

                        <p>{{$data->jenis_kelamin}}</p>
                    </div>
                    <!-- Form Group (location)-->
                    <div class="col-md-4">
                        <label class="medium mb-1 font-weight-bold" for="inputUsername">Berat Badan</label>

                        <p>{{$data->bb}}</p>
                    </div>
                    <div class="col-md-4">
                        <label class="medium mb-1 font-weight-bold" for="inputUsername">Tinggi Badan</label>

                        <p>{{$data->tb}}</p>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="medium mb-1 font-weight-bold" for="inputUsername">No HP</label>

                    <p>{{$data->no_hp}}</p>

                </div>
                <div class="mb-3">
                    <label class="medium mb-1 font-weight-bold" for="inputUsername">Tingkat Sabuk</label>

                    <p>{{$data->tingkat_sabuk}}</p>
                </div>
                <div class="mb-3">
                    <label class="medium mb-1 font-weight-bold" for="inputUsername">Kelas</label>

                    <p>{{$data->kelas}}</p>
                </div>
                <div class="col-lg-2">
                    <a href="{{route('dataatlet.edit', $data->id)}}" class="btn btn-primary btn-rounded btn-fw"><i
                            class="fa fa-plus"></i>
                        Edit </a>
                </div>
                <div class="col-lg-2">
                    <a href="cetaknama" class="btn btn-primary btn-rounded btn-fw"><i class="fa fa-plus"></i>
                        Cetak Kartu </a>
                </div>

            </div>
        </div>
    </div>
    @endforeach
</div>
@endif
@endsection