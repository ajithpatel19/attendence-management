$(document).ready(function () {
  $("#dob").datepicker({
    maxDate: 0,
    changeMonth: true,
    changeYear: true,
    yearRange: "1950:2020",
  });

  $("#changePass").click(function () {
    var uid = $("#uid").val();
    var dob = $("#dob").val();
    var pass = $("#pass").val();

    if (uid == "" || dob == "" || pass == "") {
      alert("Fields cannot be left blank!");
    } else {
      $.ajax({
        url: "../api/api.php",
        type: "POST",
        dataType: "json",
        contentType: "application/json",
        data: JSON.stringify({
          call: 5,
          uid: uid,
          dob: dob,
          pass: pass,
        }),
        success: function (data) {
          if (data == 1) {
            swal({
              title: "Password changed!",
              text: "New password is set!",
              icon: "success",
              button: "OK!",
            }).then((vote) => {
              window.location = "../";
            });
          } else {
            swal({
              title: "Invalid Credentials!",
              text: "Invalid! user id / date of birth",
              icon: "error",
              button: "OK!",
            });
          }
        },
      });
    }
  });
});
