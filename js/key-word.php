<script>
//типа словарь, в нем ключи и значения. Гет возвращает значение по ключу, а сет - ключ по значению
	function Dictionary(startValues) {
		this.values = startValues || {};
	}
	Dictionary.prototype.set = function(key,value) {
		this.values[key] = value;
	};
	Dictionary.prototype.get = function(key) {
		return this.values[key];
	};
	var users = new Dictionary({John: 'admin'});
	var role = users.get('John');
	users.set('Mike', 'manager');
</script>