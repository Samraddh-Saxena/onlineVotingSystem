<?php
$election_id=$_GET['result'];
?>

<div class="row my-4">
    <div colspan="4" class="col-12">
        <H3> ELECTION RESULT </H3>

    <?php
// only for rank calculation
$age=array();
$tv1=0;
$bData= mysqli_query($db,"SELECT * FROM candidates WHERE elec_id='".$election_id."'") or die(mysqli_error($db));
$candNo=mysqli_num_rows($bData);
while($dat=mysqli_fetch_assoc($bData)){
$drank=mysqli_query($db,"SELECT * FROM votes WHERE cand_id='".$dat['cand_id']."'") or die(mysqli_error($db));
$tVotes=mysqli_num_rows($drank);
$age[$dat['cand_id']]=$tVotes;
$tv1=$tv1+$tVotes;
}
arsort($age);

  $bringData= mysqli_query($db,"SELECT * FROM elections WHERE elec_id='".$election_id."'") or die(mysqli_error($db));
   if(mysqli_num_rows($bringData)>=1){
    while($data=mysqli_fetch_assoc($bringData)){
        $elec_id= $data['elec_id']; 
        $elec_name=$data['elec_name'];
    ?>
 <table class="table mt-4">
            <thead>
                <tr>
                    <th class="bg-blue text-dark"><B> ELection Name: <?php echo $elec_name ?> </B></th>
                    <th class="bg-blue text-dark"> Total Votes casted: <?php echo $tv1 ?> </th>
</tr>
<tr>
    <th>Symbol</th>
    <th>Candidate Name</th>
    <th>No. of Votes</th>
    <th>Percentage share </th>
    <th> Rank </th>
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
        <td> <?php echo $totVotes ?> </td>
        <td> <?php if($tv1==0){
            echo $totVotes ?>% <?php
        }
        else{
         echo ($totVotes/$tv1)*100 ?>% <?php } ?> </td>

        <td> <?php 
        // $myq=mysqli_query($db,"SELECT cand_id,RANK() OVER (ORDER BY COUNT(*) IN (SELECT COUNT(*) FROM votes group by cand_id) desc) salary_rank FROM candidates") or die(mysqli_error($db)); 
        arsort($age);
        $newrank = array();
        $i = 0;
        $last_v = null;
        foreach ($age as $k => $v) {
            if ($v != $last_v) {
                $i++;
                $last_v = $v;
            }
            $newrank[$k] = $i;
        }
    $n=0;
     foreach($newrank as $x => $x_value) {
            if($x_value==1){
            $n=$n+1;
            }
            }
        echo $newrank[$cid];
         if($newrank[$cid]==1 && $n<2){
            ?> WINNER <?php
         }
         else if($newrank[$cid]==1 && $n>=2){
            ?>DRAW <?php
         }
         ?></td>
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