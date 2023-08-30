      <link href="../lib/datatables/jquery.dataTables.css" rel="stylesheet">
<!--     <link href="../lib/select2/css/select2.min.css" rel="stylesheet">
 --> <?php
require('../include/dbConnect.php');
if(!empty($_POST["keyword"])) {
$query ="SELECT * FROM drivers WHERE name like '" . $_POST["keyword"] . "%' ORDER BY name LIMIT 0,6";
$result = mysqli_query($conn,$query);
if(!empty($result)) {
?>
<ul id="country-list" style=" float:left;list-style:none;margin-top:-3px;padding:0;width:383px;position: absolute;z-index:1;">
<?php
foreach($result as $country) {
?>
<li style="padding: 10px; background: #ffffff; border-bottom: #bbb9b9 1px solid;cursor:pointer;" onClick="selectCountry('<?php echo $country["id"]; ?>');"><?php echo $country["name"]; ?></li>
<?php } ?>
</ul>
<?php } } 
else if($_POST["action"]=="Fetch")

{



$driver = $_POST["dri"];
$from = $_POST["fdate"];
$to= $_POST["tdate"];

/*
echo '<script>alert("'.$driver.'");</script>';
echo '<script>alert("'.$from.'");</script>';
echo '<script>alert("'.$to.'");</script>';*/

$result=mysqli_query($conn,"SELECT * FROM driver_mgt WHERE driver_id = '$driver' AND ent_date between '$from' and '$to'; " );








echo "<table id='datatable1' class='table display responsive nowrap' >
<tr>
<td align=center> <b>Date</b></td>


<td align=center><b>Type</b></td>
<td align=center><b>Reference Id</b></td>
<td align=center><b>Reason</b></td>
<td align=center><b>Amount</b></td>
<td align=center><b>Total</b></td>
</tr>
";

/*$data = mysqli_fetch_assoc($result);
*/
$row=mysqli_num_rows($result);
/*echo '<script>alert("'.$row.'");</script>';*/

while($data = mysqli_fetch_array($result))
{   
    echo "<tr>";



    $newDate = date("d-m-Y", strtotime($data['ent_date']));

    echo "<td align=center>".$newDate."</td>";










if($data['type']=="1")
{
$val="Credit";


  echo "<td align=center>".$val."</td>";

if($data['reason']=='Trip Completion Amount'||$data['tripid']==NULL||$data['tripid']=='Not Assigned')
	{
		$Tot_amt=$Tot_amt+$data['amount'];
if($data['reason']=='Trip Completion Amount')
		{
        $trip=$data['tripid'];
        echo "<td align=center><a href='trip_report.php?tripid=".$data['tripid']." & driver=".$driver."' target='_blank'>".$trip."</a></td>";
		}else
{
		$trip="Not Assigned";
    echo "<td align=center>".$trip."</td>";
	}

 echo "<td align=center>".$data['reason']."</td>";
 


        echo "<td align=center>".$data['amount']."</td>";
         echo "<td align=center>".$data['amount']."</td>";

	}
else{

echo "<td align=center><a href='trip_report.php?tripid=".$data['tripid']." & driver=".$driver."' target='_blank'>".$data['tripid']."</a></td>";
 echo "<td align=center>".$data['reason']."</td>";
  
        echo "<td align=center>".$data['amount']."</td>";
echo"<td></td>";
 
}





   
}else
{
$val="Debit";

  echo "<td align=center>".$val."</td>";


  if($data['reason']=='Trip Completion Amount'||$data['tripid']==NULL||$data['tripid']=='Not Assigned')
	{
$Tot_amt=$Tot_amt-$data['amount'];
		if($data['reason']=='Trip Completion Amount')
		{
        $trip=$data['tripid'];
		}else
{
		$trip="Not Assigned";
	}
echo "<td align=center>".$trip."</td>";

    echo "<td align=center>".$data['reason']."</td>";

       
                echo "<td align=center>".$data['amount']."</td>";
                echo "<td align=center>".$data['amount']."</td>";

}




else
{

$trip=$data['tripid'];
$driver=$data['driver_id'];




	echo "<td align=center><a href='trip_report.php?tripid=".$trip." & driver=".$driver."' target='_blank'>".$data['tripid']."</a></td>";



    echo "<td align=center>".$data['reason']."</td>";
echo "<td align=center>".$data['amount']."</td>";

        echo"<td></td>";
                



}


}



  
    
  
    
    
    echo "</tr>";
}
 echo "<tr>";
 echo "<td align=center>Total:</td>";
  echo "<td></td>";
   echo "<td></td>";
   echo"<td></td>";
   echo"<td></td>";
 echo "<td align=center>".$Tot_amt."</td>";
    echo "</tr>";
echo "</table>";

echo"<button class='ion-printer' onclick='print()'>Print</button> ";

echo'<link rel="stylesheet" type="text/css" href="print.css" media="print" />';
 
}





else if(!empty($_POST["cont_no"])) {
 /* echo '<script>alert("'.$_POST["cont_no"].'");</script>';*/
$query ="SELECT * FROM load_det WHERE cont_no like '" . $_POST["cont_no"] . "%' ORDER BY name LIMIT 0,6";
$result = mysqli_query($conn,$query);
if(!empty($result)) {
?>
<ul id="country-list" style=" float:left;list-style:none;margin-top:-3px;padding:0;width:383px;position: absolute;z-index:1;">
<?php
foreach($result as $country) {
?>
<li style="padding: 10px; background: #ffffff; border-bottom: #bbb9b9 1px solid;cursor:pointer;" onClick="selectCountry('<?php echo $country["cont_no"]; ?>');"><?php echo $country["cont_no"]; ?></li>
<?php } ?>
</ul>
<?php } } 


?>

<!-- <script src="../lib/jquery/jquery.js"></script>
    <script src="../lib/popper.js/popper.js"></script>

    <script src="../lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js"></script>
    <script src="../lib/jquery-toggles/toggles.min.js"></script> -->
    <script src="../lib/highlightjs/highlight.pack.js"></script>
    <script src="../lib/datatables/jquery.dataTables.js"></script>
    <script src="../lib/datatables-responsive/dataTables.responsive.js"></script>
    <script src="../lib/select2/js/select2.min.js"></script>
        <script src="../lib/bootstrap/bootstrap.js"></script>

<!--     <script src="../js/amanda.js"></script> -->

<script>
      $(function(){
        'use strict';

        $('#datatable1').DataTable({
          responsive: true,
          language: {
            searchPlaceholder: 'Search...',
            sSearch: '',
            lengthMenu: '_MENU_ items/page',
          }
        });

        $('#datatable2').DataTable({
          bLengthChange: false,
          searching: false,
          responsive: true
        });

        // Select2
        $('.dataTables_length select').select2({ minimumResultsForSearch: Infinity });

      });
    </script>