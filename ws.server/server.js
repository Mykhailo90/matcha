// // Подключаем библиотеку сокетов
var request = require('request');
var	io = require('socket.io')(6001, {
	origins : 'localhost:*'
});

// Здесь будет реализовано ограничение на прослушивание сокета
io.use(function(socket, next){

	request.get({
		url : '/check-auth',
		headers : {cookie : socket.request.headers.cookie,
					'Content-Type' : "aplication / json", 
					},

		json : true
	}, function(error, response, json){
		console.log(json);
	})

	next(new Error('Auth error'));

});
// // Вешаем слушателя - при событии подключение - вызываем замыкание и передаем в функции 
// // экземпляр сокета, к которому было подключение
// io.on('connection', function(socket){
// 	console.log("New connection:", socket.id);

// 	// Метод отправит сообщение на сторону клиента в скрипт файла представления
// 	// socket.send("Message from server new!");

// 	// Fire event отправка кастомизированного сообщения
// 	// socket.emit('server-info', {version : .1,
// 	// 							'text': "some_text"});

// 	// уведомляю всех подключенных пользователей о событии
// 	// socket.broadcast.send('new user');

// 	// Присоединение пользователя к комнате вип
// 	// socket.join('vip', function(error){
// 	// 	console.log(socket.rooms);
// 	// });

// 	socket.on('message', function(data){
// 		console.log("New mgs:", data);
// 		// socket.broadcast.send(data);
// 	});



// });


// Подключаем библиотеку и создаем клиента библиотеки
var Redis = require('ioredis'),
	redis = new Redis();

// Подписываемся на события от издателя:
// Звездочка значит все события от издателя
// count - количество подписок оформленного клиента
redis.psubscribe('*', function(error, count){
	// console.log('ddd');
});

redis.on('pmessage', function(pattern, channel, message){
	message = JSON.parse(message);
	io.emit(channel + ':' + message.event, message.data.message);
	console.log(channel, message);
});

