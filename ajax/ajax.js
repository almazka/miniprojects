AJAX - Асинхронный Ява-Скрипт и XML

Это просто подход для обмена данными, не язык со спецификацией и т.д.
Для обмена данными с сервером без перезагрузки страницы

Объект XmlHttpRequest
Создается через универсальную функцию (см. ниже)
var request = getXmlHttpRequest();

Свойства объекта:
.onreadystatechange обработчик
.readyState некое число, которое говорит о том, в каком состоянии запрос - посылается, разбирается и т.д.
.responseText содержимое страницы, полученное с сервера
.responseXML готовая дом-модель, полученная с сервера
.status HTTP статус ответа сервера - 200, 404 и т.д.
.statusText описание статуса - not found, например

Методы объекта:
.abort()
.getAllResponseHeaders() вся заголовочная инфа
.getResponseHeader() заголовки ответа, передать можно имя конкретного заголовка, чтобы он по нему вернул инфу
.open('GET', URL, false) подготовка запроса перед посылкой, туда передается метод, адрес и тру фолс по синхронности (тру - асинхр). Запрос может быть отправлен только на свой сервер, с которого запускается
.send() посыл запроса. тут зависает в ожидании ответа.
.setRequestHeader()

req.getResponseHeader('Content-Length'); вернет размер файла
req.getResponseHeader('Last-Modified'); вернет дату посл изменения файла

Создание объекта Ajax
Пишется универсальная функция, потому что в разных версиях по разному коду для разных браузеров
function getXmlHttpRequest() {
	if (window.XMLHttpRequest) {
		try {
			return new XMLHttpRequest();
		} catch(e){}
	} else if (window.ActiveXObject) {
		try {
			return new ActiveXObject('Msxml2.XMLHTTP');
		} catch(e){}
		try {
			return new ActiveXObject('Microsoft.XMLHTTP');
		} catch(e){}
	}
return null;
}
функция подключается отдельным файлом
<script type="text/javascript" src="xmlhttprequest.js"></script>

Синхренный запрос:
Шаг 1. Через функцию создается объект AJAX
var request = getXmlHttpRequest();

Шаг 2. Подготовка запроса. Задаем параметры метода .open()
var url = location.href; // переменная вернет адрес текущей страницы
request.open('GET', url, false); 
Передается метод "GET" или "POST", false указывает на синхронный запрос, true - на асинхронный, плюс URL-адрес указывается
Внимание! В целях безопасности невозможно на чужой сервер отправлять такие запросы, только на адрес того же сервера, с которого отправляется

Шаг 3. Отправка запроса через метод .send()
request.send(null);
var result = request.responseText;
document.getElementById('divResult').firstChild.nodeValue = result; // выведение после окончания запроса содержимого страницы ответа в див


Асинхронный запрос:
Шаг 1. Через функцию создается объект AJAX
var request = getXmlHttpRequest();

Шаг 2. Добавляем обработчик - свойство .onreadystatechange, в котором будет проверка, что что-то пришло, и указано, что делать после прихода ответа
request.onreadystatechange = function() {
	if (request.readyState == 4) {
		if (request.status != 200) {
			alert(request.status+": "request.statusText);
		} else {
		var result = request.responseText;
		document.getElementById('divResult').firstChild.nodeValue = result;
		}
	}
};
Через свойство .readyState приходит статус от 1 до 4 в виде строки, 
0 - ничего, 
1 - установка соединения, 
2 - запрос отправлен, 
3 - ожидание ответа, 
4 - получено и готово
Плюс внутрь ставим проверку через свойство .status, пришел ли ответ со статусом 200, т.е. найден ли файл, к которому обращаемся. И если да, то делаем определенные действия, в случае неудачи - берем из свойства .statusText описание статуса и выдаем его в сообщении
Есть более короткий способ проверки на 4
if (request.readyState != 4) return;
То бишь - если не 4, то выходим и ничего не делаем дальше
и пишем далее без скобок

тем временем асинхронно запрос продолжается

Шаг 3. Подготовка запроса. Задаем параметры метода .open()
var url = location.href; // переменная вернет адрес текущей страницы
request.open('GET', url, true);

Шаг 4. Отправка запроса через метод .send()
request.send(null);


Для быстрой копии:
var request = getXmlHttpRequest();
request.onreadystatechange = function() {
	if (request.readyState != 4) return;
	document.getElementById('divResult').firstChild.nodeValue = request.responseText;
};
request.open('GET', "url.php", true);
request.send(null);



Информация о запрошенном файле
Берется из пришедших заголовков

request.getAllResponseHeaders(); вернет все заголовки
Среди них можно запрашивать конкретные:
request.getResponseHeader("Content-Length") - вернет размер файла в байтах
request.getResponseHeader("Last-Modified") - вернет дату последнего изменения файла
request.getResponseHeader("My-header"); - вернет значение заголовка  My-header, который мы сами придумали и задали в запрашиваемом документе через php - header()
<?php
	header("My-Time: ".date("H:i:s"));
