<?php

$connect=new mysqli("localhost","root","","bussinessdb");
if(!$connect)
{
    die(mysqli_error($connect));
}


?>