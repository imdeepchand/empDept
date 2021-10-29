<?php

$conn = mysqli_connect('localhost','root','','demo');

$emp_name = $_POST['emp_name'];
$address = $_POST['address'];
$mobile = $_POST['mobile'];
$dept_name = $_POST['dept_id'];
$email = $_POST['email'];
$dob = $_POST['dob'];
$doj = $_POST['doj'];
$gender = $_POST['gender'];
$active = $_POST['active'];

    $query = " INSERT INTO `employee`( `emp_name`, `address`, `mobile`,`dept_name`, `email`, `dob`, `doj`,  `gender`, `active`) VALUES ('$emp_name' , '$address', '$mobile' , '$dept_id' ,'$email' , '$dob' , '$doj', '$gender', '$active')";
    mysqli_query($conn,$query);
?>