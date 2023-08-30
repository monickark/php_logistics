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
        <h5 class="am-title">GC Entry</h5>
      
          
        <!-- search-bar -->
      </div>
      <!-- am-pagetitle -->
        <form id="searchBar" class="search-bar"  method="POST" action="paytm/pgRedirect.php">
      <div class="am-pagebody">
 <div class="card pd-20 pd-sm-40 form-layout form-layout-4">
       <div class="row row-sm mg-t-20">
          <div class="col-xl-6">
           
            <div class="portlet-body">
                                          <h6 class="card-body-title">Gc Entry</h6>
                                                                                <div class="row mg-t-10">
                                                                                  <label class="col-md-4 form-control-label">Date :</label>
                                                        <div class="col-sm-8 mg-t-10 mg-sm-t-0 ">
                                                            <input class="form-control" data-val="true" data-val-length="The field permitno must be a string with a maximum length of 50." data-val-length-max="50" data-val-required="Enter Permit No." id="permitno" maxlength="50" name="permitno" type="date" value="">
                                                            <span class="field-validation-valid font-red" data-valmsg-for="permitno" data-valmsg-replace="true"></span>
                                                       </div>
                                                </div>
                                                <div class="row mg-t-10">
                                                        <label class="col-md-4 form-control-label"> Status :</label>
                                                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                           <select class="form-control" data-val="true" data-val-number="The field vehicletypeid must be a number." data-val-required="Select Vehicle Type" id="ddlvehicletype" name="vehicletypeid"  style="padding:0px 6px !important;" ng-change="selectStatus()" ng-model="loadstatus"><option value="">--Select Vehicle Type--</option>
<option selected="selected" value="1">Load</option>
<option value="2">Return</option>
<option value="3">Onload</option>
<option value="4">Half</option>
<option value="5">Workshop</option>
<option value="6">Fc</option>
<option value="7">Accident</option>
</select>
                                               
                                                    </div>
                                                </div>
                                                

                                               

                                           
                                              

                                               
                                                
                                                <div class="row mg-t-10">
                                                    
                                                        <label class="col-md-4 form-control-label">Driver :</label>
                                                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                            <input class="form-control" data-val="true" data-val-length="The field bodytype must be a string with a maximum length of 100." data-val-length-max="100" data-val-required="Enter Body Type" id="bodytype" maxlength="100" name="bodytype" type="text" value="">
                                                            <span class="field-validation-valid font-red" data-valmsg-for="bodytype" data-valmsg-replace="true"></span>
                                                        <label class="col-md-12 text-left">Changed driver name </label>
                            <input class="form-control" data-val="true" data-val-length="The field bodytype must be a string with a maximum length of 100." data-val-length-max="100" data-val-required="Enter Body Type" id="bodytype" maxlength="100" name="bodytype" type="text" value="Driver Status">
                                                            <span class="field-validation-valid font-red" data-valmsg-for="bodytype" data-valmsg-replace="true"></span>
                            
                                                    </div>
                                                </div>
                                                <div class="row mg-t-10">
                                                        <label class="col-md-4 form-control-label">Advance :</label>
                                                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                            <input class="form-control" data-val="true" data-val-length="The field engineno must be a string with a maximum length of 50." data-val-length-max="50" data-val-required="Enter Engine No." id="engineno" maxlength="50" name="engineno" type="text" value="">
                                                            <span class="field-validation-valid font-red" data-valmsg-for="engineno" data-valmsg-replace="true"></span>
                                                    </div>
                                                </div>
                                                <div class="row mg-t-10">
                                                        <label class="col-md-4 form-control-label">Diesel :</label>
                                                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                            <input class="form-control" data-val="true" data-val-length="The field chasisno must be a string with a maximum length of 50." data-val-length-max="50" data-val-required="Enter Chasis No." id="chasisno" maxlength="50" name="chasisno" type="text" value="">
                                                            <span class="field-validation-valid font-red" data-valmsg-for="chasisno" data-valmsg-replace="true"></span>
                                                        </div>
                                                    </div>
                                              

                                                <div class="row mg-t-10">
                                                        <label class="col-md-4 form-control-label">Vehicle No :</label>
                                                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                            <input class="form-control" data-val="true" data-val-length="The field permitno must be a string with a maximum length of 50." data-val-length-max="50" data-val-required="Enter Permit No." id="permitno" maxlength="50" name="permitno" type="text" value="">
                                                            <span class="field-validation-valid font-red" data-valmsg-for="permitno" data-valmsg-replace="true"></span>
                                                    </div>
                                                </div>
                                                
                                                
                                                <div class="row mg-t-10">
                                                        <label class="col-md-4 form-control-label">Reff No :</label>
                                                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                            <input class="form-control" data-val="true" data-val-length="The field insurancename must be a string with a maximum length of 200." data-val-length-max="200" data-val-required="Enter Insurance Company Name" id="insurancename" maxlength="200" name="insurancename" type="text" value="">
                                                            <span class="field-validation-valid font-red" data-valmsg-for="insurancename" data-valmsg-replace="true"></span>
                                                    </div>
                                                </div>
                                                <div class="row mg-t-10">
                                                        <label class="col-md-4 form-control-label">Workshop Place :</label>
                                                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                            <input class="form-control" data-val="true" data-val-length="The field policyno must be a string with a maximum length of 50." data-val-length-max="50" data-val-required="Enter Policy No." id="policyno" maxlength="50" name="policyno" type="text" value="">
                                                            <span class="field-validation-valid font-red" data-valmsg-for="policyno" data-valmsg-replace="true"></span>
                                                    </div>
                                                </div>
                                                <div class="row mg-t-10">
                                                        <label class="col-md-4 form-control-label">From:</label>
                                                         <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                            <input class="form-control" data-val="true" data-val-length="The field policyno must be a string with a maximum length of 50." data-val-length-max="50" data-val-required="Enter Policy No." id="policyno" maxlength="50" name="policyno" type="date" value="">
                                                            <span class="field-validation-valid font-red" data-valmsg-for="policyno" data-valmsg-replace="true"></span>
                                                        </div>
                            
                            <label class="col-md-4 form-control-label">To:</label>
                                                         <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                            <input class="form-control" data-val="true" data-val-length="The field policyno must be a string with a maximum length of 50." data-val-length-max="50" data-val-required="Enter Policy No." id="policyno" maxlength="50" name="policyno" type="date" value="">
                                                            <span class="field-validation-valid font-red" data-valmsg-for="policyno" data-valmsg-replace="true"></span>
                                                        </div>
                                                </div>
                                                
                                                               


                                                            
