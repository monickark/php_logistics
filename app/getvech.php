<?php
require('../include/dbConnect.php');

if(!empty($_POST["vech_id"])) 
{

$query =mysqli_query($conn,"SELECT * FROM vehicles WHERE vechNo = '" . $_POST["vech_id"] . "'");

$row=mysqli_fetch_assoc($query);  

echo $row["vechOwner"];

	
}
/**************/

?>