<?php
require('../include/dbConnect.php');
require('../include/basefunctions.php');  
include('../include/checklogin.php');
    $dat = new Basefunc;

$query = mysqli_query($conn,"SELECT * FROM frieghtdetails WHERE tripid = '" . $_POST["id"] . "' ORDER  BY id DESC
LIMIT  1");
$amount_total=0;
$row=mysqli_fetch_assoc($query);  
/*
if($row['others_amount']!=""){
*/

$amount_total=$row['others_amount']+$_POST['amount'];
$desc=$row['others_description'].",".$_POST['desc'];

/*}
*/

$newDate = date("Y-d-m", strtotime($_POST['date']));
  


$insert_other = array(   
      "intAdminId"      =>     mysqli_real_escape_string($dat->con, $_SESSION['MintId']),
      "tripid"          =>     mysqli_real_escape_string($dat->con, $_POST['id'] ),  
      "ent_date"        =>     mysqli_real_escape_string($dat->con, $newDate), 
      "vechno"          =>     mysqli_real_escape_string($dat->con, $_POST['vechno']), 
      "driver"          =>     mysqli_real_escape_string($dat->con, $_POST['driver']),
      "amount"          =>     mysqli_real_escape_string($dat->con, $_POST['amount']),
      "description"     =>     mysqli_real_escape_string($dat->con, $_POST['desc'])
      );  


       $insid = $dat->insert('other_exp', $insert_other);








/*$type="2";
  $ins_driver_mgt = array(
        "intAdminId"       =>     mysqli_real_escape_string($dat->con, $_SESSION['MintId']),
        "ent_date"         =>     mysqli_real_escape_string($dat->con, $newDate),
        "driver_id"        =>     mysqli_real_escape_string($dat->con, $_POST['driver']),
        "amount"           =>     mysqli_real_escape_string($dat->con, $_POST['amount']),
        "type"             =>     mysqli_real_escape_string($dat->con, $type), 
        "tripid"           =>     mysqli_real_escape_string($dat->con, $_POST['id']),
        "reason"           =>     mysqli_real_escape_string($dat->con, $_POST['desc'])
      ); 
 $inshhaltid = $dat->insert('driver_mgt', $ins_driver_mgt);*/




         /*
         echo '<script>alert("'.$amount_total.'");</script>';
         echo '<script>alert("'.$desc.'");</script>';*/

$uid = array(
      "tripid"              =>     mysqli_real_escape_string($dat->con, $_POST['id'])
   );

$ins_frt = array(
        
        "others_amount"           =>     mysqli_real_escape_string($dat->con, $amount_total), 
        "others_description"      =>     mysqli_real_escape_string($dat->con, $desc)
       
      ); 
 $upd_frtid = $dat->update('frieghtdetails',$ins_frt,$uid);







if ($insid&&$upd_frtid)
{
echo"Success";
}
else
{
  echo"Fail";
}