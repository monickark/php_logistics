<?php include('../include/dbConnect.php'); ?>
<?php include('../include/adminheader.php'); ?>
<?php include('../include/header.php'); ?>
<?php include('../include/leftmenu.php'); 
require('../include/basefunctions.php');
?> 


<?php

$data = new Basefunc;  
if(isset($_POST['submit'])){
$ref_id=$_POST['cusCity'];
/*echo '<script>alert("'.$_POST['cusCity'].'");</script>';

*/
if($_POST['types']=="hire")
{
$ref_id="h_".$_POST['cusCity'];
}
else
{
  $ref_id=$_POST['cusCity'];
}


/*echo '<script>alert("'.$ref_id.'");</script>';

die;*/
        $newDate = date("Y-m-d");
    $countfiles = count($_FILES['file']['name']);
 
 // Looping all files
 for($i=0;$i<$countfiles;$i++){
   $filename = $_FILES['file']['name'][$i];
   
   // Upload file
   //echo '<script>alert("'.$ref_id.'");</script>';
   move_uploaded_file($_FILES['file']['tmp_name'][$i],'pod/'.$ref_id.'_'.$filename);
      $upd_img = array(
      	"intAdminId"  => mysqli_real_escape_string($data->con, $_SESSION['MintId']),
      	"company" =>     mysqli_real_escape_string($data->con, $_POST['company']),
      	"tripid" =>     mysqli_real_escape_string($data->con, $ref_id),
        "ent_date" =>     mysqli_real_escape_string($data->con, $newDate),
        "copy" =>     mysqli_real_escape_string($data->con, $ref_id.'_'.$filename)
      );
      $update = $data->insert('pod', $upd_img);

       if($update){

      echo '<script> alert("PDO Done.");");</script>';
    } 
    else{
      echo '<script> alert("Error in PDO");</script>';
    }

    }
}
?>



<div class="am-mainpanel">

      <div class="am-pagetitle">

        <h5 class="am-title">Billing</h5>

      

          

        <!-- search-bar -->

      </div>

      <!-- am-pagetitle -->

        <form id="searchBar" class="search-bar"  method="POST" action="" enctype="multipart/form-data">

      <div class="am-pagebody">

 <div class="card pd-20 pd-sm-20 form-layout form-layout-4">

       <div class="row row-sm mg-t-0">

          <div class="col-xl-12">

           

            <div class="portlet-body">
                                          <h6 class="card-body-title">POD Entry</h6>
                                                        <div class="row mg-t-10" >
                                                            <label class="col-md-4 col-sm-4 form-control-label">Company Name:</label>
                                                                <div class="col-sm-2 mg-t-10 mg-sm-t-0">
<select onChange="getdistrict(this.value);" name="company" id="company" class="form-control" required>





<option value="">Select </option>
<?php $query =mysqli_query($conn,"SELECT * FROM customer ");

while($row=mysqli_fetch_array($query))
{

$values=array();
/*
echo "SELECT DISTINCT load_det.party_name , load_det.tripid FROM load_det INNER JOIN load_return ON load_det.tripid = load_return.tripid where load_det.party_name='".$row['name']."'";*/

  $check = mysqli_query($conn,"SELECT DISTINCT load_det.party_name , load_det.tripid ,load_return.tripid FROM load_det ,load_return  WHERE load_det.tripid = load_return.tripid AND load_det.party_name ='".$row['name']."'");

/*echo "SELECT DISTINCT load_det.party_name , load_det.tripid as dettrip,load_return.tripid FROM load_det ,load_return  WHERE dettrip = load_return.tripid AND load_det.party_name ='".$row['name']."'";*/

















/*echo '<script>alert("pass1");</script>';*/

$i=0;
$j=0;

while($chk=mysqli_fetch_array($check))
{
  
 $pod_chk = mysqli_query($conn,"SELECT * FROM pod WHERE tripid = '".$chk['tripid']."'");
if(mysqli_num_rows($pod_chk)==0)
{

$i++;
$j++;
}
else if($j>0)
{
  $i++;
}
if($i==1)
{
  array_push($values,$chk['party_name']);

 ?>

  <!-- Company Name Dropdown -->
<option value="<?php echo $chk['party_name'];?>" ><?php echo $chk['party_name'];?></option>
<?php
}
}
/*
echo '<script>alert("pass2");</script>';*/


$check2=mysqli_query($conn,"SELECT DISTINCT party_name,id FROM hire_load WHERE party_name = '".$row['name']."'");

/*echo '<script>alert("pass3");</script>';*/

$ix=0;
$jx=0;

while($chk2=mysqli_fetch_array($check2))
{
  $tripid="h_".$chk2['id'];
/*echo '<script>alert("'.$tripid.'");</script>';*/

 $pod_chk2 = mysqli_query($conn,"SELECT * FROM pod WHERE tripid = '".$tripid."'");
if(mysqli_num_rows($pod_chk2)==0)
{

$ix++;
$jx++;
}
else if($jx>0)
{
  $ix++;
}
if($ix==1)
{
  array_push($values,$chk2['party_name']);
  if (!in_array($chk2['party_name'], $value))
  {
 ?>

  <!-- Company Name Dropdown -->
<option value="<?php echo $chk2['party_name'];?>" ><?php echo $chk2['party_name'];?></option>
<?php
}
}
}





}

