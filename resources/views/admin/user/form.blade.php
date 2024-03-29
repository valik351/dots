@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="panel">
            <div class="panel-heading">{{ $user ? 'Изменить Пользователя № ' . $user->id : 'Создать Пользователя' }}</div>
            <div class="panel-body">
                <form class="form-horizontal" role="form" method="POST" action="{{ $user ? action('Backend\UserController@update', $user->id) : action('Backend\UserController@create') }}">
                    {{ csrf_field() }}

                    <input style="display: none" name="role" value="curator">
                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') ?: ($user ? $user->email :'') }}" required autofocus>

                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="email" class="col-md-4 control-label">Name</label>

                        <div class="col-md-6">
                            <input id="email" type="text" class="form-control" name="name" value="{{ old('name') ?: ($user ? $user->name :'') }}" required autofocus>

                            @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <label for="password" class="col-md-4 control-label">Password</label>

                        <div class="col-md-6">
                            <input id="password" type="password" class="form-control" name="password">

                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                        <div class="col-md-6">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-8 col-md-offset-4">
                            <button type="submit" class="btn btn-primary">
                                {{ $user ? 'Изменить Пользователя' : 'Создать Пользователя' }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
