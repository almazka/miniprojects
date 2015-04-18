<script>
// найти заданную комбинацию символов в строке, выцепить слово, где она встречается и засунуть это слово в переменную

	var s = 'Мы знаем, что монохромный цвет - это градации серого';
	var txt = 'хром';
	var word;
	var pos = s.indexOf(txt);
	if (pos>-1) {
		var start = s.lastIndexOf(' ', pos)+1;
		var end = s.indexOf(' ',pos);
		word - s.slice(start,end);
	}
	console.log(word);
</script>