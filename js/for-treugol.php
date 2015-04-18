<script>
	var alline = 4;
	var star, space;
	var stars, spaces;
	for (var curLine=1; curLine<=alline; curLine++) {
		space = alline - curLine;
		spaces = '';
			for (var i=0; i<space; i++) {
			spaces += ' ';
			};
		star = curLine * 2 - 1;
		stars='';
			for (var i=0; i<star; i++) {
			stars += '*';
			};
		console.log(spaces+stars);
	};

//то же самое, но с добавлением функций и универсализировано

function drawTreangle (alline, tab, symbol) {
		for (var curLine=1; curLine<=alline; curLine++) {
		var star, space;
		space = alline - curLine;
		star = curLine * 2 - 1;
		drawLine(space,star, tab, symbol);	
	};	
	function drawLine (cntTabs,cntSymbols,tab,symbol) {
		var tabs=symbols='';
		for (var i=0; i<cntTabs; i++) {
		tabs += tab;
		};
		for (var i=0; i<cntSymbols; i++) {
		symbols += symbol;
		};
	console.log(tabs+symbols);
	}
}	

drawTreangle(4, ' ', '*');
drawTreangle(6, '.', '+');
	
</script>
