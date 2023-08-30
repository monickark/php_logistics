<?php
require('../include/dbConnect.php');
require('../include/basefunctions.php');  
include('../include/checklogin.php');
    $dat = new Basefunc;




if( $_POST["type"]=="View")
{
$id= $_POST["id"];
$dri= $_POST["driver"];

$query_halt = mysqli_query($conn,"SELECT * FROM rto_entry WHERE tripid = '$id' AND driver='$dri';");

    echo "<table id='datatable1' class='table display responsive nowrap'>
<tr>
<td align=center> <b>Date</b></td>
<td align=center><b>Driver Name</b></td>
<td align=center><b>Place</b></td>
<td align=center><b>Cost</b></td>";

while($data = mysqli_fetch_assoc($query_halt))
{   
    echo "<tr>";
    echo "<td align=center>".$data['ent_date']."</td>";
    echo "<td align=center>".$data['driver']."</td>";
    echo "<td align=center>".$data['place']."</td>";
    echo "<td align=center>".$data['amount']."</td>";
    echo "<td align=center><a href='javascript:void()' onclick='deleterto(".$data['id'].")' class='btn btn-outline-danger btn-icon mg-r-5'><div><i class='fa fa-trash-o'></i></div></a></td>";
    
    
    echo "</tr>";
}
echo "</table>";


}
else if($_POST["data"]=="Delete")
{
$id=$_POST["id"];
$result=mysqli_query($conn,"DELETE FROM rto_entry where id ='$id'; " );
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


$id= $_POST["id"];
$dri= $_POST["driver"];



$query_halt = mysqli_query($conn,"SELECT * FROM rto_entry WHERE tripid = '$id' AND driver='$dri';");
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

$insert_rto = array(   
      "intAdminId"      =>     mysqli_real_escape_string($dat->con, $_SESSION['MintId']),
      "tripid"          =>     mysqli_real_escape_string($dat->con, $_POST['id'] ),  
      "ent_date"        =>     mysqli_real_escape_string($dat->con, $newDate), 
      "vechno"          =>     mysqli_real_escape_string($dat->con, $_POST['vechno']), 
      "driver"          =>     mysqli_real_escape_string($dat->con, $_POST['driver']),
      "amount"          =>     mysqli_real_escape_string($dat->con, $_POST['amount']),
      "place"           =>     mysqli_real_escape_string($dat->con, $_POST['place'])
      );  


       $insid = $dat->insert('rto_entry', $insert_rto);

if ($insid)
{
echo"Success";
}
else
{
  echo"Fail";
}

}



