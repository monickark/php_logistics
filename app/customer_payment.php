<?php include('../include/dbConnect.php'); ?>

<?php include('../include/checklogin.php'); ?>

<?php include('../include/adminheader.php'); ?>

<?php include('../include/header.php'); ?>

<?php include('../include/leftmenu.php');  
      require('../include/basefunctions.php');
?>





    <div class="am-mainpanel">

      <div class="am-pagetitle">

        <h5 class="am-title">Payment</h5>

        <!-- search-bar -->

      </div>

      <!-- am-pagetitle -->

        <form id="searchBar" class="search-bar"  method="POST" action="">

      <div class="am-pagebody">

 <div class="card pd-20 pd-sm-20 mg-t-20 form-layout form-layout-4">

       <div class="row row-sm mg-t-0">

          <div class="col-xl-12">

           

            <div class="portlet-body">

<?php

   $dat = new Basefunc;
if(isset($_POST['submit'])){
/*echo '<script>alert("enter");</script>';*/
$bal=0;
$count=count($_POST['bill_id']);
/*echo '<script>alert("'.$count.'");</script>'*/;


$date_rep = str_replace('/', '-', $_POST['payment_date']);

        $newDate = date("Y-m-d", strtotime($date_rep));


if($count!=0)
{
$curr_pay=$_POST['pay_amount'];
$c_count=0;
$bal_pay=0;


for($i=0;$i<$count;$i++)
{
$advance_amt=0;
$amount_pay=0;
$bal_pay=0;

$id =  $_POST['bill_id'][$i];



/*echo '<script>alert("'.$id.'");</script>';
*/
$check_billing=mysqli_query($conn,"SELECT * FROM customer_bill_det WHERE billing_id = '".$id."'" );

if(mysqli_num_rows($check_billing)==0)
{

$type="Container_wise";
$container_nos=$id;

$load_det=mysqli_query($conn,"SELECT * FROM load_det WHERE cont_no = '".$id."'  " );
if(mysqli_num_rows($load_det)==0)
{


$load_det=mysqli_query($conn,"SELECT * FROM hire_load WHERE cont_no = '".$id."'  " );

$ld_det=mysqli_fetch_assoc($load_det);

$tripid="h_".$ld_det['id'];

$load_frt=mysqli_query($conn,"SELECT * FROM hire_freight WHERE id = '".$id."'  " );

$frt=mysqli_fetch_assoc($load_frt);

$cont_value=$frt['total_freight'];
$advance_amt=$frt['advance_cash_amount'];


}
else
{
$ld_det=mysqli_fetch_assoc($load_det);
$tripid=$ld_det['tripid'];

$load_frt=mysqli_query($conn,"SELECT * FROM frieghtdetails WHERE tripid = '".$tripid."'  " );

$frt=mysqli_fetch_array($load_frt);

/*
echo '<script>alert("'.$tripid.'");</script>';*/


$cont_value=$frt['total_freight'];
$advance_amt=$frt['advance_cash_amount'];



}

$get_bill=mysqli_query($conn,"SELECT * FROM customer_bill_det WHERE trip_invoice = '".$tripid."'" );

$gb=mysqli_fetch_assoc($get_bill);

$id=$gb['billing_id'];
}
/*echo '<script>alert("'.$id.'");</script>';*/


//For Container Type Payment


if($type=="Container_wise")
{
$total_paid=0;


if($curr_pay>0)
{
$result_calc=mysqli_query($conn,"SELECT * FROM container_payment WHERE cont_nos = '".$container_nos."'  " );
while($frt = mysqli_fetch_assoc($result_calc))
{   
 $total_paid+=$frt['paid_amt'];
   }


/*echo '<script>alert("'.$curr_pay.'");</script>';*/

$advance_amt+=$total_paid;

$amount_pay=$cont_value-$advance_amt;

$bal_pay=$curr_pay-$amount_pay;

/*
echo '<script>alert("'.$bal_pay.'");</script>';
echo '<script>alert("'.$amount_pay.'");</script>';
echo '<script>alert("'.$total_paid.'");</script>';
echo '<script>alert("'.$advance_amt.'");</script>';
echo '<script>alert("'.$bal_pay.'");</script>';
die;*/


if($bal_pay>=0)
{


$insert_hire = array(   
     
      "cont_nos"         =>     mysqli_real_escape_string($dat->con, $container_nos), 
      "paid_amt"        =>     mysqli_real_escape_string($dat->con, $amount_pay),
      "bill_no"      =>     mysqli_real_escape_string($dat->con, $id), 
      "ent_date"      =>     mysqli_real_escape_string($dat->con, $newDate)
     
      );  


       $insidsas = $dat->insert('container_payment', $insert_hire);
}
else
{

$insert_hire = array(   
     
      "cont_nos"         =>     mysqli_real_escape_string($dat->con, $container_nos), 
      "paid_amt"        =>     mysqli_real_escape_string($dat->con, $curr_pay),
      "bill_no"      =>     mysqli_real_escape_string($dat->con, $id), 
      "ent_date"      =>     mysqli_real_escape_string($dat->con, $newDate)
     
      );  


       $insidsas = $dat->insert('container_payment', $insert_hire);

}
$curr_pay=$bal_pay;

}

}

if($type!="Container_wise")
{
  $c_count=0;
}



if($c_count==0)
{



$total_bill=0;
$adv=0;
$total_balance=0;

$balance=0;
$total_bill_bal=0;


/*---for Getting bill Details--*/
$result_calc=mysqli_query($conn,"SELECT DISTINCT amount,advance FROM customer_bill_det WHERE billing_id = '".$id."'  " );
$frt = mysqli_fetch_assoc($result_calc);
$bill_bal=$frt['amount']-$frt['advance'];



$total_pay=0;
$pay_verify=mysqli_query($conn,"SELECT * FROM customer_payment WHERE invoice_no = '".$id."'  " );
while($pay = mysqli_fetch_assoc($pay_verify))
{

$total_pay +=$pay['amount']; 


}


$total_bill_bal=$bill_bal-$total_pay;


if($i==0)
{
$bal=$_POST['pay_amount'];
$balance=$bal;
}
else
{
$balance=$bal;

}
/*echo '<script>alert("'.$bal.'");</script>';*/

$bal=$bal-$total_bill_bal;




if($bal<0)

  {
$amount=$balance;

}
else
{
$amount=$total_bill_bal;

}


if($_POST['billtype']=="Cash")
{

$acc_no="NULL";

}
else
{
$acc_no=$_POST['bank_name'];

}









/*
if($total_bill_bal>0)
{

$bal=$_POST['pay_amount']-$total_bill_bal;
if($bal>0)
{

$amt_pay=$_POST['pay_amount']-$bal;

}
else
{

  $amt_pay=$_POST['pay_amount'];
}



if($_POST['billtype']=="Cash")
{

$acc_no="NULL";

}
else
{
$acc_no=$_POST['bank_name'];

}*/


$insert_hire = array(   
      "intAdminId"      =>     mysqli_real_escape_string($dat->con, $_SESSION['MintId']),
      "cust_id"         =>     mysqli_real_escape_string($dat->con, $_POST['trans_name']),
      "amount"          =>     mysqli_real_escape_string($dat->con, $amount),  
      "pay_type"        =>     mysqli_real_escape_string($dat->con, $_POST['billtype']),
      "account_no"      =>     mysqli_real_escape_string($dat->con, $acc_no), 
      "invoice_no"      =>     mysqli_real_escape_string($dat->con, $id),
      "remarks"         =>     mysqli_real_escape_string($dat->con, $_POST['remarks']),
      "ent_date"        =>     mysqli_real_escape_string($dat->con, $newDate)
     
      );  


       $insid = $dat->insert('customer_payment', $insert_hire);



$total_value+=$amount;
$bill=$id;

/*
$vouc_type="Payment";


$pay_mode="Credit";

    $bank = array(
        "intAdminId"       =>     mysqli_real_escape_string($dat->con, $_SESSION['MintId']),
        "ledger_id"        =>     mysqli_real_escape_string($dat->con, $_POST['trans_name']),
         "ent_date"        =>     mysqli_real_escape_string($dat->con, $newDate),
         "pay_mode"         =>     mysqli_real_escape_string($dat->con, $pay_mode),
          "type"           =>     mysqli_real_escape_string($dat->con, $vouc_type),
        "amount"           =>     mysqli_real_escape_string($dat->con, $amount)
      ); 
 $bank_insert = $dat->insert('vouchers', $bank);*/



}


if($bill==$id)
{
$vouc_type="Payment for bill no ".$id;

}
else
{

$vouc_type="Payment for bill no ".implode($bill);
}

$findnos =mysqli_query($conn,"SELECT * FROM entries WHERE entrytype_id ='1' ORDER BY id DESC LIMIT 1; " );
$nos=mysqli_fetch_assoc($findnos);


$insert_hire = array(   
      "entrytype_id"      =>     mysqli_real_escape_string($dat->con, '1'),
      "number"         =>     mysqli_real_escape_string($dat->con, $nos['number']+1),
      "date"          =>     mysqli_real_escape_string($dat->con, $newDate),  
      "dr_total"        =>     mysqli_real_escape_string($dat->con, $total_value),
      "cr_total"      =>     mysqli_real_escape_string($dat->con, $total_value),
      "narration"    =>     mysqli_real_escape_string($dat->con, $vouc_type)
     
      );  


       $insstat = $dat->insert('entries', $insert_hire);



$cparty_name =mysqli_query($conn,"SELECT * FROM ledgers WHERE name ='" .$_POST['billtype']. "'; " );
$cparty_id=mysqli_fetch_assoc($cparty_name);



$insert_p1= array(   
      "entry_id"      =>     mysqli_real_escape_string($dat->con, $insstat),
      "ledger_id"         =>     mysqli_real_escape_string($dat->con, $cparty_id['id']),
      "amount"          =>     mysqli_real_escape_string($dat->con, $total_value),  
      "dc"        =>     mysqli_real_escape_string($dat->con, 'C')
      );  


       $insst1 = $dat->insert('entryitems', $insert_p1);

$dparty_name =mysqli_query($conn,"SELECT * FROM ledgers WHERE name ='" .$_POST["trans_name"]. "'; " );
$dparty_id=mysqli_fetch_assoc($dparty_name);


$insert_p2= array(   
      "entry_id"      =>     mysqli_real_escape_string($dat->con, $insstat),
      "ledger_id"         =>     mysqli_real_escape_string($dat->con, $dparty_id['id']),
      "amount"        =>     mysqli_real_escape_string($dat->con, $total_value),  
      "dc"           =>     mysqli_real_escape_string($dat->con, 'D')
      );  


       $insst2 = $dat->insert('entryitems', $insert_p2);









$account = mysqli_query($conn,"SELECT * FROM account_voucher WHERE acc_inv ='".$_POST['trans_name']."' ORDER  BY id DESC LIMIT  1"); 
$acc=mysqli_fetch_assoc($account);


if($acc['pay_mode']=="Payment Voucher")
{

/*
$acount=mysqli_query($conn,"SELECT * FROM payment_voucher WHERE id = '" . $det['mod_voucher_no'] . "' ORDER  BY id DESC LIMIT  1");
$acc=mysqli_fetch_assoc($acount);

$cl_bal=$acc['closing_bal'];*/


$check = mysqli_query($conn,"SELECT * FROM payment_voucher WHERE id = '" . $acc['mod_voucher_no'] . "' ORDER  BY id DESC LIMIT  1"); 
$op=mysqli_fetch_assoc($check);




}
elseif($acc['pay_mode']=="Receipt Voucher")
{
/*$acount=mysqli_query($conn,"SELECT * FROM recipt_voucher WHERE id = '" . $det['mod_voucher_no'] . "' ORDER  BY id DESC LIMIT  1");
$acc=mysqli_fetch_assoc($acount);

$cl_bal=$acc['closing_bal'];*/
$check = mysqli_query($conn,"SELECT * FROM recipt_voucher WHERE id = '" . $acc['mod_voucher_no'] . "' ORDER  BY id DESC LIMIT  1"); 
$op=mysqli_fetch_assoc($check);


}


if($op['closing_bal']==0)
{
$op_bal = mysqli_query($conn,"SELECT * FROM ledger WHERE name ='".$_POST['trans_name']."'");
$op_balance=mysqli_fetch_array($op_bal);

$last_op=$op_balance['opening_bal'];

}
else
{

$last_op=$op['closing_bal'];

}
/*$op=mysqli_fetch_array($check);*/








/*
For Payment Account*/


if($_POST['billtype']=="Cash")
{
  $led="Cash";
}
else
{

  $led=$_POST['bank_name'];
}

$check_acc = mysqli_query($conn,"SELECT * FROM account_voucher WHERE ledger_id ='".$led."' ORDER  BY id DESC LIMIT  1"); 
$op_acc=mysqli_fetch_assoc($check_acc);


/*$close=mysqli_num_rows($check);*/

/*echo '<script>alert("'.$op['closing_bal'].'");</script>';*/



if($op_acc['closing_bal']==0)
{
$op_bal_acc = mysqli_query($conn,"SELECT * FROM ledger WHERE name ='".$led."'");
$acc_op_balance=mysqli_fetch_array($op_bal_acc);

$last_op_acc=$acc_op_balance['opening_bal'];

}
else
{

$last_op_acc=$op_acc['closing_bal'];

}










$nat_chk=$op_bal = mysqli_query($conn,"SELECT * FROM ledger WHERE name ='".$_POST['trans_name']."'");
$nat=mysqli_fetch_array($op_bal);


if($nat['type']=="Cr")
{

$cl_bal=$last_op-$_POST['pay_amount'];

}
else
{

$cl_bal=$last_op+$_POST['pay_amount'];

}
$acc_close=$last_op_acc+$_POST['pay_amount'];





$type="Payment";



        $bank = array(
        "intAdminId"       =>     mysqli_real_escape_string($dat->con, $_SESSION['MintId']),
        "ledger_id"        =>     mysqli_real_escape_string($dat->con, $_POST['trans_name']),
        "ent_date"         =>     mysqli_real_escape_string($dat->con, $newDate),
        "type"             =>     mysqli_real_escape_string($dat->con, $type),
/*        "pay_mode"         =>     mysqli_real_escape_string($dat->con, $_POST['pay_mode']),*/
        "remarks"          =>     mysqli_real_escape_string($dat->con, $_POST['remarks']),
        "pay_type"         =>     mysqli_real_escape_string($dat->con, $_POST['billtype']),
        "bank_details"     =>     mysqli_real_escape_string($dat->con, $_POST['bank_name']),
        "cheque_no"        =>     mysqli_real_escape_string($dat->con, $_POST['cheqnos']),
        "closing_bal"      =>     mysqli_real_escape_string($dat->con, $cl_bal),
        "acc_inv"          =>     mysqli_real_escape_string($dat->con, $led),
        "amount"           =>     mysqli_real_escape_string($dat->con, $_POST['pay_amount'])
      ); 
 $bank_insert = $dat->insert('recipt_voucher', $bank);




$pay="Receipt Voucher";



        $account = array(
        "intAdminId"       =>     mysqli_real_escape_string($dat->con, $_SESSION['MintId']),
        "ledger_id"        =>     mysqli_real_escape_string($dat->con, $led),
        "ent_date"         =>     mysqli_real_escape_string($dat->con, $newDate),
        "type"             =>     mysqli_real_escape_string($dat->con, $type),

        "pay_mode"         =>     mysqli_real_escape_string($dat->con, $pay),
      /*  "remarks"          =>     mysqli_real_escape_string($dat->con, $_POST['remarks']),*/
        "pay_type"         =>     mysqli_real_escape_string($dat->con, $_POST['billtype']),
        "bank_details"     =>     mysqli_real_escape_string($dat->con, $_POST['bank_name']),
        "cheque_no"        =>     mysqli_real_escape_string($dat->con, $_POST['cheqnos']),
        "closing_bal"      =>     mysqli_real_escape_string($dat->con, $acc_close),
        "acc_inv"          =>     mysqli_real_escape_string($dat->con, $_POST['trans_name']),
        "mod_voucher_no"   =>     mysqli_real_escape_string($dat->con, $bank_insert),
        "amount"           =>     mysqli_real_escape_string($dat->con, $_POST['pay_amount'])
      ); 
 $acc_insert = $dat->insert('account_voucher', $account);

$c_count++;
}

/*


 "intAdminId"      =>     mysqli_real_escape_string($dat->con, $_SESSION['MintId']),
      "cust_id"         =>     mysqli_real_escape_string($dat->con, $_POST['trans_name']),
      "amount"          =>     mysqli_real_escape_string($dat->con, $amount),  
      "pay_type"        =>     mysqli_real_escape_string($dat->con, $_POST['billtype']),
      "account_no"      =>     mysqli_real_escape_string($dat->con, $acc_no), 
      "invoice_no"      =>     mysqli_real_escape_string($dat->con, $id),
      "remarks"         =>     mysqli_real_escape_string($dat->con, $_POST['remarks']),
      "ent_date"        =>     mysqli_real_escape_string($dat->con, $newDate)
*/




 if($insid){

        echo '<script> alert("Entry Done");window.location.assign("customer_payment.php");</script>';
      } 
      else{
        echo '<script> alert("Error in Entry");</script>';
      }




}
}
?>




