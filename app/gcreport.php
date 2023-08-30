<?php
 include('../include/adminheader.php'); 
 include('../include/dbConnect.php'); 
 require('../include/basefunctions.php');



/*echo '<script> alert("'.$_REQUEST['tripid'] .'");</script>';
echo '<script> alert("'.$_REQUEST['driver'] .'");</script>';*/

$tripid=$_REQUEST['trip'];
$driver=$_REQUEST['driver'];
$status=$_REQUEST['stat'];

/*echo '<script> alert("'.$tripid.'");</script>';
echo '<script> alert("'.$driver .'");</script>';
echo '<script> alert("'.$status .'");</script>';
die;*//*$return_toll=0;


$return_advance=0;
$return_load=0;
$return_unload=0;
$return_weigh=0;*/



$query_load= mysqli_query($conn,"SELECT * FROM load_det WHERE tripid = '".$tripid."'");


$data=mysqli_fetch_assoc($query_load);
?>





<table style="width:100% !important;  " align="center">
  <tr><td>
<table class="table"  style="width:70% !important; margin:0 auto;"    >
  <thead class="thead-inverse">
    
      <th colspan="2"><center><h5>GC Details - <?php echo $tripid; ?> </h5></center></th>
      
    
  </thead>
  <tbody>
    <tr>
      <th scope="row">Date </th>
      <td>: <?php echo $data['ent_date']; ?></td>
    </tr>

     <tr>
     <th scope="row">Driver </th>

      <td>: <?php 
$query = mysqli_query($conn,"SELECT * FROM drivers WHERE id='".$data['driver']."'");
$result = mysqli_fetch_array($query);

      echo $result['name']; ?></td>
    </tr>
   
     <tr>
     <th scope="row">Party Name </th>
      <td>: <?php echo $data['party_name']; ?></td>
    </tr>
    <tr>
     <th scope="row">Vehicle Number </th>
      <td>: <?php echo $data['vechno']; ?></td>
    </tr>
    <tr>
     <th scope="row">From </th>
      <td>: <?php echo $data['from_place']; ?></td>
    </tr>
 <tr>
     <th scope="row">To </th>
      <td>: <?php echo $data['to_place']; ?></td>
    </tr>
     <tr>
     <th scope="row">Transport </th>
      <td>: <?php echo $data['transporter']; ?></td>
    </tr>

  </tbody>
  
</table>

<?php 


/*Load Calculations*/

$query_frt= mysqli_query($conn,"SELECT * FROM frieghtdetails WHERE tripid = '".$tripid."'");
$frt_data=mysqli_fetch_assoc($query_frt);



$total_calc=mysqli_query($conn,"SELECT * FROM trip_calculation WHERE tripid = '".$tripid."' AND driver = '".$driver."' ");
$calc_data=mysqli_fetch_assoc($total_calc);




$fuel_calc=mysqli_query($conn,"SELECT * FROM fuel WHERE tripid = '".$tripid."' ");

$total_fuel=0;
$driver_cash_fuel=0;
$total_cost=0;
$driver_cash=0;


while($fuel_data=mysqli_fetch_assoc($fuel_calc))
{
$total_fuel=$fuel_data['qty']+$total_fuel;
$driver_cash_fuel=$fuel_data['cost']+$driver_cash_fuel;

if($fuel_data['cost']==$driver)
{
if($fuel_data['paytype']=="Driver Cash")
{
$total_cost=$fuel_data['qty']+$total_cost;
$driver_cash=$fuel_data['cost']+$driver_cash;

}
}

}

$halt_calc=mysqli_query($conn,"SELECT * FROM halt_entry WHERE tripid = '".$tripid."' ");
$halt_days=mysqli_num_rows($halt_calc);
$halt_cost=0;
while($halt_data=mysqli_fetch_assoc($halt_calc))
{
$halt_cost=$halt_data['cost']+$halt_cost;
}


$other_calc=mysqli_query($conn,"SELECT * FROM other_exp WHERE tripid = '".$tripid."' ");
$other_exp_tot=0;
$other_exp_det=NULL;
while($other_exp=mysqli_fetch_assoc($other_calc))
{
 $other_exp_tot=$other_exp['amount']+$other_exp_tot;
$other_exp_det=$other_exp['description'].','.$other_exp_det;
}








?>

