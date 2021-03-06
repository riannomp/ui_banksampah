@extends('layout.master')
@section('tittle', 'Data Tabungan')
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
                    <h4 class="page-title">Data Tabungan</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">

                <div class="card-box">
                    <table id="datatable" class="table table-bordered dt-responsive nowrap"
                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th>Nama Nasabah</th>
                                <th>Kode Setoran</th>
                                <th>Tanggal Setor</th>
                                <th>Total Harga</th>
                                <th>Aksi</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($setoran as $str)
                                <tr>
                                    <td>{{ $str->nasabah->nama }}</td>
                                    <td>{{ $str->id_setoran }}</td>
                                    <td>{{ date('d M Y', strtotime($str->tanggal)) }}</td>
                                    <td>Rp {{ number_format($str->total_harga), 2 }}</td>
                                    <td><a href="{{ url('admin/detail_setoran') }}/{{ $str->id_setoran }}"
                                            class="btn btn-info waves-effect waves-light">
                                            <i class="mdi mdi-information-variant"></i></a>
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
