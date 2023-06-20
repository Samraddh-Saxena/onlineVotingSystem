<?php

if(isset($_GET['delete_cid'])){
  mysqli_query($db,"DELETE FROM candidates WHERE cand_id='".$_GET['delete_cid']."'") or die(mysqli_error($db));
?>
<div class="alert alert-danger" role="alert">
 Candidate has been deleted.
</div>
<?php } ?>
<div class="row my-auto">
    <div class="col-4 my-auto">
        <h3>ADD Candidate </h3>
        <form method="POST" enctype="multipart/form-data">
  <div class="form-group" >
   <select class="form-control" name="elec_id" required>
    <option value=""> Select Election </option> 
  <?php
  $allElections=mysqli_query($db,"SELECT * FROM elections") or die(mysqli_error($db));
  if(mysqli_num_rows($allElections)>0){
    while($row=mysqli_fetch_assoc($allElections)){
      $election_id=$row['elec_id'];
      $elec_name=$row['elec_name'];
      $max_cand=$row['no_cand'];

    $cand_added=mysqli_query($db,"SELECT * FROM candidates WHERE elec_id='".$election_id."'") or die(mysqli_error($db));
    $final= mysqli_num_rows($cand_added);
    if($final< $max_cand){
    ?>  <option value="<?php echo $election_id ?>"> <?php echo $elec_name ?> </option> 
    <?php }
    }
  }
  else{
    ?> <option> No Election Exists. Add Election first </option>
    <?php
  }
  ?>
</select>
  </div>
  <div class="form-group">
    <label for="cand_name">Name of Candidate</label>
    <input type="text" class="form-control" name="cand_name" placeholder="Candidate Name" required/>
  </div>
  <div class="form-group">
    <label for="details">Candidate Address</label>
    <input type="text" class="form-control" name="cand_add" placeholder="Address" required/>
  </div>
  <div class="form-group">
    <label for="party">Election Symbol</label>
    <input type="file" class="form-control" name="symbol" required/>
  </div>
  <button type="submit" name="cand_btn" class="btn btn-primary">Submit</button>
</form>

</div>
    <div class="col-8 ">
        <h3>Candidates</h3>
        <table class="table">
  <thead>
    <tr>
      <th scope="col">S.No.</th>
      <th scope="col">Election Symbol</th>
      <th scope="col">Name of Candidates</th>
      <th scope="col">ELection Name</th>
      <th scope="col">Candidate Address</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
<?php
    $bringData= mysqli_query($db,"SELECT * FROM candidates ") or die(mysqli_error($db));
    if(mysqli_num_rows($bringData)>=1){
     $sno=1;

     while($row=mysqli_fetch_assoc($bringData)){
        $election_id=$row['elec_id'];
        $photo=$row['symbol'];
        $candiate_id=$row['cand_id'];
        $elec= mysqli_query($db,"SELECT * FROM elections WHERE elec_id='".$election_id."' ")or die(mysqli_error($db));
        $fetch_elec=mysqli_fetch_assoc($elec);
      ?>
        <tr>
          <td><?php echo $sno++ ?></td>
          <td> <img src="<?php echo $photo ?>" class="imgcan"> </td>
          <td> <?php echo $row['cand_name'] ?> </td>
          <td> <?php echo $fetch_elec['elec_name'] ?> </td>
          <td> <?php echo $row['cand_add'] ?> </td>
          <td> 
            
          <button class="btn btn-small btn-danger" onclick="deleteData(<?php echo $candiate_id ?>)"> Delete </button>
    </td>
     </tr>
      <?php
     }
    }
    else{
      ?>
      <td colspan="7"> No Candidate has been added yet </td>  
      <?php
    }
?>
</tbody>
</table>
</div>
</div>
</div>
<script>
  const deleteData = (cid)=>
  {
    let c=confirm("Do you really want to delete this candidate?");
    if(c==true){
      location.assign("index.php?candidate=1&delete_cid="+cid);
    }
  }
  </script>
<?php
if(isset($_GET['canda'])){
  ?>
  <div class="alert alert-success" role="alert">
 Candidate has been added.
</div>
<?php
}
if(isset($_GET['invalidFile'])){
    ?>
    <div class="alert alert-danger" role="alert">
   Photo format not Supported. Use jpeg,jpg,bitmap or png.
  </div>
  <?php
}
if(isset($_GET['not_uploaded'])){
    ?>
    <div class="alert alert-danger" role="alert">
    Image file not uploaded successfly.
  </div>
  <?php
}
if(isset($_POST['cand_btn'])){
   $elec_id=mysqli_real_escape_string($db,$_POST['elec_id']);
   $cand_name=mysqli_real_escape_string($db,$_POST['cand_name']);
   $cand_add=mysqli_real_escape_string($db,$_POST['cand_add']);

$folder= "../assets/images/cand_photos";
   $symbol= $folder . rand(111111,999999) .$_FILES['symbol']['name'];
   $cand_tmp_name=$_FILES['symbol']['tmp_name'];
   $cand_imgtype=strtolower(pathinfo($symbol, PATHINFO_EXTENSION));
   $alwd= array("png","jpg","jpeg","bitmap");

   if(in_array($cand_imgtype,$alwd)){
     if(move_uploaded_file($cand_tmp_name,$symbol)){
        mysqli_query($db,"INSERT INTO candidates(elec_id,cand_name,cand_add,symbol) VALUES('".$elec_id."','".$cand_name."','".$cand_add."','".$symbol."')") or die(mysqli_error($db));
     }
     else{
?>
    <script> location.assign("index.php?candidate=1&not_uploaded=1") </script>
<?php
     }
   }
   else{
    ?>
<script> location.assign("index.php?candidate=1&invalidFile=1")</script>
<?php
   }
?>
<script> location.assign("index.php?candidate=1&canda=1")</script>
<?php
}
?>
