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
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1268.4198871492972!2d30.470345871892327!3d50.518547998553764!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zNTDCsDMxJzA2LjgiTiAzMMKwMjgnMTUuMyJF!5e0!3m2!1sru!2sua!4v1464251914485" width="600" height="350" frameborder="0" style="border:0; margin:0 auto;" allowfullscreen></iframe>
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
            <button class="btn" type="submit" id="contacts-btn">Оставить отзыв</button>
            <input type="hidden" name="_token" value="{{ Session::token() }}"/>
        </form>
    </div>
</div>
<!-- /RIGHT COLUMN  -->
@endsection