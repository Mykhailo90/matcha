@extends('layouts.app')
<link rel="stylesheet" type="text/css" href="{{ asset('css/profile.css') }}" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<style>
#map{
	margin-bottom: 50px;
}
.cont_header{
	margin-bottom: 25px;
}
#status_online{
	color: green;
}
#last_visit{
  color: brown;
}
#btn_div{
    display: flex;
    flex-wrap: nowrap;
}
.add_f{
    width: 50%;
}
.add_f .btn{
    width: 100%;
}
.file-upload{
    margin-bottom: 20px;   
}
</style>

@section('content')
<div class="container">
    <div class="cont_header">
        <h1>{{$fields->name}} Profile</h1>
        @if($fields->isOnline())
          <h6 id="status_online">ОНЛАЙН</h6>
        @else
          <h6 id="last_visit">{{ $fields->updated_at }}</h6>
        @endif
        <div class="cont_info">
             @if ($ignore_status == 1)
                <div class="alert alert-danger" role="alert">
                    Обоюдный запрет на общение!
                 </div>
            @elseif ($ignore_status == 2)
            <div class="alert alert-danger" role="alert">
                    Вы добавили данного пользователя в игнор!
                 </div>
            @elseif ($ignore_status == 3)
                <div class="alert alert-danger" role="alert">
                    Пользователь добавил Вас в игнор!
                 </div>
            @endif
            @if ($friend_status == 1)
                <div class="alert alert-primary" role="alert">
                    Вами было отправлено приглашение на добавление в друзья!
                 </div>
            @elseif ($friend_status == 3)
                <div class="alert alert-primary" role="alert">
                    Пользоваетль отправил Вам запрос на добавление в друзья!
                 </div>
            @endif

        </div>
    </div>
<?php

// Формирование кнопок
// Добавить в Игнор/Убрать из черного списка

    $add_friend_btn = '<form class="add_f" action="' . route('addFriend') . '" enctype="multipart/form-data" method="POST">' .
                    '<input type="hidden" name="_token" value=" ' . csrf_token() . '">' .
                    '<input type="hidden" name="user_to" value="' . $fields->id .'">' .
                    '<button class="btn btn-success" type="submit">Add Friend</button>' .
                    '</form>';
    $del_friend_btn = '<form class="add_f" action="' . route('delFriend') . '" enctype="multipart/form-data" method="POST">' .
                    '<input type="hidden" name="_token" value=" ' . csrf_token() . '">' .
                    '<input type="hidden" name="user_to" value="' . $fields->id .'">' .
                    '<button class="btn btn-danger" type="submit">Del Friend</button>' .
                    '</form>';
    $del_invitation_btn = '<form class="add_f" action="' . route('delInvitation') . '" enctype="multipart/form-data" method="POST">' .
                    '<input type="hidden" name="_token" value=" ' . csrf_token() . '">' .
                    '<input type="hidden" name="user_to" value="' . $fields->id .'">' .
                    '<button class="btn btn-danger" type="submit">Del Invitation</button>' .
                    '</form>';
    $get_invitation_btn = '<form class="add_f" action="' . route('getInvitation') . '" enctype="multipart/form-data" method="POST">' .
                    '<input type="hidden" name="_token" value=" ' . csrf_token() . '">' .
                    '<input type="hidden" name="user_to" value="' . $fields->id .'">' .
                            '<button class="btn btn-success" type="submit">Get Invitation</button>' .
                            '</form>';
    
    $add_ignore_btn = '<form class="add_f" action="' . route('addIgnore') . '" enctype="multipart/form-data" method="POST">' .
                    '<input type="hidden" name="_token" value=" ' . csrf_token() . '">' .
                    '<input type="hidden" name="user_to" value="' . $fields->id .'">' .
                    '<button class="btn btn-warning" type="submit">Add In Ignore</button>' .
                    '</form>';
    $del_ignore_btn = '<form class="add_f" action="' . route('delIgnore') . '" enctype="multipart/form-data" method="POST">' .
                    '<input type="hidden" name="_token" value=" ' . csrf_token() . '">' .
                    '<input type="hidden" name="user_to" value="' . $fields->id .'">' .
                    '<button class="btn btn-primary" type="submit">Del Ignore</button>' .
                    '</form>';

?>

 <div class="content_wrap">

<!-- форма обработки главного фото профиля -->
        <div class="cont_img">
          <div class="file-upload">
              <img class="user_img" src="{{ $fields->avatar }}" alt="avatar">
          </div>


          @if($my_id != $fields->id)
          <div id="btn_div">

        <?php

        // Добавляем модуль управления состоянием дружбы
            if ($friend_status == 0){
                echo $add_friend_btn;
            }
            elseif ($friend_status == 1){
                echo $del_invitation_btn;
            }
            elseif ($friend_status == 2){
                echo $get_invitation_btn;
            }
            else{
                echo $del_friend_btn;
            }
