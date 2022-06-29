<div id="updatenasabah{{ $nasabahs->id_nasabah }}" class="modal fade" tabindex="-1" role="dialog"
    aria-labelledby="myModalLabel">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Edit Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form action="{{ route('updateNasabahh') }}" method="POST" class="parsley-examples"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <div class="form-group row">
                            <label for="example-text-input" class="col-lg-4 col-form-label">Nama
                            </label>
                            <div class="col-lg-8">
                                <input type="text" class="form-control" id="edit_nama" name="edit_nama"
                                    value="{{ $nasabahs->nama }}">
                                <input type="hidden" class="form-control" id="edit_id" name="edit_id"
                                    value="{{ $nasabahs->id_nasabah }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-lg-4 col-form-label">Alamat
                            </label>
                            <div class="col-lg-8">
                                <textarea type="text" class="form-control" id="edit_alamat" name="edit_alamat">{{ $nasabahs->alamat }}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-lg-4 col-form-label">NIK
                            </label>
                            <div class="col-lg-8">
                                <input type="text" class="form-control" id="edit_nik" name="edit_nik"
                                    value="{{ $nasabahs->nik }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-lg-4 col-form-label">No HP
                            </label>
                            <div class="col-lg-8">
                                <input type="text" class="form-control" id="edit_no_hp" name="edit_no_hp"
                                    value="{{ $nasabahs->no_hp }}">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="submit" class="btn btn-primary" value="Simpan">
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
