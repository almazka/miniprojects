<h1>Загружаем файл в указанную папку</h1>
<form action="filetofolder.php" method="POST" enctype="multipart/form-data">
<input type="file" name="uf">
<input type="submit">
</form>
<?php
if ($_FILES['uf']['error']==0) {
    $t = $_FILES['uf']['tmp_name'];
    $n = $_FILES['uf']['name'];
    move_uploaded_file($t, "upload/".$n);
}
?>