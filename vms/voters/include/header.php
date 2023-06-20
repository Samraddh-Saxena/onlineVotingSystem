<?php
 session_start();
 require_once("../admin/include/config.php");

 if($_SESSION['key']!="votersKey"){
?> "<script>location.assign("logout.php")</script>";
<?php
    die;
 }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voter Dashboard</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    
<div class="container-fluid">
    <div class="row bg-dark text-white">
        <div class="col-11 my-auto">
            <h2><center>Voting Management System</center></h2>
        </div>     
    
    </div>
</div>
