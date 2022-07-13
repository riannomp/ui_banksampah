<div id="ubahpassword{{ $user->id_user }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Update Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form action="{{ route('updateAuth') }}" method="POST" class="parsley-examples" enctype="multipart/form-data"
                    data-parsley-validate novalidate>
                    @csrf
                    <div class="form-group row">
                        <label for="example-text-input" class="col-lg-2 col-form-label">Email
                        </label>
                        <div class="col-lg-8">
                            <input class="form-control" name="edit_email" value="{{ $user->email }}" type="text">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="example-search-input" class="col-lg-2 col-form-label">Password</label>
                        <div class="col-lg-8">
                            <input class="form-control" name="edit_password" type="password" id="inputPassword"
                                value="">

                            <input type="checkbox" onclick="shwoPassword()"> Show Password
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
