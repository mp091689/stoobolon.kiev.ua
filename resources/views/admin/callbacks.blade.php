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
                                <td>
                                    <!-- Button trigger modal -->
                                    <button class="btn btn-info" data-toggle="modal" data-target="#myModal{{ $callback->id }}">
                                        <span class="glyphicon glyphicon-eye-open"></span>
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="myModal{{ $callback->id }}">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                                    <h4 class="modal-title">{{ $callback->author }}
                                                    <small>{{ $callback->phone }}</small></h4>
                                                </div>
                                                <div class="modal-body" style="white-space: pre-wrap;">{{ $callback->body }}</div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    @if( $callback->attention )
                                        <a href="{{ url('/admin/callback/'.$callback->id.'/viewed') }}" class="btn btn-danger"><span class="glyphicon glyphicon-fire"></span></a>
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