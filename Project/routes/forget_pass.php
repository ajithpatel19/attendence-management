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

  <title>Forget Reset - Attendance Management System</title>
  <link rel="stylesheet" href="../resources/Bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="../resources/Jquery/jquery-ui.css">
    <link rel="stylesheet" href="../resources/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../resources/css/stylesheet.css">
    <script src="../resources/Jquery/jquery-3.5.1.js"></script>
    <script src="../resources/Bootstrap/js/bootstrap.min.js"></script>
    <script src="../resources/Jquery/jquery-ui.js"></script>
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
        <div class="row py-4">
            <div class="col-md-2"></div>
            <div class="col-md-8 text-center">
                <h3 id="groups">Forget Password</h3><br>
                <div id="loginSection" class="text-center p-5">
                    <form>
                        <div class="form-row py-1">
                            <div class="form-group col-md-12">
                                <input type="text" id="uid" class="form-control" placeholder="Enter User ID">
                            </div>
                        </div>
                        <div class="form-row py-1">
                            <div class="form-group col-md-12">
                                <input type="text" id="dob" class="form-control" placeholder="Enter Birth Date">
                            </div>
                        </div>
                        <div class="form-row py-1">
                            <div class="form-group col-md-12">
                                <input type="password" id="pass" class="form-control" placeholder="New password">
                            </div>
                        </div>
                        <div class="form-row py-1">
                            <div class="form-group col-md-12 px-4">
                            <input type="button" id="changePass" style="background-color:#be2edd"  class="form-control btn btn-success" value="Change">
                            </div>
                        </div>
                        <div class="form-row py-1">
                            <div class="form-group col-md-12 px-5">
                            <a href="../" class="form-control btn btn-primary">Back</a>   
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>
</div>

<script src="../resources/js/forgetpass.js"></script>

</body>

</html>