?>
В значение заголовков можно вставлять переменные и функции

Запрос GET к серверу выглядит так:

Мы посредством браузера посылаем туда заголовки с инфой:

GET /HTTP/1.1
Host: ya.ru
User-Agent: Mozilla/5.0
Accept: text/html,application/xhtml+xml,application/xml
Accept-Language: ru-RU,ru
Accept-Encoding: gzip,deflate
Connection: keep-alive
If-Modified-Since: Sun, 15 Jun 2008 14:40:07 GMT (см. ниже)

Заголовки, по сути, все необязательные, кроме Host, без него отклоняет. И еще важна пустая строка в конце, ее надо отправлять как знак того, что все передано и заголовков больше не будет передаваться

Методом ГЕТ можно передавать прописанные вручную заголовки
Только надо знать, как они пишутся. Пишутся построчно, между строками \r\n

Просматривать заголовки можно удобно в FireFox, установить расширение Live HTTP Headers и в - Инструменты - Просмотр HTTP заголовков

Ответ от cервера:
отвечает он тоже заголовками

HTTP/1.1 200 OK - должно быть 200, это код успешности. 
301, 302 - требуется перезапрос, если файл находится на другом адресе, вместе с заголовком идет location с адресом
304 - объект не был изменен, это если закэширована была стр, это инфа о том, что можно и дальше из кэша читать. Такое приходит в ответ на специальный заголовок в запросе - If-Modified-Since, где указана дата. Если приходит 304, то приходят только заголовки, без тела, т.к. оно идет из кэша
400 Bad Request - если заголовок входящий был без Host, например
401 - требуется авторизация, 
403 Forbidden - запрещено, например, если пытаться обратиться к защищенному файлу htaccess 
404 Not Found - объект не найден, 
405 Method Not Allowed - метод не поддерживается, например, если методом пост что-то отправляется в html 
500 - ошибка сервера
Date: Sun, 15 Jun 2008 14:54:47 GMT
Server: Apache/1.3.39 (Win32) PHP/5.2.6
Last-Modified: Sun, 15 Jun 2008 14:40:07 GMT
Content-Length: 1801
Content-Type: text/html
X-Frame-Options: DENY - запрет на вставку в iframe содержимого страницы

В конце сервер тоже посылает пустую строку в знак того, что заголовки кончились, и далее идет постройка кода страницы

Далее 

И соответственно заголовкам теперь наш браузер будет воспринимать пришедший материал, какого типа он и т.д


Кроме гет и пост есть еще 6 методов
Есть еще метод HEAD, например
HEAD если надо получать заголовки без тела

запрос методом GET будет иметь такой вид при отправке заполненной такой формы
<form action="server.php" method="get">
	<input type="text" name="t1" />
	<input type="text" name="t1" />
	<input type="text" name="t1" />
</form>
Внимание! Атрибут method по умолчанию как раз GET

В зголовке пойдет построенное по такой схеме:
GET /server.php?t1=vasya&t2=pupkin&t3=user HTTP/1.1

И даже если у нас пустой action, можно сымитировать такую отправку тем, что при описании свойства .open() мы пишем адрес в ручную сформированный так, подставляя нужные данные
var txt = document.getElementById("TextLol");
request.open("GET", "server.php?t1="+txt.value+"&t2="+txt1.value+"&t3="+txt2.value, true);

Внимание! Кэширование надо отключать при аяксе!
Это прописывается в файле htaccess:
#
# Запрещение кеширования в этой папке
# Необходимо включение модулей
# mod_headers.c и mod_expires.c
#
# Заголовок Cache-Control
<IfModule mod_headers.c>
	Header set Cache-Control "no-store, no-cache"
</IfModule>

 
В GET отправляется все, что передается в адресной строке после вопросительного знака

При передаче методом POST передаются дополнительные заголовки
Пост заполняется только если передается форма. Определяет он это по заголовку Content-Type: application/x-www-form-urlencoded; charset=UTF-8
Либо через эмуляцию формы, в которой  enctype="multipart/form-data"

Запрос методом POST выглядит так:
POST/server.php HTTP/1.1
Host: localhost
User-Agent: Mozilla/5.0
Accept:
Content-Type: application/x-www-form-urlencoded; charset=UTF-8
Referer: localhost/ajax/form.php
Content-Length: 30 длина строки-тела запроса
Pragma: no-cache
Cache-Control: no-cache

пустая строка так и приходит

И в теле:
cat=2&user=Vasya+pupkin&age=30 
В отличие от Гета, в гете в заголовках это приходит

