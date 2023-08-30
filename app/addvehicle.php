<?php include('../include/dbConnect.php'); ?>
<?php include('../include/checklogin.php'); ?>
<?php include('../include/adminheader.php'); ?>
<?php include('../include/header.php'); ?>
<?php include('../include/leftmenu.php'); 
      require('../include/basefunctions.php');
      ?> 

<?php
function incrementalHash($len){
  $charset = "0123456789";
  $base = strlen($charset);
  $result = '';

  $now = explode(' ', microtime())[1];
  while ($now >= $base){
    $i = $now % $base;
    $result = $charset[$i] . $result;
    $now /= $base;
  }
  return substr($result, -5);
}



$data = new Basefunc;  
if(isset($_POST['submit'])){

 if($_REQUEST['action'] == "Add"){

/*
echo '<script> alert("per1'.$_POST['permitvaliditydate'].'");</script>';
echo '<script> alert("fc'.$_POST['fcvaldte'].'");</script>';
echo '<script> alert("per2'.$_POST['permitvaliditydate2'].'");</script>';
echo '<script> alert("Road'.$_POST['roadtaxvaldte'].'");</script>';
echo '<script> alert("Pol'.$_POST['policyvaliditydate'].'");</script>';


die;*/
$vechcode=incrementalHash(4);
  
  
  $target = "docs/";  
  $fileName1 = $_FILES['inscopy']['name'];
  $fileName2 = $_FILES['fccopy']['name'];
  $fileName3 = $_FILES['rccopy']['name'];
  $fileName4 = $_FILES['permit1']['name'];
  $fileName5 = $_FILES['permit2']['name'];
  $fileName6 = $_FILES['roadtaxcpy']['name'];

  $insert_vech = array(
     "intAdminId"         =>     mysqli_real_escape_string($data->con, $_SESSION['MintId']),    
     "vechcode"           =>     mysqli_real_escape_string($data->con, $vechcode),  
      "vechNo"            =>     mysqli_real_escape_string($data->con, $_POST['vehicleno']),  
      "vechOwner"         =>     mysqli_real_escape_string($data->con, $_POST['partyid']), 
      "chasisNum"         =>     mysqli_real_escape_string($data->con, $_POST['chasisno']), 
      "engno"             =>     mysqli_real_escape_string($data->con, $_POST['engno']),  
      "gvw"               =>     mysqli_real_escape_string($data->con, $_POST['gvwno']), 
      "tyrenos"           =>     mysqli_real_escape_string($data->con, $_POST['tyrenos']), 
      "vechmake"          =>     mysqli_real_escape_string($data->con, $_POST['vechmake']),  
      "bdytype"           =>     mysqli_real_escape_string($data->con, $_POST['vechbdytype']), 
      "vechtype"          =>     mysqli_real_escape_string($data->con, $_POST['vechtype']), 
      "permitNum"         =>     mysqli_real_escape_string($data->con, $_POST['permitno']), 
      "vechcolour"        =>     mysqli_real_escape_string($data->con, $_POST['vechcolour']),
      "fcValdte"          =>     mysqli_real_escape_string($data->con, $_POST['fcvaldte']),
      "permit2"           =>     mysqli_real_escape_string($data->con, $_POST['permitno2']), 
      "perValDte"        =>     mysqli_real_escape_string($data->con, $_POST['permitvaliditydate']),
      "per2valdte"        =>     mysqli_real_escape_string($data->con, $_POST['permitvaliditydate2']),
      "rdtaxval"          =>     mysqli_real_escape_string($data->con, $_POST['roadtaxvaldte']),
      "insurance"         =>     mysqli_real_escape_string($data->con, $_POST['insurancename']),  
      "policyNum"         =>     mysqli_real_escape_string($data->con, $_POST['policyno']), 
      "current_kms"       =>     mysqli_real_escape_string($data->con, $_POST['kms']),
      "policyValDte"      =>     mysqli_real_escape_string($data->con, $_POST['policyvaliditydate'])
      );
       $insid = $data->insert('vehicles', $insert_vech);
   
  $update_id = array(
      "id"      =>    mysqli_real_escape_string($data->con, $insid)
    );
    if($fileName1!='')
    {
      /*echo '<script> alert("Entered");</script>';*/

      $fileTarget1   = $target.$insid.'_'.$fileName1;
      $tempFileName1 = $_FILES["inscopy"]["tmp_name"];
      move_uploaded_file($tempFileName1,$fileTarget1);

      $upd_img = array(
        "inscopy" =>     mysqli_real_escape_string($data->con, $insid.'_'.$fileName1)
      );

      $update = $data->update('vehicles', $upd_img,$update_id);
    }
    if($fileName2!='')
    {
       /*echo '<script> alert("Entered2");</script>';*/
      $fileTarget2   = $target.$insid.'_'.$fileName2;
      $tempFileName2 = $_FILES["fccopy"]["tmp_name"];        
      move_uploaded_file($tempFileName2,$fileTarget2);
      $upd_img2 = array(
        "fccopy"  =>     mysqli_real_escape_string($data->con, $insid.'_'.$fileName2)
      );

      $update = $data->update('vehicles', $upd_img2,$update_id);
    }

    if($fileName3!='')
    {
       /*echo '<script> alert("Entered3");</script>';*/
      $fileTarget3   = $target.$insid.'_'.$fileName3;    
      $tempFileName3 = $_FILES["rccopy"]["tmp_name"];     
      move_uploaded_file($tempFileName3,$fileTarget3);
      $upd_img3 = array(
        "rccopy"     =>     mysqli_real_escape_string($data->con, $insid.'_'.$fileName3)
      );

      $update = $data->update('vehicles', $upd_img3,$update_id);
    }
    if($fileName4!='')
    {
/*       echo '<script> alert("Entered4");</script>';*/
      $fileTarget4   = $target.$insid.'_'.$fileName4;    
      $tempFileName4 = $_FILES["permit1"]["tmp_name"];     
      move_uploaded_file($tempFileName4,$fileTarget4);
      $upd_img4 = array(
        "permit1doc"     =>     mysqli_real_escape_string($data->con, $insid.'_'.$fileName4)
      );

      $update = $data->update('vehicles', $upd_img4,$update_id);
    }
    if($fileName5!='')
    {
      $fileTarget5   = $target.$insid.'_'.$fileName5;    
      $tempFileName5 = $_FILES["permit2"]["tmp_name"];     
      move_uploaded_file($tempFileName5,$fileTarget5);
      $upd_img5 = array(
        "permit2doc"     =>     mysqli_real_escape_string($data->con, $insid.'_'.$fileName5)
      );

      $update = $data->update('vehicles', $upd_img5,$update_id);
    }

  if($fileName6!='')
    {
      $fileTarget6   = $target.$insid.'_'.$fileName6;    
      $tempFileName6 = $_FILES["roadtaxcpy"]["tmp_name"];     
      move_uploaded_file($tempFileName6,$fileTarget6);
      $upd_img6 = array(
        "roadtaxcpy"     =>     mysqli_real_escape_string($data->con, $insid.'_'.$fileName6)
      );

      $update = $data->update('vehicles', $upd_img6,$update_id);
    }

   if($insid){

    echo '<script> alert("Vehicle Added Successfully");window.location.assign("addvehicle.php");</script>';
   } 
   else{
    echo '<script> alert("Error");</script>';
   }
}

else
{

/*echo '<script> alert("per1'.$_POST['permitvaliditydate'].'");</script>';
echo '<script> alert("fc'.$_POST['fcvaldte'].'");</script>';
echo '<script> alert("per2'.$_POST['permitvaliditydate2'].'");</script>';
echo '<script> alert("Road'.$_POST['roadtaxvaldte'].'");</script>';
echo '<script> alert("Pol'.$_POST['policyvaliditydate'].'");</script>';
die;*/

$update_vech = array(
       "intAdminId"      =>     mysqli_real_escape_string($data->con, $_SESSION['MintId']),    
      "vechNo"           =>     mysqli_real_escape_string($data->con, $_POST['vehicleno']),  
      "vechOwner"        =>     mysqli_real_escape_string($data->con, $_POST['partyid']), 
      "chasisNum"        =>     mysqli_real_escape_string($data->con, $_POST['chasisno']), 
      "engno"            =>     mysqli_real_escape_string($data->con, $_POST['engno']),  
      "gvw"              =>     mysqli_real_escape_string($data->con, $_POST['gvwno']), 
      "tyrenos"          =>     mysqli_real_escape_string($data->con, $_POST['tyrenos']), 
      "vechmake"         =>     mysqli_real_escape_string($data->con, $_POST['vechmake']),  
      "bdytype"          =>     mysqli_real_escape_string($data->con, $_POST['vechbdytype']), 
      "vechtype"         =>     mysqli_real_escape_string($data->con, $_POST['vechtype']), 
      "vechcolour"       =>     mysqli_real_escape_string($data->con, $_POST['vechcolour']),
      "permitNum"        =>     mysqli_real_escape_string($data->con, $_POST['permitno']), 
      "perValDte"        =>     mysqli_real_escape_string($data->con, $_POST['permitvaliditydate']),
      "fcValdte"         =>     mysqli_real_escape_string($data->con, $_POST['fcvaldte']),
      "permit2"          =>     mysqli_real_escape_string($data->con, $_POST['permitno2']), 
      "per2valdte"       =>     mysqli_real_escape_string($data->con, $_POST['permitvaliditydate2']),
      "rdtaxval"         =>     mysqli_real_escape_string($data->con, $_POST['roadtaxvaldte']),
      "insurance"        =>     mysqli_real_escape_string($data->con, $_POST['insurancename']),  
      "policyNum"        =>     mysqli_real_escape_string($data->con, $_POST['policyno']), 
      "policyValDte"     =>     mysqli_real_escape_string($data->con, $_POST['policyvaliditydate'])
/*      "inscopy"         =>     mysqli_real_escape_string($data->con, $_POST['inscopy']),
      "fccopy"         =>     mysqli_real_escape_string($data->con, $_POST['fccopy']),
      "rccopy"         =>     mysqli_real_escape_string($data->con, $_POST['rccopy']),  
      "permit1doc"         =>     mysqli_real_escape_string($data->con, $_POST['permit1']), 
      "permit2doc"      =>     mysqli_real_escape_string($data->con, $_POST['permit2']),
       "roadtaxcpy"      =>     mysqli_real_escape_string($data->con, $_POST['roadtaxcpy'])*/

      );  
 $id =$_REQUEST['id'];
 $update_id = array(
      "id"      =>    mysqli_real_escape_string($data->con, $id)
    );

       $insid = $data->update('vehicles', $update_vech, $update_id);
  $target = "docs/";  
  $fileName1 = $_FILES['inscopy']['name'];
  $fileName2 = $_FILES['fccopy']['name'];
  $fileName3 = $_FILES['rccopy']['name'];
  $fileName4 = $_FILES['permit1']['name'];
  $fileName5 = $_FILES['permit2']['name'];
  $fileName6 = $_FILES['roadtaxcpy']['name'];



    if($fileName1!='')
    {
      /*echo '<script> alert("Entered");</script>';*/

      $fileTarget1   = $target.$id.'_'.$fileName1;
      $tempFileName1 = $_FILES["inscopy"]["tmp_name"];
      move_uploaded_file($tempFileName1,$fileTarget1);

      $upd_img = array(
        "inscopy" =>     mysqli_real_escape_string($data->con, $id.'_'.$fileName1)
      );

      $update = $data->update('vehicles', $upd_img,$update_id);
    }
    if($fileName2!='')
    {
       /*echo '<script> alert("Entered2");</script>';*/
      $fileTarget2   = $target.$id.'_'.$fileName2;
      $tempFileName2 = $_FILES["fccopy"]["tmp_name"];        
      move_uploaded_file($tempFileName2,$fileTarget2);
      $upd_img2 = array(
        "fccopy"  =>     mysqli_real_escape_string($data->con, $id.'_'.$fileName2)
      );

      $update = $data->update('vehicles', $upd_img2,$update_id);
    }

    if($fileName3!='')
    {
       /*echo '<script> alert("Entered3");</script>';*/
      $fileTarget3   = $target.$id.'_'.$fileName3;    
      $tempFileName3 = $_FILES["rccopy"]["tmp_name"];     
      move_uploaded_file($tempFileName3,$fileTarget3);
      $upd_img3 = array(
        "rccopy"     =>     mysqli_real_escape_string($data->con, $id.'_'.$fileName3)
      );

      $update = $data->update('vehicles', $upd_img3,$update_id);
    }
    if($fileName4!='')
    {
      /* echo '<script> alert("Entered4");</script>';*/
      $fileTarget4   = $target.$id.'_'.$fileName4;    
      $tempFileName4 = $_FILES["permit1"]["tmp_name"];     
      move_uploaded_file($tempFileName4,$fileTarget4);
      $upd_img4 = array(
        "permit1doc"     =>     mysqli_real_escape_string($data->con, $id.'_'.$fileName4)
      );

      $update = $data->update('vehicles', $upd_img4,$update_id);
    }
    if($fileName5!='')
    {
      $fileTarget5   = $target.$id.'_'.$fileName5;    
      $tempFileName5 = $_FILES["permit2"]["tmp_name"];     
      move_uploaded_file($tempFileName5,$fileTarget5);
      $upd_img5 = array(
        "permit2doc"     =>     mysqli_real_escape_string($data->con, $id.'_'.$fileName5)
      );

      $update = $data->update('vehicles', $upd_img5,$update_id);
    }

  if($fileName6!='')
    {
      $fileTarget6   = $target.$id.'_'.$fileName6;    
      $tempFileName6 = $_FILES["roadtaxcpy"]["tmp_name"];     
      move_uploaded_file($tempFileName6,$fileTarget6);
      $upd_img6 = array(
        "roadtaxcpy"     =>     mysqli_real_escape_string($data->con, $id.'_'.$fileName6)
      );

      $update = $data->update('vehicles', $upd_img6,$update_id);
    }















      if($insid){

    echo '<script> alert("Vehicle Altered Successfully");window.location.assign("viewvehicle.php");</script>';
   } 
   else{
    echo '<script> alert("Error in Updating");</script>';
   }

}

  
}

 if($_REQUEST['flag'] == "Edit"){
 $id =$_REQUEST['id'];

    $update_id = array(
      "id"      =>    mysqli_real_escape_string($data->con, $id)
    );

    $insid = $data->select_where('vehicles', $update_id);
 }

