<?php
    session_start();
    if(!isset($_SESSION['uid'])){
        header('location:logout.php');
    }
?>


<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->

  <title>Dashboard - Attendance Management System</title>
  <link rel="stylesheet" href="../resources/Bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../resources/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../resources/css/stylesheet.css">
    <script src="../resources/Jquery/jquery-3.5.1.js"></script>
    <script src="../resources/Bootstrap/js/bootstrap.min.js"></script>
    <script src="../resources/js/sweetalert.min.js"></script>
    </head>

<body>

<div id="headerSection" class="sticky-top">
    <div class="container" >
        <div class="row">
            <div class="col-sm-12 text-center pt-3">
                <p id="brand">Attendance Management System</p>
            </div>
        </div>
    </div>
</div>

<div id="bodySection">
    <div class="container">
        <div class="row align-items-center py-3">
            <div class="col-md-10 text-center">
                <h3>Welcome <?php echo $_SESSION['faculty']?>!</h3>
            </div>
            <div class="col-md-2 text-center">
                <a href="logout.php"><button class="btn btn-sm btn-primary">Logout <i class="fa fa-user-circle"></i></button></a>
            </div>
        </div>
        <hr>
        
        <div class="row py-1">
            <div class="col-md-12 text-center">
                <form>
                    <div class="form-row">
                        <div class="form-group text-center col-md-8">
                        <h4>Add new student</h4>
                        </div>
                        <div class="form-group text-center col-md-4">
                        <a href="record.php"><button type="button" class="btn btn-sm btn-success">Check record <i class="fa fa-book"></i></button></a>
                        </div>
                    </div>
                </form>
                <form>
                    <div class="form-row pt-3">
                        <div class="form-group col-md-8">
                            <input class="form-control" type="text" placeholder="Student Name" id="name">
                        </div>
                        <div class="form-group col-md-4">
                            <input class="form-control" type="text" placeholder="Student Roll No" id="roll">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <select class="form-control" id="course">
                                <option value="">Course</option>
                                <option value="Diploma">Diploma</option>
                                <option value="B.E.">B.E.</option>
                                <option value="B.Tech">B.Tech</option>
                                <option value="BCA">BCA</option>
                                <option value="BPT">BPT</option>
                                <option value="MCA">MCA</option>
                                <option value="M.Tech">M.Tech</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <select class="form-control" id="semester">
                                <option value="">Semester</option>
                                <option value="I">I</option>
                                <option value="II">II</option>
                                <option value="III">III</option>
                                <option value="IV">IV</option>
                                <option value="V">V</option>
                                <option value="VI">VI</option>
                                <option value="VII">VII</option>
                                <option value="VIII">VIII</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <select class="form-control" id="branch">
                                <option value="">Branch</option>
                                <option value="Mechanical">Mechanical</option>
                                <option value="Electrical">Electrical</option>
                                <option value="Civil">Civil</option>
                                <option value="CSE">CSE</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4 p-0 m-0"></div>
                        <div class="form-group col-md-4">
                            <button class="btn btn-success form-control" style="background-color:#be2edd" type="button" onclick="addStudent()">Add student</button>
                        </div>
                        <div class="form-group col-md-4 p-0 m-0"></div>
                    </div>
                </form>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-12 text-center">
                <h4>Mark Attendance <?php echo date('d-m-Y') ?> </h4>
                <div class="py-3" id="studentList"></div>
            </div>
        </div>
    </div>
</div>

<script src="../resources/js/student.js">
</script>

</body>

</html>