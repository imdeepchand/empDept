<?php

$conn = mysqli_connect('localhost','root','','demo');

$mobile = $_POST['mobile'];

$query = " SELECT * FROM `employee` WHERE mobile = '$mobile' ";

$data = mysqli_query($conn,$query);

if(mysqli_num_rows($data)> 0){
  while( $result = mysqli_fetch_array($data) ){
      ?>

<div class="form-group">
                <label for="">Employee Name</label>
                <input type="text" class="form-control" id="up_name" value="<?php echo $result['emp_name'] ?>">
            </div>
            <div class="form-group">
                <label for="">Address</label>
                <input type="text" class="form-control" id="up_addr" value="<?php echo $result['address'] ?>">
            </div>
            <div class="form-group">
                <label for="">Mobile</label>
                <input type="text" class="form-control" id="up_mobile" value="<?php echo $result['mobile'] ?>">
            </div>
            <div class="form-group">
                <label for="dept">Department Id</label>
                <select name="dept" id="dept_id" class="form-control">
                  <option value="<?php echo $result['dept_id'] ?>" id="up_deptId"><?php echo $result['dept_id'] ?></option>
                </select>
            </div>
            <div class="form-group">
                <label for="">email</label>
                <input type="text" class="form-control" id="up_email" value="<?php echo $result['email'] ?>">
            </div>
            <div class="form-group">
                <label for="">Date of Birthday</label>
                <input type="date" class="form-control" id="up_dob" value="<?php echo $result['dob'] ?>">
            </div>
            <div class="form-group">
                <label for="">Date of Joining</label>
                <input type="date" class="form-control" id="up_doj" value="<?php echo $result['doj'] ?>">
            </div>
            <div class="form-group">
                <label for="gender">Gender</label> &#8287;&#8287;&#8287;
                <?php 

                  if($result['gender'] == "female"){
                echo"Female  <input type='radio' name='gender' id='up-gen' value='female' checked>
                &#8287;&#8287;&#8287; Male  <input type='radio' name='gender' id='up-gen' disabled value='male'>";
                  }
                  else {
                echo"Female  <input type='radio' name='gender' id='emp-gen' value='female' disabled>
                &#8287;&#8287;&#8287; Male  <input type='radio' name='gender' id='up-gen' value='male' checked>";
                  }
                ?>
            </div>
            <div class="form-group">
                <label for="">Active</label>
                <input type="text" class="form-control" id="up_active" value="<?php echo $result['active'] ?>">
            </div>
                
<?php
  }
}

?>