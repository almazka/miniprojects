<!doctype html>
<html>
<head>
<script src="jquery-1.11.1.min.js" type="text/javascript"></script>
<script src="slide-show.js" type="text/javascript"></script>
<script src="imgs.js" type="text/javascript"></script>
	<meta charset=utf-8>
	<title>Слайд-шоу</title>
	<script src="handlebars.js" type="text/javascript"></script>
	<style>
	* {
		margin: 0;
		padding: 0;
	}
	#show {
		display: none;
		margin-top: 1em;
	}
	#show button {
		padding: 1em;
		margin-right: 1em;
		cursor: pointer;
	}
	body {
		width: 400px;
		margin: 100px auto 0;
	}
	.view {
		width: inherit;
		height: 200px;
		overflow: scroll;
	}
	.view ul {
		list-style: none;
		width: 10000px;
	}
	.view li {
		float: left;
	}
	</style>
<script id="myTemplate" type="text/x-handlebars-template">
	<ul>
	{{#each this}}
	<li><img src='{{src}}' alt='{{alt}}'></li>
	{{/each}}
	</ul>
</script>
</head>

<body>
<div class="view">
</div>
<div id="show">
	<button id="prev">Назад</button>
	<button id="next">Вперед</button>
</div>
<script>
var tmp = Handlebars.compile($.trim($('#myTemplate').html()));
$('div.view').append(tmp(aImgs));
</script>
</body>
</html>