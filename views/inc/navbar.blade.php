<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand">ShareMyLEGO</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="/">ホーム</a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="/rakuten/0">商品検索</a>
        </li>
        @ifauth
          <li class="nav-item active">
            <a class="nav-link" href="/mypage">マイページ</a>
          </li>
        @endif
      </ul>
      <ul class="navbar-nav ml-auto">
        @ifauth
          <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
              {{ Auth::user()->name }}
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
              </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
              </form>
            </div>
          </li>
        @else
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              {{ __('Login') }}
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown">
              @if (Route::has('login'))
                <a class="dropdown-item" href="{{ route('login') }}">{{ __('Login') }}</a>
              @endif
              @if (Route::has('register'))
                <a class="dropdown-item" href="{{ route('register') }}">{{ __('Register') }}</a>
              @endif
            </div>
          </li>
        @endif
      </ul>
    </div>
  </div>
</nav>

