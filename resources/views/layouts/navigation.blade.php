<header class="main-header position-absolute fixed-top m-0 navbar-dark header-sticky header-sticky-smart header-mobile-xl-new">
    <div class="sticky-area ">
      <div class="pl-20 pr-20 container-xxl ">
        @if(app('client')->client_code == '00007')
          @include('layouts.logo-middle')
        @else
          @include('layouts.logo-left')
        @endif
      </div>
    </div>
  </header>