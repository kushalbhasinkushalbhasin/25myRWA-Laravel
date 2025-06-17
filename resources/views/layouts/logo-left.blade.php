<nav class="navbar navbar-expand-lg bg-transparent px-0">

    <a class="navbar-brand" href="{{route('home')}}">
        <img src="{{ asset('RWAVendor/clients/logo/' . app('client')->client_logo) }}" alt="logo">
    </a>
    <div class="d-flex d-lg-none ml-auto">
        <!--<a class="d-block mr-4 position-relative text-white p-2" href="#">-->
        <!--    <i class="fal fa-heart fs-large-4"></i>-->
        <!--    <span class="badge badge-primary badge-circle badge-absolute">1</span>-->
        <!--</a>-->
        <button class="navbar-toggler border-0 px-0" type="button" data-toggle="collapse" data-target="#primaryMenu06"
            aria-controls="primaryMenu06" aria-expanded="false" aria-label="Toggle navigation">
            <span class="text-logo-green fs-24"><i class="fal fa-bars"></i></span>
        </button>
    </div>

    <div class="collapse navbar-collapse mt-3 mt-lg-0 mx-auto {{count($navMenu) > 6 ?'flex-grow-0':'ml-5'}} " id="primaryMenu06">

        <ul class="navbar-nav main-menu hover-menu main-menu px-0 mx-lg-n4">

            @foreach ($navMenu as $menu)
            <li id="navbar-item-pages" aria-haspopup="true" aria-expanded="false"
                class="nav-item dropdown py-2 py-lg-5 px-0 px-lg-4">
                <a class="nav-link {{$menu['submenu']?'dropdown-toggle':''}} p-0" href="{{empty($menu['submenu'])? $menu['target_path']: '#'}}" {{empty($menu['submenu'])? $menu['target_path']: '#'}} {{empty($menu['submenu'])? '': 'data-toggle="dropdown"'}}  >
                    {{ $menu['display_text'] }} <span class="caret"></span>
                </a>
                @if(!empty($menu['submenu']))
                <ul class="dropdown-menu pt-3 pb-0 pb-lg-3" aria-labelledby="navbar-item-pages">
                    @foreach ($menu['submenu'] as $submenu)
                    <li class="dropdown-item {{$submenu['children']?'dropdown dropright':''}} ">
                        <a id="navbar-link-news" class="dropdown-link {{$submenu['children']?'dropdown-toggle':''}} "
                            href="{{empty($submenu['children'])?$submenu['target_path']: '#'}}" {{$submenu['new_tab']==1? 'target="_blank"': ''}}  {{empty($submenu['children'])?'data-toggle="dropdown"':''}}>
                            {{ $submenu['display_text'] }}
                        </a>
                        @if(!empty($submenu['children']))
                        <ul class="dropdown-menu dropdown-submenu pt-3 pb-0 pb-lg-3" aria-labelledby="navbar-link-news">
                            @foreach ($submenu['children'] as $child)
                            <li class="dropdown-item">
                                <a class="dropdown-link" href="{{$child['target_path']}}" {{$submenu['new_tab']==1? 'target="_blank"': ''}} >{{$child['display_text']}}</a>
                            </li>
                            @endforeach
                        </ul>
                        @endif
                    </li>
                    @endforeach
                </ul>
                @endif
            </li>
            @endforeach

        </ul>
        @if(0)
        <div class="d-block d-lg-none">
            <ul class="navbar-nav flex-row ml-auto align-items-center justify-content-lg-end flex-wrap py-2">

                <li class="divider"></li>
                <li class="nav-item">
                    <a class="nav-link pl-3 px-2" data-toggle="modal" href="#login-register-modal">SIGN IN</a>
                </li>
            </ul>
        </div>
        @endif
    </div>
<!--login enable disable -->
     @if(1)
    <div class="d-none d-lg-block">
        <ul class="navbar-nav flex-row ml-auto align-items-center justify-content-lg-end flex-wrap py-2">

            {{-- <li class="divider"></li> --}}
            <li class="nav-item">
                @if(!empty($_SESSION)&&isset($_SESSION['UR_LOGINID']))
                    <a class="nav-link pl-3 pr-2" href="logout">Logout</a>
                @else
                    <a class="nav-link pl-3 pr-2 btn btn-drk-orange min-w-100" href="login_signup">Login</a>
                @endif
    
            </li>

        </ul>
    </div>
     @endif
</nav>