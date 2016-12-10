<div class="modal fade" role="dialog" id="loginModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="loginModalHeader">Log in to existing account</h4>
            </div>
            <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                <div class="modal-body">   
                    {{ csrf_field() }}

                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <label for="password" class="col-md-4 control-label">Password</label>

                        <div class="col-md-6">
                            <input id="password" type="password" class="form-control" name="password" required>

                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <div class="form-group">
                        <div class="checkbox" id="remember">
                            <label>
                                <input
                                    class="form-control"
                                    type="checkbox"
                                    name="remember"
                                    data-size="tiny"
                                    data-inverse="true"
                                    data-off-text="&#xf057; Remember Me"
                                    data-on-text="&#xf058; Remember Me"
                                    data-on-color="success"
                                    data-off-color="danger"
                                    data-label-width="auto"
                                    data-handle-width="auto"
                                >
                            </label>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-xs-6 col-xs-offset-3">
                            <button type="submit" class="btn btn-primary btn-block">
                                Login
                            </button>
                        </div>
                    </div>

                    {{-- <div class="form-group">
                        <div class="col-xs-5 col-xs-offset-3">
                            <a class="btn btn-link" href="{{ url('/password/reset') }}">
                                Forgot Your Password?
                            </a>
                        </div>
                    </div> --}}
                </div>
            </form>
        </div>
    </div>
</div>