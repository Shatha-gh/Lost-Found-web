<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>

<meta charset="UTF-8"/>.
<meta name="description" contant=" اذا فقدت شيئًا او عثرت على شيء يمكنك جد المفقود من ادراج او استرجاع العناصر المفقودة ">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="author" content="Shatha Ghanem">
<meta name="keywords" content="المفقودات , العناصر المفقودة , استرجاع الممتلكات , الاشياء التي تم العثور عليها , الممتلكات الضائعة, الاشياء المفقودة , الاشياء الضائعة , استرداد الممتلكات , خدمة المفقودات , خدمة الممتلكات , خدمة الممتلكات المفقودة , خدمة الممتلكات الضائعة , استرداد الاشياء">

<link rel="icon" href="img/1764528631319.png">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
<link rel="stylesheet" href="css/master.css">
<link rel="stylesheet" href="css/framework.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Almarai:wght@300;400;700;800&display=swap" rel="stylesheet">
<script src="main.js"></script>
<title>جد المفقود</title>
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
<div class="df f-c fjustify-evenly m-20  container">
    <section class="between-flex bc-light-gray p-20 rad-6 card ">
        <div class="df f-c">
            <h2 class="c-purple txt-w fs-24 mb-10">هل فقدت شيئًا؟</h2>
            <p class="c-black fs-18 mb-10">قم بتفقد القائمة أدناه لمعرفة ما إذا كان شخص آخر قد وجد العنصر الذي فقدته.</p>
            <a href="add-item.php" class=" sid-icon w-120 h-40 fs-15 between-flex df">اضف عنصر</a>
        </div>
    </section>

    <section class="between-flex bc-light-gray p-20 rad-6 card">
        <div class="df f-c">
            <h2 class="c-purple txt-w fs-24 mb-10">هل وجدت شيئًا؟</h2>
            <p class="c-black fs-18 mb-10">قم بإدراج العنصر الذي وجدته في قاعدة البيانات لدينا لمساعدة الآخرين في استعادته.</p>
            <a href="add-item.php" class="sid-icon w-120 h-40  fs-15 between-flex df">اضف عنصر</a>
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