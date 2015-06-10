<table width="100%">
	<tr>
		<td align="center"><h1>Добро пожаловать на наш сайт!</h1>
		<?php
			if (!getMenu($topmenu, false))
			echo MY_ERR_ON_GETMENU;
			?>
		</td>
	</tr>
</table>