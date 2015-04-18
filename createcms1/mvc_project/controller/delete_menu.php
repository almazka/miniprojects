<?php
class delete_menu extends ACore_admin
{
	
	public function handler()
	{
		$handler = $this->m->delete_menu();
		return $handler;
	}
	public function get_content()
	{
		# code...
	}
}
?>