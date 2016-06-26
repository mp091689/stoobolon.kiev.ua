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
                                <h5>Редактирование шаблона "{{ $email->title }}"</h5>
                            </div>
                            <div class="col-xs-6 text-right">
                                <a href="{{ url('/admin/emails') }}" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span></a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <form role="form" method="post" action="{{ route('admin.post.email.edit') }}" class="form-horizontal">
                            <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                                <label for="title" class="col-sm-2 control-label">Название</label>
                                <div class="col-sm-10">
                                    <input
                                            name="title"
                                            id="title"
                                            type="text"
                                            class="form-control"
                                            value="{{ Request::old('title') ? Request::old('title') : $email->title }}"
                                    >
                                </div>
                            </div>
                            <div class="form-group {{ $errors->has('body') ? 'has-error' : '' }}">
                                <label for="body" class="col-sm-2 control-label">Шаблон</label>
                                <div class="col-sm-10">
                                    <span class="help-block">
                                        В шаблонах писем можно использовать следующие "ключи":<br>
                                        [name] - имя клиента<br>
                                        [email] - почта клиента<br>
                                        [phone] - телефон клиента<br>
                                        [comment] - комментарий или содержание запроса от клиента
                                    </span>
                                    <textarea name="body" id="body" class="form-control" rows="10">{{ Request::old('body') ? Request::old('body') : $email->body }}</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-2"></div>
                                <div class="col-sm-10">
                                    <div class="checkbox">
                                        <label>
                                            <input
                                                    type="checkbox"
                                                    name="active"
                                                    value="checkbox"
                                                    {{ Request::old('active') ? 'checked' : $email->active ? 'checked' : '' }}
                                            >
                                            Активировать
                                        </label>
                                        <span class="help-block">Включение/выключение отправки данного письма</span>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="id" value="{{ $email->id }}">
                            <input type="hidden" name="_token" value="{{ Session::token() }}"/>
                            <div class="text-right">
                                <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-ok"></span> Сохранить</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection