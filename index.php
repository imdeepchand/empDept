<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crud Operation in PHP using Ajax</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<!-- data table -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap5.min.css">



<style>
section label {
  width: 150px;
  margin: 30px 0;
}
section input{
  width: 250px;
  hiegth: 50px;
  margin: 30px 0;
}
#toastmsg {
  visibility: hidden;
  min-width: 250px;
  margin-left: -125px;
  background-color: rgba(0,255,0,.75);
  color: #fff;
  text-align: center;
  border-radius: 2px;
  padding: 16px;
  position: fixed;
  left: 50%;
  bottom: 30px;
  font-size: 17px;
  z-index: 999;
  border-radius: 5px;
}
#toastmsg.show {
  visibility: visible;
  -webkit-animation: fadein 0.5s, fadeout 0.5s 2.5s;
  animation: fadein 0.5s, fadeout 0.5s 2.5s;
}
#toastmsg-err{
  visibility: hidden;
  min-width: 250px;
  margin-left: -125px;
  background-color: rgba(255,0,0,.75);
  color: #fff;
  text-align: center;
  border-radius: 2px;
  padding: 16px;
  position: fixed;
  left: 50%;
  bottom: 30px;
  font-size: 17px;
  z-index: 999;
  border-radius: 5px;
}
#toastmsg-err.show {
  visibility: visible;
  -webkit-animation: fadein 0.5s, fadeout 0.5s 2.5s;
  animation: fadein 0.5s, fadeout 0.5s 2.5s;
}
@-webkit-keyframes fadein {
  from {bottom: 0; opacity: 0;} 
  to {bottom: 30px; opacity: 1;}
}

@keyframes fadein {
  from {bottom: 0; opacity: 0;}
  to {bottom: 30px; opacity: 1;}
}

@-webkit-keyframes fadeout {
  from {bottom: 30px; opacity: 1;} 
  to {bottom: 0; opacity: 0;}
}

</style>
<script>
//--------------------inner join search record------------------------------------------------------------

    function search(){
      var emp_name = $("#search_emp_name").val();
      var mobile = $("#search_emp_mobile").val();
      var email = $("#search_emp_emsil").val();
      var dept = $("#search_emp_dept").val();

      // if(emp_name !== '' && mobile !== '' && email !== '' && dept!== '') {
      $.ajax({
          url: "search.php",
          type: "POST",
          data: {
            emp_name: emp_name,
            mobile: mobile,
            email: email,
            dept: dept
          },

          success:function(data){
            $("#empData").html(data);
          }
        });
      // } else{
      //   alert("all Field are requiered!")
      // }
    }
</script>
<body>
<nav class="navbar navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">LOGO</a>
    <a class="navbar-brand mx-auto" href="#">Employee Search</a>
  </div>
</nav>

  <div class="text-center my-5">
      <section class="m-0 p-0">
        <label>Emmployee Name</label><input type="text" id="search_emp_name">
        <label>Mobile</label><input type="text" id="search_emp_mobile"> 
      </section>
      <section class="m-0 p-0">
        <label>Email</label><input type="text" id="search_emp_emsil">
        <label>Deparment</label><input type="text" id="search_emp_dept">
      </section>
  </div>

    <div class="text-center my-3">
      <!-- search button -->
      <button class="btn btn-info btn-lg mx-5" onclick="search()">Search</button>
      <!-- Button trigger Emplyee modal -->
      <button type="button" class="btn btn-primary btn-lg mx-5" data-bs-toggle="modal" data-bs-target="#EmpModal">
        Add Emp
      </button>
          <!-- Button trigger Deparment modal -->
      <button type="button" class="btn btn-primary btn-lg mx-5" data-bs-toggle="modal" data-bs-target="#DeptModal">
        Add Dept
      </button>
    </div>

   
