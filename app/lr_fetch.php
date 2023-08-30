<?php
require('../include/dbConnect.php');
 if($_POST["action"]=="Fetch")

{

$to= $_POST["tdate"];
/*echo '<script>alert("'.$num.'");</script>';
echo '<script>alert("'.$from.'");</script>';*/
/*echo '<script>alert("'.$to.'");</script>';*/

$result=mysqli_query($conn,"SELECT * FROM gc_details WHERE ent_date ='".$to."'; " );



echo "<table id='datatable1' class='table display responsive nowrap' >
<tr>
<td align=center><b>Vehicle Number</b></td>
<td align=center><b>From</b></td>
<td align=center><b>To</b></td>
<td align=center><b>Ass GC Number</b></td>
<td align=center><b>Consignor Name</b></td>
<td align=center><b>Consignee Name</b></td>
<td align=center><b>Value</b></td>

<td align=center><b>Description</b></td>
<td align=center><b>Actions</b></td>
</tr>
";

/*$data = mysqli_fetch_assoc($result);
echo '<script>alert("'.$data['vechno'].'");</script>';*/
while($data = mysqli_fetch_assoc($result))
{   
 $query_dri=mysqli_query($conn,"SELECT * FROM load_det WHERE tripid ='".$data['tripid']."';");
$dri=mysqli_fetch_array($query_dri);
$check=mysqli_num_rows($query_dri);
/*echo '<script>alert("'.$data['tripid'].'");</script>';*/
if($check!=0)
{
    echo "<tr>";

echo "<td align=center>".$dri['vechno']."</td>";
echo "<td align=center>".$dri['from_place']."</td>";
echo "<td align=center>".$dri['to_place']."</td>";
 echo "<td align=center>".$data['gcno']."</td>";
        echo "<td align=center>".$data['consignor_name']."</td>";
         echo "<td align=center>".$data['consignee_name']."</td>";
          echo "<td align=center>".$data['value']."</td>";
          echo "<td align=center>".$data['description']."</td>";
       echo"<td align=center> <a  class='idelete iconp' target = '_blank' href='print_lr.php?id=".$data["id"]."&tripid=".$dri["tripid"]."'><i class='icon ion-printer'></i></a></td>";	


 

/*  ?id=<?php echo $id;?>&flag=Delete&stat=<?php echo $stat;?>*/
    echo "</tr>";
}
}
 
echo "</table>";





}