<script>
	var td_count = 10; // кол-во ячеек
	function createContent() {
		e = window.tbl;
		if (!e.rows.length) {
			create(e.tBodies[0] || e, 4);
			create(e.createTHead(), 2);
			create(e.createTFoot(), 3);
		}
		function create(section, tr_count) { // функция заполнения секций
			for (var i = 0, tr; i < tr_count; i++) {
				tr = section.insertRow(section.rows.length);
				tr.onclick = deleteRow;
				for (var j = 0; j < td_count; j++) {
					td = tr.insertCell(tr.cells.length);
					td.innerHTML = tr.cells.length;
					td.innerHTML += '<sup>'+section.rows.length+'</sup>';
				}
			}
		}
		function deleteRow() {
			e.deleteRow(this.rowIndex);
		}
	}
</script>
<a href="javascript:createContent();">Создать таблицу</a>
<table id="tbl">
	<caption>Таблица</caption>
</table>