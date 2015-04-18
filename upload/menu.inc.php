<table width="100%">
	<tr>
		<td>
			<p>Меню</p>
			<?php
			if (!getMenu($leftmenu))
			echo MY_ERR_ON_GETMENU;
			?>
		</td>
	</tr>
</table>