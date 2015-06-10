<!doctype html>
<html>
<head>
	<meta charset=utf-8>
	<title>Шаблонизатор</title>
	<script src="handlebars.js" type="text/javascript"></script>
</head>
<body>
<ul id="users"></ul>
<script id="myTemplate" type="text/x-handlebars-template">
	{{#each this}}
	<li><h3>{{name}}</h3><p>email: {{email}}</p></li>
	{{/each}}
</script>

<script>
	(function() {
		var user = [
			{'name': 'John Smith',
			'email': 'john@jojo.jo'},
			{'name': 'Mike Doe',
				'email': 'mike@doe.oe'},
			{'name': 'Vasya Smith',
			'email': 'vaska@o.com'}
		];
		var temp = Handlebars.compile(document.getElementById('myTemplate').innerHTML);
		document.getElementById('users').innerHTML = temp(user);
	})();
</script>
</body>
</html>