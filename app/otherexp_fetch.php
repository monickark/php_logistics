<?php
require('../include/dbConnect.php');
require('../include/basefunctions.php');  
include('../include/checklogin.php');
    $dat = new Basefunc;

if($_POST["desc"]=="View")
{
$id=$_POST["id"];
$dri=$_POST["driver"];


 $query = mysqli_query($conn,"SELECT * FROM other_exp WHERE tripid = '$id' AND driver = '$dri';");

    echo "<table id='datatable1' class='table display responsive nowrap'>
<tr>
<td align=center> <b>Date</b></td>
<td align=center><b>Driver Name</b></td>
<td align=center><b>Amount</b></td>
<td align=center><b>Description</b></td>
<td align=center><b>Actions</b></td>";

/*$data = mysqli_fetch_assoc($result);
echo '<script>alert("'.$data['vechno'].'");</script>';*/
while($data = mysqli_fetch_assoc($query))
{   
    echo "<tr>";
    echo "<td align=center>".$data['ent_date']."</td>";
    echo "<td align=center>".$data['driver']."</td>";
    echo "<td align=center>".$data['amount']."</td>";
    echo "<td align=center>".$data['description']."</td>";
    echo "<td align=center><a href='javascript:void()' onclick='deletecrgs(".$data['id'].")' class='btn btn-outline-danger btn-icon mg-r-5'><div><i class='fa fa-trash-o'></i></div></a></td>";
    
    echo "</tr>";
}
echo "</table>";



}

else{
  $id=$_POST["id"];
$dri=$_POST["driver"];

   $query = mysqli_query($conn,"SELECT * FROM other_exp WHERE tripid = '$id' AND driver = '$dri';");
$i=0;
    while($data = mysqli_fetch_assoc($query))
{
$i=$data['amount']+$i;
}

$output = array(   
      "amount"          =>   $i
      );  

echo json_encode($output,JSON_FORCE_OBJECT);
}