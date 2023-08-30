<?php
require('../include/dbConnect.php');

if(!empty($_POST["state_id"])) 
{

	$vechno=$_POST["state_id"];

	/*Fetching from drivers from completed trips*/
$query1 = "SELECT driver,tripid from load_det as l where vechno='$vechno' union  select driver,tripid from load_return as r where vechno='$vechno'";

$query = mysqli_query($conn,$query1);



?>
<option value="">Select Driver</option>



<?php


while($row=mysqli_fetch_array($query))  
{
/*	echo '<script>alert("Main:+'.$row['tripid'].'");</script>';*/
/*Checking if the trip is completed*/
$refine_driver=mysqli_query($conn,"SELECT * from load_return where tripid = '". $row["tripid"]."'");
/*echo '<script>alert("Return:+'.mysqli_num_rows($refine_driver).'");</script>';*/
if(mysqli_num_rows($refine_driver)!=0)
{

$driver=$row['driver'];

/*Checking if the calculation is already Done*/
$driver_check=mysqli_query($conn,"SELECT * from trip_calculation where driver='$driver' and tripid ='". $row["tripid"]."'
");


/*	echo '<script>alert("'.$row['driver'].'");</script>';  */
$result=in_array($row['driver'], $driver_array);

/*echo '<script>alert("'.$result.'");</script>';*/
if ($result==0)
{

if(mysqli_num_rows($driver_check)==0)
{

  $driver_array[]=$row['driver'];
/*echo '<script>alert("'.$row['driver'].'");</script>';*/
	/*Fetching Name From ID*/
$query2 = mysqli_query($conn,"SELECT * FROM drivers WHERE id = '" . $row['driver'] . "'");
$dri=mysqli_fetch_assoc($query2);
?>
<option value="<?php echo $dri["id"]; ?>"><?php echo $dri["name"]; ?></option>
<?php
}}
}
}
}
else if(!empty($_POST["driver"]))
{
	$dri=$_POST["driver"];
	$vech=$_POST["vechno"];



$trip=mysqli_query($conn,"SELECT T1.tripid FROM load_det T1
   LEFT OUTER JOIN
   load_return T2 ON T1.tripid = T2.tripid
   WHERE T1.vechno = '$vech' AND T1.driver = '$dri' OR T2.vechno = '$vech' AND T2.driver = '$dri';");
echo" <ul class='nav nav-pills nav-pills-for-dark flex-column' role='tablist' >";
              while($row=mysqli_fetch_array($trip))
              {

 /*Checking Completed Trip*/
 $query4 = mysqli_query($conn,"SELECT * FROM load_return WHERE tripid = '".$row['tripid']."' ;");



//fetching data
 $fetch_load = mysqli_query($conn,"SELECT * FROM load_det WHERE tripid = '".$row['tripid']."' AND driver = '$dri';");
 $fetch_return = mysqli_query($conn,"SELECT * FROM load_return WHERE tripid = '".$row['tripid']."' AND driver = '$dri';");
if(mysqli_num_rows($fetch_load)!=0)
{
$fetch=mysqli_fetch_array($fetch_load);
}
elseif(mysqli_num_rows($fetch_return)!=0)
{
$fetch=mysqli_fetch_array($fetch_return);


}




/*echo '<script>alert("'.$tid.'");</script>';
*/
if(mysqli_num_rows($query4)!=0)
{
$tid=$row['tripid'];
/*echo '<script>alert("'.$tid.'");</script>';*/
$query6 = mysqli_query($conn,"SELECT tripid FROM trip_calculation WHERE tripid = '$tid' AND driver ='$dri' ;");
if(mysqli_num_rows($query6)==0)
                  {

 echo"<li id='tripno' value='".$row['tripid']."' class='nav-item'><a class='nav-link' data-toggle='tab' href='#'' role='tab'>".$row['tripid']."--".$fetch['ent_date']."--".$fetch['from_place']."-".$fetch['to_place']."</a></li>";

                  }

       }
}

























/*	echo '<script>alert("'.$_POST["driver"].'");</script>';
	echo '<script>alert("'.$_POST["vechno"].'");</script>';*/                

/*Get Trip ID Details ID For Selection*/












/*
$uptrip=mysqli_query($conn,"SELECT tripid,ent_date,from_place,to_place,driver from load_det where vechno = '$vech' AND driver = '$dri'");


echo" <ul class='nav nav-pills nav-pills-for-dark flex-column' role='tablist' >";


              while($row=mysqli_fetch_array($uptrip))
                {
 $query4 = mysqli_query($conn,"SELECT * FROM load_return WHERE tripid = '".$row['tripid']."' ;");*/


/*echo '<script>alert("'.$tid.'");</script>';
*/
/*if(mysqli_num_rows($query4)!=0)
                	{
$tid=$row['tripid'];
echo $tid;
$driver=$row['driver'];

$dri_arr[$row['tripid']]=$driver;

$query6 = mysqli_query($conn,"SELECT tripid FROM trip_calculation WHERE tripid = '$tid' AND driver ='$driver' ;");
//complete Check


                	if(mysqli_num_rows($query6)==0)
                	{
   echo "SELECT * from load_return where vechno = '$vech' AND driver = '$driver' AND tripid = '$tid'";
   	$downtrip=mysqli_query($conn,"SELECT * from load_return where vechno = '$vech' AND driver = '$driver' AND tripid = '$tid'" );

$return=mysqli_fetch_array($downtrip);
         if(mysqli_num_rows($downtrip)==0)
                  {        echo"<li id='tripno' value='".$return['tripid']."' class='nav-item'><a class='nav-link' data-trip='".$return['tripid']."' data-toggle='tab' href='#'' role='tab'>".$return['tripid']."- -".$return['ent_date']."--".$return['from_place']."-".$return['to_place']."</a></li>";
                  echo" </ul>";
              }
              else{

              
                 echo"<li id='tripno' value='".$return['tripid']."' class='nav-item'><a class='nav-link' data-trip='".$return['tripid']."' data-toggle='tab' href='#'' role='tab'>".$return['tripid']."- -".$return['ent_date']."--".$return['from_place']."-".$return['to_place']."</a></li>";
                  echo" </ul>";  
              }
            
 echo"<li id='tripno' value='".$row['tripid']."' class='nav-item'><a class='nav-link' data-toggle='tab' href='#'' role='tab'>".$row['tripid']."--".$row['ent_date']."--".$row['from_place']."-".$row['to_place']."</a></li>";
}
}
}*/




/*echo '<script>alert("'.$dri.'");</script>';*/

/*
$downtrip=mysqli_query($conn,"SELECT tripid,ent_date,from_place,to_place,driver from load_return where vechno = '$vech' AND driver = '$dri'");

 while($return=mysqli_fetch_array($downtrip))
                {
            
$rettid=$return['tripid'];
$query7 = mysqli_query($conn,"SELECT tripid FROM trip_calculation WHERE tripid = '$rettid' AND driver ='$dri' ;");

if(mysqli_num_rows($query7)==0)
                	{
*/
	

/*echo '<script>alert("'.$return['tripid'].'");</script>';
	echo '<script>alert("'.$return['driver'].'");</script>';*/

/*$ret_arr[$row['tripid']]=$return['driver'];


if (in_array($return['driver'], $dri_arr))
if(=="")
{

		$ret = $return['tripid'];
  echo"<li id='tripno' value='".$return['tripid']."' class='nav-item'><a class='nav-link' data-trip='".$return['tripid']."' data-toggle='tab' href='#'' role='tab'>".$ret."- -".$return['ent_date']."--".$return['from_place']."-".$return['to_place']."</a></li>";
 }    }                             
      }


             echo" </ul>";  */
}




else
{

	echo"Noope";
}



/* $query = mysqli_query($conn,"SELECT l.tripid as ldtrip,l.ent_date as lddate,l.from_place as ldfrom,l.to_place as ldto,r.tripid as retrip,r.ent_date as retdate,r.from_place as retfrom,r.to_place as retto FROM load_det as l,load_return as r WHERE (l.driver='$dri' AND l.vechno='$vech') OR (r.driver='$dri' AND r.vechno='$vech') ");*/

?>
 
