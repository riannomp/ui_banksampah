@extends('layout.master')
@section('tittle', 'Tambah Sampah')
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
                    <h4 class="page-title">Tambah Samaph</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card-box">
                    <form action="{{ route('teller.simpahdata') }}" class="parsley-examples" method="POST"  enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="userName">Nama Sampah</label>
                                    <input type="text" name="nama_sampah" parsley-trigger="change" required placeholder="Nama Sampah"
                                        class="form-control" >
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="pass1">Jenis</label>
                                    <input name="jenis_sampah" type="text" placeholder="Jenis Sampah" required class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="passWord2">Jumlah</label>
                                    <input type="text" name="jumlah" required placeholder="Jumlah" class="form-control" id="passWord2">
                                </div>

                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="passWord2">Harga</label>
                                    <input type="text" name="harga" required placeholder="Harga" class="form-control" id="passWord2">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="userName">Gambar</label>
                            <input type="file" name="gambar" accept="image/*" capture="camera" required class="form-control" id="userName">
                        </div>
                        <div class="form-group" style="text-align:right;">
                            <button class="btn btn-primary " name="submit" type="submit">
                                Simpan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
