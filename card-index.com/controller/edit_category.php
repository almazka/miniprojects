<?php
	class edit_category extends ACore_admin
	{
		public function get_content()
		{
		$result = $this->m->category_array();
		return $result;
		}
	}
?>