<div class="col-md-4">
                                           <div class="row mg-t-10"> 
                                       <h6 class="card-body-title">Load Status</h6>
</div></div>
                                   
                                                                                
                                                <div class="row mg-t-10">
                                                        <label class="col-md-4 form-control-label">Date time picker :</label>
                                                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                            <input class="form-control" data-val="true" data-val-length="The field permitno must be a string with a maximum length of 50." data-val-length-max="50" data-val-required="Enter Permit No." id="permitno" maxlength="50" name="permitno" value="" type="datetime-local">
                                                            <span class="field-validation-valid font-red" data-valmsg-for="permitno" data-valmsg-replace="true"></span>
                                                        </div>
                                                    
                                                    </div>
                                                     <div class="row mg-t-10">
                                                        <label class="col-md-4 form-control-label">ACC Ref No :</label>
                                                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                            <input class="form-control" data-val="true" data-val-length="The field permitno must be a string with a maximum length of 50." data-val-length-max="50" data-val-required="Enter Permit No." id="permitno" maxlength="50" name="permitno" type="text" value="">
                                                            <span class="field-validation-valid font-red" data-valmsg-for="permitno" data-valmsg-replace="true"></span>
                                                            
                                                        </div>
                                                    </div>
                                                
                                              
                                                <div class="row mg-t-10">
                                                        <label class="col-md-4 form-control-label"> Company :</label>
                                                        <div class="col-sm-4 mg-t-5 mg-sm-t-0">
                                                           <input class="form-control" data-val="true" data-val-length="The field permitno must be a string with a maximum length of 50." data-val-length-max="50" data-val-required="Enter Permit No." id="permitno" maxlength="50" name="permitno" value="" type="text">
                                                            <span class="field-validation-valid font-red" data-valmsg-for="permitno" data-valmsg-replace="true"></span>
                                                        </div>
                            <div class="col-md-1">
                                                           <input class="form-control" data-val="true" data-val-length="The field permitno must be a string with a maximum length of 50." data-val-length-max="50" data-val-required="Enter Permit No." id="permitno" maxlength="50" name="permitno" value="" type="checkbox">
                                                            <span class="field-validation-valid font-red" data-valmsg-for="permitno" data-valmsg-replace="true"></span>
                                                        </div>
                            <label class="col-md-2 text-left"> Hire </label>

