<?php
class add_menu extends ACore_admin
{
	protected function handler()
	{
		$handler = $this->m->add_menu();
		return $handler;
	}
	public function get_content()
	{
		return true;
	}
}

?>