<table class="table" style="width:70% !important ">
  <thead class="thead-inverse">
    
     <th colspan="4"><center><h5>Load Details</h5></center></th>
    
  </thead>
  <tbody>
 <tr>
      <th scope="row">Party GC</th>
      <td>: <?php echo $data['party_gc']; ?></td>
      <th scope="row">Reference Number </th>
      <td>: <?php echo $data['ref_no']; ?></td>
    </tr>
    <tr>
      <th scope="row">Container Number</th>
      <td>: <?php echo $data['cont_no']; ?></td>
      <th scope="row">Container Size</th>
      <td>: <?php echo $data['contsize']; ?></td>
	  </tr>
	  <tr>
      <th scope="row">Container Weight</th>
      <td>: <?php echo $data['cont_wt']; ?></td>
      
    </tr>
    <tr>
      <th scope="row">Load Type</th>
      <td>: <?php echo $data['load_type']; ?></td>
<?php if($data['load_type']=="Export"){?>
      <th scope="row">Seal Number</th>
      <td>: <?php echo $data['sealno']; ?></td>
    <?php   }?>

    </tr>

      <tr>
      <th scope="row">Remarks</th>
      <td>: <?php echo $data['remarks']; ?></td>
    
<tr>
<th scope="row">Freight Amount </th>
      <td>: <?php echo $frt_data['amount']; ?></td>
       <th scope="row">Advance Cash</th>
      <td>: <?php echo $frt_data['advance_cash_amount']; ?></td>
      
    </tr>
    <tr>
       <th scope="row">Advance Cheque </th>
      <td>: <?php echo $frt_data['advance_cheque_amount']; ?></td>
        <th scope="row">Cheque Number </th>
      <td>: <?php echo $frt_data['cheque_no']; ?></td>
</tr> 
 </tbody>
  
</table>


      <?php 

$query_gc= mysqli_query($conn,"SELECT * FROM gc_details WHERE tripid = '".$tripid."'");


$gc_data=mysqli_fetch_assoc($query_gc);
$gc_num=mysqli_num_rows($query_gc);
if($gc_num!=0)
{
?>

<table class="table" style="width:70% !important ">
  <thead class="thead-inverse">
    
     <th colspan="4"><center><h5>GC Details</h5></center></th>
    
  </thead>
  <tbody>


    </tr>
     <tr>
      <th scope="row">GC Number </th>
      <td>: <?php echo $gc_data['gcno']; ?></td>
     
    </tr>
    <tr>
      <th scope="row">Consigner Name </th>
      <td>: <?php echo $gc_data['consignor_name']; ?></td>
      <th scope="row">Consignee Name </th>
      <td>: <?php echo $gc_data['consignee_name']; ?></td>
    </tr>
      <tr>
      <th scope="row">No. of Articles </th>
      <td>: <?php echo $gc_data['articles']; ?></td>
      <th scope="row">Value</th>
      <td>: <?php echo $gc_data['value']; ?></td>
    </tr>
      <tr>
      
      <th scope="row">Description </th>
      <td>: <?php echo $gc_data['description']; ?></td>
    </tr>
      <tr>
       </tbody></table>
<?php } ?>


<?php 

$query_hire= mysqli_query($conn,"SELECT * FROM load_hire WHERE tripid = '".$tripid."'");
$hire_data=mysqli_fetch_assoc($query_hire);
?>


<table class="table" style="width:70% !important ">
  <thead class="thead-inverse">
  
     <th colspan="4"><center><h5>Hire Details</h5></center></th>
    
  </thead>
  <tbody>
    <tr>
<th scope="row">Comission</th>
      <td>: <?php echo $hire_data['commision']; ?></td>

    </tr>
<tr>
<th scope="row">MKM Advance</th>
      <td>: <?php echo $hire_data['mkm_adv']; ?></td>
       <th scope="row">MKM bank</th>
      <td>: <?php echo $hire_data['mkm_cque_no']; ?></td>
      
    </tr>
    <tr>
       <th scope="row">Advance Diesel Quantity</th>
      <td>: <?php echo $hire_data['total_diesel_quantity']; ?></td>
        <th scope="row">Advance Diesel Amount</th>
      <td>: <?php echo $hire_data['total_diesel_advance']; ?></td>
       </tr>       
        <tr>
       <th scope="row">Total Load Advance</th>
      <td>: <?php echo $frt_data['advance_cash_amount']+$frt_data['advance_cheque_amount']+$hire_data['total_diesel_advance']+$hire_data['mkm_adv'];?></td>
       </tr>  
  </tbody></table>
