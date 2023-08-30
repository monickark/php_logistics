<?php include('../include/dbConnect.php'); ?>
<?php include('../include/adminheader.php'); ?>
<?php include('../include/header.php'); ?>
<?php include('../include/leftmenu.php'); ?>
<?php include('../include/leftmenu.php');  
require('../include/basefunctions.php');
?>

 <?php
/*$data = new Basefunc;  
if(isset($_POST['submit'])){

   

         if($_REQUEST['action'] == "Add"){

  


$insert_company = array(
      "intAdminId"      =>     mysqli_real_escape_string($data->con, $_SESSION['MintId']),    
      "tripid"          =>     mysqli_real_escape_string($data->con, $_POST['Tripid']),  
      "date"            =>     mysqli_real_escape_string($data->con, $_POST['dieseldate']), 
      "vechno"          =>     mysqli_real_escape_string($data->con, $_POST['vechno']), 
      "driver"          =>     mysqli_real_escape_string($data->con, $_POST['driver']), 
      "vendor"          =>     mysqli_real_escape_string($data->con, $_POST['vendor']), 
      "place"           =>     mysqli_real_escape_string($data->con, $_POST['place']), 
      "qty"             =>     mysqli_real_escape_string($data->con, $_POST['qty']),
      "ppl"             =>     mysqli_real_escape_string($data->con, $_POST['pplh']), 
      "cost"            =>     mysqli_real_escape_string($data->con, $_POST['amt']),
      "paytype"         =>     mysqli_real_escape_string($data->con, $_POST['billtype'])
      );  
       $insid = $data->insert('fuel', $insert_company);
      
 

   if($insid){

    echo '<script> alert("Fuel Addeed Successfully");window.location.assign("addlocation.php");</script>';
   } 
   else{
    echo '<script> alert("Error");</script>';
   }
}else
{

$update_loc = array(
       "intAdminId"      =>    mysqli_real_escape_string($data->con, $_SESSION['MintId']),    
      "station"            =>     mysqli_real_escape_string($data->con, $_POST['stationid']),  
      "substation"     =>     mysqli_real_escape_string($data->con, $_POST['stationname']), 
      "PhNum"           =>     mysqli_real_escape_string($data->con, $_POST['phoneno']), 
      "frieght"          =>     mysqli_real_escape_string($data->con, $_POST['localfrieght']), 
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

       $insid = $data->update('locations', $update_loc, $update_id);
      if($insid){

    echo '<script> alert("Location Altered Successfully");window.location.assign("viewlocation.php");</script>';
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

    $insid = $data->select_where('locations', $update_id);
 }
*/
?> 


    <div class="am-mainpanel">

      <div class="am-pagetitle">

        <h5 class="am-title">Manual Diesel Entry</h5>

      

          

        <!-- search-bar -->

      </div>

      <!-- am-pagetitle -->

        <form id="searchBar" class="search-bar"  method="POST" action="">

      <div class="am-pagebody">

 <div class="card pd-20 pd-sm-20 form-layout form-layout-4 mg-t-20 mg-b-20">

       <div class="row row-sm mg-t-0">

          <div class="col-xl-7 col-md-7">

           

            <div class="portlet-body">

       

<!-- <div class="row mg-t-10">
          <label class="col-md-2 form-control-label">Date  </label>
          <div class="col-sm-10 mg-t-5 mg-sm-t-0 ">
           <div class="input-group">
            <span class="input-group-addon"><i class="icon ion-calendar tx-16 lh-0 op-6"></i></span>
            <input class="form-control fc-datepicker" placeholder="Entry date" name="dieseldate" id="datepicker001" type="text" value="<?php echo date('d/m/Y');?>" >
          </div>
        </div>
      </div></div> -->
         <div class="row mg-t-0">
           <label class="col-md-4 col-sm-4 form-control-label"> Vehicle Number  </label>

           <div class="col-sm-8 mg-t-5 mg-sm-t-0">
             <select onChange="getdetails(this.value);" name="vechno" id="mVechno" class="form-control" >

              <option value="">Select </option>
              <?php

  $name=$_SESSION['name'];

               $query =mysqli_query($conn,"SELECT * FROM vehicles WHERE vechOwner='$name'");
              while($row=mysqli_fetch_array($query))
                { ?>
                  <option value="<?php echo $row['vechNo'];?>" <?php if($row['vechNo']==$insid[0]['state']) echo 'selected="selected"'; ?> ><?php echo $row['vechNo'];?></option>
                  <?php
                }
                ?>
              </select>
              <span class="field-validation-valid font-red" data-valmsg-for="permitno" data-valmsg-replace="true"></span>
            </div>
          </div>
         <div class="row mg-t-20">
        <label class="col-md-4 col-sm-4 form-control-label">Trip Id  </label>
        <div class="col-sm-8 mg-t-5 mg-sm-t-0">
  <select class="form-control" data-val="true" onChange="getdrivers(this.value);" placeholder="Select Trip Id" id="tripid" name="tripid"  style="padding:0px 6px !important;" >