?> 


<script>
function empty()
{ 

/*  alert("value");*/
var comp = $('#vehicleno').val();
var contactper = $('#partyid').val();
/*var contact = $('#datepicker001').val();*/
/*var mob = $('#mobileno').val();
var gst = $('#gst').val();
var pan = $('#pan').val();
var aadhar = $('#aadharno').val();
*/



if(comp.trim()=="" || contactper.trim()=="" )
{

$('#sub').attr('disabled', true);
}
else
{
  $('#sub').attr('disabled', false);
}
}

</script>



    <div class="am-mainpanel">
      <div class="am-pagetitle">
        <h5 class="am-title">Vehicle Master</h5>
      
          
        <!-- search-bar -->
      </div>
      <!-- am-pagetitle -->
        <form id="searchBar" class="search-bar"  method="POST" action="" enctype="multipart/form-data">
      <div class="am-pagebody">
 <div class="card pd-20 pd-sm-40 form-layout form-layout-4 mg-t-30 mg-sm-b-30">
       <div class="row row-sm mg-t-0">
          <div class="col-xl-6">
           
            <div class="portlet-body">
                                          <h6 class="card-body-title">Vehicle Details</h6>
                                                                                
                                           <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.16.0/jquery.validate.min.js"></script> 
<script>
//alert("hi");
$(document).ready( function () {
    $( "#searchBar" ).validate( {
    
        rules: {
          vehicleno: "required"
             /*       contactperson: {
            required: true,
            minlength: 3
          },
           gst: {
            required: true,
            minlength: 15
          },
          pan: {
            required: true,
            minlength: 10
          }, 
          mobileno: {
            required: true,
            minlength: 10
          },
       
               postcode: {
            required: true,
            minlength: 6
          },
            
        
          email: {
            required: true,
            email: true
          }*/
          },
        messages: {
          vehicleno: "Please enter your Vehicle Number"
         /* contactperson: {
            required: "Please enter Contact Person Name",
            minlength: "Your Personname must consist of at least 2 characters"
          },
           gst: {
            required: "Please enter GST/TIN Number",
            minlength: "Your GST must consist of 15 digits"
          },
          pan: {
            required: "Please enter PAN Number",
            minlength: "Your PAN must consist of 10 digits"
          },
          mobileno: {
            required: "Please enter MobileNo",
            minlength: "Your MobileNo must consist of 10 digits"
          },
             
          postcode: {
            required: "Please enter Pincode Number",
            minlength: "Your Pincode must consist of 6 digits"
          },
            
          email: "Please enter a valid email address"*/
            },
        errorElement: "em",
        errorPlacement: function ( error, element ) {
          // Add the `help-block` class to the error element
          error.addClass( "help-block" );

           if ( element.prop( "type" ) === "checkbox" ) {
            error.insertAfter( element.parent( "label" ) );
          } else {
            error.insertAfter( element );
          } 
        }, 
        highlight: function ( element, errorClass, validClass ) {
          $( element ).parents( ".col-sm-8" ).addClass( "has-error" ).removeClass( "has-success" );
        },
        unhighlight: function (element, errorClass, validClass) {
          $( element ).parents( ".col-sm-8" ).addClass( "has-success" ).removeClass( "has-error" );
        }
        
      } );  

  

});


