<div class="footer container">
    <ul>
        @foreach($menus as $menu)
            @if($menu->page->alias=='public')
                <?php $h = '/'; ?>
            @else
                <?php $h = $menu->page->alias ?>
            @endif
            <li {{ Request::is($h) ? 'class=active-li-footer' : '' }}><a href="{{ $h }}">{{ $menu->title }}</a></li>
        @endforeach
    </ul>
    <p class="copyright">© Copyright Information</p>
</div>