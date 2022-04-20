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
                                <td>{{$data->tempat_lahir}},{{$data->tgl_lahir}}</td>
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

    <div class="col-xl-12">
        <!-- Account details card-->
        <div class="card mb-4">
            <div class="card-header">Account Details</div>
            <div class="card-body">
                @foreach($dataprofil as $data)
                <form>
                    <!-- Form Group (username)-->
                    <div class="mb-3">
                        <label class="small mb-1" for="inputUsername">Username</label>

                        <input type="text" class="form-control" name="name " value="{{$data->name}}" readonly>

                    </div>

                    <!-- Form Row-->
                    <div class="row gx-3 mb-3">
                        <!-- Form Group (first name)-->
                        <div class="col-md-6">
                            <label class="small mb-1" for="inputUsername">Tempat Lahir</label>

                            <input type="text" class="form-control" name="name " value="{{$data->tempat_lahir}}"
                                readonly>

                        </div>
                        <!-- Form Group (last name)-->
                        <div class="col-md-6">
                            <label class="small mb-1" for="inputUsername">Tanggal Lahir</label>

                            <input type="text" class="form-control" name="name " value="{{$data->tgl_lahir}}" readonly>

                        </div>
                    </div>
                    <!-- Form Row        -->
                    <div class="row gx-3 mb-3">
                        <!-- Form Group (organization name)-->
                        <div class="col-md-4">
                            <label class="small mb-1" for="inputOrgName">Jenis Kelamin</label>
                            <input type="text" class="form-control" name="name " value="{{$data->jenis_kelamin}}"
                                readonly>
                        </div>
                        <!-- Form Group (location)-->
                        <div class="col-md-4">
                            <label class="small mb-1" for="inputLocation">Berat Badan</label>
                            <input type="text" class="form-control" name="name " value="{{$data->bb}}" readonly>
                        </div>
                        <div class="col-md-4">
                            <label class="small mb-1" for="inputLocation">Tinggi Badan</label>
                            <input type="text" class="form-control" name="name " value="{{$data->tb}}" readonly>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="small mb-1" for="inputUsername">No HP</label>

                        <input type="text" class="form-control" name="name " value="{{$data->no_hp}}" readonly>

                    </div>
                    <div class="mb-3">
                        <label class="small mb-1" for="inputUsername">Tingkat Sabuk</label>

                        <input type="text" class="form-control" name="name " value="{{$data->tingkat_sabuk}}" readonly>

                    </div>
                    <div class="mb-3">
                        <label class="small mb-1" for="inputUsername">Kelas</label>

                        <input type="text" class="form-control" name="name " value="{{$data->kelas}}" readonly>

                    </div>

                    <!-- Save changes button-->
                    <button class="btn btn-primary" type="button">Save changes</button>
                </form>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endif
@endsection