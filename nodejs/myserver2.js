var http = require('http');
var fs = require('fs');
http.createServer(function (req, res) {
	res.writeHead(200, 
		{'Content-type':'text/html;charset=utf-8'});
	res.write('Привет от меня!');
	fs.readFile('index.html', function (err, content) {
		res.write(decodeURIComponent(content));
		res.end();
	});
	
}).listen(8080);

/*
 *	ЗАДАНИЕ 3

		1. Откройте документацию Node.js (http://nodejs.org/api/http.html#http_response_writehead_statuscode_reasonphrase_headers) и посмотрите, как послать дополнительные заголовки ответа сервера
		2. Измените код сервера, чтобы он отдавал заголовок, необходимый для "понимания" браузером, что он получает html-код
		3. Перезапустите сервер
		4. Выполните запрос к серверу через браузер и убедитесь в корректности ответа
*/