Ответ сервера:
HTTP/1.x 200 OK
Date: Sun, 12 Jun 2012 14:09:45 +0500
Content-Type: text/plain; charset=utf-8

Когда отправляем методом POST, то запрос AJAX пишется так:
var request = getXmlHttpRequest();
request.onreadystatechange = function() {
	if (request.readyState != 4) return;
	document.getElementById('divResult').firstChild.nodeValue = request.responseText;
};
var postData = 'cat='+catId; лепится тело запроса, типа как у гета в адресной строке
request.open('POST', 'postbooksbycat.php', true);
request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded"); эмуляция формы, чтобы php данные эти запихал в свой глобальный массив _POST
request.setRequestHeader("Content-Length", postData.length); эмуляция длины формы, обычно ее не требуется писать, т.к. он сам считает
request.send(postData);	посылается не null, а слепленная строка

Кратко для копии:
var request = getXmlHttpRequest();
request.onreadystatechange = function() {
	if (request.readyState != 4) return;
	document.getElementById('divResult').firstChild.nodeValue = request.responseText;
};
var postData = 'cat='+catId;
request.open('POST', 'postbooksbycat.php', true);
request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
request.send(postData);

Фишка - принятие данных в создающийся объект. Полезная фишка - распределять в объект данные, которые приходят в ответ на запрос.
1. Создаем конструктор объекта с ожидаемыми свойствами и пустой массив, через который будем заполнять объект
function Book (author, title, image) {
	this.author = author;
	this.title = title;
	this.image = image;
}
var books = new Array();
Здесь ожидается строка типа "Автор | Название | адрес картинки\nАвтор2 | Название2 | адрес картинки2\n..."
2. var req = getXmlHttpRequest();
	req.onreadystatechange = function() {
		if (req.readyState != 4) return;
		var txt = req.responseText;
		var bookStrings = txt.split("\n");
		books = new Array();
		for (var i=0; i<bookStrings.length; i++) {
			if (bookStrings[i] == "") continue;
			var parts = bookStrings[i].split('|');
			books[books.length] = new Book(parts[0], parts[1], parts[2]);
		}
	}

3. Получается массив объектов. Можно его перебирать и вставлять
for (var i=0; i<books.length; i++) {
	... books[i].author
}

Предыдущие примеры используются при небольших запросах, когда нам приходит в ответ строка "колбаса", которую мы получаем простым responseText-ом,  нарезаем и распределяем по ячейкам таблицы или лишкам
Но! Если приходит не строка-колбаса, а что-то более сложное импа объекта, такие методы не пойдут.

Нотация JSON
JS Object NOTATION
Это не язык, а лишь способ сериализации
Для передачи структурированных данных
Это делается с помощью объектов и массивов
Пример JSON строки
{
	"firstName": "Vasya",
	"lastName": "Petrov",
	"address":
	{
		"street": "Gffh, 78",
		"city": "Omsk",
		"postCode": "555555"
	},
	"firstName":
	[
		"54646464",
		"76767587"
	]
}

Типы данных JSON нотации
Объект
{"имя":"значение", "имя":"значение"}

Массив
Одномерный.
Индексы начинаются с 0, значения через зпт
["значение1", "значение2"]

Значение
Либо строка в двойных "", либо число, тру или фолс, null, а также объект или массив, можно использовать всякие \n

Строка
Всегда юникодовая, заключается в двойные ""
"\u003"

Стандарт JSON прописан на json.org, там есть понятное описание как составляются разные типы

Сложные строки JSON можно не вручную читать, а их разбирают онлайн конвертеры. Например, braincast.nl/samples/jsoneditor/
Он показывает в виде дерева сложные строки и все понятно
Есть плагины у Notepad++ для чтения строк JSON - JSON Viewer
В хроме есть расширение JSON Viewer тоже, 
Он сразу показывает структуру JSON-строки


Итак, нам пришла по запросу JSON-строка. Как ее разбирать? Ранее мы это делали просто через split(), то были просто строки типа колбасы

Сериализация и десериализация
При сериализации сохраняются свойства, а методы - нет

var jsonStr = '{"title": "You books", "author": "France Sder", "price": 250}';

var book = eval(request.responseText); простая сериализация, он развернет jsonStr и положит в переменную book готовый объект {"title": "You books", "author": "France Sder", "price": 250}

alert('book.title'); можно из него будет вытянуть свойство
НО! Использование eval небезопасно. Со стороны туда можно сунуть alert или другой код, который исполнится

Сериализовать сложно, а десериализовать легко
Нет аналога serialize пхп-шного в js

Есть решение - библиотеки JSON, подключаемые к любым языкам. Поэтому необходимо просто стороннее подключение файла json2.js с сайта json.org
С подключением бибки добавляется объект JSON, у него 2 метода для сериализации:

