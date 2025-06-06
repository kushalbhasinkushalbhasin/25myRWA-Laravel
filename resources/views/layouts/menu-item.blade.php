<li id="navbar-item-pages" aria-haspopup="true" aria-expanded="false"
    class="nav-item dropdown py-2 py-lg-5 px-0 px-lg-4">

    <a class="nav-link dropdown-toggle p-0" href="#" data-toggle="dropdown" >
        {{ $item['display_text'] }} <span class="caret"></span>
    </a>

    @if (!empty($item['children']))
        <ul class="dropdown-menu dropdown-submenu pt-3 pb-0 pb-lg-3">
            @foreach ($item['children'] as $child)
                @include('layouts.menu-item', ['item' => $child])
            @endforeach
        </ul>
    @endif

</li>