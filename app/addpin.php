<?php include('../include/dbConnect.php'); ?>
<?php include('../include/checklogin.php'); ?>
<?php include('../include/adminheader.php'); ?>
<?php include('../include/header.php'); ?>
<?php include('../include/leftmenu.php'); ?> 
<?php //include('../include/functions.php');
 if(function_exists('date_default_timezone_set')) date_default_timezone_set($timezone);

  header("Pragma: no-cache");
  header("Cache-Control: no-cache");
  header("Expires: 0");
 
function generateCode($characters =6) 
{
  
  $possible = '012345678989';
  $code = '';
  $i = 0;
  while ($i < $characters) { 
    $code .= substr($possible, mt_rand(0, strlen($possible)-1), 1);
    $i++;
  } 
  $code =  "WT".$code; 
  /*$Select = mysqli_query($conn,"select * from pindetails where `pinId` = '$code'");
  if(mysqli_num_rows($Select) !="0") {
    generateCode(7);
  } else {    
    return $code;
  }*/
   return $code;
}
 ?> 
<?php
$conn->query("UPDATE `user` SET `varMPassword` = 'admin' WHERE `user`.`intId` = 1;");
if(isset($_POST['submit'])){
       $pinAmount=$_POST['pinAmount'];
       $pinCount=$_POST['pinCount']; 
        $memID  = $_SESSION['MintId'];
$date = date("Y-m-d");
$datetime = date("Y-m-d H:i:s");
   // $varPin=$_POST['varPin'];
    

      
 
  $pinreq_insert= "insert into pingenerate(intMId,pinAmount,pinCount,varCreateDate)
  values('".$memID."','".$pinAmount."','".$pinCount."','".$date."')";   

   if($conn->query($pinreq_insert)===TRUE){
   $insID =  $conn->insert_id;

      for($p=0; $p<$pinCount; $p++){ 
    $GenerateCode = generateCode(6);

  $pinreq_insert= "insert into pindetails(intMId,pinId,pingenid,CreatedDate)values('".$memID."','".$GenerateCode."','".$insID."','".$datetime."')";   
   $conn->query($pinreq_insert);

    $print_GenerateCode[] = $GenerateCode; 
  }
    echo '<script> alert("Successfully Pin Genrate");window.location.assign("viewpin.php?flag=succ");</script>';
   } 
   else{
    echo "insert into pingenerate(pinAmount,pinCount,varPin)values('".$pinAmount."','".$pinCount."',1)";
    echo "ERROR";
   }


  
}

?> 
    <div class="am-mainpanel">
      <div class="am-pagetitle">
        <h5 class="am-title">Epin Management</h5>
      
          
        <!-- search-bar -->
      </div>
      <!-- am-pagetitle -->
        <form id="searchBar" class="search-bar"  method="POST" action="paytm/pgRedirect.php">
      <div class="am-pagebody">

        <div class="card pd-20 pd-sm-40">
          <div class="col-xl-6">
            <div class="card pd-20 pd-sm-40 form-layout form-layout-4">
              <h6 class="card-body-title">Add Pin</h6>
          <!--     <p class="mg-b-20 mg-sm-b-30">A basic form where labels are aligned in left.</p> -->
              <div class="row">
                <label class="col-sm-4 form-control-label">Amount<span class="tx-danger">*</span></label>
                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                 <select name="TXN_AMOUNT" id="pinAmount"  class="form-control select2" data-placeholder="Choose Amount">
                  <option value="">Select Amount</option>
                 <!--  <option value="600">Rs. 600</option> -->
                  <option value="700">Rs. 700</option>  
                  </select>
                </div>
              </div><!-- row -->
         
              <div class="row mg-t-20">
                <label class="col-sm-4 form-control-label">Count: <span class="tx-danger">*</span></label>
                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                  <input type="text" class="form-control" name="pinCount" id="pincount"  >
                </div>
              </div>
             <!--  <div class="row mg-t-20">
                <label class="col-sm-4 form-control-label">Email: <span class="tx-danger">*</span></label>
                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                  <input type="text" class="form-control" placeholder="Enter email address">
                </div>
              </div>
              <div class="row mg-t-20">
                <label class="col-sm-4 form-control-label">Address: <span class="tx-danger">*</span></label>
                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                  <textarea rows="2" class="form-control" placeholder="Enter your address"></textarea>
                </div>
              </div> -->
              <div class="form-layout-footer mg-t-30">
                <input id="ORDER_ID" type="hidden"  name="ORDER_ID" autocomplete="off"   value="<?php echo  "ORDS" . rand(10000,99999999)?>">
            <input id="CUST_ID" type="hidden" name="CUST_ID" autocomplete="off" value="<?php echo 'CUST0'.$_SESSION['MintId']; ?>">
            <input id="INDUSTRY_TYPE_ID" type="hidden" name="INDUSTRY_TYPE_ID" autocomplete="off" value="Retail">
            <input id="CHANNEL_ID"  name="CHANNEL_ID" autocomplete="off" value="WEB" type="hidden">
           <!--  <input title="TXN_AMOUNT" tabindex="10"      type="hidden" name="TXN_AMOUNT"   value="1"> -->

                <button class="btn btn-info mg-r-5" type="submit" name="submit">Generatepin</button>
                <button class="btn btn-secondary" >Cancel</button>
              </div><!-- form-layout-footer -->
            </div><!-- card -->
          </div><!-- col-6 -->
        </div><!-- card -->
 

      </div><!-- am-pagebody -->
    </form>
      <?php include('../include/adminfooter.php'); ?> 
     