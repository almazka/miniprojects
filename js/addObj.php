<script>
function Book (title,pubYear,price) {
	this.title = title;
	this.pubYear = pubYear;
	this.price = price;
}
var book1 = new Book('Сказка',2013,300);
var book2 = new Book('Рассказы',2014,380);
Book.prototype.show = function(){console.log('Книга '+this.title+' стоит '+this.price);};
book1.show();
book2.show();
	/*var book1 = {};
	book1.title = 'Сказка';
	book1.pubYear = 2012;
	book1.price = 300;
	book1.show = function() {
		console.log('Название: '+this.title+', Цена: '+this.price);
	};

	function showBook() {
		console.log('Название: '+this.title+', Цена: '+this.price);
	};
	var book2 = {
		title : 'Корабль странник',
		pubYear : 2014,
		price : 1000,
		show : showBook
	};
	
	book1.show();
	book2.show();

	/*console.log('Первый объект содержит: ');
	for (var cur in book1) {
		console.log(cur+' '+book1[cur]);
	};
	console.log('Второй объект содержит: ');
	for (var cur in book2) {
		console.log(cur+' '+book2[cur]);
	};*/

</script>