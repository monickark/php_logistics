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
 if($_REQUEST['flag'] == "Delete"){
 $id =$_REQUEST['id'];

    $update_id = array(
      "id"      =>    mysqli_real_escape_string($data->con, $id)
    );

    $insid = $data->delete_where('finance_details', $update_id);
echo '<script> alert("Company Deleted Successfully");window.location.assign("finance_list.php");</script>';
 }
 

?>





    <div class="am-mainpanel">
      <div class="am-pagetitle">
        <h5 class="am-title">View Finance Details</h5>
      
          
        <!-- search-bar -->
      </div>
      <!-- am-pagetitle -->
      <div class="am-pagebody">
        <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">Finance Details</h6>
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

          <div class="table-wrapper">
            <table id="datatable1" class="table display responsive nowrap">
              <thead>
                <tr>
                  <th class="wd-10p">Sl No</th>
                  <th class="wd-15p">Company Name</th>
                  <th class="wd-15p">vehicle</th>
                  <th class="wd-10p">Finance amount</th>
                  <th class="wd-10p">Finance EMI</th>                  
                  <th class="wd-10p">Bill No</th> 
                  <th class="wd-15p">Paying Amount</th> 
                  <th class="wd-15p">Paid Amount</th> 
                  <th class="wd-15p">Balance</th> 
                   <th class="wd-5p">Action</th>  
                </tr>
              </thead>
              <tbody>
                <?php
                $i=1;
                $sessid=$_SESSION['MintId'];
               $pinqry = mysqli_query($conn,"select * from finance_details where intAdminId ='$sessid'"); 
                while ($res = mysqli_fetch_array($pinqry)){ 
                 $id = $res['id'];
  ?>
                <tr>
                  <td><?php echo $i; ?></td>
                  <td><?php echo $res['name']; ?></td>
                  <td><?php echo $res['v_num']; ?></td>
                  <td><?php echo $res['finance_amount']; ?></td>
                  <td><?php echo $res['finance_emi']; ?></td>
                  <td><?php echo $res['bill_no']; ?></td> 
                  <td><?php echo $res['paying_amount']; ?></td>
                  <td><?php echo $res['amount_paid']; ?></td>
                  <td><?php echo $res['balance']; ?></td>
                  <td>
                   <a class="iconp" href="addfinance_details.php?id=<?php echo $id;?>&flag=Edit"><i class="icon ion-edit tx-16"></i></a>
<a  class="idelete iconp" href="finance_list.php?id=<?php echo $id;?>&flag=Delete"><i class="icon ion-trash-a tx-16"></i></a>
<!-- <a class="iconp" href="finance_list.php?id=<?php echo $id;?>&flag=View"><i class="icon ion-search tx-16"></i></a> -->
                </tr>
                <?php $i++;} ?>
                 
              </tbody>
            </table>
          </div><!-- table-wrapper -->
        </div>
      </div>

    <!-- vendor css -->
  
<!-- 
    <script src="../lib/jquery/jquery.js"></script>
    <script src="../lib/popper.js/popper.js"></script>
    <script src="../lib/bootstrap/bootstrap.js"></script>
    <script src="../lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js"></script>
    <script src="../lib/jquery-toggles/toggles.min.js"></script>
    <script src="../lib/highlightjs/highlight.pack.js"></script>
    <script src="../lib/datatables/jquery.dataTables.js"></script>
    <script src="../lib/datatables-responsive/dataTables.responsive.js"></script>
    <script src="../lib/select2/js/select2.min.js"></script>

    <script src="../js/amanda.js"></script> -->
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

     