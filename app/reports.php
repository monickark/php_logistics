<?php include('../include/dbConnect.php'); ?>

<?php include('../include/checklogin.php'); ?>

<?php include('../include/adminheader.php'); ?>

<?php include('../include/header.php'); ?>

<?php include('../include/leftmenu.php');  
      require('../include/basefunctions.php');
?>
<link href="../lib/datatables/jquery.dataTables.css" rel="stylesheet">
    <link href="../lib/select2/css/select2.min.css" rel="stylesheet">



    <div class="am-mainpanel">

      <div class="am-pagetitle">

        <h5 class="am-title">Report</h5>

        <!-- search-bar -->

      </div>

      <!-- am-pagetitle -->


        <form id="searchBar" class="search-bar"  method="POST" action="">

      <div class="am-pagebody">

 <div class="card pd-20 pd-sm-40 form-layout form-layout-4">

       <div class="row row-sm mg-t-20">

          <div class="col-xl-6">

           

            <div class="portlet-body">

                                          <h6 class="card-body-title">Report Details</h6>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.16.0/jquery.validate.min.js"></script> 
<script>

$(document).ready( function () {
    $( "#searchBar" ).validate( {
    
        rules: {
                            
          vechno: "required",
         district_list: "required"                 
           
          },
        messages: {
          vechno: "Please Select your VehicleNo", 
            district_list: "Please select your type"
            },

        errorElement: "em",
        errorPlacement: function ( error, element ) {
          // Add the `help-block` class to the error element
          error.addClass( "help-block" );

           if ( element.prop( "type" ) === "checkbox" ) {
            error.insertAfter( element.parent( "label" ) );
          } else {
            error.insertAfter( element );
          } 
        }, 
        highlight: function ( element, errorClass, validClass ) {
          $( element ).parents( ".col-sm-8" ).addClass( "has-error" ).removeClass( "has-success" );
        },
        unhighlight: function (element, errorClass, validClass) {
          $( element ).parents( ".col-sm-8" ).addClass( "has-success" ).removeClass( "has-error" );
        }
        
      } );  

  

});


$(window).on('load', function()  {
fetch_data();
});
</script> 
                                                                <div class="row mg-t-10">
                                                            
                                                                <label class="col-md-4 form-control-label">Vehicle Number:</label>
                                                                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                                   

<select   name="vechno" id="vechno" class="form-control" >





<option value="">Select </option>
<?php $query =mysqli_query($conn,"SELECT distinct vechNo FROM vehicles");
while($row=mysqli_fetch_array($query))
{ ?>

  <!-- Vehicle Number  Dropdown -->
<option value="<?php echo $row['vechNo'];?>" <?php if($row['vechNo']==$insid[0]['vnum']) echo 'selected="selected"'; ?> ><?php echo $row['vechNo'];?></option>
<?php
}
?>
</select>
 <span class="field-validation-valid font-red" data-valmsg-for="stateid" data-valmsg-replace="true"></span>
                                                                
                                                            </div>
                                                        </div>
                                                        <div class="row mg-t-10">
                                                            
                                  <label class="col-md-4 form-control-label">Search Type:</label>
                                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                            <select name="search" id="district_list" class="form-control">
                                                                  
                            <option value="0">Select</option>

                         <option value="2">Fc Details</option>
                     <option value="3">Insurance Details</option>
                     <option value="4">Finance Details</option>
                     <option value="5">Tyre Maintenace</option>

                </select>    
   <span class="field-validation-valid font-red" data-valmsg-for="cityid" data-valmsg-replace="true"></span>
                                                              
                                                            </div>
                                                        </div>



                                                         
                                                     <div class="row mg-t-10">
                                                        <label class="col-md-4 form-control-label">Date:</label>
                                                        <div class="col-sm-4 mg-t-10 mg-sm-t-0">
