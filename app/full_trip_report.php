<?php 
ob_start();
include('../include/dbConnect.php'); ?>

<?php include('../include/checklogin.php'); ?>

<?php include('../include/adminheader.php'); ?>

<?php include('../include/header.php'); ?>

<?php include('../include/leftmenu.php');  
      require('../include/basefunctions.php');
?>

    <link href="../lib/jquery-toggles/toggles-full.css" rel="stylesheet">
    <link href="../lib/highlightjs/github.css" rel="stylesheet">
    <link href="../lib/datatables/jquery.dataTables.css" rel="stylesheet">
    <link href="../lib/select2/css/select2.min.css" rel="stylesheet">

<?php


 if($_REQUEST['action'] == "Add"){
if($_POST['cusCity']=="")
{
  echo '<script> alert("Please give Date Range.");</script>';

}


else
{
/*echo '<script> alert("'.$_POST["cusCity"].'");</script>';
*/

  $d= date_create($_POST["cusCity"]);  
   $dobins= date_format($d,'Y-m-d');

 $dte= date_create($_POST["to_date"]);  
   $dob= date_format($dte,'Y-m-d');





/*    echo '<script> alert("'.$dobins.'");</script>';*/

$bank_check=mysqli_query($conn,"SELECT * FROM load_det WHERE ent_date BETWEEN '$dobins' AND '$dob';" );

  echo "SELECT * FROM load_det WHERE ent_date BETWEEN '$dobins' AND '$dob';";

  if(mysqli_num_rows($bank_check)==0)
{
 
   
echo '<script> alert("No Entries on that Date.");</script>';
   

}
else
{

/*echo '<script> alert("Entered.");</script>';*/

/*
$cont=mysqli_fetch_assoc($bank_check);*/

header("Location:full_trip_report_full.php?flag=disp&id=".$dobins."&id2=".$dob);

}

/*if(mysqli_num_rows($bank_check)==0)
{
        $bank = array(
        "intAdminId"       =>     mysqli_real_escape_string($data->con, $_SESSION['MintId']),
        "name"           =>     mysqli_real_escape_string($data->con, $_POST['bankname'])
      ); 
 $bank_insert = $data->insert('banks', $bank);

}*/
}
}



?>
<style type="text/css">
#datatable1_wrapper #datatable1{width: 100% !important;}
</style>
<style>
table.dataTable.nowrap th, table.dataTable.nowrap td,#datatable1 th {
     white-space: normal ; 
}

/*#datatable1 
{
  font-size: 12px;
}*/
</style>



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
                                          <h6 class="card-body-title">Full Trip Report</h6>


                                                            <div class="row mg-t-20">
              <label class="col-md-2 col-sm-2 form-control-label">From Date :</label>
              <div class="col-sm-8 col-md-2  col-xs-12 mg-t-10 mg-sm-t-0">

              <input class="form-control " placeholder="Cash Date" name="cusCity" id="cusCity" type="date" value="" data-date-format="dd/mm/yyyy">
              

           
            </div> 
                                                        </div>


                                                            <div class="row mg-t-20">
              <label class="col-md-2 col-sm-2 form-control-label">To Date :</label>
              <div class="col-sm-8 col-md-2  col-xs-12 mg-t-10 mg-sm-t-0">

              <input class="form-control " placeholder="Cash Date" name="to_date" id="to_date" type="date" value="" data-date-format="dd/mm/yyyy">
              

           
            </div> 
                                                        </div>

















     <div class="form-layout-footer mg-t-30">
                <button type="submit" value="submit" name="submit" class="btn btn-info mg-r-5">View Reports</button>
                <input type="hidden" name="action" value="<?php if($_REQUEST['flag'] =='Edit') echo $_REQUEST['flag']; else echo 'Add'; ?>">
                <button type="reset" value="Reset" class="btn btn-secondary">Cancel</button>
              </div>

                                                      


                              








     </div>



<style>
.dridet{
  display: none;
}

</style>

<?php


