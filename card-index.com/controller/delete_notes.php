<?php
class delete_notes extends ACore_admin
{
	
	public function handler()
	{
		$handler = $this->m->delete_notes();
		return $handler;
	}
	public function get_content()
	{
		# code...
	}
}
?>