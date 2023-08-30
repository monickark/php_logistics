 
<?php include('../include/dbConnect.php'); ?>
<?php include('../include/adminheader.php'); ?>
<?php include('../include/header.php'); ?>

<?php include('../include/leftmenu.php');  
require('../include/basefunctions.php');
?>
<?php
$trip=$_REQUEST["trip"];
/*echo '<script>alert("'.$trip.'");</script>';*/
$id=$_REQUEST["id"];

$query2 = mysqli_query($conn,"SELECT * FROM vechstat WHERE id = '" . $id . "';");
$res=mysqli_fetch_assoc($query2); 


?>

<div class="am-mainpanel">
  <div class="am-pagetitle">
    <h5 class="am-title">GC Entry</h5>


    <!-- search-bar -->
  </div>
  <!-- am-pagetitle -->
  <form name="gcform" id="gcform" class="search-bar"  method="POST" action="">
    <div class="am-pagebody" >



 <div id="hhaltent"> 

 <div class="am-pagebody">
   <div class="card pd-20 form-layout form-layout-4">
     <div class="row row-sm ">
      <div class="col-xl-6">

        <div class="portlet-body">



          <div class="col-md-4">
           <div class="row mg-t-10"> 
             <h6 class="card-body-title">Home Halt Entry</h6>
           </div>
         </div> 


      


        <div class="row mg-t-10">
          <label class="col-md-4 form-control-label"> Halt Place </label>
          <div class="col-sm-8 mg-t-10 mg-sm-b-10">
            <input class="form-control" data-val="true" data-val-length="The field permitno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Enter Halt Place" id="hltplace" maxlength="50" name="home_halt_place" type="text" value="Chennai" >
            <span class="field-validation-valid font-red" data-valmsg-for="permitno" data-valmsg-replace="true"></span>
          </div>
        </div>
         <div class="row mg-t-10">
          <label class="col-md-4 form-control-label"> Driver </label>
          <div class="col-sm-8 mg-t-10 mg-sm-b-10">
            
               <select   name="home_halt_driver" id="hhdriver" class="form-control"  >
                 <option value="">Select </option>
                 <?php $query =mysqli_query($conn,"SELECT * FROM drivers ");
                 while($row=mysqli_fetch_array($query))
                  { ?>
                    <option value="<?php echo $row['id'];?>" ><?php echo $row['name'];?></option>
                    <?php
                  }
                  ?>
                </select>
                <span class="field-validation-valid font-red" data-valmsg-for="permitno" data-valmsg-replace="true"></span>

              </div>

        </div>
         <div class="row mg-t-10">
          <label class="col-md-4 form-control-label"> Driver Advance Chn. </label>
          <div class="col-sm-8 mg-t-10 mg-sm-b-10">
            <input class="form-control" data-val="true" data-val-length="The field permitno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Enter Halt Place" id="home_halt_chn_advance" maxlength="50" name="home_halt_chn_advance" type="text" value="" >
            <span class="field-validation-valid font-red" data-valmsg-for="permitno" data-valmsg-replace="true"></span>
          </div>
        </div>
         <div class="row mg-t-10">
          <label class="col-md-4 form-control-label"> Driver Advance MKM </label>
          <div class="col-sm-8 mg-t-10 mg-sm-b-10">
            <input class="form-control" data-val="true" data-val-length="The field permitno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Enter Halt Place" id="home_halt_mkm_advance" maxlength="50" name="home_halt_mkm_advance" type="text" value="" >
            <span class="field-validation-valid font-red" data-valmsg-for="permitno" data-valmsg-replace="true"></span>
          </div>
       </div>

  </div>
</div>
</div>
</div>
</div>
<div id="dieseldiv_home_halt">
     <div class="am-pagebody" >
 <div class="card  pd-sm-t-10 pd-sm-b-10 pd-sm-l-0 mg-l-0">
       <div class="row row-sm mg-t-0 pd-sm-l-30 pd-sm-r-30">
          <div class="col-xl-12 col-md-12 mg-l-0 pd-sm-l-0-force pd-sm-r-0-force">
                    <div class="portlet-body">     
      <div align="right" style="float: right;">
     <button type="button" name="add" id="add_die_hhalt" class="btn btn-info">Add New Entry</button>
    </div>
       <div class="mg-t-10 col-sm-8 pd-sm-l-0 pd-sm-r-0 pd-sm-t-15"> 
             <h6 class="card-body-title">Diesel Entries</h6>
           </div>
            <div class="col-sm-12 mg-t-30 pd-sm-l-0 pd-sm-r-0" id="responsecontainer_hhalt">                                     
        <div class="col-sm-10 mg-t-5 mg-sm-b-10">
 <div class="col-xl">
  </div>
      </div>





                   </div></div></div>



                   <div class="modal fade" id="hhalt_die_add" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<!-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> -->

       <div class="col-xl-12 col-lg-12">

          


