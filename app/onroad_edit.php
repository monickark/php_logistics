<?php include('../include/dbConnect.php'); ?>
<?php include('../include/adminheader.php'); ?>
<?php include('../include/header.php'); ?>
<?php include('../include/leftmenu.php'); 
require('../include/basefunctions.php');
?>


<?php 

$id=$_REQUEST["id"];
$trip=$_REQUEST["trip"];
/*
echo '<script>alert("'.$trip.'");</script>';
echo '<script>alert("'.$id.'");</script>';*/


$query2 = mysqli_query($conn,"SELECT * FROM onroad_details WHERE id = '" . $id . "';");
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


<div id="hidden_div4">

 <div class="am-pagebody">
   <div class="card pd-20 form-layout form-layout-4">
     <div class="row row-sm ">
      <div class="col-xl-6">

        <div class="portlet-body">



          <div class="col-md-4">
           <div class="row mg-t-10"> 
             <h6 class="card-body-title">On Road Details</h6>
           </div></div>

<input class="form-control" data-val="true" data-val-length="The field permitno must be a string with a maximum length of 50." data-val-length-max="50"  id="mVechno" maxlength="50" name="mVechno" type="hidden" value="<?php echo $res['vechnum']?>" >

<input class="form-control" data-val="true" data-val-length="The field permitno must be a string with a maximum length of 50." data-val-length-max="50"  id="ret_tripid" maxlength="50" name="ret_tripid" type="hidden" value="<?php echo $trip;?>" >

<input class="form-control" data-val="true" data-val-length="The field permitno must be a string with a maximum length of 50." data-val-length-max="50"  id="ord_id" maxlength="50" name="ord_id" type="hidden" value="<?php echo  $res['id'];?>" >




          <div class="row mg-t-10">
            <label class="col-md-4 form-control-label">From </label>
            <div class="col-sm-8 mg-t-10 mg-sm-b-10">
              <input class="form-control" data-val="true" data-val-length="The field permitno must be a string with a maximum length of 50." data-val-length-max="50"  id="ordfrom" maxlength="50" name="ordfrom" type="text" value="<?php echo $res['from_place']; ?>" disabled>
              <input class="form-control" data-val="true" data-val-length="The field permitno must be a string with a maximum length of 50." data-val-length-max="50"  id="ordfromh" maxlength="50" name="ordfromh" type="hidden" value="<?php echo $res['from_place']; ?>" >
              <span class="field-validation-valid font-red" data-valmsg-for="permitno" data-valmsg-replace="true"></span>
            </div>
          </div> 



          <div class="row mg-t-10">
            <label class="col-md-4 form-control-label">To </label>
            <div class="col-sm-8 mg-t-10 mg-sm-b-10">
              <input class="form-control" data-val="true" data-val-length="The field permitno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="To Place" id="ordto" maxlength="50" name="ordto" type="text" value="<?php echo $res['to_place']; ?>" >








              
              <span class="field-validation-valid font-red" data-valmsg-for="permitno" data-valmsg-replace="true"></span>
            </div>
          </div> 

          <div class="row mg-t-10">
<?php $driver =mysqli_query($conn,"SELECT * FROM drivers where id='".$res['driver']."'");

$driv=mysqli_fetch_array($driver);
?>
            <label class="col-md-4 form-control-label">Driver </label>
            <div class="col-sm-8 mg-t-10 mg-sm-b-10">
              <input class="form-control" data-val="true" data-val-length="The field bodytype must be a string with a maximum length of 100." data-val-length-max="100" placeholder="Current Driver Name" id="orddriver" maxlength="100" name="orddriver" type="text" value="<?php echo $driv['name']; ?>" readonly >

               <input class="form-control" data-val="true" data-val-length="The field bodytype must be a string with a maximum length of 100." data-val-length-max="100" id="orddriverh" maxlength="100" name="orddriverh" type="hidden" value="<?php echo $res['driver']; ?>">


              <span class="field-validation-valid font-red" data-valmsg-for="bodytype" data-valmsg-replace="true"></span>
 <select   name="ordcgename" id="ordcgename" class="form-control"  >
                 <option value="">Change Driver </option>
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
            <label class="col-md-4 form-control-label"> Advance </label>
            <div class="col-sm-8 mg-t-10 mg-sm-b-10">
              <input class="form-control" data-val="true" data-val-length="The field permitno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Advance Amount" id="on_road_adv" maxlength="50" name="on_road_adv" type="text" value="<?php echo $res['amount']; ?>" >
              <span class="field-validation-valid font-red" data-valmsg-for="permitno" data-valmsg-replace="true"></span>
            </div>
          </div> 

 



        </div>
      </div>
    </div>






  </div>

