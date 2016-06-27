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
                                <h5>Настройки пользователя "{{ $user->name }}"</h5>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <form action="{{ url('/admin/user/set/email') }}" role="form" method="post" class="form-horizontal">
                                            <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                                                <label for="email" class="col-sm-2 control-label">Email</label>
                                                <div class="col-sm-10">
                                                    <div class="input-group">
                                                        <input
                                                                name="email"
                                                                id="email"
                                                                type="text"
                                                                class="form-control"
                                                                value="{{ Request::old('email') ? Request::old('email') : $user->email }}">
                                                        <span class="input-group-btn"><button class="btn btn-success" type="submit"><span class="glyphicon glyphicon-ok"></span> сохранить</button></span>
                                                    </div>
                                                    <span class="help-block">Даный почтовый адресс будет использоваться для авторизации на сайте, а так же для восстановления пароля.</span>
                                                </div>
                                            </div>
                                            <input type="hidden" name="_token" value="{{ Session::token() }}">
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <form action="{{ url('/admin/user/set/pass') }}" role="form" method="post" class="form-horizontal">
                                    <div class="panel panel-default">
                                        <div class="panel-body">
                                            <div class="col-sm-6">
                                                <div class="row">
                                                    <div class="col-sm-12 form-group {{ $errors->has('pass') ? 'has-error' : '' }}">
                                                        <label for="pass" class="col-sm-4 control-label">Пароль</label>
                                                        <div class="col-sm-8">
                                                            <input
                                                                    name="pass"
                                                                    id="pass"
                                                                    type="password"
                                                                    class="form-control"
                                                                    placeholder="Старый пароль">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12 form-group {{ $errors->has('newpass') ? 'has-error' : '' }}">
                                                        <label for="newpass" class="col-sm-4 control-label">Новый пароль</label>
                                                        <div class="col-sm-8">
                                                            <input
                                                                    name="newpass"
                                                                    id="newpass"
                                                                    type="password"
                                                                    class="form-control"
                                                                    placeholder="Новый пароль">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12 form-group {{ $errors->has('newpass') ? 'has-error' : '' }}">
                                                        <label for="newpass_confirmation" class="col-sm-4 control-label">Подтверждение</label>
                                                        <div class="col-sm-8">
                                                            <input
                                                                    name="newpass_confirmation"
                                                                    id="newpass_confirmation"
                                                                    type="password"
                                                                    class="form-control"
                                                                    placeholder="Повтори новый пароль">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <span class="help-block">Даный почтовый адресс будет использоваться для авторизации на сайте, а так же для восстановления пароля.</span>
                                            </div>
                                            <div class="text-left">
                                                <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-ok"></span> Сохранить</button>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="hidden" name="_token" value="{{ Session::token() }}"/>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection