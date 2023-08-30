<?php include('../include/dbConnect.php'); ?>

<?php include('../include/checklogin.php'); ?>

<?php include('../include/adminheader.php'); ?>

<?php include('../include/header.php'); ?>

<?php include('../include/leftmenu.php');  
      require('../include/basefunctions.php');
?>



    <div class="am-mainpanel">

      <div class="am-pagetitle">

        <h5 class="am-title">Search Master</h5>

        <!-- search-bar -->

      </div>

      <!-- am-pagetitle -->

        <form id="searchBar" class="search-bar"  method="POST" action="">

      <div class="am-pagebody">

 <div class="card pd-20 pd-sm-20 mg-t-20 form-layout form-layout-4">

       <div class="row row-sm mg-t-10">

          <div class="col-xl-12">

           

            <div class="portlet-body">
           









<div class='toppor'>
                                          <h6 class="card-body-title">Driver Details</h6>


                                                        <div class="row mg-t-20" >
                                                            
                                                                <label class="col-md-2 col-sm-2 form-control-label">Driver:</label>
                                                                <div class="col-sm-8 col-md-2  col-xs-12 mg-t-10 mg-sm-t-0">
                                                                  




 <input  autocomplete="off" class="form-control" data-val="true" placeholder="Enter Driver Name" id="cusCity" maxlength="50" name="cusCity" type="text" value="<?php echo $insid[0]['area']; ?>">


 <input class="form-control" data-val="true" placeholder="Enter Driver Name" id="cusCityh" maxlength="50" name="cusCity" type="hidden" value="">
                                                                    <span class="field-validation-valid font-red" data-valmsg-for="cityid" data-valmsg-replace="true"></span>
                                                              <div class="col-xl-12 col-sm-12 pd-t-0-force pd-l-0-force pd-r-0-force" id="hhdriverli">
                                                        </div> 
                                                            </div>
                                                        </div>



                                                           

    <script>

  function selectCountry(val) {
var value = $("#country-list").text();
$("#cusCity").val(value);
$("#cusCityh").val(val);
$("#hhdriverli").hide();
$("#driname").html(value); 


fetch_data();

}
  </script>


<script>
function fetch_data(){

var name=$("#cusCityh").val();

var from_form=$("#datepicker").val();
var from = from_form.split("/").reverse().join("/");


var to_form=$("#datepicker2").val();
var to = to_form.split("/").reverse().join("/");

var act="Fetch";
/*alert(from);
alert(name);
alert(to);
*/


$.ajax({
     url:"driversuggest.php",
     method:"POST",
     dataType: "html",
     data:{action:act, dri:name, fdate:from, tdate:to},
     success:function(data)
     {
      // alert(data);


      $("#responsecontainer").html(data); 
      
       }


    });
$("#fromdate").html(from); 
$("#todate").html(to); 


}


</script>


<!-- <script>
  function print()
  {
  var prtContent = document.getElementById("datatable1");
var WinPrint = window.open('', '', 'left=0,top=0,width=800,height=900,toolbar=0,scrollbars=0,status=0');
WinPrint.document.write(prtContent.innerHTML);
WinPrint.document.close();
WinPrint.focus();
WinPrint.print();
WinPrint.close();
}
</script>
 -->







   <script>
     $(document).ready(function(){
     
  $("#cusCity").keyup(function(){


    $.ajax({
    type: "POST",
    url: "driversuggest.php",
    data:'keyword='+$(this).val(),
    beforeSend: function(){
      $("#cusCity").css("background","#FFF url(LoaderIcon.gif) no-repeat 300px");
    },
    success: function(data){
      $("#hhdriverli").show();
      $("#hhdriverli").html(data);
      $("#cusCity").css("background","#FFF");
    }
    });
  });
});

  </script>
                                                     



<div class="row mg-t-20">
              <label class="col-md-2 col-sm-2 form-control-label"> From :</label>
              <div class="col-sm-8 col-md-2  col-xs-12 mg-t-10 mg-sm-t-0">

              <input class="form-control datepicker" placeholder="Cash Date" name="hire_friet_adv_cash_date" id="datepicker" type="text" value="<?php echo date('d/m/Y');?>" data-date-format="dd/mm/yyyy" onchange="fetch_data()">
                <span class="field-validation-valid font-red" data-valmsg-for="policyno" data-valmsg-replace="true"></span>
              </div>


           
            </div> 



<div class="row mg-t-20">

   <label class="col-md-2 col-sm-2 form-control-label"> To :</label>
              <div class="col-sm-8 col-md-2  col-xs-12 mg-t-10 mg-sm-t-0">
               <input class="form-control datepicker" placeholder="Cash Date" name="hire_friet_adv_cash_date" id="datepicker2" type="text" value="<?php echo date('d/m/Y');?>" data-date-format="dd/mm/yyyy"  onchange="fetch_data()">
                <span class="field-validation-valid font-red" data-valmsg-for="policyno" data-valmsg-replace="true"></span>
              </div>
     </div> 
     </div>



      <div class='dridet'>
<div class="card pd-20 pd-sm-40 mg-t-25">
         <h6 class="card-body-title">Driver Details</h6>
         
         <dl class="row">
           <dt class="col-sm-3 tx-inverse">Name</dt>
           <dd class="col-sm-9">: <span id="driname"></span></dd>

           <dt class="col-sm-3 tx-inverse">From</dt>
           <dd class="col-sm-9">: <span id="fromdate"></span></dd>
         
             <dt class="col-sm-3 tx-inverse">To</dt>
           <dd class="col-sm-9">: <span id="todate"></span></dd>

          
         

         </dl>
       </div>
     </div>
<style>
.dridet{
  display: none;
}

</style>
 <div class="row mg-t-10 pd-t-20-force pd-b-20-force" id="responsecontainer">
                                                  
        <div class="row mg-t-10 pd-t-20-force pd-b-20-force">


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

<style>
@media print {
    .ion-printer,.dropdown.dropdown-profile,.toppor,.am-pagetitle,.am-header,.am-sideleft {
      display: none;
      
    }

    title {
      display: none;
    }
.dridet{
  display: block;
}


}


@page 
    {
        size:  auto;   /* auto is the initial value */
        margin: 0mm;  /* this affects the margin in the printer settings */
        margin-top: -200px;

    }

</style>


