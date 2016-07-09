<footer class="main-footer">
    <div class="container clearfix">
        <section class="footer-contacts">
            СТО «На Оболони»<br>
            адрес: г. Киев, ул. Полярная, д. 19<br>
            Гаражный кооператив "Припять"<br>
            Бокс 335<br><br>
            <a href="mailto:obolon.sto@gmail.com">obolon.sto@gmail.com</a><br>
            телефон: +38 (050) 500-91-11<br>
            телефон: +38 (097) 839-95-54
        </section>
        <section class="footer-social">
            <p>Мы в социальных сетях</p>
            @foreach( $socialbuttons as $socialbutton )
                <a href="{{ $socialbutton->url }}" class="social-btn social-btn-{{ $socialbutton->title }}">{{ $socialbutton->title }}</a>
            @endforeach
        </section>
        <section class="footer-copyright">
            <p>Автор сайта:</p>
            <a href="https://github.com/mp091689" class="btn" style="text-transform: none">Mykyta P.</a>
        </section>
    </div>
</footer>