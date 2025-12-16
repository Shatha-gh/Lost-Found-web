    <?php
session_start();
if(!isset($_SESSION['email'])){
    header("Location: loginform.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>

<meta charset="UTF-8"/>.
<meta name="description" contant="اذا عثرت على شيء يمكنك ادراجه للعثور على مالكه ">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="icon" href="img/1764528631319.png">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
<link rel="stylesheet" href="css/master.css">
<link rel="stylesheet" href="css/framework.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Almarai:wght@300;400;700;800&display=swap" rel="stylesheet">
<script src="main.js"></script>

<title>اضف عنصر</title>
</head>
<body class="bc-white">


<header>

<div>    
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
        <div class="df f-c card bn bc-light-gray">
            <h2 class="c-g txt-c pb-20 bc-light-gray mb-n"><i class="fa-solid fa-plus c-purple fs-40 txt-c mb-20 df"></i> اضف عنصر مفقود</h2>
            
            <form action="phpfiles/additem.php" method="post" enctype="multipart/form-data" class="df f-c bc-light-gray n-shadow mt-n p-20 rad-n">  
                <label for="item-name" class="c-purple txt-w mb-10">اسم العنصر المفقود:</label>
                <input type="text" id="item-name" name="item_name" class="bc-white c-black mb-10 p-20 rad-6" placeholder="ادخل اسم العنصر المفقود" required>

                <label for="item-type" class="c-purple txt-w mb-10">نوع العنصر المفقود:</label>
                <input type="text" id="item-type" name="item_type" class="bc-white c-black mb-10 p-20 rad-6" placeholder="ادخل نوع العنصر المفقود" required>
                
                <label for="item-description" class="c-purple txt-w mb-10">وصف العنصر المفقود:</label>
                <textarea id="item-description" name="item_description" class="bc-white c-black mb-10 p-20 rad-6" placeholder="ادخل وصفًا تفصيليًا للعنصر المفقود" required></textarea>
                
                <label for="item-location" class="c-purple txt-w mb-10">مكان العثور على العنصر:</label>
                <input type="text" id="item-location" name="item_location" class="bc-white c-black mb-10 p-20 rad-6" placeholder="ادخل مكان العثور على العنصر" required>
                
                <label for="item-date" class="c-purple txt-w mb-10">تاريخ العثور على العنصر:</label>
                <input type="date" id="item-date" name="item_date" class="bc-white c-black mb-10 p-20 rad-6" required>

                <label for="user-number" class="c-purple txt-w mb-10">رقم التواصل:</label>
                <input type="tel" id="user-number" name="user_number" class="bc-white c-black mb-10 p-20 rad-6" placeholder="مثل 05XXXXXXXX" required>
                
                
                <label for="item-image" class="c-purple txt-w mb-10">صورة العنصر :</label>
                <input type="file" id="item-image" name="item_image" class="bc-white c-black mb-20 p-20 rad-6" accept="image/*" required>
                
                <button type="submit" class="bc-purple c-white sid-icon p-20 rad-6">اضف العنصر  <i class="fa-solid fa-plus c-purple fs-40 txt-c mb-20 df"></i></button>
            </form>
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
