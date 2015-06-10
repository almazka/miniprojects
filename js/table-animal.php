<script>	
	drawItems('dog', 3, 'cat', 2, 6, 25);
	function drawItems (name1, cnt1, name2, cnt2, items, lines) {
		var DOGS = cnt1;
		var CATS = cnt2;
		var ITEMS_PER_LINE = items;
		var LINES = lines;
		var ITEMS = ITEMS_PER_LINE * LINES;
		var num_in_line = 0; // номер зверя в строке
		var output = '';
		var id = 0;
		while(id<ITEMS) {
			for (var i=0; i<DOGS; i++) {
				output += name1;
				id++;
				setWhiteSpace();
			}
			for (var i=0; i<CATS; i++) {
				output += name2;
				id++;
				setWhiteSpace();
			}
		}
		console.log(output);
		function setWhiteSpace () {
			num_in_line++;
			if (num_in_line == ITEMS_PER_LINE) {
				output += '\n';
				num_in_line = 0;
			} else {
				output += '\t';
			}
		}
	}
</script>