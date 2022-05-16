@extends('layout.master')
@section('tittle', 'Data Sampah')
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
                    <h4 class="page-title">Data Sampah</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-10">

                <div class="card-box">
                    <p>
                        <a href="" class="btn btn-success waves-effect waves-light" data-toggle="modal"
                            data-target="#addsampah">
                            <span class="btn-label"><i class="mdi mdi-plus"></i>
                            </span> Tambah Data</a>
                    </p>

                    <table id="datatable" class="table table-bordered dt-responsive nowrap"
                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th width="30px">Kode Sampah</th>
                                <th width="30px">Jenis</th>
                                <th width="30px">Harga Nasabah /Kg</th>
                                <th width="30px">Harga Koordinator /Kg</th>
                                <th>Gambar</th>
                                <th width="20px">Aksi</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($sampah as $sampah)
                                <tr>
                                    <td>{{ $sampah->nama }}</td>
                                    <td>{{ $sampah->id_sampah }}</td>
                                    <td>{{ $sampah->jenis->nama }}</td>
                                    <td>Rp {{ number_format($sampah->harga_nasabah, 2, ',', '.') }}</td>
                                    <td>Rp {{ number_format($sampah->harga_koordinator, 2, ',', '.') }}</td>
                                    <td>
                                        <span class="logo-lg">
                                            @if ($sampah->gambar)
                                                <img src="{{ url('img/logo') }}/{{ $sampah->gambar }}"
                                                    style="width: 250px; height: 150px;">
                                            @endif
                                        </span>
                                    </td>
                                    <td><a href="" class="btn btn-success waves-effect waves-light" data-toggle="modal"
                                            data-target="#updatesampah{{ $sampah->id_sampah }}">
                                            <i class="mdi mdi-pencil"></i></a>
                                        <a href="" class="btn btn-danger waves-effect waves-light" data-toggle="modal"
                                            data-target="#hapus">
                                            <i class="mdi mdi-delete"></i></a>
                                    </td>
                                </tr>

                                @include('teller.update_sampah')
                            @endforeach
                            @include('teller.add_sampah')
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- end row -->

        <div id="hapus" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="myModalLabel">Delete</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body">
                        <h5>Apakah yakin untuk menghapus data ini ?</h5>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light waves-effect" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary waves-effect waves-light">Save changes</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->


    </div> <!-- end container-fluid -->
@endsection

