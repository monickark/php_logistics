<?php include('../include/dbConnect.php'); ?>
<?php include('../include/checklogin.php'); ?>
<?php include('../include/adminheader.php'); ?>
<?php include('../include/header.php'); ?>
<?php include('../include/leftmenu.php');  
      require('../include/basefunctions.php');
?>
<link href="../lib/datatables/jquery.dataTables.css" rel="stylesheet">
    <link href="../lib/select2/css/select2.min.css" rel="stylesheet">
<?php
$data = new Basefunc;  
if(isset($_POST['submit'])){

    

         if($_REQUEST['action'] == "Add"){

  


$insert_findetails = array(
"intAdminId"      =>    mysqli_real_escape_string($data->con, $_SESSION['MintId']),    
"name"            =>     mysqli_real_escape_string($data->con, $_POST['companyname']),
"v_num"           =>     mysqli_real_escape_string($data->con, $_POST['vechilenum']),   
"address"         =>     mysqli_real_escape_string($data->con, $_POST['address1']),   
"finance_amount"  =>     mysqli_real_escape_string($data->con, $_POST['amount']), 
"finance_tenure " =>     mysqli_real_escape_string($data->con, $_POST['tenure']), 
"finance_emi"     =>     mysqli_real_escape_string($data->con, $_POST['emi']),
"dop"             =>     mysqli_real_escape_string($data->con, $_POST['date_purchase']), 
"bill_no"         =>     mysqli_real_escape_string($data->con, $_POST['billnum']), 
"paying_amount"   =>     mysqli_real_escape_string($data->con, $_POST['pay_amount']), 
"amount_paid"     =>     mysqli_real_escape_string($data->con, $_POST['paid_amount']), 
"balance"          =>     mysqli_real_escape_string($data->con, $_POST['balance']), 
"amount_collector"   =>     mysqli_real_escape_string($data->con, $_POST['amount_coll']), 
"date"            =>     mysqli_real_escape_string($data->con, $_POST['date']), 
"mod_pay"        =>     mysqli_real_escape_string($data->con, $_POST['modeofpayment'])

   
      
      );  
       $insid = $data->insert('finance_details', $insert_findetails);
      
 

   if($insid){

    echo '<script> alert("Finance Details Added Successfully");window.location.assign("finance_list.php");</script>';
   } 
   else{
    echo '<script> alert("Error");</script>';
   }
}else
{

$update_fdetails = array(
"intAdminId"      =>    mysqli_real_escape_string($data->con, $_SESSION['MintId']),    
"name"            =>     mysqli_real_escape_string($data->con, $_POST['companyname']),
"v_num"           =>     mysqli_real_escape_string($data->con, $_POST['vechilenum']),
"address"         =>     mysqli_real_escape_string($data->con, $_POST['address1']),   
"finance_amount"  =>     mysqli_real_escape_string($data->con, $_POST['amount']), 
"finance_tenure " =>     mysqli_real_escape_string($data->con, $_POST['tenure']), 
"finance_emi"     =>     mysqli_real_escape_string($data->con, $_POST['emi']),
"dop"             =>     mysqli_real_escape_string($data->con, $_POST['date_purchase']), 
"bill_no"         =>     mysqli_real_escape_string($data->con, $_POST['billnum']), 
"paying_amount"   =>     mysqli_real_escape_string($data->con, $_POST['pay_amount']), 
"amount_paid"     =>     mysqli_real_escape_string($data->con, $_POST['paid_amount']), 
"balance"          =>     mysqli_real_escape_string($data->con, $_POST['balance']), 
"amount_collector"   =>     mysqli_real_escape_string($data->con, $_POST['amount_coll']), 
"date"            =>     mysqli_real_escape_string($data->con, $_POST['date']), 
"mod_pay"        =>     mysqli_real_escape_string($data->con, $_POST['modeofpayment'])
      
      );  
 $id =$_REQUEST['id'];
 $update_id = array(
      "id"      =>    mysqli_real_escape_string($data->con, $id)
    );

       $insid = $data->update('finance_details', $update_fdetails, $update_id);
      if($insid){

    echo '<script> alert("Finance Altered Successfully");window.location.assign("finance_list.php");</script>';
   } 
   else{
    echo '<script> alert("Error in Updating");</script>';
   }

}

  
}

 if($_REQUEST['flag'] == "Edit"){
 $id =$_REQUEST['id'];

    $update_id = array(
      "id"      =>    mysqli_real_escape_string($data->con, $id)
    );

    $insid = $data->select_where('finance_details', $update_id);
 }

