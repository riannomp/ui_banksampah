@extends('layout.master')
@section('tittle', 'Data User')
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
                    <h4 class="page-title">Data User</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="row">
            <div class="col-12">

                <div class="card-box">
                    <p>
                        <a href="{{ url('admin/addsetoran') }}" class="btn btn-success waves-effect waves-light" >
                            <span class="btn-label"><i class="mdi mdi-plus"></i>
                        </span> Tambah Data</a>
                    </p>

                    <table id="datatable" class="table table-bordered dt-responsive nowrap"
                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            @foreach ($user as $usr)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $usr->email }}</td>
                                <td>
                                    @if ($usr->id_role == '1')
                                    <span>Admin</span>
                                    @elseif ($usr->id_role == '2')
                                    <span>Teller</span>
                                    @elseif ($usr->id_role == '3')
                                    <span>Kepala Bank Sampah</span>
                                    @elseif ($usr->id_role == '4')
                                    <span>Nasabah</span>
                                    @else
                                    <span>-</span>
                                    @endif
                                </td>
                                <td>
                                    @if($usr->status == '1')
                                    <button class="btn btn-success btn-rounded waves-effect waves-light" data-toggle="modal" data-target="#aktivasi{{ $usr->id }}">Aktif</button>
                                    @else
                                    <button class="btn btn-danger btn-rounded waves-effect waves-light" data-toggle="modal" data-target="#aktivasi{{ $usr->id }}">Non Aktif</button>
                                    @endif
                                </td>
                                <td>
                                    <a href="" class="btn btn-danger waves-effect waves-light"   data-toggle="modal" data-target="#hapus">
                                        <i class="mdi mdi-delete"></i></a>
                                </td>
                            </tr>
                            @include('admin.aktivasi_user')
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- end row -->

    </div> <!-- end container-fluid -->

@endsection
