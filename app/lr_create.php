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

 <div class="card pd-20 pd-sm-20 mg-t-20 mg-b-20 form-layout form-layout-4">

       <div class="row row-sm mg-t-0">

          <div class="col-xl-12 col-md-12 ">

           

            <div class="portlet-body">
           









<div class='toppor'>
                                          <h6 class="card-body-title" >Driver Details</h6>


                                                     
              



<div class="row col-md-12 mg-t-10">

   <label class="col-md-2 col-sm-2 form-control-label"> Date </label>
              <div class="col-sm-4 mg-t-10 mg-sm-t-0">
               <input class="form-control datepicker" placeholder="Cash Date" name="hire_friet_adv_cash_date" id="datepicker" type="text" value="<?php echo date('d/m/Y');?>" data-date-format="dd/mm/yyyy"  onchange="fetch_data()">
                <span class="field-validation-valid font-red" data-valmsg-for="policyno" data-valmsg-replace="true"></span>
              </div>
     </div> 
     

<script>
function fetch_data(){
var from_form=$("#datepicker").val();
var to = from_form.split("/").reverse().join("/");

/*var to=$("#datepicker").val();*/


var act="Fetch";
/*alert(from);
alert(name);
alert(to);
*/


$.ajax({
     url:"lr_fetch.php",
     method:"POST",
     dataType: "html",
     data:{action:act,tdate:to},
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






<!-- 
   <script>
     $(document).ready(function(){
     fetch_data();
  
});

  </script>
                     -->                                 







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
 <div class="col-sm-12 mg-t-30 pd-sm-l-0 pd-sm-r-0 pd-t-20-force" id="responsecontainer">
                                                  
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


