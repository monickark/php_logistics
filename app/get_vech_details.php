<?php
require('../include/dbConnect.php');
if(!empty($_POST["vech_id"])) 
{
	$vechid = $_POST["vech_id"];

$query =mysqli_query($conn,"SELECT l.tripid as trip FROM load_det as l , load_return as r WHERE (l.vechno='$vechid' AND r.vechno='$vechid') AND l.tripid=r.tripid");




?>
<option value="">Select Trip</option>

<?php
while($row=mysqli_fetch_array($query))
{
 $a=$row['trip'];
/*Refining Completed Trips*/
$refine=mysqli_query($conn,"SELECT * from trip_calculation where tripid='$a'");
if(mysqli_num_rows($refine)==0)
{
?>
<option value="<?php echo $a;?>"><?php echo $row['trip'];?></option>
<?php
}
else{
while($ref=mysqli_fetch_array($refine))
{
	if($ref['type']!="1")
	{
		if($ref['type']!="2")
		{
                  if($ref['type']!="3")

{





?>

<option value="<?php echo $a;?>"><?php echo $row['trip'];?></option>
<?php
}}}}
}
}
}
elseif(!empty($_POST["vech"]))
{
$num=$_POST["vech"];
$suggest=mysqli_query($conn,"SELECT driver FROM load_det WHERE vechno = '$num' ORDER BY ent_date DESC LIMIT 1;");
$sugg=mysqli_fetch_array($suggest);
echo $sugg['driver'];
}
?>
