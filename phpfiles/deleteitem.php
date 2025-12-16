<?php
session_start();
$conn=pg_connect("host=localhost dbname=lost_found_db user=postgres password=14112006");
$id_item=$_REQUEST['item_id'];
pg_query($conn, "DELETE FROM items WHERE id='$id_item' ");
header("location: ../discover-items.php");
?>
