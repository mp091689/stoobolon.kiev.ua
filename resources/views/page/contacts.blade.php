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
@include('includes.left')
        <!-- RIGHT COLUMN -->
<div class="right clearfix">
    <div class="description">
        {!! $page->body !!}
        <div class="the-map">
            {!! $json_common['maps_code'] !!}
        </div>
    </div>
    @include('includes.info-box')
    <div class="contact-form">
        <form action="{{ route('contacts.send') }}" method="post" id="contacts-form">
            <div class="input-group">
                <input type="text" name="author" placeholder="Имя" value="{{ Request::old('author') }}">
            </div>
            <div class="input-group">
                <input type="text" name="email" placeholder="Email" value="{{ Request::old('email') }}">
            </div>
            <div class="input-group">
                <input type="text" name="phone" placeholder="Телефон" value="{{ Request::old('phone') }}">
            </div>
            <div class="input-group">
                <textarea name="body" rows="6" cols="50" placeholder="Напишите нам и мы с Вами свяжемся">{{ Request::old('body') }}</textarea>
            </div>
            <button class="btn" type="submit" id="contacts-btn">Оставить запрос</button>
            <input type="hidden" name="_token" value="{{ Session::token() }}"/>
        </form>
    </div>
</div>
<!-- /RIGHT COLUMN  -->
@endsection