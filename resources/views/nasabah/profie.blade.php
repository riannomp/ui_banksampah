@extends('layout.master')
@section('tittle', 'Profile')
@section('content')


    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Uplon</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Profile</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card-box">
                    <div class="row">
                        <div class="col-3">
                            <div class="form-group">
                                <div class="text-center">
                                    <div class="">
                                        <img src="{{ url('img/logo') }}/{{ $user->nasabah->foto }}"
                                            class="rounded-circle" alt="" style="width: 300px; height: 300px;">
                                    </div>
                                    <h3>{{ $user->nasabah->nama }}</h3>

                                    <h4>Rp {{ number_format($user->nasabah->saldo, 2, ',', '.') }}</h4>
                                </div>
                            </div>
                        </div>
                        <style>
                            .vl {
                                border-left: 2px solid green;
                                height: 400px;
                                margin-right: 30px;
                            }
                        </style>

                        <div class="vl"></div>
                        <div class="col-8">
                            <h3>Riwayat Setoran</h3>
                            <div class="card-box">
                                <table id="datatable" class="table table-bordered dt-responsive nowrap"
                                    style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>Kode Setoran</th>
                                            <th>Tanggal Setor</th>
                                            <th>Total Harga</th>
                                            <th>Aksi</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($setoran as $str)
                                            <tr>
                                                <td>{{ $str->id_setoran }}</td>
                                                <td>{{ date('d M Y', strtotime($str->tanggal)) }}</td>
                                                <td>Rp {{ number_format($str->total_harga), 2 }}</td>
                                                <td><a href="{{ url('admin/detail_setoran') }}/{{ $str->id_setoran }}"
                                                        class="btn btn-info waves-effect waves-light">
                                                        Detail</i></a>
                                                </td>
                                            </tr>
                                        @endforeach


                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8">

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">


            </div>
        </div>
        <!-- end row -->
        <div class="row">

        </div>

    </div> <!-- end container-fluid -->
@endsection
