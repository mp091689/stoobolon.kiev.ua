@extends('layouts.master')

@section('title')
    {{ $page->meta_title }}
@endsection

@section('description')
    {{ $page->meta_description }}
@endsection

@section('keywords')
    {{ $page->meta_keywords }}
@endsection

@section('content')
    <div class="index-content clearfix">
        <section class="content-column-left">
            <div class="main-contacts">
                {!! $page->body !!}
            </div>
        </section>

        <section class="content-column-right">
            @include('includes.info-box')
            <div class="review-form">
                <form action="{{ route('post.send.feedback') }}" method="post" id="contacts-form">
                    <div class="input-group">
                        <input type="text" name="author" class="{{ $errors->has('author') ? 'has-error' : '' }}" placeholder="Имя" value="{{ Request::old('author') }}">
                    </div>
                    <div class="input-group">
                        <input type="text" name="email" class="{{ $errors->has('email') ? 'has-error' : '' }}" placeholder="Email" value="{{ Request::old('email') }}">
                    </div>
                    <div class="input-group">
                        <input type="text" name="phone" class="{{ $errors->has('phone') ? 'has-error' : '' }}" placeholder="Телефон" value="{{ Request::old('phone') }}">
                    </div>
                    <div class="input-group">
                        <textarea name="body" class="{{ $errors->has('body') ? 'has-error' : '' }}" rows="6" cols="50" placeholder="Напишите нам и мы с Вами свяжемся">{{ Request::old('body') }}</textarea>
                    </div>
                    <button class="btn" type="submit" id="contacts-btn">Отправить запрос</button>
                    <img src="src/img/loading.svg" class="loading-svg">
                    <input type="hidden" name="_token" value="{{ Session::token() }}"/>
                </form>
            </div>
        </section>
        <div class="the-map">
            {!! $maps->value !!}
        </div>
    </div>
@endsection