<!-- fetch data --> 
<div class="container-fluide px-5">
    <table id="innerFetch" class="table table-striped" style="width:100%">
        <thead>
          <tr>
            <th>#</th>
            <th>Emp Name</th>
            <th>Department</th>
            <th>Mobile</th>
            <th>Email</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody id="empData"></tboady>
        <!-- <tfoot>
          <tr>
            <th>#</th>
            <th>Department Name</th>
            <th>Type</th>
            <th>Active</th>
            <th>Address</th>
            <th>Action</th>  
          </tr>    
        </tfoot> -->
    </table> 
    </div>

<!-- Deparment Modal -->
<div class="modal fade" id="DeptModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Department</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="dept-form">
            <div class="form-group">
                <label for="">Department Name</label>
                <input type="text" class="form-control left" id="d_name" required>
            </div>
            <div class="form-group">
                <label for="">Type</label>
                <input type="text" class="form-control left" id="d_type" required>
            </div>
            <div class="form-group">
                <label for="">Active</label>
                <input type="text" class="form-control left" id="d_active" required>
            </div>
            <div class="form-group">
                <label for="">Address/Block</label>
                <input type="text" class="form-control left" id="d_addr" required>
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="deptAddRecord()">Save</button>
      </div>
    </div>
  </div>
</div>

<!-- Employee Modal -->
<div class="modal fade" id="EmpModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Employee</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form id="emp-form" name="emp">
          <div class="form-group">
                <label for="">Employee Name</label>
                <input type="text" name="empname" class="form-control" id="e_name" required>
            </div>
            <div class="form-group">
                <label for="">Address</label>
                <input type="text" class="form-control" id="e_addr" required>
            </div>
            <div class="form-group">
                <label for="">Mobile</label>
                <input type="text" name="phone" class="form-control" id="e_mobile" required>
            </div>
            <div class="form-group">
                <label for="dept">Department Id</label>
                <select name="dept" id="dept_id" class="form-control" required>
                </select>
            </div>
            <div class="form-group">
                <label for="">Email</label>
                <input type="email" name="email" class="form-control" id="e_email" required>
            </div>
            <div class="form-group">
                <label for="">Date of Birth</label>
                <input type="date" id="e_dob" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="">Date og Joining</label>
                <input type="date" id="e_doj" class="form-control" required>
            </div>
            <div class="form-group">
        <label for="gender">Gender</label> &#8287;&#8287;&#8287;
        Female  <input type="radio" name="gender"  value="female" onclick="gen()">
        &#8287;&#8287;&#8287; Male  <input type="radio" name="gender"  value="male"onclick="gen()">
    </div>
            <div class="form-group">
                <label for="">Active</label>
                <input type="text" class="form-control" id="e_active" required>
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="empAddRecord()">Save</button>
      </div>
    </div>
  </div>
</div>

<!-- Employee view Modal -->
<div class="modal fade" id="empFetchModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">View Employee</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      
      <div id="emp_fetch">
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>  
      </div>
    </div>
  </div>
</div>

<!-- Employee Edite Modal -->
<div class="modal fade" id="empUpdateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">View Employee</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      
      <div id="emp_edite">
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> 
        <button type="button" class="btn btn-primary" onclick="empEdite()">Update</button> 
      </div>
    </div>
  </div>
</div>
<div id="toastmsg"></div>
<div id="toastmsg-err"></div>
<!-- footer -->
<nav class="navbar navbar-light bg-light mt-5">
  <div class="container-fluid">
    <a class="navbar-brand mx-auto" href="#">@Copyright</a>
  </div>
</nav>

<!-- script -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="script.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<!-- -------------------data table----------------------------------------------------------------------------------- -->
<!-- <script type="text/Javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script> -->
<script type="text/Javascript" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script type="text/Javascript" src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap5.min.js"></script>

    <script type="text/Javascript">
        $(document).ready(function() {
            $("#innerFetch").DataTable({
              "searching": false,
              "lengthMenu": [[5, 10, 15, -1], [5, 10, 15, "All"]],
            });
        } );
       </script>
</body>
</html>