<div class="modal fade" id="demoModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<!-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> -->
<form>
       <div class="row row-sm mg-t-10 col-lg-12 col-md-12">

          <div id="bill_cont" name="bill_cont" class="col-lg-12 col-md-12">
          </div>

      <div class="row mg-t-10 col-lg-12">
        <label class="col-md-5 form-control-label">Total Amount:</label>
        <div class="col-lg-7 mg-t-5 mg-sm-t-0">
          <input class="form-control" data-val="true" data-val-length="The field engineno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Remarks" id="total_val" maxlength="50" name="total_val" type="text" value="" readonly >
          <span class="field-validation-valid font-red" data-valmsg-for="engineno" data-valmsg-replace="true"></span>
        </div>
      </div>


 <div class="row mg-t-10 col-lg-12">
        <label class="col-md-5 form-control-label">Party:</label>
       <div class="col-lg-7 mg-t-5 mg-sm-t-0">
          <input class="form-control" data-val="true" data-val-length="The field engineno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Remarks" id="transporter_name" maxlength="50" name="trans_name" type="text" value="" readonly >
          <span class="field-validation-valid font-red" data-valmsg-for="engineno" data-valmsg-replace="true"></span>
        </div>
      </div>


<div class="row mg-t-10">
          <label class="col-md-4form-control-label">Payment Details</label>
  <div class="col-sm-10 mg-t-5 mg-sm-t-0 ">
           <div class="input-group">
              
              --------------------------------------------------------------------------- 
            </div>
        </div>
      </div>