<?php
$query_return= mysqli_query($conn,"SELECT * FROM load_return WHERE tripid = '".$tripid."'");
$return_data=mysqli_fetch_assoc($query_return);
/*checking same driver*/
if($data['driver']==$return_data['driver'])
{
/*checking Empty Trip*/
if($return_data['party_name']&&$return_data['party_gc']!=0)
{

?>


<table class="table" style="width:70% !important ">
  <thead class="thead-inverse">
  
     <th colspan="4"><center><h5>Return Trip</h5></center></th>
    
  </thead>
  <tbody>
    <tr>
<th scope="row">Return Advance</th>
      <td>: <?php echo $return_data['return_adv']; ?></td>

    </tr>



    <tr>
     <th scope="row">From </th>
      <td>: <?php echo $return_data['from_place']; ?></td>
    
     <th scope="row">To </th>
      <td>: <?php echo $return_data['to_place']; ?></td>
    </tr>
<tr>
<th scope="row">Return Advance</th>
      <td>: <?php echo $return_data['return_adv']; ?></td>
       <th scope="row">Party Name</th>
      <td>: <?php echo $return_data['party_name']; ?></td>
      
    </tr>
    <tr>
       <th scope="row">Party GC</th>
      <td>: <?php echo $return_data['party_gc']; ?></td>
        <th scope="row">Referencre Number</th>
      <td>: <?php echo $return_data['ref_no']; ?></td>
       </tr>       
         <tr>
       <th scope="row">Container Number</th>
      <td>: <?php echo $return_data['cont_no']; ?></td>
        <th scope="row">Container Size</th>
      <td>: <?php echo $return_data['cont_size']; ?></td>
       </tr>
             <tr>
      <th scope="row">Container Weight</th>
      <td>: <?php echo $return_data['cont_wt']; ?></td>
       <th scope="row">Load Type</th>
      <td>: <?php echo $return_data['load_type']; ?></td>
        
       </tr>
        <tr>
          <th scope="row">Seal Number</th>
      <td>: <?php echo $return_data['sealno']; ?></td>
       <th scope="row">Remarks</th>
      <td>: <?php echo $return_data['remarks'];?></td>
       </tr>  

<?php 
$return_advance=$return_data['return_adv'];
$return_load=$return_data['loading_charge'];
$return_unload=$return_data['unloading_charge'];
$return_weigh=$return_data['weigh_bill_charge'];

?>
  </tbody></table>
<?php
}else
{
?>
<table class="table" style="width:70% !important ">
  <thead class="thead-inverse">
  
     <th colspan="4"><center><h5>Return Trip</h5></center></th>
    
  </thead>
  <tbody>
    <tr>
<th scope="row">Return Advance</th>
      <td>: <?php echo $return_data['return_adv']; ?></td>

    </tr>
<th scope="row">Return Empty</th>
<?php 
$return_advance=$return_data['return_adv'];


?>

  </tbody></table>



<?php

}
}
else
{
 $query_return = mysqli_query($conn,"SELECT * FROM drivers WHERE id='".$return_data['driver']."'");
$result_return = mysqli_fetch_array($query_return);

/*Different driver Empty Trip Check*/
if($return_data['party_name']&&$return_data['party_gc']!=0)
{


 
?>

<!-- <table class="table" style="width:70% !important ">
  <thead class="thead-inverse">
  
     <th colspan="4"><center><h5>Return Trip</h5></center></th>
    
  </thead>
  <tbody>
    <tr>
<th scope="row">Driver Name</th>
      <td>: <?php echo $result_return['name']; ?></td>

    </tr>
    <tr>
<th scope="row">Return Advance</th>
      <td>: <?php echo $return_data['return_adv']; ?></td>

     <th scope="row">Party Name</th>
      <td>: <?php echo $return_data['party_name']; ?></td>
      
    </tr>
    <tr>
       <th scope="row">Party GC</th>
      <td>: <?php echo $return_data['party_gc']; ?></td>
        <th scope="row">Referencre Number</th>
      <td>: <?php echo $return_data['ref_no']; ?></td>
       </tr>       
         <tr>
       <th scope="row">Container Number</th>
      <td>: <?php echo $return_data['cont_no']; ?></td>
        <th scope="row">Container Size</th>
      <td>: <?php echo $return_data['cont_size']; ?></td>
       </tr>
             <tr>
      <th scope="row">Container Weight</th>
      <td>: <?php echo $return_data['cont_wt']; ?></td>
       <th scope="row">Load Type</th>
      <td>: <?php echo $return_data['load_type']; ?></td>
        
       </tr>
        <tr>
          <th scope="row">Seal Number</th>
      <td>: <?php echo $return_data['sealno']; ?></td>
       <th scope="row">Remarks</th>
      <td>: <?php echo $return_data['remarks'];?></td>
       </tr>  

<?php 
$total_calc_return=mysqli_query($conn,"SELECT * FROM trip_calculation WHERE tripid = '".$tripid."' AND driver = '".$driver."' ");
$calc_data_return=mysqli_fetch_assoc($total_calc_return);
$return_toll=$calc_data_return['toll_charges'];


$return_advance=$return_data['return_adv'];
$return_load=$return_data['loading_charge'];
$return_unload=$return_data['unloading_charge'];
$return_weigh=$return_data['weigh_bill_charge'];

?>
  </tbody></table>
 -->
<?php
}

/*if empty*/

else
{
?>
<!-- <table class="table" style="width:70% !important ">
  <thead class="thead-inverse">
  
     <th colspan="4"><center><h5>Return Trip</h5></center></th>
    
  </thead>
  <tbody>
    <tr>
<th scope="row">Return Driver</th>
      <td>: <?php echo  $result_return['name']; ?></td>

    </tr>
    <tr>
<th scope="row">Return Advance</th>
      <td>: <?php echo $return_data['return_adv']; ?></td>

    </tr>
<th scope="row">Return Emppty</th>

<?php 
$return_advance=$return_data['return_adv'];


?>
  </tbody></table> -->
<?php
}
}
$pc_calc=mysqli_query($conn,"SELECT * FROM pc_entry WHERE tripid = '".$tripid."' ");
$pc_tot=0;
while($pc_calcul=mysqli_fetch_assoc($pc_calc))
{
 $pc_tot=$pc_calcul['amount']+$pc_tot;
}


