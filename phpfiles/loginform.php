<?php
$conn=pg_connect("host=localhost dbname=lost_found_db user=postgres password=14112006");
$email = $_POST['email'];
$password = $_POST['password'];
if(pg_query($conn, "SELECT name FROM users WHERE email='$email'")){
    if(pg_query($conn, "SELECT password FROM users WHERE password='$password'")){
        session_start();
        $_SESSION['email']=$email;
        echo "success";
    }
    else{
        echo "error";
    }
}
else{
    echo "error";
}


?>