<option value="">Select Trip</option>
             </select>
<script>


     function getdrivers(val) {
var dat = $('#mVechno').val();
      $.ajax({
        type: "POST",
        url: "get_fuel_driver.php",
        data:{vech_no:dat, trip_id:val},
        success: function(data){ 
        
          $("#driver").html(data);
        }
      });
      fetch_data();
    }

</script>




         <!--  <input class="form-control" data-val="true" data-val-length="The field engineno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Trip ID" id="tripid" maxlength="50" name="tripid" type="text" value="" disabled> -->
          <span class="field-validation-valid font-red" data-valmsg-for="engineno" data-valmsg-replace="true"></span>
        </div>
      </div>


  

      <div align="right" class="mg-t-20">
     <button type="button" name="add" id="add" class="btn btn-info">Add New Entry</button>
    </div>
       <div class="row mg-t-10 mg-l-0"> 
             <h6 class="card-body-title"> Diesel Entries</h6>
           </div>
           


 <div class="row mg-t-10 mg-l-0 mg-r-0 pd-t-20-force" id="responsecontainer">
                                                  
        <div class="col-sm-10 mg-t-5 mg-sm-t-0">


 <div class="col-xl">
  
</div>
      </div>





                   </div></div></div>



                   <div class="modal fade" id="demoModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<!-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> -->

       <div class="row row-sm mg-t-0">

          


<div class="row mg-t-30 col-xl-12">
          <label class="col-md-2 col-sm-2 form-control-label">Date </label>
          <div class="col-sm-10 mg-t-5 mg-sm-t-0 ">
           <div class="input-group">
              <span class="input-group-addon"><i class="icon ion-calendar tx-16 lh-0 op-6"></i></span>
              <input class="form-control" placeholder="Cash Date" name="hire_friet_adv_cash_date" id="idTourDateDetails" data-format="dd/MM/yyyy" type="text" value="<?php echo date('d/m/Y');?>" >
            </div>
        </div>
      </div>
      

      <div class="row mg-t-30 col-xl-12">
        <label class="col-md-2 col-sm-2 form-control-label">Driver </label>
        <div class="col-sm-10 mg-t-5 mg-sm-t-0">

<select class="form-control" data-val="true" placeholder="Driver Name" id="driver" name="driver"  style="padding:0px 6px !important;" >

             </select>



     <!--      <input class="form-control" data-val="true" data-val-length="The field engineno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Driver Name" id="driver" maxlength="50" name="driver" type="text" value="" disabled> -->
          <span class="field-validation-valid font-red" data-valmsg-for="engineno" data-valmsg-replace="true"></span>
        </div>
      </div>  
        
      <div class="row mg-t-30 col-xl-12">
        <label class="col-md-2 col-sm-2 form-control-label">Vendor </label>
        <div class="col-sm-10 mg-t-5 mg-sm-t-0">
          <input class="form-control" data-val="true" data-val-length="The field engineno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Vendor Name" id="vendor" maxlength="50" name="vendor" type="text" value="" required>
          <span class="field-validation-valid font-red" data-valmsg-for="engineno" data-valmsg-replace="true"></span>
        </div>
      </div>
