<?php
session_start();
if(isset($_SESSION['email'])){
    header("Location: the-main-page.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>

<meta charset="UTF-8"/>
<meta name="description" contant="  ">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="icon" href="img/1764528631319.png">
<link rel="icon" href="img/1764528631319.png">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
<link rel="stylesheet" href="css/master.css">
<link rel="stylesheet" href="css/framework.css">


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Almarai:wght@300;400;700;800&display=swap" rel="stylesheet">
<script src="main.js"></script>
<title>تسجيل الدخول</title>
</head>
<body class="bc-white">

<header>
<div >    
<nav class="big-screen" >

    <div class="logo between-flex df">
        <img class="w-120 h-80 " src="img/1764528631308.png" alt="">
        <span class="txt-w fs-30 c-g">جد المفقود</span>
    </div >
    <a class="sid-icon mr-20 no-mob " href="the-main-page.php"><i class="fa fa-home"></i>  الرئيسية</a>
    <a class="sid-icon no-mob" href="add-item.php"><i class="fa fa-plus"></i>   اضف عنصر </a> 
    
    <a class="sid-icon no-mob " href="discover-items.php"><i class="fa fa-list"></i>   قائمة المفقودات </a>


    <?php if (!isset($_SESSION['email'])): ?>
        <a class="sid-icon" href="loginform.php"><i class="fa fa-sign-in-alt"></i>   تسجيل الدخول</a>
    <?php else: ?>
        <button class="sid-icon" onclick="logout()"><i class="fa fa-sign-out-alt"></i>   تسجيل الخروج</button>
    
    <?php endif; ?>

    
</nav>
</div>
<nav class="small-screen df ">
    <div class="logo between-flex ">
        <img class="w-120 h-80 " src="img/1764528631308.png" alt="">
        <span class="txt-w fs-30 c-g">جد المفقود</span>
    </div >
    <div class="dropdown">
    <button class="btn  dropdown-toggle " data-bs-toggle="dropdown" ><i class="bi bi-list"></i></button>
        <ul class="dropdown-menu bc-purple">
        <li><a class="dropdown-item bc-purple c-white txt-w rad-6" href="the-main-page.php">
        <i class="fa fa-home"></i>        الرئيسية</a></li>
        <li><hr class="dropdown-divider"></li>
        <li><a class="dropdown-item bc-purple c-white txt-w rad-6" href="add-item.php"><i class="fa fa-plus"></i>   اضف عنصر</a></li>
        <li><hr class="dropdown-divider"></li>
        <li><a class="dropdown-item bc-purple c-white txt-w rad-6" href="discover-items.php"><i class="fa fa-list"></i>   قائمة المفقودات</a></li>
        <li><hr class="dropdown-divider"></li>
        <?php if (!isset($_SESSION['email'])): ?>
        <li><a class="dropdown-item bc-purple c-white txt-w rad-6" href="loginform.php"><i class="fa fa-sign-in-alt"></i>   تسجيل الدخول</a></li>
    <?php else: ?>
    <li><button class="dropdown-item bc-purple c-white txt-w rad-6"  onclick="logout()"><i class="fa fa-sign-out-alt"></i>   تسجيل الخروج</button></li>
    <?php endif; ?>
    
  </ul>
</div>
</nav>
</header>
<main>
<div class="df f-c fjustify-evenly m-20 .fjustify-center card container2 bn">
       <section class="between-flex bc-light-gray p-20 rad-6 shadow-dark-gray fjustify-center add m-20">
        <div class="df f-c card bc-light-gray bn">
            <h2 class="c-g txt-c mb-20">تسجيل الدخول </h2>
            <form class="df f-c bc-light-gray n-shadow mt-n p-20 rad-n">
                <label for="username" class="c-purple txt-w mb-10">البريد الالكتروني:</label>
                <input type="email" id="email" name="email" class="bc-white c-black mb-10 p-20 rad-6" placeholder="ادخل بريد المستخدم" required>
                
                <label for="password" class="c-purple txt-w mb-10"> كلمة السر:</label>
                <input type="password" id="password" name="password" class="bc-white c-black mb-10 p-20 rad-6" placeholder="ادخل كلمة السر" required>
                
                <button onclick="loginform()" class="bc-purple c-white sid-icon p-20 rad-6">تسجيل الدخول</button>
            </form>
            <div id="msg"></div>
            <div><p>ليس لديك حساب <a href="login.php"> قم بالتسجيل</a></p></div>
        
        </div>
    </section>

  
</div>
</main>
</hr>
<footer class="bc-dark-gray h-80 p-10">
    <div>
        <p class="c-white fs-15 p-10 pt-20 txt-r m-20">جميع الحقوق محفوظة &copy; 2025 جد المفقود</p>
    </div>
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
</body>


</html>