if($_REQUEST['flag']=="disp")
{
/*$cont_det=mysqli_query($conn,"SELECT * FROM load_det WHERE id ='" .$_REQUEST["id"]. "'; " );
$cont=mysqli_fetch_assoc($cont_det);*/
?>

 <div class="row mg-t-10 " id="responsecontainera" style="background-color: #fff;">
                                                  

<!-- pd-t-20-force pd-b-20-force
 -->
 <div class="col-xl table-wrapper" style="padding: 0px 0px;">

 
 <!--  <table class="table responsive display responsive nowrap" width="100%" > -->
     <table id="datatable1" class="table display responsive nowrap"> 
        <thead>
         <tr>
    <th class="tg-8m2u">S.No</th>
    <th class="tg-8m2u">Date</th>
    <th class="tg-8m2u">Ref. No</th>
    <th class="tg-8m2u">Vehicle</th>
    <th class="tg-p8bj">Container No</th>
    <th class="tg-p8bj">Total Advance</th>
    <th class="tg-p8bj">Total Diesel</th>
    <th class="tg-p8bj">Total Diesel Amount</th>
<th class="tg-p8bj">Rental Difference</th>
<th class="tg-p8bj">Tptr Amount</th>
  <th class="tg-p8bj">Total Advance</th>
<th class="tg-p8bj">Tptr Balance</th>
<th class="tg-p8bj">Party Rental</th>
    <th class="tg-p8bj">Party Advance</th>
    <th class="tg-p8bj">Party Balance</th>



    <th class="tg-p8bj">From</th>
    <th class="tg-p8bj">To</th>
    
    <th class="tg-p8bj">Load Type</th>
    <th class="tg-p8bj">Weight</th>
    <th class="tg-p8bj">Party Name</th>
    <th class="tg-p8bj">Transporter</th>
  


    
    
    
    
    <th class="tg-p8bj">Comission</th> 
        </thead>
        <tbody>
          <?php

$i=1;
$comm=0;
$rent_diff=0;
$party_bal=0;
$party_adv=0;
$party_rent=0;
$trip_bal=0;
$tot_adv=0;
$trip_amt=0;
$total_die_amt=0;
$tot_die=0;
$tot_csh_adv=0;

/*echo '<script> alert("'.$_REQUEST["id"].'");</script>';*/

$pod_det=mysqli_query($conn,"SELECT * FROM load_det WHERE ent_date BETWEEN '" .$_REQUEST["id"]."' AND '".$_REQUEST["id2"]."'; " );
while($pod=mysqli_fetch_assoc($pod_det))
{
/*echo "SELECT * FROM frieghtdetails WHERE tripid ='" .$pod['tripid']. "'; "  ;*/
$frt_det=mysqli_query($conn,"SELECT * FROM frieghtdetails WHERE tripid ='" .$pod['tripid']. "'; " );
$frt=mysqli_fetch_assoc($frt_det);


$hre_det=mysqli_query($conn,"SELECT * FROM load_hire WHERE tripid ='" .$pod['tripid']. "'; " );
$hre=mysqli_fetch_assoc($hre_det);


$tot_qty=0;
$tot_amt=0;



$fuel=mysqli_query($conn,"SELECT * FROM fuel WHERE tripid ='" .$pod['tripid']. "'; " );
while($ful=mysqli_fetch_assoc($fuel))
{
$tot_qty+=$ful['qty'];
$tot_amt+=$ful['cost'];
}

?>
          <tr>

<?php
$comm+=$hre["chn_advance"]+$hre["mkm_adv"];
$rent_diff+=$tot_qty;
$party_bal+=$tot_amt;
$party_adv+=$frt["amount"];
$party_rent+=$hre["chn_advance"]+$hre["mkm_adv"]+$frt["total_diesel_advance"];
$trip_bal+=$frt["amount"]-$hre["chn_advance"]+$hre["mkm_adv"]+$frt["total_diesel_advance"];
$tot_adv+=$hre["hire_amount"];
$trip_amt+=$frt["advance_cash_amount"];
$total_die_amt+=$frt["amount"]-$frt["advance_cash_amount"];
$tot_die+=$frt["amount"]-$hre["hire_amount"];
$tot_csh_adv+=$hre["commision"];

?>




            <td  class="tg-us36"><?php echo $i; ?></td>
            <td  class="tg-us36"><?php echo $pod["ent_date"]; ?></td>
            <td  class="tg-us36"><?php echo $pod["tripid"]; ?></td>
            <td  class="tg-us36"><?php echo $pod["vechno"]; ?></td>
            <td  class="tg-us36"><?php echo $pod["cont_no"]; ?></td>
            <td  class="tg-us36"><?php echo $hre["chn_advance"]+$hre["mkm_adv"]; ?></td>
               <td  class="tg-us36"><?php echo $tot_qty; ?></td>
            <td  class="tg-us36"><?php echo $tot_amt; ?></td>
   <td  class="tg-us36"><?php echo $frt["amount"]-$hre["hire_amount"]; ?></td>
   <td  class="tg-us36"><?php echo $frt["amount"]; ?></td>
       <td  class="tg-us36"><?php echo $hre["hire_amount"]; ?></td>
              <td  class="tg-us36"><?php echo $frt["advance_cash_amount"]; ?></td>
            <td  class="tg-us36"><?php echo $frt["amount"]-$frt["advance_cash_amount"]; ?></td>
    
                 <td  class="tg-us36"><?php echo $hre["chn_advance"]+$hre["mkm_adv"]+$frt["total_diesel_advance"]; ?></td>
 <td  class="tg-us36"><?php echo $frt["amount"]-$hre["chn_advance"]+$hre["mkm_adv"]+$frt["total_diesel_advance"]; ?></td>


            <td  class="tg-us36"><?php echo $pod["from_place"]; ?></td>
            <td  class="tg-us36"><?php echo $pod["to_place"]; ?></td>
            
            <td  class="tg-us36"><?php echo $pod["load_type"]; ?></td>
            <td  class="tg-us36"><?php echo $pod["cont_wt"]; ?></td>
            <td  class="tg-us36"><?php echo $pod["party_name"]; ?></td>
            <td  class="tg-us36"><?php echo $pod["transporter"]; ?></td>
             
         
            
         
      
     
         
            <td  class="tg-us36"><?php echo $hre["commision"]; ?></td> 
            </tr>
      <?php



$i++;
}
?>

<tfoot>
    
      <tr>
    <td class="tg-88nc" colspan="5">Total</td>
         <td class="tg-us36"><?php echo $comm; ?></td>
 <td class="tg-us36"><?php echo $rent_diff; ?></td>
<td class="tg-us36"><?php echo $party_bal; ?></td>
<td class="tg-us36"><?php echo $tot_die; ?></td>
<td class="tg-us36"><?php echo $party_adv; ?></td>
  <td class="tg-us36"><?php echo $tot_adv; ?></td>
<td class="tg-us36"><?php echo $trip_amt; ?></td>

   <td class="tg-us36"><?php echo $party_rent; ?></td>
    <td class="tg-us36"><?php echo $trip_bal; ?>
   <td class="tg-us36"><?php echo $total_die_amt; ?>
    <td class="tg-88nc" colspan="6"></td>
   <td class="tg-us36"><?php echo $tot_csh_adv; ?></td>

   
    
 <!--    
 
</td>
 
    
  </td>
    
     -->
  </tr>

</tfoot>




  </tbody>
      </table>
      </div></div>';
<?php }
?>


  




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

