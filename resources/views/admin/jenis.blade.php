@extends('layout.master')
@section('tittle', 'Data Jenis')
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
                    <h4 class="page-title">Data Jenis</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card-box">
                    @if (auth()->user()->level == 'admin')
                        <p>
                            <a href="" class="btn btn-success waves-effect waves-light" data-toggle="modal"
                                data-target="#addjenis">
                                <span class="btn-label"><i class="mdi mdi-plus"></i>
                                </span> Tambah Data</a>
                        </p>
                    @endif
                    <table id="datatable" class="table table-bordered dt-responsive nowrap"
                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th>Jenis Sampah</th>
                                <th>Kode Jenis</th>
                                <th>Aksi</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($jenis as $jns)
                                <tr>
                                    <td>{{ $jns->nama }}</td>
                                    <td>{{ $jns->id_jenis }}</td>
                                    <td>
                                        <a href="" class="btn btn-primary waves-effect waves-light"
                                            data-toggle="modal" data-target="#update{{ $jns->id_jenis }}">
                                            <i class="mdi mdi-pencil"></i></a>
                                        <a href="" class="btn btn-danger waves-effect waves-light"
                                            data-toggle="modal" data-target="#hapus">
                                            <i class="mdi mdi-delete"></i></a>
                                    </td>
                                </tr>
                                @include('admin.update_jenis')
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
            {{-- <div class="col-4">
            <div class="card-box">
                <h2>Tambah Data Jenis</h2>
                <form class="form-horizontal" method="post" action="{{ url('admin/addjenis') }}" enctype="multipart/form-data">
                    @csrf
                     <div class="form-group">
                         <input name="edit_id" type="hidden" class="form-control" value="{{ $usr->id }}">
                         <label class="control-label mb-10 text-left">Jenis</label>
                         <input name="nama" type="text" class="form-control" value="">
                     </div>

                     <div class="form-group">
                         <div class="col-md-6">
                             <input type="submit" class="btn btn-primary" value="Simpan">
                         </div>
                     </div>

                 </form>
            </div>
        </div> --}}
        </div>
        <!-- end row -->
        @include('admin.add_jenis')

    </div> <!-- end container-fluid -->
@endsection