JSON.stringify() для создания, упаковки - сериализации
JSON.parse() расчехляет пришедшую JSON-галимотью, все равно внутри прописан eval, но уже безопасно, т.к. с проверками внутри библиотеки
Мы обращаемся к объекту JSON. В современных браузерах он встроенный, но на всякий случай мы подключаем

С объектом JSON мы можем работать даже из консоли (кроме IE, для него и надо подключать файл, остальные браузеры из себя берут объект JSON когда надо)

Парсинг (распаковка) JSON-строки:
var myObj = JSON.parse(request.responseText);
JSON.parse([12,56,"lol"]);

Запаковка JSON-строки:
var myJSONtxt = JSON.stringify([1,2,3]); внрнет JSON-строку "[1,2,3]"

Внимание! Если нам надо собрать из заполненных форм и передать данные в  виде JSON-строки, используется фишка с созданием объекта.

1. Создаем конструктор объекта с предполагаемыми свойствами:
function Record(author, email, message)
{
	this.author = author;
	this.email = email;
	this.message = message;
}

2. Забираем данные из заполненных полей формы и помещаем их в экземпляр созданного объекта
	var txtName = document.getElementById("txtName");
	var txtEmail = document.getElementById("txtEmail");
	var txtMessage = document.getElementById("txtMessage");

	var record = new Record(txtName.value, txtEmail.value, txtMessage.value);
3. Запаковываем объект в JSON-строку
	var jsonData = JSON.stringify(record);
	
4. Передаем эту строку
	var req = getXmlHttpRequest();
	req.onreadystatechange = function()
		{
			if (req.readyState != 4) return;
			users = JSON.parse(req.responseText); // распаковываем то, что пришло в ответ...
		};
	req.open("POST", "addrecord.php", true);
	req.setRequestHeader("Content-Type", "text/plain");
	req.send(jsonData);

ВНИМАНИЕ! Обязательно при передаче JSON-строки от нас нужно прописывать req.setRequestHeader("Content-Type", "text/plain"); или text/json, чтобы php при его получении не пытался его пихать в свои глобальные массивы POST
Как же он его примет? Это зависит от языка
На php - он тогда принимает их как "Сырые данные". То бишь в файле php ставим первым делом такую переменную для приема сырых данных и он просто примет что пришло по байтам:
$rawPost = file_get_contents('php://input');
Потом в php для распаковки используется json_decode, а для запаковки - json_encode

Если надо пасти и постоянно обновлять незаметно подгружать, то прямо внутри onreadystatechange-а, в конце - вставляем window.setTimeout на запуск функции, в которой находится сам onreadystatechange
window.setTimeout("showOnLineUsers()", 3000);


JSON широко используется при небольших запросах. У него есть недостаток - точки входа, скриптов по сути несколько, для авторизации и для возвращения пользователей онлайн, например
Каждый метод сервера - это фактически отдельная точка входа в JSON, поэтому если их много - это грузит и сложно управлять!

XML
Более структурированно передаются данные, чем при простой строке или строке JSON
И самое главное, почему используется Xml - он дает универсальные возможности
Алгоритм тот же с ним, только вместо responseText - responseXML
var req = getXmlHttpRequest();
req.onreadystatechange = function() {
if (req.readyState != 4) return;
	var xml = req.responseXML; сюда приходит готовый дом-объект, можно писать xml.свойство и т.д.
}

DOM-структура у xml и у html немного разная. js имеет дело с html-ной структурой, она сложнее, чем структура DOM XML. Но по сути - структура html - это структура xml, просто расширенная.

Соответственно, в html структуре есть свойства и методы элементов, которых нет в XML-структуре

DOM структура
Все есть узлы. Основной объект документа - Document

Элементы в составе XML - это все объекты, находящиеся в иерархии
В иерархии элементы - узлы, ноды - node, связаны др с др
Основной объект - объект Document - и другие узлы - комментарии, текст, атрибуты, элементы...

Основной абстрактный узел - DOMNode основной, а другие от него наследуют свойства (и добавляют что-то свое):
Есть DOMElement - для элементов, то бишь тегов,
DOMAttribute - для атрибутов, 
DOMText - для текстовых узлов, 
DOMDocument 
и другие

свойства DOMNode:

.nodeName абстрактное имя ноды
.nodeType важная вещь - тип узла, возвращает номер (см выше коды типов)
.nodeValue только для текстового узла. Если это текстовый узел - возвращает содержимое его.
.childNodes все дети, коллекция детей
.firstChild первый дочерний
.lastChild последний дочерний
.nextSibling следующий среди братьев-сестер
.previousSibling предыдущий среди братьев-сестер
.ownerDocument редко используется. Ссылка на сам документ
.attributes редко

Методы DOMNode:

hasChildNodes(); узнать, есть дети или нет - фолс тру
while(tableBooks.hasChildNodes())
	tableBooks.removeChild(tableBooks.lastChild); очистка таблицы от всех ее детей, если она не пуста