<div class="input-group">
              <span class="input-group-addon"><i class="icon ion-calendar tx-16 lh-0 op-6"></i></span>
              <input class="form-control datepicker" placeholder="DD/MM/YYYY" name="fromdate" id="datepicker" type="text"  >
            </div>
      
                                                            <span class="field-validation-valid font-red" data-valmsg-for="policyvaliditydate" data-valmsg-replace="true"></span>
                                                    </div>
                                               

                                                        
                                                        <div class="col-sm-4 mg-t-10 mg-sm-t-0">
<div class="input-group">
              <span class="input-group-addon"><i class="icon ion-calendar tx-16 lh-0 op-6"></i></span>
              <input class="form-control date" placeholder="DD/MM/YYYY" name="todate" id="todate" type="text" >
            </div>
      
                                                            <span class="field-validation-valid font-red" data-valmsg-for="policyvaliditydate" data-valmsg-replace="true"></span>
                                                   
                                                </div>



                                  </div>



                       <div class="form-layout-footer mg-t-30">
                <button type="submit" value="submit" name="submit" class="btn btn-info mg-r-5">Submit</button>
                <input type="hidden" name="action" value="<?php if($_REQUEST['flag'] =='Edit') echo $_REQUEST['flag']; else echo 'Add'; ?>">
                <button class="btn btn-secondary" id="cancel">Cancel</button>
              </div>


                                    </div>

          
        </div>

 
</div>



      </div><!-- am-pagebody -->
    </form>
     </div>

                       <?php 
