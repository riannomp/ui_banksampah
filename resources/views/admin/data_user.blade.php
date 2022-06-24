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
        @include('sweetalert::alert')
        <!-- end page title -->
        <div class="row">
            <div class="col-12">
                <div class="card-box">
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
                            @foreach ($usr as $usr)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $usr->email }}</td>
                                    <td>
                                        <span>{{ $usr->level }}</span>
                                    </td>
                                    <td>
                                        @if ($usr->status == '1')
                                            <button class="btn btn-success btn-rounded waves-effect waves-light"
                                                data-toggle="modal"
                                                data-target="#aktivasi{{ $usr->id_user }}">Aktif</button>
                                        @else
                                            <button class="btn btn-danger btn-rounded waves-effect waves-light"
                                                data-toggle="modal" data-target="#aktivasi{{ $usr->id_user }}">Non
                                                Aktif</button>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="" class="btn btn-primary waves-effect waves-light"
                                            data-toggle="modal" data-target="#resetpassword{{ $usr->id_user }}">Reset
                                            Password</i></a>
                                        <a href="" class="btn btn-danger waves-effect waves-light"
                                            data-toggle="modal" data-target="#hapus">
                                            <i class="mdi mdi-delete"></i></a>
                                        @include('admin.resetpassword')
                                    </td>
                                </tr>
                                @include('admin.aktivasi_user')
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>


    </div> <!-- end container-fluid -->

@endsection
