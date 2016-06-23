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
        <div class="index-content clearfix">
            {!! $page->body !!}
        </div>
    </div>
@endsection
