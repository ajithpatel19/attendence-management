
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->

  <title>Home - Attendance Management System</title>
  <link rel="stylesheet" href="resources/Bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="resources/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="resources/css/stylesheet.css">
    <script src="resources/Jquery/jquery-3.5.1.js"></script>
    <script src="resources/Bootstrap/js/bootstrap.min.js"></script>
    <script src="resources/js/sweetalert.min.js"></script>
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
        <div class="row pt-4 pb-2 align-items-center">
            <div class="col-md-12 text-center py-3">
            <h2>Jagannath University</h2>
            </div>
        </div>
        <div class="row py-1 align-items-center">
            <div class="col-md-6">
                <img src="uploads/image.jpeg" width="100%">
            </div>
            <div class="col-md-6 text-center">
                <div id="loginSection" class="text-center">
                <br>
                    <h4>Faculty Login</h4>
                    <h4><i class="fa fa-user-circle fa-3x" style="color:#be2edd"></i></h4>
                    <form>
                        <div class="form-row py-1 px-5">
                            <div class="form-group col-md-12">
                            <input type="text" id="uid" class="form-control" placeholder="User ID">
                            </div>
                        </div>
                        <div class="form-row py-1 px-5">
                            <div class="form-group col-md-12">
                            <input id="pass" type="password" class="form-control" placeholder="Password">
                            </div>
                        </div>
                        
                        <div class="form-row py-1 px-5">
                            <div class="form-group col-md-12">
                            <input type="button" style="background-color:#be2edd" onclick="loginFun()" class="form-control btn btn-success" value="Login">
                            <div class="pt-2">Forget password? <a href="routes/forget_pass.php">Click here</a></div>
                            </div>
                        </div>
                        <div class="form-row py-1">
                            <div class="form-group col-md-12">
                                <h5>New registration? <a href="routes/register.php">Click here</a></h5>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="resources/js/login.js"></script>

</body>

</html>