</div>



<div id="dieseldiv">



      <div class="am-pagebody" >

 <div class="card  pd-sm-t-10 pd-sm-b-10 pd-sm-l-0 mg-l-0">

       <div class="row row-sm mg-t-0 pd-sm-l-30 pd-sm-r-30">

          <div class="col-xl-12 col-md-12 mg-l-0 pd-sm-l-0-force pd-sm-r-0-force">

           

            <div class="portlet-body">

       


      <div align="right" style="float: right;">
     <button type="button" name="add" id="add" class="btn btn-info">Add New Entry</button>
    </div>
       <div class="mg-t-10 col-sm-8 pd-sm-l-0 pd-sm-r-0 pd-sm-t-15"> 
             <h6 class="card-body-title">Diesel Entries</h6>
           </div>
           


 <div class="col-sm-12 mg-t-30 pd-sm-l-0 pd-sm-r-0" id="responsecontainer">
                                                  
        <div class="col-sm-10 mg-t-5 mg-sm-b-10">


 <div class="col-xl">
  
</div>
      </div>





                   </div></div></div>



                   <div class="modal fade" id="demoModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
              <input class="form-control datepicker" placeholder="Cash Date" name="hire_friet_adv_cash_date" id="datepicker" type="text" value="<?php echo date('d/m/Y');?>" >
            </div>
        </div>
      </div>



       <div class="row mg-t-10">
        <label class="col-md-4 col-sm-4 form-control-label">Vechicle Number</label>
        <div class="col-sm-8 mg-t-5 mg-sm-b-10">
          <input class="form-control" data-val="true" data-val-length="The field engineno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Driver Name" id="die_vechno" maxlength="50" name="upd_driver" type="text" value="<?php echo $res['vechnum'];?>" disabled>
          <span class="field-validation-valid font-red" data-valmsg-for="engineno" data-valmsg-replace="true"></span>
        </div>
      </div>  

      <div class="row mg-t-10">
        <label class="col-md-4 col-sm-4 form-control-label">Driver</label>
        <div class="col-sm-8 mg-t-5 mg-sm-b-10">
          <input class="form-control" data-val="true" data-val-length="The field engineno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Driver Name" id="die_driver" maxlength="50" name="driver" type="text" value="<?php echo $driv['name'];?>" disabled>
            <input class="form-control" data-val="true" data-val-length="The field engineno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Driver Name" id="die_driver_id" maxlength="50" name="driver" type="hidden" value="<?php echo $res['driver'];?>"">
          <span class="field-validation-valid font-red" data-valmsg-for="engineno" data-valmsg-replace="true"></span>
        </div>
      </div>  
        
      <div class="row mg-t-10">
        <label class="col-md-4 col-sm-4 form-control-label">Vendor</label>
        <div class="col-sm-8 mg-t-5 mg-sm-b-10">
          <input class="form-control" data-val="true" data-val-length="The field engineno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Vendor Name" id="vendor" maxlength="50" name="vendor" type="text" value="">
          <span class="field-validation-valid font-red" data-valmsg-for="engineno" data-valmsg-replace="true"></span>
        </div>
      </div>
