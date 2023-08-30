
 <?php
require('../include/dbConnect.php');
/*echo '<script>alert("'.$_POST["keyword"].'");</script>';*/
if(!empty($_POST["keyword"])) {
	
$query ="SELECT * FROM district WHERE DistrictName like '" . $_POST["keyword"] . "%' ORDER BY DistrictName LIMIT 0,6";
$result = mysqli_query($conn,$query);
if(!empty($result)) {
?>
<ul id="country-list" style=" float:left;list-style:none;margin-top:-3px;padding:0;width:200px;position: absolute;z-index:1;">
<?php
foreach($result as $country) {
?>
<li style="padding: 5px; background: #ffffff; border-bottom: #bbb9b9 1px solid;cursor:pointer;" onClick="selectCountry('<?php echo $country["DistrictName"]; ?>');"><?php echo $country["DistrictName"]; ?></li>
<?php } ?>
</ul>
<?php } } 


/*For TO*/
elseif(!empty($_POST["key"]))
{
$query ="SELECT * FROM district WHERE DistrictName like '" . $_POST["key"] . "%' ORDER BY DistrictName LIMIT 0,6";
$result = mysqli_query($conn,$query);
if(!empty($result)) {
?>
<ul id="country-list" style=" float:left;list-style:none;margin-top:-3px;padding:0;width:200px;position: absolute;z-index:1;">
<?php
foreach($result as $country) {
?>
<li style="padding: 5px; background: #ffffff; border-bottom: #bbb9b9 1px solid;cursor:pointer;" onClick="selectCount('<?php echo $country["DistrictName"]; ?>');"><?php echo $country["DistrictName"]; ?></li>
<?php } ?>
</ul>
<?php }






}


?>


