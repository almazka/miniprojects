<?php
	class edit_tags extends ACore_admin
	{
		public function get_content()
		{
		$result = $this->m->get_all_tags();
		return $result;
		}
	}
?>