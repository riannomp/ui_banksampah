<div class="modal fade" id="addjenis" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
    aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mySmallModalLabel">Tambah Jenis Sampah</h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="post" action="{{ url('admin/addjenis') }}" enctype="multipart/form-data">
                   @csrf
                    <div class="form-group">
                        {{-- <input name="edit_id" type="hidden" class="form-control" value="{{ $usr->id }}"> --}}
                        <label class="control-label mb-10 text-left">Jenis</label>
                        <input name="nama" type="text" class="form-control" value="">
                    </div>

                    <div class="form-group">
                        <div class="col-md-6">
                            <input type="submit" class="btn btn-primary" value="Simpan">
                        </div>
                    </div>

                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
