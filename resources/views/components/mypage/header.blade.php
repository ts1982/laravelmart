<nav class="navbar fixed-top navbar-expand-md navbar-light shadow-sm" style="background-color: #e4ffea;">
    <a class="navbar-brand" href="{{ url('/') }}">
        <strong>LaravelMart</strong>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <!-- Left Side Of Navbar -->
        <div class="ml-4 mr-auto">
            <form class="form-inline my-auto">
                <input class="form-control w-75" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-success" type="submit"><i class="fas fa-search"></i></button>
            </form>
        </div>

        <!-- Right Side Of Navbar -->
        <ul class="navbar-nav ml-auto">
            <!-- Authentication Links -->
            @guest
                @if (Route::has('register'))
                    <li class="nav-item mr-4">
                        <a class="nav-link active" href="{{ route('register') }}">{{ __('新規登録') }}</a>
                    </li>
                @endif
                <li class="nav-item mr-4">
                    <a class="nav-link active" href="{{ route('login') }}">{{ __('ログイン') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}"><i class="fas fa-heart mr-4"></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}"><i class="fas fa-shopping-cart mr-4"></i></a>
                </li>
            @else
                <li>
                    <a href="{{ route('mypage') }}" class="nav-link mr-5"><i class="fas fa-user"></i>マイページ</a>
                </li>
                <li>
                    <a href="{{ route('mypage.favorite') }}" class="nav-link mr-5"><i class="fas fa-heart"></i></a>
                </li>
                <li>
                    <a href="{{ route('carts.index') }}" class="nav-link mr-5"><i class="fas fa-shopping-cart"></i></a>
                </li>
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
            @endguest
        </ul>
    </div>
</nav>
