<!-- HEADER -->
<header class="main-header">
    <div class="container clearfix">
        <!--  MAIN-MENU  -->
        <nav class="main-navigation">
			<a class="header-logo" href="/"><img src="{{ URL::asset('src/img/logo.png') }}" /></a>
            <ul class="main-menu default">
                @foreach($menus as $menu)
                    <?php
                        if ($menu->page->alias == 'public') {
                            $uri = '/';
                        } else {
                            $uri = $menu->page->alias;
                        }
                    ?>
                    <li {{ Request::is($uri) ? 'class=active' : '' }}><a href="/{{ $menu->page->alias }}">{{ $menu->title }}</a></li>
                @endforeach
            </ul>
        </nav>
        <!--  /MAIN-MENU  -->
    </div>
</header>
<!--  /HEADER  -->