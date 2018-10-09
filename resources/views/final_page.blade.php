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
#status{
	color: brown;
}

</style>










@section('content')
<div class="container">
    <div class="cont_header">
        <h1>{{$fields->name}} Profile</h1>
        <h6 id="status">Статус ОНЛАЙН или дата посленднего действия</h6>
    </div>
<?php

// Динамическое определение содержания текста кнопок Добавить в Друзья/Удалить из друзей
// Добавить в Игнор/Убрать из черного списка

  $add_friend = ($fields->avatar == "/img/incognito.png") ? "From friend" : "In friend";
  $add_ignor = ($fields->photo1 == "/img/incognito.png") ? "From ignore" : "In ignore";

?>

 <div class="content_wrap">

<!-- форма обработки главного фото профиля -->
        <div class="cont_img">
          <div class="file-upload">
            
              <label> 
                <input type="file" name="image" class="form-control">
                <input type="hidden" name="title" value="avatar">
              </label>
              <img class="user_img" src="{{ $fields->avatar }}" alt="avatar">
          </div>
          <form action="#" enctype="multipart/form-data" method="POST">
              	<input type="hidden" name="_token" value="{{ csrf_token() }}">
          		<button class="btn btn-success upload-image" type="submit">{{ $add_friend }}</button>
      		</form>
      			<form action="#" enctype="multipart/form-data" method="POST">
              		<input type="hidden" name="_token" value="{{ csrf_token() }}">
          			<button class="btn btn-danger del-image" type="submit">{{ $add_ignor }}</button>
            	</form>
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

    <div class="cont_img">
    <div class="file-upload">
        <img class="user_img" src="{{ $fields->photo1 }}" alt="photo1">
    </div>
  </div>

  <div class="cont_img">
  <div class="file-upload">
      <img class="user_img" src="{{ $fields->photo2 }}" alt="photo2">
  </div>
 
</div>

<div class="cont_img">
<div class="file-upload">
    <img class="user_img" src="{{ $fields->photo3 }}" alt="photo3">
</div>

</div>

<div class="cont_img">
<div class="file-upload">
  
    <img class="user_img" src="{{ $fields->photo4 }}" alt="photo4">
</div>

</div>

    </div>
    

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