<div class="row mg-t-30 col-xl-12">
        <label class="col-md-2 col-sm-2 form-control-label">Place </label>
        <div class="col-sm-10 mg-t-5 mg-sm-t-0">
          <input class="form-control" data-val="true" data-val-length="The field engineno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Vendor Location" id="place" maxlength="50" name="place" type="text" value="" required>
          <span class="field-validation-valid font-red" data-valmsg-for="engineno" data-valmsg-replace="true"></span>
        </div>
      </div>


     


      <div class="row mg-t-30 col-xl-12">
        <label class="col-md-2 col-sm-2 form-control-label">Quantity </label>
        <div class="col-sm-4 mg-t-5 mg-sm-t-0">
          <input class="form-control" data-val="true" data-val-length="The field insurancename must be a string with a maximum length of 200." data-val-length-max="200" placeholder="Quantity" id="qty" maxlength="200" name="qty" type="text" value="" onkeyup="diecal()" required>
          <span class="field-validation-valid font-red" data-valmsg-for="insurancename" data-valmsg-replace="true"></span>
        </div>

        <label class="col-md-4 col-sm-4 form-control-label">Price Per Litre </label>
        <div class="col-sm-2 mg-t-5 mg-sm-t-0">
          <input class="form-control" data-val="true" data-val-length="The field permitno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="0" id="ppl" maxlength="50" name="ppl" type="text" value="" disabled>
          <input class="form-control" data-val="true" data-val-length="The field permitno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="0" id="pplh" maxlength="50" name="pplh" type="hidden" value="" >
          <span class="field-validation-valid font-red" data-valmsg-for="permitno" data-valmsg-replace="true"></span>
        </div>
      </div>
      <div class="row mg-t-30 col-xl-12">
        <label class="col-md-2 col-sm-2 form-control-label">Amount </label>
        <div class="col-sm-10 mg-t-5 mg-sm-t-0">
          <input class="form-control" data-val="true" data-val-length="The field insurancename must be a string with a maximum length of 200." data-val-length-max="200" placeholder="Diesel Amount" id="amt" maxlength="200" name="amt" type="text" value="" onkeyup="diecal()" required>
          <span class="field-validation-valid font-red" data-valmsg-for="insurancename" data-valmsg-replace="true" ></span>
        </div>
      </div>

 <div class="row mg-t-30 col-xl-12">


        <label class="col-md-2 col-sm-2 form-control-label">Pay Type </label>                                                    
        <div class="col-sm-10 mg-t-5 mg-sm-t-0">

          <select class="form-control valid" data-val="true" placeholder="Select bilty paid type" id="billtype" name="billtype" style="padding:0px 6px !important;">
            <option <?php if($insid[0]['billtype']=="To Be Billed") echo 'selected="selected"'; ?> value="Cash">Cash</option>
            <option <?php if($insid[0]['billtype']=="Paid") echo 'selected="selected"'; ?> value="Credit">Credit</option>

            <option <?php if($insid[0]['billtype']=="Paid") echo 'selected="selected"'; ?> value="Driver Cash">Driver Cash</option>
            
          </select>
</div></div>
       
<div class="modal-footer mg-t-20">
<button type="button"  class="btn btn-default" data-dismiss="modal">Close</button>
<button type="button" id="insert" class="btn btn-primary">Save changes</button>
</div>
</div>
</div> </div>
     
</div>
</div>



 <script>
$(function() {
    $( "#idTourDateDetails" ).datepicker();
});
</script>




                     <div class="portlet-body col-xs-4 col-md-4 mg-sm-40 mg-t-0-force milage-calculater mg-b-10-force">
                 <div class="row mg-t-10 mg-l-0"> 
             <h6 class="card-body-title" style="color: #fb9337;">Milage Calculation</h6>
           </div>
          
 <div class="row mg-t-10">
                                                  
        <div class="col-sm-12 mg-t-5 mg-sm-t-0">
<table border='1' class="milage-calculater-table">
  <tr class="mg-t-10-force">
  <td align=center> <b>Vehicle Number</b></td>
  <td align=center> <b><input type="text" value="" id="vno" disabled></b></td>
  </tr>
<tr class="mg-t-10-force">
  <td align=center> <b>Vehicle Old KM</b></td>
  <td align=center> <b><input type="text" id="okm" disabled></b></td>
  </tr>
  <tr class="mg-t-10-force">
  <td align=center> <b>Old KM Date</b></td>
  <td align=center> <b><input type="text" id="okmdte" disabled></b></td>
  </tr>
  <tr class="mg-t-10-force">
  <td align=center> <b>Fuel Liters</b></td>
  <td align=center> <b><input type="text" id="flts" disabled></b></td>
  </tr>
  <tr class="mg-t-10-force">
  <td align=center> <b>New KM</b></td>
  <td align=center> <b><input type="text" id="nkm" onkeyup="milage()"></b></td>
  </tr>
  <tr class="mg-t-10-force">
  <td align=center> <b>Milage</b></td>
  <td align=center> <b><input type="text" id="mil" disabled></b></td>
  </tr>
   <tr class="mg-t-10-force">
  <td align=center> <b>Update &nbsp <button class="btn bd bg-white tx-gray-600 small-icon-button" type="button" id="update_milage"><i class="icon ion-loop" ></i></button></b></td>
  <td align=center style="text-align="center"> <b>Reset &nbsp <button class="btn bd bg-white tx-gray-600 small-icon-button-reset" type="button" id="reset_milage"><i class="icon ion-nuclear" ></i></button></b></td
  </tr>
