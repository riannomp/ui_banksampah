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
                            <th>Kode Setoran</th>
                            <th>Tanggal Setoran</th>
                            <th>Saldo Akhir</th>
                            
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>SET001</td>
                            <td>12-02-2022</td>
                            <td>Rp 250.000</td>
                            <td><a href="" class="btn btn-success waves-effect waves-light"  data-toggle="modal" data-target="#edit"> 
                                <i class="mdi mdi-information-variant"></i></a>
                               
                            </td>
                        </tr>
                        
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- end row -->

</div> <!-- end container-fluid -->
@endsection