<div class="row mg-t-10 col-lg-12">
          <label class="col-lg-5 form-control-label">Date:</label>
       <div class="col-lg-7 mg-t-5 mg-sm-t-0 ">
           <div class="input-group">
              <span class="input-group-addon"><i class="icon ion-calendar tx-16 lh-0 op-6"></i></span>
              <input class="form-control" placeholder="Cash Date" name="payment_date" id="idTourDateDetails" data-format="dd/MM/yyyy" type="text" value="<?php echo date('d/m/Y');?>" >
            </div>
        </div>
      </div>

<div class="row mg-t-10 col-lg-12">
        <label class="col-lg-5 form-control-label">Amount:</label>
         <div class="col-lg-7 mg-t-5 mg-sm-t-0">
          <input class="form-control" data-val="true" data-val-length="The field engineno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Amount Payable" id="pay_amount" maxlength="50" name="pay_amount" type="text" value="" onkeyup="amtcheck();"   required>
          <span class="field-validation-valid font-red" data-valmsg-for="engineno" data-valmsg-replace="true"></span>
        </div>
      </div>
<div class="row mg-t-10 col-lg-12">
        <label class="col-lg-5 form-control-label">Payment Type:</label>
 <div class="col-lg-7 mg-t-5 mg-sm-t-0">
             <select class="form-control valid" data-val="true" placeholder="Select bilty paid type" id="billtype" name="billtype" style="padding:0px 6px !important;" onchange="banks(this.value);">

