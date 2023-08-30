<?php
require('../include/dbConnect.php'); 
if(!empty($_POST["state_id"]))   
{

$comp=$_POST["state_id"];
$query =mysqli_query($conn,"SELECT load_det.tripid FROM load_det INNER JOIN load_return ON load_det.tripid = load_return.tripid
where load_det.party_name='$comp'");
?> 
<ul class="nav nav-pills nav-pills-for-dark flex-column"  role="tablist" style="display: block;" >

<?php
while($row=mysqli_fetch_array($query))  
{

	$check=mysqli_query($conn,"SELECT * FROM pod where tripid ='".$row["tripid"]."'");

	if(mysqli_num_rows($check)==0){
 
$details=mysqli_query($conn,"SELECT * FROM load_det where tripid='".$row['tripid']."'");
$det=mysqli_fetch_array($details);



        $newDate = date("d-m-Y", strtotime($det['ent_date']));

?>
<li id="tripno"  value="<?php echo $row['tripid']?>" class="nav-item">
	<a class="nav-link" data-toggle="tab" href="#" role="tab">
		<?php echo  $row['tripid']."--".$newDate."--".$det['to_place']."--".$det['cont_no'];?></a></li>
 
<?php
}
}

$hire =mysqli_query($conn,"SELECT * FROM hire_load WHERE party_name ='$comp'");

while($hre=mysqli_fetch_array($hire)) 
{
$check=mysqli_query($conn,"SELECT * FROM pod where tripid ='h_".$hre["id"]."'");


	if(mysqli_num_rows($check)==0){
?>

<li id="tripno"  value="<?php echo $hre["id"]; ?>" class="nav-item">
	<input type="hidden" id="type" value="hire">
	<a class="nav-link" data-toggle="tab" href="#" role="tab">
		<?php echo  $hre["id"]."--".$hre["ent_date"]."--".$hre['to_place']."--".$hre['cont_no']."--"."Hired";?></a></li>

<!-- <option value="<?php echo $hre["id"]; ?>"><?php echo "HireID -".$hre["id"]; ?></option> -->
<?php
}
}





} 

?>