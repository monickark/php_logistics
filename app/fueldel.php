<?php
require('../include/dbConnect.php');
$id = $_POST["val"];
/*echo '<script>alert("'.$_POST["val"].'");</script>';die;*/
$result=mysqli_query($conn,"DELETE FROM fuel where id ='$id'; " );


$query=mysqli_query($conn,"DELETE FROM driver_mgt where fuel_ent_id ='$id'; " );

if($result)
{

echo"success";
}
else
{
	echo"fail";
}
?>