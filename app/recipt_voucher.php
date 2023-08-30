<?php include('../include/dbConnect.php'); ?>
<?php include('../include/checklogin.php'); ?>
<?php include('../include/adminheader.php'); ?>
<?php include('../include/header.php'); ?>
<?php include('../include/leftmenu.php'); 
require('../include/basefunctions.php');
?> 
<?php
$data = new Basefunc;  
if(isset($_POST['submit'])){/*
  *//*echo '<script> alert("Entered");</script>';
         $bnkname=$_POST['bankname'];
         $accno=$_POST['accountno']; 
         $ifsc=$_POST['ifsccode']; 
         $subgrp=$_POST['subgroupid'];
         $state=$_POST['stateid']; 
         $city=$_POST['cityid']; 
         $area=$_POST['areaid']; 
         $address=$_POST['address1']; 
         $pincode=$_POST['postcode']; 
*/
/*$datetime = date("Y-m-d H:i:s");*/
   // $varPin=$_POST['varPin'];
/*    $date = date("Y-m-d");*/
 if($_REQUEST['action'] == "Add"){
if($_POST['ledger_id']==""||$_POST['voucher_type']==""||$_POST['amount']=="")
{
  echo '<script> alert("Voucher Fields Must Not Be Empty.");</script>';
}
else
{
$date_rep = str_replace('/', '-', $_POST['voucher_date']);
        $newDate = date("Y-m-d", strtotime($date_rep));
/*For Paid Ledger*/
/*$check = mysqli_query($conn,"SELECT * FROM recipt_voucher WHERE ledger_id ='".$_POST['ledger_id']."' ORDER  BY id DESC LIMIT  1"); 
$op=mysqli_fetch_assoc($check);*/
/*$close=mysqli_num_rows($check);*/
/*echo '<script>alert("'.$op['closing_bal'].'");</script>';*/
$account = mysqli_query($conn,"SELECT * FROM account_voucher WHERE acc_inv ='".$_POST['ledger_id']."' ORDER  BY id DESC LIMIT  1"); 
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
$op_bal = mysqli_query($conn,"SELECT * FROM ledger WHERE name ='".$_POST['ledger_id']."'");
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
if($_POST['payment_type']=="Cash")
{
  $led="Cash";
}
else
{

  $led=$_POST['comp_bank_det'];
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
$nat_chk=$op_bal = mysqli_query($conn,"SELECT * FROM ledger WHERE name ='".$_POST['ledger_id']."'");
$nat=mysqli_fetch_array($op_bal);
if($nat['type']=="Cr")
{
$cl_bal=$last_op-$_POST['amount'];
}
else
{
$cl_bal=$last_op+$_POST['amount'];
}
$acc_close=$last_op_acc+$_POST['amount'];
       $bank = array(
        "intAdminId"       =>     mysqli_real_escape_string($data->con, $_SESSION['MintId']),
        "ledger_id"        =>     mysqli_real_escape_string($data->con, $_POST['ledger_id']),
        "ent_date"         =>     mysqli_real_escape_string($data->con, $newDate),
        "type"             =>     mysqli_real_escape_string($data->con, $_POST['voucher_type']),
/*        "pay_mode"         =>     mysqli_real_escape_string($data->con, $_POST['pay_mode']),*/
        "remarks"          =>     mysqli_real_escape_string($data->con, $_POST['remarks']),
        "pay_type"         =>     mysqli_real_escape_string($data->con, $_POST['payment_type']),
        "bank_details"     =>     mysqli_real_escape_string($data->con, $_POST['bank_det']),
        "cheque_no"        =>     mysqli_real_escape_string($data->con, $_POST['chq_nos']),
        "closing_bal"      =>     mysqli_real_escape_string($data->con, $cl_bal),
        "acc_inv"          =>     mysqli_real_escape_string($data->con, $led),
        "amount"           =>     mysqli_real_escape_string($data->con, $_POST['amount'])
      ); 
 $bank_insert = $data->insert('recipt_voucher', $bank);
$pay="Receipt Voucher";
        $account = array(
        "intAdminId"       =>     mysqli_real_escape_string($data->con, $_SESSION['MintId']),
        "ledger_id"        =>     mysqli_real_escape_string($data->con, $led),
        "ent_date"         =>     mysqli_real_escape_string($data->con, $newDate),
        "type"             =>     mysqli_real_escape_string($data->con, $_POST['voucher_type']),
        "pay_mode"         =>     mysqli_real_escape_string($data->con, $pay),
      /*  "remarks"          =>     mysqli_real_escape_string($data->con, $_POST['remarks']),*/
        "pay_type"         =>     mysqli_real_escape_string($data->con, $_POST['payment_type']),
        "bank_details"     =>     mysqli_real_escape_string($data->con, $_POST['bank_det']),
        "cheque_no"        =>     mysqli_real_escape_string($data->con, $_POST['chq_nos']),
        "closing_bal"      =>     mysqli_real_escape_string($data->con, $acc_close),
        "acc_inv"          =>     mysqli_real_escape_string($data->con, $_POST['ledger_id']),
        "mod_voucher_no"   =>     mysqli_real_escape_string($data->con, $bank_insert),
        "amount"           =>     mysqli_real_escape_string($data->con, $_POST['amount'])
      ); 
 $acc_insert = $data->insert('account_voucher', $account);
if($_POST['voucher_type']=="Advance Payment")
{
        $account = array(
        "intAdminId"       =>     mysqli_real_escape_string($data->con, $_SESSION['MintId']),
        "cust_id"          =>     mysqli_real_escape_string($data->con, $_POST['ledger_id']),
        "ent_date"         =>     mysqli_real_escape_string($data->con, $newDate),
        "voucher_type"     =>     mysqli_real_escape_string($data->con, $_POST['voucher_type']),
      /*  "pay_mode"         =>     mysqli_real_escape_string($data->con, $pay),*/
        "remarks"          =>     mysqli_real_escape_string($data->con, $_POST['remarks']),
        "pay_type"         =>     mysqli_real_escape_string($data->con, $_POST['payment_type']),
        "account_no"       =>     mysqli_real_escape_string($data->con, $_POST['bank_det']),
        /*"cheque_no"        =>     mysqli_real_escape_string($data->con, $_POST['chq_nos']),*/
        /*"closing_bal"      =>     mysqli_real_escape_string($data->con, $acc_close),*/
        /*"acc_inv"          =>     mysqli_real_escape_string($data->con, $_POST['ledger_id']),*/
        "vouch_id"         =>     mysqli_real_escape_string($data->con, $bank_insert),
        "amount"           =>     mysqli_real_escape_string($data->con, $_POST['amount'])
      ); 
 $acc_insert = $data->insert('customer_payment', $account);
}
$led_name=$_POST['ledger_id'];
 $pinqry = mysqli_query($conn,"SELECT * from ledger WHERE name = '$led_name'; "); 
   /*             $res = mysqli_fetch_array($pinqry);
                if($res['nature']=="Transporter")
                {
$vouc_type="Advance Cash Recipt";
$insert_hire = array(   
      "intAdminId"      =>     mysqli_real_escape_string($data->con, $_SESSION['MintId']),
      "transporter"     =>     mysqli_real_escape_string($data->con, $_POST['loadtrans']),
      "amount"          =>     mysqli_real_escape_string($data->con, $_POST['hire_adv']),  
      "pay_type"        =>     mysqli_real_escape_string($data->con, $_POST['hire_chn_pay_mode']),
      "tripid"          =>     mysqli_real_escape_string($data->con, $_POST['refno']),
      "voucher_type"    =>     mysqli_real_escape_string($data->con, $_POST['voucher_type']),
      "reason"          =>     mysqli_real_escape_string($data->con, $_POST['remarks']),
      "ent_date"        =>     mysqli_real_escape_string($data->con, $newDate)
           );  
       $insstat = $data->insert('transporter_advances', $insert_hire);
               } 
                else if($res['nature']=="Customer")
                {
$vouc_type="Advance Cash Recipt";
$insert_hire = array(   
      "intAdminId"      =>     mysqli_real_escape_string($data->con, $_SESSION['MintId']),
      "cust_id"         =>     mysqli_real_escape_string($data->con, $_POST['loadparty']),
      "amount"          =>     mysqli_real_escape_string($data->con, $_POST['frt_adv_cash']),  
      "pay_type"        =>     mysqli_real_escape_string($data->con, $_POST['frt_adv_cqe']),
      "invoice_no"      =>     mysqli_real_escape_string($data->con, $_POST['refno']),
      "voucher_type"    =>     mysqli_real_escape_string($data->con, $vouc_type),
      "ent_date"        =>     mysqli_real_escape_string($data->con, $newDate)
           );  
       $insstat = $data->insert('customer_payment', $insert_hire);
                }
*/
/*  $bank_insert= "insert into banks(name,accno,ifsc,subgroup,state,city,area,address,pincode)
  values('".$bnkname."','".$accno."','".$ifsc."','".$subgrp."','".$state."','".$city."','".$area."','".$address."','".$pincode."')";  */ 
   if($bank_insert){
    echo '<script> alert("Voucher Created Successfully");window.location.assign("recipt_voucher.php");</script>';
   } 
   else{
    echo '<script> alert("Error");</script>';
   }
  }
}
else
{
 $bank = array(
        "ent_date"          =>     mysqli_real_escape_string($data->con, $_POST['voucher_date']),
        "cheque_no"          =>     mysqli_real_escape_string($data->con, $_POST['chq_nos']),
        "remarks"           =>     mysqli_real_escape_string($data->con, $_POST['remarks'])
      );  
 $id =$_REQUEST['id'];
 $update_id = array(
      "id"      =>    mysqli_real_escape_string($data->con, $id)
    );
       $insid = $data->update('recipt_voucher', $bank, $update_id);
      if($insid){
    echo '<script> alert("Voucher Altered Successfully");window.location.assign("view_voucher.php");</script>';
   } 
   else{
    echo '<script> alert("Error in Updating");</script>';
   }
}
}
  if($_REQUEST['flag'] == "Delete"){
 $id =$_REQUEST['id'];
    $update_id = array(
      "id"      =>    mysqli_real_escape_string($data->con, $id)
    );
    $insid = $data->delete_where('recipt_voucher', $update_id);
echo '<script> alert("Voucher Deleted Successfully");window.location.assign("recipt_voucher.php");</script>';
 }
 
  if($_REQUEST['flag'] == "Edit"){
 $id =$_REQUEST['id'];
    $update_id = array(
      "id"      =>    mysqli_real_escape_string($data->con, $id)
    );
    $insid = $data->select_where('recipt_voucher', $update_id);
 }
?> 
    <div class="am-mainpanel">
      <div class="am-pagetitle">
        <h5 class="am-title">Voucher Creation</h5>              
        <!-- search-bar -->
      </div>
      <!-- am-pagetitle -->
        <form id="searchBar" class="search-bar"  method="POST" action="">
      <div class="am-pagebody">
 <div class="card pd-20 pd-sm-40 form-layout form-layout-4">
       <div class="row row-sm mg-t-20">
          <div class="col-xl-6">
                     <div class="portlet-body">
                                          <h6 class="card-body-title">Receipt Voucher</h6>
                                              <div class="row mg-t-10">
                                                  <label class="col-md-4 form-control-label">Voucher Number :</label>
                                                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                         <?php
 $pinqry = mysqli_query($conn,"SELECT id FROM recipt_voucher ORDER BY id DESC LIMIT 1 "); 
                $res = mysqli_fetch_assoc($pinqry);
                if($res['id']==0)
                {
$val=1;
                }
else
{
  $val=$res['id']+1;
}
?>
<input class="form-control" data-val="true" data-val-length="The field bankname must be a string with a maximum length of 200." data-val-length-max="200" data-val-required="Enter " id="voucher_id" maxlength="200" name="voucher_id" type="text" value="<?php
if($_REQUEST['flag'] == "Edit"){
  echo $insid[0]['id'];
}
else
{
  echo $val;
} ?>" readonly>
<span class="field-validation-valid font-red" data-valmsg-for="bankname" data-valmsg-replace="true"></span>
                              </div>
                                            </div> 
                                        <div class="row mg-t-20">
              <label class="col-md-4 form-control-label"> Date :</label>
              <div class="col-sm-8 mg-t-10 mg-sm-t-0">
              <input class="form-control datepicker" placeholder="Cash Date" name="voucher_date" id="datepicker" type="text" value="<?php if($_REQUEST['flag'] == "Edit"){
$date_rep = str_replace('-', '/', $insid[0]['ent_date']);
       $newDate = date("d/m/Y", strtotime($date_rep));
  echo $newDate;
}
else
{
  echo date('d/m/Y');

}
  ?>" data-date-format="dd/mm/yyyy" >
                <span class="field-validation-valid font-red" data-valmsg-for="policyno" data-valmsg-replace="true"></span>
              </div>
            </div>          <div class="row mg-t-10">
                                         <label class="col-md-4 form-control-label">Ledger Name :</label>
                                                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                <select class="form-control" name="ledger_id" id="ledger_id" onchange="bankfetch(this.value)" <?php if($_REQUEST['flag'] == "Edit"){
                           echo "disabled";
                                                              } ?> >
                      <option value="">Select Ledger</option>
                                                            <?php

