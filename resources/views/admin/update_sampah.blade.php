<div id="updatesampah{{$sampah->id_sampah}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Update Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form action="" method="POST" class="parsley-examples"
                    enctype="multipart/form-data" data-parsley-validate novalidate>
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <div class="form-group">
                        <input name="edit_id" type="hidden" class="form-control" value="{{$sampah->id_sampah}}">
                        <label for="userName">Nama Sampah</label>
                        <input type="text" name="nama" parsley-trigger="change" required value="{{$sampah->nama}}"
                            class="form-control" id="userName">
                    </div>
                    <div class="form-group">
                        <label for="jenis">Jenis</label>
                        <select name="jenis" id="jenis" class="form-control">
                            <option value="{{ $sampah->id_jenis }}">Pilih Jenis</option>
                            @foreach ($jenis as $jns)
                                <option value="{{ $jns->id_jenis }}">{{ $jns->id_jenis }} | {{ $jns->nama }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="jumlah">Jumlah</label>
                        <input type="text" required placeholder="Jumlah" class="form-control" name="jumlah"
                            id="jumlah" value="{{$sampah->jumlah}}">
                    </div>
                    <div class="form-group">
                        <label for="harga">Harga</label>
                        <input type="text" required placeholder="Harga" class="form-control" name="harga" id="harga" value="{{$sampah->harga}}">
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
