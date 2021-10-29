<?php

$conn = mysqli_connect('localhost','root','','demo');

$query = " select * from dept ";

$data = mysqli_query($conn,$query);

if(mysqli_num_rows($data)> 0){
    while( $result = mysqli_fetch_array($data) ){
        ?>
                   <option><?php echo $result['dept_name'] ?></option>
<?php
    }
}

?>