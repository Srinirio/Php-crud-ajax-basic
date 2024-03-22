<?php
include("database.php");

if(isset($_POST["id"])) {
    $id = $_POST["id"];

    $sql = "SELECT * FROM `crudajax` WHERE Id = $id";

    $result = mysqli_query($connect, $sql);

    if($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        echo json_encode($row);
    } else {
       
        echo json_encode(array());
    }
} else {
    
    echo json_encode(array());
}
?>
