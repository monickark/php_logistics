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
if($_POST['bankname']=="")
{
  echo '<script> alert("Please give Proper Bank.");</script>';

}


else
{


 

$bank_check=mysqli_query($conn,"UPDATE frieghtdetails SET frieghtdetails.tripid = CONCAT(frieghtdetails.tripid,'-2018') " );


$bank_check=mysqli_query($conn,"UPDATE container_payment,customer_bill_det,customer_payment,driver_mgt SET container_payment.bill_no = CONCAT(container_payment.bill_no,'-2018'),customer_bill_det.trip_invoice = CONCAT(customer_bill_det.trip_invoice,'-2018'),customer_bill_det.billing_id = CONCAT(customer_bill_det.trip_invoice,'-2018'),customer_payment.invoice_no = CONCAT(customer_payment.invoice_no,'-2018'),driver_mgt.tripid = CONCAT(driver_mgt.tripid,'-2018') " );



$bank_check=mysqli_query($conn,"UPDATE fuel,hire_freight,hire_hire,hire_load,load_det SET fuel.tripid= CONCAT(fuel.tripid,'-2018'),hire_freight.hire_id= CONCAT(hire_freight.hire_id,'-2018'),hire_hire.hire_id= CONCAT(hire_hire.hire_id,'-2018'),hire_load.hire_id= CONCAT(hire_load.hire_id,'-2018'),load_det.tripid= CONCAT(load_det.tripid,'-2018') " );





$bank_check=mysqli_query($conn,"UPDATE load_hire,load_return,load_stat,onroad_details,pod,transporter_billing SET load_hire.tripid= CONCAT(load_hire.tripid,'-2018'),load_return.tripid= CONCAT(load_return.tripid,'-2018'),load_stat.tripid= CONCAT(load_stat.tripid,'-2018'),onroad_details.tripid= CONCAT(onroad_details.tripid,'-2018'),pod.tripid= CONCAT(pod.tripid,'-2018'),transporter_billing.tripid= CONCAT(transporter_billing.tripid,'-2018'),transporter_billing.billingid= CONCAT(transporter_billing.billingid,'-2018') " );






$bank_check=mysqli_query($conn,"UPDATE transporter_hire_payment,transporter_payment,trip_calculation,vechstat SET transporter_hire_payment.bill_id= CONCAT(transporter_hire_payment.bill_id,'-2018'),transporter_payment.bill_id= CONCAT(transporter_payment.bill_id,'-2018'),trip_calculation.tripid=CONCAT(trip_calculation.tripid,'-2018'),vechstat.tripid= CONCAT(vechstat.tripid,'-2018') " );

/*

update frieghtdetails,container_payment,customer_bill_det,customer_payment,driver_mgt,fuel,hire_freight,hire_hire,hire_load,load_det SET frieghtdetails.tripid = CONCAT(frieghtdetails.tripid,'-2018'),container_payment.bill_no = CONCAT(container_payment.bill_no,'-2018'),customer_bill_det.trip_invoice = CONCAT(customer_bill_det.trip_invoice,'-2018'),customer_bill_det.billing_id = CONCAT(customer_bill_det.trip_invoice,'-2018'),customer_payment.invoice_no = CONCAT(customer_payment.invoice_no,'-2018'),driver_mgt.tripid = CONCAT(driver_mgt.tripid,'-2018'),fuel.tripid= CONCAT(fuel.tripid,'-2018'),hire_freight.hire_id= CONCAT(hire_freight.hire_id,'-2018'),hire_hire.hire_id= CONCAT(hire_hire.hire_id,'-2018'),hire_load.hire_id= CONCAT(hire_load.hire_id,'-2018'),load_det.tripid= CONCAT(load_det.tripid,'-2018')

UPDATE load_hire,load_return,load_stat,onroad_details,pod,transporter_billing,transporter_hire_payment,transporter_payment,trip_calculation,vechstat SET load_hire.tripid= CONCAT(load_hire.tripid,'-2018'),load_return.tripid= CONCAT(load_return.tripid,'-2018'),load_stat.tripid= CONCAT(load_stat.tripid,'-2018'),onroad_details.tripid= CONCAT(onroad_details.tripid,'-2018'),pod.tripid= CONCAT(pod.tripid,'-2018'),transporter_billing.tripid= CONCAT(transporter_billing.tripid,'-2018'),transporter_billing.billingid= CONCAT(transporter_billing.billingid,'-2018'),transporter_hire_payment.bill_id= CONCAT(transporter_hire_payment.bill_id,'-2018'),transporter_payment.bill_id= CONCAT(transporter_payment.bill_id,'-2018'),trip_calculation.tripid=CONCAT(trip_calculation.tripid,'-2018'),vechstat.tripid= CONCAT(vechstat.tripid,'-2018')
*/



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

 if($_REQUEST['flag'] == "Edit"){
 $id =$_REQUEST['id'];

    $update_id = array(
      "id"      =>    mysqli_real_escape_string($data->con, $id)
    );

    $insid = $data->select_where('banks', $update_id);
 }

?> 
    <div class="am-mainpanel">
      <div class="am-pagetitle">
        <h5 class="am-title">Financial Year</h5>
      
          
        <!-- search-bar -->
      </div>
      <!-- am-pagetitle -->
        <form id="searchBar" class="search-bar"  method="POST" action="">
      <div class="am-pagebody">
 <div class="card pd-20 pd-sm-40 form-layout form-layout-4">
       <div class="row row-sm mg-t-20">
          <div class="col-xl-6">
           
            <div class="portlet-body">
                                          <h6 class="card-body-title">Current Year 2018-2019</h6>
                                        
                                            <div class="row mg-t-10">
                                                
                                                        <label class="col-md-4 form-control-label">Current Financial Year :</label>
                                                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                            
                                                            <input class="form-control" data-val="true" data-val-length="The field bankname must be a string with a maximum length of 200." data-val-length-max="200" data-val-required="Enter Bank Name" id="bankname" maxlength="200" name="bankname" type="text" value="2018-2019" required>
                                                            <span class="field-validation-valid font-red" data-valmsg-for="bankname" data-valmsg-replace="true"></span>
                                                </div>
                                            </div>   
                                              <div class="row mg-t-10">
                                                
                                                        <label class="col-md-4 form-control-label">Close Suffix:</label>
                                                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                            
                                                            <input class="form-control" data-val="true" data-val-length="The field bankname must be a string with a maximum length of 200." data-val-length-max="200" data-val-required="Enter Bank Name" id="bankname" maxlength="200" name="csuffix" type="text" value="2018" required>
                                                            <span class="field-validation-valid font-red" data-valmsg-for="bankname" data-valmsg-replace="true"></span>
                                                </div>
                                            </div>                                          
                                           

                                  </div>

                       <div class="form-layout-footer mg-t-30">
                <button type="submit" value="submit" name="submit" class="btn btn-info mg-r-5">Create New Financial Year</button>
                <input type="hidden" name="action" value="<?php if($_REQUEST['flag'] =='Edit') echo $_REQUEST['flag']; else echo 'Add'; ?>">
                <button type="reset" value="Reset" class="btn btn-secondary">Cancel</button>
              </div>


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
