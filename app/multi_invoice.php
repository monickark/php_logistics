         <?php include('../include/dbConnect.php'); ?>
<?php include('../include/checklogin.php'); ?>
<?php include('../include/adminheader.php'); ?>

<?php /*include('../include/leftmenu.php');  */
      require('../include/basefunctions.php');
?>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<?php


$tripid = $_REQUEST['billid'];


/*
$pod = mysqli_query($conn,"SELECT DISTINCT cust_id,amount,advance,ent_date FROM customer_bill_det WHERE billing_id = '" .$tripid. "';");*/

$pod = mysqli_query($conn,"SELECT * FROM customer_bill_det WHERE billing_id = '" .$tripid. "';");
$dte=mysqli_fetch_assoc($pod); 

$tot_ld=0;
$tot_oth=0;
$tot_hlt=0;

$all = mysqli_query($conn,"SELECT * FROM customer_bill_det WHERE billing_id = '" .$tripid. "';");

$nos=mysqli_num_rows($all);




while($other=mysqli_fetch_assoc($all))
{
if(is_numeric($other['trip_invoice']))
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
else
{
  $value= str_replace('h_', '', $other['trip_invoice']);

 /* echo '<script> alert("'.$value.'");</script>';*/

  $crg=0;
$frieght = mysqli_query($conn,"SELECT * FROM hire_load WHERE id = '" .$value. "';");
$frt=mysqli_fetch_assoc($frieght);
$crg=$frt['loading_charge']+$frt['unloading_charge']+$frt['weight_bill_charge'];

$tot_ld+=$crg;


/*

$tot_oth+=$frt['others_amount'];


$halt_crgs= mysqli_query($conn,"SELECT * FROM halt_entry WHERE tripid = '" .$other['trip_invoice']. "';");
$halt_amt=0;
while($crg_h=mysqli_fetch_assoc($halt_crgs))
{
$halt_amt+=$crg_h['cost'];
}

$tot_hlt+=$halt_amt;*/
}



}




$date_rep = str_replace('/', '-', $dte['ent_date']);

        $newDate = date("d-m-Y", strtotime($date_rep));




$company = mysqli_query($conn,"SELECT * FROM customer WHERE name = '" .$dte['cust_id']. "';");
$comp=mysqli_fetch_assoc($company); 








?>

<p class="col-md-2 col-sm-2 mg-b-20 mg-sm-b-0 pd-r-20 pd-l-0" style="position: absolute;text-align:  right;float:  left;left:  0;"><button class='ion-arrow-left-a' onclick="goBack()">Close</button> 

<p class="col-md-2 col-sm-2 mg-b-20 mg-sm-b-0 pd-r-20 pd-l-0" style="position: absolute;text-align:  right;float:  right;right:  0;"><button class='ion-printer' onclick="window.print();">Print</button>
</p>
</p>
<div class="container" style="background: #fff !important">
  <div class="head">
  <h2>Billing Formats</h2>
  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#home">Format 1</a></li>
    <li><a data-toggle="tab" href="#menu1">Format 2</a></li>
    <li><a data-toggle="tab" href="#menu2">Format 3</a></li>
<!--     <li><a data-toggle="tab" href="#menu3">Menu 3</a></li> -->
  </ul>
</div>
  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
     
      <p><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Table</title>
