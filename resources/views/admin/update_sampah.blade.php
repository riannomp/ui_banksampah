<div id="updatesampah{{$sampah->id_sampah}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Update Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form action="{{ route('updatesampah2') }}" method="POST" class="parsley-examples"
                enctype="multipart/form-data" data-parsley-validate novalidate>
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <div class="form-group">
                        <input name="edit_id" type="hidden" class="form-control" value="{{$sampah->id_sampah}}">
                        <label for="userName">Nama Sampah</label>
                        <input type="text" name="edit_nama" parsley-trigger="change" required value="{{$sampah->nama}}"
                            class="form-control" id="userName">
                    </div>
                    <div class="form-group">
                        <label for="jenis">Jenis</label>
                        <input type="text" name="edit_jenis" parsley-trigger="change" readonly value="{{$sampah->jenis->nama}}"
                            class="form-control" id="userName">
                    </div>
                    <div class="form-group">
                        <label for="jenis">Keterangan</label>
                        <input type="text" name="edit_keterangan" parsley-trigger="change" value="{{$sampah->keterangan}}"
                            class="form-control" id="userName">
                    </div>
                    <div class="form-group">
                        <label for="harga">Harga Nasabah</label>
                        <input type="text" required placeholder="Harga" class="form-control" name="edit_harga_nasabah" id="harga" value="{{$sampah->harga_nasabah}}">
                    </div>
                    <div class="form-group">
                        <label for="harga">Harga Koordinator</label>
                        <input type="text" required placeholder="Harga" class="form-control" name="edit_harga_koordinator" id="harga" value="{{$sampah->harga_koordinator}}">
                    </div>
                    <div class="form-group">
                        <label for="gambar">Gambar</label>
                        <input type="file" name="edit_gambar" required class="form-control" id="gambar">
                    </div>
                    <div class="modal-footer">
                        <input type="submit" class="btn btn-primary" value="Simpan">
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
