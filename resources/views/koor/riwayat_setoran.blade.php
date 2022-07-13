@extends('layout.master')
@section('tittle', 'Riwayat Setoran')
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
                <h4 class="page-title">Riwayat Setoran Sampah</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->
    @include('sweetalert::alert')
    <div class="row">
        <div class="col-12">

            <div class="card-box">
                <table id="datatable" class="table table-bordered dt-responsive nowrap"
                    style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th>Kode Setoran</th>
                            <th>Tanggal Setor</th>
                            <th>Total Harga</th>
                            <th>Aksi</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($setoran as $str)
                            <tr>
                                <td>{{ $str->id_setoran }}</td>
                                <td>{{ date('d M Y', strtotime($str->tanggal)) }}</td>
                                <td>Rp {{ number_format($str->total_koor), 2 }}</td>
                                <td><a href=""
                                        class="btn btn-info waves-effect waves-light">
                                        Detail</i></a>
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