<div class="row mg-t-10">
          <label class="col-md-4 col-sm-4 form-control-label">Date</label>
          <div class="col-sm-8 mg-t-5 mg-sm-b-10 ">
           <div class="input-group">
              <span class="input-group-addon"><i class="icon ion-calendar tx-16 lh-0 op-6"></i></span>
              <input class="form-control datepicker" placeholder="Cash Date" name="hire_friet_adv_cash_date" id="datepicker_hhalt" type="text" value="<?php echo date('d/m/Y');?>" >
            </div>
        </div>
      </div>

       <div class="row mg-t-10">
        <label class="col-md-4 col-sm-4 form-control-label">Vechicle Number</label>
        <div class="col-sm-8 mg-t-5 mg-sm-b-10">
          <input class="form-control" data-val="true" data-val-length="The field engineno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Driver Name" id="hhalt_die_vechno" maxlength="50" name="return_driver" type="text"  disabled>
          <span class="field-validation-valid font-red" data-valmsg-for="engineno" data-valmsg-replace="true"></span>
        </div>
      </div>  

      <div class="row mg-t-10">
        <label class="col-md-4 col-sm-4 form-control-label">Driver</label>
        <div class="col-sm-8 mg-t-5 mg-sm-b-10">
          <input class="form-control" data-val="true" data-val-length="The field engineno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Driver Name" id="hhalt_die_driver" maxlength="50" name="driver" type="text" value="" disabled>
             <input class="form-control" data-val="true" data-val-length="The field engineno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Driver Name" id="hhalt_die_driver_id" maxlength="50" name="return_die_driver_id" type="hidden">
          <span class="field-validation-valid font-red" data-valmsg-for="engineno" data-valmsg-replace="true"></span>
        </div>
      </div>  
        
        <div class="row mg-t-10">
        <label class="col-md-4 col-sm-4 form-control-label">Vendor</label>
        <div class="col-sm-8 mg-t-5 mg-sm-b-10">
<!--           <input class="form-control" data-val="true" data-val-length="The field engineno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Vendor Location" id="return_die_place" maxlength="50" name="place" type="text" value=""> -->
        
<?php
$vendor=mysqli_query($conn,"SELECT * from ledger WHERE nature='Diesel Station'; "); 

?>
<select class="form-control" data-val="true" placeholder="Vendor Name" id="hhalt_die_vendor" name="vendor" >
<?php

while($vend = mysqli_fetch_array($vendor))
{
?>
<option  value="<?php echo $vend['name']; ?>"><?php echo $vend['name']; ?></option>

<?php
}

