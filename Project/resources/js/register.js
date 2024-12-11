$(document).ready(function () {
  $("#dob").datepicker({
    maxDate: 0,
    changeMonth: true,
    changeYear: true,
    yearRange: "1950:2020",
  });
});

function regFun() {
  var fname = $("#fname").val();
  var uname = $("#uname").val();
  var uid = $("#uid").val();
  var quali = $("#quali").val();
  var pass = $("#pass").val();
  var dob = $("#dob").val();
  var mobile = $("#mobile").val();

  if (
    fname == "" ||
    uname == "" ||
    uid == "" ||
    quali == "" ||
    pass == "" ||
    dob == "" ||
    mobile == ""
  ) {
    alert("Fields should be blank!");
  } else {
    $.ajax({
      url: "../api/api.php",
      type: "POST",
      dataType: "json",
      contentType: "application/json",
      data: JSON.stringify({
        call: 1,
        fname: fname,
        uname: uname,
        uid: uid,
        quali: quali,
        pass: pass,
        dob: dob,
        mobile: mobile,
      }),
      success: function (data) {
        if (data == 1) {
          swal({
            title: "Registration successfull!",
            text: "Welcome to Online Attendance Management System!",
            icon: "success",
            button: "OK!",
          }).then((value) => {
            window.location = "../";
          });
        } else if (data == 2) {
          swal({
            title: "User already exists!",
            text: "Mobile number is already taken. Try another!",
            icon: "warning",
            button: "OK!",
          });
        } else {
          swal({
            title: "Error!",
            text: "Some error occured!",
            icon: "error",
            button: "OK!",
          });
        }
      },
    });
  }
}

// function getData(){
//     $.ajax({
//         url : '../api/api.php',
//         type : 'POST',
//         dataType : 'json',
//         contentType : 'application/json',
//         data : JSON.stringify({
//             call : 14
//         }),
//         success : function(data){
//             $("#getData").html('<img height="50" width="50" src="../uploads/'+data.logo+'">');
//         }

//     });
// }
