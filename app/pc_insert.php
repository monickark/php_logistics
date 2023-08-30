<?php
require('../include/dbConnect.php');
require('../include/basefunctions.php');  
include('../include/checklogin.php');
    $dat = new Basefunc;

/*$query = mysqli_query($conn,"SELECT * FROM frieghtdetails WHERE tripid = '" . $_POST["id"] . "' ORDER  BY id DESC
LIMIT  1");
$amount_total=0;
$row=mysqli_fetch_assoc($query);  */
/*
if($row['others_amount']!=""){
*/

/*$amount_total=$row['others_amount']+$_POST['amount'];
$desc=$row['others_description'].",".$_POST['place'];*/

/*}
*/


if( $_POST["type"]=="View")
{

   $id=$_POST["id"];
  $driver=$_POST["driver"];
  echo '<script>alert("'.$_POST["driver"].'");</script>';
$query_halt = mysqli_query($conn,"SELECT * FROM pc_entry WHERE tripid = '$id' AND driver = '$driver';");

    echo "<table id='datatable1' class='table display responsive nowrap'>
<tr>
<td align=center> <b>Date</b></td>
<td align=center><b>Driver Name</b></td>
<td align=center><b>Place</b></td>
<td align=center><b>Cost</b></td>";

/*
---------------Extra Options Here-----------
<td align=center><b>Actions</b></td>
echo "<td align=center><a href='javascript:void()' onclick='deletecrgs(".$data['id'].")' class='btn btn-outline-danger btn-icon mg-r-5'><div><i class='fa fa-trash-o'></i></div></a></td>";



$data = mysqli_fetch_assoc($result);
echo '<script>alert("'.$data['vechno'].'");</script>';*/
while($data = mysqli_fetch_assoc($query_halt))
{   
    echo "<tr>";
    echo "<td align=center>".$data['ent_date']."</td>";
    echo "<td align=center>".$data['driver']."</td>";
    echo "<td align=center>".$data['place']."</td>";
    echo "<td align=center>".$data['amount']."</td>";
    echo "<td align=center><a href='javascript:void()' onclick='deletepc(".$data['id'].")' class='btn btn-outline-danger btn-icon mg-r-5'><div><i class='fa fa-trash-o'></i></div></a></td>";
    
    
    echo "</tr>";
}
echo "</table>";


}
else if($_POST["data"]=="Delete")
{
$id=$_POST["id"];
$result=mysqli_query($conn,"DELETE FROM pc_entry where id ='$id'; " );
if($result)
{

echo"success";

}
else
{
  echo"fail";
}


}


else if( $_POST["data"]=="Fetch")
{
  $id=$_POST["id"];
  $driver=$_POST["driver"];
$query_halt = mysqli_query($conn,"SELECT * FROM pc_entry WHERE tripid = '$id' AND driver = '$driver';");
$i=0;
while($data = mysqli_fetch_assoc($query_halt))
{
$i=$data['amount']+$i;
}

echo $i;
}
else
{
  $date_rep = str_replace('/', '-', $_POST['date']);
$newDate = date("Y-d-m", strtotime($date_rep));
$insert_pc = array(   
      "intAdminId"      =>     mysqli_real_escape_string($dat->con, $_SESSION['MintId']),
      "tripid"          =>     mysqli_real_escape_string($dat->con, $_POST['id'] ),  
      "ent_date"        =>     mysqli_real_escape_string($dat->con, $newDate), 
      "vechno"          =>     mysqli_real_escape_string($dat->con, $_POST['vechno']), 
      "driver"          =>     mysqli_real_escape_string($dat->con, $_POST['driver']),
      "amount"          =>     mysqli_real_escape_string($dat->con, $_POST['amount']),
      "place"           =>     mysqli_real_escape_string($dat->con, $_POST['place'])
      );  


       $insid = $dat->insert('pc_entry', $insert_pc);

if ($insid/*&&$upd_frtid*/)
{
echo"Success";
}
else
{
  echo"Fail";
}

}

         /*echo '<script>alert("'.$amount_total.'");</script>';
         echo '<script>alert("'.$desc.'");</script>';

$uid = array(
      "tripid"              =>     mysqli_real_escape_string($dat->con, $_POST['id'])
   );

$ins_frt = array(
        
        "others_amount"           =>     mysqli_real_escape_string($dat->con, $amount_total), 
        "others_description"      =>     mysqli_real_escape_string($dat->con, $desc)
       
      ); 
 $upd_frtid = $dat->update('frieghtdetails',$ins_frt,$uid);



*/


