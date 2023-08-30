<?php 
session_start();
include('../include/checklogin.php'); 


?>
<?php include('../include/dbConnect.php'); ?>

<?php include('../include/adminheader.php'); ?>

<?php include('../include/header.php'); ?>
<?php include('../include/leftmenu.php'); ?> 
<?php include('../include/signout.php'); ?>






    <div class="am-mainpanel">
      <div class="am-pagetitle">
        <h5 class="am-title">Dashboard</h5>
       
      </div><!-- am-pagetitle -->

      <div class="am-pagebody">
        <div class="row row-sm">
          <div class="col-lg-4">
            <div class="card">
              <div id="rs1" class="wd-100p ht-200"></div>
              <div class="overlay-body pd-x-20 pd-t-20">
                <div class="d-flex justify-content-between">
                  <div>
                    <h6 class="tx-12 tx-uppercase tx-inverse tx-bold mg-b-5">Today's Bookings</h6>
                    <p class="tx-12"><?php  $dte=date("d/m/Y"); echo $dte; ?></p>
                  </div>
  <!--                 <a href="" class="tx-gray-600 hover-info"><i class="icon ion-more tx-16 lh-0"></i></a> -->
                </div><!-- d-flex -->
                <h2 class="mg-b-5 tx-inverse tx-lato"><?php   
$dte=date("Y/m/d");
$query5 = mysqli_query($conn,"SELECT id FROM frieghtdetails WHERE ent_date = '$dte' ");

$ret=mysqli_num_rows($query5); 
/*echo '<script>alert("'.$ret.'");</script>';*/
echo $ret;




                 ?></h2>
                <p class="tx-12 mg-b-0">Bookings Done Today.</p>
              </div>
            </div><!-- card -->
          </div><!-- col-4 -->
          <div class="col-lg-4 mg-t-15 mg-sm-t-20 mg-lg-t-0">
            <div class="card">
              <div id="rs2" class="wd-100p ht-200"></div>
              <div class="overlay-body pd-x-20 pd-t-20">
                <div class="d-flex justify-content-between">
                  <div>
                    <h6 class="tx-12 tx-uppercase tx-inverse tx-bold mg-b-5">Vehicles Available</h6>
                    <p class="tx-12">As of Today</p>
                  </div>
<!--                   <a href="" class="tx-gray-600 hover-info"><i class="icon ion-more tx-16 lh-0"></i></a> -->
                </div><!-- d-flex -->
                <h2 class="mg-b-5 tx-inverse tx-lato"><?php   
                $i=0;
$query = mysqli_query($conn,"SELECT vechNo FROM vehicles");
$dte=date("Y/m/d");
while($vech=mysqli_fetch_array($query))
{
$query_stat = mysqli_query($conn,"SELECT * FROM vechstat WHERE vechnum = '" . $vech["vechNo"] . "' ORDER  BY id DESC LIMIT  1");
$stat=mysqli_fetch_assoc($query_stat);

if($stat['status']==""||$stat['status']=="HHalt")
{

  $i++;
}


}
echo $i;
                ?></h2>
                <p class="tx-12 mg-b-0">Vehicles.</p>
              </div>
            </div><!-- card -->
          </div><!-- col-4 -->
          <div class="col-lg-4 mg-t-15 mg-sm-t-20 mg-lg-t-0">
            <div class="card">
              <div id="rs3" class="wd-100p ht-200"></div>
              <div class="overlay-body pd-x-20 pd-t-20">
                <div class="d-flex justify-content-between">
                  <div>
                    <h6 class="tx-12 tx-uppercase tx-inverse tx-bold mg-b-5">This Month's Collection</h6>
                    <p class="tx-12"><?php echo date('M Y'); ?></p>
                  </div>
<!--                   <a href="" class="tx-gray-600 hover-info"><i class="icon ion-more tx-16 lh-0"></i></a> -->
                </div><!-- d-flex -->
                <h2 class="mg-b-5 tx-inverse tx-lato"><?php 
$dte=date("Y-m-d");
$first=date('Y-m-01');
/*echo '<script>alert("'.$dte.'");</script>';
echo '<script>alert("'.$first.'");</script>';
*/

$query_amt = mysqli_query($conn,"SELECT * FROM party_payments where ent_date between '$first' and '$dte';");
$total=0;
while($cost=mysqli_fetch_assoc($query_amt))
{
$total=$cost['amount']+$total;

}
echo $total;
?>
                </h2>
                <p class="tx-12 mg-b-0">Rupees Only.</p>
              </div>
            </div><!-- card -->
          </div><!-- col-4 -->

        </div><!-- row -->
        <div class="row row-sm">
<div class="col-lg-4">
            <div class="card">
              <div id="rs1" class="wd-100p ht-200"></div>
              <div class="overlay-body pd-x-20 pd-t-20">
                <div class="d-flex justify-content-between">
                  <div>
                    <h6 class="tx-12 tx-uppercase tx-inverse tx-bold mg-b-5">Cash In Hand</h6>
                    <p class="tx-12">As of <?php  $dte=date("d/m/Y"); echo $dte; ?></p>
                  </div>
  <!--                 <a href="" class="tx-gray-600 hover-info"><i class="icon ion-more tx-16 lh-0"></i></a> -->
                </div><!-- d-flex -->
                <h2 class="mg-b-5 tx-inverse tx-lato"><?php   
