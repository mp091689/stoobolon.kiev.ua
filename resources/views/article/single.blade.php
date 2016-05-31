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
@include('includes.left')
        <!-- RIGHT COLUMN -->
<div class="right clearfix">
    <h1>{{ $article->title }}</h1>
    {!! $article->body !!}
</div>
<!-- /RIGHT COLUMN  -->
@endsection