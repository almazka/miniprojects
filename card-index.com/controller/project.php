<?php
class project extends ACore
{
	public function get_content()
	{
		$result = $this->m->get_project_content();
		return $result;
	}
}

?>