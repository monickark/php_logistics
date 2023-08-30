<?php
require('../include/dbConnect.php');

if(!empty($_POST["state_id"])) 
{

	$vechno=$_POST["state_id"];
$query = mysqli_query($conn,"select distinct driver from ( select driver from load_det where vechno='$vechno' union select driver from load_return WHERE vechno='$vechno') t
");
?>
<option value="">Select Driver</option>
<?php

while($row=mysqli_fetch_array($query))  
{

/*	echo '<script>alert("'.$row['driver'].'");</script>';*/
$query2 = mysqli_query($conn,"SELECT * FROM drivers WHERE id = '" . $row['driver'] . "'");
$dri=mysqli_fetch_assoc($query2);

?>
<option value="<?php echo $dri["id"];; ?>"><?php echo $dri["name"]; ?></option>
<?php
}
}
else if(!empty($_POST["driver"]))
{
	$dri=$_POST["driver"];
	$vech=$_POST["vechno"];
/*	echo '<script>alert("'.$_POST["driver"].'");</script>';
	echo '<script>alert("'.$_POST["vechno"].'");</script>';*/

 $query = mysqli_query($conn,"SELECT l.tripid as ldtrip,l.ent_date as lddate,r.tripid as retrip,r.ent_date as retdate FROM `load_det`as l,load_return as r WHERE l.driver='$dri' AND l.vechno='$vech' AND r.driver='$dri' AND r.vechno='$vech' GROUP by ldtrip");

echo" <ul class='nav nav-pills nav-pills-for-dark flex-column' role='tablist' >";
        
              
              while($row=mysqli_fetch_array($query))
                { 
                	
 echo"<li id='tripno' value='".$row['ldtrip']."' class='nav-item'><a class='nav-link' data-toggle='tab' href='#'' role='tab'>".$row['ldtrip']."- -".$row['lddate']."</a></li>";



if($row['ldtrip']!=$row['retrip'])
{

if($row['retrip']!=$ret)
	{
		$ret = $row['retrip'];
  echo"<li id='tripno' value='".$ret."' class='nav-item'><a class='nav-link' data-trip='".$ret."' data-toggle='tab' href='#'' role='tab'>".$ret."- -".$row['retdate']."</a></li>";
     }                             
      }
         }



             echo" </ul>";  


}

else
{

	echo"Noope";
}

?>
 