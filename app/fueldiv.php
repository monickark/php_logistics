



      <div class="am-pagebody">

 <div class="card pd-20 pd-sm-40 form-layout form-layout-4">

       <div class="row row-sm mg-t-20">

          <div class="col-xl-8 col-md-8">

           

            <div class="portlet-body">

       <div class="row mg-t-10">

        <div class="col-sm-8 mg-t-10 mg-sm-t-0"></div></div>


      <div align="right">
     <button type="button" name="add" id="add" class="btn btn-info">Add New Entry</button>
    </div>
       <div class="row mg-t-10"> 
             <h6 class="card-body-title">Diesel Entries</h6>
           </div>
           


 <div class="row mg-t-10" id="responsecontainer">
                                                  
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

       <div class="row row-sm mg-t-20">

          


<div class="row mg-t-10">
          <label class="col-md-2 form-control-label">Date:</label>
          <div class="col-sm-10 mg-t-5 mg-sm-t-0 ">
           <div class="input-group">
              <span class="input-group-addon"><i class="icon ion-calendar tx-16 lh-0 op-6"></i></span>
              <input class="form-control fc-datepicker" placeholder="Cash Date" name="hire_friet_adv_cash_date" id="datepicker" type="text" value="<?php echo date('d/m/Y');?>" >
            </div>
        </div>
      </div>

      <div class="row mg-t-10">
        <label class="col-md-2 form-control-label">Driver:</label>
        <div class="col-sm-10 mg-t-5 mg-sm-t-0">
          <input class="form-control" data-val="true" data-val-length="The field engineno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Driver Name" id="driver" maxlength="50" name="driver" type="text" value="" disabled>
          <span class="field-validation-valid font-red" data-valmsg-for="engineno" data-valmsg-replace="true"></span>
        </div>
      </div>  
        
      <div class="row mg-t-10">
        <label class="col-md-2 form-control-label">Vendor:</label>
        <div class="col-sm-10 mg-t-5 mg-sm-t-0">
          <input class="form-control" data-val="true" data-val-length="The field engineno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Vendor Name" id="vendor" maxlength="50" name="vendor" type="text" value="">
          <span class="field-validation-valid font-red" data-valmsg-for="engineno" data-valmsg-replace="true"></span>
        </div>
      </div>
<div class="row mg-t-10">
        <label class="col-md-2 form-control-label">Place:</label>
        <div class="col-sm-10 mg-t-5 mg-sm-t-0">
          <input class="form-control" data-val="true" data-val-length="The field engineno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Vendor Location" id="place" maxlength="50" name="place" type="text" value="">
          <span class="field-validation-valid font-red" data-valmsg-for="engineno" data-valmsg-replace="true"></span>
        </div>
      </div>


     


      <div class="row mg-t-10">
        <label class="col-md-2 form-control-label">Quantity:</label>
        <div class="col-sm-4 mg-t-5 mg-sm-t-0">
          <input class="form-control" data-val="true" data-val-length="The field insurancename must be a string with a maximum length of 200." data-val-length-max="200" placeholder="Quantity" id="qty" maxlength="200" name="qty" type="text" value="" onkeyup="diecal()">
          <span class="field-validation-valid font-red" data-valmsg-for="insurancename" data-valmsg-replace="true"></span>
        </div>

        <label class="col-md-2 form-control-label">Price Per Litre:</label>
        <div class="col-sm-4 mg-t-5 mg-sm-t-0">
          <input class="form-control" data-val="true" data-val-length="The field permitno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="0" id="ppl" maxlength="50" name="ppl" type="text" value="" disabled>
          <input class="form-control" data-val="true" data-val-length="The field permitno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="0" id="pplh" maxlength="50" name="pplh" type="hidden" value="" >
          <span class="field-validation-valid font-red" data-valmsg-for="permitno" data-valmsg-replace="true"></span>
        </div>
      </div>
      <div class="row mg-t-10">
        <label class="col-md-2 form-control-label">Amount:</label>
        <div class="col-sm-10 mg-t-5 mg-sm-t-0">
          <input class="form-control" data-val="true" data-val-length="The field insurancename must be a string with a maximum length of 200." data-val-length-max="200" placeholder="Diesel Amount" id="amt" maxlength="200" name="amt" type="text" value="" onkeyup="diecal()">
          <span class="field-validation-valid font-red" data-valmsg-for="insurancename" data-valmsg-replace="true" ></span>
        </div>
      </div>

 <div class="row mg-t-10">


        <label class="col-md-2 form-control-label">Pay Type:</label>                                                    
        <div class="col-sm-10 mg-t-5 mg-sm-t-0">

          <select class="form-control valid" data-val="true" placeholder="Select bilty paid type" id="billtype" name="billtype" style="padding:0px 6px !important;">
            <option <?php if($insid[0]['billtype']=="To Be Billed") echo 'selected="selected"'; ?> value="Cash">Cash</option>
            <option <?php if($insid[0]['billtype']=="Paid") echo 'selected="selected"'; ?> value="Credit">Credit</option>

            <option <?php if($insid[0]['billtype']=="Paid") echo 'selected="selected"'; ?> value="Driver Cash">Driver Cash</option>
            
          </select>
