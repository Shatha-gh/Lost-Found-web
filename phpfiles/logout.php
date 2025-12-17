<?php
session_start();
session_unset();    
session_destroy();
echo "done";
header("location:../the-main-page.php");
exit;

?>