if(isset($_POST['search'])){
$search=$_POST['search'];
if($search==2){
$search=$_POST['search'];
$vechname=$_POST['vechname'];
$fromdate=$_POST['fromdate'];
$fromdate=$_POST['fromdate'];
$todate=$_POST['todate'];
$condition = $condition . " and DATE_FORMAT(date_to,'%Y-%m-%d') between '$fromdate' and '$todate'";
 $select_dates= "SELECT * FROM   fc_details WHERE vnum='$vechname' ".$condition." " ;
$run=mysqli_query($conn,$select_dates);?>
<div class="am-pagebody">

 <div class="card pd-20 pd-sm-40 form-layout form-layout-4">

       <div class="row row-sm mg-t-20">


     <div class="col-xl-12">
                
               
               <div class="table-wrapper">
<table id="datatable1" class="table display responsive nowrap">
              <thead>
                <tr>
                  <th class="wd-15p">Sl No</th>
                  <th class="wd-15p">Bill No</th>

                  <th class="wd-15p">vehicle No</th>
                  <th class="wd-15p"> RTO Details </th>
                  <th class="wd-10p">RTO Fess</th>
                  <th class="wd-10p">Next Fc Date</th>                
            
                </tr>
              </thead>
              <tbody>
                <?php

            
    /*  while($get_array=mysqli_fetch_array($run)){
  
echo '<pre>';
print_r($get_array);

}*/

                $i=1;
               
                while ($res = mysqli_fetch_array($run)){ 
                  /*print_r($res);*/
                 $bill_no = $res['bill_no'];
                 $vnum=$res['vnum'];
              
                 $id=$res['id'];  
                 $rto_details=$res['rto_details'];
                 $rto_fees=$res['rto_fees'];
                 $route_to=$res['route_to'];
                 $mis_charge=$res['mis_charge'];
                 $fc_date =$res['fc_date '];
  ?>
                <tr>
                  <td><?php echo $i; ?></td>
                  <td><?php echo $res['bill_no']; ?></td>
                  <td><?php echo $res['vnum']; ?></td>
                  <td><?php echo $res['rto_details']; ?></td>
                  <td><?php echo $res['rto_fees']; ?></td>
                 
                  <td><?php echo $res['fc_date'];?></td>
                  

             
                </tr>
                <?php $i++;} echo '</ pre>';?>
                 
              </tbody>
            </table> 
              </div>
           </div>
            </div> </div>
                       

<?php
}
}
if($search==3){
$search=$_POST['search'];
$vechname=$_POST['vechname'];
$fromdate=$_POST['fromdate'];

$todate=$_POST['todate'];
$condition = $condition . " and DATE_FORMAT(to_duration,'%Y-%m-%d') between '$fromdate' and '$todate'";
 echo $select_insurance= "SELECT * FROM  insurance_details WHERE vnum='$vechname' ".$condition." " ;
$insur_run=mysqli_query($conn,$select_insurance);?>
<div class="am-pagebody">

 <div class="card pd-20 pd-sm-40 form-layout form-layout-4">

       <div class="row row-sm mg-t-20">


     <div class="col-xl-12">
                
               
               <div class="table-wrapper">
<table id="datatable1" class="table display responsive nowrap">
              <thead>
                <tr>
                  <th class="wd-15p">Sl No</th>
                  <th class="wd-15p">Name</th>

                  <th class="wd-15p">vehicle No</th>
                  <th class="wd-15p">From Duration</th>
                  <th class="wd-10p">TO Duration</th>
                  
                   <th class="wd-20p">RTO Location </th>
                                    
            
                </tr>
              </thead>
              <tbody>
                <?php

            
    /*  while($get_array=mysqli_fetch_array($run)){
  
echo '<pre>';
print_r($get_array);

}*/

                $i=1;
               
                while ($insur_res = mysqli_fetch_array($insur_run)){ 
                  /*print_r($res);*/
                
  ?>
                <tr>
                  <td><?php echo $i; ?></td>
                  <td><?php echo $insur_res['name']; ?></td>
                  <td><?php echo $insur_res['vnum']; ?></td>
                  <td><?php echo $insur_res['from_duration']; ?></td>
                  <td><?php echo $insur_res['to_duration']; ?></td>
                 
                  <td><?php echo $insur_res['rto_location'];?></td>
                  

                 
                </tr>
                <?php $i++;} echo '</ pre>';?>
                 
              </tbody>
            </table> 
              </div>
           </div>
            </div> </div>
                       

<?php

}
if($search==4){
$search=$_POST['search'];
$vechname=$_POST['vechname'];
$fromdate=$_POST['fromdate'];

$todate=$_POST['todate'];
$condition = $condition . " and DATE_FORMAT(date,'%Y-%m-%d') between '$fromdate' and '$todate'";
 echo $select_finance= "SELECT * FROM  finance_details WHERE v_num='$vechname' ".$condition." " ;
$finance_run=mysqli_query($conn,$select_finance);?>
<div class="am-pagebody">

 <div class="card pd-20 pd-sm-40 form-layout form-layout-4">

       <div class="row row-sm mg-t-20">


     <div class="col-xl-12">
                
               
               <div class="table-wrapper">
<table id="datatable1" class="table display responsive nowrap">
              <thead>
                <tr>
                  <th class="wd-15p">Sl No</th>
                  <th class="wd-15p">Name</th>

                  <th class="wd-15p">vehicle No</th>
                  <th class="wd-15p">Finance Amount</th>
                  <th class="wd-10p">Date</th>
                  
                   <th class="wd-20p">Balance </th>
                                    
            
                </tr>
              </thead>
              <tbody>
                <?php

            
    /*  while($get_array=mysqli_fetch_array($run)){
  
echo '<pre>';
print_r($get_array);

}*/

                $i=1;
               
                while ($finance_res = mysqli_fetch_array($finance_run)){ 
                  /*print_r($res);*/
                
  ?>
                <tr>
                  <td><?php echo $i; ?></td>
                  <td><?php echo $finance_res['name']; ?></td>
                  <td><?php echo $finance_res['vnum']; ?></td>
                  <td><?php echo $finance_res['finance_amount']; ?></td>
                  <td><?php echo $finance_res['date']; ?></td>
                 
                  <td><?php echo $finance_res['balance'];?></td>
                  

                 
                </tr>
                <?php $i++;} echo '</ pre>';?>
                 
              </tbody>
            </table> 
              </div>
           </div>
            </div> </div>
                       

<?php

}
if($search==5){
$search=$_POST['search'];
$vechname=$_POST['vechname'];
$fromdate=$_POST['fromdate'];

$todate=$_POST['todate'];
$condition = $condition . " and DATE_FORMAT(date_fxing,'%Y-%m-%d') between '$fromdate' and '$todate'";
  $select_tyre= "SELECT * FROM  tyre_maintan WHERE vnum='$vechname' ".$condition." " ;
$tyre_run=mysqli_query($conn,$select_tyre);?>
<div class="am-pagebody">

 <div class="card pd-20 pd-sm-40 form-layout form-layout-4">

       <div class="row row-sm mg-t-20">


     <div class="col-xl-12">
                
               
               <div class="table-wrapper">
<table id="datatable1" class="table display responsive nowrap">
              <thead>
                <tr>
                  <th class="wd-15p">Sl No</th>
                  <th class="wd-15p">Name</th>

                  <th class="wd-15p">vehicle No</th>
                  <th class="wd-15p">Tyre Code</th>
                  <th class="wd-10p">kM fxing</th>
                  <th class="wd-10p">Date fxing</th>
                  
                   <th class="wd-20p">Tyre Type </th>
                                    
            
                </tr>
              </thead>
              <tbody>
                <?php
                $i=1;
               
                while ($tyre_res = mysqli_fetch_array($tyre_run)){              
  ?>
                <tr>
                  <td><?php echo $i; ?></td>
                  <td><?php echo $tyre_res['name']; ?></td>
                  <td><?php echo $tyre_res['vnum']; ?></td>
                  <td><?php echo $tyre_res['tyre_code']; ?></td>
                  <td><?php echo $tyre_res['km_fxing']; ?></td>
                  <td><?php echo $tyre_res['date_fxing']; ?></td>
                 
                  <td><?php echo $tyre_res['tyre_type'];?></td>
                
                </tr>
                <?php $i++;} ;?>
                 
              </tbody>
            </table> 
              </div>
           </div>
            </div> </div>
<?php

}
  ?>   
      
                                    </div> 
     <script src="../lib/jquery/jquery.js"></script>
    <script src="../lib/popper.js/popper.js"></script>
    <script src="../lib/bootstrap/bootstrap.js"></script>
    <script src="../lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js"></script>
     <script src="../lib/jquery-ui/jquery-ui.js"></script>
    <script src="../lib/jquery-toggles/toggles.min.js"></script>
    <script src="../lib/highlightjs/highlight.pack.js"></script>
    <script src="../lib/datatables/jquery.dataTables.js"></script>
    <script src="../lib/datatables-responsive/dataTables.responsive.js"></script>
    <script src="../lib/select2/js/select2.min.js"></script>
     <script src="../lib/spectrum/spectrum.js"></script>

    <script src="../js/amanda.js"></script>
    <script>
      $(function(){
        'use strict';

        $('#datatable1').DataTable({
          responsive: true,
          language: {
            searchPlaceholder: 'Search...',
            sSearch: '',
            lengthMenu: '_MENU_ items/page',
          }
        });

        $('#datatable2').DataTable({
          bLengthChange: false,
          searching: false,
          responsive: true
        });

        // Select2
        $('.dataTables_length select').select2({ minimumResultsForSearch: Infinity });

      });


      $( function() {
    $( ".datepicker" ).datepicker({ dateFormat: 'yy-mm-dd' });

  } );
  $( function() {
    $( ".date" ).datepicker({ dateFormat: 'yy-mm-dd' });

  } );
    $( function() {
    $( ".fcdate" ).datepicker({ dateFormat: 'yy-mm-dd' });

  } );
    </script>
       <script>
$("#cancel").click(function(e) {
/*  alert("maans");*/
if(confirm("Leave Page??"))
{

/*
  $(location).attr("href", "viewtransporter.php");*/
/*  window.location.replace("viewtransporter.php"); */
/*  window.location.href("viewtransporter.php"); */
  window.location.href = "reports.php";
/*  
document.location ("viewtransporter.php");*/
return false;
/*alert("whatt??");*/
}
else
{
    e.preventDefault();
}
});


</script>

    