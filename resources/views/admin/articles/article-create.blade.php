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
                                <h5>Новая статья</h5>
                            </div>
                            <div class="col-xs-6 text-right">
                                <a href="{{ url('/admin/articles') }}" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span></a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <form role="form" method="post" action="{{ route('admin.post.article.create') }}" class="form-horizontal">
                            <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                                <label for="title" class="col-sm-2 control-label">Название</label>
                                <div class="col-sm-10">
                                    <input name="title" id="title" type="text" class="form-control" value="{{ Request::old('title') }}">
                                </div>
                            </div>
                            <div class="form-group {{ $errors->has('alias') ? 'has-error' : '' }}">
                                <label for="alias" class="col-sm-2 control-label">Алиас</label>
                                <div class="col-sm-10">
                                    <input name="alias" id="alias" type="text" class="form-control" value="{{ Request::old('alias') }}">
                                    <span class="help-block">Алиас должен состоять только из маленьких букв латинского алфавита. Вы можете оставить поле пустым, что бы алиас сгенерировался автоматически.</span>
                                </div>
                            </div>
                            <div class="form-group {{ $errors->has('body') ? 'has-error' : '' }}">
                                <label for="body" class="col-sm-2 control-label">Содержание</label>
                                <div class="col-sm-10">
                                    <textarea name="body" id="body" class="form-control" rows="10">{{ Request::old('body') }}</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-2"></div>
                                <div class="col-sm-10">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="public" value="checkbox" {{ Request::old('public') ? 'checked' : '' }}>
                                            Опубликовать
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group {{ $errors->has('meta_title') ? 'has-error' : '' }}">
                                <label for="meta_title" class="col-sm-2 control-label">Мета заголовок</label>
                                <div class="col-sm-10">
                                    <input type="text" name="meta_title" id="meta_title" class="form-control" value="{{ Request::old('meta_title') }}">
                                </div>
                            </div>
                            <div class="form-group {{ $errors->has('meta_keywords') ? 'has-error' : '' }}">
                                <label for="meta_keywords" class="col-sm-2 control-label">Ключевые слова</label>
                                <div class="col-sm-10">
                                    <input type="text" name="meta_keywords" id="meta_keywords" class="form-control" value="{{ Request::old('meta_keywords') }}">
                                </div>
                            </div>
                            <div class="form-group {{ $errors->has('meta_description') ? 'has-error' : '' }}">
                                <label for="title" class="col-sm-2 control-label">Описание</label>
                                <div class="col-sm-10">
                                    <textarea name="meta_description" id="meta_description" class="form-control" rows="3">{{ Request::old('meta_description') }}</textarea>
                                </div>
                            </div>
                            <input type="hidden" name="_token" value="{{ Session::token() }}"/>
                            <div class="text-right">
                                <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-ok"></span> Создать</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection