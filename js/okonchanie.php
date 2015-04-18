<script>
var num = 90
	function getEnding (num) {
		var x = '';
		if (num%100 < 11 || num%100 > 14) {
		switch(num%10){
			case 1: x='а'; break;
			case 2:
			case 3:
			case 4: x='ы';
		}
	}
	return x;
	};

	console.log('На ветке сидит '+num+' ворон'+getEnding(num));

	/*
Правило:
1 - а
2, 3, 4 - ы
искл 11-14
	*/
</script>