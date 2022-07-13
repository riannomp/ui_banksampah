@extends('layout.master')
@section('tittle', 'Riwayat Penarikan')
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
                <h4 class="page-title">Riwayat Penarikan</h4>
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
                            <th>Nama Nasabah</th>
                            <th>Penarikan</th>
                            <th>Tanggal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($penarikan as $trk)
                        <tr>
                            <td>{{ $trk->koor->nama }}</td>
                            <td>Rp {{ number_format($trk->penarikan), 2 }}</td>
                            <td>{{ date('d M Y', strtotime($trk->created_at)) }}</td>

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