cloneNode(b); клонирование, передаем тру, чтобы он взял содержимое вместе с тегом, фолс, чтоб пустые теги
appendChild(e); для вставки, вставить дочерним элементом, если надо вырезать, то без клона можно что-то вставить, переместит его
insertBefore(e,p);  для вставки перед чем-то, передаем вторым параметром то, перед чем, первым - что вставить
replaceChild(e,p); изменить ребенка
removeChild(e); удаление ребенка

DOMElement
Наследует все свойства (см выше) и методы DOMNode, но есть и свои собственные:

Свойства DOMElement + к свойствам DOMNode:
.tagName имя элемента возвращает

Методы + к методам DOMNode:
getElementsByTagName('t'); имя тега передается, возвращает все с теги с таким именем
hasAttribute(a); имеет ли элемент такой атрибут - тру фолс
getAttribute(a); возвращает значение атрибута
getAttributeNode(); возвращает значение атрибута Ноды
setAttribute(a,v); задать атрибут
removeAttribute(a); удаление атрибута

DOMDocument
Свойства плюс к наследуемым от DOMNode:
.documentElement - возвращает корневой элемент

Методы Document плюс к наследуемым методам DOMNode:
getElementsByTagName(t); выборка всех по имени тега
Внимание! getElementById отсутствует у XML, т.к. там нет айди!!!
Еще в XML нет innerHTML

Под каждый тип узла у DOMDocument свой create
createComment(s); создание на коммента
createElement(t); создание элемента
createTextNode(s); создает текстовый узел var p = document.createElement('p'); вернул новый узел в воздухе var txt = document.createTextNode('text'); создал еще один узел текст, p.appendChild(txt); вложим одно в другое на лету, все еще в воздухе document.body.appendChild(p); теперь не в воздухе
createDocumentFragment();
createAttribute(); создание атрибута
createCDATASection();
createEntityReference();
createProcessingInstruction();

Внимание!!!! Все эти методы пишутся точно так же, как обычно, только вместо document мы пишем XmlDOM
Как то:
XmlDOM.getElementsByTagName('book');
В обычных местных обращениях пишется по-обычному, XmlDOM только вместо document в крупном контексте
var books = XmlDOM.getElementsByTagName('book');
for (var i=0; i<books.length; i++) {
	var book = books[i];
	for (var j=0; j<book.childNodes.length; j++) {
		var node = book.childNodes[j];
		if (node.nodeType != 1) continue;
		if (node.nodeName == "title") 
			result += node.firstChild.nodeValue + "\n";
	}
}





Для преобразования xml DOM документа в строку нужна универсальная функция, как и при создании объекта аякса, т.к. браузеры разные
function getXMLString(dom) {
	if (window.XMLSerializer) {
		// это Mozilla и др
		var serializer = new XMLSerializer();
		return serializer.serializeToString(dom);
	} else if (window.ActiveXObject) {
		// это IE
		return dom.xml;
	} else {
		return "Сериализация в строку не поддерживается!";
	}
}

Еще используется функция подгрузки требуемого XML файла в синхронном режиме
Используется вместе с функцией getXmlHttpRequest()
function loadXML(url) {
	var reqMessage = getXmlHttpRequest();
	reqMessage.open("GET, url, false");
	reqMessage.send(null);
	return reqMessage.responseXML;
}
Эта функция ДОМ возвращает, а getXMLString перегоняет ДОМ в строку




Протокол XML-RPC
Remote Procedure Call - вызов удаленных процедур

Вызов удаленных процедур - это когда есть нам надо заслать запрос на удаленный файл и вызвать какой-то метод, описанный там, чтобы он что-то вернул

НО! RPC - старый и универсальный, запросы должны быть все на xml-е, такие:
<?xml version="1.0"?>
<methodСall>
	<methodName>examples.getStateName</methodName>
    <params>
        <param>
            <value>
                <i4>600</i4>
            </value>
        </param>
    </params>
</methodCall>

Внимание! Запрос посылается с корневым тегом <methodСall>, а ответ от сервера - с тегом <methodResponse>

Немного о его синтаксисе:
Типы данных в RPC обозначаются тегами
<boolean>1</boolean>
<i4>88</i4> integer так обозначается
<double>-5.45</double>
<string>Lol lol lol</string>
<dateTime.iso8601>12334456 14:14:32</dateTime.iso8601> Формат Date/time с указанием формата через тчк
<base64>ew54646fgdu878</base64>

Тип массив посылается трехэтажно:
<array>
	<data>
		<value><i4>099</i4></value>
		<value><string>Тексто</string></value>
		<value><i4>888</i4></value>
	</data>
</array>

