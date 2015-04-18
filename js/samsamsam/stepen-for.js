putstr("Enter number: ");
var number = readline();
putstr("Enter stepen: ");
var exp = readline();
var result = 1;
for (var i=1; i<=exp; i++) {
	result *= number;	
}
print(result);