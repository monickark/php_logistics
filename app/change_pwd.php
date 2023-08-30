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

/*echo '<script> alert("'.$_POST['email'].'");</script>';*/
 $update_id = array(
      "varMEmail"      =>    mysqli_real_escape_string($data->con, $_POST['email'])
    );



$insert_cred = array(
      "varMPassword"    =>     mysqli_real_escape_string($data->con, $_POST['new_pwd'])
      
      
      );  
       $inscred = $data->update('user',$insert_cred,$update_id);

if($inscred)
{

 echo '<script> alert("Password Changed Successfully");window.location.assign("change_pwd.php");</script>';
}else
{
    echo '<script> alert("Error in Changing");</script>';
}

}


?>


    <div class="am-mainpanel">

      <div class="am-pagetitle">

        <h5 class="am-title">Account Management</h5>

      

          

        <!-- search-bar -->

      </div>

      <!-- am-pagetitle -->

        <form id="searchBar" class="search-bar"  method="POST" action="">

      <div class="am-pagebody">

 <div class="card pd-20 pd-sm-20 form-layout form-layout-4">

       <div class="row row-sm mg-t-0">

          <div class="col-xl-12">

           

            <div class="portlet-body">

                                          <h6 class="card-body-title">Change Password</h6>
                                               <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.16.0/jquery.validate.min.js"></script> 
<script>

$(document).ready( function () {
    $( "#searchBar" ).validate( {
    
        rules: {
                new_pwd: {
            required: true,
            minlength: 6
          },
            ret_new_pwd: {
            required: true,
            minlength: 6,
            equalTo: "#new_pwd"
          }
          },
        messages: {
              new_pwd: {
            required: "Please type New password",
            minlength: "Your password must be at least 6 characters long"
          },
          
          ret_new_pwd: {
            required: "Please Re-Enter your password",
            minlength: "Your password must be at least 6 characters long"
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
          $( element ).parents( ".col-sm-3" ).addClass( "has-error" ).removeClass( "has-success" );
        },
        unhighlight: function (element, errorClass, validClass) {
          $( element ).parents( ".col-sm-3" ).addClass( "has-success" ).removeClass( "has-error" );
        }
        
      } );  

  

});


$(window).on('load', function()  {
fetch_data();
});
</script> 
                                          
                                          
<?php
$name=$_SESSION['name'];
/*echo '<script> alert("'.$name.'");</script>';*/
$query =mysqli_query($conn,"SELECT * FROM user WHERE varMName = '$name' ;");        
                                                      $row=mysqli_fetch_array($query);

?>
<input type="hidden" value="<?php echo $row['varMPassword']; ?>" id="opwd" >
  <div class="row mg-t-10">
       <label class="col-md-4 form-control-label">Email :</label>
       <div class="col-sm-3 mg-t-10 mg-sm-t-0">
        <input class="form-control" data-val="true" data-val-length="The field accountno must be a string with a maximum length of 50." data-val-length-max="50" id="email"  maxlength="50" name="email" type="text" value="<?php echo $row['varMEmail']; ?>" readonly >
        <span class="field-validation-valid font-red" data-valmsg-for="accountno" data-valmsg-replace="true"></span>
      </div>
    </div>
  <div class="row mg-t-10">
       <label class="col-md-4 form-control-label">Old Password :</label>
       <div class="col-sm-3 mg-t-10 mg-sm-t-0">
        <input class="form-control" data-val="true" data-val-length="The field accountno must be a string with a maximum length of 50." data-val-length-max="50" id="old_pwd" placeholder="Old Password" maxlength="50" name="old_pwd" type="password" onblur="oldcheck();" autocomplete="off" >
        <span class="field-validation-valid font-red" data-valmsg-for="accountno" data-valmsg-replace="true"></span>
      </div>
    </div>
    <script>
function oldcheck()
{
  var pwd1 = $('#opwd').val();
var pwd2 = $('#old_pwd').val();
if(pwd1!=pwd2)
{
$('#pwdmat').html("Incorrect Old Password").css('color', '#FF0000');
$(':input[type="submit"]').prop('disabled', true);
$('#new_pwd').attr('disabled', true);
$('#ret_new_pwd').attr('disabled', true);
}
else
{
  $('#pwdmat').html("");
  /*$(':input[type="submit"]').prop('disabled', false);*/
  $('#new_pwd').attr('disabled', false);
$('#ret_new_pwd').attr('disabled', false);
}

}
    </script>
  <div class="row mg-t-10">
       <label class="col-md-4 form-control-label">New Password :</label>
       <div class="col-sm-3 mg-t-10 mg-sm-t-0">
        <input class="form-control" data-val="true" data-val-length="The field accountno must be a string with a maximum length of 50." data-val-length-max="50" id="new_pwd" placeholder="New Password" maxlength="50" name="new_pwd" type="password" autocomplete="off" required>
        <span class="field-validation-valid font-red" data-valmsg-for="accountno" data-valmsg-replace="true"></span>
      </div>
    </div>
  <div class="row mg-t-10">
       <label class="col-md-4 form-control-label">Re-Type New Password :</label>
       <div class="col-sm-3 mg-t-10 mg-sm-t-0">
        <input class="form-control" data-val="true" data-val-length="The field accountno must be a string with a maximum length of 50." data-val-length-max="50" id="ret_new_pwd" placeholder="Re-Type New Password" maxlength="50" name="ret_new_pwd" type="password" onkeyup="check();" autocomplete="off" required>
        <span class="field-validation-valid font-red" data-valmsg-for="accountno" data-valmsg-replace="true"></span>
      </div>
    </div>
<script>
function check()
{
var pwd1 = $('#new_pwd').val();
var pwd2 = $('#ret_new_pwd').val();
if(pwd1!=pwd2)
{
$('#pwdmat').html("Password's Do Not Match").css('color', '#FF0000');
$(':input[type="submit"]').prop('disabled', true);
}
else
{
  $('#pwdmat').html("Password's Match").css('color', '#008000');
  $(':input[type="submit"]').prop('disabled', false);
}
  
}
</script>
 <div id="pwdck">
                                                                </div>

 <div id="pwdmat">
                                                                </div>

                                  </div>




                                    </div>
  <div class="form-layout-footer mg-t-30">
                <button type="submit" value="submit" name="submit" class="btn btn-info mg-r-5">Change Password</button>
                <input type="hidden" name="action" value="<?php if($_REQUEST['flag'] =='Edit') echo $_REQUEST['flag']; else echo 'Add'; ?>">
               
              </div>
          
        </div>
 
</div>
      </div><!-- am-pagebody -->

    </form>
      <?php 
      include('../include/adminfooter.php'); ?> 