/*
echo '<script>alert("'.$_SESSION['type'] .'");</script>';*/
if($_SESSION['type']=='Transporter')
{
$name=$_SESSION['name'];
 $query =mysqli_query($conn,"SELECT * FROM transporters WHERE name='$name'");
 $row=mysqli_fetch_array($query);
$group = mysqli_query($conn,"SELECT * FROM ledger WHERE under ='".$row['comp_id']."' AND NOT nature='Bank'  "); 
}
else
{
 $group = mysqli_query($conn,"SELECT * FROM ledger WHERE under ='Logistics'"); 
}
                while ($grp = mysqli_fetch_array($group)){
                                                            ?>
     <option value="<?php echo $grp['name'];?>" <?php if($grp['name']==$insid[0]['ledger_id']) echo 'selected="selected"'; ?>><?php echo $grp['name'];?></option>
     <?php
}
 ?>                                                       
                                                           </select>
           <span class="field-validation-valid font-red" data-valmsg-for="bankname" data-valmsg-replace="true"></span>
                                                </div>
                                            </div>
                            <div class="row mg-t-10">                                                
        <label class="col-md-4 form-control-label">Sub-Group Type :</label>
                                                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                 <select class="form-control" name="voucher_type" id="voucher_type" <?php if($_REQUEST['flag'] == "Edit"){
                                                                echo "disabled";
                                                              } ?> >
                                                          
         <?php
          $voucher = mysqli_query($conn,"SELECT * FROM voucher_type "); 
 while ($vouch = mysqli_fetch_array($voucher)){
         ?>                                                  
 <option value="<?php echo $vouch['name']?>" <?php if($vouch['name']==$insid[0]['type']) echo 'selected="selected"'; ?>><?php echo $vouch['name']?></option>
                                                             
                                                          <!--     <option value="">Payment</option>
                                                              <option value="">Contra</option>
                                                              <option value="">Journal</option> -->
                                                             <?php
}
                                                             ?>
                                                                     </select>
                <span class="field-validation-valid font-red" data-valmsg-for="bankname" data-valmsg-replace="true"></span>
    <span style="padding-right:20px;"><button type="button" class="ion-plus-circled tx-16 lh-0 op-6" data-toggle="modal" data-target="#modaldemo1" ></button></span><span style=" font-size: 20px;  ">Add Sub-group Type</span>
                                               </div>
                                            </div>
                  <div id="modaldemo1" class="modal fade">
              <div class="modal-dialog modal-dialog-vertical-center" role="document">
                <div class="modal-content bd-0 tx-14">
                  <div class="modal-header pd-y-20 pd-x-25">
                    <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Sub-Group Type</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body pd-25">
                   <div class="row mg-t-10">
                    <label class="col-md-2 form-control-label">Type </label>
                    <div class="col-sm-10 mg-t-5 mg-sm-b-10">
                      <input class="form-control" data-val="true" data-val-length="The field bodytype must be a string with a maximum length of 100." data-val-length-max="100" placeholder="Type Name" id="ass_gc" maxlength="100" name="assgc" value="" type="text"  >
                      <span class="field-validation-valid font-red" data-valmsg-for="bodytype" data-valmsg-replace="true"></span>
                    </div>
                  </div>    
                <div class="modal-footer">
                  <button type="button" id="addgc" class="btn btn-info pd-x-20" data-dismiss="modal" >Done</button>
                  <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal">Close</button>
                </div>
              </div></div>
