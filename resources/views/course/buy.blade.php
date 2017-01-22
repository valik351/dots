@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="panel panel-default col-md-6 col-md-offset-3">
                <div class="panel-heading">
                    Итого
                </div>
                <table class="table">
                    <tr>
                        <td>
                            Курс
                        </td>
                        <td>
                            {{ $course->name }}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            К Оплате
                        </td>
                        <td>
                            {{ $course->price }} грн
                        </td>
                    </tr>
                </table>
                <div class="panel-footer">
                    <div class="row">
                        <div class="col-sm-12">
                            {{--<a class="btn btn-success" href="{{ $course->pay_link }}">Оплатить</a>--}}
                            {!! $pay_button_html !!}
                        </div>
                        <div class="col-sm-12">
                            <p>Нажав кнопку «Оплатить», вы автоматически принимаете <a>пользовательское соглашение</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