<?php
$pay_type = mysqli_query($conn,"SELECT * FROM pay_type"); 
while($pay=mysqli_fetch_assoc($pay_type))
{



?>
 <option  value="<?php echo $pay['pay_type']?>"><?php echo $pay['pay_type']?></option>
<?php
}
?>



           
<!--             <option  value="Cheque">Cheque</option>
            <option value="DD">DD</option>
            <option value="NEFT">NEFT</option>
            <option value="RTGS">RTGS</option> -->
            
          </select>
          <span class="field-validation-valid font-red" data-valmsg-for="engineno" data-valmsg-replace="true"></span>
        </div></div>

<div class="row mg-t-10 col-lg-12">
        <label id="bank_id" class="col-lg-5 form-control-label">Account </label>
        <div class="col-lg-7 mg-t-5 mg-sm-t-0">
         <select class="form-control valid" data-val="true" placeholder="Select bilty paid type" id="bank_name" name="bank_name" style="padding:0px 6px !important;">
            <option  value="">Select Bank</option>
<?php
$nme=$_SESSION['name'];

/*$company = mysqli_query($conn,"SELECT * FROM companies WHERE name='$nme';"); 
$comp=mysqli_fetch_assoc($company);
*/
$banks_ser = mysqli_query($conn,"SELECT * FROM ledgers WHERE type = 1"); 
while($banks=mysqli_fetch_assoc($banks_ser))
{
?>
 <option  value="<?php echo $banks['name']?>"><?php echo $banks['name'];?></option>
<?php
}
?>
          </select>
          <span class="field-validation-valid font-red" data-valmsg-for="engineno" data-valmsg-replace="true"></span>
      </div></div>
