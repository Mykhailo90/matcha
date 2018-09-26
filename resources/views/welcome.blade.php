@extends('layouts.app')

@section('content')
<main>
  <link rel="stylesheet" type="text/css" href="{{ asset('css/main.css') }}" />
  
  <div class="wrapper_banner">
    <div class="container">
      <div class="main_name">
        <img id="name_site" src="{{ asset('img/head_name.png') }}">
      </div>

      <div class="text_info_block">
        Узнай ближе своих соседей! Возможно среди них твоя СУДЬБА?..
      </div>
      <div class="foto_block">
        @foreach ($nearest_people as $user)
          <div class="card" style="width: 15rem;">
            <img class="card-img-top" src="{{ $user->avatar }}" alt="Card image cap">
            <div class="card-body">
              <h5>{{ $user->name }}</h5>
              <p class="card-text">Город - {{ $user->city }}, Dist - {{ $user->distance }} gender: {{ $user->gender }}</p>
            </div>
          </div>
        @endforeach
      </div>
  
      <div class="text_info_block">Воспользуйся формой поиска, чтобы увидеть больше...</div>
    </div>
  </div>
</main>
@endsection


<!-- 

            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                        <a href="{{ route('register') }}">Register</a>
                    @endauth
                </div>
            @endif -->