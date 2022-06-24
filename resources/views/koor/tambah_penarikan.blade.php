<div class="modal fade bs-example-modal-lg" id="penarikan{{ $nsb->id_nasabah }}" tabindex="-1" role="dialog"
    aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">

    <div class="modal-dialog modal-lg">
        <form action="" method="POST"  enctype="multipart/form-data">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myLargeModalLabel">Penarikan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <input name="edit_id" type="hidden" class="form-control" value="">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                {{-- <input name="edit_id" type="hidden" class="form-control" value="{{ $usr->id }}"> --}}
                                <label class="control-label mb-10 text-left">Total Saldo</label>
                                <input name="nama" type="text" class="form-control"
                                    value="Rp {{ number_format($nsb->saldo, 2, ',', '.') }}" readonly>
                            </div>

                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                {{-- <input name="edit_id" type="hidden" class="form-control" value="{{ $usr->id }}"> --}}
                                <label class="control-label mb-10 text-left">Penarikan</label>
                                <input name="nama" type="text" class="form-control" value="">
                            </div>

                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="form-group" style="text-align:right;">
                        <button class="btn btn-primary" name="submit" type="submit">Penarikan</button>
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
