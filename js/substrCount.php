<script>
/// Внимание! Довести до ума, фигню какую-то возвращает
// функция для возврата всех вхождений искомого
//offset - смещение начала отсчета
//lenght - максимальная длина строки, в которой будет продолжаться поиск после указанного смещения
	function substrCount (input, needle, offset, lenght) {
		var cnt = 0;
		if (isNaN(offset)) offset = 0;
		if (isNaN(lenght)) lenght = 0;
		if (lenght > 0 && offset > 0) {
			if ((offset + lenght) > input.lenght) return -1;
			else
				input = input.substring(offset,offset+lenght);
		}
		offset = -1;
		while((offset = input.indexOf(needle, offset+1)) != -1)
			cnt++;
		return cnt;
	}
	console.log(substrCount('Я Алена, а это поиск в строке строчных букв стр труе','л', 3, 20));
</script>