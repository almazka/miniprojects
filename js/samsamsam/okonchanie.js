putstr("Skolko voron: ");
var num = readline();
num = num*1;
var end = "";
var str = "Na vetke sidit "+num+" voron";
if (num%100<11 || num%100>14) {
	switch(num%10){
		case 1: end="a"; break;
		case 2: 
		case 3: 
		case 4: end="i"; 
	}
}

print(str+end);