?>
</select>


          <span class="field-validation-valid font-red" data-valmsg-for="engineno" data-valmsg-replace="true"></span>
        </div>
      </div>
      <div class="row mg-t-10">
        <label class="col-md-4 col-sm-4 form-control-label">Place</label>
        <div class="col-sm-8 mg-t-5 mg-sm-b-10">
          <input class="form-control" data-val="true" data-val-length="The field engineno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Location Name" id="hhalt_die_place" maxlength="50" name="vendor" type="text" value="">
          <span class="field-validation-valid font-red" data-valmsg-for="engineno" data-valmsg-replace="true"></span>
        </div>
      </div>



     


      <div class="row mg-t-10">
        <label class="col-md-4 col-sm-4 form-control-label">Quantity</label>
        <div class="col-sm-3 mg-t-5 mg-sm-b-10">
          <input class="form-control" data-val="true" data-val-length="The field insurancename must be a string with a maximum length of 200." data-val-length-max="200" placeholder="Quantity" id="hhalt_die_qty" maxlength="200" name="qty" type="text" value="" onkeyup="diecalhhalt()">
          <span class="field-validation-valid font-red" data-valmsg-for="insurancename" data-valmsg-replace="true"></span>
        </div>

        <label class="col-md-3 col-sm-3 form-control-label">Price Per Litre</label>
        <div class="col-sm-2 mg-t-5 mg-sm-b-10">
          <input class="form-control" data-val="true" data-val-length="The field permitno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="0" id="hhalt_die_ppl" maxlength="50" name="ppl" type="text" value="" disabled>
          <span class="field-validation-valid font-red" data-valmsg-for="permitno" data-valmsg-replace="true"></span>
        </div>
      </div>
      <div class="row mg-t-10">
        <label class="col-md-4 col-sm-4 form-control-label">Amount</label>
        <div class="col-sm-8 mg-t-5 mg-sm-b-10">
          <input class="form-control" data-val="true" data-val-length="The field insurancename must be a string with a maximum length of 200." data-val-length-max="200" placeholder="Diesel Amount" id="hhalt_die_amt" maxlength="200" name="amt" type="text" value="" onkeyup="diecalhhalt()">
          <span class="field-validation-valid font-red" data-valmsg-for="insurancename" data-valmsg-replace="true" ></span>
        </div>
      </div>

 <div class="row mg-t-10">


        <label class="col-md-4 col-sm-4 form-control-label">Pay Type</label>                                                    
        <div class="col-sm-8 mg-t-5 mg-sm-b-10">

          <select class="form-control valid" data-val="true" placeholder="Select bilty paid type" id="hhalt_die_billtype" name="billtype" style="padding:0px 6px !important;">
            <option <?php if($insid[0]['billtype']=="To Be Billed") echo 'selected="selected"'; ?> value="Cash">Cash</option>
            <option <?php if($insid[0]['billtype']=="Paid") echo 'selected="selected"'; ?> value="Credit">Credit</option>

            <option <?php if($insid[0]['billtype']=="Paid") echo 'selected="selected"'; ?> value="Driver Cash">Driver Cash</option>
            
          </select>
</div></div>
       
<div class="modal-footer pd-r-0">
<button type="button"  class="btn btn-default" data-dismiss="modal">Close</button>
<button type="button" id="hhalt_die_insert" class="btn btn-primary">Save changes</button>
</div>
</div>
</div> </div>
     
</div>
</div>
                    
  </div>


   <div class="modal fade" id="hhalt_editModel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<!-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> -->

       <div class="col-xl-12 col-lg-12">

          

<input   name="upd_id" id="hhalt_upd_id" type="hidden"  >
<div class="row mg-t-10">
          <label class="col-md-4 col-sm-4 form-control-label">Date</label>
          <div class="col-sm-8 mg-t-5 mg-sm-b-10 ">
           <div class="input-group">
              <span class="input-group-addon"><i class="icon ion-calendar tx-16 lh-0 op-6"></i></span>
              <input class="form-control datepicker" placeholder="Cash Date" name="datepicker_hhalt_edit" id="datepicker_hhalt_edit" type="text"  >
            </div>
        </div>
      </div> 







      
      
      <div class="row mg-t-10">
   <!--      <label class="col-md-4 col-sm-4 form-control-label">Driver</label> -->
        <div class="col-sm-8 mg-t-5 mg-sm-b-10">
          <input class="form-control" data-val="true" data-val-length="The field engineno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Driver Name" id="hhalt_upd_driver" maxlength="50" name="upd_driver" type="hidden"  disabled>
          <span class="field-validation-valid font-red" data-valmsg-for="engineno" data-valmsg-replace="true"></span>
        </div>
      </div>  
        
      <div class="row mg-t-10">
        <label class="col-md-4 col-sm-4 form-control-label">Vendor</label>
        <div class="col-sm-8 mg-t-5 mg-sm-b-10">
<!--           <input class="form-control" data-val="true" data-val-length="The field engineno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Vendor Name" id="hhalt_upd_vendor" maxlength="50" name="upd_vendor" type="text" > -->



<?php
$vendor=mysqli_query($conn,"SELECT * from ledger WHERE nature='Diesel Station'; "); 

?>
<select class="form-control" data-val="true" placeholder="Vendor Name" id="hhalt_upd_vendor" name="upd_vendor" >
<?php

