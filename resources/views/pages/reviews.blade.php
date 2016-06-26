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
        @include('includes.info-box')
        @foreach($reviews as $review)
            <div class="review">
                <img src="{{ URL::asset('src/img/avatar.png') }}" alt="СТО аватар">
                <p class="review-text">{{ $review->body }}</p>
                <p class="author-date">{{ $review->author }} | {{ $review->created_at->format('d.m.Y') }}</p>
            </div>
        @endforeach
    </div>
    {!! $reviews->links() !!}
    <div class="index-content clearfix">
        @include('includes.info-box')
        <div class="review-form">
            <form action="{{ route('post.send.review') }}" method="post" id="review-form">
                <input type="text" name="author" class="{{ $errors->has('author') ? 'has-error' : '' }}" placeholder="Имя" value="{{ Request::old('author') }}">
                <input type="text" name="email" class="{{ $errors->has('email') ? 'has-error' : '' }}" placeholder="Email" value="{{ Request::old('email') }}">
                <textarea name="body" class="{{ $errors->has('body') ? 'has-error' : '' }}" rows="6" cols="50" placeholder="Отзыв">{{ Request::old('body') }}</textarea>
                <button class="btn" type="submit" id="review-btn">Оставить отзыв</button>
                <img src="src/img/loading.svg" class="loading-svg">
                <input type="hidden" name="_token" value="{{ Session::token() }}"/>
            </form>
        </div>
    </div>
@endsection