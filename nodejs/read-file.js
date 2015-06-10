var fs = require('fs');
fs.readFile('file.txt', function (err, content) {
	console.log(decodeURIComponent(content));
});
console.log('The end');