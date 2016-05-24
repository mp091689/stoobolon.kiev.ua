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
    <div class="articles-list">
        @foreach($articles as $article)
            <h2>{{ $article->title }}</h2>
            {!! $article->short_body !!}
            <div class="btn-wrap">
                <a href="/article/{{ $article->alias }}" class="btn">Читать полностью</a>
            </div>
        @endforeach
    </div>
</div>
<!-- /RIGHT COLUMN  -->
@endsection