<?php 
require('../include/dbConnect.php');
require('../include/basefunctions.php');  
include('../include/checklogin.php');
    $dat = new Basefunc;


if($_POST['type']=="Haltupd")
{
/*echo '<script>alert("'.$_POST['driver'].'");</script>';
echo '<script>alert("'.$_POST['id'].'");</script>';
echo '<script>alert("'.$_POST['place'].'");</script>';
echo '<script>alert("'.$_POST['amount'].'");</script>';*/


$uid = array(
      "id"              =>     mysqli_real_escape_string($dat->con, $_POST['id'])
   );
$upd_halt = array(   
      
      "driver"          =>     mysqli_real_escape_string($dat->con, $_POST['driver']), 
      "place"           =>     mysqli_real_escape_string($dat->con, $_POST['place']), 
      "cost"            =>     mysqli_real_escape_string($dat->con, $_POST['amount'])
      );  


  $insid = $dat->update('halt_entry',$upd_halt,$uid);

echo "Halt Altered";
/*        echo '<script> alert("Halt Altered");window.location.assign("");</script>';*/

}

else if($_POST['type']=="onRoadupd")
{
$uid = array(
      "id"              =>     mysqli_real_escape_string($dat->con, $_POST['id'])
   );
$upd_halt = array(   
      
      "driver"          =>     mysqli_real_escape_string($dat->con, $_POST['driver']), 
      "to_place"           =>     mysqli_real_escape_string($dat->con, $_POST['to_place']), 
      "amount"            =>     mysqli_real_escape_string($dat->con, $_POST['amount'])
      );  


  $insid = $dat->update('onroad_details',$upd_halt,$uid);

echo "On Road Altered";


}