@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-6">
                                <h5>Настройки сайта</h5>
                            </div>
                        </div>
                    </div>
                    @include('admin.includes.info-box')
                    <div class="panel-body">
                        {{-- Название сайта / начало --}}
                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <form action="{{ route('admin.post.settings.set') }}" role="form" method="post" class="form-horizontal">
                                            <div class="form-group {{ $errors->has('site_name') ? 'has-error' : '' }}">
                                                <label for="site_name" class="col-sm-2 control-label">Название сайта</label>
                                                <div class="col-sm-10">
                                                    <div class="input-group">
                                                        <input
                                                                name="site_name"
                                                                id="site_name"
                                                                type="text"
                                                                class="form-control"
                                                                value="{{ Request::old('site_name') ? Request::old('site_name') : $setting->site_name }}">
                                                        <span class="input-group-btn"><button class="btn btn-success" type="submit"><span class="glyphicon glyphicon-ok"></span> сохранить</button></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <input type="hidden" name="_token" value="{{ Session::token() }}">
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- Название сайта / конец --}}
                        {{-- Админ почта / начало --}}
                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <form action="{{ route('admin.post.settings.set') }}" role="form" method="post" class="form-horizontal">
                                            <div class="form-group {{ $errors->has('emails') ? 'has-error' : '' }}">
                                                <label for="emails" class="col-sm-2 control-label">Админ-почта</label>
                                                <div class="col-sm-10">
                                                    <div class="input-group">
                                                        <input
                                                                name="emails"
                                                                id="emails"
                                                                type="text"
                                                                class="form-control"
                                                                value="{{ Request::old('emails') ? Request::old('emails') : $setting->emails }}">
                                                        <span class="input-group-btn"><button class="btn btn-success" type="submit"><span class="glyphicon glyphicon-ok"></span> сохранить</button></span>
                                                    </div>
                                                    <span class="help-block">На указаный почтовый адресс будут приходить все запросы и уведомления. Через запятую можно указать несколько почтывх адресов.</span>
                                                </div>
                                            </div>
                                            <input type="hidden" name="_token" value="{{ Session::token() }}">
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- Админ почта / конец --}}
                        {{-- Количество записей, пагинация / начало --}}
                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                            <div class="form-group">
                                                <label for="rows" class="col-sm-2 control-label">Количество записей</label>
                                                <div class="col-md-10">
                                                    <div class="row" id="rows">
                                                        <form action="{{ route('admin.post.settings.set') }}" role="form" method="post" class="form-horizontal">
                                                            <div class="col-sm-4">
                                                                <div class="input-group {{ $errors->has('article_rows') ? 'has-error' : '' }}">
                                                                    <input
                                                                            name="article_rows"
                                                                            id="article_rows"
                                                                            type="number"
                                                                            class="form-control"
                                                                            value="{{ Request::old('article_rows') ? Request::old('article_rows') : $setting->article_rows }}">
                                                                    <span class="input-group-btn"><button class="btn btn-success" type="submit"><span class="glyphicon glyphicon-ok"></span> сохранить</button></span>
                                                                </div>
                                                                <span class="help-block">Отображаемое количество статей на странице "Статьи"</span>
                                                            </div>
                                                            <input type="hidden" name="_token" value="{{ Session::token() }}">
                                                        </form>
                                                        <form action="{{ route('admin.post.settings.set') }}" role="form" method="post" class="form-horizontal">
                                                            <div class="col-sm-4">
                                                                <div class="input-group {{ $errors->has('review_rows') ? 'has-error' : '' }}">
                                                                    <input
                                                                            name="review_rows"
                                                                            id="review_rows"
                                                                            type="number"
                                                                            class="form-control"
                                                                            value="{{ Request::old('review_rows') ? Request::old('review_rows') : $setting->review_rows }}">
                                                                    <span class="input-group-btn"><button class="btn btn-success" type="submit"><span class="glyphicon glyphicon-ok"></span> сохранить</button></span>
                                                                </div>
                                                                <span class="help-block">Отображаемое количество отзывов на странице "Отзывы"</span>
                                                            </div>
                                                            <input type="hidden" name="_token" value="{{ Session::token() }}">
                                                        </form>
                                                        <form action="{{ route('admin.post.settings.set') }}" role="form" method="post" class="form-horizontal">
                                                            <div class="col-sm-4">
                                                                <div class="input-group {{ $errors->has('admin_rows') ? 'has-error' : '' }}">
                                                                    <input
                                                                            name="admin_rows"
                                                                            id="admin_rows"
                                                                            type="number"
                                                                            class="form-control"
                                                                            value="{{ Request::old('admin_rows') ? Request::old('admin_rows') : $setting->admin_rows }}">
                                                                    <span class="input-group-btn"><button class="btn btn-success" type="submit"><span class="glyphicon glyphicon-ok"></span> сохранить</button></span>
                                                                </div>
                                                                <span class="help-block">Отображаемое количество записей в талицах с данными в админке</span>
                                                            </div>
                                                            <input type="hidden" name="_token" value="{{ Session::token() }}">
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- Количество записей, пагинация / конец --}}
                        {{-- Фон сайта / начало --}}
                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <form action="{{ route('admin.post.settings.set') }}" enctype="multipart/form-data" role="form" method="post" class="form-horizontal">
                                            <div class="form-group {{ $errors->has('background') ? 'has-error' : '' }}">
                                                <label for="background" class="col-sm-2 control-label">Фон сайта</label>
                                                <div class="col-sm-10">
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <a href="{{ $setting->background }}"  target="_blank"><img src="{{ $setting->background }}" alt="" width="300"></a>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="file" name="background" id="background" accept="image/jpeg">
                                                            <span class="help-block">Можно загружать только JPEG файлы. Старайся перед загрузкой сжимать изображения так, что бы их объем не превышал 200кб, иначе загрузка сайта будет ощутимо медленнее.</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="text-right">
                                                <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-ok"></span> Сохранить</button>
                                            </div>
                                            <input type="hidden" name="_token" value="{{ Session::token() }}">
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- Фон сайта / конец --}}
                        {{-- гугл/яндекс карты / начало --}}
                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <form action="{{ route('admin.post.settings.set') }}" role="form" method="post" class="form-horizontal">
                                            <div class="form-group {{ $errors->has('maps') ? 'has-error' : '' }}">
                                                <label for="maps" class="col-sm-2 control-label">Google/Yandex карты</label>
                                                <div class="col-sm-10">
                                                    <textarea name="maps" id="maps" class="form-control" rows="3">{{ Request::old('maps') ? Request::old('maps') : $setting->maps }}</textarea>
                                                </div>
                                            </div>
                                            <div class="text-right">
                                                <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-ok"></span> Сохранить</button>
                                            </div>
                                            <input type="hidden" name="_token" value="{{ Session::token() }}">
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- гугл/яндекс карты / конец --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection