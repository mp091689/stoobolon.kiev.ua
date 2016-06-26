@extends('layouts.app')

@section('content')
    <div class="container">
        @include('admin.includes.info-box')
        <div class="row">
            <div class="col-md-6">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title"><span class="glyphicon glyphicon-envelope"></span> Будь насвязи с клиентами</h3>
                    </div>
                    <div class="panel-body">
                        Не забывай отвечать на запросы клиентов и тогда эти клиенты могут стать постоянными:)
                    </div>
                    <div class="list-group">
                        <a href="{{ url('/admin/callbacks') }}" class="list-group-item list-group-item-{{ count($newCallbacks)?'danger':'info' }}">
                            <span class="glyphicon glyphicon-list"></span> "Обратный звонок" требует немедленной реакции <span class="badge">{{ count($newCallbacks) }}</span></a>
                        <a href="{{ url('/admin/feedbacks') }}" class="list-group-item list-group-item-{{ count($newFeedbacks)?'danger':'info' }}"><span class="glyphicon glyphicon-list"></span> Отвечай на запросы со страницы "Контакты" <span class="badge">{{ count($newFeedbacks) }}</span></a>
                        <a href="{{ url('/admin/reviews') }}" class="list-group-item list-group-item-{{ count($newReviews)?'danger':'info' }}"><span class="glyphicon glyphicon-list"></span> Проверяй и одобряй отзывы от благодарных клиентов <span class="badge">{{ count($newReviews) }}</span></a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title"><span class="glyphicon glyphicon-pencil"></span> Управляй контентом</h3>
                    </div>
                    <div class="panel-body">
                        Помни, посещая веб сайт, клиент ищет конкрентую информацию. Внимательно и грамотно наполняй сайт контентом.
                    </div>
                    <div class="list-group">
                        <a href="#" class="list-group-item list-group-item-info"><span class="glyphicon glyphicon-list"></span> Создавай страницы для сайта</a>
                        <a href="#" class="list-group-item list-group-item-info"><span class="glyphicon glyphicon-list"></span> Пиши статьи, новости, обзоры</a>
                        <a href="#" class="list-group-item list-group-item-info"><span class="glyphicon glyphicon-list"></span> Настрой меню для удобной навигации по сайту</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title"><span class="glyphicon glyphicon-cog"></span> Настрой сайт как тебе удобно</h3>
                    </div>
                    <div class="panel-body">
                        Ты можешь "подогнать" сайт как тебе удбоно. Настрой количество выводимого материала, почту администратора для оповещений, подключи карты google/yandex что бы клиент легко тебя нашел.
                    </div>
                    <div class="list-group">
                        <a href="/admin/settings" class="list-group-item list-group-item-info"><span class="glyphicon glyphicon-list"></span> Основные настройки сайта</a>
                        <a href="/admin/emails" class="list-group-item list-group-item-info"><span class="glyphicon glyphicon-list"></span> Создай уникальные шалоны писем для твоих клиентов</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection