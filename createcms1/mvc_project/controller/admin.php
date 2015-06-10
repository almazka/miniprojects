<?php
  class admin extends ACore_admin
  {
    public function get_content()
    {
      $result = $this->m->get_admin_content();
      return $result;
    }
  }
?>