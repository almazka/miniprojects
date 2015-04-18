<?php
class delete_articles extends ACore_admin
{
	
	public function handler()
	{
		$handler = $this->m->delete_article();
		return $handler;
	}
	public function get_content()
	{
		# code...
	}
}
?>