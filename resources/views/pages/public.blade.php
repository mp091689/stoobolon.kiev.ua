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
        <div class="page-body">
            <div class="logo">
                <img src="src/img/logo.png" alt="STO-Obolon">
                <span style="color: #fff; font-size: 48px; font-style: italic">СТО "НА ОБОЛОНИ"</span><br/>
                <span style="color: #fccf1b; font-size: 22px; font-style: italic">Качественный сервис для вашей машины</span>
            </div>
            <section class="extra-content">
                    {!! $page->extra !!}
            </section>
            <div style="clear:both"></div>
        </div>

        <div class="index-content clearfix">
            {!! $page->body !!}
        </div>
    </div>
@endsection
