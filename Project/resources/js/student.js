getStudents();

function addStudent() {
  var name = $("#name").val();
  var course = $("#course").val();
  var roll = $("#roll").val();
  var semester = $("#semester").val();
  var branch = $("#branch").val();

  if (
    name == "" ||
    course == "" ||
    roll == "" ||
    semester == "" ||
    branch == ""
  ) {
    alert("Fields should be blank!");
  } else {
    $.ajax({
      url: "../api/api.php",
      type: "POST",
      dataType: "json",
      contentType: "application/json",
      data: JSON.stringify({
        call: 3,
        name: name,
        course: course,
        roll: roll,
        semester: semester,
        branch: branch,
      }),
      success: function (data) {
        if (data == 1) {
          swal({
            title: "Student added!",
            text: "New student is added on E-Attendance!",
            icon: "success",
            button: "OK!",
          });

          $("#name").val("");
          $("#course").val("");
          $("#roll").val("");
          $("#semester").val("");
          $("#branch").val("");
          getStudents();
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

function searchStudent() {
  var course = $("#course1").val();
  var semester = $("#semester1").val();
  var branch = $("#branch1").val();

  if (course == "" || semester == "" || branch == "") {
    alert("Fields should be blank!");
  } else {
    $.ajax({
      url: "../api/api.php",
      type: "POST",
      dataType: "json",
      contentType: "application/json",
      data: JSON.stringify({
        call: 6,
        course: course,
        semester: semester,
        branch: branch,
      }),
      success: function (data) {
        if (data.length > 0) {
          var sr = 1;
          var students = "";

          $.each(data, function (i, d) {
            students +=
              "<tr>" +
              '<th scope="row">' +
              sr +
              "</th>" +
              '<td colspan="2">' +
              d.name +
              "</td>" +
              '<td scope="col">' +
              d.roll_no +
              "</td>" +
              '<td scope="col">' +
              d.course +
              "</td>" +
              '<td scope="col">' +
              d.semester +
              "</td>" +
              '<td scope="col">' +
              d.branch +
              "</td>" +
              "</tr>";
            sr++;
          });

          $("#studentList").html(
            '<div class="table-responsive-md" style="background-color:white">' +
              '<table class="table table-bordered">' +
              "<thead>" +
              "<tr>" +
              '<th scope="col">Sr.no.</th>' +
              '<th colspan="2">Name</th>' +
              '<th scope="col">Roll No</th>' +
              '<th scope="col">Course</th>' +
              '<th scope="col">Semester</th>' +
              '<th scope="col">Branch</th>' +
              "</tr>" +
              "</thead>" +
              "<tbody>" +
              students +
              "</tbody>" +
              "</table></div>"
          );
        } else {
          $("#studentList").html("<p><b>No matching records found!</b>");
        }
      },
    });
  }
}

function getStudents() {
  $.ajax({
    url: "../api/api.php",
    type: "POST",
    dataType: "json",
    contentType: "application/json",
    data: JSON.stringify({
      call: 4,
    }),
    success: function (data) {
      console.log(data);
      var studentsData = data[0];
      var day = parseInt(data[1][0]);
      var month = parseInt(data[1][1]);
      var year = parseInt(data[1][2]);
      var todayDate = data[2];
      var sr = 1;
      var students = "";
      var present = 1;
      var absent = 0;
      var status = '';

      $.each(studentsData, function (i, d) {

        if((d.date==null) || (todayDate!=d.date && d.status!=0)){
          status = '<button class="btn btn-sm btn-success" onclick="conFirm(\''+d.id+'\',\''+1+'\')" type="button"><b>P</b></button> &nbsp <button class="btn btn-sm btn-danger" onclick="conFirm(\''+d.id+'\',\''+0+'\')" type="button"><b>A</b></button>';
          students +=
              "<tr>" +
              '<th scope="row">' +
              sr +
              "</th>" +
              '<td colspan="2">' +
              d.name +
              "</td>" +
              '<td scope="col">' +
              d.roll_no +
              "</td>" +
              '<td scope="col">' +
              d.course +
              "</td>" +
              '<td scope="col">' +
              d.semester +
              "</td>" +
              '<td scope="col">' +
              d.branch +
              "</td>" +
              '<td scope="col">' +
              status +
              "</td>" +
              "</tr>";
            sr++;
        }
        else if(day==d.day && month==d.month && year==d.year && d.record==1){
          status = '<span class="badge badge-success badge-pill px-3 py-2">Present</span>';
          students +=
              "<tr>" +
              '<th scope="row">' +
              sr +
              "</th>" +
              '<td colspan="2">' +
              d.name +
              "</td>" +
              '<td scope="col">' +
              d.roll_no +
              "</td>" +
              '<td scope="col">' +
              d.course +
              "</td>" +
              '<td scope="col">' +
              d.semester +
              "</td>" +
              '<td scope="col">' +
              d.branch +
              "</td>" +
              '<td scope="col">' +
              status +
              "</td>" +
              "</tr>";
            sr++;
        }
        else if(day==d.day && month==d.month && year==d.year && d.record==0){
          status = '<span class="badge badge-danger badge-pill px-3 py-2" type="button"><b>Absent</b></span>';
          students +=
              "<tr>" +
              '<th scope="row">' +
              sr +
              "</th>" +
              '<td colspan="2">' +
              d.name +
              "</td>" +
              '<td scope="col">' +
              d.roll_no +
              "</td>" +
              '<td scope="col">' +
              d.course +
              "</td>" +
              '<td scope="col">' +
              d.semester +
              "</td>" +
              '<td scope="col">' +
              d.branch +
              "</td>" +
              '<td scope="col">' +
              status +
              "</td>" +
              "</tr>";
            sr++;
        }
        else{
          return null;
        }

        
      });

      $("#studentList").html(
        '<div class="table-responsive-md" style="background-color:white">' +
          '<table class="table table-bordered">' +
          "<thead>" +
          "<tr>" +
          '<th scope="col">Sr.no.</th>' +
          '<th colspan="2">Name</th>' +
          '<th scope="col">Roll No</th>' +
          '<th scope="col">Course</th>' +
          '<th scope="col">Semester</th>' +
          '<th scope="col">Branch</th>' +
          '<th scope="col">Attendance</th>' +
          "</tr>" +
          "</thead>" +
          "<tbody>" +
          students +
          "</tbody>" +
          "</table></div>"
      );
    },
  });
}

// function checking(id){
//   var status = '';
//   $.ajax({
//     url: "../api/api.php",
//     type: "POST",
//     dataType: "json",
//     contentType: "application/json",
//     data: JSON.stringify({
//       call: 12,
//       sid : id
//     }),
//     success: function (data) {
//       if (data==1) {
//         console.log(status);
//         return status;
//       }
//       else if(data==0){
//         console.log(status);
//         return status;
//       }
//       else if(data==2){
//         console.log(status);
//         return status;
//       }
//     }
//   });
// }


function conFirm(id, record){
  var sid = id;
  var record = record;
  swal({
      title: 'Are you sure?',
      text: "Confirm once before marking attendance!",
      icon: "warning",
      buttons: ['Cancel', 'Confirm'],
      dangerMode: true,
      })
      .then((ok) => {
      if (ok) {
          addAttendance(sid, record);
      } else {
          swal("Think again!");
      }
  });
}


function addAttendance(sid, record) {
  var sid = sid;
  var record = record;
    
  $.ajax({
      url: "../api/api.php",
      type: "POST",
      dataType: "json",
      contentType: "application/json",
      data: JSON.stringify({
        call: 8,
        sid :sid,
        record : record
      }),
      success: function (data) {
        if (data == 1) {
          getStudents();
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