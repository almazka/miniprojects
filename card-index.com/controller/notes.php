<?php
class notes extends ACore
{
	public function get_content()
	{
		$result = $this->m->get_notes_content();
		return $result;
	}
}

?>