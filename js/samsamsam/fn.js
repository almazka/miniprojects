function compare(x){
	return function (y) {
		if (x>y)
			print(x+" bolshe "+y);
		else if (x<y)
			print(x+" menshe "+y);
		else if (x==y)
			print(x+" ravno "+y);
		else
			print("Not a number!");
	};
}
function toNum (n) {
	return n=n*1;
}
putstr("Enter first a number: ");
var x = readline();
toNum(x);
putstr("Enter second a number: ");
var y = readline();
toNum(y);
var one = compare(x);
one(y);
