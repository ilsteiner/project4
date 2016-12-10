@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">Reset Password</div>

            <div class="panel-body">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif

                <form class="form-horizontal" role="form" method="POST" action="{{ url('/password/reset') }}">
                    {{ csrf_field() }}

                    <input type="hidden" name="token" value="{{ $token }}">

                    <div class="form-group{{ $errors->has('reset_email') ? ' has-error' : '' }}">
                        <label for="reset_email" class="col-md-4 control-label">E-Mail Address</label>

                        <div class="col-md-6">
                            <input id="reset_email" type="email" class="form-control" name="reset_email" value="{{ $reset_email or old('reset_email') }}" required autofocus>

                            @if ($errors->has('reset_email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('reset_email') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <label for="reset_password" class="col-md-4 control-label">Password</label>

                        <div class="col-md-6">
                            <input id="reset_password" type="password" class="form-control" name="reset_password" required>

                            @if ($errors->has('reset_password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('reset_password') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                        <label for="reset_password-confirm" class="col-md-4 control-label">Confirm Password</label>
                        <div class="col-md-6">
                            <input id="reset_password-confirm" type="password" class="form-control" name="reset_password_confirmation" required>

                            @if ($errors->has('reset_password_confirmation'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('reset_password_confirmation') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <button type="submit" class="btn btn-primary">
                                Reset Password
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
