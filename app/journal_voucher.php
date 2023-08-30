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




 
if($_POST['ledger_id']==""||$_POST['amount']=="")
{
  echo '<script> alert("Voucher Fields Must Not Be Empty.");</script>';

}


else
{


$date_rep = str_replace('/', '-', $_POST['voucher_date']);

        $newDate = date("Y-m-d", strtotime($date_rep));

/*For Paid Ledger*/

$check = mysqli_query($conn,"SELECT * FROM account_voucher WHERE ledger_id ='".$_POST['ledger_id']."' ORDER  BY id DESC LIMIT  1"); 
$op=mysqli_fetch_assoc($check);


/*$close=mysqli_num_rows($check);*/

/*echo '<script>alert("'.$op['closing_bal'].'");</script>';*/



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

/*if($_POST['payment_type']=="Cash")
{
  $led="Cash";
}
else
{

  $led=$_POST['comp_bank_det'];
}*/

$check_acc = mysqli_query($conn,"SELECT * FROM account_voucher WHERE ledger_id ='".$_POST['ledger_id_to']."' ORDER  BY id DESC LIMIT  1"); 
$op_acc=mysqli_fetch_assoc($check_acc);


/*$close=mysqli_num_rows($check);*/

/*echo '<script>alert("'.$op['closing_bal'].'");</script>';*/



if($op_acc['closing_bal']==0)
{
$op_bal_acc = mysqli_query($conn,"SELECT * FROM ledger WHERE name ='".$_POST['ledger_id_to']."'");
$acc_op_balance=mysqli_fetch_array($op_bal_acc);

$last_op_acc=$acc_op_balance['opening_bal'];

}
else
{

$last_op_acc=$op_acc['closing_bal'];

}







        $bank = array(
        "intAdminId"       =>     mysqli_real_escape_string($data->con, $_SESSION['MintId']),
        "ent_date"         =>     mysqli_real_escape_string($data->con, $newDate),
        "from_ledger"      =>     mysqli_real_escape_string($data->con, $_POST['ledger_id']),
/*        "pay_mode"         =>     mysqli_real_escape_string($data->con, $_POST['pay_mode']),*/
        "to_ledger"        =>     mysqli_real_escape_string($data->con, $_POST['ledger_id_to']),
        "amount"           =>     mysqli_real_escape_string($data->con, $_POST['amount']),
        "remarks"          =>     mysqli_real_escape_string($data->con, $_POST['remarks'])
      ); 
 $bank_insert = $data->insert('journal_entries', $bank);



for($i=0;$i<2;$i++)
{
if($i==0)
{
$pay="Contra Entry";

$acc_close=$last_op-$_POST['amount'];

        $account = array(
        "intAdminId"       =>     mysqli_real_escape_string($data->con, $_SESSION['MintId']),
        "ledger_id"        =>     mysqli_real_escape_string($data->con, $_POST['ledger_id']),
        "ent_date"         =>     mysqli_real_escape_string($data->con, $newDate),
        "type"             =>     mysqli_real_escape_string($data->con, $pay),

        "pay_mode"         =>     mysqli_real_escape_string($data->con, $pay),
      /*  "remarks"          =>     mysqli_real_escape_string($data->con, $_POST['remarks']),*/
        "bank_details"     =>     mysqli_real_escape_string($data->con, $_POST['remarks']),
        /*"cheque_no"        =>     mysqli_real_escape_string($data->con, $_POST['chq_nos']),*/
        "closing_bal"      =>     mysqli_real_escape_string($data->con, $acc_close),
        "acc_inv"          =>     mysqli_real_escape_string($data->con, $_POST['ledger_id_to']),
        "mod_voucher_no"   =>     mysqli_real_escape_string($data->con, $bank_insert),
        "amount"           =>     mysqli_real_escape_string($data->con, $_POST['amount'])
      ); 
 $acc_insert = $data->insert('journal_entries', $account);
}
else
{




$pay="Journal Entry";

$acc_close=$last_op_acc+$_POST['amount'];

               $account = array(
        "intAdminId"       =>     mysqli_real_escape_string($data->con, $_SESSION['MintId']),
        "ledger_id"        =>     mysqli_real_escape_string($data->con, $_POST['ledger_id_to']),
        "ent_date"         =>     mysqli_real_escape_string($data->con, $newDate),
        "type"             =>     mysqli_real_escape_string($data->con, $pay),

        "pay_mode"         =>     mysqli_real_escape_string($data->con, $pay),
      /*  "remarks"          =>     mysqli_real_escape_string($data->con, $_POST['remarks']),*/
        "bank_details"     =>     mysqli_real_escape_string($data->con, $_POST['remarks']),
        /*"cheque_no"        =>     mysqli_real_escape_string($data->con, $_POST['chq_nos']),*/
        "closing_bal"      =>     mysqli_real_escape_string($data->con, $acc_close),
        "acc_inv"          =>     mysqli_real_escape_string($data->con, $_POST['ledger_id']),
        "mod_voucher_no"   =>     mysqli_real_escape_string($data->con, $bank_insert),
        "amount"           =>     mysqli_real_escape_string($data->con, $_POST['amount'])
      ); 
 $acc_insert = $data->insert('account_voucher', $account);


}


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


    echo '<script> alert("Voucher Created Successfully");window.location.assign("journal_voucher.php");</script>';
   } 
   else{
    echo '<script> alert("Error");</script>';
   }


  }


}
else
{
  $bank = array(
        "intAdminId"       =>     mysqli_real_escape_string($data->con, $_SESSION['MintId']),
        "name"           =>     mysqli_real_escape_string($data->con, $_POST['bankname'])
      );  
 $id =$_REQUEST['id'];
 $update_id = array(
      "id"      =>    mysqli_real_escape_string($data->con, $id)
    );

       $insid = $data->update('journal_entries', $bank, $update_id);
      if($insid){

    echo '<script> alert("Voucher Altered Successfully");window.location.assign("Journal_voucher.php");</script>';
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

    $insid = $data->delete_where('journal_entries', $update_id);
echo '<script> alert("Voucher Deleted Successfully");window.location.assign("recipt_voucher.php");</script>';


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
                                          <h6 class="card-body-title">Journal Entry</h6>
                                       
                                             <div class="row mg-t-10">
                                                
                                                        <label class="col-md-4 form-control-label">Voucher Number :</label>
                                                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                            
<?php
 $pinqry = mysqli_query($conn,"SELECT id FROM journal_entries ORDER BY id DESC LIMIT 1 "); 

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



                                                            <input class="form-control" data-val="true" data-val-length="The field bankname must be a string with a maximum length of 200." data-val-length-max="200" data-val-required="Enter " id="voucher_id" maxlength="200" name="voucher_id" type="text" value="<?php echo $val; ?>" readonly>
                                                            <span class="field-validation-valid font-red" data-valmsg-for="bankname" data-valmsg-replace="true"></span>
                                                </div>
                                            </div> 

                                        <div class="row mg-t-20">
              <label class="col-md-4 form-control-label"> Date :</label>
              <div class="col-sm-8 mg-t-10 mg-sm-t-0">

              <input class="form-control datepicker" placeholder="Cash Date" name="voucher_date" id="datepicker" type="text" value="<?php echo date('d/m/Y');?>" data-date-format="dd/mm/yyyy" >
                <span class="field-validation-valid font-red" data-valmsg-for="policyno" data-valmsg-replace="true"></span>
              </div>


           
            </div> 
                                            <div class="row mg-t-10">
                                                
                                                        <label class="col-md-4 form-control-label">From Account Name :</label>
                                                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                            
                                                              <select class="form-control" name="ledger_id" id="ledger_id" onchange="bankfetch(this.value)"  >
                                                                <option value="">Select Ledger</option>
                                                            <?php

/*
echo '<script>alert("'.$_SESSION['type'] .'");</script>';*/
if($_SESSION['type']=='Transporter')
{


  $name=$_SESSION['name'];

 $query =mysqli_query($conn,"SELECT * FROM transporters WHERE name='$name'");

 $row=mysqli_fetch_array($query);

$group=mysqli_query($conn,"SELECT * from ledger where under ='".$row['comp_id']."' AND  NOT nature='Bank';"); 




/*$name=$_SESSION['name'];

$group = mysqli_query($conn,"SELECT * FROM ledger WHERE under ='$name' "); */

}
else
{
$name=$_SESSION['name'];
 $group = mysqli_query($conn,"SELECT * FROM ledger WHERE under = '$name'"); 
}

                while ($grp = mysqli_fetch_array($group)){
                                                            ?>
                                                              <option value="<?php echo $grp['name'];?>"><?php echo $grp['name'];?></option>
                                                              <?php


}
                                                              ?>
                                                              
                                                            </select>
                                                            <span class="field-validation-valid font-red" data-valmsg-for="bankname" data-valmsg-replace="true"></span>
                                                </div>
                                            </div>
                                                                                      


 <div class="row mg-t-10">
                                                
                                                        <label class="col-md-4 form-control-label">To Account Name :</label>
                                                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                            
                                                              <select class="form-control" name="ledger_id_to" id="ledger_id_to" onchange="bankdet(this.value)">
                                                                <option value="">Select Ledger</option>
                                                            <?php

/*
echo '<script>alert("'.$_SESSION['type'] .'");</script>';*/
if($_SESSION['type']=='Transporter')
{

  $name=$_SESSION['name'];

 $query =mysqli_query($conn,"SELECT * FROM transporters WHERE name='$name'");

 $row=mysqli_fetch_array($query);

$group=mysqli_query($conn,"SELECT * from ledger where under ='".$row['comp_id']."' AND  NOT nature='Bank';"); 





/*$name=$_SESSION['name'];

$group = mysqli_query($conn,"SELECT * FROM ledger WHERE under ='$name' "); */

}
else
{
$name=$_SESSION['name'];
 $group = mysqli_query($conn,"SELECT * FROM ledger WHERE under = '$name'");  
}

                while ($grp = mysqli_fetch_array($group)){
                                                            ?>
                                                              <option value="<?php echo $grp['name'];?>"><?php echo $grp['name'];?></option>
                                                              <?php


}
                                                              ?>
                                                              
                                                            </select>
                                                            <span class="field-validation-valid font-red" data-valmsg-for="bankname" data-valmsg-replace="true"></span>
                                                </div>
                                            </div>










                                                                                        <div class="row mg-t-10">
                                                
                                                        <label class="col-md-4 form-control-label">Amount :</label>
                                                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                            
                                                             <input class="form-control" data-val="true" data-val-length="The field bankname must be a string with a maximum length of 200." data-val-length-max="200" data-val-required="Enter Bank Name" id="amount" maxlength="200" name="amount" type="text" value="<?php echo $insid[0]['name']; ?>" required>
                                                            <span class="field-validation-valid font-red" data-valmsg-for="bankname" data-valmsg-replace="true"></span>
                                                </div>
                                            </div>       


                                             <div class="row mg-t-10">
                                                
                                                        <label class="col-md-4 form-control-label">Remarks :</label>
                                                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                            
                                                             <input class="form-control" data-val="true" data-val-length="The field bankname must be a string with a maximum length of 200." data-val-length-max="200" data-val-required="Enter Bank Name" id="remarks" maxlength="200" name="remarks" type="textarea" size="50" value="<?php echo $insid[0]['name']; ?>" required>
                                                            <span class="field-validation-valid font-red" data-valmsg-for="bankname" data-valmsg-replace="true"></span>
                                                </div>
                                            </div>   



     

  

                                           

                                  </div>

                       <div class="form-layout-footer mg-t-30">
                <button type="submit" value="submit" id="sub" name="submit" class="btn btn-info mg-r-5">Add Voucher</button>
                <input type="hidden" name="action" value="<?php if($_REQUEST['flag'] =='Edit') echo $_REQUEST['flag']; else echo 'Add'; ?>">
                <button type="reset" value="Reset" class="btn btn-secondary">Cancel</button>
              </div>


                                    </div>

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

var value = $("#ledger_id_to").val();

 $.ajax({    
        type: "POST",
        url: "voucher_functions.php",
        data:{cust_id:val},            
        dataType: "html",          
        success: function(response){     
                     
            $("#led_det").html(response); 
            //alert(response);

        }
        });


bankdet(value);

}
</script>







  <script>
function bankdet(val)
{
/*alert(val);*/
var from = $("#ledger_id").val();
/*alert(from);*/
if(val==from)
{
$("#sub").attr('disabled', true);

}
else
{

  $("#sub").attr('disabled', false);
}

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

</script>