while($vend = mysqli_fetch_array($vendor))
{
?>
<option  value="<?php echo $vend['name']; ?>"><?php echo $vend['name']; ?></option>

<?php
}

?>
</select>


          <span class="field-validation-valid font-red" data-valmsg-for="engineno" data-valmsg-replace="true"></span>
        </div>
      </div>
<div class="row mg-t-10">
        <label class="col-md-4 col-sm-4 form-control-label">Place</label>
        <div class="col-sm-8 mg-t-5 mg-sm-b-10">
          <input class="form-control" data-val="true" data-val-length="The field engineno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Vendor Location" id="hhalt_upd_place" maxlength="50" name="upd_place" type="text">
          <span class="field-validation-valid font-red" data-valmsg-for="engineno" data-valmsg-replace="true"></span>
        </div>
      </div>


     


      <div class="row mg-t-10">
        <label class="col-md-4 col-sm-4 form-control-label">Quantity</label>
        <div class="col-sm-3 mg-t-5 mg-sm-b-10">
          <input class="form-control" data-val="true" data-val-length="The field insurancename must be a string with a maximum length of 200." data-val-length-max="200" placeholder="Quantity" id="hhalt_upd_qty" maxlength="200" name="upd_qty" type="text"  onkeyup="diecalhhalt2()">
          <span class="field-validation-valid font-red" data-valmsg-for="insurancename" data-valmsg-replace="true"></span>
        </div>

        <label class="col-md-3 col-sm-3 form-control-label">Price Per Litre</label>
        <div class="col-sm-2 mg-t-5 mg-sm-b-10">
          <input class="form-control" data-val="true" data-val-length="The field permitno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="0" id="hhalt_upd_ppl" maxlength="50" name="hhalt_upd_ppl" type="text" value="" disabled>
          <input class="form-control" data-val="true" data-val-length="The field permitno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="0" id="pplh" maxlength="50" name="pplh" type="hidden" value="" >
          <span class="field-validation-valid font-red" data-valmsg-for="permitno" data-valmsg-replace="true"></span>
        </div>
      </div>
      <div class="row mg-t-10">
        <label class="col-md-4 col-sm-4 form-control-label">Amount</label>
        <div class="col-sm-8 mg-t-5 mg-sm-b-10">
          <input class="form-control" data-val="true" data-val-length="The field insurancename must be a string with a maximum length of 200." data-val-length-max="200" placeholder="Diesel Amount" id="hhalt_upd_amt" maxlength="200" name="upd_amt" type="text" onkeyup="diecalhhalt2()">
          <span class="field-validation-valid font-red" data-valmsg-for="insurancename" data-valmsg-replace="true" ></span>
        </div>
      </div>

 <div class="row mg-t-10">


        <label class="col-md-4 col-sm-4 form-control-label">Pay Type</label>                                                    
        <div class="col-sm-8 mg-t-5 mg-sm-b-10">

          <select class="form-control valid" data-val="true" placeholder="Select bilty paid type" id="hhalt_upd_billtype" name="upd_billtype" style="padding:0px 6px !important;">
            <option <?php if($insid[0]['billtype']=="To Be Billed") echo 'selected="selected"'; ?> value="Cash">Cash</option>
            <option <?php if($insid[0]['billtype']=="Paid") echo 'selected="selected"'; ?> value="Credit">Credit</option>

            <option <?php if($insid[0]['billtype']=="Paid") echo 'selected="selected"'; ?> value="Driver Cash">Driver Cash</option>
            
          </select>
</div></div>
       
<div class="modal-footer pd-r-0">
<button type="button"  class="btn btn-default" data-dismiss="modal">Close</button>
<button type="button" id="hhalt_update" class="btn btn-primary">Save changes</button>
</div>
</div></div></div>
</div> </div></div>





 
 




 <script >
$(function () {
$("#add_die_hhalt").click(function(){
$('#hhalt_die_add').modal('show');
var dte=$('#myVariable').val();
$('#datepicker_hhalt').val(dte);


var dri=$('#hhdriver').val();
var dri_nme=$('#hhdriver option:selected').text();
var vechno=$('#mVechno').val();

  $('#hhalt_die_vechno').val(vechno);

  $('#hhalt_die_driver_id').val(dri);
  $('#hhalt_die_driver').val(dri_nme);


});
});
</script>

