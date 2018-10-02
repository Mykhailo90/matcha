@extends('layouts.app')
<link rel="stylesheet" type="text/css" href="{{ asset('css/profile.css') }}" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
@section('content')
<div class="container">
    <div class="cont_header">
        <h1>{{$fields->name}} Profile</h1>
    </div>
<?php
  $ava = ($fields->avatar == "/img/incognito.png") ? "Add Image" : "Change IMG";
  $photo1 = ($fields->photo1 == "/img/incognito.png") ? "Add Image" : "Change IMG";
  $photo2 = ($fields->photo2 == "/img/incognito.png") ? "Add Image" : "Change IMG";
  $photo3 = ($fields->photo3 == "/img/incognito.png") ? "Add Image" : "Change IMG";
  $photo4 = ($fields->photo4 == "/img/incognito.png") ? "Add Image" : "Change IMG";
  $externalContent = file_get_contents('https://api.2ip.ua/geo.json?ip=');
  $externalContent = json_decode($externalContent);
  $latitude = $externalContent->latitude;
  $longitude = $externalContent->longitude;
  $country = $externalContent->country;
  $city = $externalContent->city;

?>
    <div class="cont_info">
             @if ($fields->avatar == '/img/incognito.png')
                <div class="alert alert-danger" role="alert">
                    Чтобы открылась возможность просматривать анкеты пользователей необоходимо заполнить анкету и добавить фотографию!
                 </div>
            @endif
            @if ($fields->avatar != '/img/incognito.png')
                <div class="alert alert-primary" role="alert">
                    Чем больше информации вы разместите - тем выше Ваш рейтинг!
                 </div>
            @endif

            <div class="alert alert-danger print-error-msg" style="display:none">
                <ul></ul>
            </div>     

            <!-- <button type="button" class="btn btn-success btn-lg btn-block">Сохранить изменения</button> -->
        </div>
    
    <div class="content_wrap">

        <div class="cont_img">
          <div class="file-upload">
            <form action="{{ route('ajaxImageUpload') }}" enctype="multipart/form-data" method="POST">
            <!-- <form> -->
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <label> 
                <input type="file" name="image" class="form-control">
                <input type="hidden" name="title" value="avatar">
              </label>
              <img class="user_img" src="{{ $fields->avatar }}" alt="avatar">
          </div>
          <button class="btn btn-success upload-image" type="submit">{{$ava}}</button>
          <button class="btn btn-danger del-image" type="submit">Del Image</button>
            </form>
        </div>

        <div class="prof_info">
            <p><strong>First name: </strong>{{$fields->first_name}}</p>
            <p><strong>Last name: </strong>{{$fields->last_name}}</p>
            <p><strong>Age: </strong>{{$fields->age}}</p>
            <p><strong>City: </strong>{{$fields->city}}</p>
            <p><strong>Gender: </strong>{{$fields->gender}}</p>
            <p><strong>Sex-preferences: </strong>{{$fields->sexpreferences}}</p>
            <p><strong>My raiting: </strong>{{$fields->fame_rating}}</p>
            <button type="button" class="btn btn-primary btn-lg btn-block" data-toggle="modal" data-target="#myModal" onclick="change_main_info();">Update</button>
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

    <div class="cont_img">
    <div class="file-upload">
      <form action="{{ route('ajaxImageUpload') }}" enctype="multipart/form-data" method="POST">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <label> 
          <input type="file" name="image" class="form-control">
          <input type="hidden" name="title" value="photo1">
        </label>
        <img class="user_img" src="{{ $fields->photo1 }}" alt="photo1">
    </div>
    <button class="btn btn-success upload-image" type="submit">{{$photo1}}</button>
    <button class="btn btn-danger del-image" type="submit">Del Image</button>
      </form>
  </div>

  <div class="cont_img">
  <div class="file-upload">
    <form action="{{ route('ajaxImageUpload') }}" enctype="multipart/form-data" method="POST">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <label> 
        <input type="file" name="image" class="form-control">
        <input type="hidden" name="title" value="photo2">
      </label>
      <img class="user_img" src="{{ $fields->photo2 }}" alt="photo2">
  </div>
  <button class="btn btn-success upload-image" type="submit">{{$photo2}}</button>
  <button class="btn btn-danger del-image" type="submit">Del Image</button>
    </form>
</div>

<div class="cont_img">
<div class="file-upload">
  <form action="{{ route('ajaxImageUpload') }}" enctype="multipart/form-data" method="POST">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <label> 
      <input type="file" name="image" class="form-control">
      <input type="hidden" name="title" value="photo3">
    </label>
    <img class="user_img" src="{{ $fields->photo3 }}" alt="photo3">
</div>
<button class="btn btn-success upload-image" type="submit">{{$photo3}}</button>
<button class="btn btn-danger del-image" type="submit">Del Image</button>
  </form>
</div>

<div class="cont_img">
<div class="file-upload">
  <form action="{{ route('ajaxImageUpload') }}" enctype="multipart/form-data" method="POST">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <label> 
      <input type="file" name="image" class="form-control">
      <input type="hidden" name="title" value="photo4">
    </label>
    <img class="user_img" src="{{ $fields->photo4 }}" alt="photo4">
