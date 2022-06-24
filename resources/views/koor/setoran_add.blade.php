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
                    <form action="{{ route('koor.setoran') }}" class="parsley-examples" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-12 col-md-4 col-lg-4">
                                <div class="form-group">
                                    <label for="userName">Nama Nasabah</label>
                                    <select name="nasabah" id="nasabah" class="form-control">
                                        <option value="">Pilih Nama Nasabah</option>
                                        @foreach ($nasabah as $nsb)
                                            <option value="{{ $nsb->id_nasabah }}">{{ $nsb->nama }} </option>
                                        @endforeach
                                    </select>
                                </div>

                            </div>

                            <div class="col-12 col-md-4 col-lg-4">
                                <div class="form-group">
                                    <label for="id_setoran">Kode Setoran</label>
                                    @foreach ((array) $id_setoran as $id_setorans)
                                        <input type="hidden" id="id_setoran2" name="id_setoran2"
                                            value="{{ $id_setorans }}" class="form-control" placeholder="" readonly>
                                        <input type="text" id="id_setoran" name="id_setoran" value="{{ $id_setorans }}"
                                            class="form-control" placeholder="" readonly>
                                    @endforeach
                                </div>
                            </div>

                            <div class="col-12 col-md-4 col-lg-4">
                                <div class="form-group">
                                    <label for="tanggal">Tanggal Setor</label>
                                    <input type="date" class="form-control mb-3" placeholder="" name ="tanggal"
                                        id="tanggal">
                                </div>
                            </div>
                            <div class="col-12 col-md-3 col-lg-3">
                                <div class="form-group">
                                    <label for="userName">Nama Sampah</label>
                                    <select name="nama" id="nama" class="form-control">
                                        <option value="">Pilih Nama Sampah</option>
                                        @foreach ($sampah as $sampahs)
                                            <option value="{{ $sampahs->id_sampah }}">{{ $sampahs->nama }} |
                                                {{ $sampahs->id_sampah }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-4 col-md-3 col-lg-3">
                                <div class="form-group">
                                    <label for="userName">Jumlah</label>
                                    <input type="text" name="jumlah" id="jumlah" class="form-control a1">
                                </div>
                            </div>
                            <div class="col-4 col-md-3 col-lg-3">
                                <div class="form-group">
                                    <label for="userName">Harga</label>
                                    <input type="text" name="harga" id="harga" class="form-control b1">
                                </div>
                            </div>
                            <div class="col-4 col-md-3 col-lg-3">
                                <div class="form-group">
                                    <label for="userName">Sub Total</label>
                                    <input type="text" name="sub_total" id="sub_total" class="form-control" readonly>
                                </div>
                            </div>
                        </div>

                        <div class="form-group" style="text-align:right;">
                            <button type="button" onclick="ambildata()" class="btn btn-primary ">Tambah Data</button>
                        </div>
                        <div class="card-box">
                            <div style="overflow-y: auto">
                                <div class="col-12" style="height: 300px">
                                    <div>
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
                                                            <th>Kode Sampah</th>
                                                            <th>Jumlah</th>
                                                            <th>Harga</th>
                                                            <th>Sub Total</th>
                                                            <th>Remove</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="TabelDinamis">
                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <td align="right" colspan="4"><strong>Total</strong></td>
                                                            <td align="left" colspan="2">
                                                                <input style="outline:none;border:0;" type="text"
                                                                    name="total" id="total">
                                                            </td>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 mt-2" style="text-align:right;">
                            <button type="submit" class="btn btn-success ">Simpan</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript">
        setInterval(function() {
            var jumlah = $('#jumlah').val();
            var harga = $('#harga').val();

            var sub_total = jumlah * harga;
            $('#sub_total').val(sub_total);
        }, 500);

        setInterval(function() {
            // total = (parseInt(total) - parseInt($('#sub_total' + row_id + '').val()));
            // $("#total").val(pecah(total));
            var sum = 0;
            $('.sub_total').each(function() {
                sum += parseFloat($(this).val());
            });
            $('#total').val(sum);
        }, 1);

        function ambildata() {

            var nasabah = document.getElementById("nasabah").value;
            var tanggal = document.getElementById("tanggal").value;
            var nama = document.getElementById("nama").value;
            var jumlah = document.getElementById("jumlah").value;
            var harga = document.getElementById("harga").value;


            if (nasabah == "") {
                alert("Nama Nasabah tidak boleh kosong");
                return false;
            } else if (tanggal == "") {
                alert("Tanggal Setor tidak boleh kosong");
                return false;
            } else if (nama == "") {
                alert("Nama Sampah tidak boleh kosong");
                return false;
            } else if (jumlah == "") {
                alert("Jumlah Sampah tidak boleh kosong");
                return false;
            } else if (harga == "") {
                alert("Harga Sampah tidak boleh kosong");
                return false;
            }

            var id_setoran = document.getElementById('id_setoran').value;
            var nama = document.getElementById('nama').value;
            var jumlah = document.getElementById('jumlah').value;
            var harga = document.getElementById('harga').value;
            var sub_total = document.getElementById('sub_total').value;
            addrow(id_setoran, nama, jumlah, harga, sub_total);
        }
        var i = 0;

        function addrow(id_setoran, nama, jumlah, harga, sub_total) {
            i++;
            $('#TabelDinamis').append('<tr id="row' + i +
                '"><td><input type="text" style="outline:none;border:0;" readonly value="' + i +
                '"><td style="display:none;"><input type="text" style="outline:none;border:0;" readonly name="id_setoran[]" id="id_setoran" value="' +
                id_setoran +
                '"><td><input type="text" style="outline:none;border:0;" readonly name="nama[]" id="nama" value="' +
                nama +
                '"></td><td><input type="text" style="outline:none;border:0;" name="jumlah[]" id="jumlah" value="' +
                jumlah +
                '"></td><td><input type="text" style="outline:none;border:0;" name="harga[]" id="harga" value="' +
                harga +
                '"><td><input class="sub_total" type="text" style="outline:none;border:0;" name="sub_total[]" id="sub_total" value="' +
                sub_total +
                '"></td><td><button type="button" id="' + i +
                '" onclick="removed(' + i + ')" class="btn btn-danger btn-small remove_row">&times;</button></td></tr>');
            total = (parseInt(total) + parseInt(sub_total));
            $("#total").val(total);
        };

        // $('.remove_row').each(function() {
        // $('.remove_row').click(function() {
        //     var row_id = $(this).attr("id");
        //     console.log(row_id);
        //     // $('#row' + row_id + '').remove();
        // });
        // });
        function removed(param) {
            $('#row' + param + '').remove();
        }
    </script>
