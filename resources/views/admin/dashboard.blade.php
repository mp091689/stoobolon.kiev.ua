@extends('layouts.app')

@section('content')
    <div class="container">
        @include('admin.includes.info-box')
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Здравствуй, {{ Auth::user()->name }}</div>
                    <div class="panel-body">
                        Не забудь ответить на запросы клиентов!
                    </div>
                    <div class="list-group">
                        <a href="#" class="list-group-item list-group-item-warning">
                            <span class="badge">{{ count($callbacks) }}</span> Новых запросов на обратный звонок
                        </a>
                        <a href="#" class="list-group-item list-group-item-warning">
                            <span class="badge">{{ count($feedbacks) }}</span> Новых запросов со страницы "Контакты"
                        </a>
                        <a href="#" class="list-group-item list-group-item-warning">
                            <span class="badge">{{ count($reviews) }}</span> Новых отзывов
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection