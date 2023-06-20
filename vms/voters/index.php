<?php
require_once("include/header.php");
require_once("include/navigation.php");
?>
<div class="row my-4">
    <div colspan="4" class="col-12">
        <H3> VOTER DASHBOARD </H3>

    <?php
  $bringData= mysqli_query($db,"SELECT * FROM elections WHERE status='Active Now'") or die(mysqli_error($db));
   if(mysqli_num_rows($bringData)>=1){
    while($data=mysqli_fetch_assoc($bringData)){
        $elec_id= $data['elec_id'];
        $elec_name=$data['elec_name'];
    ?>
 <table class="table mt-4">
            <thead>
                <tr>
                    <th class="bg-blue text-dark"> ELection Name: <?php echo $elec_name ?> </th>
</tr>
<tr>
    <th>Symbol</th>
    <th>Candidate Name</th>
<?php //  <th>No. of Votes</th>  ?>
    <th>Options </th>
    </tr>
</thead>
<tbody>
<?php    $bringCand=mysqli_query($db,"SELECT * FROM candidates WHERE elec_id='".$elec_id."'") or die(mysqli_error($db));
        
        while($datac=mysqli_fetch_assoc($bringCand)){
            $votes=mysqli_query($db,"SELECT * FROM votes WHERE cand_id='".$datac['cand_id']."'") or die(mysqli_error($db));
            $totVotes=mysqli_num_rows($votes);
            $cid=$datac['cand_id'];
            $name= $_SESSION['username'];
?>
    <TR>
        <td> <img src="<?php echo $datac['symbol']?>" class="imgcan"> </td>
        <td> <?php echo $datac['cand_name'] ?></td>
     <?php //   <td> <?php echo $totVotes  </td>  ?>
   
        <td>
<?php            
     //   $checkCasted1= mysqli_query($db,"SELECT * FROM votes WHERE username='".$_SESSION['username']."' AND elec_id='".$elec_id."'") or die(mysqli_error($db)); 
$checkCasted=mysqli_query($db,"SELECT cand_id,elec_id FROM (SELECT votes.cand_id, votes.username, candidates.elec_id FROM votes INNER JOIN candidates ON votes.cand_id = candidates.cand_id) AS q1 WHERE q1.username='".$_SESSION['username']."' AND elec_id='".$elec_id."'") or die(mysqli_error($db)); 
        $numo= mysqli_num_rows($checkCasted);
        $letsee=mysqli_fetch_assoc($checkCasted);
        if($numo>=1){
             if($datac['cand_id']==$letsee['cand_id']){
           ?> VOTED <?php
        } } 
        else{
        ?>
        <button class="btn btn-primary" id="bytu" onclick="castVote(<?php echo $elec_id;?>, <?php echo $cid; ?>, '<?php  echo $name; ?>')"> VOTE </button></td>
        <?php } ?>
        </TR>
        
<?php }
         ?>
    </tbody>
</table>
<?php
   }
}
else{
    echo "No election is Active Right Now";
   }
?>
<script> 
const castVote=(elec_id,cand_id,name)=>
{   
    $.ajax({
        type:"POST",
        url:"include/ajaxCall.php",
        data:"e_id="+elec_id+"&c_id="+cand_id+"&u_name="+name,
        success: function(response){
            console.log(response);
           if(response=="Done"){
                 location.assign("index.php?voted=1");
            }
            else{
                 location.assign("index.php?notVoted=1");
            }
        }
    })
}
</script>
<?php
  
require_once("include/footer.php");
?>