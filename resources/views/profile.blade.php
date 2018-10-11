@extends('layouts.app')
<link rel="stylesheet" type="text/css" href="{{ asset('css/profile.css') }}" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>






<style>
.autocomplete {
  /*the container must be positioned relative:*/
  position: relative;
  display: inline-block;
}
.autocomplete-items {
  position: absolute;
  border: 1px solid #d4d4d4;
  border-bottom: none;
  border-top: none;
  z-index: 99;
  /*position the autocomplete items to be the same width as the container:*/
  top: 100%;
  left: 0;
  right: 0;
}
.autocomplete-items div {
  padding: 10px;
  cursor: pointer;
  background-color: #fff; 
  border-bottom: 1px solid #d4d4d4; 
}
.autocomplete-items div:hover {
  /*when hovering an item:*/
  background-color: #e9e9e9; 
}
.autocomplete-active {
  /*when navigating through the items using the arrow keys:*/
  background-color: DodgerBlue !important; 
  color: #ffffff; 
}
/*.add_field{
  display: inline;
}*/
#int_form{
  text-align: left;
}
.headModal{
  width: 100%;
  text-align: center;
}
.int_body{
  text-align: left;
}
.int_del{
  text-align: right;
}
.my_int_body{
  height: 50px;
  margin-bottom: 15px;
}
</style>


@section('content')
<div class="container">
    <div class="cont_header">
        <h1>{{$fields->name}} Profile</h1>
    </div>
<?php
// Динамическое определение содержания текста кнопок
  $ava = ($fields->avatar == "/img/incognito.png") ? "Add Image" : "Change IMG";
  $photo1 = ($fields->photo1 == "/img/incognito.png") ? "Add Image" : "Change IMG";
  $photo2 = ($fields->photo2 == "/img/incognito.png") ? "Add Image" : "Change IMG";
  $photo3 = ($fields->photo3 == "/img/incognito.png") ? "Add Image" : "Change IMG";
  $photo4 = ($fields->photo4 == "/img/incognito.png") ? "Add Image" : "Change IMG";
  // Динамическое определение геолокации пользователя для автозаполнения
  // $externalContent = file_get_contents('https://api.2ip.ua/geo.json?ip=');
  // $externalContent = json_decode($externalContent);
  // $latitude = $externalContent->latitude;
  // $longitude = $externalContent->longitude;
  // $country = $externalContent->country;
  // $city = $externalContent->city;
  $latitude = "50.469227";
  $longitude = "30.462262";
  $country = "Ukraine";
  $city = "Kyiv";
?>

 <!-- Блок информационных сообщений (рекомендации заполнить поля анкеты) -->
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
        </div>
  <!-- ***************************************************************************   -->
    <div class="content_wrap">

<!-- форма обработки главного фото профиля -->
        <div class="cont_img">
          <div class="file-upload">
            <form action="{{ route('ajaxImageUpload') }}" enctype="multipart/form-data" method="POST">
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
            <button type="button" class="btn btn-primary btn-lg btn-block" data-toggle="modal" data-target="#myModal" onclick="change_main_info();">Update</button>
        </div> 
    </div>
    
    <!-- ********************************************************************************* -->

  <!-- Блок интересов по которому производится поиск идеального знакомства -->
    <div class="interests">
    <div class="row">
        <h5>My interests: </h5>
    </div>
    <div class="row">
       
        <p id="profile_interests"> 
          @if (count($interests))
            @foreach ($interests as $interest)

              <strong>#{{$interest->interst_name}} </strong>
            @endforeach
          @endif
        </p>
        
    </div>
    <button type="button" class="btn btn-primary btn-lg btn-block" data-toggle="modal" data-target="#interestsModal" onclick="interest_change();">Change interests</button>   
</div>

<!-- ********************************************************************************* -->

 <!-- Блок из 4 фото пользователя с основными операциями над блоком -->

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

<!-- ********************************************************************************* -->

<!-- Модальное окно изменения основных анкетных данных -->

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

  <!-- ********************************************************************************* -->


<!-- Модальное окно изменеий в интересах для поиска анкет -->