Тип объект там называется структурами, тоже трехэтажно обозначается:
<struct>
	<member>
		<name>Имя</name> без указания типа, т.к. оно всегда строка
		<value><i4>888</i4></value>
	</member>
	<member>
		<name>Имя333</name>
		<value><i4>5</i4></value>
	</member>
</struct>

НО! Все это писать вручную - замучаешься же! Поэтому есть разные велосипеды, чтобы код xml сам составлялся, а мы в итоге бы обращались к удаленному методу просто.

Для использования нужен RPC-сервер. В вордпрессе он встроен, в php есть просто встроенный модуль.
Можно воспользоваться готовым кодом, велосипедом, много их в инете, он подключается и будет встроенный RPC-сервер.
Это нужно для того, чтобы он сам там компановал строчки эти.

Например, подключаем файл xmlrpc.js
<script type="text/javascript" src="xmlrpc.js"></script>
Мы хотим обратиться к методу system.myMethod, передать ему параметры и получить ответ, а метод находится в удаленном файле to-server.php

Алгоритм:
0. Подключаем файл велосипед 
<script type="text/javascript" src="xmlrpc.js"></script>

1. создаем объект XMLRPCMessage
var msg = new XMLRPCMessage("system.myMethod", "utf-8");

2. Забиваем туда параметры, какие нужно через addParameter
msg.addParameter("Строка текста");
msg.addParameter(8);
msg.addParameter(false);
msg.addParameter(a);
msg.addParameter(obj);
msg.addParameter(date);

3. Формируем из этого xml-код
var rawData = msg.xml();

4. Передаем эту строку и получаем строку
	var req = getXmlHttpRequest();
	req.onreadystatechange = function()
		{
			if (req.readyState != 4) return;
			console.log(req.responseText);
		};
	req.open("POST", "to-server.php", true);
	req.setRequestHeader("Content-Type", "text/xml");
	req.send(rawData);

ВНИМАНИЕ! Обязательно при передаче xml-строки от нас нужно прописывать req.setRequestHeader("Content-Type", "text/xml");

Внимание! Внимание!!!!! Можно вместо .responseText использовать .responseXML. В случае с .responseText мы получаем строку, а .responseXML - получаем ДОМ-объект XML
Так что шаг 4 может быть таким:

4. Передаем эту строку и получаем ДОМ-объект
	var req = getXmlHttpRequest();
	req.onreadystatechange = function()
		{
			if (req.readyState != 4) return;
			var domik = req.responseXML;
			var param = domik.getElementsByTagName("string")[0];
			console.log(param.firstChild.nodeValue);
			document.getElementById("res").innerHTML = param.firstChild.nodeValue;
		};
	req.open("POST", "to-server.php", true);
	req.setRequestHeader("Content-Type", "text/xml");
	req.send(rawData);
Здесь мы можем как к обычному дом-объекту обращаться к тому, что пришло от сервера. НО! Надо помнить, что это надо более подробно докапываться до текста, т.к. это текстовый узел, который лежит внутри других узлов, просто выбрать узел с ним недостаточно, надо до самого текста выбирать и у текстовой ноды уже снискать .nodeValue

ВНИМАНИЕ! Обязательно при передаче xml-строки от нас нужно прописывать req.setRequestHeader("Content-Type", "text/xml");

Метод .xml делает из всего этого нормальную строчку xml -кода сформированную
alert(msq.xml()); слепить из msg и его новосозданных параметров xml код и вывести

Как это происходит?
В файле подключенном описаны методы .addParameter объекта XMLRPCMessage, в итоге он из введенных значений с помощью метода .xml() создаст параметры в нужных тегах xml
Потом мы это передаем и получаем ответ

НО! Как нам преобразовать код xml, который пришел в ответ на запрос в html, чтобы вывести его, тут поможет - XSLT

XSLT - шаблонизатор. Преобразовывает xml во что угодно
XSL Transformation

Помнишь, есть файл xml, а есть файл xsl с правилами, через плагины он его преобразовывал только, а здесь тоже нужны велосипеды, напрямую он не преобразует, тлько за кадром.
Такие велосипеды написаны в виде функций и упакованы в файлы, которые надо подключать.

Файл xslt.js
xsltTransform(domXML, domXSL); Функция выполняет XSLT преобразование

Файл xmltools.js
showXML(dom); функция преобразует XML документ в строку
loadXML(url); Функция загружает требуемый XML файл в синхронном режиме

Файл xmlrpc.js
dateToISO8601(date); функция для работы с датами
leadingZero(n);  функция для номера с начальным нулевым числом

XMLRPCMessage(methodname, xmlEncoding); функция, через объект которой происходит формирование сообщения, создание новых параметров и содержимого для последующего их превращения в xml структуру
Методы объекта XMLRPCMessage:
.setMethod(); возвращает методы
.addParameter(); создание нового параметра хмл
.xml(); в конце - преобразование в хмл структуру, которая будет посылаться на обработку
.dataTypeOf();
.doValueXML();
.doBooleanXML();
.doDateXML();
.doArrayXML();
.doStructXML();
.getParamXML();

