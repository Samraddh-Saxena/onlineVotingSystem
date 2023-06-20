<?php require_once("include/header.php");
?>
<?php
 require_once("include/navigation.php");
?>
<?php
if(isset($_GET['homepage'])){
    require_once("include/homepage.php");
}
else if(isset($_GET['election'])){
    require_once("include/election.php");
}
else if(isset($_GET['candidate'])){
    require_once("include/candidate.php");
}
else if(isset($_GET['logout'])){
    require_once("logout.php");
}
else if(isset($_GET['result'])){
    require_once("include/results.php");
}
?>
<?php
require_once("include/footer.php");
?>