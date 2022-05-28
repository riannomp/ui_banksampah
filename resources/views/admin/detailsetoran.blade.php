@extends('layout.master')
@section('tittle', 'Detail Setoran')
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
                    <h4 class="page-title">Detail Setoran Sampah</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card-box">
                    {{-- <h4 class="header-title">Basic example</h4> --}}
                    <div class="row">
                        <div class="col-5">
                            <div class="form-group">
                                <table>
                                    <div class="text-left">
                                        <h6 class="txt-dark"><strong>Kode Setoran :</strong> </h6>
                                        <p>SET001</p>
                                    </div>
                                    <div class="text-left">
                                        <h6 class="txt-dark"><strong>Tanggal Setor :</strong></h6>
                                        <p> 12 Februari 2022</p>
                                    </div>

                                </table>
                            </div>
                        </div>

                    </div>
                    <br>
                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama Sampah</th>
                                    <th>Jumlah</th>
                                    <th>Harga</th>
                                    <th>Sub Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
