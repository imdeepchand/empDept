//------------------------gender value-----------------------------------------------------------------------------
function gen(){
    const radioGens = document.querySelectorAll('input[name="gender"]');
    let genValue;
    for(const rg of radioGens){
        if (rg.checked){
            genValue = rg.value;
            break;
        }
    }
    // alert(genValue);
    return genValue;
}   

//--------------------fetch dept id for employee------------------------------------------------------------


$(document).ready(fetchDeptData());
function fetchDeptData(){
  $.ajax({
    url: "selectDept.php",
    type: "POST",

    success:function(data){
      // $("#deptData").html(data);
      $("#dept_id").html(data);
    }
  })
}

//-----------------innerjoin demp tand employee table ------------------------------------------------------------


$(document).ready(empDeptfetch());
function empDeptfetch(){
  $.ajax({
    url: "innerjoin.php",
    type: "POST",

    success:function(data){
      // $("#deptData").html(data);
      $("#empData").html(data);
    }
  })
}

//--------------------add department record------------------------------------------------------------

function deptAddRecord()
{   
    var dept_name = $('#d_name').val();
    var type = $('#d_type').val();
    var active = $('#d_active').val();
    var address = $('#d_addr').val();
  if(dept_name !== '' && type !== '' && active !== '' && address !== ''){
    $.ajax({
        url: 'backend.php',
        type: 'POST',
        data: { 
            dept_name : dept_name,
            type: type,
            active: active,
            address: address
        },

        success:function(data){
          console.log(data);
          $("#dept-form").trigger("reset");
          $("#DeptModal").modal("hide");
          fetchDeptData();
          $("#toastmsg-err").html("Successfully saved !");
          myFunction();
          // alert("Successfully saved !");
        }
    });
  } else {
    $("#DeptModal").modal("hide");
    $("#toastmsg-err").html("all Field are requiered !");
    myErrFunction();
      // alert("all Field are requiered!")
    }
}

//----------------Employee data------------------------------------------------------------------------------------

function empAddRecord()
{
    var emp_name = $("#e_name").val();
    var address = $("#e_addr").val();
    var mobile = $("#e_mobile").val();
    var dept_id = $("#dept_id").val();
    var email = $("#e_email").val();
    var dob = $("#e_dob").val();
    var doj = $("#e_doj").val();
    var gender = gen();
    var active = $("#e_active").val();
    if(emp_name !== '' && address !== '' && mobile !== '' && email !== '' && email !== '' && dob !== '' && doj !== '' && gender !== '' && active !== '') {
      var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
      if(filter.test(email)){
            $.ajax({
              url: "backendEmp.php",
              type: "POST",
              data: {
                  emp_name: emp_name,
                  address : address,
                  mobile: mobile,
                  dept_id: dept_id,
                  email: email,
                  dob: dob,
                  doj: doj,
                  gender: gender,
                  active: active,
              },

              success:function(){
                  empDeptfetch();
                  $("#emp-form").trigger("reset");
                  $("#EmpModal").modal("hide");
                  $("#toastmsg").html("Successfully saved !")
                  myFunction();
                  // alert("Successfully saved !");
              }
          }); } else {
            alert("enter valide  email");  
          }

         } else {
      $("#toastmsg-err").html("All Field are requiered !");
      $("#EmpModal").modal("hide");
      myErrFunction();
      // alert("all Field are requiered!")
    }
}

//--------------------fetch for display employee record------------------------------------------------------------

function viewResouce(data) {
    var mobile = data;
    $.ajax({
      url: "empFetch.php",
      type: "POST",
      data: {
        mobile: mobile,
      },

      success:function(data){
      $("#emp_fetch").html(data);
    }
    })
}

//--------------------fetch for edite employee record------------------------------------------------------------

function editResouce(data) {
    var mobile = data;
    $.ajax({
      url: "empFetch.php",
      type: "POST",
      data: {
        mobile: mobile,
      },

      success:function(data){
      $("#emp_edite").html(data);
    }
    })
  }

//--------------------edite/update employee record------------------------------------------------------------

function empEdite() {
    var mobile = $("#up_mobile").val();
    var emp_name = $("#up_name").val();
    var address = $("#up_addr").val();
    var dept_id = $("#up_deptId").val();
    var email = $("#up_email").val();
    var dob = $("#up_dob").val();
    var doj = $("#up_doj").val();
    var gender = document.getElementById("up-gen").value;
    var active = $("#up_active").val();
  
    $.ajax({
      url: "empUpdate.php",
      type: "POST",
      data: {
        emp_name: emp_name,
        address: address,
        mobile: mobile,
        dept_id: dept_id,
        email: email,
        dob: dob,
        doj: doj,
        gender: gender,
        active: active,
      },

      success:function(){
        empDeptfetch();
        $("#empUpdateModal").modal("hide");
        $("#toastmsg").html("Edite successfull !");
        myFunction();
      // alert("Edite Successfully !")
    }
    });  
}

//--------------------Delete employee record------------------------------------------------------------

function deleteResouce(data) {
  var mobile = data;
  var del = confirm("you want to delete this record");

  if(del === true){
        $.ajax({
        url: "empDelete.php",
        type: "POST",
        data: {
                mobile: mobile,
        },

        success:function(){
            empDeptfetch();
            $("#toastmsg").html("Delete successfull !");
            myFunction();
        // alert("Delete successfull !");
        }
        });
    } else {
      $("#toastmsg-err").html("Delete unsuccessfull !");
      myErrFunction();
        // alert("Delete unsuccessfull !");
    }
}

//--------------------popup notification------------------------------------------------------------

function myFunction() {
  var x = document.getElementById("toastmsg");
  x.className = "show";
  setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
}

function myErrFunction() {
  var x = document.getElementById("toastmsg-err");
  x.className = "show";
  setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
}