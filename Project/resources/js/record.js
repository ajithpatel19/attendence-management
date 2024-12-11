
getStudents();

function getStudents() {
  $.ajax({
    url: "../api/api.php",
    type: "POST",
    dataType: "json",
    contentType: "application/json",
    data: JSON.stringify({
      call: 12,
    }),
    success: function (data) {
      var studentsData = data;
      var sr = 1;
      var students = "";
      var record = '';
      var sid = '';
      var studentList = '';
      var status = '';

      $.each(studentsData, function (i, d) {
        console.log(studentsData);
        status = (d.record==1) ? '<span class="badge badge-success badge-pill px-3 py-2">Present</span>' : '<span class="badge badge-danger badge-pill px-3 py-2"><b>Absent</b></span>';

        if(record==''){
          students =
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
          d.date +
          "</td>" +
          '<td scope="col">' +
          status +
          "</td>" +
          "</tr>";

          studentList += '<h5 class="pb-2">Attendance date: '+d.date+'</h5><div class="table-responsive-md" style="background-color:white">' +
          '<table class="table table-bordered">' +
          "<thead>" +
          "<tr>" +
          '<th scope="col">Sr.no.</th>' +
          '<th colspan="2">Name</th>' +
          '<th scope="col">Roll No</th>' +
          '<th scope="col">Course</th>' +
          '<th scope="col">Semester</th>' +
          '<th scope="col">Branch</th>' +
          '<th scope="col">Date</th>' +
          '<th scope="col">Status</th>' +
          "</tr>" +
          "</thead>" +
          "<tbody>" +
          students;
          record = d.date;
          sr++;
        }
        else if(record==d.date){

          students =
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
          d.date +
          "</td>" +
          '<td scope="col">' +
          status +
          "</td>" +
          "</tr>";
          studentList+=students;
          record = d.date;
          sr++;

        }
        else if(record!=d.date){
          sr = 1;
          students =
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
          d.date +
          "</td>" +
          '<td scope="col">' +
          status +
          "</td>" +
          "</tr>";

          studentList+="</tbody>"+
          '</table></div><br><h5 class="pb-2">Attendance date: '+d.date+'</h5><div class="table-responsive-md" style="background-color:white">' +
          '<table class="table table-bordered">' +
          "<thead>" +
          "<tr>" +
          '<th scope="col">Sr.no.</th>' +
          '<th colspan="2">Name</th>' +
          '<th scope="col">Roll No</th>' +
          '<th scope="col">Course</th>' +
          '<th scope="col">Semester</th>' +
          '<th scope="col">Branch</th>' +
          '<th scope="col">Date</th>' +
          '<th scope="col">Status</th>' +
          "</tr>" +
          "</thead>" +
          "<tbody>" +
          students;
          record = d.date;
          sr++;
        }
      });

      $("#studentList").html(studentList);
    },
  });
}
