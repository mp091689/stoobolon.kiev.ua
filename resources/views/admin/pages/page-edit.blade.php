@extends('layouts.app')

@section('script')
    <script>
        var editor = CKEDITOR.replace( 'body' );
        var editor = CKEDITOR.replace( 'extra' );
    </script>
@endsection

@section('content')
    <div class="container">
        @include('admin.includes.info-box')
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-6">
                                <h5>Редактирование страницы "{{ $page->title }}"</h5>
                            </div>
                            <div class="col-xs-6 text-right">
                                <a href="{{ url('/admin/pages') }}" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span></a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <form role="form" method="post" action="{{ route('admin.post.page.edit') }}" class="form-horizontal">
                            <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                                <label for="title" class="col-sm-2 control-label">Название</label>
                                <div class="col-sm-10">
                                    <input
                                        name="title"
                                        id="title"
                                        type="text"
                                        class="form-control"
                                        value="{{ Request::old('title') ? Request::old('title') : $page->title }}"
                                    >
                                </div>
                            </div>
                            <div class="form-group {{ $errors->has('alias') ? 'has-error' : '' }}">
                                <label for="alias" class="col-sm-2 control-label">Алиас</label>
                                <div class="col-sm-10">
                                    <input
                                        name="alias"
                                        id="alias"
                                        type="text"
                                        class="form-control"
                                        value="{{ Request::old('alias') ? Request::old('alias') : $page->alias }}"
                                        @if($page->alias == 'public'||
                                            $page->alias == 'articles'||
                                            $page->alias == 'reviews'||
                                            $page->alias == 'contacts')
                                            readonly
                                        @endif
                                    >
                                    <span class="help-block">Алиас должен состоять только из маленьких букв латинского алфавита. Вы можете оставить поле пустым, что бы алиас сгенерировался автоматически.</span>
                                </div>
                            </div>
                            @if ( Request::is('admin/page/1/edit') )
                                <div class="form-group {{ $errors->has('extra') ? 'has-error' : '' }}">
                                    <label for="extra" class="col-sm-2 control-label">Дополнительное поле</label>
                                    <div class="col-sm-10">
                                        <textarea name="extra" id="extra" class="form-control" rows="10">{{ Request::old('extra') ? Request::old('extra') : $page->extra }}</textarea>
                                    </div>
                                </div>
                            @endif
                            <div class="form-group {{ $errors->has('body') ? 'has-error' : '' }}">
                                <label for="body" class="col-sm-2 control-label">Содержание</label>
                                <div class="col-sm-10">
                                    <textarea name="body" id="body" class="form-control" rows="10">{{ Request::old('body') ? Request::old('body') : $page->body }}</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-2"></div>
                                <div class="col-sm-10">
                                    <div class="checkbox">
                                        <label>
                                            <input
                                                type="checkbox"
                                                name="public"
                                                value="checkbox"
                                                {{ Request::old('public') ? 'checked' : $page->public ? 'checked' : '' }}
                                                @if($page->alias == 'public')
                                                    checked onclick="return false;"
                                                @endif
                                            >
                                            Опубликовать
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group {{ $errors->has('meta_title') ? 'has-error' : '' }}">
                                <label for="meta_title" class="col-sm-2 control-label">Мета заголовок</label>
                                <div class="col-sm-10">
                                    <input type="text"
                                           name="meta_title"
                                           id="meta_title"
                                           class="form-control"
                                           value="{{ Request::old('meta_title') ? Request::old('meta_title') : $page->meta_title }}">
                                </div>
                            </div>
                            <div class="form-group {{ $errors->has('meta_keywords') ? 'has-error' : '' }}">
                                <label for="meta_keywords" class="col-sm-2 control-label">Ключевые слова</label>
                                <div class="col-sm-10">
                                    <input type="text"
                                           name="meta_keywords"
                                           id="meta_keywords"
                                           class="form-control"
                                           value="{{ Request::old('meta_keywords') ? Request::old('meta_keywords') : $page->meta_keywords }}">
                                </div>
                            </div>
                            <div class="form-group {{ $errors->has('meta_description') ? 'has-error' : '' }}">
                                <label for="title" class="col-sm-2 control-label">Описание</label>
                                <div class="col-sm-10">
                                    <textarea name="meta_description" id="meta_description" class="form-control" rows="3">{{ Request::old('meta_description') ? Request::old('meta_description') : $page->meta_description }}</textarea>
                                </div>
                            </div>
                            <input type="hidden" name="id" value="{{ $page->id }}">
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