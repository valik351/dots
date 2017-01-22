@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ $course->name }}
                    <span class="label label-info">{{ $course->price }} грн</span>
                </div>
                <div class="panel-body">
                    {!! $course->content !!}
                </div>
                <div class="panel-footer">
                    <a class="btn btn-success" href="{{ $course->buy_link }}">Купить</a>
                </div>
            </div>
        </div>
    </div>
@endsection
