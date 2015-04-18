function getDate(date) {
	var re = /^(\d{1,2})\-(\d{1,2})\-(\d{4})$/;
	if (re.test(date)) {
		var str = date.replace(re, '$3,$2,$1');
		return new Date(str);
	} else {
		print('Invalid date');
	}
}
var d = getDate("32-03-2014");
print(d);