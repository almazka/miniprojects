<?php
class add_category extends ACore_admin
{
	protected function handler()
	{
		$handler = $this->m->add_category();
		return $handler;
	}
	public function get_content()
	{
		return true;
	}
}

?>