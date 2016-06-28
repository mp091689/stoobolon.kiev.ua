<nav class="navbar navbar-inverse navbar-static-top">
    <div class="container">
        <div class="navbar-header">
            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <!-- Branding Image -->
            <a class="navbar-brand" href="{{ url('/') }}">
                СТО
            </a>
        </div>

        @if(Auth::user())
            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    <li><a href="{{ url('/admin') }}">Админ панель</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Контент <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ url('/admin/pages') }}"><i class="glyphicon glyphicon-file"></i> Страницы</a></li>
                            <li><a href="{{ url('/admin/articles') }}"><i class="glyphicon glyphicon-align-justify"></i> Статьи</a></li>
                            <li><a href="{{ url('/admin/menus') }}"><i class="glyphicon glyphicon-share-alt"></i> Меню</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">На связи <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ url('/admin/callbacks') }}"><i class="glyphicon glyphicon-earphone"></i> Запросы на обратный звонок</a></li>
                            <li><a href="{{ url('/admin/feedbacks') }}"><i class="glyphicon glyphicon-question-sign"></i> Запросы со страницы "Контакты"</a></li>
                            <li><a href="{{ url('/admin/reviews') }}"><i class="glyphicon glyphicon-volume-up"></i> Отзывы</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Настройки <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ url('/admin/settings') }}"><i class="glyphicon glyphicon-cog"></i> Настройки сайта</a></li>
                            <li><a href="{{ url('/admin/emails') }}"><i class="glyphicon glyphicon-envelope"></i> Почтовые уведомления</a></li>
                        </ul>
                    </li>
                </ul>
            @endif
            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @if (Auth::guest())
                    <li><a href="{{ url('/login') }}">Login</a></li>
                    {{--<li><a href="{{ url('/register') }}">Register</a></li>--}}
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ url('/admin/user') }}"><i class="glyphicon glyphicon-cog"></i> Настройки</a></li>
                            <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i> Выход</a></li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>