$(window).on('load', function()  {
fetch_data();
});
</script>                            
                                                                    
                                                <div class="row mg-t-30">
                                                    
                                                        <label class="col-md-4 form-control-label"> Vehicle No. :<p style="color: red;">*</p></label>
                                                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                            <input class="form-control valid" data-val="true" data-val-length="The field vehicleno must be a string with a maximum length of 100." data-val-length-max="100" placeholder="Enter Vehicle No." id="vehicleno" maxlength="10" name="vehicleno" type="text" value="<?php echo $insid[0]['vechNo']; ?>" >
                                                            <span class="font-red field-validation-valid" data-valmsg-for="vehicleno" data-valmsg-replace="true"></span>
                                                      
                                                    </div>
                                                </div>

                                               

<div class="row mg-t-30">
                                                            
                                                                <label class="col-md-4 form-control-label">Vehicle Transporter:<p style="color: red;">*</p></label>
                                                                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                                    <select   name="partyid" id="partyid" class="form-control" required onchange="empty()">





<!-- <option value="">Select </option> -->
<?php

$name=$_SESSION['name'];

 $query =mysqli_query($conn,"SELECT * FROM transporters WHERE name='$name'");
while($row=mysqli_fetch_array($query))
{ ?>
<option value="<?php echo $row['name'];?>" <?php if($row['name']==$insid[0]['vechOwner']) echo 'selected="selected"'; ?> ><?php echo $row['name'];?></option>
<?php
}
?>
</select>
                                                                    <span class="field-validation-valid font-red" data-valmsg-for="stateid" data-valmsg-replace="true"></span>
                                                                
                                                            </div>
                                                        </div>                                           
                                          <!-- 
                                                <div class="row mg-t-10">
                                                    
                                                        <label class="col-md-4 form-control-label">Engine No :</label>
                                                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                            <input class="form-control valid" data-val="true" data-val-length="The field engineno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Enter Engine No." id="engineno" maxlength="50" name="engineno" type="text" value="SDASDA">
                                                            <span class="font-red field-validation-valid" data-valmsg-for="engineno" data-valmsg-replace="true"></span>
                                                      
                                                    </div>
                                                </div>  -->
                                                <div class="row mg-t-30">
                                                   <label class="col-md-4 form-control-label">Chasis No :</label>
                                                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                            <input class="form-control valid" data-val="true" data-val-length="The field chasisno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Enter Chasis No." id="chasisno" maxlength="50" name="chasisno" type="text" value="<?php echo $insid[0]['chasisNum']; ?>">
                                                            <span class="font-red field-validation-valid" data-valmsg-for="chasisno" data-valmsg-replace="true"></span>
                                                    </div>
                                                </div>
                                                  <div class="row mg-t-30">
                                                   <label class="col-md-4 form-control-label">Engine No :</label>
                                                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                            <input class="form-control valid" data-val="true" data-val-length="The field chasisno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Enter Engine No." id="engno" maxlength="50" name="engno" type="text" value="<?php echo $insid[0]['engno']; ?>">
                                                            <span class="font-red field-validation-valid" data-valmsg-for="chasisno" data-valmsg-replace="true"></span>
                                                    </div>
                                                </div>
                                                
                                         <div class="row mg-t-30">
                                                   <label class="col-md-4 form-control-label">GVW :</label>
                                                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                            <input class="form-control valid" data-val="true" data-val-length="The field chasisno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Enter GVW No." id="gvwno" maxlength="50" name="gvwno" type="text" value="<?php echo $insid[0]['gvw']; ?>">
                                                            <span class="font-red field-validation-valid" data-valmsg-for="chasisno" data-valmsg-replace="true"></span>
                                                    </div>
                                                </div>
