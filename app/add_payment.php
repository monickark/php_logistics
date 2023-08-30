<?php include('../include/dbConnect.php'); ?>
<?php include('../include/adminheader.php'); ?>
<?php include('../include/header.php'); ?>
<?php include('../include/leftmenu.php'); ?>
<?php include('../include/leftmenu.php');  
require('../include/basefunctions.php');
?>

<!-- <link href="../lib/datatables/jquery.dataTables.css" rel="stylesheet">
    <link href="../lib/select2/css/select2.min.css" rel="stylesheet"> -->

<?php
$data = new Basefunc;


if(isset($_POST['modepay'])){


         if($_REQUEST['action'] == "Add"){


$insert_pay = array(
      "intAdminId"      =>    mysqli_real_escape_string($data->con, $_SESSION['MintId']),    
      "mode_pay"          =>     mysqli_real_escape_string($data->con, $_POST['pay_name']), 
      "mode_desc"           =>     mysqli_real_escape_string($data->con, $_POST['pay_desc']) 
      
      
      );  
       $insid = $data->insert('mode_of_payment', $insert_pay); 
      
 

   if($insid){

    echo '<script> alert("Payment Mode  Added Successfully");window.location.assign("add_payment.php");</script>';
   } 
   else{

    echo '<script> alert("Error");</script>';
   }
}else
{

$update_insurance = array(
      "intAdminId"      =>    mysqli_real_escape_string($data->con, $_SESSION['MintId']),    
      "mode_pay"          =>     mysqli_real_escape_string($data->con, $_POST['pay_name']), 
      "mode_desc"           =>     mysqli_real_escape_string($data->con, $_POST['pay_desc']) 
     
      
      );  
 $id =$_REQUEST['id'];
 $update_id = array(
      "id"      =>    mysqli_real_escape_string($data->con, $id)
    );

       $insid = $data->update('mode_of_payment', $update_insurance, $update_id);
      if($insid){

    echo '<script> alert("Payment Mode Altered Successfully");window.location.assign("add_payment.php");</script>';
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

    $insid = $data->select_where('mode_of_payment', $update_id);
 }





 if($_REQUEST['flag'] == "Delete"){
 $id =$_REQUEST['id'];

    $update_id = array(
      "id"      =>    mysqli_real_escape_string($data->con, $id)
    );

    $insid = $data->delete_where('mode_of_payment', $update_id);
echo '<script> alert("Payment Mode Deleted Successfully");window.location.assign("add_payment.php");</script>';
 }

?> 





 <div class="am-mainpanel">
      <div class="am-pagetitle">
        <h5 class="am-title">Payment Mode</h5>
      
          
        <!-- search-bar -->
      </div>
      <!-- am-pagetitle -->




   <form id="searchBar" class="search-bar"  method="POST" action="" enctype="multipart/form-data">
      <div class="am-pagebody">
 <div class="card pd-20 pd-sm-40 form-layout form-layout-4">
       <div class="row row-sm mg-t-20">
          <div class="col-xl-6">
           
            <div class="portlet-body">
                                          <h6 class="card-body-title">Mode Of Payment</h6>
                                                                                                        
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.16.0/jquery.validate.min.js"></script> 
<script>
$(document).ready( function () {
    $( "#searchBar" ).validate( {
    
        rules: {
          vehicleno: "required"
                                                 
            },
        messages: {
          vehicleno: "Please enter Payment mode"
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
                                                    
                                                        <label class="col-md-4 form-control-label">Payment Mode :<p style="color: red;">*</p></label>
                                                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                            <input class="form-control valid" data-val="true" data-val-length="The field vehicleno must be a string with a maximum length of 100." data-val-length-max="100" placeholder="Enter Payment Mode." id="vehicleno" maxlength="10" name="pay_name" type="text" value="<?php echo $insid[0]['mode_pay']; ?>">
                                                            <span class="font-red field-validation-valid" data-valmsg-for="vehicleno" data-valmsg-replace="true"></span>
                                                      
                                                    </div>
                                                </div>

 <div class="row mg-t-10">
                                                    
                                                        <label class="col-md-4 form-control-label">Description:</label>
                                                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                            <input class="form-control" data-val="true" data-val-length="The field permitno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Enter Description" id="vechmake" maxlength="50" name="pay_desc" type="text" value="<?php echo $insid[0]['mode_desc']; ?>">
                                                            <span class="field-validation-valid font-red" data-valmsg-for="permitno" data-valmsg-replace="true"></span>
                                                        
                                                    </div>
                                                </div>
<div class="form-layout-footer mg-t-30">
                <button type="submit" value="submit" name="modepay" class="btn btn-info mg-r-5">Submit</button>
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
                  <th class="wd-15p">Payment Mode</th>
                  <th class="wd-15p">Description</th>
                   <th class="wd-20p">Action</th>                   
            
                </tr>
              </thead>
              <tbody>
                <?php
                $i=1;
                $sessid=$_SESSION['MintId'];
               $payqry = mysqli_query($conn,"select * from  mode_of_payment where intAdminId ='$sessid'"); 
               
                while ($res = mysqli_fetch_array($payqry)){ 
                $id= $res['id'];
  ?>
                <tr>
                  <td><?php echo $i; ?></td>
                  <td><?php echo $res['mode_pay']; ?></td>
                  <td><?php echo $res['mode_desc']; ?></td>
                  
                  

                  <td>
                   <a class="iconp" href="add_payment.php?id=<?php echo $id;?>&flag=Edit"><i class="icon ion-edit tx-16"></i></a>
<a  class="idelete iconp" href="add_payment.php?id=<?php echo $id;?>&flag=Delete"><i class="icon ion-trash-a tx-16"></i></a>

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






<!-- 

<script>
  $(function () {
    $('#myTab li:last-child a').tab('show')
  })
</script> -->

<!-- Bootstrap core JavaScript
    ================================================== -->
  <!-- Placed at the end of the document so the pages load faster -->
 

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

    <script src="../js/amanda.js"></script>
      <script>
$("#cancel").click(function(e) {
/*  alert("maans");*/
if(confirm("Leave Page??"))
{

/*
  $(location).attr("href", "viewtransporter.php");*/
/*  window.location.replace("viewtransporter.php"); */
/*  window.location.href("viewtransporter.php"); */
  window.location.href = "add_payment.php";
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