<div class="row mg-t-10">
        <label class="col-md-4 col-sm-4 form-control-label">Place</label>
        <div class="col-sm-8 mg-t-5 mg-sm-b-10">
          <input class="form-control" data-val="true" data-val-length="The field engineno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Vendor Location" id="place" maxlength="50" name="place" type="text" value="">
          <span class="field-validation-valid font-red" data-valmsg-for="engineno" data-valmsg-replace="true"></span>
        </div>
      </div>


     


      <div class="row mg-t-10">
        <label class="col-md-4 col-sm-4 form-control-label">Quantity</label>
        <div class="col-sm-3 mg-t-5 mg-sm-b-10">
          <input class="form-control" data-val="true" data-val-length="The field insurancename must be a string with a maximum length of 200." data-val-length-max="200" placeholder="Quantity" id="qty" maxlength="200" name="qty" type="text" value="" onkeyup="diecalDie()">
          <span class="field-validation-valid font-red" data-valmsg-for="insurancename" data-valmsg-replace="true"></span>
        </div>

        <label class="col-md-3 col-sm-3 form-control-label">Price Per Litre</label>
        <div class="col-sm-2 mg-t-5 mg-sm-b-10">
          <input class="form-control" data-val="true" data-val-length="The field permitno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="0" id="ppl" maxlength="50" name="ppl" type="text" value="" disabled>
          <input class="form-control" data-val="true" data-val-length="The field permitno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="0" id="pplh" maxlength="50" name="pplh" type="hidden" value="" >
          <span class="field-validation-valid font-red" data-valmsg-for="permitno" data-valmsg-replace="true"></span>
        </div>
      </div>
      <div class="row mg-t-10">
        <label class="col-md-4 col-sm-4 form-control-label">Amount</label>
        <div class="col-sm-8 mg-t-5 mg-sm-b-10">
          <input class="form-control" data-val="true" data-val-length="The field insurancename must be a string with a maximum length of 200." data-val-length-max="200" placeholder="Diesel Amount" id="amt" maxlength="200" name="amt" type="text" value="" onkeyup="diecalDie()">
          <span class="field-validation-valid font-red" data-valmsg-for="insurancename" data-valmsg-replace="true" ></span>
        </div>
      </div>

 <div class="row mg-t-10">


        <label class="col-md-4 col-sm-4 form-control-label">Pay Type</label>                                                    
        <div class="col-sm-8 mg-t-5 mg-sm-b-10">

          <select class="form-control valid" data-val="true" placeholder="Select bilty paid type" id="billtype" name="billtype" style="padding:0px 6px !important;">
            <option <?php if($insid[0]['billtype']=="To Be Billed") echo 'selected="selected"'; ?> value="Cash">Cash</option>
            <option <?php if($insid[0]['billtype']=="Paid") echo 'selected="selected"'; ?> value="Credit">Credit</option>

            <option <?php if($insid[0]['billtype']=="Paid") echo 'selected="selected"'; ?> value="Driver Cash">Driver Cash</option>
            
          </select>
</div></div>
       
<div class="modal-footer pd-r-0">
<button type="button"  class="btn btn-default" data-dismiss="modal">Close</button>
<button type="button" id="insert" class="btn btn-primary">Save changes</button>
</div>
</div>
</div> </div>
     
</div>
</div>
                    
  </div>


   <div class="modal fade" id="editModel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<!-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> -->

       <div class="col-xl-12 col-lg-12">

          

<input   name="upd_id" id="upd_id" type="hidden"  >
<div class="row mg-t-10">
          <label class="col-md-4 col-sm-4 form-control-label">Date</label>
          <div class="col-sm-8 mg-t-5 mg-sm-b-10 ">
           <div class="input-group">
              <span class="input-group-addon"><i class="icon ion-calendar tx-16 lh-0 op-6"></i></span>
              <input class="form-control datepicker" placeholder="Cash Date" name="datepicker002" id="datepicker002" type="text"  >
            </div>
        </div>
      </div>
      
 <!--      <div class="row mg-t-10">
        <label class="col-md-4 col-sm-4 form-control-label">Driver</label>
        <div class="col-sm-8 mg-t-5 mg-sm-b-10"> -->
          <input class="form-control" data-val="true" data-val-length="The field engineno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Driver Name" id="upd_driver" maxlength="50" name="upd_driver"  type="hidden" disabled>
      <!--     <span class="field-validation-valid font-red" data-valmsg-for="engineno" data-valmsg-replace="true"></span>
        </div>
      </div>   -->
        
      <div class="row mg-t-10">
        <label class="col-md-4 col-sm-4 form-control-label">Vendor</label>
        <div class="col-sm-8 mg-t-5 mg-sm-b-10">
          <input class="form-control" data-val="true" data-val-length="The field engineno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Vendor Name" id="upd_vendor" maxlength="50" name="upd_vendor" type="text" >
          <span class="field-validation-valid font-red" data-valmsg-for="engineno" data-valmsg-replace="true"></span>
        </div>
      </div>
