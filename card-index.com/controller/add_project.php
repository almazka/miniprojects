<?php
class add_project extends ACore_admin
{
	protected function handler()
	{
		$handler = $this->m->add_project();
		return $handler;
	}
	public function get_content()
	{
		return true;
	}
}

?>