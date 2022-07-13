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
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            {{ session()->get('success') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                        </div>
                    @endif
                    @include('sweetalert::alert')
                    <p>
                        <a href="" class="btn btn-success waves-effect waves-light" data-toggle="modal"
                        data-target="#addnasabah">
                            <span class="btn-label"><i class="mdi mdi-plus"></i>
                            </span> Tambah Data</a>
                    </p>
                    @include('teller.add_nasabah')

                    <table id="datatable" class="table table-bordered dt-responsive nowrap"
                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th>Nama Nasabah</th>
                                <th>NIK</th>
                                <th>Alamat</th>
                                <th>No Telp</th>
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
                                    <td><a href="" class="btn btn-info waves-effect waves-light" data-toggle="modal"
                                            data-target="#updatenasabah{{ $nasabahs->id_nasabah }}">
                                            <i class="mdi mdi-pencil"></i></a>
                                    </td>
                                </tr>
                                @include('teller.update_nasabah')
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div id="hapus" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
            aria-hidden="true">
            <div class="modal-dialog  modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="myModalLabel">Penarikan ??</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body">
                        <form action="#" class="parsley-examples" data-parsley-validate novalidate>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <input type="text" name="kode" parsley-trigger="change" required
                                            placeholder="AGU001" class="form-control" id="emailAddress" readonly>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <input type="text" name="kode" parsley-trigger="change" required placeholder="AGUS"
                                            class="form-control" id="emailAddress" readonly>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <input id="pass1" type="text" placeholder="Rp 200.000" required
                                            class="form-control" readonly>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="passWord2">Jumlah Yang Ingin Ditarik</label>
                                <input type="text" required class="form-control" id="passWord2">
                            </div>

                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light waves-effect" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary waves-effect waves-light">Save changes</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div>
        <!-- end row -->

    </div> <!-- end container-fluid -->

@endsection
