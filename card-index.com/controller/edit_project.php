<?php
  class edit_project extends ACore_admin
  {
    public function get_content()
    {
      $result = $this->m->get_project_content();
      return $result;
    }
  }
?>