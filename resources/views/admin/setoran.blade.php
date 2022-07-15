@extends('layout.master')
@section('tittle', 'Data Setoran')
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
                    <h5 class="txt-dark"> <strong> Filter </strong></h5>
                    <form action="{{ route('filtersetoran') }}" method="GET">
                        <div class="row">
                            <div class="col-12 col-md-3 col-lg-3">
                                <div class="form-group">
                                    <label class="control-label ">Start date</label>
                                    <input type="date" id="start" name="start" class="form-control"
                                        value="{{ date('d-m-Y') }}">
                                </div>
                            </div>
                            <div class="col-12 col-md-3 col-lg-3">
                                <div class="form-group">
                                    <label class="control-label ">End date</label>
                                    <input type="date" id="end" name="end" value="{{ date('d-m-Y') }}"
                                        class="form-control">
                                </div>
                            </div>
                            <div class="col-12 col-md-4 col-lg-4 my-4">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Cek </button>


                                </div>
                            </div>


                        </div>
                    </form>

                    <a href="{{ route('cetakpdf') }}" target="_blank" class="btn btn-success btn-icon left-icon"><i class="fa fa-print"></i><span> Print</span></a>

                    <table id="datatable" class="table table-bordered dt-responsive nowrap"
                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th>Kode Setoran</th>
                                <th>Tanggal Setor</th>
                                <th>Total Harga</th>
                                <th>Jenis Setoran</th>
                                <th>Aksi</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($setoran as $str)
                                <tr>
                                    <td>{{ $str->id_setoran }}</td>
                                    <td>{{ date('d M Y', strtotime($str->tanggal)) }}</td>
                                    <td>
                                        @if ($str->status == '1')
                                        Rp {{ number_format($str->total_harga), 2 }}
                                        @else
                                        Rp {{ number_format($str->total_koor), 2 }}</td>
                                        @endif
                                    <td>
                                        @if ($str->status == '1')
                                            Setoran Nasabah
                                        @else
                                            Setoran Koordinator
                                        @endif
                                    </td>
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
