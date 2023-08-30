<?php include('../include/dbConnect.php'); ?>

<?php include('../include/checklogin.php'); ?>

<?php include('../include/adminheader.php'); ?>

<?php include('../include/header.php'); ?>

<?php include('../include/leftmenu.php');  
      require('../include/basefunctions.php');
?>


<?php


 if($_REQUEST['action'] == "Add"){
if($_POST['cusCity']=="")
{
  echo '<script> alert("Please Select Valid Date.");</script>';

}


else
{
/*echo '<script> alert("'.$_POST["cusCity2"].'");</script>';*/

$date_rep = str_replace('/', '-', $_POST['cusCity']);

        $dobins = date("Y-m-d", strtotime($date_rep));

$date_rep2 = str_replace('/', '-', $_POST['cusCity2']);

        $dobins2 = date("Y-m-d", strtotime($date_rep2));

   /* echo '<script> alert("'.$dobins2.'");</script>';*/

$bank_check=mysqli_query($conn,"SELECT * FROM load_det WHERE ent_date BETWEEN '$dobins' AND '$dobins2'; " );








if(mysqli_num_rows($bank_check)==0)
{
 
   
echo '<script> alert("No Entries on that Date.");</script>';
   

}
else
{
/*$cont=mysqli_fetch_assoc($bank_check);*/

header("Location:daily_report_full.php?flag=disp&id=".$dobins."&id2=".$dobins2);



/*
echo '<script>window.open("daily_report_full.php?flag=disp&id='.$dobins.'&id2='.$dobins2.'");</script>';*/
/*
echo "<script>window.open('daily_report_full.php?flag=disp&id=".$dobins."&id2=".$dobins2."');</script>";*/
/*window.location.assign("add_payment.php");
/*

header("location: dashboard.php");*/


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

    <link href="../lib/jquery-toggles/toggles-full.css" rel="stylesheet">
    <link href="../lib/highlightjs/github.css" rel="stylesheet">
    <link href="../lib/datatables/jquery.dataTables.css" rel="stylesheet">
    <link href="../lib/select2/css/select2.min.css" rel="stylesheet">
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
                                          <h6 class="card-body-title">Daily Report</h6>


                                                            <div class="row mg-t-20">
              <label class="col-md-2 col-sm-2 form-control-label"> From Date :</label>
              <div class="col-sm-8 col-md-2  col-xs-12 mg-t-10 mg-sm-t-0">
              
<input class="form-control datepicker" placeholder="From date" name="cusCity" id="cusCity" type="text" value="" >
              <!-- <input class="form-control " placeholder="Cash Date" name="cusCity" id="cusCity" type="date" value="" data-date-format="dd/mm/yyyy">
               -->

           
            </div> 
                                                        </div>

                                                           <div class="row mg-t-20">
              <label class="col-md-2 col-sm-2 form-control-label"> To Date :</label>
              <div class="col-sm-8 col-md-2  col-xs-12 mg-t-10 mg-sm-t-0">
                     
<input class="form-control datepicker" placeholder="To date" name="cusCity2" id="cusCity2" type="text" value="" >
             <!--  <input class="form-control " placeholder="Cash Date" name="cusCity2" id="cusCity2" type="date" value="" data-date-format="dd/mm/yyyy"> -->
              

           
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

 <div class="row mg-t-10 pd-t-20-force pd-b-20-force" id="responsecontainera" style="background-color: #fff;">
                                                  



 <div class="col-xl table-wrapper">

<!--  
  <table class="table responsive display responsive nowrap" width="100%" > -->
      <table id="datatable1" class="table display responsive nowrap"> 
        <thead>
         <tr>
    <th class="tg-8m2u">S.No</th>
    <th class="tg-8m2u">Date</th>
    <th class="tg-8m2u">Ref. No</th>
    <th class="tg-8m2u">Vehicle</th>
    <th class="tg-p8bj">From</th>
    <th class="tg-p8bj">To</th>
    <th class="tg-p8bj">Container No</th>
    <th class="tg-p8bj">Weight</th>
    <th class="tg-p8bj">Load Type</th>
    <th class="tg-p8bj">Party Name</th>
    <th class="tg-p8bj">Transporter</th>
    <th class="tg-p8bj">Chennai Advance</th>
    <th class="tg-p8bj">MKM Advance</th>
    <th class="tg-p8bj">Total Amount</th>
    <th class="tg-p8bj">Vendor</th>
    <th class="tg-p8bj">Diesel Qty</th>
    <th class="tg-p8bj">Diesel Amount</th>
    <th class="tg-p8bj">Rent Amount</th>
    <th class="tg-p8bj">Total Advance</th>
    <th class="tg-p8bj">Balance</th>
    <th class="tg-p8bj">Driver</th>
   
  </tr>
        </thead>
        <tbody>
          <?php

$i=1;

$chn_adv=0;
$mkm_adv=0;
$tot_adv=0;
$die_qty=0;
$die_amt=0;
$rent_amt=0;
$tot_adva=0;
$tot_bal=0;



/*echo '<script> alert("'.$_REQUEST["id"].'");</script>';*/

$pod_det=mysqli_query($conn,"SELECT * FROM load_det WHERE ent_date ='" .$_REQUEST["id"]. "'; " );
while($pod=mysqli_fetch_assoc($pod_det))
{
/*echo "SELECT * FROM frieghtdetails WHERE tripid ='" .$pod['tripid']. "'; "  ;*/
$frt_det=mysqli_query($conn,"SELECT * FROM frieghtdetails WHERE tripid ='" .$pod['tripid']. "'; " );
$frt=mysqli_fetch_assoc($frt_det);


$hre_det=mysqli_query($conn,"SELECT * FROM load_hire WHERE tripid ='" .$pod['tripid']. "'; " );
$hre=mysqli_fetch_assoc($hre_det);


$tot_qty=0;
$tot_amt=0;
$vend="";
$fuel=mysqli_query($conn,"SELECT * FROM fuel WHERE tripid ='" .$pod['tripid']. "' AND ent_date='".$_REQUEST["id"]."'; " );
while($ful=mysqli_fetch_assoc($fuel))
{
$tot_qty+=$ful['qty'];
$tot_amt+=$ful['cost'];
$vend=$ful["vendor"];
}

$driver=mysqli_query($conn,"SELECT * FROM drivers WHERE id ='" .$pod['driver']. "'; " );
$dri=mysqli_fetch_assoc($driver);




$chn_adv+=$hre["chn_advance"];
$mkm_adv+=$hre["mkm_adv"];
$tot_adv+=$hre["chn_advance"]+$hre["mkm_adv"];
$die_qty+=$tot_qty;
$die_amt+=$tot_amt;
$rent_amt+=$frt["amount"];
$tot_adva+=$hre["chn_advance"]+$hre["mkm_adv"]+$frt["total_diesel_advance"];
$tot_bal+=$frt["amount"]-$hre["chn_advance"]+$hre["mkm_adv"]+$frt["total_diesel_advance"];





?>
          <tr>
            <td  class="tg-us36"><?php echo $i; ?></td>
            <td  class="tg-us36"><?php echo $pod["ent_date"]; ?></td>
            <td  class="tg-us36"><?php echo $pod["tripid"]; ?></td>
            <td  class="tg-us36"><?php echo $pod["vechno"]; ?></td>
            <td  class="tg-us36"><?php echo $pod["from_place"]; ?></td>
            <td  class="tg-us36"><?php echo $pod["to_place"]; ?></td>
            <td  class="tg-us36"><?php echo $pod["cont_no"]; ?></td>
            <td  class="tg-us36"><?php echo $pod["cont_wt"]; ?></td>
            <td  class="tg-us36"><?php echo $pod["load_type"]; ?></td>
            <td  class="tg-us36"><?php echo $pod["party_name"]; ?></td>
            <td  class="tg-us36"><?php echo $pod["transporter"]; ?></td>
            <td  class="tg-us36"><?php echo $hre["chn_advance"]; ?></td>
            <td  class="tg-us36"><?php echo $hre["mkm_adv"]; ?></td>
            <td  class="tg-us36"><?php echo $hre["chn_advance"]+$hre["mkm_adv"]; ?></td>
            <td  class="tg-us36"><?php echo $vend; ?></td>
            <td  class="tg-us36"><?php echo $tot_qty; ?></td>
            <td  class="tg-us36"><?php echo $tot_amt; ?></td>
            <td  class="tg-us36"><?php echo $frt["amount"]; ?></td>
            <td  class="tg-us36"><?php echo $hre["chn_advance"]+$hre["mkm_adv"]+$frt["total_diesel_advance"]; ?></td>
            <td  class="tg-us36"><?php echo $frt["amount"]-$hre["chn_advance"]+$hre["mkm_adv"]+$frt["total_diesel_advance"]; ?></td>
            <td  class="tg-us36"><?php echo $dri['name']; ?></td>

            </tr>
      <?php
      $i++;

}

/*On Road*/


$pod_det=mysqli_query($conn,"SELECT * FROM onroad_details WHERE ent_date ='" .$_REQUEST["id"]. "'; " );
while($pod=mysqli_fetch_assoc($pod_det))
{
/*echo "SELECT * FROM frieghtdetails WHERE tripid ='" .$pod['tripid']. "'; "  ;*/



$tot_qty=0;
$tot_amt=0;
$vend="";
$fuel=mysqli_query($conn,"SELECT * FROM fuel WHERE tripid ='" .$pod['tripid']. "' AND ent_date='".$_REQUEST["id"]."'; " );
while($ful=mysqli_fetch_assoc($fuel))
{
$tot_qty+=$ful['qty'];
$tot_amt+=$ful['cost'];
$vend=$ful["vendor"];
}

$driver=mysqli_query($conn,"SELECT * FROM drivers WHERE id ='" .$pod['driver']. "'; " );
$dri=mysqli_fetch_assoc($driver);




$die_qty+=$tot_qty;
$die_amt+=$tot_amt;
$tot_adva+=$pod["amount"];




?>
          <tr>
            <td  class="tg-us36"><?php echo $i; ?></td>
            <td  class="tg-us36"><?php echo $pod["ent_date"]; ?></td>
            <td  class="tg-us36"><?php echo $pod["tripid"]; ?></td>
            <td  class="tg-us36"><?php echo $pod["vechnum"]; ?></td>
            <td  class="tg-us36"><?php echo $pod["from_place"]; ?></td>
            <td  class="tg-us36"><?php echo $pod["from_place"]; ?></td>
            <td  class="tg-us36">On Road</td>
            <td  class="tg-us36"></td>
            <td  class="tg-us36"></td>
            <td  class="tg-us36"></td>
            <td  class="tg-us36"></td>
            <td  class="tg-us36"></td>
            <td  class="tg-us36"></td>
            <td  class="tg-us36"></td>
            <td  class="tg-us36"><?php echo $vend; ?></td>
            <td  class="tg-us36"><?php echo $tot_qty; ?></td>
            <td  class="tg-us36"><?php echo $tot_amt; ?></td>
            <td  class="tg-us36"></td>
            <td  class="tg-us36"><?php echo $pod["amount"]; ?></td>
            <td  class="tg-us36"></td>
            <td  class="tg-us36"><?php echo $dri['name']; ?></td>
            </tr>



<?php
$i++;
}

/*Return*/

$pod_det=mysqli_query($conn,"SELECT * FROM load_return WHERE ent_date ='" .$_REQUEST["id"]. "'; " );
while($pod=mysqli_fetch_assoc($pod_det))
{
/*echo "SELECT * FROM frieghtdetails WHERE tripid ='" .$pod['tripid']. "'; "  ;*/



$tot_qty=0;
$tot_amt=0;
$vend="";
$fuel=mysqli_query($conn,"SELECT * FROM fuel WHERE tripid ='" .$pod['tripid']. "' AND ent_date='".$_REQUEST["id"]."'; " );
while($ful=mysqli_fetch_assoc($fuel))
{
$tot_qty+=$ful['qty'];
$tot_amt+=$ful['cost'];
$vend=$ful["vendor"];
}

$driver=mysqli_query($conn,"SELECT * FROM drivers WHERE id ='" .$pod['driver']. "'; " );
$dri=mysqli_fetch_assoc($driver);




$die_qty+=$tot_qty;
$die_amt+=$tot_amt;
$tot_adva+=$pod["return_adv"];



?>
                    <tr>
            <td  class="tg-us36"><?php echo $i; ?></td>
            <td  class="tg-us36"><?php echo $pod["ent_date"]; ?></td>
            <td  class="tg-us36"><?php echo $pod["tripid"]; ?></td>
            <td  class="tg-us36"><?php echo $pod["vechnum"]; ?></td>
            <td  class="tg-us36"><?php echo $pod["from_place"]; ?></td>
            <td  class="tg-us36"><?php echo $pod["to_place"]; ?></td>
            <td  class="tg-us36">Return</td>
            <td  class="tg-us36"></td>
            <td  class="tg-us36"></td>
            <td  class="tg-us36"></td>
            <td  class="tg-us36"></td>
            <td  class="tg-us36"></td>
            <td  class="tg-us36"></td>
            <td  class="tg-us36"></td>
            <td  class="tg-us36"><?php echo $vend; ?></td>
            <td  class="tg-us36"><?php echo $tot_qty; ?></td>
            <td  class="tg-us36"><?php echo $tot_amt; ?></td>
            <td  class="tg-us36"></td>
            <td  class="tg-us36"><?php echo $pod["return_adv"]; ?></td>
            <td  class="tg-us36"></td>
            <td  class="tg-us36"><?php echo $dri['name']; ?></td>
            </tr>

<?php
$i++;
}

$pod_det=mysqli_query($conn,"SELECT * FROM halt_entry WHERE ent_date ='" .$_REQUEST["id"]. "'; " );
while($pod=mysqli_fetch_assoc($pod_det))
{
/*echo "SELECT * FROM frieghtdetails WHERE tripid ='" .$pod['tripid']. "'; "  ;*/



$tot_qty=0;
$tot_amt=0;
$vend="";
$fuel=mysqli_query($conn,"SELECT * FROM fuel WHERE tripid ='" .$pod['tripid']. "' AND ent_date='".$_REQUEST["id"]."'; " );
while($ful=mysqli_fetch_assoc($fuel))
{
$tot_qty+=$ful['qty'];
$tot_amt+=$ful['cost'];
$vend=$ful["vendor"];
}

$driver=mysqli_query($conn,"SELECT * FROM drivers WHERE id ='" .$pod['driver']. "'; " );
$dri=mysqli_fetch_assoc($driver);


$die_qty+=$tot_qty;
$die_amt+=$tot_amt;
$tot_adva+=$pod["cost"];




?>
                    <tr>
            <td  class="tg-us36"><?php echo $i; ?></td>
            <td  class="tg-us36"><?php echo $pod["ent_date"]; ?></td>
            <td  class="tg-us36"><?php echo $pod["tripid"]; ?></td>
            <td  class="tg-us36"><?php echo $pod["vechnum"]; ?></td>
            <td  class="tg-us36"><?php echo $pod["place"]; ?></td>
            <td  class="tg-us36"></td>
            <td  class="tg-us36">On Halt</td>
            <td  class="tg-us36"></td>
            <td  class="tg-us36"></td>
            <td  class="tg-us36"></td>
            <td  class="tg-us36"></td>
            <td  class="tg-us36"></td>
            <td  class="tg-us36"></td>
            <td  class="tg-us36"></td>
            <td  class="tg-us36"><?php echo $vend; ?></td>
            <td  class="tg-us36"><?php echo $tot_qty; ?></td>
            <td  class="tg-us36"><?php echo $tot_amt; ?></td>
            <td  class="tg-us36"></td>
            <td  class="tg-us36"><?php echo $pod["cost"]; ?></td>
            <td  class="tg-us36"></td>
            <td  class="tg-us36"><?php echo $dri['name']; ?></td>
            </tr>


<?php


$i++;

}







?>


<!-- 
<tr>
    <td class="tg-88nc" colspan="11">Total</td>
    <td class="tg-us36"><?php echo $chn_adv; ?></td>
    <td class="tg-us36"><?php echo $mkm_adv; ?></td>
    <td class="tg-us36"><?php echo $tot_adv; ?></td>
    <td class="tg-us36">&nbsp;</td>
    <td class="tg-us36"><?php echo $die_qty; ?></td>
    <td class="tg-us36"><?php echo $die_amt; ?></td>
    <td class="tg-us36"><?php echo $rent_amt; ?></td>
    <td class="tg-us36"><?php echo $tot_adva; ?></td>
    <td class="tg-us36"><?php echo $tot_bal; ?></td>
    <td class="tg-us36">&nbsp;</td>
  </tr> -->



  </tbody>
      </table>
      </div></div>
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


@page 
    {
        size:  auto;   /* auto is the initial value */
        margin: 0mm;  /* this affects the margin in the printer settings */
        margin-top: -200px;

    }

</style>



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
<style>
.main{width:98%; margin:2% auto;}
.main .table div{text-align:center; border:1px solid #555;}
.main .table,.tableHeading, span, th, td{border:1px solid #555;}
table, tr, th, td,.tableHeading{ text-align:center; font-size:12px;}
.table>thead>tr>th{border-bottom:2px solid #555 !important;}
thead{background-color:#fff;}
.tableHeading{font-size:16px;}

</style>   -->

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
   
    left: -70;
    margin-top:200px;

  }
  th{
    color: #000 !important; 
    
  }
}
 
</style>

<!-- 

<style type="text/css">

.table th, .table td {
    padding: 0.2rem !important;
    vertical-align: top;
    border-top: 1px solid #dee2e6;
}


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