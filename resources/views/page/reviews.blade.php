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
    </div>
    <div class="reviews-list">
        @foreach($reviews as $review)
            <p class="text2">{{ $review->body }}</p>
            <p class="author">{{ $review->author }} | {{ $review->created_at->format('d.m.Y') }}</p>
        @endforeach
    </div>
    <div class="review-form">
        <form action="{{ route('review.send') }}" method="post" id="review-form">
            <div class="input-group">
                <input type="text" name="author" placeholder="Имя" value="{{ Request::old('author') }}">
            </div>
            <div class="input-group">
                <input type="text" name="email" placeholder="Email" value="{{ Request::old('email') }}">
            </div>
            <div class="input-group">
                <textarea name="body" rows="6" cols="50" placeholder="Отзыв">{{ Request::old('body') }}</textarea>
            </div>
            <button class="btn" type="submit" id="review-btn">Оставить отзыв</button>
            <input type="hidden" name="_token" value="{{ Session::token() }}"/>
        </form>
    </div>
</div>
<!-- /RIGHT COLUMN  -->
@endsection