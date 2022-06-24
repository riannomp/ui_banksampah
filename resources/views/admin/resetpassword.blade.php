    <div class="modal fade" id="resetpassword{{ $usr->id_user }}" tabindex="-1" role="dialog"
        aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">

        <div class="modal-dialog">
            <form action="{{ route('resetPassword') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h6 class="modal-title" id="myLargeModalLabel">Reset Password</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body">
                        <input name="edit_id" type="hidden" class="form-control" value="{{ $usr->id_user }}">
                        <p style="float: left; font-size: 15pt;">Apakah anda yakin akan mereset password user ini ?</p>
                        <input class="form-control" type="hidden" id="edit_password" name="edit_password"
                            value="{{ $usr->password }}">
                    </div>
                    <div class="modal-footer">
                        <div class="form-group" style="text-align:right;">
                            <button class="btn btn-primary" name="submit" type="submit">Reset</button>

                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
