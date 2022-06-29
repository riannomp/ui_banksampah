@extends('layout.master')
@section('tittle', 'Data Nasabah')
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
                    <h4 class="page-title">Data Nasabah</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="row">
            <div class="col-12">

                <div class="card-box">
                    <p>
                        <a href="{{ route('koor.addNasabah') }}" class="btn btn-success waves-effect waves-light" >
                            <span class="btn-label"><i class="mdi mdi-plus"></i>
                        </span> Tambah Data</a>
                    </p>

                    <table id="datatable" class="table table-bordered dt-responsive nowrap"
                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th>Nama Nasabah</th>
                                <th>NIK</th>
                                <th>Alamat</th>
                                <th>No Telp</th>
                                <th>Saldo</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($nasabah as $nasabahs)
                            <tr>
                                <td>{{ $nasabahs->nama }}</td>
                                <td>{{ $nasabahs->nik }}</td>
                                <td>{{ $nasabahs->alamat }}</td>
                                <td>{{ $nasabahs->no_hp }}</td>
                                <td>{{ $nasabahs->saldo }}</td>
                                <td><a href="" class="btn btn-info waves-effect waves-light"  data-toggle="modal" data-target="#updatenasabah{{ $nasabahs->id_nasabah }}">
                                    <i class="mdi mdi-pencil"></i></a>
                                    <a href="" class="btn btn-danger waves-effect waves-light"   data-toggle="modal" data-target="#hapus">
                                        <i class="mdi mdi-delete"></i></a>
                                </td>
                            </tr>
                            @include('koor.update_nasabah')
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- end row -->

    </div> <!-- end container-fluid -->

@endsection
