<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru" lang="ru" dir="ltr">
<head>
	<title>Книги по категориям</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="Content-Language" content="ru" />
	<link rel="stylesheet" type="text/css" href="get_post_book_category_select.css" />
	<script type="text/javascript" src="xmlhttprequest.js"></script>
	<script type="text/javascript">
		/*
		** Задание 1: Заполните элемент selCategory списом категорий книг.
		** Для этого напишите функцию fillCategories и вызовите ее из 
		** события window.onload. Список категорий вы можете получить
		** из скрипта getcategories.php в виде текстового документа со строками,
		** разделенными \n - символ новой строки
		** Формат строк: "код:назввание", например "1:Web"
		*/
		function fillCategories()
		{
			// Запрос к серверу
			var req = getXmlHttpRequest();
			req.onreadystatechange = function()
				{
					if (req.readyState != 4) return;
					// Список selCategory
					var selCategory = document.getElementById("selCategory");
					// Получим строку ответа
					var responseText = new String(req.responseText);
					// Разделим строку на массив
					var cats = responseText.split("\n");
					// Создадим необходимое количество элементов option с кодами категорий
					for (var i = 0; i < cats.length; i++)
					{
						if (cats[i] == '') continue;
						// Разделим строку по символу ":"
						var parts = cats[i].split(":");
						// Создадим новый элемент option
						var option = document.createElement("option");
						option.setAttribute("value", parts[0]);
						var optionText = document.createTextNode(parts[1]);
						option.appendChild(optionText);
						selCategory.appendChild(option);
					}
					// Сделаем список выбора с нужным числом элементов
					selCategory.size = selCategory.options.length;
				}
			// Метод GET
			req.open("GET", "get_post_book_category_select1.php", true);
			req.send(null);
		}
				
		// При завершении загрузки страницы
		window.onload = function()
		{
			fillCategories();
		}
		
		/*
		** Задание 2: Напишите функцию showBooks, выводящую все книги указанной категории
		** в таблицу tableBooks. Список книг можно получить из сценария postbooksbycat.php
		** передав ему параметром POST код категории.
		** Список книг возвращается в формате 
		**       автор|название|карнинка
		** Поставьте вызов этой функции на кнопку "Показать" 
		*/
		function Book (author, title, image) {
			this.author = author;
			this.title = title;
			this.image = image;
		}
		var books = new Array();

		function showBooks()
		{
			var selCategory = document.getElementById('selCategory');
			if (selCategory.selectedIndex < 0) {
				alert('Необходимо выбрать категорию');
				return;
			}
			var catId = selCategory.options[selCategory.selectedIndex].value;

			var req = getXmlHttpRequest();
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
			var tableBooks = document.getElementById('tableBooks');
			while(tableBooks.hasChildNodes())
				tableBooks.removeChild(tableBooks.lastChild);
			for (var i=0; i<books.length; i++) {
				var tr = tableBooks.insertRow(tableBooks.rows.length);
				var tdAuthor = tr.insertCell(tr.cells.length);
				tdAuthor.appendChild(document.createTextNode(books[i].author));
				var tdTitle = tr.insertCell(tr.cells.length);
				tdTitle.appendChild(document.createTextNode(books[i].title));
				tr.onmouseover = new Function("trHighLight(this, '#fcc')");
				tr.onmouseout = new Function("trHighLight(this, '')");
				tr.title = books[i].image;
				tr.onclick = new Function('showImage(this)');
			}
		}
		var postData = 'cat='+catId;
		req.open('POST', 'get_post_book_category_select2.php', true);
		// Установка заголовков
		req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		req.setRequestHeader("Content-Length", postData.length);
		
		// Отправка данных
		req.send(postData);		
		}
		
		function trHighLight (trObject, color) {
			if (color != "")
				trObject.style.backgroundColor = color;
			else
				trObject.style.backgroundColor = "";
		}
		function isExists(url) {
			var req = getXmlHttpRequest();
			req.open("HEAD", url, false);
			req.send(null);
			return (req.status == 200);
		}
		function showImage (trObject) {
			var imagePath = 'img/';
			var image = imagePath + trObject.title;
			var divBookInfo = document.getElementById('divBookInfo');
			var img = divBookInfo.getElementsByTagName('img')[0];
			if (isExists(image)) {
				img.src = image;
				divBookInfo.style.display = 'block';
			}
			else{
				img.src = '';
				divBookInfo.style.display = '';
			}
		}
	</script>
</head>
<body>
	<h1>Книги по категориям</h1>
	<form onsubmit="return false">
		<div>
			<label for="selCategory">Категория</label>
			<select id="selCategory"></select>
			<button onclick="showBooks()">Показать</button>
		</div>
		
		<div id="divBookInfo">
			<img src="" alt="" />
		</div>			
	</form>
	
	<table id="tableBooks"></table>
	

	
</body>
</html>

