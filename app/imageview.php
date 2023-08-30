
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

<?php
$data = new Basefunc; 
 $id =$_REQUEST['id'];
 $id=$_REQUEST['tripid'];

$pinqry = mysqli_query($con,"SELECT * from  pod where id ='$tripid';"); 
                $res = mysqli_fetch_array($pinqry);
?>
 




    <div class="am-mainpanel">
      <div class="am-pagetitle">
        <h5 class="am-title">View POD</h5>
      
          
        <!-- search-bar -->
      </div>
      <!-- am-pagetitle -->
      <div class="am-pagebody">
        <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">View Uploaded POD</h6>
          <p class="mg-b-20 mg-sm-b-30"> </p>
          <?php if($_REQUEST['flag']=='succ'){?>
          <div class="alert alert-success" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  <div class="d-flex align-items-center justify-content-start">
    <i class="icon ion-ios-checkmark alert-icon tx-32 mg-t-5 mg-xs-t-0"></i>
    <span><strong>Well done!</strong> Successful Created Pin.</span>
  </div><!-- d-flex -->
</div><!-- alert --><?php }?>

 
<?php

 $data = new Basefunc; 
$id=$_REQUEST['tripid'];
  //print_r($_SESSION); 

               //echo "SELECT * FROM pod WHERE tripid ='".$res['tripid']."'";

               $pinqry = mysqli_query($conn,"SELECT * FROM pod WHERE tripid ='".$id."'"); 
                   $res=mysqli_fetch_array($pinqry);
               ?>
                    
                <div class="full_width table display responsive nowrap">
                <div class="company_name">Company Name :&nbsp;<?php echo $res['company'];?></div>
                <div class="company_name">Trip Date :&nbsp;<?php echo $res['ent_date'];?></div>
                <div class="company_name">Trip ID :&nbsp;<?php echo $res['tripid'];?></div>
                </div>
              

      <div class="full_width">
                <?php
               // print_r($_SESSION);

               
                      $pinqry1 = mysqli_query($conn,"SELECT * from pod WHERE tripid='".$id."'"); 
                while ($res1 = mysqli_fetch_array($pinqry1)){ 
             //echo  $file = $res1['copy'];
                       
         ?>
         <?php if($res1['copy']=="") { ?>

                    <img src="../img/userno.png" width="100px" >
                  <?php }else{ ?>
          <div class="grid_img"><a href="pod/<?php echo $res1['copy']; ?>">
          <?php echo  $file = $res1['copy']; ?><br>
          <img src="pod/<?php echo $res1['copy']; ?>" width="100px" > </a></div><?php }?>
                   <?php } ?>
                   </div>
                               

    <!-- vendor css -->
  

    <script src="../lib/jquery/jquery.js"></script>
    <script src="../lib/popper.js/popper.js"></script>
    <script src="../lib/bootstrap/bootstrap.js"></script>
    <script src="../lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js"></script>
    <script src="../lib/jquery-toggles/toggles.min.js"></script>
    <script src="../lib/highlightjs/highlight.pack.js"></script>
    <script src="../lib/datatables/jquery.dataTables.js"></script>
    <script src="../lib/datatables-responsive/dataTables.responsive.js"></script>
    <script src="../lib/select2/js/select2.min.js"></script>

    <script src="../js/amanda.js"></script>
    <script>
      $(function(){
        'use strict';

        $('#datatable1').DataTable({
          responsive: true,
          language: {
            searchPlaceholder: 'Search...',
            sSearch: '',
            lengthMenu: '_MENU_ items/page',
          }
        });

        $('#datatable2').DataTable({
          bLengthChange: false,
          searching: false,
          responsive: true
        });

        // Select2
        $('.dataTables_length select').select2({ minimumResultsForSearch: Infinity });

      });
    </script>
  </body>
</html>
      <?php //include('../include/adminfooter.php'); ?> 