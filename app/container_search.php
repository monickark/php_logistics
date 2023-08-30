<?php include('../include/dbConnect.php'); ?>

<?php include('../include/checklogin.php'); ?>

<?php include('../include/adminheader.php'); ?>

<?php include('../include/header.php'); ?>

<?php include('../include/leftmenu.php');  
      require('../include/basefunctions.php');
?>


<?php


 if($_REQUEST['action'] == "Add"){
if($_POST['cusCity']=="")
{
  echo '<script> alert("Please give a Container Number.");</script>';

}


else
{

$bank_check=mysqli_query($conn,"SELECT * FROM load_det WHERE cont_no ='" .$_POST["cusCity"]. "'; " );


if(mysqli_num_rows($bank_check)==0)
{
  
   
echo '<script> alert("No Such Container.");</script>';
   

}
else
{
$cont=mysqli_fetch_assoc($bank_check);

header("Location:container_search.php?flag=disp&id=".$cont["id"]);

}

/*if(mysqli_num_rows($bank_check)==0)
{
        $bank = array(
        "intAdminId"       =>     mysqli_real_escape_string($data->con, $_SESSION['MintId']),
        "name"           =>     mysqli_real_escape_string($data->con, $_POST['bankname'])
      ); 
 $bank_insert = $data->insert('banks', $bank);

}*/
}
}



?>

    <div class="am-mainpanel">

      <div class="am-pagetitle">

        <h5 class="am-title">Search Master</h5>

        <!-- search-bar -->

      </div>

      <!-- am-pagetitle -->

        <form id="searchBar" class="search-bar"  method="POST" action="">

      <div class="am-pagebody">

 <div class="card pd-20 pd-sm-20 mg-t-20 form-layout form-layout-4">

       <div class="row row-sm mg-t-10">

          <div class="col-xl-12">

           

            <div class="portlet-body">
           










<div class='toppor'>
                                          <h6 class="card-body-title">Container Search</h6>


                                                        <div class="row mg-t-20" >
                                                            
                                                                <label class="col-md-2 col-sm-2 form-control-label">Container Number:</label>
                                                                <div class="col-sm-8 col-md-2  col-xs-12 mg-t-10 mg-sm-t-0">
                                                                  




 <input type="text" class="form-control" data-val="true" placeholder="Enter Driver Name" id="cusCity" maxlength="50" name="cusCity"  value="">


                                                              
                                                        </div> 
                                                            </div>
                                                        </div>

     <div class="form-layout-footer mg-t-30">
                <button type="submit" value="submit" name="submit" class="btn btn-info mg-r-5">Search Container</button>
                <input type="hidden" name="action" value="<?php if($_REQUEST['flag'] =='Edit') echo $_REQUEST['flag']; else echo 'Add'; ?>">
                <button type="reset" value="Reset" class="btn btn-secondary">Cancel</button>
              </div>

                                                      


                              








     </div>



<style>
.dridet{
  display: none;
}

</style>

<?php


if($_REQUEST['flag']=="disp")
{
$cont_det=mysqli_query($conn,"SELECT * FROM load_det WHERE id ='" .$_REQUEST["id"]. "'; " );
$cont=mysqli_fetch_assoc($cont_det);

echo'

 <div class="row mg-t-10 pd-t-20-force pd-b-20-force" id="responsecontainera" style="background-color: #fff;">
                                                  



 <div class="col-xl">';


echo'
  <table class="table" width="100%" >
      <div class="col-lg-12 tableHeading" style="padding:0px;">CONTAINER SEARCH</div>
      <div class="col-lg-12" style="padding:0px;">
          <span class="col-lg-2" style="padding:0px;background-color:#bbb; font-weight:bold;">Container No</span>
            <span class="col-lg-10" style="padding:0px;">'.$cont['cont_no'].'</span>
        </div>
        <thead>
          <tr>
            <th>S.No.</th>
            <th>ASS Ref<br />No</th>
            <th>Date</th>
            <th>Vehicle</th>
            <th>From</th>
            <th>To</th>
            <th>Container<br />Size</th>
            <th>Load Type</th>
            <th>Weight</th>
            <th>Party Name</th>
            <th>Transporter</th>
            <th>Freight<br />Amount</th>
            <th>Invoice No</th>
            <th>Invoice<br />Date</th>
          </tr>
        </thead>
        <tbody>';


$pod_det=mysqli_query($conn,"SELECT * FROM pod WHERE tripid ='" .$cont['tripid']. "'; " );
$pod=mysqli_fetch_assoc($pod_det);

$frt_det=mysqli_query($conn,"SELECT * FROM frieghtdetails WHERE tripid ='" .$cont['tripid']. "'; " );
$frt=mysqli_fetch_assoc($frt_det);



echo'
          <tr>
            <td>1</td>
            <td>'.$cont['tripid'].'</td>
            <td>'.$cont['ent_date'].'</td>
            <td>'.$cont['vechno'].'</td>
            <td>'.$cont['from_place'].'</td>
            <td>'.$cont['to_place'].'</td>
            <td>'.$cont['contsize'].'</td>
            <td>'.$cont['load_type'].'</td>
            <td>'.$cont['cont_wt'].'</td>
            <td>'.$cont['party_name'].'</td>
            <td>'.$cont['transporter'].'</td>
            <td>'.$frt['amount'].'</td>
            <td>'.$pod['tripid'].'</td>
            <td>'.$pod['tripid'].'</td>
          </tr>
        </tbody>
      </table>';


echo'
      </div></div>';


}
?>


  




                                  </div>




                        


          
        </div>
 
</div>
      </div><!-- am-pagebody -->
    </form>
      <?php 
      include('../include/adminfooter.php'); ?> 
    <script>
$('.datepicker').datepicker({
    dateFormat: 'dd/mm/yy'
});
</script>

<style>
@media print {
    .ion-printer,.dropdown.dropdown-profile,.toppor,.am-pagetitle,.am-header,.am-sideleft {
      display: none;
      
    }

    title {
      display: none;
    }
.dridet{
  display: block;
}


}


@page 
    {
        size:  auto;   /* auto is the initial value */
        margin: 0mm;  /* this affects the margin in the printer settings */
        margin-top: -200px;

    }

</style>


<style>
.main{width:98%; margin:2% auto;}
.main .table div{text-align:center; border:1px solid #555;}
.main .table,.tableHeading, span, th, td{border:1px solid #555;}
table, tr, th, td,.tableHeading{ text-align:center; font-size:12px;}
.table>thead>tr>th{border-bottom:2px solid #555 !important;}
thead{background-color:#fff;}
.tableHeading{font-size:16px;}

</style>  

    <style>
@media print {
 

  #hide,#back,.ion-printer,.am-header-left,.am-header,.am-pagetitle,.am-sideleft,.am-footer{

    display:none;
  }
.card{

    border-bottom: 0px;
}
  #responsecontainera  {
    background:transparent;
   
  }

  #responsecontainera{
   
    left: 0;
    margin-top:0px;

  }
  th{
    color: #000 !important; 
    
  }
}
 
</style>