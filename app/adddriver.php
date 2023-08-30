<?php include('../include/dbConnect.php'); ?>
<?php include('../include/checklogin.php'); ?>
<?php include('../include/adminheader.php'); ?>
<?php include('../include/header.php'); ?>
<?php include('../include/leftmenu.php');  
require('../include/basefunctions.php');
?>


<?php
$data = new Basefunc;  
if(isset($_POST['submit'])){


 if($_REQUEST['action'] == "Add"){


$date=date("Y-m-d");

/*echo '<script> alert("'.$date.'");</script>';
die;*/

  $target = "Driver_files/";  
  $fileName1 = $_FILES['licfile']['name'];
  $fileName2 = $_FILES['aadfile']['name'];
  $fileName3 = $_FILES['photo']['name'];
  $fileName4 = $_FILES['voterid_file']['name'];
  
if(!empty($_POST['name']&&$_POST['mobileno']&&$_POST['licenseno']))
{

$led_name=$_POST["name"];

$name=$_SESSION["name"];

$transp=mysqli_query($conn,"SELECT * FROM transporters WHERE name ='$name'; " );

$trans = mysqli_fetch_array($transp);


$under=$trans['comp_id'];
$bank_check=mysqli_query($conn,"SELECT * FROM ledger WHERE name ='$led_name' AND under = '$under'; " );

/*
if(mysqli_num_rows($bank_check)==0)
{
$nature="Driver";

        $bank = array(
        "intAdminId"     =>     mysqli_real_escape_string($data->con, $_SESSION['MintId']),
        "type"           =>     mysqli_real_escape_string($data->con, $_POST['ledger_type']),
        "group_name"     =>     mysqli_real_escape_string($data->con, $_POST['group_name']),
        "opening_bal"    =>     mysqli_real_escape_string($data->con, $_POST['open_bal']),
        "nature"         =>     mysqli_real_escape_string($data->con, $nature),
        "under"          =>     mysqli_real_escape_string($data->con, $under),
        "ent_date"       =>     mysqli_real_escape_string($data->con, $date),
        "name"           =>     mysqli_real_escape_string($data->con, $_POST['name'])
      ); 
 $voucherid = $data->insert('ledger', $bank);
 

}

else{

      echo '<script> alert("Ledger Name Already Present.");</script>';
}

*/



  $insert_driver = array(
    "intAdminId"      =>    mysqli_real_escape_string($data->con, $_SESSION['MintId']),    
    "name"            =>     mysqli_real_escape_string($data->con, $_POST['name']), 
    "dob"             =>     mysqli_real_escape_string($data->con, $_POST['dob']), 
    "maritialstat"    =>     mysqli_real_escape_string($data->con, $_POST['maritialstatus']), 
    "MobNum"          =>     mysqli_real_escape_string($data->con, $_POST['mobileno']), 
    "aadharno"        =>     mysqli_real_escape_string($data->con, $_POST['aadharno']),
    "voterid"         =>     mysqli_real_escape_string($data->con, $_POST['voterid']),
    "batchno"         =>     mysqli_real_escape_string($data->con, $_POST['batchno']),
    "licenseno"       =>     mysqli_real_escape_string($data->con, $_POST['licenseno']),
    "licexpdate"      =>     mysqli_real_escape_string($data->con, $_POST['expiredate']), 
    "rtoarea"         =>     mysqli_real_escape_string($data->con, $_POST['RTOarea']),
    "state"           =>     mysqli_real_escape_string($data->con, $_POST['cusState']), 
    "city"            =>     mysqli_real_escape_string($data->con, $_POST['cusCity']), 
    "area"            =>     mysqli_real_escape_string($data->con, $_POST['areaid']), 
    "address"         =>     mysqli_real_escape_string($data->con, $_POST['address1']),
    "pincode"         =>     mysqli_real_escape_string($data->con, $_POST['postcode']), 
    "namebnk"         =>     mysqli_real_escape_string($data->con, $_POST['employeenameinbank']),
    "bnkname"         =>     mysqli_real_escape_string($data->con, $_POST['bankname']), 
    "accno"           =>     mysqli_real_escape_string($data->con, $_POST['accountno']),
    "ledger_id"       =>     mysqli_real_escape_string($data->con, $voucherid),
    "ifsc"            =>     mysqli_real_escape_string($data->con, $_POST['ifsccode'])

  );  
  $insid = $data->insert('drivers', $insert_driver);




$type="Driver";


$insert_op = array(
    "intAdminId"      =>     mysqli_real_escape_string($data->con, $_SESSION['MintId']),    
    "type"            =>     mysqli_real_escape_string($data->con, $type),  
    "opening_bal"     =>     mysqli_real_escape_string($data->con, $_POST['open_bal']), 
    "ent_date"        =>     mysqli_real_escape_string($data->con, $date), 
    "ent_id"          =>     mysqli_real_escape_string($data->con, $insid),
    "name"            =>     mysqli_real_escape_string($data->con, $_POST['name'])
      
      );  
       $insop = $data->insert('opening_balance', $insert_op);

    /*$fileTarget1 = $target.$insid.'_'.$fileName1;
    $fileTarget2 = $target.$insid.'_'.$fileName2;
    $fileTarget3 = $target.$insid.'_'.$fileName3;
    $tempFileName1 = $_FILES["licfile"]["tmp_name"];
    $tempFileName2 = $_FILES["aadfile"]["tmp_name"];
    $tempFileName3 = $_FILES["photo"]["tmp_name"];
     move_uploaded_file($tempFileName1,$fileTarget1);
     move_uploaded_file($tempFileName2,$fileTarget2);
     move_uploaded_file($tempFileName3,$fileTarget3);
    
$upd_driver = array(
      "licupld"         =>     mysqli_real_escape_string($data->con, $insid.'_'.$fileName1), 
      "aadharupld"      =>     mysqli_real_escape_string($data->con, $insid.'_'.$fileName2),
      "imgupld"         =>     mysqli_real_escape_string($data->con, $insid.'_'.$fileName3)
     );

$update_id = array(
      "id"      =>    mysqli_real_escape_string($data->con, $insid)
    );
    $insid = $data->update('drivers', $upd_driver,$update_id);*/
    $update_id = array(
      "id"      =>    mysqli_real_escape_string($data->con, $insid)
    );
    if($fileName1!='')
    {

      $fileTarget1   = $target.$insid.'_'.$fileName1;
      $tempFileName1 = $_FILES["licfile"]["tmp_name"];
      move_uploaded_file($tempFileName1,$fileTarget1);

      $upd_img = array(
        "licupld" =>     mysqli_real_escape_string($data->con, $insid.'_'.$fileName1)
      );

      $update = $data->update('drivers', $upd_img,$update_id);
    }
    if($fileName2!='')
    {
      $fileTarget2   = $target.$insid.'_'.$fileName2;
      $tempFileName2 = $_FILES["aadfile"]["tmp_name"];        
      move_uploaded_file($tempFileName2,$fileTarget2);
      $upd_img2 = array(
        "aadharupld"  =>     mysqli_real_escape_string($data->con, $insid.'_'.$fileName2)
      );

      $update = $data->update('drivers', $upd_img2,$update_id);
    }

    if($fileName3!='')
    {
      $fileTarget3   = $target.$insid.'_'.$fileName3;    
      $tempFileName3 = $_FILES["photo"]["tmp_name"];     
      move_uploaded_file($tempFileName3,$fileTarget3);
      $upd_img3 = array(
        "imgupld"     =>     mysqli_real_escape_string($data->con, $insid.'_'.$fileName3)
      );

      $update = $data->update('drivers', $upd_img3,$update_id);
    }
      if($fileName4!='')
    {
      $fileTarget4   = $target.$insid.'_'.$fileName4;    
      $tempFileName4 = $_FILES["voterid_file"]["tmp_name"];     
      move_uploaded_file($tempFileName4,$fileTarget4);
      $upd_img4 = array(
        "voterupld"     =>     mysqli_real_escape_string($data->con, $insid.'_'.$fileName3)
      );

      $update = $data->update('drivers', $upd_img4,$update_id);
    }


/*$nature="Driver";

$type="Dr";
$group="Debtors";


        $bank = array(
        "intAdminId"     =>     mysqli_real_escape_string($data->con, $_SESSION['MintId']),
        "type"           =>     mysqli_real_escape_string($data->con, $type),
        "group_name"     =>     mysqli_real_escape_string($data->con, $group),
        "opening_bal"    =>     mysqli_real_escape_string($data->con, $_POST['open_bal']),
        "nature"         =>     mysqli_real_escape_string($data->con, $nature),
        "ent_date"       =>     mysqli_real_escape_string($data->con, $date),
        "name"           =>     mysqli_real_escape_string($data->con, $_POST['name'])
      ); 
 $voucherid = $data->insert('ledger', $bank);*/

$trans=$_SESSION["name"];
$ledgers=$trans."ledgers";
$bank = array(
       
        "group_id"       =>     mysqli_real_escape_string($data->con, $_POST['group_name']),
        "name"           =>     mysqli_real_escape_string($data->con, $_POST['name']),
        "code"           =>     mysqli_real_escape_string($data->con, $_POST['ledger_type']),
        "op_balance"     =>     mysqli_real_escape_string($data->con, $_POST['open_bal']),
        "op_balance_dc"  =>     mysqli_real_escape_string($data->con, $_POST['op_type']),
        
      ); 
 $voucherid = $data->insert($ledgers, $bank);
    if($insid){

      echo '<script> alert("Driver Added Successfully");window.location.assign("viewdriver.php");</script>';
    } 
    else{
      echo '<script> alert("Error");</script>';
    }
  }
    else
  {
 echo '<script> alert("Please fill the Fields.");</script>';

  }
  }
  else
  {

    $update_driver = array(
      "intAdminId"      =>    mysqli_real_escape_string($data->con, $_SESSION['MintId']),    
      "name"            =>     mysqli_real_escape_string($data->con, $_POST['name']), 
      "dob"             =>     mysqli_real_escape_string($data->con, $_POST['dob']), 
      "maritialstat"    =>     mysqli_real_escape_string($data->con, $_POST['maritialstatus']), 
      "MobNum"          =>     mysqli_real_escape_string($data->con, $_POST['mobileno']), 
      "aadharno"        =>     mysqli_real_escape_string($data->con, $_POST['aadharno']),
      "voterid"         =>     mysqli_real_escape_string($data->con, $_POST['voterid']),
      "batchno"         =>     mysqli_real_escape_string($data->con, $_POST['batchno']),
      "licenseno"       =>     mysqli_real_escape_string($data->con, $_POST['licenseno']), 
      "licexpdate"      =>     mysqli_real_escape_string($data->con, $_POST['expiredate']), 
      "rtoarea"         =>     mysqli_real_escape_string($data->con, $_POST['RTOarea']),
      "state"           =>     mysqli_real_escape_string($data->con, $_POST['cusState']), 
      "city"            =>     mysqli_real_escape_string($data->con, $_POST['cusCity']), 
      "area"            =>     mysqli_real_escape_string($data->con, $_POST['areaid']), 
      "address"         =>     mysqli_real_escape_string($data->con, $_POST['address1']),
      "pincode"         =>     mysqli_real_escape_string($data->con, $_POST['postcode']), 
      "namebnk"         =>     mysqli_real_escape_string($data->con, $_POST['employeenameinbank']),
      "bnkname"         =>     mysqli_real_escape_string($data->con, $_POST['bankname']), 
      "accno"           =>     mysqli_real_escape_string($data->con, $_POST['accountno']),
      "ifsc"            =>     mysqli_real_escape_string($data->con, $_POST['ifsccode'])
    ); 


    $id = $_REQUEST['id'];


    $update_id = array(
      "id"      =>    mysqli_real_escape_string($data->con, $id)
    );

    $insid = $data->update('drivers', $update_driver, $update_id);



    $target = "Driver_files/";  
    $fileName1 = $_FILES['licfile']['name'];
    $fileName2 = $_FILES['aadfile']['name'];
    $fileName3 = $_FILES['photo']['name'];
    $fileName4 = $_FILES['voterid_file']['name'];

    if($fileName1!='')
    {

      $fileTarget1 = $target.$id.'_'.$fileName1;
      $tempFileName1 = $_FILES["licfile"]["tmp_name"];
      move_uploaded_file($tempFileName1,$fileTarget1);

      $upd_img = array(
        "licupld" =>     mysqli_real_escape_string($data->con, $id.'_'.$fileName1)
      );

      $update = $data->update('drivers', $upd_img,$update_id);
    }
    if($fileName2!='')
    {
      $fileTarget2 = $target.$id.'_'.$fileName2;
      $tempFileName2 = $_FILES["aadfile"]["tmp_name"];        
      move_uploaded_file($tempFileName2,$fileTarget2);
      $upd_img2 = array(
        "aadharupld"  =>     mysqli_real_escape_string($data->con, $id.'_'.$fileName2)
      );

      $update = $data->update('drivers', $upd_img2,$update_id);
    }

    if($fileName3!='')
    {
      $fileTarget3 = $target.$id.'_'.$fileName3;    
      $tempFileName3 = $_FILES["photo"]["tmp_name"];     
      move_uploaded_file($tempFileName3,$fileTarget3);
      $upd_img3 = array(
        "imgupld"         =>     mysqli_real_escape_string($data->con, $id.'_'.$fileName3)
      );

      $update = $data->update('drivers', $upd_img3,$update_id);
    }
     if($fileName4!='')
    {
      $fileTarget4   = $target.$insid.'_'.$fileName4;    
      $tempFileName4 = $_FILES["voterid_file"]["tmp_name"];     
      move_uploaded_file($tempFileName4,$fileTarget4);
      $upd_img4 = array(
        "voterupld"     =>     mysqli_real_escape_string($data->con, $insid.'_'.$fileName3)
      );

      $update = $data->update('drivers', $upd_img4,$update_id);
    }


    if($insid){

      echo '<script> alert("Driver Edited Successfully");window.location.assign("viewdriver.php");</script>';
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

 $insid = $data->select_where('drivers', $update_id);
}

?> 



<!-- 
<script>
function empty()
{ 

/*  alert("value");*/
var comp = $('#name').val();
var contact = $('#datepicker001').val();
var mob = $('#mobileno').val();
/*var gst = $('#aadharno').val();*/
var pan = $('#licenseno').val();

if(comp.trim()=="" || contact.trim()=="" || mob.trim()=="" || pan.trim()=="")
{

$('#sub').attr('disabled', true);
}
else
{
  $('#sub').attr('disabled', false);
}
}

</script> -->




<div class="am-mainpanel">
  <div class="am-pagetitle">
    <h5 class="am-title">Driver Master</h5>


    <!-- search-bar -->
  </div>
  <!-- am-pagetitle -->
  <form id="searchBar" class="search-bar"  method="POST" action="" enctype="multipart/form-data">
    <div class="am-pagebody">
     <div class="card pd-20 pd-sm-40 form-layout form-layout-4">
       <div class="row row-sm mg-t-20">
        <div class="col-xl-6">

          <div class="portlet-body">
            <h6 class="card-body-title">Driver Details</h6>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.16.0/jquery.validate.min.js"></script> 
<script>

$(document).ready( function () {
    $( "#searchBar" ).validate( {
    
        rules: {
          name: "required",
           licenseno: "required",
     datepicker001:"required", 
          
           mobileno: {
            required: true,
            minlength: 10
          }
          },
        messages: {
          name: "Please enter your Name", 
           licenseno: "Please enter your Licence Number", 
          datepicker001: "Please enter Date Of Birth",
           mobileno: {
            required: "Please enter Mobile Number",
            minlength: "Your Mobile Number must consist of 10 digits"
          }
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



            <div class="row mg-t-10">
             <label class="col-md-4 form-control-label">Name :<p style="color: red;">*</p></label>
             <div class="col-sm-8 mg-t-10 mg-sm-t-0">
              <input class="form-control emp_val" data-val="true" data-val-length="The field firstname must be a string with a maximum length of 100." data-val-length-max="100" placeholder="Enter First Name" id="name" maxlength="100" name="name" type="text" value="<?php echo $insid[0]['name']; ?>"  onkeyup="empty()">
              <span class="field-validation-valid font-red" data-valmsg-for="firstname" data-valmsg-replace="true"></span>

            </div>
          </div>
          <div class="row mg-t-10">

            <label class="col-md-4 form-control-label">Date Of Birth :</label>
            <div class="col-sm-8 mg-t-10 mg-sm-t-0">
              <div class="input-group">
                <span class="input-group-addon"><i class="icon ion-calendar tx-16 lh-0 op-6"></i></span>
                <input class="form-control datepicker" placeholder="DD/MM/YYYY" name="dob" id="datepicker001" type="text" value="<?php echo $insid[0]['dob']; ?>"  >
              </div>
              <span class="field-validation-valid font-red" data-valmsg-for="birthdate" data-valmsg-replace="true"></span>
            </div>
          </div>
          <div class="row mg-t-10">
            <label class="col-md-4 form-control-label">Marital Status :</label>
            <div class="col-sm-8 mg-t-10 mg-sm-t-0">
             <select class="form-control" data-val="true" data-val-number="The field maritialstatus must be a number." placeholder="The maritialstatus field is required." id="mstatus" name="maritialstatus">
             <!--  <option value="">---Select Marital Status---</option> -->
              <option <?php if($insid[0]['maritialstat']=="1") echo 'selected="selected"'; ?> value="1">Married</option>
              <option <?php if($insid[0]['maritialstat']=="2") echo 'selected="selected"'; ?> value="2">Single</option>

            </select>
          </div>
        </div>

        <div class="row mg-t-10">

          <label class="col-md-4 form-control-label">Mobile :<p style="color: red;">*</p></label>
          <div class="col-sm-8 mg-t-10 mg-sm-t-0">
            <input class="form-control emp_val" data-val="true" data-val-length="Invalid Mobile No." data-val-length-max="15" data-val-length-min="10" placeholder="Enter Mobile No." id="mobileno" maxlength="10" name="mobileno"  type="text" value="<?php echo $insid[0]['MobNum']; ?>" onkeyup="empty()">
            <span class="field-validation-valid font-red" data-valmsg-for="mobileno" data-valmsg-replace="true"></span>
          </div>
        </div>
        <div class="row mg-t-10">

          <label class="col-md-4 form-control-label">Aadhar Number :</label>
          <div class="col-sm-8 mg-t-10 mg-sm-t-0">
            <input class="form-control" data-val="true" data-val-length="Invalid Mobile No." data-val-length-max="15" data-val-length-min="10" placeholder="Enter Aadhar Number" id="aadharno" maxlength="12" name="aadharno" type="text" value="<?php echo $insid[0]['aadharno']; ?>"  onkeyup="empty()">
            <span class="field-validation-valid font-red" data-valmsg-for="mobileno" data-valmsg-replace="true"></span>
          </div>
        </div>
        <div class="row mg-t-10">

          <label class="col-md-4 form-control-label">Voter Id :</label>
          <div class="col-sm-8 mg-t-10 mg-sm-t-0">
            <input class="form-control" data-val="true" data-val-length="Invalid Mobile No." data-val-length-max="15" data-val-length-min="10" placeholder="Enter Voter Id Number" id="mobileno" maxlength="15" name="voterid" type="text" value="<?php echo $insid[0]['voterid']; ?>" >
            <span class="field-validation-valid font-red" data-valmsg-for="mobileno" data-valmsg-replace="true"></span>
          </div>
        </div>
   

        <div class="col-md-4">
         <div class="row mg-t-10"> 
           <h6 class="card-body-title">License Details</h6>
         </div></div>
         <div class="row mg-t-10">
           <label class="col-md-4 form-control-label">License Number :<p style="color: red;">*</p></label>
           <div class="col-sm-8 mg-t-10 mg-sm-t-0">
            <input class="form-control emp_val" data-val="true" data-val-length="The field firstname must be a string with a maximum length of 100." data-val-length-max="100" placeholder="Enter License Number" id="licenseno" maxlength="15" name="licenseno" type="text" value="<?php echo $insid[0]['licenseno']; ?>" onkeyup="empty()">
            <span class="field-validation-valid font-red" data-valmsg-for="firstname" data-valmsg-replace="true"></span>

          </div>
        </div>
       <!--  <div class="row mg-t-10">
         <label class="col-md-4 form-control-label">License Name :</label>
         <div class="col-sm-8 mg-t-10 mg-sm-t-0">
          <input class="form-control" data-val="true" data-val-length="The field firstname must be a string with a maximum length of 100." data-val-length-max="100" placeholder="Enter Name in License" id="Licensename" maxlength="100" name="licensename" type="text" value="<?php echo $insid[0]['licensename']; ?>">
          <span class="field-validation-valid font-red" data-valmsg-for="firstname" data-valmsg-replace="true"></span>

        </div>
      </div> -->

       <div class="row mg-t-10">

          <label class="col-md-4 form-control-label">Batch Number:</label>
          <div class="col-sm-8 mg-t-10 mg-sm-t-0">
            <input class="form-control" data-val="true" data-val-length="Invalid Mobile No." data-val-length-max="15" data-val-length-min="10" placeholder="Enter Batch Number" id="batchno" maxlength="15" name="batchno" type="text" value="<?php echo $insid[0]['batchno']; ?>">
            <span class="field-validation-valid font-red" data-valmsg-for="mobileno" data-valmsg-replace="true"></span>
          </div>
        </div>
      <div class="row mg-t-10">

        <label class="col-md-4 form-control-label">License Expire Date :</label>
        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
          <div class="input-group">
            <span class="input-group-addon"><i class="icon ion-calendar tx-16 lh-0 op-6"></i></span>
            <input class="form-control datepicker" placeholder="DD/MM/YYYY" name="expiredate" id="datepicker002" type="text" value="<?php echo $insid[0]['licexpdate']; ?>" >
          </div>
          <span class="field-validation-valid font-red" data-valmsg-for="birthdate" data-valmsg-replace="true"></span>
        </div>
      </div>
      <div class="row mg-t-10">
       <label class="col-md-4 form-control-label">RTO Area :</label>
       <div class="col-sm-8 mg-t-10 mg-sm-t-0">
        <input class="form-control" data-val="true" data-val-length="The field firstname must be a string with a maximum length of 100." data-val-length-max="100" placeholder="Enter RTO Area" id="Licensename" maxlength="100" name="RTOarea" type="text" value="<?php echo $insid[0]['rtoarea']; ?>">
        <span class="field-validation-valid font-red" data-valmsg-for="firstname" data-valmsg-replace="true"></span>

      </div>
    </div>

<?php
$id=$insid[0]['name'];

 $ledger = mysqli_query($conn,"SELECT * from ledger WHERE name='$id' "); 
$led = mysqli_fetch_array($ledger);
?>

        <div class="col-md-4">
         <div class="row mg-t-10"> 
       <h6 class="card-body-title">Accounting Details</h6> 
         </div></div>

                                                        <div class="row mg-t-10">
                                                           
                                                                <label class="col-md-4 form-control-label">Opening Balance:</label>
                                                                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                                    <input class="form-control" data-val="true" placeholder="Enter Opening Balance" id="open_bal" maxlength="15" name="open_bal" type="text" value="<?php echo $led['opening_bal']; ?>">
                                                                    <span class="field-validation-valid font-red" data-valmsg-for="postcode" data-valmsg-replace="true"></span>
                                                                </div>
                                                            </div> 
<div class="row mg-t-10">
                                                
                                                        <label class="col-md-4 form-control-label">Group Name :</label>
                                                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                           

                                                           <select class="form-control" name="group_name" id="group_name" value="<?php echo $led['group_name']; ?>" >
                                                            <?php
 $group = mysqli_query($conn,"select * from group_name "); 

                while ($grp = mysqli_fetch_array($group)){
                                                            ?>
                                                              <option value="<?php echo $grp['name'];?>"><?php echo $grp['name'];?></option>
                                                              <?php


}
                                                              ?>
                                                              
                                                            </select>

                                                            
                                                            <span class="field-validation-valid font-red" data-valmsg-for="bankname" data-valmsg-replace="true"></span>
                                                </div>
                                            </div>

                                            <div class="row mg-t-10">
                                                
                                                        <label class="col-md-4 form-control-label">Type :</label>
                                                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                            
                                                            <select class="form-control" name="ledger_type" id="ledger_type" value="<?php echo $grp['type'];?>"  >
                                                              <option value="Cr">Cr</option>
                                                              <option value="Dr">Dr</option>
                                                            </select>
                                                            <span class="field-validation-valid font-red" data-valmsg-for="bankname" data-valmsg-replace="true"></span>
                                                </div>
                                            </div> 
                                       <div class="row mg-t-10">
                                                           
                                                                <label class="col-md-4 form-control-label">Code:</label>
                                                                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                                    <input class="form-control" data-val="true" placeholder="Ledger Code" id="ledger_type" maxlength="50" name="ledger_type" type="text" value="<?php echo $led['type']; ?>">
                                                                    <span class="field-validation-valid font-red" data-valmsg-for="postcode" data-valmsg-replace="true"></span>
                                                                </div>
                                                            </div> 


  </div></div>                                 



  <div class="col-xl-6">
    <h6 class="card-body-title">Address Details</h6> 

    <div class="portlet-body">

      <div class="row mg-t-10">

        <label class="col-md-4 form-control-label">State:</label>
        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
          <select onChange="getdistrict(this.value);"  name="cusState" id="cusState" class="form-control" >

            <option value="">Select </option>
            <?php $query =mysqli_query($conn,"SELECT * FROM state");
            while($row=mysqli_fetch_array($query))
              { ?>
                <option value="<?php echo $row['StCode'];?>" <?php if($row['StCode']==$insid[0]['state']) echo 'selected="selected"'; ?> ><?php echo $row['StateName'];?></option>
                <?php
              }
              ?>
            </select>
            <span class="field-validation-valid font-red" data-valmsg-for="stateid" data-valmsg-replace="true"></span>

          </div>
        </div>
        <div class="row mg-t-10">

          <label class="col-md-4 form-control-label">City:</label>
          <div class="col-sm-8 mg-t-10 mg-sm-t-0">
            <select name="cusCity" id="district-list" class="form-control">
             <?php if($insid[0]['city'])   {
               $cid= $insid[0]['city'];
               $query =mysqli_query($conn,"SELECT * FROM district where DistCode = '$cid'");        
               $row=mysqli_fetch_array($query);     ?>

               <option value="<?php echo $row['DistCode'];?>" <?php   echo 'selected="selected"'; ?>><?php echo $row['DistrictName']; ?></option>
               <?php
             }
             else
             {
              ?>

              <option value="">Select</option><?php }?>
            </select> 
            <span class="field-validation-valid font-red" data-valmsg-for="cityid" data-valmsg-replace="true"></span>

          </div>
        </div>
        <div class="row mg-t-10">

          <label class="col-md-4 form-control-label">Area:</label>
          <div class="col-sm-8 mg-t-10 mg-sm-t-0">
            <input class="form-control" data-val="true" placeholder="Enter Area" id="areaid" maxlength="50" name="areaid" type="text" value="<?php echo $insid[0]['area']; ?>">
            <span class="field-validation-valid font-red" data-valmsg-for="postcode" data-valmsg-replace="true"></span>
          </div>
        </div>
        <div class="row mg-t-10">

          <label class="col-md-4 form-control-label">Address:</label>
          <div class="col-sm-8 mg-t-10 mg-sm-t-0">
            <input class="form-control" data-val="true" placeholder="Enter Address" id="address1" maxlength="200" name="address1" type="text"value="<?php echo $insid[0]['address']; ?>">
            <span class="field-validation-valid font-red" data-valmsg-for="address1" data-valmsg-replace="true"></span>
          </div>
        </div>




        <div class="row mg-t-10">

          <label class="col-md-4 form-control-label">Pincode:</label>
          <div class="col-sm-8 mg-t-10 mg-sm-t-0">
            <input class="form-control" data-val="true" placeholder="Enter Pincode" id="postcode" maxlength="6" name="postcode" type="text" value="<?php echo $insid[0]['pincode']; ?>">
            <span class="field-validation-valid font-red" data-valmsg-for="postcode" data-valmsg-replace="true"></span>
          </div>
        </div> 

        <div class="col-md-4">
         <div class="row mg-t-10"> 
           <h6 class="card-body-title">Bank Details</h6>
         </div>
       </div>
       <div class="row mg-t-10">

        <label class="col-md-4 form-control-label">Name in Account :</label>
        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
          <input class="form-control" data-val="true" data-val-length="The field employeenameinbank must be a string with a maximum length of 100." data-val-length-max="100" placeholder="Enter Account Name" id="employeenameinbank" maxlength="100" name="employeenameinbank" type="text" value="<?php echo $insid[0]['namebnk']; ?>">
          <span class="field-validation-valid font-red" data-valmsg-for="employeenameinbank" data-valmsg-replace="true"></span>
        </div>
      </div>
      <div class="row mg-t-10">

        <label class="col-md-4 form-control-label">Bank Name :</label>
        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
      <!--     <input class="form-control" data-val="true" data-val-length="The field bankname must be a string with a maximum length of 100." data-val-length-max="100" placeholder="Enter Bank Name" id="bankname" maxlength="100" name="bankname" type="text" value="<?php echo $insid[0]['bnkname']; ?>"> -->

 <select name="bankname" id="bankname" class="form-control">
                                                     <option value="">Select</option>              
                                               <?php        $query =mysqli_query($conn,"SELECT * FROM banks ;");        
                                                     while(  $row=mysqli_fetch_array($query)){     ?>

<option value="<?php echo $row['name']; ?> "<?php if($row['name']==$insid[0]['bnkname']) echo 'selected="selected"'; ?> ><?php echo $row['name']; ?></option>
<?php }?>
</select> 


          <span class="field-validation-valid font-red" data-valmsg-for="bankname" data-valmsg-replace="true"></span>
        </div>
      </div>
      <div class="row mg-t-10">
       <label class="col-md-4 form-control-label">Account Number :</label>
       <div class="col-sm-8 mg-t-10 mg-sm-t-0">
        <input class="form-control" data-val="true" data-val-length="The field accountno must be a string with a maximum length of 12." data-val-length-max="12" id="accountno" placeholder="Enter Account Number" maxlength="12" minlength="10" name="accountno" type="text" value="<?php echo $insid[0]['accno']; ?>">
        <span class="field-validation-valid font-red" data-valmsg-for="accountno" data-valmsg-replace="true"></span>
      </div>
    </div>
    <div class="row mg-t-10">
      <label class="col-md-4 form-control-label">IFSC Code :</label>
      <div class="col-sm-8 mg-t-10 mg-sm-t-0">
        <input class="form-control" data-val="true" data-val-length="The field ifsccode must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Enter IFSC Code" id="ifsccode" maxlength="11" name="ifsccode" type="text" value="<?php echo $insid[0]['ifsc']; ?>">
        <span class="field-validation-valid font-red" data-valmsg-for="ifsccode" data-valmsg-replace="true"></span>
      </div>
    </div>


    <div class="col-md-4">
     <div class="row mg-t-10"> 
       <h6 class="card-body-title">Uploads</h6>
     </div>

   </div>
   <div class="row mg-t-10">
    <label class="col-md-4 form-control-label">Driving License :</label>
    <div class="col-sm-8 mg-t-10 mg-sm-t-0">
      <?php if($insid[0]['ifsc']!="")
      {?>
        <img src="Driver_files/<?php echo $insid[0]['licupld']; ?>" width="100px" >
        <?php }
        ?>



        <input type="file" name="licfile"> 
        <br/>   
        <div>  
        </div> </div></div>

        <div class="row mg-t-10">
    <label class="col-md-4 form-control-label">Voter ID:</label>
    <div class="col-sm-8 mg-t-10 mg-sm-t-0">
      <?php if($insid[0]['voterupld']!="")
      {?>
        <img src="Driver_files/<?php echo $insid[0]['voterupld']; ?>" width="100px" >
        <?php }
        ?>



        <input type="file" name="voterid_file"> 
        <br/>   
        <div>  
        </div> </div></div>
        <div class="row mg-t-10">
          <label class="col-md-4 form-control-label">Aadhar Card :</label>
          <div class="col-sm-8 mg-t-10 mg-sm-t-0">


            <div>
             <?php if($insid[0]['aadharupld']!="")
             {?>
              <img src="Driver_files/<?php echo $insid[0]['aadharupld']; ?>" width="100px" >
              <?php }
              ?>

              <input type="file" name="aadfile"> 

            </div></div></div>
            
            <div class="row mg-t-10">
              <label class="col-md-4 form-control-label">Photo :</label>
              <div class="col-sm-8 mg-t-10 mg-sm-t-0">


                <div>
                 <?php if($insid[0]['imgupld']!="")
                 {?>
                  <img src="Driver_files/<?php echo $insid[0]['imgupld']; ?>" width="100px" >
                  <?php }
                  ?>

                  <input type="file" name="photo"> 

                </div></div></div>




              </div>

              <div class="form-layout-footer mg-t-30">
                <button type="submit" value="submit" id="sub" name="submit" class="btn btn-info mg-r-5">Submit</button>
                <input type="hidden" name="action" value="<?php if($_REQUEST['flag'] =='Edit') echo $_REQUEST['flag']; else echo 'Add'; ?>">
                <button class="btn btn-secondary" id="cancel">Cancel</button>
              </div>


            </div>


          </div>

        </div>
      </div><!-- am-pagebody -->
    </form>
    <?php 
    include('../include/adminfooter.php'); ?> 

 
<!--     <script src="../lib/jquery/jquery.js"></script>
    <script src="../lib/jquery-ui/jquery-ui.js"></script>
     -->
    
    
    <script src="../lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js"></script>
    <script src="../lib/jquery-toggles/toggles.min.js"></script>
    <script src="../lib/select2/js/select2.min.js"></script>   
   
   <script>
$("#cancel").click(function(e) {
/*  alert("maans");*/
if(confirm("Leave Page??"))
{

/*
  $(location).attr("href", "viewtransporter.php");*/
/*  window.location.replace("viewtransporter.php"); */
/*  window.location.href("viewtransporter.php"); */
  window.location.href = "adddriver.php";
/*  
document.location ("viewtransporter.php");*/
return false;
/*alert("whatt??");*/
}
else
{
    e.preventDefault();
}
});


</script> 
    <script>
$('.datepicker').datepicker({
    dateFormat: 'dd/mm/yy'
});
</script>
<script>
$('#open_bal').on('input blur change', function() {
  var input= $(this);
  var is_name=input.val();
/*alert(is_name);*/

var value=$('#open_bal').val();
if (isNaN(is_name)) {
  /*alert("is not numeric")*/
/*input.removeClass("valid").addClass("invalid");*/

this.value = value.substr(0, value.length - 1);

$('#open_bal').val(this.value);
}



});

</script>
<script>
$('#accountno').on('input blur change', function() {
  var input= $(this);
  var is_name=input.val();
/*alert(is_name);*/

var value=$('#accountno').val();
if (isNaN(is_name)) {
  /*alert("is not numeric")*/
/*input.removeClass("valid").addClass("invalid");*/

this.value = value.substr(0, value.length - 1);

$('#accountno').val(this.value);
}

/*if(value.length<12)
{
  input.removeClass("valid").addClass("invalid");
}*/


});

</script>
<script>
$('.emp_val').on('input blur change', function() {
  var input= $(this);
  var is_name=input.val();
/*alert(is_name);*/
  if(is_name){input.removeClass("invalid").addClass("valid");}
  else{input.removeClass("valid").addClass("invalid");}
});

</script>
 <style>
  input.invalid, textarea.invalid{
  border: 0.1px solid #d20505;
}
input.valid, textarea.valid{
  border-radius: 0 ;
}
</style> 
<script>
$('#mobileno').on('input blur change', function() {
  var input= $(this);
  var is_name=input.val();
/*alert(is_name);*/

var value=$('#mobileno').val();
if (isNaN(is_name)) {
  /*alert("is not numeric")*/
/*input.removeClass("valid").addClass("invalid");*/

this.value = value.substr(0, value.length - 1);

$('#mobileno').val(this.value);
}

if(value.length<10)
{
  input.removeClass("valid").addClass("invalid");
}


});

</script>

    <script>
     function getdistrict(val) {
      $.ajax({
        type: "POST",
        type: "POST",
        url: "get_district.php",
        data:'state_id='+val,
        success: function(data){ 
          $("#district-list").html(data);
        }
      });
    }
  </script>
<script>
$('#aadharno').on('input blur change', function() {

  var input= $(this);
  var is_name=input.val();
/*alert(is_name);*/

var value=$('#aadharno').val();
if (isNaN(is_name)) {
  /*alert("is not numeric")*/
/*input.removeClass("valid").addClass("invalid");*/

this.value = value.substr(0, value.length - 1);

$('#aadharno').val(this.value);
}

/*if(value.length<10)
{
  input.removeClass("valid").addClass("invalid");
}*/


});

</script>
 <script>
$('#postcode').on('input blur change', function() {
  var input= $(this);
  var is_name=input.val();
/*alert(is_name);*/

var value=$('#postcode').val();
if (isNaN(is_name)) {
  /*alert("is not numeric")*/
/*input.removeClass("valid").addClass("invalid");*/

this.value = value.substr(0, value.length - 1);

$('#postcode').val(this.value);
}

/*if(value.length<6)
{
  input.removeClass("valid").addClass("invalid");
}*/
else
{
  input.removeClass("invalid").addClass("valid");
}

});

</script>