</div></div>
       
<div class="modal-footer">
<button type="button"  class="btn btn-default" data-dismiss="modal">Close</button>
<button type="button" id="insert" class="btn btn-primary">Save changes</button>
</div>
</div>
</div> </div>
     
</div>
</div>
                     <div class="portlet-body col-xs-4 col-md-4">
                 <div class="row mg-t-10"> 
             <h6 class="card-body-title">Milage Calculation</h6>
           </div>
          
 <div class="row mg-t-10">
                                                  
        <div class="col-sm-10 mg-t-5 mg-sm-t-0">
<table border='1'>
  <tr>
  <td align=center> <b>Vehicle Number</b></td>
  <td align=center> <b><input type="text" value="" id="vno" disabled></b></td>
  </tr>
<tr>
  <td align=center> <b>Vehicle Old KM</b></td>
  <td align=center> <b><input type="text" id="okm" disabled></b></td>
  </tr>
  <tr>
  <td align=center> <b>Old KM Date</b></td>
  <td align=center> <b><input type="text" id="okmdte" disabled></b></td>
  </tr>
  <tr>
  <td align=center> <b>Fuel Liters</b></td>
  <td align=center> <b><input type="text" id="flts"></b></td>
  </tr>
  <tr>
  <td align=center> <b>New KM</b></td>
  <td align=center> <b><input type="text" id="nkm"></b></td>
  </tr>
  <tr>
  <td align=center> <b>Milage</b></td>
  <td align=center> <b><input type="text" id="mil" disabled></b></td>
  </tr>
</table>

</div></div>
</div>

  </div>


   <div class="modal fade" id="editModel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<!-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> -->

       <div class="row row-sm mg-t-20">

          

<input   name="upd_id" id="upd_id" type="hidden"  >
<div class="row mg-t-10">
          <label class="col-md-2 form-control-label">Date:</label>
          <div class="col-sm-10 mg-t-5 mg-sm-t-0 ">
           <div class="input-group">
              <span class="input-group-addon"><i class="icon ion-calendar tx-16 lh-0 op-6"></i></span>
              <input class="form-control fc-datepicker" placeholder="Cash Date" name="datepicker002" id="datepicker002" type="text"  >
            </div>
        </div>
      </div>

      <div class="row mg-t-10">
        <label class="col-md-2 form-control-label">Driver:</label>
        <div class="col-sm-10 mg-t-5 mg-sm-t-0">
          <input class="form-control" data-val="true" data-val-length="The field engineno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Driver Name" id="upd_driver" maxlength="50" name="upd_driver" type="text"  disabled>
          <span class="field-validation-valid font-red" data-valmsg-for="engineno" data-valmsg-replace="true"></span>
        </div>
      </div>  
        
      <div class="row mg-t-10">
        <label class="col-md-2 form-control-label">Vendor:</label>
        <div class="col-sm-10 mg-t-5 mg-sm-t-0">
          <input class="form-control" data-val="true" data-val-length="The field engineno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Vendor Name" id="upd_vendor" maxlength="50" name="upd_vendor" type="text" >
          <span class="field-validation-valid font-red" data-valmsg-for="engineno" data-valmsg-replace="true"></span>
        </div>
      </div>
