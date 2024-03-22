<?php
include("database.php");

if(isset($_POST["sendId"]) && isset($_POST["sendName"]) && isset($_POST["sendAge"]) && isset($_POST["sendCity"])){
    $id = $_POST["sendId"];
    $name = $_POST["sendName"];
    $age = $_POST["sendAge"];
    $city = $_POST["sendCity"];
    
  
    $sql = "UPDATE `crudajax` SET Name='$name', Age=$age, City='$city' WHERE Id=$id";
    $result = mysqli_query($connect, $sql);

    if($result) {
        echo "Updated";
    } else {
        echo "Error: Unable to update record. " . mysqli_error($connect);
    }
} else {
    echo "Error: Missing required parameters.";
}
?>
