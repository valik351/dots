@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @foreach($course->modules as $module)
                <div class="col-xs-12">
                    @include('partial.module_preview', ['module' => $module])
                </div>
            @endforeach
        </div>
    </div>
@endsection
