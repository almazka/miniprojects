<?php
class add_notes extends ACore_admin
{
	protected function handler()
	{
		$handler = $this->m->add_notes();
		return $handler;
	}
	public function get_content()
	{
		return true;
	}
}

?>