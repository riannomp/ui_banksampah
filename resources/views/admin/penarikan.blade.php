@extends('layout.master')
@section('tittle', 'Data Penarikan')
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
                    <h4 class="page-title">Data Penarikan</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="row">
            <div class="col-12">
                @include('sweetalert::alert')
                <div class="card-box">
                    <table id="datatable" class="table table-bordered dt-responsive nowrap"
                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th>Nama Penarik</th>
                                <th>Sebagai</th>
                                <th>Total Penarikan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($penarikan as $trk)
                                <tr>
                                    <td>
                                        @if ($trk->status == '1')
                                            {{ $trk->nasabah->nama }}
                                        @else
                                            {{ $trk->koor->nama }}
                                        @endif
                                    </td>
                                    <td>
                                        @if ($trk->status == '1')
                                            Nasabah
                                        @else
                                           Koordinator
                                        @endif
                                    </td>
                                    <td> Rp {{ number_format($trk->penarikan), 2 }}</td>
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
