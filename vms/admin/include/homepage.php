<div class="row my-auto">

    <div class="col-12 ">
        <h3>Elections</h3>
        <table class="table">
  <thead>
    <tr>
      <th scope="col">S.No.</th>
      <th scope="col">Election Name</th>
      <th scope="col">Max no. of Candidates</th>
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
      $id= $row['elec_id'];
      ?>
        <tr>
          <td><?php echo $sno++ ?></td>
          <td> <?php echo $row['elec_name'] ?> </td>
          <td> <?php echo $row['no_cand'] ?> </td>
          <td> <?php echo $row['sd'] ?> </td>
          <td> <?php echo $row['ed'] ?> </td>
          <td> 
            <a href="index.php?result=<?php echo $id; ?>" class="btn btn-small btn-success"> Result  </a>
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


