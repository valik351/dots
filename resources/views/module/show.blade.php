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
                    @foreach($module->problems as $problem)
                    <tr>
                        <th style="text-align: center;">{{ $problem->pivot->display_id }}</th>
                        <td><a href="{{ $problem->link }}">{{ $problem->name }}</a></td>
                        <td style="text-align: center;">
                            @for($i = 0; $i < $problem->difficulty; $i++)
                                <i class="glyphicon glyphicon-star" ></i>
                            @endfor
                        </td>
                        @if($problem->lastSolution)
                            <td class="{{ $problem->lastSolution->status == App\Solution::STATUS_OK ? 'success' : 'danger' }}" style="text-align: center;"><a href="{{ $problem->lastSolution->link }}">{{ $problem->lastSolution->status }}</a></td>
                            <td style="text-align: center;"><a href="{{ $problem->lastSolution->link }}">{{ $problem->lastSolution->success_percentage }}</a></td>
                        @else
                            <td style="text-align: center;">-</td>
                            <td style="text-align: center;">-</td>
                        @endif
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