<div class="row mg-t-10">
        <label class="col-md-4 col-sm-4 form-control-label">Place</label>
        <div class="col-sm-8 mg-t-5 mg-sm-b-10">
          <input class="form-control" data-val="true" data-val-length="The field engineno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Vendor Location" id="upd_place" maxlength="50" name="upd_place" type="text">
          <span class="field-validation-valid font-red" data-valmsg-for="engineno" data-valmsg-replace="true"></span>
        </div>
      </div>


     


      <div class="row mg-t-10">
        <label class="col-md-4 col-sm-4 form-control-label">Quantity</label>
        <div class="col-sm-3 mg-t-5 mg-sm-b-10">
          <input class="form-control" data-val="true" data-val-length="The field insurancename must be a string with a maximum length of 200." data-val-length-max="200" placeholder="Quantity" id="upd_qty" maxlength="200" name="upd_qty" type="text"  onkeyup="diecal2()">
          <span class="field-validation-valid font-red" data-valmsg-for="insurancename" data-valmsg-replace="true"></span>
        </div>

        <label class="col-md-3 col-sm-3 form-control-label">Price Per Litre</label>
        <div class="col-sm-2 mg-t-5 mg-sm-b-10">
          <input class="form-control" data-val="true" data-val-length="The field permitno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="0" id="upd_ppl" maxlength="50" name="upd_ppl" type="text" value="" disabled>
          <input class="form-control" data-val="true" data-val-length="The field permitno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="0" id="pplh" maxlength="50" name="pplh" type="hidden" value="" >
          <span class="field-validation-valid font-red" data-valmsg-for="permitno" data-valmsg-replace="true"></span>
        </div>
      </div>
      <div class="row mg-t-10">
        <label class="col-md-4 col-sm-4 form-control-label">Amount</label>
        <div class="col-sm-8 mg-t-5 mg-sm-b-10">
          <input class="form-control" data-val="true" data-val-length="The field insurancename must be a string with a maximum length of 200." data-val-length-max="200" placeholder="Diesel Amount" id="upd_amt" maxlength="200" name="upd_amt" type="text" onkeyup="diecal2()">
          <span class="field-validation-valid font-red" data-valmsg-for="insurancename" data-valmsg-replace="true" ></span>
        </div>
      </div>

 <div class="row mg-t-10">


        <label class="col-md-4 col-sm-4 form-control-label">Pay Type</label>                                                    
        <div class="col-sm-8 mg-t-5 mg-sm-b-10">

          <select class="form-control valid" data-val="true" placeholder="Select bilty paid type" id="upd_billtype" name="upd_billtype" style="padding:0px 6px !important;">
            <option <?php if($insid[0]['billtype']=="To Be Billed") echo 'selected="selected"'; ?> value="Cash">Cash</option>
            <option <?php if($insid[0]['billtype']=="Paid") echo 'selected="selected"'; ?> value="Credit">Credit</option>

            <option <?php if($insid[0]['billtype']=="Paid") echo 'selected="selected"'; ?> value="Driver Cash">Driver Cash</option>
            
          </select>
</div></div>
       
<div class="modal-footer pd-r-0">
<button type="button"  class="btn btn-default" data-dismiss="modal">Close</button>
<button type="button" id="update" class="btn btn-primary">Save changes</button>
</div>
</div></div></div>
</div> </div></div>
</div></div>

                       






 
 



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
      /*alert(data);*/
      fetch_data();
      $('#editModel').modal('hide');

   $('#upd_vendor').val("");
   $('#upd_place').val("");
   $('#upd_qty').val("");
   $('#upd_ppl').val("");
   $('#upd_amt').val("");
   $('#upd_billtype').val("");




       }
    });

  });
</script>




<!-- <script>
  document.addEventListener("DOMContentLoaded", function() {
/*fetch_data();*/

});
</script> -->
<!-- <script>

/*  Table View*/
  $('#mVechno').change(function(){
 fetch_data();
  });
</script> -->






