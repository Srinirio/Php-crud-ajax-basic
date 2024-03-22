<?php
include("database.php");
if(isset($_POST["name"]) && isset($_POST["age"]) && isset($_POST["city"])){
    $name=$_POST["name"];
    $age=$_POST["age"];
    $city=$_POST["city"];
    $sql="INSERT INTO crudajax(Name,Age,City) VALUES('$name',$age,'$city')";
    $result=mysqli_query($connect,$sql);
    if($result){
        $last_inserted_id = mysqli_insert_id($connect);
        echo "
        <td>$name</td>
        <td>$age</td>
        <td>$city</td>
        <td><a href='#' class='btn btn-primary update' data-id=$last_inserted_id >Update</a> <a href='#' class='btn btn-dark delete' data-id=$last_inserted_id>delete</a></td>";
    }
    else{
        die(mysqli_error($connect));
    }
}


?>