<link rel="stylesheet" href="bootstrap.min.css" type="text/css" />
<style>
html,body{background-color:#ccc;}
/*.main{margin:auto; padding:1%; background-color:#fff; font-size:12px; position:relative;}
*/.main div .total{text-align:center; margin-top:10%;}
.main .table,.tableHeading, span, th, td{border:1px solid #b22600;}
table, tr, th, td,.tableHeading{ text-align:center; font-size:12px; line-height:18px;}
.table>thead>tr>th{border-bottom:2px solid #b22600 !important;}
thead tr.tHead{background-color:#b22600 !important; color:#fff !important;}
.fRight{text-align:right;}
.fLeft{text-align:left;}
.table>thead>tr>th, .table>tbody>tr>th, .table>tfoot>tr>th, .table>thead>tr>td, .table>tbody>tr>td, .table>tfoot>tr>td{padding:5px !important;}
#Con tr:nth-of-type(odd) {
    background: #fddcc3;
}
#Con tr {
    width: 100%;
    background-color: #fff;
}
.adrs{border:1px solid #b22600; width:250px; padding:5px; font-size:12px !important; line-height:18px;}
.adrs label{margin:0px !important;}
.logo{width:100px;}
.logo img{width:100%;}
.header{font-size:32px; color:#777; margin-top:12%;}
.header span{color:red; border:none; margin-right:10%;}
.secTab{float:right; width:200px;margin-top:12%;}
.pan{font-size:16px; padding-left:20px !important;}
.addtd{height:80px;}.table1{margin:5px auto;}
.table1, .table1 tr.tHead th, .table1 tr td{text-align:left !important; width:100%; padding:5px;}
</style>
</head>

<body>
<section class="main">
  <div class="col-lg-6 col-md-6">
  <div class="logo">
      <img src="ASSL LOGO 1.jpg" />
    </div>
    <div class="adrs">
      <label>#129/64, Thambuchetty Street,<br /> Mannady, Parrys,<br /> Chennai - 600001.<br />
Phone: 45564483<br />
asslogistics@yahoo.in</label>
    </div>
  </div>
  <div class="col-lg-6 col-md-6">
    <div class="header"><span>ASS</span> Logistics</div>
    <table class="secTab">
      <tr>
          <td>Date</td>
            <td><?php echo $newDate; ?></td>
        </tr>
      <tr>
          <td>Bill No.</td>
            <td><?php  echo $tripid;  ?></td>
        </tr>
    </table>
  </div>
  <div class="col-lg-12 pan">
    PAN : BHKPS2540B
  </div>
  <div class="col-lg-12">
  <table class="table1">
        <thead>
          <tr class="tHead">
            <th>Bill To</th>
          </tr>
          <tr class="addtd"><td><?php echo$comp['name'].","; ?><br /> <?php echo$comp['area']."."; ?></td></tr>
        </thead>
    </table>
  </div>
  <div class="col-lg-12">
  <table class="table" id="Con" style="margin-bottom:0px !important;">
        <thead>
          <tr class="tHead">
            <th>SNo</th>
            <th>Date</th>
            <th>Vehicle No</th>
            <th>ASS Ref No</th>
            <th>Container No</th>
            <th>Destination Place</th>
            <th>Hire Amount</th>
          </tr>
        </thead>
        <tbody>
<?php

$i=1;
$total=0;
$other_crgs=0;
$all = mysqli_query($conn,"SELECT * FROM customer_bill_det WHERE billing_id = '" .$tripid. "';");
while($others=mysqli_fetch_assoc($all))
{
  /* echo '<script> alert("'.$others['trip_invoice'].'");</script>';
  $ia=is_numeric($others['trip_invoice']);
 echo '<script> alert("'.$ia.'");</script>';*/


if(is_numeric($others['trip_invoice'])!=1)
{

 $value= str_replace('h_', '', $others['trip_invoice']);

$frieght = mysqli_query($conn,"SELECT * FROM hire_load WHERE id = '" .$value. "';");
$frt=mysqli_fetch_assoc($frieght);

$frt_dte = str_replace('/', '-', $frt['ent_date']);

        $frtd = date("d-m-Y", strtotime($frt_dte));


$frit = mysqli_query($conn,"SELECT * FROM hire_freight WHERE hire_id = '" .$value. "';");
$firt=mysqli_fetch_assoc($frit);

$total+=$firt['amount'];

$ref="Hire".$value;





}
else{


$frieght = mysqli_query($conn,"SELECT * FROM load_det WHERE tripid = '" .$others['trip_invoice']. "';");
$frt=mysqli_fetch_assoc($frieght);

$frt_dte = str_replace('/', '-', $frt['ent_date']);

        $frtd = date("d-m-Y", strtotime($frt_dte));


$frit = mysqli_query($conn,"SELECT * FROM frieghtdetails WHERE tripid = '" .$others['trip_invoice']. "';");
$firt=mysqli_fetch_assoc($frit);

$total+=$firt['amount'];

$ref=$frt['tripid'];



}





?>
<tr>
            <td><?php echo $i;  ?></td>
            <td><?php echo $frtd;  ?></td>
            <td><?php echo $frt['vechno'];  ?></td>
            <td><?php echo $ref;  ?></td>
            <td><?php echo $frt['cont_no'];  ?></td>
            <td><?php echo $frt['to_place'];  ?></td>
            <td class="fRight"><?php echo $firt['amount'];  ?></td>
          </tr>
<?php

$other_crgs=$firt['loading_charge']+$firt['unloading_charge']+$firt['weight_bill_charge'];
if($other_crgs!=0)
{
$i++;

$total+=$other_crgs;
?>

<tr>
            <td><?php echo $i;  ?></td>
            <td><?php echo $frtd;  ?></td>
            <td><?php echo $frt['vechno'];  ?></td>
            <td><?php echo $ref;  ?></td>
            <td><?php echo $frt['cont_no'];  ?></td>
            <td><?php echo "Other Charges"  ?></td>
            <td class="fRight"><?php echo $other_crgs;  ?></td>
          </tr>

<?php
}

$halt_crgs= mysqli_query($conn,"SELECT * FROM halt_entry WHERE tripid = '" .$others['trip_invoice']. "';");
$halt=mysqli_fetch_assoc($halt_crgs);
if($halt['cost']!=0)
{
$i++;

$total+=$halt['cost'];
?>
<tr>
            <td><?php echo $i;  ?></td>
            <td><?php echo $frtd;  ?></td>
            <td><?php echo $frt['vechno'];  ?></td>
            <td><?php echo $ref;  ?></td>
            <td><?php echo $frt['cont_no'];  ?></td>
            <td><?php echo "Halt Charges"  ?></td>
            <td class="fRight"><?php echo $halt['cost'];  ?></td>
          </tr>

<?php
}

$i++;
}




?>
<!--           <tr>
            <td>1</td>
            <td>01-03-2018</td>
            <td>TN19Z861</td>
            <td>4668</td>
            <td>SSMU2008466</td>
            <td>Tiruvannamalai</td>
            <td class="fRight">16400.0</td>
          </tr> -->


<!--           <tr>
            <td></td>
            <td></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td></td>
            <td></td>
          </tr> -->
          
        </tbody>
      </table>
    </div>
    <?php 
      $bal=$total-$dte['advance'];
  $no = round($bal);
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
    <div class="col-lg-8"><p>Rupees : <?php echo $AmountInWord; ?></p></div>
    <div class="col-lg-4 clearfix" style="float:right;">    
      <table style="float:right; width:100%;" class="tot_div">
          <tr>
            <td colspan="8" class="fRight" style="border:none !important;">Sub-Total :</td>
            <td class="fRight"><?php echo $total; ?></td>
          </tr>
          <tr>
            <td colspan="8" class="fRight" style="border:none !important;">Advance :</td>
            <td class="fRight"><?php echo $dte['advance']; ?></td>
          </tr>
          <tr>
            <td colspan="8" class="fRight" style="border:none !important;">Total :</td>
            <td class="fRight"><?php


             echo $bal; ?></td>
          </tr>
      </table>
    </div><div class="clearfix"></div>
    <div class="col-lg-4 adrs" style="margin-left:15px;">
      <label>Make all cheques payable to<br />ASS Logistics<br />Thank you for your business!</label>
    </div>
    <div class="foot1">
      <div class="col-lg-3" style="float:right;">
          <div class="col-lg-12 total">For ASS Logistics</div>
          <div class="col-lg-12 total">Authorized Signatory</div>
      </div>
    </div>
</section>
<!-- <p class="col-md-2 col-sm-2 mg-b-20 mg-sm-b-0 pd-r-20 pd-l-0" style="position: absolute;text-align:  right;float:  right;right:  0;"><button class='ion-printer' onclick="window.print();">Print</button>
</p> -->
</body>
</html>

</p>
    </div>
    <div id="menu1" class="tab-pane fade">
     
      <p><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Table</title>
<link rel="stylesheet" href="bootstrap.min.css" type="text/css" />
<style>
html,body{background-color:#ccc;}
.main{width:210mm; height:297mm; margin:auto; padding:1%; background-color:#fff; font-size:12px; position:relative;}
.main div .total{text-align:center; margin-top:10%;}
.main .table,.tableHeading, span, th, td{border:1px solid #b22600;}
table, tr, th, td,.tableHeading{ text-align:center; font-size:12px; line-height:18px;}
.table>thead>tr>th{border-bottom:2px solid #b22600 !important;}
thead tr.tHead{background-color:#b22600 !important; color:#fff !important;}
.fRight{text-align:right;}
.fLeft{text-align:left;}
.table>thead>tr>th, .table>tbody>tr>th, .table>tfoot>tr>th, .table>thead>tr>td, .table>tbody>tr>td, .table>tfoot>tr>td{padding:5px !important;}
#Con tr:nth-of-type(odd) {
    background: #fddcc3;
}
#Con tr {
    width: 100%;
    background-color: #fff;
}
.adrs{border:1px solid #b22600; width:250px; padding:5px; font-size:12px !important; line-height:18px;}
.adrs label{margin:0px !important;}
.logo{width:100px;}
.logo img{width:100%;}
.header{font-size:32px; color:#777; margin-top:12%;}
.header span{color:red; border:none; margin-right:10%;}
.secTab{float:right; width:200px;margin-top:12%;}
.pan{font-size:16px; padding-left:20px !important;}
.addtd{height:80px;}.table1{margin:5px auto;}
.table1, .table1 tr.tHead th, .table1 tr td{text-align:left !important; width:100%; padding:5px;}
</style>
</head>

<body>
<section class="main">
  <div class="col-lg-6">
  <div class="logo">
      <img src="ASSL LOGO 1.jpg" />
    </div>
    <div class="adrs">
      <label>#129/64, Thambuchetty Street,<br /> Mannady, Parrys,<br /> Chennai - 600001.<br />
Phone: 45564483<br />
asslogistics@yahoo.in</label>
    </div>
  </div>
  <div class="col-lg-6">
    <div class="header"><span>ASS</span> Logistics</div>
    <table class="secTab">
      <tr>


          <td>Date</td>
            <td> <?php echo $newDate; ?></td>
        </tr>
      <tr>
          <td>Bill No.</td>
            <td><?php  echo $tripid;  ?></td>
        </tr>
    </table>
  </div>
  <div class="col-lg-12 pan">
    PAN : BHKPS2540B
  </div>
  <div class="col-lg-12">
  <table class="table1">
        <thead>
          <tr class="tHead">
            <th>Bill To</th>
          </tr>
          <tr class="addtd"><td><?php echo$comp['name'].","; ?><br /> <?php echo$comp['area']."."; ?></td></tr>
        </thead>
    </table>
  </div>
  <div class="col-lg-12">
  <table class="table" id="Con" style="margin-bottom:0px !important;">
        <thead>
          <tr class="tHead">
            <th>SNo</th>
             <th>ASS Ref No</th>
            <th>Date</th>
            <th>Vehicle No</th>
           
            <th>Container No</th>
            <th>Destination Place</th>
            <th>LR. No.</th>
            <th>Ref No.</th>
            
            <th>Bill Amount</th>
          </tr>
        </thead>
        <tbody>

<?php

$i=1;
$total=0;
$other_crgs=0;
$all = mysqli_query($conn,"SELECT * FROM customer_bill_det WHERE billing_id = '" .$tripid. "';");
while($others=mysqli_fetch_assoc($all))
{


if(is_numeric($others['trip_invoice'])!=1)
{
 $value= str_replace('h_', '', $others['trip_invoice']);

$frieght = mysqli_query($conn,"SELECT * FROM hire_load WHERE id = '" .$value. "';");
$frt=mysqli_fetch_assoc($frieght);

$frt_dte = str_replace('/', '-', $frt['ent_date']);

        $frtd = date("d-m-Y", strtotime($frt_dte));


$frit = mysqli_query($conn,"SELECT * FROM hire_freight WHERE hire_id = '" .$value. "';");
$firt=mysqli_fetch_assoc($frit);

$total+=$firt['amount'];

$ref="Hire".$value;





}
else{




 /*echo '<script> alert("'.$others['trip_invoice'].'");</script>';*/
$frieght = mysqli_query($conn,"SELECT * FROM load_det WHERE tripid = '" .$others['trip_invoice']. "';");
$frt=mysqli_fetch_assoc($frieght);

$frt_dte = str_replace('/', '-', $frt['ent_date']);

        $frtd = date("d-m-Y", strtotime($frt_dte));


$frit = mysqli_query($conn,"SELECT * FROM frieghtdetails WHERE tripid = '" .$others['trip_invoice']. "';");
$firt=mysqli_fetch_assoc($frit);

$total+=$firt['amount'];
$ref=$frt['tripid'];
}



?>
<tr>
            <td><?php echo $i;  ?></td>
             <td><?php echo $ref;  ?></td>
            <td><?php echo $frtd;  ?></td>
            <td><?php echo $frt['vechno'];  ?></td>
           
            <td><?php echo $frt['cont_no'];  ?></td>
            <td><?php echo $frt['to_place'];  ?></td>
            
<?php

$gc_det=mysqli_query($conn,"SELECT * FROM gc_details WHERE tripid = '" .$others['trip_invoice']. "';");
$gc=mysqli_fetch_assoc($gc_det);

if(mysqli_num_rows($gc_det)==0)
{
?>
<td><?php echo "NIL";  ?></td>
<?php
}
else
{
?>
<td><?php echo $gc['id'];  ?></td>
<?php
}
?>
            <td><?php echo $frt['ref_no'];  ?></td>

            
            <td class="fRight"><?php echo $firt['amount'];  ?></td>
          </tr>
<?php

$other_crgs=$firt['loading_charge']+$firt['unloading_charge']+$firt['weight_bill_charge'];
if($other_crgs!=0)
{
$i++;

$total+=$other_crgs;
?>

<tr>
            <td><?php echo $i;  ?></td>
            <td><?php echo $frtd;  ?></td>
            <td><?php echo $frt['vechno'];  ?></td>
            <td><?php echo $ref;  ?></td>
            <td><?php echo $frt['cont_no'];  ?></td>
            <td><?php echo "Other Charges"  ?></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td class="fRight"><?php echo $other_crgs;  ?></td>
          </tr>

<?php
}

$halt_crgs= mysqli_query($conn,"SELECT * FROM halt_entry WHERE tripid = '" .$others['trip_invoice']. "';");
$halt=mysqli_fetch_assoc($halt_crgs);
if($halt['cost']!=0)
{
$i++;

$total+=$halt['cost'];
?>
<tr>
            <td><?php echo $i;  ?></td>
            <td><?php echo $frtd;  ?></td>
            <td><?php echo $frt['vechno'];  ?></td>
            <td><?php echo $ref;  ?></td>
            <td><?php echo $frt['cont_no'];  ?></td>
            <td><?php echo "Halt Charges"  ?></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td class="fRight"><?php echo $halt['cost'];  ?></td>
          </tr>

<?php
}

$i++;
}

?>



<!--           <tr>
            <td>1</td>
            <td>01-03-2018</td>
            <td>TN19Z861</td>
            <td>4668</td>
            <td>SSMU2008466</td>
            <td>Tiruvannamalai</td>
            <td>79100</td>
            <td>003355</td>
            <td class="fRight">16400.0</td>
          </tr> -->
<!--           <tr>
            <td></td>
            <td></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td></td>
            <td></td>
          </tr> -->
          
        </tbody>
      </table>
    </div>
    <div class="col-lg-8"><p>Rupees : <?php  echo $AmountInWord; ?></p></div>
    <div class="tot_div2">
    <div class="col-lg-4 clearfix" style="float:right;">    
    
      <table style="float:right; width:100%;">
                   <tr>
            <td colspan="8" class="fRight" style="border:none !important;">Sub-Total :</td>
            <td class="fRight"><?php echo $total; ?></td>
          </tr>
          <tr>
            <td colspan="8" class="fRight" style="border:none !important;">Advance :</td>
            <td class="fRight"><?php echo $dte['advance']; ?></td>
          </tr>
          <tr>
            <td colspan="8" class="fRight" style="border:none !important;">Total :</td>
            <td class="fRight"><?php


             echo $bal; ?></td>
          </tr>
      </table>
    </div>
</div>
    <div class="clearfix"></div>
    <div class="col-lg-4 adrs" style="margin-left:15px;">
      <label>Make all cheques payable to<br />ASS Logistics<br />Thank you for your business!</label>
    </div>
    <div class="foot2">
      <div class="col-lg-3" style="float:right;">
          <div class="col-lg-12 total">For ASS Logistics</div>
          <div class="col-lg-12 total">Authorized Signatory</div>
      </div>
    </div>
</section>
<!-- <p class="col-md-2 col-sm-2 mg-b-20 mg-sm-b-0 pd-r-20 pd-l-0" style="position: absolute;text-align:  right;float:  right;right:  0;"><button class='ion-printer' onclick="window.print();">Print</button>
</p> -->
</body>
</html>



</p>
    </div>
    <div id="menu2" class="tab-pane fade">
      
      <p><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Table</title>
<link rel="stylesheet" href="bootstrap.min.css" type="text/css" />
<style>
.main{width:98%; margin:2% auto;}
.main div .total{text-align:center; margin-top:10%;}
.main .table,.tableHeading, span, th, td{border:1px solid #555;}
table, tr, th, td,.tableHeading{ text-align:center; font-size:12px; line-height:18px;}
.table>thead>tr>th{border-bottom:2px solid #555 !important;}
thead tr.tHead{background-color:#bbb;}
tr.tableHeading th, .total{font-size:18px; font-weight:normal;}
.fRight{text-align:right;}
.fLeft{text-align:left;}
.table>thead>tr>th, .table>tbody>tr>th, .table>tfoot>tr>th, .table>thead>tr>td, .table>tbody>tr>td, .table>tfoot>tr>td{padding:5px !important;}

</style>
</head>

<body>

<section class="main">
    <div class="form3">
  <table class="table">
        <thead>
          <tr class="tableHeading">
            <th colspan="5">ASS LOGISTICS</th>
            <th>&nbsp;</th>
            <th>&nbsp;</th>
            <th colspan="2">REF: NO.</th>
            <th colspan="2">Billing Date</th>
          </tr>
          <tr class="tableHeading">
            <th colspan="5">Contact No :  044- 4556 4483</th>
            <th>&nbsp;</th>
            <th>&nbsp;</th>


            <th colspan="2"><?php  echo $tripid;  ?></th>
            <th colspan="2"><?php echo $newDate; ?></th>
          </tr>
          <tr class="tHead">
            <th>SNo</th>
            <th>Date&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
            <th>Container No</th>
            <th>Container Size</th>
            <th>Vehicle No</th>
            <th>From</th>
            <th>To</th>
            <th>Freight</th>
            <th>Mamool</th>
            <th>Total Hire Amt</th>
            <th>Remarks</th>
          </tr>
        </thead>
        <tbody>



          <?php

$i=1;
$total=0;
$other_crgs=0;
$all = mysqli_query($conn,"SELECT * FROM customer_bill_det WHERE billing_id = '" .$tripid. "';");
while($others=mysqli_fetch_assoc($all))
{




if(is_numeric($others['trip_invoice'])!=1)
{
$value= str_replace('h_', '', $others['trip_invoice']);

$frieght = mysqli_query($conn,"SELECT * FROM hire_load WHERE id = '" .$value. "';");
$frt=mysqli_fetch_assoc($frieght);

$frt_dte = str_replace('/', '-', $frt['ent_date']);

        $frtd = date("d-m-Y", strtotime($frt_dte));


$frit = mysqli_query($conn,"SELECT * FROM hire_freight WHERE hire_id = '" .$value. "';");
$firt=mysqli_fetch_assoc($frit);

$total+=$firt['amount'];

$ref="Hire".$value;
/*
update frieghtdetails set tripid = CONCAT(tripid,'-2018')*/


/*
update frieghtdetails,container_payment,customer_bill_det,customer_payment,driver_mgt,fuel,hire_freight,hire_hire,hire_load,load_det,load_hire,load_return,load_stat,onroad_details,pod,transporter_billing,transporter_hire_payment,transporter_payment,trip_calculation,vechstat SET frieghtdetails.tripid = CONCAT(frieghtdetails.tripid,'-2018'),container_payment.bill_no = CONCAT(container_payment.bill_no,'-2018'),customer_bill_det.trip_invoice = CONCAT(customer_bill_det.trip_invoice,'-2018'),customer_bill_det.billing_id = CONCAT(customer_bill_det.trip_invoice,'-2018'),customer_payment.invoice_no = CONCAT(customer_payment.invoice_no,'-2018'),driver_mgt.tripid = CONCAT(driver_mgt.tripid,'-2018'),fuel.tripid= CONCAT(fuel.tripid,'-2018'),hire_freight.hire_id= CONCAT(hire_freight.hire_id,'-2018'),hire_hire.hire_id= CONCAT(hire_hire.hire_id,'-2018'),hire_load.hire_id= CONCAT(hire_load.hire_id,'-2018'),load_det.tripid= CONCAT(load_det.tripid,'-2018'),load_hire.tripid= CONCAT(load_hire.tripid,'-2018'),load_return.tripid= CONCAT(load_return.tripid,'-2018'),load_stat.tripid= CONCAT(load_stat.tripid,'-2018'),onroad_details.tripid= CONCAT(onroad_details.tripid,'-2018'),pod.tripid= CONCAT(pod.tripid,'-2018'),transporter_billing.tripid= CONCAT(transporter_billing.tripid,'-2018'),transporter_billing.billingid= CONCAT(transporter_billing.billingid,'-2018'),transporter_hire_payment.bill_id= CONCAT(transporter_hire_payment.bill_id,'-2018'),transporter_payment.bill_id= CONCAT(transporter_payment.bill_id,'-2018'),trip_calculation.tripid=CONCAT(trip_calculation.tripid,'-2018'),vechstat.tripid= CONCAT(vechstat.tripid,'-2018')*/







/*
update frieghtdetails,container_payment,customer_bill_det,customer_payment,driver_mgt,fuel,hire_freight,hire_hire,hire_load,load_det SET frieghtdetails.tripid = CONCAT(frieghtdetails.tripid,'-2018'),container_payment.bill_no = CONCAT(container_payment.bill_no,'-2018'),customer_bill_det.trip_invoice = CONCAT(customer_bill_det.trip_invoice,'-2018'),customer_bill_det.billing_id = CONCAT(customer_bill_det.trip_invoice,'-2018'),customer_payment.invoice_no = CONCAT(customer_payment.invoice_no,'-2018'),driver_mgt.tripid = CONCAT(driver_mgt.tripid,'-2018'),fuel.tripid= CONCAT(fuel.tripid,'-2018'),hire_freight.hire_id= CONCAT(hire_freight.hire_id,'-2018'),hire_hire.hire_id= CONCAT(hire_hire.hire_id,'-2018'),hire_load.hire_id= CONCAT(hire_load.hire_id,'-2018'),load_det.tripid= CONCAT(load_det.tripid,'-2018')

UPDATE load_hire,load_return,load_stat,onroad_details,pod,transporter_billing,transporter_hire_payment,transporter_payment,trip_calculation,vechstat SET load_hire.tripid= CONCAT(load_hire.tripid,'-2018'),load_return.tripid= CONCAT(load_return.tripid,'-2018'),load_stat.tripid= CONCAT(load_stat.tripid,'-2018'),onroad_details.tripid= CONCAT(onroad_details.tripid,'-2018'),pod.tripid= CONCAT(pod.tripid,'-2018'),transporter_billing.tripid= CONCAT(transporter_billing.tripid,'-2018'),transporter_billing.billingid= CONCAT(transporter_billing.billingid,'-2018'),transporter_hire_payment.bill_id= CONCAT(transporter_hire_payment.bill_id,'-2018'),transporter_payment.bill_id= CONCAT(transporter_payment.bill_id,'-2018'),trip_calculation.tripid=CONCAT(trip_calculation.tripid,'-2018'),vechstat.tripid= CONCAT(vechstat.tripid,'-2018')*/

}
else{



/* echo '<script> alert("'.$others['trip_invoice'].'");</script>';*/
$frieght = mysqli_query($conn,"SELECT * FROM load_det WHERE tripid = '" .$others['trip_invoice']. "';");
$frt=mysqli_fetch_assoc($frieght);

$frt_dte = str_replace('/', '-', $frt['ent_date']);

        $frtd = date("d-m-Y", strtotime($frt_dte));


$frit = mysqli_query($conn,"SELECT * FROM frieghtdetails WHERE tripid = '" .$others['trip_invoice']. "';");
$firt=mysqli_fetch_assoc($frit);

}





?>
<tr>
            <td><?php echo $i;  ?></td>
            <td><?php echo $frtd;  ?></td>
            <td><?php echo $frt['cont_no'];  ?></td>
            <td><?php echo $frt['contsize'];  ?></td>
            <td><?php echo $frt['vechno'];  ?></td>
          <!--   <td><?php echo $frt['tripid'];  ?></td> -->
              <td><?php echo $frt['from_place'];  ?></td>
            <td><?php echo $frt['to_place'];  ?></td>
        <!--     <td><?php echo $frt['ref_no'];  ?></td> -->


            
            <td class="fRight"><?php echo $firt['amount'];  ?></td>

            
<?php
$other_crgs=$firt['loading_charge']+$firt['unloading_charge']+$firt['weight_bill_charge'];

?>
<td class="fRight"><?php echo $other_crgs;  ?></td>
<td class="fRight"><?php echo $firt['amount']+$other_crgs;  ?></td>
<td class="fRight"><?php echo $firt['remarks'];  ?></td>
          </tr>
<?php
$total+=$firt['amount'] + $other_crgs;
  

$halt_crgs= mysqli_query($conn,"SELECT * FROM halt_entry WHERE tripid = '" .$others['trip_invoice']. "';");
$halt=mysqli_fetch_assoc($halt_crgs);
if($halt['cost']!=0)
{
$i++;

$total+=$halt['cost'];
?>
<tr>
            <td><?php echo $i;  ?></td>
            <td><?php echo $frtd;  ?></td>
            <td><?php echo $frt['cont_no'];  ?></td>
            <td><?php echo "NIL";  ?></td>
            <td><?php echo $frt['vechno'];  ?></td>
            <td><?php echo "Halt Charges"  ?></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td class="fRight"><?php echo $halt['cost'];  ?></td>
            <td>&nbsp;</td>
          </tr>

<?php
}


if($dte['advance']!=0)
{
$i++;
$total-=$dte['advance'];
  ?>
<tr>
            <td><?php echo $i;  ?></td>
            <td><?php echo "";  ?></td>
            <td><?php echo "Trip";  ?></td>
            <td><?php echo "Advance";  ?></td>
            <td><?php echo "Amount";  ?></td>
            <td><?php echo ""  ?></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td class="fRight"><?php echo $dte['advance'];  ?></td>
            <td>&nbsp;</td>
          </tr>

<?php
}






$i++;
}

?>

<!--           <tr>
            <td>1</td>
            <td>01-03-2018</td>
            <td>SSMU2008466</td>
            <td>20</td>
            <td>TN21AY3063</td>
            <td class="fLeft">Chennai</td>
            <td class="fLeft">Tiruvannamalai</td>
            <td class="fRight">16400.0</td>
            <td class="fRight">1100.0</td>
            <td class="fRight">17500.0</td>
            <td>&nbsp;</td>
          </tr> -->
            <tr>
              <td></td>
              <td></td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td colspan="2" class="total">Total :</td>
              <td class="fRight"><?php  echo $total; ?></td>
              <td>&nbsp;</td>
            </tr>
        </tbody>
      </table>
    </div>
      <div class="foot">
      <div class="col-lg-3" style="float:right;right:20px;">
          <div class="col-lg-12 total">For ASS Logistics</div>
          <div class="col-lg-12 total">Authorized Signatory</div>
      </div>
      <div>
</section>

</body>
</html>
</p>
    </div>
    <!-- <div id="menu3" class="tab-pane fade">
      <h3>Menu 3</h3>
      <p>Eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
    </div> -->


  </div>
</div>

 <style>
@media print {
.ion-printer,.head,.ion-arrow-left-a {
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
  .foot{

    float: right;
  }

 
 .header{float: right;margin-top: -110px}
 
 .tot_div{
  margin-top: -15px
 }
 .foot1
 {
  float: right

 }
 .foot2
 {
    float: right
 }
  .tot_div2{
  margin-top: -15px
 }
@page{size:auto; margin:0mm auto;width:250mm !important;}
.main{height: 150mm !important; margin:0mm !important;}
#Header, #Footer { display: none !important; }

table
 th {  font-weight:bold !important;color:#000 !important;}
 

}</style>


<script>
function goBack() {
    window.close();
}
</script>