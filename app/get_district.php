<?php
require('../include/dbConnect.php');
if(!empty($_POST["state_id"])) 
{
$query =mysqli_query($conn,"SELECT * FROM district WHERE StCode = '" . $_POST["state_id"] . "'");
?>
<option value="">Select City</option>
<?php
while($row=mysqli_fetch_array($query))  
{
?>
<option value="<?php echo $row["DistCode"]; ?>"><?php echo $row["DistrictName"]; ?></option>
<?php
}
}
else if(!empty($_POST["cust_id"]))
{

/*$details=mysqli_query($conn,"SELECT * FROM customer WHERE name = '" . $_POST["cust_id"] . "'");

$id=mysqli_fetch_array($details);*/
?>

<!-- <option value="">Select</option> -->
<?php

$query =mysqli_query($conn,"SELECT * FROM ledgers WHERE type = 1 ");

while($row=mysqli_fetch_array($query))  
{
?>
<option value="<?php echo $row["id"]; ?>"><?php echo $row["name"]; ?></option>
<?php
}



}
else if(!empty($_POST["transp_id"]))
{



$details=mysqli_query($conn,"SELECT * FROM transporters WHERE name = '" . $_POST["transp_id"] . "'");

$id=mysqli_fetch_array($details);


$query =mysqli_query($conn,"SELECT * FROM bank_records WHERE cust_id = '" . $id["comp_id"] . "'");

?>

<!-- <option value="">Select</option> -->
<?php




while($row=mysqli_fetch_array($query))  
{
?>
<option value="<?php echo $row["id"]; ?>"><?php echo $row["name"]; ?></option>
<?php
}


}
else if(!empty($_POST["transp_name"]))
{

$query =mysqli_query($conn,"SELECT * FROM vehicles WHERE vechOwner = '" . $_POST["transp_name"] . "'");
?>
<option value="All">All Vehicles</option>
<?php
while($row=mysqli_fetch_array($query))  
{
?>
<option value="<?php echo $row["vechNo"]; ?>"><?php echo $row["vechNo"]; ?></option>
<?php
}




}


/**************/

?>
