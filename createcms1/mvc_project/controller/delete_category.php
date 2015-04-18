<?php
class delete_category extends ACore_admin
{
	
	public function handler()
	{
		$handler = $this->m->delete_category();
		return $handler;
	}
	public function get_content()
	{
		# code...
	}
}
?>