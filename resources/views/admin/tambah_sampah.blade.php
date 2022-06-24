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
                    <h4 class="page-title">Tambah Sampah</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-8">
                <div class="card-box">

                    <form action="{{ route('addsampah') }}" method="POST" class="parsley-examples"
                        enctype="multipart/form-data" data-parsley-validate novalidate>
                        @csrf
                        <div class="form-group">
                            <div class="form-group row">
                                <label for="example-text-input" class="col-lg-4 col-form-label">Nama Sampah
                                </label>
                                <div class="col-lg-8">
                                    <input type="text" name="nama" parsley-trigger="change" required
                                        placeholder="Nama Sampah" class="form-control" id="userName">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-text-input" class="col-lg-4 col-form-label">Jenis
                                </label>
                                <div class="col-lg-8">
                                    <select name="jenis" id="jenis" class="form-control">
                                        <option value="">Pilih Jenis</option>
                                        @foreach ($jenis as $jns)
                                            <option value="{{ $jns->id_jenis }}">{{ $jns->id_jenis }} |
                                                {{ $jns->nama }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-text-input" class="col-lg-4 col-form-label">Harga Nasabah
                                </label>
                                <div class="col-lg-8">
                                    <input type="text" required placeholder="Harga Nasabah" class="form-control"
                                        name="harga_nasabah" id="harga_nasabah">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-text-input" class="col-lg-4 col-form-label">Harga Koordinator
                                </label>
                                <div class="col-lg-8">
                                    <input type="text" required placeholder="Harga Koordinator" class="form-control"
                                        name="harga_koordinator" id="harga_koordinator">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-text-input" class="col-lg-4 col-form-label">Gambar
                                </label>
                                <div class="col-lg-8">
                                    <input type="file" name="gambar" required class="form-control" name="gambar"
                                        id="gambar">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="submit" class="btn btn-primary" value="Simpan">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