То бишь:
Теперь для преобразования xml по xsl  используем loadXML() и xsltTransform(domXML, domXSL), 

Дано файл xsl например:
<?xml version="1.0" encoding="utf-8" ?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
	// Метод преобразования
	<xsl:output method="html" />
	// Корневой шаблон
	<xsl:template match="/">
		<h2 align="right">
			<xsl:value-of select="/methodResponse/params/param/value/i4"/>
		</h2>
	</xsl:template>
</xsl:stylesheet>
Это означает - типа найдешь i4, который в value, который в param, который в params, который в methodResponse, который в корне - и вставить в <h2> значение и все это поставить на место содержимого корневого элемента (т.к. <xsl:template match="/">)
<xsl:value-of/> это вывод наподобие echo

Нам надо преобразовать по этому шаблону XML, который пришел в ответ от сервера. Как это делается?
Алгоритм все тот же, меняется пункт 4
Там делаем преобразование через loadXML() и xsltTransform(domXML, domXSL)

4. Передаем эту строку и получаем ДОМ-объект
	var req = getXmlHttpRequest();
	req.onreadystatechange = function()
		{
			if (req.readyState != 4) return;
			var domik = req.responseXML;
			var xsl = loadXML("template.xsl");
			document.getElementById("res").innerHTML = xsltTransform(domik, xsl);
		};
	req.open("POST", "to-server.php", true);
	req.setRequestHeader("Content-Type", "text/xml");
	req.send(rawData);

В итоге в выбранный див вставится преобразованный код XML, который чудесным образом превращается в прописанный нами html с его тегом <h2>

НО! Что делать, если нам надо вставить кусочек кода из превращенного html, а не весь его?
А xsltTransform вернул html вместе с тегами <html><body> и т.д.

ВНИМАНИЕ! НЕДОИЗУЧИЛА. Лаба eshop в samsamsam - недоделала, на этом вопросе я застопорилась!!!!


!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

Для работы с XML есть хорошая программа Liquid XML Studio чтобы формировать схемы и т.д.
Главное программу не обновлять, иначе не будет работать!
Там же можно валидацию проводить

НО! Весь этот алгоритм RPC с велосипедами - замороченный.
Лучше это реализовать через веб-сервисы

Изобрели продвиннутый RPC, и даже назвали его сначала RPC2, но потом перед самым релизом переименовали в SOAP
Перевод - простой протокол доступа к объектам
И сейчас все службы пишутся на нем, а соапе, на рпс никто не пишет

SOAP пришел на смену XML RPC
Структура соап запроса
soap: в начале каждого тега - это пространство имен xml

Структура SOAP-сообщения:
Естественно перед всем декларируется xml cтрока
<?xml version="1.0" encoding="utf-8"?>
Обязателен корневой элемент <Envelope></Envelope>
Обязателен элемент <Body></Body>
Не обязательный, но можно <Header></Header>
soap: - тут это просто пространство имен
В нем нет лишних обвязок, как в RPC, тут имя элемента - это сразу в теге, не надо оборачивать, что это элемент и т.д.
Имя параметра тоже в виде тега внутри элемента


<?xml version="1.0" encoding="utf-8"?>
<soap:Envelope xmlns:soap="http://schemas.xmlnsoap.org/soap/envelope/">
    <soap:Header>
    	<WoodgroveAuthInfo xmlns='http:tytu.org/'>
    		<Username>string</Username>
    		<Password>string</Password>
    	</WoodgroveAuthInfo>
    </soap:Header>
    <soap:Body>
        <getStock xmlns="http://site.ru/ws">
            <num>12345</num>
        </getStock>
    </soap:Body>
</soap:Envelope>

Внимание! Все это в запросе пишется в теле запроса после пустой строки, которая после заголовков, если помнишь...

Пример SOAP апроса POST-ом вместе с заголовками:

POST /DailyInfoWebServ/DailInfo.asmx HTTP/1.1
Host: www.cbr.ru
Content-Type: text/xml; charset=utf-8
Content-Length: length
SOAPAction: "http//web.cbr.ru/GetCursOnDate" уникальная строка, похожая на адрес, но это не ссылка, по ней находится служба, где описано, что с этим делать или то, куда дальше он должен отправлять
*пустая строка*
<?xml version="1.0" encoding="utf-8"?>
<soap: Envelope
	xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
	xmlns:xsd="http://www.w3.org/2001/XMLSchema"
	xmlns:soap="http://schemas/xmlsoap.org/soap/envelope/">
	<soap:Body>
		<GetCursOnDate xmlns="http://web.cbr.ru/"> xmlns указывает на то, что это наш придуманный тег GetCursOnDate, он ему не известен
			<On_date>dateTime</On_date>
		</GetCursOnDate>
	</soap:Body>
