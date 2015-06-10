<script>
	// Из многострочной строки выстроить список имен, поменять местами фамилию и имя.
	var names = 'Lennon, John\nMcCartney, Paul\nHarrison, George\nStar, Ringo';
	var x = names.replace(/([\w ]+), ([\w ]+)/g, '$2 $1');
	console.log(x);
</script>