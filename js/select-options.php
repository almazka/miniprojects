<script>
	var links = new Object();
	links['Яндекс'] = 'http://www.yandex.ru'
	links['Рамблер'] = 'http://www.rambler.ru'
	links['Гугл'] = 'http://www.google.ru'
function gotoURL() {
	var s = document.myform.selURL;
	var url = s.options[s.selectedIndex].value;
	location.assign(url);
}

</script>
<h1>Использование элементов SELECT и OPTION</h1>
<form id="myform" name="myform">
	<label for="selURL" disabled>Выберите адрес</label>
	<select name="selURL" id="selURL" onchange="gotoURL()" disabled></select>
	<a href="javascript:gotoURL()" disabled>Переход</a>
</form>
<script>
	var s = document.myform.selURL; // принято делать сначала desibled, потом его снимать, чтобы они были заблокены, пока до конца не загрузится список
	for (var item in links) {
		var o = new Option();
		o.value = links[item];
		o.text = item;
		s.add(o);
	}
	var f = s.form;
	for (var i = 0; i < f.elements.length; i++) {
		f.elements[i].disabled = false;
	};
</script>