<div class="row mg-t-30">
                                                    
                                                        <label class="col-md-4 form-control-label">No of Tyre's:</label>
                                                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                            <input class="form-control" data-val="true" data-val-length="The field permitno must be a string with a maximum length of 50." data-val-length-max="15" placeholder="Enter No. of Tyres" id="tyrenos" maxlength="15" name="tyrenos" type="text" value="<?php echo $insid[0]['tyrenos']; ?>">
                                                            <span class="field-validation-valid font-red" data-valmsg-for="permitno" data-valmsg-replace="true"></span>
                                                        
                                                    </div>
                                                </div>
                                                <div class="row mg-t-30">
                                                    
                                                        <label class="col-md-4 form-control-label">Vehicle Make:</label>
                                                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                            <input class="form-control" data-val="true" data-val-length="The field permitno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Enter Vehicle Make" id="vechmake" maxlength="50" name="vechmake" type="text" value="<?php echo $insid[0]['vechmake']; ?>">
                                                            <span class="field-validation-valid font-red" data-valmsg-for="permitno" data-valmsg-replace="true"></span>
                                                        
                                                    </div>
                                                </div>
                                                 <div class="row mg-t-30">
                                                    
                                                        <label class="col-md-4 form-control-label">Vehicle Type:</label>
                                                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                            <input class="form-control" data-val="true" data-val-length="The field permitno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Enter Vehicle Type" id="vechtype" maxlength="50" name="vechtype" type="text" value="<?php echo $insid[0]['vechtype']; ?>">
                                                            <span class="field-validation-valid font-red" data-valmsg-for="permitno" data-valmsg-replace="true"></span>
                                                        
                                                    </div>
                                                </div>
                                                <div class="row mg-t-30">
                                                    
                                                        <label class="col-md-4 form-control-label">Body Type:</label>
                                                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                            <input class="form-control" data-val="true" data-val-length="The field permitno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Enter Body Type" id="vechbdytype" maxlength="50" name="vechbdytype" type="text" value="<?php echo $insid[0]['bdytype']; ?>">
                                                            <span class="field-validation-valid font-red" data-valmsg-for="permitno" data-valmsg-replace="true"></span>
                                                        
                                                    </div>
                                                </div>

                                                 <div class="row mg-t-30">
                                                    
                                                        <label class="col-md-4 form-control-label">Vehicle Colour:</label>
                                                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                            <input class="form-control" data-val="true" data-val-length="The field permitno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Enter Vehicle Colour" id="vechcolour" maxlength="50" name="vechcolour" type="text" value="<?php echo $insid[0]['vechcolour']; ?>">
                                                            <span class="field-validation-valid font-red" data-valmsg-for="permitno" data-valmsg-replace="true"></span>
                                                        
                                                    </div>
                                                </div>
                                               
                                                <div class="row mg-t-30">
                                                        <label class="col-md-4 form-control-label">FC Validity Date:</label>
                                                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                          
            <div class="input-group">
              <span class="input-group-addon"><i class="icon ion-calendar tx-16 lh-0 op-6"></i></span>
              <input class="form-control datepicker" placeholder="DD/MM/YYYY" name="fcvaldte" id="datepicker0012" type="text" value="<?php if($insid[0]['fcValdte']==""){ echo date('d/m/Y'); }else { echo $insid[0]['fcValdte']; }?>" >
            </div>
          
                                                            <span class="field-validation-valid font-red" data-valmsg-for="permitvaliditydate" data-valmsg-replace="true"></span>
                                                             </div>
                                                 
                                               
