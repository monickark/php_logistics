
<?php
require('../include/dbConnect.php');
if(!empty($_POST["vech_id"])) 
{

$query = mysqli_query($conn,"SELECT status,from_place,to_place,tripid,ent_date FROM vechstat WHERE vechnum = '" . $_POST["vech_id"] . "' ORDER  BY id DESC
LIMIT  1");

$row=mysqli_fetch_assoc($query);  

if($row['status']=="Load")
{

	echo"<div class='row' style='margin: 0px;'>";
	
	echo"<div class='get-status-det'>       <h4 class='get-status-det-tittle' >".$_POST["vech_id"]." </h4></div>";
	echo "<div class='col-md-6 get-status-det-left' > Status  </div><div class='col-md-6 get-status-det-right'>On ".$row['status']."</div>";
	echo"<div class='col-md-6 get-status-det-left'> From </div><div class='col-md-6 get-status-det-right'>".$row['from_place']."</div>";
    echo"<div class='col-md-6 get-status-det-left'> To  </div><div class='col-md-6 get-status-det-right'>".$row['to_place']."</div>";
	echo"<div class='col-md-6 get-status-det-left'> Reference Number </div><div class='col-md-6 get-status-det-right'>".$row['tripid']."</div></div>";
echo"<input type='hidden' id='ret_tripid' name='ret_tripid' value='".$row['tripid'] ."'>";

}
else if($row['status']=="Return"||$row['status']=="Returnemp")
{
	$to_date=date("d/m/Y");

	if($row['ent_date']==$to_date)
	{
echo"<div class='row' style='margin: 0px;'>";
	
	echo"<div class='get-status-det'>       <h4 class='get-status-det-tittle'>".$_POST["vech_id"]." </h4></div>";
	echo "<div class='col-md-6 get-status-det-left' > Status  </div><div class='col-md-6 get-status-det-right'> ".$row['status']."ing </div>";
	echo"<div class='col-md-6 get-status-det-left'> From </div><div class='col-md-6 get-status-det-right'>".$row['from_place']."</div>";
    echo"<div class='col-md-6 get-status-det-left'> To  </div><div class='col-md-6 get-status-det-right'>".$row['to_place']."</div>";
	echo"<div class='col-md-6 get-status-det-left'> Reference Number </div><div class='col-md-6 get-status-det-right'>".$row['tripid']."</div></div>";
	echo"<input type='hidden' id='ret_tripid' name='ret_tripid' value='".$row['tripid'] ."'>";
}

else
{
echo"<div class='row' style='margin: 0px;'>";
echo"<div class='get-status-det'>       <h4 class='get-status-det-tittle'>".$_POST["vech_id"]." </h4></div>";
	echo "<div class='col-md-6 get-status-det-left' > Status  </div><div class='col-md-6 get-status-det-right'>".$row['status']."</div>";
	echo"<div class='col-md-6 get-status-det-left'> From </div><div class='col-md-6 get-status-det-right'>".$row['from_place']."</div>";
    echo"<div class='col-md-6 get-status-det-left'> To  </div><div class='col-md-6 get-status-det-right'>".$row['to_place']."</div>";
	echo"<div class='col-md-6 get-status-det-left'> Reference Number </div><div class='col-md-6 get-status-det-right'
	>".$row['tripid']."</div></div>";
	echo"<input type='hidden' id='ret_tripid' name='ret_tripid' value='".$row['tripid'] ."'>";



} /*Checking the date*/

}

else if($row['status']=="Parking")
{

	echo"<div class='row' style='margin: 0px;'>";
	
	echo"<div class='get-status-det'>       <h4 class='get-status-det-tittle'>".$_POST["vech_id"]." </h4></div>";
	echo "<div class='col-md-6 get-status-det-left' > Status  </div><div class='col-md-6 get-status-det-right'> ".$row['status']."</div>";
	echo"<div class='col-md-6 get-status-det-left'> Place </div><div class='col-md-6 get-status-det-right'>".$row['from_place']."</div></div>";
	echo"<input type='hidden' id='ret_tripid' name='ret_tripid' value='NULL'>";


}


else if($row['status']=="Accident")
{

	echo"<div class='row' style='margin: 0px;'>";
	
	echo"<div class='get-status-det'>       <h4 class='get-status-det-tittle'>".$_POST["vech_id"]." </h4></div>";
	echo "<div class='col-md-6 get-status-det-left' > Status  </div><div class='col-md-6 get-status-det-right'> ".$row['status']."</div>";
	echo"<div class='col-md-6 get-status-det-left'> Workshop Place </div><div class='col-md-6 get-status-det-right'>".$row['to_place']."</div></div>";
	echo"<input type='hidden' id='ret_tripid' name='ret_tripid' value='NULL'>";


}



else if($row['status']=="Halt")
{

	echo"<div class='row' style='margin: 0px;'>";
	
	echo"<div class='get-status-det'>       <h4 class='get-status-det-tittle'>".$_POST["vech_id"]." </h4></div>";
	echo "<div class='col-md-6 get-status-det-left' > Status  </div><div class='col-md-6 get-status-det-right'>On ".$row['status']."</div>";
	echo"<div class='col-md-6 get-status-det-left'> From </div><div class='col-md-6 get-status-det-right'>".$row['from_place']."</div>";
	echo"<div class='col-md-6 get-status-det-left'> Reference Number </div><div class='col-md-6 get-status-det-right'
	>".$row['tripid']."</div></div>";
	echo"<input type='hidden' id='ret_tripid' name='ret_tripid' value='".$row['tripid'] ."'>";


}
else if($row['status']=="OnRoad")
{

$return_ret =mysqli_query($conn,"SELECT * FROM load_return WHERE vechno = '" . $_POST["vech_id"] . "'ORDER  BY id DESC LIMIT  1");

$return=mysqli_fetch_assoc($return_ret);


if($row['from_place']==$return['to_place'])
{




	echo"<div class='row' style='margin: 0px;'>";
	
	echo"<div class='get-status-det'>       <h4 class='get-status-det-tittle'>".$_POST["vech_id"]." </h4></div>";
	echo "<div class='col-md-6 get-status-det-left' > Status  </div><div class='col-md-6 get-status-det-right'> ".$row['status']."</div>";
	echo"<div class='col-md-6 get-status-det-left'> From </div><div class='col-md-6 get-status-det-right'>".$row['to_place']."</div>";
	 echo"<div class='col-md-6 get-status-det-left'> To  </div><div class='col-md-6 get-status-det-right'>".$row['from_place']."</div>";
	echo"<div class='col-md-6 get-status-det-left'> Reference Number </div><div class='col-md-6 get-status-det-right'
	>".$row['tripid']."</div></div>";
	echo"<input type='hidden' id='ret_tripid' name='ret_tripid' value='".$row['tripid'] ."'>";

}
else
{

echo"<div class='row' style='margin: 0px;'>";
	
	echo"<div class='get-status-det'>       <h4 class='get-status-det-tittle'>".$_POST["vech_id"]." </h4></div>";
	echo "<div class='col-md-6 get-status-det-left' > Status  </div><div class='col-md-6 get-status-det-right'> ".$row['status']."</div>";
	echo"<div class='col-md-6 get-status-det-left'> From </div><div class='col-md-6 get-status-det-right'>".$row['from_place']."</div>";
	 echo"<div class='col-md-6 get-status-det-left'> To  </div><div class='col-md-6 get-status-det-right'>".$row['to_place']."</div>";
	echo"<div class='col-md-6 get-status-det-left'> Reference Number </div><div class='col-md-6 get-status-det-right'
	>".$row['tripid']."</div></div>";
	echo"<input type='hidden' id='ret_tripid' name='ret_tripid' value='".$row['tripid'] ."'>";


}
}
else if($row['status']==""||$row['status']=="HHalt")
{
echo"<div class='row' style='margin: 0px;'>";
echo"<div class='get-status-det'>       <h4 class='get-status-det-tittle'>".$_POST["vech_id"]." </h4></div>";
echo"<div class='col-md-6 get-status-det-left-status-a'> Status  </div><div class='col-md-6 get-status-det-right-avail'>Vehicle Avalilable</div>";
echo"</div>";
	echo"<input type='hidden' id='ret_tripid' name='ret_tripid' value='NULL'>";
}


/*$output =  array('stat'=>$row['status'],
	'from'=>$row['mfrom'],
	'to'=>$row['mto'],

                 );*/

/*echo json_encode($output,JSON_FORCE_OBJECT);
*/
	
}
/**************/

?>
