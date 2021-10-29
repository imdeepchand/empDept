<?php

$conn = mysqli_connect('localhost','root','','demo');

$mobile = $_POST['mobile'];

$query = " DELETE FROM `employee` WHERE mobile = '$mobile' ";

$data = mysqli_query($conn,$query);


?>