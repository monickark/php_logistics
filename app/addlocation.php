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

$city=$_POST['cusCity'];
$state=$_POST['cusState'];

 $group = mysqli_query($conn,"SELECT * from district WHERE StCode='$state' AND DistrictName='$city'; "); 



          if(mysqli_num_rows($group)==0)
          {

/*  echo '<script>alert("'.$_POST['cusState'].'");</script>';
echo '<script>alert("'.$_POST['cusCity'].'");</script>';*/


$insert_city = array(

      "StCode"                  =>     mysqli_real_escape_string($data->con, $_POST['cusState']), 
      "DistrictName"            =>     mysqli_real_escape_string($data->con, $_POST['cusCity'])
  
      
      );  
       $insid = $data->insert('district', $insert_city);
      
 





   if($insid){

    echo '<script> alert("Location Addeed Successfully");window.location.assign("addlocation.php");</script>';
   } 
   else{
    echo '<script> alert("Error");</script>';
   }}
   else
   {

    echo '<script> alert("Area Already Present");</script>';

   }
}else
{

$update_loc = array( 
      "StCode"                  =>     mysqli_real_escape_string($data->con, $_POST['cusState']), 
      "DistrictName"            =>     mysqli_real_escape_string($data->con, $_POST['cusCity'])
      
      );  
 $id =$_REQUEST['id'];
 $update_id = array(
      "DistCode"      =>    mysqli_real_escape_string($data->con, $id)
    );

       $insid = $data->update('district', $update_loc, $update_loc);
      if($insid){

    echo '<script> alert("Location Altered Successfully");window.location.assign("viewlocation.php");</script>';
   } 
   else{
    echo '<script> alert("Error in Updating");</script>';
   }

}

  
}

 if($_REQUEST['flag'] == "Edit"){
 $id =$_REQUEST['id'];

    $update_id = array(
      "DistCode"      =>    mysqli_real_escape_string($data->con, $id)
    );

    $insid = $data->select_where('district', $update_id);
    /*print_r ($insid);*/
 }

?> 


    <div class="am-mainpanel">
      <div class="am-pagetitle">
        <h5 class="am-title">Location Master</h5>
           <!-- search-bar -->

      </div>
      <!-- am-pagetitle -->

        <form id="searchBar" class="search-bar"  method="POST" action="">

      <div class="am-pagebody">

 <div class="card pd-20 pd-sm-40 form-layout form-layout-4">

       <div class="row row-sm mg-t-20">

          <div class="col-xl-6">

           

            <div class="portlet-body">

                                          <h6 class="card-body-title">Location Details</h6>

                                                                         
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.16.0/jquery.validate.min.js"></script> 
<script>

$(document).ready( function () {
    $( "#searchBar" ).validate( {
    
        rules: {
          cusCity: "required"
       
           
          },
        messages: {
          cusCity: "Please enter your City Name"

       
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
                                                            
                                                                <label class="col-md-4 form-control-label">State:</label>
                                                                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                                    <select onChange="getdistrict(this.value);"  name="cusState" id="cusState" class="form-control" required>





<option value="">Select </option>
<?php $query =mysqli_query($conn,"SELECT * FROM state");
while($row=mysqli_fetch_array($query))
{ ?>
<option value="<?php echo $row['StCode'];?>" <?php if($row['StCode']==$insid[0]['StCode']) echo 'selected="selected"'; ?> ><?php echo $row['StateName'];?></option>
<?php
}
?>
</select>
                                                                    <span class="field-validation-valid font-red" data-valmsg-for="stateid" data-valmsg-replace="true"></span>
                                                                
                                                            </div>
                                                        </div>
                                                        <div class="row mg-t-10">
                                                            
                                                                <label class="col-md-4 form-control-label">City:<p style="color: red;">*</p></label>
                                                                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                                  




 <input class="form-control emp_val" data-val="true" placeholder="Enter City" id="cusCity" maxlength="50" name="cusCity" type="text" value="<?php echo $insid[0]['DistrictName']; ?>" onkeyup="empty()" required>
                                                                    <span class="field-validation-valid font-red" data-valmsg-for="cityid" data-valmsg-replace="true"></span>
                                                              
                                                            </div>
                                                        </div>
                                                      


                                  </div>



                       <div class="form-layout-footer mg-t-30">
                <button type="submit" value="submit" name="submit" id="sub"class="btn btn-info mg-r-5">Submit</button>
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
 $(function() {
      $('#myVariable').datepicker({dateFormat: 'dd/mm/yy'});
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
$("#cancel").click(function(e) {
/*  alert("maans");*/
if(confirm("Leave Page??"))
{

/*
  $(location).attr("href", "viewtransporter.php");*/
/*  window.location.replace("viewtransporter.php"); */
/*  window.location.href("viewtransporter.php"); */
  window.location.href = "addlocation.php";
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