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

$bank_check=mysqli_query($conn,"SELECT * FROM pay_type WHERE pay_type ='" .$_POST["bankname"]. "'; " );

if(mysqli_num_rows($bank_check)==0)
{
        $bank = array(
        "intAdminId"       =>     mysqli_real_escape_string($data->con, $_SESSION['MintId']),
        "pay_type"           =>     mysqli_real_escape_string($data->con, $_POST['bankname'])
      ); 
 $bank_insert = $data->insert('pay_type', $bank);
 
/*  $bank_insert= "insert into banks(name,accno,ifsc,subgroup,state,city,area,address,pincode)
  values('".$bnkname."','".$accno."','".$ifsc."','".$subgrp."','".$state."','".$city."','".$area."','".$address."','".$pincode."')";  */ 

   if($bank_insert){


    echo '<script> alert("Payment Method Added Successfully");window.location.assign("add_paytype.php");</script>';
   } 
   else{
    echo '<script> alert("Error");</script>';
   }
}

else{

      echo '<script> alert("Payment Type Already Present.");</script>';
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

       $insid = $data->update('banks', $bank, $update_id);
      if($insid){

    echo '<script> alert("Banks Altered Successfully");window.location.assign("viewbank.php");</script>';
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

    $insid = $data->delete_where('pay_type', $update_id);
echo '<script> alert("Pay Type Deleted Successfully");window.location.assign("add_paytype.php");</script>';


 }
 

?> 
    <div class="am-mainpanel">
      <div class="am-pagetitle">
        <h5 class="am-title">Pay Master</h5>
      
          
        <!-- search-bar -->
      </div>
      <!-- am-pagetitle -->
        <form id="searchBar" class="search-bar"  method="POST" action="">
      <div class="am-pagebody">
 <div class="card pd-20 pd-sm-40 form-layout form-layout-4">
       <div class="row row-sm mg-t-20">
          <div class="col-xl-6">
           
            <div class="portlet-body">
                                          <h6 class="card-body-title">Type of Payment</h6>
                                                                                                                 
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.16.0/jquery.validate.min.js"></script> 
<script>

$(document).ready( function () {
    $( "#searchBar" ).validate( {
    
        rules: {
          bankname: "required"
       
           
          },
        messages: {
          bankname: "Please enter your Payment Type"

       
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
                                                
                                                        <label class="col-md-4 form-control-label">New Type :<p style="color: red;">*</p></label>
                                                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                            
                                                            <input class="form-control emp_val" data-val="true" data-val-length="The field bankname must be a string with a maximum length of 200." data-val-length-max="200" data-val-required="Enter Bank Name" id="bankname" maxlength="200" name="bankname" type="text" value="<?php echo $insid[0]['name']; ?>" required>
                                                            <span class="field-validation-valid font-red" data-valmsg-for="bankname" data-valmsg-replace="true"></span>
                                                </div>
                                            </div>                                            
                                           

                                  </div>

                       <div class="form-layout-footer mg-t-30">
                <button type="submit" value="submit" name="submit" class="btn btn-info mg-r-5">Add Type</button>
                <input type="hidden" name="action" value="<?php if($_REQUEST['flag'] =='Edit') echo $_REQUEST['flag']; else echo 'Add'; ?>">
                <button type="reset" value="Reset" class="btn btn-secondary" id="cancel">Cancel</button>
              </div>


                                    </div>

          
        </div>
 
</div>
      </div><!-- am-pagebody -->
    </form>




      

      <!-- am-pagetitle -->
        <form id="searchBar" class="search-bar"  method="POST" action="">
      <div class="am-pagebody">
 <div class="card pd-20 pd-sm-40 form-layout form-layout-4">
       <div class="row row-sm mg-t-20">
          <div class="col-xl-6">
           
           <h6 class="card-body-title">Present Pay Types</h6>

 <div class="table-wrapper">

            <table id="datatable1" class="table display responsive nowrap">

              <thead>

                <tr>

                    <th class="wd-10p">Sl No</th>

                  <th class="wd-10p">Pay Type </th>

                <th class="wd-10p">Tools</th>

               
                </tr>

              </thead>

              <tbody>

                <?php

                $i=1;

               $pinqry = mysqli_query($conn,"select * from pay_type "); 

                while ($res = mysqli_fetch_array($pinqry)){ 

                  
$id=$res['id'];


               $name = $res['pay_type'];

          /*     $accno = $res['accno'];

               $ifsc = $res['ifsc'];

               $sgrp = $res['subgroup'];

               $state=$res['state'];

               $city = $res['city'];

                $area = $res['area'];

                 $address = $res['address'];

                  $pincode = $res['pincode'];*/

  ?>

                <tr>

                  <td><?php echo $i; ?></td>

                  <td ><?php echo $name; ?></td>


              <td>  
<a  class="idelete iconp" href="add_paytype.php?id=<?php echo $id;?>&flag=Delete"><i class="icon ion-trash-a tx-16"></i></a>

</td>
                  <!-- 

                  <td><?php echo $ifsc; ?></td>

                  <td><?php echo $sgrp; ?></td>

                  <td><?php echo $state ?></td>

                  <td><?php echo $city ?></td> 

                  <td><?php echo $area ?></td> 

                  <td><?php echo $address ?></td> 

                  <td><?php echo $pincode ?></td>  -->

                </tr>

                <?php $i++;} ?>

                 

              </tbody>

            </table>

          </div><!-- table-wrapper -->


 


                                    </div>

          
        </div>
 
</div>
      </div><!-- am-pagebody -->
    </form>

    
      <?php include('../include/adminfooter.php'); ?> 
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
$("#cancel").click(function(e) {
/*  alert("maans");*/
if(confirm("Leave Page??"))
{

/*
  $(location).attr("href", "viewtransporter.php");*/
/*  window.location.replace("viewtransporter.php"); */
/*  window.location.href("viewtransporter.php"); */
  window.location.href = "add_paytype.php";
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