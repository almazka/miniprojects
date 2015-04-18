<?php
class delete_tags extends ACore_admin
{
	
	public function handler()
	{
		$handler = $this->m->delete_tags();
		return $handler;
	}
	public function get_content()
	{
		# code...
	}
}
?>