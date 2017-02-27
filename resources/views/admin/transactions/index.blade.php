@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="panel">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-sm-2">Транзакции</div>
                    <form method="get">
                        <div class="input-group col-sm-6">
                            <input type="text" name="search" value="{{ Request::get('search') }}" class="form-control" placeholder="Текст для поиска...">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="submit">Найти</button>
                                @if(Request::get('search'))
                                    <a class="btn btn-danger" href="{{ action('Backend\TransactionController@index') }}">Отменить</a>
                                @endif
                            </span>
                        </div>
                    </form>
                </div>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-condensed">
                        <thead>
                        <tr>
                            @foreach($transaction_attributes as $attribute)
                                <th>{{ $attribute }}</th>
                            @endforeach
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($transactions as $transaction)
                            <tr>
                                @foreach($transaction_attributes as $attribute)
                                    <td>{{ $transaction[$attribute] }}</td>
                                @endforeach
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $transactions->links() }}
            </div>
        </div>
    </div>
@endsection