<script>
  $(document).on('click','#addgc', function(){
/*alert("enter");*/
  var assgc = $('#ass_gc').val();
/*   alert(assgc);*/
  var action = "Voucher";
$.ajax({
     url:"gcno_actions.php",
     method:"POST",
     data:{gcno:assgc,act:action},
     success:function(data)
     {
alert(data);
/*      alert(data);*/
      /*$("#gcdiv").html(data);*/
           }  
    });
 location.reload();
  });
</script>
            </div><!-- modal-dialog -->
         </div>
<!-- 
                                            <div class="row mg-t-10">
                                <label class="col-md-4 form-control-label">Type :</label>
                                                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                            <select class="form-control" name="ledger_type" id="ledger_type"  >
                                                              <option value="Cr">Cr</option>
                                                              <option value="Dr">Dr</option>
                                                            </select>
        <span class="field-validation-valid font-red" data-valmsg-for="bankname" data-valmsg-replace="true"></span>
                                                </div>
                                            </div>     -->
                                                     <div class="row mg-t-10">
                                                  <label class="col-md-4 form-control-label">Amount :</label>
                                                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
         <input class="form-control" data-val="true" data-val-length="The field bankname must be a string with a maximum length of 200." data-val-length-max="200" data-val-required="Enter Bank Name" id="amount" maxlength="200" name="amount" type="text" value="<?php echo $insid[0]['amount']; ?>" <?php if($_REQUEST['flag'] == "Edit"){
                                          echo "disabled";
                                                              } ?> required>
                                                            <span class="field-validation-valid font-red" data-valmsg-for="bankname" data-valmsg-replace="true"></span>
                                                </div>
                                            </div>       
