


<?php include('../include/dbConnect.php'); ?>

<?php include('../include/checklogin.php'); ?>

<?php include('../include/adminheader.php'); ?>

<?php include('../include/header.php'); ?>

<?php include('../include/leftmenu.php');  
      require('../include/basefunctions.php');
?>





    <div class="am-mainpanel">

      <div class="am-pagetitle">

        <h5 class="am-title">Hire Report</h5>

        <!-- search-bar -->

      </div>

      <!-- am-pagetitle -->

        <form id="searchBar" class="search-bar"  method="POST" action="">

      <div class="am-pagebody">

 <div class="card pd-20 pd-sm-20 mg-t-20 form-layout form-layout-4">

       <div class="row row-sm mg-t-0">

          <div class="col-xl-12">

           

            <div class="portlet-body">












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
              <input class="form-control" placeholder="Cash Date" name="hire_friet_adv_cash_date" id="idTourDateDetails" data-format="dd/MM/yyyy" type="text" value="<?php echo date('d/m/Y');?>" >
            </div>
        </div>
      </div>


      <div class="row mg-t-10">
        <label class="col-md-2 form-control-label">Transporter:</label>
        <div class="col-sm-10 mg-t-5 mg-sm-t-0">
          <select name="cusCity" id="transporter_name" class="form-control" >
          <option value="">Select </option>
<?php $query =mysqli_query($conn,"SELECT * FROM transporters ");
while($row=mysqli_fetch_array($query))
{ ?>

  <!-- Vehicle Number  Dropdown -->
<option value="<?php echo $row['name'];?>" ><?php echo $row['name'];?></option>
<?php
}
?>
</select>
          <span class="field-validation-valid font-red" data-valmsg-for="engineno" data-valmsg-replace="true"></span>
        </div>
      </div>
<div class="row mg-t-10">
        <label class="col-md-2 form-control-label">Amount:</label>
        <div class="col-sm-10 mg-t-5 mg-sm-t-0">
          <input class="form-control" data-val="true" data-val-length="The field engineno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Amount" id="pay_amount" maxlength="50" name="pay_amount" type="text" value="" required>
          <span class="field-validation-valid font-red" data-valmsg-for="engineno" data-valmsg-replace="true"></span>
        </div>
      </div>
<div class="row mg-t-10">
        <label class="col-md-2 form-control-label">Payment Type:</label>
        <div class="col-sm-10 mg-t-5 mg-sm-t-0">
             <select class="form-control valid" data-val="true" placeholder="Select bilty paid type" id="billtype" name="billtype" style="padding:0px 6px !important;">
            <option  value="Cash">Cash</option>
            <option  value="Cheque">Cheque</option>
            <option value="DD">DD</option>
            <option value="NEFT">NEFT</option>
            <option value="RTGS">RTGS</option>
            
          </select>
          <span class="field-validation-valid font-red" data-valmsg-for="engineno" data-valmsg-replace="true"></span>
        </div>
      </div>
      <div class="row mg-t-10">
        <label class="col-md-2 form-control-label">Remarks:</label>
        <div class="col-sm-10 mg-t-5 mg-sm-t-0">
          <input class="form-control" data-val="true" data-val-length="The field engineno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Remarks" id="remark" maxlength="50" name="pay_amount" type="text" value="" >
          <span class="field-validation-valid font-red" data-valmsg-for="engineno" data-valmsg-replace="true"></span>
        </div>
      </div>

     


       
<div class="modal-footer">
<button type="button"  class="btn btn-default" data-dismiss="modal">Close</button>
<button type="button" id="insert" class="btn btn-primary">Save changes</button>
</div>
</div>
</div> </div>
     
</div>
</div>

 <script >
$(function () {
$("#add").click(function(){
$('#demoModal').modal('show');
});
});
</script>



<script>

  $(document).on('click', '#insert', function(){
   var dat = $('#idTourDateDetails').val();
   var transp = $('#transporter_name').val();
   var amount = $('#pay_amount').val();
   var pay_type= $('#billtype').val();
   var remark= $('#remark').val();
   var pay = pay_type+'-'+remark;

   
   var act="Insert";

$.ajax({
     url:"fetch_hire_det.php",
     method:"POST",
     data:{amt:amount, date:dat, action:act, transport:transp,pay_type:pay },
     success:function(data)
     {
     /* alert(data);*/
      fetch_data();
      $('#demoModal').modal('hide');
       }
    });

  });
</script>




                                          <h6 class="card-body-title" style="">Hire Reports</h6>

<div align="right">
     <button type="button" name="add" id="add" class="btn btn-info">Make New Entry</button>
    </div>
                                                        <div class="row mg-t-10" >
                                                            
                                                                <label class="col-md-4 form-control-label">Transporters:</label>
                                                                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                                  

<select onChange="fetch_data()"  name="cusCity" id="cusCity" class="form-control" >





<option value="">Select </option>
<?php $query =mysqli_query($conn,"SELECT * FROM transporters ");
while($row=mysqli_fetch_array($query))
{ ?>

  <!-- Vehicle Number  Dropdown -->
<option value="<?php echo $row['name'];?>" ><?php echo $row['name'];?></option>
<?php
}
?>
</select>

                                                                    <span class="field-validation-valid font-red" data-valmsg-for="cityid" data-valmsg-replace="true"></span>
                                                              
                                                            </div>
                                                        </div>



                                                           <!--<div class="" style="padding-left:200px" id="hhdriverli">
                                                        </div>-->








<script>
function fetch_data(){

var name=$("#cusCity").val();

var act="Fetch";
/*alert(from);

alert(to);
*/


$.ajax({
     url:"fetch_hire_det.php",
     method:"POST",
     dataType: "html",
     data: {action:act, num:name},
     success:function(data)
     {
      /*alert(data);*/
      $("#responsecontainer").html(data); 
      
       }
    });


}


</script>



 <div class="col-sm-12  mg-t-10" id="responsecontainer" style="text-align:  center;background:  #2d3a50;color:  #fff;padding: 5px 15px 5px;float:  left;width:  100%;/* line-height: 16px; */margin: 20px 0px 0px;">
                                                  
        <div class="col-sm-10 mg-t-5 mg-sm-t-0">



<script src="//netsh.pp.ua/upwork-demo/1/js/typeahead.js"></script>
<!--         <script>

  $(document).on('click', '#idTourDateDetails', function(){

$('.datepicker').datepicker({
    dateFormat: 'dd/mm/yy'
});



  });


        </script> -->

        <script>
$(function() {
    $( "#idTourDateDetails" ).datepicker();
});
</script>

 <div class="col-xl">
  
</div>
      </div>





                   </div>



                                  </div>




                                    </div>

          
        </div>
 
</div>
      </div><!-- am-pagebody -->
    </form>
      <?php 
      include('../include/adminfooter.php'); ?> 
    <!-- <script>
$('.datepicker').datepicker({
    dateFormat: 'dd/mm/yy'
});
</script> -->