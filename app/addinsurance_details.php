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

  


$insert_insurancedetails = array(
      "intAdminId"      =>    mysqli_real_escape_string($data->con, $_SESSION['MintId']),    
      "name"            =>     mysqli_real_escape_string($data->con, $_POST['companyname']),  
      "vnum"     =>     mysqli_real_escape_string($data->con, $_POST['vechno']), 
      "address"          =>     mysqli_real_escape_string($data->con, $_POST['address1']), 
      "top"           =>     mysqli_real_escape_string($data->con, $_POST['type_insurance']), 
      "from_duration"           =>     mysqli_real_escape_string($data->con, $_POST['fromduration']), 
      "to_duration"    =>     mysqli_real_escape_string($data->con, $_POST['toduration']), 
      "policy_no"           =>     mysqli_real_escape_string($data->con, $_POST['policy_num']), 
      "rto_location"           =>     mysqli_real_escape_string($data->con, $_POST['rto_location']), 
      "insured_value"           =>     mysqli_real_escape_string($data->con, $_POST['insureval']), 
      "premium_value"           =>     mysqli_real_escape_string($data->con, $_POST['premiumval'])
     
      );  
       $insid = $data->insert('insurance_details', $insert_insurancedetails);
      
 

   if($insid){

    echo '<script> alert("Insurance Added Successfully");window.location.assign("addinsurance_details.php");</script>';
   } 
   else{
    echo '<script> alert("Error");</script>';
   }
}else
{

$update_insurancedetails = array(
     "intAdminId"      =>    mysqli_real_escape_string($data->con, $_SESSION['MintId']),    
      "name"            =>     mysqli_real_escape_string($data->con, $_POST['companyname']),  
      "vnum"     =>     mysqli_real_escape_string($data->con, $_POST['vechno']), 
      "address"          =>     mysqli_real_escape_string($data->con, $_POST['address1']), 
      "top"           =>     mysqli_real_escape_string($data->con, $_POST['type_insurance']), 
      "from_duration"           =>     mysqli_real_escape_string($data->con, $_POST['fromduration']), 
      "to_duration"    =>     mysqli_real_escape_string($data->con, $_POST['toduration']), 
      "policy_no"           =>     mysqli_real_escape_string($data->con, $_POST['policy_num']), 
      "rto_location"           =>     mysqli_real_escape_string($data->con, $_POST['rto_location']), 
      "insured_value"           =>     mysqli_real_escape_string($data->con, $_POST['insureval']), 
      "premium_value"           =>     mysqli_real_escape_string($data->con, $_POST['premiumval'])
      
      );  
 $id =$_REQUEST['id'];
 $update_id = array(
      "id"      =>    mysqli_real_escape_string($data->con, $id)
    );

       $insid = $data->update('insurance_details', $update_insurancedetails, $update_id);
      if($insid){

    echo '<script> alert("Insurance Altered Successfully");window.location.assign("addinsurance_details.php");</script>';
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

    $insid = $data->select_where('insurance_details', $update_id);
 }

 if($_REQUEST['flag'] == "Delete"){
 $id =$_REQUEST['id'];

    $update_id = array(
      "id"      =>    mysqli_real_escape_string($data->con, $id)
    );

    $insid = $data->delete_where('insurance_details', $update_id);
echo '<script> alert("Insurance Deleted Successfully");window.location.assign("addinsurance_details.php");</script>';
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
          <div class="col-xl-6">
           
            <div class="portlet-body">
                                          <h6 class="card-body-title">Insurance Details</h6>
   <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.16.0/jquery.validate.min.js"></script> 
<script>
$(document).ready( function () {
    $( "#searchBar" ).validate( {
    
        rules: {
          vechno: "required",
          companyname: "required",
          
           policy_num: "required",
           rto_location: "required",                 
            },
        messages: {
          vechno: "Please select your Vehicle Number",
          companyname: "Please enter your Company Name", 
          type_insurance: "Please enter Type of insurance",
          
           policy_num: "Please enter Policy Number",
           rto_location: "Please enter RTO Location",      
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
          $( element ).parents( ".col-sm-4" ).addClass( "has-error" ).removeClass( "has-success" );
        },
        unhighlight: function (element, errorClass, validClass) {
          $( element ).parents( ".col-sm-8" ).addClass( "has-success" ).removeClass( "has-error" );
           $( element ).parents( ".col-sm-4" ).addClass( "has-success" ).removeClass( "has-error" );
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
                                                                    <select onChange="getdriver(this.value);"  name="vechno" id="vechno" class="form-control emp_val" >





<option value="">Select </option>
<?php $query =mysqli_query($conn,"SELECT distinct vechno FROM load_det ");
while($row=mysqli_fetch_array($query))
{ ?>

  <!-- Vehicle Number  Dropdown -->
<option value="<?php echo $row['vechno'];?>" <?php if($row['vechno']==$insid[0]['state']) echo 'selected="selected"'; ?> ><?php echo $row['vechno'];?></option>
<?php
}
?>
</select>
                                                                    <span class="field-validation-valid font-red" data-valmsg-for="stateid" data-valmsg-replace="true"></span>
                                                                
                                                            </div>
                                                        </div>
                                        <div class="row mg-t-10">
                                            
                                                
                                                    <label class="col-md-4 form-control-label"> Insurance Company Name:<p style="color: red;">*</p></label>
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
                                            
                                                    <label class="col-md-4 form-control-label">Type of Insurance:<p style="color: red;">*</p></label>
                                                    <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                        <input class="form-control emp_val" data-val="true" placeholder="Enter Type of Insurance" id="type_insurance" maxlength="100" name="type_insurance" type="text" value="<?php echo $insid[0]['top']; ?>" >
                                                        <span class="field-validation-valid font-red" data-valmsg-for="type_insurance" data-valmsg-replace="true"></span>
                                                   
                                            </div>
                                        </div>
                                        
                                        <div class="row mg-t-10">
                                            
                                                    <label class="col-md-4 form-control-label">Duration:</label>
                                                    <div class="col-sm-4 mg-t-10 mg-sm-t-5">
                                                        <input class="form-control" data-val="true" data-val-length="Invalid Mobile No." data-val-length-max="15" data-val-length-min="10" placeholder="Enter From Date." id="fromduration" name="fromduration" onkeypress="return IsNumeric(event);" type="text" value="<?php echo $insid[0]['from_duration']; ?>" >
                                                        <span class="field-validation-valid font-red" data-valmsg-for="from_duration" data-valmsg-replace="true"></span>
                                                 
                                            </div>

                                              <div class="col-sm-4 mg-t-10 mg-sm-t-5">

                                                        <input class="form-control" data-val="true" data-val-length="Invalid Mobile No." data-val-length-max="15" data-val-length-min="10" placeholder="Enter To Date." id="toduration" name="toduration" onkeypress="return IsNumeric(event);" type="text" value="<?php echo $insid[0]['to_duration']; ?>" >
                                                        <span class="field-validation-valid font-red" data-valmsg-for="to_duration" data-valmsg-replace="true"></span>
                                                 
                                            </div>
                                        </div>
                                       
                                        <div class="row mg-t-10">
                                            
                                                    <label class="col-md-4 form-control-label">Policy No:<p style="color: red;">*</p></label>
                                                    <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                        <input class="form-control emp_val" data-val="true" data-val-length="Invalid Phone No." data-val-length-max="20" data-val-length-min="5" placeholder="Enter Policy No" id="policy_num" name="policy_num"  type="text" value="<?php echo $insid[0]['policy_no']; ?>">
                                                        <span class="field-validation-valid font-red" data-valmsg-for="phoneno" data-valmsg-replace="true"></span>
                                                   
                                            </div>
                                        </div>
                                       
                                       

                                        <div class="row mg-t-10">
                                            
                                                    <label class="col-md-4 form-control-label">RTO Location:<p style="color: red;">*</p></label>
                                                    <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                        <input class="form-control emp_val" data-val="true" data-val-length="Invalid Phone No." data-val-length-max="20" data-val-length-min="5" placeholder="Enter RTO Location" id="rto_location" name="rto_location"  type="text" value="<?php echo $insid[0]['rto_location']; ?>">
                                                        <span class="field-validation-valid font-red" data-valmsg-for="phoneno" data-valmsg-replace="true"></span>
                                                   
                                            </div>
                                        </div>
                                         <div class="row mg-t-10">
                                            
                                                    <label class="col-md-4 form-control-label">Insured Value:</label>
                                                    <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                        <input class="form-control" data-val="true" data-val-length="Invalid Phone No." data-val-length-max="20" data-val-length-min="5" placeholder="Enter Insured Value" id="insureval" name="insureval"  type="text" value="<?php echo $insid[0]['insured_value']; ?>">
                                                        <span class="field-validation-valid font-red" data-valmsg-for="phoneno" data-valmsg-replace="true"></span>
                                                   
                                            </div>
                                        </div>
                                       
                                       
   <div class="row mg-t-10">
                                            
                                                    <label class="col-md-4 form-control-label">Premium Value:</label>
                                                    <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                        <input class="form-control" data-val="true" data-val-length="Invalid Phone No." data-val-length-max="20" data-val-length-min="5" placeholder="Enter Premium Value." id="premiumval" name="premiumval"  type="text" value="<?php echo $insid[0]['premium_value']; ?>">
                                                        <span class="field-validation-valid font-red" data-valmsg-for="phoneno" data-valmsg-replace="true"></span>
                                                   
                                            </div>
                                        </div>
                                  
<div class="form-layout-footer mg-t-30">
                <button type="submit" value="submit" name="submit" class="btn btn-info mg-r-5">Submit</button>
                <input type="hidden" name="action" value="<?php if($_REQUEST['flag'] =='Edit') echo $_REQUEST['flag']; else echo 'Add'; ?>">
                <button class="btn btn-secondary" id= "cancel">Cancel</button>
              </div>
                                  
                                        
                             </div>

                                    </div> 
           <div class="col-xl-6">
                
               
               <div class="table-wrapper">
            <table id="datatable1" class="table display responsive nowrap">
              <thead>
                <tr>
                  <th class="wd-15p">Sl No</th>
                  <th class="wd-15p"> Name</th>
                  <th class="wd-15p">vehicle No</th>
                  <th class="wd-10p">RTO Location</th>
                  <th class="wd-20p">Policy No</th> 
                   <th class="wd-20p">Action</th>                   
            
                </tr>
              </thead>
              <tbody>
                <?php
                $i=1;
                $sessid=$_SESSION['MintId'];
               $pinqry = mysqli_query($conn,"select * from  insurance_details where intAdminId ='$sessid'"); 
               
                while ($res = mysqli_fetch_array($pinqry)){ 
                 $insured_value = $res['insured_value'];
                 $name=$res['name'];
                 $premium_value=$res['premium_value'];
                 $id=$res['id'];  
                 $vnum=$res['vnum'];
                 $policy_no=$res['policy_no'];
                 $rto_location=$res['rto_location'];
  ?>
                <tr>
                  <td><?php echo $i; ?></td>
                  <td><?php echo $res['name']; ?></td>
                  <td><?php echo $res['vnum']; ?></td>
                  <td><?php echo $res['rto_location']; ?></td>
                  <td><?php echo $res['policy_no']; ?></td>
                  

                  <td>
                   <a class="iconp" href="addinsurance_details.php?id=<?php echo $id;?>&flag=Edit"><i class="icon ion-edit tx-16"></i></a>
<a  class="idelete iconp" href="addinsurance_details.php?id=<?php echo $id;?>&flag=Delete"><i class="icon ion-trash-a tx-16"></i></a>
<!-- <a class="iconp" href="addinsurance_details.php?id=<?php echo $id;?>&flag=View"><i class="icon ion-search tx-16"></i></a>
 -->                </tr>
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
     // include('../include/adminfooter.php'); ?> 
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
<!--     <script src="../lib/highlightjs/highlight.pack.js"></script>
 -->    <script src="../lib/datatables/jquery.dataTables.js"></script>
<!--     <script src="../lib/datatables-responsive/dataTables.responsive.js"></script>
 -->    <script src="../lib/select2/js/select2.min.js"></script>

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
    <script>
$("#cancel").click(function(e) {
/*  alert("maans");*/
if(confirm("Leave Page??"))
{

/*
  $(location).attr("href", "viewtransporter.php");*/
/*  window.location.replace("viewtransporter.php"); */
/*  window.location.href("viewtransporter.php"); */
  window.location.href = "addinsurance_details.php";
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

