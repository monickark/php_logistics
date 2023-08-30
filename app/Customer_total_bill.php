
<?php include('../include/dbConnect.php'); ?>
<?php include('../include/checklogin.php'); ?>
<?php   include('../include/adminheader.php'); ?>

    <link href="../lib/jquery-toggles/toggles-full.css" rel="stylesheet">
    <link href="../lib/highlightjs/github.css" rel="stylesheet">
    <link href="../lib/datatables/jquery.dataTables.css" rel="stylesheet">
    <link href="../lib/select2/css/select2.min.css" rel="stylesheet">
 
<?php include('../include/header.php'); ?>
<?php/* include('../include/leftmenu.php'); */
      require('../include/basefunctions.php');  ?> 


<!DOCTYPE html>
<html>
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Billing</title>
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
<!-- <body onload="window.print();"> -->
<div class="container" >
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!-- Main content -->
    <section class="invoice" style="border: 2px ridge;padding: 10px;background-color: white; margin-top: 8%;" class="col-md-8 col-sm-8 mg-b-20 mg-sm-b-0 pd-r-20 pd-l-0 col-md-offset-2  col-sm-offset-2 ">
      <!-- title row -->
	  
	<!--    <h3 style="margin-top:25px;"><center><b> Customer Billing</b></center></h3> -->
<?php

$tripid = $_REQUEST['billid'];
/*echo $tripid;
*/





 ?>
     <h3 style="margin-top:25px;"><center><b> ASS Logistics</b></center></h3>
 <?php

$pod = mysqli_query($conn,"SELECT DISTINCT cust_id,amount,advance,ent_date FROM customer_bill_det WHERE billing_id = '" .$tripid. "';");
$dte=mysqli_fetch_assoc($pod); 

$tot_ld=0;
$tot_oth=0;
$tot_hlt=0;

$all = mysqli_query($conn,"SELECT * FROM customer_bill_det WHERE billing_id = '" .$tripid. "';");

$nos=mysqli_num_rows($all);

while($other=mysqli_fetch_assoc($all))
{

$crg=0;
$frieght = mysqli_query($conn,"SELECT * FROM frieghtdetails WHERE tripid = '" .$other['trip_invoice']. "';");
$frt=mysqli_fetch_assoc($frieght);
$crg=$frt['loading_charge']+$frt['unloading_charge']+$frt['weight_bill_charge'];

$tot_ld+=$crg;

$tot_oth+=$frt['others_amount'];


$halt_crgs= mysqli_query($conn,"SELECT * FROM halt_entry WHERE tripid = '" .$other['trip_invoice']. "';");
$halt_amt=0;
while($crg_h=mysqli_fetch_assoc($halt_crgs))
{
$halt_amt+=$crg_h['cost'];
}

$tot_hlt+=$halt_amt;


}




$date_rep = str_replace('/', '-', $dte['ent_date']);

        $newDate = date("d-m-Y", strtotime($date_rep));

?>

   <b>  Date: <?php echo $newDate; ?></b>







       <table style="text-align:right; width:700px;float: right;font-size: 19px">
       
            
            <tr class="information">
                
                            <td >
                              <?php
$company = mysqli_query($conn,"SELECT * FROM customer WHERE name = '" .$dte['cust_id']. "';");
$comp=mysqli_fetch_assoc($company); 
                              ?>
                              <?php echo$comp['name'] ?>,<br>
                                <?php echo$comp['address'] ?><br>
                                <?php echo$comp['area'] ?>-<?php echo$comp['pinCode'] ?><br>
                                <?php echo$comp['mobNum'] ?><br>
                               GST: <?php echo$comp['gstNo'] ?>
                          
                 
                </td>
            </tr>
            </table>
<div style="border-bottom: 1px solid #eaeaea">
</div>
            <table style="width: 98%;">

            <tr colspan="4" class="heading"  style="font-size: 20px;">
                <th>
                    Trip Details 
                </th>
                
             
            </tr>
            <tr colspan="6">
            <td>
              &nbsp;
            </td>
           </tr>
            
            <tr class="details" style="font-size: 17px;background-color: rgb(232, 232, 232,1); " bgcolor="gray">
                <th style="background-color: rgb(232, 232, 232,1);">
                   No. of Trips
                </th>
                 <td>
                    <?php echo $nos ?>
                </td>
                 
  <tr colspan="4">
            <td>
              <p>&nbsp;</p>
            </td>
           </tr>
      
          </table>
<div style="border-bottom: 1px solid #eaeaea;">
</div>
            <table style="width: 100%">
         

            <tr colspan="4" class="heading"  style="font-size: 20px">
                <th>
                    Billing Details
                </th>
  
             
            </tr>
            
           <!--  <tr class="details" style="font-size: 18px">
                <td>
                   Frieght Value
                </td>
                 <td style=" width:100px;float: right;">
                    <?php echo $exp['amount']; ?>
                </td>
                   
                 
</tr> -->

    <tr class="details" style="font-size: 18px">
                <td>
                   Bill Value
                </td>
                 <td style=" width:100px;float: right;">
                  <?php echo $dte['amount']; ?> 
                </td>
                   
                 
</tr>

