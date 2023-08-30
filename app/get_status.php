<?php
require('../include/dbConnect.php');
if(!empty($_POST["status_id"])) 
{
	/*echo '<script>alert("'.$_POST["status_id"].'");</script>';*/
$query =mysqli_query($conn,"SELECT status,ent_date,from_place FROM vechstat WHERE vechnum = '" . $_POST["status_id"] . "'ORDER  BY id DESC
LIMIT  1");

?>
<!-- <option value="">Select Action</option> -->
<?php
$row=mysqli_fetch_array($query);
/*
	echo '<script>alert("'.$row['status'].'");</script>';*/
/*$to_date=date("d/m/Y");
	if($row['ent_date']==$to_date)
{
?>
<option value="Accident">Accident</option>


<?php

}else{*/


/*	*/
if($row['status']=="Load")
{

?>
<option value="">Select</option>
<option value="Return">Return Load</option>
<option value="OnRoad">OnRoad</option>
<option value="Halt">Halt</option>
<option value="Workshop">Workshop</option>
<option value="Fc">Fc</option>
<option value="Accident">Accident</option>
<option value="Returnemp">Return Empty</option>
<option value="Parking">Parking</option>
<?php
}
elseif($row['status']=="Halt")
{
?>
<option value="">Select</option>
<option value="Halt">Halt</option>
<option value="Return">Return Load</option>
<option value="Returnemp">Return Empty</option>
<option value="Accident">Accident</option>
<?php
}
elseif($row['status']=="Parking")
{
?>
<option value="">Select</option>
<option value="Load">Load</option>
<option value="Parking">Parking</option>
<option value="Workshop">Workshop</option>
<option value="Fc">Fc</option>
<option value="Accident">Accident</option>


<?php
}
elseif($row['status']=="OnRoad")
{

	$trip=$_POST["tripid"];


/*	echo '<script>alert("'.$_POST["tripid"].'");</script>';
		echo '<script>alert("'.$_POST["status_id"].'");</script>';*/
$return_ret =mysqli_query($conn,"SELECT * FROM load_return WHERE tripid = '$trip' AND vechno = '" . $_POST["status_id"] . "'ORDER  BY id DESC LIMIT  1");

$return=mysqli_fetch_assoc($return_ret);


if($row['from_place']==$return['to_place'])
{
	?>
	<option value="">Select</option>
<option value="OnRoad">OnRoad</option>
<option value="Accident">Accident</option>
<option value="Load">Load</option>
<option value="Workshop">Workshop</option>
<option value="Fc">Fc</option>
<option value="Parking">Parking</option>
<option value="HHalt">Home Halt</option>

<?php
}

else
{

?>
<option value="">Select</option>
<option value="OnRoad">OnRoad</option>
<option value="Halt">Halt</option>
<option value="Accident">Accident</option>
<option value="Return">Return Load</option>
<option value="Returnemp">Return Empty</option>

<?php
}}
elseif($row['status']=="Return"||$row['status']=="Returnemp")
{


?>
<option value="">Select</option>
<option value="Load">Load</option>
<option value="OnRoad">OnRoad</option>
<option value="Accident">Accident</option>
<option value="Parking">Parking</option>
<option value="HHalt">Home Halt</option>



<?php
}
else
{
?>
<option value="">Select</option>
	<option value="Load">Load</option>
	<option value="Workshop">Workshop</option>
<option value="Fc">Fc</option>
<option value="Accident">Accident</option>
<option value="Parking">Parking</option>
<option value="HHalt">Home Halt</option>
<?php
}/*}*/
}
/**************/

?>
