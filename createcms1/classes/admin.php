<?php
  class admin extends ACore_admin
  {
    public function get_content()
    {
    $sql = "SELECT id, title FROM articles";
    $result = mysql_query($sql) or die(mysql_error());
    $result = db2array($result);
      echo "<div id='mainarea'><div id='main'><p><a href='?option=add_articles'> >>> Добавить новую статью <<<</a></p>";
      if ($_SESSION["res"]) {
      echo $_SESSION["res"];
      unset($_SESSION["res"]);
    }
      foreach ($result as $value) {
        echo "<p style='font-size: 15px;'><a href='?option=update_articles&id=".$value['id']."'>".$value['title']."</a> | <a href='?option=delete_articles&del=".$value['id']."'>Удалить статью</a></p>";
      }
      echo "</div></div>";
    }
  }
?>