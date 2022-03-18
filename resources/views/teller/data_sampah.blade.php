@extends('layout.master')
@section('tittle', 'Data Sampah')
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
                    <h4 class="page-title">Data Sampah</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">

                <div class="card-box">
                    <p>
                        <a href="{{ route('teller.addsampah') }}" class="btn btn-success waves-effect waves-light">
                            <span class="btn-label"><i class="mdi mdi-plus"></i>
                            </span> Tambah Data</a>
                    </p>

                    <table id="datatable" class="table table-bordered dt-responsive nowrap"
                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th width="30px">Kode Sampah</th>
                                <th width="30px">Jenis</th>
                                <th width="30px">Jumlah(Kg)</th>
                                <th width="30px">Harga /Kg</th>
                                <th>Gambar</th>
                                <th width="20px">Aksi</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data_sampah as $sampah)
                                <tr>
                                    <td>{{ $sampah->nama_sampah }}</td>
                                    <td>{{ $sampah->kode_sampah }}</td>
                                    <td>{{ $sampah->jenis }}</td>
                                    <td>{{ $sampah->jumlah }}</td>
                                    <td>{{ $sampah->harga }}</td>
                                    <td><span class="logo-lg">
                                            <img src="{{ url('img') }}/{{ $sampah->gambar }}" alt=""
                                                height="50">
                                        </span></td>
                                    <td><a href="{{ url('teller/data_sampah/ubah')}}/{{ $sampah->id }} " class="btn btn-success waves-effect waves-light">
                                            <i class="mdi mdi-pencil"></i></a>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- end row -->

        <div id="hapus" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="myModalLabel">Delete</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body">
                        <h5>Apakah yakin untuk menghapus data ini ?</h5>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light waves-effect" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary waves-effect waves-light">Save changes</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->


    </div> <!-- end container-fluid -->

@endsection
