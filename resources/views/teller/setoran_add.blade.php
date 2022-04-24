@extends('layout.master')
@section('tittle', 'Tambah Setoran')
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
                    <h4 class="page-title">Tambah Setoran Sampah</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card-box">

                    <form action="#" class="parsley-examples" data-parsley-validate novalidate>
                        <div class="row">
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="userName">Nama Nasabah</label>
                                    <select name="nasabah" id="nasabah" class="form-control select2" data-toggle="select2">
                                        <option value="">Pilih Nama Nasabah</option>
                                        @foreach ($nasabah as $nsb)
                                            <option value="{{ $nsb->nama }}">{{ $nsb->nama }} </option>
                                        @endforeach
                                    </select>
                                </div>

                            </div>

                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="id_setoran">Kode Setoran</label>
                                        @foreach ((array) $id_setoran as $id_setorans)
                                        <input type="hidden" id="id_setoran2" name="id_setoran2" value="{{ $id_setorans }}" class="form-control" placeholder="" readonly>
                                        <input type="text" id="id_setoran" name="id_setoran" value="{{ $id_setorans }}" class="form-control" placeholder="" readonly>
                                        @endforeach
                                    </div>
                                </div>

                            <div class="col-4">
                                <div class="form-group">
                                    <label for="userName">Tanggal Setor</label>
                                    <input type="date" class="form-control mb-3" placeholder="">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="userName">Nama Sampah</label>
                                    <select name="nama" id="nama" class="form-control select2" data-toggle="select2">
                                        <option value="">Pilih Nama Sampah</option>
                                        @foreach ($sampah as $sampahs)
                                            <option value="{{ $sampahs->nama }}">{{ $sampahs->nama }} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="userName">Jumlah</label>
                                    <input type="text" name="jumlah" id="jumlah" parsley-trigger="change" class="form-control"
                                        id="userName">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="userName">Harga</label>
                                    <input type="text" name="harga" id="harga" parsley-trigger="change" class="form-control"
                                        id="userName">
                                </div>
                            </div>

                        </div>

                        <div class="form-group" style="text-align:right;">
                            <button type="button" onclick="ambildata()" class="btn btn-primary ">Tambah Data</button>
                        </div>

                        <div class="col-14">
                            <div class="card-box">
                                <div class="panel-heading">
                                    <div class="pull-left">
                                        <h6 class="panel-title txt-dark">Setoran Sampah</h6>
                                    </div>
                                </div>
                                <div>
                                    <div class="panel-body">
                                        <table class="table table-bordered dt-responsive nowrap">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama Sampah</th>
                                                    <th>Jumlah</th>
                                                    <th>Harga</th>
                                                    <th>Remove</th>
                                                </tr>
                                            </thead>
                                            <tbody id="TabelDinamis">
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12" style="text-align:right;">
                            <button type="submit" class="btn btn-success ">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script type="text/javascript">
        function ambildata() {

            // var tgl = document.getElementById("tgl_pinjam").value;
            // var kebutuhan = document.getElementById("kebutuhan").value;
            // var jumlah = document.getElementById("jumlah").value;
            // var nama_barang = document.getElementById("nama_barang").value;

            // if (tgl == "") {
            //     alert("Tanggal Pinjam tidak boleh kosong");
            //     return false;
            // } else if (jumlah == "") {
            //     alert("Jumlah tidak boleh kosong");
            //     return false;
            // } else if (kebutuhan == "") {
            //     alert("Kebutuhan tidak boleh kosong");
            //     return false;
            // } else if (nama_barang == "") {
            //     alert("nama barang tidak boleh kosong");
            //     return false;
            // }

            var nama = document.getElementById('nama').value;
            var jumlah = document.getElementById('jumlah').value;
            var harga = document.getElementById('harga').value;
            addrow(nama, jumlah, harga);
        }
        var i = 0;

        function addrow(nama, jumlah, harga) {
            i++;
            $('#TabelDinamis').append('<tr id="row' + i + '"><td><input type="text" style="outline:none;border:0;" readonly value="' + i +
                '"><td><input type="text" style="outline:none;border:0;" readonly name="nama[]" id="nama" value="' + nama +
                '"></td><td><input type="text" style="outline:none;border:0;" name="jumlah[]" id="jumlah" value="' + jumlah +
                '"></td><td><input type="text" style="outline:none;border:0;" name="harga[]" id="harga" value="' + harga +
                '"></td><td><button type="button" id="' + i + '" class="btn btn-danger btn-small remove_row">&times;</button></td></tr>');
        };
        $(document).on('click', '.remove_row', function() {
            var row_id = $(this).attr("id");
            $('#row' + row_id + '').remove();
        });

    </script>
