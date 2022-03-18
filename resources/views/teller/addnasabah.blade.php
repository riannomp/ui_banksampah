@extends('layout.master')
@section('tittle', 'Tambah Nasabah')
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
                    <h4 class="page-title">Tambah Nasabah</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card-box">

                    <form action="#" class="parsley-examples" data-parsley-validate novalidate>
                        <div class="row">
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="userName">Nama Nasabah</label>
                                    <input type="text" class="form-control mb-3" placeholder="">
                                </div>

                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="userName">Alamat</label>
                                    <input type="text" class="form-control mb-3" placeholder="" >
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="userName">No Telp</label>
                                    <input type="text" class="form-control mb-3" placeholder="">
                                </div>
                            </div>
                        </div>

                        <div class="form-group" style="text-align:right;">
                            <button type="button" class="btn btn-primary ">Tambah Data</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
