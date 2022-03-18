@extends('layout.master')
@section('tittle', 'Data Penjualan')
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
                <h4 class="page-title">Data Penjualan</h4>
            </div>
        </div>
    </div>     
    <!-- end page title --> 

    <div class="row">
        <div class="col-lg-12">
           
            <div class="card-box">
                <h4 class="header-title mb-4">Default Tabs</h4>

                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home"
                            role="tab" aria-controls="home" aria-expanded="true">Sampah</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile"
                            role="tab" aria-controls="profile">Kerajinan</a>
                    </li>
                </ul>
                <div class="tab-content text-muted" id="myTabContent">
                    <div role="tabpanel" class="tab-pane fade in active show" id="home"
                            aria-labelledby="home-tab">
                            <table id="datatable" class="table table-bordered dt-responsive nowrap"
                            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>Nama Sampah</th>
                                    <th>Jumlah</th>
                                    <th>Harga</th>
                                    <th>Pengepul</th>
                                    <th>Aksi</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Kardus</td>
                                    <td>25 Kg</td>
                                    <td>Rp 250.000</td>
                                    <td>CV. Kerdus Sejati</td>
                                    <td><a href="" class="btn btn-info waves-effect waves-light"  data-toggle="modal" data-target="#edit"> 
                                        <i class="mdi mdi-information-variant"></i></a>
                                        <a href="" class="btn btn-danger waves-effect waves-light"   data-toggle="modal" data-target="#hapus"> 
                                            <i class="mdi mdi-delete"></i></a>
                                    </td>
                                </tr>
                                
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel"
                            aria-labelledby="profile-tab">
                            <table id="datatable" class="table table-bordered dt-responsive nowrap"
                            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>Nama Produk</th>
                                    <th>Harga</th>
                                    <th>Jumlah Terjual</th>
                                    <th>Tanggal Penjualan</th>
                                    <th>Aksi</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Vas Bunga</td>
                                    <td>Rp 12.000</td>
                                    <td>5</td>
                                    <td>12-02-2022</td>
                                    <td><a href="" class="btn btn-info waves-effect waves-light"  data-toggle="modal" data-target="#edit"> 
                                        <i class="mdi mdi-information-variant"></i></a>
                                        <a href="" class="btn btn-danger waves-effect waves-light"   data-toggle="modal" data-target="#hapus"> 
                                            <i class="mdi mdi-delete"></i></a>
                                    </td>
                                </tr>
                                
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- end row -->

</div> <!-- end container-fluid -->
@endsection