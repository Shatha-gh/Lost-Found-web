<?php
$conn=pg_connect("host=localhost dbname=lost_found_db user=postgres password=14112006");
session_start();
$email = $_SESSION['email'];

$item_name=$_REQUEST['item_name'];
$item_type=$_REQUEST['item_type'];
$item_description=$_REQUEST['item_description'];
$item_location=$_REQUEST['item_location'];
$item_date=$_REQUEST['item_date'];
$user_number=$_REQUEST['user_number'];

$target_dir="../images/";

$extension=strtolower(pathinfo($_FILES['item_image']['name'], PATHINFO_EXTENSION));
$img_name=$email."_".time().".".$extension;
$target_file=$target_dir.$img_name;

move_uploaded_file($_FILES['item_image']['tmp_name'],$target_file);
$sql="INSERT INTO items (email, name,type, description, location, date, number, image ) 
VALUES('".pg_escape_string($email)."',
'".pg_escape_string($item_name)."',
'".pg_escape_string($item_type)."' ,
'".pg_escape_string($item_description)."',
'".pg_escape_string($item_location)."', 
'".pg_escape_string($item_date)."',
'".pg_escape_string($user_number)."',
'".pg_escape_string($img_name)."' )";

pg_query($conn, $sql);
header("location: ../discover-items.php");
?>