?> 

    <div class="am-mainpanel">
      <div class="am-pagetitle">
        <h5 class="am-title">Finance Master</h5>
      
          
        <!-- search-bar -->
      </div>
      <!-- am-pagetitle -->
        <form id="searchBar" class="search-bar"  method="POST" >
      <div class="am-pagebody">
 <div class="card pd-20 pd-sm-40 form-layout form-layout-4">
       <div class="row row-sm mg-t-20">
          <div class="col-xl-6">
           
            <div class="portlet-body">
                                          <h6 class="card-body-title">Finance Details</h6>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.16.0/jquery.validate.min.js"></script> 
<script>

$(document).ready( function () {
    $( "#searchBar" ).validate( {
    
        rules: {
          companyname: "required",
          vechilenum:  "required",
          amount: "required",
 pay_amount: "required",
 paid_amount: "required"        
                   },
        messages: {
          companyname: "Please enter your Company Name",
          vechilenum: "Please select your Vehicle Number",
           amount: "Please enter your Amount",
          pay_amount: "Please enter your Paying Amount",
          paid_amount: "Please enter your Paid Amount"
        
            },
        errorElement: "em",
        errorPlacement: function ( error, element ) {
          // Add the `help-block` class to the error element
          error.addClass( "help-block" );

           if ( element.prop( "type" ) === "checkbox" ) {
            error.insertAfter( element.parent( "label" ) );
          } else {
            error.insertAfter( element );
          } 
        }, 
        highlight: function ( element, errorClass, validClass ) {
          $( element ).parents( ".col-sm-8" ).addClass( "has-error" ).removeClass( "has-success" );
        },
        unhighlight: function (element, errorClass, validClass) {
          $( element ).parents( ".col-sm-8" ).addClass( "has-success" ).removeClass( "has-error" );
        }
        
      } );  

  

});


$(window).on('load', function()  {
fetch_data();
});
</script> 
                                          <div class="row mg-t-10">
                                                            
                                                                <label class="col-md-4 form-control-label">vehicle Number:<p style="color: red;">*</p></label>
                                                                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                                    <select onChange="getdriver(this.value);"  name="vechilenum" id="vechilenum" class="form-control emp_val" >





