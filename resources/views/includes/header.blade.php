<!-- HEADER -->
<header class="main-header">
    <div class="container clearfix">
        <!--  MAIN-MENU  -->
        <nav class="main-navigation">
            <ul class="main-menu default">
                @foreach($menus as $menu)
                    @if($menu->page->alias=='public')
                        <?php $h = ''; ?>
                    @else
                        <?php $h = $menu->page->alias ?>
                    @endif
                    <li {{ Request::is($h) ? 'class=active' : '' }}><a href="/{{ $h }}">{{ $menu->title }}</a></li>
                @endforeach
            </ul>
        </nav>
        <!--  /MAIN-MENU  -->
        {{--<div class="user-block">--}}
            {{--<a href="#" class="login">Вход</a>--}}
        {{--</div>--}}
    </div>
</header>
<!--  /HEADER  -->