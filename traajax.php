<?php
include "config.php";

$id = isset($_POST['id']); 



$add = isset($_POST['cred']);

echo ($add);
$sql = "UPDATE user SET credit = ".$add." WHERE id = ".$id;
$result=mysqli_query($con,$sql);
if($result){
echo "<script> console.log(2);</script>";
	// header('Location:user.php');
}
else{
echo("Error description: " . mysqli_error($con));
 }

?>