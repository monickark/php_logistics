<?php
require('../include/dbConnect.php');
require('../include/basefunctions.php');  
include('../include/checklogin.php');
    $dat = new Basefunc;

/*
echo '<script>alert("Enter 2");</script>';
echo '<script>alert("'.$_POST['date'].'");</script>';
echo '<script>alert("'.$_SESSION['MintId'].'");</script>';
echo '<script>alert("'.$_POST['vechno'].'");</script>';*/

/*echo '<script>alert("'.$_POST['Tripid'].'");</script>';
echo '<script>alert("'.$_POST['driver'].'");</script>';
echo '<script>alert("'.$_POST['vendor'].'");</script>';
echo '<script>alert("'.$_POST['place'].'");</script>';
echo '<script>alert("'.$_POST['qty'].'");</script>';
echo '<script>alert("'.$_POST['ppl'].'");</script>';
echo '<script>alert("'.$_POST['amt'].'");</script>';
echo '<script>alert("'.$_POST['billtype'].'");</script>';*/

if($_POST['tripid']=="")
{
$driver="Not Assigned";
$tripid="Not Assigned";

}else
{

$tripid=$_POST['tripid'];
$driver=$_POST['driver'];

}

if($_POST['vechno']!="")
{


$date_rep = str_replace('/', '-', $_POST['date']);
$newDate = date("Y-m-d", strtotime($date_rep));
  
$insert_fuel = array(   
      "intAdminId"      =>     mysqli_real_escape_string($dat->con, $_SESSION['MintId']),
      "tripid"          =>     mysqli_real_escape_string($dat->con, $tripid ),  
      "ent_date"        =>     mysqli_real_escape_string($dat->con, $newDate), 
      "vechno"          =>     mysqli_real_escape_string($dat->con, $_POST['vechno']), 
      "driver"          =>     mysqli_real_escape_string($dat->con, $driver), 
      "vendor"          =>     mysqli_real_escape_string($dat->con, $_POST['vendor']), 
      "place"           =>     mysqli_real_escape_string($dat->con, $_POST['place']), 
      "qty"             =>     mysqli_real_escape_string($dat->con, $_POST['qty']),
      "ppl"             =>     mysqli_real_escape_string($dat->con, $_POST['pricepl']), 
      "cost"            =>     mysqli_real_escape_string($dat->con, $_POST['amount']),
      "paytype"         =>     mysqli_real_escape_string($dat->con, $_POST['billpay'])
      );  


       $insid = $dat->insert('fuel', $insert_fuel);

if($_POST['billpay']=="Driver Cash")
{
$date_rep = str_replace('/', '-', $_POST['date']);
$newDate = date("Y-d-m", strtotime($date_rep));
$type="2";
$reason="Diesel Payment";
  $ins_driver_mgt = array(
        "intAdminId"       =>     mysqli_real_escape_string($dat->con, $_SESSION['MintId']),
        "ent_date"         =>     mysqli_real_escape_string($dat->con, $newDate),
        "driver_id"        =>     mysqli_real_escape_string($dat->con, $driver),
        "amount"           =>     mysqli_real_escape_string($dat->con, $_POST['amount']),
        "type"             =>     mysqli_real_escape_string($dat->con, $type), 
        "fuel_ent_id"      =>     mysqli_real_escape_string($dat->con, $insid), 
        "tripid"           =>     mysqli_real_escape_string($dat->con, $tripid),
        "reason"           =>     mysqli_real_escape_string($dat->con, $reason)
      ); 
 $inshhaltid = $dat->insert('driver_mgt', $ins_driver_mgt);


$driver_nme =mysqli_query($conn,"SELECT * FROM drivers WHERE id ='$driver';" );
$dri=mysqli_fetch_assoc($driver_nme);


$transp =mysqli_query($conn,"SELECT * FROM transporters WHERE id ='".$dri['intAdminId']."';" );
$tra=mysqli_fetch_assoc($transp);



/*
Debit for Fuel*/
echo '<script>alert("Driver Pay");</script>';

$vouc_type="Fuel Purchase".$tripid."Qty:".$_POST['qty']."lts.";


 $trans=str_replace(' ','_',$tra['name']);
 $trans=strtolower($trans);
$entries=$trans."entries";
$ent_items=$trans."entryitems";
$ledgers=$trans."ledgers";


$findnos =mysqli_query($conn,"SELECT * FROM `$entries` WHERE entrytype_id ='4' ORDER BY id DESC LIMIT 1; " );
$nos=mysqli_fetch_assoc($findnos);

$insert_hire = array(   
      "entrytype_id"      =>     mysqli_real_escape_string($dat->con, '4'),
      "number"         =>     mysqli_real_escape_string($dat->con, $nos['number']+1),
      "date"          =>     mysqli_real_escape_string($dat->con, $newDate),  
      "dr_total"        =>     mysqli_real_escape_string($dat->con, $_POST['amount']),
      "cr_total"      =>     mysqli_real_escape_string($dat->con, $_POST['amount']),
      "narration"    =>     mysqli_real_escape_string($dat->con, $vouc_type)
     
      );  
       $insstat = $dat->insert($entries, $insert_hire);



$cparty_name =mysqli_query($conn,"SELECT * FROM `$ledgers` WHERE name ='" .$_POST['vendor']. "';" );
$cparty_id=mysqli_fetch_assoc($cparty_name);



$insert_p1= array(   
      "entry_id"      =>     mysqli_real_escape_string($dat->con, $insstat),
      "ledger_id"         =>     mysqli_real_escape_string($dat->con, $cparty_id['id']),
      "amount"          =>     mysqli_real_escape_string($dat->con, $_POST['amount']),  
      "dc"        =>     mysqli_real_escape_string($dat->con, 'C')
      );  


       $insst1 = $dat->insert($ent_items, $insert_p1);

      


/*$driver =mysqli_query($conn,"SELECT * FROM drivers WHERE id ='".$_POST['loaddriver']."';" );
$dri=mysqli_fetch_assoc($driver);*/



$dparty_name =mysqli_query($conn,"SELECT * FROM `$ledgers` WHERE name ='Accounts Payable'; " );
$dparty_id=mysqli_fetch_assoc($dparty_name);

$insert_p2= array(   
      "entry_id"      =>     mysqli_real_escape_string($dat->con, $insstat),
      "ledger_id"         =>     mysqli_real_escape_string($dat->con, $dparty_id['id']),
      "amount"          =>     mysqli_real_escape_string($dat->con, $_POST['amount']),  
      "dc"        =>     mysqli_real_escape_string($dat->con, 'D')
      );  


       $insst2 = $dat->insert($ent_items, $insert_p2);



/*For Payment*/



$vouc_type="Fuel Payment".$tripid."Qty:".$_POST['qty']."lts.";


$trans=str_replace(' ','_',$tra['name']);
 $trans=strtolower($trans);

$entries=$trans."entries";
$ent_items=$trans."entryitems";
$ledgers=$trans."ledgers";


$findnos =mysqli_query($conn,"SELECT * FROM `$entries` WHERE entrytype_id ='4' ORDER BY id DESC LIMIT 1; " );
$nos=mysqli_fetch_assoc($findnos);

$insert_hire = array(   
      "entrytype_id"      =>     mysqli_real_escape_string($dat->con, '4'),
      "number"         =>     mysqli_real_escape_string($dat->con, $nos['number']+1),
      "date"          =>     mysqli_real_escape_string($dat->con, $newDate),  
      "dr_total"        =>     mysqli_real_escape_string($dat->con, $_POST['amount']),
      "cr_total"      =>     mysqli_real_escape_string($dat->con, $_POST['amount']),
      "narration"    =>     mysqli_real_escape_string($dat->con, $vouc_type)
     
      );  
       $insstat = $dat->insert($entries, $insert_hire);



$driver_nme =mysqli_query($conn,"SELECT * FROM drivers WHERE id ='".$driver."';" );
$dri=mysqli_fetch_assoc($driver_nme);


$cparty_name =mysqli_query($conn,"SELECT * FROM `$ledgers` WHERE name ='" .$dri['name']. "';" );
$cparty_id=mysqli_fetch_assoc($cparty_name);



$insert_p1= array(   
      "entry_id"      =>     mysqli_real_escape_string($dat->con, $insstat),
      "ledger_id"         =>     mysqli_real_escape_string($dat->con, $cparty_id['id']),
      "amount"          =>     mysqli_real_escape_string($dat->con, $_POST['amount']),  
      "dc"        =>     mysqli_real_escape_string($dat->con, 'C')
      );  


       $insst1 = $dat->insert($ent_items, $insert_p1);

      



$dparty_name =mysqli_query($conn,"SELECT * FROM `$ledgers` WHERE name ='" .$_POST['vendor']. "'; " );
$dparty_id=mysqli_fetch_assoc($dparty_name);

$insert_p2= array(   
      "entry_id"      =>     mysqli_real_escape_string($dat->con, $insstat),
      "ledger_id"         =>     mysqli_real_escape_string($dat->con, $dparty_id['id']),
      "amount"          =>     mysqli_real_escape_string($dat->con, $_POST['amount']),  
      "dc"        =>     mysqli_real_escape_string($dat->con, 'D')
      );  


       $insst2 = $dat->insert($ent_items, $insert_p2);


/*For Payment Entry Account payable->Diesel Payments*/

$vouc_type="Fuel Payment".$tripid."Qty:".$_POST['qty']."lts.PaID BY ".$dri['name']."For ".$_POST['vechno'];

/*$trans=$tra['name'];*/
$trans=str_replace(' ','_',$tra['name']);
 $trans=strtolower($trans);
$entries=$trans."entries";
$ent_items=$trans."entryitems";
$ledgers=$trans."ledgers";


$findnos =mysqli_query($conn,"SELECT * FROM `$entries` WHERE entrytype_id ='4' ORDER BY id DESC LIMIT 1; " );
$nos=mysqli_fetch_assoc($findnos);

$insert_hire = array(   
      "entrytype_id"      =>     mysqli_real_escape_string($dat->con, '4'),
      "number"         =>     mysqli_real_escape_string($dat->con, $nos['number']+1),
      "date"          =>     mysqli_real_escape_string($dat->con, $newDate),  
      "dr_total"        =>     mysqli_real_escape_string($dat->con, $_POST['amount']),
      "cr_total"      =>     mysqli_real_escape_string($dat->con, $_POST['amount']),
      "narration"    =>     mysqli_real_escape_string($dat->con, $vouc_type)
     
      );  
       $insstat = $dat->insert($entries, $insert_hire);



$cparty_name =mysqli_query($conn,"SELECT * FROM `$ledgers` WHERE name ='Diesel Payments';" );
$cparty_id=mysqli_fetch_assoc($cparty_name);



$insert_p1= array(   
      "entry_id"      =>     mysqli_real_escape_string($dat->con, $insstat),
      "ledger_id"         =>     mysqli_real_escape_string($dat->con, $cparty_id['id']),
      "amount"          =>     mysqli_real_escape_string($dat->con, $_POST['amount']),  
      "dc"        =>     mysqli_real_escape_string($dat->con, 'C')
      );  


       $insst1 = $dat->insert($ent_items, $insert_p1);

      

/*
$driver_nme =mysqli_query($conn,"SELECT * FROM drivers WHERE id ='".$driver."';" );
$dri=mysqli_fetch_assoc($driver_nme);*/



$dparty_name =mysqli_query($conn,"SELECT * FROM `$ledgers` WHERE name ='Accounts Payable'; " );
$dparty_id=mysqli_fetch_assoc($dparty_name);

$insert_p2= array(   
      "entry_id"      =>     mysqli_real_escape_string($dat->con, $insstat),
      "ledger_id"         =>     mysqli_real_escape_string($dat->con, $dparty_id['id']),
      "amount"          =>     mysqli_real_escape_string($dat->con, $_POST['amount']),  
      "dc"        =>     mysqli_real_escape_string($dat->con, 'D')
      );  


       $insst2 = $dat->insert($ent_items, $insert_p2);



}
else
{

if($_POST['billpay']=="Cash")
{
/*echo '<script>alert("Cash");</script>';*/

/*
Debit for Fuel*/


$vouc_type="Fuel Purchase".$tripid."Qty:".$_POST['qty']."lts.";

/*$trans=$tra['name'];
$entries=$trans."entries";
$ent_items=$trans."entryitems";
$ledgers=$trans."ledgers";*/


$findnos =mysqli_query($conn,"SELECT * FROM entries WHERE entrytype_id ='4' ORDER BY id DESC LIMIT 1; " );
$nos=mysqli_fetch_assoc($findnos);

$insert_hire = array(   
      "entrytype_id"      =>     mysqli_real_escape_string($dat->con, '4'),
      "number"         =>     mysqli_real_escape_string($dat->con, $nos['number']+1),
      "date"          =>     mysqli_real_escape_string($dat->con, $newDate),  
      "dr_total"        =>     mysqli_real_escape_string($dat->con, $_POST['amount']),
      "cr_total"      =>     mysqli_real_escape_string($dat->con, $_POST['amount']),
      "narration"    =>     mysqli_real_escape_string($dat->con, $vouc_type)
     
      );  
       $insstat = $dat->insert('entries', $insert_hire);



$cparty_name =mysqli_query($conn,"SELECT * FROM ledgers WHERE name ='" .$_POST['vendor']. "';" );
$cparty_id=mysqli_fetch_assoc($cparty_name);



$insert_p1= array(   
      "entry_id"      =>     mysqli_real_escape_string($dat->con, $insstat),
      "ledger_id"         =>     mysqli_real_escape_string($dat->con, $cparty_id['id']),
      "amount"          =>     mysqli_real_escape_string($dat->con, $_POST['amount']),  
      "dc"        =>     mysqli_real_escape_string($dat->con, 'C')
      );  


       $insst1 = $dat->insert('entryitems', $insert_p1);

      


/*$driver =mysqli_query($conn,"SELECT * FROM drivers WHERE id ='".$_POST['loaddriver']."';" );
$dri=mysqli_fetch_assoc($driver);*/



$dparty_name =mysqli_query($conn,"SELECT * FROM ledgers WHERE name ='Accounts Payable'; " );
$dparty_id=mysqli_fetch_assoc($dparty_name);

$insert_p2= array(   
      "entry_id"      =>     mysqli_real_escape_string($dat->con, $insstat),
      "ledger_id"         =>     mysqli_real_escape_string($dat->con, $dparty_id['id']),
      "amount"          =>     mysqli_real_escape_string($dat->con, $_POST['amount']),  
      "dc"        =>     mysqli_real_escape_string($dat->con, 'D')
      );  


       $insst2 = $dat->insert('entryitems', $insert_p2);





/*For Payment*/





$vouc_type="Fuel Purchase Payment".$tripid."Qty:".$_POST['qty']."lts.For".$_POST['vechno'];

/*$trans=$tra['name'];
$entries=$trans."entries";
$ent_items=$trans."entryitems";
$ledgers=$trans."ledgers";*/


$findnos =mysqli_query($conn,"SELECT * FROM entries WHERE entrytype_id ='2' ORDER BY id DESC LIMIT 1; " );
$nos=mysqli_fetch_assoc($findnos);

$insert_hire = array(   
      "entrytype_id"      =>     mysqli_real_escape_string($dat->con, '2'),
      "number"         =>     mysqli_real_escape_string($dat->con, $nos['number']+1),
      "date"          =>     mysqli_real_escape_string($dat->con, $newDate),  
      "dr_total"        =>     mysqli_real_escape_string($dat->con, $_POST['amount']),
      "cr_total"      =>     mysqli_real_escape_string($dat->con, $_POST['amount']),
      "narration"    =>     mysqli_real_escape_string($dat->con, $vouc_type)
     
      );  
       $insstat = $dat->insert('entries', $insert_hire);



$cparty_name =mysqli_query($conn,"SELECT * FROM ledgers WHERE name ='Cash';" );
$cparty_id=mysqli_fetch_assoc($cparty_name);



$insert_p1= array(   
      "entry_id"      =>     mysqli_real_escape_string($dat->con, $insstat),
      "ledger_id"         =>     mysqli_real_escape_string($dat->con, $cparty_id['id']),
      "amount"          =>     mysqli_real_escape_string($dat->con, $_POST['amount']),  
      "dc"        =>     mysqli_real_escape_string($dat->con, 'C')
      );  


       $insst1 = $dat->insert('entryitems', $insert_p1);

      


/*$driver =mysqli_query($conn,"SELECT * FROM drivers WHERE id ='".$_POST['loaddriver']."';" );
$dri=mysqli_fetch_assoc($driver);*/



$dparty_name =mysqli_query($conn,"SELECT * FROM ledgers WHERE name ='".$_POST['vendor']."'; " );
$dparty_id=mysqli_fetch_assoc($dparty_name);

$insert_p2= array(   
      "entry_id"      =>     mysqli_real_escape_string($dat->con, $insstat),
      "ledger_id"         =>     mysqli_real_escape_string($dat->con, $dparty_id['id']),
      "amount"          =>     mysqli_real_escape_string($dat->con, $_POST['amount']),  
      "dc"        =>     mysqli_real_escape_string($dat->con, 'D')
      );  


       $insst2 = $dat->insert('entryitems', $insert_p2);




/*For Payment Entry Account payable->Diesel Payments*/

$vouc_type="Fuel Payment".$tripid."Qty:".$_POST['qty']."lts.For ".$_POST['vechno'];

/*$trans=$tra['name'];
$entries=$trans."entries";
$ent_items=$trans."entryitems";
$ledgers=$trans."ledgers";*/


$findnos =mysqli_query($conn,"SELECT * FROM entries WHERE entrytype_id ='4' ORDER BY id DESC LIMIT 1; " );
$nos=mysqli_fetch_assoc($findnos);

$insert_hire = array(   
      "entrytype_id"      =>     mysqli_real_escape_string($dat->con, '4'),
      "number"         =>     mysqli_real_escape_string($dat->con, $nos['number']+1),
      "date"          =>     mysqli_real_escape_string($dat->con, $newDate),  
      "dr_total"        =>     mysqli_real_escape_string($dat->con, $_POST['amount']),
      "cr_total"      =>     mysqli_real_escape_string($dat->con, $_POST['amount']),
      "narration"    =>     mysqli_real_escape_string($dat->con, $vouc_type)
     
      );  
       $insstat = $dat->insert('entries', $insert_hire);



$cparty_name =mysqli_query($conn,"SELECT * FROM ledgers WHERE name ='Diesel Payments';" );
$cparty_id=mysqli_fetch_assoc($cparty_name);



$insert_p1= array(   
      "entry_id"      =>     mysqli_real_escape_string($dat->con, $insstat),
      "ledger_id"         =>     mysqli_real_escape_string($dat->con, $cparty_id['id']),
      "amount"          =>     mysqli_real_escape_string($dat->con, $_POST['amount']),  
      "dc"        =>     mysqli_real_escape_string($dat->con, 'C')
      );  


       $insst1 = $dat->insert('entryitems', $insert_p1);

      

/*
$driver_nme =mysqli_query($conn,"SELECT * FROM drivers WHERE id ='".$driver."';" );
$dri=mysqli_fetch_assoc($driver_nme);*/



$dparty_name =mysqli_query($conn,"SELECT * FROM ledgers WHERE name ='Accounts Payable'; " );
$dparty_id=mysqli_fetch_assoc($dparty_name);

$insert_p2= array(   
      "entry_id"      =>     mysqli_real_escape_string($dat->con, $insstat),
      "ledger_id"         =>     mysqli_real_escape_string($dat->con, $dparty_id['id']),
      "amount"          =>     mysqli_real_escape_string($dat->con, $_POST['amount']),  
      "dc"        =>     mysqli_real_escape_string($dat->con, 'D')
      );  


       $insst2 = $dat->insert('entryitems', $insert_p2);








}
elseif($_POST['billpay']=="Credit")
{
/*echo '<script>alert("Credit");</script>';*/

/*
Debit for Fuel*/


$vouc_type="Fuel Purchase".$tripid."Qty:".$_POST['qty']."lts.";

/*$trans=$tra['name'];
$entries=$trans."entries";
$ent_items=$trans."entryitems";
$ledgers=$trans."ledgers";*/


$findnos =mysqli_query($conn,"SELECT * FROM entries WHERE entrytype_id ='4' ORDER BY id DESC LIMIT 1; " );
$nos=mysqli_fetch_assoc($findnos);
$value=$nos['number']+1;
echo '<script>alert("'.$value.'");</script>';
$insert_hire = array(   
      "entrytype_id"      =>     mysqli_real_escape_string($dat->con, '4'),
      "number"         =>     mysqli_real_escape_string($dat->con,$value ),
      "date"          =>     mysqli_real_escape_string($dat->con, $newDate),  
      "dr_total"        =>     mysqli_real_escape_string($dat->con, $_POST['amount']),
      "cr_total"      =>     mysqli_real_escape_string($dat->con, $_POST['amount']),
      "narration"    =>     mysqli_real_escape_string($dat->con, $vouc_type)
     
      );  

       $insstat = $dat->insert('entries', $insert_hire);
/*
echo '<script>alert("'.$insstat.'");</script>';*/

$cparty_name =mysqli_query($conn,"SELECT * FROM ledgers WHERE name ='" .$_POST['vendor']. "';" );
$cparty_id=mysqli_fetch_assoc($cparty_name);



$insert_p1= array(   
      "entry_id"      =>     mysqli_real_escape_string($dat->con, $insstat),
      "ledger_id"         =>     mysqli_real_escape_string($dat->con, $cparty_id['id']),
      "amount"          =>     mysqli_real_escape_string($dat->con, $_POST['amount']),  
      "dc"        =>     mysqli_real_escape_string($dat->con, 'C')
      );  


       $insst1 = $dat->insert('entryitems', $insert_p1);

      


/*$driver =mysqli_query($conn,"SELECT * FROM drivers WHERE id ='".$_POST['loaddriver']."';" );
$dri=mysqli_fetch_assoc($driver);*/



$dparty_name =mysqli_query($conn,"SELECT * FROM ledgers WHERE name ='Accounts Payable'; " );
$dparty_id=mysqli_fetch_assoc($dparty_name);

$insert_p2= array(   
      "entry_id"      =>     mysqli_real_escape_string($dat->con, $insstat),
      "ledger_id"         =>     mysqli_real_escape_string($dat->con, $dparty_id['id']),
      "amount"          =>     mysqli_real_escape_string($dat->con, $_POST['amount']),  
      "dc"        =>     mysqli_real_escape_string($dat->con, 'D')
      );  


       $insst2 = $dat->insert('entryitems', $insert_p2);



}








}






if ($insid)
{
echo"Success";
}
else
{
  echo"Fail";
}
}
else
{
$uid = array(
      "id"              =>     mysqli_real_escape_string($dat->con, $_POST['id'])
   );
$newDate = date("Y-d-m", strtotime($_POST['date']));
$upd_fuel = array(   
      "ent_date"        =>     mysqli_real_escape_string($dat->con, $newDate), 
      "driver"          =>     mysqli_real_escape_string($dat->con, $_POST['driver']), 
      "vendor"          =>     mysqli_real_escape_string($dat->con, $_POST['vendor']), 
      "place"           =>     mysqli_real_escape_string($dat->con, $_POST['place']), 
      "qty"             =>     mysqli_real_escape_string($dat->con, $_POST['qty']),
      "ppl"             =>     mysqli_real_escape_string($dat->con, $_POST['pricepl']), 
      "cost"            =>     mysqli_real_escape_string($dat->con, $_POST['amount']),
      "paytype"         =>     mysqli_real_escape_string($dat->con, $_POST['billpay'])
      );  


  $insid = $dat->update('fuel',$upd_fuel,$uid);


  if($_POST['billpay']!="Driver Cash")
{

$result=mysqli_query($conn,"DELETE FROM driver_mgt where fuel_ent_id ='".$_POST['id']."'; " );
}
else
{
  $uid = array(
      "fuel_ent_id"              =>     mysqli_real_escape_string($dat->con, $_POST['id'])
   );


  $edit_driver_mgt = array(
        "ent_date"        =>     mysqli_real_escape_string($dat->con, $_POST['date']), 
        "driver_id"        =>     mysqli_real_escape_string($dat->con, $_POST['driver']),
        "amount"           =>     mysqli_real_escape_string($dat->con, $_POST['amount'])
      ); 
 $inshhaltid = $dat->update('driver_mgt', $edit_driver_mgt,$uid);


}

if ($insid)
{
echo"Update Success";
}
else
{
  echo"Update Fail";
}




}
/*

$query = "INSERT INTO fuel(intAdminId,tripid,date,vechno,driver,vendor,place,qty,ppl,cost,paytype) VALUES('$id',$trip,$date,$vechno,$driver,$vendor,$place,$quant,$price,$amt,$bill)";
 if(mysqli_query($conn, $query))
 {
  echo 'Data Inserted';
 }
*/
