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
                                <h5>Страницы</h5>
                            </div>
                            <div class="col-xs-6 text-right">
                                <a href="{{ url('/admin/page/create') }}" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> Создать страницу</a>
                            </div>
                        </div>
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
                                    <a href="{{ url('/admin/page/'.$page->id) }}" class="btn btn-info"><span class="glyphicon glyphicon-eye-open"></span></a>
                                    <a href="{{ url('/admin/page/'.$page->id).'/edit' }}" class="btn btn-warning"><span class="glyphicon glyphicon-pencil"></span></a>
                                    <a href="{{ url('/admin/page/'.$page->id).'/delete' }}" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></a>
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