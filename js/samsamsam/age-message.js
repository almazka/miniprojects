putstr("Enter you age: ");
var age = readline();
var message = "";
if (age >= 18 && age <= 55)
	message = "enjoy you work!";
else if (age > 55)
	message = "enjoy you old life!";
else if (age < 18)
	message = "enjoy you toys!";
else
	message = "You age undefined!";

print(message);