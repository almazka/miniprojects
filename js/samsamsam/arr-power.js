var arr = [5,12];
var brr = [];
arr[8] = 7
for (a in arr) {
	brr.push(Math.pow(arr[a],2));
}

/*for (var a=0; a<arr.length; a++) {
	brr.push(Math.pow(arr[a],2));
}*/
print(brr);
