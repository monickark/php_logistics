   <!-- Amanda CSS -->
    <link rel="stylesheet" href="../css/amanda.css">
     <script src="../lib/jquery/jquery.js"></script>
     <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<?php 

include('../include/dbConnect.php'); 
$tripid=$_REQUEST['tripid'];
$gcid=$_REQUEST['id'];
$query_load=mysqli_query($conn,"SELECT * FROM load_det WHERE tripid ='".$tripid."';");
$load=mysqli_fetch_array($query_load);
$query_gc=mysqli_query($conn,"SELECT * FROM gc_details WHERE id ='".$gcid."';");
$gcdetails=mysqli_fetch_array($query_gc);
$consig=$gcdetails['consignor_name'];
$consne=$gcdetails['consignee_name'];
$consig_query=mysqli_query($conn,"SELECT * FROM customer WHERE name ='".$consig."';");
$sender=mysqli_fetch_array($consig_query);
$query_city=mysqli_query($conn,"SELECT * FROM district WHERE DistCode ='".$sender["city"]."';");
$sender_city=mysqli_fetch_array($query_city);
$query_state=mysqli_query($conn,"SELECT * FROM state WHERE StCode ='".$sender["state"]."';");
$sender_state=mysqli_fetch_array($query_state);
$consne_query=mysqli_query($conn,"SELECT * FROM customer WHERE name ='".$consne."';");
$recieve=mysqli_fetch_array($consne_query);
$query_rcity=mysqli_query($conn,"SELECT * FROM district WHERE DistCode ='".$recieve["city"]."';");
$recieve_city=mysqli_fetch_array($query_rcity);
$query_rstate=mysqli_query($conn,"SELECT * FROM state WHERE StCode ='".$recieve["state"]."';");
$recieve_state=mysqli_fetch_array($query_rstate);
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>LR Print</title>
</head>
<body>
<table width="1000" height="650" border="1" cellpadding="2" cellspacing="2" align="center" style="background:#fff;border-color:#a09e9e;">
  <tr>
    <td colspan="4" rowspan="2"><h2 align="center"><strong>ASS Logistics</strong></h2>
    <p align="center"><strong># 129/64, Thambu Chetty Street, Mannady, Parrys, Chennai - 600 001</strong></p>
    <p align="center"><strong>Phone : 45564483, Mobile :7667755666, 8144668484 Email:asslogistics@yahoo.in</strong></p>
    <p align="left"><strong>No: <?php echo $gcid;?>     </strong><span style="padding-left:100px"><strong>GOODS CONSIGNMENT NOTE</strong></span></p></td>
    <td height="55" colspan="2"><strong>LR No:<?php echo $gcid;?></strong></td>
  </tr>
  <tr>
    <td colspan="2"><strong>Date:<?php echo $gcdetails['ent_date'];?></strong></td>
  </tr>
  <tr>
    <td width="150" height="36"><div align="center"><strong>Station From</strong></div></td>
    <td width="151"><div align="center"><strong>Station To</strong></div></td>
    <td colspan="2"><div align="center"><strong>Trailer/Lorry No.</strong></div></td>
    <td colspan="2"><div align="center"><strong>Delivery At</strong></div></td>
  </tr>
  <tr>
    <td height="37"><div align="center"> <?php echo $load['from_place']; ?></div></td>
    <td width="151"><div align="center"> <?php echo $load['to_place']; ?></div></td>
    <td colspan="2"><div align="center"> <?php echo $load['vechno']; ?></div></td>
    <td colspan="2"><div align="center"> <?php echo $load['to_place']; ?></div></td>
  </tr>
  <tr>
    <td height="146" colspan="2"><p><strong>Consignor : <?php echo $sender['name']; ?></strong></p>
    <p>Mr. <?php echo $sender['cust_name']; ?></p>
    <p><?php echo $sender['address'].'<br>'.$sender['area'].','.$sender_city['DistrictName'].'<br>'.$sender_state['StateName'].'<br>'.$sender['pinCode']; ?> </p>
    <p><strong>Party's GST No:</strong><?php echo $sender['gstNo']; ?></p></td>
    <td height="146" colspan="4"><p><strong>Consignee : <?php echo $recieve['name']; ?></strong></p>
    <p>Mr. <?php echo $recieve['cust_name']; ?></p>
    <p><?php echo $recieve['address'].'<br>'.$recieve['area'].','.$recieve_city['DistrictName'].'<br>'.$recieve_state['StateName'].'<br>'.$recieve['pinCode']; ?> </p>
    <p><strong>Party's CST/ TIN:</strong><?php echo $recieve['gstNo']; ?></p></td>
  </tr>
  <tr>
    <td height="38" rowspan="2"><strong>No.of Articles</strong></td>
    <td width="151" rowspan="2"><strong>Description of Goods</strong></td>
    <td colspan="2"><p align="center"><strong>Weight</strong></p>
    <p align="left">&nbsp;</p></td>
    <td colspan="2"><p align="center"><strong>Freight</strong></p>
    <p>&nbsp;</p></td>
  </tr>
  <tr>
    <td><div align="center"><strong>Q</strong></div></td>
    <td><div align="center"><strong>Kg</strong></div></td>
    <td><div align="center"><strong>Rs </strong></div></td>
    <td><div align="center"><strong>Ps</strong></div></td>
  </tr>
  <tr>
    <td height="36"><?php echo $gcdetails['articles'];?></td>
    <td width="151"><?php echo $gcdetails['description'];?></td>
    <td width="73"><?php echo $gcdetails['articles'];?></td>
    <td width="71"><?php echo $load['cont_wt'];?></td>
    <td width="94"><?php echo $gcdetails['value'];?></td>
    <td width="129">00</td>
  </tr>
  <tr>
    <td height="37"><strong>Value of the Goods :</strong><?php echo $gcdetails['value'];?></td>
    <td height="37"><strong>TO PAY / PAID</strong></td>
    <td colspan="2" rowspan="2"><p><strong>To be Billed at</strong></p>
    <p>&nbsp;</p></td>
    <td colspan="2" rowspan="2"><p><strong>For ASS Logistics</strong></p>
    <p>&nbsp;</p></td>
  </tr>
  <tr>
    <td height="61" colspan="2"><p><strong>We hereby agree to the Conditions Specified on the reverse</strong></p>
    <p><strong>Signature of the Consignor</strong></p></td>
  </tr>
</table>
<p class="mg-b-20 mg-sm-b-30" style="padding-left:1100px;"><button class='ion-printer' onclick='print()'>Print</button> 
<link rel="stylesheet" type="text/css" href="print.css" media="print" /> </p>
</body>
</html>
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
}
@page 
    {
        size:  auto;   /* auto is the initial value */
        margin: 0mm ;  /* this affects the margin in the printer settings */
        margin-top: 15px;
        margin-right: 10px;
        margin-left: 10px;

    }
</style>