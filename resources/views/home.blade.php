@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @foreach(App\Course::all() as $course)
                <div class="col-md-4">
                    @include('partial.course_preview', ['course' => $course])
                </div>
            @endforeach
        </div>
    </div>
@endsection