<div class="row mg-t-10 col-lg-12" id="chqid">
        <label class="col-lg-5 form-control-label">Cheque No.:</label>
       <div class="col-lg-7 mg-t-5 mg-sm-t-0">
          <input class="form-control" data-val="true" data-val-length="The field engineno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Cheque/Transaction No." id="cheqnos" maxlength="50" name="cheqnos" type="text" value="">
          <span class="field-validation-valid font-red" data-valmsg-for="engineno" data-valmsg-replace="true"></span>
        </div>
      </div>
  
    
      <div class="row mg-t-10 col-lg-12">
        <label class="col-lg-5 form-control-label">Remarks:</label>
         <div class="col-lg-7 mg-t-5 mg-sm-t-0">
          <input class="form-control" data-val="true" data-val-length="The field engineno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Remarks" id="remark" maxlength="50" name="remarks" type="text" value="" >
          <span class="field-validation-valid font-red" data-valmsg-for="engineno" data-valmsg-replace="true"></span>
        </div>
      </div>

     


       
<div class="modal-footer">
<button type="button"  class="btn btn-default" data-dismiss="modal">Close</button>
<input type="submit" name="submit" value="submit" class="btn btn-primary">  
</div>

</div>
</form> 
</div> 
</div>
     
</div>
</div>