<!--  <div class="row mg-t-10">                                               
                                                        <label class="col-md-4 form-control-label">Payment Mode :</label>
                                                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                          <select class="form-control" name="pay_mode" id="pay_mode"  >                                                                              
                                                              <option value="Dr">Debit</option>
                                                              <option value="Cr">Credit</option>                                      </select>
                               <span class="field-validation-valid font-red" data-valmsg-for="bankname" data-valmsg-replace="true"></span>                                                      </div>

                                            </div> -->
 <div class="row mg-t-10">
          <label class="col-md-4 form-control-label">Payment Type </label>
          <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                       <select class="form-control" data-val="true" data-val-number="The field maritialstatus must be a number." placeholder="The maritialstatus field is required." id="payment_type" onchange="bankdiv(this.value)" name="payment_type" <?php if($_REQUEST['flag'] == "Edit"){
                                                                echo "disabled";
                                                              } ?>>
<?php
$quer=mysqli_query($conn,"select * from pay_type"); 
while($pay = mysqli_fetch_array($quer))
{
  ?>
            <option  value="<?php echo $pay['pay_type'];?>" <?php if($pay['pay_type']==$insid[0]['pay_type']) echo 'selected="selected"'; ?>><?php echo $pay['pay_type'];?></option>
            <?php
          }?>
             <script >
