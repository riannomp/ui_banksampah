<div class="modal fade" id="hapussampah{{ $sampah->id_sampah }}" tabindex="-1" role="dialog"
    aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">

    <div class="modal-dialog">
        <form action="/admin/data_sampah/hapus/{{ $sampah->id_sampah }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="myLargeModalLabel">Hapus</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <p style="float: left; font-size: 15pt;">Apakah anda yakin akan menghapus data ini ?</p>

                </div>
                <div class="modal-footer">
                    <div class="form-group" style="text-align:right;">
                        <button class="btn btn-primary" name="submit" type="submit">Hapus</button>

                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
