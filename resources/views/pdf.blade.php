<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="row">
        <table border="1" cellspacing="0" style="width: 100%; align-text:center">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>Deskripsi</th>
                    <th>Keterangan</th>
                    <th>Qty</th>
                    <th>Rate (Rp)</th>
                    <th>Amount (Rp)</th>
                    <!-- <th colspan="3">Aksi</th> -->
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; ?>
                @foreach ($detail as $details)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>
                            <div id="" data-title="Nama barang"> <span><b></b></span>
                                <br>&nbsp;&nbsp;- {{ $details->nama }}</div>
                        </td>
                        <td>
                        </td>
                        <td>
                            <div id="" data-title="Jumlah">{{$details->jumlah}}</a></div>
                        </td>
                        <td>
                            <div id=""  data-title="Rate"> Rp. {{ number_format($details->harga, 2, ',', '.') }}</a></div>
                        </td>
                        <td> <div id=""  data-title="Amount">
                                Rp. {{ number_format($details->subtotal, 2, ',', '.') }}</div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
