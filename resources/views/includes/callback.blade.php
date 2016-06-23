<div class="modal-icon"></div>
<div class="modal">
    <div class="modal-content">
        <div class="modal-content-close" title="Закрыть">Закрыть</div>

        <h2 class="modal-content-title">Обратный звонок</h2>
        <p>Укажите, свое имя, телефон и ваш вопрос. Мы перезвоним Вам в кротчайшие сроки.</p>

        @include('includes.info-box')

        <form action="{{-- route('callback.send') --}}" method="post" class="login-form" >
            <input class="modal-input" type="text" name="author" placeholder="Имя">
            <input class="modal-input" type="text" name="phone" placeholder="Телефон">
            <textarea class="modal-input" name="body" cols="30" rows="3" placeholder="Ваш комментарий"></textarea>
            <button type="submit" class="btn">Отправить</button>
            <input type="hidden" name="_token" value="{{ Session::token() }}"/>
        </form>
    </div>
    <div class="info-box success"></div>
</div>