$dte=date("Y/m/d");
$query5 = mysqli_query($conn,"SELECT * FROM account_voucher WHERE ledger_id = 'Cash' ORDER BY id DESC LIMIT 1");

$ret=mysqli_fetch_assoc($query5); 
/*echo '<script>alert("'.$ret.'");</script>';*/
echo $ret['closing_bal'];




                 ?></h2>
                <p class="tx-12 mg-b-0">Rupees Only.</p>
              </div>
            </div><!-- card -->
          </div>





  <div class="col-lg-4 mg-t-15 mg-sm-t-20 mg-lg-t-0">
            <div class="card">
              <div id="rs2" class="wd-100p ht-200"></div>
              <div class="overlay-body pd-x-20 pd-t-20">
                <div class="d-flex justify-content-between">
                  <div>
                    <h6 class="tx-12 tx-uppercase tx-inverse tx-bold mg-b-5">Total outstanding amount</h6>
                    <p class="tx-12">As per Today</p>
                  </div>
<!--                   <a href="" class="tx-gray-600 hover-info"><i class="icon ion-more tx-16 lh-0"></i></a> -->
                </div><!-- d-flex -->
                <h2 class="mg-b-5 tx-inverse tx-lato"><?php   
          $i=0;
$query = mysqli_query($conn,"SELECT * FROM ledger WHERE nature='Customer'");
/*$dte=date("Y/m/d");*/
while($vech=mysqli_fetch_array($query))
{
$query_stat = mysqli_query($conn,"SELECT * FROM account_voucher WHERE acc_inv = '" . $vech["name"] . "' ORDER BY id DESC LIMIT  1");
$stat=mysqli_fetch_assoc($query_stat);




if($stat['pay_mode']=="Payment Voucher")
{

/*
$acount=mysqli_query($conn,"SELECT * FROM payment_voucher WHERE id = '" . $det['mod_voucher_no'] . "' ORDER  BY id DESC LIMIT  1");
$stat=mysqli_fetch_assoc($acount);

*/


$check = mysqli_query($conn,"SELECT * FROM payment_voucher WHERE id = '" . $stat['mod_voucher_no'] . "' ORDER  BY id DESC LIMIT  1"); 
$op=mysqli_fetch_assoc($check);

$cl_bal=$stat['closing_bal'];


}
elseif($stat['pay_mode']=="Receipt Voucher")
{
/*$acount=mysqli_query($conn,"SELECT * FROM recipt_voucher WHERE id = '" . $det['mod_voucher_no'] . "' ORDER  BY id DESC LIMIT  1");
$stat=mysqli_fetch_assoc($acount);

*/
$check = mysqli_query($conn,"SELECT * FROM recipt_voucher WHERE id = '" . $stat['mod_voucher_no'] . "' ORDER  BY id DESC LIMIT  1"); 
$op=mysqli_fetch_assoc($check);

$cl_bal=$stat['closing_bal'];
}

$i+=$cl_bal;

}
echo $i;
                ?></h2>
                <p class="tx-12 mg-b-0">Rupees Only.</p>
              </div>
            </div><!-- card -->
          </div><!-- col-4 -->



          <div class="col-lg-4 mg-t-15 mg-sm-t-20 mg-lg-t-0">
            <div class="card">
              <div id="rs3" class="wd-100p ht-200"></div>
              <div class="overlay-body pd-x-20 pd-t-20">
                <div class="d-flex justify-content-between">
                  <div>
                    <h6 class="tx-12 tx-uppercase tx-inverse tx-bold mg-b-5">Amount in Accounts</h6>
                    <p class="tx-12"><?php echo date('M Y'); ?></p>
                  </div>
<!--                   <a href="" class="tx-gray-600 hover-info"><i class="icon ion-more tx-16 lh-0"></i></a> -->
                </div><!-- d-flex -->
                <h5 class="mg-b-5 tx-inverse tx-lato"><?php

$tot=0;
$dte=date("Y/m/d");

$query = mysqli_query($conn,"SELECT * FROM ledgers WHERE type='1' ; ");
/*$dte=date("Y/m/d");*/

while($vech=mysqli_fetch_array($query))
{

$acc_bal=0;

$query5 = mysqli_query($conn,"SELECT * FROM entryitems WHERE ledger_id = '".$vech['id']."'");

while($ret=mysqli_fetch_assoc($query5))
{

if($ret['dc']=='D')
{
$debit+=$ret['amount'];
}
else
{
$credit+=$ret['amount'];
}


}

$acc_bal=$debit+$vech['op_balance']-$credit;



$tot+=$acc_bal;

echo $vech['name']." -&nbsp&nbsp&nbsp&nbsp".$acc_bal;
echo "<br>";




}

