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
                    <th>nama</th>
                    <th>harga</th>
                   
                    <!-- <th colspan="3">Aksi</th> -->
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; ?>
                @foreach ($setoran as $setorans)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>
                            <div id="" data-title="Nama barang"> <span><b></b></span>
                                <br>&nbsp;&nbsp;- {{ $setorans->nasabah->nama }}</div>
                        </td>

                        <td>
                            <div id=""  data-title="Rate"> Rp. {{ number_format($setorans->total_harga, 2, ',', '.') }}</a></div>
                        </td>

                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
