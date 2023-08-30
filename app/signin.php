<?php 
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require('../include/dbConnect.php');
include('../include/adminheader.php'); ?>

  <body>
<?php

/*echo '<script>alert("'.$_SESSION['email'].'");</script>';
echo '<script>alert("'.$_SESSION['sessionid'].'");</script>';*/

 $email = mysqli_real_escape_string($conn,$_POST['email']);
$password = mysqli_real_escape_string($conn,$_POST['password']);

if($_POST['email'] ){
$query = mysqli_query($conn,"select * from user where varMEmail='$email' and varMPassword='$password'");
if(mysqli_num_rows($query)>0){
 
 
$query = mysqli_query($conn,"select * from user where varMEmail='$email' ");
$res   = mysqli_fetch_array($query); 
  $_SESSION['name'] = $res ['varMName']; 




  
  $_SESSION['type'] = $res ['varMType']; 
  $_SESSION['transpid'] = $res ['transporter_id']; 

  $_SESSION['email'] = $res ['varMEmail'];
  $_SESSION['MintId'] = $res ['intId'];
  $_SESSION['sessionid'] = session_id(); 

/*  echo '<script>alert("'.$_SESSION['sessionid'] .'");</script>';
  echo '<script>alert("'.$_SESSION['email'] .'");</script>';*/







if($_SESSION['type']=='Transporter')
{

   /*header("location: http://infogenx.com.au/logistics/webzash/wzusers/login");*/
   
 /* echo '<script>window.open("http://infogenx.com.au/logistics/webzash/wzusers/login", "_blank");</script>';*/

   echo '<script>window.location.assign("transp_index.php");</script>';

}
else
{
/*echo '<script>window.open("http://infogenx.com.au/logistics/webzash/wzusers/login", "_blank");</script>';*/
  
   echo '<script>window.location.assign("index.php");</script>';

 }
  
}
else{
  echo '<script>alert("Email id or password is wrong.");window.location.assign("signin.php");</script>';
}
}

?>
  <script language="JavaScript"> 
    function setText(){ 
      document.loginForm.submit();

    } 
    </script>
    <div class="am-signin-wrapper">
      <div class="am-signin-box col-sm-12 col-md-12 col-lg-3 ">
        <div class="row no-gutters">
          <div class="col-lg-12">
            <div>
             <h2 style="color: #fff;font-weight: 400;letter-spacing: 3px;">ASS Logistics</h2>
              <p>An Logistics Company</p>
              

             <!--  <hr>
              <p>Don't have an account? <br> <a href="page-signup.html">Sign up Now</a></p> -->
            </div>
          </div>
          <div class="col-lg-12">
            <h5 class="tx-gray-800 mg-b-25">Log In</h5>
            <form name="loginForm" id="loginForm" method="post">

            <div class="form-group">
              <!--<label class="form-control-label">Email:</label>-->
              <input type="email" name="email" class="form-control" placeholder="Enter your email address" style="background:  #fff;border: none;border-bottom: 1px solid #e0e0e0; margin-top:30px;">
            </div><!-- form-group -->

            <div class="form-group">
              <!--<label class="form-control-label">Password:</label>-->
              <input type="password" name="password" class="form-control" placeholder="Enter your password" style="background:  #fff;border: none;border-bottom: 1px solid #e0e0e0; margin-top:20px; margin-bottom:20px">
            </div><!-- form-group -->

            

            <button type="submit" class="btn btn-block" onclick="setText()" style="border-radius: 12px;padding: 14px;font-size: 22px;margin-top: 20px;margin-bottom: 20px;float:  left;">Sign In</button>
			<div class="form-group" style="text-align:  center;margin-top: 20px;margin-bottom: 0;"><a href="" style="color:  #fb9337;font-size: 18px; ">Reset password</a></div>
          </form>
          </div><!-- col-7 -->
        </div><!-- row -->
        <p class="tx-center tx-white tx-14 mg-t-15">Copyright &copy; <?php echo date("Y")?>. All Rights Reserved. Infogenx</p>
      </div><!-- signin-box -->
    </div><!-- am-signin-wrapper -->
  

   <!--  <script src="../lib/jquery/jquery.js"></script>
    <script src="../lib/popper.js/popper.js"></script>
    <script src="../lib/bootstrap/bootstrap.js"></script>
    <script src="../lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js"></script>

    <script src="../js/amanda.js"></script> --> 