<script>

function amtcheck()
{ 

/*  alert(val);*/
var amt = $('#total_val').val();
var val = $('#pay_amount').val();

var filter=parseInt(val);
var filter_2=parseInt(amt);
/*alert(amt);
*/
if(filter>filter_2)
{
$(':input[type="submit"]').prop('disabled', true);

}
else
{


   $(':input[type="submit"]').prop('disabled', false);
}



}

</script>





 <script >
function banks(val)
{


if(val!="Cash")
{

$('#chqid').show();


/*var trans=$.session.get("name");

alert(trans);
alert("enter");
var act="Fetch_bank_cust";


$.ajax({
     url:"fetch_hire_det.php",
     method:"POST",
     dataType: "html",
     data: {action:act, num:trans},
     success:function(data)
     {
      alert(data);
      $("#bank_name").html(data);
      
       }
    });
*/


}
else
{



$('#chqid').hide();

}









}
</script>










<script>

  $(document).on('click', '#insert', function(){


var bills = $('#bill_nos').val(); 
/*
     alert(bills);*/
   var bill_val = $('#total_val').val();
   var dat = $('#idTourDateDetails').val();
   var transp = $('#transporter_name').val();
   var amount = $('#pay_amount').val();
   var pay_type= $('#billtype').val();
   var remark= $('#remark').val();
   var pay = pay_type+'-'+remark;

   
   var act="Insert";
/*
$.ajax({
     url:"fetch_hire_det.php",
     method:"POST",
     data:{amt:amount, date:dat, action:act, transport:transp,pay_type:pay },
     success:function(data)
     {
      alert(data);
      fetch_data();
      $('#demoModal').modal('hide');
       }
    });*/

  });
