<?php
//fetch.php
require('../include/dbConnect.php');

$query = "SELECT * FROM fuel ";
/*echo '<script>alert("'.$_POST["vechno"].'");</script>';*/
/*
if(isset($_POST["vechno"]))
{
echo '<script>alert("'.$_POST["vechno"].'");</script>';
$query .= '
WHERE vechno = "%'.$_POST["vechno"].'% AND"

 ';

}*/

if(isset($_POST["search"]["value"]))
{
 $query .= '
 WHERE driver LIKE "%'.$_POST["search"]["value"].'%" 
 OR vendor LIKE "%'.$_POST["search"]["value"].'%" 
 OR ent_date LIKE "%'.$_POST["search"]["value"].'%" 
 OR tripid LIKE "%'.$_POST["search"]["value"].'%" 
 OR place LIKE "%'.$_POST["search"]["value"].'%" 
 OR cost LIKE "%'.$_POST["search"]["value"].'%"

 ';
}





if(isset($_POST["order"]))
{
 $query .= 'ORDER BY '.$columns[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' 
 ';
}
else
{
 $query .= 'ORDER BY id DESC ';
}

$query1 = '';

if($_POST["length"] != -1)
{
 $query1 = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}

$number_filter_row = mysqli_num_rows(mysqli_query($conn, $query));

$result = mysqli_query($conn, $query . $query1);

$data = array();

while($row = mysqli_fetch_array($result))
{
 $sub_array = array();
 $sub_array[] = '<div contenteditable class="update" data-id="'.$row["id"].'" data-column="Date">' . $row["ent_date"] . '</div>';
 $sub_array[] = '<div contenteditable class="update" data-id="'.$row["id"].'" data-column="Ref. No">' . $row["tripid"] . '</div>';
 $sub_array[] = '<div contenteditable class="update" data-id="'.$row["id"].'" data-column="driver">' . $row["driver"] . '</div>';
 $sub_array[] = '<div contenteditable class="update" data-id="'.$row["id"].'" data-column="vendor">' . $row["vendor"] . '</div>';
 $sub_array[] = '<div contenteditable class="update" data-id="'.$row["id"].'" data-column="place">' . $row["place"] . '</div>';
 $sub_array[] = '<div contenteditable class="update" data-id="'.$row["id"].'" data-column="Amount">' . $row["cost"] . '</div>';
 $sub_array[] = '<button type="button" name="delete" class="btn btn-danger btn delete" id="'.$row["id"].'">Del</button>';
 $data[] = $sub_array;
}

function get_all_data($connect)
{
 $query = "SELECT * FROM fuel";
 $result = mysqli_query($conn, $query);
 return mysqli_num_rows($result);
}

$output = array(
 "draw"    => intval($_POST["draw"]),
 "recordsTotal"  =>  get_all_data($connect),
 "recordsFiltered" => $number_filter_row,
 "data"    => $data

);

echo json_encode($output);

?>