</div>
<button class="btn btn-success upload-image" type="submit">{{$photo4}}</button>
<button class="btn btn-danger del-image" type="submit">Del Image</button>
  </form>
</div>

    </div>
    

</div>
</div>








<div class="modal fade" id="myModal">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Main info</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <form action="{{ route('ajaxUpdateInfo') }}" enctype="multipart/form-data" method="POST">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="modal-body">
          
          <div class="form-group">
            <label for="first_name">First Name:</label>
            <input type="text" class="form-control" id="first_name" name="first_name" value="{{$fields->first_name}}">
          </div>

          <div class="form-group">
            <label for="last_name">Last Name:</label>
            <input type="text" class="form-control" id="last_name" name="last_name" value="{{$fields->last_name}}">
          </div>

          <div class="form-group">
            <label for="formControlRange">Age - <span id="age">{{$fields->age}}</spane></label>
            <input type="range" min="16" max="120" value="18" class="form-control-range" id="formControlRange" name="age">
          </div>
          <div>
          <label for="gender">Gender: </label>
          </div>
          
            <div class="form-check-inline">
              <label class="form-check-label" for="radio1">
                <input type="radio" class="form-check-input" id="radio1" name="gender" value="Bi-Sexual" checked>Bi-Sexual
              </label>
            </div>
            <div class="form-check-inline">
              <label class="form-check-label" for="radio2">
               <input type="radio" class="form-check-input" id="radio2" name="gender" value="Male">Male
              </label>
            </div>
            <div class="form-check-inline">
              <label class="form-check-label">
                <input type="radio" class="form-check-input" id="radio3" name="gender" value="Female">Female
              </label>
            </div>
          </label>
        
          <div class="form-group">
            <label id="pref_block" for="sel1">Who are you looking for? (Your sex preferences):</label>
            <select class="form-control" id="sel1" name="pref">
              <option>Men</option>
              <option>Women</option>
              <option>Gay</option>
              <option>Lesbian</option>
            </select>
          </div>


          <div class="form-group form-check">
            <label for="location">If you want, people can find you!</label>
            <button id="location" type="button" class="btn btn-success btn-lg btn-block" onclick="open_loc_info();">Check location</button>
            
            
            
            
            <div class="d-none" id="my_location">
              <div class="alert alert-primary" role="alert">
                    The information that you enter will be taken into account in the requests of other users!
              </div>

            <div class="form-group">
              <label for="my_country">Country:</label>
              <input type="text" class="form-control" id="my_country" name="country" value="{{$country}}">
            </div>

            <div class="form-group">
              <label for="my_city">City:</label>
              <input type="text" class="form-control" id="my_city" name="city" value="{{$city}}">
            </div>

            <div class="form-group">
              <label for="my_ltn">Latitude:</label>
              <input type="text" class="form-control" id="my_ltn" name="latitude"  value="{{$latitude}}">
            </div>

            <div class="form-group">
              <label for="my_lng">Longitude:</label>
              <input type="text" class="form-control" id="my_lng" name="longitude" value="{{$longitude}}">
            </div>

            </div>
            <div id="map"></div>
          </div>
         
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="submit" class="btn btn-success btn-lg btn-block" onclick="ajax_my_info();">Save</button>
        </div>
        </form>
      </div>
    </div>
  </div>
@endsection


<script type="text/javascript">

window.onload = function(){
  var x = document.querySelectorAll('.upload-image');
  var del_btn = document.querySelectorAll('.del-image');
  for (var i = 0, image; image = x[i]; i++)
    image.onclick = function(e){
    if (e.path[1].children[0].children[0].children[1].children[0].value == '')
    {
      e.preventDefault();
      alert("You need click on img and choose file!");
    }
      
  };

  for (var i = 0, image; image = del_btn[i]; i++)
    image.onclick = function(e){
      if (e.path[1].children[0].children[0].children[2].src == "http://localhost:8000/img/incognito.png")
      {
        e.preventDefault();
        alert("Img not set!")
      }
      else
        e.path[1].children[0].children[0].action = "{{ route('ajaxImageDelete') }}";     
  };
}



function change_main_info(){

  var map;
  var uluru = {
    lat: {{$latitude}},
    lng: {{$longitude}}
    };
  initMap(uluru);


  var slider = document.getElementById("formControlRange");
  var output = document.getElementById("age");
  
// Update the current slider value (each time you drag the slider handle)
  slider.oninput = function() {
    output.innerHTML = this.value;
  }
}

function initMap(uluru) {
  map = new google.maps.Map(document.getElementById('map'), {zoom: 10, center: uluru});
// The marker, positioned at Uluru
  var marker = new google.maps.Marker({position: uluru, map: map});
  }


function open_loc_info() {
  var loc_info = document.querySelector('#my_location');
  loc_info.classList.toggle("d-none");
}

function ajax_my_info() {
  setTimeout(function(){ location.reload(); }, 1000);
  ;
}

</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCbbdTf3JfUUQDE1ohX5o0AiV6dmfXEaQM&callback=initMap"
    async defer></script>

<!-- AIzaSyCbbdTf3JfUUQDE1ohX5o0AiV6dmfXEaQM          my googleApiKey-->