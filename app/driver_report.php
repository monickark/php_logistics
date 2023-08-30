<?php
 include('../include/adminheader.php'); 
 include('../include/dbConnect.php'); 
 require('../include/basefunctions.php');
$id=$_REQUEST['id'];
/*echo '<script> alert("'.$id.'");</script>';*/
$driver_details=mysqli_query($conn,"SELECT * FROM drivers WHERE id='".$id."'; ");
$data=mysqli_fetch_array($driver_details);
/*echo '<script> alert("'.$id.'");</script>';*/
$img=$data['imgupld'];
/*echo '<script> alert("'.$img.'");</script>';*/
?>
<table style="width:100% !important;  " align="center">
  <tr><td>
<table class="table"  style="width:70% !important; margin:0 auto;"    >
  <thead class="thead-inverse">
    <th colspan="2"><center><h5>Driver Report - <?php echo $data['id']; ?> </h5></center></th>
  </thead>
    </table>
<table class="table" style="width:70% !important ">
  <thead class="thead-inverse">
      </thead>
  <tbody>
    <tr>
      <td><img src="Driver_files/<?php echo $img; ?>" height="150" width="150"> </td>
      <td style="align-content: center;"><h4> <?php echo $data['name']; ?></h4></td>
    </tr>
 <tr>
       </tr>
    <tr>
      <th scope="row">Date of Birth</th>
      <td>: <?php echo $data['dob']; ?></td>
<?php 
if($data['maritialstat']==1)
{
$mar="Single";
}
else
{
  $mar="Married";
}
?>      <th scope="row">Maritial Status</th>
      <td>: <?php echo $mar; ?></td>
	  </tr>
	  <tr>
      <th scope="row">Mobile Number</th>
      <td>: <?php echo $data['MobNum']; ?></td>
      <th scope="row">Aadhar Number</th>
      <td>: <?php echo $data['aadharno']; ?></td>
    </tr>
    <tr>
      <th scope="row">Voter Id</th>
      <td>: <?php echo $data['voterid']; ?></td>
    </tr>
     <tr>
  <th scope="row">Batch Number</th>
      <td>: <?php echo $data['batchno']; ?></td>
<th scope="row">Lisence Number</th>
      <td>: <?php echo $data['licenseno']; ?></td>
        </tr>
    <tr>
       <th scope="row">Lisence Expire Date</th>
      <td>: <?php echo $data['licexpdate']; ?></td>
      <th scope="row">RTO Area</th>
      <td>: <?php echo $data['rtoarea']; ?></td>
</tr> 
 <tr>
       <th scope="row">State</th>
      <td>: <?php echo $data['state']; ?></td>
        <th scope="row">City</th>
      <td>: <?php echo $data['city']; ?></td>
</tr> 

 <tr>
       <th scope="row">Area</th>
      <td>: <?php echo $data['area']; ?></td>
        <th scope="row">Address</th>
      <td>: <?php echo $data['address']; ?></td>
</tr> 

 <tr>
  <th scope="row">Pin Code</th>
      <td>: <?php echo $data['pincode']; ?></td>
      
       
</tr> 
 


<th colspan="4"><h5>Bank Details</h5></th>

<tr>
   <th scope="row">Bank Name </th>
      <td>: <?php echo $data['bnkname']; ?></td>
       <th scope="row">Account Number</th>
      <td>: <?php echo $data['accno']; ?></td>
       
</tr>
<tr>
   <th scope="row">IFSC Code </th>
      <td>: <?php echo $data['ifsc']; ?></td>
       
</tr>


<th colspan="4"><h5>Submits</h5></th>
<tr>
  <?php if($data['aadharupld']==""){ $aad="Not Submitted.";}else{ $aad="Submitted";}  ?>

       <th scope="row">Aadhar Copy</th>
      <td>: <?php echo $aad; ?></td>


                <td>
<?php 
if($aad=="Submitted")
{
  ?>

  <a href="../app/Driver_files/<?php echo $data['aadharupld']; ?>" />View File </a> 
<?php
}
?>
 </td>
       
</tr>
<tr>
  <?php if($data['licupld']==""){ $lic="Not Submitted.";}else{ $lic="Submitted";}  ?>
       <th scope="row">Lisence Copy</th>
      <td>: <?php echo $lic; ?></td>

          <td>
<?php 
if($lic=="Submitted")
{
  ?>

  <a href="../app/Driver_files/<?php echo $data['licupld']; ?>" />View File </a> 
<?php
}
?>
 </td>


       
</tr>
<tr>
   <?php if($data['imgupld']==""){ $image="Not Submitted.";}else{ $image="Submitted";}  ?>
       <th scope="row">Photo</th>
      <td>: <?php echo $image; ?></td> 

          <td>
<?php 
if($image=="Submitted")
{
  ?>

  <a href="../app/Driver_files/<?php echo $data['imgupld']; ?>" />View File </a> 
<?php
}
?>
 </td>

       
</tr>

<tr>
   <?php if($data['voterupld']==""){ $voter="Not Submitted.";}else{ $voter="Submitted";}  ?>
       <th scope="row">Voter ID Copy</th>
      <td>: <?php echo $voter; ?></td>
              <td>
<?php 
if($voter=="Submitted")
{
  ?>

  <a href="../app/Driver_files/<?php echo $data['voterupld']; ?>" />View File </a> 
<?php
}
?>
 </td>
</tr>
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
