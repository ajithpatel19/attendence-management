<?php

session_start();
include('connect.php');
$json = json_decode(file_get_contents("php://input"),true);

// Faculty registration
if($json['call']==1){

    $fname = $json['fname'];
    $uname = $json['uname'];
    $uid = $json['uid'];
    $mobile = $json['mobile'];
    $dob = $json['dob'];
    $quali = $json['quali'];
    $pass = md5($json['pass']);
    $date = date('d-m-Y');

    $check = mysqli_query($con, "select * from faculty where mobile='$mobile'");

    if(mysqli_num_rows($check)>0){
        echo json_encode($response['success']=2);
    }
    else{
        $query = mysqli_query($con, "insert into faculty (name, mobile, dob, qualification, username, uid, password, created_at) values('$fname','$mobile','$dob','$quali', '$uname', '$uid', '$pass', '$date')");
        if($query){
            echo json_encode($response['success']=1);
        }
        else{
            echo json_encode($response['success']=0);
        }
    }
}


// Faculty login
if($json['call']==2){
    $uid = $json['uid'];
    $pass = md5($json['pass']);

    $check = mysqli_query($con, "select * from faculty where uid='$uid' and password='$pass'");
    if(mysqli_num_rows($check)>0){
        $_SESSION['uid']=$uid;
        $fetch = mysqli_fetch_array($check);
        $_SESSION['faculty'] = $fetch['username'];
        echo json_encode($response['success']=1);
    }
    else{
        echo json_encode($response['success']=0);
    }
    
}


// Add student
if($json['call']==3){

    $name = $json['name'];
    $course = $json['course'];
    $roll = $json['roll'];
    $semester = $json['semester'];
    $branch = $json['branch'];
    $date = date('d-m-Y');

    $query = mysqli_query($con, "insert into student (name, roll_no, course, semester, branch, created_at) values('$name','$roll','$course','$semester', '$branch', '$date')");
    if($query){
        echo json_encode($response['success']=1);
    }
    else{
        echo json_encode($response['success']=0);
    }
}


// Get students
if($json['call']==4){
    $day = date('d');
    $month = date('m');
    $year = date('Y');
    $date = [$day, $month, $year];
    $todayDate = date('d-m-Y');
    $getStudents = mysqli_query($con, "select student.id, student.name, student.roll_no, student.course, student.semester, student.branch, student.created_at, record.sid, record.status, record.record, record.day, record.month, record.year, record.date from student LEFT JOIN record ON student.id = record.sid ORDER BY student.id ASC");
    if(mysqli_num_rows($getStudents)>0){
        $students = mysqli_fetch_all($getStudents, MYSQLI_ASSOC);
        $empty = mysqli_free_result($getStudents);
        echo json_encode([$students, $date, $todayDate]);
    }
    else{
        echo json_encode($response['success']=0);
    }
}

// Forget password
if($json['call']==5){
    $uid = $json['uid'];
    $dob = $json['dob'];
    $pass = md5($json['pass']);
    $check = mysqli_query($con, "select * from faculty where uid='$uid' and dob='$dob'");

    if(mysqli_num_rows($check)>0){
        $update = mysqli_query($con, "update faculty set password='$pass' where uid='$uid' and dob='$dob'");
        if($update){
            echo json_encode($response['success']=1);
        }
        else{
            echo json_encode($response['success']=0);
        }
    }
    else{
        echo json_encode($response['success']=0);
    }  
}


// Search student
if($json['call']==6){

    $course = $json['course'];
    $semester = $json['semester'];
    $branch = $json['branch'];

    $getStudents = mysqli_query($con, "select * from student where course='$course' and semester='$semester' and branch='$branch'");
    if(mysqli_num_rows($getStudents)>0){
        $students = mysqli_fetch_all($getStudents, MYSQLI_ASSOC);
        $empty = mysqli_free_result($getStudents);
        echo json_encode($students);
    }
    else{
        echo json_encode($response['success']=0);
    }
}


// Populate students data
if($json['call']==7){

    $getStudents = mysqli_query($con, "select * from student");
    if(mysqli_num_rows($getStudents)>0){
        $students = mysqli_fetch_all($getStudents, MYSQLI_ASSOC);
        $empty = mysqli_free_result($getStudents);
        echo json_encode($students);
    }
    else{
        echo json_encode($response['success']=0);
    }
}


// Add record
if($json['call']==8){

    $sid = $json['sid'];
    $record = $json['record'];
    $day = date('d');
    $month = date('m');
    $year = date('Y');
    $date = date('d-m-Y');

    $changeStatus = mysqli_query($con,"update record set status=0 where sid=$sid");
    if($changeStatus){
        $query = mysqli_query($con, "insert into record (sid, status, record, date, day, month, year) values('$sid', 1 , '$record', '$date', '$day', '$month', '$year')");
        if($query){
            echo json_encode($response['success']=1);
        }
        else{
            echo json_encode($response['success']=0);
        }
    }
    
}


// Get records
if($json['call']==9){
    $getRecords = mysqli_query($con, "select student.name, student.course, student.branch, student.semester, record.subject_name, record.sid, record.id, record.subject_code, record.ese, record.ct, record.ta from student LEFT JOIN record ON student.id=record.sid WHERE student.id=record.sid ");
    if(mysqli_num_rows($getRecords)>0){
        $records = mysqli_fetch_all($getRecords, MYSQLI_ASSOC);
        $empty = mysqli_free_result($getRecords);
        echo json_encode($records);
    }
    else{
        echo json_encode($response['success']=0);
    }
}


// Edit record
if($json['call']==10){

    $sid = $json['sid'];
    $id = $json['id'];
    $getRecord = mysqli_query($con, "select ese, id, sid, ct, ta from record WHERE sid='$sid' and id='$id' ");
    if(mysqli_num_rows($getRecord)>0){
        $record = mysqli_fetch_array($getRecord, MYSQLI_ASSOC);
        $empty = mysqli_free_result($getRecord);
        echo json_encode($record);
    }
    else{
        echo json_encode($response['success']=0);
    }
}


// Save record
if($json['call']==11){

    $sid = $json['sid'];
    $id = $json['id'];
    $new_ese = $json['new_ese'];
    $new_ct = $json['new_ct'];
    $new_ta = $json['new_ta'];

    $update = mysqli_query($con, "update record set ese='$new_ese', ct='$new_ct', ta='$new_ta' where sid='$sid' and id='$id'");
    if($update){
        echo json_encode($response['success']=1);
    }
    else{
        echo json_encode($response['success']=0);
    }
}

if($json['call']==12){

    $query = mysqli_query($con, "select student.id, student.name, student.roll_no, student.course, student.semester, student.branch, student.created_at, record.sid, record.status, record.date, record.record from student LEFT JOIN record ON student.id = record.sid WHERE student.id = record.sid ORDER BY record.id DESC");
    if(mysqli_num_rows($query)>0){
        $records = mysqli_fetch_all($query, MYSQLI_ASSOC);
        $empty = mysqli_free_result($query);
        echo json_encode($records);
    }
    else{
        echo json_encode(0);
    }

   
}
?>