<soap: Envelope>

Вот как выглядит ответ SOAP:
HTTP/1.1 200 OK
Content-Type: text/xml; charset=utf-8
Content-Length: length
*пустая строка*
<?xml version="1.0" encoding="utf-8"?>
<soap: Envelope
	xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
	xmlns:xsd="http://www.w3.org/2001/XMLSchema"
	xmlns:soap="http://schemas/xmlsoap.org/soap/envelope/">
	<soap:Body>
		<GetCursOnDateResponse xmlns="http://web.cbr.ru/">
			<GetCursOnDateResult> 
				<xsd:schema>schema</xs:schema>
			</GetCursOnDateResult>
		<GetCursOnDateResponse>
	</soap:Body>
<soap: Envelope>

WSDL - язык описания веб-служб
Web Services Description Language
Это XML документ, в котором описывается то, что там за методы, операции, что принимает, что отдает, в каких форматах и т.д.

Пример кода wsdl-документа
<?xml version="1.0" encoding="UTF-8"?>
<definitions name="SampleServer1" 
	targetNamespace="urn:SampleServer1" 
	xmlns:typens="urn:SampleServer1" 
	xmlns:xsd="http://www.w3.org/2001/XMLSchema" 
	xmlns:soap="http://schemas.xmlsoap.org/wsdl/soap/" 
	xmlns:soapenc="http://schemas.xmlsoap.org/soap/encoding/" 
	xmlns:wsdl="http://schemas.xmlsoap.org/wsdl/" 
	xmlns="http://schemas.xmlsoap.org/wsdl/">
	
	// Сообщения метода getTime
	<message name="getTime"/>
	<message name="getTimeResponse">
		<part name="getTimeResult" type="xsd:string"/>
	</message>
	
	// Сообщения метода sayHello
	<message name="sayHello">
		<part name="userName" type="xsd:string"/>
	</message>
	<message name="sayHelloResponse">
		<part name="sayHelloResult" type="xsd:string"/>
	</message>
	
	// Привязка сообщений к методам
	<portType name="ServerPortType">
		<operation name="getTime">
			<input message="typens:getTime"/>
			<output message="typens:getTimeResponse"/>
		</operation>
		<operation name="sayHello">
			<input message="typens:sayHello"/>
			<output message="typens:sayHelloResponse"/>
		</operation>
	</portType>

	// Формат методов
	<binding name="ServerBinding" type="typens:ServerPortType">
		<soap:binding style="rpc" transport="http://schemas.xmlsoap.org/soap/http"/>
		<operation name="getTime">
			<soap:operation soapAction="urn:SampleServer1-getTime"/>
			<input>
				<soap:body namespace="urn:SampleServer1" use="encoded" encodingStyle="http://schemas.xmlsoap.org/soap/encoding/"/>
			</input>
			<output>
				<soap:body namespace="urn:SampleServer1" use="encoded" encodingStyle="http://schemas.xmlsoap.org/soap/encoding/"/>
			</output>
		</operation>
		<operation name="sayHello">
			<soap:operation soapAction="urn:SampleServer1-sayHello"/>
			<input>
				<soap:body namespace="urn:SampleServer1" use="encoded" encodingStyle="http://schemas.xmlsoap.org/soap/encoding/"/>
			</input>
			<output>
				<soap:body namespace="urn:SampleServer1" use="encoded" encodingStyle="http://schemas.xmlsoap.org/soap/encoding/"/>
			</output>
		</operation>
	</binding>

	// Определение службы
	<service name="SampleServer1Service">
		<port name="ServerPort" binding="typens:ServerBinding">
			<soap:address location="http://mysite.local/demo/module-5/server-1/server.php"/>
		</port>
	</service>
</definitions>

Читается от снизу вверх, так удобнее.
Тег (элемент) <service> содержит инфу, где находится сама служба, где сам wsdl файл

Тег (элемент) <binding> содержит перечисление методов. Каждый метод там обозначен элементом <operation> c именем

Тег (элемент) <portType> содержит описание перечисленных методов. Внутри него теги <operation>, в которых эти описания и содержатся. <input message=""> - входящие параметры метода, <output message=""> - исходящие параметры, и указан параметр message, что говорит о том, что подробно об этих входящих/исходящих паратетрах описано в соответствующих элементах <message>

Теги <message> описаны выше как раз, с соответственными именами. В теге <part> пишется то, что возвращает указанный параметр, type="xsd:string" означает, что возвращает строку

НО! В JS нет никакого встроенного объекта, через который можно было бы работать с SOAP

Можно использовать программу Liquid XML Studio

Остановилась на 09 видео