</div></div>

                                                <div class="row mg-t-30">
                                                    
                                                        <label class="col-md-4 form-control-label">TN Permit No :</label>
                                                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                            <input class="form-control" data-val="true" data-val-length="The field permitno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Enter TN Permit No." id="permitno" maxlength="50" name="permitno" type="text" value="<?php echo $insid[0]['permitNum']; ?>">
                                                            <span class="field-validation-valid font-red" data-valmsg-for="permitno" data-valmsg-replace="true"></span>
                                                        
                                                    </div>
                                                </div>
                                               



<div class="row mg-t-30">
                                                        <label class="col-md-4 form-control-label">TN Permit Validity:</label>
                                                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                          
            <div class="input-group">
              <span class="input-group-addon"><i class="icon ion-calendar tx-16 lh-0 op-6"></i></span>
              <input class="form-control datepicker" placeholder="DD/MM/YYYY" name="permitvaliditydate" id="datepicker001" type="text" value="<?php if($insid[0]['perValDte']==""){ echo date('d/m/Y'); }else { echo $insid[0]['perValDte']; }?>" >
            </div>
          
                                                            <span class="field-validation-valid font-red" data-valmsg-for="permitvaliditydate" data-valmsg-replace="true"></span>
                                                             </div>
                                                </div>  
                                                                 <div class="row mg-t-30">
                                                    
                                                        <label class="col-md-4 form-control-label">National Permit No :</label>
                                                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                            <input class="form-control" data-val="true" data-val-length="The field permitno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Enter National Permit No." id="permitno2" maxlength="50" name="permitno2" type="text" value="<?php echo $insid[0]['permit2']; ?>">
                                                            <span class="field-validation-valid font-red" data-valmsg-for="permitno" data-valmsg-replace="true"></span>
                                                        
                                                    </div>
                                                </div>
