<?php
include("database.php");

$sql = "DELETE FROM `crudajax` WHERE id={$_POST['id']}";
$result=mysqli_error($connect,$sql);

?>