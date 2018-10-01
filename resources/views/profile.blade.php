@extends('layouts.app')
<meta name="csrf-token" content="{{ csrf_token() }}">

<link rel="stylesheet" type="text/css" href="{{ asset('css/profile.css') }}" />
@section('content')
<div class="container">

    <div class="cont_header">
        <h1>{{$fields->name}} Profile</h1>
    </div>

    <div class="cont_info">
        @if ($fields->avatar == '/img/incognito.png')
            <div class="alert alert-danger" role="alert">
                <p>Чтобы открылась возможность просматривать анкеты пользователей необоходимо заполнить анкету и добавить фотографию!</p>
            </div>
        @endif
        @if ($fields->avatar != '/img/incognito.png')
            <div class="alert alert-primary" role="alert">
                <p>Чем больше информации вы разместите - тем выше Ваш рейтинг!</p>
            </div>
        @endif            
    </div>

    <div class="row content_wrap">
        <div class="cont_img">           
            <img class="user_img" src="{{ $fields->avatar }}" alt="avatar" data-toggle="modal" data-target="#exampleModal">
            <form id="uploadForm" method="post" enctype='multipart/form-data'>
            <input class="btn btn-primary" id="file" type="file" name="image">
            <button id="load_foto" type="submit" class="btn btn-primary" onclick="btn_load();">Load</button>
            </form>
        </div>
       
        
        <div class="prof_info">
            <p><strong>First name: </strong>{{$fields->first_name}}</p>
            <p><strong>Last name: </strong>{{$fields->last_name}}</p>
            <p><strong>Age: </strong>{{$fields->age}}</p>
            <p><strong>City: </strong>{{$fields->city}}</p>
            <p><strong>Gender: </strong>{{$fields->gender}}</p>
            <p><strong>Sex-preferences: </strong>{{$fields->sexpreferences}}</p>
            <p><strong>My raiting: </strong>{{$fields->raiting}}</p>
            <button type="button" class="btn btn-primary btn-lg btn-block">Update</button>
        </div>
        
    </div>
   
    <div class="interests">
        <div class="row">
            <h5>My interests: </h5>
        </div>
        <div class="row">
           
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.
            Sint, odit! Earum amet eaque qui, provident atque, ipsam, porro maxime error
             fugit rerum quaerat quis quasi et eum molestiae a sed!</p>
            
        </div>
        <button type="button" class="btn btn-primary btn-lg btn-block">Change interests</button>   
    </div>
    <div class="users_foto">
        <div class="row">
            <h5>My best foto: </h5>
        </div>
        
        <div class="row">

        <div class="card" style="width: 12rem;">
            <img class="card-img-top" src="{{ asset('img/incognito.png') }}" alt="foto">
        </div>

        <div class="card" style="width: 12rem;">
            <img class="card-img-top" src="{{ asset('img/incognito.png') }}" alt="foto">
        </div>

        <div class="card" style="width: 12rem;">
            <img class="card-img-top" src="{{ asset('img/incognito.png') }}" alt="foto">
        </div>

        <div class="card" style="width: 12rem;">
            <img class="card-img-top" src="{{ asset('img/incognito.png') }}" alt="foto">
        </div>

        </div>
        

    </div>

    <!-- <button type="button" class="btn btn-success btn-lg btn-block">Сохранить изменения</button> -->
</div>


       
@endsection

        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div id="app">
                        <!-- <load-foto></load-foto> -->
                    </div>
                </div>
            </div>
        </div>
       <script src="{{ asset('js/profile.js') }}"></script>