@extends('layouts.app')
@section('scripts')
    <script src="{{ asset('ace/ace.js') }}"></script>
    <script src="{{ asset('ace/ext-language_tools.js') }}"></script>
@endsection
@section('content')
    <div class="container">
        <div class="panel">
            <div class="panel-heading">
                {{ $problem->name }}
                <span class="float-xs-right">
                    @for($i = 0; $i < $problem->difficulty; $i++)
                        <i class="fa fa-star" aria-hidden="true"></i>
                    @endfor
                </span>
            </div>
            <div class="panel-body">

                <div class="align-center form-group">
                    <img src="{{ $problem->image }}"  style="max-width: 100%">
                </div>

            </div>
        </div>
            <div class="panel">
                <div class="panel-heading">
                    Новое решение
                </div>
                <div class="panel-body">
                    <form data-submit-solution method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group row {{ $errors->has('programming_language') ? ' has-danger' : '' }}">
                            <label class="col-md-4 col-form-label" for="programming_language">Язык программирования</label>
                            <div class="col-md-8">
                                <select data-programming-languages name="programming_language"
                                        class="form-control border-input">
                                    @foreach($module->programmingLanguages as $language)
                                        <option data-ace-mode="{{ $language->ace_mode }}"
                                                value="{{ $language->id }}">{{ $language->name }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('programming_language'))
                                    <span class="form-control-feedback">
                                        <strong>{{ $errors->first('programming_language') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="ace-editor" id="editor"></div>
                        </div>

                        <div class="form-group row{{ $errors->has('solution_code_file') ? ' has-danger' : '' }}">
                            <label class="form-control-label col-md-4" for="solution_code_file">Загрузите файл</label>
                            <div class="col-md-8">
                                <input type="file" name="solution_code_file"/>
                                @if ($errors->has('solution_code_file'))
                                    <span class="form-control-feedback">
                                        <strong>{{ $errors->first('solution_code_file') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <input type="hidden" name="solution_code"/>
                        <hr class="hidden-border">
                        <div class="form-group">
                            <button type="submit" class="btn btn-success">Отправить</button>
                        </div>
                    </form>
                </div>
            </div>
        <div class="panel">
            <div class="panel-heading">Мои решения этой задачи</div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-sm">
                        <thead>
                        <tr>
                            <th>Дата</th>
                            <th>Баллы</th>
                            <th>Исходны код</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($solutions as $solution)
                            <tr>
                                <td>{{ $solution->created_at }}</td>
                                <td>{{ $solution->getPoints() }}</td>
                                <td>
                                    <a href="{{ $solution->link }}">Решение</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="col-md-12 align-center">{{ $solutions->links() }}</div>
                </div>
            </div>
        </div>
    </div>
@endsection
