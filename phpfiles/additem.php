<?php
$conn=pg_connect("host=localhost dbname=lost_found_db user=postgres password=14112006");

$email=$_SESSION['email']
$name=pg_query($conn,"SELECT name FROM items where name='$email'");
$item_name=$_REQUEST['item_name'];
$item_type=$_REQUEST['item_type'];
$item_description=$_REQUEST['item_description'];
$item_location=$_REQUEST['item_location'];
$item_date=$_REQUEST['item_date'];
$user_number=$_REQUEST['user_number'];

$target_dir="images/";
$extension=pathinfo($_FILES['item_image']['name'], PATHINFO_EXTENSION);
$img_name=$name."_".time()."_".$extension;
$target_file=$target_dir.$img_name;

move_uploaded_file($_FILES['item_image']['tmp_name'],$target_file);
$sql="INSERT INTO items (user, email, name,type, description, location, date, number, image ) VALUES('$name', '$email', '$item_name','item_type' ,'$item_description','$item_locationme', '$item_date', '$user_number', '$img_name')";

pg_query($conn, $sql);
header("location: ../discover-items.php");
?>