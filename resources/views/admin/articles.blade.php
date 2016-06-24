@extends('layouts.app')

@section('content')
    <div class="container">
        @include('admin.includes.info-box')
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Статьи</div>
                    <div class="panel-body">
                        <a href="#" class="btn btn-success">
                            <span class="glyphicon glyphicon-plus"></span> Создать статью
                        </a>
                    </div>
                    <table class="table table-striped table-hover">
                        <th>#ID</th>
                        <th>Название</th>
                        <th>Алиас(часть url)</th>
                        <th>Состояние</th>
                        <th>Действие</th>
                        @foreach($articles as $article)
                            <tr>
                                <td>{{ $article->id }}</td>
                                <td>{{ $article->title }}</td>
                                <td>{{ $article->alias }}</td>
                                <td>
                                    @if( $article->public )
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
                        {!! $articles->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection