@extends('layouts.app')

@section('content')
    <div class="container">
        @include('admin.includes.info-box')
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Меню</div>
                    <table class="table table-hover">
                        <tr>
                            <th>Пункт меню</th>
                            <th>Сортировка</th>
                            <th>Привязан к странице</th>
                            <th>Состояние</th>
                            <th>Действие</th>
                        </tr>
                        @foreach($menus as $menu)
                            <tr class="show-row" data-id="{{ $menu->id }}">
                                <td>{{ $menu->title }}</td>
                                <td>{{ $menu->sort }}</td>
                                <td>{{ $menu->page->title }}</td>
                                <td>
                                    @if( $menu->public )
                                        Опубликовано
                                    @else
                                        Скрыто
                                    @endif
                                </td>
                                <td>
                                    <a href="#" class="btn btn-warning"><span class="glyphicon glyphicon-pencil"></span></a>
                                    <a href="{{ url('/admin/menu/'.$menu->id).'/delete' }}" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></a>
                                </td>
                            </tr>
                            <tr class="edit-menu alert-warning" data-id="{{ $menu->id }}" style="display: none;">
                                <form role="form" method="post" action="{{ route('admin.post.menu.edit') }}" class="form-horizontal">
                                    <td><input name="title" type="text" class="form-control" value="{{ Request::old('title')?Request::old('title'):$menu->title }}" placeholder="Название"></td>
                                    <td><input name="sort" type="number" class="form-control" value="{{ Request::old('sort')?Request::old('sort'):$menu->sort }}" placeholder="Сортировка"></td>
                                    <td>
                                        <select class="form-control" name="page_id">
                                            @foreach($pages as $page)
                                                <option value="{{ $page->id }}" {{ $menu->page_id==$page->id?'selected':'' }}>{{ $page->title }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="public" value="checkbox" {{ Request::old('public')?'checked':$menu->public?'checked':'' }}>
                                                Опубликовать
                                            </label>
                                        </div>
                                    </td>
                                    <input type="hidden" name="_token" value="{{ Session::token() }}"/>
                                    <input type="hidden" name="id" value="{{ $menu->id }}"/>
                                    <td>
                                        <a href="{{ url('/admin/menus') }}" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span></a>
                                        <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-ok"></span></button>
                                    </td>
                                </form>
                            </tr>
                        @endforeach
                        <tr class="show-row">
                            <form role="form" method="post" action="{{ route('admin.post.menu.create') }}" class="form-horizontal">
                                <td><input name="title" type="text" class="form-control" value="{{ Request::old('title') }}" placeholder="Название"></td>
                                <td><input name="sort" type="number" class="form-control" value="{{ Request::old('sort')?Request::old('sort'):1 }}" placeholder="Сортировка"></td>
                                <td>
                                    <select class="form-control" name="page_id">
                                        @foreach($pages as $page)
                                            <option value="{{ $page->id }}">{{ $page->title }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="public" value="checkbox" {{ Request::old('public') ? 'checked' : '' }}>
                                            Опубликовать
                                        </label>
                                    </div>
                                </td>
                                <input type="hidden" name="_token" value="{{ Session::token() }}"/>
                                <td><button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span></button></td>
                            </form>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection