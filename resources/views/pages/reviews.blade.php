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
    {!! $page->body !!}
    <div class="index-content clearfix">
        @foreach($reviews as $review)
            <div class="review">
                <p class="review-text">{{ $review->body }}</p>
                <p class="author-date">{{ $review->author }} | {{ $review->created_at->format('d.m.Y') }}</p>
            </div>
        @endforeach
        @include('includes.info-box')
        <div class="review-form">
            <form action="{{ route('review.send') }}" method="post" id="review-form">
                    <input type="text" name="author" placeholder="Имя" value="{{ Request::old('author') }}">
                    <input type="text" name="email" placeholder="Email" value="{{ Request::old('email') }}">
                    <textarea name="body" rows="6" cols="50" placeholder="Отзыв">{{ Request::old('body') }}</textarea>
                <button class="btn" type="submit" id="review-btn">Оставить отзыв</button>
                <input type="hidden" name="_token" value="{{ Session::token() }}"/>
            </form>
        </div>
    </div>
@endsection