<?php
require('../include/dbConnect.php');
 if($_POST["action"]=="Fetch")

{



$num = $_POST["num"];
/*echo '<script>alert("'.$num.'");</script>';*/
/*echo '<script>alert("'.$from.'");</script>';
echo '<script>alert("'.$to.'");</script>';*/

$result=mysqli_query($conn,"SELECT * FROM load_det WHERE transporter = '$num'  " );








echo "<table id='datatable1' class='table display responsive nowrap' >
<tr>
<td align=center> <b>Date</b></td>

<td align=center><b>Vehicle</b></td>
<td align=center><b>Reference ID</b></td>
<td align=center><b>From</b></td>
<td align=center><b>To</b></td>
<td align=center><b>Driver</b></td>
<td align=center><b>Party Name</b></td>
<td align=center><b>Frieght Value</b></td>

</tr>
";

/*$data = mysqli_fetch_assoc($result);
echo '<script>alert("'.$data['vechno'].'");</script>';*/
while($data = mysqli_fetch_assoc($result))
{   
    echo "<tr>";
    echo "<td align=center>".$data['ent_date']."</td>";
echo "<td align=center>".$data['vechno']."</td>";
echo "<td align=center ><a href='trip_report.php?tripid=".$data['tripid']." & driver=".$data['driver']."' target='_blank'>".$data['tripid']."</td>";
 echo "<td align=center>".$data['from_place']."</td>";
        echo "<td align=center>".$data['to_place']."</td>";


 $query_dri=mysqli_query($conn,"SELECT name FROM drivers WHERE id ='".$data['driver']."'");
$dri=mysqli_fetch_array($query_dri);

         echo "<td align=center>".$dri['name']."</td>";
  echo "<td align=center>".$data['party_name']."</td>";

$query_frt=mysqli_query($conn,"SELECT * FROM frieghtdetails WHERE tripid ='".$data['tripid']."'");
$frt=mysqli_fetch_array($query_frt);

    echo "<td align=center>".$frt['amount']."</td>";

  
    echo "</tr>";

    $total=$frt['amount']+$total;
}

echo "<tr>";
echo "<td></td>";
echo "<td></td>";
echo "<td></td>";
echo "<td></td>";
echo "<td></td>";
echo "<td></td>";
echo "<td align=center><b>Total Frieght Value</b></td>";
 echo "<td align=center>".$total."</td>";
echo "</tr>";

 
echo "</table>";





}