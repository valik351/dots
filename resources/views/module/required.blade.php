@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Необходимо пройти следующие модули:
                </div>
                <div class="panel-body">
                    @foreach($modules as $module)
                        <div class="col-md-4">
                            @include('partial.module_preview', ['module' => $module])
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
