<?php
    session_start();
?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <title>Registration - Attendance Management System</title>
  <link rel="stylesheet" href="../resources/Bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../resources/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../resources/css/stylesheet.css">
    <link rel="stylesheet" href="../resources/Jquery/jquery-ui.css">
    <script src="../resources/Jquery/jquery-3.5.1.js"></script>
    <script src="../resources/Jquery/jquery-ui.js"></script>
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
        <div class="row align-items-center pt-5 text-center">
            <div class="col-md-12"><h3>Faculty Registration</h3></div>
        </div>
        <div class="row py-4">
            <div class="col-md-12">
                <div id="regSection" class="text-center">
                    <form id="regForm" enctype="multipart/form-data">
                        <div class="form-row">
                            <div class="form-group col-md-2 m-0 p-0"></div>
                            <div class="form-group col-md-8">
                            <input id ="fname" type="text" class="form-control" placeholder="Full name">
                            </div>
                            <div class="form-group col-md-2 m-0 p-0"></div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-2 m-0 p-0"></div>
                            <div class="form-group col-md-4">
                            <input id ="mobile" type="number" class="form-control" placeholder="Mobile">
                            </div>
                            <div class="form-group col-md-4">
                            <input id ="dob" type="text" class="form-control" placeholder="Birth Date">
                            </div>
                            <div class="form-group col-md-2 m-0 p-0"></div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-2 m-0 p-0"></div>
                            <div class="form-group col-md-4">
                            <input id ="quali" type="text" class="form-control" placeholder="Qualification">
                            </div>
                            <div class="form-group col-md-4">
                            <input id ="uname" name="mobile" type="text" class="form-control" placeholder="Username">
                            </div>
                            <div class="form-group col-md-2 m-0 p-0"></div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-2 m-0 p-0"></div>
                            <div class="form-group col-md-4">
                            <input id ="uid" type="password" class="form-control" placeholder="User ID">
                            </div>
                            <div class="form-group col-md-4">
                            <input id ="pass" type="password" class="form-control" placeholder="Password">
                            </div>
                            <div class="form-group col-md-2 m-0 p-0"></div>
                        </div>
                        <div class="form-row py-1">
                            <div class="form-group col-md-3"></div>
                            <div class="form-group col-md-6">
                            <input onclick="regFun()" type="button" style="background-color:#be2edd" class="form-control btn btn-success" id="register" value="Register">
                            </div>
                            <div class="form-group col-md-3"></div>
                        </div>
                    </form>
                    <a href="../"><button type="button" class="btn btn-primary">Back</button></a>

                </div>
            </div>
        </div>
    </div>
</div>

<script src="../resources/js/register.js"></script>

</body>

</html>