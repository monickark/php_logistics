<?php
include('../include/dbConnect.php');
require('../include/basefunctions.php');


$data = new Basefunc;  
 if($_POST["action"]=="Fetch")

{
$total=0;


$num = $_POST["num"];

/*
echo '<script>alert("'.$num.'");</script>';
echo '<script>alert("'.$from.'");</script>';
echo '<script>alert("'.$to.'");</script>';*/

echo "<table id='datatable1' class='table display responsive nowrap' >
<tr>

<td align=center> <b>Date</b></td>

<td align=center><b>Goods Value</b></td>
<td align=center><b>Reference ID</b></td>
<td align=center><b>Frieght Amount</b></td>
<td align=center><b>Payment</b></td>
<td align=center><b>Balance</b></td>
</tr>
";

/*$result=mysqli_query($conn,"SELECT * FROM customer WHERE id = '$num'; " );

$data = mysqli_fetch_assoc($result);
*/

$frieght=mysqli_query($conn,"SELECT * FROM party_calculation WHERE cust_id ='".$num."' AND NOT balance = 0;" );

while($frt = mysqli_fetch_assoc($frieght))
{

/*$load_que=mysqli_query($conn,"SELECT * FROM frieghtdetails WHERE tripid = '".$frt['tripid']."';" );

$load = mysqli_fetch_assoc($load_que);*/

/*$data = mysqli_fetch_assoc($result);
echo '<script>alert("'.$data['vechno'].'");</script>';*/
  
    echo "<tr>";

     $newDate = date("d-m-Y", strtotime($frt['bill_ent_date']));  
                

    echo "<td align=center>".$newDate."</td>";

$gc_qry=mysqli_query($conn,"SELECT * FROM gc_details WHERE tripid = '".$frt['tripid']."';" );

$gc = mysqli_fetch_assoc($gc_qry);



echo "<td align=center>".$gc['value']."</td>";

echo "<td align=center ><a href='trip_report.php?tripid=".$frt['tripid']." target='_blank'>".$frt['tripid']."</td>";

 echo "<td align=center>".$frt['amount']."</td>";

 echo "<td align=center>".$frt['payment']."</td>";
 echo "<td align=center>".$frt['balance']."</td>";
    

   echo "</tr>";
   $total=$frt['balance']+$total;

}
echo"<tr> ";
      echo"<td></td> ";
       echo"<td></td> ";
        echo"<td></td> ";
         echo"<td></td> ";
          echo"<td><b>Total Balance</b></td> ";
           echo"<td>$total</td> ";
   echo"</tr> ";



echo "</table>";
echo"<input type='hidden' id='total_balance' value='".$total."'>";



}
else if($_POST["action"]=="Calc")
{

$num = $_POST["num"];
$value=$_POST["value"];
/*echo '<script>alert("'.$value.'");</script>';*/



echo "<table id='datatable1' class='table display responsive nowrap' >
<tr>

<td align=center> <b>Date</b></td>

<td align=center><b>Goods Value</b></td>
<td align=center><b>Reference ID</b></td>
<td align=center><b>Frieght Amount</b></td>
<td align=center><b>Payment</b></td>
<td align=center><b>Balance</b></td>
</tr>
";

$frieght=mysqli_query($conn,"SELECT * FROM party_calculation WHERE cust_id ='".$num."' AND NOT balance = 0;" );
$total_bal=0;
while($frt = mysqli_fetch_assoc($frieght))
{


$bal=0;
$payment=0;
/*$load_que=mysqli_query($conn,"SELECT * FROM frieghtdetails WHERE tripid = '".$frt['tripid']."';" );

$load = mysqli_fetch_assoc($load_que);*/

/*$data = mysqli_fetch_assoc($result);
echo '<script>alert("'.$data['vechno'].'");</script>';*/
  
    echo "<tr>";
    echo "<td align=center>".$frt['bill_ent_date']."</td>";

$gc_qry=mysqli_query($conn,"SELECT * FROM gc_details WHERE tripid = '".$frt['tripid']."';" );

$gc = mysqli_fetch_assoc($gc_qry);

if($total_bal<=0)
{
if($total_bal<0)
{

	$tot_bal=0;
}
$payment=$frt['payment']+$value;



$bal=$frt['balance']-$value;

$inter=$bal;

if($bal<0)
{

$value=abs($bal);
$bal=0;

if($bal==0)
{

	$payment=$frt['amount'];
}

}
$total_bal=$bal;
if($inter==0)
{

$total_bal=1;
}


$pay=$payment;

}
else{
$pay=0;
$bal=$frt['amount'];
}


echo "<td align=center>".$gc['value']."</td>";

echo "<td align=center ><a href='trip_report.php?tripid=".$frt['tripid']." target='_blank'>".$frt['tripid']."</td>";

 echo "<td align=center>".$frt['amount']."</td>";

 echo "<td align=center>".$pay."</td>";

 echo "<td align=center>".$bal."</td>";
    


   echo "</tr>";


  
   
   $total=$bal+$total;
}

 echo"<tr> ";
      echo"<td></td> ";
       echo"<td></td> ";
        echo"<td></td> ";
         echo"<td></td> ";
          echo"<td><b>Total Balance</b></td> ";
           echo"<td>$total</td> ";
   echo"</tr> ";


echo "</table>";

echo"<input type='hidden' id='total_balance' value='".$total."'>";

}
else if($_POST["action"]=="Insert")
{


	$num = $_POST["num"];
$value=$_POST["value"];
$pay_t=$_POST["pay_type"];

$frieght=mysqli_query($conn,"SELECT * FROM party_calculation WHERE cust_id ='".$num."' AND NOT balance = 0;" );

while($frt = mysqli_fetch_assoc($frieght))
{

	$bal=$frt['balance']-$value;

	if($bal<0)
	{
	$payment=$value+$bal;
	$value=abs($bal);
	$bal=0;  
$id=$frt['id'];
$uid = array(
 "id"          =>     mysqli_real_escape_string($data->con, $id)

);
$party = array(

"payment"   =>    mysqli_real_escape_string($data->con, $payment),
"balance"   =>    mysqli_real_escape_string($data->con, $bal)
);

 $insid = $data->update('party_calculation',$party,$uid);

$date=date('Y-m-d');

$pay_entry = array(   
      "intAdminId"      =>     mysqli_real_escape_string($data->con, $_SESSION['MintId']),
      "party"           =>     mysqli_real_escape_string($data->con, $num),  
      "amount"          =>     mysqli_real_escape_string($data->con, $payment), 
      "pay_type"        =>     mysqli_real_escape_string($data->con, $pay_t), 
      "ent_date"        =>     mysqli_real_escape_string($data->con, $date)
     
      );  


       $ins = $data->insert('party_payments', $pay_entry);




	}
	else if($bal>=0)
	{
		$prev_pay=$frt['payment'];
	$payment=$value+$prev_pay;
$id=$frt['id'];
$uid = array(
 "id"          =>     mysqli_real_escape_string($data->con, $id)

);
$party = array(

"payment"   =>    mysqli_real_escape_string($data->con, $payment),
"balance"   =>    mysqli_real_escape_string($data->con, $bal)
);

 $insid = $data->update('party_calculation',$party,$uid);
$date=date('Y-m-d');

$pay_entry = array(   
      "intAdminId"      =>     mysqli_real_escape_string($data->con, $_SESSION['MintId']),
      "party"           =>     mysqli_real_escape_string($data->con, $num),  
      "amount"          =>     mysqli_real_escape_string($data->con, $payment), 
      "ent_date"        =>     mysqli_real_escape_string($data->con, $date)
     
      );  


       $ins = $data->insert('party_payments', $pay_entry);




 break;
	
	}


}


if($insid)
{
	echo"Entry Done";
}
else
{

	echo"fail";
}
}

