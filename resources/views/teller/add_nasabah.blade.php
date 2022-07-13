<div id="addnasabah" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Tambah Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form action="{{ route('addNasabahTeller') }}" method="POST" class="parsley-examples"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <div class="form-group row">
                            <label for="example-text-input" class="col-lg-4 col-form-label">Nama
                            </label>
                            <div class="col-lg-8">
                                <input type="text" class="form-control" id="nama" name="nama">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-lg-4 col-form-label">Alamat
                            </label>
                            <div class="col-lg-8">
                                <textarea type="text" class="form-control" id="alamat" name="alamat"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-lg-4 col-form-label">NIK
                            </label>
                            <div class="col-lg-8">
                                <input type="text" class="form-control" id="nik" name="nik">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-lg-4 col-form-label">No HP
                            </label>
                            <div class="col-lg-8">
                                <input type="text" class="form-control" id="no_hp" name="no_hp">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-lg-4 col-form-label">Email
                            </label>
                            <div class="col-lg-8">
                                <input type="email" class="form-control" id="email" name="email">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-lg-4 col-form-label">
                            </label>
                            <div class="col-lg-8">
                                <p>* Password default (12345678)</p>
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
