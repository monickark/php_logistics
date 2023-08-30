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



 $query =mysqli_query($conn,"SELECT * FROM user WHERE varMType='administrator';");        
                                                     if(!empty(mysqli_num_rows($query)))
                                                     {
echo '<script> alert("Master Company Already Created");window.location.assign("viewcompany.php");</script>';
                                                     }


/* echo '<script> alert("Added");</script>';*/

$insert_company = array(
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
      "pinCode"         =>     mysqli_real_escape_string($data->con, $_POST['postcode'])
      
      );  
       $insid = $data->insert('companies', $insert_company);
      
 

   if($insid){

    echo '<script> alert("Company Addeed Successfully");window.location.assign("addcompany.php");</script>';
   } 
   else{
    echo '<script> alert("Error");</script>';
   }
}else
{

$update_company = array(
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
      "pinCode"         =>     mysqli_real_escape_string($data->con, $_POST['postcode'])
      
      );  
 $id =$_REQUEST['id'];
 $update_id = array(
      "id"      =>    mysqli_real_escape_string($data->con, $id)
    );

       $insid = $data->update('companies', $update_company, $update_id);
      if($insid){

    echo '<script> alert("Company Altered Successfully");window.location.assign("viewcompany.php");</script>';
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

    $insid = $data->select_where('companies', $update_id);
 }

?> 

    <div class="am-mainpanel">
      <div class="am-pagetitle">
        <h5 class="am-title">Company Master</h5>
      
          
        <!-- search-bar -->
      </div>
      <!-- am-pagetitle -->
        <form id="searchBar" class="search-bar"  method="POST" >
      <div class="am-pagebody">
 <div class="card form-layout form-layout-4">
       <div class="row row-sm mg-t-0">
          <div class="col-xl-6">
           
            <div class="portlet-body">
                                          <h6 class="card-body-title mg-b-20">Company Details</h6>
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
       
               postcode: {
            required: true,
            minlength: 6
          },
            
        
          email: {
            /*required: true,*/
            email: true
          }
          },
        messages: {
          companyname: "Please enter your Company Name",
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
             
          postcode: {
            required: "Please enter Pincode ",
            minlength: "Your Pincode must consist of 6 digits"
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

  var elem = document.getElementById("cust_id").value = "COMP"+randomNum;
</script>
 <?php                                               
}
else

{
?>
 <input class="form-control" data-val="true" data-val-length="Invalid Mobile No." data-val-length-max="15" data-val-length-min="10"  maxlength="15" id="cust_id" name="cust_id"  type="hidden" value="<?php echo $insid[0]['comp_id']; ?>" > <!-- Auto Generate Code -->
<?php

}
?>

                                                    <label class="col-md-4 form-control-label">Company Name:<p style="color: red;">*</p></label>

                                                <div class="col-sm-8 mg-t-10 mg-sm-b-10">
                                                    <input class="form-control emp_val" data-val="true" placeholder="Enter Company Name" id="companyname" maxlength="100" name="companyname" type="text" value="<?php echo $insid[0]['name']; ?>" onkeyup="empty()" required >
                                                    <span class="field-validation-valid font-red" data-valmsg-for="companyname" data-valmsg-replace="true"></span>
                                             
                                     
                                            </div>
                                        </div>

                                         
                                        <div class="row mg-t-10">
                                            
                                                    <label class="col-md-4 form-control-label">Contact Person:<p style="color: red;">*</p></label>
                                                    <div class="col-sm-8 mg-t-10 mg-sm-b-10">
                                                        <input class="form-control emp_val" data-val="true" placeholder="Enter Contact Person Name" id="contactperson" maxlength="100" name="contactperson" type="text" value="<?php echo $insid[0]['contactName']; ?>" onkeyup="empty()" required>
                                                        <span class="field-validation-valid font-red" data-valmsg-for="contactperson" data-valmsg-replace="true"></span>
                                                   
                                            </div>
                                        </div>
                                        
                                        <div class="row mg-t-10">
                                            
                                                    <label class="col-md-4 form-control-label">Mobile:<p style="color: red;">*</p></label>
 
                   <div class="col-sm-8 mg-t-10 mg-sm-b-10">
            <input class="form-control emp_val" data-val="true" data-val-length="Invalid Mobile No." maxlength="10" data-val-length-min="10" placeholder="Enter Mobile No." id="mobileno" name="mobileno" onkeyup="empty()" type="text" value="<?php echo $insid[0]['MobNum']; ?>" >
                                                  
                                            </div>
                                        </div>
                                       
                                        <div class="row mg-t-10">
                                            
                                                    <label class="col-md-4 form-control-label">Phone:</label>
                                                    <div class="col-sm-8 mg-t-10 mg-sm-b-10">
                                                        <input class="form-control" data-val="true" data-val-length="Invalid Phone No." maxlength="10" data-val-length-max="10" data-val-length-min="10" placeholder="Enter Phone No." id="phoneno" name="phoneno"  type="text" value="<?php echo $insid[0]['PhNum']; ?>" >
                                                        <span class="field-validation-valid font-red" data-valmsg-for="phoneno" data-valmsg-replace="true"></span>
                                                   
                                            </div>
                                        </div>
                                       
                                        <div class="row mg-t-10">
                                            
                                                    <label class="col-md-4 form-control-label">Email:</label>
                                                    <div class="col-sm-8 mg-t-10 mg-sm-b-10">
                                                        <input class="form-control" data-val="true" data-val-email="Invalid Email" placeholder="Enter Email" id="email" maxlength="100" name="email" type="text" value="<?php echo $insid[0]['email']; ?>" >
                                                        <span class="field-validation-valid font-red" data-valmsg-for="email" data-valmsg-replace="true"></span>
                                                    
                                            </div>
                                        </div>

                                        <div class="row mg-t-10">
                                           
           <label class="col-md-4 form-control-label">GST/TIN No.:<p style="color: red;">*</p></label>
                 <div class="col-sm-8 mg-t-10 mg-sm-b-10 "                                >
             <input class="form-control emp_val" data-val="true" placeholder="Enter GST/TIN No." id="gst" maxlength="15" name="gst" type="text" onkeyup="empty()" value="<?php echo $insid[0]['gstNo']; ?>" required>
       <span class="field-validation-valid font-red" data-valmsg-for="gst" data-valmsg-replace="true"></span>
                                                  
                                            </div>
                                        </div>

                                  
                                        
                             
                                        <div class="row mg-t-10">
                                            
                                                    <label class="col-md-4 form-control-label">PAN No.:<p style="color: red;">*</p></label>
                                                    <div class="col-sm-8 mg-t-10 mg-sm-b-10">
                                                        
                                                        <input class="form-control emp_val" data-val="true" data-val-regex="Invalid PAN Number" data-val-regex-pattern="[a-zA-Z]{5}\d{4}[a-zA-Z]{1}" placeholder="Enter PAN No." id="pan" maxlength="10" name="pan" type="text" onkeyup="empty()" value="<?php echo $insid[0]['panNo']; ?>" required>
                                                        <span class="field-validation-valid font-red" data-valmsg-for="pan" data-valmsg-replace="true"></span>
                                                
                                            </div>
                                        </div></div>
<!-- 

<script>
function empty()
{ 

/*  alert("value");*/
var comp = $('#companyname').val();
var contact = $('#contactperson').val();
var mob = $('#mobileno').val();
var gst = $('#gst').val();
var pan = $('#pan').val();



if(comp.trim() =="" || contact.trim() =="" || mob.trim() =="" || gst.trim() =="" || pan.trim() =="")
{

$('#sub').attr('disabled', true);
}
else
{
  $('#sub').attr('disabled', false);
}
}

</script> -->






<div class="col-xl-6">
         <div class="row mg-t-10"> 
           <h6 class="card-body-title">Bank Details</h6>
         </div>
       </div> 

             <div align="right">
     <button type="button" name="add" id="add" class="btn btn-info">Add New Bank</button>
    </div>




 <div class="row mg-t-10" id="responsecontainer">
                                                  
        <div class="col-sm-10 mg-t-5 mg-sm-t-0">


 <div class="col-xl">
  
</div>
      </div>





                   </div>



<div class="modal fade" id="demoModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<!-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> -->

       <div class="row row-sm mg-t-20 col-md-12">

 <div class="row mg-t-10 col-lg-12">

        <label class="col-lg-5 form-control-label">Name in Account :</label>
        <div class="col-lg-7 mg-t-10 mg-sm-t-0">
          <input class="form-control" data-val="true" data-val-length="The field employeenameinbank must be a string with a maximum length of 100." data-val-length-max="100" placeholder="Enter Account Name" id="acc_name" maxlength="100" name="acc_name" type="text" value="<?php echo $insid[0]['namebnk']; ?>">
          <span class="field-validation-valid font-red" data-valmsg-for="employeenameinbank" data-valmsg-replace="true"></span>
        </div>
      </div>
      <div class="row mg-t-10 col-lg-12">

        <label class=" col-lg-5 form-control-label">Bank Name :</label>
        <div class=" col-lg-7 mg-t-10 mg-sm-t-0">

 <select name="bank_name" id="bank_name" class="form-control">
          <option value="">Select</option>              
   <?php        
          $query =mysqli_query($conn,"SELECT * FROM banks ;");        
         while(  $row=mysqli_fetch_array($query)){     ?>

<option value="<?php echo $row['name'];?>" ><?php echo $row['name']; ?></option>
<?php }?>
</select> 


          <!-- <input class="form-control" data-val="true" data-val-length="The field bankname must be a string with a maximum length of 100." data-val-length-max="100" placeholder="Enter Bank Name" id="bank_name" maxlength="100" name="bank_name" type="text" value="<?php echo $insid[0]['bnkname']; ?>"> -->
          <span class="field-validation-valid font-red" data-valmsg-for="bankname" data-valmsg-replace="true"></span>
        </div>
      </div>


         <div class="row mg-t-10  col-lg-12">
                                                
            <label class=" col-lg-5 form-control-label">Group Name :</label>
         <div class=" col-lg-7 mg-t-10 mg-sm-t-0">
                                                           

        <select class="form-control" name="group_name" id="group_name"  >
                                                            <?php
 $group = mysqli_query($conn,"select * from group_name "); 

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

                                            <div class="row mg-t-10 col-lg-12">
                                                
          <label class=" col-lg-5 form-control-label">Type:</label>
           <div class=" col-lg-7 mg-t-10 mg-sm-t-0">
                                                            
        <select class="form-control" name="ledger_type" id="ledger_type"  >
             <option value="Cr">Cr</option>
     <option value="Dr">Dr</option>
                                                            </select>
     <span class="field-validation-valid font-red" data-valmsg-for="bankname" data-valmsg-replace="true"></span>
                                                </div>
                                            </div>    
 <div class="row mg-t-10 col-lg-12">
                                                
        <label class=" col-lg-5 form-control-label">Nature :</label><div class=" col-lg-7 mg-t-10 mg-sm-t-0">
                                                            
   <select class="form-control" name="nature" id="nature"  >
                                                            <?php
                                                            
 $nature = mysqli_query($conn,"select * from nature "); 

        while ($nat = mysqli_fetch_array($nature)){
                                                            ?>
 <option value="<?php echo $nat['name'];?>"><?php echo $nat['name'];?></option>
       <?php
}
   ?>
                                                              
    </select>
 <span class="field-validation-valid font-red" data-valmsg-for="bankname" data-valmsg-replace="true"></span>

                                                         
  </div>
                                            </div>

      <div class="row mg-t-10 col-lg-12">
       <label class=" col-lg-5 form-control-label">Account Number :</label>
       <div class=" col-lg-7 mg-t-10 mg-sm-t-0">
        <input class="form-control" data-val="true" data-val-length="The field accountno must be a string with a maximum length of 50." data-val-length-max="50" id="acc_no" placeholder="Enter Account Number" maxlength="50" name="acc_no" type="text" value="<?php echo $insid[0]['accno']; ?>">
        <span class="field-validation-valid font-red" data-valmsg-for="accountno" data-valmsg-replace="true"></span>
      </div>
    </div>
    <div class="row mg-t-10 col-lg-12">
      <label class=" col-lg-5 form-control-label">IFSC Code :</label>
      <div class=" col-lg-7 mg-t-10 mg-sm-t-0">
        <input class="form-control" data-val="true" data-val-length="The field ifsccode must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Enter IFSC Code" id="ifsc_code" maxlength="50" name="ifsc_code" type="text" value="<?php echo $insid[0]['ifsc']; ?>">
        <span class="field-validation-valid font-red" data-valmsg-for="ifsccode" data-valmsg-replace="true"></span>
      </div>
    </div>


          <div class="row mg-t-10 col-lg-12">
                                                
      <label class=" col-lg-5 form-control-label">Opening Bal :</label>
    <div class=" col-lg-7 mg-t-10 mg-sm-t-0">
                                                            
  <input class="form-control" data-val="true" data-val-length="The field bankname must be a string with a maximum length of 200." data-val-length-max="200" data-val-required="Enter Bank Name" id="opbal" maxlength="200" name="opbal" type="text" value="<?php echo $insid[0]['name']; ?>" required>
      <span class="field-validation-valid font-red" data-valmsg-for="bankname" data-valmsg-replace="true"></span>
                                                </div>
                                            </div>     
<div class="modal-footer">
<button type="button"  class="btn btn-default" data-dismiss="modal">Close</button>
<button type="button" id="addbnk" class="btn btn-primary">Add Bank</button>
</div>
</div>
</div> </div>
     
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
var ins="Company";
   var grp =$('#group_name').val();
   var led =$('#ledger_type').val();
   var nat =$('#nature').val();
   var op =$('#opbal').val();


/*    alert(id);*/
/*  
  alert(name);
  alert(accno);
  alert(ifsc);*/

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
<!-- <style>
  input.invalid, textarea.invalid{
  border: 2px solid red;
}
input.valid, textarea.valid{
  border-radius: 0 ;
}
</style> -->
<script type="text/javascript">
  $('#email').on('input blur change', function() {
  var input=$(this);
  var re = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
  var is_email=re.test(input.val());
  /*if(is_email){input.removeClass("invalid").addClass("valid");}*/
  else{input.removeClass("valid").addClass("invalid");}
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
 <script >
$(function () {
$("#add").click(function(){
$('#demoModal').modal('show');
});
});
</script>


<script>


$(window).on('load', function()  {
fetch_data();
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
                  <h6 class="card-body-title mg-b-20">Address Details</h6> 
               
               <div class="portlet-body">
                             
                                                                <div class="row mg-t-10">
                                                            
                   <label class="col-md-3 form-control-label">State:</label>
                                                                <div class="col-sm-8 mg-t-10 mg-sm-b-10">
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
                                                            
                                                                <label class="col-md-3 form-control-label">City:</label>
                                                                <div class="col-sm-8 mg-t-10 mg-sm-b-10">
                                                                    <select name="cusCity" id="district-list" class="form-control" >
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
                                                           
                                                                <label class="col-md-3 form-control-label">Area:</label>
                                                                <div class="col-sm-8 mg-t-10 mg-sm-b-10">
                                                                    <input class="form-control" data-val="true" placeholder="Enter Area" id="areaid" maxlength="50" name="areaid" type="text" value="<?php echo $insid[0]['area']; ?>" >
                                                                    <span class="field-validation-valid font-red" data-valmsg-for="postcode" data-valmsg-replace="true"></span>
                                                                </div>
                                                            </div>
                                                        <div class="row mg-t-10">
                                                          
                                                                <label class="col-md-3 form-control-label">Address:</label>
                                                                <div class="col-sm-8 mg-t-10 mg-sm-b-10">
                                                                    <input class="form-control" data-val="true" placeholder="Enter Address" id="address1" maxlength="200" name="address1" type="text" value="<?php echo $insid[0]['address']; ?>" >
                                                                    <span class="field-validation-valid font-red" data-valmsg-for="address1" data-valmsg-replace="true"></span>


                                                            
                                                            </div>
                                                        </div>

                                                       


                                                        <div class="row mg-t-10">
                                                           
                                                                <label class="col-md-3 form-control-label">Pincode:<p style="color: red;">*</p></label>
                                                                <div class="col-sm-8 mg-t-10 mg-sm-b-10">
                                                                    <input class="form-control emp_val" data-val="true" placeholder="Enter Pincode" id="postcode" maxlength="6" name="postcode" type="text" value="<?php echo $insid[0]['pinCode']; ?>" >
                                                                    <span class="field-validation-valid font-red" data-valmsg-for="postcode" data-valmsg-replace="true"></span>
                                                                </div>
                                                            </div> 

                                  </div>

                       


                                    </div>

          
        </div>
    <div align="center">
      <div class="form-layout-footer mg-t-30">
                <button type="submit" value="submit" name="submit" id="sub" class="btn btn-sub mg-r-5">Submit</button>
                <input type="hidden" name="action" value="<?php if($_REQUEST['flag'] =='Edit') echo $_REQUEST['flag']; else echo 'Add'; ?>">
          <!--       <button class="btn btn-secondary">Cancel</button> -->
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
$('#gst,#pan').keypress(function (e) {
    var regex = new RegExp("^[a-zA-Z0-9]+$");
    var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
    if (regex.test(str)) {
        return true;
    }

    e.preventDefault();
    return false;
});

 
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