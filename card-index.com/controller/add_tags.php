<?php
class add_tags extends ACore_admin
{
	protected function handler()
	{
		$handler = $this->m->add_tags();
		return $handler;
	}
	public function get_content()
	{
		return true;
	}
}

?>