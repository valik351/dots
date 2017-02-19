@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="panel">
            <div class="panel-heading">Пользователи</div>
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
                        <td>
                            <div class="btn-group">
                                <a class="btn btn-primary">Изменить</a>
                                <a class="btn btn-danger">Удалить</a>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            </div>
        </div>
    </div>
@endsection