function bankdiv(val){
/*  alert(val);*/
if(val=="Cash"||val=="cash")
{
 $("#bank_div").hide();
 $("#cque_div").hide();
 $.ajax({    
        type: "POST",
        url: "voucher_functions.php",
        data:{cust_id:val},            
        dataType: "html",          
        success: function(response){     
                     
            $("#acc_det").html(response); 
            /*alert(response);*/
        }
        });
}
else
{
 $("#bank_div").show();
 $("#cque_div").show();
  $("#paid_bank_div").show();
}
}
            </script>
            <script>
function bankfetch(val)
{
  var tpe="ledger";
  var rec="Recipt";
 $.ajax({    
        type: "POST",
        url: "get_district.php",
        data:{cust_id:val},            
        dataType: "html",          
        success: function(response){     
                     
            $("#frt_adv_cqe_bnk").html(response); 
            //alert(response);

        }
        });
/*  alert(val);*/

 $.ajax({    
        type: "POST",
        url: "voucher_functions.php",
        data:{cust_id:val,type:tpe,vouch_type:rec},   
        dataType: "html",          
        success: function(response){     
                     
            $("#led_det").html(response); 
            //alert(response);

        }
        });
}
</script>
<script>
$(function(){
$("#bank_div").hide();
 $("#cque_div").hide();
/*  $("#paid_bank_div").hide();*/
var value="Cash";
  bankdiv(value);
 });
  </script>
          </select>
            <span class="field-validation-valid font-red" data-valmsg-for="insurancename" data-valmsg-replace="true"></span>
          </div>
      </div>
      <div class="row mg-t-10" id="bank_div">
       <label class="col-md-4 form-control-label">Bank</label>
       <div class="col-sm-8 mg-t-10 mg-sm-t-0">
