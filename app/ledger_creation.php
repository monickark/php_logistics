<?php include('../include/dbConnect.php'); ?>
<?php include('../include/checklogin.php'); ?>
<?php include('../include/adminheader.php'); ?>
<?php include('../include/header.php'); ?>
<?php include('../include/leftmenu.php'); 
require('../include/basefunctions.php');
?> 
<?php
$data = new Basefunc;  
if(isset($_POST['submit'])){/*
  *//*echo '<script> alert("Entered");</script>';
         $bnkname=$_POST['bankname'];
         $accno=$_POST['accountno']; 
         $ifsc=$_POST['ifsccode']; 
         $subgrp=$_POST['subgroupid'];
         $state=$_POST['stateid']; 
         $city=$_POST['cityid']; 
         $area=$_POST['areaid']; 
         $address=$_POST['address1']; 
         $pincode=$_POST['postcode']; 
*/
/*$datetime = date("Y-m-d H:i:s");*/
   // $varPin=$_POST['varPin'];
/*    */

 if($_REQUEST['action'] == "Add"){
if($_POST['bankname']=="")
{
  echo '<script> alert("Please give Ledger Name.");</script>';

}


else
{


$under="Logistics";

$bank_check=mysqli_query($conn,"SELECT * FROM ledger WHERE name ='" .$_POST["bankname"]. "' AND under='$under'; " );





        $newDate =date("Y-m-d");

if(mysqli_num_rows($bank_check)==0)
{
        $bank = array(
        "intAdminId"     =>     mysqli_real_escape_string($data->con, $_SESSION['MintId']),
        "type"           =>     mysqli_real_escape_string($data->con, $_POST['ledger_type']),
        "group_name"     =>     mysqli_real_escape_string($data->con, $_POST['group_name']),
        "opening_bal"    =>     mysqli_real_escape_string($data->con, $_POST['opbal']),
        "nature"         =>     mysqli_real_escape_string($data->con, $_POST['nature']),
        "under"          =>     mysqli_real_escape_string($data->con, $under),
        "ent_date"       =>     mysqli_real_escape_string($data->con, $newDate),
        "name"           =>     mysqli_real_escape_string($data->con, $_POST['bankname'])
      ); 
 $bank_insert = $data->insert('ledger', $bank);
 





 $bank = array(
       
        "group_id"       =>     mysqli_real_escape_string($data->con, $_POST['group_name']),
        "name"           =>     mysqli_real_escape_string($data->con, $_POST['bankname']),
        "code"           =>     mysqli_real_escape_string($data->con, $_POST['ledger_type']),
        "op_balance"     =>     mysqli_real_escape_string($data->con, $_POST['open_bal']),
        "op_balance_dc"  =>     mysqli_real_escape_string($data->con, $_POST['op_type']),
        
      ); 
 $voucherid = $data->insert('ledgers', $bank);




 


   if($bank_insert){


    echo '<script> alert("Ledger Added Successfully");window.location.assign("ledger_creation.php");</script>';
   } 
   else{
    echo '<script> alert("Error");</script>';
   }
}

else{

      echo '<script> alert("Ledger Name Already Present.");</script>';
}

  }


}
else
{
  $bank = array(
        "type"           =>     mysqli_real_escape_string($data->con, $_POST['ledger_type']),
        "group_name"     =>     mysqli_real_escape_string($data->con, $_POST['group_name']),
        "nature"         =>     mysqli_real_escape_string($data->con, $_POST['nature']),
        "opening_bal"    =>     mysqli_real_escape_string($data->con, $_POST['opbal']),
        "name"           =>     mysqli_real_escape_string($data->con, $_POST['bankname'])
      );  
 $id =$_REQUEST['id'];
 $update_id = array(
      "id"      =>    mysqli_real_escape_string($data->con, $id)
    );

       $insid = $data->update('ledger', $bank, $update_id);
      if($insid){

    echo '<script> alert("Ledger Altered Successfully");window.location.assign("view_ledger.php");</script>';
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

    $insid = $data->select_where('ledger', $update_id);
 }

?> 

?> 
    <div class="am-mainpanel">
      <div class="am-pagetitle">
        <h5 class="am-title">Ledger Creation</h5>
      
          
        <!-- search-bar -->
      </div>
      <!-- am-pagetitle -->
        <form id="searchBar" class="search-bar"  method="POST" action="">
      <div class="am-pagebody">
 <div class="card pd-20 pd-sm-40 form-layout form-layout-4">
       <div class="row row-sm mg-t-20">
          <div class="col-xl-6">
           
            <div class="portlet-body">
                                          <h6 class="card-body-title">Ledger Details</h6>




  <div class="row mg-t-10">
                                                
     <label class="col-md-4 form-control-label">Ledger Name :</label>
                 <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                            
       <input class="form-control" data-val="true" data-val-length="The field bankname must be a string with a maximum length of 200." data-val-length-max="200" data-val-required="Enter Bank Name" id="bankname" maxlength="200" name="bankname" type="text" value="<?php echo $insid[0]['name']; ?>" required>
   <span class="field-validation-valid font-red" data-valmsg-for="bankname" data-valmsg-replace="true"></span>
      </div>
                                            </div>




 <div class="row mg-t-10">

<?php
$id= $insid[0]['ledger_id'];
$quer=mysqli_query($conn,"SELECT * FROM ledger WHERE id='$id'");

$led=mysqli_fetch_array($quer);
?>



                                                           
                                                                <label class="col-md-4 form-control-label">Opening Balance:</label>
                                                                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                                    <input class="form-control" data-val="true" placeholder="Enter Opening Balance" id="open_bal" maxlength="50" name="open_bal" type="text" value="<?php echo $led['opening_bal']; ?>">
                                                                    <span class="field-validation-valid font-red" data-valmsg-for="postcode" data-valmsg-replace="true"></span>
                                                                </div>
                                                            </div> 

   <div class="row mg-t-10">
                                                
                                                        <label class="col-md-4 form-control-label">Ledger Type :</label>
                                                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                           

                                                           <select class="form-control" name="op_type" id="ledger_type"  value="<?php echo $led['op_type']; ?>">
                                                           
                                                              <option value="D">Dr</option>
                                                              <option value="C">Cr</option>

                                                              
                                                            </select>

                                                            
                                                            <span class="field-validation-valid font-red" data-valmsg-for="bankname" data-valmsg-replace="true"></span>
                                                </div>
                                            </div>





                                              <div class="row mg-t-10">
                                                
                                                        <label class="col-md-4 form-control-label">Group Name :</label>
                                                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                           

                                                           <select class="form-control" name="group_name" id="group_name"  value="<?php echo $led['group_name']; ?>">
                                                            <?php
 $group = mysqli_query($conn,"SELECT * from groups WHERE parent_id<>''"); 

                while ($grp = mysqli_fetch_array($group)){
                                                            ?>
                                                              <option value="<?php echo $grp['id'];?>"><?php echo $grp['name'];?></option>
                                                              <?php


}
                                                              ?>
                                                              
                                                            </select>

                                                            
                                                            <span class="field-validation-valid font-red" data-valmsg-for="bankname" data-valmsg-replace="true"></span>
                                                </div>
                                            </div>





                                                 <div class="row mg-t-10">
                                                
                                                        <label class="col-md-4 form-control-label">Code :</label>
                                                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                            
                                                            <input type="text" class="form-control" name="ledger_type" id="ledger_type" value="<?php echo $led['type']; ?>" placeholder="Ledger Code" required >
                                                             
                                                            <span class="field-validation-valid font-red" data-valmsg-for="bankname" data-valmsg-replace="true"></span>
                                                </div>
                                            </div>























                                        
                                          
               

   
 <div class="row mg-t-10">
                                                
                    <label class="col-md-4 form-control-label">Nature :</label>
                                                        <div class="col-sm-4 mg-t-6 mg-sm-t-0">
                                                            
   <select class="form-control" name="nature" id="nature"  >
                                                            <?php
                                                            
 $nature = mysqli_query($conn,"select * from nature "); 

                while ($nat = mysqli_fetch_array($nature)){
                                                            ?>
  <option value="<?php echo $nat['name'];?>"><?php echo $nat['name'];?></option>
                                                              <?php


}
                                                              ?>
                                                              
                                                            </select>
           <span class="field-validation-valid font-red" data-valmsg-for="bankname" data-valmsg-replace="true"></span>

                                                         
                                                </div>
     <span style="padding-right:20px;"><button type="button" class="ion-plus-circled tx-16 lh-0 op-6" data-toggle="modal" data-target="#modaldemo1" ></button></span><span style=" font-size: 20px;  ">Add Nature</span>

                                            </div>


 <div id="modaldemo1" class="modal fade">
              <div class="modal-dialog modal-dialog-vertical-center" role="document">
                <div class="modal-content bd-0 tx-14">
                  <div class="modal-header pd-y-20 pd-x-25">
                    <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Nature Type</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>


                  <div class="modal-body pd-25">
                   <div class="row mg-t-10">
                    <label class="col-md-2 form-control-label">Nature </label>
                   <div class="col-sm-10 mg-t-5 mg-sm-b-10">
     <input class="form-control" data-val="true" data-val-length="The field bodytype must be a string with a maximum length of 100." data-val-length-max="100" placeholder="Ex:Fuel,Bank" id="ass_gc" maxlength="100" name="assgc" value="" type="text"  >
                      <span class="field-validation-valid font-red" data-valmsg-for="bodytype" data-valmsg-replace="true"></span>
                    </div>
                  </div>  
 <div class="modal-footer">
                  <button type="button" id="addgc" class="btn btn-info pd-x-20" data-dismiss="modal" >Done</button>
                  <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal">Close</button>
                </div>
              </div></div>


<script>

  $(document).on('click','#addgc', function(){

/*alert("enter");*/




   var assgc = $('#ass_gc').val();
/*   alert(assgc);*/
  var action = "Nature";
$.ajax({
     url:"gcno_actions.php",
     method:"POST",
     data:{gcno:assgc,act:action},
     success:function(data)
     {
alert(data);

/*      alert(data);*/
      /*$("#gcdiv").html(data);*/
      
     }  

    });


 location.reload();
  });

</script>

         </div><!-- modal-dialog -->

          </div>
                             
                             
                       <div class="form-layout-footer mg-t-30">
                <button type="submit" value="submit" name="submit" class="btn btn-info mg-r-5">Add Ledger</button>
                <input type="hidden" name="action" value="<?php if($_REQUEST['flag'] =='Edit') echo $_REQUEST['flag']; else echo 'Add'; ?>">
                <button type="reset" value="Reset" class="btn btn-secondary">Cancel</button>
              </div>


                                    </div>

          
        </div>
 
</div>
      </div><!-- am-pagebody -->
    </form>




      

      

    
      <?php include('../include/adminfooter.php'); ?> 
    <!-- <script>
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
</script> -->

<script>
 $(function() {
      $('#myVariable').datepicker({dateFormat: 'dd/mm/yy'});
});
</script>