<div class="row mg-t-30">
                                                        <label class="col-md-4 form-control-label">National Permit Validity:</label>
                                                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                          
            <div class="input-group">
              <span class="input-group-addon"><i class="icon ion-calendar tx-16 lh-0 op-6"></i></span>
              <input class="form-control datepicker" placeholder="DD/MM/YYYY" name="permitvaliditydate2" id="datepicker006" type="text" value="<?php if($insid[0]['per2valdte']==""){ echo date('d/m/Y'); }else { echo $insid[0]['per2valdte']; }?>" >
            </div>
          
                                                            <span class="field-validation-valid font-red" data-valmsg-for="permitvaliditydate" data-valmsg-replace="true"></span>
                                                             </div>
                                                </div>  

</div> 


                                                <div class="col-xl-6">
                   
               
               <div class="portlet-body">




<div class="row mg-t-70">
                                                        <label class="col-md-4 form-control-label">Road Tax Validity:</label>
                                                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                          
            <div class="input-group">
              <span class="input-group-addon"><i class="icon ion-calendar tx-16 lh-0 op-6"></i></span>
              <input class="form-control datepicker" placeholder="DD/MM/YYYY" name="roadtaxvaldte" id="datepicker0011" type="text" value="<?php if($insid[0]['rdtaxval']==""){ echo date('d/m/Y'); }else { echo $insid[0]['rdtaxval']; }?>" >
            </div>
          
                                                            <span class="field-validation-valid font-red" data-valmsg-for="permitvaliditydate" data-valmsg-replace="true"></span>
                                                             </div>
                                                </div>  

                                                <div class="row mg-t-30">
                                                  <label class="col-md-4 form-control-label">Insurance company :</label>
                                                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                            <input class="form-control" data-val="true" data-val-length="The field insurancename must be a string with a maximum length of 200." data-val-length-max="200" placeholder="Enter Insurance Company Name" id="insurancename" maxlength="200" name="insurancename" type="text" value="<?php echo $insid[0]['insurance']; ?>">
                                                            <span class="field-validation-valid font-red" data-valmsg-for="insurancename" data-valmsg-replace="true"></span>                                                      
                                                    </div>
                                                </div>
                                                <div class="row mg-t-30">
                                                        <label class="col-md-4 form-control-label">Policy No.:</label>
                                                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                            <input class="form-control" data-val="true" data-val-length="The field policyno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Enter Policy No." id="policyno" maxlength="50" name="policyno" type="text" value="<?php echo $insid[0]['policyNum']; ?>">
                                                            <span class="field-validation-valid font-red" data-valmsg-for="policyno" data-valmsg-replace="true"></span>
                                                    </div>
                                                </div>


                                                <div class="row mg-t-30">
                                                        <label class="col-md-4 form-control-label">Policy Validity:</label>
                                                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
<div class="input-group">
              <span class="input-group-addon"><i class="icon ion-calendar tx-16 lh-0 op-6"></i></span>
              <input class="form-control datepicker" placeholder="DD/MM/YYYY" name="policyvaliditydate" id="datepicker002" type="text" value="<?php if($insid[0]['perValDte']==""){ echo date('d/m/Y'); }else { echo $insid[0]['policyValDte']; }?>" >
            </div>
      
                                                            <span class="field-validation-valid font-red" data-valmsg-for="policyvaliditydate" data-valmsg-replace="true"></span>
                                                    </div>
                                                </div>

 <div class="row mg-t-30">
                                                        <label class="col-md-4 form-control-label">Current Kms:</label>
                                                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
