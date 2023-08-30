<?php
//fetch.php


require('../include/dbConnect.php');


/*echo '<script>alert("'.$_POST["keyt"].'");</script>';
echo '<script>alert("'.$_POST["trip"].'");</script>';*/
/*echo '<script>alert("'.$_POST["vech"].'");</script>';
echo json_decode($_POST["vech"]);*/


if($_POST["status"]=="Load")
{
$vechid = $_POST["vechno"];
$trip = $_POST["tripid"];
$result=mysqli_query($conn,"SELECT * FROM fuel WHERE vechno = '$vechid' AND tripid ='$trip' ; " );
echo "<table id='datatable1' class='table display responsive nowrap' >
<tr>
<td align=center> <b>Date</b></td>
<td align=center><b>Driver Name</b></td>
<td align=center><b>Vendor</b></td>
<td align=center><b>Place</b></td>
<td align=center><b>Qty</b></td>
<td align=center><b>Amount</b></td></td>
<td align=center><b>Pay</b></td>
<td align=center><b>Actions</b></td>";

while($data = mysqli_fetch_assoc($result))
{   

    $query_dri=mysqli_query($conn,"SELECT name FROM drivers WHERE id ='".$data['driver']."'");
$dri=mysqli_fetch_array($query_dri);
    echo "<tr>";
    echo "<td align=center>".$data['ent_date']."</td>";
    echo "<td align=center>".$dri['name']."</td>";
    echo "<td align=center>".$data['vendor']."</td>";
    echo "<td align=center>".$data['place']."</td>";
    echo "<td align=center>".$data['qty']."</td>";
    echo "<td align=center>".$data['cost']."</td>";
    echo "<td align=center>".$data['paytype']."</td>";
    echo "<td align=center><a href='javascript:void()' onclick='editfuel(".$data['id'].")'class='btn btn-outline-primary btn-icon mg-r-5'><div><i class='fa fa-pencil-square-o'></i></div></a><a href='javascript:void()' onclick='deletefuel(".$data['id'].")' class='btn btn-outline-danger btn-icon mg-r-5'><div><i class='fa fa-trash-o'></i></div></a></td>";
    
    echo "</tr>";
}

echo "</table>";
    
}
else if(isset($_POST["vechno"]))
{
$vechid = $_POST["vechno"];
$trip = $_POST["tripid"];
$result=mysqli_query($conn,"SELECT * FROM fuel WHERE vechno = '$vechid' AND tripid ='$trip' ; " );

echo "<table id='datatable1' class='table display responsive nowrap' >
<tr>
<td align=center> <b>Date</b></td>
<td align=center><b>Driver Name</b></td>
<td align=center><b>Vendor</b></td>
<td align=center><b>Place</b></td>
<td align=center><b>Qty</b></td>
<td align=center><b>Amount</b></td></td>
<td align=center><b>Pay</b></td>
<td align=center><b>Actions</b></td>";

/*$data = mysqli_fetch_assoc($result);*/
/*echo '<script>alert("'.$data['vechno'].'");</script>';*/
while($data = mysqli_fetch_assoc($result))
{   

    $query_dri=mysqli_query($conn,"SELECT name FROM drivers WHERE id ='".$data['driver']."'");
$dri=mysqli_fetch_array($query_dri);
    echo "<tr>";
    echo "<td align=center>".$data['ent_date']."</td>";
    echo "<td align=center>".$dri['name']."</td>";
    echo "<td align=center>".$data['vendor']."</td>";
    echo "<td align=center>".$data['place']."</td>";
    echo "<td align=center>".$data['qty']."</td>";
    echo "<td align=center>".$data['cost']."</td>";
    echo "<td align=center>".$data['paytype']."</td>";
    echo "<td align=center><a href='javascript:void()' onclick='editfuel(".$data['id'].")'class='btn btn-outline-primary btn-icon mg-r-5'><div><i class='fa fa-pencil-square-o'></i></div></a><a href='javascript:void()' onclick='deletefuel(".$data['id'].")' class='btn btn-outline-danger btn-icon mg-r-5'><div><i class='fa fa-trash-o'></i></div></a></td>";
    
    echo "</tr>";
}
echo "</table>";

}
elseif($_POST["type"]=="TRview")
{
$vechid = $_POST["vechnos"];
$tripid = $_POST["tripid"];
$dri= $_POST["driverid"];
/*echo '<script>alert("'.$vechid.'");</script>';
echo '<script>alert("'.$tripid.'");</script>';
echo '<script>alert("'.$dri.'");</script>';*/

$result=mysqli_query($conn,"SELECT * FROM fuel WHERE vechno = '$vechid' AND tripid = '$tripid' AND driver = '$dri' AND paytype ='Driver Cash'; " );
echo "<table id='datatable1' class='table display responsive nowrap' >
<tr>
<td align=center> <b>Date</b></td>

<td align=center><b>Vendor</b></td>
<td align=center><b>Place</b></td>
<td align=center><b>Qty</b></td>
<td align=center><b>Amount</b></td></tr>
";

/*$data = mysqli_fetch_assoc($result);
echo '<script>alert("'.$data['vechno'].'");</script>';*/
while($data = mysqli_fetch_assoc($result))
{   
    echo "<tr>";
    echo "<td align=center>".$data['ent_date']."</td>";
    echo "<td align=center>".$data['vendor']."</td>";
    echo "<td align=center>".$data['place']."</td>";
    echo "<td align=center>".$data['qty']."</td>";
    echo "<td align=center>".$data['cost']."</td>";
  
    
    
    echo "</tr>";
}
echo "</table>";


}

else if(isset($_POST["trip"]))
{

    
$vechid = $_POST["vech"];
$tripid = $_POST["trip"];
$total_qty = 0;
$total_amt=0;
/*echo '<script>alert("'.$vechid.'");</script>';
echo '<script>alert("'.$tripid.'");</script>';*/
$result=mysqli_query($conn,"SELECT * FROM fuel WHERE vechno = '$vechid' AND tripid ='$tripid' ; " );
while($data = mysqli_fetch_assoc($result))
{
$total_qty=$data['qty']+$total_qty;
$total_amt=$data['cost']+$total_amt;

}
$output =  array(
                 'qty'=>$total_qty,
                 'cost'=>$total_amt,
                 
             );
echo json_encode($output,JSON_FORCE_OBJECT);



}



else 
{

$id = $_POST["fuel_id"];
$result=mysqli_query($conn,"SELECT * FROM fuel WHERE id = '$id' ORDER  BY id DESC
LIMIT  1"  );

	$row=mysqli_fetch_assoc($result);  

   $query_dri=mysqli_query($conn,"SELECT name FROM drivers WHERE id ='".$row['driver']."'");
$dri=mysqli_fetch_array($query_dri);
$output =  array(
	             'id'=>$row['id'],
	             'date'=>$row['ent_date'],
                 'driver'=>$row['driver'],
                 'trip'=>$row['tripid'],
                 'vendor'=>$row['vendor'],
                 'place'=>$row['place'],
                 'qty'=>$row['qty'],
                 'amount'=>$row['cost'],
                 'ppl'=>$row['ppl'],
                 'paytype'=>$row['paytype'],
             );
echo json_encode($output,JSON_FORCE_OBJECT);
}

?>
