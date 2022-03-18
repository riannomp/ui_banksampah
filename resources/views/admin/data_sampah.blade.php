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
                        <a href="" class="btn btn-success waves-effect waves-light"  data-toggle="modal" data-target="#myModal"> 
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
                            <tr>
                                <td>Kardus</td>
                                <td>KAR001</td>
                                <td>Anorganik</td>
                                <td>30</td>
                                <td>Rp 3.000</td>
                                <td><span class="logo-lg">
                                    <img src="{{ asset('template/dist') }}/assets/images/sampah/kardus.jpg" alt="" height="50">
                                    <!-- <span class="logo-lg-text-dark">Uplon</span> -->
                                </span></td>
                                <td><a href="" class="btn btn-success waves-effect waves-light"  data-toggle="modal" data-target="#edit"> 
                                    <i class="mdi mdi-pencil"></i></a>
                                    <a href="" class="btn btn-danger waves-effect waves-light"   data-toggle="modal" data-target="#hapus"> 
                                        <i class="mdi mdi-delete"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td>Daun Kering</td>
                                <td>DAU001</td>
                                <td>Organik</td>
                                <td>10</td>
                                <td>Rp 2.000</td>
                                <td><span class="logo-lg">
                                    <img src="{{ asset('template/dist') }}/assets/images/sampah/daun.jpg" alt="" height="50">
                                    <!-- <span class="logo-lg-text-dark">Uplon</span> -->
                                </span></td>
                                <td><a href="" class="btn btn-success waves-effect waves-light"  data-toggle="modal" data-target="#edit"> 
                                    <i class="mdi mdi-pencil"></i></a>
                                    <a href="" class="btn btn-danger waves-effect waves-light" data-toggle="modal" data-target="#hapus"> 
                                        <i class="mdi mdi-delete"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td>Botol Plastik</td>
                                <td>BOT001</td>
                                <td>Anorganik</td>
                                <td>30</td>
                                <td>Rp 2.500</td>
                                <td><span class="logo-lg">
                                    <img src="{{ asset('template/dist') }}/assets/images/sampah/botol.jpg" alt="" height="50">
                                    <!-- <span class="logo-lg-text-dark">Uplon</span> -->
                                </span></td>
                                <td><a href="" class="btn btn-success waves-effect waves-light"  data-toggle="modal" data-target="#edit"> 
                                    <i class="mdi mdi-pencil"></i></a>
                                    <a href="" class="btn btn-danger waves-effect waves-light"  data-toggle="modal" data-target="#hapus"> 
                                        <i class="mdi mdi-delete"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td>Plastik Makanan</td>
                                <td>PLA001</td>
                                <td>Anorganik</td>
                                <td>10</td>
                                <td>Rp 2.000</td>
                                <td><span class="logo-lg">
                                    <img src="{{ asset('template/dist') }}/assets/images/sampah/plastik.jpg" alt="" height="50">
                                    <!-- <span class="logo-lg-text-dark">Uplon</span> -->
                                </span></td>
                                <td><a href="" class="btn btn-success waves-effect waves-light" data-toggle="modal" data-target="#edit"> 
                                    <i class="mdi mdi-pencil"></i></a>
                                    <a href="" class="btn btn-danger waves-effect waves-light"  data-toggle="modal" data-target="#hapus"> 
                                        <i class="mdi mdi-delete"></i></a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- end row -->
        <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="myModalLabel">Tambah Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body">
                        <form action="#" class="parsley-examples" data-parsley-validate novalidate>
                            <div class="form-group">
                                <label for="userName">Nama Sampah</label>
                                <input type="text" name="nick" parsley-trigger="change" required
                                        placeholder="Nama Sampah" class="form-control" id="userName">
                            </div>
                            <div class="form-group">
                                <label for="emailAddress">Kode</label>
                                <input type="text" name="kode" parsley-trigger="change" required
                                        placeholder="KODE001" class="form-control" id="emailAddress" readonly>
                            </div>
                            <div class="form-group">
                                <label for="pass1">Jenis</label>
                                <input id="pass1" type="text" placeholder="Jenis Sampah" required
                                        class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="passWord2">Jumlah</label>
                                <input type="text" required
                                        placeholder="Jumlah" class="form-control" id="passWord2">
                            </div>
                            <div class="form-group">
                                <label for="passWord2">harga</label>
                                <input type="text" required
                                        placeholder="Harga" class="form-control" id="passWord2">
                            </div>
                            <div class="form-group">
                                <label for="userName">Gambar</label>
                                <input type="file" name="nick" required
                                    class="form-control" id="userName">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light waves-effect" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary waves-effect waves-light">Save changes</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
        <div id="hapus" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