<script>

  $(document).on('click', '#insert', function(){



   var dat = $('#datepicker').val();
   var vno = $('#mVechno').val();
   var tid = $('#ret_tripid').val();

   var dri = $('#die_driver_id').val();

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
     /* alert(data);*/
      fetch_data();

 $('#vendor').val("");
 $('#place').val("");
 $('#qty').val("");
 $('#ppl').val("");
 $('#amt').val("");
 $('#billtype').val("");

$('#demoModal').modal('hide');


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
     



<!-- <script>
   function getdetails(val) {
    $.ajax({
      type: "POST",
      type: "POST",
      url: "get_details.php",
      data:'vech_id='+val,
      dataType: "json",
      success: function(data){
        
        if(data.trip == null)
        {
        $("#driver").val('Not Assigned');
        $("#tripid").val('Not On Trip');
        } 
        else{
          $("#driver").val(data.driver);
        $("#tripid").val(data.trip);
        $("#vno").val(val);
        
        }

         /*$("#hltplace").val(data.from);
          */
        }
      });
  }
</script> -->
<script>
  function diecalDie()
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



<div class="form-layout-footer" id="submitdiv" style="padding-top:  0;     padding: 18px 30px 28px;" >
 
                         <div class="form-layout-footer">
                <button type="submit" value="submit" name="submit" class="btn btn-info mg-r-5" onclick="updates();">Update</button>
                <!-- <input type="hidden" name="action" value="<?php if($_REQUEST['flag'] =='Edit') echo $_REQUEST['flag']; else echo 'Add'; ?>"> -->
                <button class="btn btn-secondary">Cancel</button>
              </div>
</div>




<?php include('../include/adminfooter.php'); ?> 
      <script src="//netsh.pp.ua/upwork-demo/1/js/typeahead.js"></script>

      <script>
  document.addEventListener("DOMContentLoaded", function() {
fetch_data();

});
</script>
   <script>   
  function fetch_data()
  {

    var vech_no =document.getElementById('mVechno').value;
    var trip_no = document.getElementById('ret_tripid').value;



/*    var stat = document.getElementById('mainstatus').value;*/
/* if(stat=="Load")
 {

var trip=document.getElementById('ID_UNIQUE').value;
trip_no=trip;
 }*/
/*alert(vech_no);
alert(trip_no);*/



    $.ajax({    //create an ajax request to display.php
        type: "POST",
        url: "fuelfetch.php",

        data:{ vechno:vech_no, tripid:trip_no},           
        dataType: "html",   //expect html to be returned                
        success:function(response){ 
            /*      alert(response);*/
            $("#responsecontainer_halt").html(response); 
            $("#responsecontainer_return").html(response); 
            $("#responsecontainer_load").html(response);
            $("#responsecontainer_returne").html(response);  
            $("#responsecontainer").html(response); 
            //alert(response);
        }

    });
  }
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







   <script >
function editfuel(variable)
{
/*  alert(variable);*/

  var stat= "OnRoad";
/*alert(stat);*/
$.ajax({
      type: "POST",
      url: "fuelfetch.php",
      data:'fuel_id='+variable,
       dataType: "json",
      success: function(data){
      if(stat=="Halt")
{
$("#halt_upd_id").val(data.id);     
$("#datepicker002").val(data.date);
$("#halt_upd_driver").val(data.driver);
$("#halt_upd_vendor").val(data.vendor);
$("#halt_upd_place").val(data.place);
$("#halt_upd_qty").val(data.qty);
$("#halt_upd_amt").val(data.amount);
$("#halt_upd_ppl").val(data.ppl);
$("#halt_upd_billtype").val(data.paytype);
$('#halt_editModel').modal('show');
 }      
else if(stat=="Returnemp")

{

$("#returne_upd_id").val(data.id);     
$("#datepicker002").val(data.date);
$("#returne_upd_driver").val(data.driver);
$("#returne_upd_vendor").val(data.vendor);
$("#returne_upd_place").val(data.place);
$("#returne_upd_qty").val(data.qty);
$("#returne_upd_amt").val(data.amount);
$("#returne_upd_ppl").val(data.ppl);
$("#returne_upd_billtype").val(data.paytype);
$('#returne_editModel').modal('show');


}

else if(stat=="OnRoad")
{

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
else if(stat=="Return")
{

  $("#return_upd_id").val(data.id);     
$("#datepicker002").val(data.date);
$("#return_upd_driver").val(data.driver);
$("#return_upd_vendor").val(data.vendor);
$("#return_upd_place").val(data.place);
$("#return_upd_qty").val(data.qty);
$("#return_upd_amt").val(data.amount);
$("#return_upd_ppl").val(data.ppl);
$("#return_upd_billtype").val(data.paytype);
$('#return_editModel').modal('show');
}
else if(stat=="Load")
{

$("#load_upd_id").val(data.id);     
$("#datepicker002").val(data.date);
$("#load_upd_driver").val(data.driver);
$("#load_upd_vendor").val(data.vendor);
$("#load_upd_place").val(data.place);
$("#load_upd_qty").val(data.qty);
$("#load_upd_amt").val(data.amount);
$("#load_upd_ppl").val(data.ppl);
$("#load_upd_billtype").val(data.paytype);
$('#load_editModel').modal('show');


}

        }
      });
}
</script>

<script>

function updates()
{
alert("Open");

var hid= $("#ord_id").val();     
/*alert(hid);*/
var to=$("#ordto").val();     
var dri = $("#ordcgename").val();
if(dri!="")
{
var dri = $("#ordcgename").val();
}else
{
var dri = $("#orddriverh").val();
}
var adv = $("#on_road_adv").val();

var tpe="onRoadupd";
/*
alert(to);
alert(dri);
alert(adv);
*/
$.ajax({
     url:"gc_updates.php",
     method:"POST",
     data:{ id:hid, driver:dri, to_place:to, type:tpe, amount:adv},
     success:function(data)
     {
alert(data);

window.location.href = "viewgc.php";

       }
    });
  }
  </script>