</script>




                                          <h6 class="card-body-title" style="">Customer Payment</h6>


                                                        <div class="row mg-t-10" >
                                                            
                                                                <label class="col-md-4 form-control-label">Customer:</label>
                                                                <div class="col-sm-3 mg-t-4 mg-sm-t-0">
                                                                  

<select onChange="fetch_data()"  name="cusCity" id="cusCity" class="form-control" >





<option value="">Select </option>
<option value="all">All</option>
<?php $query =mysqli_query($conn,"SELECT * FROM customer");
while($row=mysqli_fetch_array($query))
{ ?>

  <!-- Vehicle Number  Dropdown -->
<option value="<?php echo $row['name'];?>" ><?php echo $row['name'];?></option>
<?php
}
?>
</select>

                                                                    <span class="field-validation-valid font-red" data-valmsg-for="cityid" data-valmsg-replace="true"></span>
                                                              
                                                            </div>
                                                                <div class="col-sm-3 mg-t-4 mg-sm-t-0">
                                                                  <label class="col-xl-9 form-control-label ckbox cont-ckbox">
         <input type="checkbox" name="container_wise" class="" id="container_wise" onclick="fetch_data()">
                <span style="font-size: 20px;">Container Wise</span>
              </label>

</div>


                                                        </div>



                                                           <!--<div class="" style="padding-left:200px" id="hhdriverli">
                                                        </div>-->








<script>
function fetch_data(){

var name=$("#cusCity").val();

var act="pay_bill_Fetch";
if(name=="all")
{

$('#adding').attr('disabled', true);
}else
{

  $('#adding').attr('disabled', false);
}


var cont=$('#container_wise').is(':checked');

/*alert(cont);
*/
/*alert(from);

alert(to);
*/


$.ajax({
     url:"fetch_party_det.php",
     method:"POST",
     dataType: "html",
     data: {action:act, num:name,contwse:cont},
     success:function(data)
     {/*
      alert(data);*/
      $("#responsecontainer").html(data); 
      
       }
    });


}


</script>



 <div class="col-sm-12  mg-t-10" id="responsecontainer" style="text-align:  center;background:  #2d3a50;color:  #fff;padding: 5px 15px 5px;float:  left;width:  100%;/* line-height: 16px; */margin: 20px 0px 0px;">
                                                  
        <div class="col-sm-10 mg-t-5 mg-sm-t-0">



<script src="//netsh.pp.ua/upwork-demo/1/js/typeahead.js"></script>
<!--         <script>

  $(document).on('click', '#idTourDateDetails', function(){

$('.datepicker').datepicker({
    dateFormat: 'dd/mm/yy'
});



  });


        </script> -->

        <script>
$(function() {
    $( "#idTourDateDetails" ).datepicker();
});
</script>

 <div class="col-xl">
  
</div>
      </div>





                   </div>
                   <p>&nbsp</p>
<div align="right">
     <button type="button" name="add" id="adding" class="btn btn-info">Make Entry>></button>
    </div>

<script>
   $(function(){
      $('#adding').click(function(){
        var val = [];
        var value=[];
        var x=[];
        $('#demoModal').modal('show');
        $(':checkbox:checked:not("#checkAll")').each(function(i){


          val = $(this).val();
/*alert(i);*/
value[i]= $('#bill'+val).val();
/*alert(value);*/

 x[i]="<input type='hidden' id='bill_id' name='bill_id[]' value='"+val+"'>";


        });
        var c=value.length;
        /*alert(c);*/
var total=0;
for(var y=0;y<c;y++)
{
total=total+parseInt(value[y]);


}
var trans=$('#cusCity').val();

/*alert(total);*/



$('#transporter_name').val(trans);
$('#total_val').val(total);

$('#chqid').hide();
/*alert(x);*/
$('#bill_cont').html(x);

      });
    });

</script>
<!-- <script>
$(".ck").click(function(){
  alert("What??");
  $('#container_wise').attr('checked', false);
});


</script> -->


<!-- <script>
function testing(val)
{
/*  alert(val);*/

var value=val;



  return value;
}


</script> -->




                                  </div>


                                    </div>

          
        </div>
 
</div>
      </div><!-- am-pagebody -->
    </form>
      <?php 
      include('../include/adminfooter.php'); ?> 
    <!-- <script>
$('.datepicker').datepicker({
    dateFormat: 'dd/mm/yy'
});
</script> --> 