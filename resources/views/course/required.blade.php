@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Необходимо пройти следующие курсы:
                </div>
                <div class="panel-body">
                    @foreach($courses as $course)
                        <div class="col-md-4">
                            @include('partial.course_preview', ['course' => $course])
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
