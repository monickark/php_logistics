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

  


$insert_insurance = array(
      "intAdminId"      =>    mysqli_real_escape_string($data->con, $_SESSION['MintId']),    
      "name"            =>     mysqli_real_escape_string($data->con, $_POST['companyname']),  
      "company_id"       =>     mysqli_real_escape_string($data->con, $_POST['companyid']),  
      "MobNum"          =>     mysqli_real_escape_string($data->con, $_POST['mobileno']), 
      "PhNum"           =>     mysqli_real_escape_string($data->con, $_POST['phoneno']), 
      "email"           =>     mysqli_real_escape_string($data->con, $_POST['email']), 
      "address"         =>     mysqli_real_escape_string($data->con, $_POST['address1'])
     
      
      );  
       $insid = $data->insert('insurance_master', $insert_insurance);
      
 

   if($insid){

    echo '<script> alert("Insurance Addeed Successfully");window.location.assign("addinsurance_master.php");</script>';
   } 
   else{
    echo '<script> alert("Error");</script>';
   }
}else
{

$update_insurance = array(
      "intAdminId"      =>    mysqli_real_escape_string($data->con, $_SESSION['MintId']),    
      "name"            =>     mysqli_real_escape_string($data->con, $_POST['companyname']),  
    " company_id"       =>     mysqli_real_escape_string($data->con, $_POST['companyid']),  
      "MobNum"          =>     mysqli_real_escape_string($data->con, $_POST['mobileno']), 
      "PhNum"           =>     mysqli_real_escape_string($data->con, $_POST['phoneno']), 
      "email"           =>     mysqli_real_escape_string($data->con, $_POST['email']), 
      "address"         =>     mysqli_real_escape_string($data->con, $_POST['address1'])
     
      
      );  
 $id =$_REQUEST['id'];
 $update_id = array(
      "id"      =>    mysqli_real_escape_string($data->con, $id)
    );

       $insid = $data->update('insurance_master', $update_insurance, $update_id);
      if($insid){

    echo '<script> alert("Insurance Altered Successfully");window.location.assign("addinsurance_master.php");</script>';
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

    $insid = $data->select_where('insurance_master', $update_id);
 }

 if($_REQUEST['flag'] == "Delete"){
 $id =$_REQUEST['id'];

    $update_id = array(
      "id"      =>    mysqli_real_escape_string($data->con, $id)
    );

    $insid = $data->delete_where('insurance_master', $update_id);
echo '<script> alert("Insurance Deleted Successfully");window.location.assign("addinsurance_master.php");</script>';
 }

?> 

    <div class="am-mainpanel">
      <div class="am-pagetitle">
        <h5 class="am-title">Insurance Master</h5>
      
          
        <!-- search-bar -->
      </div>
      <!-- am-pagetitle -->
        <form id="searchBar" class="search-bar"  method="POST" >
      <div class="am-pagebody">
 <div class="card pd-20 pd-sm-40 form-layout form-layout-4">
       <div class="row row-sm mg-t-20">
          <div class="col-xl-9">
           
            <div class="portlet-body">
                                          <h6 class="card-body-title">Insurance </h6>

      <div class="am-pagebody">
   <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.16.0/jquery.validate.min.js"></script> 
<script>
$(document).ready( function () {
    $( "#searchBar" ).validate( {
    
        rules: {
          companyname: "required",
           email: {
            /*required: true,*/
            email: true
          },
         mobileno: {
            required: true,
            minlength: 10
          }              
           
          },
        messages: {
          companyname: "Please enter your Company Name", 
          email: "Please enter a valid email address",
      mobileno: {
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
                                            
                                                    <label class="col-md-4 form-control-label"> Company  Id:</label>
                                                    <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                        <input class="form-control" data-val="true" placeholder="Enter  Company  Id" id="companyid" maxlength="100" name="companyid" type="text" value="<?php echo $insid[0]['company_id']; ?>" >
                                                        <span class="field-validation-valid font-red" data-valmsg-for="contactperson" data-valmsg-replace="true"></span>
                                                   
                                            </div>
                                        </div>
                                        <div class="row mg-t-10">
                                            
                                                
                                                    <label class="col-md-4 form-control-label">Company Name:<p style="color: red;">*</p></label>
                                                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                    <input class="form-control emp_val" data-val="true" placeholder="Enter Company Name" id="companyname" maxlength="100" name="companyname" type="text" value="<?php echo $insid[0]['name']; ?>" >
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
                                            
                                                    <label class="col-md-4 form-control-label">Office Number:</label>
                                                    <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                        <input class="form-control" data-val="true" data-val-length="Invalid Phone No." data-val-length-max="10" data-val-length-min="10" maxlength="10" placeholder="Enter Phone No." id="phoneno" name="phoneno"  type="text" value="<?php echo $insid[0]['PhNum']; ?>">
                                                        <span class="field-validation-valid font-red" data-valmsg-for="phoneno" data-valmsg-replace="true"></span>
                                                   
                                            </div>
                                        </div>

                                        
                                        <div class="row mg-t-10">
                                            
                                                    <label class="col-md-4 form-control-label">Mobile:<p style="color: red;">*</p></label>
                                                    <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                        <input class="form-control emp_val" data-val="true" data-val-length="Invalid Mobile No." data-val-length-max="10" data-val-length-min="10" maxlength="10" placeholder="Enter Mobile No." id="mobileno" name="mobileno" onkeypress="return IsNumeric(event);" type="text" value="<?php echo $insid[0]['MobNum']; ?>" >
                                                        <span class="field-validation-valid font-red" data-valmsg-for="mobileno" data-valmsg-replace="true"></span>
                                                 
                                            </div>
                                        </div>
                                       
                                       
                                       
                                        <div class="row mg-t-10">
                                            
                                                    <label class="col-md-4 form-control-label">Email:</label>
                                                    <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                        <input class="form-control" data-val="true" data-val-email="Invalid Email" placeholder="Enter Email" id="email" maxlength="100" name="email" type="text" value="<?php echo $insid[0]['email']; ?>" >
                                                        <span class="field-validation-valid font-red" data-valmsg-for="email" data-valmsg-replace="true"></span>
                                                    
                                            </div>
                                        </div>

                                       
    <div class="form-layout-footer mg-t-30">
                <button type="submit" value="submit" name="submit" class="btn btn-info mg-r-5">Submit</button>
                <input type="hidden" name="action" value="<?php if($_REQUEST['flag'] =='Edit') echo $_REQUEST['flag']; else echo 'Add'; ?>">
                <button class="btn btn-secondary" id="cancel">Cancel</button>
              </div>
                                    

                                     
                                        
                             
                                        </div>

                                    </div> 
           <div class="col-xl-12">
                
            
<div class="table-wrapper">
            <table id="datatable1" class="table display responsive nowrap">
              <thead>
                <tr>
                  <th class="wd-15p">Sl No</th>
                  <th class="wd-15p"> Name</th>
                  <th class="wd-15p">Mobile No</th>
                  <th class="wd-10p">Email</th>
                  <th class="wd-20p">Action</th>                  
            
                </tr>
              </thead>
              <tbody>
                <?php
                $i=1;
                $sessid=$_SESSION['MintId'];
               $pinqry = mysqli_query($conn,"select * from  insurance_master where intAdminId ='$sessid'"); 
               
                while ($res = mysqli_fetch_array($pinqry)){ 
                 $email = $res['email'];
                 $name=$res['name'];
                 $MobNum=$res['MobNum'];
                 $id=$res['id'];  
                 $company_id=$res['company_id']
  ?>
                <tr>
                  <td><?php echo $i; ?></td>
                  <td><?php echo $res['name']; ?></td>
                  <td><?php echo $res['MobNum']; ?></td>
                  <td><?php echo $res['email']; ?></td>

                  <td>
                   <a class="iconp" href="addinsurance_master.php?id=<?php echo $id;?>&flag=Edit"><i class="icon ion-edit tx-16"></i></a>
<a  class="idelete iconp" href="addinsurance_master.php?id=<?php echo $id;?>&flag=Delete"><i class="icon ion-trash-a tx-16"></i></a>

                </tr>
                <?php $i++;} ?>
                 
              </tbody>
            </table>
          </div>
                   


                                    </div>

          
        </div>
 
</div>
      </div><!-- am-pagebody -->
    </form>
    </div> 
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
    <!-- <script src="../lib/jquery/jquery.js"></script> -->
    <script src="../lib/popper.js/popper.js"></script>
    <script src="../lib/bootstrap/bootstrap.js"></script>
    <script src="../lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js"></script>
    <script src="../lib/jquery-toggles/toggles.min.js"></script>
    <script src="../lib/highlightjs/highlight.pack.js"></script>
     <script src="../lib/datatables/jquery.dataTables.js"></script> 
    <script src="../lib/datatables-responsive/dataTables.responsive.js"></script>
    <!-- <script src="../lib/select2/js/select2.min.js"></script> -->

   <!--  <script src="../js/amanda.js"></script>  --> 
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

/*if(value.length<10)
{
  input.removeClass("valid").addClass("invalid");
}*/


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
$("#cancel").click(function(e) {
/*  alert("maans");*/
if(confirm("Leave Page??"))
{

/*
  $(location).attr("href", "viewtransporter.php");*/
/*  window.location.replace("viewtransporter.php"); */
/*  window.location.href("viewtransporter.php"); */
  window.location.href = "addinsurance_master.php";
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