<option value="">Select </option>
<?php $query =mysqli_query($conn,"SELECT distinct vechno FROM load_det ");
while($row=mysqli_fetch_array($query))
{ ?>

  <!-- Vehicle Number  Dropdown -->
<option value="<?php echo $row['vechno'];?>" <?php if($row['vechno']==$insid[0]['v_num']) echo 'selected="selected"'; ?> ><?php echo $row['vechno'];?></option>
<?php
}
?>
</select>
                                                                    <span class="field-validation-valid font-red" data-valmsg-for="stateid" data-valmsg-replace="true"></span>
                                                                
                                                            </div>
                                                        </div>
                                        <div class="row mg-t-10">
                                            
                                                
                                                    <label class="col-md-4 form-control-label">Company Name:<p style="color: red;">*</p></label>
                                                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                    <input class="form-control emp_val" data-val="true" placeholder="Enter Company Name" id="companyname" maxlength="30" name="companyname" type="text" value="<?php echo $insid[0]['name']; ?>" >
                                                    <span class="field-validation-valid font-red" data-valmsg-for="companyname" data-valmsg-replace="true"></span>
                                             
                                     
                                            </div>
                                        </div>
                              <div class="row mg-t-10">

                              <label class="col-md-4 form-control-label">Address:</label>
                              <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                              <input class="form-control" data-val="true" placeholder="Enter Address" id="address1" maxlength="200" name="address1" type="text" value="<?php echo $insid[0]['address']; ?>">
                              <span class="field-validation-valid font-red" data-valmsg-for="address1" data-valmsg-replace="true"></span>



                              </div>
                              </div>
                                         
                                        <div class="row mg-t-10">
                                            
                                                    <label class="col-md-4 form-control-label">Finance amount:<p style="color: red;">*</p></label>
                                                    <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                        <input class="form-control emp_val" data-val="true" placeholder="Enter Finance amount" id="amount" maxlength="10" name="amount" type="text" value="<?php echo $insid[0]['finance_amount']; ?>" >
                                                        <span class="field-validation-valid font-red" data-valmsg-for="contactperson" data-valmsg-replace="true"></span>
                                                   
                                            </div>
                                        </div>
                                        
                                        <div class="row mg-t-10">
                                            
                                                    <label class="col-md-4 form-control-label">Tenure:</label>
                                                    <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                        <input class="form-control" data-val="true" data-val-length="Invalid Mobile No." data-val-length-max="15" data-val-length-min="10" placeholder="Enter Tenure." id="tenure" name="tenure" onkeypress="return IsNumeric(event);" type="text" value="<?php echo $insid[0]['finance_tenure']; ?>" >
                                                        <span class="field-validation-valid font-red" data-valmsg-for="tenure" data-valmsg-replace="true"></span>
                                                 
                                            </div>
                                        </div>
                                       
                                        <div class="row mg-t-10">
                                            
                                                    <label class="col-md-4 form-control-label">EMI amount:</label>
                                                    <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                        <input class="form-control" data-val="true" data-val-length="Invalid Phone No." data-val-length-max="20" data-val-length-min="5" placeholder="Enter EMI amount." id="emi" name="emi"  type="text" value="<?php echo $insid[0]['finance_emi']; ?>">
                                                        <span class="field-validation-valid font-red" data-valmsg-for="emi" data-valmsg-replace="true"></span>
                                                   
                                            </div>
                                        </div>
                                       
                                        <div class="row mg-t-10">
                                            
                                                   <label class="col-md-4 form-control-label">Date to Pay:<p style="color: red;">*</p></label>
                                                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
<div class="input-group">
              <span class="input-group-addon"><i class="icon ion-calendar tx-16 lh-0 op-6"></i></span>
              <input class="form-control fc-datepicker" placeholder="DD/MM/YYYY" name="date_purchase" id="datepicker002" type="text" value="<?php if($insid[0]['perValDte']==""){ echo date('d/m/Y'); }else { echo $insid[0]['dop']; }?>" >
            </div>
      
                                                            <span class="field-validation-valid font-red" data-valmsg-for="date_purchase" data-valmsg-replace="true"></span>
                                                    </div>
                                        </div>

                                       

                                  

                                  
                                        
                             </div>

                                    </div> 
           <div class="col-xl-6">
                  <h6 class="card-body-title">Payment</h6> 
               
               <div class="portlet-body">
                             
                                                    
                                                          <div class="row mg-t-10">
                                                           
                                                                <label class="col-md-4 form-control-label">Bill No:</label>
                                                                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                                    <input class="form-control" data-val="true" placeholder="Enter Bill No" id="billnum" maxlength="20" name="billnum" type="text" value="<?php echo $insid[0]['bill_no']; ?>">
                                                                    <span class="field-validation-valid font-red" data-valmsg-for="postcode" data-valmsg-replace="true"></span>
                                                                </div>
                                                            </div>
                                                       
 <div class="row mg-t-10">
                                                           
                                                                <label class="col-md-4 form-control-label">Paying Amount:<p style="color: red;">*</p></label>
                                                                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                                    <input class="form-control emp_val" data-val="true" placeholder="Enter Paying Amount" id="pay_amount" maxlength="10" name="pay_amount" type="text" value="<?php echo $insid[0]['paying_amount']; ?>">
                                                                    <span class="field-validation-valid font-red" data-valmsg-for="postcode" data-valmsg-replace="true"></span>
                                                                </div>
                                                            </div>
                                                        <div class="row mg-t-10">
                                                           
                                                                <label class="col-md-4 form-control-label">Amount Paid:<p style="color: red;">*</p></label>
                                                                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                                    <input class="form-control emp_val" data-val="true" placeholder="Enter Amount Paid" id="paid_amount" maxlength="10" name="paid_amount" type="text" value="<?php echo $insid[0]['amount_paid']; ?>">
                                                                    <span class="field-validation-valid font-red" data-valmsg-for="postcode" data-valmsg-replace="true"></span>
                                                                </div>
                                                            </div>
                                                       
                                                       


                                                        <div class="row mg-t-10">
                                                           
                                                                <label class="col-md-4 form-control-label">Balance:</label>
                                                                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                                    <input class="form-control" data-val="true" placeholder="Enter Balance" id="balance" maxlength="10" name="balance" type="text" value="<?php echo $insid[0]['balance']; ?>">
                                                                    <span class="field-validation-valid font-red" data-valmsg-for="postcode" data-valmsg-replace="true"></span>
                                                                </div>
                                                            </div> 


                                                             <div class="row mg-t-10">
                                                           
                                                                <label class="col-md-4 form-control-label">Amount Collector:</label>
                                                                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                                    <input class="form-control" data-val="true" placeholder="Enter Amount Collector" id="amount_coll" maxlength="50" name="amount_coll" type="text" value="<?php echo $insid[0]['amount_collector']; ?>">
                                                                    <span class="field-validation-valid font-red" data-valmsg-for="postcode" data-valmsg-replace="true"></span>
                                                                </div>
                                                            </div> 

                                                              <div class="row mg-t-10">
                                                        <label class="col-md-4 form-control-label">Date:</label>
                                                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
