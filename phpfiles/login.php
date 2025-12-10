<?php
session_start();
$conn=pg_connect("host=localhost dbname=lost_found_db user=postgres password=14112006");
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$code=rand(10000,99999);
$to=$email;
$subject="كود التحقق: ";
$message=" شكرا لتسجيلك في موقعنا. رمز التحقق الخاص بك هو: .$code.";
$headers="From:shathaghanem2025@gmail.com";
$usercode=mail($to,$subject,$message,$headers);
if(!$usercode){
    echo "<script>alert('حدث خطأ أثناء إرسال رمز التحقق إلى بريدك الإلكتروني. حاول مرة أخرى.'); window.location.href = '../login.html';</script>";
    exit;
}
else if($_POST['code'] != $code){
    echo "<script>alert('رمز التحقق غير صحيح. حاول مرة أخرى.'); window.location.href = '../login.html';</script>";
    exit;
}
else{
if(pg_query($conn, "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')")){
     $_SESSION['email']=$email; 
    echo "success";
    exit;

}

else{
    echo" error";
}
}
?>
