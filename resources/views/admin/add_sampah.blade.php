<div id="addsampah" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Tambah Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form action="{{ route('addsampah') }}" method="POST" class="parsley-examples" enctype="multipart/form-data" data-parsley-validate novalidate>
                    @csrf
                    <div class="form-group">
                        <label for="userName">Nama Sampah</label>
                        <input type="text" name="nama" parsley-trigger="change" required placeholder="Nama Sampah"
                            class="form-control" id="userName">
                    </div>
                    <div class="form-group">
                        <label for="jenis">Jenis</label>
                        <select name="jenis" id="jenis" class="form-control">
                            <option value="">Pilih Jenis</option>
                            @foreach ($jenis as $jns)
                            <option value="{{ $jns->id_jenis }}">{{ $jns->id_jenis }} | {{ $jns->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="jumlah">Jumlah</label>
                        <input type="text" required placeholder="Jumlah" class="form-control" name="jumlah" id="jumlah">
                    </div>
                    <div class="form-group">
                        <label for="harga">Harga</label>
                        <input type="text" required placeholder="Harga" class="form-control" name="harga" id="harga">
                    </div>
                    <div class="form-group">
                        <label for="gambar">Gambar</label>
                        <input type="file" name="gambar" required class="form-control" name="gambar" id="gambar">
                    </div>
                    <div class="modal-footer">
                        <input type="submit" class="btn btn-primary" value="Simpan">
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
