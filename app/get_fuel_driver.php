<?php
require('../include/dbConnect.php');
if(!empty($_POST["vech_no"])) 
{
	$vechid = $_POST["vech_no"];
	$tripid = $_POST["trip_id"];

$query =mysqli_query($conn,"SELECT l.driver as lddri,r.driver as retdri FROM load_det as l , load_return as r WHERE l.tripid ='$tripid'  AND r.tripid ='$tripid'");

while($row=mysqli_fetch_array($query))
{ $a=$row['lddri'];

$b = $row['retdri'];


$trip_cal =mysqli_query($conn,"SELECT driver FROM trip_calculaion WHERE tripid ='$tripid'");
if(mysqli_num_rows($trip_cal)==0)
{

	$query_dri =mysqli_query($conn,"SELECT name FROM drivers WHERE id ='$a'");
$dri=mysqli_fetch_array($query_dri);

$query_dri_ret=mysqli_query($conn,"SELECT name FROM drivers WHERE id ='$b'");
$dri_ret=mysqli_fetch_array($query_dri_ret);
if($dri['name']==$dri_ret['name'])
{
?>
<option value="<?php echo $a;?>"><?php echo $dri['name'];?></option>
<?php
}
else
{

?>
<option value="<?php echo $a;?>"><?php echo $dri['name'];?></option>
<option value="<?php echo $b;?>"><?php echo $dri_ret['name'];?></option>
<?php
}
}
else{
while($check=mysqli_fetch_array($trip_cal))
{
if($check['driver']!=$a&&$check['driver']!=$b)
{
	echo '<script>alert("'.$row['lddri'].'");</script>';
echo '<script>alert("'.$row['retdri'].'");</script>';

$query_dri =mysqli_query($conn,"SELECT name FROM drivers WHERE id ='$a'");
$dri=mysqli_fetch_array($query_dri);

$query_dri_ret=mysqli_query($conn,"SELECT name FROM drivers WHERE id ='$b'");
$dri_ret=mysqli_fetch_array($query_dri_ret);
if($dri['name']==$dri_ret['name'])
{
?>
<option value="<?php echo $a;?>"><?php echo $dri['name'];?></option>
<?php
}
else
{

?>
<option value="<?php echo $a;?>"><?php echo $dri['name'];?></option>
<option value="<?php echo $b;?>"><?php echo $dri_ret['name'];?></option>
<?php
}
}
else if($check['driver']!=$a)
{

$query_dri =mysqli_query($conn,"SELECT name FROM drivers WHERE id ='$a'");
$dri=mysqli_fetch_array($query_dri);
?>
<option value="<?php echo $a;?>"><?php echo $dri['name'];?></option>
<?php


}
else if($check['driver']!=$b)
{
$query_dri_ret=mysqli_query($conn,"SELECT name FROM drivers WHERE id ='$b'");
$dri_ret=mysqli_fetch_array($query_dri_ret);
?>
<option value="<?php echo $a;?>"><?php echo $dri_ret['name'];?></option>



<?php
}
}
}
}
}

?>
