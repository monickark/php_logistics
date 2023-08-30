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

if($_REQUEST['action'] == "Add"){

    $target = "Customer_files/";  

  $fileName = $_FILES['aadfileupd']['name'];
/*echo '<script> alert("'.$fileName.'");</script>';*/


$name=$_POST["consigneename"];
$under="Logistics";

$bank_check=mysqli_query($conn,"SELECT * FROM ledger WHERE name ='$name' AND under = '$under'; " );
$insert_cust = array(
    "intAdminId"      =>     mysqli_real_escape_string($data->con, $_SESSION['MintId']),    
    "name"            =>     mysqli_real_escape_string($data->con, $_POST['consigneename']),  
    "comm_id"         =>     mysqli_real_escape_string($data->con, $_POST['cust_id']), 
    "cust_name"       =>     mysqli_real_escape_string($data->con, $_POST['contactperson']), 
    "mobNum"          =>     mysqli_real_escape_string($data->con, $_POST['mobileno']),
    "email"           =>     mysqli_real_escape_string($data->con, $_POST['emailid']), 
    "gstNo"           =>     mysqli_real_escape_string($data->con, $_POST['gst']), 
    "panNo"           =>     mysqli_real_escape_string($data->con, $_POST['pan']), 
    "aadhar"          =>     mysqli_real_escape_string($data->con, $_POST['aadharno']), 
    "state"           =>     mysqli_real_escape_string($data->con, $_POST['cusState']), 
    "city"            =>     mysqli_real_escape_string($data->con, $_POST['cusCity']), 
    "area"            =>     mysqli_real_escape_string($data->con, $_POST['areaid']),
    "address"         =>     mysqli_real_escape_string($data->con, $_POST['address1']), 
    "pinCode"         =>     mysqli_real_escape_string($data->con, $_POST['postcode']),
    "pref_1"          =>     mysqli_real_escape_string($data->con, $_POST['lrentry']),
    "pref_2"          =>     mysqli_real_escape_string($data->con, $_POST['referenceno']),
    "pref_3"          =>     mysqli_real_escape_string($data->con, $_POST['remarks']),
    "ledger_id"       =>     mysqli_real_escape_string($data->con, $voucherid)
      
      );  
       $insid = $data->insert('customer', $insert_cust);
     /* echo '<script> alert("'.$insid.'");</script>';*/
  $update_id = array(
      "id"      =>    mysqli_real_escape_string($data->con, $insid)
    );
    if($fileName!='')
    {

      $fileTarget   = $target.$insid.'_'.$fileName;
      $tempFileName = $_FILES["aadfileupd"]["tmp_name"];


      echo '<script> alert("'.$tempFileName.'");</script>';


      move_uploaded_file($tempFileName,$fileTarget);

      $upd_img = array(
        "aadhar_upld" =>     mysqli_real_escape_string($data->con, $insid.'_'.$fileName)
      );

      $update = $data->update('customer', $upd_img,$update_id);
    }
        $bank = array(
       
        "group_id"       =>     mysqli_real_escape_string($data->con, $_POST['group_name']),
        "name"           =>     mysqli_real_escape_string($data->con, $_POST['consigneename']),
        "code"           =>     mysqli_real_escape_string($data->con, $_POST['ledger_type']),
        "op_balance"     =>     mysqli_real_escape_string($data->con, $_POST['open_bal']),
        "op_balance_dc"  =>     mysqli_real_escape_string($data->con, $_POST['op_type']),
        
      ); 
 $voucherid = $data->insert('ledgers', $bank);





   if($insid){

    echo '<script> alert("Customer Addeed Successfully");window.location.assign("addconsigner.php");</script>';
   } 
   else{
    echo '<script> alert("Error");</script>';
   }
}else
{

$update_cust = array(
    "intAdminId"      =>     mysqli_real_escape_string($data->con, $_SESSION['MintId']),    
    "name"            =>     mysqli_real_escape_string($data->con, $_POST['consigneename']),  
    "comm_id"         =>     mysqli_real_escape_string($data->con, $_POST['cust_id']), 
    "cust_name"       =>     mysqli_real_escape_string($data->con, $_POST['contactperson']), 
    "mobNum"          =>     mysqli_real_escape_string($data->con, $_POST['mobileno']),
    "email"           =>     mysqli_real_escape_string($data->con, $_POST['emailid']), 
    "gstNo"           =>     mysqli_real_escape_string($data->con, $_POST['gst']), 
    "panNo"           =>     mysqli_real_escape_string($data->con, $_POST['pan']), 
    "aadhar"          =>     mysqli_real_escape_string($data->con, $_POST['aadharno']), 
    "state"           =>     mysqli_real_escape_string($data->con, $_POST['cusState']), 
    "city"            =>     mysqli_real_escape_string($data->con, $_POST['cusCity']), 
    "area"            =>     mysqli_real_escape_string($data->con, $_POST['areaid']),
    "address"         =>     mysqli_real_escape_string($data->con, $_POST['address1']), 
    "pinCode"         =>     mysqli_real_escape_string($data->con, $_POST['postcode']),
    "pref_1"          =>     mysqli_real_escape_string($data->con, $_POST['lrentry']),
    "pref_2"          =>     mysqli_real_escape_string($data->con, $_POST['referenceno']),
    "pref_3"          =>     mysqli_real_escape_string($data->con, $_POST['remarks'])
      
      );  
 $id =$_REQUEST['id'];
 $update_id = array(
      "id"      =>    mysqli_real_escape_string($data->con, $id)
    );

       $insid = $data->update('customer', $update_cust, $update_id);
      if($insid){

    echo '<script> alert("Customer Altered Successfully");window.location.assign("viewconsigner.php");</script>';
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

    $insid = $data->select_where('customer', $update_id);
 }

?> 
                                             
<!-- <script>
function empty()
{ 

/*  alert("value");*/
var comp = $('#consigneename').val();
var contactper = $('#contactperson').val();
/*var contact = $('#datepicker001').val();*/
var mob = $('#mobileno').val();
var gst = $('#gst').val();
var pan = $('#pan').val();
/*var aadhar = $('#aadharno').val();*/




if(comp.trim()=="" || mob.trim()=="" || gst.trim()=="" || pan.trim()=="" || contactper.trim()=="" )
{

$('#sub').attr('disabled', true);
}
else
{
  $('#sub').attr('disabled', false);
}
}

</script> -->
  
    

    <div class="am-mainpanel">
      <div class="am-pagetitle">
        <h5 class="am-title">Customer Master</h5>
      
          
        <!-- search-bar -->
      </div>
      <!-- am-pagetitle -->
        <form id="searchBar" class="search-bar"  method="POST" action="" enctype="multipart/form-data">
      <div class="am-pagebody">
 <div class="card pd-20 pd-sm-40 form-layout form-layout-4">
       <div class="row row-sm mg-t-20">
          <div class="col-xl-6">
           
            <div class="portlet-body">
                                          <h6 class="card-body-title">Customer Details</h6>
                                    
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.16.0/jquery.validate.min.js"></script> 
<script>

$(document).ready( function () {
    $( "#searchBar" ).validate( {
    
        rules: {
          consigneename: "required",
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
                  aadharno: {
            required: true,
            minlength: 12
          },                        
          emailid: {
            /*required: true,*/
            email: true
          },
          /*Preferences: "required",*/
          aadfileupd: "required"
           
          },
        messages: {
          consigneename: "Please enter your Consignee Name",
          contactperson: {
            required: "Please enter Contact Person Name",
            minlength: "Your Personname must consist of at least 2 characters"
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
            required: "Please enter Pincode ",
            minlength: "Your Pincode must consist of 6 digits"
          },
          aadharno: {
            required: "Please enter Aadhar Number",
            minlength: "Your Aadhar must consist of 12 digits"
          },
     
     
             emailid: "Please enter a valid email address",
          /*Preferences: "Please Select the References",*/
          aadfileupd: "Please Upload the Document"
       
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

  var elem = document.getElementById("cust_id").value = randomNum;
</script>
                                        
                      <?php
}
else
{


                      ?>      

<input class="form-control" data-val="true" data-val-length="Invalid Mobile No." data-val-length-max="15" data-val-length-min="10"  maxlength="15" id="cust_id" name="cust_id"  type="hidden" value="<?php echo $insid[0]['comm_id']; ?>" >


                      <?php
                      }?>                
                                               
                                        <div class="row mg-t-10">
                                            
                                                
                                                    <label class="col-md-4 form-control-label">Name:<p style="color: red;">*</p></label>                                                    
                                                    <div class="col-sm-8 mg-t-10 mg-sm-t-0 ">
                                                        
                                                        <input class="form-control valid emp_val" maxlength="25" data-val="true" placeholder="Enter Name" id="consigneename" maxlength="100" name="consigneename" type="text" value="<?php echo $insid[0]['name']; ?>"  onkeyup="empty()"  required  >
                                                        <span class="font-red field-validation-valid" data-valmsg-for="consigneename" data-valmsg-replace="true"></span>
                                                    </div>
                                                </div>
                                            
                                        </div>
                                    

                                                   <div class="row mg-t-10">
                        
                                <label class="col-md-4 form-control-label">Contact Person :<p style="color: red;">*</p></label>
                                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                    <input class="form-control emp_val" maxlength="15" data-val="true" data-val-length="Invalid Mobile No." data-val-length-max="15" data-val-length-min="10" placeholder="Enter Contact Person" id="contactperson" maxlength="50" name="contactperson"  type="text" value="<?php echo $insid[0]['cust_name']; ?>" onkeyup="empty()" required >
                                    <span class="field-validation-valid font-red" data-valmsg-for="mobileno" data-valmsg-replace="true"></span>
                        </div>
                    </div>
                                            <div class="row mg-t-10">
                        
                                <label class="col-md-4 form-control-label">Mobile :<p style="color: red;">*</p></label>
                                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                    <input class="form-control emp_val" data-val="true" data-val-length="Invalid Mobile No." data-val-length-max="15" maxlength="10" data-val-length-min="10" placeholder="Enter Mobile No." id="mobileno" maxlength="15" name="mobileno"  type="text" value="<?php echo $insid[0]['mobNum']; ?>" onkeyup="empty()" required >
                                    <span class="field-validation-valid font-red" data-valmsg-for="mobileno" data-valmsg-replace="true"></span>
                        </div>
                    </div>

<div class="row mg-t-10">
                        
                                <label class="col-md-4 form-control-label">E-mail :</label>
                                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                    <input class="form-control " data-val="true" data-val-length="Invalid Mobile No." data-val-length-max="50" data-val-length-min="10" placeholder="Enter email id." id="emailid" maxlength="50" name="emailid"  type="text" value="<?php echo $insid[0]['email']; ?>" >
                                    <span class="field-validation-valid font-red" data-valmsg-for="mobileno" data-valmsg-replace="true"></span>
                        </div>
                    </div>


                                                <div class="col-md-4">
                                           <div class="row mg-t-10"> 
                                       <h6 class="card-body-title">Other Details</h6>
</div></div>

            <div class="row mg-t-10">
                                                        
                                                            <label class="col-md-4 form-control-label">GST :<p style="color: red;">*</p></label>
                                                            <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                                <input class="form-control emp_val" maxlength="15" data-val="true" placeholder="Enter GST/TIN No." id="gst" maxlength="15" name="gst" type="text" value="<?php echo $insid[0]['gstNo']; ?>" onkeyup="empty()">
                                                                <span class="field-validation-valid font-red" data-valmsg-for="gst" data-valmsg-replace="true"></span>
                                                           
                                                        
                                                    </div>

                                                </div>
                                           
                                                    <div class="row mg-t-10">
                                                        
                                                            <label class="col-md-4 form-control-label">PAN No.:<p style="color: red;">*</p></label>
                                                            <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                                <input class="form-control emp_val" data-val="true" data-val-regex="Invalid PAN Number" data-val-regex-pattern="[a-zA-Z]{5}\d{4}[a-zA-Z]{1}" placeholder="Enter PAN No." id="pan" maxlength="10" name="pan" type="text" value="<?php echo $insid[0]['panNo']; ?>" onkeyup="empty()">
                                                                <span class="field-validation-valid font-red" data-valmsg-for="pan" data-valmsg-replace="true"></span>
 
                                                    </div>
                                                </div>
                                                 <div class="row mg-t-10">

          <label class="col-md-4 form-control-label">Aadhar Number :<p style="color: red;">*</p></label>
          <div class="col-sm-8 mg-t-10 mg-sm-t-0">
            <input class="form-control" data-val="true" data-val-length="Invalid Mobile No."  maxlength="12" data-val-length-max="12" data-val-length-min="12" placeholder="Enter Aadhar Number" id="aadharno" name="aadharno" type="text" value="<?php echo $insid[0]['aadhar']; ?>" >
            <span class="field-validation-valid font-red" data-valmsg-for="aadharno" data-valmsg-replace="true"></span>
          </div>
        </div>
<script>

  $(document).on('click','#addbnk', function(){
  var name = $('#acc_name').val();
   var bank_name = $('#bank_name').val();
   var accno = $('#acc_no').val();
   var ifsc = $('#ifsc_code').val();
   var action ="Insert";
   var id =$('#cust_id').val();
if(name&&accno&&ifsc)
{

  $.ajax({
     url:"insert_bank.php",
     method:"POST",
     data:{comp_name:name, bnk_name:bank_name, acc_no:accno, ifsc_cde:ifsc, act:action, cust_id:id},
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
/*    alert(cid);*/
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
/*alert(val);*/
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
                  <h6 class="card-body-title">Address Details</h6> 
               
               <div class="portlet-body">
                             
                                                                <div class="row mg-t-10">
                                                            
                                                                <label class="col-md-4 form-control-label">State:</label>
                                                                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                                    <select onChange="getdistrict(this.value);"  name="cusState" id="cusState" class="form-control" >

<option value="">Select </option>
<?php $query =mysqli_query($conn,"SELECT * FROM state");
while($row=mysqli_fetch_array($query))
{ ?>
<option value="<?php echo $row['StCode'];?>" <?php if($row['StCode']==$insid[0]['state']) echo 'selected="selected"'; ?> ><?php echo $row['StateName'];?></option>
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
                                                                    <select name="cusCity" id="district-list" class="form-control">
                                                                   <?php if($insid[0]['city'])   {
                                                                   $cid= $insid[0]['city'];
                                                       $query =mysqli_query($conn,"SELECT * FROM district where DistCode = '$cid'");        
                                                       $row=mysqli_fetch_array($query);     ?>

<option value="<?php echo $row['DistCode'];?>" <?php   echo 'selected="selected"'; ?>><?php echo $row['DistrictName']; ?></option>
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
                                                                    <input class="form-control" data-val="true" placeholder="Enter Address" id="address1" maxlength="200" name="address1" type="text" value="<?php echo $insid[0]['address']; ?>" >
                                                                    <span class="field-validation-valid font-red" data-valmsg-for="address1" data-valmsg-replace="true"></span>


                                                            
                                                            </div>
                                                        </div>

                                                       


                                                        <div class="row mg-t-10">
                                                           
                                                                <label class="col-md-4 form-control-label">Pincode:<p style="color: red;">*</p></label>
                                                                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                                    <input class="form-control" data-val="true" placeholder="Enter Pincode" id="postcode" maxlength="6" name="postcode" type="text" value="<?php echo $insid[0]['pinCode']; ?>" >
                                                                    <span class="field-validation-valid font-red" data-valmsg-for="postcode" data-valmsg-replace="true"></span>
                                                                </div>
                                                            </div> 



<h6 class="card-body-title mrg-tp">Accounting Details</h6> 
                                                        <div class="row mg-t-10">

<?php
$id= $insid[0]['ledger_id'];
$quer=mysqli_query($conn,"SELECT * FROM ledger WHERE id='$id'");

$led=mysqli_fetch_array($quer);
?>


                                                           
                                                                <label class="col-md-4 form-control-label">Opening Balance:<p style="color: red;">*</p></label>
                                                                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                                    <input class="form-control emp_val" data-val="true" placeholder="Enter Opening Balance" id="open_bal" maxlength="50" name="open_bal" type="text" value="<?php echo $led['opening_bal']; ?>">
                                                                    <span class="field-validation-valid font-red" data-valmsg-for="postcode" data-valmsg-replace="true"></span>
                                                                </div>
                                                            </div> 

   <div class="row mg-t-10">
                                                
                                                        <label class="col-md-4 form-control-label">Ledger Type :</label>
                                                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                           

                                                           <select class="form-control" name="op_type" id="op_type"  value="<?php echo $led['op_type']; ?>">
                                                           op_type
                                                              <option value="D">Dr</option>
                                                              <option value="C">Cr</option>

                                                              
                                                            </select>

                                                            
                                                            <span class="field-validation-valid font-red" data-valmsg-for="bankname" data-valmsg-replace="true"></span>
                                                </div>
                                            </div>




                                                            <div class="row mg-t-10">
                                                
                                                        <label class="col-md-4 form-control-label">Group Name :</label>
                                                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                           

                                                           <select class="form-control" name="group_name" id="group_name"  value="<?php echo $led['group_name']; ?>">
                                                            <?php
 $group = mysqli_query($conn,"SELECT * from groups WHERE parent_id<>''"); 

                while ($grp = mysqli_fetch_array($group)){
                                                            ?>
                                                              <option value="<?php echo $grp['id'];?>"><?php echo $grp['name'];?></option>
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
                                                            
                                                            <input type="text" class="form-control" name="ledger_type" id="ledger_type" value="<?php echo $led['type']; ?>" placeholder="Ledger Code"  >
                                                             
                                                            <span class="field-validation-valid font-red" data-valmsg-for="bankname" data-valmsg-replace="true"></span>
                                                </div>
                                            </div>  



 <div class="col-md-6">
                                           <div class="row mg-t-10"> 
                                       <h6 class="card-body-title" id="Preferences">Bill Preferences</h6>
</div></div>

  <div class="row mg-t-10">
  

              <div class="col-sm-8 mg-t-10 mg-sm-t-0">
      <label class="ckbox ckbox-bill">

<?php 
if( $insid[0]['pref_1']=="1")
{
  ?>
<input type="checkbox" id= "lrentry"  name="lrentry" value="1" checked>

<?php
}
else
{
?>

                 <input type="checkbox" name="lrentry" value="1">
<?php
}
?>

        <span class="field-validation-valid font-red" data-valmsg-for="postcode" data-valmsg-replace="true">LR Entry</span>
                                                                    </label>
                                                                </div>
                                                                
                                                               
                                                            </div> 
<div class="row mg-t-10">
<div class="col-sm-8 mg-t-10 mg-sm-t-0">
                     <label class="ckbox ckbox-bill">

<?php 
if( $insid[0]['pref_2']=="1")
{
  ?>
<input type="checkbox" name="referenceno" value="1" checked>

<?php
}
else
{
?>
 <input type="checkbox" name="referenceno" value="1">
<?php

}
?>
<span class="field-validation-valid font-red" data-valmsg-for="postcode" data-valmsg-replace="true">Reference</span>
                                                                    </label>
                                                                </div>
                                                                
                                                               
         </div> 
                                                            <div class="row mg-t-10">
<div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                              <label class="ckbox ckbox-bill">

<?php 
if( $insid[0]['pref_3']=="1")
{
  ?>
<input type="checkbox" name="remarks" value="1" checked>

<?php
}
else
{
?>

     <input type="checkbox" name="remarks" value="1">


                                                                      <?php

}
                                                                      ?>

<span class="field-validation-valid font-red" data-valmsg-for="postcode" data-valmsg-replace="true">Remarks</span>
                                 </label>
                                                                </div>
                                                                
                                                               
                                                            </div> 
<div class="col-md-4">
                                           <div class="row mg-t-10"> 
                                       <h6 class="card-body-title">Uploads</h6>
</div></div>

<div class="row mg-t-10">
          <label class="col-md-4 form-control-label">Aadhar Card :<p style="color: red;">*</p></label>
          <div class="col-sm-8 mg-t-10 mg-sm-t-0">


            <div>
             <?php if($insid[0]['aadhar_upld']!="")
             {?>
              <img src="Customer_files/<?php echo $insid[0]['aadhar_upld']; ?>" width="100px" >
              <?php }
              ?>

              <input type="file" name="aadfileupd" id="aadfileupd"> 

            </div></div></div>




                                  </div>

                        <div class="form-layout-footer mg-t-30">
                <button type="submit" value="submit" name="submit" id="sub" class="btn btn-info mg-r-5">Submit</button>
                <input type="hidden" name="action" value="<?php if($_REQUEST['flag'] =='Edit') echo $_REQUEST['flag']; else echo 'Add'; ?>">
                <button type="submit" id="cancel" class="btn btn-secondary">Cancel</button>
              </div>


                                    </div>

          
        </div>
 
</div>
      </div><!-- am-pagebody -->
    </form>
      <?php 
      include('../include/adminfooter.php'); ?> 



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
<script>
 $(function() {
      $('#myVariable').datepicker({dateFormat: 'dd/mm/yy'});
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
  input.invalid, textarea.invalid{
  border: 0.1px solid #d20505;
}
input.valid, textarea.valid{
  border-radius: 0 ;
}
</style> 



<script type="text/javascript">
  $('#emailid').on('input blur change', function() {
  var input=$(this);
  var re = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
  var is_email=re.test(input.val());
  /*if(is_email){input.removeClass("invalid").addClass("valid");}*/
  else{input.removeClass("valid").addClass("invalid");}
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
     $('#pan').on('blur change', function() {
        var input=$(this);
var value=$('#pan').val();
/*alert("asd");*/
if(value.length<10)
{
  input.removeClass("valid").addClass("invalid");
}
});
  </script>

  <script>
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
     $('#gst').on('blur change', function() {
        var input=$(this);
var value=$('#gst').val();
/*alert("asd");*/
if(value.length<15)
{
  input.removeClass("valid").addClass("invalid");
}
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
$('#pan').keypress(function (e) {
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
$("#cancel").click(function(e) {
/*  alert("maans");*/
if(confirm("Leave Page??"))
{

/*
  $(location).attr("href", "viewtransporter.php");*/
/*  window.location.replace("viewtransporter.php"); */
/*  window.location.href("viewtransporter.php"); */
  window.location.href = "addconsigner.php";
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
<script>
$('#aadharno').on('input blur change', function() {

  var input= $(this);
  var is_name=input.val();
/*alert(is_name);*/

var value=$('#aadharno').val();
if (isNaN(is_name)) {
  /*alert("is not numeric")*/
/*input.removeClass("valid").addClass("invalid");*/

this.value = value.substr(0, value.length - 1);

$('#aadharno').val(this.value);
}

if(value.length<10)
{
  input.removeClass("valid").addClass("invalid");
}


});

</script>