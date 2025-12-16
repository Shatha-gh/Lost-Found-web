<?php

$conn=pg_connect("host=localhost dbname=lost_found_db user=postgres password=14112006");
$id_item=$_REQUEST['item_id'];

$img_query="SELECT image FROM items WHERE id='".pg_escape_string($id_item)."' ";
$result=pg_query($conn,$img_query);
if($row=pg_fetch_assoc($result)){
$img_name=$row['image'];
$img_path="../images/". $img_name;
}
if(file_exists($img_path)){unlink($img_path); }

pg_query($conn, "DELETE FROM items WHERE id='$id_item' ");
header("location: ../discover-items.php");
?>
