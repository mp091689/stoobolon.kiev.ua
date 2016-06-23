@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Страницы</div>
                    <div class="panel-body">
                        <a href="#" class="btn btn-success">
                            <span class="glyphicon glyphicon-plus"></span> Создать страницу
                        </a>
                    </div>
                    <table class="table table-striped table-hover">
                        <th>#ID</th>
                        <th>Название</th>
                        <th>Алиас(часть url)</th>
                        <th>Состояние</th>
                        <th>Действие</th>
                        @foreach($pages as $page)
                            <tr>
                                <td>{{ $page->id }}</td>
                                <td>{{ $page->title }}</td>
                                <td>{{ $page->alias }}</td>
                                <td>
                                    @if( $page->public )
                                        Опубликована
                                    @else
                                        Не опубликована
                                    @endif
                                </td>
                                <td>
                                    <a href="#" class="btn btn-info"><span class="glyphicon glyphicon-eye-open"></span></a>
                                    <a href="#" class="btn btn-warning"><span class="glyphicon glyphicon-pencil"></span></a>
                                    <a href="#" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></a>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                    <div class="row text-center">
                        {!! $pages->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection