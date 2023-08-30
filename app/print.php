
<?php include('../include/dbConnect.php'); ?>
<?php include('../include/checklogin.php'); ?>
<?php   include('../include/adminheader.php'); ?>

    <link href="../lib/jquery-toggles/toggles-full.css" rel="stylesheet">
    <link href="../lib/highlightjs/github.css" rel="stylesheet">
    <link href="../lib/datatables/jquery.dataTables.css" rel="stylesheet">
    <link href="../lib/select2/css/select2.min.css" rel="stylesheet">
 
<?php include('../include/header.php'); ?>
<?php include('../include/leftmenu.php'); 
      require('../include/basefunctions.php');  ?> 


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Report</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
   <link rel="stylesheet" href="../../dist/css/skins/_all-skins.min.css">
<link rel="stylesheet" type="text/css" href="print.css" media="print" /> </p>
</head>
<body onload="window.print();">
<div class="wrapper" >
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!-- Main content -->
    <section class="invoice" style="border: 2px ridge" class="col-md-2 col-sm-2 mg-b-20 mg-sm-b-0 pd-r-20 pd-l-0">
      <!-- title row -->
	  <div>
	  </div>
	   <h3 style="margin-top:25px;"><center><b> REPORT</b></center></h3>

		<table style="margin-top:-30px;border: 2px ridge" class="table no-margin"></br></br>
                  <thead style="border: 2px ridge"><strong>
                  <tr>
				   <th style="width:20px;"><b>S.NO</b></th>
                  <th style="width:120px;"><b>Vehicle Number</b></th>
                  <th style="width:50px;font-weight: bold;font-weight: 900;">GC Ref. Number</th>
                  <th style="width:130px;"><b>Date</b></th> 
                  <th style="width:60px;"><b>Driver Name</b></th> 
				<th style="width:120px;"><b>Halt Wages </b></th>
                  <th style="width:120px;"></b>Driver Wages </b></th> 
                  <th style="width:120px;"><b>Trip Bal </th>
                 </b></tr></strong>
                </thead>
                 <tbody>				
		<?php
             $cnt=0;
             $sessid=$_SESSION['MintId'];
               $pinqry = mysqli_query($conn,"SELECT * from trip_calculation "); 
                while ($res = mysqli_fetch_array($pinqry)){ 
   ?>
     <?php
$query2 = mysqli_query($conn,"SELECT * FROM drivers WHERE id = '" . $res['driver'] . "';");
$dri=mysqli_fetch_assoc($query2); 
?>           <tr style="border: 2px ridge">
                  <td style="width: 10px"><?php echo $cnt+=1; ?> </td>
                    <td><?php echo $res['vechno']; ?> </td>
                    <td><?php echo $res['tripid']; ?></td>
                  <td><?php echo $res['ent_date']; ?></td>
				<td><?php echo $dri['name']; ?></td>                  
                   <td><?php echo $res['driver_halt_wage']; ?></td>
                   <td><?php echo $res['driver_wages']; ?></td>
                   <td><?php echo $res['driver_bal']; ?></td>
                </tr>
				<?php } ?>
                </tbody>
                </table>
				
        </div>

      <!-- /.row -->
	  
   </section>
    <!-- /.content -->
    <div class="clearfix"></div>

  <!-- /.content-wrapper -->
  
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>

<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="../../plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="../../bootstrap/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="../../plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
    <style>
@media print {
    .ion-printer,.dropdown.dropdown-profile,.toppor,.am-pagetitle,.am-header,.am-sideleft,.dataTables_length,.dataTables_filter,.dataTables_paginate.paging_simple_numbers,.dataTables_info {
      display: none;
          }
    title {
      display: none;
    }
.dridet{
  display: block;
}
  
table th { font-weight:bold !important;color:#000 !important;}
 
}</style>
</body>
</html>  