<div class="input-group">
              <span class="input-group-addon"><i class="icon ion-calendar tx-16 lh-0 op-6"></i></span>
              <input class="form-control fc-date" placeholder="DD/MM/YYYY" name="date" id="date" type="text" value="<?php if($insid[0]['perValDte']==""){ echo date('d/m/Y'); }else { echo $insid[0]['date']; }?>" >
            </div>
      
                                                            <span class="field-validation-valid font-red" data-valmsg-for="policyvaliditydate" data-valmsg-replace="true"></span>
                                                    </div>
                                                </div>

                                                   <div class="row mg-t-10">
                                                            
                                                                <label class="col-md-4 form-control-label">Mode Of  Payment:</label>
                                                                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                                    <select onChange="getdriver(this.value);"  name="modeofpayment" id="modeofpayment" class="form-control" >





<option value="">Select </option>
<?php $query =mysqli_query($conn,"SELECT * FROM  pay_type");
while($row=mysqli_fetch_array($query))
{ ?>

  <!-- Vehicle Number  Dropdown -->
<option value="<?php echo $row['id'];?>" <?php if($row['pay_type']==$insid[0]['mod_pay']) echo 'selected="selected"'; ?> ><?php echo $row['pay_type'];?></option>
<?php
}
?>
</select>
                                                                    <span class="field-validation-valid font-red" data-valmsg-for="stateid" data-valmsg-replace="true"></span>
                                                                
                                                            </div>
                                                        </div>



                                  </div>

                       <div class="form-layout-footer mg-t-30">
                <button type="submit" value="submit" name="submit" class="btn btn-info mg-r-5">Submit</button>
                <input type="hidden" name="action" value="<?php if($_REQUEST['flag'] =='Edit') echo $_REQUEST['flag']; else echo 'Add'; ?>">
                <button class="btn btn-secondary" id ="cancel">Cancel</button>
              </div>


                                    </div>

          
        </div>
 
</div>
      </div><!-- am-pagebody -->
    </form>
      <?php 
      //include('../include/adminfooter.php'); ?> 
     <script>
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
</script>
<!-- <script src="../lib/jquery/jquery.js"></script>-->
    <script src="../lib/popper.js/popper.js"></script>
    <script src="../lib/bootstrap/bootstrap.js"></script> 
    <script src="../lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js"></script>
     <script src="../lib/jquery-ui/jquery-ui.js"></script>
    <script src="../lib/jquery-toggles/toggles.min.js"></script> 
<!--   <script src="../lib/highlightjs/highlight.pack.js"></script>
  -->    <script src="../lib/datatables/jquery.dataTables.js"></script>