/*
@page 
    {
        size:  auto;   /* auto is the initial value */
    /*    margin: 0mm;  /* this affects the margin in the printer settings */
      /*  margin-top: -200px;

    }
*/
</style>


<!-- <style>

.table th, .table td {
    padding: 0.2rem !important;
    vertical-align: top;
    border-top: 1px solid #dee2e6;
}

.main{width:98%; margin:2% auto;}
.main .table div{text-align:center; border:1px solid #555;}
.main .table,.tableHeading, span, th, td{border:1px solid #555;}
table, tr, th, td,.tableHeading{ text-align:center; font-size:12px;}
.table>thead>tr>th{border-bottom:2px solid #555 !important;}
thead{background-color:#fff;}
.tableHeading{font-size:16px;}

</style>   -->

<!--     <style>
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
   
    left: -70;
    margin-top:200px;

  }
  th{
    color: #000 !important; 
    
  }
}
 
</style> -->


<!-- 
<style type="text/css">
.tg  {border-collapse:collapse;border-spacing:0;}
.tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:black;}
.tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:black;}
.tg .tg-88nc{font-weight:bold;border-color:inherit;text-align:center}
.tg .tg-l711{border-color:inherit}
.tg .tg-us36{border-color:inherit;vertical-align:top}
.tg .tg-p8bj{font-weight:bold;border-color:inherit;vertical-align:top}
</style>
<style type="text/css">
.tg  {border-collapse:collapse;border-spacing:0;}
.tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:black;}
.tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:black;}
.tg .tg-88nc{font-weight:bold;border-color:inherit;text-align:center}
.tg .tg-8m2u{font-weight:bold;border-color:inherit}
.tg .tg-l711{border-color:inherit}
.tg .tg-us36{border-color:inherit;vertical-align:top}
.tg .tg-p8bj{font-weight:bold;border-color:inherit;vertical-align:top}
</style> -->

  <script src="../lib/jquery/jquery.js"></script>
