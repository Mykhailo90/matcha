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
        <a href="/profile/{{ $user->id }}">
          <div class="card" style="width: 15rem;">
            <img class="card-img-top" src="{{ $user->avatar }}" alt="Card image cap">
            <div class="card-body">
              <h6>{{ $user->name }}</h6>
              <p class="card-text">{{ $user->city }}, {{ $user->distance }}</p>
            </div>
          </div>
         </a>
        @endforeach
      </div>

      <div class="text_info_block">Воспользуйся формой поиска, чтобы увидеть больше...</div>
    </div>
  </div>
</main>
@endsection
