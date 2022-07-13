@extends('layout.master')
@section('tittle', 'Penarikan Koordinator')
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
                    <h4 class="page-title">Penarikan Nasabah</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="row">
            <div class="col-12">
                @include('sweetalert::alert')
                <div class="card-box">
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            {{ session()->get('success') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                        </div>
                    @endif

                    <table id="datatable" class="table table-bordered dt-responsive nowrap"
                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th>Nasabah</th>
                                <th>Total Saldo</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($koordinator as $koor)
                                <tr>
                                    <td>{{ $koor->nama }}</td>
                                    <td>Rp {{ number_format($koor->saldo, 2, ',', '.') }}</td>
                                    <td>
                                        @if ($koor->saldo >= 50000)
                                            <a href="" class="btn btn-primary waves-effect waves-light"
                                                data-toggle="modal" data-target="#penarikan{{ $koor->id_koor }}">
                                                Penarikan</a>
                                        @endif

                                    </td>
                                </tr>
                                @include('teller.tambah_penarikan')
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
        <!-- end row -->

    </div> <!-- end container-fluid -->

@endsection
