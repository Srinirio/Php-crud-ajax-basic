<?php
include("database.php");

?>

<table class="table">
  <thead>
    <tr>
      
      <th scope="col">NAME</th>
      <th scope="col">AGE</th>
      <th scope="col">CITY</th>
      <th scope="col">OPERATION</th>
    </tr>
  </thead>
  <tbody>

  <?php
   $sql="SELECT * FROM `crudajax`";
   $result=mysqli_query($connect,$sql);
   if($result){
    while($row=mysqli_fetch_assoc($result))
    {
        $id=$row['Id'];
        $name=$row["Name"];
        $city=$row["City"];
        $age=$row['Age'];
        echo" <tr>
        <td>$name</td>
        <td>$age</td>
        <td>$city</td>
        <td><a href='#'class='btn btn-primary update' data-id=$id >Update</a> <a href='#' class='btn btn-dark delete' data-id=$id>Delete</a></td>
      </tr>";
    }
    
   }
  ?>
   
    
  </tbody>
</table>