// Добавляем модуль управления состоянием таблицы игнора
            if ($ignore_status == 1 || $ignore_status == 2){
                 echo $del_ignore_btn;
            }
            else{
                echo $add_ignore_btn;
            }

        ?> 
        </div>
        @endif
        </div>
  <!-- ********************************************************************************** -->

<!-- Основная анкетная информация о пользователе -->
        <div class="prof_info">
            <p><strong>First name: </strong>{{$fields->first_name}}</p>
            <p><strong>Last name: </strong>{{$fields->last_name}}</p>
            <p><strong>Age: </strong>{{$fields->age}}</p>
            <p><strong>City: </strong>{{$fields->city}}</p>
            <p><strong>Gender: </strong>{{$fields->gender}}</p>
            <p><strong>Sex-preferences: </strong>{{$fields->sexpreferences}}</p>
            <p><strong>My raiting: </strong>{{$fields->fame_rating}}</p>
        </div> 
    </div>
    
    <!-- ********************************************************************************* -->

  <!-- Блок интересов по которому производится поиск идеального знакомства -->
    <div class="interests">
    <div class="row">
        <h5>{{$fields->name}} interests: </h5>
    </div>
    <div class="row">
       
        <p id="profile_interests"> 
          @if (count($interests))
            @foreach ($interests as $interest)

              <strong>#{{$interest->interst_name}} </strong>
            @endforeach
           @else
           		<strong>Пользователь пока не добавил информацию о себе. Вы можете попросить его об этом!</strong>
          @endif
        </p>
        
    </div>
</div>

<!-- ********************************************************************************* -->

 <!-- Блок из 4 фото пользователя с основными операциями над блоком -->

<div class="users_foto">
    <div class="row">
        <h5>{{$fields->name}} best foto: </h5>
    </div>
     <div class="row">

    <?php
      $res = 0;
      if ($fields->photo1 != '/img/incognito.png'){
        $flag = '<div class="cont_img">' .
                  '<div class="file-upload">'.
                  '<img class="user_img" src="' . $fields->photo1 .'" alt="photo1">'.
                  '</div>' .
                  '</div>';
        $res += 1;
        echo $flag;
      }
        if ($fields->photo2 != '/img/incognito.png'){
        $flag = '<div class="cont_img">' .
                  '<div class="file-upload">'.
                  '<img class="user_img" src="' . $fields->photo2 .'" alt="photo2">'.
                  '</div>' .
                  '</div>';
        $res += 1;
        echo $flag;
      }
      if ($fields->photo3 != '/img/incognito.png'){
        $flag = '<div class="cont_img">' .
                  '<div class="file-upload">'.
                  '<img class="user_img" src="' . $fields->photo3 .'" alt="photo3">'.
                  '</div>' .
                  '</div>';
        $res += 1;
        echo $flag;
      }
      if ($fields->photo4 != '/img/incognito.png'){
        $flag = '<div class="cont_img">' .
                  '<div class="file-upload">'.
                  '<img class="user_img" src="' . $fields->photo4 .'" alt="photo4">'.
                  '</div>' .
                  '</div>';
        $res += 1;
        echo $flag;
      }      
      if ($res == 0){
        echo '<div class="alert alert-primary">Пользователь еще не добавил фотографии</div>';
      }
    ?>


  

</div>


<!-- ********************************************************************************* -->

<div class="user_on_map">
    <div class="row">
        <h5>Пользователь {{ $fields->name }}  на карте</h5>
    </div>
    <div class="row" id="map">
    <!-- Вставить фрагмент карты с пользователем -->

    </div>
</div>




</div>


@endsection
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCbbdTf3JfUUQDE1ohX5o0AiV6dmfXEaQM&callback=initMap"
    async defer></script>

<script type="text/javascript">
	function initMap(uluru) {
  		map = new google.maps.Map(document.getElementById('map'), {zoom: 10, center: uluru});
		// The marker, positioned at Uluru
  		var marker = new google.maps.Marker({position: uluru, map: map});
  	}

  	window.onload = function(){
  		var map;

  		var uluru = {
    		lat: {{ $fields->latitude }},
    		lng: {{ $fields->longitude }}
  		};
  		initMap(uluru);
  	};
</script>



<!-- AIzaSyCbbdTf3JfUUQDE1ohX5o0AiV6dmfXEaQM          my googleApiKey-->