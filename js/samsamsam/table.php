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
	var d = document.getElementById('d');
	d.innerHTML="";
	var t = document.createElement("table");
	for (var i=1; i<=row; i++){
		var tr = document.createElement("tr");
			for (var q=1; q<=cell; q++) {
			var td = document.createElement("td");
			var txt = document.createTextNode(i*q);
			td.appendChild(txt);
			tr.appendChild(td);
			}
		t.appendChild(tr);
	}
	d.appendChild(t);
	/* Создайте в элементе div таблицу с помощью методов DOM */
	}
</script>
</head>
<body>
<a href="javascript:createDOM();">Создать таблицу с помощью методов DOM</a><br>
<div id="d"></div>
</body>
</html>