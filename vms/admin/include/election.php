<?php

if(isset($_GET['delete_id'])){
  mysqli_query($db,"DELETE FROM elections WHERE elec_id='".$_GET['delete_id']."'") or die(mysqli_error($db));
  mysqli_query($db,"DELETE FROM candidates WHERE elec_id='".$_GET['delete_id']."'") or die(mysqli_error($db));
?>
<div class="alert alert-danger" role="alert">
 Election has been deleted.
</div>
<?php } ?>

<div class="row my-auto">
    <div class="col-4 my-auto">
        <h3>ADD Election </h3>
        <form method="POST">
  <div class="form-group" >
    <label for="elec_name">Election Name</label>
    <input type="text" class="form-control" name="elec_name" placeholder="Enter Name" required/>
  </div>
  <div class="form-group">
    <label for="cand_no">Number of Candidates</label>
    <input type="number" class="form-control" name="cand_no" placeholder="no. of candidates" required/>
  </div>
  <div class="form-group">
    <label for="sd">Start Date</label>
    <input type="date" class="form-control" name="sd" required/>
  </div>
  <div class="form-group">
    <label for="ed">End Date</label>
    <input type="date" class="form-control" name="ed" required/>
  </div>
  <button type="submit" name="elec_btn" class="btn btn-primary">Submit</button>
</form>

</div>
    <div class="col-8 ">
        <h3>Elections</h3>
        <table class="table">
  <thead>
    <tr>
      <th scope="col">S.No.</th>
      <th scope="col">Election Name</th>
      <th scope="col">No. of Candidates</th>
      <th scope="col">Starting Date</th>
      <th scope="col">Ending Date</th>
      <th scope="col">Action</th>
      <th scope="col">Status</th>
    </tr>
  </thead>
  <tbody>
<?php
    $bringData= mysqli_query($db,"SELECT * FROM elections ") or die(mysqli_error($db));
    if(mysqli_num_rows($bringData)>=1){
     $sno=1;

     while($row=mysqli_fetch_assoc($bringData)){
      $election_id=$row['elec_id'];
      ?>
        <tr>
          <td><?php echo $sno++ ?></td>
          <td> <?php echo $row['elec_name'] ?> </td>
          <td> <?php echo $row['no_cand'] ?> </td>
          <td> <?php echo $row['sd'] ?> </td>
          <td> <?php echo $row['ed'] ?> </td>
          <td> 
            <button class="btn btn-small btn-danger" onclick="deleteData(<?php echo $election_id ?>)"> Delete </button>
    </td>
    <td> <?php echo $row['status'] ?> </td>
     </tr>
      <?php
     }
    }
    else{
      ?>
      <td colspan="7"> No election has been added yet </td>  
      <?php
    }
?>
</tbody>
</table>
</div>
</div>
</div>
<script>
  const deleteData = (eid)=>
  {
    let c=confirm("Do you really want to delete this election?");
    if(c==true){
      location.assign("index.php?election=1&delete_id="+eid);
    }
  }
  </script>

<?php
if(isset($_GET['eleca'])){
  ?>
  <div class="alert alert-success" role="alert">
 Election has been added.
</div>
<?php
}
if(isset($_POST['elec_btn'])){
   $elec_name=mysqli_real_escape_string($db,$_POST['elec_name']);
   $cand_no=mysqli_real_escape_string($db,$_POST['cand_no']);
   $sd=mysqli_real_escape_string($db,$_POST['sd']);
   $ed=mysqli_real_escape_string($db,$_POST['ed']);
   $current_date=date("Y-m-d");

  
$date1=date_create($sd);
$date2=date_create($current_date);
$diff=date_diff($date2,$date1);

if($diff->format("%R%a")>0){
  $status="Upcoming";
}
else{
  $status="Active Now";
}

mysqli_query($db,"INSERT INTO elections(elec_name,no_cand,sd,ed,status) VALUES('".$elec_name."','".$cand_no."','".$sd."','".$ed."','".$status."')") or die(mysqli_error($db));
?>
<script> location.assign("index.php?homepage=1&eleca=1")</script>
<?php
}
?>
