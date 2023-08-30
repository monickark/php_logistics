<?php
require('../include/dbConnect.php');
 if($_POST["action"]=="Fetch")

{
$date_rep = str_replace('/', '-', $_POST['fdate']);
$from = date("Y-m-d", strtotime($date_rep));

$date_rep = str_replace('/', '-', $_POST['tdate']);
$to = date("Y-m-d", strtotime($date_rep));
$vech_name= $_POST["vech"];

$name = $_POST["num"];
$i=1;



/*cho '<script>alert("'.$vech_name.'");</script>';*/
/*echo '<script>alert("'.$from.'");</script>';
echo '<script>alert("'.$to.'");</script>';*/

if ($_POST["vech"] =="All")
{
	$result=mysqli_query($conn,"SELECT * From load_det WHERE transporter = '$name'  AND ent_date BETWEEN '$from' and '$to'");

}
else

{
$result=mysqli_query($conn,"SELECT * FROM load_det WHERE transporter = '$name'  AND ent_date BETWEEN '$from' and '$to'AND vechno ='".$vech_name."';");

}






echo "<table id='datatable1' class='table display responsive nowrap' >
<tr>
<td align=center> <b>SI No.</b></td>

<td align=center> <b>Date</b></td>

<td align=center><b>Vehicle</b></td>
<td align=center><b>From</b></td>
<td align=center><b>To</b></td>
<td align=center><b>Diesel Qty</b></td>
<td align=center><b>Diesel Advance</b></td>
<td align=center><b>Cash Advance</b></td>
<td align=center><b>Hire Amount</b></td>
<td align=center><b>Total Advance</b></td>

<td align=center><b>Balance</b></td>

</tr>
";

/*$data = mysqli_fetch_assoc($result);
echo '<script>alert("'.$data['vechno'].'");</script>';*/
while($data = mysqli_fetch_assoc($result))
{   
echo "<tr>";
echo "<td align=center>".$i."</td>";

echo "<td align=center>".$data['ent_date']."</td>";
echo "<td align=center>".$data['vechno']."</td>";
echo "<td align=center>".$data['from_place']."</td>";
echo "<td align=center>".$data['to_place']."</td>";


 $query_dri=mysqli_query($conn,"SELECT name FROM drivers WHERE id ='".$data['driver']."'");
$dri=mysqli_fetch_array($query_dri);

/*  echo "<td align=center>".$dri['name']."</td>";
*/
 $query_dri=mysqli_query($conn,"SELECT * FROM load_hire where tripid ='".$data['tripid']."' ");
$data1=mysqli_fetch_array($query_dri);

    echo "<td align=center>".$data1['total_diesel_quantity']."</td>";
    echo "<td align=center>".$data1['total_diesel_advance']."</td>";
    $total1=$data1['mkm_adv']+$data1['chn_advance'];
    echo "<td align=center>".$total1."</td>";
    $total11=$total1+$data1['total_diesel_advance'];
    echo "<td align=center>".$data1['hire_amount']."</td>";
         echo "<td align=center>".$total11."</td>";

    echo "<td align=center>".$data1['hire_balance']."</td>";
    echo "</tr>";
$i++;
$totals=$data1['total_diesel_quantity']+$totals;
$totalss=$data1['total_diesel_advance']+$totalss;
    $total=$total1+$total;
    $tot=$total11+$tot;
    $totalss1=$data1['hire_amount']+$totalss1;
    $t=$data1['hire_balance']+$t;
    $com=$i*500-500;
    $m=$t-$com;
}

echo "<tr>";
echo "<td></td>";
echo "<td></td>";

echo "<td></td>";
echo "<td></td>";
echo "<td align=center><b>Total: </b></td>";
echo "<td align=center>".$totals." </td>";
echo "<td align=center>".$totalss." </td>";
echo "<td align=center>".$total." </td>";
echo "<td align=center>".$totalss1." </td>";
 echo "<td align=center>".$tot."</td>";

  echo "<td align=center>".$t."</td>";
echo "</tr>";

 
echo "<tr>";
echo "<td></td>";
echo "<td></td>";

echo "<td></td>";
echo "<td></td>";
echo "<td align=center><b>Commission:</b></td>";
echo "<td></td>";
echo "<td></td>";

echo "<td></td>";
echo "<td></td>";
echo "<td></td>";
  echo "<td align=center>".$com."</td>";
echo "</tr>";
echo "<tr>";
echo "<td></td>";
echo "<td></td>";

echo "<td></td>";
echo "<td></td>";
echo "<td align=center><b>Grand Total(Balance-Commission):</b></td>";
echo "<td></td>";
echo "<td></td>";

echo "<td></td>";
echo "<td></td>";
echo "<td></td>";
  echo "<td align=center>".$m."</td>";
echo "</tr>";
echo "</table>";





}