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
            <div class="col-8">
                <div class="card-box">
                    <div class="row">

                        @if (auth()->user()->level == 'admin' || auth()->user()->level == 'teller')
                            <div class="col-5">
                                <div class="form-group">
                                    <div class="text-center">
                                        <div class="">
                                            <img src="{{ url('img/logo') }}/{{ $user->pegawai->foto }}"
                                                class="rounded-circle" alt="" style="width: 300px; height: 300px;">
                                        </div>
                                        <h3>{{ $user->pegawai->nama }}</h3>
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
                                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#profile"
                                            role="tab" aria-controls="profile" aria-expanded="true">Profil</a>
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
                                                    <input class="form-control" value="{{ $user->pegawai->nama }}"
                                                        type="text">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="example-search-input" class="col-lg-2 col-form-label">No
                                                    HP</label>
                                                <div class="col-lg-8">
                                                    <input class="form-control" value="{{ $user->pegawai->no_hp }}"
                                                        type="text">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="example-search-input"
                                                    class="col-lg-2 col-form-label">Alamat</label>
                                                <div class="col-lg-8">
                                                    <textarea class="form-control" value="" type="text">{{ $user->pegawai->alamat }}</textarea>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="example-search-input"
                                                    class="col-lg-2 col-form-label">Foto</label>
                                                <div class="col-lg-8">
                                                    <input class="form-control" value="" type="file">
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="auth" role="tabpanel" aria-labelledby="profile-tab">
                                        <div class="form-group row">
                                            <label for="example-text-input" class="col-lg-2 col-form-label">Email
                                            </label>
                                            <div class="col-lg-8">
                                                <input class="form-control" value="{{ $user->email }}" type="text">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-search-input"
                                                class="col-lg-2 col-form-label">Password</label>
                                            <div class="col-lg-8">
                                                <input class="form-control" name="edit_password" type="password"
                                                    id="inputPassword" value="">
                                                <input class="form-control" name="password" type="hidden"
                                                    id="inputPassword" value="{{ $user->password }}">

                                                <input type="checkbox" onclick="shwoPassword()"> Show Password
                                            </div>
                                        </div>

                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>
                                </div>
                        @endif
                        @if (auth()->user()->level == 'koor')
                            <div class="col-5">
                                <div class="form-group">
                                    <div class="text-center">
                                        <div class="">
                                            <img src="{{ url('img/logo') }}/{{ $user->koordinator->foto }}"
                                                class="rounded-circle" alt="" style="width: 300px; height: 300px;">
                                        </div>
                                        <h3>{{ $user->koordinator->nama }}</h3>
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
                                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#profile"
                                            role="tab" aria-controls="profile" aria-expanded="true">Profil</a>
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
                                                    <input class="form-control" value="{{ $user->koordinator->nama }}"
                                                        type="text">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="example-search-input" class="col-lg-2 col-form-label">No
                                                    HP</label>
                                                <div class="col-lg-8">
                                                    <input class="form-control" value="{{ $user->koordinator->no_hp }}"
                                                        type="text">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="example-search-input"
                                                    class="col-lg-2 col-form-label">Alamat</label>
                                                <div class="col-lg-8">
                                                    <textarea class="form-control" value="" type="text">{{ $user->koordinator->alamat }}</textarea>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="example-search-input"
                                                    class="col-lg-2 col-form-label">Foto</label>
                                                <div class="col-lg-8">
                                                    <input class="form-control" value="" type="file">
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="auth" role="tabpanel" aria-labelledby="profile-tab">
                                        <div class="form-group row">
                                            <label for="example-text-input" class="col-lg-2 col-form-label">Email
                                            </label>
                                            <div class="col-lg-8">
                                                <input class="form-control" value="{{ $user->email }}" type="text">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-search-input"
                                                class="col-lg-2 col-form-label">Password</label>
                                            <div class="col-lg-8">
                                                <input class="form-control" name="edit_password" type="password"
                                                    id="inputPassword" value="">
                                                <input class="form-control" name="password" type="hidden"
                                                    id="inputPassword" value="{{ $user->password }}">

                                                <input type="checkbox" onclick="shwoPassword()"> Show Password
                                            </div>
                                        </div>

                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>
                                </div>
                        @endif
                        @if (auth()->user()->level == 'nasabah')
                            <div class="col-5">
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
                                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#profile"
                                            role="tab" aria-controls="profile" aria-expanded="true">Profil</a>
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
                                                    <input class="form-control" value="{{ $user->nasabah->nama }}"
                                                        type="text">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="example-search-input" class="col-lg-2 col-form-label">No
                                                    HP</label>
                                                <div class="col-lg-8">
                                                    <input class="form-control" value="{{ $user->nasabah->no_hp }}"
                                                        type="text">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="example-search-input"
                                                    class="col-lg-2 col-form-label">Alamat</label>
                                                <div class="col-lg-8">
                                                    <textarea class="form-control" value="" type="text">{{ $user->nasabah->alamat }}</textarea>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="example-search-input"
                                                    class="col-lg-2 col-form-label">Foto</label>
                                                <div class="col-lg-8">
                                                    <input class="form-control" value="" type="file">
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="auth" role="tabpanel" aria-labelledby="profile-tab">
                                        <div class="form-group row">
                                            <label for="example-text-input" class="col-lg-2 col-form-label">Email
                                            </label>
                                            <div class="col-lg-8">
                                                <input class="form-control" value="{{ $user->email }}" type="text">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-search-input"
                                                class="col-lg-2 col-form-label">Password</label>
                                            <div class="col-lg-8">
                                                <input class="form-control" name="edit_password" type="password"
                                                    id="inputPassword" value="">
                                                <input class="form-control" name="password" type="hidden"
                                                    id="inputPassword" value="{{ $user->password }}">

                                                <input type="checkbox" onclick="shwoPassword()"> Show Password
                                            </div>
                                        </div>

                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>
                                </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->

    </div> <!-- end container-fluid -->
@endsection
<script>
    function shwoPassword() {
        var pass = document.getElementById("inputPassword");
        if (pass.type === "password") {
            pass.type = "text";
        } else {
            pass.type = "password";
        }
    }
</script>
