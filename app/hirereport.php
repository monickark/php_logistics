<?php
 include('../include/adminheader.php'); 
 include('../include/dbConnect.php'); 
 require('../include/basefunctions.php');



/*echo '<script> alert("'.$_REQUEST['tripid'] .'");</script>';
echo '<script> alert("'.$_REQUEST['driver'] .'");</script>';*/

$tripid=$_REQUEST['id'];


/*echo '<script> alert("'.$tripid.'");</script>';
echo '<script> alert("'.$driver .'");</script>';
echo '<script> alert("'.$status .'");</script>';
die;*//*$return_toll=0;


$return_advance=0;
$return_load=0;
$return_unload=0;
$return_weigh=0;*/



$query_load= mysqli_query($conn,"SELECT * FROM hire_load WHERE id = '".$tripid."'");


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


      echo $data['driver']; ?></td>
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

$query_frt= mysqli_query($conn,"SELECT * FROM hire_freight WHERE id = '".$tripid."'");
$frt_data=mysqli_fetch_assoc($query_frt);











?>

<table class="table" style="width:70% !important ">
  <thead class="thead-inverse">
    
     <th colspan="4"><center><h5>Load Details</h5></center></th>
    
  </thead>
  <tbody>
 <tr>
      
      
      <th scope="row">Party GC</th>
      <td>: <?php echo $data['party_gc']; ?></td>
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

$query_hire= mysqli_query($conn,"SELECT * FROM hire_hire WHERE id = '".$tripid."'");
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
       <th scope="row">Total Advance</th>
      <td>: <?php echo $frt_data['advance_cash_amount']+$frt_data['advance_cheque_amount']+$hire_data['total_diesel_advance']+$hire_data['mkm_adv'];?></td>

       </tr>  
       <th scope="row">Hire Balance</th>
      <td>: <?php echo $hire_data['hire_balance']; ?></td>
      
      
    </tr>
  </tbody></table>






</td></tr>
</table>
<style type="text/css">
  .table{
    width:70% !important ;margin:0 auto;
  }
</style>
