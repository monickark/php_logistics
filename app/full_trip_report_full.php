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

 <div class="row mg-t-10 " id="responsecontainera" style="background-color: #fff;">
                                                  

<!-- pd-t-20-force pd-b-20-force
 -->
 <div class="col-xl table-wrapper" style="padding: 0px 0px;">

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
 <!--  <table class="table responsive display responsive nowrap" width="100%" > -->
     <table id="datatable1" class="table display responsive nowrap" style="font-size: 15px !important;"> 
        <thead>
         <tr>
    <th class="tg-8m2u">SI No.</th>
    <th class="tg-8m2u">Date</th>
    <th class="tg-8m2u">ASS Ref No</th>
    <th class="tg-8m2u">Vehicle</th>
    <th class="tg-p8bj">From</th>
    <th class="tg-p8bj">To</th>
    <th class="tg-p8bj">Container No</th>
        <th class="tg-p8bj">Load Type</th>
     <th class="tg-p8bj">Weight</th>
    <th class="tg-p8bj">Party Name</th>
    <th class="tg-p8bj">Transporter</th>
    <th class="tg-p8bj">Total Cash Advance</th>
    <th class="tg-p8bj">Total Diesel Qty</th>
    <th class="tg-p8bj">Total Diesel Amount</th>
    <th class="tg-p8bj">Tptr Amount</th>
      <th class="tg-p8bj">Total Advance</th>
      <th class="tg-p8bj">Tptr Balance</th>
      <th class="tg-p8bj">Party Rental</th>
    <th class="tg-p8bj">Party Advance</th>
    <th class="tg-p8bj">Party Balance</th>
<th class="tg-p8bj">Rental Difference</th>
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
                 <td  class="tg-us36"><?php echo $pod["from_place"]; ?></td>
            <td  class="tg-us36"><?php echo $pod["to_place"]; ?></td>
            <td  class="tg-us36"><?php echo $pod["cont_no"]; ?></td>
               <td  class="tg-us36"><?php echo $pod["load_type"]; ?></td>
            <td  class="tg-us36"><?php echo $pod["cont_wt"]; ?></td>
            <td  class="tg-us36"><?php echo $pod["party_name"]; ?></td>
            <td  class="tg-us36"><?php echo $pod["transporter"]; ?></td>
            <td  class="tg-us36"><?php echo $hre["chn_advance"]+$hre["mkm_adv"]; ?></td>
               <td  class="tg-us36"><?php echo $tot_qty; ?></td>
            <td  class="tg-us36"><?php echo $tot_amt; ?></td>
               <td  class="tg-us36"><?php echo $frt["amount"]; ?></td>
       <td  class="tg-us36"><?php echo $hre["hire_amount"]; ?></td>
                     <td  class="tg-us36"><?php echo $frt["advance_cash_amount"]; ?></td>
            <td  class="tg-us36"><?php echo $frt["amount"]-$frt["advance_cash_amount"]; ?></td>
<td  class="tg-us36"><?php echo $hre["chn_advance"]+$hre["mkm_adv"]+$frt["total_diesel_advance"]; ?></td>
<td  class="tg-us36"><?php echo $frt["amount"]-$hre["chn_advance"]+$hre["mkm_adv"]+$frt["total_diesel_advance"]; ?></td>
   <td  class="tg-us36"><?php echo $frt["amount"]-$hre["hire_amount"]; ?></td>
    
         
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
    
<?php }
?>