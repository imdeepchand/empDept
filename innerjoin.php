<?php

$conn = mysqli_connect('localhost','root','','demo');

$query = " SELECT dept.dept_name, employee.emp_name, employee.mobile, employee.email FROM employee INNER JOIN dept ON dept.dept_name = employee.dept_name ";

$data = mysqli_query($conn,$query);

$num = 1;
if(mysqli_num_rows($data)> 0){
    while( $result = mysqli_fetch_array($data) ){
        ?>
        <tr>
        <td><?php echo $num ?></td>
            <td><?php echo $result['emp_name'] ?></td>
            <td><?php echo $result['dept_name'] ?></td>
            <td id='emp_mobile'><?php echo $result['mobile'] ?></td>
            <td><?php echo $result['email'] ?></td>
            <td>
                <button class='btn btn-info btn-sm' onclick="viewResouce(<?php echo $result['mobile'] ?>)" data-bs-toggle="modal" data-bs-target="#empFetchModal">View</button>
                <button class='btn btn-warning btn-sm' onclick="editResouce(<?php echo $result['mobile'] ?>)" data-bs-toggle="modal" data-bs-target="#empUpdateModal">Edite</button>
                <button class='btn btn-danger btn-sm' onclick="deleteResouce(<?php echo $result['mobile'] ?>)">Delete</button>
            </td>
        </tr>

<?php
        $num+= 1;
    }
}

?>