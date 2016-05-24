<!-- HEADER -->
<header class="container clearfix">
    <!--  SLIDER  -->
    <div class="wrap_jcarousel">
        <div class="jcarousel" data-jcarousel="true" data-jcarouselautoscroll="true">
            <ul style="left: -1000px; top: 0px;">
                <li><img src="/src/img/slider2.jpg" alt=""></li>
                <li><img src="/src/img/slider1.jpg" alt=""></li></ul>
        </div>
    </div>
    <!--  /SLIDER  -->

    <!--  MAIN-MENU  -->
    <nav class="container clearfix">
        <div class="menu-icons">
            <a href="/" class="icon-home-outline" title="На главную страницу"></a>
            <!--<a href="#" class="icon-search" title="Поиск по сайту"></a>-->
            <a href="#" class="icon-mail" title="Обратная связь"></a>
        </div>
        <ul class="main-menu default">
            @foreach($menus as $menu)
                @if($menu->page->alias=='public')
                    <?php $h = '/'; ?>
                @else
                    <?php $h = $menu->page->alias ?>
                @endif
                <li {{ Request::is($h) ? 'class=active-li' : '' }}><a href="/{{ $h }}">{{ $menu->title }}</a></li>
            @endforeach
        </ul>
    </nav>
    <!--  /MAIN-MENU  -->
</header>
<!--  /HEADER  -->