<div class="input-group">
           
              <input class="form-control" placeholder="Current Kilometers" maxlength="15" name="kms" id="kms" type="text" value="<?php  echo $insid[0]['current_kms']; ?>" >
            </div>
      
                                                            <span class="field-validation-valid font-red" data-valmsg-for="policyvaliditydate" data-valmsg-replace="true"></span>
                                                    </div>
                                                </div>




<div class="col-md-4 mg-t-30">
     <div class="row mg-t-10"> 
       <h6 class="card-body-title">Document Uploads</h6>
     </div>

   </div>

   <div class="row mg-t-30">
              <label class="col-md-4 form-control-label">RC :</label>
              <div class="col-sm-8 mg-t-10 mg-sm-t-0">

<!-- <div class="box" style="border:3px solid #232e40;">
          <input type="file" name="file-7[]" id="file-7" class="inputfile inputfile-6" data-multiple-caption="{count} files selected" multiple />
          <label for="file-7"><span></span> <strong><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg> Choose a file&hellip;</strong></label>
        </div> -->
        
                <div class="js">
                 <?php if($insid[0]['rccopy']!="")
                 {?>
                  <a href="docs/<?php echo $insid[0]['rccopy']; ?>"  target="_blank"> <img src="docs/defaulticon.ico" width="25px"><?php echo substr($insid[0]['rccopy'],0,7); ?></a>
     
                  <?php }
                  ?>

                  <!-- <input type="file" name="rccopy">  -->
                  <div class="box">
          <input type="file" name="rccopy" id="file-7" onchange="rcname(this.value)" class="inputfile inputfile-6" data-multiple-caption="{count} files selected" multiple />
          <label for="file-7"><span id="rcupd"> </span> <strong><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg> Choose a file&hellip;</strong></label>
        </div>

                </div>

<script>
function rcname(val)
{

  var fileNameIndex = val.replace(/C:\\fakepath\\/i, '');
$('#rcupd').text(fileNameIndex);

}

</script>



        
        </div></div>
   <div class="row mg-t-30">
    <label class="col-md-4 form-control-label">Insurance Copy :</label>
    <div class="col-sm-8 mg-t-10 mg-sm-t-0">
<div class="js">
      <?php if($insid[0]['inscopy']!="")
      {?>
        <a href="docs/<?php echo $insid[0]['inscopy']; ?>" target="_blank" > <img src="docs/defaulticon.ico" width="25px"><?php echo substr($insid[0]['inscopy'],0,7); ?></a>
       
        <?php }
        ?>



       <!--  <input type="file" name="inscopy">  -->

             <div class="box">
          <input type="file" name="inscopy" id="file-8" onchange="insname(this.value)" class="inputfile inputfile-6" data-multiple-caption="{count} files selected" multiple />
          <label for="file-8"><span id="insurecpy"></span> <strong><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg> Choose a file&hellip;</strong></label>
        </div>
    </div>



    <script>
function insname(val)
{

  var fileNameIndex = val.replace(/C:\\fakepath\\/i, '');
$('#insurecpy').text(fileNameIndex);

}

</script>

        <div>  
        </div> </div></div>
        <div class="row mg-t-30">
         
          <label class="col-md-4 form-control-label">FC Copy :</label>
          <div class="col-sm-8 mg-t-10 mg-sm-t-0">


            <div class="js">
      
             <?php if($insid[0]['fccopy']!="")
             {?>
              <a href="docs/<?php echo $insid[0]['fccopy']; ?>" target="_blank" > <img src="docs/defaulticon.ico" width="25px"><?php echo substr($insid[0]['fccopy'],0,7); ?></a>
      
              <?php }
              ?>
<!-- 
              <input type="file" name="fccopy">  -->
                 <div class="box" >
          <input type="file" name="fccopy" id="file-9" onchange="fcname(this.value)" class="inputfile inputfile-6" data-multiple-caption="{count} files selected" multiple />
          <label for="file-9"><span id="fcname"></span> <strong><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg> Choose a file&hellip;</strong></label>
        </div>

            </div></div></div>
            

    <script>
function fcname(val)
{

  var fileNameIndex = val.replace(/C:\\fakepath\\/i, '');
$('#fcname').text(fileNameIndex);

}

</script>




 <div class="row mg-t-30">
              <label class="col-md-4 form-control-label">TN Permit  :</label>
              <div class="col-sm-8 mg-t-10 mg-sm-t-0">


                <div class="js">
                 <?php if($insid[0]['permit1doc']!="")
                 {?>
                  <a href="docs/<?php echo $insid[0]['permit1doc']; ?>"  target="_blank"> <img src="docs/defaulticon.ico" width="25px"><?php echo substr($insid[0]['permit1doc'],0,7); ?></a>

                  <?php }
                  ?>

