<?php
session_start();

 $_SESSION['name'] ='' ;

  $_SESSION['email'] = '';
  $_SESSION['MintId'] = '';
  $_SESSION['sessionid'] = '';
session_destroy();
echo '<script>alert("Logout Success");window.location.assign("signin.php");</script>';
?>     