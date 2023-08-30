<?php
require('../include/dbConnect.php');
require('../include/basefunctions.php');  
include('../include/checklogin.php');
    $dat = new Basefunc;

if($_POST['act']=="delete")
{
  $id=$_POST['value'];
/*echo '<script>alert("'.$_POST["value"].'");</script>';*/
$result=mysqli_query($conn,"DELETE FROM gc_details where id ='$id'; " );
/*echo '<script>alert("'.$result.'");</script>';*/

echo'<span style="padding-right:20px;"><button type="button" class="ion-plus-circled tx-16 lh-0 op-6" data-toggle="modal" data-target="#modaldemo1" ></button></span><span style=" font-size: 20px;  ">Add GC</span>';

}



/*
FOR VOUCHER TYPE ADDITION*/

else if($_POST['act']=="Voucher")
{
  $id=$_POST['gcno'];

  $date=date('Y-m-d');

    $voucher = mysqli_query($conn,"SELECT * FROM voucher_type WHERE name = '$id'"); 

if(mysqli_num_rows($voucher)==0)
{




$insert_gc = array(   
      "intAdminId"      =>     mysqli_real_escape_string($dat->con, $_SESSION['MintId']),
      "ent_date"        =>     mysqli_real_escape_string($dat->con, $date),
      "name"            =>     mysqli_real_escape_string($dat->con, $_POST['gcno'] )
      );  

      $insid = $dat->insert('voucher_type', $insert_gc);
echo"Done";

}

else
{

  echo "Type Already Present";
}


/*
 echo '<script> alert("Added");</script>';*/

}
/*
FOR Nature TYPE ADDITION*/

else if($_POST['act']=="Nature")
{
  $id=$_POST['gcno'];

  $date=date('Y-m-d');

    $voucher = mysqli_query($conn,"SELECT * FROM nature WHERE name = '$id'"); 

if(mysqli_num_rows($voucher)==0)
{




$insert_gc = array(   
      "intAdminId"      =>     mysqli_real_escape_string($dat->con, $_SESSION['MintId']),
      "name"            =>     mysqli_real_escape_string($dat->con, $_POST['gcno'] )
      );  

      $insid = $dat->insert('nature', $insert_gc);

echo"Done";

}

else
{

  echo "Type Already Present";
}


/*
 echo '<script> alert("Added");</script>';*/

}

else
{
$date=date('Y-m-d');
$insert_gc = array(   
      "intAdminId"      =>     mysqli_real_escape_string($dat->con, $_SESSION['MintId']),
      "ent_date"        =>     mysqli_real_escape_string($dat->con, $date),
      "gcno"            =>     mysqli_real_escape_string($dat->con, $_POST['gcno'] ),  
      "tripid"          =>     mysqli_real_escape_string($dat->con, $_POST['tripid']), 
      "consignor_name"  =>     mysqli_real_escape_string($dat->con, $_POST['consee_name']), 
      "consignee_name"  =>     mysqli_real_escape_string($dat->con, $_POST['consor']), 
      "articles"        =>     mysqli_real_escape_string($dat->con, $_POST['art']), 
      "value"           =>     mysqli_real_escape_string($dat->con, $_POST['val']), 
      "description"     =>     mysqli_real_escape_string($dat->con, $_POST['des'])
      );  


       $insid = $dat->insert('gc_details', $insert_gc);



echo "GC Added";


/*$data = mysqli_fetch_assoc($result);
echo '<script>alert("'.$data['vechno'].'");</script>';*/

    echo "<a href='javascript:void()' onclick='deletegc(".$insid.")' class='btn btn-outline-danger btn-icon mg-r-5' ><div><i class='fa fa-trash-o'></i></div></a>";
    
 }   



