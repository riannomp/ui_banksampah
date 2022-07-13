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
                    {{-- @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            {{ session()->get('success') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                        </div>
                    @endif --}}
                    @include('sweetalert::alert')
                    <p>
                        <a href="" class="btn btn-success waves-effect waves-light" data-toggle="modal"
                            data-target="#addkoor">
                            <span class="btn-label"><i class="mdi mdi-plus"></i>
                            </span> Tambah Koordinator</a>
                    </p>
                    @include('teller.add_koor')

                    <table id="datatable" class="table table-bordered dt-responsive nowrap"
                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Alamat</th>
                                <th>No HP</th>
                                <th>Koor</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($koordinator as $koor)
                                <tr>
                                    <td>{{ $koor->nama }}</td>
                                    <td>{{ $koor->alamat }}</td>
                                    <td>{{ $koor->no_hp }}</td>
                                    <td>Rp {{ number_format($koor->saldo), 2 }}</td>
                                    <td>
                                        <a href="" class="btn btn-primary waves-effect waves-light"
                                            data-toggle="modal" data-target="#updatekoor{{ $koor->id_koor }}">
                                            <i class="mdi mdi-pencil"></i></a>
                                    </td>
                                </tr>
                                @include('teller.update_koor')
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- end row -->

    </div> <!-- end container-fluid -->

@endsection
