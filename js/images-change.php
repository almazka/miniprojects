<script>
	function changeImage() {
		document.square.src = 'img/img2.jpg';
	}
	var flag = false;
	function loopImage() {
		if(flag)
			document.square.src = 'img/img1.jpg';
		else
			document.square.src = 'img/img2.jpg';
		flag = !flag;
	}
	function resizeImage() {
		var i = document.square;
		var normalWidth = 600;
		if (i.width < normalWidth) {
			i.width *= 1.1;
			i.height *= 1.1;
			setTimeout('resizeImage()',100);
		}
	}
</script>
<h1>Смена изображений</h1>
<img src="img/img1.jpg" name="square" height="100" width="200">
<br>
<a href="javascript:resizeImage()">Увеличить</a><br>
<a href="javascript:changeImage()">Разово сменить картинку</a><br>
<a href="javascript:loopImage()">Менять картинки циклически</a>
