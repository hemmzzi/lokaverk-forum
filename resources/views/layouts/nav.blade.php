        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    Forum
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav mr-auto">
                        <li><a class="nav-link" href="/threads">All Threads</a></li>

                    <li class="dropdown">
                  <a  class="nav-link" class="nav-link" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Browse <span class="caret"></span></a>


                  <ul class="dropdown-menu">
        
                    <li><a href="/threads">All Threads</a></li>
                    <li><a href="/threads?popular=1">popular threads</a></li>

                    @if (auth()->check())
                    <li><a href="/threads?by={{ auth()->user()->name }}">My Threads</a></li>
                    @endif
                </ul>
            </li>
                 

                <li>
                <a class="nav-link" href="/threads/create">New Threads</a>
                </li>

                <li class="dropdown">
                  <a  class="nav-link" class="nav-link" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Channels <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                   @foreach ($channels as $channel)
                   <li><a class="nav-link" href='/threads/{{ $channel->slug }}'>{{$channel->name}}</a></li>
                   @endforeach
                  </ul>

                    </ul>

                    <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @if (Auth::guest())
                    <li><a href="{{ route('login') }}">Login</a></li>
                    <li><a href="{{ route('register') }}">Register</a></li>
                @else
                <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          {{ Auth::user()->name }} <span class="caret"></span>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
        <a class="dropdown-item" href="{{ route('profile', Auth::user()) }}">My Profile</a>
         <a class="dropdown-item" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                                    Logout
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
                                    {{ csrf_field() }}
                                </form>
        </div>
      </li>

                @endif
            </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">