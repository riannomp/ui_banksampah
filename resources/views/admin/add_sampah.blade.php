<div id="addsampah" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Tambah Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form action="{{ route('addsampah') }}" method="POST" class="parsley-examples"
                    enctype="multipart/form-data" data-parsley-validate novalidate>
                    @csrf
                    <div class="form-group">
                        <div class="form-group row">
                            <label for="example-text-input" class="col-lg-4 col-form-label">Nama Sampah
                            </label>
                            <div class="col-lg-8">
                                <input type="text" name="nama" parsley-trigger="change" required
                                    class="form-control" id="userName">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-lg-4 col-form-label">Jenis
                            </label>
                            <div class="col-lg-8">
                                <select name="jenis" id="jenis" class="form-control">
                                    <option value="">Pilih Jenis</option>
                                    @foreach ($jenis as $jns)
                                        <option value="{{ $jns->id_jenis }}">
                                            {{ $jns->nama }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-lg-4 col-form-label">Keterangan
                            </label>
                            <div class="col-lg-8">
                                <input type="text" required class="form-control" name="keterangan" id="keterangan">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-lg-4 col-form-label">Harga Nasabah
                            </label>
                            <div class="col-lg-8">
                                <input type="text" required class="form-control" name="harga_nasabah"
                                    id="harga_nasabah">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-lg-4 col-form-label">Harga Koordinator
                            </label>
                            <div class="col-lg-8">
                                <input type="text" required class="form-control" name="harga_koordinator"
                                    id="harga_koordinator">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-lg-4 col-form-label">Gambar
                            </label>
                            <div class="col-lg-8">
                                <input type="file" name="gambar" required class="form-control" name="gambar"
                                    id="gambar">
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
