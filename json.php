<?php 
 
$conn = mysqli_connect('localhost','root','','demo');

$rows = " SELECT dept.dept_name, employee.emp_name, employee.mobile, employee.email FROM employee INNER JOIN dept ON dept.id = employee.dept_id ";

$rows->excute();
$json_data=array();

foreach($rows as $row){
    $json_array['emp_name']=$row['emp_name'];  
    $json_array['dept_name']=$row['dept_name'];  
    $json_array['mobile']=$row['mobile'];  
    $json_array['email']=$row['email'];  
//here pushing the values in to an array  
    array_push($json_data,$json_array);  
  
}  
  
//built in PHP function to encode the data in to JSON format  
echo json_encode($json_data);  


?>