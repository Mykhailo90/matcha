@extends('layouts.app')

@section('content')

<ul class="chat">
    @foreach($messages as $message)
        <li>
            <b>{{ $message->author }}</b>
            <p>{{ $message->content }}</p>
        </li>
    @endforeach
</ul>

<hr>

<form action="/start/message" method="POST">
    {{ csrf_field() }}
    <input type="text" name="author">
    <br>
    <br>
    <textarea name="content" style="width: 100%; height: 100px"></textarea>
    <input type="submit" value="Отправить">
</form>



<script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.1.1/socket.io.dev.js"></script>

<script>
    // Создаем переменную для подключения сокета
    // Вызываем конструктор и передаем в нее номер порта
    var socket = io(':6001');

    socket.on('chat:message', function(data){
        // console.log(data);
        appendMessage(data);
    });

    function appendMessage(data){
        $('.chat').append(
            $('<li/>').append($('<b/>').text(data.author),
                            $('<p/>').text(data.content)
                    )
            );
    };


    // $('form').on('submit', function(){
    //     var text = $('textarea').val(),
    //         msg = {message : text};

    //     socket.send(msg);
    //     appendMessage(msg);
    //     $('textarea').val("");

    //     return false;
    // });


    // // Устанавливаем слушателя на событие message

    // socket.on('message', function(data){
    //     appendMessage(data);
        
    // }).on('server-info', function(data){
    //     console.log("From server:", data);
    // });
    // ЧТОБЫ ТЕСТИРОВАТЬ НЕ ЗАБЫТЬ ЗАПУСТИТЬ СЕРВЕР JS!!!
    // node ws.server/server.js
    // директория ws.server лежит в корне проекта!
</script>

@endsection

