<script>
	// записать в массив b квадраты значений массива a
	var a = [5, 12];
	var b = [];
	a[99] = 7;
	for (var i in a)
		b.push(Math.pow(a[i], 2));
</script>