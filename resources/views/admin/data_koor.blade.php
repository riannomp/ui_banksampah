@extends('layout.master')
@section('tittle', 'Data Koordinator')
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
                    <h4 class="page-title">Data Koordinator</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="row">
            <div class="col-12">
                <div class="card-box">
                    @include('sweetalert::alert')
                    @if (auth()->user()->level == 'admin')
                        <p>
                            <a href="{{ route('addKoor') }}" class="btn btn-success waves-effect waves-light">
                                <span class="btn-label"><i class="mdi mdi-plus"></i>
                                </span> Tambah Koordinator</a>
                        </p>
                    @endif

                    <table id="datatable" class="table table-bordered dt-responsive nowrap"
                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Alamat</th>
                                <th>No HP</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($koordinator as $koor)
                                <tr>
                                    <td>{{ $koor->nama }}</td>
                                    <td>{{ $koor->alamat }}</td>
                                    <td>{{ $koor->no_hp }}</td>

                                    <td>
                                        <a href="" class="btn btn-danger waves-effect waves-light"
                                            data-toggle="modal" data-target="#hapus">
                                            <i class="mdi mdi-delete"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- end row -->

    </div> <!-- end container-fluid -->

@endsection
