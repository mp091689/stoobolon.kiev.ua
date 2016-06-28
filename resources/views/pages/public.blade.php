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

        <div class="logo">
            <img src="src/img/logo.png" alt="STO-Obolon">
            <span style="color: #fff; font-size: 48px; font-style: italic">СТО "НА ОБОЛОНИ"</span><br/>
            <span style="color: #fccf1b; font-size: 22px; font-style: italic">Качественный сервис для вашей машины!</span>
        </div>

        <section class="features-row clearfix">
            <div class="features-item">
                <div class="features-title">Быстро</div>
                <p>Мы делаем свою работу быстро. Наши специалисты выполнят ремонт вашего автомобиля в кратчайшие сроки.</p>
            </div>
            <div class="features-item">
                <div class="features-title">Качественно</div>
                <p>В СТО на оболони работают професионалы своего дела, мы гарантируем качественное выполнение технических работ.</p>
            </div>
            <div class="features-item">
                <div class="features-title">Надежно</div>
                <p>Ваш автомобиль прослужит вам еще долго без сбоев и неполадок.</p>
            </div>
        </section>

        <div class="index-content clearfix">
            {!! $page->body !!}
        </div>
    </div>
@endsection
