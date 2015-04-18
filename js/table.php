<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Таблица умножения</title>
<style type="text/css">
td{padding:10px;border:1px solid #369;}
</style>
<script type="text/javascript">
var cell = 10;
var row = 10;

function createDOM() {
	var div = document.getElementById('d');
	div.innerHTML = '<h1>Таблица умножения</h1>';
	var t = document.createElement('table');
	div.appendChild(t);
	for (var i=1; i<=row; i++) {
		var tr = document.createElement('tr');
		t.appendChild(tr);
		for (var j=1; j<=cell; j++) {
				var td = document.createElement('td');
				var txt = document.createTextNode(i*j);
				td.appendChild(txt);
				tr.appendChild(td);
			}
	/* Создайте в элементе div таблицу с помощью методов DOM */
	}
}
</script>
</head>
<body>
<a href="javascript:createDOM();">Создать таблицу с помощью методов DOM</a><br>
<div id="d"></div>
</body>
</html>