<!--         <input class="form-control" data-val="true" data-val-length="The field insurancename must be a string with a maximum length of 200." data-val-length-max="200" placeholder="Enter Bank Name" id="frt_adv_cqe_bnk" maxlength="200" name="frt_adv_cqe_bnk" type="text" value=""> -->
 <select class="form-control" data-val="true" data-val-number="The field maritialstatus must be a number." placeholder="The maritialstatus field is required." id="bank_det"  name="bank_det" <?php if($_REQUEST['flag'] == "Edit"){
                                                                echo "disabled";
                                                              } ?>>
</select>
        <span class="field-validation-valid font-red" data-valmsg-for="insurancename" data-valmsg-replace="true"></span>
      </div>
    </div>
    <div class="row mg-t-10" id="cque_div">
      <label class="col-md-4 form-control-label">Cheque Number </label>
      <div class="col-sm-8 mg-t-10 mg-sm-t-0">
        <input class="form-control" data-val="true" data-val-length="The field bodytype must be a string with a maximum length of 100." data-val-length-max="100" placeholder="Enter Cheque Number" id="chq_nos" maxlength="100" name="chq_nos" type="text" value="<?php echo $insid[0]['cheque_no']; ?>"  >
        <span class="field-validation-valid font-red" data-valmsg-for="bodytype" data-valmsg-replace="true"></span>
      </div>
    </div>      <div class="row mg-t-10" id="paid_bank_div">
       <label class="col-md-4 form-control-label">Paid To</label>
       <div class="col-sm-8 mg-t-10 mg-sm-t-0">
<!--         <input class="form-control" data-val="true" data-val-length="The field insurancename must be a string with a maximum length of 200." data-val-length-max="200" placeholder="Enter Bank Name" id="frt_adv_cqe_bnk" maxlength="200" name="frt_adv_cqe_bnk" type="text" value=""> -->
 <select class="form-control" data-val="true" data-val-number="The field maritialstatus must be a number." placeholder="The maritialstatus field is required." id="comp_bank_det"  name="comp_bank_det" onclick="bankdet(this.value)" <?php if($_REQUEST['flag'] == "Edit"){
                                                                echo "disabled";
                                                              } ?>>
