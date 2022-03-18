@extends('layout.master')
@section('tittle', 'Data Transaksi Produk')
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
                    <h4 class="page-title">Data Penjualan Produk</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card-box">
                    <p>
                        <a href="{{ url('') }}" class="btn btn-success waves-effect waves-light">
                            <span class="btn-label"><i class="mdi mdi-plus"></i>
                            </span> Tambah Data</a>
                    </p>

                    <table id="datatable" class="table table-bordered dt-responsive nowrap"
                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th>Nama Produk</th>
                                <th>Harga</th>
                                <th>Jumlah Terjual</th>
                                <th>Tanggal Penjualan</th>
                                <th>Aksi</th>

                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Vas Bunga</td>
                                <td>Rp 12.000</td>
                                <td>5</td>
                                <td>12-02-2022</td>
                                <td><a href="" class="btn btn-info waves-effect waves-light" data-toggle="modal"
                                        data-target="#edit">
                                        <i class="mdi mdi-information-variant"></i></a>
                                    <a href="" class="btn btn-danger waves-effect waves-light" data-toggle="modal"
                                        data-target="#hapus">
                                        <i class="mdi mdi-delete"></i></a>
                                </td>
                            </tr>

                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- end row -->

    </div> <!-- end container-fluid -->
@endsection
