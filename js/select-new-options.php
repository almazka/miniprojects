<script>
	function addYear(flag) {
		var s = document.forms[0].year;
		if (flag) {
			var x = s.options[s.length-1].value * 1 + 1;
			var o = new Option(x, x, false, true);
			try{
				s.add(o,null)
			}
			catch(e) {
				s.add(o);
			}
		} else {
			var x = s.options[0].value * 1 - 1;
			var o = new Option(x, x, false, true);
			try{
				s.add(o,s.options[0])
			}
			catch(e) {
				s.add(o);
			}
		}
	}
</script>
<form action="">
	<fieldset>
		<legend>Изменение элементов списка</legend>
		<div>
			<label for="year"><span>Год рождения</span></label>
			<div>
				<a href="javascript:addYear(0);">+</a>
				<select name="year" id="year">
					<option value="1970">1970</option>
					<option value="1971">1971</option>
					<option value="1972">1972</option>
					<option value="1973">1973</option>
					<option value="1974">1974</option>
					<option value="1975">1975</option>
				</select>
				<a href="javascript:addYear(1);">+</a>
			</div>
		</div>
	</fieldset>
</form>