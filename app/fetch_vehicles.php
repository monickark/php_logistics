<?php
require('../include/dbConnect.php');
 if($_POST["action"]=="Fetch")

{



$num = $_POST["num"];
$from = $_POST["fdate"];
$to= $_POST["tdate"];
/*echo '<script>alert("'.$num.'");</script>';
echo '<script>alert("'.$from.'");</script>';
echo '<script>alert("'.$to.'");</script>';*/

$result=mysqli_query($conn,"SELECT * FROM vechstat WHERE vechnum = '$num' AND ent_date between '$from' and '$to'; " );








echo "<table id='datatable1' class='table display responsive nowrap' >
<tr>
<td align=center> <b>Date</b></td>

<td align=center><b>Status</b></td>
<td align=center><b>Reference ID</b></td>
<td align=center><b>From</b></td>
<td align=center><b>To</b></td>
<td align=center><b>Driver</b></td>
</tr>
";

/*$data = mysqli_fetch_assoc($result);
echo '<script>alert("'.$data['vechno'].'");</script>';*/
while($data = mysqli_fetch_assoc($result))
{   
    echo "<tr>";
    echo "<td align=center>".$data['ent_date']."</td>";
echo "<td align=center>".$data['status']."</td>";
echo "<td align=center ><a href='trip_report.php?tripid=".$data['tripid']." & driver=".$data['driver']."' target='_blank'>".$data['tripid']."</td>";
 echo "<td align=center>".$data['from_place']."</td>";
        echo "<td align=center>".$data['to_place']."</td>";


 $query_dri=mysqli_query($conn,"SELECT name FROM drivers WHERE id ='".$data['driver']."'");
$dri=mysqli_fetch_array($query_dri);

         echo "<td align=center>".$dri['name']."</td>";


  
    echo "</tr>";
}
 
echo "</table>";





}