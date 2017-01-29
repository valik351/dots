@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading">Задачи</div>
                <table class="table">
                    <thead>
                    <tr>
                        <th style="text-align: center;">ID</th>
                        <th>Название</th>
                        <th style="text-align: center;">Сложность</th>
                        <th style="text-align: center;">Результаты</th>
                        <th style="text-align: center;">Баллы</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th style="text-align: center;">A</th>
                        <td><a href="#">A плюс B - experimental</a></td>
                        <td style="text-align: center;"><i class="glyphicon glyphicon-star" ></i><i class="glyphicon glyphicon-star"></i><i class="glyphicon glyphicon-star"></i><i class="glyphicon glyphicon-star"></i><i class="glyphicon glyphicon-star"></i></td>
                        <td class="danger" style="text-align: center;"><a href="#">WA</a></td>
                        <td style="text-align: center;"><a href="#">50</a></td>
                    </tr>
                    <tr>
                        <th style="text-align: center;">B</th>
                        <td><a href="#">Подготовка</a></td>
                        <td style="text-align: center;"><i class="glyphicon glyphicon-star" ></i><i class="glyphicon glyphicon-star"></i><i class="glyphicon glyphicon-star"></i><i class="glyphicon glyphicon-star"></i><i class="glyphicon glyphicon-star"></i></td>
                        <td class="success" style="text-align: center;"><a href="#">OK</a></td>
                        <td style="text-align: center;"><a href="#">100</a></td>
                    </tr>
                    <tr>
                        <th style="text-align: center;">C</th>
                        <td><a href="#">Палиндром</a></td>
                        <td style="text-align: center;"><i class="glyphicon glyphicon-star" ></i><i class="glyphicon glyphicon-star"></i><i class="glyphicon glyphicon-star"></i><i class="glyphicon glyphicon-star"></i><i class="glyphicon glyphicon-star"></i></td>
                        <td style="text-align: center;">-</td>
                        <td style="text-align: center;">-</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
