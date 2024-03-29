
<div class="panel panel-default">
    <div class="panel-heading">{{ $course->name }}
        <span class="label label-info">{{ $course->price }} грн</span>
    </div>
    <div class="panel-body">
        {{ $course->description }}
    </div>
    <div class="panel-footer">
        <a class="btn btn-default" href="{{ $course->about_link }}">Подробнее</a>
        @if(\Auth::check() && \Auth::user()->hasAccessToCourse($course))
            <a class="btn btn-success pull-right" href="{{ $course->link }}">Войти</a>
        @else
            <a class="btn btn-success pull-right" href="{{ $course->buy_link }}">Купить</a>
        @endif
    </div>
</div>