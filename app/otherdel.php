<?php
require('../include/dbConnect.php');
require('../include/basefunctions.php');  

    $dat = new Basefunc;

$id = $_POST["val"];
/*echo '<script>alert("'.$_POST["val"].'");</script>';*/


$query = mysqli_query($conn,"SELECT * FROM other_exp WHERE id ='$id';");

$data = mysqli_fetch_assoc($query);

$amount = $data['amount'];
$desc = $data['description']; 
$tripid=$data['tripid'];

/*echo '<script>alert("'.$amount.'");</script>';
echo '<script>alert("'.$desc.'");</script>';*/







$query = mysqli_query($conn,"SELECT * FROM frieghtdetails WHERE tripid = '" . $tripid . "' ORDER  BY id DESC
LIMIT  1");
$amount_total=0;
$row=mysqli_fetch_assoc($query);  

if($row['others_amount']!=""){


$amount_total=$row['others_amount']-$amount;
$descrip = trim($row['others_description'],$desc);
/*echo '<script>alert("'.$amount_total.'");</script>';
echo '<script>alert("'.$descrip.'");</script>';*/
}
$uid = array(
      "tripid"              =>     mysqli_real_escape_string($dat->con, $tripid)
   );

$ins_frt = array(
        
        "others_amount"           =>     mysqli_real_escape_string($dat->con, $amount_total), 
        "others_description"      =>     mysqli_real_escape_string($dat->con, $descrip)
       
      ); 
 $upd_frtid = $dat->update('frieghtdetails',$ins_frt,$uid);




$result=mysqli_query($conn,"DELETE FROM other_exp where id ='$id'; " );
if($result)
{

echo"success";

}
else
{
	echo"fail";
}


?>