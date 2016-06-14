@extends('layouts.master')

@section('title')
{{ $article->meta_title }}
@endsection

@section('description')
{{ $article->meta_description }}
@endsection

@section('keywords')
{{ $article->meta_keywords }}
@endsection


@section('content')
    <div class="index-content clearfix">
        <h1>{{ $article->title }}</h1>
        {!! $article->body !!}
    </div>
@endsection