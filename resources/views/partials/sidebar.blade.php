<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
      <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
          <div class="nav">
            <div class="sb-sidenav-menu-heading">Core</div>
            <a class="nav-link" href="{{ url('/dashboard') }}">
              <div class="sb-nav-link-icon">
                <i class="fas fa-tachometer-alt"></i>
              </div>
              Dashboard
            </a>
            @can('user')
              @if (Auth()->user()->role->name === 'Engineer')
                <a class="nav-link" href="{{ url('/training') }}">
                  <div class="sb-nav-link-icon">
                    <i class="fa-solid fa-book"></i>
                  </div>
                  Training
                </a>
                <a class="nav-link" href="{{ url('/basic-license') }}">
                  <div class="sb-nav-link-icon">
                    <i class="fa-regular fa-id-card"></i>
                  </div>
                  Basic License
                </a>
                <a class="nav-link" href="{{ url('/ame-license') }}">
                  <div class="sb-nav-link-icon">
                    <i class="fa-regular fa-id-card"></i>
                  </div>
                  AME License
                </a>
              @endif
              <a class="nav-link" href="{{ url('/ptw') }}">
                <div class="sb-nav-link-icon">
                  <i class="fa-solid fa-list-check"></i>
                </div>
                PTW
              </a>
            @endcan

            @can('admin')
              <div class="sb-sidenav-menu-heading">Administrator</div>
              <a class="nav-link" href="{{ url('/user') }}">
                <div class="sb-nav-link-icon">
                  <i class="fa-solid fa-user"></i>
                </div>
                User
              </a>
            @endcan
            
          </div>
        </div>
      </nav>
    </div>
    <div id="layoutSidenav_content">
        @yield('content')
    </div>
</div>