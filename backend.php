<?php

$conn = mysqli_connect('localhost','root','','demo');

extract($_POST);

if(isset($_POST['dept_name']) && isset($_POST['type']) && isset($_POST['active']) && isset($_POST['address']))
{
    $query = " INSERT INTO `dept`(`dept_name`, `type`, `active`, `address`) VALUES ('$dept_name' , '$type' , '$active' , '$address' )";

    mysqli_query($conn,$query);
}


?>