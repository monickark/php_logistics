<?php include('../include/dbConnect.php'); ?>

<?php include('../include/checklogin.php'); ?>

<?php include('../include/adminheader.php'); ?>

<?php include('../include/header.php'); ?>

<?php include('../include/leftmenu.php');  
      require('../include/basefunctions.php');
?>



    <div class="am-mainpanel">

      <div class="am-pagetitle">

        <h5 class="am-title">Amount Paid Report</h5>

      

          

        <!-- search-bar -->

      </div>

      <!-- am-pagetitle -->

        <form id="searchBar" class="search-bar"  method="POST" action="">

      <div class="am-pagebody">

 <div class="card pd-20 pd-sm-20 form-layout form-layout-4">

       <div class="row row-sm mg-t-0">

          <div class="col-xl-12">

           

            <div class="portlet-body">

                                          <h6 class="card-body-title">Amount Paid </h6>


                                    


<script>
function fetch_data(){


var from_form=$("#datepicker").val();
var from = from_form.split("/").reverse().join("/");


var to_form=$("#datepicker2").val();
var to = to_form.split("/").reverse().join("/");
var act="outward";
var trans=$("#transporter").val();

/*alert(from);
alert(name);
alert(to);
*/


$.ajax({
     url:"payment_fetch.php",
     method:"POST",
     dataType: "html",
     data:{action:act, fdate:from, tdate:to,trns:trans},
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


<div class="row mg-t-10">

   <label class="col-md-4 col-sm-4 form-control-label"> Transporter </label>
              <div class="col-sm-2 mg-t-10 mg-sm-t-0">



               <select class="form-control datepicker"  name="transporter" id="transporter"  value="" data-date-format="dd/mm/yyyy"  onchange="fetch_data()">
                 <option value="All">All Transporter </option>
<?php

$query = mysqli_query($conn,"SELECT * from transporters ");
while($res   = mysqli_fetch_array($query))
{
?>
 <option value="<?php echo $res['name'];?>" ><?php echo $res['name'];?></option>
<?php
}
?>

               </select>

                <span class="field-validation-valid font-red" data-valmsg-for="policyno" data-valmsg-replace="true"></span>
              </div>
     </div> 







                                  </div>




                                    </div>

           <div class="row mg-t-10 pd-t-20-force" id="responsecontainer">
                                                  
        <div class="col-sm-10 mg-t-5 mg-sm-t-0">


 <div class="col-xl">
  
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