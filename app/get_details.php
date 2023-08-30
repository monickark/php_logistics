<?php
require('../include/dbConnect.php');
if(!empty($_POST["tripid"])) 
{

$tripid=$_POST["tripid"];
$vechid=$_POST["vech_id"];

$query = mysqli_query($conn,"SELECT * FROM load_det WHERE vechno = '$vechid' AND tripid = '$tripid' ORDER  BY id DESC
LIMIT  1");

$row=mysqli_fetch_assoc($query);  

$driver=$row['driver'];


$query_halt = mysqli_query($conn,"SELECT * FROM halt_entry WHERE vechno = '$vechid' AND tripid = '$tripid' ORDER  BY id DESC
LIMIT  1");

if(mysqli_num_rows($query_halt)>0) 
{
$halt=mysqli_fetch_assoc($query_halt);
$driver=$halt['driver'];

}
 
$query_ret = mysqli_query($conn,"SELECT * FROM load_return WHERE vechno = '$vechid' AND tripid = '$tripid' ORDER  BY id DESC
LIMIT  1");

if(mysqli_num_rows($query_ret)>0) 
{
$ret=mysqli_fetch_assoc($query_ret);
$driver=$ret['driver'];

}



$query2 = mysqli_query($conn,"SELECT * FROM drivers WHERE id = '" . $driver . "' ORDER  BY id DESC
LIMIT  1");
$dri=mysqli_fetch_assoc($query2); 

$output =  array('from'=>$row['from_place'],
                 'to'=>$row['to_place'],
                 'driver'=>$dri['name'],
                 'trip'=>$row['tripid'],
                 'driverid'=> $driver,
                 );
echo json_encode($output,JSON_FORCE_OBJECT);

        
}
else if($_POST["act"]=="Ref Number" )
{

$query = mysqli_query($conn,"SELECT * FROM load_det ORDER  BY id DESC
LIMIT  1");

$row=mysqli_fetch_assoc($query); 

if(is_numeric($row['tripid'])!=1)
{
$val=1;
}
else
{
      $val=$row['tripid']+1;  
}



$output =  array('values'=>$val,
                 
                 );
echo json_encode($output,JSON_FORCE_OBJECT);

}


else
{



$query = mysqli_query($conn,"SELECT * FROM load_det WHERE vechno = '" . $_POST["vech_id"] . "' ORDER  BY id DESC
LIMIT  1");

$row=mysqli_fetch_assoc($query);  

$driver=$row['driver'];


$query_halt = mysqli_query($conn,"SELECT * FROM halt_entry WHERE vechno = '" . $_POST["vech_id"] . "' ORDER  BY id DESC
LIMIT  1");

if(mysqli_num_rows($query_halt)>0) 
{
$halt=mysqli_fetch_assoc($query_halt);
$driver=$halt['driver'];

}
 
$query_ret = mysqli_query($conn,"SELECT * FROM load_return WHERE vechno = '" . $_POST["vech_id"] . "' ORDER  BY id DESC
LIMIT  1");

if(mysqli_num_rows($query_ret)>0) 
{
$ret=mysqli_fetch_assoc($query_ret);
$driver=$ret['driver'];

}



$query2 = mysqli_query($conn,"SELECT * FROM drivers WHERE id = '" . $driver . "' ORDER  BY id DESC
LIMIT  1");
$dri=mysqli_fetch_assoc($query2); 

$output =  array('from'=>$row['from_place'],
                 'to'=>$row['to_place'],
                 'driver'=>$dri['name'],
                 'trip'=>$row['tripid'],
                 'driverid'=>$row['driver'],
                 );
echo json_encode($output,JSON_FORCE_OBJECT);

        

}



/**************/

?>