<!--    <script src="../lib/datatables-responsive/dataTables.responsive.js"></script> 
 -->    <script src="../lib/select2/js/select2.min.js"></script>
     <script src="../lib/spectrum/spectrum.js"></script>

    <!-- <script src="../js/amanda.js"></script> -->
    <script>
      $(function(){
        'use strict';

        $('#datatable1').DataTable({
          responsive: true,
          language: {
            searchPlaceholder: 'Search...',
            sSearch: '',
            lengthMenu: '_MENU_ items/page',
          }
        });

        $('#datatable2').DataTable({
          bLengthChange: false,
          searching: false,
          responsive: true
        });

        // Select2
        $('.dataTables_length select').select2({ minimumResultsForSearch: Infinity });

      });


      $( function() {
    $( ".datepicker" ).datepicker({ dateFormat: 'yy-mm-dd' });

  } );
  $( function() {
    $( ".date" ).datepicker({ dateFormat: 'yy-mm-dd' });

  } );
    $( function() {
    $( ".fcdate" ).datepicker({ dateFormat: 'yy-mm-dd' });

  } );
    </script>
    <script>
$('#amount').on('input blur change', function() {
  var input= $(this);
  var is_name=input.val();
/*alert(is_name);*/

var value=$('#amount').val();
if (isNaN(is_name)) {
  /*alert("is not numeric")*/
/*input.removeClass("valid").addClass("invalid");*/

this.value = value.substr(0, value.length - 1);

$('#amount').val(this.value);
}

});

</script>
    <script>
$('#paid_amount').on('input blur change', function() {
  var input= $(this);
  var is_name=input.val();
/*alert(is_name);*/

var value=$('#paid_amount').val();
if (isNaN(is_name)) {
  /*alert("is not numeric")*/
/*input.removeClass("valid").addClass("invalid");*/

this.value = value.substr(0, value.length - 1);

$('#paid_amount').val(this.value);
}

});

</script>
    <script>
$('.emp_val').on('input blur change', function() {
  var input= $(this);
  var is_name=input.val();
/*alert(is_name);*/
  if(is_name){input.removeClass("invalid").addClass("valid");}
  else{input.removeClass("valid").addClass("invalid");}
});

</script>
 <style>
  input.invalid,select.invalid, textarea.invalid{
  border: 0.1px solid #d20505;
}
input.valid, textarea.valid{
  border-radius: 0 ;
}
</style>
    <script>
$('#balance').on('input blur change', function() {
  var input= $(this);
  var is_name=input.val();
/*alert(is_name);*/

var value=$('#balance').val();
if (isNaN(is_name)) {
  /*alert("is not numeric")*/
/*input.removeClass("valid").addClass("invalid");*/

this.value = value.substr(0, value.length - 1);

$('#balance').val(this.value);
}

});

</script>
    <script>
$('#pay_amount').on('input blur change', function() {
  var input= $(this);
  var is_name=input.val();
/*alert(is_name);*/

var value=$('#pay_amount').val();
if (isNaN(is_name)) {
  /*alert("is not numeric")*/
/*input.removeClass("valid").addClass("invalid");*/

this.value = value.substr(0, value.length - 1);

$('#pay_amount').val(this.value);
}

});

</script>
    <script>
$('#emi').on('input blur change', function() {
  var input= $(this);
  var is_name=input.val();
/*alert(is_name);*/

var value=$('#emi').val();
if (isNaN(is_name)) {
  /*alert("is not numeric")*/
/*input.removeClass("valid").addClass("invalid");*/

this.value = value.substr(0, value.length - 1);

$('#emi').val(this.value);
}

});

</script>
<script>
$("#cancel").click(function(e) {
/*  alert("maans");*/
if(confirm("Leave Page??"))
{

/*
  $(location).attr("href", "viewtransporter.php");*/
/*  window.location.replace("viewtransporter.php"); */
/*  window.location.href("viewtransporter.php"); */
  window.location.href = "addfinance_details.php";
/*  
document.location ("viewtransporter.php");*/
return false;
/*alert("whatt??");*/
}
else
{
    e.preventDefault();
}
});


</script>