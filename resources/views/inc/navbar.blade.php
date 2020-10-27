   
    <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    My Blog
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        
                        <a class="navbar-brand" class="{{Request::is('/') ? 'active' : ''}}"> <a href="/blog/public"> Posts </a></a>
                        <a class="navbar-brand" class="{{Request::is('Quran/create') ? 'active' : ''}}"> <a href="/blog/public/quran/create"> Create Post </a></a>  
                           
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        

                            @else

                        <a href="#" class="nav-item" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                           welcome {{ Auth::user()->name }} <span class="caret"></span>
                        </a> &nbsp &nbsp

                            <li class="nav-item">
                                <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                    <i class="fas fa-sign-out-alt"></i> Logout
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                          
                        @endguest
                    </ul>

        </div><!-- /.navbar-collapse -->
        </div>
    </nav>