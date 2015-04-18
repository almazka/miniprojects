<?php
	class edit_menu extends ACore_admin
	{
		public function get_content()
		{
		$result = $this->m->menu_array();
		return $result;
		}
	}
?>