else if($_POST["action"]=="pay_Fetch")
{

$comp=$_POST["num"];

echo '<script>alert("'.$comp.'");</script>';



if($comp=="all")
{

$result=mysqli_query($conn,"SELECT load_det.*,hire_load.* FROM load_det,hire_load");

}
else
{
$result=mysqli_query($conn,"SELECT * FROM load_det WHERE party_name = '$comp'" );
}






echo "<div class='table-responsive'>
            <table class='table table-hover table-bordered mg-b-0 '>
              <thead class='bg-info'>
                <tr>
                 <td><label class='ckbox mg-b-0'>
                      <input type='checkbox'   id='checkAll' ><span></span>
                    </label>
                  </td>
                  </th>
                  <th>S.No</th>
                   <th>Trip Invoice No.</th>
                   <th>Invoice Date</th>
                   <th>Container Number</th>
                  <th>To Place</th>
                  <th>Trip Amount</th>
                  <th>Advance</th>
                  <th>Balance Amount</th>
          

                </tr>
              </thead>
              <tbody>
";



/*echo "<table id='datatable1' class='table display responsive nowrap' >
<tr>
<td align=center> <b>No.</b></td>
<td align=center><b>Transporter</b></td>
<td align=center><b>No. of Trips</b></td>
<td align=center><b>Amount</b></td>
</tr>
";*/

/*$data = mysqli_fetch_assoc($result);
echo '<script>alert("'.$data['vechno'].'");</script>';*/


$i=1;
$no=0;

while($data = mysqli_fetch_array($result))
{   

/*
echo '<script>alert("'.$data['tripid'].'");</script>';
*/
$check_pod=mysqli_query($conn,"SELECT * FROM pod WHERE tripid = '".$data['tripid']."'  " );



if(!empty(mysqli_num_rows($check_pod)))
{


$pod=mysqli_fetch_assoc($check_pod);







$balance=0;
$total=0;
$already=0;
$total_paid=0;

/*$result_calc=mysqli_query($conn,"SELECT * FROM customer_payment WHERE invoice_no = '".$data['tripid']."'  " );
while($frt = mysqli_fetch_assoc($result_calc))
{   
 $total_paid=$frt['amount']+$total_paid;
   }*/

$frt_det=mysqli_query($conn,"SELECT * FROM frieghtdetails WHERE tripid = '".$data['tripid']."'  " );

$freight = mysqli_fetch_assoc($frt_det);

$ld_det=mysqli_query($conn,"SELECT * FROM load_det WHERE tripid = '".$data['tripid']."'  " );

$load = mysqli_fetch_assoc($ld_det);

$halt_crgs= mysqli_query($conn,"SELECT * FROM halt_entry WHERE tripid = '" .$data['tripid']. "';");

$halt=mysqli_fetch_assoc($halt_crgs);

$total=$freight['amount']+$freight['loading_charge']+$freight['unloading_charge']+$freight['weight_bill_charge']+$halt['cost'];

/*echo '<script>alert("'.$total.'");</script>';*/

$already=$freight['advance_cash_amount'];


/*echo '<script>alert("'.$already.'");</script>';*/

$balance=$total-$already;


/*echo '<script>alert("'.$balance.'");</script>';*/

$check_bill=mysqli_query($conn,"SELECT * FROM customer_bill_det WHERE trip_invoice = '".$data['tripid']."'  " );
if(mysqli_num_rows($check_bill)==0)

{


        $newDate = date("d-m-Y", strtotime($pod['ent_date']));


if($balance!=0)
{
   echo "<tr>";
     echo " <td class='ckb'><label class='ckbox mg-b-0'>
                      <input type='checkbox'  class='ck' name='chk[]' value='".$data['tripid'] ."' ><span></span>
                    </label>
                  </td>";
    echo "<td align=center>".$i."</td>";
    echo "<td align=center>".$pod['id']."</td>";
echo "<td align=center>".$newDate."</td>";
echo "<td align=center>".$load['cont_no']."</td>";
echo "<td align=center>".$load['to_place']."</td>";
 echo "<td align=center>".$total."</td>";
  
      echo "<td align=center>".$already."<input type='hidden' id='adv".$data['tripid']."' name='paid[]' value='".$already."' > </td></td>";
        echo "<td align=center>".$balance."<input type='hidden' id='bill".$data['tripid']."' name='billing[]' value='".$total."' > </td>";
/*echo"<input type='text' id='adv".$data['tripid']."' name='paid[]' value='".$already."' >";*/
 /* echo '<td><a class="iconp" href="customer_bill.php?trip='.$data["tripid"].'"><i class="icon ion-search tx-16"></i></a></td>';*/
    echo "</tr>";
    $i++;
$no++;
}
}
}

}




$hire_det=mysqli_query($conn,"SELECT * FROM hire_load WHERE party_name = '$comp';");
while($data = mysqli_fetch_array($hire_det))
{   




$check_pod=mysqli_query($conn,"SELECT * FROM pod WHERE tripid = 'h_".$data['id']."'  " );



if(!empty(mysqli_num_rows($check_pod)))
{


$pod=mysqli_fetch_assoc($check_pod);







$balance=0;
$total=0;
$already=0;
$total_paid=0;

/*$result_calc=mysqli_query($conn,"SELECT * FROM customer_payment WHERE invoice_no = '".$data['tripid']."'  " );
while($frt = mysqli_fetch_assoc($result_calc))
{   
 $total_paid=$frt['amount']+$total_paid;
   }*//*echo '<script>alert("'.$data['id'].'");</script>';*/

$frt_det=mysqli_query($conn,"SELECT * FROM hire_freight WHERE hire_id = '".$data['id']."'  " );

$freight = mysqli_fetch_assoc($frt_det);

$ld_det=mysqli_query($conn,"SELECT * FROM hire_load WHERE id = '".$data['id']."'  " );

$load = mysqli_fetch_assoc($ld_det);

/*$halt_crgs= mysqli_query($conn,"SELECT * FROM halt_entry WHERE tripid = '" .$data['id']. "';");

$halt=mysqli_fetch_assoc($halt_crgs);*/

$total=$freight['amount']+$freight['loading_charge']+$freight['unloading_charge']+$freight['weight_bill_charge']/*+$halt['cost']*/;

/*echo '<script>alert("'.$total.'");</script>';*/

$already=$freight['advance_cash_amount'];


/*echo '<script>alert("'.$already.'");</script>';*/

$balance=$total-$already;


/*echo '<script>alert("'.$balance.'");</script>';*/

$check_bill=mysqli_query($conn,"SELECT * FROM customer_bill_det WHERE trip_invoice = '".$data['id']."'  " );
if(mysqli_num_rows($check_bill)==0)

{


        $newDate = date("d-m-Y", strtotime($pod['ent_date']));


if($balance!=0)
{
   echo "<tr>";
     echo " <td class='ckb'><label class='ckbox mg-b-0'>
                      <input type='checkbox'  class='ck' name='chk[]' value='h_".$data['id'] ."' ><span></span>
                    </label>
                  </td>";
    echo "<td align=center>".$i."</td>";
    echo "<td align=center>".$pod['id']."</td>";
echo "<td align=center>".$newDate."</td>";
echo "<td align=center>".$load['cont_no']."</td>";
echo "<td align=center>".$load['to_place']."</td>";
 echo "<td align=center>".$total."</td>";
  
      echo "<td align=center>".$already."<input type='hidden' id='advh_".$data['id']."' name='paid[]' value='".$already."' > </td></td>";
        echo "<td align=center>".$balance."<input type='hidden' id='billh_".$data['id']."' name='billing[]' value='".$total."' > </td>";
/*echo"<input type='text' id='adv".$data['id']."' name='paid[]' value='".$already."' >";*/
 /* echo '<td><a class="iconp" href="customer_bill.php?trip='.$data["tripid"].'"><i class="icon ion-search tx-16"></i></a></td>';*/
    echo "</tr>";
    $i++;
$no++;
}
}
}

}









 

 
echo "</tbody>";
echo "</table>";
?>
<script>
 $("#checkAll").click(function () {
     $('input:checkbox').not(this).prop('checked', this.checked);
 });

</script>
<?php


}

