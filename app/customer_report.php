<?php
 include('../include/adminheader.php'); 
 include('../include/dbConnect.php'); 
 require('../include/basefunctions.php');

$id=$_REQUEST['id'];

$vech_details=mysqli_query($conn,"SELECT * FROM customer WHERE id='".$id."'; ");

$data=mysqli_fetch_array($vech_details);

/*echo '<script> alert("'.$id.'");</script>';*/

?>





<table style="width:100% !important;  " align="center">
  <tr><td>
<table class="table"  style="width:70% !important; margin:0 auto;"    >
  <thead class="thead-inverse">
    
      <th colspan="2"><center><h5>Customer Details - <?php echo $data['name']; ?> </h5></center></th>

  </thead>
  
  
</table>

<table class="table" style="width:70% !important ">
  <thead class="thead-inverse">
    
    
  </thead>
  <tbody>
 <tr>
      <th scope="row">Contact Person</th>
      <td>: <?php echo $data['cust_name']; ?></td>
            <th scope="row">Customer ID</th>
      <td>: <?php echo $data['comm_id']; ?></td>
    </tr>
    <tr>
      <th scope="row">Mobile </th>
      <td>: <?php echo $data['mobNum']; ?></td>
<th scope="row">E-mail</th>
      <td>: <?php echo $data['email']; ?></td>
    </tr>
    <tr>
      <th scope="row">GST No.</th>
      <td>: <?php echo $data['gstNo']; ?></td>
<th scope="row">PAN No.</th>
      <td>: <?php echo $data['panNo']; ?></td>
    </tr>
     
<tr>
  <th scope="row">Aadhar Number</th>
      <td>: <?php echo $data['aadhar']; ?></td>
    </tr>
    <tr>
      <th scope="row">GST No.</th>
      <td>: <?php echo $data['gstNo']; ?></td>
<th scope="row">PAN No.</th>
      <td>: <?php echo $data['panNo']; ?></td>
    </tr>
     
<tr>
<th scope="row">Address</th>
      <td>: <?php echo $data['address']; ?></td>
       <th scope="row">Pin Code</th>
      <td>: <?php echo $data['pinCode']; ?></td>
      
    </tr>
    <tr>
   <th scope="row">Area</th>
      <td>: <?php echo $data['area']; ?></td>
       <th scope="row">City</th>
      <td>: <?php echo $data['city']; ?></td>
      
    </tr>

<th colspan="4"><h5>Bank Details</h5></th>
<?php

$bank_details=mysqli_query($conn,"SELECT * FROM bank_records WHERE cust_id ='".$data['comm_id']."'; ");
/*
echo '<script> alert("'.mysqli_num_rows($bank_details).'");</script>';*/
while($bank=mysqli_fetch_array($bank_details))
{

?>

 <tr>
   <th scope="row">Bank Name</th>
      <td>: <b><?php echo $bank['name']; ?></b></td>
       
    </tr>
     <tr>
      <th scope="row">Account Number</th>
      <td>: <?php echo $bank['accno']; ?></td>
      
   <th scope="row">IFDC Code</th>
      <td>: <?php echo $bank['ifsc']; ?></td>
      
    </tr>



</tr>


<?php
}



?>
<th colspan="4"><h5>Uploads</h5></th>
     <tr>
   <?php if($data['aadhar_upld']==""){ $voter="Not Submitted.";}else{ $voter="Submitted";}  ?>
       <th scope="row">Aadhar Copy</th>
      <td>: <?php echo $voter; ?></td>
              <td>
<?php 
if($voter=="Submitted")
{
  ?>

  <a href="../app/Customer_files/<?php echo $data['aadhar_upld']; ?>" />View File </a> 
<?php
}
?>
 </td>
 </tbody>
  
</table> 




</td></tr>
</table>
<p  style="position: absolute;text-align:  right;float:  left;left:  0;"><button class='ion-arrow-left-a' onclick="goBack()">Close</button> 

  </p>
  

  <script>
  function goBack() {
     window.close();
  }
</script>
<style type="text/css">
  .table{
    width:70% !important ;margin:0 auto;
  }
</style>
