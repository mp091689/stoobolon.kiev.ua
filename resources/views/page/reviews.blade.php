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
        <form action="" method="post" id="review-form">
            <div class="input-group">
                <lable for="author">Представьтесь:</lable><br>
                <input type="text" name="author" id="author" placeholder="Иванов Иван">
            </div>
            <div class="input-group">
                <lable for="review">Напишите отзыв:</lable><br>
                <textarea id="review" name="review" rows="6" cols="50" placeholder="Оставьте ваш отзыв."></textarea>
            </div>
            <button class="btn" type="submit" id="review-btn">Оставить отзыв</button>
            <input type="hidden" name="_token" value="{{ Session::token() }}"/>
        </form>
    </div>
</div>
<!-- /RIGHT COLUMN  -->
@endsection