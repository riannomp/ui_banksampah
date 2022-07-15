@extends('layout.master')
@section('tittle', 'Detail Setoran')
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
                    <h4 class="page-title">Detail Setoran Sampah</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card-box">
                    {{-- <h4 class="header-title">Basic example</h4> --}}
                    <div class="row">
                        <div class="col-4 ">
                            <div class="form-group text-center">
                                <span class="logo-lg">
                                    <img src="{{ asset('template/dist') }}/assets/images/sampah/kabmadiun.jpg"
                                        alt="" height="100">
                                    <!-- <span class="logo-lg-text-dark">Uplon</span> -->
                                </span>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="text-center">
                                <H2>BANK SAMPAH </H2>
                                <h2>KABUPATEN MADIUN</h2>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group text-center">
                                <span class="logo-lg">
                                    <img src="{{ asset('template/dist') }}/assets/images/sampah/pesilat.png"
                                        alt="" height="120">
                                    <!-- <span class="logo-lg-text-dark">Uplon</span> -->
                                </span>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        @foreach ($data_setor as $data_setor)
                            <div class="col-4">
                                <div class="form-group">

                                    <table>
                                        <div class="text-left">
                                            <h6 class="txt-dark"><strong>Kode Setoran :</strong> </h6>
                                            <p>{{ $data_setor->id_setoran }}</p>
                                        </div>


                                    </table>

                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <div class="text-center">
                                        <h6 class="txt-dark"><strong>Tanggal Setor :</strong></h6>
                                        <p> {{ date('d M Y', strtotime($data_setor->tanggal)) }}</p>
                                    </div>
                                </div>
                            </div>
                            @if ($data_setor->status == '1')
                            <div class="col-4">
                                <div class="form-group">
                                    <div class="text-right">
                                        <h6 class="txt-dark"><strong>Penyetor :</strong></h6>
                                        <p> {{ $data_setor->nasabah->nama }}</p>
                                    </div>
                                </div>
                            </div>
                            @else
                            <div class="col-4">
                                <div class="form-group">
                                    <div class="text-right">
                                        <h6 class="txt-dark"><strong>Nasabah :</strong></h6>
                                        <p> {{ $data_setor->koor->nama }}</p>
                                    </div>
                                </div>
                            </div>
                            @endif
                        @endforeach
                    </div>
                    <br>
                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama Sampah</th>
                                    <th>Jumlah</th>
                                    <th>Harga</th>
                                    <th>Sub Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                @foreach ($detail_setor as $detail)
                                    <tr>
                                        <th scope="row">{{ $no++ }}</th>
                                        <td>{{ $detail->sampah->nama }}</td>
                                        <td>{{ $detail->jumlah }}</td>
                                        <td>Rp {{ number_format($detail->harga), 2 }}</td>
                                        <td>Rp {{ number_format($detail->subtotal), 2 }}</td>
                                    </tr>
                                @endforeach

                                <tr>
                                    <th scope="row"></th>
                                    <td></td>
                                    <td></td>
                                    <td><strong>Total</strong></td>
                                    <td><strong>RP {{ number_format($total), 2 }} </strong></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    {{-- <div class="form-group" style="text-align:right;">
                        <a href="{{ route('cetak_pdf', $id_setoran) }}" ><button type="button" class="btn btn-success btn-icon right-icon">
                                <i class="fa fa-print"></i><span> Print</span></button></a>
                    </div> --}}
                    <div class="pull-right mr-30" style="text-align:right;">
                        <button type="button" class="btn btn-success btn-icon left-icon" onclick="cetak()" id="print">
                            <i class="fa fa-print"></i><span> Print</span>
                        </button>
                    </div>

                </div>

            </div>

        </div>

    </div>

@endsection
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
    crossorigin="anonymous"></script>
<script>
    function cetak() {
        $('#print').addClass('d-none');
        window.print();
    };
</script>
