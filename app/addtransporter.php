
<?php include('../include/dbConnect.php'); ?>
<?php include('../include/checklogin.php'); ?>
<?php include('../include/adminheader.php'); ?>
<?php include('../include/header.php'); ?>
<?php include('../include/leftmenu.php'); 
      require('../include/basefunctions.php');
?> 
<?php
$data = new Basefunc;  
if(isset($_POST['submit'])){
  $date=date('Y-m-d');
         if($_REQUEST['action'] == "Add"){


if($_POST['check_hire']=="on")
{
$type="Hire";
$name=$_POST["companyname"];
$under="Logistics";
$bank_check=mysqli_query($conn,"SELECT * FROM ledger WHERE name ='$name' AND under = '$under'; " );
if(mysqli_num_rows($bank_check)==0)
{
$nature="Transporter";
        $bank = array(
        "intAdminId"     =>     mysqli_real_escape_string($data->con, $_SESSION['MintId']),
        "type"           =>     mysqli_real_escape_string($data->con, $_POST['ledger_type']),
        "group_name"     =>     mysqli_real_escape_string($data->con, $_POST['group_name_acc']),
        "opening_bal"    =>     mysqli_real_escape_string($data->con, $_POST['open_bal']),
        "nature"         =>     mysqli_real_escape_string($data->con, $nature),
        "ent_date"       =>     mysqli_real_escape_string($data->con, $date),
        "name"           =>     mysqli_real_escape_string($data->con, $_POST['companyname'])
      ); 
 $voucherid = $data->insert('ledger', $bank);


 $insert_transport = array(
      "intAdminId"      =>    mysqli_real_escape_string($data->con, $_SESSION['MintId']),    
      "name"            =>     mysqli_real_escape_string($data->con, $_POST['companyname']),  
      "contactName"     =>     mysqli_real_escape_string($data->con, $_POST['contactperson']), 
      "MobNum"          =>     mysqli_real_escape_string($data->con, $_POST['mobileno']), 
      "PhNum"           =>     mysqli_real_escape_string($data->con, $_POST['phoneno']), 
      "email"           =>     mysqli_real_escape_string($data->con, $_POST['email']), 
      "ServiceTaxNo"    =>     mysqli_real_escape_string($data->con, $_POST['servicetax']), 
      "gstNo"           =>     mysqli_real_escape_string($data->con, $_POST['gst']), 
      "cstNo"           =>     mysqli_real_escape_string($data->con, $_POST['cst']), 
      "panNo"           =>     mysqli_real_escape_string($data->con, $_POST['pan']), 
      "state"           =>     mysqli_real_escape_string($data->con, $_POST['cusState']), 
      "city"            =>     mysqli_real_escape_string($data->con, $_POST['cusCity']), 
      "area"            =>     mysqli_real_escape_string($data->con, $_POST['areaid']),
      "address"         =>     mysqli_real_escape_string($data->con, $_POST['address1']),
      "comp_id"         =>     mysqli_real_escape_string($data->con, $_POST['cust_id']),  
      "type"            =>     mysqli_real_escape_string($data->con, $type), 
      "voucherid"       =>     mysqli_real_escape_string($data->con, $voucherid),
      "pinCode"         =>     mysqli_real_escape_string($data->con, $_POST['postcode'])
            );  
       $insid = $data->insert('transporters', $insert_transport);
/*$type="Transporter";
$date=date("Y-m-d");
$insert_op = array(
    "intAdminId"      =>     mysqli_real_escape_string($data->con, $_SESSION['MintId']),    
    "type"            =>     mysqli_real_escape_string($data->con, $type),  
    "opening_bal"     =>     mysqli_real_escape_string($data->con, $_POST['open_bal']), 
    "ent_date"        =>     mysqli_real_escape_string($data->con, $date), 
    "ent_id"          =>     mysqli_real_escape_string($data->con, $_POST['cust_id']),
    "name"            =>     mysqli_real_escape_string($data->con, $_POST['companyname'])
      
      );  
       $insid = $data->insert('opening_balance', $insert_op);*/

  if($insid){

    echo '<script> alert("Transporter Added Successfully");window.location.assign("addtransporter.php");</script>';

   } 
   else{
    echo '<script> alert("Error");</script>';
   }
}
else{

      echo '<script> alert("Ledger Name Already Present.");</script>';
}
}
else{
$name=$_POST["companyname"];
$under="Logistics";
$bank_check=mysqli_query($conn,"SELECT * FROM ledger WHERE name ='$name' AND under='$under'; " );
if(mysqli_num_rows($bank_check)==0)
{
$nature="Transporter";
        $bank = array(
        "intAdminId"     =>     mysqli_real_escape_string($data->con, $_SESSION['MintId']),
        "type"           =>     mysqli_real_escape_string($data->con, $_POST['ledger_type']),
        "group_name"     =>     mysqli_real_escape_string($data->con, $_POST['group_name_acc']),
        "opening_bal"    =>     mysqli_real_escape_string($data->con, $_POST['open_bal']),
        "nature"         =>     mysqli_real_escape_string($data->con, $nature),
        "under"          =>     mysqli_real_escape_string($data->con, $under),
        "ent_date"       =>     mysqli_real_escape_string($data->con, $date),
        "name"           =>     mysqli_real_escape_string($data->con, $_POST['companyname'])
      ); 
 $voucherid = $data->insert('ledger', $bank);
 }
else{
      echo '<script> alert("Ledger Name Already Present.");</script>';
}
$insert_transport = array(
      "intAdminId"      =>    mysqli_real_escape_string($data->con, $_SESSION['MintId']),    
      "name"            =>     mysqli_real_escape_string($data->con, $_POST['companyname']), 
      "alias"            =>     mysqli_real_escape_string($data->con, $_POST['alais']), 
      "contactName"     =>     mysqli_real_escape_string($data->con, $_POST['contactperson']), 
      "MobNum"          =>     mysqli_real_escape_string($data->con, $_POST['mobileno']), 
      "PhNum"           =>     mysqli_real_escape_string($data->con, $_POST['phoneno']), 
      "email"           =>     mysqli_real_escape_string($data->con, $_POST['email']), 
      "ServiceTaxNo"    =>     mysqli_real_escape_string($data->con, $_POST['servicetax']), 
      "gstNo"           =>     mysqli_real_escape_string($data->con, $_POST['gst']), 
      "cstNo"           =>     mysqli_real_escape_string($data->con, $_POST['cst']), 
      "panNo"           =>     mysqli_real_escape_string($data->con, $_POST['pan']), 
      "state"           =>     mysqli_real_escape_string($data->con, $_POST['cusState']), 
      "city"            =>     mysqli_real_escape_string($data->con, $_POST['cusCity']), 
      "area"            =>     mysqli_real_escape_string($data->con, $_POST['areaid']),
      "address"         =>     mysqli_real_escape_string($data->con, $_POST['address1']),
      "comp_id"         =>     mysqli_real_escape_string($data->con, $_POST['cust_id']), 
      "voucherid"       =>     mysqli_real_escape_string($data->con, $voucherid), 
      "pinCode"         =>     mysqli_real_escape_string($data->con, $_POST['postcode'])
            );  
       $insid = $data->insert('transporters', $insert_transport);
      $type="Transporter";
$insert_cred = array(
      "intMId"          =>    mysqli_real_escape_string($data->con, $_SESSION['MintId']),    
      "varMName"        =>     mysqli_real_escape_string($data->con, $_POST['companyname']),  
      "varMEmail"       =>     mysqli_real_escape_string($data->con, $_POST['email']), 
      "varMPassword"    =>     mysqli_real_escape_string($data->con, $_POST['tran_pwd']), 
      "varMType"        =>     mysqli_real_escape_string($data->con, $type),
      "transporter_id"  =>     mysqli_real_escape_string($data->con, $insid)        
      );  
       $inscred = $data->insert('user', $insert_cred);
/* $bank = array(
       "group_id"       =>     mysqli_real_escape_string($data->con, $_POST['group_name_acc']),
        "name"           =>     mysqli_real_escape_string($data->con, $_POST['companyname']),
        "code"           =>     mysqli_real_escape_string($data->con, $_POST['ledger_type']),
        "op_balance"     =>     mysqli_real_escape_string($data->con, $_POST['open_bal']),
        "op_balance_dc"  =>     mysqli_real_escape_string($data->con, $_POST['op_type'])
              ); 
 $voucherid = $data->insert('ledgers', $bank);*/
// the message
$msg = "User Name:".$_POST['email']."<br>Password:".$_POST['tran_pwd'];
// use wordwrap() if lines are longer than 70 characters
$msg = wordwrap($msg,70);
// send email
mail($_POST['email'],"Transporter Login Credentials",$msg);
header("location: http:../webzash/wzaccounts/create?id=$insid");
/*echo '<script> window.open(".php", "_blank");</script>';*/
   if($insid&&$inscred){
    echo '<script> alert("Transporter Added Successfully");window.location.assign("addtransporter.php");</script>';
       } 
   else{
    echo '<script> alert("Error");</script>';
   }
   }
 //}
}else
{
$update_transport = array(
      "intAdminId"      =>    mysqli_real_escape_string($data->con, $_SESSION['MintId']),    
      "name"            =>     mysqli_real_escape_string($data->con, $_POST['companyname']), 
       "alais"            =>     mysqli_real_escape_string($data->con, $_POST['alais']),  
      "contactName"     =>     mysqli_real_escape_string($data->con, $_POST['contactperson']), 
      "MobNum"          =>     mysqli_real_escape_string($data->con, $_POST['mobileno']), 
      "PhNum"           =>     mysqli_real_escape_string($data->con, $_POST['phoneno']), 
      "email"           =>     mysqli_real_escape_string($data->con, $_POST['email']), 
      "ServiceTaxNo"    =>     mysqli_real_escape_string($data->con, $_POST['servicetax']), 
      "gstNo"           =>     mysqli_real_escape_string($data->con, $_POST['gst']), 
      "cstNo"           =>     mysqli_real_escape_string($data->con, $_POST['cst']), 
      "panNo"           =>     mysqli_real_escape_string($data->con, $_POST['pan']), 
      "state"           =>     mysqli_real_escape_string($data->con, $_POST['cusState']), 
      "city"            =>     mysqli_real_escape_string($data->con, $_POST['cusCity']), 
      "area"            =>     mysqli_real_escape_string($data->con, $_POST['areaid']),
      "address"         =>     mysqli_real_escape_string($data->con, $_POST['address1']), 
      "pinCode"         =>     mysqli_real_escape_string($data->con, $_POST['postcode'])
            );  
 $id =$_REQUEST['id'];
 $update_id = array(
      "id"      =>    mysqli_real_escape_string($data->con, $id)
    );
       $insid = $data->update('transporters', $update_transport, $update_id);





$led_name= $_POST['companyname'];
$quer=mysqli_query($conn,"SELECT * FROM ledgers WHERE name='$led_name'");

$led=mysqli_fetch_array($quer);




if($_POST['open_bal'] != $led['op_balance'] || $_POST['op_type'] != $led['op_balance_dc']||$_POST['group_name']!=$led['group_id'])
{
/*
echo $_POST['open_bal'].",".$led['op_balance'];
echo $_POST['ledger_type'].",".$led['op_balance_dc'];
echo $_POST['group_name'].",".$led['group_id'];

  echo '<script> alert("Something Changed");</script>';*/

$upd_id = array(
      "id"      =>    mysqli_real_escape_string($data->con, $led['id'])
    );

 $bnk = array(
       "group_id"       =>     mysqli_real_escape_string($data->con, $_POST['group_name_acc']),
        "code"           =>     mysqli_real_escape_string($data->con, $_POST['ledger_type']),
        "op_balance"     =>     mysqli_real_escape_string($data->con, $_POST['open_bal']),
        "op_balance_dc"  =>     mysqli_real_escape_string($data->con, $_POST['op_type']),
              ); 

       $insid = $data->update('ledgers', $bnk, $upd_id);







$trans=str_replace(' ','_',$_POST["companyname"]);
 $trans=strtolower($trans);
 $entries=$trans."entries";
 $ent_items=$trans."entryitems";
$ledgers=$trans."ledgers";
echo '<script>alert("'. $entries.'");</script>';

$findnos =mysqli_query($conn,"SELECT * FROM `".$ledgers."` WHERE name ='Ass Logistics'; " );
$nos=mysqli_fetch_assoc($findnos);

$insert_hire = array(   

      "op_balance"    =>     mysqli_real_escape_string($data->con, $_POST['open_bal'])
     
      );  
$upd_id = array(
      "id"      =>    mysqli_real_escape_string($data->con, $nos['id'])
    );


     $insid = $data->update($ledgers, $insert_hire, $upd_id);


}
else
{
  echo '<script> alert("Nothing Changed");</script>';
}




      if($insid){
    echo '<script> alert("Transporter Altered Successfully");window.location.assign("viewtransporter.php");</script>';
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
    $insid = $data->select_where('transporters', $update_id);
 }
?> 
    <div class="am-mainpanel">
      <div class="am-pagetitle">
        <h5 class="am-title">Transporter Master</h5>             
        <!-- search-bar -->
      </div>
      <!-- am-pagetitle -->
        <form id="searchBar" class="search-bar"  method="POST" action="">
      <div class="am-pagebody">
 <div class="card pd-20 form-layout form-layout-4">
       <div class="row row-sm mg-t-20">
          <div class="col-xl-6">
            <div class="portlet-body">
           <h6 class="card-body-title">Transporter Details</h6>
    <div class="row mg-t-10"> 
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.16.0/jquery.validate.min.js"></script> 
<script>

$(document).ready( function () {
    $( "#searchBar" ).validate( {
    
        rules: {
          companyname: "required",
          contactperson: {
            required: true,
            minlength: 3
          },
           gst: {
            required: true,
            minlength: 15
          },
          pan: {
            required: true,
            minlength: 10
          }, 
          mobileno: {
            required: true,
            minlength: 10
          },
           open_bal: {
            required: true,
            minlength: 1
          },
               postcode: {
            required: true,
            minlength: 6
          },
            tran_pwd: {
            required: true,
            minlength: 6
          },
            tran_ret: {
            required: true,
            minlength: 6,
            equalTo: "#tran_pwd"
          },
        
          email: {
            /*required: true,*/
            email: true
          }
          },
        messages: {
          companyname: "Please enter your Transporter Name",
          contactperson: {
            required: "Please enter Contact Person Name",
            minlength: "Your Person Name must consist of at least 2 characters"
          },
           gst: {
            required: "Please enter GST/TIN Number",
            minlength: "Your GST must consist of 15 digits"
          },
          pan: {
            required: "Please enter PAN Number",
            minlength: "Your PAN must consist of 10 digits"
          },
          mobileno: {
            required: "Please enter Mobile Number",
            minlength: "Your Mobile Number must consist of 10 digits"
          },
              open_bal: {
            required: "Please enter Opening Balance",
          },
          postcode: {
            required: "Please enter Pincode",
            minlength: "Your Pincode must consist of 6 digits"
          },
          tran_pwd: {
            required: "Please provide a password",
            minlength: "Your password must be at least 6 characters long"
          },
          
          tran_ret: {
            required: "Please provide a password",
            minlength: "Your password must be at least 6 characters long"
          },
          
          email: "Please enter a valid email address"
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
<?php
if($_REQUEST['flag'] != "Edit"){
?>
 <input class="form-control" data-val="true" data-val-length="Invalid Mobile No." data-val-length-max="15" data-val-length-min="10"  maxlength="15" id="cust_id" name="cust_id"  type="hidden" value="" > <!-- Auto Generate Code -->
                <script>
  var now = new Date();
  var randomNum =  Math.floor(1000 + Math.random() * 9000);
  var elem = document.getElementById("cust_id").value = "TRANSP"+randomNum;
</script>
<?php
}
else
{
?>
 <input class="form-control" data-val="true" data-val-length="Invalid Mobile No." data-val-length-max="15" data-val-length-min="10"  maxlength="15" id="cust_id" name="cust_id"  type="hidden" value="<?php echo $insid[0]['comp_id'];?>" >
 <?php
}
 ?>
<script>
/* function empty()
{ 
//  alert("value");
var comp = $('#companyname').val();
var contact = $('#contactperson').val();
var mob = $('#mobileno').val();
var gst = $('#gst').val();
var pan = $('#pan').val();
var addr = $('#address1').val();
var pwd = $('#tran_pwd').val();
if(comp.trim()=="" || contact.trim()=="" || mob.trim()=="" || gst.trim()=="" || pan.trim()=="" || addr.trim()=="" || pwd=="" )
{
$('#sub').attr('disabled', true);
}
else
{
  $('#sub').attr('disabled', false);
}
} */
</script>
  <label class="col-md-4 form-control-label">Transporter Name:<p style="color: red;">*</p></label>
                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
     <input class="form-control emp_val" data-val="true" placeholder="Enter Transporter Name" id="companyname" maxlength=35" name="companyname" type="text" value="<?php echo $insid[0]['name']; ?>" onkeyup="empty()">
        <span class="field-validation-valid font-red" data-valmsg-for="companyname" data-valmsg-replace="true"></span>
                </div>
               </div>
                    <div class="row mg-t-10">
                        <label class="col-md-4 form-control-label">Alias Name:</label>
              <div class="col-sm-8 mg-t-10 mg-sm-t-0">
         <input class="form-control" data-val="true" placeholder="Enter Alias Name" id="alais" maxlength="100" name="alais" type="text" value="<?php echo $insid[0]['alais']; ?>" onkeyup="empty()">
    
           </div>
                      </div>
             <div class="row mg-t-10">
                        <label class="col-md-4 form-control-label">Contact Person:<p style="color: red;">*</p></label>
              <div class="col-sm-8 mg-t-10 mg-sm-t-0">
         <input class="form-control emp_val" data-val="true" placeholder="Enter Contact Person Name" id="contactperson" maxlength="20" name="contactperson" type="text"  onkeypress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123)" value="<?php echo $insid[0]['contactName']; ?>" onkeyup="empty()">
    <span class="field-validation-valid font-red" data-valmsg-for="contactperson" data-valmsg-replace="true"></span>
           </div>
                      </div>  
               <div class="row mg-t-10">
                <label class="col-md-4 form-control-label">Mobile:<p style="color: red;">*</p></label>
                    <div class="col-sm-8 mg-t-10 mg-sm-t-0">
     <input class="form-control emp_val" data-val="true" data-val-length="Invalid Mobile No." maxlength="10" data-val-length-min="10" placeholder="Enter Mobile No." id="mobileno" name="mobileno"  type="text" value="<?php echo $insid[0]['MobNum']; ?>" onkeyup="empty()">
      <span class="field-validation-valid font-red" data-valmsg-for="mobileno" data-valmsg-replace="true"></span>
                    </div>
                                        </div>
                <div class="row mg-t-10">
                   <label class="col-md-4 form-control-label">Phone:</label>
                       <div class="col-sm-8 mg-t-10 mg-sm-t-0">
     <input class="form-control" data-val="true" data-val-length="Invalid Phone No." maxlength="11" data-val-length-max="20" data-val-length-min="5" placeholder="Enter Phone No." id="phoneno" name="phoneno" type="text" value="<?php echo $insid[0]['PhNum']; ?>">
              <span class="field-validation-valid font-red" data-valmsg-for="phoneno" data-valmsg-replace="true"></span>
                           </div>
                                        </div>
                <div class="row mg-t-10">
           <label class="col-md-4 form-control-label">Email:</label>
                 <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                <input class="form-control emp_val" data-val="true" data-val-email="Invalid Email" placeholder="Enter Email" id="email" maxlength="100" name="email" type="text" value="<?php echo $insid[0]['email']; ?>">
              <span class="field-validation-valid font-red" data-valmsg-for="email" data-valmsg-replace="true"></span>
                           </div>
                                        </div>
                                       <!-- 
                                        <div class="row mg-t-10">
    <label class="col-md-4 form-control-label">Service Tax No.:</label>
                            <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                            <input class="form-control" data-val="true" placeholder="Enter Service Tax No." id="servicetax" maxlength="100" name="servicetax" type="text" value="<?php echo $insid[0]['ServiceTaxNo']; ?>" >
        <span class="field-validation-valid font-red" data-valmsg-for="servicetax" data-valmsg-replace="true"></span>     
                                            </div>
                                        </div>
 -->                                        <div class="row mg-t-10">
                       <label class="col-md-4 form-control-label">GST/TIN No.:<p style="color: red;">*</p></label>
                  <div class="col-sm-8 mg-t-10 mg-sm-t-0 ">                                                      
     <input class="form-control emp_val" data-val="true" placeholder="Enter GST/TIN No." id="gst" maxlength="15" name="gst" type="text" value="<?php echo $insid[0]['gstNo']; ?>" onkeyup="empty()">
 <span class="field-validation-valid font-red" data-valmsg-for="gst" data-valmsg-replace="true"></span>
                                                </div>
                                        </div>
                                      <!--   
                                        <div class="row mg-t-10">
                                         
                                                    <label class="col-md-4 form-control-label">CST No.:</label>
                                                    <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                        
                                                        <input class="form-control" data-val="true" placeholder="Enter CST No." id="cst" maxlength="100" name="cst" type="text" value="<?php echo $insid[0]['cstNo']; ?>">
                                                        <span class="field-validation-valid font-red" data-valmsg-for="cst" data-valmsg-replace="true"></span>
                                                 
                                            </div>
                                        </div> -->
                                        <div class="row mg-t-10">
                               <label class="col-md-4 form-control-label">PAN No.:<p style="color: red;">*</p></label>
                 <div class="col-sm-8 mg-t-10 mg-sm-t-0">
            <input class="form-control emp_val" data-val="true" data-val-regex="Invalid PAN Number" data-val-regex-pattern="[a-zA-Z]{5}\d{4}[a-zA-Z]{1}" maxlength="10" placeholder="Enter PAN No." id="pan" maxlength="100" name="pan" type="text" value="<?php echo $insid[0]['panNo']; ?>" onkeyup="empty()">
         <span class="field-validation-valid font-red" data-valmsg-for="pan" data-valmsg-replace="true"></span>
                                              
                                            </div>
                                        </div>
                                      </div>


  <h6 class="card-body-title mar-addr">Address Details</h6> 
               

                                                                <div class="row mg-t-10">
                                                            
                                                                <label class="col-md-4 form-control-label">State:</label>
                                                                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                                    <select onChange="getdistrict(this.value);"  name="cusState" id="cusState" class="form-control" >





<option value="">Select<?php echo $insid[0]['state'];?></option>
<?php $query =mysqli_query($conn,"SELECT * FROM state");
while($row=mysqli_fetch_array($query))
{ ?>
<option value="<?php echo $row['StCode'];?>" <?php if($row['StCode']==$insid[0]['state']) echo 'selected="selected"'; ?>><?php echo $row['StateName'];?></option>
<?php
}
?>
</select>
                                                                    <span class="field-validation-valid font-red" data-valmsg-for="stateid" data-valmsg-replace="true"></span>
                                                                
                                                            </div>
                                                        </div>
                                                        <div class="row mg-t-10">
                                                            
                                                                <label class="col-md-4 form-control-label">City:</label>
                                                                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                                    <select name="cusCity" id="district_list" class="form-control">
                                                                   <?php if($insid[0]['city'])   {
                                                                   $cid= $insid[0]['city'];
                                                       $query =mysqli_query($conn,"SELECT * FROM district where DistCode = '$cid'");        
                                                       $row=mysqli_fetch_array($query);     ?>

<option value="<?php $row['DistrictName'];?>" <?php   echo 'selected="selected"'; ?>><?php echo $row['DistrictName']; ?></option>
<?php
}
else
{
?>

<option value="">Select</option><?php }?>
</select> 
                                                                    <span class="field-validation-valid font-red" data-valmsg-for="cityid" data-valmsg-replace="true"></span>
                                                              
                                                            </div>
                                                        </div>
                                                         <div class="row mg-t-10">
                                                           
                                                                <label class="col-md-4 form-control-label">Area:</label>
                                                                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                                    <input class="form-control" data-val="true" placeholder="Enter Area" id="areaid" maxlength="50" name="areaid" type="text" value="<?php echo $insid[0]['area']; ?>">
                                                                    <span class="field-validation-valid font-red" data-valmsg-for="postcode" data-valmsg-replace="true"></span>
                                                                </div>
                                                            </div>
                                                        <div class="row mg-t-10">
                                                          
                                                                <label class="col-md-4 form-control-label">Address:</label>
                                                                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                                    <input class="form-control" data-val="true" placeholder="Enter Address" id="address1" maxlength="200" name="address1" type="text" value="<?php echo $insid[0]['address']; ?>" onkeyup="empty()">
                                                                    <span class="field-validation-valid font-red" data-valmsg-for="address1" data-valmsg-replace="true"></span>


                                                            
                                                            </div>
                                                        </div>

                                                       


                                                        <div class="row mg-t-10">
                                                           
                                                                <label class="col-md-4 form-control-label">Pincode:<p style="color: red;">*</p></label>
                                                                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                                    <input class="form-control" data-val="true" placeholder="Enter Pincode" id="postcode" maxlength="6" name="postcode" type="text" value="<?php echo $insid[0]['pincode']; ?>">
                                                                    <span class="field-validation-valid font-red" data-valmsg-for="postcode" data-valmsg-replace="true"></span>
                                                                </div>
                                                            </div> 


<script>

  $(document).on('click','#addbnk', function(){

/*alert("enter");*/




   var name = $('#acc_name').val();
   var bank_name = $('#bank_name').val();
   var accno = $('#acc_no').val();
   var ifsc = $('#ifsc_code').val();
   var action ="Insert";
   var id =$('#cust_id').val();
var ins="Transporter";


   var grp =$('#group_name').val();
   var led =$('#ledger_type').val();
   var nat =$('#nature').val();
   var op =$('#opbal').val();
if(name&&accno&&ifsc)
{




  $.ajax({
     url:"insert_bank.php",
     method:"POST",
     data:{comp_name:name, bnk_name:bank_name, acc_no:accno, ifsc_cde:ifsc, act:action, cust_id:id , by:ins, group:grp, led_type:led,nature:nat,op_bal:op},
     success:function(data)
     {
      /*alert(data);*/
      fetch_data();
 $('#acc_name').val("");
 $('#bank_name').val("");
 $('#acc_no').val("");
 $('#ifsc_code').val("");
 $('#demoModal').modal('hide');




     }
    });
}
else{
  alert("Please Fill all Fields");

/*  */

}
  });
</script>

 <script >
$(function () {
$("#add").click(function(){
$('#demoModal').modal('show');
});
});
</script>
<script>
  function fetch_data()
  {
    var cid = $("#cust_id").val(); 
   /* alert(cid);*/
    var action ="Fetch";

    $.ajax({    
        type: "POST",
        url: "insert_bank.php",
        data:{custid:cid,act:action},            
        dataType: "html",          
        success: function(response){     
                     
            $("#responsecontainer").html(response); 
            //alert(response);
        }

    });
  }
</script>
<script>
function deletefuel(val)
{
alert(val);
$.ajax({
     url:"insert_bank.php",
     method:"POST",
     data:{value:val},
     success:function(data)
     {

fetch_data();

}
});
}
</script>



                                    </div> 
           <div class="col-xl-6">
                
               <div class="portlet-body">
                             


 <h6 class="card-body-title">Accounting Details</h6> 
                                                 
 <div class="row mg-t-10">
<?php
$led_name= $insid[0]['name'];
$quer=mysqli_query($conn,"SELECT * FROM ledgers WHERE name='$led_name'");

$led=mysqli_fetch_array($quer);
?>


                                                           
                               <label class="col-md-4 form-control-label">Opening Balance:<p style="color: red;">*</p></label>
                                                  <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                         <input class="form-control emp_val" data-val="true" placeholder="Enter Opening Balance" id="open_bal" maxlength="50" name="open_bal" type="text" value="<?php echo $led['op_balance']; ?>">
                                       <span class="field-validation-valid font-red" data-valmsg-for="postcode" data-valmsg-replace="true"></span>
                                                                </div>
                                                            </div> 

   <div class="row mg-t-10">


                                                
                                                        <label class="col-md-4 form-control-label">Ledger Type :</label>
                                                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                           

                                                           <select class="form-control" name="op_type" id="op_type"  value="<?php echo $led['op_balance_dc']; ?>">
                                                           
               <option <?php if($led['op_balance_dc']=="D"){ echo 'selected="selected"';} ?> value="D">Dr</option>
               <option <?php if($led['op_balance_dc']=="C"){ echo 'selected="selected"';} ?>  value="C">Cr</option>

                                                              
                                                            </select>

                                                            
                                                            <span class="field-validation-valid font-red" data-valmsg-for="bankname" data-valmsg-replace="true"></span>
                                                </div>
                                            </div>





                                              <div class="row mg-t-10">
                                                
                                                        <label class="col-md-4 form-control-label">Group Name :</label>
                                                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                           

                                                           <select class="form-control" name="group_name_acc" id="group_name_acc"  value="<?php echo $led['group_id']; ?>">
                                                            <?php
 $group = mysqli_query($conn,"SELECT * from groups WHERE parent_id<>''"); 

                while ($grp = mysqli_fetch_array($group)){
                                                            ?>
        <option value="<?php echo $grp['id'];?>" <?php if($grp['id']==$led['group_id']) echo 'selected="selected"'; ?>><?php echo $grp['name'];?></option>
                                                              <?php


}
                                                              ?>
                                                              
                                                            </select>

                                                            
                                                            <span class="field-validation-valid font-red" data-valmsg-for="bankname" data-valmsg-replace="true"></span>
                                                </div>
                                            </div>





                                                 <div class="row mg-t-10">
                                                
                                                        <label class="col-md-4 form-control-label">Code :</label>
                                                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                            
                                                            <input type="text" class="form-control" name="ledger_type" id="ledger_type" value="<?php echo $led['code']; ?>" placeholder="Ledger Code">
                                                             
                                                            <span class="field-validation-valid font-red" data-valmsg-for="bankname" data-valmsg-replace="true"></span>
                                                </div>
                                            </div>






            <div class="col-sm-8 mg-t-10 mg-sm-t-0">
              <label class="col-md-12 form-control-label ckbox mrg-btm-10 font-pro">
                <input id="hirebox" name="check_hire" type="checkbox" onclick="hide()" ">
                <span>Hire Transporter</span>
              </label>

            </div>

<script>
function hide()
{
    if ($("#hirebox").prop('checked')==true){ 
         $("#logindiv").hide();
    }
    else
    {
      $("#logindiv").show();
    }
    check();
}
</script>


<div style="padding-top: 10px" id="logindiv">
<div class="col-md-6">
         <div class="row mg-t-10"> 
           <h6 class="card-body-title">Login Details</h6>
         </div>





       </div> 


<?php
if($_REQUEST['flag']=="Edit")
{
$id=$insid[0]['id'];
 $pwds = mysqli_query($conn,"SELECT * from user WHERE transporter_id='$id';  "); 

               $pwd = mysqli_fetch_array($pwds);
$i="readonly";
}
?>


       

 <div class="row mg-t-10">
                                                           
                                                                <label class="col-md-4 form-control-label">Password:<p style="color: red;">*</p></label>
                                                                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                                    <input class="form-control emp_val" data-val="true" placeholder="Enter Password" id="tran_pwd" maxlength="50" name="tran_pwd" type="Password" onkeyup="empty()" value="<?php echo $pwd['varMPassword'];?>" <?php echo $i;?> >
                                                                    <span class="field-validation-valid font-red" data-valmsg-for="postcode" data-valmsg-replace="true"></span>
                                                                </div>
                                                            </div>

 <div class="row mg-t-10">
                                                           
                                                                <label class="col-md-4 form-control-label">Re-type Password:<p style="color: red;">*</p></label>
                                                                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                                    <input class="form-control emp_val" data-val="true" placeholder="Re-Enter Password" id="tran_ret" maxlength="50" name="tran_ret" type="Password" onkeyup="check();" <?php echo $i;?> >

                                                                    <span class="field-validation-valid font-red" data-valmsg-for="postcode" data-valmsg-replace="true"></span>
                                                                </div>

                                                            </div>
                                                          </div>


<script>
function check()
{
/*  alert("Googl");*/
var pwd1 = $('#tran_pwd').val();
var pwd2 = $('#tran_ret').val();
if ($("#hirebox").prop('checked')!=true)
{
if(pwd1!=pwd2)
{
$('#pwdmat').html("Password Do Not Match").css('color', '#FF0000');
$(':input[type="submit"]').prop('disabled', true);
}
else
{
  $('#pwdmat').html("Password Match").css('color', '#008000');
  $(':input[type="submit"]').prop('disabled', false);
}
  }
  else
  {
    $('#pwdmat').html("");
  $(':input[type="submit"]').prop('disabled', false);
  }
}
</script>
 <div id="pwdmat">
                                                                </div>



                                  </div>

                      <div class="form-layout-footer mg-t-20">
                <button type="submit" value="submit" name="submit" id="sub" class="btn btn-sub mg-r-5">Submit</button>
                <input type="hidden" name="action" value="<?php if($_REQUEST['flag'] =='Edit') echo $_REQUEST['flag']; else echo 'Add'; ?>">
                <button class="btn btn-secondary" id="cancel" type="mysqli_real_escape_string">Cancel</button>
              </div>


                                    </div>

          
        </div>
 
</div>
      </div><!-- am-pagebody -->
    </form>
      <?php 
      include('../include/adminfooter.php'); ?> 





      <script>
$('.datepicker').datepicker({
    dateFormat: 'dd/mm/yy'
});
</script>
     <script>
     function getdistrict(val) {
  $.ajax({
  type: "POST",
  type: "POST",
  url: "get_district.php",
  data:'state_id='+val,
  success: function(data){ 
    $("#district_list").html(data);
  }
  });
}
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
  input.invalid, textarea.invalid{
  border: 0.1px solid #d20505;
}
input.valid, textarea.valid{
  border-radius: 0 ;
}
</style>
<script>
$('#mobileno').on('input blur change', function() {
  var input= $(this);
  var is_name=input.val();
/*alert(is_name);*/

var value=$('#mobileno').val();
if (isNaN(is_name)) {
  /*alert("is not numeric")*/
/*input.removeClass("valid").addClass("invalid");*/

this.value = value.substr(0, value.length - 1);

$('#mobileno').val(this.value);
}

if(value.length<10)
{
  input.removeClass("valid").addClass("invalid");
}


});

</script>

<script>
$('#phoneno').on('input blur change', function() {
  var input= $(this);
  var is_name=input.val();
/*alert(is_name);*/

var value=$('#phoneno').val();
if (isNaN(is_name)) {
  /*alert("is not numeric")*/
/*input.removeClass("valid").addClass("invalid");*/

this.value = value.substr(0, value.length - 1);

$('#phoneno').val(this.value);
}

});

</script>

<script type="text/javascript">
  $('#email').on('input blur change', function() {
  var input=$(this);
  var re = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
  var is_email=re.test(input.val());
  if(is_email){input.removeClass("invalid").addClass("valid");}
  else{input.removeClass("valid").addClass("invalid");}
});
</script>
<script>
$('#gst,#pan').keypress(function (e) {
    var regex = new RegExp("^[a-zA-Z0-9]+$");
    var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
    if (regex.test(str)) {
        return true;
    }

    e.preventDefault();
    return false;
});

  /* $('#gst').on('blur change', function() {
        var input=$(this);
var value=$('#gst').val();
//alert("asd");
if(value.length<15)
{
  input.removeClass("valid").addClass("invalid");
}
}); 
$('#pan').keypress(function (e) {
    var regex = new RegExp("^[a-zA-Z0-9]+$");
    var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
    if (regex.test(str)) {
        return true;
    }

    e.preventDefault();
    return false;
});

     $('#pan').on('blur change', function() {
        var input=$(this);
var value=$('#pan').val();
if(value.length<10)
{
  input.removeClass("valid").addClass("invalid");
}
});*/
$('#postcode').on('input blur change', function() {
  var input= $(this);
  var is_name=input.val();
/*alert(is_name);*/

var value=$('#postcode').val();
if (isNaN(is_name)) {
  /*alert("is not numeric")*/
/*input.removeClass("valid").addClass("invalid");*/

this.value = value.substr(0, value.length - 1);

$('#postcode').val(this.value);
}

if(value.length<6)
{
  input.removeClass("valid").addClass("invalid");
}
else
{
  input.removeClass("invalid").addClass("valid");
}

});

</script>
<script>
$('#gst').keypress(function (e) {
    var regex = new RegExp("^[a-zA-Z0-9]+$");
    var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
    if (regex.test(str)) {
        return true;
    }

    e.preventDefault();
    return false;
});

  </script>
<script>
$('#open_bal').on('input blur change', function() {
  var input= $(this);
  var is_name=input.val();
/*alert(is_name);*/

var value=$('#open_bal').val();
if (isNaN(is_name)) {
  /*alert("is not numeric")*/
/*input.removeClass("valid").addClass("invalid");*/

this.value = value.substr(0, value.length - 1);

$('#open_bal').val(this.value);
}



});

</script>



<script>
/* $("#sub").click(function(e) {
// alert("maans");

var c=$('.emp_val');
//  alert(c.length);
    if ($(".invalid").length > 0) {
        // Do some code here
    alert("Please Fill the Details Correctly");
e.preventDefault();
    }
    else if(c!=0)
    {
for(var i=0;i < c.length; i++)
{
var input= $(this);
//  alert(id);
  var curr=$(c[i]).val();

  curr=$.trim(curr);
    if(curr==0)
    {
      alert("Fields Should not be left empty.");

  input.removeClass("valid").addClass("invalid");
  e.preventDefault();
  break;
    }

    }

}
}); */
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
  window.location.href = "addtransporter.php";
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