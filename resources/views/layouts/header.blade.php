<header>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
<div class="left_part">
  <a class="navbar-brand" href="/"><img src="{{ asset('img/matcha.png') }}"></a>
</div>

<div class="right_part">
  <div class="collapse navbar-collapse" id="navbarNavDropdown">

    <ul class="navbar-nav">
      @if (Route::has('login'))
      @auth
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Уведомления
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="#">Сообщения</a>
          <a class="dropdown-item" href="#">Симпатии</a>
          <a class="dropdown-item" href="#">Посетители</a>
        </div>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Мои симпатии
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">

          <a class="dropdown-item" href="#">Я нравлюсь</a>
          <a class="dropdown-item" href="#">Мне нравятся</a>
          <a class="dropdown-item" href="#">Взаимные симпатии</a>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="/home">Знакомства</a>
      </li>

      <li class="nav-item dropdown">
        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
        {{ Auth::user()->name }} <span class="caret"></span>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="/my_info">Моя анкета</a>
          <a class="dropdown-item" href="#">Настройки профиля</a>

          <a class="dropdown-item" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
           document.getElementById('logout-form').submit();">
           {{ __('Logout') }}
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
        </form>
        </div>
      </li>
      @else
      <li class="nav-item">
        <a class="nav-link" href="{{ route('login') }}">Авторизация</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('register') }}">Регистрация</a>
      </li>
          @endauth
    @endif

    </ul>
  </div>

</div>
</nav>


  <div class="flex-center position-ref full-height">

  </div>
</header>
