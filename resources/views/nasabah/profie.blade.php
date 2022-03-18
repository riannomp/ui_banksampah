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
            <div class="col-3">

                <div class="card-box">
                    <div class="text-center">
                        <h3>Foto Profile</h3>
                        <div class="">
                            <img src="{{ asset('template/dist') }}/assets/images/users/avatar-1.jpg"
                                class="rounded-circle" alt="" style="width: 200px; height: 200px;">
                            {{-- <input type="file" name="gambar">
                        <input type="hidden" class="form-control-file" id="hidden_gambar" name="hidden_gambar" value=""> --}}
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-9">

                <div class="card-box">
                    <h3>Personal info</h3>
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group">
                                <label for="userName">Nama Lengkap</label>
                                @if ($user->id_role==4)
                                <input value="{{ $user->nasabah->nama }}" type="text" name="nama" parsley-trigger="change" required class="form-control">
                                @endif
                                @if ($user->id_role==4)
                                <input value="{{ $user->nasabah->nama }}" type="text" name="nama" parsley-trigger="change" required class="form-control">
                                @endif
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="pass1">NIK</label>
                                <input value="{{  $user->nasabah->nik }}" name="nik" type="text" required class="form-control" readonly>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="pass1">No Telp</label>
                                <input value="{{  $user->nasabah->no_telp }}" name="no_telp" type="text" required class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="pass1">Alamat</label>
                                <input value="{{  $user->nasabah->alamat }}" name="alamat" type="text" required class="form-control">
                            </div>
                        </div>
                    </div>
                    <hr>
                    <h3>Auth</h3>

                    <div class="row">
                        <div class="col-4">
                            <div class="form-group">
                                <label for="pass1">Email</label>
                                <input name="alamat" type="text" required class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">

                        <label class="col-lg-3 control-label">Password</label>
                        <div class="col-lg-8">
                            <input class="form-control" name="edit_password" type="password" id="myInput" value="">
                            @error('edit_password')
                                <div class="tulisan">{{ $message }}</div>
                            @enderror
                            <input class="form-control" name="password" type="hidden" id="myInput" value="">
                            <input type="checkbox" onclick="myFunction()">Show Password
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- end row -->

    </div> <!-- end container-fluid -->
@endsection
