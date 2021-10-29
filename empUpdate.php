<?php

$conn = mysqli_connect('localhost','root','','demo');

$emp_name = $_POST['emp_name'];
$address = $_POST['address'];
$mobile = $_POST['mobile'];
$dept_id = $_POST['dept_id'];
$email = $_POST['email'];
$dob = $_POST['dob'];
$doj = $_POST['doj'];
$gender = $_POST['gender'];
$active = $_POST['active'];

   
    $query = " UPDATE `employee` SET `emp_name`= '$emp_name' ,`address`= '$address' ,`mobile`= '$mobile',`dept_id`='$dept_id' ,`email`= '$email' ,`dob`= '$dob' ,`doj`= '$doj' ,`gender`= '$gender' ,`active`= '$active' WHERE mobile = '$mobile' ";
    mysqli_query($conn,$query);
?>