<div class="row mg-t-10">
        <label class="col-md-2 form-control-label">Place:</label>
        <div class="col-sm-10 mg-t-5 mg-sm-t-0">
          <input class="form-control" data-val="true" data-val-length="The field engineno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Vendor Location" id="upd_place" maxlength="50" name="upd_place" type="text">
          <span class="field-validation-valid font-red" data-valmsg-for="engineno" data-valmsg-replace="true"></span>
        </div>
      </div>


     


      <div class="row mg-t-10">
        <label class="col-md-2 form-control-label">Quantity:</label>
        <div class="col-sm-4 mg-t-5 mg-sm-t-0">
          <input class="form-control" data-val="true" data-val-length="The field insurancename must be a string with a maximum length of 200." data-val-length-max="200" placeholder="Quantity" id="upd_qty" maxlength="200" name="upd_qty" type="text"  onkeyup="diecal2()">
          <span class="field-validation-valid font-red" data-valmsg-for="insurancename" data-valmsg-replace="true"></span>
        </div>

        <label class="col-md-2 form-control-label">Price Per Litre:</label>
        <div class="col-sm-4 mg-t-5 mg-sm-t-0">
          <input class="form-control" data-val="true" data-val-length="The field permitno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="0" id="upd_ppl" maxlength="50" name="upd_ppl" type="text" value="" disabled>
          <input class="form-control" data-val="true" data-val-length="The field permitno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="0" id="pplh" maxlength="50" name="pplh" type="hidden" value="" >
          <span class="field-validation-valid font-red" data-valmsg-for="permitno" data-valmsg-replace="true"></span>
        </div>
      </div>
      <div class="row mg-t-10">
        <label class="col-md-2 form-control-label">Amount:</label>
        <div class="col-sm-10 mg-t-5 mg-sm-t-0">
          <input class="form-control" data-val="true" data-val-length="The field insurancename must be a string with a maximum length of 200." data-val-length-max="200" placeholder="Diesel Amount" id="upd_amt" maxlength="200" name="upd_amt" type="text" onkeyup="diecal2()">
          <span class="field-validation-valid font-red" data-valmsg-for="insurancename" data-valmsg-replace="true" ></span>
        </div>
      </div>

 <div class="row mg-t-10">


        <label class="col-md-2 form-control-label">Pay Type:</label>                                                    
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
</div></div></div>
</div> </div></div>
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
      alert(data);
      fetch_data();
     }
    });

 }
 else
 {

alert("Please Select Vehicle Number")

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
    $.ajax({    //create an ajax request to display.php
        type: "POST",
        url: "fuelfetch.php",
        data:'vechno='+vech_no,            
        dataType: "html",   //expect html to be returned                
        success: function(response){                    
            $("#responsecontainer").html(response); 
            //alert(response);
        }

    });
  }
</script>



      </div><!-- am-pagebody -->
     
   <script>
  $(function(){

    'use strict';

    $('.select2').select2({
      minimumResultsForSearch: Infinity
    });

        // Select2 by showing the search
        $('.select2-show-search').select2({
          minimumResultsForSearch: ''
        });

        // Select2 with tagging support
        $('.select2-tag').select2({
          tags: true,
          tokenSeparators: [',', ' ']
        });

        // Datepicker
        $('.fc-datepicker').datepicker({
          showOtherMonths: true,
          selectOtherMonths: true
        });

        $('#datepickerNoOfMonths').datepicker({
          showOtherMonths: true,
          selectOtherMonths: true,
          numberOfMonths: 2
        });

        // Color picker
        $('#colorpicker').spectrum({
          color: '#17A2B8'
        });

        $('#showAlpha').spectrum({
          color: 'rgba(23,162,184,0.5)',
          showAlpha: true
        });

        $('#showPaletteOnly').spectrum({
          showPaletteOnly: true,
          showPalette:true,
          color: '#DC3545',
          palette: [
          ['#1D2939', '#fff', '#0866C6','#23BF08', '#F49917'],
          ['#DC3545', '#17A2B8', '#6610F2', '#fa1e81', '#72e7a6']
          ]
        });

      });
    </script>






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
<!-- <script>
 $(function() {
      $('#myVariable').datepicker({dateFormat: 'dd/mm/yy'});
});
</script> -->

<script>
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

