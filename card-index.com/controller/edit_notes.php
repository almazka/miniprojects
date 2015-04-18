<?php
  class edit_notes extends ACore_admin
  {
    public function get_content()
    {
      $result = $this->m->get_notes_content();
      return $result;
    }
  }
?>