@extends('layout.master')
@section('tittle', 'Tambah Setoran')
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
                    <h4 class="page-title">Tambah Setoran Sampah</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card-box">

                    <form action="#" class="parsley-examples" data-parsley-validate novalidate>
                        <div class="row">
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="userName">Nama Nasabah</label>
                                    <input type="text" class="form-control mb-3" placeholder="">
                                </div>

                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="userName">Kode Setoran</label>
                                    <input type="text" class="form-control mb-3" placeholder="SET002" readonly>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="userName">Tanggal Setor</label>
                                    <input type="date" class="form-control mb-3" placeholder=".col-4">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="userName">Jenis Sampah</label>
                                    <input type="text" name="nick" parsley-trigger="change" class="form-control"
                                        id="userName">
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="userName">Nama Sampah</label>
                                    <input type="text" name="nick" parsley-trigger="change" class="form-control"
                                        id="userName">
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="userName">Jumlah</label>
                                    <input type="text" name="" parsley-trigger="change" class="form-control"
                                        id="userName">
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="userName">Harga</label>
                                    <input type="text" name="" parsley-trigger="change" class="form-control"
                                        id="userName">
                                </div>
                            </div>

                        </div>

                        <div class="form-group" style="text-align:right;">
                            <button type="button" class="btn btn-primary ">Tambah Data</button>
                        </div>

                        <div class="col-14">
                            <div class="card-box">
                                <div class="panel-heading">
                                    <div class="pull-left">
                                        <h6 class="panel-title txt-dark">Setoran Sampah</h6>
                                    </div>
                                </div>
                                <div>
                                    <div class="panel-body">
                                        <table class="table table-bordered dt-responsive nowrap">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama Sampah</th>
                                                    <th>Jumlah</th>
                                                    <th>Harga</th>
                                                    <th>Remove</th>
                                                </tr>
                                            </thead>
                                            <tbody id="TabelDinamis">
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12" style="text-align:right;">
                            <button type="submit" class="btn btn-success ">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
