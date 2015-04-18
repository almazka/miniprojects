function Book(title,pubyear,price) {
	this.title = title;
	this.pubyear = pubyear;
	this.price = price;
}

var book = new Book("Esoreric magic",2012,5000);
var book1 = new Book("Zero point",2010,500);
book.constructor.prototype.show = function(){
	print("Zagolovok:",this.title,", Tcena:",this.price);
};

/*
for (var i in book1) {
	print(i, ":", book[i]);
}
*/
book.show();