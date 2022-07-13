@extends('layout.master')
@section('tittle', 'Data Pegawai')
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
                    <h4 class="page-title">Data Pegawai</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="row">
            @include('sweetalert::alert')
            <div class="col-12">
                <div class="card-box">
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            {{ session()->get('success') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                        </div>
                    @endif
                    <p>
                        <a href="" class="btn btn-success waves-effect waves-light" data-toggle="modal"
                        data-target="#addpegawai">
                            <span class="btn-label"><i class="mdi mdi-plus"></i>
                            </span> Tambah Pegawai</a>
                    </p>
                    <table id="datatable" class="table table-bordered dt-responsive nowrap"
                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Alamat</th>
                                <th>No HP</th>
                                <th>Role</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pegawai as $pegawais)
                                <tr>
                                    <td>{{ $pegawais->nama }}</td>
                                    <td>{{ $pegawais->alamat }}</td>
                                    <td>{{ $pegawais->no_hp }}</td>
                                    <td>{{ $pegawais->user != null ? $pegawais->user->level : 'belum ada' }}</td>
                                    <td>
                                        <a href="" class="btn btn-info waves-effect waves-light" data-toggle="modal"
                                        data-target="#updatepegawai{{ $pegawais->id_pegawai }}">
                                        <i class="mdi mdi-pencil"></i></a>
                                    </td>
                                </tr>
                                @include('admin.update_pegawai')
                            @endforeach
                        </tbody>
                        @include('admin.add_pegawai')
                    </table>
                </div>
            </div>
        </div>
        <!-- end row -->

    </div> <!-- end container-fluid -->

@endsection
