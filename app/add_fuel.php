<?php include('../include/dbConnect.php'); ?>
<?php include('../include/adminheader.php'); ?>
<?php include('../include/header.php'); ?>
<?php include('../include/leftmenu.php'); ?>
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
      "fuel"            =>     mysqli_real_escape_string($data->con, $_POST['fuel_name']),  
      "fuel_capacity"       =>     mysqli_real_escape_string($data->con, $_POST['capacity']) 
    
      
      
      );  
       $insid = $data->insert('spare_fuel_pay', $insert_insurance);
      
 

   if($insid){

    echo '<script> alert("Fuel Added Successfully");window.location.assign("add_fuel.php");</script>';
   } 
   else{
    echo '<script> alert("Error");</script>';
   }
}else
{

$update_insurance = array(
      "intAdminId"      =>    mysqli_real_escape_string($data->con, $_SESSION['MintId']),    
      "fuel"            =>     mysqli_real_escape_string($data->con, $_POST['fuel_name']),  
      "fuel_capacity"       =>     mysqli_real_escape_string($data->con, $_POST['capacity']) 
      
     
      
      );  
 $id =$_REQUEST['id'];
 $update_id = array(
      "id"      =>    mysqli_real_escape_string($data->con, $id)
    );

       $insid = $data->update('spare_fuel_pay', $update_insurance, $update_id);
      if($insid){

    echo '<script> alert("Fuel Altered Successfully");window.location.assign("add_fuel.php");</script>';
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

    $insid = $data->select_where('spare_fuel_pay', $update_id);
 }

 if($_REQUEST['flag'] == "Delete"){
 $id =$_REQUEST['id'];

    $update_id = array(
      "id"      =>    mysqli_real_escape_string($data->con, $id)
    );

    $insid = $data->delete_where('spare_fuel_pay', $update_id);
echo '<script> alert("Fuel Deleted Successfully");window.location.assign("add_fuel.php");</script>';
 }




////mode of payment start///



?>




 <div class="am-mainpanel">
      <div class="am-pagetitle">
        <h5 class="am-title">Fuel Master</h5>
      
          
        <!-- search-bar -->
      </div>
      <!-- am-pagetitle -->

    <form id="searchBar" class="search-bar"  method="POST" action="" enctype="multipart/form-data">
      <div class="am-pagebody">
 <div class="card pd-20 pd-sm-40 form-layout form-layout-4">
       <div class="row row-sm mg-t-20">
          <div class="col-xl-6">
           
            <div class="portlet-body">
                                          <h6 class="card-body-title">Fuel Details</h6>
                                                     
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.16.0/jquery.validate.min.js"></script> 
<script>
$(document).ready( function () {
    $( "#searchBar" ).validate( {
    
        rules: {
          fuel_name: "required",
          capacity: "required"                                         
            },
        messages: {
          fuel_name: "Please enter Fuel",
          capacity: "Please enter Fuel Capacity"                                 
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
          $( element ).parents( ".col-sm-8" ).addClass( "has-error" ).removeClass( "has-success" );         },
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
                                                    
                                                        <label class="col-md-4 form-control-label"> Fuel:<p style="color: red;">*</p></label>
                                                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                            <input class="form-control valid emp_val" data-val="true" data-val-length="The field vehicleno must be a string with a maximum length of 100." data-val-length-max="100" placeholder="Enter Fuel." id="vehicleno" maxlength="10" name="fuel_name" type="text" value="<?php echo $insid[0]['fuel']; ?>">
                                                            <span class="font-red field-validation-valid" data-valmsg-for="vehicleno" data-valmsg-replace="true"></span>
                                                      
                                                    </div>
                                                </div>

 <div class="row mg-t-10">
                                                    
                                                        <label class="col-md-4 form-control-label">Fuel Capacity:<p style="color: red;">*</p></label>
                                                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                            <input class="form-control emp_val" data-val="true" data-val-length="The field permitno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Enter Fuel capacity" id="vechmake" maxlength="10" name="capacity" type="text" value="<?php echo $insid[0]['fuel_capacity']; ?>">
                                                            <span class="field-validation-valid font-red" data-valmsg-for="permitno" data-valmsg-replace="true"></span>
                                                        
                                                    </div>
                                                </div>
                                                <div class="form-layout-footer mg-t-30">
                <button type="submit" value="submit" name="submit" class="btn btn-info mg-r-5">Submit</button>
                <input type="hidden" name="action" value="<?php if($_REQUEST['flag'] =='Edit') echo $_REQUEST['flag']; else echo 'Add'; ?>">
                <button class="btn btn-secondary" id="cancel">Cancel</button>
              </div>







</div>
</div>

 <div class="col-xl-6">
                
               
               <div class="table-wrapper">
            <table id="datatable1" class="table display responsive nowrap">
              <thead>
                <tr>
                  <th class="wd-15p">Sl No</th>
                  <th class="wd-15p">Fuel </th>
                  <th class="wd-15p">Fuel Capacity</th>
                   <th class="wd-20p">Action</th>                   
            
                </tr>
              </thead>
              <tbody>
                <?php
                $i=1;
                $sessid=$_SESSION['MintId'];
                  $pinqry = mysqli_query($conn,"select * from  spare_fuel_pay  where intAdminId ='$sessid'"); 
               
                while ($res = mysqli_fetch_array($pinqry)){ 
                 $bill_no = $res['fuel'];
                 $vnum=$res['fuel_capacity'];
              
                 $id=$res['id'];  
                 
  ?>
                <tr>
                  <td><?php echo $i; ?></td>
                  <td><?php echo $res['fuel']; ?></td>
                  <td><?php echo $res['fuel_capacity']; ?></td>
                 
                  

                  <td>
                   <a class="iconp" href="add_fuel.php?id=<?php echo $id;?>&flag=Edit"><i class="icon ion-edit tx-16"></i></a>
<a  class="idelete iconp" href="add_fuel.php?id=<?php echo $id;?>&flag=Delete"><i class="icon ion-trash-a tx-16"></i></a>

                </tr>
                <?php $i++;} ?>
                 
              </tbody>
            </table>
          </div>
                       


                                    </div> 






</div>
</div>
</div>
</form>
</div>


<script>
$('#vechmake').on('input blur change', function() {

  var input= $(this);
  var is_name=input.val();
/*alert(is_name);*/

var value=$('#vechmake').val();
if (isNaN(is_name)) {
  /*alert("is not numeric")*/
/*input.removeClass("valid").addClass("invalid");*/

this.value = value.substr(0, value.length - 1);

$('#vechmake').val(this.value);
}

if(value.length<10)
{
  input.removeClass("valid").addClass("invalid");
}


});

</script>






<script>
  $(function () {
    $('#myTab li:last-child a').tab('show')
  })
</script>

<!-- Bootstrap core JavaScript
    ================================================== -->
  <!-- Placed at the end of the document so the pages load faster -->
 
<!-- 
      <script src="../lib/jquery/jquery.js"></script>
    <script src="../lib/popper.js/popper.js"></script>
    <script src="../lib/bootstrap/bootstrap.js"></script>
    <script src="../lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js"></script>
     <script src="../lib/jquery-ui/jquery-ui.js"></script>
    <script src="../lib/jquery-toggles/toggles.min.js"></script>
    <script src="../lib/highlightjs/highlight.pack.js"></script>
    <script src="../lib/datatables/jquery.dataTables.js"></script>
    <script src="../lib/datatables-responsive/dataTables.responsive.js"></script>
    <script src="../lib/select2/js/select2.min.js"></script>
     <script src="../lib/spectrum/spectrum.js"></script>

    <script src="../js/amanda.js"></script> -->
     <script>
$("#cancel").click(function(e) {
/*  alert("maans");*/
if(confirm("Leave Page??"))
{

/*
  $(location).attr("href", "viewtransporter.php");*/
/*  window.location.replace("viewtransporter.php"); */
/*  window.location.href("viewtransporter.php"); */
  window.location.href = "add_fuel.php";
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
  input.invalid,select.invalid, textarea.invalid{
  border: 0.1px solid #d20505;
}
input.valid, textarea.valid{
  border-radius: 0 ;
}
</style>