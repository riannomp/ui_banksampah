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
            <div class="col-xl-3 col-md-6">
                <div class="card-box tilebox-three">
                    <div class="avatar-lg rounded-circle bg-light border border float-left">
                        <i class="icon-wallet font-22 avatar-title text-muted"></i>
                    </div>
                    <div class="text-right">
                        <h6 class="text-success text-uppercase">Jumlah Sampah</h6>
                        <h3><span data-plugin="counterup">2,562</span></h3>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6">
                <div class="card-box tilebox-three">
                    <div class="avatar-lg rounded-circle bg-light border border float-left">
                        <i class="icon-basket font-22 avatar-title text-muted"></i>
                    </div>
                    <div class="text-right">
                        <h6 class="text-pink text-uppercase">Jumlah Nasabah</h6>
                        <h3><span data-plugin="counterup">8,542</span></h3>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6">
                <div class="card-box tilebox-three">
                    <div class="avatar-lg rounded-circle bg-light border border float-left">
                        <i class="icon-equalizer font-22 avatar-title text-muted"></i>
                    </div>
                    <div class="text-right">
                        <h6 class="text-purple text-uppercase">Product Sold</h6>
                        <h3><span data-plugin="counterup">6,254</span></h3>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6">
                <div class="card-box tilebox-three">
                    <div class="avatar-lg rounded-circle bg-light border border float-left">
                        <i class="icon-cup font-22 avatar-title text-muted"></i>
                    </div>
                    <div class="text-right">
                        <h6 class="text-warning text-uppercase">Product Sold</h6>
                        <h3><span data-plugin="counterup">7,524</span></h3>
                    </div>
                </div>
            </div>

        </div>

    </div> <!-- end container-fluid -->
@endsection
