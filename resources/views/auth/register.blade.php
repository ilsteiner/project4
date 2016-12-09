<div class="modal fade" role="dialog" id="registerModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="registerModalHeader">Create a new account</h4>
            </div>
            <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                <div class="modal-body">    
                    {{ csrf_field() }}

                    <div class="form-group{{ $errors->has('reg_name') ? ' has-error' : '' }}">
                        <label for="reg_name" class="col-md-4 control-label">Name</label>

                        <div class="col-md-6">
                            <input id="reg_name" type="text" class="form-control" name="reg_name" value="{{ old('reg_name') }}" required>

                            @if ($errors->has('reg_name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('reg_name') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('reg_email') ? ' has-error' : '' }}">
                        <label for="reg_email" class="col-md-4 control-label">E-Mail Address</label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control" name="reg_email" value="{{ old('reg_email') }}" required>

                            @if ($errors->has('reg_email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('reg_email') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('reg_password') ? ' has-error' : '' }}">
                        <label for="reg_password" class="col-md-4 control-label">Password</label>

                        <div class="col-md-6">
                            <input id="reg_password" type="password" class="form-control" name="reg_password" required>

                            @if ($errors->has('reg_password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('reg_password') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="reg_password-confirm" class="col-md-4 control-label">Confirm Password</label>

                        <div class="col-md-6">
                            <input id="reg_password-confirm" type="password" class="form-control" name="reg_password_confirmation" required>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <button type="submit" class="btn btn-primary">
                                Register
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