</div>
<div class="row mg-t-10">
<label class="col-md-4 form-control-label"> Transporter :</label>
<div class="col-sm-4 mg-t-5 mg-sm-t-0">
                                                           <input class="form-control" data-val="true" data-val-length="The field permitno must be a string with a maximum length of 50." data-val-length-max="50" data-val-required="Enter Permit No." id="permitno" maxlength="50" name="permitno" value="" type="text">
                                                            <span class="field-validation-valid font-red" data-valmsg-for="permitno" data-valmsg-replace="true"></span>
                                                          </div>
                                                        </div>
</div></div>


                                     
           <div class="col-xl-6">
                  <h6 class="card-body-title">Company Details</h6> 
               
               <div class="portlet-body">
                             
 <div class="row mg-t-10">
                                                        <label class="col-md-4 form-control-label"> Company :</label>
                                                       <div class="col-sm-4 mg-t-5 mg-sm-t-0">
                                                           <input class="form-control" data-val="true" data-val-length="The field permitno must be a string with a maximum length of 50." data-val-length-max="50" data-val-required="Enter Permit No." id="permitno" maxlength="50" name="permitno" value="" type="text">
                                                            <span class="field-validation-valid font-red" data-valmsg-for="permitno" data-valmsg-replace="true"></span>
                                                        </div>

                            <div class="col-md-4">
                                                           <input data-val="true" data-val-length="The field permitno must be a string with a maximum length of 50." data-val-length-max="50" data-val-required="Enter Permit No." id="permitno" maxlength="50" name="permitno" value="" class="form-control col-md-1 text-left" type="checkbox">
                              <span class="field-validation-valid font-red" data-valmsg-for="permitno" data-valmsg-replace="true"></span>
<label class="col-md-13 text-right"> Consigner / Consignee Required </label>

                                                        </div>
                                                    </div>
                                               
                                                <div class="row mg-t-10">
                                                    
                                                        <label class="col-md-4 form-control-label">ASS Log. GC No :</label>
                                                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                            <input class="form-control" data-val="true" data-val-length="The field bodytype must be a string with a maximum length of 100." data-val-length-max="100" data-val-required="Enter Body Type" id="bodytype" maxlength="100" name="bodytype" value="" type="text">
                                                            <span class="field-validation-valid font-red" data-valmsg-for="bodytype" data-valmsg-replace="true"></span>
                                                        </div>
                                            </div>


                                                <div class="row mg-t-10">
                                                        <label class="col-md-4 form-control-label">Consigner Name :</label>
                                                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                            <input class="form-control" data-val="true" data-val-length="The field permitno must be a string with a maximum length of 50." data-val-length-max="50" data-val-required="Enter Permit No." id="permitno" maxlength="50" name="permitno" value="" type="text">
                                                            <span class="field-validation-valid font-red" data-valmsg-for="permitno" data-valmsg-replace="true"></span>
                                                            
                                                        </div>
                                                    </div>
                                                    <div class="row mg-t-10">
                                                   <label class="col-md-4 form-control-label">Consignee Name :</label>
                                                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                            <input class="form-control" data-val="true" data-val-length="The field insurancename must be a string with a maximum length of 200." data-val-length-max="200" data-val-required="Enter Insurance Company Name" id="insurancename" maxlength="200" name="insurancename" value="" type="text">
                                                            <span class="field-validation-valid font-red" data-valmsg-for="insurancename" data-valmsg-replace="true"></span>
                                                        </div>
                                                    </div>
                                             
          

                                                              
<div class="col-md-4">
                                           <div class="row mg-t-10"> 
                                       <h6 class="card-body-title">Goods Details</h6>
                                        </div>

