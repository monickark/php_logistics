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

  


$insert_reter = array(
      "intAdminId"      =>    mysqli_real_escape_string($data->con, $_SESSION['MintId']),    
      "vnum"     =>     mysqli_real_escape_string($data->con, $_POST['vechno']), 
      "bill_no"     =>     mysqli_real_escape_string($data->con, $_POST['bill_num']),
      "type_work"          =>     mysqli_real_escape_string($data->con, $_POST['typeofwrk']), 
     
      "date_from"           =>     mysqli_real_escape_string($data->con, $_POST['routeform']), 
      "date_to"    =>     mysqli_real_escape_string($data->con, $_POST['routeto']), 
      "rto_details"           =>     mysqli_real_escape_string($data->con, $_POST['rtdetails']), 
      "rto_fees"           =>     mysqli_real_escape_string($data->con, $_POST['rtfees']), 
      "mis_charge"           =>     mysqli_real_escape_string($data->con, $_POST['charges']), 
      "fc_date"           =>     mysqli_real_escape_string($data->con, $_POST['fcdate'])
     
      
      
      );  
       $insid = $data->insert('fc_details', $insert_reter);
      
 

   if($insid){

    echo '<script> alert("Fc Details Addeed Successfully");window.location.assign("addfc_details.php");</script>';
   } 
   else{
    echo '<script> alert("Error");</script>';
   }
}else
{

$update_reter = array(
     "intAdminId"      =>    mysqli_real_escape_string($data->con, $_SESSION['MintId']),    
      "vnum"     =>     mysqli_real_escape_string($data->con, $_POST['vechno']), 
      "bill_no"     =>     mysqli_real_escape_string($data->con, $_POST['bill_num']),
      "type_work"          =>     mysqli_real_escape_string($data->con, $_POST['typeofwrk']), 
     
      "date_from"           =>     mysqli_real_escape_string($data->con, $_POST['routeform']), 
      "date_to"    =>     mysqli_real_escape_string($data->con, $_POST['routeto']), 
      "rto_details"           =>     mysqli_real_escape_string($data->con, $_POST['rtdetails']), 
      "rto_fees"           =>     mysqli_real_escape_string($data->con, $_POST['rtfees']), 
      "mis_charge"           =>     mysqli_real_escape_string($data->con, $_POST['charges']), 
      "fc_date"           =>     mysqli_real_escape_string($data->con, $_POST['fcdate'])
      
      
      );  
 $id =$_REQUEST['id'];
 $update_id = array(
      "id"      =>    mysqli_real_escape_string($data->con, $id)
    );

       $insid = $data->update('fc_details', $update_reter, $update_id);
      if($insid){

    echo '<script> alert("Fc Details Altered Successfully");window.location.assign("addfc_details.php");</script>';
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

    $insid = $data->select_where('fc_details', $update_id);
 }

  if($_REQUEST['flag'] == "Delete"){
 $id =$_REQUEST['id'];

    $update_id = array(
      "id"      =>    mysqli_real_escape_string($data->con, $id)
    );

    $insid = $data->delete_where('fc_details', $update_id);
echo '<script> alert(" Fc Details Deleted Successfully");window.location.assign("addfc_details.php");</script>';
 }

?> 

    <div class="am-mainpanel">
      <div class="am-pagetitle">
        <h5 class="am-title">FC DETAILS </h5>
      
          
        <!-- search-bar -->
      </div>
      <!-- am-pagetitle -->
        <form id="searchBar" class="search-bar"  method="POST" >
      <div class="am-pagebody">
 <div class="card pd-20 pd-sm-40 form-layout form-layout-4">
       <div class="row row-sm mg-t-20">
          <div class="col-xl-9">
           
            <div class="portlet-body">
                                          <h6 class="card-body-title">Fc Details</h6>
                                          <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.16.0/jquery.validate.min.js"></script> 
<script>

$(document).ready( function () {
    $( "#searchBar" ).validate( {
    
        rules: {
          vechno: "required",
         rtfees: "required"                 
           
          },
        messages: {
          vechno: "Please Select your VehicleNo", 
           rtfees: "Please enter a RTO Amount"
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
                                            
                                                
                                                    <label class="col-md-4 form-control-label">Bill NO:</label>
                                                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                    <input class="form-control" data-val="true" placeholder="Enter Bill Num" id="bill_num" maxlength="100" name="bill_num" type="text" value="<?php echo $insid[0]['bill_no']; ?>" >
                                                    <span class="field-validation-valid font-red" data-valmsg-for="tyre_code" data-valmsg-replace="true"></span>
                                             
                                     
                                            </div>
                                        </div>


                                          <div class="row mg-t-10">
                                                            
                                                                <label class="col-md-4 form-control-label">vehicle Number:<p style="color: red;">*</p></label>
                                                                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                                    <select   name="vechno" id="vechno" class="form-control" >





<option value="">Select </option>
<?php $query =mysqli_query($conn,"SELECT distinct vechNo FROM vehicles");
while($row=mysqli_fetch_array($query))
{ ?>

  <!-- Vehicle Number  Dropdown -->
<option value="<?php echo $row['vechNo'];?>" <?php if($row['vechNo']==$insid[0]['vnum']) echo 'selected="selected"'; ?> ><?php echo $row['vechNo'];?></option>
<?php
}
?>
</select>
                                                                    <span class="field-validation-valid font-red" data-valmsg-for="stateid" data-valmsg-replace="true"></span>
                                                                
                                                            </div>
                                                        </div>

                                        
                                        <div class="row mg-t-10">
                                            
                                                
                                                    <label class="col-md-4 form-control-label">Type Of Work:</label>
                                                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                    <input class="form-control" data-val="true" placeholder="Enter Tyre Code" id="typeofwrk" maxlength="100" name="typeofwrk" type="text" value="<?php echo $insid[0]['type_work']; ?>" >
                                                    <span class="field-validation-valid font-red" data-valmsg-for="tyre_code" data-valmsg-replace="true"></span>
                                             
                                     
                                            </div>
                                        </div>

                                        
                                      


                                        <div class="row mg-t-10">
                                            
                                                   <label class="col-md-4 form-control-label">Date From:</label>
                                                        <div class="col-sm-4 mg-t-10 mg-sm-t-0">
<div class="input-group">
              <span class="input-group-addon"><i class="icon ion-calendar tx-16 lh-0 op-6"></i></span>
              <input class="form-control datepicker" placeholder="DD/MM/YYYY" name="routeform" id="datepicker" type="text" value="<?php if($insid[0]['date_from']==""){ echo date('d/m/Y'); }else { echo $insid[0]['date_from']; }?>" >
            </div>
      
                                                            <span class="field-validation-valid font-red" data-valmsg-for="policyvaliditydate" data-valmsg-replace="true"></span>
                                                    </div>


                                                         <div class="col-sm-4 mg-t-10 mg-sm-t-0">
<div class="input-group">
              <span class="input-group-addon"><i class="icon ion-calendar tx-16 lh-0 op-6"></i></span>
              <input class="form-control datepicker" placeholder="DD/MM/YYYY" name="routeto" id="" type="text" value="<?php if($insid[0]['date_to']==""){ echo date('d/m/Y'); }else { echo $insid[0]['date_to']; }?>" >
            </div>
      
                                                            <span class="field-validation-valid font-red" data-valmsg-for="policyvaliditydate" data-valmsg-replace="true"></span>
                                                    </div>
                                        </div>
                             
                                         
   <div class="row mg-t-10">
                                            
                                                    <label class="col-md-4 form-control-label">RTO Details:</label>
                                                    <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                        <input class="form-control" data-val="true" placeholder="Enter RTO Details" id="rtdetails" maxlength="100" name="rtdetails" type="text" value="<?php echo $insid[0]['rto_details']; ?>" >
                                                        <span class="field-validation-valid font-red" data-valmsg-for="travels" data-valmsg-replace="true"></span>
                                                   
                                            </div>
                                        </div>



                                           <div class="row mg-t-10">
                                            
                                                    <label class="col-md-4 form-control-label">RTO FEES:<p style="color: red;">*</p></label>
                                                    <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                        <input class="form-control" data-val="true" placeholder="Enter RTO Fess" id="rtfees" maxlength="10" name="rtfees" type="text" value="<?php echo $insid[0]['rto_fees']; ?>" >
                                                        <span class="field-validation-valid font-red" data-valmsg-for="contactperson" data-valmsg-replace="true"></span>
                                                   
                                            </div>
                                        </div>

                                        <div class="row mg-t-10">
                                            
                                                    <label class="col-md-4 form-control-label">Miscillaneous Charge:</label>
                                                    <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                        <input class="form-control" data-val="true" placeholder="Enter Miscillaneous" id="com_rtd" maxlength="100" name="charges" type="text" value="<?php echo $insid[0]['mis_charge']; ?>" >
                                                        <span class="field-validation-valid font-red" data-valmsg-for="contactperson" data-valmsg-replace="true"></span>
                                                   
                                            </div>
                                        </div>
                                     

                                        <div class="row mg-t-10">
                                            
                                                    <label class="col-md-4 form-control-label">Next FC Date</label>
                                                       <div class="col-sm-8 mg-t-10 mg-sm-t-0">
<div class="input-group">
              <span class="input-group-addon"><i class="icon ion-calendar tx-16 lh-0 op-6"></i></span>
              <input class="form-control fcdate" placeholder="DD/MM/YYYY" name="fcdate" id="fcdate" type="text" value="<?php if($insid[0]['fc_date']==""){ echo date('d/m/Y'); }else { echo $insid[0]['fc_date']; }?>" >
            </div>
      
                                                            <span class="field-validation-valid font-red" data-valmsg-for="policyvaliditydate" data-valmsg-replace="true"></span>
                                                    </div>
                                        </div>
                                       
                                   
                                      <div class="form-layout-footer mg-t-30">
                <button type="submit" value="submit" name="submit" class="btn btn-info mg-r-5">Submit</button>
                <input type="hidden" name="action" value="<?php if($_REQUEST['flag'] =='Edit') echo $_REQUEST['flag']; else echo 'Add'; ?>">
                <button class="btn btn-secondary">Cancel</button>
              </div>

                      <div>
                        </br>
                      </div>                 

                                  

                                  
                                        
                             </div>

                                    </div> 
                                  






          
                                  </div>

                     


                                   
     <div class="col-xl-12">
                
               
               <div class="table-wrapper">
            <table id="datatable1" class="table display responsive nowrap">
              <thead>
                <tr>
                  <th class="wd-15p">Sl No</th>
                  <th class="wd-15p">Bill No</th>

                  <th class="wd-15p">vehicle No</th>
                  <th class="wd-15p"> RTO Details </th>
                  <th class="wd-10p">RTO Fees</th>
                  
                   <th class="wd-20p">Fc Date </th>
                   <th class="wd-20p">Action</th>                   
            
                </tr>
              </thead>
              <tbody>
                <?php
                $i=1;
                $sessid=$_SESSION['MintId'];
               $pinqry = mysqli_query($conn,"select * from  fc_details where intAdminId ='$sessid'"); 
               
                while ($res = mysqli_fetch_array($pinqry)){ 
                 $bill_no = $res['bill_no'];
                 $vnum=$res['vnum'];
              
                 $id=$res['id'];  
                 $rto_details=$res['rto_details'];
                 $rto_fees=$res['rto_fees'];
                 $route_to=$res['route_to'];
                 $mis_charge=$res['mis_charge'];
                 $fc_date =$res['fc_date '];
  ?>
                <tr>
                  <td><?php echo $i; ?></td>
                  <td><?php echo $res['bill_no']; ?></td>
                  <td><?php echo $res['vnum']; ?></td>
                  <td><?php echo $res['rto_details']; ?></td>
                  <td><?php echo $res['rto_fees']; ?></td>
                 
                  <td><?php echo $res['fc_date'];?></td>
                  

                  <td>
                   <a class="iconp" href="addfc_details.php?id=<?php echo $id;?>&flag=Edit"><i class="icon ion-edit tx-16"></i></a>
<a  class="idelete iconp" href="addfc_details.php?id=<?php echo $id;?>&flag=Delete"><i class="icon ion-trash-a tx-16"></i></a>
<!-- <a class="iconp" href="addfc_details.php?id=<?php echo $id;?>&flag=View"><i class="icon ion-search tx-16"></i></a>
 -->                </tr>
                <?php $i++;} ?>
                 
              </tbody>
            </table>
          </div>
                       


                              
                                  <div>
                                    
                                  </div>
          
        </div>
 
</div>
      </div><!-- am-pagebody -->

    </form>
     </div>
      <?php 
  // include('../include/adminfooter.php'); ?> 

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
$('#rtfees').on('input blur change', function() {

  var input= $(this);
  var is_name=input.val();
/*alert(is_name);*/

var value=$('#rtfees').val();
if (isNaN(is_name)) {
  /*alert("is not numeric")*/
/*input.removeClass("valid").addClass("invalid");*/

this.value = value.substr(0, value.length - 1);

$('#rtfees').val(this.value);
}

if(value.length<10)
{
  input.removeClass("valid").addClass("invalid");
}


});

</script>


    