@extends('layouts.master')

@section('title')
    Заголовок|title
@endsection

@section('description')
    Описание|description
@endsection

@section('keywords')
    Ключевые слова|keywords
@endsection


@section('content')
    @include('includes.left')
    <!-- RIGHT COLUMN -->
    <div class="right clearfix">
        <h2>О компании</h2>
        <p class="text">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Nunc euislibero vel interdum interdum, neque sapien nonummy
            orci, ac sollicitudin ante urna a pede. Suspendisse hendrerit orci ut dui sollicitun spendisseert venenatis.Utut leo vel orci dignissim pulvinar. Nam ut lacus nec tortor blandit tincidunt. Duis suscipit nunc vitae dolor lacinia hendrerit. Fusce orci lectusty porttitor suscipit, elementum eu, tincidunt vitae, felis. Proin nunc tortor,ender feugiat vel, gravida eu, congue vel, felis. In eget turpis. Curabitur ligula.Nunc arcu dolor, vulputate eu, porta in, porta in, lorem.
        </p>
        <div class="btn-wrap">
            <a href="#" class="btn">Читать полностью</a>
        </div>
        <div class="galery clearfix">
            <div class="new-service">
                <img src="src/img/img01.png" alt="">
            </div>
            <div class="best-ideas">
                <img src="src/img/img02.jpg" alt="">
            </div>
        </div>
        <h2 class="latest">Наши достижения</h2>
        <ul>
            <li>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Nunc euislibero
                orci, ac sollicitudin ante urna a pede. Suspendisse hendrerit orci ut dui sollicn spendisseert venenatis.Utut leo vel orci dignissim pulvinar. Nam ut</li>
            <li>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Nunc euislibero
                orci, ac sollicitudin ante urna a pede. Suspendisse hendrerit orci ut dui sollicn spendisseert venenatis.Utut leo vel orci dignissim pulvinar. Nam ut</li>
        </ul>
        <div class="btn-wrap">
            <a href="#" class="btn">Читать полностью</a>
        </div>
        <h2 class="testimonial">Отзывы клиентов</h2>
        <div class="client">
            <img src="src/img/client-pic.png" alt="">
        </div>
        <p class="text2">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam, neque nulla, vel reiciendis minima earum labore</p>
        <p class="new-color">blandit tincidunt. Duis suscipit nunc vitadolor lacinia hendrerit. Fusce orci lectusty porttitor suscipit</p>
        <p class="author">Иванов И.И.</p>
    </div>
    <!-- /RIGHT COLUMN  -->
@endsection