<?php
require('../include/dbConnect.php');
require('../include/basefunctions.php');  

    $dat = new Basefunc;

if($_POST["action"]=="Fetch") 
{
	$query1 = mysqli_query($conn,"SELECT * FROM milage_note WHERE vechno = '" .$_POST["vno"]. "' ORDER  BY id DESC
LIMIT  1;");

$total_qty=0;
$check=mysqli_num_rows($query1);
if($check==0)
{

	/*For First Time*/
$query2 = mysqli_query($conn,"SELECT * FROM vehicles WHERE vechNo = '" .$_POST["vno"]. "' ORDER  BY id DESC
LIMIT  1");
$vech=mysqli_fetch_assoc($query2); 
$upd_date="NIL";
$query3 =mysqli_query($conn,"SELECT * FROM fuel WHERE vechno ='" .$_POST["vno"]. "'; " );
while($die=mysqli_fetch_assoc($query3))
{

$total_qty=$die['qty']+$total_qty;

}




}
else
{

	$vech=mysqli_fetch_assoc($query1); 
	
	$upd_date=$vech['last_updated'];
	$vechno=$_POST["vno"];
	$curr_date=date('d/m/Y');

$query2 =mysqli_query($conn,"SELECT * FROM fuel WHERE vechno = '$vechno' AND ent_date between '$upd_date' and '$curr_date'; " );
while($die=mysqli_fetch_assoc($query2))
{

$total_qty=$die['qty']+$total_qty;

}


	
/*total Calculation*/
}


$output =  array(

	             'kms'=>$vech['current_kms'],
                 'date'=>$upd_date,
                 'qty'=>$total_qty,
                 'vno'=>$_POST["vno"]
                 );
echo json_encode($output,JSON_FORCE_OBJECT);
}
else if($_POST["action"]=="Insert") 
{
$date=date('d/m/Y');

$insert_mil = array(   
      "intAdminId"      =>     mysqli_real_escape_string($dat->con, $_SESSION['MintId']),
      "vechno"          =>     mysqli_real_escape_string($dat->con, $_POST['vech']),  
      "current_kms"     =>     mysqli_real_escape_string($dat->con, $_POST['kms']), 
      "milage"          =>     mysqli_real_escape_string($dat->con, $_POST['milage']), 
      "last_updated"    =>     mysqli_real_escape_string($dat->con, $date)
     
      );  


       $insid = $dat->insert('milage_note', $insert_mil);


}
else if($_POST["action"]=="Reset") 
{


$current_kms=0;
$milage=0;

$insert_mil = array(   
      "intAdminId"      =>     mysqli_real_escape_string($dat->con, $_SESSION['MintId']),
      "vechno"          =>     mysqli_real_escape_string($dat->con, $_POST['vech']),  
      "current_kms"     =>     mysqli_real_escape_string($dat->con, $current_kms), 
      "milage"          =>     mysqli_real_escape_string($dat->con, $milage)
      
     
      );  


       $insid = $dat->insert('milage_note', $insert_mil);


}