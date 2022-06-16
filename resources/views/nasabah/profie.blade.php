@extends('layout.master')
@section('tittle', 'Profile')
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
                    <h4 class="page-title">Profile</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card-box">
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group">
                                <div class="text-center">
                                    <div class="">
                                        <img src="{{ url('img/logo') }}/{{ $user->nasabah->foto }}"
                                            class="rounded-circle" alt="" style="width: 300px; height: 300px;">
                                    </div>
                                    <h3>{{ $user->nasabah->nama }}</h3>
                                </div>
                            </div>
                        </div>
                        <style>
                            .vl {
                                border-left: 2px solid green;
                                height: 400px;
                                margin-right: 30px;
                            }
                        </style>

                        <div class="vl"></div>
                        <div class="col-6">
                            <h3>Personal info</h3>
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#profile" role="tab"
                                        aria-controls="profile" aria-expanded="true">Profil</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#auth" role="tab"
                                        aria-controls="auth">Auth</a>
                                </li>
                            </ul>
                            <div class="tab-content text-muted" id="myTabContent">
                                <div role="tabpanel" class="tab-pane fade in active show" id="profile"
                                    aria-labelledby="home-tab">
                                        <div class="form-group">
                                            <div class="form-group row">
                                                <label for="example-text-input" class="col-lg-2 col-form-label">Nama
                                                </label>
                                                <div class="col-lg-8">
                                                    <p>{{ $user->nasabah->nama }}</p>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="example-search-input" class="col-lg-2 col-form-label">No
                                                    HP</label>
                                                <div class="col-lg-8">
                                                    <input class="form-control" name="edit_no_hp"
                                                        value="" type="text">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="example-search-input"
                                                    class="col-lg-2 col-form-label">Alamat</label>
                                                <div class="col-lg-8">
                                                    <textarea class="form-control" name="edit_alamat" value="" type="text"></textarea>
                                                </div>
                                            </div>

                                </div>
                            </div>
                            <div class="tab-pane fade" id="auth" role="tabpanel" aria-labelledby="profile-tab">

                                    <div class="form-group row">
                                        <label for="example-text-input" class="col-lg-2 col-form-label">Email
                                        </label>
                                        <div class="col-lg-8">
                                            <input class="form-control" value="" type="text">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-search-input" class="col-lg-2 col-form-label">Password</label>
                                        <div class="col-lg-8">
                                            <input class="form-control" name="edit_password" type="password"
                                                id="inputPassword" value="">
                                            <input class="form-control" name="password" type="hidden" id="inputPassword"
                                                value="">
                                        </div>
                                    </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-14">

                <div class="card-box">
                    <table id="datatable" class="table table-bordered dt-responsive nowrap"
                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th>Nama Nasabah</th>
                                <th>Kode Setoran</th>
                                <th>Tanggal Setor</th>
                                <th>Total Harga</th>
                                <th>Aksi</th>

                            </tr>
                        </thead>
                        <tbody>

                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>



                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- end row -->
        <div class="row">

        </div>

    </div> <!-- end container-fluid -->
@endsection