</table>

</div></div>
</div>

  </div>

   <script>
          function fetMilage()
          {
             var vechno = $("#mVechno").val();
             var act="Fetch";

          
              $.ajax({
      type: "POST",
      url: "milage_calculation.php",
      dataType:"json",
      data:{ vno:vechno,action:act },
      success: function(data){
    
        $("#okm").val(data.kms);
        $("#okmdte").val(data.date);
        $("#flts").val(data.qty);

}
    
  });

          }
        </script>

 <script >
$(function () {
$("#update_milage").click(function(){

var vno=$("#vno").val();

var newk=$("#nkm").val();
var mil=$("#mil").val();
var act="Insert";

$.ajax({
     url:"milage_calculation.php",
     method:"POST",
     data:{action:act, vech:vno, kms:newk, milage:mil},
     success:function(data)
     {
      $.notify("Updated Successfully", "success");
      
       }
    });


});

$("#reset_milage").click(function(){

var vno=$("#vno").val();
var act="Reset";

$.ajax({
     url:"milage_calculation.php",
     method:"POST",
     data:{action:act, vech:vno},
     success:function(data)
     {
       $.notify("Reset Successfully", "success");
      
       }
    });

});




fetMilage();

});
</script>

<script>

function milage()
{
var old=$("#okm").val();
var lts=$("#flts").val();
var newk=$("#nkm").val();

var mile=0;
mile=(newk-old)/lts;
$("#mil").val(mile);

}


</script>
 <script>
$(function() {
    $( "#datepickerd" ).datepicker();
});
</script>






   <div class="modal fade" id="editModel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<!-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> -->

       <div class="row row-sm mg-t-20">

          

<input   name="upd_id" id="upd_id" type="hidden"  >
<div class="row mg-t-10">
          <label class="col-md-2 form-control-label">Date </label>
          <div class="col-sm-10 mg-t-5 mg-sm-t-0 ">
           <div class="input-group">
              <span class="input-group-addon"><i class="icon ion-calendar tx-16 lh-0 op-6"></i></span>
              <input class="form-control datepicker" placeholder="Cash Date" name="datepicker002" id="datepickerd" type="text"  >
            </div>
        </div>
      </div>

      <div class="row mg-t-10">
        <label class="col-md-2 form-control-label">Driver </label>
        <div class="col-sm-10 mg-t-5 mg-sm-t-0">
          <input class="form-control" data-val="true" data-val-length="The field engineno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Driver Name" id="upd_driver" maxlength="50" name="upd_driver" type="text"  readonly>
          <span class="field-validation-valid font-red" data-valmsg-for="engineno" data-valmsg-replace="true"></span>
        </div>
      </div>  
        
      <div class="row mg-t-10">
        <label class="col-md-2 form-control-label">Vendor </label>
        <div class="col-sm-10 mg-t-5 mg-sm-t-0">
          <input class="form-control" data-val="true" data-val-length="The field engineno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Vendor Name" id="upd_vendor" maxlength="50" name="upd_vendor" type="text" >
          <span class="field-validation-valid font-red" data-valmsg-for="engineno" data-valmsg-replace="true"></span>
        </div>
      </div>