<?php
if($dte['advance']!=0)
{

?>
    <tr class="details" style="font-size: 18px">
                <td>
                   Advance Payment 
                </td>
                 <td style=" width:100px;float: right;">
                    <?php echo $dte['advance']; ?> (-)
                </td>
                   
                 
</tr>

<?php
}
?>

 
<?php
if($tot_ld!=0)
{

?>
    <tr class="details" style="font-size: 18px">
                <td>
                   Load,Unload and Weigh Charges 
                </td>
                 <td style=" width:100px;float: right;">
                    <?php echo $tot_ld; ?> (+)
                </td>
                   
                 
</tr>

<?php
}
?>




<?php
if($tot_oth!=0)
{

?>
    <tr class="details" style="font-size: 18px">
                <td>
                   Other Charges 
                </td>
                 <td style=" width:100px;float: right;">
                    <?php echo $tot_oth; ?> (+)
                </td>
                   
                 
</tr>

<?php
}
?>

 
<?php
if($tot_hlt!=0)
{

?>
    <tr class="details" style="font-size: 18px">
                <td>
                   Halt Charges 
                </td>
                 <td style=" width:100px;float: right;">
                    <?php echo $tot_hlt; ?> (+)
                </td>
                   
                 
</tr>

<?php
}
?>


<tr class="details" style="font-size: 18px">

<td>
              
                </td>
                 <td style=" width:100px;float: right;">
                   ----------------
                </td>
  </tr>
    <tr class="details" style="font-size: 18px">
                <td>
                   Cash Payable 
                </td>
                 <td style=" width:100px;float: right;">
                   <b><?php echo $dte['amount']-$dte['advance']+$tot_hlt+$tot_oth+$tot_ld; ?></b>
                </td>
                   
                 
</tr>
     <tr class="details" style="font-size: 18px">

<td>
              
                </td>
                 <td style=" width:100px;float: right;">
                   ----------------
                </td>
  </tr>
  <?php 
      $number = $dte['amount']-$dte['advance']+$tot_hlt+$tot_oth+$tot_ld;;
  $no = round($number);
  $point = round($number - $no, 2) * 100;
  $hundred = null;
  $digits_1 = strlen($no);
  $i = 0;
  $str = array();
  $words = array('0' => '', '1' => 'One', '2' => 'Two',
   '3' => 'Three', '4' => 'Four', '5' => 'Five', '6' => 'Six',
   '7' => 'Seven', '8' => 'Eight', '9' => 'Nine',
   '10' => 'Ten', '11' => 'Eleven', '12' => 'Twelve',
   '13' => 'Thirteen', '14' => 'Fourteen',
   '15' => 'Fifteen', '16' => 'Sixteen', '17' => 'Seventeen',
   '18' => 'Eighteen', '19' =>'Nineteen', '20' => 'Twenty',
   '30' => 'Thirty', '40' => 'Forty', '50' => 'Fifty',
   '60' => 'Sixty', '70' => 'Seventy',
   '80' => 'Eighty', '90' => 'Ninety');
  $digits = array('', 'Hundred', 'Thousand', 'Lakh', 'Crore');
  while ($i < $digits_1) {
    $divider = ($i == 2) ? 10 : 100;
    $number = floor($no % $divider);
    $no = floor($no / $divider);
    $i += ($divider == 10) ? 1 : 2;
    if ($number) {
       $plural = (($counter = count($str)) && $number > 9) ? '' : null;
       $hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
       $str [] = ($number < 21) ? $words[$number] .
           " " . $digits[$counter] . $plural . " " . $hundred
           :
           $words[floor($number / 10) * 10]
           . " " . $words[$number % 10] . " "
           . $digits[$counter] . $plural . " " . $hundred;
    } else $str[] = null;
 }
 $str = array_reverse($str);
 $result = implode('', $str);
 $points = ($point) ?
   "." . $words[$point / 10] . " " .
         $words[$point = $point % 10] : '';
   $AmountInWord = $result . "Only  " . "";
      ?>
           <tr class="details" style="font-size: 18px">

<td >
            Amount Payable: <b><?php echo $AmountInWord; ?><b>  
                </td>
                 <td >
                 
                                   </td>
  </tr>




          </table>





        </div>

      <!-- /.row -->
	  
   </section>
    <!-- /.content -->
    <div class="clearfix"></div>

<p class="col-md-2 col-sm-2 mg-b-20 mg-sm-b-0 pd-r-20 pd-l-0" style="position: absolute;text-align:  right;float:  left;left:  0;"><button class='ion-arrow-left-a' onclick="goBack()">Close</button> 
<p class="col-md-2 col-sm-2 mg-b-20 mg-sm-b-0 pd-r-20 pd-l-0" style="position: absolute;text-align:  right;float:  right;right:  0;"><button class='ion-printer' onclick="window.print();">Print</button>
</p></p>


<script>
function goBack() {
    window.close();
}
</script>


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
.ion-printer,.ion-arrow-left-a,.dropdown.dropdown-profile,.toppor,.am-pagetitle,.am-header,.am-sideleft,.dataTables_length,.dataTables_filter,.dataTables_paginate.paging_simple_numbers,.dataTables_info {
      display: none;
          }
    title {
      display: none;
    }
.dridet{
  display: block;
}
  .details
  {
    background-color: rgb(232, 232, 232,1);
  }
table th { font-weight:bold !important;color:#000 !important;}
 
}</style>
</body>
</html>  
