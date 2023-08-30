<?php include('../include/dbConnect.php'); ?>

<?php include('../include/checklogin.php'); ?>

<?php include('../include/adminheader.php'); ?>

<?php include('../include/header.php'); ?>

<?php include('../include/leftmenu.php');  
      require('../include/basefunctions.php');
?>



    <div class="am-mainpanel">

      <div class="am-pagetitle">

        <h5 class="am-title">Customers Report</h5>

      

          

        <!-- search-bar -->

      </div>

      <!-- am-pagetitle -->

        <form id="searchBar" class="search-bar"  method="POST" action="">

      <div class="am-pagebody">

 <div class="card pd-20 pd-sm-20 form-layout form-layout-4">

       <div class="row row-sm mg-t-0">

          <div class="col-xl-12">

           

            <div class="portlet-body">
<div id="hide">
                                          <h6 class="card-body-title">Reports </h6>


                                                        <div class="row mg-t-10" >
                                                            
                                                                <label class="col-md-4 col-sm-4 form-control-label"> Customer Name</label>
                                                                <div class="col-sm-2 mg-t-10 mg-sm-t-0">
                                                                  

<select onChange="fetch_data()"  name="cusCity" id="cusCity" class="form-control" >





<option value="">Select </option>
<?php $query =mysqli_query($conn,"SELECT * FROM customer ");
while($row=mysqli_fetch_array($query))
{ ?>

  <!-- Vehicle Number  Dropdown -->
<option value="<?php echo $row['name'];?>" ><?php echo $row['name'];?></option>
<?php
}
?>
</select>


<!--  <input class="form-control" data-val="true" placeholder="Enter Driver Name" id="cusCity" maxlength="50" name="cusCity" type="text" value="<?php echo $insid[0]['area']; ?>"> -->


<!--  <input class="form-control" data-val="true" placeholder="Enter Driver Name" id="cusCityh" maxlength="50" name="cusCity" type="hidden" value=""> -->
                                                                    <span class="field-validation-valid font-red" data-valmsg-for="cityid" data-valmsg-replace="true"></span>
                                                              
                                                            </div>
                                                        </div>

  <div class="row mg-t-10">
             <label class="col-md-4 form-control-label pd-t-20">From  </label>
             <div class="col-sm-2 mg-t-10 mg-sm-b-10 ">
               <div class="input-group">
                <span class="input-group-addon"><i class="icon ion-calendar tx-16 lh-0 op-6"></i></span>
                <input class="form-control datepicker" placeholder="Entry date" name="mdate" id="myVariable" type="text" value="<?php echo date('d/m/Y'); ?>" onChange="fetch_data()" >
              </div>
            </div>
          </div>
   <div class="row mg-t-10">
             <label class="col-md-4 form-control-label pd-t-20">To  </label>
             <div class="col-sm-2 mg-t-10 mg-sm-b-10 ">
               <div class="input-group">
                <span class="input-group-addon"><i class="icon ion-calendar tx-16 lh-0 op-6"></i></span>
                <input class="form-control datepicker" placeholder="Entry date" name="mdate" id="myVariable2" type="text" value="<?php echo date('d/m/Y'); ?>" onChange="fetch_data()" >
              </div>
            </div>
          </div












                                                           <div class="" style="padding-left:200px" id="hhdriverli">
                                                        </div>








<script>
function fetch_data(){

var name=$("#cusCity").val();


var to_form=$("#myVariable").val();

var date = to_form.split("/").reverse().join("-");

var to=$("#myVariable2").val();

var date2 = to.split("/").reverse().join("-");



var act="Fetch";
/*alert(from);
alert(name);
alert(to);
*/


$.ajax({
     url:"payment_fetch.php",
     method:"POST",
     dataType: "html",
     data:{action:act, num:name,fdate:date,tdate:date2},
     success:function(data)
     {
/*      alert(data);*/
      $("#responsecontainera").html(data); 
      
       }
    });


}


</script>







<!-- 
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
     </div>  -->

</div>
 <div class="row mg-t-10 pd-t-20-force" id="responsecontainera"   style="background-color: #fff;">
                                                  
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

<style type="text/css">


#
.tg  {border-collapse:collapse;border-spacing:0;}
.tg td{font-family:Arial, sans-serif;font-size:12px;padding:2px 2px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:black;}
.tg th{font-family:Arial, sans-serif;font-size:13px;font-weight:normal;padding:2px 2px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:black;}
.tg .tg-pl96{font-weight:bold;font-size:14px;vertical-align:top}
.tg .tg-i7rb{border-color:#343434;vertical-align:top}
.tg .tg-us36{border-color:inherit;vertical-align:top}
.tg .tg-jcgs{font-weight:bold;font-size:14px;background-color:#efefef;border-color:#9b9b9b;vertical-align:top}
</style>

</style>

    <style>
@media print {
 

  #hide,#back,.ion-printer,.am-header-left,.am-header,.am-pagetitle,.am-sideleft,.am-footer{

    display:none;
  }
.card{

    border-bottom: 0px;
}
  #responsecontainera  {
    background:transparent;
   
  }

  #responsecontainera{
   
    left: 0;
    margin-top:-160px;

  }
}
</style>
