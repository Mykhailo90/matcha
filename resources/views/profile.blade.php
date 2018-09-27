@extends('layouts.app')
<link rel="stylesheet" type="text/css" href="{{ asset('css/profile.css') }}" />
@section('content')
<div class="container">
    <div class="cont_header">
        <h1>{{$fields->name}} Profile</h1>
    </div>
    
    <div class="content_wrap">
        <div class="cont_img">
           
                <img class="user_img" src="{{ $fields->avatar }}" alt="avatar" data-toggle="modal" data-target="#exampleModal">
           
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

            <button type="button" class="btn btn-success btn-lg btn-block">Сохранить изменения</button>
        </div>

        <form action="{{ route('imageUpdate') }}" method="post" entype="multipart/form-data">
            {{ csrf_field() }}
            <input class="btn btn-primary" type="file" name="image" value"">
            <button type="submit" class="btn btn-primary">Загрузить фото</button>
        </form>



        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Загрузите ваше фото : </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
     
      <div class="modal-body">
        
        
        

      </div>
      <div class="modal-footer">
       
      </div>
      </form>
    </div>
  </div>
</div>



    </div>   
</div>

@endsection