else if($_POST["action"]=="pay_bill_Fetch")
{

$comp=$_POST["num"];
/*
echo '<script>alert("'.$comp.'");</script>';*/



if($comp=="all")
{
/*
$result=mysqli_query($conn,"SELECT DISTINCT billing_id,amount,advance,cust_id,ent_date,balance,trip_invoice FROM customer_bill_det");
*/
$result=mysqli_query($conn,"SELECT DISTINCT billing_id FROM customer_bill_det");
}
else
{
/*$result=mysqli_query($conn,"SELECT DISTINCT billing_id,amount,advance,cust_id,ent_date,balance,trip_invoice FROM customer_bill_det WHERE cust_id = '$comp'  " );*/
$result=mysqli_query($conn,"SELECT DISTINCT billing_id FROM customer_bill_det WHERE cust_id = '$comp'  " );
/*$result=mysqli_query($conn,"SELECT * FROM customer_bill_det WHERE cust_id = '$comp'  " );*/
}



if($_POST["contwse"]=="false")
{

echo "<div class='table-responsive'>
            <table class='table table-hover table-bordered mg-b-0 '>
              <thead class='bg-info'>
                <tr>
                 <td><label class='ckbox mg-b-0'>
                      <input type='checkbox'   id='checkAll' ><span></span>
                    </label>
                  </td>
                  </th>
                  <th>S.No</th>
                   <th>Bill No.</th>
                  <th>Bill Date</th>
                  <th>Bill Amount</th>
                  <th>Paid Amount</th>
                  <th>Balance Amount</th>
          

                </tr>
              </thead>
              <tbody>
";



/*echo "<table id='datatable1' class='table display responsive nowrap' >
<tr>
<td align=center> <b>No.</b></td>
<td align=center><b>Transporter</b></td>
<td align=center><b>No. of Trips</b></td>
<td align=center><b>Amount</b></td>
</tr>
";*/

/*$data = mysqli_fetch_assoc($result);
echo '<script>alert("'.$data['vechno'].'");</script>';*/


$i=1;
$no=0;

while($data2 = mysqli_fetch_array($result))
{   

/*
echo '<script>alert("'.$data['id'].'");</script>';
*/
/*$check_pod=mysqli_query($conn,"SELECT * FROM customer_bill_det WHERE trip_invoice = '".$data['id']."'  " );

*/


$result2=mysqli_query($conn,"SELECT * FROM customer_bill_det WHERE billing_id = '".$data2['billing_id']."' ORDER BY billing_id DESC LIMIT 1  " );
/*echo "SELECT * FROM customer_bill_det WHERE billing_id = '".$data['billing_id']."' DESC LIMIT 1  ";*/
$data = mysqli_fetch_array($result2);


$balance=0;
$total=0;
$already=0;
$total_paid=0;

$result_calc=mysqli_query($conn,"SELECT * FROM customer_payment WHERE invoice_no = '".$data['billing_id']."'  " );
while($frt = mysqli_fetch_assoc($result_calc))
{   
 $total_paid+=$frt['amount'];
   }

$already=$data['advance']+$total_paid;

$balance=$data['amount']-$already;


/*echo '<script>alert("'.$balance.'");</script>';*/


if($balance!=0)
{
   echo "<tr>";
     echo " <td class='ckb'><label class='ckbox mg-b-0'>
                      <input type='checkbox'  class='ck' name='chk[]' value='".$data['billing_id'] ."' ><span></span>
                    </label>
                  </td>";
    echo "<td align=center>".$i."</td>";
    echo "<td align=center>".$data['billing_id']."</td>";
echo "<td align=center>".$data['ent_date']."</td>";

 echo "<td align=center>".$data['amount']."</td>";
  
      echo "<td align=center>".$already."</td></td>";
        echo "<td align=center>".$balance."<input type='hidden' id='bill".$data['billing_id']."' name='billing[]' value='".$balance."' > </td>";
/*echo"<input type='text' id='adv".$data['id']."' name='paid[]' value='".$already."' >";*/
 /* echo '<td><a class="iconp" href="customer_bill.php?trip='.$data["tripid"].'"><i class="icon ion-search tx-16"></i></a></td>';*/
    echo "</tr>";
    $i++;
$no++;

}

}
}
else if($_POST["contwse"]=="true")
{
//For Container Wise





if($comp=="all")
{
/*
$result=mysqli_query($conn,"SELECT DISTINCT billing_id,amount,advance,cust_id,ent_date,balance,trip_invoice FROM customer_bill_det");*/

$result=mysqli_query($conn,"SELECT * FROM customer_bill_det");

}
else
{
$result=mysqli_query($conn,"SELECT * FROM customer_bill_det WHERE cust_id = '$comp'  " );

/*$result=mysqli_query($conn,"SELECT * FROM customer_bill_det WHERE cust_id = '$comp'  " );*/
}





echo "<div class='table-responsive'>
            <table class='table table-hover table-bordered mg-b-0 '>
              <thead class='bg-info'>
                <tr>
                 <td><label class='ckbox mg-b-0'>
                      <input type='checkbox'   id='checkAll' ><span></span>
                    </label>
                  </td>
                  </th>
                  <th>S.No</th>
                   <th>Bill No.</th>
                   <th>Container Number</th>
                  <th>Bill Date</th>
                  <th>Bill Amount</th>
                  <th>Paid Amount</th>
                  <th>Balance Amount</th>
          

                </tr>
              </thead>
              <tbody>
";



/*echo "<table id='datatable1' class='table display responsive nowrap' >
<tr>
<td align=center> <b>No.</b></td>
<td align=center><b>Transporter</b></td>
<td align=center><b>No. of Trips</b></td>
<td align=center><b>Amount</b></td>
</tr>
";*/

/*$data = mysqli_fetch_assoc($result);
*/
/*echo '<script>alert("'.$data['trip_invoice'].'");</script>';*/

$i=1;
$no=0;

while($data = mysqli_fetch_array($result))
{   

if(is_numeric($data['trip_invoice']))
{
  $get_container=mysqli_query($conn,"SELECT * FROM load_det WHERE tripid = '".$data['trip_invoice']."'  " );

$gc=mysqli_fetch_array($get_container);

$loda_det=mysqli_query($conn,"SELECT * FROM frieghtdetails WHERE tripid = '".$data['trip_invoice']."'  " );

$ld_det=mysqli_fetch_array($loda_det);





$balance=0;
$total=0;
$already=0;
$total_paid=0;

$result_calc=mysqli_query($conn,"SELECT * FROM container_payment WHERE cont_nos = '".$gc['cont_no']."'  " );
while($frt = mysqli_fetch_assoc($result_calc))
{   
 $total_paid+=$frt['paid_amt'];
   }

$already=$ld_det['advance_cash_amount']+$total_paid;

$balance=$ld_det['total_freight']-$already;

$bill_amt=$ld_det['total_freight'];


}
else
{

 $value= str_replace('h_', '', $data['trip_invoice']);
   $get_container=mysqli_query($conn,"SELECT * FROM hire_load WHERE id = '".$value."'  " );

$gc=mysqli_fetch_array($get_container); 

$loda_det=mysqli_query($conn,"SELECT * FROM hire_freight WHERE id = '".$value."'  " );

$ld_det=mysqli_fetch_array($loda_det);



$balance=0;
$total=0;
$already=0;
$total_paid=0;

$result_calc=mysqli_query($conn,"SELECT * FROM container_payment WHERE cont_nos = '".$gc['cont_no']."'  " );
while($frt = mysqli_fetch_assoc($result_calc))
{   
 $total_paid+=$frt['paid_amt'];
   }


$already=$ld_det['advance_cash_amount']+$total_paid;

$balance=$ld_det['total_freight']-$already;

$bill_amt=$ld_det['total_freight'];





}


/*
echo '<script>alert("'.$data['id'].'");</script>';
*/
/*$check_pod=mysqli_query($conn,"SELECT * FROM customer_bill_det WHERE trip_invoice = '".$data['id']."'  " );

*/
/*
$balance=0;
$total=0;
$already=0;
$total_paid=0;

$result_calc=mysqli_query($conn,"SELECT * FROM customer_payment WHERE invoice_no = '".$data['billing_id']."'  " );
while($frt = mysqli_fetch_assoc($result_calc))
{   
 $total_paid+=$frt['amount'];
   }

$already=$data['advance']+$total_paid;

$balance=$data['amount']-$already;
*/






/*echo '<script>alert("'.$balance.'");</script>';*/


if($balance!=0)
{
   echo "<tr>";
     echo " <td class='ckb'><label class='ckbox mg-b-0'>
                      <input type='checkbox'  class='ck' name='chk[]' value='".$gc['cont_no'] ."' ><span></span>
                    </label>
                  </td>";
    echo "<td align=center>".$i."</td>";
    echo "<td align=center>".$data['billing_id']."</td>";
    echo "<td align=center>".$gc['cont_no']."</td>";
echo "<td align=center>".$data['ent_date']."</td>";

 echo "<td align=center>".$bill_amt."</td>";
  
      echo "<td align=center>".$already."</td></td>";
        echo "<td align=center>".$balance."<input type='hidden' id='bill".$gc['cont_no']."' name='billing[]' value='".$balance."' > </td>";
/*echo"<input type='text' id='adv".$data['id']."' name='paid[]' value='".$already."' >";*/
 /* echo '<td><a class="iconp" href="customer_bill.php?trip='.$data["tripid"].'"><i class="icon ion-search tx-16"></i></a></td>';*/
    echo "</tr>";
    $i++;
$no++;

}

}
}






 

 
echo "</tbody>";
echo "</table>";
?>
<script>
 $("#checkAll").click(function () {
     $('input:checkbox').not(this).prop('checked', this.checked);
$('#container_wise').attr('checked', false);



 });

</script>

<script>
$(".ck").click(function(){
  /*alert("What??");*/
  $('#container_wise').attr('checked', false);
});


</script>

<?php

}
else if(!empty($_POST["customer"]))
 {



$cust=$_POST["customer"];
/*  echo '<script>alert("'.$cust.'");</script>';*/


$ledger=mysqli_query($conn,"SELECT * FROM ledgers WHERE name = '$cust'; " );

$led = mysqli_fetch_array($ledger);
?>
<center><strong>Advances</strong></center>
<?php
/*  echo '<script>alert("'.$led['id'].'");</script>';*/

$sort_led=mysqli_query($conn,"SELECT * FROM entryitems WHERE ledger_id = '".$led['id']."'; " );
while($sled=mysqli_fetch_assoc($sort_led))
{
/*
 echo '<script>alert("'.$led['id'].'");</script>';*/


$advances=mysqli_query($conn,"SELECT * FROM entries WHERE entrytype_id = '1' AND id = '".$sled['entry_id']."' AND narration='Advance Payment'; " );

$adv = mysqli_fetch_assoc($advances);
if(mysqli_num_rows($advances)!=0)
{

     $newDate = date("d-m-Y", strtotime($adv["date"]));

?>

<input type='checkbox'  class='ckb' name='check' value='<?php echo $adv["id"];?>' onclick="calculs(this)"><span><?php echo $adv["dr_total"]."<->".$newDate;?></span><br>





<?php
 }
}
?>
<script>
 $("#checkAll").click(function () {
     $('input:checkbox').not(this).prop('checked', this.checked);
 });

</script>
<?php
}

else if(!empty($_POST["voucher"]))
 {


$cust=$_POST["voucher"];

$state=$_POST["state"];

/*  echo '<script>alert("'.$cust.'");</script>';*/

$advances=mysqli_query($conn,"SELECT * FROM entries WHERE id = '$cust'; " );
$adv = mysqli_fetch_array($advances);

/*
echo '<script>alert("'.$state.'");</script>';*/

if($state == "true")
{
 $ent_date="Advance Payment Included";
  $bank = array(
        "narration"       =>     mysqli_real_escape_string($data->con, $ent_date)
      );  



 $update_id = array(
      "id"      =>    mysqli_real_escape_string($data->con, $cust)
    );

       $insid = $data->update('entries', $bank, $update_id);


}
else
{



 $ent_date="Advance Payment";
  $bank = array(
        "narration"       =>     mysqli_real_escape_string($data->con, $ent_date)
      );  


 $update_id = array(
      "id"      =>    mysqli_real_escape_string($data->con, $cust)
    );

       $insid = $data->update('entries', $bank, $update_id);

}


/*echo $adv["amount"];*/

$output->values = $adv["dr_total"];

/*echo $adv["amount"];*/

echo json_encode($output);



}
else
{
  echo"Nope ";
}

?>


