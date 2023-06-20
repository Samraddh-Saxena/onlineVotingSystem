<?php
require_once("admin/include/config.php");
$elec= mysqli_query($db,"SELECT * FROM elections")or die(mysqli_error($db));
while($data=mysqli_fetch_assoc($elec)){
    $sd=$data['sd'];
    $ed=$data['ed'];
    $id= $data['elec_id'];
    $status=$data['status'];
    $curr_date=date("Y-m-d");

if($status=="Active Now"){
    $date1=date_create($curr_date);
    $date2=date_create($ed);
    $diff=date_diff($date1,$date2);
    
    if((int)$diff->format("%R%a")<0){
      $status="Expired";
      mysqli_query($db,"UPDATE elections SET status='Expired' WHERE elec_id='".$id."'") or die(mysqli_error($db));
    }
}
else if($status=="Upcoming"){
    $date1=date_create($curr_date);
    $date2=date_create($sd);
    $diff=date_diff($date1,$date2);
    
    if((int)$diff->format("%R%a")<=0){
      $status="Active Now";
      mysqli_query($db,"UPDATE elections SET status='Active Now' WHERE elec_id='".$id."'") or die(mysqli_error($db));
    }
} }

?>

<head> <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
</head>
<body>
    
    <?php
    if(isset($_GET['register'])){
    ?>
        <div id="login">
        <h3 class="text-center text-white pt-5">Login form</h3>
 <div class="container">
     <div id="login-row" class="row justify-content-center align-items-center">
         <div id="login-column" class="col-md-6">
             <div id="login-box" class="col-md-12">
                 <form id="login-form" class="form" action="" method="POST">
                     <h3 class="text-center text-info">Register</h3>
                     <div class="form-group">
                         <label for="username" class="text-info">Username:</label><br>
                         <input type="text" name="su_username" id="username" class="form-control" required/>
                     </div>
                     <div class="form-group">
                         <label for="password" class="text-info">Password:</label><br>
                         <input type="text" name="su_password" id="password" class="form-control" required/>
                     </div>
                     <div class="form-group">
                         <label for="email" class="text-info">Email:</label><br>
                         <input type="text" name="email" id="email" class="form-control" required/>
                     </div>
                     <div class="form-group">
                         <label for="address" class="text-info">Address:</label><br>
                         <input type="text" name="address" id="address" class="form-control">
                     </div>
                            <div class="d-flex justify-content-center mt-3 login_container">
                            <button type="submit" name="su_submit" class="btn login_btn">Sign Up</button>
                        </div>
                     <div id="register-link" class="text-right">
                        Already have account? <a href="index.php" class="text-info">Login</a>
                     </div>
                 </form>
             </div>
         </div>
     </div>
 </div>
</div>
    <?php
    }
    else{
    ?>
             <div id="login">
               <h3 class="text-center text-white pt-5">Login form</h3>
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" action="" method="post">
                            <h2 class="text-center text-info">Login</h2>
                            <div class="form-group">
                                <label for="username" class="text-info">Username:</label><br>
                                <input type="text" name="username" id="username" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">Password:</label><br>
                                <input type="text" name="password" id="password" class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="submit" name="lgn_submit" class="btn btn-info btn-md" value="submit">
                            </div>
                            <div id="register-link" class="text-right">
                                <a href="?register=1" class="text-info">Register here</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    }
    ?>
<?php
if(isset($_GET['registered'])){
?>
<span class="bg-yellow text-success text-center"><center>You are Registered!</center></span>
<?php
}
else if(isset($_GET['invalid'])){
?>
    <span class="bg-yellow text-danger text-center"><center>Username Already Exists!</center></span>

<?php
}
else if(isset($_GET['invalid-pass'])){
    ?>
        <span class="bg-yellow text-danger text-centre"><center>Invalid Password</CENTER></span>
       
    <?php
    }
    else if(isset($_GET['not_registered'])){
        ?>
            <span class="bg-white text-warning text-center"><center>User not registered</center></span>
        <?php
        }
    ?> 
            
</body>

<?php
require_once("admin/include/config.php");
if(isset($_POST['su_submit'])){
    $su_username=mysqli_real_escape_string($db,$_POST['su_username']);
    $su_password=mysqli_real_escape_string($db,sha1($_POST['su_password']));
    $email=mysqli_real_escape_string($db,$_POST['email']);
    $address=mysqli_real_escape_string($db,$_POST['address']);

    $check=mysqli_query($db,"SELECT * FROM voters WHERE username = '".$su_username."'");
    
if (mysqli_num_rows($check)>=1){
?>
   <script> location.assign("index.php?register=1&invalid=1")</script>
<?php
}
else{
    mysqli_query($db,"INSERT INTO voters(username,password,email,address) VALUES('".$su_username."','".$su_password."','".$email."','".$address."' )") or die(mysqli_error($db));
?>
 <script> location.assign("index.php?register=1&registered=1")</script>
<?php
}
}
else if(isset($_POST['lgn_submit'])){
$username=mysqli_real_escape_string($db,$_POST['username']);
$password=mysqli_real_escape_string($db,sha1($_POST['password']));

$bringData=mysqli_query($db,"SELECT * FROM voters WHERE username='".$username."'") or die(mysqli_error($db));
if(mysqli_num_rows($bringData)>0){
$data=mysqli_fetch_assoc($bringData);
  if($username==$data['username'] AND $password==$data['password']){
   session_start();
   $_SESSION['username']=$data['username'];
   if($data['username']=='Admin'){
    $_SESSION['key']="adminKey";
?>
<script> location.assign("admin/index.php?homepage=1")</script>
<?php
   }
   else{
    $_SESSION['key']="votersKey";
?>
<script> location.assign("voters/index.php")</script>
<?php
   }
  }
  else{
?>
<script>location.assign("index.php?invalid-pass=1") </script>
<?php
  }
}
else{
?>
<script> location.assign("index.php?register=1&not_registered=1")</script>
<?php
}
}
?>
