@extends('layouts.app')
@section('scripts')
    <script src="{{ asset('js/ace/ace.js') }}"></script>
    <script src="{{ asset('js/ace/ext-language_tools.js') }}"></script>
@endsection
@section('content')
    <div class="container">
        <div class="panel">
            <div class="panel-body">
                <table class="table">
                    <tr>
                        <td>@lang('layout.date')</td>
                        <td>{{ $solution->created_at }}</td>
                    </tr>
                    <tr>
                        <td>@lang('layout.programming_language')</td>
                        <td>{{ $solution->programming_language->name }}</td>
                    </tr>
                    <tr>
                        <td>@lang('contest.points')</td>
                        <td>
                            @if($solution->owner->hasRole(\App\User::ROLE_CURATOR))
                                @if($solution->success_percentage)
                                    {{ $solution->success_percentage }} %
                                @else
                                                                        -
                                @endif
                            @else
                                {{ $solution->points }}
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td>@lang('contest.result')</td>
                        <td>
                            {{ $solution->status?: trans('contest.in_process') }}
                        </td>
                    </tr>
                    <tr>
                        <td>@lang('contest.max_memory')</td>
                        <td>{{ $solution->max_memory }}</td>
                    </tr>
                    <tr>
                        <td>@lang('contest.max_time')</td>
                        <td>{{ $solution->max_time }}</td>
                    </tr>
                </table>

                <div data-solution data-ace-mode="{{ $solution->programming_language->ace_mode }}" class="ace-editor"
                     id="editor">{{ $solution->status === App\Solution::STATUS_ZR?'Solution annulled':$solution->getCode() }}</div>
            </div>
        </div>
        <div class="panel">
            <div class="panel-heading">@lang('contest.reports')</div>
            <div class="panel-body">
                <table class="table">
                    <thead>
                    <tr>
                        <th>@lang('contest.points_of_total')</th>
                        <th>@lang('contest.exec_time')</th>
                        <th>@lang('contest.result')</th>
                        <th>@lang('contest.peak_mem')</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($solution->reports as $report)
                        <tr>
                            <td>{{ $solution->successful_reports? $solution->points / $solution->successful_reports: '-' }}</td>
                            <td>{{ $report->execution_time }}</td>
                            <td>
                                <span class="tag tag-{{ $report->status == App\SolutionReport::STATUS_OK? 'success' : 'danger' }}">{{ $report->status }}</span>
                            </td>
                            <td>{{ $report->memory_peak }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        {{--<div class="panel">--}}
            {{--<div class="panel-heading">@lang('contest.messages')</div>--}}
            {{--@foreach($solution->messages as $message)--}}
                {{--<div class="panel-body">--}}
                    {{--<b>{{ $message->user->name }}:</b>--}}
                    {{--{{ $message->text }}--}}
                {{--</div>--}}
            {{--@endforeach--}}
            {{--@if(Auth::user()->hasRole(\App\User::ROLE_CURATOR))--}}
                {{--<div class="panel-body">--}}
                    {{--<form method="post"--}}
                          {{--action="{{ action('SolutionMessageController@message', ['id' => $solution->id]) }}">--}}
                        {{--{{ csrf_field() }}--}}
                        {{--<div class="form-group">--}}
                            {{--<textarea rows="3" name="text" class="form-control"></textarea>--}}
                        {{--</div>--}}
                        {{--<div class="form-group">--}}
                            {{--<input type="submit" class="form-control" role="button" value="Post"/>--}}
                        {{--</div>--}}
                    {{--</form>--}}
                {{--</div>--}}
            {{--@endif--}}
        {{--</div>--}}
    </div>
@endsection