<div class="row mg-t-10">
        <label class="col-md-2 form-control-label">Place </label>
        <div class="col-sm-10 mg-t-5 mg-sm-t-0">
          <input class="form-control" data-val="true" data-val-length="The field engineno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Vendor Location" id="upd_place" maxlength="50" name="upd_place" type="text">
          <span class="field-validation-valid font-red" data-valmsg-for="engineno" data-valmsg-replace="true"></span>
        </div>
      </div>


     


      <div class="row mg-t-10">
        <label class="col-md-2 form-control-label">Quantity </label>
        <div class="col-sm-4 mg-t-5 mg-sm-t-0">
          <input class="form-control" data-val="true" data-val-length="The field insurancename must be a string with a maximum length of 200." data-val-length-max="200" placeholder="Quantity" id="upd_qty" maxlength="200" name="upd_qty" type="text"  onkeyup="diecal2()">
          <span class="field-validation-valid font-red" data-valmsg-for="insurancename" data-valmsg-replace="true"></span>
        </div>

        <label class="col-md-2 form-control-label">Price Per Litre </label>
        <div class="col-sm-4 mg-t-5 mg-sm-t-0">
          <input class="form-control" data-val="true" data-val-length="The field permitno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="0" id="upd_ppl" maxlength="50" name="upd_ppl" type="text" value="" disabled>
          <input class="form-control" data-val="true" data-val-length="The field permitno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="0" id="pplh" maxlength="50" name="pplh" type="hidden" value="" >
          <span class="field-validation-valid font-red" data-valmsg-for="permitno" data-valmsg-replace="true"></span>
        </div>
      </div>
      <div class="row mg-t-10">
        <label class="col-md-2 form-control-label">Amount </label>
        <div class="col-sm-10 mg-t-5 mg-sm-t-0">
          <input class="form-control" data-val="true" data-val-length="The field insurancename must be a string with a maximum length of 200." data-val-length-max="200" placeholder="Diesel Amount" id="upd_amt" maxlength="200" name="upd_amt" type="text" onkeyup="diecal2()">
          <span class="field-validation-valid font-red" data-valmsg-for="insurancename" data-valmsg-replace="true" ></span>
        </div>
      </div>

 <div class="row mg-t-10">


        <label class="col-md-2 form-control-label">Pay Type </label>                                                    
        <div class="col-sm-10 mg-t-5 mg-sm-t-0">

          <select class="form-control valid" data-val="true" placeholder="Select bilty paid type" id="upd_billtype" name="upd_billtype" style="padding:0px 6px !important;">
            <option <?php if($insid[0]['billtype']=="To Be Billed") echo 'selected="selected"'; ?> value="Cash">Cash</option>
            <option <?php if($insid[0]['billtype']=="Paid") echo 'selected="selected"'; ?> value="Credit">Credit</option>

            <option <?php if($insid[0]['billtype']=="Paid") echo 'selected="selected"'; ?> value="Driver Cash">Driver Cash</option>
            
          </select>
</div></div>
       
<div class="modal-footer">
<button type="button"  class="btn btn-default" data-dismiss="modal">Close</button>
<button type="button" id="update" class="btn btn-primary">Save changes</button>
</div>
</div>
</div> </div></div></div>
<!-- 
                       <div class="form-layout-footer mg-t-30">
                <button id="sub"  type="submit" value="submit" name="submit" class="btn btn-info mg-r-5">Submit</button>
                 <input type="hidden" name="action" value="<?php if($_REQUEST['flag'] =='Edit') echo $_REQUEST['flag']; else echo 'Add'; ?>"> 
                <button class="btn btn-secondary">Cancel</button>
              </div> -->






 
 <script >
function editfuel(variable)
{


$.ajax({
      type: "POST",
      url: "fuelfetch.php",
      data:'fuel_id='+variable,
       dataType: "json",
      success: function(data){
$("#upd_id").val(data.id);     
$("#datepicker002").val(data.date);
$("#upd_driver").val(data.driver);
$("#upd_vendor").val(data.vendor);
$("#upd_place").val(data.place);
$("#upd_qty").val(data.qty);
$("#upd_amt").val(data.amount);
$("#upd_ppl").val(data.ppl);
$("#upd_billtype").val(data.paytype);
$('#editModel').modal('show');
        }
      });
}
</script>




 <script >
$(function () {
$("#add").click(function(){
$('#demoModal').modal('show');
});
});
</script>

<script>

  $(document).on('click', '#update', function(){
   var dat = $('#datepicker002').val();
   var fid = $('#upd_id').val();
   var dri = $('#upd_driver').val();
   var ven = $('#upd_vendor').val();
   var pla = $('#upd_place').val();
   var qt = $('#upd_qty').val();
   var pp = $('#upd_ppl').val();
   var at = $('#upd_amt').val();
   var bill = $('#upd_billtype').val();
   var vech="";

$.ajax({
     url:"fuelins.php",
     method:"POST",
     data:{date:dat, id:fid, vechno:vech, driver:dri, vendor:ven, place:pla, qty:qt, pricepl:pp, amount:at, billpay:bill},
     success:function(data)
     {
      alert(data);
      fetch_data();
      $('#editModel').modal('hide');
       }
    });

  });
</script>




<script>
  document.addEventListener("DOMContentLoaded", function() {
fetch_data();

});
</script>
<script>

/*  Table View*/
  $('#mVechno').change(function(){
 fetch_data();
  });
</script>