<!--                   <input type="file" name="permit1">  -->


   <div class="box">
          <input type="file" name="permit1" id="file-1" onchange="per1mae(this.value)" class="inputfile inputfile-6" data-multiple-caption="{count} files selected" multiple />
          <label for="file-1"><span id="per1"></span> <strong><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg> Choose a file&hellip;</strong></label>
        </div>


                </div></div></div>

                    <script>
function per1mae(val)
{

  var fileNameIndex = val.replace(/C:\\fakepath\\/i, '');
$('#per1').text(fileNameIndex);

}

</script>
   <div class="row mg-t-30">
              <label class="col-md-4 form-control-label">National Permit :</label>
              <div class="col-sm-8 mg-t-10 mg-sm-t-0">


                <div class="js">
                 <?php if($insid[0]['permit2doc']!="")
                 {?>
                  <a href="docs/<?php echo $insid[0]['permit2doc']; ?>" target="_blank" > <img src="docs/defaulticon.ico" width="25px"><?php echo substr($insid[0]['permit2doc'],0,7); ?></a>

                  <?php }
                  ?>

                 <!--  <input type="file" name="permit2">  -->


                 <div class="box">
          <input type="file" name="permit2" id="file-2" onchange="per2mae(this.value)" class="inputfile inputfile-6" data-multiple-caption="{count} files selected" multiple />
          <label for="file-2"><span id="per2"></span> <strong><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg> Choose a file&hellip;</strong></label>
        </div>

                </div></div></div>
                    <script>
function per2mae(val)
{

  var fileNameIndex = val.replace(/C:\\fakepath\\/i, '');
$('#per2').text(fileNameIndex);

}

</script>


  <div class="row mg-t-30">
              <label class="col-md-4 form-control-label">Road Tax :</label>
              <div class="col-sm-8 mg-t-10 mg-sm-t-0">


                <div class="js">
                 <?php if($insid[0]['roadtaxcpy']!="")
                 {?>
                  <a href="docs/<?php echo $insid[0]['roadtaxcpy']; ?>" target="_blank"  > <img src="docs/defaulticon.ico" width="25px" ><?php echo substr($insid[0]['roadtaxcpy'],0,7); ?></a>
                  <?php }
                  ?>

                  <!-- <input type="file" name="roadtaxcpy" value=""> --> 


    <div class="box">
          <input type="file" name="roadtaxcpy" onchange="roadtax(this.value)" id="file-3" class="inputfile inputfile-6" data-multiple-caption="{count} files selected" multiple />
          <label for="file-3"><span id="rdtax"></span> <strong><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg> Choose a file&hellip;</strong></label>
        </div>

                  

                </div></div></div>


                    <script>
function roadtax(val)
{

  var fileNameIndex = val.replace(/C:\\fakepath\\/i, '');
$('#rdtax').text(fileNameIndex);

}

</script>
                                                
</div>

                       <div class="form-layout-footer mg-t-30 text-right">
                <button type="submit" value="submit" name="submit" id="sub" class="btn btn-info mg-r-5">Submit</button>
                <input type="hidden" name="action" value="<?php if($_REQUEST['flag'] =='Edit') echo $_REQUEST['flag']; else echo 'Add'; ?>">
                <button class="btn btn-secondary" type="reset" >Cancel</button>
              </div>


                                    </div>

          
        </div>
 
</div>
      </div><!-- am-pagebody -->
    </form>



      <?php include('../include/adminfooter.php'); ?> 
      <!--   <script src="../lib/jquery/jquery.js"></script>
    
    
    <script src="../lib/jquery-ui/jquery-ui.js"></script>
    <script src="../lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js"></script>
    <script src="../lib/jquery-toggles/toggles.min.js"></script>
    <script src="../lib/select2/js/select2.min.js"></script>  
     -->
    <script>
$('.datepicker').datepicker({
    dateFormat: 'dd/mm/yy'
});
</script>
<script>
$('#tyrenos').on('input blur change', function() {
  var input= $(this);
  var is_name=input.val();
/*alert(is_name);*/

var value=$('#tyrenos').val();
if (isNaN(is_name)) {
  /*alert("is not numeric")*/
/*input.removeClass("valid").addClass("invalid");*/

this.value = value.substr(0, value.length - 1);

$('#tyrenos').val(this.value);
}

if(value.length<15)
{
  input.removeClass("valid").addClass("invalid");
}


});

</script>
<script>
$('#kms').on('input blur change', function() {
  var input= $(this);
  var is_name=input.val();
/*alert(is_name);*/

var value=$('#kms').val();
if (isNaN(is_name)) {
  /*alert("is not numeric")*/
/*input.removeClass("valid").addClass("invalid");*/

this.value = value.substr(0, value.length - 1);

$('#kms').val(this.value);
}

if(value.length<15)
{
  input.removeClass("valid").addClass("invalid");
}


});

</script>
<script>
$('#vehicleno').keypress(function (e) {
    var regex = new RegExp("^[a-zA-Z0-9]+$");
    var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
    if (regex.test(str)) {
        return true;
    }

    e.preventDefault();
    return false;
});

  </script>