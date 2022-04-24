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
                <h4 class="page-title">Setoran Sampah</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-12">

            <div class="card-box">
                <p>
                    <a href="{{ url('teller/addsetoran') }}" class="btn btn-success waves-effect waves-light" >
                        <span class="btn-label"><i class="mdi mdi-plus"></i>
                    </span> Tambah Data</a>
                </p>

                <table id="datatable" class="table table-bordered dt-responsive nowrap"
                    style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th>Nama Nasabah</th>
                            <th >Kode Setoran</th>
                            <th >Tanggal Setor</th>
                            <th >Total Harga</th>
                            <th >Aksi</th>

                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><a href="{{ url('teller/detail_setoran') }}" class="btn btn-info waves-effect waves-light" >
                                <i class="mdi mdi-information-variant"></i></a>

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
