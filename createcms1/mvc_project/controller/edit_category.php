<?php
	class edit_category extends ACore_admin
	{
		public function get_content()
		{
		$result = $this->m->get_categories();
		return $result;
		}
	}
?>