@extends('layouts.app')

@section('content')
    <div class="container">
        @include('admin.includes.info-box')
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-6">
                                <h5><abbr title="Алиас: {{ $article->alias }}">{{ $article->title }}</abbr></h5>
                            </div>
                            <div class="col-xs-6 text-right">
                                <a href="{{ url('/admin/articles') }}" class="btn btn-info"><span class="glyphicon glyphicon-list"></span></a>
                                <a href="{{ url('/admin/article/'.$article->id).'/edit' }}" class="btn btn-warning"><span class="glyphicon glyphicon-pencil"></span></a>
                                <a href="{{ url('/admin/article/'.$article->id).'/delete' }}" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        {!! $article->body !!}
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">Мета данные</div>
                    <table class="table">
                        <tr>
                            <th>Заголовок</th>
                            <td>{{ $article->meta_title }}</td>
                        </tr>
                        <tr>
                            <th>Ключевые слова</th>
                            <td>{{ $article->meta_keywords }}</td>
                        </tr>
                        <tr>
                            <th>Описание</th>
                            <td>{{ $article->meta_description }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection