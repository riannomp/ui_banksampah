@extends('layout.master')
@section('tittle', 'home')
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
                    <h4 class="page-title">Sistem Informasi Bank Sampah</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="alert alert-success alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            Selamat Datang, <strong></strong>
        </div>

        <div class="row">

            <div class="col-md-6 col-xl-4">
                <div class="card-box tilebox-one">
                    <i class="icon-layers float-right m-0 h2 text-muted"></i>
                    <h6 class="text-muted text-uppercase mt-0">Sampah Terkumpul</h6>
                    <h3 class="my-3"><span data-plugin="counterup">1,587</span> KG</h3>
                </div>
            </div>

            <div class="col-md-6 col-xl-4">
                <div class="card-box tilebox-one">
                    <i class="icon-paypal float-right m-0 h2 text-muted"></i>
                    <h6 class="text-muted text-uppercase mt-0">Jumlah Nasabah</h6>
                    <h3 class="my-3"><span data-plugin="counterup">234 </span> Orang</h3>
                </div>
            </div>

            <div class="col-md-6 col-xl-4">
                <div class="card-box tilebox-one">
                    <i class="icon-chart float-right m-0 h2 text-muted"></i>
                    <h6 class="text-muted text-uppercase mt-0">Produk Daur Ulang</h6>
                    <h3 class="my-3"><span data-plugin="counterup">35 </span> Produk</h3>
                </div>
            </div>

        </div>
        <!-- end row -->

    </div> <!-- end container-fluid -->
@endsection
