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
        {!! $page->body !!}
    </div>
    <!-- /RIGHT COLUMN  -->
@endsection