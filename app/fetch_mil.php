<?php
require('../include/dbConnect.php');
 if($_POST["action"]=="Fetch")
{
$num = $_POST["num"];
$from = $_POST["fdate"];
$to= $_POST["tdate"];
$agent_name= $_POST["agent"];
$pay = $_POST["payment"];
/*echo '<script>alert("'.$num.'");</script>';
echo '<script>alert("'.$from.'");</script>';
echo '<script>alert("'.$to.'");</script>';
echo '<script>alert("'.$agent_name.'");</script>';
echo '<script>alert("'.$pay.'");</script>';*/
if ($_POST["num"] =="all" && $_POST["agent"] != "all" && $_POST["payment"] != "all")
{

	 $result=mysqli_query($conn,"SELECT * FROM fuel WHERE vendor = '$agent_name' AND paytype ='$pay' AND ent_date BETWEEN '$from' and '$to' ;");

/*		echo '<script>alert("'.$result.'");</script>';*/
}

elseif ($_POST["num"] =="all" && $_POST["agent"] != "all" && $_POST["payment"] == "all")
{

	 $result=mysqli_query($conn,"SELECT * FROM fuel WHERE vendor = '$agent_name' AND ent_date BETWEEN '$from' and '$to' ;");

/*		echo '<script>alert("'.$result.'");</script>';*/
}
elseif ($_POST["num"] =="all" && $_POST["agent"] == "all" && $_POST["payment"] != "all")
{

	 $result=mysqli_query($conn,"SELECT * FROM fuel WHERE paytype ='$pay' AND ent_date BETWEEN '$from' and '$to' ;");

/*		echo '<script>alert("'.$result.'");</script>';*/
}




elseif($_POST["agent"] == "all" && $_POST["num"] != "all" && $_POST["payment"] != "all")
{
/*	echo '<script>alert("'.$result.'");</script>';*/
$result=mysqli_query($conn,"SELECT * FROM fuel WHERE vechno = '$num' and paytype ='$pay' and ent_date between '$from' and '$to' ; ");
}



elseif($_POST["agent"] == "all" && $_POST["num"] != "all" && $_POST["payment"] == "all")
{
/*	echo '<script>alert("'.$result.'");</script>';*/
$result=mysqli_query($conn,"SELECT * FROM fuel WHERE vechno = '$num'  and ent_date between '$from' and '$to' ; ");
}


elseif($_POST["agent"] == "all" && $_POST["num"] == "all" && $_POST["payment"] != "all")
{
/*	echo '<script>alert("'.$result.'");</script>';*/
$result=mysqli_query($conn,"SELECT * FROM fuel WHERE paytype ='$pay' and ent_date between '$from' and '$to' ; ");
}



elseif($_POST["payment"]== "all" && $_POST["num"] != "all" && $_POST["agent"] != "all")
{
	/*echo '<script>alert("'.$result.'");</script>';*/
$result=mysqli_query($conn,"SELECT * FROM fuel WHERE vechno = '$num' and vendor = '$agent_name' and  ent_date between '$from' and '$to' ;");
}


elseif($_POST["payment"]== "all" && $_POST["num"] != "all" && $_POST["agent"] == "all")
{
	/*echo '<script>alert("'.$result.'");</script>';*/
$result=mysqli_query($conn,"SELECT * FROM fuel WHERE vechno = '$num' and  ent_date between '$from' and '$to' ;");
}


elseif($_POST["payment"]== "all" && $_POST["num"] == "all" && $_POST["agent"] != "all")
{
	/*echo '<script>alert("'.$result.'");</script>';*/
$result=mysqli_query($conn,"SELECT * FROM fuel WHERE vendor = '$agent_name' and  ent_date between '$from' and '$to' ;");
}


elseif($_POST["num"] == "all" && $_POST["agent"] == "all" && $_POST["payment"]== "all" )
{

$result=mysqli_query($conn,"SELECT * FROM fuel WHERE ent_date between '$from' and '$to' ;");
/*echo '<script>alert("'.$result.'");</script>';*/
}
else
{
$result=mysqli_query($conn,"SELECT * FROM fuel WHERE vechno = '$num' AND vendor = '$agent_name' AND paytype ='$pay' AND ent_date between '$from' and '$to' ;");
}

/*
$milage=mysqli_query($conn,"SELECT * FROM fuel WHERE vechnum = '$num' AND ent_date between '$from' and '$to'; " );*/
echo "<table id='datatable1' class='table display responsive nowrap'>
<tr>
<td align=center> <b>S.No</b></td>
<td align=center> <b>Date</b></td>
<td align=center> <b>Ref No</b></td>

<td align=center><b>Vehicle</b></td>
<td align=center><b>Qty</b></td>
<td align=center><b>Rate</b></td>
<td align=center><b>Amount</b></td>
<td align=center><b>Vendor</b></td>
<td align=center><b>Location</b></td>
</tr>
";
/*$data = mysqli_fetch_assoc($result);
echo '<script>alert("'.$data['vechno'].'");</script>';*/
$i=1;
$tot=0;
$cost=0;
$pp=0;
while($data=mysqli_fetch_array($result))
{   

/*    echo '<script>alert("'.$data.'");</script>';*/
/*echo '<script>alert("'.$tripid.'");</script>';*/
echo "<tr>";
echo "<td align=center>".$i."</td>";

$newDate = date("d-m-Y", strtotime($data['ent_date']));   
echo "<td align=center>".$newDate."</td>";
echo "<td align=center>".$data['tripid']."</td>";
echo "<td align=center>".$data['vechno']."</td>";
/*echo "<td align=center ><a href='trip_report.php?tripid=".$data['tripid']." & driver=".$data['driver']."' target='_blank'>".$data['tripid']."</td>";*/
echo "<td align=center>".$data['qty']."</td>";
echo "<td align=center>".$data['ppl']."</td>";
echo "<td align=center>".$data['cost']."</td>";
echo "<td align=center>".$data['vendor']."</td>";
echo "<td align=center>".$data['place']."</td>";
/*if($data['paytype'] == "Driver Cash")
{
echo "<td align=center>Others</td>";
}
else
{
echo "<td align=center>".$data['paytype']."</td>";
}*/

echo "</tr>";
/*echo '<script>alert("'.$data['tripid'].'");</script>';*/
$tot+=$data['qty'];
$cost+=$data['cost'];
$pp+=$data['ppl'];
$i++;
}
echo "<tr>";
echo "<td></td>";
echo "<td>Total</td>";

echo "<td></td>";echo "<td></td>";
echo "<td>$tot</td>";

echo "<td>$pp</td>";
echo "<td>$cost</td>";
echo "</tr>";
echo "</table>";
}