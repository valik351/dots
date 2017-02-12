@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @if($transaction->isSuccessful())
                <div class="alert alert-success">
                    Оплата успешна!
                </div>
            @else
                <div class="alert alert-danger">
                   Ошибка оплаты!
                </div>
            @endif
            @include('partial.course_preview', ['course' => $course])
        </div>
    </div>
@endsection
