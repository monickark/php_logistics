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

$result=mysqli_query($conn,"SELECT * FROM account_voucher WHERE acc_inv = '$num' AND ent_date between '$from' and '$to'; " );








/*
$milage=mysqli_query($conn,"SELECT * FROM fuel WHERE vechnum = '$num' AND ent_date between '$from' and '$to'; " );*/



echo '<table class="table table-white mg-b-0 tx-12" align="center" border="1"> <tbody> 

</tr>
 <tr> <td colspan="4" style="width:530px;"> <strong><b>'.$num.'</b></strong> </td> </tr> <tr> <td> <b>Date </b></td><td><b> Details</b> </td> <td> <b>Debit</b> </td> <td><b> Credit</b> </td> </tr> 
';

/*;
echo '<script>alert("'.$data['vechno'].'");</script>';*/






$i=0;
$total_credit=0;
$total_debit=0;	
/*echo '<script>alert("'.$i.'");</script>';*/
while($data = mysqli_fetch_assoc($result))
{


if(mysqli_num_rows($result)==0)
{
if($i==0)
{
/*echo '<script>alert("'.$i.'");</script>';*/

echo "<tr>";

/*			$newDate = date("d-m-Y", strtotime($op['ent_date']));   
									

		echo "<td>".$newDate."</td>";*/

echo "<td>&nbsp</td>";


echo "<b><td>Opening Balance</td></b>";


$op_chk=mysqli_query($conn,"SELECT * FROM ledger WHERE name = '".$num."'; " );

$led=mysqli_fetch_array($op_chk);


if($led['type']!="Dr")
{
echo "<td>".$led['opening_bal']."</td>";
echo "<td> &nbsp;</td>";

}
else
{
	echo "<td> &nbsp;</td>";
echo "<td>".$led['opening_bal']."</td>";


}
				

	
		echo "</tr>";





$i++;
}
}
else
{

/*echo '<script>alert("'.$i.'");</script>';*/

if($i==0)
{


if($data['pay_mode']=="Payment Voucher")
{

	$opbalq=mysqli_query($conn,"SELECT * FROM payment_voucher WHERE id = '".$data['mod_voucher_no']."' " );
}

else
{
 $opbalq=mysqli_query($conn,"SELECT * FROM recipt_voucher WHERE id = '".$data['mod_voucher_no']."' " );

}


$op=mysqli_fetch_array($opbalq);





	


echo "<tr>";

/*			$newDate = date("d-m-Y", strtotime($op['ent_date']));   
									

		echo "<td>".$newDate."</td>";*/
echo "<td>&nbsp</td>";



echo "<td><b>Opening Balance</b></td>";


$op_chk=mysqli_query($conn,"SELECT * FROM ledger WHERE name = '".$op['name']."'; " );

$led=mysqli_fetch_array($op_chk);


if($led['type']=="Dr")
{
	echo "<td><b>".abs($op['closing_bal'])."</b></td>";
	echo "<td> &nbsp;</td>";

}
else
{


	
	echo "<td> &nbsp;</td>";
echo "<td><b>".abs($op['closing_bal'])."</b></td>";	

}
				

	
		echo "</tr>";

$i++;

}
}




 
/*    echo '<script>alert("'.$data.'");</script>';*/

/*echo '<script>alert("'.$tripid.'");</script>';*/


echo "<tr>";

			$newDate = date("d-m-Y", strtotime($data['ent_date']));   
									

		echo "<td>".$newDate."</td>";



echo "<td>".$data['type']."</td>";



/*if($data['type']=="Billing")
{

echo "<td>".$data['type']." On Bill No.".$op['remarks']."</td>";

}
else if($data['type']=="Advance Pa")
{
echo "<td>".$data['type']." On Voucher No.".$data['id']."</td>";

}

echo "<td>".$data['type']."</td>";*/






if($data['pay_mode']=="Receipt Voucher")
{
echo "<td>".$data['amount']."</td>";
echo "<td> &nbsp;</td>";
$total_debit=$data['amount']+$total_debit;

}
else
{
	echo "<td> &nbsp;</td>";

echo "<td>".$data['amount']."</td>";

$total_credit=$data['amount']+$total_credit;


}


/*echo "<td>".$data['qty']."</td>";
 echo "<td align=center>".$data['cost']."</td>";
				echo "<td align=center>".$data['ppl']."</td>"*/;




				 

	
		echo "</tr>";


/*echo '<script>alert("'.$data['tripid'].'");</script>';*/


}

echo"<tr class='highlight'>";
echo "<td> &nbsp;</td>";
echo "<td> Total Debit</td>";
echo"<td>".$total_debit."</td>";
echo "<td> &nbsp;</td>";
 echo "</tr>";

echo"<tr>";
echo "<td> &nbsp;</td>";
echo "<td> Total Credit</td>";
echo "<td> &nbsp;</td>";
echo"<td>".$total_credit."</td>";

 echo "</tr>";


$clobal=mysqli_query($conn,"SELECT * FROM account_voucher WHERE acc_inv = '$num' AND ent_date between '$from' and '$to' ORDER BY id DESC LIMIT  1 " );
$cb=mysqli_fetch_array($clobal);


echo "<tr>";

									

echo "<td> &nbsp;</td>";




echo "<td><b>Closing Balance</b></td>";


/*echo '<script>alert("'.$cb['mod_voucher_no'].'");</script>';*/



if($cb['pay_mode']=="Payment Voucher")
{

	$co_chk=mysqli_query($conn,"SELECT * FROM payment_voucher WHERE id = '".$cb['mod_voucher_no']."' " );
}

else
{
 $co_chk=mysqli_query($conn,"SELECT * FROM recipt_voucher WHERE id = '".$cb['mod_voucher_no']."' " );

}




/*
$co_chk=mysqli_query($conn,"SELECT * FROM ledger WHERE name = '".$cb['mod_voucher_no']."'; " );*/

$cod=mysqli_fetch_array($co_chk);



if($cod['closing_bal']>=0)
{
echo "<td><b>".$cb['closing_bal']."</b></td>";
echo "<td><b> &nbsp;</b></td>";

}
else
{
	echo "<td><b> &nbsp;<b></td>";
echo "<td><b>".$cb['closing_bal']."</b></td>";


}
				

	
		echo "</tr>";

echo "</tbody> </table>";


 
echo "</tbody> </table>";


echo"<button class='ion-printer' onclick='print()'>Print</button> ";

echo'<link rel="stylesheet" type="text/css" href="print.css" target="_blank" media="print" />';


}
?>

 <style type="text/css">
				.table, .table-bordered {
		border-color: rgba(231,232,234,0.25) rgba(231,232,234,0.25) rgba(231,232,234,0.25) transparent;
}

.table {
		border: 0 solid;
		width: 100%;
		margin-bottom: 20px;
}

.highlight td {
	border: 1 solid;
	border-color: black;
}
		</style>