<script>

  $(document).on('click', '#hhalt_update', function(){
   var dat = $('#datepicker_hhalt_edit').val();
   var fid = $('#hhalt_upd_id').val();
   var dri = $('#hhalt_upd_driver').val();
   var ven = $('#hhalt_upd_vendor').val();
   var pla = $('#hhalt_upd_place').val();
   var qt = $('#hhalt_upd_qty').val();
   var pp = $('#hhalt_upd_ppl').val();
   var at = $('#hhalt_upd_amt').val();
   var bill = $('#hhalt_upd_billtype').val();
   var vech="";

$.ajax({
     url:"fuelins.php",
     method:"POST",
     data:{date:dat, id:fid, vechno:vech, driver:dri, vendor:ven, place:pla, qty:qt, pricepl:pp, amount:at, billpay:bill},
     success:function(data)
     {
    /*  alert(data);*/
      fetch_data();
      $('#hhalt_editModel').modal('hide');

   $('#hhalt_upd_vendor').val("");
   $('#hhalt_upd_place').val("");
   $('#hhalt_upd_qty').val("");
   $('#hhalt_upd_ppl').val("");
   $('#hhalt_upd_amt').val("");
   $('#hhalt_upd_billtype').val("");


       }
    });

  });
</script>




<!-- <script>
  document.addEventListener("DOMContentLoaded", function() {
fetch_data();

});
</script> -->
<!-- <script>

/*  Table View*/
  $('#mVechno').change(function(){
 fetch_data();
  });
</script> -->


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

  $(document).on('click', '#hhalt_die_insert', function(){



   var dat = $('#datepicker_hhalt').val();
   var vno = $('#hhalt_die_vechno').val();
   var tid = "Home Halt";
   var dri = $('#hhalt_die_driver_id').val();
   var ven = $('#hhalt_die_vendor').val();
   var pla = $('#hhalt_die_place').val();
   var qt = $('#hhalt_die_qty').val();
   var pp = $('#hhalt_die_ppl').val();
   var at = $('#hhalt_die_amt').val();
   var bill = $('#hhalt_die_billtype').val();

 if(vno != '')
 {

$.ajax({
     url:"fuelins.php",
     method:"POST",
     data:{date:dat, vechno:vno, tripid:tid, driver:dri, vendor:ven, place:pla, qty:qt, pricepl:pp, amount:at, billpay:bill},
     success:function(data)
     {
      /*alert(data);*/
      fetch_data();
      
   $('#hhalt_die_vendor').val("");
   $('#hhalt_die_place').val("");
   $('#hhalt_die_qty').val("");
   $('#hhalt_die_ppl').val("");
   $('#hhalt_die_amt').val("");
   $('#hhalt_die_billtype').val("");
$('#hhalt_die_add').modal('hide');
     }
    });

 }
 else
 {

alert("Please Select Vehicle Number")

 }

  });
</script>


      </div><!-- am-pagebody -->
     



<script>
  function diecalhhalt()
  {
    if((event.keyCode||event.which) != 9)
    {


      var die1 = document.getElementById('hhalt_die_qty').value;
      var die2 = document.getElementById('hhalt_die_amt').value;
      if (die1 == "")
       die1 = 0;
     if (die2 == "")
       die2 = 0;

     var total =  parseFloat(die2)/parseFloat(die1);

     var res = isNaN(total);
     if(res == true)
     {
      document.getElementById('hhalt_die_ppl').value = 0;


    }
    else
    {
      document.getElementById('hhalt_die_ppl').value=total;

    }
  }}
</script>
<script>
  function diecalhhalt2()
  {
    if((event.keyCode||event.which) != 9)
    {


      var die1 = document.getElementById('hhalt_upd_qty').value;
      var die2 = document.getElementById('hhalt_upd_amt').value;
      if (die1 == "")
       die1 = 0;
     if (die2 == "")
       die2 = 0;

     var total =  parseFloat(die2)/parseFloat(die1);

     var res = isNaN(total);
     if(res == true)
     {
      document.getElementById('hhalt_upd_ppl').value = 0;

    }
    else
    {
      document.getElementById('hhalt_upd_ppl').value=total;

    }
  }}
</script>


</div>




</div>
</div>










</div>