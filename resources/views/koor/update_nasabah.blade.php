<div id="updatenasabah{{ $nasabahs->id_nasabah}}" class="modal fade" tabindex="-1" role="dialog"
    aria-labelledby="myModalLabel">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Update Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form action="{{ route('updateNasabahh') }}" method="POST" class="parsley-examples" enctype="multipart/form-data"
                    data-parsley-validate novalidate>
                    @csrf
                    <div class="form-group">
                        <input name="edit_id" type="hidden" class="form-control" value="{{ $nasabahs->id_nasabah }}">
                        <label for="userName">Nama Nasabah</label>
                        <input type="text" name="edit_nama" parsley-trigger="change" required
                            value="{{ $nasabahs->nama }}" class="form-control" id="userName">
                    </div>

                    <div class="form-group">
                        <label for="jenis">NIK</label>
                        <input type="text" name="edit_nik" parsley-trigger="change"
                            value="{{ $nasabahs->nik }}" class="form-control" id="userName">
                    </div>
                    <div class="form-group">
                        <label for="nama">Alamat</label>
                        <textarea type="text" class="form-control" id="alamat" name="edit_alamat">{{ $nasabahs->alamat }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="nama">No HP</label>
                        <input type="text" name="edit_no_hp" parsley-trigger="change"
                            value="{{ $nasabahs->no_hp }}" class="form-control" id="userName">
                    </div>

                    <div class="modal-footer">
                        <input type="submit" class="btn btn-primary" value="Simpan">
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
