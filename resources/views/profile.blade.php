@extends('layouts.app')
<link rel="stylesheet" type="text/css" href="{{ asset('css/profile.css') }}" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
@section('content')
<div class="container">
    <div class="cont_header">
        <h1>{{$fields->name}} Profile</h1>
    </div>

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
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <label> 
                <input type="file" name="image" class="form-control">
                <input type="hidden" name="title" value="avatar">
              </label>
              <img class="user_img" src="{{ $fields->avatar }}" alt="avatar">
          </div>
          <button class="btn btn-success upload-image" type="submit">Upload Image</button>
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
    <button class="btn btn-success upload-image" type="submit">Upload Image</button>
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
  <button class="btn btn-success upload-image" type="submit">Upload Image</button>
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
<button class="btn btn-success upload-image" type="submit">Upload Image</button>
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
<button class="btn btn-success upload-image" type="submit">Upload Image</button>
  </form>
</div>

    </div>
    

</div>

<!-- <button type="button" class="btn btn-success btn-lg btn-block">Сохранить изменения</button> -->
</div>

@endsection


<script type="text/javascript">
  $("body").on("click",".upload-image",function(e){
    $(this).parents("form").ajaxForm(options);
  });


  var options = { 
    complete: function(response) 
    {
    	if($.isEmptyObject(response.responseJSON.error)){
            location.reload();
    	}else{
    		printErrorMsg(response.responseJSON.error);
    	}
    }
  };


  function printErrorMsg (msg) {
	$(".print-error-msg").find("ul").html('');
	$(".print-error-msg").css('display','block');
	$.each( msg, function( key, value ) {
		$(".print-error-msg").find("ul").append('<li>'+value+'</li>');
	});
  }
</script>