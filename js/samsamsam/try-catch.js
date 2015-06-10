function getDate(date) {
	var f = date.match(/^(\d{1,2})\-(\d{1,2})\-(\d{4})$/);
	if(f) {
		return new Date(f[3],f[2]-1,f[1]);
	} else {
		throw new Error('Invalid date');
	}
}
try {
	var d = getDate("992-03-2014");
	print(d);
} catch(e) {
	print(e.message);
}