<?php
/*$name=$_SESSION['name']*/;
/*echo '<script> alert("'.$name.'");</script>';*/
/*$company=mysqli_query($conn,"SELECT * from ledger where group_name ='banks';"); 
$comp = mysqli_fetch_array($company);
*/
/*echo '<script> alert("'.$comp["comp_id"].'");</script>';*/
if($_SESSION['type']=='Transporter')
{
$name=$_SESSION['name'];
 $query =mysqli_query($conn,"SELECT * FROM transporters WHERE name='$name'");
 $row=mysqli_fetch_array($query);
$bank=mysqli_query($conn,"SELECT * from ledger where under ='".$row['comp_id']."' AND  nature='Bank';"); 
/*$group = mysqli_query($conn,"SELECT * FROM ledger WHERE under ='".$row['comp_id']."' AND NOT nature='Bank'  "); */
}
else
{
 $bank=mysqli_query($conn,"SELECT * from ledger where group_name ='banks' AND under='';"); 
}
/*$bank=mysqli_query($conn,"SELECT * from ledger where group_name ='banks';"); */
while($bnk = mysqli_fetch_assoc($bank))
{
$bnk_name=$bnk['name'];
if($_SESSION['type']=='Transporter')
{
  $data = $bnk['name'];
  $nme= explode("_", $data, 2);  
$bnk_name =$nme[0];
}
  ?>
  <option  value="<?php echo $bnk['name'];?>"><?php echo $bnk_name;?></option>
<?php
}
?>
</select>
        <span class="field-validation-valid font-red" data-valmsg-for="insurancename" data-valmsg-replace="true"></span>
      </div>
    </div>
<script>
function bankdet(val)
{
/*alert(val);*/

 $.ajax({    
        type: "POST",
        url: "voucher_functions.php",
        data:{cust_id:val},            
        dataType: "html",          
        success: function(response){     
                     
            $("#acc_det").html(response); 
            //alert(response);
        }
        });

/*$("#acc_det").html(val);*/
}

</script>                                             <div class="row mg-t-10">
                                  <label class="col-md-4 form-control-label">Remarks :</label>
                                                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                     <input class="form-control" data-val="true" data-val-length="The field bankname must be a string with a maximum length of 200." data-val-length-max="200" data-val-required="Enter Bank Name" id="remarks" maxlength="200" name="remarks" type="textarea" size="50" value="<?php echo $insid[0]['remarks']; ?>" required>
                <span class="field-validation-valid font-red" data-valmsg-for="bankname" data-valmsg-replace="true"></span>
                                                </div>
                                            </div>    
                                                                          </div>
                       <div class="form-layout-footer mg-t-30">
                <button type="submit" value="submit" name="submit" class="btn btn-info mg-r-5">Add Voucher</button>
         <input type="hidden" name="action" value="<?php if($_REQUEST['flag'] =='Edit') echo $_REQUEST['flag']; else echo 'Add'; ?>">
                <button type="reset" value="Reset" class="btn btn-secondary">Cancel</button>
              </div>   </div>
            <div class="col-xl-6">
                       <div class="portlet-body" style=" display: block; border:5px solid #FB9337; height: auto; " id="led_det">
            </div>
            <div class="portlet-body" style=" display: block; border:5px solid #FB9337; height: auto; " id="acc_det">
            </div>
          </div>
        </div>
 </div>
      </div><!-- am-pagebody -->
    </form>
       <?php include('../include/adminfooter.php'); ?> 
    <!-- <script>
     function getdistrict(val) {
  $.ajax({
  type: "POST",
  type: "POST",
  url: "get_district.php",
  data:'state_id='+val,
  success: function(data){ 
    $("#district-list").html(data);
  }
  });
}
</script> -->
   <script>
$('.datepicker').datepicker({
    dateFormat: 'dd/mm/yy'
});
</script>