<script>
function deletefuel(del_val)
{


$.ajax({
        type: "POST",
        url: "fueldel.php",
        data:'val='+del_val,
        success: function(data){ 
       fetch_data();
        }
      });


}
</script>



<script>

  $(document).on('click', '#insert', function(){



   var dat = $('#datepicker').val();
   var vno = $('#mVechno').val();
   var tid = $('#tripid').val();
   var dri = $('#driver').val();
   var ven = $('#vendor').val();
   var pla = $('#place').val();
   var qt = $('#qty').val();
   var pp = $('#ppl').val();
   var at = $('#amt').val();
   var bill = $('#billtype').val();

 if(vno != '')
 {

$.ajax({
     url:"fuelins.php",
     method:"POST",
     data:{date:dat, vechno:vno, tripid:tid, driver:dri, vendor:ven, place:pla, qty:qt, pricepl:pp, amount:at, billpay:bill},
     success:function(data)
     {
      $.notify(data, "success");
      fetch_data();
     }
    });

 }
 else
 {

alert("Please Select Vehicle Number");

 }


   /*var first_name = $('#data1').text();
   var last_name = $('#data2').text();
   if(first_name != '' && last_name != '')
   {
    $.ajax({
     url:"insert.php",
     method:"POST",
     data:{first_name:first_name, last_name:last_name},
     success:function(data)
     {
      $('#alert_message').html('<div class="alert alert-success">'+data+'</div>');
      $('#user_data').DataTable().destroy();
      fetch_data();
     }
    });
    setInterval(function(){
     $('#alert_message').html('');
    }, 5000);
   }
   else
   {
    alert("Both Fields is required");
   }*/
  });
</script>






<script>


  function fetch_data()
  {

    var vech_no =document.getElementById('mVechno').value;
    var tid = $("#tripid").val(); 

    $.ajax({    //create an ajax request to display.php
        type: "POST",
        url: "fuelfetch.php",
        data:{tripid:tid, vechno:vech_no},            
        dataType: "html",   //expect html to be returned                
        success: function(response){     
                     
            $("#responsecontainer").html(response); 
            //alert(response);
        }

    });
  }
</script>



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
   function getdetails(val) {
    $.ajax({
      type: "POST",
      url: "get_vech_details.php",
      data:'vech_id='+val,
      success: function(data){
    
         $("#tripid").html(data);
         $("#vno").val(val);
         
    }
    
      
        
      });
    fetMilage();
  }
</script>
<script>
  function diecal()
  {
    if((event.keyCode||event.which) != 9)
    {


      var die1 = document.getElementById('qty').value;
      var die2 = document.getElementById('amt').value;
      if (die1 == "")
       die1 = 0;
     if (die2 == "")
       die2 = 0;

     var total =  parseFloat(die2)/parseFloat(die1);

     var res = isNaN(total);
     if(res == true)
     {
      document.getElementById('ppl').value = 0;
      document.getElementById('pplh').value = 0;

    }
    else
    {
      document.getElementById('ppl').value=total;
      document.getElementById('pplh').value=total;
    }
  }}
</script>
<script>
  function diecal2()
  {
    if((event.keyCode||event.which) != 9)
    {


      var die1 = document.getElementById('upd_qty').value;
      var die2 = document.getElementById('upd_amt').value;
      if (die1 == "")
       die1 = 0;
     if (die2 == "")
       die2 = 0;

     var total =  parseFloat(die2)/parseFloat(die1);

     var res = isNaN(total);
     if(res == true)
     {
      document.getElementById('upd_ppl').value = 0;

    }
    else
    {
      document.getElementById('upd_ppl').value=total;

    }
  }}
</script>
 <script>
$(function() {
    $( "#idTourDateDetails" ).datepicker();
});
</script>
<!--   <script>  
 $('#idTourDateDetails').datepicker({
     dateFormat: 'dd-mm-yy',
     minDate: '+5d',
     changeMonth: true,
     changeYear: true,
 });

// Since confModal is essentially a nested modal it's enforceFocus method
// must be no-op'd or the following error results 
// "Uncaught RangeError: Maximum call stack size exceeded"
// But then when the nested modal is hidden we reset modal.enforceFocus
var enforceModalFocusFn = $.fn.modal.Constructor.prototype.enforceFocus;

$.fn.modal.Constructor.prototype.enforceFocus = function() {};

$confModal.on('hidden', function() {
    $.fn.modal.Constructor.prototype.enforceFocus = enforceModalFocusFn;
});

$confModal.modal({ backdrop : false });
        </script>  -->

        