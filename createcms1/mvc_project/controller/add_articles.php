<?php
class add_articles extends ACore_admin
{
	protected function handler()
	{
		$handler = $this->m->add_article();
		return $handler;
	}
	public function get_content()
	{
		return true;
	}
}

?>