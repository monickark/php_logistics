<?php include('../include/checklogin.php'); ?>
<?php include('../include/dbConnect.php'); ?>
<?php include('../include/adminheader.php'); ?>
<?php include('../include/header.php'); ?>
<?php include('../include/leftmenu.php'); ?>
<?php 
require('../include/basefunctions.php');
?>
<script >
  document.addEventListener("DOMContentLoaded", function() {
    var style = this.value == 1 ? 'block' : 'none';
    document.getElementById('hidden_div').style.display = style;
    document.getElementById('sealdiv').style.display = style;
    document.getElementById('sealdiv2').style.display = style;
    document.getElementById('hirediv').style.display = style;
    document.getElementById('retemp').style.display = style;
    document.getElementById('fcentry').style.display = style;
     document.getElementById('parkingent').style.display = style;
     document.getElementById('hhaltent').style.display = style;
     document.getElementById('submitdiv').style.display = 'none';

    document.getElementById('hidden_div4').style.display = style;
    document.getElementById('hidden_div5').style.display = style;

    document.getElementById('hidden_div7').style.display = style;
    document.getElementById('hidden_div8').style.display = style;
    document.getElementById('hidden_div9').style.display = style;
    document.getElementById('Bankdiv').style.display = style;
    document.getElementById('workBankdiv').style.display = style;
    document.getElementById('mkmbankdiv').style.display = style;


  });
</script>


<?php
$data = new Basefunc;  
if(isset($_POST['submit'])){


  if($_REQUEST['action'] == "Add"){

$date_rep = str_replace('/', '-', $_POST['mdate']);

        $newDate = date("Y-m-d", strtotime($date_rep));
/*echo $newDate;*/
/*echo '<script>alert("'.$newDate.'");</script>';
die;*/

    if($_POST['loadtype']=="Load" )
    {



/*
$trans=str_replace(' ','_',$_POST["loadtrans"]);
$entries=$trans."entries";
$ent_items=$trans."entryitems";
$ledgers=$trans."ledgers";

 echo '<script>alert("'.$trans.'");</script>';

$entries=$trans."entries";
$ent_items=$trans."entryitems";
$ledgers=$trans."ledgers";

 echo '<script>alert("'.$ledgers.'");</script>';
  echo '<script>alert("'.$ent_items.'");</script>';
   echo '<script>alert("'.$entries.'");</script>';

die;*/



             /* echo '<script>alert("'.$_POST['frt_bal'].'");</script>';*/
              /*
              echo '<script>alert("'.$_POST['frt_total'].'");</script>';
              */
if($_POST['loaddriver']=="")
{
echo '<script> alert("Please Fill Out Fields ");window.location.assign("gcentry.php");</script>';

}
else
{





  $ins_main = array(
        "intAdminId"       =>     mysqli_real_escape_string($data->con, $_SESSION['MintId']),
        "ent_date"         =>     mysqli_real_escape_string($data->con, $newDate), 
        "tripid"           =>     mysqli_real_escape_string($data->con, $_POST['refno']),   
        "vechnum"          =>     mysqli_real_escape_string($data->con, $_POST['vechnum']),  
        "status"           =>     mysqli_real_escape_string($data->con, $_POST['loadtype']) 
        
      );  
 $insmainid = $data->insert('load_stat', $ins_main);




    $ins_load = array(
        "intAdminId"       =>     mysqli_real_escape_string($data->con, $_SESSION['MintId']),
        "ent_date"         =>     mysqli_real_escape_string($data->con, $newDate),    
        "tripid"           =>     mysqli_real_escape_string($data->con, $_POST['refno']),
        "from_place"       =>     mysqli_real_escape_string($data->con, $_POST['loadfrom']), 
        "to_place"         =>     mysqli_real_escape_string($data->con, $_POST['loadto']), 
         "vechno"          =>     mysqli_real_escape_string($data->con, $_POST['vechnum']),
        "company"          =>     mysqli_real_escape_string($data->con, $_POST['loadcomp']), 
        "transporter"      =>     mysqli_real_escape_string($data->con, $_POST['loadtrans']), 
        "driver"           =>     mysqli_real_escape_string($data->con, $_POST['loaddriver']), 
        "party_name"       =>     mysqli_real_escape_string($data->con, $_POST['loadparty']), 
        "party_gc"         =>     mysqli_real_escape_string($data->con, $_POST['loadgcno']), 
        "ref_no"           =>     mysqli_real_escape_string($data->con, $_POST['loadrefno']),
        "cont_no"          =>     mysqli_real_escape_string($data->con, $_POST['loadcontno']),  
        "contsize"         =>     mysqli_real_escape_string($data->con, $_POST['loadcontsize']), 
        "cont_wt"          =>     mysqli_real_escape_string($data->con, $_POST['loadcontwt']),
        "load_type"        =>     mysqli_real_escape_string($data->con, $_POST['contloadtype']), 
        "sealno"           =>     mysqli_real_escape_string($data->con, $_POST['sealno']), 
        "remarks"          =>     mysqli_real_escape_string($data->con, $_POST['loadrem']) 
      ); 
 $insloadid = $data->insert('load_det', $ins_load);



 /*  *****For GC  ==>>  "ass_gc_no"        =>     mysqli_real_escape_string($data->con, $_POST['assgc']), 
        "consigner_name"   =>     mysqli_real_escape_string($data->con, $_POST['gcconsignor']), 
        "consignee_name"   =>     mysqli_real_escape_string($data->con, $_POST['gcconsignee']), 
        "no_of_articles"   =>     mysqli_real_escape_string($data->con, $_POST['gcarticles']), 
        "goods_value"      =>     mysqli_real_escape_string($data->con, $_POST['gcvalue']),    
        "description"      =>     mysqli_real_escape_string($data->con, $_POST['gcdesc']),  */




 $ins_frt = array(
        "intAdminId"              =>     mysqli_real_escape_string($data->con, $_SESSION['MintId']),
        "ent_date"                =>     mysqli_real_escape_string($data->con, $newDate),
        "tripid"                  =>     mysqli_real_escape_string($data->con, $_POST['refno']),
        "amount"                  =>     mysqli_real_escape_string($data->con, $_POST['frt_amt']),    
        "loading_charge"          =>     mysqli_real_escape_string($data->con, $_POST['frt_ldg_chrg']),
        "unloading_charge"        =>     mysqli_real_escape_string($data->con, $_POST['frt_unldg_chrg']),    
        "weight_bill_charge"      =>     mysqli_real_escape_string($data->con, $_POST['frt_weigh_crg']), 
        "others_amount"           =>     mysqli_real_escape_string($data->con, $_POST['frt_other_crg']), 
        "others_description"      =>     mysqli_real_escape_string($data->con, $_POST['frt_other_desc']), 
        "halt_days"               =>     mysqli_real_escape_string($data->con, $_POST['frt_hlt_days']),
        "halt_rate"               =>     mysqli_real_escape_string($data->con, $_POST['frt_hlt_rate']),  
        "halt_amount"             =>     mysqli_real_escape_string($data->con, $_POST['frt_hlt_amt']), 
        "total_freight"           =>     mysqli_real_escape_string($data->con, $_POST['frt_total']), 
        "advance_cash_amount"     =>     mysqli_real_escape_string($data->con, $_POST['frt_adv_cash']), 
        "adv_cash_date"           =>     mysqli_real_escape_string($data->con, $_POST['frt_adv_cash_dte']), 
        "advance_cheque_amount"   =>     mysqli_real_escape_string($data->con, $_POST['frt_adv_cqe']), 
        "adv_cque_date"           =>     mysqli_real_escape_string($data->con, $_POST['frt_adv_cqe_dte']),    
        "bank"                    =>     mysqli_real_escape_string($data->con, $_POST['frt_adv_cqe_bnk']),  
        "cheque_no"               =>     mysqli_real_escape_string($data->con, $_POST['frt_adv_cqe_num']), 
        "balance"                 =>     mysqli_real_escape_string($data->con, $_POST['frt_bal'])
      ); 
 $insfrtid = $data->insert('frieghtdetails', $ins_frt);






$ins_hire = array(
        "intAdminId"             =>     mysqli_real_escape_string($data->con, $_SESSION['MintId']),
        "tripid"                 =>     mysqli_real_escape_string($data->con, $_POST['refno']),
        "ent_date"               =>     mysqli_real_escape_string($data->con, $newDate),
        "hire_amount"            =>     mysqli_real_escape_string($data->con, $_POST['hire_amt']),    
        "commision"              =>     mysqli_real_escape_string($data->con, $_POST['hire_comm']), 
        "loading_charge"         =>     mysqli_real_escape_string($data->con, $_POST['hire_ldng_crgs']), 
        "unloading_charge"       =>     mysqli_real_escape_string($data->con, $_POST['hire_unldng_crgs']), 
        "weight_bill_charge"     =>     mysqli_real_escape_string($data->con, $_POST['hire_weigh_crgs']),
        "other_description"      =>     mysqli_real_escape_string($data->con, $_POST['hire_other_des']),  
        "other_amount"           =>     mysqli_real_escape_string($data->con, $_POST['hire_other_amt']), 
        "halt_days"              =>     mysqli_real_escape_string($data->con, $_POST['hire_halt_days']), 
        "halt_rate"              =>     mysqli_real_escape_string($data->con, $_POST['hire_halt_rate']), 
        "halt_amount"            =>     mysqli_real_escape_string($data->con, $_POST['hire_halt_amt']), 
        "total_hire"             =>     mysqli_real_escape_string($data->con, $_POST['hire_frt_total']), 
        "chn_advance"            =>     mysqli_real_escape_string($data->con, $_POST['hire_adv']),    
        "bank"                   =>     mysqli_real_escape_string($data->con, $_POST['hire_chn_bank']), 
        "cheque_no"              =>     mysqli_real_escape_string($data->con, $_POST['hire_chn_cque']), 
        "mkm_adv"                =>     mysqli_real_escape_string($data->con, $_POST['hire_mkm_amt']),
        "mkm_bank"               =>     mysqli_real_escape_string($data->con, $_POST['hire_mkm_bank']),  
        "mkm_cque_no"            =>     mysqli_real_escape_string($data->con, $_POST['hire_mkm_cque']), 
        "total_cash_advance"     =>     mysqli_real_escape_string($data->con, $_POST['hire_total_adv']), 
        "total_diesel_advance"   =>     mysqli_real_escape_string($data->con, $_POST['hire_diesel_adv']), 
        "total_diesel_quantity"  =>     mysqli_real_escape_string($data->con, $_POST['hire_diesel_qty']),
        "hire_balance"           =>     mysqli_real_escape_string($data->con, $_POST['hire_balance'])
      ); 
      $inshire = $data->insert('load_hire', $ins_hire);



if(!empty($_POST['frt_adv_cash']))
{


$vouc_type="Advance Payment on Trip".$_POST['refno'];

$findnos =mysqli_query($conn,"SELECT * FROM entries WHERE entrytype_id ='1' ORDER BY id DESC LIMIT 1; " );
$nos=mysqli_fetch_assoc($findnos);





$insert_hire = array(   
      "entrytype_id"      =>     mysqli_real_escape_string($data->con,'1' ),
      "number"         =>     mysqli_real_escape_string($data->con, $nos['number']+1),
      "date"          =>     mysqli_real_escape_string($data->con, $newDate),  
      "dr_total"        =>     mysqli_real_escape_string($data->con, $_POST['frt_adv_cash']),
      "cr_total"      =>     mysqli_real_escape_string($data->con, $_POST['frt_adv_cash']),
      "narration"    =>     mysqli_real_escape_string($data->con, $vouc_type)
     
      );  


       $insstat = $data->insert('entries', $insert_hire);



/*

$cparty_name =mysqli_query($conn,"SELECT * FROM customer WHERE name ='" .$_POST["frt_adv_cqe_bnk"]. "'; " );
$cparty_id=mysqli_fetch_assoc($cparty_name);*/



$insert_p1= array(   
      "entry_id"      =>     mysqli_real_escape_string($data->con, $insstat),
      "ledger_id"         =>     mysqli_real_escape_string($data->con, $_POST["frt_adv_cqe_bnk"]),
      "amount"          =>     mysqli_real_escape_string($data->con, $_POST['frt_adv_cash']),  
      "dc"        =>     mysqli_real_escape_string($data->con, 'C')
      );  


       $insst1 = $data->insert('entryitems', $insert_p1);

$dparty_name =mysqli_query($conn,"SELECT * FROM ledgers WHERE name ='" .$_POST["loadparty"]. "'; " );
$dparty_id=mysqli_fetch_assoc($dparty_name);

$insert_p2= array(   
      "entry_id"      =>     mysqli_real_escape_string($data->con, $insstat),
      "ledger_id"         =>     mysqli_real_escape_string($data->con, $dparty_id['id']),
      "amount"          =>     mysqli_real_escape_string($data->con, $_POST['frt_adv_cash']),  
      "dc"        =>     mysqli_real_escape_string($data->con, 'D')
      );  


       $insst2 = $data->insert('entryitems', $insert_p2);


}





$reason="Load Advance for Trip".$_POST['refno'];

if(!empty($_POST['hire_adv']))
{




$vouc_type="Trip Advance";

$findnos =mysqli_query($conn,"SELECT * FROM entries WHERE entrytype_id ='2' ORDER BY id DESC LIMIT 1; " );
$nos=mysqli_fetch_assoc($findnos);

$insert_hire = array(   
      "entrytype_id"      =>     mysqli_real_escape_string($data->con, '2'),
      "number"         =>     mysqli_real_escape_string($data->con, $nos['number']+1),
      "date"          =>     mysqli_real_escape_string($data->con, $newDate),  
      "dr_total"        =>     mysqli_real_escape_string($data->con, $_POST['hire_adv']),
      "cr_total"      =>     mysqli_real_escape_string($data->con, $_POST['hire_adv']),
      "narration"    =>     mysqli_real_escape_string($data->con, $vouc_type)
     
      );  


       $insstat = $data->insert('entries', $insert_hire);



$cparty_name =mysqli_query($conn,"SELECT * FROM ledgers WHERE name ='" .$_POST["loadtrans"]. "'; " );
$cparty_id=mysqli_fetch_assoc($cparty_name);



$insert_p1= array(   
      "entry_id"      =>     mysqli_real_escape_string($data->con, $insstat),
      "ledger_id"         =>     mysqli_real_escape_string($data->con, $cparty_id['id']),
      "amount"          =>     mysqli_real_escape_string($data->con, $_POST['hire_adv']),  
      "dc"        =>     mysqli_real_escape_string($data->con, 'C')
      );  


       $insst1 = $data->insert('entryitems', $insert_p1);



$insert_p2= array(   
      "entry_id"      =>     mysqli_real_escape_string($data->con, $insstat),
      "ledger_id"         =>     mysqli_real_escape_string($data->con, $_POST['hire_chn_bank']),
      "amount"          =>     mysqli_real_escape_string($data->con, $_POST['hire_adv']),  
      "dc"        =>     mysqli_real_escape_string($data->con, 'D')
      );  


       $insst2 = $data->insert('entryitems', $insert_p2);











$vouc_type="Trip Advance For Trip".$_POST['refno'];

 $trans=str_replace(' ','_',$_POST["loadtrans"]);
 $trans=strtolower($trans);
 $entries=$trans."entries";
 $ent_items=$trans."entryitems";
$ledgers=$trans."ledgers";


$findnos =mysqli_query($conn,"SELECT * FROM `".$entries."` WHERE entrytype_id ='1' ORDER BY id DESC LIMIT 1; " );
$nos=mysqli_fetch_assoc($findnos);


/*echo '<script>alert("'. $nos['number'].'");</script>';
die;*/

$insert_hire = array(   
      "entrytype_id"      =>     mysqli_real_escape_string($data->con, '1'),
      "number"         =>     mysqli_real_escape_string($data->con, $nos['number']+1),
      "date"          =>     mysqli_real_escape_string($data->con, $newDate),  
      "dr_total"        =>     mysqli_real_escape_string($data->con, $_POST['hire_adv']),
      "cr_total"      =>     mysqli_real_escape_string($data->con, $_POST['hire_adv']),
      "narration"    =>     mysqli_real_escape_string($data->con, $vouc_type)
     
      );  
       $insstat = $data->insert($entries, $insert_hire);



$cparty_name =mysqli_query($conn,"SELECT * FROM `".$ledgers."` WHERE name ='" .$_POST['loadcomp']. "'; " );
$cparty_id=mysqli_fetch_assoc($cparty_name);



$insert_p1= array(   
      "entry_id"      =>     mysqli_real_escape_string($data->con, $insstat),
      "ledger_id"         =>     mysqli_real_escape_string($data->con, $cparty_id['id']),
      "amount"          =>     mysqli_real_escape_string($data->con, $_POST['hire_adv']),  
      "dc"        =>     mysqli_real_escape_string($data->con, 'C')
      );  


       $insst1 = $data->insert($ent_items, $insert_p1);


$dparty_name =mysqli_query($conn,"SELECT * FROM `".$ledgers."` WHERE name ='Cash'; " );
$dparty_id=mysqli_fetch_assoc($dparty_name);

$insert_p2= array(   
      "entry_id"      =>     mysqli_real_escape_string($data->con, $insstat),
      "ledger_id"         =>     mysqli_real_escape_string($data->con, $dparty_id['id']),
      "amount"          =>     mysqli_real_escape_string($data->con, $_POST['hire_adv']),  
      "dc"        =>     mysqli_real_escape_string($data->con, 'D')
      );  


       $insst2 = $data->insert($ent_items, $insert_p2);



/*fOR dRIVER*/


$vouc_type="Driver Advance For Trip".$_POST['refno'];

$trans=str_replace(' ','_',$_POST["loadtrans"]);
 $trans=strtolower($trans);
$entries=$trans."entries";
$ent_items=$trans."entryitems";
$ledgers=$trans."ledgers";


$findnos =mysqli_query($conn,"SELECT * FROM `".$entries."` WHERE entrytype_id ='2' ORDER BY id DESC LIMIT 1; " );
$nos=mysqli_fetch_assoc($findnos);

$insert_hire = array(   
      "entrytype_id"      =>     mysqli_real_escape_string($data->con, '2'),
      "number"         =>     mysqli_real_escape_string($data->con, $nos['number']+1),
      "date"          =>     mysqli_real_escape_string($data->con, $newDate),  
      "dr_total"        =>     mysqli_real_escape_string($data->con, $_POST['hire_adv']),
      "cr_total"      =>     mysqli_real_escape_string($data->con, $_POST['hire_adv']),
      "narration"    =>     mysqli_real_escape_string($data->con, $vouc_type)
     
      );  
       $insstat = $data->insert($entries, $insert_hire);



$cparty_name =mysqli_query($conn,"SELECT * FROM `".$ledgers."` WHERE name ='Cash';" );
$cparty_id=mysqli_fetch_assoc($cparty_name);



$insert_p1= array(   
      "entry_id"      =>     mysqli_real_escape_string($data->con, $insstat),
      "ledger_id"         =>     mysqli_real_escape_string($data->con, $cparty_id['id']),
      "amount"          =>     mysqli_real_escape_string($data->con, $_POST['hire_adv']),  
      "dc"        =>     mysqli_real_escape_string($data->con, 'C')
      );  


       $insst1 = $data->insert($ent_items, $insert_p1);

      


$driver =mysqli_query($conn,"SELECT * FROM drivers WHERE id ='".$_POST['loaddriver']."';" );
$dri=mysqli_fetch_assoc($driver);



$dparty_name =mysqli_query($conn,"SELECT * FROM `$ledgers` WHERE name ='" .$dri['name']. "'; " );
$dparty_id=mysqli_fetch_assoc($dparty_name);

$insert_p2= array(   
      "entry_id"      =>     mysqli_real_escape_string($data->con, $insstat),
      "ledger_id"         =>     mysqli_real_escape_string($data->con, $dparty_id['id']),
      "amount"          =>     mysqli_real_escape_string($data->con, $_POST['hire_adv']),  
      "dc"        =>     mysqli_real_escape_string($data->con, 'D')
      );  


       $insst2 = $data->insert($ent_items, $insert_p2);






$type="1";
$reason="Load Advance";
  $ins_driver_mgt = array(
        "intAdminId"       =>     mysqli_real_escape_string($data->con, $_SESSION['MintId']),
        "ent_date"         =>     mysqli_real_escape_string($data->con, $newDate),
        "driver_id"        =>     mysqli_real_escape_string($data->con, $_POST['loaddriver']),
        "amount"           =>     mysqli_real_escape_string($data->con, $_POST['hire_adv']),
        "type"             =>     mysqli_real_escape_string($data->con, $type), 
        "tripid"           =>     mysqli_real_escape_string($data->con, $_POST['refno']),
        "reason"           =>     mysqli_real_escape_string($data->con, $reason)
      ); 
 $inshhaltid = $data->insert('driver_mgt', $ins_driver_mgt);


}


if(!empty($_POST['hire_mkm_amt']))
{




$vouc_type="Trip Advance";


$findnos =mysqli_query($conn,"SELECT * FROM entries WHERE entrytype_id ='2' ORDER BY id DESC LIMIT 1; " );
$nos=mysqli_fetch_assoc($findnos);


$insert_hire = array(   
      "entrytype_id"      =>     mysqli_real_escape_string($data->con, '2'),
      "number"         =>     mysqli_real_escape_string($data->con, $nos['number']+1),
      "date"          =>     mysqli_real_escape_string($data->con, $newDate),  
      "dr_total"        =>     mysqli_real_escape_string($data->con, $_POST['hire_mkm_amt']),
      "cr_total"      =>     mysqli_real_escape_string($data->con, $_POST['hire_mkm_amt']),
      "narration"    =>     mysqli_real_escape_string($data->con, $vouc_type)
     
      );  


       $insstat = $data->insert('entries', $insert_hire);



$cparty_name =mysqli_query($conn,"SELECT * FROM ledgers WHERE name ='" .$_POST["loadtrans"]. "'; " );
$cparty_id=mysqli_fetch_assoc($cparty_name);



$insert_p1= array(   
      "entry_id"      =>     mysqli_real_escape_string($data->con, $insstat),
      "ledger_id"         =>     mysqli_real_escape_string($data->con, $cparty_id['id']),
      "amount"          =>     mysqli_real_escape_string($data->con, $_POST['hire_mkm_amt']),  
      "dc"        =>     mysqli_real_escape_string($data->con, 'C')
      );  


       $insst1 = $data->insert('entryitems', $insert_p1);



$insert_p2= array(   
      "entry_id"      =>     mysqli_real_escape_string($data->con, $insstat),
      "ledger_id"         =>     mysqli_real_escape_string($data->con, $_POST['hire_mkm_bank']),
      "amount"        =>     mysqli_real_escape_string($data->con, $_POST['hire_mkm_amt']),  
      "dc"           =>     mysqli_real_escape_string($data->con, 'D')
      );  


       $insst2 = $data->insert('entryitems', $insert_p2);








$vouc_type="Trip Advance For Trip".$_POST['refno'];

$trans=str_replace(' ','_',$_POST["loadtrans"]);
 $trans=strtolower($trans);
$entries=$trans."entries";
$ent_items=$trans."entryitems";

$ledgers=$trans."ledgers";

$findnos =mysqli_query($conn,"SELECT * FROM `$entries` WHERE entrytype_id ='1' ORDER BY id DESC LIMIT 1; " );
$nos=mysqli_fetch_assoc($findnos);

$insert_hire = array(   
      "entrytype_id"      =>     mysqli_real_escape_string($data->con, '1'),
      "number"         =>     mysqli_real_escape_string($data->con, $nos['number']+1),
      "date"          =>     mysqli_real_escape_string($data->con, $newDate),  
      "dr_total"        =>     mysqli_real_escape_string($data->con, $_POST['hire_mkm_amt']),
      "cr_total"      =>     mysqli_real_escape_string($data->con, $_POST['hire_mkm_amt']),
      "narration"    =>     mysqli_real_escape_string($data->con, $vouc_type)
     
      );  
       $insstat = $data->insert($entries, $insert_hire);



$cparty_name =mysqli_query($conn,"SELECT * FROM `$ledgers` WHERE name ='" .$_POST['loadcomp']. "'; " );
$cparty_id=mysqli_fetch_assoc($cparty_name);



$insert_p1= array(   
      "entry_id"      =>     mysqli_real_escape_string($data->con, $insstat),
      "ledger_id"         =>     mysqli_real_escape_string($data->con, $cparty_id['id']),
      "amount"          =>     mysqli_real_escape_string($data->con, $_POST['hire_mkm_amt']),  
      "dc"        =>     mysqli_real_escape_string($data->con, 'C')
      );  


       $insst1 = $data->insert($ent_items, $insert_p1);


$dparty_name =mysqli_query($conn,"SELECT * FROM `$ledgers` WHERE name ='Cash'; " );
$dparty_id=mysqli_fetch_assoc($dparty_name);

$insert_p2= array(   
      "entry_id"      =>     mysqli_real_escape_string($data->con, $insstat),
      "ledger_id"         =>     mysqli_real_escape_string($data->con, $dparty_id['id']),
      "amount"          =>     mysqli_real_escape_string($data->con, $_POST['hire_mkm_amt']),  
      "dc"        =>     mysqli_real_escape_string($data->con, 'D')
      );  


       $insst2 = $data->insert($ent_items, $insert_p2);



/*fOR dRIVER*/


$vouc_type="Driver Advance For Trip".$_POST['refno'];

$trans=str_replace(' ','_',$_POST["loadtrans"]);
 $trans=strtolower($trans);
$entries=$trans."entries";
$ent_items=$trans."entryitems";
$ledgers=$trans."ledgers";


$findnos =mysqli_query($conn,"SELECT * FROM `$entries` WHERE entrytype_id ='2' ORDER BY id DESC LIMIT 1; " );
$nos=mysqli_fetch_assoc($findnos);

$insert_hire = array(   
      "entrytype_id"      =>     mysqli_real_escape_string($data->con, '2'),
      "number"         =>     mysqli_real_escape_string($data->con, $nos['number']+1),
      "date"          =>     mysqli_real_escape_string($data->con, $newDate),  
      "dr_total"        =>     mysqli_real_escape_string($data->con, $_POST['hire_mkm_amt']),
      "cr_total"      =>     mysqli_real_escape_string($data->con, $_POST['hire_mkm_amt']),
      "narration"    =>     mysqli_real_escape_string($data->con, $vouc_type)
     
      );  
       $insstat = $data->insert($entries, $insert_hire);



$cparty_name =mysqli_query($conn,"SELECT * FROM `$ledgers` WHERE name ='Cash';" );
$cparty_id=mysqli_fetch_assoc($cparty_name);



$insert_p1= array(   
      "entry_id"      =>     mysqli_real_escape_string($data->con, $insstat),
      "ledger_id"         =>     mysqli_real_escape_string($data->con, $cparty_id['id']),
      "amount"          =>     mysqli_real_escape_string($data->con, $_POST['hire_mkm_amt']),  
      "dc"        =>     mysqli_real_escape_string($data->con, 'C')
      );  


       $insst1 = $data->insert($ent_items, $insert_p1);

      


$driver =mysqli_query($conn,"SELECT * FROM drivers WHERE id ='".$_POST['loaddriver']."';" );
$dri=mysqli_fetch_assoc($driver);



$dparty_name =mysqli_query($conn,"SELECT * FROM '$ledgers` WHERE name ='" .$dri['name']. "'; " );
$dparty_id=mysqli_fetch_assoc($dparty_name);

$insert_p2= array(   
      "entry_id"      =>     mysqli_real_escape_string($data->con, $insstat),
      "ledger_id"         =>     mysqli_real_escape_string($data->con, $dparty_id['id']),
      "amount"          =>     mysqli_real_escape_string($data->con, $_POST['hire_mkm_amt']),  
      "dc"        =>     mysqli_real_escape_string($data->con, 'D')
      );  


       $insst2 = $data->insert($ent_items, $insert_p2);





$type="1";
$reason="Load Advance";
  $ins_driver_mgt = array(
        "intAdminId"       =>     mysqli_real_escape_string($data->con, $_SESSION['MintId']),
        "ent_date"         =>     mysqli_real_escape_string($data->con, $newDate),
        "driver_id"        =>     mysqli_real_escape_string($data->con, $_POST['loaddriver']),
        "amount"           =>     mysqli_real_escape_string($data->con, $_POST['hire_mkm_amt']),
        "type"             =>     mysqli_real_escape_string($data->con, $type), 
        "tripid"           =>     mysqli_real_escape_string($data->con, $_POST['refno']),
        "reason"           =>     mysqli_real_escape_string($data->con, $reason)
      ); 
 $inshhaltid = $data->insert('driver_mgt', $ins_driver_mgt);




}















/* echo '<script>alert("'.$_POST['hire_chn_pay_mode'].'");</script>';

echo '<script>alert("'.$_POST['hire_adv'].'");</script>';

echo '<script>alert("'..'");</script>';
echo '<script>alert("'..'");</script>';

echo '<script>alert("'.$_POST['hire_mkm_amt'].'");</script>';
echo '<script>alert("'.$_POST['hire_mkm_bank'].'");</script>';
echo '<script>alert("'.$_POST['hire_mkm_cque'].'");</script>';


echo '<script>alert("'.$_POST['hire_mkm_pay_mode'].'");</script>';*/





  



/*
$party_name =mysqli_query($conn,"SELECT * FROM customer WHERE name ='" .$_POST["loadparty"]. "'; " );
$party_id=mysqli_fetch_assoc($party_name);

$total_adv=$_POST['frt_adv_cash']+$_POST['frt_adv_cqe'];

$pay_entry = array(   
      "intAdminId"       =>     mysqli_real_escape_string($data->con, $_SESSION['MintId']),
      "cust_id"          =>     mysqli_real_escape_string($data->con, $party_id['comm_id']),
      "tripid"           =>     mysqli_real_escape_string($data->con, $_POST['refno']),
      "amount"           =>     mysqli_real_escape_string($data->con, $_POST['frt_amt']), 
      "payment"          =>     mysqli_real_escape_string($data->con, $total_adv),
      "balance"          =>     mysqli_real_escape_string($data->con, $_POST['frt_amt']-$total_adv),
      "payment_date"     =>     mysqli_real_escape_string($data->con, $newDate),
      "bill_ent_date"    =>     mysqli_real_escape_string($data->con, $newDate)
     
      );  


       $ins = $data->insert('party_calculation', $pay_entry);*/





/*if($total_adv!=0)
{
  if($_POST['frt_adv_cash']!=0)
  {
$type="Cash";
$payment_entry = array(   
      "intAdminId"       =>     mysqli_real_escape_string($data->con, $_SESSION['MintId']),
      "ent_date"         =>     mysqli_real_escape_string($data->con, $newDate),  
      "party"            =>     mysqli_real_escape_string($data->con, $party_id['comm_id']),
      "amount"           =>     mysqli_real_escape_string($data->con, $_POST['frt_adv_cash']),
      "pay_type"         =>     mysqli_real_escape_string($data->con, $type)
     
      );  


       $insert_cash = $data->insert('party_payments', $payment_entry);
}
if($_POST['frt_adv_cqe']!=0)
{
  $type="Checque";
$payment_entry = array(   
      "intAdminId"       =>     mysqli_real_escape_string($data->con, $_SESSION['MintId']),
      "ent_date"         =>     mysqli_real_escape_string($data->con, $newDate),  
      "party"            =>     mysqli_real_escape_string($data->con, $party_id['comm_id']),
      "amount"           =>     mysqli_real_escape_string($data->con, $_POST['frt_adv_cqe']),
      "pay_type"         =>     mysqli_real_escape_string($data->con, $type)
     
      );  


       $insert_cque = $data->insert('party_payments', $payment_entry);
}


}*/









if($_POST['hire_diesel_adv']!="")
{
$type="1";
$reason="Diesel Advance";
  $ins_driver_mgt = array(
        "intAdminId"       =>     mysqli_real_escape_string($data->con, $_SESSION['MintId']),
        "ent_date"         =>     mysqli_real_escape_string($data->con, $newDate),
        "driver_id"        =>     mysqli_real_escape_string($data->con, $_POST['loaddriver']),
        "amount"           =>     mysqli_real_escape_string($data->con, $_POST['hire_diesel_adv']),
        "type"             =>     mysqli_real_escape_string($data->con, $type), 
        "tripid"           =>     mysqli_real_escape_string($data->con, $_POST['refno']),
        "reason"           =>     mysqli_real_escape_string($data->con, $reason)
      ); 
 $inshhaltid = $data->insert('driver_mgt', $ins_driver_mgt);




}



$insert_stat = array(
        "intAdminId"       =>     mysqli_real_escape_string($data->con, $_SESSION['MintId']),
         "ent_date"        =>     mysqli_real_escape_string($data->con, $newDate),  
         "vechnum"         =>     mysqli_real_escape_string($data->con, $_POST['vechnum']),  
         "tripid"          =>     mysqli_real_escape_string($data->con, $_POST['refno']),
         "status"          =>     mysqli_real_escape_string($data->con, $_POST['loadtype']),
         "from_place"      =>     mysqli_real_escape_string($data->con, $_POST['loadfrom']), 
         "to_place"        =>     mysqli_real_escape_string($data->con, $_POST['loadto']), 
         "driver"          =>     mysqli_real_escape_string($data->con, $_POST['loaddriver'])

    );  
 $insstat = $data->insert('vechstat', $insert_stat);


      if($insstat&&$inshire&&$insfrtid&&$insloadid){

        echo '<script> alert("GC Entry with Load Done Successfully");window.location.assign("gcentry.php");</script>';
      } 
      else{
        echo '<script> alert("Error IN lOAD");</script>';
      }
}
  
    }
   


    else if($_POST['loadtype']=="Return" )
    {


if($_POST['ret_party_name']&&$_POST['rtn_from']&&$_POST['rtnto']&&$_POST['vechnum']=="")
{
echo '<script> alert("Please Fill Out Fields ");window.location.assign("gcentry.php");</script>';

}






if($_POST['return_driver_cnge']!="")
{

  $dri_change=$_POST['return_driver_cnge'];
}
else
{
$dri_change=$_POST['return_driver_name_h'];


}




  
     $ins_return = array(
        "intAdminId"       =>     mysqli_real_escape_string($data->con, $_SESSION['MintId']),
        "ent_date"         =>     mysqli_real_escape_string($data->con, $newDate),    
        "tripid"           =>     mysqli_real_escape_string($data->con, $_POST['ret_tripid']),
        "from_place"       =>     mysqli_real_escape_string($data->con, $_POST['rtn_from']), 
        "to_place"         =>     mysqli_real_escape_string($data->con, $_POST['rtnto']), 
        "vechno"           =>     mysqli_real_escape_string($data->con, $_POST['vechnum']),
        "driver"           =>     mysqli_real_escape_string($data->con, $dri_change),
        "return_adv"       =>     mysqli_real_escape_string($data->con, $_POST['return_adv']),  
        "party_name"       =>     mysqli_real_escape_string($data->con, $_POST['ret_party_name']), 
        "party_gc"         =>     mysqli_real_escape_string($data->con, $_POST['ret_gc']), 
        "ref_no"           =>     mysqli_real_escape_string($data->con, $_POST['ret_ref']),
        "cont_no"          =>     mysqli_real_escape_string($data->con, $_POST['ret_cont_no']),  
        "cont_size"        =>     mysqli_real_escape_string($data->con, $_POST['ret_cont_size']), 
        "cont_wt"          =>     mysqli_real_escape_string($data->con, $_POST['ret_cont_wt']),
        "load_type"        =>     mysqli_real_escape_string($data->con, $_POST['ret_cont_load']), 
        "sealno"           =>     mysqli_real_escape_string($data->con, $_POST['ret_seal_no']), 
        "adv_place"        =>     mysqli_real_escape_string($data->con, $_POST['return_amt_place']),
        "remarks"          =>     mysqli_real_escape_string($data->con, $_POST['ret_rem']) 
      ); 
 $insloadid = $data->insert('load_return', $ins_return);




$ins_main = array(
        "intAdminId"       =>     mysqli_real_escape_string($data->con, $_SESSION['MintId']),
        "ent_date"         =>     mysqli_real_escape_string($data->con, $newDate), 
        "tripid"           =>     mysqli_real_escape_string($data->con, $_POST['ret_tripid']),   
        "vechnum"          =>     mysqli_real_escape_string($data->con, $_POST['vechnum']),  
        "status"           =>     mysqli_real_escape_string($data->con, $_POST['loadtype']) 
        
      );  
 $insmainid = $data->insert('load_stat', $ins_main);




/*
$vouc_type="Advance Cash Recipt";


$pay_mode="Debit";

    $bank = array(
        "intAdminId"       =>     mysqli_real_escape_string($data->con, $_SESSION['MintId']),
        "ledger_id"        =>     mysqli_real_escape_string($data->con, $dri_change),
         "ent_date"        =>     mysqli_real_escape_string($data->con, $newDate),
         "pay_mode"         =>     mysqli_real_escape_string($data->con, $pay_mode),
          "type"           =>     mysqli_real_escape_string($data->con, $vouc_type),
        "amount"           =>     mysqli_real_escape_string($data->con, $_POST['return_adv'])
      ); 
 $bank_insert = $data->insert('vouchers', $bank);
*/

if($_POST['return_adv']!='')
{

$driver_nme =mysqli_query($conn,"SELECT * FROM drivers WHERE id ='$dri_change';" );
$dri=mysqli_fetch_assoc($driver_nme);

$transp =mysqli_query($conn,"SELECT * FROM vehicles WHERE vechNo ='".$_POST['vechnum']."';" );
$tra=mysqli_fetch_assoc($transp);



/*
On transporter Entry*/



$vouc_type="Trip Advance On".$_POST['ret_tripid']."Return";



$trans=str_replace(' ','_',$tra["vechOwner"]);
 $trans=strtolower($trans);
$entries=$trans."entries";
$ent_items=$trans."entryitems";
$ledgers=$trans."ledgers";


$findnos =mysqli_query($conn,"SELECT * FROM `$entries` WHERE entrytype_id ='1' ORDER BY id DESC LIMIT 1; " );
$nos=mysqli_fetch_assoc($findnos);

$insert_hire = array(   
      "entrytype_id"      =>     mysqli_real_escape_string($data->con, '1'),
      "number"         =>     mysqli_real_escape_string($data->con, $nos['number']+1),
      "date"          =>     mysqli_real_escape_string($data->con, $newDate),  
      "dr_total"        =>     mysqli_real_escape_string($data->con, $_POST['return_adv']),
      "cr_total"      =>     mysqli_real_escape_string($data->con, $_POST['return_adv']),
      "narration"    =>     mysqli_real_escape_string($data->con, $vouc_type)
     
      );  
       $insstat = $data->insert($entries, $insert_hire);



$cparty_name =mysqli_query($conn,"SELECT * FROM `$ledgers` WHERE name ='" .$_POST['ret_party_name']. "'; " );
$cparty_id=mysqli_fetch_assoc($cparty_name);



$insert_p1= array(   
      "entry_id"      =>     mysqli_real_escape_string($data->con, $insstat),
      "ledger_id"         =>     mysqli_real_escape_string($data->con, $cparty_id['id']),
      "amount"          =>     mysqli_real_escape_string($data->con, $_POST['return_adv']),  
      "dc"        =>     mysqli_real_escape_string($data->con, 'C')
      );  


       $insst1 = $data->insert($ent_items, $insert_p1);


$dparty_name =mysqli_query($conn,"SELECT * FROM `$ledgers` WHERE name ='Cash'; " );
$dparty_id=mysqli_fetch_assoc($dparty_name);

$insert_p2= array(   
      "entry_id"      =>     mysqli_real_escape_string($data->con, $insstat),
      "ledger_id"         =>     mysqli_real_escape_string($data->con, $dparty_id['id']),
      "amount"          =>     mysqli_real_escape_string($data->con, $_POST['return_adv']),  
      "dc"        =>     mysqli_real_escape_string($data->con, 'D')
      );  


       $insst2 = $data->insert($ent_items, $insert_p2);



/*fOR dRIVER*/


$vouc_type="Driver Return Advance For Trip".$_POST['refno'];

$trans=str_replace(' ','_',$tra["vechOwner"]);
 $trans=strtolower($trans);
$entries=$trans."entries";
$ent_items=$trans."entryitems";
$ledgers=$trans."ledgers";


$findnos =mysqli_query($conn,"SELECT * FROM `$entries` WHERE entrytype_id ='2' ORDER BY id DESC LIMIT 1; " );
$nos=mysqli_fetch_assoc($findnos);

$insert_hire = array(   
      "entrytype_id"      =>     mysqli_real_escape_string($data->con, '2'),
      "number"         =>     mysqli_real_escape_string($data->con, $nos['number']+1),
      "date"          =>     mysqli_real_escape_string($data->con, $newDate),  
      "dr_total"        =>     mysqli_real_escape_string($data->con, $_POST['return_adv']),
      "cr_total"      =>     mysqli_real_escape_string($data->con, $_POST['return_adv']),
      "narration"    =>     mysqli_real_escape_string($data->con, $vouc_type)
     
      );  
       $insstat = $data->insert($entries, $insert_hire);



$cparty_name =mysqli_query($conn,"SELECT * FROM `$ledgers` WHERE name ='Cash';" );
$cparty_id=mysqli_fetch_assoc($cparty_name);



$insert_p1= array(   
      "entry_id"      =>     mysqli_real_escape_string($data->con, $insstat),
      "ledger_id"         =>     mysqli_real_escape_string($data->con, $cparty_id['id']),
      "amount"          =>     mysqli_real_escape_string($data->con, $_POST['return_adv']),  
      "dc"        =>     mysqli_real_escape_string($data->con, 'C')
      );  


       $insst1 = $data->insert($ent_items, $insert_p1);

      


/*$driver =mysqli_query($conn,"SELECT * FROM drivers WHERE id ='".$_POST['loaddriver']."';" );
$dri=mysqli_fetch_assoc($driver);
*/


$dparty_name =mysqli_query($conn,"SELECT * FROM `$ledgers` WHERE name ='" .$dri['name']. "'; " );
$dparty_id=mysqli_fetch_assoc($dparty_name);

$insert_p2= array(   
      "entry_id"      =>     mysqli_real_escape_string($data->con, $insstat),
      "ledger_id"         =>     mysqli_real_escape_string($data->con, $dparty_id['id']),
      "amount"          =>     mysqli_real_escape_string($data->con, $_POST['return_adv']),  
      "dc"        =>     mysqli_real_escape_string($data->con, 'D')
      );  


       $insst2 = $data->insert($ent_items, $insert_p2);






}



$type="1";
$reason="Return Advance";
  $ins_driver_mgt = array(
        "intAdminId"       =>     mysqli_real_escape_string($data->con, $_SESSION['MintId']),
        "ent_date"         =>     mysqli_real_escape_string($data->con, $newDate),
        "driver_id"        =>     mysqli_real_escape_string($data->con, $dri_change),
        "amount"           =>     mysqli_real_escape_string($data->con, $_POST['return_adv']),
        "type"             =>     mysqli_real_escape_string($data->con, $type), 
        "tripid"           =>     mysqli_real_escape_string($data->con, $_POST['ret_tripid']),
        "reason"           =>     mysqli_real_escape_string($data->con, $reason)
      ); 
 $inshhaltid = $data->insert('driver_mgt', $ins_driver_mgt);






if($_POST['return_driver_cnge']!="")
{


$insert_stat = array(
        "intAdminId"       =>     mysqli_real_escape_string($data->con, $_SESSION['MintId']),
         "ent_date"        =>     mysqli_real_escape_string($data->con, $newDate),  
         "vechnum"         =>     mysqli_real_escape_string($data->con, $_POST['vechnum']),  
         "tripid"          =>     mysqli_real_escape_string($data->con, $_POST['ret_tripid']),
         "status"          =>     mysqli_real_escape_string($data->con, $_POST['loadtype']),
         "from_place"      =>     mysqli_real_escape_string($data->con, $_POST['rtn_from']), 
         "to_place"        =>     mysqli_real_escape_string($data->con, $_POST['rtnto']), 
         "driver"          =>     mysqli_real_escape_string($data->con, $_POST['return_driver_cnge'])

    );  
 $insstat = $data->insert('vechstat', $insert_stat);

$uid = array(
 "tripid"          =>     mysqli_real_escape_string($data->con, $_POST['ret_tripid'])

);

$driver_update = array(

"driver"   =>    mysqli_real_escape_string($data->con, $_POST['return_driver_cnge'])
);

 $insid = $data->update('load_return',$driver_update,$uid);





}else
{
     /*Driver Name Change */
$insert_stat = array(
        "intAdminId"       =>     mysqli_real_escape_string($data->con, $_SESSION['MintId']),
         "ent_date"        =>     mysqli_real_escape_string($data->con, $newDate),  
         "vechnum"         =>     mysqli_real_escape_string($data->con, $_POST['vechnum']),  
         "tripid"          =>     mysqli_real_escape_string($data->con, $_POST['ret_tripid']),
         "status"          =>     mysqli_real_escape_string($data->con, $_POST['loadtype']),
         "from_place"      =>     mysqli_real_escape_string($data->con, $_POST['rtn_from']), 
         "to_place"        =>     mysqli_real_escape_string($data->con, $_POST['rtnto']), 
         "driver"          =>     mysqli_real_escape_string($data->con, $_POST['return_driver'])

    );  
 $insstat = $data->insert('vechstat', $insert_stat);

}

 if($insstat){

        echo '<script> alert("Return Booked");window.location.assign("gcentry.php");</script>';
      } 
      else{
        echo '<script> alert("Error IN Return with Load");</script>';
      }




    }
 else if($_POST['loadtype']=="Returnemp" )
    {



if($_POST['ret_emp_change_driver']!="")
{

  $dri_change=$_POST['ret_emp_change_driver'];
}
else
{
$dri_change=$_POST['ret_emp_driver_h'];


}




      $ins_return = array(
        "intAdminId"       =>     mysqli_real_escape_string($data->con, $_SESSION['MintId']),
        "ent_date"         =>     mysqli_real_escape_string($data->con, $newDate),    
        "tripid"           =>     mysqli_real_escape_string($data->con, $_POST['ret_tripid']),
        "from_place"       =>     mysqli_real_escape_string($data->con, $_POST['ret_emp_from']), 
        "to_place"         =>     mysqli_real_escape_string($data->con, $_POST['ldtoe']), 
        "vechno"           =>     mysqli_real_escape_string($data->con, $_POST['vechnum']),
        "driver"           =>     mysqli_real_escape_string($data->con, $dri_change), 
        "driver_change"    =>     mysqli_real_escape_string($data->con, $_POST['ret_emp_change_driver']), 
         "adv_place"          =>     mysqli_real_escape_string($data->con, $_POST['return_emp_amt_place']),
       "return_adv"       =>     mysqli_real_escape_string($data->con, $_POST['ret_emp_adv'])
      ); 
 $insloadid = $data->insert('load_return', $ins_return);




$ins_main = array(
        "intAdminId"       =>     mysqli_real_escape_string($data->con, $_SESSION['MintId']),
        "ent_date"         =>     mysqli_real_escape_string($data->con, $newDate), 
        "tripid"           =>     mysqli_real_escape_string($data->con, $_POST['ret_tripid']),   
        "vechnum"          =>     mysqli_real_escape_string($data->con, $_POST['vechnum']),  
        "status"           =>     mysqli_real_escape_string($data->con, $_POST['loadtype']) 
        
      );  
 $insmainid = $data->insert('load_stat', $ins_main);



$type="1";
$reason="Return Advance";
  $ins_driver_mgt = array(
        "intAdminId"       =>     mysqli_real_escape_string($data->con, $_SESSION['MintId']),
        "ent_date"         =>     mysqli_real_escape_string($data->con, $newDate),
        "driver_id"        =>     mysqli_real_escape_string($data->con, $_POST['ret_emp_change_driver']),
        "amount"           =>     mysqli_real_escape_string($data->con, $_POST['ret_emp_adv']),
        "type"             =>     mysqli_real_escape_string($data->con, $type), 
        "tripid"           =>     mysqli_real_escape_string($data->con, $_POST['ret_tripid']),
        "reason"           =>     mysqli_real_escape_string($data->con, $reason)
      ); 
 $inshhaltid = $data->insert('driver_mgt', $ins_driver_mgt);





if($_POST['ret_emp_adv']!="")
{


$driver_nme =mysqli_query($conn,"SELECT * FROM drivers WHERE id ='$dri_change';" );
$dri=mysqli_fetch_assoc($driver_nme);

$transp =mysqli_query($conn,"SELECT * FROM vehicles WHERE vechNo ='".$_POST['vechnum']."';" );
$tra=mysqli_fetch_assoc($transp);





/*
For entry in Logistics Voucher*/


$vouc_type="Return Advance on Trip".$_POST['ret_tripid'];

$findnos =mysqli_query($conn,"SELECT * FROM entries WHERE entrytype_id ='2' ORDER BY id DESC LIMIT 1; " );
$nos=mysqli_fetch_assoc($findnos);

$insert_hire = array(   
      "entrytype_id"      =>     mysqli_real_escape_string($data->con, '2'),
      "number"         =>     mysqli_real_escape_string($data->con, $nos['number']+1),
      "date"          =>     mysqli_real_escape_string($data->con, $newDate),  
      "dr_total"        =>     mysqli_real_escape_string($data->con, $_POST['ret_emp_adv']),
      "cr_total"      =>     mysqli_real_escape_string($data->con, $_POST['ret_emp_adv']),
      "narration"    =>     mysqli_real_escape_string($data->con, $vouc_type)
     
      );  


       $insstat = $data->insert('entries', $insert_hire);



$cparty_name =mysqli_query($conn,"SELECT * FROM ledgers WHERE name ='" .$tra["vechOwner"]. "'; " );
$cparty_id=mysqli_fetch_assoc($cparty_name);




$insert_p1= array(   
      "entry_id"      =>     mysqli_real_escape_string($data->con, $insstat),
      "ledger_id"         =>     mysqli_real_escape_string($data->con, $cparty_id['id']),
      "amount"          =>     mysqli_real_escape_string($data->con, $_POST['ret_emp_adv']),  
      "dc"        =>     mysqli_real_escape_string($data->con, 'C')
      );  


       $insst1 = $data->insert('entryitems', $insert_p1);



$dparty_name =mysqli_query($conn,"SELECT * FROM ledgers WHERE name ='Cash'; " );
$dparty_id=mysqli_fetch_assoc($dparty_name);


$insert_p2= array(   
      "entry_id"      =>     mysqli_real_escape_string($data->con, $insstat),
      "ledger_id"         =>     mysqli_real_escape_string($data->con, $dparty_id['id']),
      "amount"          =>     mysqli_real_escape_string($data->con, $_POST['ret_emp_adv']),  
      "dc"        =>     mysqli_real_escape_string($data->con, 'D')
      );  


       $insst2 = $data->insert('entryitems', $insert_p2);





/*
On transporter Entry*/



$vouc_type="Trip Advance On".$_POST['ret_tripid']."Return";

$trans=str_replace(' ','_',$tra["vechOwner"]);
 $trans=strtolower($trans);
$entries=$trans."entries";
$ent_items=$trans."entryitems";
$ledgers=$trans."ledgers";


$findnos =mysqli_query($conn,"SELECT * FROM `$entries` WHERE entrytype_id ='1' ORDER BY id DESC LIMIT 1; " );
$nos=mysqli_fetch_assoc($findnos);

$insert_hire = array(   
      "entrytype_id"      =>     mysqli_real_escape_string($data->con, '1'),
      "number"         =>     mysqli_real_escape_string($data->con, $nos['number']+1),
      "date"          =>     mysqli_real_escape_string($data->con, $newDate),  
      "dr_total"        =>     mysqli_real_escape_string($data->con, $_POST['ret_emp_adv']),
      "cr_total"      =>     mysqli_real_escape_string($data->con, $_POST['ret_emp_adv']),
      "narration"    =>     mysqli_real_escape_string($data->con, $vouc_type)
     
      );  
       $insstat = $data->insert($entries, $insert_hire);


$comp =mysqli_query($conn,"SELECT * FROM load_det WHERE tripid ='".$_POST['ret_tripid']."';" );
$com=mysqli_fetch_assoc($comp);



$cparty_name =mysqli_query($conn,"SELECT * FROM `$ledgers` WHERE name ='" .$com['company']. "'; " );
$cparty_id=mysqli_fetch_assoc($cparty_name);



$insert_p1= array(   
      "entry_id"      =>     mysqli_real_escape_string($data->con, $insstat),
      "ledger_id"         =>     mysqli_real_escape_string($data->con, $cparty_id['id']),
      "amount"          =>     mysqli_real_escape_string($data->con, $_POST['ret_emp_adv']),  
      "dc"        =>     mysqli_real_escape_string($data->con, 'C')
      );  


       $insst1 = $data->insert($ent_items, $insert_p1);


$dparty_name =mysqli_query($conn,"SELECT * FROM `$ledgers` WHERE name ='Cash'; " );
$dparty_id=mysqli_fetch_assoc($dparty_name);

$insert_p2= array(   
      "entry_id"      =>     mysqli_real_escape_string($data->con, $insstat),
      "ledger_id"         =>     mysqli_real_escape_string($data->con, $dparty_id['id']),
      "amount"          =>     mysqli_real_escape_string($data->con, $_POST['ret_emp_adv']),  
      "dc"        =>     mysqli_real_escape_string($data->con, 'D')
      );  


       $insst2 = $data->insert($ent_items, $insert_p2);



/*fOR dRIVER*/


$vouc_type="Driver Return Advance For Trip".$_POST['ret_tripid'];

$trans=str_replace(' ','_',$tra["vechOwner"]);
 $trans=strtolower($trans);
$entries=$trans."entries";
$ent_items=$trans."entryitems";
$ledgers=$trans."ledgers";


$findnos =mysqli_query($conn,"SELECT * FROM `$entries` WHERE entrytype_id ='2' ORDER BY id DESC LIMIT 1; " );
$nos=mysqli_fetch_assoc($findnos);

$insert_hire = array(   
      "entrytype_id"      =>     mysqli_real_escape_string($data->con, '2'),
      "number"         =>     mysqli_real_escape_string($data->con, $nos['number']+1),
      "date"          =>     mysqli_real_escape_string($data->con, $newDate),  
      "dr_total"        =>     mysqli_real_escape_string($data->con, $_POST['ret_emp_adv']),
      "cr_total"      =>     mysqli_real_escape_string($data->con, $_POST['ret_emp_adv']),
      "narration"    =>     mysqli_real_escape_string($data->con, $vouc_type)
     
      );  
       $insstat = $data->insert($entries, $insert_hire);



$cparty_name =mysqli_query($conn,"SELECT * FROM `$ledgers` WHERE name ='Cash';" );
$cparty_id=mysqli_fetch_assoc($cparty_name);



$insert_p1= array(   
      "entry_id"      =>     mysqli_real_escape_string($data->con, $insstat),
      "ledger_id"         =>     mysqli_real_escape_string($data->con, $cparty_id['id']),
      "amount"          =>     mysqli_real_escape_string($data->con, $_POST['ret_emp_adv']),  
      "dc"        =>     mysqli_real_escape_string($data->con, 'C')
      );  


       $insst1 = $data->insert($ent_items, $insert_p1);

      


/*$driver =mysqli_query($conn,"SELECT * FROM drivers WHERE id ='".$_POST['loaddriver']."';" );
$dri=mysqli_fetch_assoc($driver);
*/


$dparty_name =mysqli_query($conn,"SELECT * FROM `$ledgers` WHERE name ='" .$dri['name']. "'; " );
$dparty_id=mysqli_fetch_assoc($dparty_name);

$insert_p2= array(   
      "entry_id"      =>     mysqli_real_escape_string($data->con, $insstat),
      "ledger_id"         =>     mysqli_real_escape_string($data->con, $dparty_id['id']),
      "amount"          =>     mysqli_real_escape_string($data->con, $_POST['ret_emp_adv']),  
      "dc"        =>     mysqli_real_escape_string($data->con, 'D')
      );  


       $insst2 = $data->insert($ent_items, $insert_p2);


}






if($_POST['ret_emp_change_driver']!="")
{


$insert_stat = array(
        "intAdminId"       =>     mysqli_real_escape_string($data->con, $_SESSION['MintId']),
         "ent_date"        =>     mysqli_real_escape_string($data->con, $newDate),  
         "vechnum"         =>     mysqli_real_escape_string($data->con, $_POST['vechnum']),  
         "tripid"          =>     mysqli_real_escape_string($data->con, $_POST['ret_tripid']),
         "status"          =>     mysqli_real_escape_string($data->con, $_POST['loadtype']),
         "from_place"      =>     mysqli_real_escape_string($data->con, $_POST['ret_emp_from']), 
         "to_place"        =>     mysqli_real_escape_string($data->con, $_POST['ldtoe']), 
         "driver"          =>     mysqli_real_escape_string($data->con, $_POST['ret_emp_change_driver'])

    );  
 $insstat = $data->insert('vechstat', $insert_stat);

$uid = array(
 "tripid"          =>     mysqli_real_escape_string($data->con, $_POST['ret_tripid'])

);

$driver_update = array(

"driver"   =>    mysqli_real_escape_string($data->con, $_POST['ret_emp_change_driver'])
);

 $insid = $data->update('load_return',$driver_update,$uid);








}else
{
     /*Driver Name Change */
$insert_stat = array(
        "intAdminId"       =>     mysqli_real_escape_string($data->con, $_SESSION['MintId']),
         "ent_date"        =>     mysqli_real_escape_string($data->con, $newDate),  
         "vechnum"         =>     mysqli_real_escape_string($data->con, $_POST['vechnum']),  
         "tripid"          =>     mysqli_real_escape_string($data->con, $_POST['ret_tripid']),
         "status"          =>     mysqli_real_escape_string($data->con, $_POST['loadtype']),
         "from_place"      =>     mysqli_real_escape_string($data->con, $_POST['rtn_from']), 
         "to_place"        =>     mysqli_real_escape_string($data->con, $_POST['rtnto']), 
         "driver"          =>     mysqli_real_escape_string($data->con, $_POST['ret_emp_driver_h'])

    );  
 $insstat = $data->insert('vechstat', $insert_stat);

}








 if($insstat){

        echo '<script> alert("Return Booked");window.location.assign("gcentry.php");</script>';
      } 
      else{
        echo '<script> alert("Error IN Return with Load");</script>';
      }




    }


else if($_POST['loadtype']=="Parking" )
{
if($_POST['praking_place']=="")
{
echo '<script> alert("Please Fill Out Fields ");window.location.assign("gcentry.php");</script>';

}

 $ins_parking = array(
        "intAdminId"       =>     mysqli_real_escape_string($data->con, $_SESSION['MintId']),
        "ent_date"         =>     mysqli_real_escape_string($data->con, $newDate),
        "status"           =>     mysqli_real_escape_string($data->con, $_POST['loadtype']),
        "from_place"       =>     mysqli_real_escape_string($data->con, $_POST['praking_place']), 
        "vechnum"          =>     mysqli_real_escape_string($data->con, $_POST['vechnum'])
      ); 
 $insparkingid = $data->insert('vechstat', $ins_parking);

if($insparkingid){

        echo '<script> alert("Parking Done");window.location.assign("gcentry.php");</script>';
      } 
      else{
        echo '<script> alert("Error IN Parking");</script>';
      }




}

else if($_POST['loadtype']=="HHalt" )
{

if($_POST['home_halt_place']=="")
{
echo '<script> alert("Please Fill Out Fields ");window.location.assign("gcentry.php");</script>';

}




 $insert_hhalt = array(
        "intAdminId"        =>     mysqli_real_escape_string($data->con, $_SESSION['MintId']),
        "ent_date"          =>     mysqli_real_escape_string($data->con, $newDate),
        "mkm_advance"       =>     mysqli_real_escape_string($data->con, $_POST['home_halt_mkm_advance']),
        "chn_adv"           =>     mysqli_real_escape_string($data->con, $_POST['home_halt_chn_advance']),
        "place"             =>     mysqli_real_escape_string($data->con, $_POST['home_halt_place']), 
        "driver"            =>     mysqli_real_escape_string($data->con, $_POST['home_halt_driver']),
        "vechno"            =>     mysqli_real_escape_string($data->con, $_POST['vechnum'])
      );  
 $inshhaltid = $data->insert('hhalt_entry', $insert_hhalt);








 $ins_hhalt = array(
        "intAdminId"       =>     mysqli_real_escape_string($data->con, $_SESSION['MintId']),
        "ent_date"         =>     mysqli_real_escape_string($data->con, $newDate),
        "status"           =>     mysqli_real_escape_string($data->con, $_POST['loadtype']),
        "from_place"       =>     mysqli_real_escape_string($data->con, $_POST['home_halt_place']), 
        "driver"           =>     mysqli_real_escape_string($data->con, $_POST['home_halt_driver']),
        "vechnum"          =>     mysqli_real_escape_string($data->con, $_POST['vechnum'])
      );  
 $inshhaltid = $data->insert('vechstat', $ins_hhalt);

if($_POST['home_halt_chn_advance']!=0)
{
$type="1";
$reason="Home Halt Advance Chennai";

 $ins_driver_mgt = array(
        "intAdminId"       =>     mysqli_real_escape_string($data->con, $_SESSION['MintId']),
        "ent_date"         =>     mysqli_real_escape_string($data->con, $newDate),
        "driver_id"        =>     mysqli_real_escape_string($data->con, $_POST['home_halt_driver']),
        "amount"           =>     mysqli_real_escape_string($data->con, $_POST['home_halt_chn_advance']),
        "type"             =>     mysqli_real_escape_string($data->con, $type), 
        "reason"           =>     mysqli_real_escape_string($data->con, $reason)
      ); 
 $inshhaltid = $data->insert('driver_mgt', $ins_driver_mgt);







}else if($_POST['home_halt_mkm_advance']!=0)
{



$type="1";
$reason="Home Halt Advance Madurathagam";

 $ins_driver_mgt = array(
        "intAdminId"       =>     mysqli_real_escape_string($data->con, $_SESSION['MintId']),
        "ent_date"         =>     mysqli_real_escape_string($data->con, $newDate),
        "driver_id"        =>     mysqli_real_escape_string($data->con, $_POST['home_halt_driver']),
        "amount"           =>     mysqli_real_escape_string($data->con, $_POST['home_halt_mkm_advance']),
        "type"             =>     mysqli_real_escape_string($data->con, $type), 
        "reason"           =>     mysqli_real_escape_string($data->con, $reason)
      ); 
 $inshhaltid = $data->insert('driver_mgt', $ins_driver_mgt);










}


$tot_adv=$_POST['home_halt_chn_advance']+$_POST['home_halt_mkm_advance'];




if($tot_adv!="")
{
$dri_change=$_POST['home_halt_driver'];

$driver_nme =mysqli_query($conn,"SELECT * FROM drivers WHERE id ='$dri_change';" );
$dri=mysqli_fetch_assoc($driver_nme);

$transp =mysqli_query($conn,"SELECT * FROM vehicles WHERE vechNo ='".$_POST['vechnum']."';" );
$tra=mysqli_fetch_assoc($transp);





/*
For entry in Logistics Voucher*/

if($_POST['home_halt_chn_advance']!=0&&$_POST['home_halt_mkm_advance']==0)
{

$vouc_type="Home Halt Advance on Chennai".$_POST['home_halt_chn_advance'];
}
elseif($_POST['home_halt_chn_advance']==0&&$_POST['home_halt_mkm_advance']!=0)
{
$vouc_type="Home Halt Advance on MKM".$_POST['home_halt_mkm_advance'];
}
else
{

$vouc_type="Home Halt Advance on Chennai".$_POST['home_halt_chn_advance']." and MKM".$_POST['home_halt_mkm_advance'];

}










$findnos =mysqli_query($conn,"SELECT * FROM entries WHERE entrytype_id ='2' ORDER BY id DESC LIMIT 1; " );
$nos=mysqli_fetch_assoc($findnos);

$insert_hire = array(   
      "entrytype_id"      =>     mysqli_real_escape_string($data->con, '2'),
      "number"         =>     mysqli_real_escape_string($data->con, $nos['number']+1),
      "date"          =>     mysqli_real_escape_string($data->con, $newDate),  
      "dr_total"        =>     mysqli_real_escape_string($data->con, $tot_adv),
      "cr_total"      =>     mysqli_real_escape_string($data->con, $tot_adv),
      "narration"    =>     mysqli_real_escape_string($data->con, $vouc_type)
     
      );  


       $insstat = $data->insert('entries', $insert_hire);



$cparty_name =mysqli_query($conn,"SELECT * FROM ledgers WHERE name ='" .$tra["vechOwner"]. "'; " );
$cparty_id=mysqli_fetch_assoc($cparty_name);




$insert_p1= array(   
      "entry_id"      =>     mysqli_real_escape_string($data->con, $insstat),
      "ledger_id"         =>     mysqli_real_escape_string($data->con, $cparty_id['id']),
      "amount"          =>     mysqli_real_escape_string($data->con, $tot_adv),  
      "dc"        =>     mysqli_real_escape_string($data->con, 'C')
      );  


       $insst1 = $data->insert('entryitems', $insert_p1);



$dparty_name =mysqli_query($conn,"SELECT * FROM ledgers WHERE name ='Cash'; " );
$dparty_id=mysqli_fetch_assoc($dparty_name);


$insert_p2= array(   
      "entry_id"      =>     mysqli_real_escape_string($data->con, $insstat),
      "ledger_id"         =>     mysqli_real_escape_string($data->con, $dparty_id['id']),
      "amount"          =>     mysqli_real_escape_string($data->con, $tot_adv),  
      "dc"        =>     mysqli_real_escape_string($data->con, 'D')
      );  


       $insst2 = $data->insert('entryitems', $insert_p2);





/*
On transporter Entry*/


if($_POST['home_halt_chn_advance']!=0&&$_POST['home_halt_mkm_advance']==0)
{

$vouc_type="Home Halt Advance on Chennai".$_POST['home_halt_chn_advance'];
}
elseif($_POST['home_halt_chn_advance']==0&&$_POST['home_halt_mkm_advance']!=0)
{
$vouc_type="Home Halt Advance on MKM".$_POST['home_halt_mkm_advance'];
}
else
{

$vouc_type="Home Halt Advance on Chennai".$_POST['home_halt_chn_advance']." and MKM".$_POST['home_halt_mkm_advance'];

}




$trans=str_replace(' ','_',$tra["vechOwner"]);
 $trans=strtolower($trans);
$entries=$trans."entries";
$ent_items=$trans."entryitems";
$ledgers=$trans."ledgers";


$findnos =mysqli_query($conn,"SELECT * FROM `$entries` WHERE entrytype_id ='1' ORDER BY id DESC LIMIT 1; " );
$nos=mysqli_fetch_assoc($findnos);

$insert_hire = array(   
      "entrytype_id"      =>     mysqli_real_escape_string($data->con, '1'),
      "number"         =>     mysqli_real_escape_string($data->con, $nos['number']+1),
      "date"          =>     mysqli_real_escape_string($data->con, $newDate),  
      "dr_total"        =>     mysqli_real_escape_string($data->con, $tot_adv),
      "cr_total"      =>     mysqli_real_escape_string($data->con, $tot_adv),
      "narration"    =>     mysqli_real_escape_string($data->con, $vouc_type)
     
      );  
       $insstat = $data->insert($entries, $insert_hire);

/*
$comp =mysqli_query($conn,"SELECT * FROM load_det WHERE tripid ='".$_POST['ret_tripid']."';" );
$com=mysqli_fetch_assoc($comp);*/



$cparty_name =mysqli_query($conn,"SELECT * FROM `$ledgers` WHERE name ='Ass Logistics'; " );
$cparty_id=mysqli_fetch_assoc($cparty_name);



$insert_p1= array(   
      "entry_id"      =>     mysqli_real_escape_string($data->con, $insstat),
      "ledger_id"         =>     mysqli_real_escape_string($data->con, $cparty_id['id']),
      "amount"          =>     mysqli_real_escape_string($data->con, $tot_adv),  
      "dc"        =>     mysqli_real_escape_string($data->con, 'C')
      );  


       $insst1 = $data->insert($ent_items, $insert_p1);


$dparty_name =mysqli_query($conn,"SELECT * FROM `$ledgers` WHERE name ='Cash'; " );
$dparty_id=mysqli_fetch_assoc($dparty_name);

$insert_p2= array(   
      "entry_id"      =>     mysqli_real_escape_string($data->con, $insstat),
      "ledger_id"         =>     mysqli_real_escape_string($data->con, $dparty_id['id']),
      "amount"          =>     mysqli_real_escape_string($data->con, $tot_adv),  
      "dc"        =>     mysqli_real_escape_string($data->con, 'D')
      );  


       $insst2 = $data->insert($ent_items, $insert_p2);



/*fOR dRIVER*/
if($_POST['home_halt_chn_advance']!=0&&$_POST['home_halt_mkm_advance']==0)
{

$vouc_type="Home Halt Advance on Chennai".$_POST['home_halt_chn_advance'];
}
elseif($_POST['home_halt_chn_advance']==0&&$_POST['home_halt_mkm_advance']!=0)
{
$vouc_type="Home Halt Advance on MKM".$_POST['home_halt_mkm_advance'];
}
else
{

$vouc_type="Home Halt Advance on Chennai".$_POST['home_halt_chn_advance']." and MKM".$_POST['home_halt_mkm_advance'];

}




$trans=str_replace(' ','_',$tra["vechOwner"]);
 $trans=strtolower($trans);
$entries=$trans."entries";
$ent_items=$trans."entryitems";
$ledgers=$trans."ledgers";


$findnos =mysqli_query($conn,"SELECT * FROM `$entries` WHERE entrytype_id ='2' ORDER BY id DESC LIMIT 1; " );
$nos=mysqli_fetch_assoc($findnos);

$insert_hire = array(   
      "entrytype_id"      =>     mysqli_real_escape_string($data->con, '2'),
      "number"         =>     mysqli_real_escape_string($data->con, $nos['number']+1),
      "date"          =>     mysqli_real_escape_string($data->con, $newDate),  
      "dr_total"        =>     mysqli_real_escape_string($data->con, $tot_adv),
      "cr_total"      =>     mysqli_real_escape_string($data->con, $tot_adv),
      "narration"    =>     mysqli_real_escape_string($data->con, $vouc_type)
     
      );  
       $insstat = $data->insert($entries, $insert_hire);



$cparty_name =mysqli_query($conn,"SELECT * FROM `$ledgers` WHERE name ='Cash';" );
$cparty_id=mysqli_fetch_assoc($cparty_name);



$insert_p1= array(   
      "entry_id"      =>     mysqli_real_escape_string($data->con, $insstat),
      "ledger_id"         =>     mysqli_real_escape_string($data->con, $cparty_id['id']),
      "amount"          =>     mysqli_real_escape_string($data->con, $tot_adv),  
      "dc"        =>     mysqli_real_escape_string($data->con, 'C')
      );  


       $insst1 = $data->insert($ent_items, $insert_p1);

      


/*$driver =mysqli_query($conn,"SELECT * FROM drivers WHERE id ='".$_POST['loaddriver']."';" );
$dri=mysqli_fetch_assoc($driver);
*/


$dparty_name =mysqli_query($conn,"SELECT * FROM `$ledgers` WHERE name ='" .$dri['name']. "'; " );
$dparty_id=mysqli_fetch_assoc($dparty_name);

$insert_p2= array(   
      "entry_id"      =>     mysqli_real_escape_string($data->con, $insstat),
      "ledger_id"         =>     mysqli_real_escape_string($data->con, $dparty_id['id']),
      "amount"          =>     mysqli_real_escape_string($data->con, $tot_adv),  
      "dc"        =>     mysqli_real_escape_string($data->con, 'D')
      );  


       $insst2 = $data->insert($ent_items, $insert_p2);


}











if($ins_hhalt){

        echo '<script> alert("Home Halt Entry Done");window.location.assign("gcentry.php");</script>';
      } 
      else{
        echo '<script> alert("Error IN HHalt");</script>';
      }




}
else if($_POST['loadtype']=="Accident" )
{
/*echo '<script>alert("'.$_POST['current_driver'].'");</script>';die;*/

if($_POST['accident_place']=="")
{
echo '<script> alert("Please Fill Out Fields ");window.location.assign("gcentry.php");</script>';

}



 $ins_accident = array(
        "intAdminId"       =>     mysqli_real_escape_string($data->con, $_SESSION['MintId']),
        "ent_date"         =>     mysqli_real_escape_string($data->con, $newDate),
        "status"           =>     mysqli_real_escape_string($data->con, $_POST['loadtype']),
        "tripid"           =>     mysqli_real_escape_string($data->con, $_POST['ret_tripid']),
        "from_place"       =>     mysqli_real_escape_string($data->con, $_POST['accident_place']), 
        "driver"           =>     mysqli_real_escape_string($data->con, $_POST['current_driver']), 
        "to_place"         =>     mysqli_real_escape_string($data->con, $_POST['workshop_place']), 
        "vechnum"          =>     mysqli_real_escape_string($data->con, $_POST['vechnum'])
      ); 
 $insparkingid = $data->insert('vechstat', $ins_accident);

if($insparkingid){

        echo '<script> alert("Accident Entry Done");window.location.assign("gcentry.php");</script>';
      } 
      else{
        echo '<script> alert("Error IN Accident Entry.");</script>';
      }




}
else if($_POST['loadtype']=="Halt" )
{
if($_POST['halt_place']=="")
{
echo '<script> alert("Please Fill Out Fields ");window.location.assign("gcentry.php");</script>';

}

$ins_main = array(
        "intAdminId"       =>     mysqli_real_escape_string($data->con, $_SESSION['MintId']),
        "ent_date"         =>     mysqli_real_escape_string($data->con, $newDate), 
        "tripid"           =>     mysqli_real_escape_string($data->con, $_POST['ret_tripid']),   
        "vechnum"          =>     mysqli_real_escape_string($data->con, $_POST['vechnum']),  
        "status"           =>     mysqli_real_escape_string($data->con, $_POST['loadtype']) 
        
      );  
 $insmainid = $data->insert('load_stat', $ins_main);




if($_POST['cge_driver']!="")

{  /*Driver Name Change */
       $ins_halt = array(
        "intAdminId"       =>     mysqli_real_escape_string($data->con, $_SESSION['MintId']),
        "ent_date"         =>     mysqli_real_escape_string($data->con, $newDate),    
        "tripid"           =>     mysqli_real_escape_string($data->con, $_POST['ret_tripid']),
        "vechnum"          =>     mysqli_real_escape_string($data->con, $_POST['vechnum']), 
        "place"            =>     mysqli_real_escape_string($data->con, $_POST['halt_place']),
        "cost"             =>     mysqli_real_escape_string($data->con, $_POST['halt_cost']),
        "driver"           =>     mysqli_real_escape_string($data->con, $_POST['cge_driver'])
      ); 
 $inshaltid = $data->insert('halt_entry', $ins_halt);

 $insert_stat = array(
        "intAdminId"       =>     mysqli_real_escape_string($data->con, $_SESSION['MintId']),
         "ent_date"        =>     mysqli_real_escape_string($data->con, $newDate),  
         "vechnum"         =>     mysqli_real_escape_string($data->con, $_POST['vechnum']),  
         "tripid"          =>     mysqli_real_escape_string($data->con, $_POST['ret_tripid']),
         "status"          =>     mysqli_real_escape_string($data->con, $_POST['loadtype']),  
         "from_place"      =>     mysqli_real_escape_string($data->con, $_POST['halt_place']), 
         "to_place"        =>     mysqli_real_escape_string($data->con, $_POST['halt_place']), 
         "driver"          =>     mysqli_real_escape_string($data->con, $_POST['cge_driver'])

    );  
 $insstat = $data->insert('vechstat', $insert_stat);
 
   $uid = array(
 "tripid"          =>     mysqli_real_escape_string($data->con, $_POST['ret_tripid'])

);

$driver_update = array(

"driver"   =>    mysqli_real_escape_string($data->con, $_POST['cge_driver'])
);

 $insid = $data->update('load_det',$driver_update,$uid);

 $driver_curr=$_POST['cge_driver'];

}else
{
   
 $ins_halt = array(
        "intAdminId"       =>     mysqli_real_escape_string($data->con, $_SESSION['MintId']),
        "ent_date"         =>     mysqli_real_escape_string($data->con, $newDate),    
        "tripid"            =>     mysqli_real_escape_string($data->con, $_POST['ret_tripid']),
        "vechnum"          =>     mysqli_real_escape_string($data->con, $_POST['vechnum']), 
        "place"            =>     mysqli_real_escape_string($data->con, $_POST['halt_place']), 
        "driver"           =>     mysqli_real_escape_string($data->con, $_POST['hltdriverh'])
      ); 
 $inshaltid = $data->insert('halt_entry', $ins_halt);



 $insert_stat = array(
        "intAdminId"       =>     mysqli_real_escape_string($data->con, $_SESSION['MintId']),
         "ent_date"        =>     mysqli_real_escape_string($data->con, $newDate),  
         "vechnum"         =>     mysqli_real_escape_string($data->con, $_POST['vechnum']),  
         "tripid"          =>     mysqli_real_escape_string($data->con, $_POST['ret_tripid']),
         "status"          =>     mysqli_real_escape_string($data->con, $_POST['loadtype']),
         "from_place"      =>     mysqli_real_escape_string($data->con, $_POST['halt_place']), 
         "to_place"        =>     mysqli_real_escape_string($data->con, $_POST['halt_place']), 
         "driver"          =>     mysqli_real_escape_string($data->con, $_POST['hltdriverh'])

    );  
 $insstat = $data->insert('vechstat', $insert_stat);

   
$driver_curr=$_POST['hltdriverh'];
}






if($inshaltid){

        echo '<script> alert("Halt Done");window.location.assign("gcentry.php");</script>';
      } 
      else{
        echo '<script> alert("Error IN Halt");</script>';
      }

}





/*ON ROAD INSERT*/
else if($_POST['loadtype']=="OnRoad" )
{
$ins_main = array(
        "intAdminId"       =>     mysqli_real_escape_string($data->con, $_SESSION['MintId']),
        "ent_date"         =>     mysqli_real_escape_string($data->con, $newDate), 
        "tripid"           =>     mysqli_real_escape_string($data->con, $_POST['ret_tripid']),   
        "vechnum"          =>     mysqli_real_escape_string($data->con, $_POST['vechnum']),  
        "status"           =>     mysqli_real_escape_string($data->con, $_POST['loadtype']) 
        
      );  
 $insmainid = $data->insert('load_stat', $ins_main);

if($_POST['ordcgename']!="")

{
       

 $insert_stat = array(
        "intAdminId"       =>     mysqli_real_escape_string($data->con, $_SESSION['MintId']),
         "ent_date"        =>     mysqli_real_escape_string($data->con, $newDate),  
         "vechnum"         =>     mysqli_real_escape_string($data->con, $_POST['vechnum']),  
         "tripid"          =>     mysqli_real_escape_string($data->con, $_POST['ret_tripid']),
         "status"          =>     mysqli_real_escape_string($data->con, $_POST['loadtype']),
         "from_place"      =>     mysqli_real_escape_string($data->con, $_POST['ordfromh']), 
         "to_place"        =>     mysqli_real_escape_string($data->con, $_POST['ordto']), 
         "driver"          =>     mysqli_real_escape_string($data->con, $_POST['ordcgename'])

    );  
 $insstat = $data->insert('vechstat', $insert_stat);
   
   $tripid = $_POST['ret_tripid'];
$result=mysqli_query($conn,"SELECT * FROM load_det WHERE tripid = '$tripid';" );
$dat = mysqli_fetch_assoc($result);
if($dat["from_place"]==$_POST['ordfromh'])
{

$uid = array(
 "tripid"          =>     mysqli_real_escape_string($data->con, $_POST['ret_tripid'])

);

$driver_update = array(

"driver"   =>    mysqli_real_escape_string($data->con, $_POST['ordcgename'])
);

 $insid = $data->update('load_det',$driver_update,$uid);




 $insert_onroad = array(
        "intAdminId"       =>     mysqli_real_escape_string($data->con, $_SESSION['MintId']),
         "ent_date"        =>     mysqli_real_escape_string($data->con, $newDate),  
         "vechnum"         =>     mysqli_real_escape_string($data->con, $_POST['vechnum']),  
         "tripid"          =>     mysqli_real_escape_string($data->con, $_POST['ret_tripid']),
         "amount"          =>     mysqli_real_escape_string($data->con, $_POST['on_road_adv']),
         "adv_place"          =>     mysqli_real_escape_string($data->con, $_POST['amt_place']),
         
         "from_place"      =>     mysqli_real_escape_string($data->con, $_POST['ordfromh']), 
         "to_place"        =>     mysqli_real_escape_string($data->con, $_POST['ordto']), 
         "driver"          =>     mysqli_real_escape_string($data->con, $_POST['ordcgename'])

    );  
 $insert_ord = $data->insert('onroad_details', $insert_onroad);









if(!empty($_POST['on_road_adv']))
{





$type="1";
$reason="OnRoad Advance";
  $ins_driver_mgt = array(
        "intAdminId"       =>     mysqli_real_escape_string($data->con, $_SESSION['MintId']),
        "ent_date"         =>     mysqli_real_escape_string($data->con, $newDate),
        "driver_id"        =>     mysqli_real_escape_string($data->con, $_POST['ordcgename']),
        "amount"           =>     mysqli_real_escape_string($data->con, $_POST['on_road_adv']),
        "type"             =>     mysqli_real_escape_string($data->con, $type), 
        "tripid"           =>     mysqli_real_escape_string($data->con, $_POST['ret_tripid']),
        "reason"           =>     mysqli_real_escape_string($data->con, $reason)
      ); 
 $inshhaltid = $data->insert('driver_mgt', $ins_driver_mgt);


}

}
else
{


$uid = array(
 "tripid"          =>     mysqli_real_escape_string($data->con, $_POST['ret_tripid'])

);

$driver_update = array(

"driver"   =>    mysqli_real_escape_string($data->con, $_POST['ordcgename'])
);

 $insid = $data->update('load_return',$driver_update,$uid);


 $insert_onroad = array(
        "intAdminId"       =>     mysqli_real_escape_string($data->con, $_SESSION['MintId']),
         "ent_date"        =>     mysqli_real_escape_string($data->con, $newDate),  
         "vechnum"         =>     mysqli_real_escape_string($data->con, $_POST['vechnum']),  
         "tripid"          =>     mysqli_real_escape_string($data->con, $_POST['ret_tripid']),
         "amount"          =>     mysqli_real_escape_string($data->con, $_POST['on_road_adv']),
         "from_place"      =>     mysqli_real_escape_string($data->con, $_POST['ordfromh']), 
         "to_place"        =>     mysqli_real_escape_string($data->con, $_POST['ordto']), 
         "driver"          =>     mysqli_real_escape_string($data->con, $_POST['ordcgename'])

    );  
 $insstat = $data->insert('onroad_details', $insert_onroad);


if(!empty($_POST['on_road_adv']))
{





$type="1";
$reason="OnRoad Advance";
  $ins_driver_mgt = array(
        "intAdminId"       =>     mysqli_real_escape_string($data->con, $_SESSION['MintId']),
        "ent_date"         =>     mysqli_real_escape_string($data->con, $newDate),
        "driver_id"        =>     mysqli_real_escape_string($data->con, $_POST['ordcgename']),
        "amount"           =>     mysqli_real_escape_string($data->con, $_POST['on_road_adv']),
        "type"             =>     mysqli_real_escape_string($data->con, $type), 
        "tripid"           =>     mysqli_real_escape_string($data->con, $_POST['ret_tripid']),
        "reason"           =>     mysqli_real_escape_string($data->con, $reason)
      ); 
 $inshhaltid = $data->insert('driver_mgt', $ins_driver_mgt);






}
$curr_driver=$_POST['ordcgename'];

}



}else
{
     /*Driver Name Change */




 $insert_stat = array(
        "intAdminId"       =>     mysqli_real_escape_string($data->con, $_SESSION['MintId']),
         "ent_date"        =>     mysqli_real_escape_string($data->con, $newDate),  
         "vechnum"         =>     mysqli_real_escape_string($data->con, $_POST['vechnum']),  
         "tripid"          =>     mysqli_real_escape_string($data->con, $_POST['ret_tripid']),
         "status"          =>     mysqli_real_escape_string($data->con, $_POST['loadtype']),
         "from_place"      =>     mysqli_real_escape_string($data->con, $_POST['ordfromh']), 
         "to_place"        =>     mysqli_real_escape_string($data->con, $_POST['ordto']), 
         "driver"          =>     mysqli_real_escape_string($data->con, $_POST['orddriverh'])

    );  
 $insstat = $data->insert('vechstat', $insert_stat);


    $insert_onroad = array(
        "intAdminId"       =>     mysqli_real_escape_string($data->con, $_SESSION['MintId']),
         "ent_date"        =>     mysqli_real_escape_string($data->con, $newDate),  
         "vechnum"         =>     mysqli_real_escape_string($data->con, $_POST['vechnum']),  
         "tripid"          =>     mysqli_real_escape_string($data->con, $_POST['ret_tripid']),
         "amount"          =>     mysqli_real_escape_string($data->con, $_POST['on_road_adv']),
         "from_place"      =>     mysqli_real_escape_string($data->con, $_POST['ordfromh']), 
         "to_place"        =>     mysqli_real_escape_string($data->con, $_POST['ordto']), 
         "driver"          =>     mysqli_real_escape_string($data->con, $_POST['orddriverh'])

    );  
 $insstat = $data->insert('onroad_details', $insert_onroad);
 

if(!empty($_POST['on_road_adv']))
{




$type="1";
$reason="OnRoad Advance";
  $ins_driver_mgt = array(
        "intAdminId"       =>     mysqli_real_escape_string($data->con, $_SESSION['MintId']),
        "ent_date"         =>     mysqli_real_escape_string($data->con, $newDate),
        "driver_id"        =>     mysqli_real_escape_string($data->con, $_POST['orddriverh']),
        "amount"           =>     mysqli_real_escape_string($data->con, $_POST['on_road_adv']),
        "type"             =>     mysqli_real_escape_string($data->con, $type), 
        "tripid"           =>     mysqli_real_escape_string($data->con, $_POST['ret_tripid']),
        "reason"           =>     mysqli_real_escape_string($data->con, $reason)
      ); 
 $inshhaltid = $data->insert('driver_mgt', $ins_driver_mgt);
}

$curr_driver=$_POST['orddriverh'];

}






if(!empty($_POST['on_road_adv']))
{


  /*
For entry in Logistics Voucher*/








$driver_nme =mysqli_query($conn,"SELECT * FROM drivers WHERE id ='$curr_driver';" );
$dri=mysqli_fetch_assoc($driver_nme);

$transp =mysqli_query($conn,"SELECT * FROM vehicles WHERE vechNo ='".$_POST['vechnum']."';" );
$tra=mysqli_fetch_assoc($transp);



$vouc_type="On Road Advance on Trip".$_POST['ret_tripid'];

$findnos =mysqli_query($conn,"SELECT * FROM entries WHERE entrytype_id ='2' ORDER BY id DESC LIMIT 1; " );
$nos=mysqli_fetch_assoc($findnos);

$insert_hire = array(   
      "entrytype_id"      =>     mysqli_real_escape_string($data->con, '2'),
      "number"         =>     mysqli_real_escape_string($data->con, $nos['number']+1),
      "date"          =>     mysqli_real_escape_string($data->con, $newDate),  
      "dr_total"        =>     mysqli_real_escape_string($data->con, $_POST['on_road_adv']),
      "cr_total"      =>     mysqli_real_escape_string($data->con, $_POST['on_road_adv']),
      "narration"    =>     mysqli_real_escape_string($data->con, $vouc_type)
     
      );  


       $insstat = $data->insert('entries', $insert_hire);



$cparty_name =mysqli_query($conn,"SELECT * FROM ledgers WHERE name ='" .$tra["vechOwner"]. "'; " );
$cparty_id=mysqli_fetch_assoc($cparty_name);
    

echo '<script>alert("'.$tra["vechOwner"].'"); </script>';




$insert_p1= array(   
      "entry_id"      =>     mysqli_real_escape_string($data->con, $insstat),
      "ledger_id"         =>     mysqli_real_escape_string($data->con, $cparty_id['id']),
      "amount"          =>     mysqli_real_escape_string($data->con, $_POST['on_road_adv']),  
      "dc"        =>     mysqli_real_escape_string($data->con, 'C')
      );  


       $insst1 = $data->insert('entryitems', $insert_p1);



$dparty_name =mysqli_query($conn,"SELECT * FROM ledgers WHERE name ='Cash'; " );
$dparty_id=mysqli_fetch_assoc($dparty_name);


$insert_p2= array(   
      "entry_id"      =>     mysqli_real_escape_string($data->con, $insstat),
      "ledger_id"         =>     mysqli_real_escape_string($data->con, $dparty_id['id']),
      "amount"          =>     mysqli_real_escape_string($data->con, $_POST['on_road_adv']),  
      "dc"        =>     mysqli_real_escape_string($data->con, 'D')
      );  


       $insst2 = $data->insert('entryitems', $insert_p2);


/*For Transporter Entry*/




$vouc_type="On Road Advance For Trip".$_POST['ret_tripid'];

$trans=str_replace(' ','_',$tra["vechOwner"]);
 $trans=strtolower($trans);
$entries=$trans."entries";
$ent_items=$trans."entryitems";
$ledgers=$trans."ledgers";


$findnos =mysqli_query($conn,"SELECT * FROM `$entries` WHERE entrytype_id ='1' ORDER BY id DESC LIMIT 1; " );
$nos=mysqli_fetch_assoc($findnos);

$insert_hire = array(   
      "entrytype_id"      =>     mysqli_real_escape_string($data->con, '1'),
      "number"         =>     mysqli_real_escape_string($data->con, $nos['number']+1),
      "date"          =>     mysqli_real_escape_string($data->con, $newDate),  
      "dr_total"        =>     mysqli_real_escape_string($data->con, $_POST['on_road_adv']),
      "cr_total"      =>     mysqli_real_escape_string($data->con, $_POST['on_road_adv']),
      "narration"    =>     mysqli_real_escape_string($data->con, $vouc_type)
     
      );  
       $insstat = $data->insert($entries, $insert_hire);

$comp =mysqli_query($conn,"SELECT * FROM load_det WHERE tripid ='".$_POST['ret_tripid']."';" );
$com=mysqli_fetch_assoc($comp);

echo '<script>alert("'.$com['company'].'"); </script>';

$cparty_name =mysqli_query($conn,"SELECT * FROM `$ledgers` WHERE name ='" .$com['company']. "'; " );
$cparty_id=mysqli_fetch_assoc($cparty_name);



$insert_p1= array(   
      "entry_id"      =>     mysqli_real_escape_string($data->con, $insstat),
      "ledger_id"         =>     mysqli_real_escape_string($data->con, $cparty_id['id']),
      "amount"          =>     mysqli_real_escape_string($data->con, $_POST['on_road_adv']),  
      "dc"        =>     mysqli_real_escape_string($data->con, 'C')
      );  


       $insst1 = $data->insert($ent_items, $insert_p1);


$dparty_name =mysqli_query($conn,"SELECT * FROM `$ledgers` WHERE name ='Cash'; " );
$dparty_id=mysqli_fetch_assoc($dparty_name);

$insert_p2= array(   
      "entry_id"      =>     mysqli_real_escape_string($data->con, $insstat),
      "ledger_id"         =>     mysqli_real_escape_string($data->con, $dparty_id['id']),
      "amount"          =>     mysqli_real_escape_string($data->con, $_POST['on_road_adv']),  
      "dc"        =>     mysqli_real_escape_string($data->con, 'D')
      );  


       $insst2 = $data->insert($ent_items, $insert_p2);



/*fOR dRIVER*/


$vouc_type="Onroad Driver Advance For Trip".$_POST['ret_tripid'];

$trans=str_replace(' ','_',$tra["vechOwner"]);
 $trans=strtolower($trans);
$entries=$trans."entries";
$ent_items=$trans."entryitems";
$ledgers=$trans."ledgers";


$findnos =mysqli_query($conn,"SELECT * FROM `$entries` WHERE entrytype_id ='2' ORDER BY id DESC LIMIT 1; " );
$nos=mysqli_fetch_assoc($findnos);

$insert_hire = array(   
      "entrytype_id"      =>     mysqli_real_escape_string($data->con, '2'),
      "number"         =>     mysqli_real_escape_string($data->con, $nos['number']+1),
      "date"          =>     mysqli_real_escape_string($data->con, $newDate),  
      "dr_total"        =>     mysqli_real_escape_string($data->con, $_POST['on_road_adv']),
      "cr_total"      =>     mysqli_real_escape_string($data->con, $_POST['on_road_adv']),
      "narration"    =>     mysqli_real_escape_string($data->con, $vouc_type)
     
      );  
       $insstat = $data->insert($entries, $insert_hire);



$cparty_name =mysqli_query($conn,"SELECT * FROM `$ledgers` WHERE name ='Cash';" );
$cparty_id=mysqli_fetch_assoc($cparty_name);



$insert_p1= array(   
      "entry_id"      =>     mysqli_real_escape_string($data->con, $insstat),
      "ledger_id"         =>     mysqli_real_escape_string($data->con, $cparty_id['id']),
      "amount"          =>     mysqli_real_escape_string($data->con, $_POST['on_road_adv']),  
      "dc"        =>     mysqli_real_escape_string($data->con, 'C')
      );  


       $insst1 = $data->insert($ent_items, $insert_p1);

      

/*
$driver =mysqli_query($conn,"SELECT * FROM drivers WHERE id ='".$dri['name']."';" );
$dri=mysqli_fetch_assoc($driver);*/



$dparty_name =mysqli_query($conn,"SELECT * FROM `$ledgers` WHERE name ='" .$dri['name']. "'; " );
$dparty_id=mysqli_fetch_assoc($dparty_name);

$insert_p2= array(   
      "entry_id"      =>     mysqli_real_escape_string($data->con, $insstat),
      "ledger_id"         =>     mysqli_real_escape_string($data->con, $dparty_id['id']),
      "amount"          =>     mysqli_real_escape_string($data->con, $_POST['on_road_adv']),  
      "dc"        =>     mysqli_real_escape_string($data->con, 'D')
      );  


       $insst2 = $data->insert($ent_items, $insert_p2);






}







if($insstat){

        echo '<script> alert("On Road DOne");window.location.assign("gcentry.php");</script>';
      } 
      else{
        echo '<script> alert("Error IN On Road");</script>';
      }

}







    else if($_POST['loadtype']=="" )
    {


             /*-----------------------------------Hire Back End--------------------------------------------*//*  */


if($_POST['hire_load_trans']&&$_POST['hire_load_party_name']=="")
{
echo '<script> alert("Please Fill Out Fields ");window.location.assign("gcentry.php");</script>';

}




$hire_load = array(
        "intAdminId"       =>     mysqli_real_escape_string($data->con, $_SESSION['MintId']),
        "ent_date"         =>     mysqli_real_escape_string($data->con, $newDate), 
        "vechno"           =>     mysqli_real_escape_string($data->con, $_POST['hire_load_vech_no']),   
        "from_place"       =>     mysqli_real_escape_string($data->con, $_POST['hire_load_from']), 
        "to_place"         =>     mysqli_real_escape_string($data->con, $_POST['hire_load_to']), 
        "transporter"      =>     mysqli_real_escape_string($data->con, $_POST['hire_load_trans']), 
        "driver"           =>     mysqli_real_escape_string($data->con, $_POST['hire_load_driver']), 
        "party_name"       =>     mysqli_real_escape_string($data->con, $_POST['hire_load_party_name']), 
        "party_gc"         =>     mysqli_real_escape_string($data->con, $_POST['hire_load_gc']), 
        "ref_no"           =>     mysqli_real_escape_string($data->con, $_POST['hire_load_ref']),
        "cont_no"          =>     mysqli_real_escape_string($data->con, $_POST['hire_load_cont_no']),  
        "contsize"         =>     mysqli_real_escape_string($data->con, $_POST['hire_load_cont_size']), 
        "cont_wt"          =>     mysqli_real_escape_string($data->con, $_POST['hire_load_cont_wt']),
        "load_type"        =>     mysqli_real_escape_string($data->con, $_POST['hire_load_cont_type']), 
        "sealno"           =>     mysqli_real_escape_string($data->con, $_POST['hire_load_sealno']), 
        "remarks"          =>     mysqli_real_escape_string($data->con, $_POST['hire_load_remarks']) 
      ); 
 $hire_loadid = $data->insert('hire_load', $hire_load);





 $hire_freight = array(
        "intAdminId"                  =>     mysqli_real_escape_string($data->con, $_SESSION['MintId']),
        "hire_id"                     =>     mysqli_real_escape_string($data->con,$hire_loadid),
        "amount"                      =>     mysqli_real_escape_string($data->con, $_POST['hire_friet_amt']),    
        "loading_charge"              =>     mysqli_real_escape_string($data->con, $_POST['hire_friet_load_crgs']),
        "unloading_charge"            =>     mysqli_real_escape_string($data->con, $_POST['hire_friet_unload_crgs']),    
        "weight_bill_charge"          =>     mysqli_real_escape_string($data->con, $_POST['hire_friet_weigh_crgs ']), 
        "others_amount"               =>     mysqli_real_escape_string($data->con, $_POST['hire_friet_other_crgs']), 
        "others_description"          =>     mysqli_real_escape_string($data->con, $_POST['hire_friet_other_desc']), 
        "halt_days"                   =>     mysqli_real_escape_string($data->con, $_POST['hire_friet_halt_days']),
        "halt_rate"                   =>     mysqli_real_escape_string($data->con, $_POST['hire_friet_halt_rate']),  
        "halt_amount"                 =>     mysqli_real_escape_string($data->con, $_POST['hire_friet_halt_amount']), 
        "total_freight"               =>     mysqli_real_escape_string($data->con, $_POST['hire_friet_amount']), 
        "advance_cash_amount"         =>     mysqli_real_escape_string($data->con, $_POST['hire_friet_adv_cash']), 
        "adv_cash_date"               =>     mysqli_real_escape_string($data->con, $_POST['hire_friet_adv_cash_date']), 
        "advance_cheque_amount"       =>     mysqli_real_escape_string($data->con, $_POST['hire_friet_adv_cque_amt']), 
        "adv_cque_date"               =>     mysqli_real_escape_string($data->con, $_POST['hire_friet_adv_cque_date']),    
        "bank"                        =>     mysqli_real_escape_string($data->con, $_POST['hire_friet_adv_cque_bank']),  
        "cheque_no"                   =>     mysqli_real_escape_string($data->con, $_POST['hire_friet_adv_cque_num']), 
        "balance"                     =>     mysqli_real_escape_string($data->con, $_POST['hire_friet_bal'])
        /*"diedte"           =>     mysqli_real_escape_string($data->con, $_POST['dieseldate']),
        "dievendor"        =>     mysqli_real_escape_string($data->con, $_POST['vendor']),  
        "diepaytype"       =>     mysqli_real_escape_string($data->con, $_POST['diepay']), 
        "dieqty"           =>     mysqli_real_escape_string($data->con, $_POST['dieqty']), 
        "dieppl"           =>     mysqli_real_escape_string($data->con, $_POST['diepplh']), 
        "dieamt"           =>     mysqli_real_escape_string($data->con, $_POST['dieamt'])*/
      ); 
      $hire_freight = $data->insert('hire_freight', $hire_freight);


 $hire_hire = array(
        "intAdminId"                     =>     mysqli_real_escape_string($data->con, $_SESSION['MintId']),
        "hire_id"                        =>     mysqli_real_escape_string($data->con,$hire_loadid),
        "hire_amount"                    =>     mysqli_real_escape_string($data->con, $_POST['hire_form_amt']),    
        "loading_charge"                 =>     mysqli_real_escape_string($data->con, $_POST['hire_form_load_crgs']), 
        "unloading_charge"               =>     mysqli_real_escape_string($data->con, $_POST['hire_form_unload_crgs']), 
        "weight_bill_charge"             =>     mysqli_real_escape_string($data->con, $_POST['hire_form_weigh_crgs']),
        "other_description"              =>     mysqli_real_escape_string($data->con, $_POST['hire_form_otr_desc']),  
        "other_amount"                   =>     mysqli_real_escape_string($data->con, $_POST['hire_form_otr_amt']), 
        "halt_days"                      =>     mysqli_real_escape_string($data->con, $_POST['hire_form_halt_days']), 
        "halt_rate"                      =>     mysqli_real_escape_string($data->con, $_POST['hire_form_halt_rate']), 
        "halt_amount"                    =>     mysqli_real_escape_string($data->con, $_POST['hire_form_halt_amt']), 
        "total_hire"                     =>     mysqli_real_escape_string($data->con, $_POST['hire_form_frt_amt']), 
        "chn_advance"                    =>     mysqli_real_escape_string($data->con, $_POST['hire_form_chn_adv']),    
        "bank"                           =>     mysqli_real_escape_string($data->con, $_POST['hire_form_chn_bank']), 
        "cheque_no"                      =>     mysqli_real_escape_string($data->con, $_POST['hire_form_chn_cque']), 
        "mkm_adv"                        =>     mysqli_real_escape_string($data->con, $_POST['hire_form_mkm_adv']),
        "mkm_bank"                       =>     mysqli_real_escape_string($data->con, $_POST['hire_form_mkm_bank']),  
        "mkm_cque_no"                    =>     mysqli_real_escape_string($data->con, $_POST['hire_form_mkm_cque']), 
        "total_cash_advance"             =>     mysqli_real_escape_string($data->con, $_POST['hire_form_adv_amt']), 
        "total_diesel_advance"           =>     mysqli_real_escape_string($data->con, $_POST['hire_form_adv_diesel']), 
        "total_diesel_quantity"          =>     mysqli_real_escape_string($data->con, $_POST['hire_form_diesel_qty']),
        "hire_balance"                   =>     mysqli_real_escape_string($data->con, $_POST['hire_form_bal'])
      );  
      $hire_hireid = $data->insert('hire_hire', $hire_hire);









if(!empty($_POST['hire_friet_adv_cash']))
{


$vouc_type="Advance Payment on Trip";

$findnos =mysqli_query($conn,"SELECT * FROM entries WHERE entrytype_id ='1' ORDER BY id DESC LIMIT 1; " );
$nos=mysqli_fetch_assoc($findnos);





$insert_hire = array(   
      "entrytype_id"      =>     mysqli_real_escape_string($data->con,'1' ),
      "number"         =>     mysqli_real_escape_string($data->con, $nos['number']+1),
      "date"          =>     mysqli_real_escape_string($data->con, $newDate),  
      "dr_total"        =>     mysqli_real_escape_string($data->con, $_POST['hire_friet_adv_cash']),
      "cr_total"      =>     mysqli_real_escape_string($data->con, $_POST['hire_friet_adv_cash']),
      "narration"    =>     mysqli_real_escape_string($data->con, $vouc_type)
     
      );  


       $insstat = $data->insert('entries', $insert_hire);



/*

$cparty_name =mysqli_query($conn,"SELECT * FROM customer WHERE name ='" .$_POST["frt_adv_cqe_bnk"]. "'; " );
$cparty_id=mysqli_fetch_assoc($cparty_name);*/



$insert_p1= array(   
      "entry_id"      =>     mysqli_real_escape_string($data->con, $insstat),
      "ledger_id"         =>     mysqli_real_escape_string($data->con, $_POST["hire_friet_adv_cque_bank"]),
      "amount"          =>     mysqli_real_escape_string($data->con, $_POST['hire_friet_adv_cash']),  
      "dc"        =>     mysqli_real_escape_string($data->con, 'C')
      );  


       $insst1 = $data->insert('entryitems', $insert_p1);

$dparty_name =mysqli_query($conn,"SELECT * FROM ledgers WHERE name ='" .$_POST["hire_load_party_name"]. "'; " );
$dparty_id=mysqli_fetch_assoc($dparty_name);

$insert_p2= array(   
      "entry_id"      =>     mysqli_real_escape_string($data->con, $insstat),
      "ledger_id"         =>     mysqli_real_escape_string($data->con, $dparty_id['id']),
      "amount"          =>     mysqli_real_escape_string($data->con, $_POST['hire_friet_adv_cash']),  
      "dc"        =>     mysqli_real_escape_string($data->con, 'D')
      );  


       $insst2 = $data->insert('entryitems', $insert_p2);


}





$reason="Load Advance";

if(!empty($_POST['hire_form_adv_amt']))
{




$vouc_type="Trip Advance";

$findnos =mysqli_query($conn,"SELECT * FROM entries WHERE entrytype_id ='2' ORDER BY id DESC LIMIT 1; " );
$nos=mysqli_fetch_assoc($findnos);

$insert_hire = array(   
      "entrytype_id"      =>     mysqli_real_escape_string($data->con, '2'),
      "number"         =>     mysqli_real_escape_string($data->con, $nos['number']+1),
      "date"          =>     mysqli_real_escape_string($data->con, $newDate),  
      "dr_total"        =>     mysqli_real_escape_string($data->con, $_POST['hire_form_adv_amt']),
      "cr_total"      =>     mysqli_real_escape_string($data->con, $_POST['hire_form_adv_amt']),
      "narration"    =>     mysqli_real_escape_string($data->con, $vouc_type)
     
      );  


       $insstat = $data->insert('entries', $insert_hire);



$cparty_name =mysqli_query($conn,"SELECT * FROM ledgers WHERE name ='" .$_POST["hire_load_trans"]. "'; " );
$cparty_id=mysqli_fetch_assoc($cparty_name);



$insert_p1= array(   
      "entry_id"      =>     mysqli_real_escape_string($data->con, $insstat),
      "ledger_id"         =>     mysqli_real_escape_string($data->con, $cparty_id['id']),
      "amount"          =>     mysqli_real_escape_string($data->con, $_POST['hire_form_adv_amt']),  
      "dc"        =>     mysqli_real_escape_string($data->con, 'C')
      );  


       $insst1 = $data->insert('entryitems', $insert_p1);



$insert_p2= array(   
      "entry_id"      =>     mysqli_real_escape_string($data->con, $insstat),
      "ledger_id"     =>     mysqli_real_escape_string($data->con, $_POST['hire_form_mkm_bank']),
      "amount"        =>     mysqli_real_escape_string($data->con, $_POST['hire_form_adv_amt']),  
      "dc"            =>     mysqli_real_escape_string($data->con, 'D')
      );  


       $insst2 = $data->insert('entryitems', $insert_p2);




}












 if($hire_hireid){

        echo '<script> alert("Hire Added Successfully");window.location.assign("gcentry.php");</script>';
      } 
      else{
        echo '<script> alert("Error IN hIRE");</script>';
      }

    } }



    else
    {





/*else
    {*/

      /*Update Part*/
     /* $insert_gc = array(
        "intAdminId"      =>    mysqli_real_escape_string($data->con, $_SESSION['MintId']),    
        "date"            =>     mysqli_real_escape_string($data->con, $newDate),  
        "status"          =>     mysqli_real_escape_string($data->con, $_POST['loadtype']), 
        "drivername"      =>     mysqli_real_escape_string($data->con, $_POST['drivernme']), 
        "cdrivername"     =>     mysqli_real_escape_string($data->con, $_POST['cgedrivernme']),
        "madvance"        =>     mysqli_real_escape_string($data->con, $_POST['madv']),  
        "diesel"          =>     mysqli_real_escape_string($data->con, $_POST['mdiesel']), 
        "vechNo"          =>     mysqli_real_escape_string($data->con, $_POST['vechno']), 
        "workshop"        =>     mysqli_real_escape_string($data->con, $_POST['wshop']), 
        "mfrom"           =>     mysqli_real_escape_string($data->con, $_POST['mfrom']), 
        "mto"             =>     mysqli_real_escape_string($data->con, $_POST['mto']) 
      );  
      $insid = $data->insert('gcentries', $insert_gc);
      


      if($insid){

        echo '<script> alert("GC Entry Edition Done Successfully");window.location.assign("gcentry.php");</script>';
      } 
      else{
        echo '<script> alert("Error");</script>';
      }}*/
/*
      $id =$_REQUEST['id'];
      $update_id = array(
        "id"      =>    mysqli_real_escape_string($data->con, $id)
      );

      $insid = $data->update('customer', $update_cust, $update_id);
      if($insid){

        echo '<script> alert("Customer Altered Successfully");window.location.assign("viewconsigner.php");</script>';
      } 
      else{
        echo '<script> alert("Error in Updating");</script>';
      }*/

    }


  }

  if($_REQUEST['flag'] == "Edit"){
   $id =$_REQUEST['id'];

   $update_id = array(
    "id"      =>    mysqli_real_escape_string($data->con, $id)
  );

   $insid = $data->select_where('customer', $update_id);
 }

 ?> 









 <div class="am-mainpanel">
  <div class="am-pagetitle">
    <h5 class="am-title">GC Entry</h5>


    <!-- search-bar -->
  </div>
  <!-- am-pagetitle -->
  <form name="gcform" id="gcform" class="search-bar"  method="POST" action="">
    <div class="am-pagebody" >
     <div class="card pd-20 form-layout form-layout-4">
       <div class="row row-sm ">
        <div class="col-xl-6">

          <div class="portlet-body">
            <h6 class="card-body-title">Gc Entry</h6>
            <div class="row mg-t-10">
             <label class="col-md-4 form-control-label">Date </label>
             <div class="col-sm-8 mg-t-10 mg-sm-b-10 ">
               <div class="input-group">
                <span class="input-group-addon"><i class="icon ion-calendar tx-16 lh-0 op-6"></i></span>
                <input class="form-control datepicker" placeholder="Entry date" name="mdate" id="myVariable" type="text" value="<?php echo date('d/m/Y');?>" onchange="changedte(this.value);"    >
              </div>
            </div>
          </div>

<script>
$(function() {
    $( "#myVariable" ).datepicker({ minDate: 0});
  });

</script>





          <div class="row mg-t-10">
           <label class="col-md-4 form-control-label"> Vehicle Number </label>

           <div class="col-sm-4 mg-t-10 mg-sm-b-10">
             <select onChange="getstate(this.value);" name="vechnum" id="mVechno" class="form-control" >

              <option value="">Select </option>
              <?php $query =mysqli_query($conn,"SELECT * FROM vehicles");
              while($row=mysqli_fetch_array($query))
                { ?>
                  <option value="<?php echo $row['vechNo'];?>" <?php if($row['vechNo']==$insid[0]['state']) echo 'selected="selected"'; ?> ><?php echo $row['vechNo'];?></option>
                  <?php
                }
                ?>
              </select>
              <span class="field-validation-valid font-red" data-valmsg-for="permitno" data-valmsg-replace="true"></span>
            </div>

            <div class="col-sm-4 mg-t-10 mg-sm-b-10">
              <label class="col-md-4 form-control-label ckbox">
                <input id="hirebox" type="checkbox" onclick="hirefunc()">
                <span style="font-size: 20px;">Hire</span>
              </label>

            </div>
          </div>








          <div class="row mg-t-10">
            <label class="col-md-4 form-control-label"> Status </label>
            <div class="col-sm-8 mg-t-10 mg-sm-b-10" id="type">
             <select class="form-control" data-val="true" placeholder="Select Vehicle Type" id="mainstatus" name="loadtype"  style="padding:0px 6px !important;" onchange="fetch_data()">

             </select>

           </div>
         </div>










       </div>
     </div>


     <div class="col-xl-6 mg-t-10">

       <div class="portlet-body">

         <div id="printarea" style=" display: block; border:5px solid #FB9337; height: auto; " >
          <p id="statusid" style="text-align: center;height:  100%;background: #FB9337;font-size:  25px;color: #fff;padding-top: 55px; padding-bottom: 55px;border: 5px solid; margin-bottom: 0px;">Vehicle Details</p>
          <!-- <p style="font-size: 25px;"><span>Status:</span><span id="statusid"></span></p> -->

        </div>
      </div>
    </div>
  </div>
</div>
</div>


<div id="retemp">

 <div class="am-pagebody">
   <div class="card pd-20 form-layout form-layout-4">
     <div class="row row-sm">
      <div class="col-xl-6">

        <div class="portlet-body">



          <div class="col-md-4">
           <div class="row mg-t-10"> 
             <h6 class="card-body-title">Return Empty</h6>
           </div>
         </div> 

         <div class="row mg-t-10">
          <label class="col-md-4 form-control-label">From </label>
          <div class="col-sm-8 mg-t-10 mg-sm-b-10">
            <input class="form-control" data-val="true" data-val-length="The field permitno must be a string with a maximum length of 50." data-val-length-max="50"  id="ldfrome" maxlength="50" name="ldfrome" type="text" value="" disabled>
<input class="form-control" data-val="true" data-val-length="The field permitno must be a string with a maximum length of 50." data-val-length-max="50"  id="ret_emp_from" maxlength="50" name="ret_emp_from" type="hidden" value="">

            <span class="field-validation-valid font-red" data-valmsg-for="permitno" data-valmsg-replace="true"></span>
          </div>
        </div> 



        <div class="row mg-t-10">
          <label class="col-md-4 form-control-label">To </label>
          <div class="col-sm-8 mg-t-10 mg-sm-b-10">
            <input class="form-control" data-val="true" data-val-length="The field permitno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Enter Description" id="ldtoe" maxlength="50" name="ldtoe" type="text" value="" >
            <span class="field-validation-valid font-red" data-valmsg-for="permitno" data-valmsg-replace="true"></span>
          </div>
        </div> 


        <div class="row mg-t-10">

          <label class="col-md-4 form-control-label">Driver </label>
          <div class="col-sm-8 mg-t-10 mg-sm-b-10">
            <input class="form-control" data-val="true" data-val-length="The field bodytype must be a string with a maximum length of 100." data-val-length-max="100" placeholder="Enter Driver Name" id="empdriver" maxlength="100" name="ret_emp_driver" type="text" value="" readonly>
            <input class="form-control" data-val="true" data-val-length="The field bodytype must be a string with a maximum length of 100." data-val-length-max="100" placeholder="Enter Driver Name" id="empdriverh" maxlength="100" name="ret_emp_driver_h" type="hidden">
            <span class="field-validation-valid font-red" data-valmsg-for="bodytype" data-valmsg-replace="true"></span>

<select   name="ret_emp_change_driver" id="bodytype" class="form-control"  >
                 <option value="">Change Driver </option>
                 <?php $query =mysqli_query($conn,"SELECT * FROM drivers ");
                 while($row=mysqli_fetch_array($query))
                  { ?>
                    <option value="<?php echo $row['id'];?>" ><?php echo $row['name'];?></option>
                    <?php
                  }
                  ?>
                </select>
                <span class="field-validation-valid font-red" data-valmsg-for="permitno" data-valmsg-replace="true"></span>
          
          </div>
        </div>
        <div class="row mg-t-10">
          <label class="col-md-4 form-control-label">Advance </label>
          <div class="col-sm-8 mg-t-10 mg-sm-b-10">
            <input class="form-control" data-val="true" data-val-length="The field engineno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Advance Amount" id="engineno" maxlength="50" name="ret_emp_adv" type="text" value="">
            <span class="field-validation-valid font-red" data-valmsg-for="engineno" data-valmsg-replace="true"></span>
          </div>
        </div>

          <div class="row mg-t-10">
            <label class="col-md-2 col-sm-2 form-control-label"> Amount Place </label>
            <div class="col-sm-10 mg-t-10 mg-sm-b-10">
<select   name="return_emp_amt_place" id="return_emp_amt_place" class="form-control"  >
                 <option value="">Chennai </option>
 <option value="">Maduranthagam </option>

</select>

<!-- 
              <input class="form-control" data-val="true" data-val-length="The field permitno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Advance Amount" id="on_road_adv" maxlength="50" name="on_road_adv" type="text" value="" > -->
              <span class="field-validation-valid font-red" data-valmsg-for="permitno" data-valmsg-replace="true"></span>
            </div>
          </div>
       <!--  <div class="row mg-t-10">
          <label class="col-md-4 form-control-label">Diesel </label>
          <div class="col-sm-8 mg-t-10 mg-sm-b-10">
            <input class="form-control" data-val="true" data-val-length="The field chasisno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Diesel Amount" id="chasisno" maxlength="50" name="mdiesel" type="text" value="">
            <span class="field-validation-valid font-red" data-valmsg-for="chasisno" data-valmsg-replace="true"></span>
          </div>
        </div>
 -->



      </div>
    </div>


  </div>
</div>










<div id="dieseldiv_returne">



      <div class="mg-md-t-30" >

 <div class="card pd-sm-t-10 pd-sm-b-10 pd-sm-l-0 mg-l-0">

       <div class="row row-sm mg-t-0 pd-sm-l-30 pd-sm-r-30">

          <div class="col-xl-12 col-md-12 mg-l-0 pd-sm-l-0-force pd-sm-r-0-force">

           

            <div class="portlet-body">

       


      <div align="right" style="float: right;">
     <button type="button" name="add" id="add_die_returne" class="btn btn-info">Add New Entry</button>
    </div>
       <div class="mg-t-10 col-sm-8 pd-sm-l-0 pd-sm-r-0 pd-sm-t-15"> 
             <h6 class="card-body-title">Diesel Entries</h6>
           </div>
           


 <div class="col-sm-12 mg-t-30 pd-sm-l-0 pd-sm-r-0" id="responsecontainer_returne">
                                                  
        <div class="col-sm-10 mg-t-5 mg-sm-b-10">


 <div class="col-xl">
  
</div>
      </div>





                   </div></div></div>



                   <div class="modal fade" id="returne_die_add" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<!-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> -->

       <div class="col-xl-12 col-lg-12">

          


<div class="row mg-t-10">
          <label class="col-md-4 col-sm-4 form-control-label">Date</label>
          <div class="col-sm-8 mg-t-5 mg-sm-b-10 ">
           <div class="input-group">
              <span class="input-group-addon"><i class="icon ion-calendar tx-16 lh-0 op-6"></i></span>
              <input class="form-control datepicker" placeholder="Cash Date" name="hire_friet_adv_cash_date" id="datepicker_return_emp" type="text" value="<?php echo date('d/m/Y');?>" >
            </div>
        </div>
      </div>

       <div class="row mg-t-10">
        <label class="col-md-4 col-sm-4 form-control-label">Vechicle Number</label>
        <div class="col-sm-8 mg-t-5 mg-sm-b-10">
          <input class="form-control" data-val="true" data-val-length="The field engineno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Driver Name" id="returne_die_vechno" maxlength="50" name="returne_driver" type="text"  disabled>
          <span class="field-validation-valid font-red" data-valmsg-for="engineno" data-valmsg-replace="true"></span>
        </div>
      </div>  

      <div class="row mg-t-10">
        <label class="col-md-4 col-sm-4 form-control-label">Driver</label>
        <div class="col-sm-8 mg-t-5 mg-sm-b-10">
          <input class="form-control" data-val="true" data-val-length="The field engineno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Driver Name" id="returne_die_driver" maxlength="50" name="driver" type="text" value="" disabled>
          <input class="form-control" data-val="true" data-val-length="The field engineno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Driver Name" id="returne_die_driver_h" maxlength="50" name="driver" type="hidden">


          <span class="field-validation-valid font-red" data-valmsg-for="engineno" data-valmsg-replace="true"></span>
        </div>
      </div>  
        
      <div class="row mg-t-10">
        <label class="col-md-4 col-sm-4 form-control-label">Vendor</label>
        <div class="col-sm-8 mg-t-5 mg-sm-b-10">
<!--           <input class="form-control" data-val="true" data-val-length="The field engineno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Vendor Name" id="returne_die_vendor" maxlength="50" name="vendor" type="text" value=""> -->



<?php
$vendor=mysqli_query($conn,"SELECT * from ledger WHERE nature='Diesel Station'; "); 

?>
<select class="form-control" data-val="true" placeholder="Vendor Name" id="returne_die_vendor" name="vendor" >
<?php

while($vend = mysqli_fetch_array($vendor))
{
?>
<option  value="<?php echo $vend['name']; ?>"><?php echo $vend['name']; ?></option>

<?php
}

?>
</select>






          <span class="field-validation-valid font-red" data-valmsg-for="engineno" data-valmsg-replace="true"></span>
        </div>
      </div>
<div class="row mg-t-10">
        <label class="col-md-4 col-sm-4 form-control-label">Place</label>
        <div class="col-sm-8 mg-t-5 mg-sm-b-10">
          <input class="form-control" data-val="true" data-val-length="The field engineno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Vendor Location" id="returne_die_place" maxlength="50" name="place" type="text" value="">
          <span class="field-validation-valid font-red" data-valmsg-for="engineno" data-valmsg-replace="true"></span>
        </div>
      </div>


     


      <div class="row mg-t-10">
        <label class="col-md-4 col-sm-4 form-control-label">Quantity</label>
        <div class="col-sm-3 mg-t-5 mg-sm-b-10">
          <input class="form-control" data-val="true" data-val-length="The field insurancename must be a string with a maximum length of 200." data-val-length-max="200" placeholder="Quantity" id="returne_die_qty" maxlength="200" name="qty" type="text" value="" onkeyup="diecalRete()">
          <span class="field-validation-valid font-red" data-valmsg-for="insurancename" data-valmsg-replace="true"></span>
        </div>

        <label class="col-md-3 col-sm-3 form-control-label">Price Per Litre</label>
        <div class="col-sm-2 mg-t-5 mg-sm-b-10">
          <input class="form-control" data-val="true" data-val-length="The field permitno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="0" id="returne_die_ppl" maxlength="50" name="ppl" type="text" value="" disabled>
          <span class="field-validation-valid font-red" data-valmsg-for="permitno" data-valmsg-replace="true"></span>
        </div>
      </div>
      <div class="row mg-t-10">
        <label class="col-md-4 col-sm-4 form-control-label">Amount</label>
        <div class="col-sm-8 mg-t-5 mg-sm-b-10">
          <input class="form-control" data-val="true" data-val-length="The field insurancename must be a string with a maximum length of 200." data-val-length-max="200" placeholder="Diesel Amount" id="returne_die_amt" maxlength="200" name="amt" type="text" value="" onkeyup="diecalRete()">
          <span class="field-validation-valid font-red" data-valmsg-for="insurancename" data-valmsg-replace="true" ></span>
        </div>
      </div>

 <div class="row mg-t-10">


        <label class="col-md-4 col-sm-4  form-control-label">Pay Type</label>                                                    
        <div class="col-sm-8 mg-t-5 mg-sm-b-10">

          <select class="form-control valid" data-val="true" placeholder="Select bilty paid type" id="returne_die_billtype" name="billtype" style="padding:0px 6px !important;">
            <option <?php if($insid[0]['billtype']=="To Be Billed") echo 'selected="selected"'; ?> value="Cash">Cash</option>
            <option <?php if($insid[0]['billtype']=="Paid") echo 'selected="selected"'; ?> value="Credit">Credit</option>

            <option <?php if($insid[0]['billtype']=="Paid") echo 'selected="selected"'; ?> value="Driver Cash">Driver Cash</option>
            
          </select>
</div></div>
       
<div class="modal-footer pd-r-0">
<button type="button"  class="btn btn-default" data-dismiss="modal">Close</button>
<button type="button" id="returne_die_insert" class="btn btn-primary">Save changes</button>
</div>
</div>
</div> </div>
     
</div>
</div>
                    
  </div>


   <div class="modal fade" id="returne_editModel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<!-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> -->

       <div class="col-xl-12 col-lg-12">

          

<input   name="upd_id" id="returne_upd_id" type="hidden"  >
<div class="row mg-t-10">
          <label class="col-md-4 col-sm-4 form-control-label">Date</label>
          <div class="col-sm-8 mg-t-5 mg-sm-b-10 ">
           <div class="input-group">
              <span class="input-group-addon"><i class="icon ion-calendar tx-16 lh-0 op-6"></i></span>
              <input class="form-control datepicker" placeholder="Cash Date" name="datepicker0020" id="datepicker0020" type="text"  >
            </div>
        </div>
      </div>
      
      <div class="row mg-t-10">
        <!-- <label class="col-md-4 col-sm-4 form-control-label">Driver</label> -->
        <div class="col-sm-8 mg-t-5 mg-sm-b-10">

          <input class="form-control" data-val="true" data-val-length="The field engineno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Driver Name" id="returne_upd_driver" maxlength="50" name="upd_driver" type="hidden"  disabled>

          <span class="field-validation-valid font-red" data-valmsg-for="engineno" data-valmsg-replace="true"></span>
        </div>
      </div>  
        
      <div class="row mg-t-10">
        <label class="col-md-4 col-sm-4 form-control-label">Vendor</label>
        <div class="col-sm-8 mg-t-5 mg-sm-b-10">
<!--           <input class="form-control" data-val="true" data-val-length="The field engineno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Vendor Name" id="returne_upd_vendor" maxlength="50" name="upd_vendor" type="text" > -->

<?php
$vendor=mysqli_query($conn,"SELECT * from ledger WHERE nature='Diesel Station'; "); 

?>
<select class="form-control" data-val="true" placeholder="Vendor Name" id="returne_upd_vendor" name="upd_vendor" >
<?php

while($vend = mysqli_fetch_array($vendor))
{
?>
<option  value="<?php echo $vend['name']; ?>"><?php echo $vend['name']; ?></option>

<?php
}

?>
</select>



          <span class="field-validation-valid font-red" data-valmsg-for="engineno" data-valmsg-replace="true"></span>
        </div>
      </div>
<div class="row mg-t-10">
        <label class="col-md-4 col-sm-4 form-control-label">Place</label>
        <div class="col-sm-8 mg-t-5 mg-sm-b-10">
          <input class="form-control" data-val="true" data-val-length="The field engineno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Vendor Location" id="returne_upd_place" maxlength="50" name="upd_place" type="text">
          <span class="field-validation-valid font-red" data-valmsg-for="engineno" data-valmsg-replace="true"></span>
        </div>
      </div>


     


      <div class="row mg-t-10">
        <label class="col-md-4 col-sm-4 form-control-label">Quantity</label>
        <div class="col-sm-3 mg-t-5 mg-sm-b-10">
          <input class="form-control" data-val="true" data-val-length="The field insurancename must be a string with a maximum length of 200." data-val-length-max="200" placeholder="Quantity" id="returne_upd_qty" maxlength="200" name="upd_qty" type="text"  onkeyup="diecalRete2()">
          <span class="field-validation-valid font-red" data-valmsg-for="insurancename" data-valmsg-replace="true"></span>
        </div>

        <label class="col-md-3 col-sm-3 form-control-label">Price Per Litre</label>
        <div class="col-sm-2 mg-t-5 mg-sm-b-10">
          <input class="form-control" data-val="true" data-val-length="The field permitno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="0" id="id="return_die_vendor"e_upd_ppl" maxlength="50" name="returne_upd_ppl" type="text" value="" disabled>
          <input class="form-control" data-val="true" data-val-length="The field permitno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="0" id="pplh" maxlength="50" name="pplh" type="hidden" value="" >
          <span class="field-validation-valid font-red" data-valmsg-for="permitno" data-valmsg-replace="true"></span>
        </div>
      </div>
      <div class="row mg-t-10">
        <label class="col-md-4 col-sm-4 form-control-label">Amount</label>
        <div class="col-sm-8 mg-t-5 mg-sm-b-10">
          <input class="form-control" data-val="true" data-val-length="The field insurancename must be a string with a maximum length of 200." data-val-length-max="200" placeholder="Diesel Amount" id="returne_upd_amt" maxlength="200" name="upd_amt" type="text" onkeyup="diecalRete2()">
          <span class="field-validation-valid font-red" data-valmsg-for="insurancename" data-valmsg-replace="true" ></span>
        </div>
      </div>

 <div class="row mg-t-10">


        <label class="col-md-4 col-sm-4 form-control-label">Pay Type</label>                                                    
        <div class="col-sm-8 mg-t-5 mg-sm-b-10">

          <select class="form-control valid" data-val="true" placeholder="Select bilty paid type" id="returne_upd_billtype" name="upd_billtype" style="padding:0px 6px !important;">
            <option <?php if($insid[0]['billtype']=="To Be Billed") echo 'selected="selected"'; ?> value="Cash">Cash</option>
            <option <?php if($insid[0]['billtype']=="Paid") echo 'selected="selected"'; ?> value="Credit">Credit</option>

            <option <?php if($insid[0]['billtype']=="Paid") echo 'selected="selected"'; ?> value="Driver Cash">Driver Cash</option>
            
          </select>
</div></div>
       
<div class="modal-footer pd-r-0">
<button type="button"  class="btn btn-default" data-dismiss="modal">Close</button>
<button type="button" id="returne_update" class="btn btn-primary">Save changes</button>
</div>
</div></div></div>
</div> </div></div>
 <script >
$(function () {
$("#add_die_returne").click(function(){
$('#returne_die_add').modal('show');
var dte=$('#myVariable').val();
$('#datepicker_return_emp').val(dte);
});
});
</script>

<script>

  $(document).on('click', '#returne_update', function(){
   var dat = $('#datepicker0020').val();
   var fid = $('#returne_upd_id').val();
   var dri = $('#returne_upd_driver').val();
   var ven = $('#returne_upd_vendor').val();
   var pla = $('#returne_upd_place').val();
   var qt = $('#returne_upd_qty').val();
   var pp = $('#returne_upd_ppl').val();
   var at = $('#returne_upd_amt').val();
   var bill = $('#returne_upd_billtype').val();
   var vech="";

$.ajax({
     url:"fuelins.php",
     method:"POST",
     data:{date:dat, id:fid, vechno:vech, driver:dri, vendor:ven, place:pla, qty:qt, pricepl:pp, amount:at, billpay:bill},
     success:function(data)
     {
      /*alert(data);*/
      fetch_data();
      $('#returne_editModel').modal('hide');

   $('#returne_upd_vendor').val("");
   $('#returne_upd_place').val("");
   $('#returne_upd_qty').val("");
   $('#returne_upd_ppl').val("");
   $('#returne_upd_amt').val("");
   $('#returne_upd_billtype').val("");




       }
    });

  });
</script>



<!-- 
<script>
  document.addEventListener("DOMContentLoaded", function() {
fetch_data();

});
</script> -->
<!-- <script>

/*  Table View*/
  $('#mVechno').change(function(){
 fetch_data();
  });
</script> -->


<script>
function deletefuel(del_val)
{


$.ajax({
        type: "POST",
        url: "fueldel.php",
        data:'val='+del_val,
        success: function(data){ 
       fetch_data();
        }
      });


}
</script>



<script>

  $(document).on('click', '#returne_die_insert', function(){



   var dat = $('#datepicker_return_emp').val();
   var vno = $('#mVechno').val();
   var tid = $('#ret_tripid').val();
   var dri = $('#returne_die_driver_h').val();
   var ven = $('#returne_die_vendor').val();
   var pla = $('#returne_die_place').val();
   var qt = $('#returne_die_qty').val();
   var pp = $('#returne_die_ppl').val();
   var at = $('#returne_die_amt').val();
   var bill = $('#returne_die_billtype').val();


 if(vno != '')
 {

$.ajax({
     url:"fuelins.php",
     method:"POST",
     data:{date:dat, vechno:vno, tripid:tid, driver:dri, vendor:ven, place:pla, qty:qt, pricepl:pp, amount:at, billpay:bill},
     success:function(data)
     {
      // alert(data);
      fetch_data();
   $('#returne_die_vendor').val("");
   $('#returne_die_place').val("");
   $('#returne_die_qty').val("");
   $('#returne_die_ppl').val("");
   $('#returne_die_amt').val("");
   $('#returne_die_billtype').val("");



     }
    });

 }
 else
 {

alert("Please Select Vehicle Number")

 }

  });
</script>


      </div><!-- am-pagebody -->
     



<script>
  function diecalRete()
  {
    if((event.keyCode||event.which) != 9)
    {


      var die1 = document.getElementById('returne_die_qty').value;
      var die2 = document.getElementById('returne_die_amt').value;
      if (die1 == "")
       die1 = 0;
     if (die2 == "")
       die2 = 0;

     var total =  parseFloat(die2)/parseFloat(die1);

     var res = isNaN(total);
     if(res == true)
     {
      document.getElementById('returne_die_ppl').value = 0;


    }
    else
    {
      document.getElementById('returne_die_ppl').value=total;

    }
  }}
</script>
<script>
  function diecalRete2()
  {
    if((event.keyCode||event.which) != 9)
    {


      var die1 = document.getElementById('returne_upd_qty').value;
      var die2 = document.getElementById('returne_upd_amt').value;
      if (die1 == "")
       die1 = 0;
     if (die2 == "")
       die2 = 0;

     var total =  parseFloat(die2)/parseFloat(die1);

     var res = isNaN(total);
     if(res == true)
     {
      document.getElementById('returne_upd_ppl').value = 0;

    }
    else
    {
      document.getElementById('returne_upd_ppl').value=total;

    }
  }}
</script>


</div>

</div>

<!-- 
<div class="form-layout-footer pd-sm-40">
  <button type="submit" value="submit" name="submit" class="btn btn-info mg-r-5">End Trip</button>
  <input type="hidden" name="action" value="<?php if($_REQUEST['flag'] =='Edit') echo $_REQUEST['flag']; else echo 'Add'; ?>">
  <button class="btn btn-secondary">Cancel</button>
</div>
 -->




</div>  

<div id="hirediv">
 <div class="am-pagebody">
   <div class="card pd-20 form-layout form-layout-4">
     <div class="row row-sm ">
      <div class="col-xl-6">

        <div class="portlet-body">



          <div class="col-md-4">
           <div class="row mg-t-10"> 
             <h6 class="card-body-title">Hire Details</h6>
           </div>
         </div>
        


            
            <div class="row mg-t-10">
              <label class="col-md-2 form-control-label"> From </label>
              <div class="col-sm-4 mg-t-5 mg-sm-b-10">

               <!-- <select   name="hire_load_from" id="hirefrom" class="form-control"  >
                 <option value="">Select </option>
                 <?php $query =mysqli_query($conn,"SELECT * FROM locations");
                 while($row=mysqli_fetch_array($query))
                  { ?>
                    <option value="<?php echo $row['area'];?>" <?php if($row['area']==$insid[0]['vechOwner']) echo 'selected="selected"'; ?> ><?php echo $row['area'];?></option>
                    <?php
                  }
                  ?>
                </select> --> <input class="form-control" data-val="true" placeholder="Enter From Place" id="hirefrom" maxlength="50" name="hire_load_from" type="text">


 <script>
     $(document).ready(function(){
     
  $("#hirefrom").keyup(function(){

    $.ajax({
    type: "POST",
    url: "city_sugg.php",
    data:'keyword='+$(this).val(),
    beforeSend: function(){
      $("#hirefrom").css("background","#FFF url(LoaderIcon.gif) no-repeat 300px");
    },
    success: function(data){
 /*     alert(data);*/
      $("#hire_from").show();
      $("#hire_from").html(data);
      $("#hirefrom").css("background","#FFF");
    }
    });
  });
});

  </script> 







                <span class="field-validation-valid font-red" data-valmsg-for="policyno" data-valmsg-replace="true"></span>
              
 <div class="" id="hire_from">
                                                        </div>

              </div>
              


              <label class="col-md-2 form-control-label"> To </label>
            <div class="col-sm-4 mg-t-10 mg-sm-b-10">
             <!--   <select   name="hire_load_to" id="hireto" class="form-control"  >
                 <option value="">Select </option>
                 <?php $query =mysqli_query($conn,"SELECT * FROM locations ");
                 while($row=mysqli_fetch_array($query))
                  { ?>
                    <option value="<?php echo $row['area'];?>" <?php if($row['area']==$insid[0]['vechOwner']) echo 'selected="selected"'; ?> ><?php echo $row['area'];?></option>
                    <?php
                  }
                  ?>
                </select> -->

                <input class="form-control" data-val="true" placeholder="Enter To Place" id="hireto" maxlength="50" name="hire_load_to" type="text">
                <span class="field-validation-valid font-red" data-valmsg-for="policyno" data-valmsg-replace="true"></span>
              </div>



 <script>
     $(document).ready(function(){
     
  $("#hireto").keyup(function(){

    $.ajax({
    type: "POST",
    url: "city_sugg.php",
    data:'key='+$(this).val(),
    beforeSend: function(){
      $("#hireto").css("background","#FFF url(LoaderIcon.gif) no-repeat 300px");
    },
    success: function(data){
 /*     alert(data);*/
      $("#hire_to").show();
      $("#hire_to").html(data);
      $("#hireto").css("background","#FFF");
    }
    });
  });
});

  </script> 




            </div>          
                <div class="" style="float: right !important;/* list-style:none; */margin-top:-3px;padding:0;width: 200px !important;position: relative !important;z-index:1;/* right: 0 !important; */"  id="hire_to">
                                                        </div>                            

           <div class="row mg-t-10">

              <label class="col-md-2 form-control-label"> Transporter</label>
              <div class="col-sm-4 mg-t-10 mg-sm-b-10">
               <select   name="hire_load_trans" id="from" class="form-control"  >
                 <option value="">Select </option>
                 <?php $query =mysqli_query($conn,"SELECT * FROM transporters where type='Hire'");
                 while($row=mysqli_fetch_array($query))
                  { ?>
                    <option value="<?php echo $row['name'];?>" <?php if($row['name']==$insid[0]['vechOwner']) echo 'selected="selected"'; ?> ><?php echo $row['name'];?></option>
                    <?php
                  }
                  ?>
                </select>
                <span class="field-validation-valid font-red" data-valmsg-for="permitno" data-valmsg-replace="true"></span>
              </div>

<label class="col-md-2 form-control-label">Vehicle No </label>
            <div class="col-sm-4 mg-t-5 mg-sm-b-10">
              <input class="form-control" data-val="true" data-val-length="The field permitno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Enter Vehicle Number" id="" maxlength="50" name="hire_load_vech_no" type="text" value="" >

              <span class="field-validation-valid font-red" data-valmsg-for="permitno" data-valmsg-replace="true"></span>
            </div>


            </div>

            <div class="row mg-t-10">
              <label class="col-md-2 form-control-label"> Driver  </label>
              <div class="col-sm-4 mg-t-5 mg-sm-b-10">
               <input class="form-control" type="text"   name="hire_load_driver" id="driver" class="form-control">
                 
                <span class="field-validation-valid font-red" data-valmsg-for="permitno" data-valmsg-replace="true"></span>

              </div>
             
            </div>

           
                  


<!--           <div class="row mg-t-10">
           <label class="col-md-2 form-control-label">Party Name</label>
           <div class="col-sm-10 mg-t-5 mg-sm-b-10">
            <input class="form-control" data-val="true" data-val-length="The field insurancename must be a string with a maximum length of 200." data-val-length-max="200" placeholder="Enter Party Name" id="insurancename" maxlength="200" name="hire_load_party_name" type="text" value="">
            <span class="field-validation-valid font-red" data-valmsg-for="insurancename" data-valmsg-replace="true"></span>
          </div>
        </div> -->


          <div class="row mg-t-10">
           <label class="col-md-2 form-control-label">Party Name</label>
           <div class="col-sm-10 mg-t-5 mg-sm-b-10">

             <select   name="hire_load_party_name" id="insurancename" class="form-control"  >
                 <option value="">Select </option>
                 <?php $query =mysqli_query($conn,"SELECT * FROM customer ");
                 while($row=mysqli_fetch_array($query))
                  { ?>
                    <option value="<?php echo $row['name'];?>" ><?php echo $row['name'];?></option>
                    <?php
                  }
                  ?>
                </select>
         <!--    <input class="form-control" data-val="true" data-val-length="The field insurancename must be a string with a maximum length of 200." data-val-length-max="200" placeholder="Enter Party Name" id="insurancename" maxlength="200" name="loadparty" type="text" value=""> -->
            <span class="field-validation-valid font-red" data-valmsg-for="insurancename" data-valmsg-replace="true"></span>
          </div>
        </div>



      </div></div>

      <div class="col-xl-6">


       <div class="portlet-body">
        <div class="row mg-t-10">

          <div class="col-sm-8 mg-t-10 mg-sm-b-10"></div></div>
          <div class="portlet-body">
           <div class="row mg-t-10">
             <label class="col-md-2 form-control-label">GC No </label>
             <div class="col-sm-10 mg-t-5 mg-sm-b-10">
              <input class="form-control" data-val="true" data-val-length="The field permitno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Enter GC Number" id="permitno" maxlength="50" name="hire_load_gc" type="text" value="">
              <span class="field-validation-valid font-red" data-valmsg-for="permitno" data-valmsg-replace="true"></span>

            </div>
          </div> 

          <div class="row mg-t-10">
            <label class="col-md-2 form-control-label">Reference No </label>
            <div class="col-sm-4 mg-t-5 mg-sm-b-10">
              <input class="form-control" data-val="true" data-val-length="The field insurancename must be a string with a maximum length of 200." data-val-length-max="200" placeholder="Enter Reference Number" id="insurancename" maxlength="200" name="hire_load_ref" type="text" value="">
              <span class="field-validation-valid font-red" data-valmsg-for="insurancename" data-valmsg-replace="true"></span>
            </div>

            <label class="col-md-2 form-control-label">Container No </label>
            <div class="col-sm-4 mg-t-5 mg-sm-b-10">
              <input class="form-control" data-val="true" data-val-length="The field permitno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Enter Container Number" id="hire_cont" maxlength="50" name="hire_load_cont_no" type="text" value="" onkeypress="return onlyAlphab(event,this);">

              <span class="field-validation-valid font-red" data-valmsg-for="permitno" data-valmsg-replace="true"></span>
            </div>
          </div>


<script>
function uppers(value)
{
var stat12=   $("#hire_cont").val();
if (value > 96 && value < 123)
  {
   value = value-32;
       }
     var res12= String.fromCharCode(value);
    /*alert(res1); */
     $("#hire_cont").val(stat12+res12);
       }
</script>
<script>
 function onlyAlphab(e, t) {
  try {
    var ctl = document.getElementById('hire_cont');
    /* alert(ctl);*/
    var startPos = ctl.selectionStart;
    var endPos = ctl.selectionEnd;
   /* alert(startPos + ", " + endPos);*/
    

    if(endPos<4)

    {
      if (window.event) {
        var charCode = window.event.keyCode;
        /* alert(charCode);*/
      }
      else if (e) {
        var charCode = e.which;

      }
     else {return true; }
     if ((charCode > 64 && charCode < 91) || (charCode > 96 && charCode < 123))
     {
      uppers(charCode);
return false;
     }
     else
       return false;
   }             
    else if(endPos>=4 && endPos<10)
    {

     if (window.event) {
      var charCode = window.event.keyCode;
      /* alert(charCode);*/
    }
    else if (e) {
      var charCode = e.which;
    }
    else { return true; }
    if ((charCode > 64 && charCode < 91) || (charCode > 96 && charCode < 123))
     return false;
   else
     return true;
 } 
 else if(endPos>10)
 {
   return false;
 }
}
catch (err) {
  alert(err.Description);
}}
</script>
          <div class="row mg-t-10">
            <label class="col-md-2 form-control-label">Container Size </label>
            <div class="col-sm-4 mg-t-5 mg-sm-b-10">
             <select class="form-control" data-val="true" data-val-number="The field maritialstatus must be a number." placeholder="The maritialstatus field is required." id="mstatus" name="hire_load_cont_size">
              <option value="">---Select Container Size---</option>
              <option <?php if($insid[0]['maritialstat']=="1") echo 'selected="selected"'; ?> selected="selected" value="20">20</option>
              <option <?php if($insid[0]['maritialstat']=="2") echo 'selected="selected"'; ?> value="40">40</option>

            </select>
          </div>



          <label class="col-md-2 form-control-label">Container Weight </label>
          <div class="col-sm-4 mg-t-5 mg-sm-b-10">
            <input class="form-control" data-val="true" data-val-length="The field permitno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Enter Container Weight" id="permitno" maxlength="50" name="hire_load_cont_wt" type="text" value="">
            <span class="field-validation-valid font-red" data-valmsg-for="permitno" data-valmsg-replace="true"></span>

          </div> 
        </div>

        <div class="row mg-t-10">
          <label class="col-md-2 form-control-label">Load Type </label>
          <div class="col-sm-4 mg-t-5 mg-sm-b-10">
           <select class="form-control" data-val="true" data-val-number="The field maritialstatus must be a number." placeholder="The maritialstatus field is required." id="hirldtype" name="hire_load_cont_type">
            <option value="">---Select Goods---</option>
            <option <?php if($insid[0]['maritialstat']=="1") echo 'selected="selected"'; ?>  value="Import">Import</option>
            <option <?php if($insid[0]['maritialstat']=="2") echo 'selected="selected"'; ?> value="Export">Export</option>
            <script >

              document.getElementById('hirldtype').addEventListener('change', function () {
                var style = this.value == "Export" ? 'block' : 'none';
                document.getElementById('sealdivhire').style.display = style;
                document.getElementById('sealdivlab').style.display = style;


              });
            </script>
          </select>
        </div>


        <label class="col-md-2 form-control-label" id="sealdivlab" style="display: none">Seal No </label>
        <div class="col-sm-4 mg-t-5 mg-sm-b-10" id="sealdivhire" style="display: none">
          <input id="sealdivhire" class="form-control" data-val="true" data-val-length="The field insurancename must be a string with a maximum length of 200." data-val-length-max="200" placeholder="Seal Number."  maxlength="200" name="hire_load_sealno" type="text" value="">
          <span class="field-validation-valid font-red" data-valmsg-for="insurancename" data-valmsg-replace="true"></span>

        </div>



      </div>



      <div class="row mg-t-10">
        <label class="col-md-2 form-control-label">Remarks </label>
        <div class="col-sm-10 mg-t-5 mg-sm-b-10">
          <input class="form-control" data-val="true" data-val-length="The field insurancename must be a string with a maximum length of 200." data-val-length-max="200" placeholder="Enter Remarks Here" id="insurancename" maxlength="200" name="hire_load_remarks" type="text" value="">
          <span class="field-validation-valid font-red" data-valmsg-for="insurancename" data-valmsg-replace="true"></span>

        </div>
      </div>


    </div>
  </div>
</div>
</div>
</div>

</div> 

<div class="am-pagebody">
 <div class="card pd-20 form-layout form-layout-4">
   <div class="row row-sm">
    <div class="col-xl-6">

      <div class="portlet-body">



        <div class="col-md-4">
         <div class="row mg-t-10"> 
           <h6 class="card-body-title">Frieght Details</h6>
         </div></div>


         <div class="row mg-t-10">
          <label class="col-md-2 form-control-label">Freight Amount </label>
          <div class="col-sm-4 mg-t-5 mg-sm-b-10">
            <input class="amt_cal form-control" data-val="true" data-val-length="The field insurancename must be a string with a maximum length of 200." data-val-length-max="200" placeholder="Enter Freight Amount" id="hire_friet_amt" maxlength="200" name="hire_friet_amt" type="text" value="" onkeyup= "hireTotal()">
            <span class="field-validation-valid font-red" data-valmsg-for="insurancename" data-valmsg-replace="true"></span>
          </div>











          <label class="col-md-2 form-control-label">Loading Charges </label>
          <div class="col-sm-4 mg-t-5 mg-sm-b-10">
            <input class="amt_cal form-control" data-val="true" data-val-length="The field permitno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Loading Charges" id="hire_friet_load_crgs" maxlength="50" name="hire_friet_load_crgs" type="text" value="" onkeyup= "hireTotal()">
            <span class="field-validation-valid font-red" data-valmsg-for="permitno" data-valmsg-replace="true"></span>
          </div>
        </div>



        <div class="row mg-t-10">
          <label class="col-md-2 form-control-label">Un-Loading Charges </label>
          <div class="col-sm-4 mg-t-5 mg-sm-b-10">
            <input class="amt_cal form-control" data-val="true" data-val-length="The field insurancename must be a string with a maximum length of 200." data-val-length-max="200" placeholder="Enter Un Loading Charges" id="hire_friet_unload_crgs" maxlength="200" name="hire_friet_unload_crgs" type="text" value="" onkeyup= "hireTotal()">
            <span class="field-validation-valid font-red" data-valmsg-for="insurancename" data-valmsg-replace="true"></span>
          </div>

          <label class="col-md-2 form-control-label">Weigh Bill Charges </label>
          <div class="col-sm-4 mg-t-5 mg-sm-b-10">
            <input class="amt_cal form-control" data-val="true" data-val-length="The field permitno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Weigh Bill Charges" id="hire_friet_weigh_crgs" maxlength="50" name="hire_friet_weigh_crgs" type="text" value="" onkeyup= "hireTotal()">
            <span class="field-validation-valid font-red" data-valmsg-for="permitno" data-valmsg-replace="true"></span>
          </div>
        </div>


        <div class="row mg-t-10">
          <label class="col-md-2 form-control-label">Other Amount </label>
          <div class="col-sm-4 mg-t-5 mg-sm-b-10">


            <input class="amt_cal form-control" data-val="true" data-val-length="The field permitno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Other Amount" id="hire_friet_other_crgs" maxlength="50" name="hire_friet_other_crgs" type="text" value="" onkeyup= "hireTotal()"><span class="field-validation-valid font-red" data-valmsg-for="permitno" data-valmsg-replace="true"></span> </div>

            <label class="col-md-2 form-control-label">Other Description</label>
            <div class="col-sm-4 mg-t-5 mg-sm-b-10">
              <input class="form-control" data-val="true" data-val-length="The field insurancename must be a string with a maximum length of 200." data-val-length-max="200" placeholder="Description" id="" maxlength="200" name="hire_friet_other_desc" type="text" value="">
              <span class="field-validation-valid font-red" data-valmsg-for="insurancename" data-valmsg-replace="true"></span>
            </div>
          </div>

          <!-- <div class="row mg-t-10">
            <label class="col-md-2 form-control-label">Halt Days </label>
            <div class="col-sm-4 mg-t-5 mg-sm-b-10">
              <input class="form-control" data-val="true" data-val-length="The field insurancename must be a string with a maximum length of 200." data-val-length-max="200" placeholder="Halt Days" id="" maxlength="200" name="hire_friet_halt_days" type="text" value="" onkeyup="fval()" >
              <span class="field-validation-valid font-red" data-valmsg-for="insurancename" data-valmsg-replace="true"></span>
            </div>

            <label class="col-md-2 form-control-label">Rate </label>
            <div class="col-sm-4 mg-t-5 mg-sm-b-10">
              <input class="form-control" data-val="true" data-val-length="The field permitno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Halt Rate" id="" maxlength="50" name="hire_friet_halt_rate" type="text" value="" 
              onkeyup="fval()" >
              <span class="field-validation-valid font-red" data-valmsg-for="permitno" data-valmsg-replace="true"></span>
            </div>
          </div>






          <div class="row mg-t-10">

            <label class="col-md-2 form-control-label">Halt Amount </label>
            <div class="col-sm-10 mg-t-5 mg-sm-b-10">
              <input class="amt_cal form-control" data-val="true" data-val-length="The field bodytype must be a string with a maximum length of 100." data-val-length-max="100" placeholder="0" id="" maxlength="100" name="hire_friet_halt_total" value="" type="text" disabled >
              <input class="amt_cal form-control" data-val="true" data-val-length="The field bodytype must be a string with a maximum length of 100." data-val-length-max="100" placeholder="0" id="" maxlength="100" name="hire_friet_halt_amount" value="" type="hidden"  >
              <span class="field-validation-valid font-red" data-valmsg-for="bodytype" data-valmsg-replace="true"></span>
            </div>
          </div>

 -->
          <div class="row mg-t-10">

            <label class="col-md-2 form-control-label">Total Frieght </label>
            <div class="col-sm-10 mg-t-5 mg-sm-b-10">
              <input class="form-control" data-val="true" data-val-length="The field bodytype must be a string with a maximum length of 100." data-val-length-max="100" placeholder="Total Amount" id="hire_friet_total" maxlength="100" name="hire_friet_total" value="" type="text" disabled >
              <input class="form-control" data-val="true" data-val-length="The field bodytype must be a string with a maximum length of 100." data-val-length-max="100" placeholder="Total Amount" id="hire_friet_amount" maxlength="100" name="hire_friet_amount" value="" type="hidden" >
              <span class="field-validation-valid font-red" data-valmsg-for="bodytype" data-valmsg-replace="true"></span>
            </div>
          </div>
<script>
  function hireTotal()
  {
    if((event.keyCode||event.which) != 9)
    {

      var va1 = document.getElementById('hire_friet_amt').value;

      var va2 = document.getElementById('hire_friet_load_crgs').value;
      var va3 = document.getElementById('hire_friet_unload_crgs').value;
      var va4 = document.getElementById('hire_friet_weigh_crgs').value;
      var va5 = document.getElementById('hire_friet_other_crgs').value;
      if (va1 == "")
       va1 = 0;
     if (va2 == "")
       va2 = 0;
     if (va3 == "")
       va3 = 0;
     if (va4 == "")
       va4 = 0;
     if (va5 == "")
       va5 = 0;



     document.getElementById('hire_form_amt').value=va1;
     document.getElementById('hire_form_load_crgs').value=va2;
     document.getElementById('hire_form_unload_crgs').value=va3;
     document.getElementById('hire_form_weigh_crgs').value=va4;
     document.getElementById('hire_form_otr_amt').value=va5;
   


/*     var com=document.getElementById('hire_comm').value;
     document.getElementById('hire_total').value=total+parseFloat(com);*/




     var total =  parseFloat(va1)+parseFloat(va2)+parseFloat(va3)+parseFloat(va4)+parseFloat(va5);

     var res = isNaN(total);
     if(res == true)
     {
      document.getElementById('hire_friet_total').value = 0;
      document.getElementById('hire_friet_amount').value = 0;
      hireFrttotal();
    }
    else
    {
      document.getElementById('hire_friet_total').value = total;
      document.getElementById('hire_friet_amount').value = total;

        document.getElementById('hire_form_frt_total').value=total;
    document.getElementById('hire_form_frt_amt').value=total;
      
      hireFrttotal();
    }
  }}
</script>







          <div class="row mg-t-10">
            <label class="col-md-2 form-control-label">Adv. Cash Amount </label>
            <div class="col-sm-4 mg-t-5 mg-sm-b-10">
              <input class="form-control" data-val="true" data-val-length="The field insurancename must be a string with a maximum length of 200." data-val-length-max="200" placeholder="0" id="hire_friet_adv_cash" maxlength="200" name="hire_friet_adv_cash" type="text" value="" onkeyup="hireFrttotal()">
              <span class="field-validation-valid font-red" data-valmsg-for="insurancename" data-valmsg-replace="true"></span>
            </div>
            <div class="col-sm-6 mg-t-5 mg-sm-b-10">
             <div class="input-group">
              <span class="input-group-addon"><i class="icon ion-calendar tx-16 lh-0 op-6"></i></span>
              <input class="form-control datepicker" placeholder="Cash Date" name="hire_friet_adv_cash_date" id="datepicker009" type="text" value="<?php echo date('d/m/Y');?>" >
            </div>
            <span class="field-validation-valid font-red" data-valmsg-for="permitno" data-valmsg-replace="true"></span>

          </div>
        </div>


        <div class="row mg-t-10">
          <label class="col-md-2 form-control-label">Adv. Cheq Amount. </label>
          <div class="col-sm-4 mg-t-5 mg-sm-b-10">
            <input class="form-control" data-val="true" data-val-length="The field insurancename must be a string with a maximum length of 200." data-val-length-max="200" placeholder="0" id="hire_friet_adv_cque_amt" maxlength="200" name="hire_friet_adv_cque_amt" type="text" value="" onkeyup="hireFrttotal()">
            <span class="field-validation-valid font-red" data-valmsg-for="insurancename" data-valmsg-replace="true"></span>
          </div>
          <div class="col-sm-6 mg-t-5 mg-sm-b-10">
           <div class="input-group">
            <span class="input-group-addon"><i class="icon ion-calendar tx-16 lh-0 op-6"></i></span>
            <input class="form-control datepicker" placeholder="Cheque Date" name="hire_friet_adv_cque_date" id="datepicker007" type="text" value="<?php echo date('d/m/Y');?>" >
          </div>
          <span class="field-validation-valid font-red" data-valmsg-for="permitno" data-valmsg-replace="true"></span>

        </div>
      </div>

      <div class="row mg-t-10">
       <label class="col-md-2 form-control-label">Bank</label>
       <div class="col-sm-10 mg-t-5 mg-sm-b-10">
        <input class="form-control" data-val="true" data-val-length="The field insurancename must be a string with a maximum length of 200." data-val-length-max="200" placeholder="Enter Bank Name" id="" maxlength="200" name="hire_friet_adv_cque_bank" type="text" value="">
        <span class="field-validation-valid font-red" data-valmsg-for="insurancename" data-valmsg-replace="true"></span>
      </div>
    </div>



    <div class="row mg-t-10">

      <label class="col-md-2 form-control-label">Cheque Number </label>
      <div class="col-sm-10 mg-t-5 mg-sm-b-10">
        <input class="form-control" data-val="true" data-val-length="The field bodytype must be a string with a maximum length of 100." data-val-length-max="100" placeholder="Enter Cheque Number" id="" maxlength="100" name="hire_friet_adv_cque_num" type="text" value=""  >
        <span class="field-validation-valid font-red" data-valmsg-for="bodytype" data-valmsg-replace="true"></span>
      </div>
    </div>


    <div class="row mg-t-10">

      <label class="col-md-2 form-control-label">Freight Balance </label>
      <div class="col-sm-10 mg-t-5 mg-sm-b-10">
        <input class="form-control" data-val="true" data-val-length="The field bodytype must be a string with a maximum length of 100." data-val-length-max="100" placeholder="Freight Balance" id="hire_friet_balance" maxlength="100" name="hire_friet_balance" value="" type="text" disabled >
        <input class="form-control" data-val="true" data-val-length="The field bodytype must be a string with a maximum length of 100." data-val-length-max="100" placeholder="Freight Balance" id="hire_friet_bal" maxlength="100" name="hire_friet_bal" value="" type="hidden" >
        <span class="field-validation-valid font-red" data-valmsg-for="bodytype" data-valmsg-replace="true"></span>
      </div>
    </div>




<script>
  function hireFrttotal()
  {
    if((event.keyCode||event.which) != 9)
    {

      var valu1 = document.getElementById('hire_friet_adv_cash').value;
      var valu2 = document.getElementById('hire_friet_adv_cque_amt').value;
      var valu3 = document.getElementById('hire_friet_total').value;
      if (valu1 == "")
       valu1 = 0;
     if (valu2 == "")
       valu2 = 0;
     if (valu3 == "")
       valu3 = 0;
     var total =  parseFloat(valu3)-parseFloat(valu1)-parseFloat(valu2);

     var res = isNaN(total);
     if(res == true)
     {
      document.getElementById('hire_friet_balance').value = 0;
      document.getElementById('hire_friet_bal').value = 0;

    }
    else
    {
      document.getElementById('hire_friet_balance').value=total;
      document.getElementById('hire_friet_bal').value=total;
      document.getElementById('hire_form_balance').value=total;
      document.getElementById('hire_form_bal').value=total;

    }
  }}
</script>





  </div>
</div>

<!-- <div class="col-xl-6">


 <div class="portlet-body">
  <div class="row mg-t-10">

    <div class="col-sm-8 mg-t-10 mg-sm-b-10"></div></div>
    <div class="portlet-body">



      <div class="col-md-4">
       <div class="row mg-t-10"> 
         <h6 class="card-body-title">Diesel Details</h6>
       </div></div>




       <div class="row mg-t-10">

        <div class="col-sm-8 mg-t-10 mg-sm-b-10"></div></div>

        <div class="row mg-t-10">
          <label class="col-md-2 form-control-label">Date </label>
          <div class="col-sm-10 mg-t-5 mg-sm-b-10 ">
           <div class="input-group">
            <span class="input-group-addon"><i class="icon ion-calendar tx-16 lh-0 op-6"></i></span>
            <input class="form-control datepicker" placeholder="Entry date" name="dieseldate" id="datepicker006" type="text" value="<?php echo date('d/m/Y');?>" >
          </div>
        </div>
      </div></div>
      <div class="row mg-t-10">
        <label class="col-md-2 form-control-label">Vendor </label>
        <div class="col-sm-10 mg-t-5 mg-sm-b-10">
          <input class="form-control" data-val="true" data-val-length="The field engineno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Vendor Details" id="" maxlength="50" name="vendor" type="text" value="">
          <span class="field-validation-valid font-red" data-valmsg-for="engineno" data-valmsg-replace="true"></span>
        </div>
      </div>
        <div class="row mg-t-10">
        <label class="col-md-2 form-control-label">Place </label>
        <div class="col-sm-10 mg-t-5 mg-sm-b-10">
          <input class="form-control" data-val="true" data-val-length="The field engineno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Vendor Details" id="" maxlength="50" name="vendor" type="text" value="">
          <span class="field-validation-valid font-red" data-valmsg-for="engineno" data-valmsg-replace="true"></span>
        </div>
      </div>
      <div class="row mg-t-10">


        <label class="col-md-2 form-control-label">Pay Type</label>                                                    
        <div class="col-sm-10 mg-t-5 mg-sm-b-10">

          <select class="form-control valid" data-val="true" placeholder="Select bilty paid type" id="biltypaidtype" name="diepay" style="padding:0px 6px !important;">
            <option <?php if($insid[0]['billtype']=="To Be Billed") echo 'selected="selected"'; ?> value="Cash">Cash</option>
            <option <?php if($insid[0]['billtype']=="Paid") echo 'selected="selected"'; ?> value="Credit">Credit</option>
            <option <?php if($insid[0]['billtype']=="To Pay") echo 'selected="selected"'; ?>  value="To Pay">To Pay</option>
          </select>

        </div>
      </div>



      <div class="row mg-t-10">
        <label class="col-md-2 form-control-label">Quantity </label>
        <div class="col-sm-4 mg-t-5 mg-sm-b-10">
          <input class="form-control" data-val="true" data-val-length="The field insurancename must be a string with a maximum length of 200." data-val-length-max="200" placeholder="Quantity" id="" maxlength="200" name="dieqty" type="text" value="" onkeyup="diecal()">
          <span class="field-validation-valid font-red" data-valmsg-for="insurancename" data-valmsg-replace="true"></span>
        </div>

        <label class="col-md-2 form-control-label">Price Per Litre </label>
        <div class="col-sm-4 mg-t-5 mg-sm-b-10">
          <input class="form-control" data-val="true" data-val-length="The field permitno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="0" id="" maxlength="50" name="dieppl" type="text" value="" disabled>
          <input class="form-control" data-val="true" data-val-length="The field permitno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="0" id="diepplh" maxlength="50" name="diepplh" type="hidden" value="" >
          <span class="field-validation-valid font-red" data-valmsg-for="permitno" data-valmsg-replace="true"></span>
        </div>
      </div>
      <div class="row mg-t-10">
        <label class="col-md-2 form-control-label">Amount </label>
        <div class="col-sm-10 mg-t-5 mg-sm-b-10">
          <input class="form-control" data-val="true" data-val-length="The field insurancename must be a string with a maximum length of 200." data-val-length-max="200" placeholder="Diesel Amount" id="" maxlength="200" name="dieamt" type="text" value="" onkeyup="diecal()">
          <span class="field-validation-valid font-red" data-valmsg-for="insurancename" data-valmsg-replace="true" ></span>
        </div>
      </div>




    </div>
  </div> -->
</div>
</div>

</div> 


<div class="am-pagebody">
 <div class="card pd-20 form-layout form-layout-4">
   <div class="row row-sm ">
    <div class="col-xl-6">

      <div class="portlet-body">



        <div class="col-md-4">
         <div class="row mg-t-10"> 
           <h6 class="card-body-title">Hire Details</h6>
         </div></div>


         <div class="row mg-t-10">
          <label class="col-md-2 form-control-label">Hire Amount </label>
          <div class="col-sm-4 mg-t-5 mg-sm-b-10">
            <input class="form-control" data-val="true" data-val-length="The field insurancename must be a string with a maximum length of 200." data-val-length-max="200" placeholder="Enter Hire Amount" id="hire_form_amt" maxlength="200" name="hire_form_amt" type="text" value="" onkeyup="hirecalc()">
            <span class="field-validation-valid font-red" data-valmsg-for="insurancename" data-valmsg-replace="true"></span>
          </div>

        </div>


        <div class="row mg-t-10">
          <label class="col-md-2 form-control-label">Loading Charges </label>
          <div class="col-sm-4 mg-t-5 mg-sm-b-10">
            <input class="form-control" data-val="true" data-val-length="The field permitno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Loading Charges" id="hire_form_load_crgs" maxlength="50" name="hire_form_load_crgs" type="text" value="" onkeyup="hirecalc()">
            <span class="field-validation-valid font-red" data-valmsg-for="permitno" data-valmsg-replace="true"></span>
          </div>

          <label class="col-md-2 form-control-label">Un-Loading Charges </label>
          <div class="col-sm-4 mg-t-5 mg-sm-b-10">
            <input class="form-control" data-val="true" data-val-length="The field insurancename must be a string with a maximum length of 200." data-val-length-max="200" placeholder="Un-Loading Charges" id="hire_form_unload_crgs" maxlength="200" name="hire_form_unload_crgs" type="text" value="" onkeyup="hirecalc()">
            <span class="field-validation-valid font-red" data-valmsg-for="insurancename" data-valmsg-replace="true"></span>
          </div>  
        </div>

        <div class="row mg-t-10">
          <label class="col-md-2 form-control-label">Weigh Bill Charges </label>
          <div class="col-sm-4 mg-t-5 mg-sm-b-10">
            <input class="form-control" data-val="true" data-val-length="The field permitno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Weigh Bill Charges" id="hire_form_weigh_crgs" maxlength="50" name="hire_form_weigh_crgs" type="text" value="" onkeyup="hirecalc()">
            <span class="field-validation-valid font-red" data-valmsg-for="permitno" data-valmsg-replace="true"></span>
          </div></div>
          <div class="row mg-t-10">
            <label class="col-md-2 form-control-label">Other Amount </label>
            <div class="col-sm-4 mg-t-5 mg-sm-b-10">
              <input class="form-control" data-val="true" data-val-length="The field permitno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Other Amount" id="hire_form_otr_amt" maxlength="50" name="hire_form_otr_amt" type="text" value="" onkeyup="hirecalc()">
              <span class="field-validation-valid font-red" data-valmsg-for="permitno" data-valmsg-replace="true"></span>
            </div>

            <label class="col-md-2 form-control-label">Other Description</label>
            <div class="col-sm-4 mg-t-5 mg-sm-b-10">
              <input class="form-control" data-val="true" data-val-length="The field insurancename must be a string with a maximum length of 200." data-val-length-max="200" placeholder="Description" id="" maxlength="200" name="hire_form_otr_desc" type="text" value="">
              <span class="field-validation-valid font-red" data-valmsg-for="insurancename" data-valmsg-replace="true"></span>
            </div>
          </div>






        <!--   <div class="row mg-t-10">
            <label class="col-md-2 form-control-label">Halt Days </label>
            <div class="col-sm-4 mg-t-5 mg-sm-b-10">
              <input class="form-control" data-val="true" data-val-length="The field insurancename must be a string with a maximum length of 200." data-val-length-max="200" placeholder="Halt Days" id="" maxlength="200" name="hire_form_halt_days" type="text" value="" >
              <span class="field-validation-valid font-red" data-valmsg-for="insurancename" data-valmsg-replace="true"></span>
            </div>

            <label class="col-md-2 form-control-label">Rate </label>
            <div class="col-sm-4 mg-t-5 mg-sm-b-10">
              <input class="form-control" data-val="true" data-val-length="The field permitno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Halt Rate" id="" maxlength="50" name="hire_form_halt_rate" type="text" value="" >
              <span class="field-validation-valid font-red" data-valmsg-for="permitno" data-valmsg-replace="true"></span>
            </div>
          </div>


          <div class="row mg-t-10">

            <label class="col-md-2 form-control-label">Halt Amount </label>
            <div class="col-sm-10 mg-t-5 mg-sm-b-10">
              <input class="form-control" data-val="true" data-val-length="The field bodytype must be a string with a maximum length of 100." data-val-length-max="100" placeholder="0" id="" maxlength="100" name="hire_form_halt_total" value="" type="text" disabled >
              <input class="form-control" data-val="true" data-val-length="The field bodytype must be a string with a maximum length of 100." data-val-length-max="100" placeholder="0" id="" maxlength="100" name="hire_form_halt_amt" value="" type="hidden" >
              <span class="field-validation-valid font-red" data-valmsg-for="bodytype" data-valmsg-replace="true"></span>
            </div>
          </div>
 -->




          <div class="row mg-t-10">

            <label class="col-md-2 form-control-label">Total Frieght </label>
            <div class="col-sm-10 mg-t-5 mg-sm-b-10">
              <input class="form-control" data-val="true" data-val-length="The field bodytype must be a string with a maximum length of 100." data-val-length-max="100" placeholder="Total Amount" id="hire_form_frt_total" maxlength="100" name="hire_form_frt_total" value="" type="text" disabled >
              <input class="form-control" data-val="true" data-val-length="The field bodytype must be a string with a maximum length of 100." data-val-length-max="100" placeholder="Total Amount" id="hire_form_frt_amt" maxlength="100" name="hire_form_frt_amt" value="" type="hidden">
              <span class="field-validation-valid font-red" data-valmsg-for="bodytype" data-valmsg-replace="true"></span>
            </div>
          </div>



<script>
  function hirecalc()
  {
    if((event.keyCode||event.which) != 9)
    {

      var va1 = document.getElementById('hire_form_amt').value;

      var va2 = document.getElementById('hire_form_load_crgs').value;
      var va3 = document.getElementById('hire_form_unload_crgs').value;
      var va4 = document.getElementById('hire_form_weigh_crgs').value;
      var va5 = document.getElementById('hire_form_otr_amt').value;
      if (va1 == "")
       va1 = 0;
     if (va2 == "")
       va2 = 0;
     if (va3 == "")
       va3 = 0;
     if (va4 == "")
       va4 = 0;
     if (va5 == "")
       va5 = 0;









     var total =  parseFloat(va1)+parseFloat(va2)+parseFloat(va3)+parseFloat(va4)+parseFloat(va5);

     var res = isNaN(total);
     if(res == true)
     {
      document.getElementById('hire_form_frt_total').value = 0;
      document.getElementById('hire_form_frt_amt').value = 0;
      hirecalcTotal();
    }
    else
    {
     

        document.getElementById('hire_form_frt_total').value=total;
    document.getElementById('hire_form_frt_amt').value=total;
      
      hirecalcTotal();
    }
  }}
</script>



        </div></div>

        <div class="col-xl-6">


         <div class="portlet-body">
          <div class="row mg-t-10">

            <div class="col-sm-8 mg-t-10 mg-sm-b-10"></div></div>
            <div class="portlet-body">



              <div class="col-md-4">
               <div class="row mg-t-10"> 

               </div></div>




               <div class="row mg-t-10">

                <div class="col-sm-8 mg-t-10 mg-sm-b-10"></div></div>




                <div class="row mg-t-10">
                  <label class="col-md-2 form-control-label">Chn. Advance </label>
                  <div class="col-sm-4 mg-t-5 mg-sm-b-10">
                    <input class="form-control" data-val="true" data-val-length="The field insurancename must be a string with a maximum length of 200." data-val-length-max="200" placeholder="0" id="hire_form_chn_adv" maxlength="200" name="hire_form_chn_adv" type="text" value="" onkeyup="hireadv()">
                    <span class="field-validation-valid font-red" data-valmsg-for="insurancename" data-valmsg-replace="true"></span>
                  </div>
                  <label class="col-md-2 form-control-label">Pay Type </label>
                  <div class="col-sm-4 mg-t-5 mg-sm-b-10">
                   <select class="form-control" data-val="true" data-val-number="The field maritialstatus must be a number." placeholder="The maritialstatus field is required." id="" name="ldhadvpayt">
                    <option value="">---Mode of Pay---</option>
                    <option <?php if($insid[0]['maritialstat']=="1") echo 'selected="selected"'; ?>  value="Cheque">Cheque</option>
                    <option <?php if($insid[0]['maritialstat']=="2") echo 'selected="selected"'; ?> value="Cash">Cash</option>
                    <script >

                      document.getElementById('ldhadvpayt').addEventListener('change', function () {
                        var style = this.value == "Cheque" ? 'block' : 'none';
                        document.getElementById('Bankdiv').style.display = style;



                      });
                    </script>
                  </select>
                </div>

              </div>

              <div id="Bankdiv">
                <div class="row mg-t-10">
                  <label class="col-md-2 form-control-label">Bank Name</label>
                  <div class="col-sm-4 mg-t-5 mg-sm-b-10">
                    <input class="form-control" data-val="true" data-val-length="The field insurancename must be a string with a maximum length of 200." data-val-length-max="200" placeholder="Bank Name" id="" maxlength="200" name="hire_form_chn_bank" type="text" value="">
                    <span class="field-validation-valid font-red" data-valmsg-for="insurancename" data-valmsg-replace="true"></span>
                  </div>

                  <label class="col-md-2 form-control-label">Cheque No</label>
                  <div class="col-sm-4 mg-t-5 mg-sm-b-10">
                    <input class="form-control" data-val="true" data-val-length="The field permitno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Cheque Number" id="" maxlength="50" name="hire_form_chn_cque" type="text" value="">
                    <span class="field-validation-valid font-red" data-valmsg-for="permitno" data-valmsg-replace="true"></span>
                  </div>
                </div></div>


                <div class="row mg-t-10">
                  <label class="col-md-2 form-control-label">MKM Advance </label>
                  <div class="col-sm-4 mg-t-5 mg-sm-b-10">
                    <input class="form-control" data-val="true" data-val-length="The field insurancename must be a string with a maximum length of 200." data-val-length-max="200" placeholder="0" id="hire_form_mkm_adv" maxlength="200" name="hire_form_mkm_adv" type="text" value="" onkeyup="hireadv()">
                    <span class="field-validation-valid font-red" data-valmsg-for="insurancename" data-valmsg-replace="true"></span>
                  </div>
                  <label class="col-md-2 form-control-label">Pay Type </label>
                  <div class="col-sm-4 mg-t-5 mg-sm-b-10">
                   <select class="form-control" data-val="true" data-val-number="The field maritialstatus must be a number." placeholder="The maritialstatus field is required." id="" name="mkmpaytype">
                    <option value="">---Mode of Pay---</option>
                    <option <?php if($insid[0]['maritialstat']=="1") echo 'selected="selected"'; ?>  value="Cheque">Cheque</option>
                    <option <?php if($insid[0]['maritialstat']=="2") echo 'selected="selected"'; ?> value="Cash">Cash</option>
                    <script >

                      document.getElementById('mkmpaytype').addEventListener('change', function () {
                        var style = this.value == "Cheque" ? 'block' : 'none';
                        document.getElementById('mkmbankdiv').style.display = style;



                      });
                    </script>
                  </select>
                </div>

              </div>

              <div id="mkmbankdiv">
                <div class="row mg-t-10">
                  <label class="col-md-2 form-control-label">Bank Name</label>
                  <div class="col-sm-4 mg-t-5 mg-sm-b-10">
                    <input class="form-control" data-val="true" data-val-length="The field insurancename must be a string with a maximum length of 200." data-val-length-max="200" placeholder="Bank Name" id="" maxlength="200" name="hire_form_mkm_bank" type="text" value="">
                    <span class="field-validation-valid font-red" data-valmsg-for="insurancename" data-valmsg-replace="true"></span>
                  </div>

                  <label class="col-md-2 form-control-label">Cheque No</label>
                  <div class="col-sm-4 mg-t-5 mg-sm-b-10">
                    <input class="form-control" data-val="true" data-val-length="The field permitno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Cheque Number" id="" maxlength="50" name="hire_form_mkm_cque" type="text" value="">
                    <span class="field-validation-valid font-red" data-valmsg-for="permitno" data-valmsg-replace="true"></span>
                  </div>
                </div></div>








                <div class="row mg-t-10">

                  <label class="col-md-2 form-control-label">Total Advance </label>
                  <div class="col-sm-10 mg-t-5 mg-sm-b-10">
                    <input class="form-control" data-val="true" data-val-length="The field bodytype must be a string with a maximum length of 100." data-val-length-max="100" placeholder="0" id="hire_form_adv_total" maxlength="100" name="hire_form_adv_total" value="" type="text" disabled >
                    <input class="form-control" data-val="true" data-val-length="The field bodytype must be a string with a maximum length of 100." data-val-length-max="100" placeholder="0" id="hire_form_adv_amt" maxlength="100" name="hire_form_adv_amt" value="" type="hidden" >
                    <span class="field-validation-valid font-red" data-valmsg-for="bodytype" data-valmsg-replace="true"></span>
                  </div>
                </div>


                <div class="row mg-t-10">
                  <label class="col-md-2 form-control-label">Diesel Adv.:</label>
                  <div class="col-sm-4 mg-t-5 mg-sm-b-10">
                    <input class="form-control" data-val="true" data-val-length="The field permitno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="0" id="hire_form_adv_diesel" maxlength="50" name="hire_form_adv_diesel" type="text" value="" onkeyup="hirecalcTotal()">

                    <span class="field-validation-valid font-red" data-valmsg-for="permitno" data-valmsg-replace="true"></span>
                  </div>

                  <label class="col-md-2 form-control-label">Diesel Qty.:</label>
                  <div class="col-sm-4 mg-t-5 mg-sm-b-10">
                    <input class="form-control" data-val="true" data-val-length="The field permitno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="0" id="" maxlength="50" name="hire_form_diesel_qty" type="text" value="">
                    <span class="field-validation-valid font-red" data-valmsg-for="permitno" data-valmsg-replace="true"></span>
                  </div>
                </div>





                <div class="row mg-t-10">

                  <label class="col-md-2 form-control-label">Hire Balance </label>
                  <div class="col-sm-10 mg-t-5 mg-sm-b-10">
                    <input class="form-control" data-val="true" data-val-length="The field bodytype must be a string with a maximum length of 100." data-val-length-max="100" placeholder="0" id="hire_form_balance" maxlength="100" name="hire_form_balance" value="" type="text" disabled >

                    <input class="form-control" data-val="true" data-val-length="The field bodytype must be a string with a maximum length of 100." data-val-length-max="100" placeholder="0" id="hire_form_bal" maxlength="100" name="hire_form_bal" value="" type="hidden"  >
                    <span class="field-validation-valid font-red" data-valmsg-for="bodytype" data-valmsg-replace="true"></span>
                  </div>
                </div>
<script>
  function hireadv()
  {
    if((event.keyCode||event.which) != 9)
    {

      var va1 = document.getElementById('hire_form_chn_adv').value;
      var va2 = document.getElementById('hire_form_mkm_adv').value;
      if (va1 == "")
       va1 = 0;
     if (va2 == "")
       va2 = 0;

     var total =  parseFloat(va1)+parseFloat(va2);

     var res = isNaN(total);
     if(res == true)
     {
      document.getElementById('hire_form_adv_total').value = 0;
      document.getElementById('hire_form_adv_amt').value = 0;
      hirecalcTotal();
    }
    else
    {
     

        document.getElementById('hire_form_adv_total').value=total;
    document.getElementById('hire_form_adv_amt').value=total;
      
      hirecalcTotal();
    }
  }}
</script>

<script>

/*-------------------*************************Important***************----------------------------------
                       Calculation must be Refered and changes must be done before Deployment*/



  function hirecalcTotal()
  {
    if((event.keyCode||event.which) != 9)
    {

      var va1 = document.getElementById('hire_form_frt_total').value;
      var va2 = document.getElementById('hire_form_adv_diesel').value;
      var va3 = document.getElementById('hire_form_adv_total').value;
      if (va1 == "")
       va1 = 0;
     if (va2 == "")
       va2 = 0;
     if (va3 == "")
       va3 = 0;

     var total =  parseFloat(va1)-parseFloat(va2)-parseFloat(va3);
alert(total);
     var res = isNaN(total);
     if(res == true)
     {
      document.getElementById('hire_form_balance').value = 0;
      document.getElementById('hire_form_bal').value = 0;
      
    }
    else
    {
     

        document.getElementById('hire_form_balance').value=total;
    document.getElementById('hire_form_bal').value=total;
      
      
    }
  }}
</script>

              </div>
            </div>
          </div>
        </div></div></div>



</div>

<div id="hidden_div4">

 <div class="am-pagebody">
   <div class="card pd-20 form-layout form-layout-4">
     <div class="row row-sm ">
      <div class="col-xl-6">

        <div class="portlet-body">

          <div class="col-md-4">
           <div class="row mg-t-10"> 
             <h6 class="card-body-title">OnRoad Details</h6>
           </div></div>

          <div class="row mg-t-10">
            <label class="col-md-4 form-control-label">From </label>
            <div class="col-sm-8 mg-t-10 mg-sm-b-10">
              <input class="form-control" data-val="true" data-val-length="The field permitno must be a string with a maximum length of 50." data-val-length-max="50"  id="ordfrom" maxlength="50" name="ordfrom" type="text" value="" disabled>
              <input class="form-control" data-val="true" data-val-length="The field permitno must be a string with a maximum length of 50." data-val-length-max="50"  id="ordfromh" maxlength="50" name="ordfromh" type="hidden" value="" >
              <span class="field-validation-valid font-red" data-valmsg-for="permitno" data-valmsg-replace="true"></span>
            </div>
          </div> 



          <div class="row mg-t-10">
            <label class="col-md-4 form-control-label">To </label>
            <div class="col-sm-8 mg-t-10 mg-sm-b-10">
              <input class="form-control" data-val="true" data-val-length="The field permitno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="To Place" id="ordto" maxlength="50" name="ordto" type="text" value="" >



              <span class="field-validation-valid font-red" data-valmsg-for="permitno" data-valmsg-replace="true"></span>
            </div>
          </div> 

          <div class="row mg-t-10">

            <label class="col-md-4 form-control-label">Driver </label>
            <div class="col-sm-8 mg-t-10 mg-sm-b-10">
              <input class="form-control" data-val="true" data-val-length="The field bodytype must be a string with a maximum length of 100." data-val-length-max="100" placeholder="Current Driver Name" id="orddriver" maxlength="100" name="orddriver" type="text" value="" readonly >
               <input class="form-control" data-val="true" data-val-length="The field bodytype must be a string with a maximum length of 100." data-val-length-max="100" id="orddriverh" maxlength="100" name="orddriverh" type="hidden">
              <span class="field-validation-valid font-red" data-valmsg-for="bodytype" data-valmsg-replace="true"></span>
 <select   name="ordcgename" id="ordcgename" class="form-control"  >
                 <option value="">Change Driver </option>
                 <?php $query =mysqli_query($conn,"SELECT * FROM drivers ");
                 while($row=mysqli_fetch_array($query))
                  { ?>
                    <option value="<?php echo $row['id'];?>" ><?php echo $row['name'];?></option>
                    <?php
                  }
                  ?>
                </select>
                <span class="field-validation-valid font-red" data-valmsg-for="permitno" data-valmsg-replace="true"></span>

             

            </div>
          </div>
  

       
          <div class="row mg-t-10">
            <label class="col-md-4 form-control-label"> Advance </label>
            <div class="col-sm-8 mg-t-10 mg-sm-b-10">
              <input class="form-control" data-val="true" data-val-length="The field permitno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Advance Amount" id="on_road_adv" maxlength="50" name="on_road_adv" type="text" value="" >
              <span class="field-validation-valid font-red" data-valmsg-for="permitno" data-valmsg-replace="true"></span>
            </div>
          </div> 

          <div class="row mg-t-10">
            <label class="col-md-4 form-control-label"> Amount Place </label>
            <div class="col-sm-8 mg-t-10 mg-sm-b-10">
<select   name="amt_place" id="amt_place" class="form-control"  >
                 <option value="">Chennai </option>
 <option value="">Maduranthagam </option>

</select>

<!-- 
              <input class="form-control" data-val="true" data-val-length="The field permitno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Advance Amount" id="on_road_adv" maxlength="50" name="on_road_adv" type="text" value="" > -->
              <span class="field-validation-valid font-red" data-valmsg-for="permitno" data-valmsg-replace="true"></span>
            </div>
          </div> 
 



        </div>
      </div>
    </div>






  </div>

</div>



<div id="dieseldiv">



      <div class="am-pagebody" >

 <div class="card  pd-sm-t-10 pd-sm-b-10 pd-sm-l-0 mg-l-0">

       <div class="row row-sm mg-t-0 pd-sm-l-30 pd-sm-r-30">

          <div class="col-xl-12 col-md-12 mg-l-0 pd-sm-l-0-force pd-sm-r-0-force">

           

            <div class="portlet-body">

       


      <div align="right" style="float: right;">
     <button type="button" name="add" id="add" class="btn btn-info">Add New Entry</button>
    </div>
       <div class="mg-t-10 col-sm-8 pd-sm-l-0 pd-sm-r-0 pd-sm-t-15"> 
             <h6 class="card-body-title">Diesel Entries</h6>
           </div>
           


 <div class="col-sm-12 mg-t-30 pd-sm-l-0 pd-sm-r-0" id="responsecontainer">
                                                  
        <div class="col-sm-10 mg-t-5 mg-sm-b-10">


 <div class="col-xl">
  
</div>
      </div>





                   </div></div></div>



                   <div class="modal fade" id="demoModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<!-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> -->

       <div class="col-xl-12 col-lg-12">

          


<div class="row mg-t-10">
          <label class="col-md-4 col-sm-4 form-control-label">Date</label>
          <div class="col-sm-8 mg-t-5 mg-sm-b-10 ">
           <div class="input-group">
              <span class="input-group-addon"><i class="icon ion-calendar tx-16 lh-0 op-6"></i></span>
              <input class="form-control datepicker" placeholder="Cash Date" name="datepicker_onroad" id="datepicker_onroad" type="text" value="<?php echo date('d/m/Y');?>" >
            </div>
        </div>
      </div>



       <div class="row mg-t-10">
        <label class="col-md-4 col-sm-4 form-control-label">Vechicle Number</label>
        <div class="col-sm-8 mg-t-5 mg-sm-b-10">
          <input class="form-control" data-val="true" data-val-length="The field engineno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Driver Name" id="die_vechno" maxlength="50" name="upd_driver" type="text"  disabled>
          <span class="field-validation-valid font-red" data-valmsg-for="engineno" data-valmsg-replace="true"></span>
        </div>
      </div>  

      <div class="row mg-t-10">
        <label class="col-md-4 col-sm-4 form-control-label">Driver</label>
        <div class="col-sm-8 mg-t-5 mg-sm-b-10">
          <input class="form-control" data-val="true" data-val-length="The field engineno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Driver Name" id="die_driver" maxlength="50" name="driver" type="text" value="" disabled>
            <input class="form-control" data-val="true" data-val-length="The field engineno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Driver Name" id="die_driver_id" maxlength="50" name="driver" type="hidden">
          <span class="field-validation-valid font-red" data-valmsg-for="engineno" data-valmsg-replace="true"></span>
        </div>
      </div>  
        
      <div class="row mg-t-10">
        <label class="col-md-4 col-sm-4 form-control-label">Vendor</label>
        <div class="col-sm-8 mg-t-5 mg-sm-b-10">
<!--           <input class="form-control" data-val="true" data-val-length="The field engineno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Vendor Name" id="vendor" maxlength="50" name="vendor" type="text" value=""> -->

<?php
$vendor=mysqli_query($conn,"SELECT * from ledger WHERE nature='Diesel Station'; "); 

?>
<select class="form-control" data-val="true" placeholder="Vendor Name" id="vendor" name="vendor" >
<?php

while($vend = mysqli_fetch_array($vendor))
{
?>
<option  value="<?php echo $vend['name']; ?>"><?php echo $vend['name']; ?></option>

<?php
}

?>
</select>








          <span class="field-validation-valid font-red" data-valmsg-for="engineno" data-valmsg-replace="true"></span>
        </div>
      </div>
<div class="row mg-t-10">
        <label class="col-md-4 col-sm-4 form-control-label">Place</label>
        <div class="col-sm-8 mg-t-5 mg-sm-b-10">
          <input class="form-control" data-val="true" data-val-length="The field engineno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Vendor Location" id="place" maxlength="50" name="place" type="text" value="">
          <span class="field-validation-valid font-red" data-valmsg-for="engineno" data-valmsg-replace="true"></span>
        </div>
      </div>


     


      <div class="row mg-t-10">
        <label class="col-md-4 col-sm-4 form-control-label">Quantity</label>
        <div class="col-sm-3 mg-t-5 mg-sm-b-10">
          <input class="form-control" data-val="true" data-val-length="The field insurancename must be a string with a maximum length of 200." data-val-length-max="200" placeholder="Quantity" id="qty" maxlength="200" name="qty" type="text" value="" onkeyup="diecalDie()">
          <span class="field-validation-valid font-red" data-valmsg-for="insurancename" data-valmsg-replace="true"></span>
        </div>

        <label class="col-md-3 col-sm-3 form-control-label">Price Per Litre</label>
        <div class="col-sm-2 mg-t-5 mg-sm-b-10">
          <input class="form-control" data-val="true" data-val-length="The field permitno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="0" id="ppl" maxlength="50" name="ppl" type="text" value="" disabled>
          <input class="form-control" data-val="true" data-val-length="The field permitno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="0" id="pplh" maxlength="50" name="pplh" type="hidden" value="" >
          <span class="field-validation-valid font-red" data-valmsg-for="permitno" data-valmsg-replace="true"></span>
        </div>
      </div>
      <div class="row mg-t-10">
        <label class="col-md-4 col-sm-4 form-control-label">Amount</label>
        <div class="col-sm-8 mg-t-5 mg-sm-b-10">
          <input class="form-control" data-val="true" data-val-length="The field insurancename must be a string with a maximum length of 200." data-val-length-max="200" placeholder="Diesel Amount" id="amt" maxlength="200" name="amt" type="text" value="" onkeyup="diecalDie()">
          <span class="field-validation-valid font-red" data-valmsg-for="insurancename" data-valmsg-replace="true" ></span>
        </div>
      </div>

 <div class="row mg-t-10">


        <label class="col-md-4 col-sm-4 form-control-label">Pay Type</label>                                                    
        <div class="col-sm-8 mg-t-5 mg-sm-b-10">

          <select class="form-control valid" data-val="true" placeholder="Select bilty paid type" id="billtype" name="billtype" style="padding:0px 6px !important;">
            <option <?php if($insid[0]['billtype']=="To Be Billed") echo 'selected="selected"'; ?> value="Cash">Cash</option>
            <option <?php if($insid[0]['billtype']=="Paid") echo 'selected="selected"'; ?> value="Credit">Credit</option>

            <option <?php if($insid[0]['billtype']=="Paid") echo 'selected="selected"'; ?> value="Driver Cash">Driver Cash</option>
            
          </select>
</div></div>
       
<div class="modal-footer pd-r-0">
<button type="button"  class="btn btn-default" data-dismiss="modal">Close</button>
<button type="button" id="insert" class="btn btn-primary">Save changes</button>
</div>
</div>
</div> </div>
     
</div>
</div>
                    
  </div>


   <div class="modal fade" id="editModel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<!-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> -->

       <div class="col-xl-12 col-lg-12">

          

<input   name="upd_id" id="upd_id" type="hidden"  >
<div class="row mg-t-10">
          <label class="col-md-4 col-sm-4 form-control-label">Date</label>
          <div class="col-sm-8 mg-t-5 mg-sm-b-10 ">
           <div class="input-group">
              <span class="input-group-addon"><i class="icon ion-calendar tx-16 lh-0 op-6"></i></span>
              <input class="form-control datepicker" placeholder="Cash Date" name="datepicker_onroad_upd" id="datepicker_onroad_upd" type="text"  >
            </div>
        </div>
      </div>
      
<!--       <div class="row mg-t-10">
        <label class="col-md-4 col-sm-4 form-control-label">Driver</label>
        <div class="col-sm-8 mg-t-5 mg-sm-b-10">
          <input class="form-control" data-val="true" data-val-length="The field engineno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Driver Name" id="upd_driver" maxlength="50" name="upd_driver" type="text"  disabled>
          <span class="field-validation-valid font-red" data-valmsg-for="engineno" data-valmsg-replace="true"></span>
        </div>
      </div>  --> 
        
      <div class="row mg-t-10">
        <label class="col-md-4 col-sm-4 form-control-label">Vendor</label>
        <div class="col-sm-8 mg-t-5 mg-sm-b-10">
          <!-- <input class="form-control" data-val="true" data-val-length="The field engineno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Vendor Name" id="upd_vendor" maxlength="50" name="upd_vendor" type="text" > -->

<?php
$vendor=mysqli_query($conn,"SELECT * from ledger WHERE nature='Diesel Station'; "); 

?>
<select class="form-control" data-val="true" placeholder="Vendor Name" id="upd_vendor" name="upd_vendor" >
<?php

while($vend = mysqli_fetch_array($vendor))
{
?>
<option  value="<?php echo $vend['name']; ?>"><?php echo $vend['name']; ?></option>

<?php
}

?>
</select>



          <span class="field-validation-valid font-red" data-valmsg-for="engineno" data-valmsg-replace="true"></span>
        </div>
      </div>
<div class="row mg-t-10">
        <label class="col-md-4 col-sm-4 form-control-label">Place</label>
        <div class="col-sm-8 mg-t-5 mg-sm-b-10">
          <input class="form-control" data-val="true" data-val-length="The field engineno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Vendor Location" id="upd_place" maxlength="50" name="upd_place" type="text">
          <span class="field-validation-valid font-red" data-valmsg-for="engineno" data-valmsg-replace="true"></span>
        </div>
      </div>


     


      <div class="row mg-t-10">
        <label class="col-md-4 col-sm-4 form-control-label">Quantity</label>
        <div class="col-sm-3 mg-t-5 mg-sm-b-10">
          <input class="form-control" data-val="true" data-val-length="The field insurancename must be a string with a maximum length of 200." data-val-length-max="200" placeholder="Quantity" id="upd_qty" maxlength="200" name="upd_qty" type="text"  onkeyup="diecal2()">
          <span class="field-validation-valid font-red" data-valmsg-for="insurancename" data-valmsg-replace="true"></span>
        </div>

        <label class="col-md-3 col-sm-3 form-control-label">Price Per Litre</label>
        <div class="col-sm-2 mg-t-5 mg-sm-b-10">
          <input class="form-control" data-val="true" data-val-length="The field permitno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="0" id="upd_ppl" maxlength="50" name="upd_ppl" type="text" value="" disabled>
          <input class="form-control" data-val="true" data-val-length="The field permitno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="0" id="pplh" maxlength="50" name="pplh" type="hidden" value="" >
          <span class="field-validation-valid font-red" data-valmsg-for="permitno" data-valmsg-replace="true"></span>
        </div>
      </div>
      <div class="row mg-t-10">
        <label class="col-md-4 col-sm-4 form-control-label">Amount</label>
        <div class="col-sm-8 mg-t-5 mg-sm-b-10">
          <input class="form-control" data-val="true" data-val-length="The field insurancename must be a string with a maximum length of 200." data-val-length-max="200" placeholder="Diesel Amount" id="upd_amt" maxlength="200" name="upd_amt" type="text" onkeyup="diecal2()">
          <span class="field-validation-valid font-red" data-valmsg-for="insurancename" data-valmsg-replace="true" ></span>
        </div>
      </div>

 <div class="row mg-t-10">


        <label class="col-md-4 col-sm-4 form-control-label">Pay Type</label>                                                    
        <div class="col-sm-8 mg-t-5 mg-sm-b-10">

          <select class="form-control valid" data-val="true" placeholder="Select bilty paid type" id="upd_billtype" name="upd_billtype" style="padding:0px 6px !important;">
            <option <?php if($insid[0]['billtype']=="To Be Billed") echo 'selected="selected"'; ?> value="Cash">Cash</option>
            <option <?php if($insid[0]['billtype']=="Paid") echo 'selected="selected"'; ?> value="Credit">Credit</option>

            <option <?php if($insid[0]['billtype']=="Paid") echo 'selected="selected"'; ?> value="Driver Cash">Driver Cash</option>
            
          </select>
</div></div>
       
<div class="modal-footer pd-r-0">
<button type="button"  class="btn btn-default" data-dismiss="modal">Close</button>
<button type="button" id="update" class="btn btn-primary">Save changes</button>
</div>
</div></div></div>
</div> </div></div>
<!-- 
                       <div class="form-layout-footerpd-sm-40">
                <button id="sub"  type="submit" value="submit" name="submit" class="btn btn-info mg-r-5">Submit</button>
                 <input type="hidden" name="action" value="<?php if($_REQUEST['flag'] =='Edit') echo $_REQUEST['flag']; else echo 'Add'; ?>"> 
                <button class="btn btn-secondary">Cancel</button>
              </div> -->






 
 



 <script >
$(function () {
$("#add").click(function(){
$('#demoModal').modal('show');
var dte=$('#myVariable').val();
$('#datepicker_onroad').val(dte);

});
});
</script>

<script>

  $(document).on('click', '#update', function(){
   var dat = $('#datepicker_onroad_upd').val();
   var fid = $('#upd_id').val();
   var dri = $('#upd_driver').val();
   var ven = $('#upd_vendor').val();
   var pla = $('#upd_place').val();
   var qt = $('#upd_qty').val();
   var pp = $('#upd_ppl').val();
   var at = $('#upd_amt').val();
   var bill = $('#upd_billtype').val();
   var vech="";

$.ajax({
     url:"fuelins.php",
     method:"POST",
     data:{date:dat, id:fid, vechno:vech, driver:dri, vendor:ven, place:pla, qty:qt, pricepl:pp, amount:at, billpay:bill},
     success:function(data)
     {
      /*alert(data);*/
      fetch_data();
      $('#editModel').modal('hide');

   $('#upd_vendor').val("");
   $('#upd_place').val("");
   $('#upd_qty').val("");
   $('#upd_ppl').val("");
   $('#upd_amt').val("");
   $('#upd_billtype').val("");




       }
    });

  });
</script>




<!-- <script>
  document.addEventListener("DOMContentLoaded", function() {
/*fetch_data();*/

});
</script> -->
<!-- <script>

/*  Table View*/
  $('#mVechno').change(function(){
 fetch_data();
  });
</script> -->






<script>

  $(document).on('click', '#insert', function(){



   var dat = $('#datepicker_onroad').val();
   var vno = $('#mVechno').val();
   var tid = $('#ret_tripid').val();

   var dri = $('#die_driver_id').val();

   var ven = $('#vendor').val();
   var pla = $('#place').val();
   var qt = $('#qty').val();
   var pp = $('#ppl').val();
   var at = $('#amt').val();
   var bill = $('#billtype').val();

 if(vno != '')
 {

$.ajax({
     url:"fuelins.php",
     method:"POST",
     data:{date:dat, vechno:vno, tripid:tid, driver:dri, vendor:ven, place:pla, qty:qt, pricepl:pp, amount:at, billpay:bill},
     success:function(data)
     {
     /* alert(data);*/
      fetch_data();

 $('#vendor').val("");
 $('#place').val("");
 $('#qty').val("");
 $('#ppl').val("");
 $('#amt').val("");
 $('#billtype').val("");

      $('#demoModal').modal('hide');


     }
    });

 }
 else
 {

alert("Please Select Vehicle Number")

 }

  });
</script>



      </div><!-- am-pagebody -->
     



<!-- <script>
   function getdetails(val) {
    $.ajax({
      type: "POST",
      type: "POST",
      url: "get_details.php",
      data:'vech_id='+val,
      dataType: "json",
      success: function(data){
        
        if(data.trip == null)
        {
        $("#driver").val('Not Assigned');
        $("#tripid").val('Not On Trip');
        } 
        else{
          $("#driver").val(data.driver);
        $("#tripid").val(data.trip);
        $("#vno").val(val);
        
        }

         /*$("#hltplace").val(data.from);
          */
        }
      });
  }
</script> -->
<script>
  function diecalDie()
  {
    if((event.keyCode||event.which) != 9)
    {


      var die1 = document.getElementById('qty').value;
      var die2 = document.getElementById('amt').value;
      if (die1 == "")
       die1 = 0;
     if (die2 == "")
       die2 = 0;

     var total =  parseFloat(die2)/parseFloat(die1);

     var res = isNaN(total);
     if(res == true)
     {
      document.getElementById('ppl').value = 0;
      document.getElementById('pplh').value = 0;

    }
    else
    {
      document.getElementById('ppl').value=total;
      document.getElementById('pplh').value=total;
    }
  }}
</script>
<script>
  function diecal2()
  {
    if((event.keyCode||event.which) != 9)
    {


      var die1 = document.getElementById('upd_qty').value;
      var die2 = document.getElementById('upd_amt').value;
      if (die1 == "")
       die1 = 0;
     if (die2 == "")
       die2 = 0;

     var total =  parseFloat(die2)/parseFloat(die1);

     var res = isNaN(total);
     if(res == true)
     {
      document.getElementById('upd_ppl').value = 0;

    }
    else
    {
      document.getElementById('upd_ppl').value=total;

    }
  }}
</script>


</div>
</div>










<div id="hidden_div7">

 <div class="am-pagebody">
   <div class="card pd-20 form-layout form-layout-4">
     <div class="row row-sm ">
      <div class="col-xl-6">

        <div class="portlet-body">



          <div class="col-md-4">
           <div class="row mg-t-10"> 
             <h6 class="card-body-title">Halt Entry</h6>
           </div></div>

          <div class="row mg-t-10">
            <label class="col-md-4 form-control-label">Halt Place </label>
            <div class="col-sm-8 mg-t-10 mg-sm-b-10">
              <input class="form-control" data-val="true" data-val-length="The field permitno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Enter Description" id="hltplace" maxlength="50" name="halt_place" type="text" value="" >
              <span class="field-validation-valid font-red" data-valmsg-for="permitno" data-valmsg-replace="true"></span>
            </div>
          </div> 
         
            <div class="row mg-t-10">

              <label class="col-md-4 form-control-label">Driver </label>
              <div class="col-sm-8 mg-t-10 mg-sm-b-10">
                <input class="form-control" data-val="true" data-val-length="The field bodytype must be a string with a maximum length of 100." data-val-length-max="100" placeholder="Enter Driver Name" id="hltdriver" maxlength="100" name="hltdriver" type="text" value="" readonly>
                <input class="form-control" data-val="true" data-val-length="The field bodytype must be a string with a maximum length of 100." data-val-length-max="100" placeholder="Enter Driver Name" id="hltdriverh" maxlength="100" name="hltdriverh" type="hidden">
                <span class="field-validation-valid font-red" data-valmsg-for="bodytype" data-valmsg-replace="true"></span>

<select   name="cge_driver" id="cge_driver" class="form-control"  >
                 <option value="">Change Driver </option>
                 <?php $query =mysqli_query($conn,"SELECT * FROM drivers ");
                 while($row=mysqli_fetch_array($query))
                  { ?>
                    <option value="<?php echo $row['id'];?>" ><?php echo $row['name'];?></option>
                    <?php
                  }
                  ?>
                </select>
                <span class="field-validation-valid font-red" data-valmsg-for="permitno" data-valmsg-replace="true"></span>



              </div>
            </div> 
    <div class="row mg-t-10">
            <label class="col-md-4 form-control-label">Halt Amount </label>
            <div class="col-sm-8 mg-t-10 mg-sm-b-10">
              <input class="form-control" data-val="true" data-val-length="The field permitno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Enter Amount" id="halt_cost" maxlength="50" name="halt_cost" type="text" value="" >
              <span class="field-validation-valid font-red" data-valmsg-for="permitno" data-valmsg-replace="true"></span>
            </div>
          </div> 






          </div>
        </div>
      </div>
    </div>
  </div>















<div id="dieseldiv_halt">



      <div class="am-pagebody" >

 <div class="card  pd-sm-t-10 pd-sm-b-10 pd-sm-l-0 mg-l-0">

       <div class="row row-sm mg-t-0 pd-sm-l-30 pd-sm-r-30">

          <div class="col-xl-12 col-md-12 mg-l-0 pd-sm-l-0-force pd-sm-r-0-force">

           

            <div class="portlet-body">

       


      <div align="right" style="float: right;">
     <button type="button" name="add" id="add_die_halt" class="btn btn-info">Add New Entry</button>
    </div>
       <div class="mg-t-10 col-sm-8 pd-sm-l-0 pd-sm-r-0 pd-sm-t-15"> 
             <h6 class="card-body-title">Diesel Entries</h6>
           </div>
           


 <div class="col-sm-12 mg-t-30 pd-sm-l-0 pd-sm-r-0" id="responsecontainer_halt">
                                                  
        <div class="col-sm-10 mg-t-5 mg-sm-b-10">


 <div class="col-xl">
  
</div>
      </div>





                   </div></div></div>



                   <div class="modal fade" id="halt_die_add" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<!-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> -->

       <div class="col-xl-12 col-lg-12">

          


<div class="row mg-t-10">
          <label class="col-md-4 col-sm-4 form-control-label">Date</label>
          <div class="col-sm-8 mg-t-5 mg-sm-b-10 ">
           <div class="input-group">
              <span class="input-group-addon"><i class="icon ion-calendar tx-16 lh-0 op-6"></i></span>
              <input class="form-control datepicker" placeholder="Cash Date" name="datepicker_halt" id="datepicker_halt" type="text" value="<?php echo date('d/m/Y');?>" >
            </div>
        </div>
      </div>

       <div class="row mg-t-10">
        <label class="col-md-4 col-sm-4 form-control-label">Vechicle Number</label>
        <div class="col-sm-8 mg-t-5 mg-sm-b-10">
          <input class="form-control" data-val="true" data-val-length="The field engineno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Driver Name" id="halt_die_vechno" maxlength="50" name="upd_driver" type="text"  disabled>
          <span class="field-validation-valid font-red" data-valmsg-for="engineno" data-valmsg-replace="true"></span>
        </div>
      </div>  

      <div class="row mg-t-10">
        <label class="col-md-4 col-sm-4 form-control-label">Driver</label>
        <div class="col-sm-8 mg-t-5 mg-sm-b-10">
          <input class="form-control" data-val="true" data-val-length="The field engineno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Driver Name" id="halt_die_driver" maxlength="50" name="driver" type="text" value="" disabled>
          <input class="form-control" data-val="true" data-val-length="The field engineno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Driver Name" id="halt_die_driver_h" maxlength="50" name="halt_die_driver" type="hidden">
          <span class="field-validation-valid font-red" data-valmsg-for="engineno" data-valmsg-replace="true"></span>
        </div>
      </div>  
        
      <div class="row mg-t-10">
        <label class="col-md-4 col-sm-4 form-control-label">Vendor</label>
        <div class="col-sm-8 mg-t-5 mg-sm-b-10">
          <!-- <input class="form-control" data-val="true" data-val-length="The field engineno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Vendor Name" id="halt_die_vendor" maxlength="50" name="vendor" type="text" value=""> -->



          <?php
$vendor=mysqli_query($conn,"SELECT * from ledger WHERE nature='Diesel Station'; "); 

?>
<select class="form-control" data-val="true" placeholder="Vendor Name" id="halt_die_vendor" name="vendor" >
<?php

while($vend = mysqli_fetch_array($vendor))
{
?>
<option  value="<?php echo $vend['name']; ?>"><?php echo $vend['name']; ?></option>

<?php
}

?>
</select>



          <span class="field-validation-valid font-red" data-valmsg-for="engineno" data-valmsg-replace="true"></span>
        </div>
      </div>
<div class="row mg-t-10">
        <label class="col-md-4 col-sm-4 form-control-label">Place</label>
        <div class="col-sm-8 mg-t-5 mg-sm-b-10">
          <input class="form-control" data-val="true" data-val-length="The field engineno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Vendor Location" id="halt_die_place" maxlength="50" name="place" type="text" value="">
          <span class="field-validation-valid font-red" data-valmsg-for="engineno" data-valmsg-replace="true"></span>
        </div>
      </div>


     


      <div class="row mg-t-10">
        <label class="col-md-4 col-sm-4 form-control-label">Quantity</label>
        <div class="col-sm-3 mg-t-5 mg-sm-b-10">
          <input class="form-control" data-val="true" data-val-length="The field insurancename must be a string with a maximum length of 200." data-val-length-max="200" placeholder="Quantity" id="halt_die_qty" maxlength="200" name="qty" type="text" value="" onkeyup="diecalHalt()">
          <span class="field-validation-valid font-red" data-valmsg-for="insurancename" data-valmsg-replace="true"></span>
        </div>

        <label class="col-md-3 col-sm-3 form-control-label">Price Per Litre</label>
        <div class="col-sm-2 mg-t-5 mg-sm-b-10">
          <input class="form-control" data-val="true" data-val-length="The field permitno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="0" id="halt_die_ppl" maxlength="50" name="ppl" type="text" value="" disabled>
          <span class="field-validation-valid font-red" data-valmsg-for="permitno" data-valmsg-replace="true"></span>
        </div>
      </div>
      <div class="row mg-t-10">
        <label class="col-md-4 col-sm-4 form-control-label">Amount</label>
        <div class="col-sm-8 mg-t-5 mg-sm-b-10">
          <input class="form-control" data-val="true" data-val-length="The field insurancename must be a string with a maximum length of 200." data-val-length-max="200" placeholder="Diesel Amount" id="halt_die_amt" maxlength="200" name="amt" type="text" value="" onkeyup="diecalHalt()">
          <span class="field-validation-valid font-red" data-valmsg-for="insurancename" data-valmsg-replace="true" ></span>
        </div>
      </div>

 <div class="row mg-t-10">


        <label class="col-md-4 col-sm-4 form-control-label">Pay Type</label>                                                    
        <div class="col-sm-8 mg-t-5 mg-sm-b-10">

          <select class="form-control valid" data-val="true" placeholder="Select bilty paid type" id="halt_die_billtype" name="billtype" style="padding:0px 6px !important;">
            <option <?php if($insid[0]['billtype']=="To Be Billed") echo 'selected="selected"'; ?> value="Cash">Cash</option>
            <option <?php if($insid[0]['billtype']=="Paid") echo 'selected="selected"'; ?> value="Credit">Credit</option>

            <option <?php if($insid[0]['billtype']=="Paid") echo 'selected="selected"'; ?> value="Driver Cash">Driver Cash</option>
            
          </select>
</div></div>
       
<div class="modal-footer pd-r-0">
<button type="button"  class="btn btn-default" data-dismiss="modal">Close</button>
<button type="button" id="halt_die_insert" class="btn btn-primary">Save changes</button>
</div>
</div>
</div> </div>
     
</div>
</div>
                    
  </div>


   <div class="modal fade" id="halt_editModel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<!-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> -->

       <div class="col-xl-12 col-lg-12">

          

<input   name="upd_id" id="halt_upd_id" type="hidden"  >
<div class="row mg-t-10">
          <label class="col-md-4 col-sm-4 form-control-label">Date</label>
          <div class="col-sm-8 mg-t-5 mg-sm-b-10 ">
           <div class="input-group">
              <span class="input-group-addon"><i class="icon ion-calendar tx-16 lh-0 op-6"></i></span>
              <input class="form-control datepicker" placeholder="Cash Date" name="datepicker_halt_upd" id="datepicker_halt_upd" type="text"  >
            </div>
        </div>
      </div>
      
     

 
          <input class="form-control" data-val="true" data-val-length="The field engineno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Driver Name" id="halt_upd_driver" maxlength="50" name="upd_driver" type="hidden" >
         
  
 
        
      <div class="row mg-t-10">
        <label class="col-md-4 col-sm-4 form-control-label">Vendor</label>
        <div class="col-sm-8 mg-t-5 mg-sm-b-10">
<!--           <input class="form-control" data-val="true" data-val-length="The field engineno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Vendor Name" id="halt_upd_vendor" maxlength="50" name="upd_vendor" type="text" > -->


<?php
$vendor=mysqli_query($conn,"SELECT * from ledger WHERE nature='Diesel Station'; "); 

?>
<select class="form-control" data-val="true" placeholder="Vendor Name" id="halt_upd_vendor" name="upd_vendor" >
<?php

while($vend = mysqli_fetch_array($vendor))
{
?>
<option  value="<?php echo $vend['name']; ?>"><?php echo $vend['name']; ?></option>

<?php
}

?>
</select>



          <span class="field-validation-valid font-red" data-valmsg-for="engineno" data-valmsg-replace="true"></span>
        </div>
      </div>
<div class="row mg-t-10">
        <label class="col-md-4 col-sm-4 form-control-label">Place</label>
        <div class="col-sm-8 mg-t-5 mg-sm-b-10">
          <input class="form-control" data-val="true" data-val-length="The field engineno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Vendor Location" id="halt_upd_place" maxlength="50" name="upd_place" type="text">
          <span class="field-validation-valid font-red" data-valmsg-for="engineno" data-valmsg-replace="true"></span>
        </div>
      </div>


     


      <div class="row mg-t-10">
        <label class="col-md-4 col-sm-4 form-control-label">Quantity</label>
        <div class="col-sm-3 mg-t-5 mg-sm-b-10">
          <input class="form-control" data-val="true" data-val-length="The field insurancename must be a string with a maximum length of 200." data-val-length-max="200" placeholder="Quantity" id="halt_upd_qty" maxlength="200" name="upd_qty" type="text"  onkeyup="diecalHalt2()">
          <span class="field-validation-valid font-red" data-valmsg-for="insurancename" data-valmsg-replace="true"></span>
        </div>

        <label class="col-md-3 col-sm-3 form-control-label">Price Per Litre</label>
        <div class="col-sm-2 mg-t-5 mg-sm-b-10">
          <input class="form-control" data-val="true" data-val-length="The field permitno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="0" id="halt_upd_ppl" maxlength="50" name="halt_upd_ppl" type="text" value="" disabled>
          <input class="form-control" data-val="true" data-val-length="The field permitno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="0" id="pplh" maxlength="50" name="pplh" type="hidden" value="" >
          <span class="field-validation-valid font-red" data-valmsg-for="permitno" data-valmsg-replace="true"></span>
        </div>
      </div>
      <div class="row mg-t-10">
        <label class="col-md-4 col-sm-4 form-control-label">Amount</label>
        <div class="col-sm-8 mg-t-5 mg-sm-b-10">
          <input class="form-control" data-val="true" data-val-length="The field insurancename must be a string with a maximum length of 200." data-val-length-max="200" placeholder="Diesel Amount" id="halt_upd_amt" maxlength="200" name="upd_amt" type="text" onkeyup="diecalHalt2()">
          <span class="field-validation-valid font-red" data-valmsg-for="insurancename" data-valmsg-replace="true" ></span>
        </div>
      </div>

 <div class="row mg-t-10">


        <label class="col-md-4 col-sm-4 form-control-label">Pay Type</label>                                                    
        <div class="col-sm-8 mg-t-5 mg-sm-b-10">

          <select class="form-control valid" data-val="true" placeholder="Select bilty paid type" id="halt_upd_billtype" name="upd_billtype" style="padding:0px 6px !important;">
            <option <?php if($insid[0]['billtype']=="To Be Billed") echo 'selected="selected"'; ?> value="Cash">Cash</option>
            <option <?php if($insid[0]['billtype']=="Paid") echo 'selected="selected"'; ?> value="Credit">Credit</option>

            <option <?php if($insid[0]['billtype']=="Paid") echo 'selected="selected"'; ?> value="Driver Cash">Driver Cash</option>
            
          </select>
</div></div>
       
<div class="modal-footer pd-r-0">
<button type="button"  class="btn btn-default" data-dismiss="modal">Close</button>
<button type="button" id="halt_update" class="btn btn-primary">Save changes</button>
</div>
</div></div></div>
</div> </div></div>





 





 <script >
$(function () {
$("#add_die_halt").click(function(){
$('#halt_die_add').modal('show');
var dte=$('#myVariable').val();
$('#datepicker_halt').val(dte);
});
});
</script>

<script>

  $(document).on('click', '#halt_update', function(){
   var dat = $('#datepicker_halt_upd').val();

   var fid = $('#halt_upd_id').val();
   var dri = $('#halt_upd_driver').val();
   var ven = $('#halt_upd_vendor').val();
   var pla = $('#halt_upd_place').val();
   var qt = $('#halt_upd_qty').val();
   var pp = $('#halt_upd_ppl').val();
   var at = $('#halt_upd_amt').val();
   var bill = $('#halt_upd_billtype').val();
   var vech="";

$.ajax({
     url:"fuelins.php",
     method:"POST",
     data:{date:dat, id:fid, vechno:vech, driver:dri, vendor:ven, place:pla, qty:qt, pricepl:pp, amount:at, billpay:bill},
     success:function(data)
     {
      /*alert(data);*/
      fetch_data();
      $('#halt_editModel').modal('hide');

    $('#halt_upd_vendor').val("");
    $('#halt_upd_place').val("");
    $('#halt_upd_qty').val("");
    $('#halt_upd_ppl').val("");
    $('#halt_upd_amt').val("");
    $('#halt_upd_billtype').val("");



       }
    });

  });
</script>



<!-- 
<script>
  document.addEventListener("DOMContentLoaded", function() {
fetch_data();

});
</script> -->
<!-- <script>

/*  Table View*/
  $('#mVechno').change(function(){
 fetch_data();
  });
</script> -->


<script>
function deletefuel(del_val)
{


$.ajax({
        type: "POST",
        url: "fueldel.php",
        data:'val='+del_val,
        success: function(data){ 
       fetch_data();
        }
      });


}
</script>



<script>

  $(document).on('click', '#halt_die_insert', function(){



   var dat = $('#datepicker_halt').val();
   var vno = $('#mVechno').val();
   var tid = $('#ret_tripid').val();
   var dri = $('#halt_die_driver_h').val();
   var ven = $('#halt_die_vendor').val();
   var pla = $('#halt_die_place').val();
   var qt = $('#halt_die_qty').val();
   var pp = $('#halt_die_ppl').val();
   var at = $('#halt_die_amt').val();
   var bill = $('#halt_die_billtype').val();
alert(dri);
alert(tid);




 if(vno != '')
 {

$.ajax({
     url:"fuelins.php",
     method:"POST",
     data:{date:dat, vechno:vno, tripid:tid, driver:dri, vendor:ven, place:pla, qty:qt, pricepl:pp, amount:at, billpay:bill},
     success:function(data)
     {
      /*alert(data);*/
      fetch_data();

    $('#halt_die_vendor').val("");
    $('#halt_die_place').val("");
    $('#halt_die_qty').val("");
    $('#halt_die_ppl').val("");
    $('#halt_die_amt').val("");
    $('#halt_die_billtype').val("");


     }
    });

 }
 else
 {

alert("Please Select Vehicle Number")

 }

  });
</script>


      </div><!-- am-pagebody -->
     



<script>
  function diecalHalt()
  {
    if((event.keyCode||event.which) != 9)
    {


      var die1 = document.getElementById('halt_die_qty').value;
      var die2 = document.getElementById('halt_die_amt').value;
      if (die1 == "")
       die1 = 0;
     if (die2 == "")
       die2 = 0;

     var total =  parseFloat(die2)/parseFloat(die1);

     var res = isNaN(total);
     if(res == true)
     {
      document.getElementById('halt_die_ppl').value = 0;
      document.getElementById('halt_die_pplh').value = 0;

    }
    else
    {
      document.getElementById('halt_die_ppl').value=total;
      document.getElementById('halt_die_pplh').value=total;
    }
  }}
</script>
<script>
  function diecalHalt2()
  {
    if((event.keyCode||event.which) != 9)
    {


      var die1 = document.getElementById('halt_upd_qty').value;
      var die2 = document.getElementById('halt_upd_amt').value;
      if (die1 == "")
       die1 = 0;
     if (die2 == "")
       die2 = 0;

     var total =  parseFloat(die2)/parseFloat(die1);

     var res = isNaN(total);
     if(res == true)
     {
      document.getElementById('halt_upd_ppl').value = 0;

    }
    else
    {
      document.getElementById('halt_upd_ppl').value=total;

    }
  }}
</script>


</div>


</div>


<div id="hidden_div8">

 <div class="am-pagebody">
   <div class="card pd-20 form-layout form-layout-4">
     <div class="row row-sm ">
      <div class="col-xl-6">

        <div class="portlet-body">



          <div class="col-md-4">
           <div class="row mg-t-10"> 
             <h6 class="card-body-title">Workshop Entry</h6>
           </div>
         </div> 
        <div class="row mg-t-10">
          <label class="col-md-4 form-control-label">Workshop Name </label>
          <div class="col-sm-8 mg-t-10 mg-sm-b-10">
            <input class="form-control" data-val="true" data-val-length="The field permitno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Enter Description" id="hltplace" maxlength="50" name="hltplace" type="text" value="" >
            <span class="field-validation-valid font-red" data-valmsg-for="permitno" data-valmsg-replace="true"></span>
          </div>
        </div>

<div class="row mg-t-10">
          <label class="col-md-4 form-control-label">Workshop Place </label>
          <div class="col-sm-8 mg-t-10 mg-sm-b-10">
            <input class="form-control" data-val="true" data-val-length="The field permitno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Enter Description" id="hltplace" maxlength="50" name="hltplace" type="text" value="" >
            <span class="field-validation-valid font-red" data-valmsg-for="permitno" data-valmsg-replace="true"></span>
          </div>
        </div>
<div class="row mg-t-10">
        <label class="col-md-4 form-control-label">Reason </label>
        <div class="col-sm-8 mg-t-10 mg-sm-b-10">
          <input class="form-control" data-val="true" data-val-length="The field insurancename must be a string with a maximum length of 200." data-val-length-max="200" placeholder="Reason for Workshop" id="lhltdays2" maxlength="200" name="fhltdays" type="text" value="" onkeyup="fval()" >
          <span class="field-validation-valid font-red" data-valmsg-for="insurancename" data-valmsg-replace="true"></span>
        </div></div> 
    <!--     <div class="row mg-t-10">
         <label class="col-md-4 form-control-label">From Date </label>
         <div class="col-sm-8 mg-t-10 mg-sm-b-10 ">
           <div class="input-group">
            <span class="input-group-addon"><i class="icon ion-calendar tx-16 lh-0 op-6"></i></span>
            <input class="form-control datepicker" placeholder="Entry date" name="mdate" id="wfromdate" type="text" value="<?php echo date('d/m/Y');?>" >
          </div>
        </div>
      </div>

      <div class="row mg-t-10">
       <label class="col-md-4 form-control-label">To Date </label>
       <div class="col-sm-8 mg-t-10 mg-sm-b-10 ">
         <div class="input-group">
          <span class="input-group-addon"><i class="icon ion-calendar tx-16 lh-0 op-6"></i></span>
          <input class="form-control datepicker" placeholder="Entry date" name="mdate" id="wtodate" type="text" value="<?php echo date('d/m/Y');?>" >
        </div>
      </div>
    </div> -->
   <!--  <div class="row mg-t-10">
      <label class="col-md-4 form-control-label">Workshop Place </label>
      <div class="col-sm-8 mg-t-10 mg-sm-b-10">
        <input class="form-control" data-val="true" data-val-length="The field insurancename must be a string with a maximum length of 200." data-val-length-max="200" placeholder="Halt Days" id="lhltdays2" maxlength="200" name="fhltdays" type="text" value="" onkeyup="fval()" >
        <span class="field-validation-valid font-red" data-valmsg-for="insurancename" data-valmsg-replace="true"></span>
      </div></div> 

      <div class="row mg-t-10">
        <label class="col-md-4 form-control-label">Problem Faced </label>
        <div class="col-sm-8 mg-t-10 mg-sm-b-10">
          <input class="form-control" data-val="true" data-val-length="The field insurancename must be a string with a maximum length of 200." data-val-length-max="200" placeholder="Halt Days" id="lhltdays2" maxlength="200" name="fhltdays" type="text" value="" onkeyup="fval()" >
          <span class="field-validation-valid font-red" data-valmsg-for="insurancename" data-valmsg-replace="true"></span>
        </div></div> 
        <div class="row mg-t-10">
          <label class="col-md-4 form-control-label">Bill Number </label>
          <div class="col-sm-8 mg-t-10 mg-sm-b-10">
            <input class="form-control" data-val="true" data-val-length="The field insurancename must be a string with a maximum length of 200." data-val-length-max="200" placeholder="Halt Days" id="lhltdays2" maxlength="200" name="fhltdays" type="text" value="" onkeyup="fval()" >
            <span class="field-validation-valid font-red" data-valmsg-for="insurancename" data-valmsg-replace="true"></span>
          </div></div>






          <div class="row mg-t-10">
            <label class="col-md-4 form-control-label">Bill Amount </label>
            <div class="col-sm-2 mg-t-5 mg-sm-b-10">
              <input class="form-control" data-val="true" data-val-length="The field insurancename must be a string with a maximum length of 200." data-val-length-max="200" placeholder="0" id="wsbillamt" maxlength="200" name="wsbillamt" type="text" value="" >
              <span class="field-validation-valid font-red" data-valmsg-for="insurancename" data-valmsg-replace="true"></span>
            </div>

            <label class="col-md-2 form-control-label">Pay Type </label>
            <div class="col-sm-4 mg-t-5 mg-sm-b-10">
             <select class="form-control" data-val="true" data-val-number="The field maritialstatus must be a number." placeholder="The maritialstatus field is required." id="wspayt" name="hadvpayt">
              <option value="">---Mode of Pay---</option>
              <option <?php if($insid[0]['maritialstat']=="1") echo 'selected="selected"'; ?>  value="Cheque">Cheque</option>
              <option <?php if($insid[0]['maritialstat']=="2") echo 'selected="selected"'; ?> value="Cash">Cash</option>
              <script >

                document.getElementById('wspayt').addEventListener('change', function () {
                  var style = this.value == "Cheque" ? 'block' : 'none';
                  document.getElementById('workBankdiv').style.display = style;



                });
              </script>
            </select>
          </div>

        </div>

        <div id="workBankdiv">
          <div class="row mg-t-10">
           <label class="col-md-4 form-control-label">Bank Name </label>
           <div class="col-sm-8 mg-t-10 mg-sm-b-10">
            <input class="form-control" data-val="true" data-val-length="The field insurancename must be a string with a maximum length of 200." data-val-length-max="200" placeholder="Bank Name" id="hadvbnknme" maxlength="200" name="hadvbnknme" type="text" value="">
            <span class="field-validation-valid font-red" data-valmsg-for="insurancename" data-valmsg-replace="true"></span>
          </div>
        </div>
        <div class="row mg-t-10">

         <label class="col-md-4 form-control-label">Cheque Number </label>
         <div class="col-sm-8 mg-t-10 mg-sm-b-10">
          <input class="form-control" data-val="true" data-val-length="The field permitno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Cheque Number" id="hadvcqe" maxlength="50" name="hadvcqe" type="text" value="">
          <span class="field-validation-valid font-red" data-valmsg-for="permitno" data-valmsg-replace="true"></span>
        </div>
      </div>
    </div> 
 -->

  </div>
</div>
</div>
</div>
</div>
</div>



<div id="hidden_div9">

 <div class="am-pagebody">
   <div class="card pd-20 form-layout form-layout-4">
     <div class="row row-sm ">
      <div class="col-xl-6">

        <div class="portlet-body">



          <div class="col-md-4">
           <div class="row mg-t-10"> 
             <h6 class="card-body-title">Accident Entry</h6>
           </div>
         </div>

        <div class="row mg-t-10">
          <label class="col-md-4 form-control-label">Accident Place </label>
          <div class="col-sm-8 mg-t-10 mg-sm-b-10">
            <input class="form-control" data-val="true" data-val-length="The field permitno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Enter Description" id="hltplace" maxlength="50" name="accident_place" type="text">
            <span class="field-validation-valid font-red" data-valmsg-for="permitno" data-valmsg-replace="true"></span>
          </div>
        </div>
        <div class="row mg-t-10">
        <label class="col-md-4 form-control-label">Driver Name </label>
        <div class="col-sm-8 mg-t-10 mg-sm-b-10">
          <input class="form-control" data-val="true" data-val-length="The field insurancename must be a string with a maximum length of 200." data-val-length-max="200" placeholder="Halt Days" id="accdriver" maxlength="200" name="current_driver_disp" type="text" readonly >
          <input class="form-control" data-val="true" data-val-length="The field insurancename must be a string with a maximum length of 200." data-val-length-max="200" placeholder="Halt Days" id="accdriverh" maxlength="200" name="current_driver" type="hidden" >
          <span class="field-validation-valid font-red" data-valmsg-for="insurancename" data-valmsg-replace="true"></span>
        </div></div> 
          <div class="row mg-t-10">
        <label class="col-md-4 form-control-label">Workshop Place </label>
        <div class="col-sm-8 mg-t-10 mg-sm-b-10">
          <input class="form-control" data-val="true" data-val-length="The field insurancename must be a string with a maximum length of 200." data-val-length-max="200" placeholder="Work Shop Place" id="workshop_place" maxlength="200" name="workshop_place" type="text" >
          <span class="field-validation-valid font-red" data-valmsg-for="insurancename" data-valmsg-replace="true"></span>
        </div></div> 


       <!--  <div class="row mg-t-10">
          <label class="col-md-4 form-control-label">Alternate Vehicle No </label>
          <div class="col-sm-8 mg-t-10 mg-sm-b-10">


           <select   name="ltrans" id="from" class="form-control" onChange="getdetails(this.value);" >
             <option selected="selected" value="">Select </option>
             <?php $query =mysqli_query($conn,"SELECT DISTINCT vechNo FROM gcentries");
             while($row=mysqli_fetch_array($query))
              { ?>
                <option value="<?php echo $row['vechNo'];?>" <?php if($row['vechNo']==$insid[0]['vechNo']) echo 'selected="selected"'; ?> ><?php echo $row['vechNo'];?></option>
                <?php
              }
              ?>
            </select>




            <span class="field-validation-valid font-red" data-valmsg-for="permitno" data-valmsg-replace="true"></span>
          </div>
        </div> -->

       <!--  <div class="row mg-t-10">
          <label class="col-md-4 form-control-label">Alternate Vehicle Driver</label>
          <div class="col-sm-8 mg-t-10 mg-sm-b-10">
            <input class="form-control" data-val="true" data-val-length="The field insurancename must be a string with a maximum length of 200." data-val-length-max="200" placeholder="Halt Days" id="lhltdays2" maxlength="200" name="fhltdays" type="text" value="" onkeyup="fval()" >
            <span class="field-validation-valid font-red" data-valmsg-for="insurancename" data-valmsg-replace="true"></span>
          </div></div>


 -->



     <!--      <div class="row mg-t-10">
            <label class="col-md-4 form-control-label">Bill Amount </label>
            <div class="col-sm-2 mg-t-5 mg-sm-b-10">
              <input class="form-control" data-val="true" data-val-length="The field insurancename must be a string with a maximum length of 200." data-val-length-max="200" placeholder="0" id="wsbillamt" maxlength="200" name="wsbillamt" type="text" value="" >
              <span class="field-validation-valid font-red" data-valmsg-for="insurancename" data-valmsg-replace="true"></span>
            </div>

            <label class="col-md-2 form-control-label">Pay Type </label>
            <div class="col-sm-4 mg-t-5 mg-sm-b-10">
             <select class="form-control" data-val="true" data-val-number="The field maritialstatus must be a number." placeholder="The maritialstatus field is required." id="wspayt" name="hadvpayt">
              <option value="">---Mode of Pay---</option>
              <option <?php if($insid[0]['maritialstat']=="1") echo 'selected="selected"'; ?>  value="Cheque">Cheque</option>
              <option <?php if($insid[0]['maritialstat']=="2") echo 'selected="selected"'; ?> value="Cash">Cash</option>
              <script >

                document.getElementById('wspayt').addEventListener('change', function () {
                  var style = this.value == "Cheque" ? 'block' : 'none';
                  document.getElementById('workBankdiv').style.display = style;



                });
              </script>
            </select>
          </div>

        </div>

        <div id="workBankdiv">
          <div class="row mg-t-10">
           <label class="col-md-4 form-control-label">Bank Name </label>
           <div class="col-sm-8 mg-t-10 mg-sm-b-10">
            <input class="form-control" data-val="true" data-val-length="The field insurancename must be a string with a maximum length of 200." data-val-length-max="200" placeholder="Bank Name" id="hadvbnknme" maxlength="200" name="hadvbnknme" type="text" value="">
            <span class="field-validation-valid font-red" data-valmsg-for="insurancename" data-valmsg-replace="true"></span>
          </div>
        </div>
        <div class="row mg-t-10">

         <label class="col-md-4 form-control-label">Cheque Number </label>
         <div class="col-sm-8 mg-t-10 mg-sm-b-10">
          <input class="form-control" data-val="true" data-val-length="The field permitno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Cheque Number" id="hadvcqe" maxlength="50" name="hadvcqe" type="text" value="">
          <span class="field-validation-valid font-red" data-valmsg-for="permitno" data-valmsg-replace="true"></span>
        </div>
      </div></div>  -->



    </div>
  </div>
</div>
</div>
</div>
</div> 




<div id="fcentry">

 <div class="am-pagebody">
   <div class="card pd-20 form-layout form-layout-4">
     <div class="row row-sm ">
      <div class="col-xl-6">

        <div class="portlet-body">



          <div class="col-md-4">
           <div class="row mg-t-10"> 
             <h6 class="card-body-title">FC Entry</h6>
           </div>
         </div> 


      


        <div class="row mg-t-10">
          <label class="col-md-4 form-control-label"> Fc Amount </label>
          <div class="col-sm-8 mg-t-10 mg-sm-b-10">
            <input class="form-control" data-val="true" data-val-length="The field permitno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Enter Description" id="hltplace" maxlength="50" name="hltplace" type="text" value="" >
            <span class="field-validation-valid font-red" data-valmsg-for="permitno" data-valmsg-replace="true"></span>
          </div>
        </div>


      <div class="row mg-t-10">
       <label class="col-md-4 form-control-label">FC Validity </label>
       <div class="col-sm-8 mg-t-10 mg-sm-b-10 ">
         <div class="input-group">
          <span class="input-group-addon"><i class="icon ion-calendar tx-16 lh-0 op-6"></i></span>
          <input class="form-control datepicker" placeholder="Entry date" name="fcval" id="fcval" type="text" value="<?php echo date('d/m/Y');?>" >
        </div>
      </div>
    </div>
   <!--  <div class="row mg-t-10">
      <label class="col-md-4 form-control-label">Workshop Place </label>
      <div class="col-sm-8 mg-t-10 mg-sm-b-10">
        <input class="form-control" data-val="true" data-val-length="The field insurancename must be a string with a maximum length of 200." data-val-length-max="200" placeholder="Halt Days" id="lhltdays2" maxlength="200" name="fhltdays" type="text" value="" onkeyup="fval()" >
        <span class="field-validation-valid font-red" data-valmsg-for="insurancename" data-valmsg-replace="true"></span>
      </div></div> 

      <div class="row mg-t-10">
        <label class="col-md-4 form-control-label">Problem Faced </label>
        <div class="col-sm-8 mg-t-10 mg-sm-b-10">
          <input class="form-control" data-val="true" data-val-length="The field insurancename must be a string with a maximum length of 200." data-val-length-max="200" placeholder="Halt Days" id="lhltdays2" maxlength="200" name="fhltdays" type="text" value="" onkeyup="fval()" >
          <span class="field-validation-valid font-red" data-valmsg-for="insurancename" data-valmsg-replace="true"></span>
        </div></div> 
        <div class="row mg-t-10">
          <label class="col-md-4 form-control-label">Bill Number </label>
          <div class="col-sm-8 mg-t-10 mg-sm-b-10">
            <input class="form-control" data-val="true" data-val-length="The field insurancename must be a string with a maximum length of 200." data-val-length-max="200" placeholder="Halt Days" id="lhltdays2" maxlength="200" name="fhltdays" type="text" value="" onkeyup="fval()" >
            <span class="field-validation-valid font-red" data-valmsg-for="insurancename" data-valmsg-replace="true"></span>
          </div></div>






          <div class="row mg-t-10">
            <label class="col-md-4 form-control-label">Bill Amount </label>
            <div class="col-sm-2 mg-t-5 mg-sm-b-10">
              <input class="form-control" data-val="true" data-val-length="The field insurancename must be a string with a maximum length of 200." data-val-length-max="200" placeholder="0" id="wsbillamt" maxlength="200" name="wsbillamt" type="text" value="" >
              <span class="field-validation-valid font-red" data-valmsg-for="insurancename" data-valmsg-replace="true"></span>
            </div>

            <label class="col-md-2 form-control-label">Pay Type </label>
            <div class="col-sm-4 mg-t-5 mg-sm-b-10">
             <select class="form-control" data-val="true" data-val-number="The field maritialstatus must be a number." placeholder="The maritialstatus field is required." id="wspayt" name="hadvpayt">
              <option value="">---Mode of Pay---</option>
              <option <?php if($insid[0]['maritialstat']=="1") echo 'selected="selected"'; ?>  value="Cheque">Cheque</option>
              <option <?php if($insid[0]['maritialstat']=="2") echo 'selected="selected"'; ?> value="Cash">Cash</option>
              <script >

                document.getElementById('wspayt').addEventListener('change', function () {
                  var style = this.value == "Cheque" ? 'block' : 'none';
                  document.getElementById('workBankdiv').style.display = style;



                });
              </script>
            </select>
          </div>

        </div>

        <div id="workBankdiv">
          <div class="row mg-t-10">
           <label class="col-md-4 form-control-label">Bank Name </label>
           <div class="col-sm-8 mg-t-10 mg-sm-b-10">
            <input class="form-control" data-val="true" data-val-length="The field insurancename must be a string with a maximum length of 200." data-val-length-max="200" placeholder="Bank Name" id="hadvbnknme" maxlength="200" name="hadvbnknme" type="text" value="">
            <span class="field-validation-valid font-red" data-valmsg-for="insurancename" data-valmsg-replace="true"></span>
          </div>
        </div>
        <div class="row mg-t-10">

         <label class="col-md-4 form-control-label">Cheque Number </label>
         <div class="col-sm-8 mg-t-10 mg-sm-b-10">
          <input class="form-control" data-val="true" data-val-length="The field permitno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Cheque Number" id="hadvcqe" maxlength="50" name="hadvcqe" type="text" value="">
          <span class="field-validation-valid font-red" data-valmsg-for="permitno" data-valmsg-replace="true"></span>
        </div>
      </div>
    </div> 
 -->

  </div>
</div>
</div>
</div>
</div>
</div>




<div id="parkingent">

 <div class="am-pagebody">
   <div class="card pd-20 form-layout form-layout-4">
     <div class="row row-sm ">
      <div class="col-xl-6">

        <div class="portlet-body">



          <div class="col-md-4">
           <div class="row mg-t-10"> 
             <h6 class="card-body-title">Parking Entry</h6>
           </div>
         </div> 


      


        <div class="row mg-t-10">
          <label class="col-md-4 form-control-label"> Parking Place </label>
          <div class="col-sm-8 mg-t-10 mg-sm-b-10">
            <input class="form-control" data-val="true" data-val-length="The field permitno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Enter Parking Place" id="hltplace" maxlength="50" name="praking_place" type="text" value="" >
            <span class="field-validation-valid font-red" data-valmsg-for="permitno" data-valmsg-replace="true"></span>
          </div>
        </div>


     
   
  </div>
</div>
</div>
</div>
</div>
</div>





<div id="hhaltent">

 <div class="am-pagebody">
   <div class="card pd-20 form-layout form-layout-4">
     <div class="row row-sm ">
      <div class="col-xl-6">

        <div class="portlet-body">



          <div class="col-md-4">
           <div class="row mg-t-10"> 
             <h6 class="card-body-title">Home Halt Entry</h6>
           </div>
         </div> 


      


        <div class="row mg-t-10">
          <label class="col-md-4 form-control-label"> Halt Place </label>
          <div class="col-sm-8 mg-t-10 mg-sm-b-10">
            <input class="form-control" data-val="true" data-val-length="The field permitno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Enter Halt Place" id="hltplace" maxlength="50" name="home_halt_place" type="text" value="Chennai" >
            <span class="field-validation-valid font-red" data-valmsg-for="permitno" data-valmsg-replace="true"></span>
          </div>
        </div>
         <div class="row mg-t-10">
          <label class="col-md-4 form-control-label"> Driver </label>
          <div class="col-sm-8 mg-t-10 mg-sm-b-10">
            
               <select   name="home_halt_driver" id="hhdriver" class="form-control"  >
                 <option value="">Select </option>
                 <?php $query =mysqli_query($conn,"SELECT * FROM drivers ");
                 while($row=mysqli_fetch_array($query))
                  { ?>
                    <option value="<?php echo $row['id'];?>" ><?php echo $row['name'];?></option>
                    <?php
                  }
                  ?>
                </select>
                <span class="field-validation-valid font-red" data-valmsg-for="permitno" data-valmsg-replace="true"></span>

              </div>

        </div>
         <div class="row mg-t-10">
          <label class="col-md-4 form-control-label"> Driver Advance Chn. </label>
          <div class="col-sm-8 mg-t-10 mg-sm-b-10">
            <input class="form-control" data-val="true" data-val-length="The field permitno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Enter Halt Place" id="home_halt_chn_advance" maxlength="50" name="home_halt_chn_advance" type="text" value="" >
            <span class="field-validation-valid font-red" data-valmsg-for="permitno" data-valmsg-replace="true"></span>
          </div>
        </div>
         <div class="row mg-t-10">
          <label class="col-md-4 form-control-label"> Driver Advance MKM </label>
          <div class="col-sm-8 mg-t-10 mg-sm-b-10">
            <input class="form-control" data-val="true" data-val-length="The field permitno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Enter Halt Place" id="home_halt_mkm_advance" maxlength="50" name="home_halt_mkm_advance" type="text" value="" >
            <span class="field-validation-valid font-red" data-valmsg-for="permitno" data-valmsg-replace="true"></span>
          </div>
       </div>

  </div>
</div>
</div>
</div>
</div>
<div id="dieseldiv_home_halt">
     <div class="am-pagebody" >
 <div class="card  pd-sm-t-10 pd-sm-b-10 pd-sm-l-0 mg-l-0">
       <div class="row row-sm mg-t-0 pd-sm-l-30 pd-sm-r-30">
          <div class="col-xl-12 col-md-12 mg-l-0 pd-sm-l-0-force pd-sm-r-0-force">
                    <div class="portlet-body">     
      <div align="right" style="float: right;">
     <button type="button" name="add" id="add_die_hhalt" class="btn btn-info">Add New Entry</button>
    </div>
       <div class="mg-t-10 col-sm-8 pd-sm-l-0 pd-sm-r-0 pd-sm-t-15"> 
             <h6 class="card-body-title">Diesel Entries</h6>
           </div>
            <div class="col-sm-12 mg-t-30 pd-sm-l-0 pd-sm-r-0" id="responsecontainer_hhalt">                                     
        <div class="col-sm-10 mg-t-5 mg-sm-b-10">
 <div class="col-xl">
  </div>
      </div>





                   </div></div></div>



                   <div class="modal fade" id="hhalt_die_add" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<!-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> -->

       <div class="col-xl-12 col-lg-12">

          


<div class="row mg-t-10">
          <label class="col-md-4 col-sm-4 form-control-label">Date</label>
          <div class="col-sm-8 mg-t-5 mg-sm-b-10 ">
           <div class="input-group">
              <span class="input-group-addon"><i class="icon ion-calendar tx-16 lh-0 op-6"></i></span>
              <input class="form-control datepicker" placeholder="Cash Date" name="hire_friet_adv_cash_date" id="datepicker_hhalt" type="text" value="<?php echo date('d/m/Y');?>" >
            </div>
        </div>
      </div>

       <div class="row mg-t-10">
        <label class="col-md-4 col-sm-4 form-control-label">Vechicle Number</label>
        <div class="col-sm-8 mg-t-5 mg-sm-b-10">
          <input class="form-control" data-val="true" data-val-length="The field engineno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Driver Name" id="hhalt_die_vechno" maxlength="50" name="return_driver" type="text"  disabled>
          <span class="field-validation-valid font-red" data-valmsg-for="engineno" data-valmsg-replace="true"></span>
        </div>
      </div>  

      <div class="row mg-t-10">
        <label class="col-md-4 col-sm-4 form-control-label">Driver</label>
        <div class="col-sm-8 mg-t-5 mg-sm-b-10">
          <input class="form-control" data-val="true" data-val-length="The field engineno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Driver Name" id="hhalt_die_driver" maxlength="50" name="driver" type="text" value="" disabled>
             <input class="form-control" data-val="true" data-val-length="The field engineno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Driver Name" id="hhalt_die_driver_id" maxlength="50" name="return_die_driver_id" type="hidden">
          <span class="field-validation-valid font-red" data-valmsg-for="engineno" data-valmsg-replace="true"></span>
        </div>
      </div>  
        
        <div class="row mg-t-10">
        <label class="col-md-4 col-sm-4 form-control-label">Vendor</label>
        <div class="col-sm-8 mg-t-5 mg-sm-b-10">
<!--           <input class="form-control" data-val="true" data-val-length="The field engineno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Vendor Location" id="return_die_place" maxlength="50" name="place" type="text" value=""> -->
        
<?php
$vendor=mysqli_query($conn,"SELECT * from ledger WHERE nature='Diesel Station'; "); 

?>
<select class="form-control" data-val="true" placeholder="Vendor Name" id="hhalt_die_vendor" name="vendor" >
<?php

while($vend = mysqli_fetch_array($vendor))
{
?>
<option  value="<?php echo $vend['name']; ?>"><?php echo $vend['name']; ?></option>

<?php
}

?>
</select>


          <span class="field-validation-valid font-red" data-valmsg-for="engineno" data-valmsg-replace="true"></span>
        </div>
      </div>
      <div class="row mg-t-10">
        <label class="col-md-4 col-sm-4 form-control-label">Place</label>
        <div class="col-sm-8 mg-t-5 mg-sm-b-10">
          <input class="form-control" data-val="true" data-val-length="The field engineno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Location Name" id="hhalt_die_place" maxlength="50" name="vendor" type="text" value="">
          <span class="field-validation-valid font-red" data-valmsg-for="engineno" data-valmsg-replace="true"></span>
        </div>
      </div>



     


      <div class="row mg-t-10">
        <label class="col-md-4 col-sm-4 form-control-label">Quantity</label>
        <div class="col-sm-3 mg-t-5 mg-sm-b-10">
          <input class="form-control" data-val="true" data-val-length="The field insurancename must be a string with a maximum length of 200." data-val-length-max="200" placeholder="Quantity" id="hhalt_die_qty" maxlength="200" name="qty" type="text" value="" onkeyup="diecalhhalt()">
          <span class="field-validation-valid font-red" data-valmsg-for="insurancename" data-valmsg-replace="true"></span>
        </div>

        <label class="col-md-3 col-sm-3 form-control-label">Price Per Litre</label>
        <div class="col-sm-2 mg-t-5 mg-sm-b-10">
          <input class="form-control" data-val="true" data-val-length="The field permitno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="0" id="hhalt_die_ppl" maxlength="50" name="ppl" type="text" value="" disabled>
          <span class="field-validation-valid font-red" data-valmsg-for="permitno" data-valmsg-replace="true"></span>
        </div>
      </div>
      <div class="row mg-t-10">
        <label class="col-md-4 col-sm-4 form-control-label">Amount</label>
        <div class="col-sm-8 mg-t-5 mg-sm-b-10">
          <input class="form-control" data-val="true" data-val-length="The field insurancename must be a string with a maximum length of 200." data-val-length-max="200" placeholder="Diesel Amount" id="hhalt_die_amt" maxlength="200" name="amt" type="text" value="" onkeyup="diecalhhalt()">
          <span class="field-validation-valid font-red" data-valmsg-for="insurancename" data-valmsg-replace="true" ></span>
        </div>
      </div>

 <div class="row mg-t-10">


        <label class="col-md-4 col-sm-4 form-control-label">Pay Type</label>                                                    
        <div class="col-sm-8 mg-t-5 mg-sm-b-10">

          <select class="form-control valid" data-val="true" placeholder="Select bilty paid type" id="hhalt_die_billtype" name="billtype" style="padding:0px 6px !important;">
            <option <?php if($insid[0]['billtype']=="To Be Billed") echo 'selected="selected"'; ?> value="Cash">Cash</option>
            <option <?php if($insid[0]['billtype']=="Paid") echo 'selected="selected"'; ?> value="Credit">Credit</option>

            <option <?php if($insid[0]['billtype']=="Paid") echo 'selected="selected"'; ?> value="Driver Cash">Driver Cash</option>
            
          </select>
</div></div>
       
<div class="modal-footer pd-r-0">
<button type="button"  class="btn btn-default" data-dismiss="modal">Close</button>
<button type="button" id="hhalt_die_insert" class="btn btn-primary">Save changes</button>
</div>
</div>
</div> </div>
     
</div>
</div>
                    
  </div>


   <div class="modal fade" id="hhalt_editModel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<!-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> -->

       <div class="col-xl-12 col-lg-12">

          

<input   name="upd_id" id="hhalt_upd_id" type="hidden"  >
<div class="row mg-t-10">
          <label class="col-md-4 col-sm-4 form-control-label">Date</label>
          <div class="col-sm-8 mg-t-5 mg-sm-b-10 ">
           <div class="input-group">
              <span class="input-group-addon"><i class="icon ion-calendar tx-16 lh-0 op-6"></i></span>
              <input class="form-control datepicker" placeholder="Cash Date" name="datepicker_hhalt_edit" id="datepicker_hhalt_edit" type="text"  >
            </div>
        </div>
      </div> 







      
      
      <div class="row mg-t-10">
   <!--      <label class="col-md-4 col-sm-4 form-control-label">Driver</label> -->
        <div class="col-sm-8 mg-t-5 mg-sm-b-10">
          <input class="form-control" data-val="true" data-val-length="The field engineno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Driver Name" id="hhalt_upd_driver" maxlength="50" name="upd_driver" type="hidden"  disabled>
          <span class="field-validation-valid font-red" data-valmsg-for="engineno" data-valmsg-replace="true"></span>
        </div>
      </div>  
        
      <div class="row mg-t-10">
        <label class="col-md-4 col-sm-4 form-control-label">Vendor</label>
        <div class="col-sm-8 mg-t-5 mg-sm-b-10">
<!--           <input class="form-control" data-val="true" data-val-length="The field engineno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Vendor Name" id="hhalt_upd_vendor" maxlength="50" name="upd_vendor" type="text" > -->



<?php
$vendor=mysqli_query($conn,"SELECT * from ledger WHERE nature='Diesel Station'; "); 

?>
<select class="form-control" data-val="true" placeholder="Vendor Name" id="hhalt_upd_vendor" name="upd_vendor" >
<?php

while($vend = mysqli_fetch_array($vendor))
{
?>
<option  value="<?php echo $vend['name']; ?>"><?php echo $vend['name']; ?></option>

<?php
}

?>
</select>


          <span class="field-validation-valid font-red" data-valmsg-for="engineno" data-valmsg-replace="true"></span>
        </div>
      </div>
<div class="row mg-t-10">
        <label class="col-md-4 col-sm-4 form-control-label">Place</label>
        <div class="col-sm-8 mg-t-5 mg-sm-b-10">
          <input class="form-control" data-val="true" data-val-length="The field engineno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Vendor Location" id="hhalt_upd_place" maxlength="50" name="upd_place" type="text">
          <span class="field-validation-valid font-red" data-valmsg-for="engineno" data-valmsg-replace="true"></span>
        </div>
      </div>


     


      <div class="row mg-t-10">
        <label class="col-md-4 col-sm-4 form-control-label">Quantity</label>
        <div class="col-sm-3 mg-t-5 mg-sm-b-10">
          <input class="form-control" data-val="true" data-val-length="The field insurancename must be a string with a maximum length of 200." data-val-length-max="200" placeholder="Quantity" id="hhalt_upd_qty" maxlength="200" name="upd_qty" type="text"  onkeyup="diecalhhalt2()">
          <span class="field-validation-valid font-red" data-valmsg-for="insurancename" data-valmsg-replace="true"></span>
        </div>

        <label class="col-md-3 col-sm-3 form-control-label">Price Per Litre</label>
        <div class="col-sm-2 mg-t-5 mg-sm-b-10">
          <input class="form-control" data-val="true" data-val-length="The field permitno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="0" id="hhalt_upd_ppl" maxlength="50" name="hhalt_upd_ppl" type="text" value="" disabled>
          <input class="form-control" data-val="true" data-val-length="The field permitno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="0" id="pplh" maxlength="50" name="pplh" type="hidden" value="" >
          <span class="field-validation-valid font-red" data-valmsg-for="permitno" data-valmsg-replace="true"></span>
        </div>
      </div>
      <div class="row mg-t-10">
        <label class="col-md-4 col-sm-4 form-control-label">Amount</label>
        <div class="col-sm-8 mg-t-5 mg-sm-b-10">
          <input class="form-control" data-val="true" data-val-length="The field insurancename must be a string with a maximum length of 200." data-val-length-max="200" placeholder="Diesel Amount" id="hhalt_upd_amt" maxlength="200" name="upd_amt" type="text" onkeyup="diecalhhalt2()">
          <span class="field-validation-valid font-red" data-valmsg-for="insurancename" data-valmsg-replace="true" ></span>
        </div>
      </div>

 <div class="row mg-t-10">


        <label class="col-md-4 col-sm-4 form-control-label">Pay Type</label>                                                    
        <div class="col-sm-8 mg-t-5 mg-sm-b-10">

          <select class="form-control valid" data-val="true" placeholder="Select bilty paid type" id="hhalt_upd_billtype" name="upd_billtype" style="padding:0px 6px !important;">
            <option <?php if($insid[0]['billtype']=="To Be Billed") echo 'selected="selected"'; ?> value="Cash">Cash</option>
            <option <?php if($insid[0]['billtype']=="Paid") echo 'selected="selected"'; ?> value="Credit">Credit</option>

            <option <?php if($insid[0]['billtype']=="Paid") echo 'selected="selected"'; ?> value="Driver Cash">Driver Cash</option>
            
          </select>
</div></div>
       
<div class="modal-footer pd-r-0">
<button type="button"  class="btn btn-default" data-dismiss="modal">Close</button>
<button type="button" id="hhalt_update" class="btn btn-primary">Save changes</button>
</div>
</div></div></div>
</div> </div></div>





 
 




 <script >
$(function () {
$("#add_die_hhalt").click(function(){
$('#hhalt_die_add').modal('show');
var dte=$('#myVariable').val();
$('#datepicker_hhalt').val(dte);


var dri=$('#hhdriver').val();
var dri_nme=$('#hhdriver option:selected').text();
var vechno=$('#mVechno').val();

  $('#hhalt_die_vechno').val(vechno);

  $('#hhalt_die_driver_id').val(dri);
  $('#hhalt_die_driver').val(dri_nme);


});
});
</script>

<script>

  $(document).on('click', '#hhalt_update', function(){
   var dat = $('#datepicker_hhalt_edit').val();
   var fid = $('#hhalt_upd_id').val();
   var dri = $('#hhalt_upd_driver').val();
   var ven = $('#hhalt_upd_vendor').val();
   var pla = $('#hhalt_upd_place').val();
   var qt = $('#hhalt_upd_qty').val();
   var pp = $('#hhalt_upd_ppl').val();
   var at = $('#hhalt_upd_amt').val();
   var bill = $('#hhalt_upd_billtype').val();
   var vech="";

$.ajax({
     url:"fuelins.php",
     method:"POST",
     data:{date:dat, id:fid, vechno:vech, driver:dri, vendor:ven, place:pla, qty:qt, pricepl:pp, amount:at, billpay:bill},
     success:function(data)
     {
    /*  alert(data);*/
      fetch_data();
      $('#hhalt_editModel').modal('hide');

   $('#hhalt_upd_vendor').val("");
   $('#hhalt_upd_place').val("");
   $('#hhalt_upd_qty').val("");
   $('#hhalt_upd_ppl').val("");
   $('#hhalt_upd_amt').val("");
   $('#hhalt_upd_billtype').val("");


       }
    });

  });
</script>




<!-- <script>
  document.addEventListener("DOMContentLoaded", function() {
fetch_data();

});
</script> -->
<!-- <script>

/*  Table View*/
  $('#mVechno').change(function(){
 fetch_data();
  });
</script> -->


<script>
function deletefuel(del_val)
{


$.ajax({
        type: "POST",
        url: "fueldel.php",
        data:'val='+del_val,
        success: function(data){ 
       fetch_data();
        }
      });


}
</script>



<script>

  $(document).on('click', '#hhalt_die_insert', function(){



   var dat = $('#datepicker_hhalt').val();
   var vno = $('#hhalt_die_vechno').val();
   var tid = "Home Halt";
   var dri = $('#hhalt_die_driver_id').val();
   var ven = $('#hhalt_die_vendor').val();
   var pla = $('#hhalt_die_place').val();
   var qt = $('#hhalt_die_qty').val();
   var pp = $('#hhalt_die_ppl').val();
   var at = $('#hhalt_die_amt').val();
   var bill = $('#hhalt_die_billtype').val();

 if(vno != '')
 {

$.ajax({
     url:"fuelins.php",
     method:"POST",
     data:{date:dat, vechno:vno, tripid:tid, driver:dri, vendor:ven, place:pla, qty:qt, pricepl:pp, amount:at, billpay:bill},
     success:function(data)
     {
      /*alert(data);*/
      fetch_data();
      
   $('#hhalt_die_vendor').val("");
   $('#hhalt_die_place').val("");
   $('#hhalt_die_qty').val("");
   $('#hhalt_die_ppl').val("");
   $('#hhalt_die_amt').val("");
   $('#hhalt_die_billtype').val("");
$('#hhalt_die_add').modal('hide');
     }
    });

 }
 else
 {

alert("Please Select Vehicle Number")

 }

  });
</script>


      </div><!-- am-pagebody -->
     



<script>
  function diecalhhalt()
  {
    if((event.keyCode||event.which) != 9)
    {


      var die1 = document.getElementById('hhalt_die_qty').value;
      var die2 = document.getElementById('hhalt_die_amt').value;
      if (die1 == "")
       die1 = 0;
     if (die2 == "")
       die2 = 0;

     var total =  parseFloat(die2)/parseFloat(die1);

     var res = isNaN(total);
     if(res == true)
     {
      document.getElementById('hhalt_die_ppl').value = 0;


    }
    else
    {
      document.getElementById('hhalt_die_ppl').value=total;

    }
  }}
</script>
<script>
  function diecalhhalt2()
  {
    if((event.keyCode||event.which) != 9)
    {


      var die1 = document.getElementById('hhalt_upd_qty').value;
      var die2 = document.getElementById('hhalt_upd_amt').value;
      if (die1 == "")
       die1 = 0;
     if (die2 == "")
       die2 = 0;

     var total =  parseFloat(die2)/parseFloat(die1);

     var res = isNaN(total);
     if(res == true)
     {
      document.getElementById('hhalt_upd_ppl').value = 0;

    }
    else
    {
      document.getElementById('hhalt_upd_ppl').value=total;

    }
  }}
</script>


</div>















</div>
















<div id="hidden_div5">

 <div class="am-pagebody">
   <div class="card pd-20 form-layout form-layout-4">
     <div class="row row-sm ">
      <div class="col-xl-5 col-lg-12">

        <div class="portlet-body">



          <div class="col-md-3">
           <div class="row mg-t-10"> 
             <h6 class="card-body-title">Return</h6>
           </div></div>



           <div class="row mg-t-10">
            <label class="col-md-2 col-sm-2 form-control-label">From</label>
            <div class="col-sm-10 mg-t-10 mg-sm-b-10">
              <input class="form-control" data-val="true" data-val-length="The field permitno must be a string with a maximum length of 50." data-val-length-max="50"  id="rtnfrom" maxlength="50" name="rtnfrom" type="text" value="" disabled>
              <input class="form-control" data-val="true" data-val-length="The field permitno must be a string with a maximum length of 50." data-val-length-max="50"  id="rtn_from" maxlength="50" name="rtn_from" type="hidden" value="" >
              <span class="field-validation-valid font-red" data-valmsg-for="permitno" data-valmsg-replace="true"></span>
            </div>
          </div> 



          <div class="row mg-t-10">
            <label class="col-md-2 col-sm-2 form-control-label">To</label>
            <div class="col-sm-10 mg-t-10 mg-sm-b-10">
              <input class="form-control" data-val="true" data-val-length="The field permitno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Enter Description" id="rtnto" maxlength="50" name="rtnto" type="text" value="" >
              <span class="field-validation-valid font-red" data-valmsg-for="permitno" data-valmsg-replace="true"></span>
            </div>
          </div> 





          <div class="row mg-t-10">

            <label class="col-md-2 col-sm-2 form-control-label">Driver</label>
            <div class="col-sm-10 mg-t-10 mg-sm-b-10">
              <input class="form-control" data-val="true" data-val-length="The field bodytype must be a string with a maximum length of 100." data-val-length-max="100" placeholder="Enter Driver Name" id="rtndriver" maxlength="100" name="return_driver_name" type="text" value="" readonly>
              <input class="form-control" data-val="true" data-val-length="The field bodytype must be a string with a maximum length of 100." data-val-length-max="100" placeholder="Enter Driver Name" id="rtndriverh" maxlength="100" name="return_driver_name_h" type="hidden">
              <span class="field-validation-valid font-red" data-valmsg-for="bodytype" data-valmsg-replace="true"></span>


               <select   name="return_driver_cnge" id="bodytype" class="form-control"  >
                 <option value="">Change Driver </option>
                 <?php $query =mysqli_query($conn,"SELECT * FROM drivers ");
                 while($row=mysqli_fetch_array($query))
                  { ?>
                    <option value="<?php echo $row['id'];?>" ><?php echo $row['name'];?></option>
                    <?php
                  }
                  ?>
                </select>
                <span class="field-validation-valid font-red" data-valmsg-for="permitno" data-valmsg-replace="true"></span>

            </div>
          </div>
          <div class="row mg-t-10">
            <label class="col-md-2 col-sm-2 form-control-label">Advance</label>
            <div class="col-sm-10 mg-t-10 mg-sm-b-10">
              <input class="form-control" data-val="true" data-val-length="The field engineno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Advance Amount" id="engineno" maxlength="50" name="return_adv" type="text" value="">
              <span class="field-validation-valid font-red" data-valmsg-for="engineno" data-valmsg-replace="true"></span>
            </div>
          </div>


                    <div class="row mg-t-10">
            <label class="col-md-2 col-sm-2 form-control-label"> Amount Place </label>
            <div class="col-sm-10 mg-t-10 mg-sm-b-10">
<select   name="return_amt_place" id="return_amt_place" class="form-control"  >
                 <option value="">Chennai </option>
 <option value="">Maduranthagam </option>

</select>

<!-- 
              <input class="form-control" data-val="true" data-val-length="The field permitno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Advance Amount" id="on_road_adv" maxlength="50" name="on_road_adv" type="text" value="" > -->
              <span class="field-validation-valid font-red" data-valmsg-for="permitno" data-valmsg-replace="true"></span>
            </div>
          </div>
          <!-- <div class="row mg-t-10">
            <label class="col-md-4 form-control-label">Diesel </label>
            <div class="col-sm-8 mg-t-10 mg-sm-b-10">
              <input class="form-control" data-val="true" data-val-length="The field chasisno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Diesel Amount" id="chasisno" maxlength="50" name="mdiesel" type="text" value="">
              <span class="field-validation-valid font-red" data-valmsg-for="chasisno" data-valmsg-replace="true"></span>
            </div>
          </div> -->


        </div>
      </div>



      <div class="col-xl-7 col-lg-12">
       <div class="row mg-t-10">

        <div class="col-sm-8 mg-t-10 mg-sm-b-10"></div></div>
        <div class="row mg-t-10">

          <div class="col-xl-7 col-lg-12"></div></div>

          <div class="portlet-body" id="hidden_div6">
            <div class="row mg-t-5">
             <label class="col-md-2 col-sm-2 form-control-label">Party Name</label>
             <div class="col-sm-10 mg-t-5 mg-sm-b-10">
              <input class="form-control" data-val="true" data-val-length="The field insurancename must be a string with a maximum length of 200." data-val-length-max="200" placeholder="Enter Party Name" id="insurancename" maxlength="200" name="ret_party_name" type="text" value="">
              <span class="field-validation-valid font-red" data-valmsg-for="insurancename" data-valmsg-replace="true"></span>
            </div>
          </div>
          <div class="row mg-t-10">
           <label class="col-md-2 col-sm-2 form-control-label">GC No</label>
           <div class="col-sm-10 mg-t-5 mg-sm-b-10">
            <input class="form-control" data-val="true" data-val-length="The field permitno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Enter GC Number" id="permitno" maxlength="50" name="ret_gc" type="text" value="">
            <span class="field-validation-valid font-red" data-valmsg-for="permitno" data-valmsg-replace="true"></span>

          </div>
        </div> 
        <div class="row mg-t-10">
          <label class="col-md-2 col-sm-2 form-control-label">Reference No</label>
          <div class="col-sm-4 mg-t-5 mg-sm-b-10"> 
            <input class="form-control" data-val="true" data-val-length="The field insurancename must be a string with a maximum length of 200." data-val-length-max="200" placeholder="Enter Reference Number" id="insurancename" maxlength="200" name="ret_ref" type="text" value="">
            <span class="field-validation-valid font-red" data-valmsg-for="insurancename" data-valmsg-replace="true"></span>
          </div>

          <label class="col-md-2 col-sm-2 form-control-label">Container No</label>
          <div class="col-sm-4 mg-t-5 mg-sm-b-10">
            <input class="form-control" data-val="true" data-val-length="The field permitno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Enter Container Number" id="retcontno" maxlength="50" name="ret_cont_no" type="text" value="" onkeypress="return onlyAlpha(event, this);" >
            <span class="field-validation-valid font-red" data-valmsg-for="permitno" data-valmsg-replace="true"></span>
          </div>
        </div>

        <div class="row mg-t-10">
          <label class="col-md-2 col-sm-2 form-control-label">Container Size</label>
          <div class="col-sm-4 mg-t-5 mg-sm-b-10">
           <select class="form-control" data-val="true" data-val-number="The field maritialstatus must be a number." placeholder="The maritialstatus field is required." id="mstatus" name="ret_cont_size">
            <option value="">---Select Container Size---</option>
            <option <?php if($insid[0]['maritialstat']=="1") echo 'selected="selected"'; ?> selected="selected" value="20">20</option>
            <option <?php if($insid[0]['maritialstat']=="2") echo 'selected="selected"'; ?> value="40">40</option>

          </select>
        </div>



        <label class="col-md-2 col-sm-2 form-control-label">Container Weight</label>
        <div class="col-sm-4 mg-t-5 mg-sm-b-10">
          <input class="form-control" data-val="true" data-val-length="The field permitno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Enter Container Weight" id="permitno" maxlength="50" name="ret_cont_wt" type="text" value="">
          <span class="field-validation-valid font-red" data-valmsg-for="permitno" data-valmsg-replace="true"></span>

        </div> 
      </div>

      <div class="row mg-t-10">
        <label class="col-md-2 col-sm-2 form-control-label">Load Type</label>
        <div class="col-sm-4 mg-t-5 mg-sm-b-10">
         <select class="form-control" data-val="true" data-val-number="The field maritialstatus must be a number." placeholder="The maritialstatus field is required." id="gdstype" name="ret_cont_load">
          <option value="">---Select Goods---</option>
          <option <?php if($insid[0]['maritialstat']=="1") echo 'selected="selected"'; ?>  value="Import">Import</option>
          <option <?php if($insid[0]['maritialstat']=="2") echo 'selected="selected"'; ?> value="Export">Export</option>
          <script >

            document.getElementById('gdstype').addEventListener('change', function () {
              var style = this.value == "Export" ? 'block' : 'none';
              document.getElementById('sealdiv').style.display = style;
              document.getElementById('seallabel').style.display = style;


            });
          </script>
        </select>
      </div>


      <label class="col-md-2 col-sm-2 form-control-label mg-t-15" id="seallabel" style="display: none;">Seal No </label>
      <div class="col-sm-4 mg-t-5 mg-sm-b-10" id="sealdiv">
        <input id="sealdiv" class="form-control" data-val="true" data-val-length="The field insurancename must be a string with a maximum length of 200." data-val-length-max="200" placeholder="Seal Number."  maxlength="200" name="ret_seal_no" type="text" value="">
        <span class="field-validation-valid font-red" data-valmsg-for="insurancename" data-valmsg-replace="true"></span>

      </div>



    </div>



    <div class="row mg-t-10">
      <label class="col-md-2 col-sm-2 form-control-label">Remarks</label>
      <div class="col-sm-10 mg-t-5 mg-sm-b-10">
        <input class="form-control" data-val="true" data-val-length="The field insurancename must be a string with a maximum length of 200." data-val-length-max="200" placeholder="Enter Remarks Here" id="insurancename" maxlength="200" name="ret_rem" type="text" value="">
        <span class="field-validation-valid font-red" data-valmsg-for="insurancename" data-valmsg-replace="true"></span>
      </div>
    </div>


  </div>
</div>


</div> 
</div>
</div>



<div id="dieseldiv_return">



      <div class="am-pagebody" >

 <div class="card  pd-sm-t-10 pd-sm-b-10 pd-sm-l-0 mg-l-0">

       <div class="row row-sm mg-t-0 pd-sm-l-30 pd-sm-r-30">

          <div class="col-xl-12 col-md-12 mg-l-0 pd-sm-l-0-force pd-sm-r-0-force">

           

            <div class="portlet-body">     
      <div align="right" style="float: right;">
     <button type="button" name="add" id="add_die_return" class="btn btn-info">Add New Entry</button>
    </div>
       <div class="mg-t-10 col-sm-8 pd-sm-l-0 pd-sm-r-0 pd-sm-t-15"> 
             <h6 class="card-body-title">Diesel Entries</h6>
           </div>
           


 <div class="col-sm-12 mg-t-30 pd-sm-l-0 pd-sm-r-0" id="responsecontainer_return">
                                                  
        <div class="col-sm-10 mg-t-5 mg-sm-b-10">


 <div class="col-xl">
  
</div>
      </div>





                   </div></div></div>



                   <div class="modal fade" id="return_die_add" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<!-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> -->

       <div class="col-xl-12 col-lg-12">

          


<div class="row mg-t-10">
          <label class="col-md-4 col-sm-4 form-control-label">Date</label>
          <div class="col-sm-8 mg-t-5 mg-sm-b-10 ">
           <div class="input-group">
              <span class="input-group-addon"><i class="icon ion-calendar tx-16 lh-0 op-6"></i></span>
              <input class="form-control datepicker" placeholder="Cash Date" name="hire_friet_adv_cash_date" id="datepicker_return" type="text" value="<?php echo date('d/m/Y');?>" >
            </div>
        </div>
      </div>

       <div class="row mg-t-10">
        <label class="col-md-4 col-sm-4 form-control-label">Vechicle Number</label>
        <div class="col-sm-8 mg-t-5 mg-sm-b-10">
          <input class="form-control" data-val="true" data-val-length="The field engineno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Driver Name" id="return_die_vechno" maxlength="50" name="return_driver" type="text"  disabled>
          <span class="field-validation-valid font-red" data-valmsg-for="engineno" data-valmsg-replace="true"></span>
        </div>
      </div>  

      <div class="row mg-t-10">
        <label class="col-md-4 col-sm-4 form-control-label">Driver</label>
        <div class="col-sm-8 mg-t-5 mg-sm-b-10">
          <input class="form-control" data-val="true" data-val-length="The field engineno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Driver Name" id="return_die_driver" maxlength="50" name="driver" type="text" value="" disabled>
             <input class="form-control" data-val="true" data-val-length="The field engineno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Driver Name" id="return_die_driver_id" maxlength="50" name="return_die_driver_id" type="hidden">
          <span class="field-validation-valid font-red" data-valmsg-for="engineno" data-valmsg-replace="true"></span>
        </div>
      </div>  
        

<div class="row mg-t-10">
        <label class="col-md-4 col-sm-4 form-control-label">Vendor</label>
        <div class="col-sm-8 mg-t-5 mg-sm-b-10">
<!--           <input class="form-control" data-val="true" data-val-length="The field engineno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Vendor Location" id="return_die_place" maxlength="50" name="place" type="text" value=""> -->
        
<?php
$vendor=mysqli_query($conn,"SELECT * from ledger WHERE nature='Diesel Station'; "); 

?>
<select class="form-control" data-val="true" placeholder="Vendor Name" id="return_die_vendor" name="vendor" >
<?php

while($vend = mysqli_fetch_array($vendor))
{
?>
<option  value="<?php echo $vend['name']; ?>"><?php echo $vend['name']; ?></option>

<?php
}

?>
</select>


          <span class="field-validation-valid font-red" data-valmsg-for="engineno" data-valmsg-replace="true"></span>
        </div>
      </div>
      <div class="row mg-t-10">
        <label class="col-md-4 col-sm-4 form-control-label">Place</label>
        <div class="col-sm-8 mg-t-5 mg-sm-b-10">
          <input class="form-control" data-val="true" data-val-length="The field engineno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Vendor Location" id="return_die_place" maxlength="50" name="vendor" type="text" value="">
          <span class="field-validation-valid font-red" data-valmsg-for="engineno" data-valmsg-replace="true"></span>
        </div>
      </div>

     


      <div class="row mg-t-10">
        <label class="col-md-4 col-sm-4 form-control-label">Quantity</label>
        <div class="col-sm-3 mg-t-5 mg-sm-b-10">
          <input class="form-control" data-val="true" data-val-length="The field insurancename must be a string with a maximum length of 200." data-val-length-max="200" placeholder="Quantity" id="return_die_qty" maxlength="200" name="qty" type="text" value="" onkeyup="diecalReta()">
          <span class="field-validation-valid font-red" data-valmsg-for="insurancename" data-valmsg-replace="true"></span>
        </div>

        <label class="col-md-3 col-sm-3 form-control-label">Price Per Litre</label>
        <div class="col-sm-2 mg-t-5 mg-sm-b-10">
          <input class="form-control" data-val="true" data-val-length="The field permitno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="0" id="return_die_ppl" maxlength="50" name="ppl" type="text" value="" disabled>
          <span class="field-validation-valid font-red" data-valmsg-for="permitno" data-valmsg-replace="true"></span>
        </div>
      </div>
      <div class="row mg-t-10">
        <label class="col-md-4 col-sm-4 form-control-label">Amount</label>
        <div class="col-sm-8 mg-t-5 mg-sm-b-10">
          <input class="form-control" data-val="true" data-val-length="The field insurancename must be a string with a maximum length of 200." data-val-length-max="200" placeholder="Diesel Amount" id="return_die_amt" maxlength="200" name="amt" type="text" value="" onkeyup="diecalReta()">
          <span class="field-validation-valid font-red" data-valmsg-for="insurancename" data-valmsg-replace="true" ></span>
        </div>
      </div>

 <div class="row mg-t-10">


        <label class="col-md-4 col-sm-4 form-control-label">Pay Type</label>                                                    
        <div class="col-sm-8 mg-t-5 mg-sm-b-10">

          <select class="form-control valid" data-val="true" placeholder="Select bilty paid type" id="return_die_billtype" name="billtype" style="padding:0px 6px !important;">
            <option <?php if($insid[0]['billtype']=="To Be Billed") echo 'selected="selected"'; ?> value="Cash">Cash</option>
            <option <?php if($insid[0]['billtype']=="Paid") echo 'selected="selected"'; ?> value="Credit">Credit</option>

            <option <?php if($insid[0]['billtype']=="Paid") echo 'selected="selected"'; ?> value="Driver Cash">Driver Cash</option>
            
          </select>
</div></div>
       
<div class="modal-footer pd-r-0">
<button type="button"  class="btn btn-default" data-dismiss="modal">Close</button>
<button type="button" id="return_die_insert" class="btn btn-primary">Save changes</button>
</div>
</div>
</div> </div>
     
</div>
</div>
                    
  </div>


   <div class="modal fade" id="return_editModel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<!-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> -->

       <div class="col-xl-12 col-lg-12">

          

<input   name="upd_id" id="return_upd_id" type="hidden"  >
<div class="row mg-t-10">
          <label class="col-md-4 col-sm-4 form-control-label">Date</label>
          <div class="col-sm-8 mg-t-5 mg-sm-b-10 ">
           <div class="input-group">
              <span class="input-group-addon"><i class="icon ion-calendar tx-16 lh-0 op-6"></i></span>
              <input class="form-control datepicker" placeholder="Cash Date" name="datepicker_ret_edit" id="datepicker_ret_edit" type="text"  >
            </div>
        </div>
      </div>
      
      <div class="row mg-t-10">
        <!-- <label class="col-md-4 col-sm-4 form-control-label">Driver</label> -->
        <div class="col-sm-8 mg-t-5 mg-sm-b-10">
          <input class="form-control" data-val="true" data-val-length="The field engineno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Driver Name" id="return_upd_driver" maxlength="50" name="upd_driver" type="hidden"  disabled>
          <span class="field-validation-valid font-red" data-valmsg-for="engineno" data-valmsg-replace="true"></span>
        </div>
      </div>  
        
      <div class="row mg-t-10">
        <label class="col-md-4 col-sm-4 form-control-label">Vendor</label>
        <div class="col-sm-8 mg-t-5 mg-sm-b-10">
<!--           <input class="form-control" data-val="true" data-val-length="The field engineno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Vendor Name" id="return_upd_vendor" maxlength="50" name="upd_vendor" type="text" > -->



<?php
$vendor=mysqli_query($conn,"SELECT * from ledger WHERE nature='Diesel Station'; "); 

?>
<select class="form-control" data-val="true" placeholder="Vendor Name" id="return_upd_vendor" name="upd_vendor" >
<?php

while($vend = mysqli_fetch_array($vendor))
{
?>
<option  value="<?php echo $vend['name']; ?>"><?php echo $vend['name']; ?></option>

<?php
}

?>
</select>


          <span class="field-validation-valid font-red" data-valmsg-for="engineno" data-valmsg-replace="true"></span>
        </div>
      </div>
<div class="row mg-t-10">
        <label class="col-md-4 col-sm-4 form-control-label">Place</label>
        <div class="col-sm-8 mg-t-5 mg-sm-b-10">
          <input class="form-control" data-val="true" data-val-length="The field engineno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Vendor Location" id="return_upd_place" maxlength="50" name="upd_place" type="text">
          <span class="field-validation-valid font-red" data-valmsg-for="engineno" data-valmsg-replace="true"></span>
        </div>
      </div>


     


      <div class="row mg-t-10">
        <label class="col-md-4 col-sm-4 form-control-label">Quantity</label>
        <div class="col-sm-3 mg-t-5 mg-sm-b-10">
          <input class="form-control" data-val="true" data-val-length="The field insurancename must be a string with a maximum length of 200." data-val-length-max="200" placeholder="Quantity" id="return_upd_qty" maxlength="200" name="upd_qty" type="text"  onkeyup="diecalReta2()">
          <span class="field-validation-valid font-red" data-valmsg-for="insurancename" data-valmsg-replace="true"></span>
        </div>

        <label class="col-md-3 col-sm-3 form-control-label">Price Per Litre</label>
        <div class="col-sm-2 mg-t-5 mg-sm-b-10">
          <input class="form-control" data-val="true" data-val-length="The field permitno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="0" id="return_upd_ppl" maxlength="50" name="return_upd_ppl" type="text" value="" disabled>
          <input class="form-control" data-val="true" data-val-length="The field permitno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="0" id="pplh" maxlength="50" name="pplh" type="hidden" value="" >
          <span class="field-validation-valid font-red" data-valmsg-for="permitno" data-valmsg-replace="true"></span>
        </div>
      </div>
      <div class="row mg-t-10">
        <label class="col-md-4 col-sm-4 form-control-label">Amount</label>
        <div class="col-sm-8 mg-t-5 mg-sm-b-10">
          <input class="form-control" data-val="true" data-val-length="The field insurancename must be a string with a maximum length of 200." data-val-length-max="200" placeholder="Diesel Amount" id="return_upd_amt" maxlength="200" name="upd_amt" type="text" onkeyup="diecalReta2()">
          <span class="field-validation-valid font-red" data-valmsg-for="insurancename" data-valmsg-replace="true" ></span>
        </div>
      </div>

 <div class="row mg-t-10">


        <label class="col-md-4 col-sm-4 form-control-label">Pay Type</label>                                                    
        <div class="col-sm-8 mg-t-5 mg-sm-b-10">

          <select class="form-control valid" data-val="true" placeholder="Select bilty paid type" id="return_upd_billtype" name="upd_billtype" style="padding:0px 6px !important;">
            <option <?php if($insid[0]['billtype']=="To Be Billed") echo 'selected="selected"'; ?> value="Cash">Cash</option>
            <option <?php if($insid[0]['billtype']=="Paid") echo 'selected="selected"'; ?> value="Credit">Credit</option>

            <option <?php if($insid[0]['billtype']=="Paid") echo 'selected="selected"'; ?> value="Driver Cash">Driver Cash</option>
            
          </select>
</div></div>
       
<div class="modal-footer pd-r-0">
<button type="button"  class="btn btn-default" data-dismiss="modal">Close</button>
<button type="button" id="return_update" class="btn btn-primary">Save changes</button>
</div>
</div></div></div>
</div> </div></div>





 
 




 <script >
$(function () {
$("#add_die_return").click(function(){
$('#return_die_add').modal('show');
var dte=$('#myVariable').val();
$('#datepicker_return').val(dte);

});
});
</script>

<script>

  $(document).on('click', '#return_update', function(){
   var dat = $('#datepicker_ret_edit').val();
   var fid = $('#return_upd_id').val();
   var dri = $('#return_upd_driver').val();
   var ven = $('#return_upd_vendor').val();
   var pla = $('#return_upd_place').val();
   var qt = $('#return_upd_qty').val();
   var pp = $('#return_upd_ppl').val();
   var at = $('#return_upd_amt').val();
   var bill = $('#return_upd_billtype').val();
   var vech="";

$.ajax({
     url:"fuelins.php",
     method:"POST",
     data:{date:dat, id:fid, vechno:vech, driver:dri, vendor:ven, place:pla, qty:qt, pricepl:pp, amount:at, billpay:bill},
     success:function(data)
     {
    /*  alert(data);*/
      fetch_data();
      $('#return_editModel').modal('hide');

   $('#return_upd_vendor').val("");
   $('#return_upd_place').val("");
   $('#return_upd_qty').val("");
   $('#return_upd_ppl').val("");
   $('#return_upd_amt').val("");
   $('#return_upd_billtype').val("");


       }
    });

  });
</script>




<!-- <script>
  document.addEventListener("DOMContentLoaded", function() {
fetch_data();

});
</script> -->
<!-- <script>

/*  Table View*/
  $('#mVechno').change(function(){
 fetch_data();
  });
</script> -->


<script>
function deletefuel(del_val)
{


$.ajax({
        type: "POST",
        url: "fueldel.php",
        data:'val='+del_val,
        success: function(data){ 
       fetch_data();
        }
      });


}
</script>



<script>

  $(document).on('click', '#return_die_insert', function(){



   var dat = $('#datepicker_return').val();
   var vno = $('#mVechno').val();
   var tid = $('#ret_tripid').val();
   var dri = $('#return_die_driver_id').val();
   var ven = $('#return_die_vendor').val();
   var pla = $('#return_die_place').val();
   var qt = $('#return_die_qty').val();
   var pp = $('#return_die_ppl').val();
   var at = $('#return_die_amt').val();
   var bill = $('#return_die_billtype').val();

 if(vno != '')
 {

$.ajax({
     url:"fuelins.php",
     method:"POST",
     data:{date:dat, vechno:vno, tripid:tid, driver:dri, vendor:ven, place:pla, qty:qt, pricepl:pp, amount:at, billpay:bill},
     success:function(data)
     {
      /*alert(data);*/
      fetch_data();
      
   $('#return_die_vendor').val("");
   $('#return_die_place').val("");
   $('#return_die_qty').val("");
   $('#return_die_ppl').val("");
   $('#return_die_amt').val("");
   $('#return_die_billtype').val("");
$('#return_die_add').modal('hide');
     }
    });

 }
 else
 {

alert("Please Select Vehicle Number")

 }

  });
</script>


      </div><!-- am-pagebody -->
     



<script>
  function diecalReta()
  {
    if((event.keyCode||event.which) != 9)
    {


      var die1 = document.getElementById('return_die_qty').value;
      var die2 = document.getElementById('return_die_amt').value;
      if (die1 == "")
       die1 = 0;
     if (die2 == "")
       die2 = 0;

     var total =  parseFloat(die2)/parseFloat(die1);

     var res = isNaN(total);
     if(res == true)
     {
      document.getElementById('return_die_ppl').value = 0;


    }
    else
    {
      document.getElementById('return_die_ppl').value=total;

    }
  }}
</script>
<script>
  function diecalReta2()
  {
    if((event.keyCode||event.which) != 9)
    {


      var die1 = document.getElementById('return_upd_qty').value;
      var die2 = document.getElementById('return_upd_amt').value;
      if (die1 == "")
       die1 = 0;
     if (die2 == "")
       die2 = 0;

     var total =  parseFloat(die2)/parseFloat(die1);

     var res = isNaN(total);
     if(res == true)
     {
      document.getElementById('return_upd_ppl').value = 0;

    }
    else
    {
      document.getElementById('return_upd_ppl').value=total;

    }
  }}
</script>


</div>





















</div>



<!--                    Load Details Start of an GC                          -->

<div id="hidden_div" style="display: block;">

 <div class="am-pagebody">
   <div class="card pd-20 form-layout form-layout-4">
     <div class="row row-sm ">
      <div class="col-xl-6">

        <div class="portlet-body">



<script>
     $("#hidden_div").ready(function(){
  var action = "Ref Number";

/*alert(action);*/

 $.ajax({
      type: "POST",
      type: "POST",
      url: "get_details.php",
      data:{ act:action },
      dataType: "json",
      success: function(data){
        $("#ID_UNIQUE").val(data.values);
/*alert(data.values);*/
}


});
});
/*  var elem = document.getElementById("ID_UNIQUE").value = randomNum;*/




</script>




          <div class="col-md-4">
           <div class="row mg-t-10"> 
             <h6 class="card-body-title">Load Details</h6>
           </div></div>
           <div class="row mg-t-10">
            <label class="col-md-2 form-control-label"> Ref No </label>
            <div class="col-sm-4 mg-t-5 mg-sm-b-10">
              <div class="input-group">
                <input type="text" class="form-control" placeholder="Ref. No." name="refno" id="ID_UNIQUE" readonly>
                <span class="input-group-btn">
                 <!--  <button class="btn bd bg-white tx-gray-600" type="button"><i class="icon ion-refresh" onclick="reload()" ></i></button> -->
                </span>
              </div></div>

            </div>
            <!-- </div> -->


            <div class="row mg-t-10">
              <label class="col-md-2 form-control-label"> From </label>
              <div class="col-sm-4 mg-t-5 mg-sm-b-10">

              <!--  <select   name="loadfrom" id="from" class="form-control"  >
                 <option value="">Select </option>
                 <?php $query =mysqli_query($conn,"SELECT * FROM locations");
                 while($row=mysqli_fetch_array($query))
                  { ?>
                    <option value="<?php echo $row['area'];?>" <?php if($row['area']==$insid[0]['vechOwner']) echo 'selected="selected"'; ?> ><?php echo $row['area'];?></option>
                    <?php
                  }
                  ?>
                </select> -->
 <input class="form-control" data-val="true" placeholder="Enter From Place" id="from_main" maxlength="50" name="loadfrom" type="text" autocomplete="off">
                                                                  
                                                       



<!-- +value="<?php echo $insid[0]['area']; ?>"
-->
  

   <script>
     $(document).ready(function(){
     
  $("#from_main").keyup(function(){

    $.ajax({
    type: "POST",
    url: "city_sugg.php",
    data:'keyword='+$(this).val(),
    beforeSend: function(){
      $("#from_main").css("background","#FFF url(LoaderIcon.gif) no-repeat 300px");
    },
    success: function(data){
 /*     alert(data);*/
      $("#cityname").show();
      $("#cityname").html(data);
      $("#from_main").css("background","#FFF");
    }
    });
  });
});

  </script> 
                                                     









                <span class="field-validation-valid font-red" data-valmsg-for="policyno" data-valmsg-replace="true"></span>
              
 <div class="" id="cityname">
                                                        </div>

              </div>


                                                          

              <label class="col-md-2 form-control-label"> To </label>
              <div class="col-sm-4 mg-t-10 mg-sm-b-10">
               <!-- <select   name="loadto" id="to" class="form-control"  >
                 <option value="">Select </option>
                 <?php $query =mysqli_query($conn,"SELECT * FROM locations ");
                 while($row=mysqli_fetch_array($query))
                  { ?>
                    <option value="<?php echo $row['area'];?>" <?php if($row['area']==$insid[0]['vechOwner']) echo 'selected="selected"'; ?> ><?php echo $row['area'];?></option>
                    <?php
                  }
                  ?>
                </select> -->
 <input class="form-control" data-val="true" placeholder="Enter From Place" id="to_main" maxlength="50" name="loadto" type="text" autocomplete="off">
                



 <script>
     $(document).ready(function(){
     
  $("#to_main").keyup(function(){

    $.ajax({
    type: "POST",
    url: "city_sugg.php",
    data:'key='+$(this).val(),
    beforeSend: function(){
      $("#to_main").css("background","#FFF url(LoaderIcon.gif) no-repeat 300px");
    },
    success: function(data){
 /*     alert(data);*/
      $("#cityname_to").show();
      $("#cityname_to").html(data);
      $("#to_main").css("background","#FFF");
    }
    });
  });
});

  </script> 










                <span class="field-validation-valid font-red" data-valmsg-for="policyno" data-valmsg-replace="true"></span>
              </div>




            </div>   
            <div class="" style="float: right !important;/* list-style:none; */margin-top:-3px;padding:0;width: 200px !important;position: relative !important;z-index:1;/* right: 0 !important; */"  id="cityname_to">
                                                        </div>                                

            <div class="row mg-t-10">
              <label class="col-md-2 form-control-label"> Company </label>
              <div class="col-sm-4 mg-t-5 mg-sm-b-10">
               <select   name="loadcomp" id="from" class="form-control"  >
                <!--  <option value="">Select </option> -->
                 <?php $query =mysqli_query($conn,"SELECT * FROM companies");
                 while($row=mysqli_fetch_array($query))
                  { ?>
                    <option value="<?php echo $row['name'];?>" <?php if($row['name']==$insid[0]['vechOwner']) echo 'selected="selected"'; ?> ><?php echo $row['name'];?></option>
                    <?php
                  }
                  ?>
                </select>
                <span class="field-validation-valid font-red" data-valmsg-for="permitno" data-valmsg-replace="true"></span>
              </div>

              <label class="col-md-2 form-control-label"> Transporter</label>
              <div class="col-sm-4 mg-t-10 mg-sm-b-10">
               
                  <input class="form-control" data-val="true" data-val-length="The field permitno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Goods Value." id="loadtransport" maxlength="50" name="loadtransport" type="text" value="" disabled >
                 <input class="form-control" data-val="true" data-val-length="The field permitno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Goods Value." id="loadtrans" maxlength="50" name="loadtrans" type="hidden" value="" >
           <script>
      $("#mVechno").change(function(){
      var val = $('#mVechno').val();
     
      
      $.ajax({
        type: "POST",
        url: "getvech.php",
        data:'vech_id='+val,
        success: function(data){ 
          
          $("#loadtransport").val(data);
          $("#loadtrans").val(data);
/*          alert(data);*/
          transpbank(data);
        }
      });
      
    
  });
  </script>
                <span class="field-validation-valid font-red" data-valmsg-for="permitno" data-valmsg-replace="true"></span>
              </div>

            </div>

   <div class="row mg-t-10">
             <label class="col-md-2 form-control-label" > Driver  </label>
             <div class="col-sm-4 mg-t-5 mg-sm-b-10">
              <select name="loaddriver" id="loaddriver" class="form-control" style="background-color:#e74141;">
                <option value="">Select </option>
                <?php $query =mysqli_query($conn,"SELECT * FROM drivers ");
                while($row=mysqli_fetch_array($query))
                 { ?>
                   <option value="<?php echo $row['id'];?>" ><?php echo $row['name'];?></option>
                   <?php
                 }
                 ?>
               </select>
               <span class="field-validation-valid font-red" data-valmsg-for="permitno" data-valmsg-replace="true"></span>

             </div>
             <div class="col-md-4" id="gcdiv">
               <span style="padding-right:20px;"><button type="button" class="ion-plus-circled tx-16 lh-0 op-6" data-toggle="modal" data-target="#modaldemo1" ></button></span><span style=" font-size: 20px;  ">Add GC</span>

             </div>
           </div>


            <div id="modaldemo1" class="modal fade">
              <div class="modal-dialog modal-dialog-vertical-center" role="document">
                <div class="modal-content bd-0 tx-14">
                  <div class="modal-header pd-y-20 pd-x-25">
                    <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Consigner & Consignee Details</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>


                  <div class="modal-body pd-25">
                   <div class="row mg-t-10">
                    <label class="col-md-2 form-control-label">ASS Log. GC No </label>
                    <div class="col-sm-10 mg-t-5 mg-sm-b-10">
                      <input class="form-control" data-val="true" data-val-length="The field bodytype must be a string with a maximum length of 100." data-val-length-max="100" placeholder="Enter GC Number" id="ass_gc" maxlength="100" name="assgc" value="" type="text"  >
                      <span class="field-validation-valid font-red" data-valmsg-for="bodytype" data-valmsg-replace="true"></span>
                    </div>
                  </div>  


                  <div class="row mg-t-10">
                    <label class="col-md-2 form-control-label">Consigner Name </label>
                    <div class="col-sm-10 mg-t-5 mg-sm-b-10">
                     <select   name="gcconsignor" id="consignor_name" class="form-control"  >
                       <option value="">Select </option>
                       <?php $query =mysqli_query($conn,"SELECT * FROM customer ");
                       while($row=mysqli_fetch_array($query))
                        { ?>
                          <option value="<?php echo $row['name'];?>" <?php if($row['name']==$insid[0]['vechOwner']) echo 'selected="selected"'; ?> ><?php echo $row['name'];?></option>
                          <?php
                        }
                        ?>
                      </select>
                      <span class="field-validation-valid font-red" data-valmsg-for="permitno" data-valmsg-replace="true"></span>

                    </div>
                  </div>






                  <div class="row mg-t-10">
                   <label class="col-md-2 form-control-label">Consignee Name </label>
                   <div class="col-sm-10 mg-t-5 mg-sm-b-10">
                    <select   name="gcconsignee" id="consignee_name" class="form-control"  >
                     <option value="">Select </option>
                     <?php $query =mysqli_query($conn,"SELECT * FROM customer ");
                     while($row=mysqli_fetch_array($query))
                      { ?>
                        <option value="<?php echo $row['name'];?>" <?php if($row['name']==$insid[0]['vechOwner']) echo 'selected="selected"'; ?> ><?php echo $row['name'];?></option>
                        <?php
                      }
                      ?>
                    </select>
                    <span class="field-validation-valid font-red" data-valmsg-for="insurancename" data-valmsg-replace="true"></span>
                  </div>
                </div>





                <div class="row mg-t-10">
                 <label class="col-md-2 form-control-label"> Articles  </label>
                 <div class="col-sm-4 mg-t-5 mg-sm-b-10">
                  <input class="form-control" data-val="true" data-val-length="The field permitno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="No. of Articles" id="gc_articles" maxlength="50" name="gcarticles" type="text" value="" >
                  <span class="field-validation-valid font-red" data-valmsg-for="permitno" data-valmsg-replace="true"></span>
                </div>

                <label class="col-md-2 form-control-label"> Value  </label>
                <div class="col-sm-4 mg-t-5 mg-sm-b-10">
                  <input class="form-control" data-val="true" data-val-length="The field permitno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Goods Value." id="gc_value" maxlength="50" name="gcvalue" type="text" value="" >
                  <span class="field-validation-valid font-red" data-valmsg-for="permitno" data-valmsg-replace="true"></span>
                </div> </div>

                <div class="row mg-t-10">
                  <label class="col-md-2 form-control-label">Description </label>
                  <div class="col-sm-10 mg-t-5 mg-sm-b-10">
                    <input class="form-control" data-val="true" data-val-length="The field permitno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Enter Description" id="gc_desc" maxlength="50" name="gcdesc" type="text" value="" >
                    <span class="field-validation-valid font-red" data-valmsg-for="permitno" data-valmsg-replace="true"></span>
                  </div>
                </div> 

                <div class="modal-footer">
                  <button type="button" id="addgc" class="btn btn-info pd-x-20" data-dismiss="modal" >Done</button>
                  <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal">Close</button>
                </div>
              </div></div>


<script>

  $(document).on('click','#addgc', function(){

/*alert("enter");*/




   var assgc = $('#ass_gc').val();
   var consigor = $('#consignor_name').val();
   var consignee = $('#consignee_name').val();
   var articles = $('#gc_articles').val();
   var value = $('#gc_value').val();
   var desc =$('#gc_desc').val();
   var tid =$('#ID_UNIQUE').val();
$.ajax({
     url:"gcno_actions.php",
     method:"POST",
     data:{gcno:assgc, consee_name:consigor, consor:consignee, art:articles, val:value, des:desc,tripid:tid},
     success:function(data)
     {
/*      alert(data);*/
      $("#gcdiv").html(data);
     }
    });
  });

</script>



<script>

function deletegc(val)
{
var action="delete";
  $.ajax({
     url:"gcno_actions.php",
     method:"POST",
     data:{value:val, act:action },
     success:function(data)
     {
     /* alert(data);*/
      $("#gcdiv").html(data);
     }
    });


}




</script>









            </div><!-- modal-dialog -->





          </div>


          <div class="row mg-t-10">
           <label class="col-md-2 form-control-label">Party Name</label>
           <div class="col-sm-10 mg-t-5 mg-sm-b-10">

             <select   name="loadparty" id="insurancename" class="form-control" onchange="bankfetch(this.value)" >
                 <option value="">Select </option>
                 <?php $query =mysqli_query($conn,"SELECT * FROM customer ");
                 while($row=mysqli_fetch_array($query))
                  { ?>
                    <option value="<?php echo $row['name'];?>" ><?php echo $row['name'];?></option>
                    <?php
                  }
                  ?>
                </select>
         <!--    <input class="form-control" data-val="true" data-val-length="The field insurancename must be a string with a maximum length of 200." data-val-length-max="200" placeholder="Enter Party Name" id="insurancename" maxlength="200" name="loadparty" type="text" value=""> -->
            <span class="field-validation-valid font-red" data-valmsg-for="insurancename" data-valmsg-replace="true"></span>
          </div>
        </div>

<script>

function bankfetch(val)
{

 $.ajax({    
        type: "POST",
        url: "get_district.php",
        data:{cust_id:val},            
        dataType: "html",          
        success: function(response){     
                     
            $("#frt_adv_cqe_bnk").html(response); 
            //alert(response);
        }
        });
  


}
</script>




      </div></div>

      <div class="col-xl-6">


       <div class="portlet-body">
        <div class="row mg-t-10">

          <div class="col-sm-8 mg-t-10 mg-sm-b-10"></div></div>
          <div class="portlet-body">
           <div class="row mg-t-10">
             <label class="col-md-2 form-control-label">GC No </label>
             <div class="col-sm-10 mg-t-5 mg-sm-b-10">
              <input class="form-control" data-val="true" data-val-length="The field permitno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Enter GC Number" id="permitno" maxlength="50" name="loadgcno" type="text" value="">
              <span class="field-validation-valid font-red" data-valmsg-for="permitno" data-valmsg-replace="true"></span>

            </div>
          </div> 

          <div class="row mg-t-10">
            <label class="col-md-2 form-control-label">Reference No </label>
            <div class="col-sm-4 mg-t-5 mg-sm-b-10">
              <input class="form-control" data-val="true" data-val-length="The field insurancename must be a string with a maximum length of 200." data-val-length-max="200" placeholder="Enter Reference Number" id="insurancename" maxlength="200" name="loadrefno" type="text" value="">
              <span class="field-validation-valid font-red" data-valmsg-for="insurancename" data-valmsg-replace="true"></span>
            </div>

            <label class="col-md-2 form-control-label">Container No </label>
            <div class="col-sm-4 mg-t-5 mg-sm-b-10">
              <input class="form-control" data-val="true" data-val-length="The field permitno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Enter Container Number" id="ldcontno" maxlength="50" name="loadcontno" type="text" value="" onkeypress="return onlyAlphabets(event,this);">

              <span class="field-validation-valid font-red" data-valmsg-for="permitno" data-valmsg-replace="true"></span>
            </div>
          </div>



          <div class="row mg-t-10">
            <label class="col-md-2 form-control-label">Container Size </label>
            <div class="col-sm-4 mg-t-5 mg-sm-b-10">
             <select class="form-control" data-val="true" data-val-number="The field maritialstatus must be a number." placeholder="The maritialstatus field is required." id="mstatus" name="loadcontsize">
              <option value="">---Select Container Size---</option>
              <option <?php if($insid[0]['maritialstat']=="1") echo 'selected="selected"'; ?> selected="selected" value="20">20</option>
              <option <?php if($insid[0]['maritialstat']=="2") echo 'selected="selected"'; ?> value="40">40</option>

            </select>
          </div>



          <label class="col-md-2 form-control-label">Container Weight </label>
          <div class="col-sm-4 mg-t-5 mg-sm-b-10">
            <input class="form-control" data-val="true" data-val-length="The field permitno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Enter Container Weight" id="permitno" maxlength="50" name="loadcontwt" type="text" value="">
            <span class="field-validation-valid font-red" data-valmsg-for="permitno" data-valmsg-replace="true"></span>

          </div> 
        </div>

        <div class="row mg-t-10">
          <label class="col-md-2 form-control-label">Load Type </label>
          <div class="col-sm-4 mg-t-5 mg-sm-b-10">
           <select class="form-control" data-val="true" data-val-number="The field maritialstatus must be a number." placeholder="The maritialstatus field is required." id="gdstype2" name="contloadtype">
            <option value="">---Select Goods---</option>
            <option <?php if($insid[0]['maritialstat']=="1") echo 'selected="selected"'; ?>  value="Import">Import</option>
            <option <?php if($insid[0]['maritialstat']=="2") echo 'selected="selected"'; ?> value="Export">Export</option>
            <script >

              document.getElementById('gdstype2').addEventListener('change', function () {
                var style = this.value == "Export" ? 'block' : 'none';
                document.getElementById('sealdiv2').style.display = style;
                document.getElementById('seallabel2').style.display = style;


              });
            </script>
          </select>
        </div>


        <label class="col-md-2 form-control-label" id="seallabel2" style="display: none">Seal No </label>
        <div class="col-sm-4 mg-t-5 mg-sm-b-10" id="sealdiv2">
          <input id="sealdiv2" class="form-control" data-val="true" data-val-length="The field insurancename must be a string with a maximum length of 200." data-val-length-max="200" placeholder="Seal Number."  maxlength="200" name="sealno" type="text" value="">
          <span class="field-validation-valid font-red" data-valmsg-for="insurancename" data-valmsg-replace="true"></span>

        </div>



      </div>



      <div class="row mg-t-10">
        <label class="col-md-2 form-control-label">Remarks </label>
        <div class="col-sm-10 mg-t-5 mg-sm-b-10">
          <input class="form-control" data-val="true" data-val-length="The field insurancename must be a string with a maximum length of 200." data-val-length-max="200" placeholder="Enter Remarks Here" id="insurancename" maxlength="200" name="loadrem" type="text" value="">
          <span class="field-validation-valid font-red" data-valmsg-for="insurancename" data-valmsg-replace="true"></span>

        </div>
      </div>


    </div>
  </div>
</div>
</div>
</div>

</div> 

<div class="am-pagebody">
 <div class="card pd-20 form-layout form-layout-4">
   <div class="row row-sm ">
    <div class="col-xl-6">

      <div class="portlet-body">



        <div class="col-md-4">
         <div class="row mg-t-10"> 
           <h6 class="card-body-title">Frieght Details</h6>
         </div></div>


         <div class="row mg-t-10">
          <label class="col-md-2 form-control-label">Freight Amount </label>
          <div class="col-sm-4 mg-t-5 mg-sm-b-10">
            <input class="amt_cal form-control" data-val="true" data-val-length="The field insurancename must be a string with a maximum length of 200." data-val-length-max="200" placeholder="Enter Freight Amount" id="lfreightamt" maxlength="200" name="frt_amt" type="text" value="" onkeyup= "fintot()">
            <span class="field-validation-valid font-red" data-valmsg-for="insurancename" data-valmsg-replace="true"></span>
          </div>

          <label class="col-md-2 form-control-label">Loading Charges </label>
          <div class="col-sm-4 mg-t-5 mg-sm-b-10">
            <input class="amt_cal form-control" data-val="true" data-val-length="The field permitno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Loading Charges" id="lldngcgs" maxlength="50" name="frt_ldg_chrg" type="text" value="" onkeyup= "fintot()" >
            <span class="field-validation-valid font-red" data-valmsg-for="permitno" data-valmsg-replace="true"></span>
          </div>
        </div>



        <div class="row mg-t-10">
          <label class="col-md-2 form-control-label">Un-Loading Charges </label>
          <div class="col-sm-4 mg-t-5 mg-sm-b-10">
            <input class="amt_cal form-control" data-val="true" data-val-length="The field insurancename must be a string with a maximum length of 200." data-val-length-max="200" placeholder="Enter Un Loading Charges" id="luldngcgs" maxlength="200" name="frt_unldg_chrg" type="text" value="" onkeyup= "fintot()" >
            <span class="field-validation-valid font-red" data-valmsg-for="insurancename" data-valmsg-replace="true"></span>
          </div>

          <label class="col-md-2 form-control-label">Weigh Bill Charges </label>
          <div class="col-sm-4 mg-t-5 mg-sm-b-10">
            <input class="amt_cal form-control" data-val="true" data-val-length="The field permitno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Weigh Bill Charges" id="lwbillcgs" maxlength="50" name="frt_weigh_crg" type="text" value="" onkeyup= "fintot()" readonly>
            <span class="field-validation-valid font-red" data-valmsg-for="permitno" data-valmsg-replace="true"></span>
          </div>
        </div>


        <div class="row mg-t-10">
          <label class="col-md-2 form-control-label">Other Amount </label>
          <div class="col-sm-4 mg-t-5 mg-sm-b-10">


            <input class="amt_cal form-control" data-val="true" data-val-length="The field permitno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Other Amount" id="lotramt" maxlength="50" name="frt_other_crg" type="text" value="" onkeyup= "fintot()" readonly>
            <span class="field-validation-valid font-red" data-valmsg-for="permitno" data-valmsg-replace="true"  ></span> </div>

            <label class="col-md-2 form-control-label">Other Description</label>
            <div class="col-sm-4 mg-t-5 mg-sm-b-10">
              <input class="form-control" data-val="true" data-val-length="The field insurancename must be a string with a maximum length of 200." data-val-length-max="200" placeholder="Description" id="lodes" maxlength="200" name="frt_other_desc" type="text" value="" readonly>
              <span class="field-validation-valid font-red" data-valmsg-for="insurancename" data-valmsg-replace="true"></span>
            </div>
          </div>

          <div class="row mg-t-10">
            <label class="col-md-2 form-control-label">Halt Days </label>
            <div class="col-sm-4 mg-t-5 mg-sm-b-10">
              <input class="form-control" data-val="true" data-val-length="The field insurancename must be a string with a maximum length of 200." data-val-length-max="200" placeholder="Halt Days" id="lhltdays" maxlength="200" name="frt_hlt_days" type="text" value="" onkeyup="fval()" readonly >
              <span class="field-validation-valid font-red" data-valmsg-for="insurancename" data-valmsg-replace="true"></span>
            </div>

            <label class="col-md-2 form-control-label">Rate </label>
            <div class="col-sm-4 mg-t-5 mg-sm-b-10">
              <input class="form-control" data-val="true" data-val-length="The field permitno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Halt Rate" id="hltrate" maxlength="50" name="frt_hlt_rate" type="text" value="" readonly
              onkeyup="fval()" >
              <span class="field-validation-valid font-red" data-valmsg-for="permitno" data-valmsg-replace="true"></span>
            </div>
          </div>






          <div class="row mg-t-10">

            <label class="col-md-2 form-control-label">Halt Amount </label>
            <div class="col-sm-10 mg-t-5 mg-sm-b-10">
              <input class="amt_cal form-control" data-val="true" data-val-length="The field bodytype must be a string with a maximum length of 100." data-val-length-max="100" placeholder="0" id="lhltamt" maxlength="100" name="fhltamt" value="" type="text" disabled >
              <input class="amt_cal form-control" data-val="true" data-val-length="The field bodytype must be a string with a maximum length of 100." data-val-length-max="100" placeholder="0" id="lhltamth" maxlength="100" name="frt_hlt_amt" value="" type="hidden"  >
              <span class="field-validation-valid font-red" data-valmsg-for="bodytype" data-valmsg-replace="true"></span>
            </div>
          </div>


          <div class="row mg-t-10">

            <label class="col-md-2 form-control-label">Total Frieght </label>
            <div class="col-sm-10 mg-t-5 mg-sm-b-10">
              <input class="form-control" data-val="true" data-val-length="The field bodytype must be a string with a maximum length of 100." data-val-length-max="100" placeholder="Total Amount" id="ttlfreight" maxlength="100" name="fttlfreighth" value="" type="text" disabled >
              <input class="form-control" data-val="true" data-val-length="The field bodytype must be a string with a maximum length of 100." data-val-length-max="100" placeholder="Total Amount" id="ttlfreighth" maxlength="100" name="frt_total" value="" type="hidden" >
              <span class="field-validation-valid font-red" data-valmsg-for="bodytype" data-valmsg-replace="true"></span>
            </div>
          </div>


         







  </div>
</div>

<div class="col-xl-6">


 <div class="portlet-body">
  <div class="row mg-t-10">

    <div class="col-sm-8 mg-t-10 mg-sm-b-10"></div></div>
    
 <div class="row mg-t-10">
            <label class="col-md-2 form-control-label">Adv. Amount </label>
            <div class="col-sm-4 mg-t-5 mg-sm-b-10">
              <input class="form-control" data-val="true" data-val-length="The field insurancename must be a string with a maximum length of 200." data-val-length-max="200" placeholder="0" id="advcsh" maxlength="200" name="frt_adv_cash" type="text" value="" onkeyup="totval()">
              <span class="field-validation-valid font-red" data-valmsg-for="insurancename" data-valmsg-replace="true"></span>
            </div>
            <div class="col-sm-6 mg-t-5 mg-sm-b-10">
             <div class="input-group">
              <span class="input-group-addon"><i class="icon ion-calendar tx-16 lh-0 op-6"></i></span>
              <input class="form-control datepicker" placeholder="Cash Date" name="frt_adv_cash_dte" id="datepicker_adv_cash" type="text" value="<?php echo date('d/m/Y');?>" >
            </div>
            <span class="field-validation-valid font-red" data-valmsg-for="permitno" data-valmsg-replace="true"></span>

          </div>
        </div>

        <script>

function changedte(val)
{
/*alert(val);*/
   $('#datepicker_adv_cash').val(val);

}
</script>

        <div class="row mg-t-10">
          <label class="col-md-2 form-control-label">Payment Type </label>
          <div class="col-sm-4 mg-t-5 mg-sm-b-10">
                       <select class="form-control" data-val="true" data-val-number="The field maritialstatus must be a number." placeholder="The maritialstatus field is required." id="frt_adv_cqe" onchange="bankdiv(this.value)" name="frt_adv_cqe">
<?php
$quer=mysqli_query($conn,"SELECT * from pay_type"); 
while($pay = mysqli_fetch_array($quer))
{
  ?>
            <option  value="<?php echo $pay['pay_type'];?>"><?php echo $pay['pay_type'];?></option>
            <?php
          }?>
            
   
            <script >
function bankdiv(val){
/*  alert(val);*/
if(val=="Cash"||val=="cash")
{

 $("#cque_div").hide();


}
else
{

 $("#cque_div").show();


}

}
            </script>
          </select>
            <span class="field-validation-valid font-red" data-valmsg-for="insurancename" data-valmsg-replace="true"></span>
          </div>

      </div>



<!--         <div class="row mg-t-10">
          <label class="col-md-2 form-control-label">Adv. Cheq Amount. </label>
          <div class="col-sm-4 mg-t-5 mg-sm-b-10">
            <input class="form-control" data-val="true" data-val-length="The field insurancename must be a string with a maximum length of 200." data-val-length-max="200" placeholder="0" id="advcqe" maxlength="200" name="frt_adv_cqe" type="text" value="" onkeyup="totval()">
            <span class="field-validation-valid font-red" data-valmsg-for="insurancename" data-valmsg-replace="true"></span>
          </div>
          <div class="col-sm-6 mg-t-5 mg-sm-b-10">
           <div class="input-group">
            <span class="input-group-addon"><i class="icon ion-calendar tx-16 lh-0 op-6"></i></span>
            <input class="form-control datepicker" placeholder="Cheque Date" name="frt_adv_cqe_dte" id="datepicker_adv_cque" type="text" value="<?php echo date('d/m/Y');?>" >
          </div>
          <span class="field-validation-valid font-red" data-valmsg-for="permitno" data-valmsg-replace="true"></span>

        </div>
      </div> -->

      <div class="row mg-t-10" id="bank_div">
       <label class="col-md-2 form-control-label">To Account</label>
       <div class="col-sm-10 mg-t-5 mg-sm-b-10">
<!--         <input class="form-control" data-val="true" data-val-length="The field insurancename must be a string with a maximum length of 200." data-val-length-max="200" placeholder="Enter Bank Name" id="frt_adv_cqe_bnk" maxlength="200" name="frt_adv_cqe_bnk" type="text" value=""> -->
 <select class="form-control" data-val="true" data-val-number="The field maritialstatus must be a number." placeholder="The maritialstatus field is required." id="frt_adv_cqe_bnk"  name="frt_adv_cqe_bnk" ">

</select>


        <span class="field-validation-valid font-red" data-valmsg-for="insurancename" data-valmsg-replace="true"></span>
      </div>
    </div>



    <div class="row mg-t-10" id="cque_div">

      <label class="col-md-2 form-control-label">Cheque Number </label>
      <div class="col-sm-10 mg-t-5 mg-sm-b-10">
        <input class="form-control" data-val="true" data-val-length="The field bodytype must be a string with a maximum length of 100." data-val-length-max="100" placeholder="Enter Cheque Number" id="frt_adv_cqe_num" maxlength="100" name="frt_adv_cqe_num" type="text" value=""  >
        <span class="field-validation-valid font-red" data-valmsg-for="bodytype" data-valmsg-replace="true"></span>
      </div>
    </div>


    <div class="row mg-t-10">

      <label class="col-md-2 form-control-label">Freight Balance </label>
      <div class="col-sm-10 mg-t-5 mg-sm-b-10">
        <input class="form-control" data-val="true" data-val-length="The field bodytype must be a string with a maximum length of 100." data-val-length-max="100" placeholder="Freight Balance" id="frtbal" maxlength="100" name="frtbal" value="" type="text" disabled >
        <input class="form-control" data-val="true" data-val-length="The field bodytype must be a string with a maximum length of 100." data-val-length-max="100" placeholder="Freight Balance" id="frtbalh" maxlength="100" name="frt_bal" value="" type="hidden" >
        <span class="field-validation-valid font-red" data-valmsg-for="bodytype" data-valmsg-replace="true"></span>
      </div>
    </div>







    </div>
  </div>
</div>
</div>

</div> 


<div id="dieseldiv_load">



      <div class="am-pagebody" >

 <div class="card  pd-sm-t-10 pd-sm-b-10 pd-sm-l-0 mg-l-0">

       <div class="row row-sm mg-t-0 pd-sm-l-30 pd-sm-r-30">

          <div class="col-xl-12 col-md-12 mg-l-0 pd-sm-l-0-force pd-sm-r-0-force">

           

            <div class="portlet-body">

      <div align="right" style="float: right;">
     <button type="button" name="add" id="add_die_load" class="btn btn-info">Add New Entry</button>
    </div>
       <div class="mg-t-10 col-sm-8 pd-sm-l-0 pd-sm-r-0 pd-sm-t-15"> 
             <h6 class="card-body-title">Diesel Entries</h6>
           </div>
           


 <div class="col-sm-12 mg-t-30 pd-sm-l-0 pd-sm-r-0" id="responsecontainer_load">
                                                  
        <div class="col-sm-10 mg-t-5 mg-sm-b-10">


 <div class="col-xl">
  
</div>
      </div>





                   </div></div></div>



                   <div class="modal fade" id="load_die_add" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<!-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> -->

       <div class="col-xl-12 col-lg-12">

          


<div class="row mg-t-10">
          <label class="col-md-4 col-sm-4 form-control-label">Date</label>
          <div class="col-sm-8 mg-t-5 mg-sm-b-10 ">
           <div class="input-group">
              <span class="input-group-addon"><i class="icon ion-calendar tx-16 lh-0 op-6"></i></span>
              <input class="form-control datepicker" placeholder="Cash Date" name="datepicker_load" id="datepicker_load" type="text" value="<?php echo date('d/m/Y');?>" >
            </div>
        </div>
      </div>

       <div class="row mg-t-10">
        <label class="col-md-4 col-sm-4 form-control-label">Vechicle Number</label>
        <div class="col-sm-8 mg-t-5 mg-sm-b-10">
          <input class="form-control" data-val="true" data-val-length="The field engineno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Driver Name" id="load_die_vechno" maxlength="50" name="return_driver" type="text"  disabled>
          <span class="field-validation-valid font-red" data-valmsg-for="engineno" data-valmsg-replace="true"></span>
        </div>
      </div>  

      <div class="row mg-t-10">
        <label class="col-md-4 col-sm-4 form-control-label">Driver</label>
        <div class="col-sm-8 mg-t-5 mg-sm-b-10">
          <input class="form-control" data-val="true" data-val-length="The field engineno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Assigned Driver" id="load_die_driver" maxlength="50" name="driver" type="text" value="" disabled>
          <input class="form-control" data-val="true" data-val-length="The field engineno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Driver Name" id="load_die_driver_id" maxlength="50" name="driver" type="hidden" value="">
          <span class="field-validation-valid font-red" data-valmsg-for="engineno" data-valmsg-replace="true"></span>
        </div>
      </div>  
        
      <div class="row mg-t-10">
        <label class="col-md-4 col-sm-4 form-control-label">Vendor</label>
        <div class="col-sm-8 mg-t-5 mg-sm-b-10">
         <!--  <input class="form-control" data-val="true" data-val-length="The field engineno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Vendor Name" id="load_die_vendor" maxlength="50" name="vendor" type="text" value=""> -->
<?php
$vendor=mysqli_query($conn,"SELECT * from ledger WHERE nature='Diesel Station'; "); 

?>
<select class="form-control" data-val="true" placeholder="Vendor Name" id="load_die_vendor" name="vendor" >
<?php

while($vend = mysqli_fetch_array($vendor))
{
?>
<option  value="<?php echo $vend['name']; ?>"><?php echo $vend['name']; ?></option>

<?php
}

?>
</select>
          <span class="field-validation-valid font-red" data-valmsg-for="engineno" data-valmsg-replace="true"></span>
        </div>
      </div>
<div class="row mg-t-10">
        <label class="col-md-4 col-sm-4 form-control-label">Place</label>
        <div class="col-sm-8 mg-t-5 mg-sm-b-10">
          <input class="form-control" data-val="true" data-val-length="The field engineno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Vendor Location" id="load_die_place" maxlength="50" name="place" type="text" value="">
          <span class="field-validation-valid font-red" data-valmsg-for="engineno" data-valmsg-replace="true"></span>
        </div>
      </div>


     


      <div class="row mg-t-10">
        <label class="col-md-4 col-sm-4 form-control-label">Quantity</label>
        <div class="col-sm-3 mg-t-5 mg-sm-b-10">
          <input class="form-control" data-val="true" data-val-length="The field insurancename must be a string with a maximum length of 200." data-val-length-max="200" placeholder="Quantity" id="load_die_qty" maxlength="200" name="qty" type="text" value="" onkeyup="diecalRet()">
          <span class="field-validation-valid font-red" data-valmsg-for="insurancename" data-valmsg-replace="true"></span>
        </div>

        <label class="col-md-3 col-sm-3 form-control-label">Price Per Litre</label>
        <div class="col-sm-2 mg-t-5 mg-sm-b-10">
          <input class="form-control" data-val="true" data-val-length="The field permitno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="0" id="load_die_ppl" maxlength="50" name="ppl" type="text" value="" disabled>
          <span class="field-validation-valid font-red" data-valmsg-for="permitno" data-valmsg-replace="true"></span>
        </div>
      </div>
      <div class="row mg-t-10">
        <label class="col-md-4 col-sm-4 form-control-label">Amount</label>
        <div class="col-sm-8 mg-t-5 mg-sm-b-10">
          <input class="form-control" data-val="true" data-val-length="The field insurancename must be a string with a maximum length of 200." data-val-length-max="200" placeholder="Diesel Amount" id="load_die_amt" maxlength="200" name="amt" type="text" value="" onkeyup="diecalRet()">
          <span class="field-validation-valid font-red" data-valmsg-for="insurancename" data-valmsg-replace="true" ></span>
        </div>
      </div>

 <div class="row mg-t-10">


        <label class="col-md-4 col-sm-4 form-control-label">Pay Type</label>                                                    
        <div class="col-sm-8 mg-t-5 mg-sm-b-10">

          <select class="form-control valid" data-val="true" placeholder="Select bilty paid type" id="load_die_billtype" name="billtype" style="padding:0px 6px !important;">
            <option <?php if($insid[0]['billtype']=="To Be Billed") echo 'selected="selected"'; ?> value="Cash">Cash</option>
            <option <?php if($insid[0]['billtype']=="Paid") echo 'selected="selected"'; ?> value="Credit">Credit</option>

            <option <?php if($insid[0]['billtype']=="Paid") echo 'selected="selected"'; ?> value="Driver Cash">Driver Cash</option>
            
          </select>
</div></div>
       
<div class="modal-footer pd-r-0">
<button type="button"  class="btn btn-default" data-dismiss="modal">Close</button>
<button type="button" id="load_die_insert" class="btn btn-primary">Save changes</button>
</div>
</div>
</div> </div>
     
</div>
</div>
                  

  </div>


   <div class="modal fade" id="load_editModel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<!-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> -->

       <div class="col-xl-12 col-lg-12">

          

<input   name="upd_id" id="load_upd_id" type="hidden"  >
<div class="row mg-t-10">
          <label class="col-md-4 col-sm-4 form-control-label">Date</label>
          <div class="col-sm-8 mg-t-5 mg-sm-b-10 ">
           <div class="input-group">
              <span class="input-group-addon"><i class="icon ion-calendar tx-16 lh-0 op-6"></i></span>
              <input class="form-control datepicker" placeholder="Cash Date" name="datepicker_load_upd" id="datepicker_load_upd" type="text"  >
            </div>
        </div>
      </div>
      
      <div class="row mg-t-10">
       <!--  <label class="col-md-4 col-sm-4 form-control-label">Driver</label> -->
        <div class="col-sm-8 mg-t-5 mg-sm-b-10">
          <input class="form-control" data-val="true" data-val-length="The field engineno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Driver Name" id="load_upd_driver" maxlength="50" name="upd_driver" type="hidden"  disabled>
          <span class="field-validation-valid font-red" data-valmsg-for="engineno" data-valmsg-replace="true"></span>
        </div>
      </div>  
        
      <div class="row mg-t-10">
        <label class="col-md-4 col-sm-4 form-control-label">Vendor</label>
        <div class="col-sm-8 mg-t-5 mg-sm-b-10">
         <!--  <input class="form-control" data-val="true" data-val-length="The field engineno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Vendor Name" id="load_upd_vendor" maxlength="50" name="upd_vendor" type="text" > -->
        


<?php
$vendor=mysqli_query($conn,"SELECT * from ledger WHERE nature='Diesel Station'; "); 

?>
<select class="form-control" data-val="true" placeholder="Vendor Name" id="load_upd_vendor" name="upd_vendor" >
<?php

while($vend = mysqli_fetch_array($vendor))
{
?>
<option  value="<?php echo $vend['name']; ?>"><?php echo $vend['name']; ?></option>

<?php
}

?>
</select>

  <span class="field-validation-valid font-red" data-valmsg-for="engineno" data-valmsg-replace="true"></span>


        </div>
      </div>
<div class="row mg-t-10">
        <label class="col-md-4 col-sm-4 form-control-label">Place</label>
        <div class="col-sm-8 mg-t-5 mg-sm-b-10">
          <input class="form-control" data-val="true" data-val-length="The field engineno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Vendor Location" id="load_upd_place" maxlength="50" name="upd_place" type="text">
          <span class="field-validation-valid font-red" data-valmsg-for="engineno" data-valmsg-replace="true"></span>
        </div>
      </div>


     


      <div class="row mg-t-10">
        <label class="col-md-4 col-sm-4 form-control-label">Quantity</label>
        <div class="col-sm-3 mg-t-5 mg-sm-b-10">
          <input class="form-control" data-val="true" data-val-length="The field insurancename must be a string with a maximum length of 200." data-val-length-max="200" placeholder="Quantity" id="load_upd_qty" maxlength="200" name="upd_qty" type="text"  onkeyup="diecalRet2()">
          <span class="field-validation-valid font-red" data-valmsg-for="insurancename" data-valmsg-replace="true"></span>
        </div>

        <label class="col-md-3 col-sm-3 form-control-label">Price Per Litre</label>
        <div class="col-sm-2 mg-t-5 mg-sm-b-10">
          <input class="form-control" data-val="true" data-val-length="The field permitno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="0" id="load_upd_ppl" maxlength="50" name="load_upd_ppl" type="text" value="" disabled>
          <input class="form-control" data-val="true" data-val-length="The field permitno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="0" id="pplh" maxlength="50" name="pplh" type="hidden" value="" >
          <span class="field-validation-valid font-red" data-valmsg-for="permitno" data-valmsg-replace="true"></span>
        </div>
      </div>
      <div class="row mg-t-10">
        <label class="col-md-4 col-sm-4 form-control-label">Amount</label>
        <div class="col-sm-8 mg-t-5 mg-sm-b-10">
          <input class="form-control" data-val="true" data-val-length="The field insurancename must be a string with a maximum length of 200." data-val-length-max="200" placeholder="Diesel Amount" id="load_upd_amt" maxlength="200" name="upd_amt" type="text" onkeyup="diecalRet2()">
          <span class="field-validation-valid font-red" data-valmsg-for="insurancename" data-valmsg-replace="true" ></span>
        </div>
      </div>

 <div class="row mg-t-10">


        <label class="col-md-4 col-sm-4 form-control-label">Pay Type</label>                                                    
        <div class="col-sm-8 mg-t-5 mg-sm-b-10">

          <select class="form-control valid" data-val="true" placeholder="Select bilty paid type" id="load_upd_billtype" name="upd_billtype" style="padding:0px 6px !important;">

<?php
$quer=mysqli_query($conn,"select * from pay_type"); 
while($pay = mysqli_fetch_array($quer))
{
  ?>
            <option  value="<?php echo $pay['pay_type'];?>"><?php echo $pay['pay_type'];?></option>
            <?php
          }?>
            
          </select>

</div></div>
       
<div class="modal-footer pd-r-0">
<button type="button"  class="btn btn-default" data-dismiss="modal">Close</button>
<button type="button" id="load_update" class="btn btn-primary">Save changes</button>
</div>
</div></div></div>
</div> </div></div>


 <script >
$(function () {
$("#add_die_load").click(function(){
$('#load_die_add').modal('show');
var driverid=$('#loaddriver').val();
var dte=$('#datepicker_adv_cash').val();

$('#datepicker_load').val(dte);


$("#load_die_driver_id").val(driverid);



});
});
</script>

<script>

  $(document).on('click', '#load_update', function(){
   var dat = $('#datepicker_load_upd').val();
   var fid = $('#load_upd_id').val(); 
   var dri = $('#load_upd_driver').val();
   var ven = $('#load_upd_vendor').val();
   var pla = $('#load_upd_place').val();
   var qt = $('#load_upd_qty').val();
   var pp = $('#load_upd_ppl').val();
   var at = $('#load_upd_amt').val();
   var bill = $('#load_upd_billtype').val();
   var vech="";

$.ajax({
     url:"fuelins.php",
     method:"POST",
     data:{date:dat, id:fid, vechno:vech, driver:dri, vendor:ven, place:pla, qty:qt, pricepl:pp, amount:at, billpay:bill},
     success:function(data)
     {
      /*alert(data);*/
     
      $('#load_editModel').modal('hide');

   $('#load_upd_vendor').val("");
   $('#load_upd_place').val("");
   $('#load_upd_qty').val("");
   $('#load_upd_ppl').val("");
   $('#load_upd_amt').val("");
   $('#load_upd_billtype').val("");

 fetch_data();
if(bill!="Driver Cash")
{
  advance_die_cal(qt,at);

}


       }
    });




  });
</script>








<!-- 
<script>
  document.addEventListener("DOMContentLoaded", function() {
fetch_data();

});
</script> -->
<!-- <script>

/*  Table View*/
  $('#mVechno').change(function(){
 fetch_data();
  });
</script> -->


<script>
function deletefuel(del_val)
{


$.ajax({
        type: "POST",
        url: "fueldel.php",
        data:'val='+del_val,
        success: function(data){ 
       fetch_data();
        }
      });


}
</script>



<script>

  $(document).on('click', '#load_die_insert', function(){



   var dat = $('#datepicker_load').val();
/*   alert(dat);*/
   var vno = $('#mVechno').val();
   var tid = $('#ID_UNIQUE').val();
   var dri = $('#load_die_driver_id').val();
   var ven = $('#load_die_vendor').val();
   var pla = $('#load_die_place').val();
   var qt = $('#load_die_qty').val();
   var pp = $('#load_die_ppl').val();
   var at = $('#load_die_amt').val();
   var bill = $('#load_die_billtype').val();

 if(vno != '')
 {

$.ajax({
     url:"fuelins.php",
     method:"POST",
     data:{date:dat, vechno:vno, tripid:tid, driver:dri, vendor:ven, place:pla, qty:qt, pricepl:pp, amount:at, billpay:bill},
     success:function(data)
     {
      /*alert(data);*/
      fetch_data();
      $('#load_die_add').modal('hide');
   $('#load_die_vendor').val("");
   $('#load_die_place').val("");
   $('#load_die_qty').val("");
   $('#load_die_ppl').val("");
   $('#load_die_amt').val("");
   $('#load_die_billtype').val("");

if(bill!="Driver Cash")
{
  advance_die_cal(qt,at);

}
     }
    });

 }
 else
 {

alert("Please Select Vehicle Number")

 }

  });
</script>


      </div><!-- am-pagebody -->
     



<script>
  function diecalRet()
  {
    if((event.keyCode||event.which) != 9)
    {


      var die1 = document.getElementById('load_die_qty').value;
      var die2 = document.getElementById('load_die_amt').value;
      if (die1 == "")
       die1 = 0;
     if (die2 == "")
       die2 = 0;

     var total =  parseFloat(die2)/parseFloat(die1);

     var res = isNaN(total);
     if(res == true)
     {
      document.getElementById('load_die_ppl').value = 0;
 

    }
    else
    {
      document.getElementById('load_die_ppl').value=total;

    }
  }}
</script>
<script>
  function diecalRet2()
  {
    if((event.keyCode||event.which) != 9)
    {


      var die1 = document.getElementById('load_upd_qty').value;
      var die2 = document.getElementById('load_upd_amt').value;
      if (die1 == "")
       die1 = 0;
     if (die2 == "")
       die2 = 0;

     var total =  parseFloat(die2)/parseFloat(die1);

     var res = isNaN(total);
     if(res == true)
     {
      document.getElementById('load_upd_ppl').value = 0;

    }
    else
    {
      document.getElementById('load_upd_ppl').value=total;

    }
  }}
</script>


</div>



<div class="am-pagebody">
 <div class="card pd-20 form-layout form-layout-4">
   <div class="row row-sm ">
    <div class="col-xl-6">

      <div class="portlet-body">



        <div class="col-md-4">
         <div class="row mg-t-10"> 
           <h6 class="card-body-title">Hire Details</h6>
         </div></div>


         <div class="row mg-t-10">
          <label class="col-md-2 form-control-label">Hire Amount </label>
          <div class="col-sm-4 mg-t-5 mg-sm-b-10">
            <input class="form-control" data-val="true" data-val-length="The field insurancename must be a string with a maximum length of 200." data-val-length-max="200" placeholder="Enter Hire Amount" id="hire_amt" maxlength="200" name="hire_amt" type="text" value="" onkeyup="hiretot()" readonly>
            <span class="field-validation-valid font-red" data-valmsg-for="insurancename" data-valmsg-replace="true"></span>
          </div>



          <label class="col-md-2 form-control-label">Commission</label>
          <div class="col-sm-4 mg-t-5 mg-sm-b-10">
            <input class="form-control" data-val="true" data-val-length="The field permitno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Commission" id="hire_comm" maxlength="50" name="hire_comm" type="text" value="500" onkeyup="hiretot()" >
            <span class="field-validation-valid font-red" data-valmsg-for="permitno" data-valmsg-replace="true"></span>
          </div>
        </div>


        <div class="row mg-t-10">
          <label class="col-md-2 form-control-label">Loading Charges </label>
          <div class="col-sm-4 mg-t-5 mg-sm-b-10">
            <input class="form-control" data-val="true" data-val-length="The field permitno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Loading Charges" id="hire_ldng_crgs" maxlength="50" name="hire_ldng_crgs" type="text" value="" onkeyup="hiretot()" readonly>
            <span class="field-validation-valid font-red" data-valmsg-for="permitno" data-valmsg-replace="true"></span>
          </div>

          <label class="col-md-2 form-control-label">Un-Loading Charges </label>
          <div class="col-sm-4 mg-t-5 mg-sm-b-10">
            <input class="form-control" data-val="true" data-val-length="The field insurancename must be a string with a maximum length of 200." data-val-length-max="200" placeholder="Un-Loading Charges" id="hire_unldng_crgs" maxlength="200" name="hire_unldng_crgs" type="text" value="" onkeyup="hiretot()" readonly>
            <span class="field-validation-valid font-red" data-valmsg-for="insurancename" data-valmsg-replace="true"></span>
          </div>  
        </div>

        <div class="row mg-t-10">
          <label class="col-md-2 form-control-label">Weigh Bill Charges </label>
          <div class="col-sm-4 mg-t-5 mg-sm-b-10">
            <input class="form-control" data-val="true" data-val-length="The field permitno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Weigh Bill Charges" id="hire_weigh_crgs" maxlength="50" name="hire_weigh_crgs" type="text" value="" onkeyup="hiretot()" readonly>
            <span class="field-validation-valid font-red" data-valmsg-for="permitno" data-valmsg-replace="true"></span>
          </div></div>
          <div class="row mg-t-10">
            <label class="col-md-2 form-control-label">Other Amount </label>
            <div class="col-sm-4 mg-t-5 mg-sm-b-10">
              <input class="form-control" data-val="true" data-val-length="The field permitno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Other Amount" id="hire_other_amt" maxlength="50" name="hire_other_amt" type="text" value="" onkeyup="hiretot()" readonly>
              <span class="field-validation-valid font-red" data-valmsg-for="permitno" data-valmsg-replace="true"></span>
            </div>

            <label class="col-md-2 form-control-label">Other Description</label>
            <div class="col-sm-4 mg-t-5 mg-sm-b-10">
              <input class="form-control" data-val="true" data-val-length="The field insurancename must be a string with a maximum length of 200." data-val-length-max="200" placeholder="Description" id="hire_other_des" maxlength="200" name="hire_other_des" type="text" value="" readonly>
              <span class="field-validation-valid font-red" data-valmsg-for="insurancename" data-valmsg-replace="true"></span>
            </div>
          </div>


          <div class="row mg-t-10">
            <label class="col-md-2 form-control-label">Halt Days </label>
            <div class="col-sm-4 mg-t-5 mg-sm-b-10">
              <input class="form-control" data-val="true" data-val-length="The field insurancename must be a string with a maximum length of 200." data-val-length-max="200" placeholder="Halt Days" id="hire_halt_days" maxlength="200" name="hire_halt_days" type="text" value="" onkeyup="htot()" readonly>
              <span class="field-validation-valid font-red" data-valmsg-for="insurancename" data-valmsg-replace="true"></span>
            </div>

            <label class="col-md-2 form-control-label">Rate </label>
            <div class="col-sm-4 mg-t-5 mg-sm-b-10">
              <input class="form-control" data-val="true" data-val-length="The field permitno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Halt Rate" id="hire_halt_rate" maxlength="50" name="hire_halt_rate" type="text" value="" onkeyup="htot()" readonly>
              <span class="field-validation-valid font-red" data-valmsg-for="permitno" data-valmsg-replace="true"></span>
            </div>
          </div>


          <div class="row mg-t-10">

            <label class="col-md-2 form-control-label">Halt Amount </label>
            <div class="col-sm-10 mg-t-5 mg-sm-b-10">
              <input class="form-control" data-val="true" data-val-length="The field bodytype must be a string with a maximum length of 100." data-val-length-max="100" placeholder="0" id="hire_halt_value" maxlength="100" name="hire_halt_value" value="" type="text"  >
              <input class="form-control" data-val="true" data-val-length="The field bodytype must be a string with a maximum length of 100." data-val-length-max="100" placeholder="0" id="hire_halt_amt" maxlength="100" name="hire_halt_amt" value="" type="hidden" >
              <span class="field-validation-valid font-red" data-valmsg-for="bodytype" data-valmsg-replace="true"></span>
            </div>
          </div>





          <div class="row mg-t-10">

            <label class="col-md-2 form-control-label">Total Frieght </label>
            <div class="col-sm-10 mg-t-5 mg-sm-b-10">
              <input class="form-control" data-val="true" data-val-length="The field bodytype must be a string with a maximum length of 100." data-val-length-max="100" placeholder="Total Amount" id="hire_total" maxlength="100" name="hire_total" value="" type="text" readonly  >
              <input class="form-control" data-val="true" data-val-length="The field bodytype must be a string with a maximum length of 100." data-val-length-max="100" placeholder="Total Amount" id="hire_frt_total" maxlength="100" name="hire_frt_total" value="" type="hidden">
              <span class="field-validation-valid font-red" data-valmsg-for="bodytype" data-valmsg-replace="true"></span>
            </div>
          </div>





        </div></div>

        <div class="col-xl-6">


         <div class="portlet-body">
          <div class="row mg-t-10">

            <div class="col-sm-8 mg-t-10 mg-sm-b-10"></div></div>
            <div class="portlet-body">



              <div class="col-md-4">
               <div class="row mg-t-10"> 

               </div></div>




               <div class="row mg-t-10">

                <div class="col-sm-8 mg-t-10 mg-sm-b-10"></div></div>




                <div class="row mg-t-10">
                  <label class="col-md-2 form-control-label">Chn. Advance </label>
                  <div class="col-sm-4 mg-t-5 mg-sm-b-10">
                    <input class="form-control" data-val="true" data-val-length="The field insurancename must be a string with a maximum length of 200." data-val-length-max="200" placeholder="0" id="hire_adv" maxlength="200" name="hire_adv" type="text" value="" onkeyup="totadvval()">
                    <span class="field-validation-valid font-red" data-valmsg-for="insurancename" data-valmsg-replace="true"></span>
                  </div>
                  <label class="col-md-2 form-control-label">Pay Type </label>
                  <div class="col-sm-4 mg-t-5 mg-sm-b-10">
                   <select class="form-control" data-val="true" data-val-number="The field maritialstatus must be a number." placeholder="The maritialstatus field is required." id="hire_chn_pay_mode" name="hire_chn_pay_mode" onchange="bankdivHire(this.value)">
                   <?php
$quer=mysqli_query($conn,"select * from pay_type"); 
while($pay = mysqli_fetch_array($quer))
{
  ?>
            <option  value="<?php echo $pay['pay_type'];?>"><?php echo $pay['pay_type'];?></option>
            <?php
          }?>
            
   
            <script >
function bankdivHire(val){
/*  alert(val);*/
if(val=="Cash"||val=="cash")
{
 <!-- $("#hireBankdiv").hide(); -->


}
else
{
<!--  $("#hireBankdiv").show(); -->
}

}
            </script>

                  </select>
                </div>

              </div>
<script>

function transpbank(data)
{
/*alert(data);*/
 $.ajax({    
        type: "POST",
        url: "get_district.php",
        data:{cust_id:data},            
        dataType: "html",          
        success: function(response){     
               /*      alert(response);*/
            $("#hire_chn_bank").html(response); 
            $("#hire_mkm_bank").html(response); 
            //alert(response);
        }
        });
  


}
</script>
             <div id="hireBankdiv" >
                <div class="row mg-t-10" >
                  <label class="col-md-2 form-control-label">From Account</label>
                  <div class="col-sm-4 mg-t-5 mg-sm-b-10">
  <!--                   <input class="form-control" data-val="true" data-val-length="The field insurancename must be a string with a maximum length of 200." data-val-length-max="200" placeholder="Bank Name" id="hire_chn_bank" maxlength="200" name="hire_chn_bank" type="text" value=""> -->
 <select class="form-control" data-val="true" data-val-number="The field maritialstatus must be a number." placeholder="The maritialstatus field is required." id="hire_chn_bank" name="hire_chn_bank" >

 </select>





                    <span class="field-validation-valid font-red" data-valmsg-for="insurancename" data-valmsg-replace="true"></span>
                  </div>

                  <label class="col-md-2 form-control-label">Cheque No</label>
                  <div class="col-sm-4 mg-t-5 mg-sm-b-10">
                    <input class="form-control" data-val="true" data-val-length="The field permitno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Cheque Number" id="hire_chn_cque" maxlength="50" name="hire_chn_cque" type="text" value="">
                    <span class="field-validation-valid font-red" data-valmsg-for="permitno" data-valmsg-replace="true"></span>
                  </div>
                </div>

</div>

                <div class="row mg-t-10">
                  <label class="col-md-2 form-control-label">MKM Advance </label>
                  <div class="col-sm-4 mg-t-5 mg-sm-b-10">
                    <input class="form-control" data-val="true" data-val-length="The field insurancename must be a string with a maximum length of 200." data-val-length-max="200" placeholder="0" id="hire_mkm_amt" maxlength="200" name="hire_mkm_amt" type="text" value="" onkeyup="totadvval()">
                    <span class="field-validation-valid font-red" data-valmsg-for="insurancename" data-valmsg-replace="true"></span>
                  </div>
                  <label class="col-md-2 form-control-label">Pay Type </label>
                  <div class="col-sm-4 mg-t-5 mg-sm-b-10">
                   <select class="form-control" data-val="true" data-val-number="The field maritialstatus must be a number." placeholder="The maritialstatus field is required." id="hire_mkm_pay_mode" name="hire_mkm_pay_mode" onchange="mkmbankdivHire(this.value);">
                                       <?php
$quer=mysqli_query($conn,"select * from pay_type"); 
while($pay = mysqli_fetch_array($quer))
{
  ?>
            <option  value="<?php echo $pay['pay_type'];?>"><?php echo $pay['pay_type'];?></option>
            <?php
          }?>
            
   
            <script >
function mkmbankdivHire(val){
/*  alert(val);*/
if(val=="Cash"||val=="cash")
{
 $("#mkmadv_bankdiv").hide();


}
else
{
 $("#mkmadv_bankdiv").show();
}

}
            </script>


                      });
                    </script>
                  </select>
                </div>

              </div>








             <div id="mkmadv_bankdiv" >
                <div class="row mg-t-10" >
                  <label class="col-md-2 form-control-label">From Account</label>
                  <div class="col-sm-4 mg-t-5 mg-sm-b-10">
                    <!-- <input class="form-control" data-val="true" data-val-length="The field insurancename must be a string with a maximum length of 200." data-val-length-max="200" placeholder="Bank Name" id="hire_mkm_bank" maxlength="200" name="hire_mkm_bank" type="text" value="">
                     -->
                     <select class="form-control" data-val="true" data-val-number="The field maritialstatus must be a number." placeholder="The maritialstatus field is required." id="hire_mkm_bank" name="hire_mkm_bank" >
                     </select>

                    <span class="field-validation-valid font-red" data-valmsg-for="insurancename" data-valmsg-replace="true"></span>
                  </div>

                  <label class="col-md-2 form-control-label">Cheque No</label>
                  <div class="col-sm-4 mg-t-5 mg-sm-b-10">
                    <input class="form-control" data-val="true" data-val-length="The field permitno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="Cheque Number" id="hire_mkm_cque" maxlength="50" name="hire_mkm_cque" type="text" value="">
                    <span class="field-validation-valid font-red" data-valmsg-for="permitno" data-valmsg-replace="true"></span>
                  </div>
                </div>
</div>







                <div class="row mg-t-10">

                  <label class="col-md-2 form-control-label">Total Advance </label>
                  <div class="col-sm-10 mg-t-5 mg-sm-b-10">
                    <input class="form-control" data-val="true" data-val-length="The field bodytype must be a string with a maximum length of 100." data-val-length-max="100" placeholder="0" id="hire_tot_adv" maxlength="100" name="hire_tot_adv" value="" type="text" disabled >
                    <input class="form-control" data-val="true" data-val-length="The field bodytype must be a string with a maximum length of 100." data-val-length-max="100" placeholder="0" id="hire_total_adv" maxlength="100" name="hire_total_adv" value="" type="hidden" >
                    <span class="field-validation-valid font-red" data-valmsg-for="bodytype" data-valmsg-replace="true"></span>
                  </div>
                </div>



<script>

function advance_die_cal(qty,amt)
{
 /* alert(qty);
  alert(amt);*/
 var curr_qty=  $('#hire_diesel_qty').val();
   var curr_amt=  $('#hire_diesel_adv').val();

/*alert(curr_qty);
alert(curr_amt);*/

if(curr_qty=='')
{
  curr_qty=0;
  curr_amt=0;
}



var upd_qty=parseFloat(curr_qty)+parseFloat(qty);
var upd_amt=parseFloat(curr_amt)+parseFloat(amt);
/*alert(upd_qty);
alert(upd_amt);*/

 $('#hire_diesel_qty').val(upd_qty);
 $('#hire_diesel_adv').val(upd_amt);

}

</script>



                <div class="row mg-t-10">
                  <label class="col-md-2 form-control-label">Diesel Adv.:</label>
                  <div class="col-sm-4 mg-t-5 mg-sm-b-10">
                    <input class="form-control" data-val="true" data-val-length="The field permitno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="0" id="hire_diesel_adv" maxlength="50" name="hire_diesel_adv" type="text" value="" onkeyup="hirebal()">

                    <span class="field-validation-valid font-red" data-valmsg-for="permitno" data-valmsg-replace="true"></span>
                  </div>

                  <label class="col-md-2 form-control-label">Diesel Qty.:</label>
                  <div class="col-sm-4 mg-t-5 mg-sm-b-10">
                    <input class="form-control" data-val="true" data-val-length="The field permitno must be a string with a maximum length of 50." data-val-length-max="50" placeholder="0" id="hire_diesel_qty" maxlength="50" name="hire_diesel_qty" type="text" value="">
                    <span class="field-validation-valid font-red" data-valmsg-for="permitno" data-valmsg-replace="true"></span>
                  </div>
                </div>





                <div class="row mg-t-10">

                  <label class="col-md-2 form-control-label">Hire Balance </label>
                  <div class="col-sm-10 mg-t-5 mg-sm-b-10">
                    <input class="form-control" data-val="true" data-val-length="The field bodytype must be a string with a maximum length of 100." data-val-length-max="100" placeholder="0" id="hire_tot_bal" maxlength="100" name="hire_tot_bal" value="" type="text" disabled >

                    <input class="form-control" data-val="true" data-val-length="The field bodytype must be a string with a maximum length of 100." data-val-length-max="100" placeholder="0" id="hire_balance" maxlength="100" name="hire_balance"  type="hidden"  >
                    <span class="field-validation-valid font-red" data-valmsg-for="bodytype" data-valmsg-replace="true"></span>
                  </div>
                </div>



              </div>
            </div>
          </div>
        </div>

      </div> 
    </div> 
  </div>



 
<div class="form-layout-footer" id="submitdiv" style="padding-top:  0;     padding: 18px 30px 28px;">
 
                         <div class="form-layout-footer">
                <button type="submit" value="submit" name="submit" class="btn btn-info mg-r-5">Submit</button>
                <input type="hidden" name="action" value="<?php if($_REQUEST['flag'] =='Edit') echo $_REQUEST['flag']; else echo 'Add'; ?>">
                <button class="btn btn-secondary">Cancel</button>
              </div>
</div>
</form> 
<?php include('../include/adminfooter.php'); ?> 
<script src="//netsh.pp.ua/upwork-demo/1/js/typeahead.js"></script>
   <script>
$('.datepicker').datepicker({
    dateFormat: 'dd/mm/yy'
});
</script>

<script >
  
document.getElementById('mainstatus').addEventListener('change', function () {
  var val = document.getElementById('mainstatus').value;
if(val=="")
{

 document.getElementById('submitdiv').style.display = 'none';
}
else
{
    document.getElementById('submitdiv').style.display = 'block';
}
});

   



</script>

<script>
  function hirefunc()
  {
    if(document.getElementById("hirebox").checked == true)
    {
      document.getElementById("mVechno").disabled = true;
      document.getElementById("mainstatus").disabled = true;

      var style = this.value == 1 ? 'block' : 'none';
      document.getElementById('hidden_div').style.display = style;
      document.getElementById('hidden_div4').style.display = style;
      document.getElementById('hidden_div5').style.display = style;

      document.getElementById('hidden_div7').style.display = style;
      document.getElementById('hidden_div8').style.display = style;
      document.getElementById('hidden_div9').style.display = style;
      document.getElementById('hirediv').style.display = 'block';
      document.getElementById('retemp').style.display = style;
      document.getElementById('hhaltent').style.display = style;
document.getElementById('dieseldiv').style.display = style;
document.getElementById('dieseldiv_halt').style.display = style;
document.getElementById('dieseldiv_return').style.display = style;
document.getElementById('dieseldiv_home_halt').style.display = style;

document.getElementById('dieseldiv_returne').style.display = style;
       document.getElementById('submitdiv').style.display = 'block';

    }else
    {
      var style = this.value == 1 ? 'block' : 'none';
      document.getElementById('hirediv').style.display = style;
      document.getElementById("mVechno").disabled = false;
      document.getElementById("mainstatus").disabled = false;
       document.getElementById('submitdiv').style.display = 'none';

    } 

  }
</script>    
<script >

  document.getElementById('mainstatus').addEventListener('change', function () {
    var style = this.value == "Load" ? 'block' : 'none';
      
    document.getElementById('hidden_div').style.display = style;

    var style2 = this.value == "Halt" ? 'block' : 'none';
    document.getElementById('hidden_div7').style.display = style2;
    document.getElementById('dieseldiv_halt').style.display = style2;


    var style3 = this.value == "OnRoad" ? 'block' : 'none';
    document.getElementById('hidden_div4').style.display = style3;
    document.getElementById('dieseldiv').style.display = style3;

    var style4 = this.value == "Return" ? 'block' : 'none';
    document.getElementById('hidden_div5').style.display = style4;
    document.getElementById('dieseldiv_return').style.display = style4;

    var style5 = this.value == "Workshop" ? 'block' : 'none';
    document.getElementById('hidden_div8').style.display = style5;


    var style6 = this.value == "Accident" ? 'block' : 'none';
    document.getElementById('hidden_div9').style.display = style6;

    var style7 = this.value == "Returnemp" ? 'block' : 'none';
    document.getElementById('retemp').style.display = style7;
    document.getElementById('dieseldiv_returne').style.display = style7;

 var style8 = this.value == "Fc" ? 'block' : 'none';
    document.getElementById('fcentry').style.display = style8;

var style9 = this.value == "Parking" ? 'block' : 'none';
    document.getElementById('parkingent').style.display = style9;

    var style15 = this.value == "HHalt" ? 'block' : 'none';
    document.getElementById('hhaltent').style.display = style15;
    document.getElementById('dieseldiv_home_halt').style.display = style15;



    var style = this.value == 1 ? 'block' : 'none';
    document.getElementById('hidden_div3').style.display = style;


  });
</script>
<script>

function hidediv()
{
/*alert("foosa");*/

      
 $("#cque_div").hide();
<!--  <!-- $("#hireBankdiv").hide(); -->
$("#mkmadv_bankdiv").hide(); -->
}
</script>
<script>
function upperb(value)
{
var stat1=   $("#retcontno").val();
if (value > 96 && value < 123)
  {
   value = value-32;
       }
     var res1= String.fromCharCode(value);
    /*alert(res1); */
     $("#retcontno").val(stat1+res1);
       }
</script>
<script>
 function onlyAlpha(e, t) {
  try {

    var ctl = document.getElementById('retcontno');
    var startPos = ctl.selectionStart;
    var endPos = ctl.selectionEnd;
    /*alert(startPos + ", "   + endPos);
    */

    if(endPos<4)

    {
      if (window.event) {
        var charCode = window.event.keyCode;
        /* alert(charCode);*/
      }
      else if (e) {
        var charCode = e.which;

      }
          else {return true; }
     if ((charCode > 64 && charCode < 91) || (charCode > 96 && charCode < 123))
     {
      upperb(charCode);
return false;
     }
     else
       return false;
   } 
    else if(endPos>=4 && endPos<10)
    {

     if (window.event) {
      var charCode = window.event.keyCode;
      /* alert(charCode);*/
    }
    else if (e) {
      var charCode = e.which;

    }
    else { return false; }
    if ((charCode > 64 && charCode < 91) || (charCode > 96 && charCode < 123))
     return false;
   else
     return true;
 } 
 else if(endPos>10)
 {
   return false;
 }
}
catch (err) {
  alert(err.Description);
}}
</script>
<!-- <script>
  function reload()
  {
    var randomNum =  Math.floor(1000 + Math.random() * 9000);

    var elem = document.getElementById("ID_UNIQUE").value = randomNum;
  }



</script> -->







<script>
function onlyAlphabets(e, t) {
 try {
  var ctl = document.getElementById('ldcontno');
   var startPos = ctl.selectionStart;
   var endPos = ctl.selectionEnd;
   /*alert(startPos + ", " + endPos);
   */
   if(endPos<4)
   {
     if (window.event) {
       var charCode = window.event.keyCode;
 
       / *alert(charCode);*/
     }
     else if (e) {
       var charCode = e.which;
     }
     else {return true; }
     if ((charCode > 64 && charCode < 91) || (charCode > 96 && charCode < 123))
     {
      upper(charCode);
return false;
     }
     else
       return false;
   }            
   else if(endPos>=4 && endPos<10)
   {
    if (window.event) {
     var charCode = window.event.keyCode;
     / *alert(charCode);*/
   }
   else if (e) {
     var charCode = e.which;
   }
   else { return true; }
   if ((charCode > 64 && charCode < 91) || (charCode > 96 && charCode < 123))
    return false;
  else
    return true;
}
else if(endPos>10)
{
return false;
}
}
catch (err) {
 alert(err.Description);
}}
</script>
<script>
function upper(value)
{
var stat=   $("#ldcontno").val();
if (value > 96 && value < 123)
  {
   value = value-32;
       }
     var res= String.fromCharCode(value);
     <!-- alert(res); -->
     $("#ldcontno").val(stat+res);
       }
</script>
<script>
  function fval()
  {
    if((event.keyCode||event.which) != 9)
    {
      var total = 0;

      var val1 = document.getElementById('lhltdays').value;
      var val2 = document.getElementById('hltrate').value;
      if (val1 == "")
       val1 = 0;
     if (val2 == "")
       val2 = 0;


   document.getElementById('hire_halt_days').value=val1;
    document.getElementById('hire_halt_rate').value=val2;


     total = parseFloat(val1)*parseFloat(val2) ;
     var res = isNaN(total);

     if(res == true)
     {
      document.getElementById('lhltamt').value = 0;
      document.getElementById('lhltamth').value=0;
       document.getElementById('hire_halt_value').value=0;
       document.getElementById('hire_halt_amt').value=0;
 
    }
    else
    {
      document.getElementById('lhltamt').value=total;
      document.getElementById('lhltamth').value=total;
      document.getElementById('hire_halt_value').value=total;
       document.getElementById('hire_halt_amt').value=total;
       

      fintot();
    }
  }}
</script>

<script>
  function fintot()
  {
    if((event.keyCode||event.which) != 9)
    {

      var va1 = document.getElementById('lfreightamt').value;
      var va2 = document.getElementById('lldngcgs').value;
      var va3 = document.getElementById('luldngcgs').value;
      var va4 = document.getElementById('lwbillcgs').value;
      var va5 = document.getElementById('lotramt').value;
      var va6 = document.getElementById('lhltamt').value;
      if (va1 == "")
       va1 = 0;
     if (va2 == "")
       va2 = 0;
     if (va3 == "")
       va3 = 0;
     if (va4 == "")
       va4 = 0;
     if (va5 == "")
       va5 = 0;
     if (va6 == "")
       va6 = 0;


     var total =  parseFloat(va1)+parseFloat(va2)+parseFloat(va3)+parseFloat(va4)+parseFloat(va5)+parseFloat(va6);

     document.getElementById('hire_amt').value=va1;
     document.getElementById('hire_ldng_crgs').value=va2;
     document.getElementById('hire_unldng_crgs').value=va3;
     document.getElementById('hire_weigh_crgs').value=va4;
     document.getElementById('hire_other_amt').value=va5;
     var com=document.getElementById('hire_comm').value;
     document.getElementById('hire_total').value=total-parseFloat(com);


     var res = isNaN(total);
     if(res == true)
     {
      document.getElementById('ttlfreight').value = 0;
      document.getElementById('ttlfreighth').value=0;
      document.getElementById('hire_tot_bal').value=0-parseFloat(com);
       document.getElementById('hire_balance').value=0-parseFloat(com);
      totval();
    }
    else
    {
      document.getElementById('ttlfreight').value=total;
      document.getElementById('ttlfreighth').value=total;
       document.getElementById('hire_tot_bal').value=total-parseFloat(com);
       document.getElementById('hire_balance').value=total-parseFloat(com);
      totval();
    }
  }}
</script>

<script>
  function totval()
  {
    if((event.keyCode||event.which) != 9)
    {

      var valu1 = document.getElementById('advcsh').value;
/*      var valu2 = document.getElementById('advcqe').value;*/
      var valu3 = document.getElementById('ttlfreight').value;
      if (valu1 == "")
       valu1 = 0;
     /*if (valu2 == "")
       valu2 = 0;*/
     if (valu3 == "")
       valu3 = 0;
     var total =  parseFloat(valu3)-parseFloat(valu1)/*-parseFloat(valu2)*/;

     var res = isNaN(total);
     if(res == true)
     {
      document.getElementById('frtbal').value = 0;
      document.getElementById('frtbalh').value = 0;

    }
    else
    {
      document.getElementById('frtbal').value=total;
      document.getElementById('frtbalh').value=total;
    }
  }}
</script>

<script>
  function diecal()
  {
    if((event.keyCode||event.which) != 9)
    {


      var die1 = document.getElementById('dieqty').value;
      var die2 = document.getElementById('dieamt').value;
      if (die1 == "")
       die1 = 0;
     if (die2 == "")
       die2 = 0;

     var total =  parseFloat(die2)/parseFloat(die1);

     var res = isNaN(total);
     if(res == true)
     {
      document.getElementById('dieppl').value = 0;
      document.getElementById('diepplh').value = 0;
    }
    else
    {
      document.getElementById('dieppl').value=total;
      document.getElementById('diepplh').value=total;
    }
  }}
</script>
<script>
  function htot()
  {
    if((event.keyCode||event.which) != 9)
    {
   

      var val1 = document.getElementById('hire_halt_days').value;

      var val2 = document.getElementById('hire_halt_rate').value;
      if (val1 == "")
       val1 = 0;
     if (val2 == "")
       val2 = 0;
    var total = parseFloat(val1)*parseFloat(val2) ;
     var res = isNaN(total);
     if(res == true)
     {
      document.getElementById('hire_halt_value').value = 0;
      document.getElementById('hire_halt_amt').value=0;
      hiretot();
    }
    else
    {
      document.getElementById('hire_halt_value').value=total;
      document.getElementById('hire_halt_amt').value=total;
      hiretot();
    }
  }}
</script>

<script>

  function hiretot()
  {
    if((event.keyCode||event.which) != 9)
    {

      var value1 = document.getElementById('hire_amt').value;
    
      var value2 = document.getElementById('hire_comm').value;
   /*   alert(value2);*/
      var value3 = document.getElementById('hire_ldng_crgs').value;
      var value4 = document.getElementById('hire_unldng_crgs').value;
      var value5 = document.getElementById('hire_weigh_crgs').value;
      var value6 = document.getElementById('hire_other_amt').value;
      var value7 = document.getElementById('hire_halt_value').value;
      if (value1 == "")
       value1 = 0;
     if (value2 == "")
       value2 = 0;
     if (value3 == "")
       value3 = 0;
     if (value4 == "")
       value4 = 0;
     if (value5 == "")
       value5 = 0;
     if (value6 == "")
       value6 = 0;
     if (value7 == "")
       value7 = 0;


     var total =  parseFloat(value1)+parseFloat(value3)+parseFloat(value4)+parseFloat(value5)+parseFloat(value6)+parseFloat(value7)-parseFloat(value2);
/*alert(total);*/
     var res = isNaN(total);
     if(res == true)
     {
      document.getElementById('hire_frt_total').value = 0;
      document.getElementById('hire_total').value=0;
      /*totval();*/
      hirebal();
    }
    else
    {
      document.getElementById('hire_frt_total').value = total;
      document.getElementById('hire_total').value = total;
      /*totval();*/
      hirebal();
    }
  }}
</script>

<script>
  function totadvval()
  {
    if((event.keyCode||event.which) != 9)
    {

      var valu1 = document.getElementById('hire_adv').value;
      var valu2 = document.getElementById('hire_mkm_amt').value;
      if(valu1 == "")
       valu1 = 0;
     if (valu2 == "")
       valu2 = 0;
     var total = parseFloat(valu1)+parseFloat(valu2);

     var res = isNaN(total);
     if(res == true)
     {
       document.getElementById('hire_tot_adv').value = 0;
       document.getElementById('hire_total_adv').value = 0;
       hirebal();
     }
     else
     {
       document.getElementById('hire_tot_adv').value=total;
       document.getElementById('hire_total_adv').value=total;
       hirebal();
     }
   }}
 </script>




 <script>
  function hirebal()
  {
    if((event.keyCode||event.which) != 9)
    {

      var valu1 = document.getElementById('hire_diesel_adv').value;
      var valu2 = document.getElementById('hire_tot_adv').value;
      var valu3 = document.getElementById('hire_total').value;
      if(valu1 == "")
       valu1 = 0;
     if (valu2 == "")
       valu2 = 0;
     if (valu3 == "")
       valu3 = 0;
     var total = parseFloat(valu3)-parseFloat(valu1)-parseFloat(valu2);

     var res = isNaN(total);
     if(res == true)
     {
       document.getElementById('hire_tot_bal').value = 0;
       document.getElementById('hire_balance').value = 0;

     }
     else
     {
       document.getElementById('hire_tot_bal').value=total;
       document.getElementById('hire_balance').value=total;

     }
   }}
 </script>


<!-- 
 <script src="../lib/jquery/jquery.js"></script>


 <script src="../lib/jquery-ui/jquery-ui.js"></script> -->
 <script src="../lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js"></script>
 <script src="../lib/jquery-toggles/toggles.min.js"></script>
 <script src="../lib/select2/js/select2.min.js"></script>  

 
   

  <script>
   function getdetails(val) {
    var trip_no = document.getElementById('ret_tripid').value;
    $.ajax({
      type: "POST",
      type: "POST",
      url: "get_details.php",
      data:{ vech_id:val, tripid:trip_no },
      dataType: "json",
      success: function(data){
        $("#ldfrome").val(data.to);
        $("#ldtoe").val(data.from);

        $("#empdriver").val(data.driver);
        $("#empdriverh").val(data.driverid);
        $("#ordfrom").val(data.from);
        $("#ordfromh").val(data.from);
        $("#ordto").val(data.to);
        $("#orddriver").val(data.driver);
        $("#orddriverh").val(data.driverid);
        $("#rtnfrom").val(data.to);
        $("#rtnto").val(data.from);
        $("#rtndriver").val(data.driver);
        $("#rtndriverh").val(data.driverid);
        $("#tid").val(data.trip);
        $("#trip_id").val(data.trip);
        $("#hltplace").val(data.to);
        $("#hltdriver").val(data.driver);
        $("#hltdriverh").val(data.driverid);
        $("#accdriver").val(data.driver);
        $("#accdriverh").val(data.driverid);
        $("#driverid").val(data.driver);

        $("#rtn_from").val(data.to);
        $("#ret_emp_from").val(data.to);

/*for diesel module*/


       $("#die_driver").val(data.driver);
       $("#die_driver_id").val(data.driverid);
       $("#die_vechno").val(val);
       
       $("#halt_die_driver").val(data.driver);
       $("#halt_die_driver_h").val(data.driverid);
       $("#halt_die_vechno").val(val);

       $("#return_die_driver").val(data.driver);
       $("#return_die_driver_id").val(data.driverid);
       /*alert(data.driverid);
             alert(data.driver);*/
       $("#return_die_vechno").val(val);

       $("#load_die_driver").val(data.driver);
       /*$("#load_die_driver_id").val(data.driverid);*/
       $("#load_die_vechno").val(val);


       $("#returne_die_driver").val(data.driver);
       $("#returne_die_driver_h").val(data.driverid);
       $("#returne_die_vechno").val(val);



         /*$("#hltplace").val(data.from);
          */
        }
      });
  }
</script>

<script>
 function getstate(val) {
/*  alert(val);*/
  $.ajax({
    type: "POST",
    type: "POST",
    url: "get_vstate.php",
    data:'vech_id='+val,
    /* dataType: "json",*/
    success: function(data){

      $("#printarea").html(data);

      getdetails(val);
      getstatus(val);
      suggest(val);
             hidediv();

      





        /* if(data.from != null)
         {
     $("#statusid").html("Status : On "+data.stat +"<br> From : "+data.from+"<br> To : "+data.to );  
         
         }else{
               
           $("#statusid").html("Status : Free <br> Vehicle Available.");
         }   */    }
       });




}
</script>
<script>
  function suggest(val)
  {
    /*alert(val);*/
$.ajax({
    type: "POST",
    type: "POST",
    url: "get_vech_details.php",
    data:{ vech:val },
    success: function(data){
    /*alert(data); */
      $("#loaddriver").val(data);
    }
});


}
</script>




<script>
  function findTotal(){
   /* alert("Add");*/
    var arr = document.getElementsById('add');
/*    var alert("Add");alert("Add");alert("Add");=0;*/
    for(var i=0;i<arr.length;i++){
      if(parseFloat(arr[i].value))
        tot += parseFloat(arr[i].value);
    }
/*    alert(tot);*/
    document.getElementById('ttlfreight').value = tot;
  }

</script>

<script> 
 function getstatus(val) {
  var trip_no = document.getElementById('ret_tripid').value;
/*  alert(trip_no);*/
  $.ajax({
    type: "POST",
    type: "POST",
    url: "get_status.php",
    data:{ status_id:val, tripid:trip_no },
    success: function(data){ 
      $("#mainstatus").html(data);
    }
  });
}
</script>
<!-- 
**********************------------------Diesel Module------------------------------------********************************
 -->
<script>


  function fetch_data()
  {

    var vech_no =document.getElementById('mVechno').value;
    var trip_no = document.getElementById('ret_tripid').value;



    var stat = document.getElementById('mainstatus').value;
 if(stat=="Load")
 {

var trip=document.getElementById('ID_UNIQUE').value;
trip_no=trip;
 }
 if(stat=="HHalt")
 {
  trip_no="Home Halt";
 }
/*alert(vech_no);
alert(trip_no);
*/


    $.ajax({    //create an ajax request to display.php
        type: "POST",
        url: "fuelfetch.php",

        data:{ vechno:vech_no, tripid:trip_no, status:stat },           
        dataType: "html",   //expect html to be returned                
        success:function(response){ 
                  
            $("#responsecontainer_halt").html(response); 
            $("#responsecontainer_return").html(response); 
            $("#responsecontainer_load").html(response);
            $("#responsecontainer_returne").html(response);  
            $("#responsecontainer").html(response);

               $("#responsecontainer_hhalt").html(response);  
            //alert(response);
        }

    });
  }
</script>



<script>
function deletefuel(del_val)
{


$.ajax({
        type: "POST",
        url: "fueldel.php",
        data:'val='+del_val,
        success: function(data){ 
       fetch_data();
        }
      });


}
</script>



<!-- 
<script>

  function selectCountry(val) {
$("#hhdriver").val(val);
$("#hhdriverli").hide();
$("#cge_driver").val(val);
$("#cge_driverli").hide();
  </script> -->




   <script >
function editfuel(variable)
{

  var stat= $("#mainstatus").val();
/*alert(stat);*/
$.ajax({
      type: "POST",
      url: "fuelfetch.php",
      data:'fuel_id='+variable,
       dataType: "json",
      success: function(data){
      if(stat=="Halt")
{
$("#halt_upd_id").val(data.id);     
$("#datepicker_halt_upd").val(data.date);
$("#halt_upd_driver").val(data.driver);
$("#halt_upd_vendor").val(data.vendor);
$("#halt_upd_place").val(data.place);
$("#halt_upd_qty").val(data.qty);
$("#halt_upd_amt").val(data.amount);
$("#halt_upd_ppl").val(data.ppl);
$("#halt_upd_billtype").val(data.paytype);
$('#halt_editModel').modal('show');
 }      
else if(stat=="Returnemp")

{

$("#returne_upd_id").val(data.id);     
$("#datepicker0020").val(data.date);
$("#returne_upd_driver").val(data.driver);
$("#returne_upd_vendor").val(data.vendor);
$("#returne_upd_place").val(data.place);
$("#returne_upd_qty").val(data.qty);
$("#returne_upd_amt").val(data.amount);
$("#returne_upd_ppl").val(data.ppl);
$("#returne_upd_billtype").val(data.paytype);
$('#returne_editModel').modal('show');


}

else if(stat=="OnRoad")
{

  $("#upd_id").val(data.id);     
$("#datepicker_onroad_upd").val(data.date);
$("#upd_driver").val(data.driver);
$("#upd_vendor").val(data.vendor);
$("#upd_place").val(data.place);
$("#upd_qty").val(data.qty);
$("#upd_amt").val(data.amount);
$("#upd_ppl").val(data.ppl);
$("#upd_billtype").val(data.paytype);
$('#editModel').modal('show');
}
else if(stat=="Return")
{

  $("#return_upd_id").val(data.id);     
$("#datepicker_ret_edit").val(data.date);
$("#return_upd_driver").val(data.driver);
$("#return_upd_vendor").val(data.vendor);
$("#return_upd_place").val(data.place);
$("#return_upd_qty").val(data.qty);
$("#return_upd_amt").val(data.amount);
$("#return_upd_ppl").val(data.ppl);
$("#return_upd_billtype").val(data.paytype);
$('#return_editModel').modal('show');
}
else if(stat=="Load")
{

$("#load_upd_id").val(data.id);     
$("#datepicker_load_upd").val(data.date);
$("#load_upd_driver").val(data.driver);
$("#load_upd_vendor").val(data.vendor);
$("#load_upd_place").val(data.place);
$("#load_upd_qty").val(data.qty);
$("#load_upd_amt").val(data.amount);
$("#load_upd_ppl").val(data.ppl);
$("#load_upd_billtype").val(data.paytype);
$('#load_editModel').modal('show');


}
else if(stat=="HHalt")
{


$("#hhalt_upd_id").val(data.id);     
$("#datepicker_hhalt_edit").val(data.date);
$("#hhalt_upd_driver").val(data.driver);
$("#hhalt_upd_vendor").val(data.vendor);
$("#hhalt_upd_place").val(data.place);
$("#hhalt_upd_qty").val(data.qty);
$("#hhalt_upd_amt").val(data.amount);
$("#hhalt_upd_ppl").val(data.ppl);
$("#hhalt_upd_billtype").val(data.paytype);
$('#hhalt_editModel').modal('show');

}

        }
      });
}
</script>



 <script>

  function selectCount(val) {
    $("#hireto").val(val);
$("#hire_to").hide();



 $("#to_main").val(val);
$("#cityname_to").hide();
/*fetch_data_count();*/

}
  </script>

 <!--   <script>

  function selectCount(val) {
   
/*fetch_data_count();*/

}
  </script> -->



 <script>

  function selectCountry(val) {
    $("#hirefrom").val(val);
$("#hire_from").hide();


$("#from_main").val(val);
$("#cityname").hide();
/*fetch_data_count();*/

}
  </script>


