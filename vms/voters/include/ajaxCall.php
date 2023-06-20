<?php

require_once("../../admin/include/config.php");
if(isset($_POST['e_id']) AND isset($_POST['c_id']) AND isset($_POST['u_name'])){
  mysqli_query($db,"INSERT INTO votes(cand_id,username) VALUES ('".$_POST['c_id']."','".$_POST['u_name']."')") or die(mysqli_error($db));
echo "Done";
}
// mysqli_query($db,"INSERT INTO votes(elec_id,cand_id,username) VALUES ('".$_POST['e_id']."','".$_POST['c_id']."','".$_POST['u_name']."')") or die(mysqli_error($db));
?>