<nav class="navbar navbar-expand-xl bg-transparent px-0 w-100">
    <a class="navbar-brand order-0 order-xl-1 mx-xl-auto"
           href="#">
           <img src="{{ asset('RWAVendor/clients/logo/' . app('client')->client_logo) }}" alt="{{app('client')->client_name}}" class="normal-logo">
           <img src="{{ asset('RWAVendor/clients/logo/' . app('client')->client_logo) }}" alt="{{app('client')->client_name}}" class="sticky-logo">
    </a>
    <div class="d-flex d-xl-none order-2">
      <!--<a class="d-block ml-auto mr-4 position-relative text-white p-2" href="#">-->
      <!--  <i class="fal fa-heart fs-large-4"></i>-->

      <!--</a>-->
      <button class="navbar-toggler border-0 pr-0" type="button"
                    data-toggle="collapse"
                    data-target="#primaryMenu03"
                    aria-controls="primaryMenu03" aria-expanded="false" aria-label="Toggle navigation">
        <span class="text-white fs-24"><i class="fal fa-bars"></i></span>
      </button>
    </div>
    <div class="collapse navbar-collapse order-3 order-xl-0 mt-3 mt-xl-0 mr-auto flex-grow-0" id="primaryMenu03">
        <ul class="navbar-nav hover-menu main-menu px-0 mx-xl-n4">
            @foreach ($navMenu as $index => $menu)
                @if ($index < 5)
                    <li id="navbar-item-pages" class="nav-item dropdown py-2 py-xl-5 px-0 px-xl-4">
                        <a class="nav-link {{$menu['submenu']?'dropdown-toggle':''}} p-0" href="{{empty($menu['submenu'])? $menu['target_path']: '#'}}" data-toggle="dropdown">
                            {{ $menu['display_text'] }}
                            <span class="caret"></span>
                        </a>
                        @if(!empty($menu['submenu']))
                            <ul class="dropdown-menu pt-3 pb-0 pb-xl-3" aria-labelledby="navbar-item-pages">
                                @foreach ($menu['submenu'] as $submenu)
                                    <li class="dropdown-item {{$submenu['children']?'dropdown dropright':''}} ">
                                        <a  class="dropdown-link {{$submenu['children']?'dropdown-toggle':''}} " href="{{empty($submenu['children'])?$submenu['target_path']: '#'}}" {{empty($submenu['children'])?'': ' data-toggle="dropdown"'}} >
                                            {{ $submenu['display_text'] }}
                                        </a>
                                        @if(!empty($submenu['children']))
                                            <ul class="dropdown-menu" aria-labelledby="navbar-link-news">

                                                @foreach ($submenu['children'] as $child)   
                                                    <li class="dropdown-item">
                                                        <a class="dropdown-link" href="{{$child['target_path']}}">{{$child['display_text']}}</a>
                                                    </li>
                                                @endforeach

                                            </ul>
                                        @endif
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </li>
                @endif
            @endforeach
        </ul>
        <div class="d-block d-xl-none">
            <ul class="navbar-nav hover-menu main-menu px-0 mx-xl-n4">
                @foreach ($navMenu as $index => $menu)
                    @if ($index >= 5)
                        <li id="navbar-item-pages" class="nav-item dropdown py-2 py-xl-5 px-0 px-xl-4">
                        <a class="nav-link {{$menu['submenu']?'dropdown-toggle':''}} p-0" href="{{empty($menu['submenu'])? $menu['target_path']: '#'}}" data-toggle="dropdown">
                            {{ $menu['display_text'] }}
                            <span class="caret"></span> 
                        </a>
                        @if(!empty($menu['submenu']))
                            <ul class="dropdown-menu pt-3 pb-0 pb-xl-3" aria-labelledby="navbar-item-pages">
                                @foreach ($menu['submenu'] as $submenu)
                                    <li class="dropdown-item {{$submenu['children']?'dropdown dropright':''}} ">
                                        <a  class="dropdown-link {{$submenu['children']?'dropdown-toggle':''}} " href="{{empty($submenu['children'])?$submenu['target_path']: '#'}}" {{empty($submenu['children'])?'': ' data-toggle="dropdown"'}} >
                                            {{ $submenu['display_text'] }}
                                        </a>
                                        @if(!empty($submenu['children']))
                                            <ul class="dropdown-menu" aria-labelledby="navbar-link-news">

                                                @foreach ($submenu['children'] as $child)   
                                                    <li class="dropdown-item">
                                                        <a class="dropdown-link" href="{{$child['target_path']}}">{{$child['display_text']}}</a>
                                                    </li>
                                                @endforeach

                                            </ul>
                                        @endif
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </li>
                    @endif
                @endforeach
                
                <li class="nav-item">
                      <a class="nav-link mr-md-2 pr-2 pl-0 pl-lg-2" href="contactus" >
                        Contact Us
                      </a>
                    </li>
                    @if(!empty($_SESSION)&&isset($_SESSION['UR_LOGINID']))
                  
                    <li id="navbar-item-pages" class="nav-item dropdown py-2 py-xl-5 px-0 px-xl-4">
                        <a class="nav-link dropdown-toggle p-0" href="#" data-toggle="dropdown">
                            <i class="fal fa-user fs-large-4"></i>
                        </a>
                        <ul class="dropdown-menu pt-3 pb-0 pb-xl-3" aria-labelledby="navbar-item-pages">
                            <li class="dropdown-item dropdown dropright ">
                                <a  class="dropdown-link" href="user_profile">User Details</a>
                            </li>
                            <li class="dropdown-item dropdown dropright ">
                                <a  class="dropdown-link" href="contact_ext">Contact Details</a>
                            </li>
                            <li class="dropdown-item dropdown dropright ">
                                <a  class="dropdown-link" href="housedetails">House Details</a>
                            </li>
                        </ul>
                    </li>
                    @endif
                    <li class="nav-item ">
                        @if(!empty($_SESSION)&&isset($_SESSION['UR_LOGINID']))
                            <a class="nav-link mr-md-2 pr-2 pl-0 pl-lg-2" href="logout">Logout</a>
                        @else
                            <a class="nav-link mr-md-2 pr-2 pl-0 pl-lg-2" href="login_signup">Sign In/ Sin Up</a>
                        @endif
                    </li>
        
            </ul>
        </div>
    </div>
    <div class="ml-auto d-none d-xl-block order-xl-2">
      <ul class="navbar-nav hover-menu flex-row ml-auto align-items-center justify-content-lg-end flex-wrap py-2">

            @foreach ($navMenu as $index => $menu)
                @if ($index >= 5)
                    <li id="navbar-item-pages" class="nav-item dropdown py-2 py-xl-5 px-0 px-xl-4">
                        <a class="nav-link {{$menu['submenu']?'dropdown-toggle':''}} p-0" href="{{empty($menu['submenu'])? $menu['target_path']: '#'}}" data-toggle="dropdown">
                            {{ $menu['display_text'] }}
                            <span class="caret"></span> 
                        </a>
                        @if(!empty($menu['submenu']))
                            <ul class="dropdown-menu pt-3 pb-0 pb-xl-3" aria-labelledby="navbar-item-pages">
                                @foreach ($menu['submenu'] as $submenu)
                                    <li class="dropdown-item {{$submenu['children']?'dropdown dropright':''}} ">
                                        <a  class="dropdown-link {{$submenu['children']?'dropdown-toggle':''}} " href="{{empty($submenu['children'])?$submenu['target_path']: '#'}}" {{empty($submenu['children'])?'': ' data-toggle="dropdown"'}} >
                                            {{ $submenu['display_text'] }}
                                        </a>
                                        @if(!empty($submenu['children']))
                                            <ul class="dropdown-menu" aria-labelledby="navbar-link-news">

                                                @foreach ($submenu['children'] as $child)   
                                                    <li class="dropdown-item">
                                                        <a class="dropdown-link" href="{{$child['target_path']}}">{{$child['display_text']}}</a>
                                                    </li>
                                                @endforeach

                                            </ul>
                                        @endif
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </li>
                @endif
            @endforeach

        <li class="nav-item">
          <a class="nav-link mr-md-2 pr-2 pl-0 pl-lg-2" href="contactus" >
            Contact Us
          </a>
        </li>
        @if(!empty($_SESSION)&&isset($_SESSION['UR_LOGINID']))
        <li class="divider"></li>
        <li id="navbar-item-pages" class="nav-item dropdown py-2 py-xl-5 px-0 px-xl-4">
            <a class="nav-link dropdown-toggle p-0" href="#" data-toggle="dropdown">
                <i class="fal fa-user fs-large-4"></i>
                <span class="caret"></span> 
            </a>
            <ul class="dropdown-menu pt-3 pb-0 pb-xl-3" aria-labelledby="navbar-item-pages">
                <li class="dropdown-item dropdown dropright ">
                    <a  class="dropdown-link" href="user_profile">User Details</a>
                </li>
                <li class="dropdown-item dropdown dropright ">
                    <a  class="dropdown-link" href="contact_ext">Contact Details</a>
                </li>
                <li class="dropdown-item dropdown dropright ">
                    <a  class="dropdown-link" href="housedetails">House Details</a>
                </li>
            </ul>
        </li>
        @endif
        <li class="nav-item ">
            @if(!empty($_SESSION)&&isset($_SESSION['UR_LOGINID']))
                <a class="nav-link pl-3 pr-2" href="logout">Logout</a>
            @else
                <a class="nav-link pl-3 pr-2" href="login_signup">Sign In/ Sin Up</a>
            @endif
        </li>
      </ul>
    </div>
  </nav>