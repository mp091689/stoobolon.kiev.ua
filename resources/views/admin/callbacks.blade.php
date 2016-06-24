@extends('layouts.app')

@section('content')
    <div class="container">
        @include('admin.includes.info-box')
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Запросы обратного звонка</div>
                    <div class="panel-body">
                        Не забывай отмечать запрос, как "отработанный" <span class="glyphicon glyphicon-fire"></span>
                    </div>
                    <table class="table table-striped table-hover">
                        <th>#ID</th>
                        <th>Автор</th>
                        <th>Телефон</th>
                        <th>Текст</th>
                        <th>Состояние</th>
                        <th>Дата создания</th>
                        @foreach($callbacks as $callback)
                            <tr>
                                <td>{{ $callback->id }}</td>
                                <td>{{ $callback->author }}</td>
                                <td>{{ $callback->phone }}</td>
                                <td>{{ $callback->body }}</td>
                                <td>
                                    @if( $callback->attention )
                                        <a href="#" class="btn btn-danger"><span class="glyphicon glyphicon-fire"></span></a>
                                    @else
                                        <span class="label label-success"><span class="glyphicon glyphicon-ok"></span> отработан</span>
                                    @endif
                                </td>
                                <td>{{ $callback->created_at }}</td>
                            </tr>
                        @endforeach
                    </table>
                    <div class="row text-center">
                        {!! $callbacks->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection