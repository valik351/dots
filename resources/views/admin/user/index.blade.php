@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="panel">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-sm-2">Пользователи</div>
                    <div class="col-sm-3"><a class="btn btn-primary" href="{{ action('Backend\UserController@showForm') }}">Добавить Куратора</a></div>

                    <form method="get">
                        <div class="input-group col-sm-6">
                            <input type="text" name="search" value="{{ Request::get('search') }}" class="form-control" placeholder="Текст для поиска...">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="submit">Найти</button>
                                @if(Request::get('search'))
                                    <a class="btn btn-danger" href="{{ action('Backend\UserController@index') }}">Отменить</a>
                                @endif
                            </span>
                        </div>
                    </form>
                </div>
            </div>
            <div class="panel-body">
                <table class="table table-striped table-bordered table-condensed">
                    <thead>
                    <tr>
                        <th>id</th>
                        <th>name</th>
                        <th>email</th>
                        <th>role</th>
                        <th>actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->role }}</td>
                            <td style="text-align: right; width: 187px">
                                <a class="btn btn-primary" href="{{ action('Backend\UserController@showForm', $user->id) }}">Изменить</a>
                                <form method="post" style="display: inline" action="{{ action('Backend\UserController@delete', $user->id) }}" class="delete_form_{{ $user->id }}">
                                    {{ csrf_field() }}
                                    <a class="btn btn-danger" data-toggle="confirmation" data-btn-ok-href="javascript:$('.delete_form_{{ $user->id }}').submit();" >Удалить</a>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{ $users->links() }}
            </div>
        </div>
    </div>
@endsection