/*echo '<script>alert("'.$ret.'");</script>';*/
echo "Total -&nbsp&nbsp&nbsp&nbsp".$tot;




                 ?>
                </h5>
                <p class="tx-12 mg-b-0">As of Now Today.</p>
              </div>
            </div><!-- card -->
          </div>
        </div>
           <div class="row row-sm mg-t-15 mg-sm-t-20 col-lg-12">
           <div class="col-lg-1">&nbsp;</div>
          <div class="col-sm-12 col-lg-10">
            <div class="card pd-20 pd-sm-40">
              <!--<h6 class="card-body-title card-body-title-dashboard"><center>Payments vs Receipts</center></h6>-->
              <h6 class="card-body-title card-body-title-dashboard"><center>Payments vs Receipts</center></h6>
              <p class="mg-b-20 mg-sm-b-30"></p>
               <div id="chartContainer" style="height: 370px; width: 100%;"></div>
            </div><!-- card -->
          </div>
           <div class="col-lg-1">&nbsp;</div>
          </div><!-- col-6 -->
         

<?php

$i=0;

for($j=0;$j<12;$j++)
{
if($i!=0)
{
$date1 = date("Y-m-01", strtotime("+1 month", strtotime($date1)));

$date2 = date("Y-m-t", strtotime("+1 month", strtotime($date2)));
}
else
{
$date1=date('Y-04-01');
$date2=date('Y-04-t');
}
/*echo '<script>alert("'.$date1.'");</script>';
echo '<script>alert("'.$date2.'");</script>';*/

${"income$j"}=0;

${"expense$j"}=0;


$query = mysqli_query($conn,"SELECT * FROM account_voucher WHERE pay_mode = 'Receipt Voucher' AND ent_date BETWEEN '$date1' AND '$date2'; ");


/*$dte=date("Y/m/d");*/
while($vech=mysqli_fetch_array($query))

{
/*
 echo '<script>alert("'.$vech['amount'].'");</script>';*/

${"income$j"}+=$vech['amount'];

}

$query = mysqli_query($conn,"SELECT * FROM account_voucher WHERE pay_mode = 'Payment Voucher' AND ent_date BETWEEN '$date1' AND '$date2'; ");


/*$dte=date("Y/m/d");*/
while($vech=mysqli_fetch_array($query))

{
/*
 echo '<script>alert("'.$vech['amount'].'");</script>';*/

${"expense$j"}+=$vech['amount'];

}








$i++;
}




$dataPoints1 = array(
  array("label"=> "Jan", "y"=> $income9),
  array("label"=> "Feb", "y"=> $income10),
  array("label"=> "Mar", "y"=> $income11),
  array("label"=> "Apr", "y"=> $income0),
  array("label"=> "May", "y"=> $income1),
  array("label"=> "Jun", "y"=> $income2),
  array("label"=> "Jul", "y"=> $income3),
  array("label"=> "Aug", "y"=> $income4),
  array("label"=> "Sep", "y"=> $income5),
  array("label"=> "Oct", "y"=> $income6),
  array("label"=> "Nov", "y"=> $income7),
  array("label"=> "Dec", "y"=> $income8)
);
$dataPoints2 = array(
  array("label"=> "Jan", "y"=> $expense9),
  array("label"=> "Feb", "y"=> $expense10),
  array("label"=> "Mar", "y"=> $expense11),
  array("label"=> "Apr", "y"=> $expense0),
  array("label"=> "May", "y"=> $expense1),
  array("label"=> "Jun", "y"=> $expense2),
  array("label"=> "Jul", "y"=> $expense3),
  array("label"=> "Aug", "y"=> $expense4),
  array("label"=> "Sep", "y"=> $expense5),
  array("label"=> "Oct", "y"=> $expense6),
  array("label"=> "Nov", "y"=> $expense7),
  array("label"=> "Dec", "y"=> $expense8)
);
  
?>

<script>
window.onload = function () {
 
var chart = new CanvasJS.Chart("chartContainer", {
  animationEnabled: true,
  theme: "light2",
  title:{
   
  },
  legend:{
    cursor: "pointer",
    verticalAlign: "center",
    horizontalAlign: "right",
    itemclick: toggleDataSeries
  },
  data: [{
    type: "column",
    name: "Income",
    indexLabel: "{y}",
    yValueFormatString: "₹#0.##",
    showInLegend: true,
    dataPoints: <?php echo json_encode($dataPoints1, JSON_NUMERIC_CHECK); ?>
  },{
    type: "column",
    name: "Expense",
    indexLabel: "{y}",
    yValueFormatString: "₹#0.##",
    showInLegend: true,
    dataPoints: <?php echo json_encode($dataPoints2, JSON_NUMERIC_CHECK); ?>
  }]
});
chart.render();
 
function toggleDataSeries(e){
  if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
    e.dataSeries.visible = false;
  }
  else{
    e.dataSeries.visible = true;
  }
  chart.render();
}
 
}
</script>

<script src="../js/canvasjs.min.js"></script>

<!-- <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script> -->
































        </div>
       <!-- am-pagebody -->
    <?php include('../include/adminfooter.php'); ?> 
    <!-- Chart JS -->