<!--     <script src="../lib/popper.js/popper.js"></script>
    <script src="../lib/bootstrap/bootstrap.js"></script> -->
    <script src="../lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js"></script>
    <script src="../lib/jquery-toggles/toggles.min.js"></script>
    <script src="../lib/highlightjs/highlight.pack.js"></script>
    <script src="../lib/datatables/jquery.dataTables.js"></script>
    <script src="../lib/datatables-responsive/dataTables.responsive.js"></script>
<!--     <script src="../lib/select2/js/select2.min.js"></script>

    <script src="../js/amanda.js"></script> -->
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
    </script>
<!-- 
<table class="tg">
  <tr>
    <th class="tg-8m2u">Date</th>
    <th class="tg-8m2u">Ref. No</th>
    <th class="tg-8m2u">Vehicle</th>
    <th class="tg-p8bj">From</th>
    <th class="tg-p8bj">To</th>
    <th class="tg-p8bj">Container No</th>
    <th class="tg-p8bj">Load Type</th>
    <th class="tg-p8bj">Weight</th>
    <th class="tg-p8bj">Party Name</th>
    <th class="tg-p8bj">Transporter</th>
    <th class="tg-p8bj">Total Advance</th>
    <th class="tg-p8bj">Total Diesel</th>
    <th class="tg-p8bj">Total Diesel Amount</th>
    <th class="tg-p8bj">Tptr Amount</th>
    <th class="tg-p8bj">Total Advance</th>
    <th class="tg-p8bj">Tptr Balance</th>
    <th class="tg-p8bj">Party Rental</th>
    <th class="tg-p8bj">Party Advance</th>
    <th class="tg-p8bj">Party Balance</th>
    <th class="tg-p8bj">Rental Differen ce</th>
  </tr>
  <tr>
    <td class="tg-l711"></td>
    <td class="tg-l711"></td>
    <td class="tg-l711"></td>
    <td class="tg-us36"></td>
    <td class="tg-us36"></td>
    <td class="tg-us36"></td>
    <td class="tg-us36"></td>
    <td class="tg-us36"></td>
    <td class="tg-us36"></td>
    <td class="tg-us36"></td>
    <td class="tg-us36"></td>
    <td class="tg-us36"></td>
    <td class="tg-us36"></td>
    <td class="tg-us36"></td>
    <td class="tg-us36"></td>
    <td class="tg-us36"></td>
    <td class="tg-us36"></td>
    <td class="tg-us36"></td>
    <td class="tg-us36"></td>
    <td class="tg-us36"></td>
  </tr>
  <tr>
    <td class="tg-88nc" colspan="10">Total</td>
    <td class="tg-us36"></td>
    <td class="tg-us36"></td>
    <td class="tg-us36"></td>
    <td class="tg-us36"></td>
    <td class="tg-us36"></td>
    <td class="tg-us36"></td>
    <td class="tg-us36"></td>
    <td class="tg-us36"></td>
    <td class="tg-us36"></td>
    <td class="tg-us36"></td>
  </tr>
</table> -->