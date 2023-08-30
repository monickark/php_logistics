<?php include('../include/dbConnect.php'); ?>
<?php include('../include/checklogin.php'); ?>
<?php include('../include/adminheader.php'); ?>
<?php include('../include/header.php'); ?>
<?php include('../include/leftmenu.php');  
      require('../include/basefunctions.php');
?>
    <div class="am-mainpanel">
      <div class="am-pagetitle">
        <h5 class="am-title">Fuel Report</h5>
        <!-- search-bar -->
     </div>
      <!-- am-pagetitle -->
        <form id="searchBar" class="search-bar"  method="POST" action="">
      <div class="am-pagebody">
 <div class="card pd-20 pd-sm-20 form-layout form-layout-4">
       <div class="row row-sm mg-t-0">
          <div class="col-xl-12">
           <div class="portlet-body">
            <h6 class="card-body-title">Fuel </h6>
              <div class="row mg-t-10" >
        <label class="col-md-4 col-sm-4 form-control-label">Vehicle Number</label>
            <div class="col-sm-2 mg-t-10 mg-sm-t-0">                                                          
<select onChange="fetch_data()"  name="cusCity" id="cusCity" class="form-control" >
<option value="">Select </option>
<option value="all">All Vehicle </option>
<?php $query =mysqli_query($conn,"SELECT * FROM vehicles ");
while($row=mysqli_fetch_array($query))
{ ?>
  <!-- Vehicle Number  Dropdown -->
<option value="<?php echo $row['vechNo'];?>" ><?php echo $row['vechNo'];?></option>
<?php
}
?>
</select>
<!--  <input class="form-control" data-val="true" placeholder="Enter Driver Name" id="cusCity" maxlength="50" name="cusCity" type="text" value="<?php echo $insid[0]['area']; ?>"> -->
<!--  <input class="form-control" data-val="true" placeholder="Enter Driver Name" id="cusCityh" maxlength="50" name="cusCity" type="hidden" value=""> -->
     <span class="field-validation-valid font-red" data-valmsg-for="cityid" data-valmsg-replace="true"></span>                                                           
                                                            </div>
                                                        </div>
           <div class="" style="padding-left:200px" id="hhdriverli">
         </div>
<script>
function fetch_data(){
var name=$("#cusCity").val();
var name_name=$("#agency_name").val();
var pay=$("#pay_type").val();
var from_form=$("#datepicker").val();
var from = from_form.split("/").reverse().join("/");
var to_form=$("#datepicker2").val();
var to = to_form.split("/").reverse().join("/");
var act="Fetch";
/*alert(from);
alert(name);
alert(to);
alert(name_name);
alert(pay);*/
$.ajax({
     url:"fetch_mil.php",
     method:"POST",
     dataType: "html",
     data:{action:act, num:name, fdate:from, tdate:to , agent:name_name , payment:pay},
     success:function(data)
     {
      /*alert(data);*/
      $("#responsecontainer").html(data); 
             }
    });
}
</script>
<div class="row mg-t-10">
              <label class="col-md-4 col-sm-4 form-control-label"> From </label>
              <div class="col-sm-2 mg-t-5 mg-sm-t-0">
              <input class="form-control datepicker" placeholder="Cash Date" name="hire_friet_adv_cash_date" id="datepicker" type="text" value="<?php echo date('d/m/Y');?>" data-date-format="dd/mm/yyyy" onchange="fetch_data()">
                <span class="field-validation-valid font-red" data-valmsg-for="policyno" data-valmsg-replace="true"></span>
              </div>
            </div> 
<div class="row mg-t-10">
   <label class="col-md-4 col-sm-4 form-control-label"> To </label>
              <div class="col-sm-2 mg-t-10 mg-sm-t-0">
               <input class="form-control datepicker" placeholder="Cash Date" name="hire_friet_adv_cash_date" id="datepicker2" type="text" value="<?php echo date('d/m/Y');?>" data-date-format="dd/mm/yyyy"  onchange="fetch_data()">
                <span class="field-validation-valid font-red" data-valmsg-for="policyno" data-valmsg-replace="true"></span>
              </div>
     </div> 
<div class="row mg-t-10" >
        <label class="col-md-4 col-sm-4 form-control-label">Agency Name</label>
            <div class="col-sm-2 mg-t-10 mg-sm-t-0">                                                          
<select onChange="fetch_data()" name="agency_name" id="agency_name" class="form-control" >
<option value="all">All </option>
<?php $query1 =mysqli_query($conn,"SELECT * FROM ledger where nature= 'Diesel Station'");
while($row1=mysqli_fetch_array($query1))
{ ?>
  <!-- Vehicle Number  Dropdown -->
<option value="<?php echo $row1['name'];?>" ><?php echo $row1['name'];?></option>
<?php
}
?>
</select>
<!--  <input class="form-control" data-val="true" placeholder="Enter Driver Name" id="cusCity" maxlength="50" name="cusCity" type="text" value="<?php echo $insid[0]['area']; ?>"> -->
<!--  <input class="form-control" data-val="true" placeholder="Enter Driver Name" id="cusCityh" maxlength="50" name="cusCity" type="hidden" value=""> -->
                                                         
                                                            </div>
                                                        </div>
                                                        <div class="row mg-t-10" >
        <label class="col-md-4 col-sm-4 form-control-label">Pay Type</label>
            <div class="col-sm-2 mg-t-10 mg-sm-t-0">                                                          
<select onChange="fetch_data()" name="pay_type" id="pay_type" class="form-control" >
<option value="all">All </option>
<option value="Cash">Cash </option>
<option value="Credit">Credit </option>
<option value="Driver Cash">Others</option>
 
</select>
<!--  <input class="form-control" data-val="true" placeholder="Enter Driver Name" id="cusCity" maxlength="50" name="cusCity" type="text" value="<?php echo $insid[0]['area']; ?>"> -->
<!--  <input class="form-control" data-val="true" placeholder="Enter Driver Name" id="cusCityh" maxlength="50" name="cusCity" type="hidden" value=""> -->
    
                                                        </div>
 <div class="row mg-t-10 pd-t-20-force" id="responsecontainer">                                            
        <div class="col-sm-10 mg-t-5 mg-sm-t-0">
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
    <script>
$('.datepicker').datepicker({
    dateFormat: 'dd/mm/yy'
});
</script>