<div class="modal fade" id="interestsModal">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Управление увлечениями</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        
        <input type="hidden" id="cs" name="_token" value="{{ csrf_token() }}">
        <div class="modal-body">

          <form id="int_form" action="{{ route('addInterest') }}" enctype="multipart/form-data" method="POST" autocomplete="off">
             <input type="hidden" name="_token" value="{{ csrf_token() }}">
             <div class="form-group autocomplete">
              <label for="add_interest">Добавить увлечение:</label>
              <table>
                <tr>
                  <td>
                     <input type="text" class="form-control" id="add_interest" name="add_interest" value="" data-provide="typeahead" autocomplete="off">
                  </td>
                  <td>
                     <button type="submit" class="btn btn-success">Добавить</button>
                  </td>
                </tr>
              </table>
            </div>
          </form>
          <div class="headModal">
            <h4>Мои интересы</h4>
          </div>
          <div class="container">
             @foreach($interests as $interest)
              <div class="row alert alert-primary">
                <span class="col-sm btn btn-primary my_int_body">
                    {{$interest['interst_name']}}
                </span>
              <div class="col-sm int_del">
                <form id="int_form" action="{{ route('delInterest') }}" enctype="multipart/form-data" method="POST">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <input type="hidden" name="id" value="{{ $interest['user_interest_id'] }}">
                  <input type="submit" name="submit" class="btn btn-danger btn-lg btn-block" value="Удалить">
                </form>
              </div>
             </div>
            @endforeach
          
          </div>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger btn-lg btn-block" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>






<!-- ********************************************************************************* -->


@endsection


<script type="text/javascript">
function autocomplete(inp, arr) {
  /*the autocomplete function takes two arguments,
  the text field element and an array of possible autocompleted values:*/
  var currentFocus;
  /*execute a function when someone writes in the text field:*/
  inp.addEventListener("input", function(e) {
      var a, b, i, val = this.value;
      /*close any already open lists of autocompleted values*/
      closeAllLists();
      if (!val) { return false;}
      currentFocus = -1;
      /*create a DIV element that will contain the items (values):*/
      a = document.createElement("DIV");
      a.setAttribute("id", this.id + "autocomplete-list");
      a.setAttribute("class", "autocomplete-items");
      /*append the DIV element as a child of the autocomplete container:*/
      this.parentNode.appendChild(a);
      /*for each item in the array...*/
      for (i = 0; i < arr.length; i++) {
        /*check if the item starts with the same letters as the text field value:*/
        if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
          /*create a DIV element for each matching element:*/
          b = document.createElement("DIV");
          /*make the matching letters bold:*/
          b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
          b.innerHTML += arr[i].substr(val.length);
          /*insert a input field that will hold the current array item's value:*/
          b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
          /*execute a function when someone clicks on the item value (DIV element):*/
          b.addEventListener("click", function(e) {
              /*insert the value for the autocomplete text field:*/
              inp.value = this.getElementsByTagName("input")[0].value;
              /*close the list of autocompleted values,
              (or any other open lists of autocompleted values:*/
              closeAllLists();
          });
          a.appendChild(b);
        }
      }
  });
  /*execute a function presses a key on the keyboard:*/
  inp.addEventListener("keydown", function(e) {
      var x = document.getElementById(this.id + "autocomplete-list");
      if (x) x = x.getElementsByTagName("div");
      if (e.keyCode == 40) {
        /*If the arrow DOWN key is pressed,
        increase the currentFocus variable:*/
        currentFocus++;
        /*and and make the current item more visible:*/
        addActive(x);
      } else if (e.keyCode == 38) { //up
        /*If the arrow UP key is pressed,
        decrease the currentFocus variable:*/
        currentFocus--;
        /*and and make the current item more visible:*/
        addActive(x);
      } else if (e.keyCode == 13) {
        /*If the ENTER key is pressed, prevent the form from being submitted,*/
        e.preventDefault();
        if (currentFocus > -1) {
          /*and simulate a click on the "active" item:*/
          if (x) x[currentFocus].click();
        }
      }
  });
  function addActive(x) {
    /*a function to classify an item as "active":*/
    if (!x) return false;
    /*start by removing the "active" class on all items:*/
    removeActive(x);
    if (currentFocus >= x.length) currentFocus = 0;
    if (currentFocus < 0) currentFocus = (x.length - 1);
    /*add class "autocomplete-active":*/
    x[currentFocus].classList.add("autocomplete-active");
  }
  function removeActive(x) {
    /*a function to remove the "active" class from all autocomplete items:*/
    for (var i = 0; i < x.length; i++) {
      x[i].classList.remove("autocomplete-active");
    }
  }
  function closeAllLists(elmnt) {
    /*close all autocomplete lists in the document,
    except the one passed as an argument:*/
    var x = document.getElementsByClassName("autocomplete-items");
    for (var i = 0; i < x.length; i++) {
      if (elmnt != x[i] && elmnt != inp) {
        x[i].parentNode.removeChild(x[i]);
      }
    }
  }
  /*execute a function when someone clicks in the document:*/
  document.addEventListener("click", function (e) {
      closeAllLists(e.target);
  });
}
function interest_change(){
   var request = new XMLHttpRequest();
  request.open('POST', '/my_profile/get_interests', true);
  request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  var data = document.querySelector('#cs').value;
  request.send('_token=' + data);
  request.onreadystatechange = function (e) {
   if(request.readyState == 4 && request.status == 200) {
     var res = request.responseText;
     var res = JSON.parse(res);
     autocomplete(document.getElementById("add_interest"), res);
   }
  }  
};
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