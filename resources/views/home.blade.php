@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @for($i = 0; $i < 12; $i++)
                <div class="col-md-4">
                    @include('partial.course_preview', ['course' => App\Course::first()])
                </div>
            @endfor
        </div>
    </div>
@endsection
