<script>
var s = "Мы знаем, что монохромный цвет - это градация серого";
var txt = "хром";
var word;
var str2;
var pointsearch = s.indexOf(txt);
if (pointsearch != -1) {
	var point_end = s.indexOf(" ",pointsearch);
	var point_in = s.lastIndexOf(' ',pointsearch) + 1;
	if (point_end = -1) {
		str2 = s.slice(point_in);
	}
	str2 = s.slice(point_in, point_end);
	word = str2.trim();
} else {
	console.log("Not found");
}
</script>

