<nav class="navbar navbar-expand-lg navbar-light page-navbar">
    <div class="container">
        <a href="{{ route('user') }}" class="navbar-brand">
            <img src="{{ asset('images/logo.png') }}" alt="Logo" height="50">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResp">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResp">
            <ul class="navbar-nav ml-auto">
                @guest
                    <li class="navbar-item">
                        <a href="{{ route('index') }}" class="nav-link">
                            Home
                        </a>
                    </li>
                    <li class="navbar-item ml-3">
                        <a href="{{route('about')}}" class="nav-link">
                            About
                        </a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item ml-3">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                    <li class="navbar-item ml-4">
                        
                        <a href="{{ route('login') }}" class="nav-link btn px-4">
                            Login
                        </a>
                    </li>
                @else
                    <li class="navbar-item">
                        <a href="/user" class="nav-link mr-3" disabled>
                            Logged in as, <strong>{{ Auth::user()->name }}</strong>
                        </a>
                    </li>
                    <li> 
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" ">
                            @csrf
                            <button class="nav-link btn bg-danger px-4" onclick="return confirm('Logout from account?');">Logout</button>
                        </form>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>