$rto_calc=mysqli_query($conn,"SELECT * FROM rto_entry WHERE tripid = '".$tripid."' ");
$rto_tot=0;
while($rto_calcul=mysqli_fetch_assoc($rto_calc))
{
 $rto_tot=$rto_calcul['amount']+$rto_tot;
}




?>

<!-- <table class="table" style="width:70% !important ">
  <thead class="thead-inverse">
  
   <th colspan="4"> <center><h5>Trip Expenses(Up + Return)</h5></center> </th>
    
  </thead>
  <tbody>
    <tr>
<tr>
       <th scope="row">Loading Charges </th>
      <td>: <?php echo $calc_data['loading_charges']+$return_load; ?></td>
        <th scope="row">Un-Loading Charges </th>
      <td>: <?php echo $calc_data['unloading_charges']+$return_unload; ?></td>
       </tr>  
    <tr>
       <th scope="row">Weigh Charges </th>
      <td>: <?php echo $calc_data['weigh_charges']+$return_weigh; ?></td>
        <th scope="row">Toll Charges </th>
      <td>: <?php echo $calc_data['toll_charges']+$return_toll; ?></td>
       </tr> 
           <tr>
       <th scope="row">PC Charges </th>
      <td>: <?php echo $pc_tot; ?></td>
      <th scope="row">RTO Charges </th>
      <td>: <?php echo $rto_tot; ?></td>
       </tr> 
       <tr>
       <th scope="row">Halt Days </th>
      <td>: <?php echo $halt_days; ?></td>
      <th scope="row">Halt Amount </th>
      <td>: <?php echo $halt_cost; ?></td>
       </tr>    

                 <tr>
       <th scope="row">Other Expenses </th>
      <td>: <?php echo $other_exp_tot; ?></td>
        <th scope="row">Other Expenses Details </th>
      <td>: <?php echo $other_exp_det; ?></td>
       </tr>   
         

         
       <tr>
       <th scope="row">Total Diesel Quantity </th>
      <td>: <?php echo $total_fuel.'&nbsp Lts'; ?></td>
        <th scope="row">Total Diesel Amount </th>
      <td>: <?php echo $driver_cash_fuel; ?></td>
       </tr>   
  <tr>
        <th scope="row">Total Expense </th>
      <td>: <?php echo $calc_data['loading_charges']+$calc_data['unloading_charges']+$calc_data['weigh_charges']+$calc_data['toll_charges']+$pc_tot+$rto_tot+$halt_cost+$other_exp_tot+$driver_cash_fuel+$return_toll+$return_load+$return_unload+$return_weigh; ?></td>
       </tr>
 <tr>
       <th scope="row">Total Advance</th>
      <td>: <?php echo $frt_data['advance_cash_amount']+$frt_data['advance_cheque_amount']+$hire_data['total_diesel_advance']+$hire_data['mkm_adv'] +$return_advance;?></td>
       </tr>  



      






  </tbody></table> -->






</td></tr>
</table>
<style type="text/css">
  .table{
    width:70% !important ;margin:0 auto;
  }
</style>
