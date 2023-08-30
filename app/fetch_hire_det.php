<?php
require('../include/dbConnect.php');
require('../include/basefunctions.php');  
 include('../include/checklogin.php');

    $dat = new Basefunc;
 if($_POST["action"]=="Fetch")

{



$num = $_POST["num"];
/*echo '<script>alert("'.$num.'");</script>';*/
/**/
/*echo '<script>alert("'.$from.'");</script>';
echo '<script>alert("'.$to.'");</script>';*/

$result=mysqli_query($conn,"SELECT * FROM hire_load WHERE transporter = '$num'  " );








echo "<table id='datatable1' class='table display responsive nowrap' >
<tr>
<td align=center> <b>No.</b></td>
<td align=center><b>Transporter</b></td>
<td align=center><b>No. of Trips</b></td>
<td align=center><b>Amount</b></td>
</tr>
";
$i=1;
$no=0;
/*$data = mysqli_fetch_assoc($result);
echo '<script>alert("'.$data['vechno'].'");</script>';*/
while($data = mysqli_fetch_assoc($result))
{   
$no++;
$result_calc=mysqli_query($conn,"SELECT * FROM hire_hire WHERE id = '".$data['id']."'  " );
while($frt = mysqli_fetch_assoc($result_calc))
{   
 $total=$frt['hire_balance']+$total;
   }
}

$res=mysqli_query($conn,"SELECT * FROM hire_payment WHERE transporter = '$num'  " );

while($alr = mysqli_fetch_assoc($res))
{

$already=$alr['amount']+$already;

}

$total_bal=$total-$already;





    echo "<tr>";
    echo "<td align=center>".$i."</td>";
echo "<td align=center>".$num."</td>";

 echo "<td align=center>".$no."</td>";
        echo "<td align=center>".$total_bal."</td>";

  
    echo "</tr>";

 
echo "</table>";


$i++;


}
else if($_POST["action"]=="Insert") 
{
$transport = $_POST["transport"];
$date = $_POST["date"];
$amount = $_POST["amt"];
$pay = $_POST["pay_type"];


/*echo '<script>alert("'.$num.'");</script>';
echo '<script>alert("'.$transport.'");</script>';
echo '<script>alert("'.$date.'");</script>';
echo '<script>alert("'.$amount.'");</script>';
*/


$insert_hire = array(   
      "intAdminId"      =>     mysqli_real_escape_string($dat->con, $_SESSION['MintId']),
      "amount"          =>     mysqli_real_escape_string($dat->con, $amount),  
      "transporter"     =>     mysqli_real_escape_string($dat->con, $transport), 
      "pay_type"        =>     mysqli_real_escape_string($dat->con, $pay), 
      "date"            =>     mysqli_real_escape_string($dat->con, $date)
     
      );  


       $insid = $dat->insert('hire_payment', $insert_hire);

}


