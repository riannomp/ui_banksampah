@extends('layout.master')
@section('tittle', 'Edit Sampah')
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
                    <h4 class="page-title">Edit Sampah</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card-box">
                    <form action="{{ route('teller.update')}}" class="parsley-examples" method="POST"  enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        <div class="form-group">
                            <input type="hidden" value="{{ $sampah->id }}" name="edit_id_sampah">
                            <label for="userName">Nama Sampah</label>
                            <input type="text" name="edit_nama_sampah" parsley-trigger="change" required placeholder="Nama Sampah"
                                class="form-control" value="{{ $sampah->nama_sampah }}" >
                        </div>
                        <div class="form-group">
                            <label for="kode_sampah">Kode Sampah</label>
                            <input type="text" name="edit_kode_sampah" parsley-trigger="change" required placeholder="Nama Sampah"
                                class="form-control" value="{{ $sampah->kode_sampah }}" readonly>
                        </div>

                        <div class="form-group">
                            <label for="pass1">Jenis</label>
                            <input name="edit_jenis_sampah" type="text" placeholder="Jenis Sampah" value="{{ $sampah->jenis }}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="passWord2">Jumlah</label>
                            <input type="text" name="edit_jumlah" value="{{ $sampah->jumlah }}" placeholder="Jumlah" class="form-control" id="passWord2">
                        </div>
                        <div class="form-group">
                            <label for="passWord2">Harga</label>
                            <input type="text" name="edit_harga" value="{{ $sampah->harga }}" placeholder="Harga" class="form-control" id="passWord2">
                        </div>
                        <div class="form-group">
                            <label for="userName">Gambar</label>
                            <input type="file" name="gambar" required class="form-control" id="userName">
                            <input type="hidden" class="form-control-file" id="hidden_gambar" name="hidden_gambar" value="{{ $sampah->gambar }}">
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
