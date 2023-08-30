<?php
 include('../include/adminheader.php'); 
 include('../include/dbConnect.php'); 
 require('../include/basefunctions.php');

$id=$_REQUEST['id'];

$vech_details=mysqli_query($conn,"SELECT * FROM companies WHERE id='".$id."'; ");

$data=mysqli_fetch_array($vech_details);

/*echo '<script> alert("'.$id.'");</script>';*/

?>





<table style="width:100% !important;  " align="center">
  <tr><td>
<table class="table"  style="width:70% !important; margin:0 auto;"    >
  <thead class="thead-inverse">
    
      <th colspan="2"><center><h5>Company Details - <?php echo $data['name']; ?> </h5></center></th>

  </thead>
  
  
</table>

<table class="table" style="width:70% !important ">
  <thead class="thead-inverse">
    
    
  </thead>
  <tbody>
 <tr>
      <th scope="row">Contact Person</th>
      <td>: <?php echo $data['contactName']; ?></td>
    </tr>
    <tr>
      <th scope="row">Mobile </th>
      <td>: <?php echo $data['MobNum']; ?></td>
      <th scope="row">Phone </th>
      <td>: <?php echo $data['PhNum']; ?></td>
    </tr>
    <tr>
      <th scope="row">E-mail</th>
      <td>: <?php echo $data['email']; ?></td>
      
    </tr>
    <tr>
      <th scope="row">GST/TIN No.</th>
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
   <th scope="row">Area</th>
      <td>: <?php echo $data['area']; ?></td>
       <th scope="row">City</th>
      <td>: <?php echo $data['city']; ?></td>
      
    </tr>



 </tbody>
  
</table> 




</td></tr>
</table>
<style type="text/css">
  .table{
    width:70% !important ;margin:0 auto;
  }
</style>