?>
</select>


<!--  <input class="form-control" data-val="true" placeholder="Enter Driver Name" id="cusCity" maxlength="50" name="cusCity" type="text" value="<?php echo $insid[0]['area']; ?>"> -->


<!--  <input class="form-control" data-val="true" placeholder="Enter Driver Name" id="cusCityh" maxlength="50" name="cusCity" type="hidden" value=""> -->
                                                                    <span class="field-validation-valid font-red" data-valmsg-for="cityid" data-valmsg-replace="true"></span>
                                                              
                                                            </div>
   <div class="col-md-4 col-xl-6 mg-t-30 mg-md-t-0" >
        <h4 style="font-size: 19px;">Completed Trips</h4>
              <div class="pd-25 bg-gray-900" id="datatab">
                
                
              </div><!-- pd-10 -->
            </div>

                                                        </div>
<!--    <div class="row mg-t-10">
                                                            
                                                                <label class="col-md-4 form-control-label">Completed Trips:</label>
                                                                <div class="col-sm-2 mg-t-10 mg-sm-t-0">
                                                                    <select name="cusCity" id="district-list" class="form-control" required>
                                                                  



<option value="">Select</option>
</select> 
                                                                    <span class="field-validation-valid font-red" data-valmsg-for="cityid" data-valmsg-replace="true"></span>
                                                              
                                                            </div>

                                                        </div> -->



<div class="row mg-t-10">
              <label class="col-md-4 col-sm-4 form-control-label">POD Copy : </label>
              <div class="col-sm-2 mg-t-5 mg-sm-t-0">
<input type="file" name="file[]" id="file" multiple>
              <!--<input  type="file" name="pdo" id="pdo"> -->
                <span class="field-validation-valid font-red" data-valmsg-for="policyno" data-valmsg-replace="true"></span>
              </div>


           
            </div> 

<input type="hidden" name="cusCity" id="value">

<input type="hidden" name="types" id="types">

<div class="form-layout-footer mg-t-30">
  <br>
                <button type="submit" value="submit" name="submit" class="btn btn-info mg-r-5">Generate Invoice-->></button>
            </div>


 <div class="row mg-t-10 pd-t-20-force" id="responsecontainer">
                                                  
        <div class="col-sm-10 mg-t-5 mg-sm-t-0">


 <div class="col-xl">
  
</div>
      </div>





                   </div>

 

                                  </div>




                                    </div>

          <script>

$(document).on('click', '#tripno', function(){
  
/*alert("entered");*/
var val = $(this)["0"].value;
var tpe=$("#type").val();



$("#value").val(val);
$("#types").val(tpe);
  });
          </script>
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
    <script>
     function getdistrict(val) {
  $.ajax({
  type: "POST",
  url: "get_pod_det.php",
  data:'state_id='+val,
  success: function(data){ 
    /*$("#district-list").html(data);*/

    $("#datatab").html(data);
  }
  });
}
</script>