</div>

                                                <div class="row mg-t-10">
                                                        <label class="col-md-4 form-control-label">No of Articles :</label>
                                                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                            <input class="form-control" data-val="true" data-val-length="The field permitno must be a string with a maximum length of 50." data-val-length-max="50" data-val-required="Enter Permit No." id="permitno" maxlength="50" name="permitno" type="text" value="">
                                                            <span class="field-validation-valid font-red" data-valmsg-for="permitno" data-valmsg-replace="true"></span>
                                                        </div>
                                                    </div>
                        <div class="row mg-t-10">
                                                        <label class="col-md-4 form-control-label">Description :</label>
                                                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                            <input class="form-control" data-val="true" data-val-length="The field permitno must be a string with a maximum length of 50." data-val-length-max="50" data-val-required="Enter Permit No." id="permitno" maxlength="50" name="permitno" type="text" value="">
                                                            <span class="field-validation-valid font-red" data-valmsg-for="permitno" data-valmsg-replace="true"></span>
                                                        </div>
                                                    </div>
                        <div class="row mg-t-10">
                                                         <label class="col-md-4 form-control-label">GC No :</label>
                                                       <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                            <input class="form-control" data-val="true" data-val-length="The field permitno must be a string with a maximum length of 50." data-val-length-max="50" data-val-required="Enter Permit No." id="permitno" maxlength="50" name="permitno" type="text" value="">
                                                            <span class="field-validation-valid font-red" data-valmsg-for="permitno" data-valmsg-replace="true"></span>
                                                        
                                                    </div>
                                                </div> 
                        <div class="row mg-t-10">
                                                    <label class="col-md-4 form-control-label">From :</label>
                                                         <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                            <input class="form-control" data-val="true" data-val-length="The field permitno must be a string with a maximum length of 50." data-val-length-max="50" data-val-required="Enter Permit No." id="permitno" maxlength="50" name="permitno" type="text" value="">
                                                            <span class="field-validation-valid font-red" data-valmsg-for="permitno" data-valmsg-replace="true"></span>
                                                    </div>
                                                </div> 
                        <div class="row mg-t-10">
                                                    <label class="col-md-4 form-control-label">Container No :</label>
                                                       <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                            <input class="form-control" data-val="true" data-val-length="The field permitno must be a string with a maximum length of 50." data-val-length-max="50" data-val-required="Enter Permit No." id="permitno" maxlength="50" name="permitno" type="text" value="">
                                                            <span class="field-validation-valid font-red" data-valmsg-for="permitno" data-valmsg-replace="true"></span>
                                                        </div>
                                                    </div>
                        <div class="row mg-t-10">
                                                    <label class="col-md-4 form-control-label">Load Type :</label>
                                                       <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                            <input class="form-control" data-val="true" data-val-length="The field permitno must be a string with a maximum length of 50." data-val-length-max="50" data-val-required="Enter Permit No." id="permitno" maxlength="50" name="permitno" type="text" value="">
                                                            <span class="field-validation-valid font-red" data-valmsg-for="permitno" data-valmsg-replace="true"></span>
                                                    </div>
                                                </div> 
                        <div class="row mg-t-10">
                                                    <label class="col-md-4 form-control-label">Weight :</label>
                                                       <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                            <input class="form-control" data-val="true" data-val-length="The field permitno must be a string with a maximum length of 50." data-val-length-max="50" data-val-required="Enter Permit No." id="permitno" maxlength="50" name="permitno" type="text" value="">
                                                            <span class="field-validation-valid font-red" data-valmsg-for="permitno" data-valmsg-replace="true"></span>
                                                        </div>
                                                </div> 
                        <div class="row mg-t-10">
                                                    <label class="col-md-4 form-control-label">Direction :</label>
                                                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                            <input class="form-control" data-val="true" data-val-length="The field permitno must be a string with a maximum length of 50." data-val-length-max="50" data-val-required="Enter Permit No." id="permitno" maxlength="50" name="permitno" type="text" value="">
                                                            <span class="field-validation-valid font-red" data-valmsg-for="permitno" data-valmsg-replace="true"></span>
                                                </div> 
                                            </div>
                                            
                                                <div class="row mg-t-10">
                                                    <label class="col-md-4 form-control-label">Value of Goods :</label>
                                                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                            <input class="form-control" data-val="true" data-val-length="The field permitno must be a string with a maximum length of 50." data-val-length-max="50" data-val-required="Enter Permit No." id="permitno" maxlength="50" name="permitno" type="text" value="">
                                                            <span class="field-validation-valid font-red" data-valmsg-for="permitno" data-valmsg-replace="true"></span>
                                                          </div>
                                                </div>
                                                <div class="row mg-t-10">
                                                   <label class="col-md-4 form-control-label">Party Name :</label>
                                                      <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                            <input class="form-control" data-val="true" data-val-length="The field insurancename must be a string with a maximum length of 200." data-val-length-max="200" data-val-required="Enter Insurance Company Name" id="insurancename" maxlength="200" name="insurancename" type="text" value="">
                                                            <span class="field-validation-valid font-red" data-valmsg-for="insurancename" data-valmsg-replace="true"></span>
                                                    </div>
                                                </div>
                        <div class="row mg-t-10">
                                                    <label class="col-md-4 form-control-label">Reference No :</label>
                                                        <div class="col-md-6">
                                                            <input class="form-control" data-val="true" data-val-length="The field insurancename must be a string with a maximum length of 200." data-val-length-max="200" data-val-required="Enter Insurance Company Name" id="insurancename" maxlength="200" name="insurancename" type="text" value="">
                                                            <span class="field-validation-valid font-red" data-valmsg-for="insurancename" data-valmsg-replace="true"></span>
                                                    </div>
                                                </div>
                        <div class="row mg-t-10">
                                                    <label class="col-md-4 form-control-label">To :</label>
                                                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                            <input class="form-control" data-val="true" data-val-length="The field insurancename must be a string with a maximum length of 200." data-val-length-max="200" data-val-required="Enter Insurance Company Name" id="insurancename" maxlength="200" name="insurancename" type="text" value="">
                                                            <span class="field-validation-valid font-red" data-valmsg-for="insurancename" data-valmsg-replace="true"></span>
                                                    </div>
                                                </div>
                        <div class="row mg-t-10">
                                                    <label class="col-md-4 form-control-label">Container Size :</label>
                                                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                            <input class="form-control" data-val="true" data-val-length="The field insurancename must be a string with a maximum length of 200." data-val-length-max="200" data-val-required="Enter Insurance Company Name" id="insurancename" maxlength="200" name="insurancename" type="text" value="">
                                                            <span class="field-validation-valid font-red" data-valmsg-for="insurancename" data-valmsg-replace="true"></span>
                                                    </div>
                                                </div>
                        <div class="row mg-t-10">
                                                    <label class="col-md-4 form-control-label">Seal No :</label>
                                                         <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                            <input class="form-control" data-val="true" data-val-length="The field insurancename must be a string with a maximum length of 200." data-val-length-max="200" data-val-required="Enter Insurance Company Name" id="insurancename" maxlength="200" name="insurancename" type="text" value="">
                                                            <span class="field-validation-valid font-red" data-valmsg-for="insurancename" data-valmsg-replace="true"></span>
                                                    </div>
                                                </div>
                        <div class="row mg-t-10">
                                                    <label class="col-md-4 form-control-label">Remarks :</label>
                                                         <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                            <input class="form-control" data-val="true" data-val-length="The field insurancename must be a string with a maximum length of 200." data-val-length-max="200" data-val-required="Enter Insurance Company Name" id="insurancename" maxlength="200" name="insurancename" type="text" value="">
                                                            <span class="field-validation-valid font-red" data-valmsg-for="insurancename" data-valmsg-replace="true"></span>
                                                    </div>
                                                </div>




                                  </div></div></div>

                       <div class="form-layout-footer mg-t-30">
                <button type="submit" value="submit" name="submit" class="btn btn-info mg-r-5">Submit</button>
                <button class="btn btn-secondary">Cancel</button>
              </div>


                                    

          
        
 
</div>
      </div><!-- am-pagebody -->
    </form>
      <?php include('../include/adminfooter.php'); ?> 
     