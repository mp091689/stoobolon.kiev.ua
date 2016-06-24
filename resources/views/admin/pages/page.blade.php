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
                                <h5><abbr title="Алиас: {{ $page->alias }}">{{ $page->title }}</abbr></h5>
                            </div>
                            <div class="col-xs-6 text-right">
                                <a href="{{ url('/admin/pages') }}" class="btn btn-info"><span class="glyphicon glyphicon-chevron-left"></span></a>
                                <a href="{{ url('/admin/page/'.$page->id).'/edit' }}" class="btn btn-warning"><span class="glyphicon glyphicon-pencil"></span></a>
                                <a href="{{ url('/admin/page/'.$page->id).'/delete' }}" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        {!! $page->body !!}
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">Мета данные</div>
                    <table class="table">
                        <tr>
                            <th>Заголовок</th>
                            <td>{{ $page->meta_title }}</td>
                        </tr>
                        <tr>
                            <th>Ключевые слова</th>
                            <td>{{ $page->meta_keywords }}</td>
                        </tr>
                        <tr>
                            <th>Описание</th>
                            <td>{{ $page->meta_description }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection