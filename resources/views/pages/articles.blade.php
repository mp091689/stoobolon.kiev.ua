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
<div class="container">
        {!! $page->body !!}
    @foreach($articles as $article)
        <div class="index-content clearfix">
            <h2 class="content-column-title">{{ $article->title }}</h2>
            {!! $article->body !!}
            <div class="btn-wrap">
                <a href="/article/{{ $article->alias }}" class="btn">Читать полностью</a>
            </div>
        </div>
    @endforeach
    {!! $articles->links() !!}
</div>
@endsection