elseif ($_POST["action"]=="pay_Fetch") 
{
 $num = $_POST["num"];




/*echo '<script>alert("'.$num.'");</script>';*/
/**/
/*echo '<script>alert("'.$from.'");</script>';
echo '<script>alert("'.$to.'");</script>';*/
if($num=="all")
{
$result=mysqli_query($conn,"SELECT DISTINCT billingid,ent_date,transporter FROM transporter_billing " );



}
else
{
$result=mysqli_query($conn,"SELECT DISTINCT billingid,ent_date,transporter FROM transporter_billing WHERE transporter = '$num'  " );
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
                  <th>Date</th>
                  <th>Bill Amount</th>
                  <th>Paid Amount</th>
                  <th>Balance Amount</th>
                  <th>View Bill</th>

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
$i=1;
$no=0;
/*$data = mysqli_fetch_assoc($result);
echo '<script>alert("'.$data['vechno'].'");</script>';*/
while($data = mysqli_fetch_assoc($result))
{  

$total=0; 
$advance_pay=0;
$already=0;
$total_bal=0;

$bill_amt=0;





$result_calc=mysqli_query($conn,"SELECT * FROM transporter_billing WHERE billingid = '".$data['billingid']."'  " );
while($frt = mysqli_fetch_assoc($result_calc))
{   
 $total=$frt['bill_amount']+$total;
/* $advance_pay +=$frt['total_adv']; */
   }



/*
$advance=mysqli_query($conn,"SELECT * FROM trip_calculation WHERE billing_id = '".$data['billingid']."'  " );
while($adv = mysqli_fetch_assoc($advance))
{

$advance_pay =$advance_pay+$adv['total_adv']; 


}
*/



$res=mysqli_query($conn,"SELECT * FROM transporter_payment WHERE bill_id = '".$data['billingid']."'  " );

while($alr = mysqli_fetch_assoc($res))
{

$already=$alr['amount']+$already;

}





$total_bal=$total-$already;

$id_val=0;

if($total_bal!=0)
{

  $id_val='bill'.$data['billingid'];


/*echo $id_val;*/
$string = str_replace(' ', '', $id_val);

   echo "<tr>";
     echo " <td class='ckb'><label class='ckbox mg-b-0'>
                      <input type='checkbox'  class='ck' name='chk[]' value='".$data['billingid']."' ><span></span>
                    </label>
                  </td>";
    echo "<td align=center>".$i."</td>";
    echo "<td align=center>".$data['billingid']."</td>";
echo "<td align=center>".$data['ent_date']."</td>";

 echo "<td align=center>".$total."</td>";
  echo "<td align=center>".$already."</td>";
        echo "<td align=center>".$total_bal."<input type='hidden' id='".$string."' name='billing[]' value='".$total_bal."'></td>";

  echo '<td><a class="iconp" href="transporter_bill.php?bill='.$data["billingid"].'&session='.$_SESSION["name"].'&tran='.$data['transporter'].'" target="_blank"><i class="icon ion-search tx-16"></i></a></td>';
    echo "</tr>";
    $i++;
$no++;
}
}









 

 
echo "</tbody>";
echo "</table>";



}

else if ($_POST["action"]=="hire_pay_Fetch") 
{
 $num = $_POST["num"];



/*
echo '<script>alert("'.$num.'");</script>';*/

/*echo '<script>alert("'.$from.'");</script>';
echo '<script>alert("'.$to.'");</script>';*/
if($num=="all")
{
$result=mysqli_query($conn,"SELECT * FROM hire_load " );

}
else
{
$result=mysqli_query($conn,"SELECT * FROM hire_load WHERE transporter = '$num'  " );
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
                  <th>Invoice ID</th>
                  <th>Date</th>
                  <th>Rental Amount</th>
                  <th>Paid Amount</th>
                  <th>Balance Amount</th>
                  <th>View Bill</th>

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
$i=1;
$no=0;
/*$data = mysqli_fetch_assoc($result);
echo '<script>alert("'.$data['vechno'].'");</script>';*/
while($data = mysqli_fetch_assoc($result))
{   
$total_bal=0;
$total=0;
$adv=0;



$result_calc=mysqli_query($conn,"SELECT * FROM hire_hire WHERE hire_id = '".$data['id']."'  " );
while($frt = mysqli_fetch_assoc($result_calc))
{   
 $total+=$frt['hire_amount']+$frt['loading_charge']+$frt['unloading_charge']+$frt['weight_bill_charge']+$frt['other_amount'];
   $adv+=$frt['total_cash_advance']+$frt['chn_advance']+$frt['mkm_adv'];


   }


$hire_value=$total-$adv;



$already=0;
$res=mysqli_query($conn,"SELECT * FROM transporter_hire_payment WHERE bill_id = '".$data['id']."'  " );

while($alr = mysqli_fetch_assoc($res))
{

$already=$alr['amount']+$already;

}

$already+=$adv;

$total_bal=$total-$already;


$frt_dte = str_replace('/', '-', $data['ent_date']);

        $date_it = date("d-m-Y", strtotime($frt_dte));
/*

$date_it=$data['ent_date'];*/




if($total_bal!=0)
{
   echo "<tr>";
     echo " <td class='ckb'><label class='ckbox mg-b-0'>
                      <input type='checkbox'  class='ck' name='chk[]' value='".$data['id'] ."' ><span></span>
                    </label>
                  </td>";
    echo "<td align=center>".$i."</td>";
    echo "<td align=center>".$data['id']."</td>";
echo "<td align=center>".$date_it."</td>";

 echo "<td align=center>".$total."</td>";
  echo "<td align=center>".$already."</td>";
        echo "<td align=center>".$total_bal."<input type='hidden' id='bill".$data['id']."' name='billing[]' value='".$total_bal."' > </td>";

  echo '<td><a class="iconp" href="transporter_bill.php?bill='.$data["id"].'&session='.$_SESSION["name"].'&tran='.$data['transporter'].'&type=hire" target="_blank"><i class="icon ion-search tx-16"></i></a></td>';
    echo "</tr>";
    $i++;
$no++;
}
}

 

 
echo "</tbody>";
echo "</table>";



}




elseif ($_POST["action"]=="Fetch_bank") 
{


$num = $_POST["num"];
/*echo '<script>alert("'.$num.'");</script>';*/

$transpo=mysqli_query($conn,"SELECT * FROM transporters where name ='$num' " );

$trans = mysqli_fetch_assoc($transpo);
/*
echo '<script>alert("'.$trans["comp_id"].'");</script>';*/
$bank=mysqli_query($conn,"SELECT * FROM bank_records where cust_id ='".$trans["comp_id"]."' " );

while($bnk = mysqli_fetch_assoc($bank))
{

?>

  <option value="<?php echo $bnk["id"]; ?>"><?php echo $bnk["name"]."-".$bnk["accno"]; ?></option>
<?php

}

}

/*elseif ($_POST["action"]=="Fetch_bank_cust") 
{


$num = $_POST["num"];
//echo '<script>alert("'.$num.'");</script>';

$transpo=mysqli_query($conn,"SELECT * FROM customer where name ='$num' " );

$trans = mysqli_fetch_assoc($transpo);

//echo '<script>alert("'.$trans["comm_id"].'");</script>';
$bank=mysqli_query($conn,"SELECT * FROM bank_records where cust_id ='".$trans["comm_id"]."' " );

while($bnk = mysqli_fetch_assoc($bank))
{

?>

  <option value="<?php echo $bnk["id"]; ?>"><?php echo $bnk["name"]."-".$bnk["accno"]; ?></option>
<?php

}

}*/


?>

<!-- <script>
   $(function(){
      $('#chk').click(function(){
        var val = [];
        $(':checkbox:checked').each(function(i){

          val[i] = $(this).val();


          alert(val);

        });
      });
    });

</script> -->

<script>
 $("#checkAll").click(function () {
     $('input:checkbox').not(this).prop('checked', this.checked);
 });

</script>