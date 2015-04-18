<?php
class delete_project extends ACore_admin
{
	
	public function handler()
	{
		$handler = $this->m->delete_project();
		return $handler;
	}
	public function get_content()
	{
		# code...
	}
}
?>