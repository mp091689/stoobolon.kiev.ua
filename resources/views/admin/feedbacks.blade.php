@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Запросы со страницы "Контакты"</div>
                    <div class="panel-body">
                        Не забывай отмечать запрос, как "отработанный" <span class="glyphicon glyphicon-fire"></span>
                    </div>
                    <table class="table table-striped table-hover">

                        <th>#ID</th>
                        <th>Автор</th>
                        <th>Почта</th>
                        <th>Телефон</th>
                        <th>Текст</th>
                        <th>Состояние</th>
                        <th>Дата создания</th>
                        @foreach($feedbacks as $feedback)
                            <tr>
                                <td>{{ $feedback->id }}</td>
                                <td>{{ $feedback->author }}</td>
                                <td>{{ $feedback->email }}</td>
                                <td>{{ $feedback->phone }}</td>
                                <td>{{ $feedback->body }}</td>
                                <td>
                                    @if( $feedback->attention )
                                        <a href="#" class="btn btn-danger"><span class="glyphicon glyphicon-fire"></span></a>
                                    @else
                                        <span class="label label-success"><span class="glyphicon glyphicon-ok"></span> отработан</span>
                                    @endif
                                </td>
                                <td>{{ $feedback->created_at }}</td>
                            </tr>
                        @endforeach
                    </table>
                    <div class="row text-center">
                        {!! $feedbacks->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection