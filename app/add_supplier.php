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

  


$insert_supplier = array(
      "intAdminId"      =>    mysqli_real_escape_string($data->con, $_SESSION['MintId']), 
     "supp_code"        =>     mysqli_real_escape_string($data->con, $_POST['supplier_code']),    
      "name"            =>     mysqli_real_escape_string($data->con, $_POST['supplier_name']),  
      "contact_person"        =>     mysqli_real_escape_string($data->con, $_POST['supplier_contact']), 
      "mob_no"        =>     mysqli_real_escape_string($data->con, $_POST['supplier_mob']), 
      "email_id"          =>     mysqli_real_escape_string($data->con, $_POST['supplier_email']),
      "gst_no"      =>     mysqli_real_escape_string($data->con, $_POST['supplier_gst']),  
      "pan_no"           =>     mysqli_real_escape_string($data->con, $_POST['supplier_pan']), 
      "adhar_no"           =>     mysqli_real_escape_string($data->con, $_POST['supplier_adhar']), 
      "state"           =>     mysqli_real_escape_string($data->con, $_POST['supplier_state']), 
      "city"            =>     mysqli_real_escape_string($data->con, $_POST['supplier_city']), 
      "area"            =>     mysqli_real_escape_string($data->con, $_POST['supplier_area']),
      "address"         =>     mysqli_real_escape_string($data->con, $_POST['address1']), 
      "pinCode"         =>     mysqli_real_escape_string($data->con, $_POST['postcode'])
      
      );  
       $insid = $data->insert('supplier', $insert_supplier);
      
 

   if($insid){

    echo '<script> alert("Supplier Added Successfully");window.location.assign("view_supplier.php");</script>';
   } 
   else{
    echo '<script> alert("Error");</script>';
   }
}else
{

$update_cust = array(
       "intAdminId"      =>    mysqli_real_escape_string($data->con, $_SESSION['MintId']), 
     "supp_code"        =>     mysqli_real_escape_string($data->con, $_POST['supplier_code']),    
      "name"            =>     mysqli_real_escape_string($data->con, $_POST['supplier_name']),  
      "contact_person"        =>     mysqli_real_escape_string($data->con, $_POST['supplier_contact']), 
      "mob_no"        =>     mysqli_real_escape_string($data->con, $_POST['supplier_mob']), 
      "email_id"          =>     mysqli_real_escape_string($data->con, $_POST['supplier_email']),
      "gst_no"      =>     mysqli_real_escape_string($data->con, $_POST['supplier_gst']),  
      "pan_no"           =>     mysqli_real_escape_string($data->con, $_POST['supplier_pan']), 
      "adhar_no"           =>     mysqli_real_escape_string($data->con, $_POST['supplier_adhar']), 
      "state"           =>     mysqli_real_escape_string($data->con, $_POST['supplier_state']), 
      "city"            =>     mysqli_real_escape_string($data->con, $_POST['supplier_city']), 
      "area"            =>     mysqli_real_escape_string($data->con, $_POST['supplier_area']),
      "address"         =>     mysqli_real_escape_string($data->con, $_POST['address1']), 
      "pinCode"         =>     mysqli_real_escape_string($data->con, $_POST['postcode'])
      
      );  
 $id =$_REQUEST['id'];
 $update_id = array(
      "id"      =>    mysqli_real_escape_string($data->con, $id)
    );

       $insid = $data->update('supplier', $update_cust, $update_id);
      if($insid){

    echo '<script> alert("Supplier Altered Successfully");window.location.assign("view_supplier.php");</script>';
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

    $insid = $data->select_where('supplier', $update_id);
 }

?> 

    

    <div class="am-mainpanel">
      <div class="am-pagetitle">
        <h5 class="am-title">Supplier Master</h5>
      
          
        <!-- search-bar -->
      </div>
      <!-- am-pagetitle -->
        <form id="searchBar" class="search-bar"  method="POST" action="">
      <div class="am-pagebody">
 <div class="card pd-20 pd-sm-40 form-layout form-layout-4">
       <div class="row row-sm mg-t-20">
          <div class="col-xl-6">
           
            <div class="portlet-body">
                                          <h6 class="card-body-title">Supplier Details</h6>

                                          <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.16.0/jquery.validate.min.js"></script> 
<script>

$(document).ready( function () {
    $( "#searchBar" ).validate( {
    
        rules: {
          supplier_name: "required",
          supplier_email: {
            /*required: true,*/
            email: true
          },
       supplier_gst: {
            required: true,
            minlength: 15
          },
          supplier_pan: {
            required: true,
            minlength: 10
          }, 
   
          postcode: {
            required: true,
            minlength: 6
          },
                  supplier_adhar: {
            required: true,
            minlength: 12
          },                   
                 postcode: {
            required: true,
            minlength: 6
          },
           supplier_mob: {
            required: true,
            minlength: 10
          }
          },
        messages: {
          supplier_name: "Please enter your Name", 
           supplier_email: "Please enter a valid email address",
                   supplier_gst: {
            required: "Please enter GST/TIN Number",
            minlength: "Your GST must consist of 15 digits"
          },
          supplier_pan: {
            required: "Please enter PAN Number",
            minlength: "Your PAN must consist of 10 digits"
     },           supplier_adhar: {
            required: "Please enter Aadhar Number",
            minlength: "Your Aadhar Number must consist of 12 digits"
          },
         
            postcode: {
            required: "Please enter Pincode ",
            minlength: "Your Pincode must consist of 6 digits"
          },
           supplier_mob: {
            required: "Please enter Mobile Number",
            minlength: "Your Mobile Number must consist of 10 digits"
          }
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
                        
                                <label class="col-md-4 form-control-label">Supplier Code :</label>
                                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                    <input class="form-control" data-val="true" data-val-length="Invalid Mobile No." data-val-length-max="15" data-val-length-min="10" placeholder="Enter to Create Supplier Code"mobileno" maxlength="15" name="supplier_code"  type="text" value="<?php echo $insid[0]['supp_code']; ?>">
                                    <span class="field-validation-valid font-red" data-valmsg-for="mobileno" data-valmsg-replace="true"></span>
                        </div>
                    </div>
                                        
                                            
                                               
                                        <div class="row mg-t-10">
                                            
                                                
                                                    <label class="col-md-4 form-control-label">Name:<p style="color: red;">*</p></label>                                                    
                                                    <div class="col-sm-8 mg-t-10 mg-sm-t-0 ">
                                                        
                                                        <input class="form-control valid emp_val" data-val="true" placeholder="Enter Name" id="supplier_name" maxlength="100" name="supplier_name" type="text" value="<?php echo $insid[0]['name']; ?>" >
                                                        <span class="font-red field-validation-valid" data-valmsg-for="consigneename" data-valmsg-replace="true"></span>
                                                    </div>
                                                </div>
                                            
                                        </div>
                                      

                                                   <div class="row mg-t-10">
                        
                                <label class="col-md-4 form-control-label">Contact Person :</label>
                                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                    <input class="form-control" data-val="true" data-val-length="Invalid Mobile No." data-val-length-max="15" data-val-length-min="10" placeholder="Enter Contact Person" id="supplier_contact" maxlength="15" name="supplier_contact"  type="text" value="<?php echo $insid[0]['contact_person']; ?>">
                                    <span class="field-validation-valid font-red" data-valmsg-for="mobileno" data-valmsg-replace="true"></span>
                        </div>
                    </div>
                                            <div class="row mg-t-10">
                        
                                <label class="col-md-4 form-control-label">Mobile :<p style="color: red;">*</p></label>
                                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                    <input class="form-control emp_val" data-val="true" data-val-length="Invalid Mobile No." data-val-length-max="15" data-val-length-min="10" placeholder="Enter Mobile No." id="supplier_mob" maxlength="10" name="supplier_mob"  type="text" value="<?php echo $insid[0]['mob_no']; ?>">
                                    <span class="field-validation-valid font-red" data-valmsg-for="mobileno" data-valmsg-replace="true"></span>
                        </div>
                    </div>
<div class="row mg-t-10">
                        
                                <label class="col-md-4 form-control-label">E-mail :</label>
                                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                    <input class="form-control" data-val="true" data-val-length="Invalid Mobile No." data-val-length-max="15" data-val-length-min="10" placeholder="Enter email id." id="supplier_email" maxlength="15" name="supplier_email"  type="text" value="<?php echo $insid[0]['email_id']; ?>">
                                    <span class="field-validation-valid font-red" data-valmsg-for="mobileno" data-valmsg-replace="true"></span>
                        </div>
                    </div>




                                        
                                  
                                                    <div class="row mg-t-10">
                                                        
                                                            <label class="col-md-4 form-control-label">GST :<p style="color: red;">*</p></label>
                                                            <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                                <input class="form-control emp_val" data-val="true" placeholder="Enter GST/TIN No." id="supplier_gst" maxlength="15" name="supplier_gst" type="text" value="<?php echo $insid[0]['gst_no']; ?>" >
                                                                <span class="field-validation-valid font-red" data-valmsg-for="gst" data-valmsg-replace="true"></span>
                                                           
                                                        
                                                    </div>

                                                </div>
                                          
                                                    <div class="row mg-t-10">
                                                        
                                                            <label class="col-md-4 form-control-label">PAN No.:<p style="color: red;">*</p></label>
                                                            <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                                <input class="form-control emp_val" data-val="true" data-val-regex="Invalid PAN Number" data-val-regex-pattern="[a-zA-Z]{5}\d{4}[a-zA-Z]{1}" placeholder="Enter PAN No." id="supplier_pan" maxlength="10" name="supplier_pan" type="text" value="<?php echo $insid[0]['pan_no']; ?>" >
                                                                <span class="field-validation-valid font-red" data-valmsg-for="pan" data-valmsg-replace="true"></span>
 
                                                    </div>
                                                </div>
                                                 <div class="row mg-t-10">

          <label class="col-md-4 form-control-label">Aadhar Number :<p style="color: red;">*</p></label>
          <div class="col-sm-8 mg-t-10 mg-sm-t-0">
            <input class="form-control emp_val" data-val="true" data-val-length="Invalid Mobile No." data-val-length-max="15" data-val-length-min="10" placeholder="Enter Aadhar Number" id="supplier_adhar" maxlength="12" name="supplier_adhar" type="text" value="<?php echo $insid[0]['adhar_no']; ?>">
            <span class="field-validation-valid font-red" data-valmsg-for="mobileno" data-valmsg-replace="true"></span>
          </div>
        </div>

                                              </div>



           <div class="col-xl-6">
                  <h6 class="card-body-title">Address Details</h6> 
               
               <div class="portlet-body">
                             
                                                                <div class="row mg-t-10">
                                                            
                                                                <label class="col-md-4 form-control-label">State:</label>
                                                                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                                    <select onChange="getdistrict(this.value);"  name="supplier_state" id="supplier_state" class="form-control" >

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
                                                                    <input class="form-control" data-val="true" placeholder="Enter City" id="supplier_city" maxlength="50" name="supplier_city" type="text" value="<?php echo $insid[0]['city']; ?>">
                                                                    <span class="field-validation-valid font-red" data-valmsg-for="postcode" data-valmsg-replace="true"></span>
                                                                </div>
                                                            </div>
                                                              
                                                          <div class="row mg-t-10">
                                                           
                                                                <label class="col-md-4 form-control-label">Area:</label>
                                                                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                                    <input class="form-control" data-val="true" placeholder="Enter Area" id="supplier_area" maxlength="50" name="supplier_area" type="text" value="<?php echo $insid[0]['area']; ?>">
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
                                                                    <input class="form-control emp_val" data-val="true" placeholder="Enter Pincode" id="postcode" maxlength="6" name="postcode" type="text" value="<?php echo $insid[0]['pincode']; ?>" >
                                                                    <span class="field-validation-valid font-red" data-valmsg-for="postcode" data-valmsg-replace="true"></span>
                                                                </div>
                                                            </div> 

 

                                  </div>



                                    </div>
                                            <div class="form-layout-footer mg-t-30">
                <button type="submit" value="submit" name="submit" class="btn btn-info mg-r-5">Submit</button>
                <input type="hidden" name="action" value="<?php if($_REQUEST['flag'] =='Edit') echo $_REQUEST['flag']; else echo 'Add'; ?>">
                <button class="btn btn-secondary" id="cancel">Cancel</button>
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
 $(function() {
      $('#myVariable').datepicker({dateFormat: 'dd/mm/yy'});
});
</script>
<script type="text/javascript">
  $('#supplier_email').on('input blur change', function() {
  var input=$(this);
  var re = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
  var is_email=re.test(input.val());
  /*if(is_email){input.removeClass("invalid").addClass("valid");}*/
  else{input.removeClass("valid").addClass("invalid");}
});
</script>
<script>
$('#supplier_mob').on('input blur change', function() {

  var input= $(this);
  var is_name=input.val();
/*alert(is_name);*/

var value=$('#supplier_mob').val();
if (isNaN(is_name)) {
  /*alert("is not numeric")*/
/*input.removeClass("valid").addClass("invalid");*/

this.value = value.substr(0, value.length - 1);

$('#supplier_mob').val(this.value);
}

if(value.length<10)
{
  input.removeClass("valid").addClass("invalid");
}


});

</script>
  <script>
     $('#supplier_gst').on('blur change', function() {
        var input=$(this);
var value=$('#supplier_gst').val();
/*alert("asd");*/
if(value.length<15)
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
$('#supplier_pan').keypress(function (e) {
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
     $('#supplier_pan').on('blur change', function() {
        var input=$(this);
var value=$('#supplier_pan').val();
/*alert("asd");*/
if(value.length<10)
{
  input.removeClass("valid").addClass("invalid");
}
});
  </script>

<script>
$('#supplier_gst').keypress(function (e) {
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
$('#supplier_adhar').on('input blur change', function() {

  var input= $(this);
  var is_name=input.val();
/*alert(is_name);*/

var value=$('#supplier_adhar').val();
if (isNaN(is_name)) {
  /*alert("is not numeric")*/
/*input.removeClass("valid").addClass("invalid");*/

this.value = value.substr(0, value.length - 1);

$('#supplier_adhar').val(this.value);
}

if(value.length<12)
{
  input.removeClass("valid").addClass("invalid");
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
  window.location.href = "add_supplier.php";
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