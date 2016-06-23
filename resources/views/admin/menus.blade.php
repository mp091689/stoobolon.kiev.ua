@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Меню</div>
                    <div class="panel-body">
                        <a href="#" class="btn btn-success">
                            <span class="glyphicon glyphicon-plus"></span> Создать пункт меню
                        </a>
                    </div>
                    <table class="table table-striped table-hover">
                        <tr>
                            <th>Пункт меню</th>
                            <th>Сортировка</th>
                            <th>Привязан к странице</th>
                            <th>Состояние</th>
                            <th>Действие</th>
                        </tr>
                        @foreach($menus as $menu)
                            <tr>
                                <td>{{ $menu->title }}</td>
                                <td>{{ $menu->sort }}</td>
                                <td>{{ $menu->page->title }}</td>
                                <td>
                                    @if( $menu->public )
                                        Показывать
                                    @else
                                        Скрыть
                                    @endif
                                </td>
                                <td>
                                    <a href="#" class="btn btn-warning"><span class="glyphicon glyphicon-pencil"></span></a>
                                    <a href="#" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></a>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection