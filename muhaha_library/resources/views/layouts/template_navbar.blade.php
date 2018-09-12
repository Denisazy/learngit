<nav class="navbar navbar-default navbar-static-top">
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
                        <img src="{{ asset('images/logo-b.png') }}">
                        <!-- {{ config('app.name', 'dsfasdfasdf') }} -->
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    &nbsp;
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ route('login') }}">Login</a></li>
                        <li><a href="{{ route('register') }}">Register</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                <img alt="Avatar" class="right-avatar nav-avatar" src="{{ asset('images/user.png') }}">{{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
</nav>

<!-- <div id="head-nav" class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="fa fa-gear"></span>
        </button>
        <a class="navbar-brand" href="#" style="cursor: pointer;">
        <img src="{{ asset('images/logo-b.png') }}">
        </a>
      </div>
      <div class="navbar-collapse collapse">
    <ul class="nav navbar-nav navbar-right user-nav">
      <li class="dropdown profile_menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="cursor: pointer;">
            <img alt="Avatar" class="right-avatar nav-avatar" src="{{ asset('images/user.png') }}">
            <span>用户</span> 
            <b class="caret"></b>
            </a>
        <ul class="dropdown-menu">
          <li><a data-target="#edit" data-toggle="modal" id="login-btn" style="cursor: pointer;">操作</a></li>
          <li><a href="#" style="cursor: pointer;">操作2</a></li>
          <li class="divider"></li>
          <li><a href="#" style="cursor: pointer;">登出</a></li>
        </ul>
      </li>
    </ul>           
    

      </div>
    </div>
  </div> -->
