
 <style type="text/css">
    
   tr:nth-child(even) {background-color: #f2f2f2;}
  


tr:hover {background-color: #f5f5f5;}
.tg .tg-jcgs {
 
    background-color: #a9bfe0 !important;
   
}
</style>

<?php
require('../include/dbConnect.php');
 if($_POST["action"]=="Fetch")

{


$num = $_POST["num"];
$from = $_POST["fdate"];
$to= $_POST["tdate"];
/*/*echo '<script>alert("'.$num.'");</script>';*/
/*echo '<script>alert("'.$from.'");</script>';
echo '<script>alert("'.$to.'");</script>';*/

$result=mysqli_query($conn,"SELECT 'load' as type, tripid,ent_date,vechno,cont_no FROM load_det WHERE party_name ='$num'  UNION ALL SELECT 'pay' as type,invoice_no,ent_date,pay_type,amount FROM customer_payment WHERE cust_id ='$num'  ORDER BY ent_date " );

/*echo "SELECT 'load' as type, tripid,ent_date,vechno,cont_no FROM load_det WHERE party_name ='$num' AND ent_date BETWEEN $from AND $to UNION ALL SELECT 'pay' as type,invoice_no,ent_date,pay_type,amount FROM customer_payment WHERE cust_id ='$num' AND ent_date BETWEEN $from AND $to ORDER BY ent_date ";*/


 

/*

$milage=mysqli_query($conn,"SELECT * FROM fuel WHERE vechnum = '$num' AND ent_date between '$from' and '$to'; " );*/

echo'<p style="text-align=center;"><b>'.$num.'</b></p>';

echo'
<table class="tg" width="100%">
  <tr >
    <th class="tg-jcgs">S.No</th>
    <th class="tg-jcgs">Ass Ref. No</th>
    <th class="tg-jcgs">Date</th>
    <th class="tg-jcgs">Vehicle</th>
    <th class="tg-jcgs">Container No</th>
    <th class="tg-jcgs">Place</th>
    <th class="tg-jcgs">Bill Amount</th>
    <th class="tg-jcgs">Bill No</th>
    <th class="tg-jcgs">Bill Date</th>
    <th class="tg-jcgs">Received Amount (b)</th>
  </tr>

  ';

    
/*
  </tr>
  
*/



/*echo "<table id='datatable1' class='table display responsive nowrap' >
<tr>
<td align=center> <b>Date</b></td>

<td align=center><b>Amount</b></td>
<td align=center><b>Payment Type</b></td>


</tr>
";*/

/*$data = mysqli_fetch_assoc($result);
echo '<script>alert("'.$data['vechno'].'");</script>';*/

$i=1;
while($data=mysqli_fetch_array($result))
{   
/*    echo '<script>alert("'.$data.'");</script>';*/

/*echo '<script>alert("'.$data['ent_date'].'");</script>';*/

if (($data['ent_date'] > $from) && ($data['ent_date'] < $to))
    {
/*
     echo '<script>alert("true");</script>'; */
echo "<tr>";

      $newDate = date("d-m-Y", strtotime($data['ent_date']));   
                  
   echo'<td class="tg-yw4l text-center">'.$i.'</td>'; 
     

if($data['type']=='load')
{
echo'<td class="tg-yw4l">'.$data['tripid'].'</td>';
    echo '<td class="tg-yw4l">    '.$newDate.'</td>';
$query =mysqli_query($conn,"SELECT * FROM load_det WHERE tripid ='".$data['tripid']."' ");

$row=mysqli_fetch_array($query);



echo'  <td class="tg-yw4l">'.$row['vechno'].'</td>';
echo'  <td class="tg-yw4l">'.$row['cont_no'].'</td>';
echo'  <td class="tg-yw4l">'.$row['to_place'].'</td>';
/*echo'  <td class="tg-yw4l">'.$row['to_place'].'</td>';*/

$billing =mysqli_query($conn,"SELECT * FROM customer_bill_det WHERE trip_invoice ='".$data['tripid']."' ");

$bill=mysqli_fetch_array($billing);
echo'  <td class="tg-yw4l">'.$bill['amount'].'</td>';
echo'  <td class="tg-yw4l">'.$bill['billing_id'].'</td>';
echo'  <td class="tg-yw4l">'.$bill['ent_date'].'</td>';
echo'  <td class="tg-yw4l">&nbsp;</td>';

}
else if($data['type']=='pay')
{



echo'<td class="tg-yw4l">'.$data['tripid'].'</td>';
    echo '<td class="tg-yw4l">'.$newDate.'</td>';



$query =mysqli_query($conn,"SELECT * FROM customer_payment WHERE invoice_no ='".$data['tripid']."' ");

$row=mysqli_fetch_array($query);



echo'  <td class="tg-yw4l">'.$row['pay_type'].'</td>';
echo'  <td class="tg-yw4l">'.$row['voucher_type'].'</td>';
echo'  <td class="tg-yw4l">&nbsp;</td>';
echo'  <td class="tg-yw4l">&nbsp;</td>';
echo'  <td class="tg-yw4l">&nbsp;</td>';

echo'  <td class="tg-yw4l">&nbsp;</td>';
echo'  <td class="tg-yw4l">'.$row['amount'].'</td>';







}

/*
 <th class="tg-jcgs">S.No</th>
    <th class="tg-jcgs">Ass Ref. No</th>
    <th class="tg-jcgs">Date</th>
    <th class="tg-jcgs">Vehicle</th>
    <th class="tg-jcgs">Container No</th>
    <th class="tg-jcgs">Place</th>
    <th class="tg-jcgs">Bill Amount(a)</th>
    <th class="tg-jcgs">Bill No</th>
    <th class="tg-jcgs">Invoice Date</th>
    <th class="tg-jcgs">Received Amount (b)</th>*/


 



/*
  
    <td class="tg-yw4l"></td>
    <td class="tg-yw4l"></td>
    <td class="tg-yw4l"></td>
    <td class="tg-yw4l"></td>
    <td class="tg-yw4l"></td>
    <td class="tg-yw4l"></td>
    <td class="tg-yw4l"></td>
*/



/*        echo "<td align=center>".$data['amount']."</td>";


      echo "<td align=center>".$data['pay_type']."</td>";*/

         

  
    echo "</tr>";


/*echo '<script>alert("'.$data['tripid'].'");</script>';*/



$i++;
}
} 
echo "</table>";





}
elseif($_POST["action"]=="outward")

{




$from = $_POST["fdate"];
$to= $_POST["tdate"];
$tra=$_POST["trns"];

/*echo '<script>alert("'.$tra.'");</script>';
echo '<script>alert("'.$from.'");</script>';
echo '<script>alert("'.$to.'");</script>';*/



echo "<table id='datatable1' class='table display responsive nowrap' >
<tr>
<td align=center> <b>Date</b></td>
<td align=center> <b>Transporter</b></td>
<td align=center><b>Amount</b></td>
<td align=center><b>Payment Type</b></td>

</tr>
";

/*
Option 1*/


$total=0;

if($tra=="All")
{




$ledger=mysqli_query($conn,"SELECT * FROM ledgers ; " );


while($led=mysqli_fetch_assoc($ledger))
{




$checktrans=mysqli_query($conn,"SELECT * FROM transporters WHERE name = '".$led['name']."' ; " );



if(mysqli_num_rows($checktrans)!=0)
{

$entry_items=mysqli_query($conn,"SELECT * FROM entryitems WHERE ledger_id = '".$led['id']."' AND  dc='C' ; " );

while($ent=mysqli_fetch_assoc($entry_items))
{
$entries=mysqli_query($conn,"SELECT * FROM entries WHERE id ='".$ent['entry_id']."' ; " );

$det=mysqli_fetch_assoc($entries);






echo "<tr>";

      $newDate = date("d-m-Y", strtotime($det['date']));   
                  

    echo "<td align=center>".$newDate."</td>";
    echo "<td align=center>".$led['name']."</td>";

        echo "<td align=center>".$ent['amount']."</td>";


      echo "<td align=center>".$det['narration']."</td>";

         

  
    echo "</tr>";


$total+=$ent['amount'];



}

}


}
echo "<tr>";

  
                  

    echo "<td align=center></td>";
    echo "<td align=center>Total</td>";

        echo "<td align=center>".$total."</td>";


      echo "<td align=center></td>";

         

  
    echo "</tr>";


}
else
{
$ledger=mysqli_query($conn,"SELECT * FROM ledgers WHERE name ='$tra' ; " );

$led=mysqli_fetch_assoc($ledger);



$entry_items=mysqli_query($conn,"SELECT * FROM entryitems WHERE ledger_id = '".$led['id']."' AND  dc='C' ; " );

while($ent=mysqli_fetch_assoc($entry_items))
{
$entries=mysqli_query($conn,"SELECT * FROM entries WHERE id ='".$ent['entry_id']."' ; " );

$det=mysqli_fetch_assoc($entries);






echo "<tr>";

      $newDate = date("d-m-Y", strtotime($det['date']));   
                  

    echo "<td align=center>".$newDate."</td>";
    echo "<td align=center>".$tra."</td>";

        echo "<td align=center>".$ent['amount']."</td>";


      echo "<td align=center>".$det['narration']."</td>";

         

  
    echo "</tr>";


$total+=$ent['amount'];



}

echo "<tr>";

  
                  

    echo "<td align=center></td>";
    echo "<td align=center>Total</td>";

        echo "<td align=center>".$total."</td>";


      echo "<td align=center></td>";

         

  
    echo "</tr>";



}






/*


OPTION 2 ----------------Important----------------

$hire=mysqli_query($conn,"SELECT * FROM load_hire WHERE ent_date between '$from' and '$to' ; " );

while($hire_data=mysqli_fetch_array($hire))
{

if($_POST["trns"]=="All")
{
$check1=mysqli_query($conn,"SELECT * FROM load_det WHERE tripid = '".$hire_data['tripid']."'' ; " );

}
else
{
$check1=mysqli_query($conn,"SELECT * FROM load_det WHERE tripid = '".$hire_data['tripid']."'' AND transporter = '".$_POST["trns"]."' ; " );
}

$check_data=mysqli_fetch_array($check1);

if(mysqli_num_rows($check1)!=0)
{

if($hire_data['chn_advance']!=0)
{
echo "<tr>";

      $newDate = date("d-m-Y", strtotime($hire_data['ent_date']));   
                  

    echo "<td align=center>".$newDate."</td>";
    echo "<td align=center>".$check_data['transporter']."</td>";

        echo "<td align=center>".$hire_data['chn_advance']."</td>";


      echo "<td align=center>Chennai Advance</td>";
if($hire_data['chn_advance']=="")
{
$value="Cash";
}
else
{
$value="Bank";
}

      echo "<td align=center>".$value."</td>";
  echo "</tr>";
}


if($hire_data['bank']!=0)
{



echo "<tr>";

      $newDate = date("d-m-Y", strtotime($hire_data['ent_date']));   
                  

    echo "<td align=center>".$newDate."</td>";
    echo "<td align=center>".$check_data['transporter']."</td>";

        echo "<td align=center>".$hire_data['mkm_adv']."</td>";


 echo "<td align=center>Maduranthagam Advance</td>";
if($hire_data['mkm_bank']=="")
{
$value="Cash";
}
else
{
$value="Bank";
}

      echo "<td align=center>".$value."</td>";

         

  
    echo "</tr>";

}


if($hire_data['total_diesel_advance']!=0)
{

echo "<tr>";

      $newDate = date("d-m-Y", strtotime($hire_data['ent_date']));   
                  

    echo "<td align=center>".$newDate."</td>";
    echo "<td align=center>".$check_data['transporter']."</td>";

        echo "<td align=center>".$hire_data['total_diesel_advance']."</td>";


 echo "<td align=center>Diesel Advance</td>";
if($hire_data['mkm_bank']=="")
{
$value="Cash";
}
else
{
$value="Bank";
}

      echo "<td align=center>".$value."</td>";

         

  
    echo "</tr>";

}

}


}












$return=mysqli_query($conn,"SELECT * FROM load_return WHERE ent_date between '$from' and '$to' ; " );

while($return_data=mysqli_fetch_array($return))
{



if($_POST["trns"]=="All")
{
$check1=mysqli_query($conn,"SELECT * FROM load_det WHERE tripid = '".$return_data['tripid']."'' ; " );

}
else
{
$check1=mysqli_query($conn,"SELECT * FROM load_det WHERE tripid = '".$return_data['tripid']."'' AND transporter = '".$_POST["trns"]."' ; " );
}
$check_data=mysqli_fetch_array($check1);

if(mysqli_num_rows($check1)!=0)
{


if($return_data['return_adv'])
{


}
}






}








$onroad=mysqli_query($conn,"SELECT * FROM onroad_details WHERE ent_date between '$from' and '$to' ; " );

$on_road_data=mysqli_fetch_array($onroad)



$dri_mgt=mysqli_query($conn,"SELECT * FROM driver_mgt WHERE ent_date between '$from' and '$to' AND reason='Home Halt Advance Chennai ' OR reason='Home Halt Advance Madurathagam' ; " );

$hhalt_data1=mysqli_fetch_array($dri_mgt)*/





















/*$result=mysqli_query($conn,"SELECT * FROM hire_payment WHERE ent_date between '$from' and '$to'; " );*/



/*while($data=mysqli_fetch_array($result))
{   
/*    echo '<script>alert("'.$data.'");</script>';*/

/*echo '<script>alert("'.$tripid.'");</script>';*/


/*echo "<tr>";

      $newDate = date("d-m-Y", strtotime($data['ent_date']));   
                  

    echo "<td align=center>".$newDate."</td>";
    echo "<td align=center>".$data['transporter']."</td>";

        echo "<td align=center>".$data['amount']."</td>";


      echo "<td align=center>".$data['pay_type']."</td>";

         

  
    echo "</tr>";
*/

/*echo '<script>alert("'.$data['tripid'].'");</script>';*/


/*

}*/



 
echo "</table>";





}
else if($_POST["action"]=="trans_Fetch")
{




$num = $_POST["num"];
$from = $_POST["fdate"];
$to= $_POST["tdate"];
/*echo '<script>alert("'.$num.'");</script>';
echo '<script>alert("'.$from.'");</script>';
echo '<script>alert("'.$to.'");</script>';*/

if($num=="all")
{

$result=mysqli_query($conn,"SELECT * FROM transporter_payment WHERE  ent_date between '$from' and '$to'; " );



echo "<table id='datatable1' class='table display responsive nowrap' >
<tr>
<td align=center> <b>S.No</b></td>
<td align=center> <b>Date</b></td>
<td align=center> <b>Transporter</b></td>
<td align=center><b>Amount</b></td>
<td align=center><b>Payment Type</b></td>
<td align=center><b>Bill Number</b></td>
<td align=center><b>Details</b></td>
<td align=center><b>Actions</b></td>


</tr>
";
}
else
{


$result=mysqli_query($conn,"SELECT * FROM transporter_payment WHERE transporter = '$num' AND ent_date between '$from' and '$to'; " );



echo "<table id='datatable1' class='table display responsive nowrap' >
<tr>
<td align=center> <b>S.No</b></td>
<td align=center> <b>Date</b></td>

<td align=center><b>Amount</b></td>
<td align=center><b>Payment Type</b></td>
<td align=center><b>Bill Number</b></td>
<td align=center><b>Details</b></td>
<td align=center><b>Actions</b></td>

</tr>
";



}





/*

$milage=mysqli_query($conn,"SELECT * FROM fuel WHERE vechnum = '$num' AND ent_date between '$from' and '$to'; " );*/





/*$data = mysqli_fetch_assoc($result);
echo '<script>alert("'.$data['vechno'].'");</script>';*/

$i=1;
while($data=mysqli_fetch_array($result))
{   
/*    echo '<script>alert("'.$data.'");</script>';*/

/*echo '<script>alert("'.$tripid.'");</script>';*/


echo "<tr>";

echo "<td align=center>".$i."</td>";
      $newDate = date("d-m-Y", strtotime($data['ent_date']));   
                  


    echo "<td align=center>".$newDate."</td>";


                  if($num=="all")
                  {
 echo "<td align=center>".$data['transporter']."</td>";
                  }



        echo "<td align=center>".$data['amount']."</td>";


      echo "<td align=center>".$data['pay_type']."</td>";
      echo "<td align=center>".$data['bill_id']."</td>";
      echo "<td align=center>".$data['remarks']."</td>";

           echo '<td><a class="iconp" href="voucher_print.php?id='.$data['id'].'&type=transporter" target="_blank"><i class="icon ion-search tx-16"></i></a>

<a  class="idelete iconp" href="view_transp_payment.php?id='.$data['id'].'&flag=Delete"><i class="icon ion-trash-a tx-16"></i></a>
           </td>';

  
    echo "</tr>";


/*echo '<script>alert("'.$data['tripid'].'");</script>';*/



$i++;
}
 
echo "</table>";





}

  




/*CuSTOMER PAYMENT DETAILS FETCH*/


else if($_POST["action"]=="customer_Fetch")
{




$num = $_POST["num"];
$from = $_POST["fdate"];
$to= $_POST["tdate"];
/*echo '<script>alert("'.$num.'");</script>';
echo '<script>alert("'.$from.'");</script>';
echo '<script>alert("'.$to.'");</script>';*/

if($num=="all")
{

$result=mysqli_query($conn,"SELECT * FROM customer_payment WHERE  ent_date between '$from' and '$to'; " );



echo "<table id='datatable1' class='table display responsive nowrap' >
<tr>
<td align=center> <b>S.No</b></td>
<td align=center> <b>Date</b></td>
<td align=center> <b>Transporter</b></td>
<td align=center><b>Amount</b></td>
<td align=center><b>Payment Type</b></td>
<td align=center><b>Bill Number</b></td>
<td align=center><b>Details</b></td>
<td align=center><b>Actions</b></td>


</tr>
";
}
else
{


$result=mysqli_query($conn,"SELECT * FROM customer_payment WHERE cust_id = '$num' AND ent_date between '$from' and '$to'; " );



echo "<table id='datatable1' class='table display responsive nowrap' >
<tr>
<td align=center> <b>S.No</b></td>
<td align=center> <b>Date</b></td>

<td align=center><b>Amount</b></td>
<td align=center><b>Payment Type</b></td>
<td align=center><b>Invoice Number</b></td>
<td align=center><b>Details</b></td>
<td align=center><b>Actions</b></td>

</tr>
";



}





/*

$milage=mysqli_query($conn,"SELECT * FROM fuel WHERE vechnum = '$num' AND ent_date between '$from' and '$to'; " );*/





/*$data = mysqli_fetch_assoc($result);
echo '<script>alert("'.$data['vechno'].'");</script>';*/

$i=1;
while($data=mysqli_fetch_array($result))
{   
/*    echo '<script>alert("'.$data.'");</script>';*/

/*echo '<script>alert("'.$tripid.'");</script>';*/


echo "<tr>";

echo "<td align=center>".$i."</td>";
      $newDate = date("d-m-Y", strtotime($data['ent_date']));   
                  


    echo "<td align=center>".$newDate."</td>";


                  if($num=="all")
                  {
 echo "<td align=center>".$data['cust_id']."</td>";
                  }



        echo "<td align=center>".$data['amount']."</td>";


      echo "<td align=center>".$data['pay_type']."</td>";
      echo "<td align=center>".$data['invoice_no']."</td>";
      echo "<td align=center>".$data['remarks']."</td>";

           echo '<td><a class="iconp" href="voucher_print.php?id='.$data['id'].'&type=customer" target="_blank"><i class="icon ion-search tx-16"></i></a>

<a  class="idelete iconp" href="view_transp_payment.php?id='.$data['id'].'&flag=Delete"><i class="icon ion-trash-a tx-16"></i></a>
           </td>';

  
    echo "</tr>";


/*echo '<script>alert("'.$data['tripid'].'");</script>';*/



$i++;
}
 
echo "</table>";





}




?>

