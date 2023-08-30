
<!--   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->




    <link href="../lib/jquery-toggles/toggles-full.css" rel="stylesheet">
    <link href="../lib/highlightjs/github.css" rel="stylesheet">
    <link href="../lib/datatables/jquery.dataTables.css" rel="stylesheet">
    <link href="../lib/select2/css/select2.min.css" rel="stylesheet">
<?php


 include('../include/dbConnect.php'); 
if($_REQUEST['flag']=="disp")
{
/*$cont_det=mysqli_query($conn,"SELECT * FROM load_det WHERE id ='" .$_REQUEST["id"]. "'; " );
$cont=mysqli_fetch_assoc($cont_det);*/
?>

 <div class="row mg-t-10 pd-t-20-force pd-b-20-force" id="responsecontainera" style="background-color: #fff;">
                                                  



 <div class="col-xl table-wrapper">
<style type="text/css">
    
   tr:nth-child(even) {background-color: #f2f2f2;}
   th {
    background-color: #4CAF50;
    color: white;

}

th,td{
    border: 1px solid #dedede;
    padding:0 !important;
    margin: 0 !important;
}
table {
    display: table;
    border-collapse: separate;
    border-spacing: 0px;
    border-color: grey;
}
tr:hover {background-color: #f5f5f5;}
</style>
<!--  
  <table class="table responsive display responsive nowrap" width="100%" > -->
      <table id="datatable1" class="table display responsive nowrap" style="font-size: 12px !important;"> 
        <thead>
         <tr>
    <th class="tg-8m2u">SI No.</th>
    <th class="tg-8m2u">Date</th>
    <th class="tg-8m2u">ASS Ref No</th>
    <th class="tg-8m2u">Vehicle</th>
    <th class="tg-p8bj">From</th>
    <th class="tg-p8bj">To</th>
    <th class="tg-p8bj">Container No</th>
    <th class="tg-p8bj">Weight</th>
    <th class="tg-p8bj">Load Type</th>
    <th class="tg-p8bj">Party</th>
    <th class="tg-p8bj">Transporter</th>
    <th class="tg-p8bj">Chennai Advance</th>
    <th class="tg-p8bj">MKM Advance</th>
    <th class="tg-p8bj">Total Cash</th>
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

$pod_det=mysqli_query($conn,"SELECT * FROM load_det WHERE ent_date BETWEEN '" .$_REQUEST["id"]. "' AND '" .$_REQUEST["id2"]. "'; " );
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
$fuel=mysqli_query($conn,"SELECT * FROM fuel WHERE tripid ='" .$pod['tripid']. "' AND ent_date BETWEEN '" .$_REQUEST["id"]. "' AND '" .$_REQUEST["id2"]. "'; " );
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


$pod_det=mysqli_query($conn,"SELECT * FROM onroad_details WHERE ent_date BETWEEN '" .$_REQUEST["id"]. "' AND '" .$_REQUEST["id2"]. "'; " );
while($pod=mysqli_fetch_assoc($pod_det))
{
/*echo "SELECT * FROM frieghtdetails WHERE tripid ='" .$pod['tripid']. "'; "  ;*/



$tot_qty=0;
$tot_amt=0;
$vend="";
$fuel=mysqli_query($conn,"SELECT * FROM fuel WHERE tripid ='" .$pod['tripid']. "' AND ent_date BETWEEN '" .$_REQUEST["id"]. "' AND '" .$_REQUEST["id2"]. "'; " );
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

$pod_det=mysqli_query($conn,"SELECT * FROM load_return WHERE ent_date BETWEEN '" .$_REQUEST["id"]. "' AND '" .$_REQUEST["id2"]. "'; " );
while($pod=mysqli_fetch_assoc($pod_det))
{
/*echo "SELECT * FROM frieghtdetails WHERE tripid ='" .$pod['tripid']. "'; "  ;*/



$tot_qty=0;
$tot_amt=0;
$vend="";
$fuel=mysqli_query($conn,"SELECT * FROM fuel WHERE tripid ='" .$pod['tripid']. "' AND ent_date BETWEEN '" .$_REQUEST["id"]. "' AND '" .$_REQUEST["id2"]. "'; " );
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

$pod_det=mysqli_query($conn,"SELECT * FROM halt_entry WHERE ent_date BETWEEN '" .$_REQUEST["id"]. "' AND '" .$_REQUEST["id2"]. "'; " );
while($pod=mysqli_fetch_assoc($pod_det))
{
/*echo "SELECT * FROM frieghtdetails WHERE tripid ='" .$pod['tripid']. "'; "  ;*/



$tot_qty=0;
$tot_amt=0;
$vend="";
$fuel=mysqli_query($conn,"SELECT * FROM fuel WHERE tripid ='" .$pod['tripid']. "' AND ent_date BETWEEN '" .$_REQUEST["id"]. "' AND '" .$_REQUEST["id2"]. "'; " );
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


      <button Value="Button" onclick="back()">Back</button>

  <script src="../lib/jquery/jquery.js"></script>
<!--     <script src="../lib/popper.js/popper.js"></script>
    <script src="../lib/bootstrap/bootstrap.js"></script> -->
    <script src="../lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js"></script>
    <script src="../lib/jquery-toggles/toggles.min.js"></script>
    <script src="../lib/highlightjs/highlight.pack.js"></script>
    <script src="../lib/datatables/jquery.dataTables.js"></script>
    <script src="../lib/datatables-responsive/dataTables.responsive.js"></script>

<script>
function back()
{
      window.history.back();
}
</script>

<!-- 
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
    </script> -->

<?php }