<?php
require('../include/dbConnect.php');
require('../include/basefunctions.php');  
include('../include/checklogin.php');
    $dat = new Basefunc;


if($_POST['act']=="Insert")
{

$insert_bank = array(   
      "intAdminId"      =>     mysqli_real_escape_string($dat->con, $_SESSION['MintId']),
      "name"            =>     mysqli_real_escape_string($dat->con, $_POST['bnk_name'] ),  
      "accno"           =>     mysqli_real_escape_string($dat->con, $_POST['acc_no']), 
      "ifsc"            =>     mysqli_real_escape_string($dat->con, $_POST['ifsc_cde']), 
      "cust_id"         =>     mysqli_real_escape_string($dat->con, $_POST['cust_id']), 
      "comp_nme"        =>     mysqli_real_escape_string($dat->con, $_POST['comp_name'])
      );  


       $insid = $dat->insert('bank_records', $insert_bank);




if($_POST['by']=="Company")
{


/*$under="Logistics";*/


$bank_check=mysqli_query($conn,"SELECT * FROM ledger WHERE name ='" .$_POST["bnk_name"]. "' AND under='$under'; " );





        $newDate =date("Y-m-d");

if(mysqli_num_rows($bank_check)==0)
{
        $bank = array(
        "intAdminId"     =>     mysqli_real_escape_string($dat->con, $_SESSION['MintId']),
        "type"           =>     mysqli_real_escape_string($dat->con, $_POST['led_type']),
        "group_name"     =>     mysqli_real_escape_string($dat->con, $_POST['group'] ),
        "opening_bal"    =>     mysqli_real_escape_string($dat->con, $_POST['op_bal']),
        "nature"         =>     mysqli_real_escape_string($dat->con, $_POST['nature']),
        "under"          =>     mysqli_real_escape_string($dat->con, $insid),
        "ent_date"       =>     mysqli_real_escape_string($dat->con, $newDate),
        "name"           =>     mysqli_real_escape_string($dat->con, $_POST['bnk_name'])
      ); 
 $bank_insert = $dat->insert('ledger', $bank);
 

}



}



else if($_POST['by']=="Transporter")
{


/*$under="Logistics";*/


$bank_check=mysqli_query($conn,"SELECT * FROM ledger WHERE name ='" .$_POST["bnk_name"]. "' AND under='$under'; " );



$ins=$insid;

        $newDate =date("Y-m-d");

if(mysqli_num_rows($bank_check)==0)
{
        $bank = array(
        "intAdminId"     =>     mysqli_real_escape_string($dat->con, $_SESSION['MintId']),
        "type"           =>     mysqli_real_escape_string($dat->con, $_POST['led_type']),
        "group_name"     =>     mysqli_real_escape_string($dat->con, $_POST['group'] ),
        "opening_bal"    =>     mysqli_real_escape_string($dat->con, $_POST['op_bal']),
        "nature"         =>     mysqli_real_escape_string($dat->con, $_POST['nature']),
        "under"          =>     mysqli_real_escape_string($dat->con, $ins),
        "ent_date"       =>     mysqli_real_escape_string($dat->con, $newDate),
        "name"           =>     mysqli_real_escape_string($dat->con, $_POST['bnk_name'])
      ); 
 $bank_insert = $dat->insert('ledger_approval', $bank);
 

}



}


if ($insid)
{
echo "success";
}
else
{
  echo"Fail";
}
}
else if($_POST['act']=="Fetch")
{

$cusid = $_POST["custid"];
$result=mysqli_query($conn,"SELECT * FROM bank_records WHERE cust_id = '$cusid' ; " );

echo "<table id='datatable1' class='table display responsive nowrap' >
<tr>
<td align=center> <b>Bank</b></td>
<td align=center><b>Account Number</b></td>
<td align=center><b>IFSC</b></td>
";

/*$data = mysqli_fetch_assoc($result);
echo '<script>alert("'.$data['vechno'].'");</script>';*/
while($data = mysqli_fetch_assoc($result))
{   

    echo "<tr>";
    echo "<td align=center>".$data['name']."</td>";
    echo "<td align=center>".$data['accno']."</td>";
    echo "<td align=center>".$data['ifsc']."</td>";
    echo "<td align=center><a href='javascript:void()' onclick='deletefuel(".$data['id'].")' class='btn btn-outline-danger btn-icon mg-r-5'><div><i class='fa fa-trash-o'></i></div></a></td>";
    
    echo "</tr>";
}
echo "</table>";






}
else
{

  $id = $_POST["value"];
/*  echo '<script>alert("'.$id.'");</script>';*/

$result=mysqli_query($conn,"DELETE FROM bank_records WHERE id = '$id' ; " );

$delete=mysqli_query($conn,"DELETE FROM ledger WHERE under = '$id' ; " );




}
