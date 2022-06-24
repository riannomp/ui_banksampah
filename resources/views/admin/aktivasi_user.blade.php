<div class="modal fade bs-example-modal-sm" id="aktivasi{{ $usr->id_user }}" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
    aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mySmallModalLabel">Aktivasi User ?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="post" action="{{ url('admin/updateStatus') }}/{{ $usr->id_user }}">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <input name="edit_id" type="hidden" class="form-control" value="{{ $usr->id_user }}">
                        <label class="control-label mb-10 text-left">Status</label>
                        <select name="edit_status" value="{{ $usr->status }}" class="form-control select2">
                            <option value="{{ $usr->status }}">Pilih Status</option>
                            <option value="1">Aktif</option>
                            <option value="2">Non Aktif</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6">
                            <input type="submit" class="btn btn-primary" value="Save">
                        </div>
                    </div>

                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
