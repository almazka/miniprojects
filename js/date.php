<script>
	function getDate (str) {
		var found = str.match(/(\d\d?)-(\d\d?)-(\d{4})/);
		if (found == null) {
			throw new Error('No date found in '+str+'!');
		}
		return new Date(Number(found[3]), Number(found[2])-1, Number(found[1]));
	}
	try {
	var result = getDate('02-9-2012');
	console.log(result);
} catch(e) {
	console.log(e.message);
}

</script>