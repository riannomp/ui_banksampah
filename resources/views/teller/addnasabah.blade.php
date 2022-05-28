@extends('layout.master')
@section('tittle', 'Tambah Nasabah')
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
                    <h4 class="page-title">Tambah Nasabah</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card-box">
                    <h4 class="header-title">Tambah Data Nasabah</h4>
                    <form id="wizard-validation-form" action="#">
                        <div>
                            <h3>Step 1</h3>
                            <section>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group clearfix">
                                            <label for="name2"> Nama *</label>
                                            <div>
                                                <input id="name2" name="name" type="text" class="required form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group clearfix">
                                            <label for="surname2"> NIK *</label>
                                            <div>
                                                <input id="surname2" name="surname" type="text"
                                                    class="required minlength form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- end row -->
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group clearfix">
                                            <label for="email2">Email *</label>
                                            <div>
                                                <input id="email2" name="email" type="text"
                                                    class="required email form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group clearfix">
                                            <label for="address2">Address </label>
                                            <div>
                                                <input id="address2" name="address" type="text" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- end row -->
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group clearfix">
                                            <label class="col-lg-12 control-label ">(*) Wajib Diisi</label>
                                        </div>
                                    </div>
                                </div><!-- end row -->

                            </section>
                            <h3>Step 2</h3>
                            <section>


                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group clearfix">
                                            <label for="email2">Email *</label>
                                            <div>
                                                <input id="email2" name="email" type="text"
                                                    class="required email form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group clearfix">
                                            <label for="password2"> Password *</label>
                                            <div>
                                                <input id="password2" name="password" type="text"
                                                    class="required form-control">

                                            </div>
                                        </div>
                                    </div>
                                </div><!-- end row -->
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group clearfix">
                                            <label for="confirm2">Confirm Password *</label>
                                            <div>
                                                <input id="confirm2" name="confirm" type="text"
                                                    class="required form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- end row -->
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group clearfix">
                                            <label class="col-lg-12 control-label">(*) Wajib Diisi</label>
                                        </div>
                                    </div>
                                </div><!-- end row -->

                            </section>


                            <h3>Step 3</h3>
                            <section>
                                <div class="form-group clearfix">
                                    <div class="col-lg-12">
                                        <ul class="list-unstyled w-list">
                                            <li><b>First Name :</b> Jonathan </li>
                                            <li><b>Last Name :</b> Smith </li>
                                            <li><b>Emial:</b> jonathan@smith.com</li>
                                            <li><b>Address:</b> 123 Your City, Cityname. </li>
                                        </ul>
                                    </div>
                                </div>
                            </section>
                            <h3>Step Final</h3>
                            <section>
                                <div class="form-group clearfix">
                                    <div class="col-lg-12">
                                        <input id="acceptTerms-2" name="acceptTerms2" type="checkbox"
                                            class="required">
                                        <label for="acceptTerms-2">I agree with the Terms and Conditions.</label>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
