<?php session_start();?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8"/>.
<meta name="description" contant="اذا فقدت شيء يمكنك البحث عنه هنا">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="author" content="Shatha Ghanem">

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
<title>جد العنصر</title>
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

<?php
$conn=pg_connect("host=localhost dbname=lost_found_db user=postgres password=14112006");
$loc=pg_query($conn, "SELECT DISTINCT location FROM items ORDER BY location");
$ty=pg_query($conn, "SELECT DISTINCT type FROM items ORDER BY type");

?>

<main>

<h2 class="txt-c m-20 c-black">قائمة المفقودات</h2>

<section class=" pt-20 pb-20">
    <div class="search-bar p-20 rad-6 shadow-dark-gray bc-light-gray df gap-20">
  

             <form method="GET" class="df mb-20" id="filter">
        <select id="location" name="location" class="bc-white c-black p-10 rad-6 mb-20" >
             <option disabled selected>تصفية حسب المكان</option>
            <?php while(($row=pg_fetch_assoc($loc))):?>
                    
            <option class="bc-white c-black p-10 rad-6 mb-20 " name="location" value="<?php echo htmlspecialchars($row['location']); ?>">
                <?php echo htmlspecialchars($row['location']); ?>
            </option>
            <?php endwhile; ?>
        
        </select>
        <select id="type" name="type" class="bc-white c-black p-10 rad-6 mb-20">
              <option disabled selected>تصفية حسب نوع العنصر</option>
            <?php while($row=pg_fetch_assoc($ty)):?>
                
              <option class="bc-white c-black p-10 rad-6 mb-20" name="type" value="<?php echo htmlspecialchars($row['type']); ?>">
                <?php echo htmlspecialchars($row['type']); ?>
            </option>
            <?php endwhile; ?>
             
        </select>
          <button type="submit" class="bc-purple c-white sid-icon p-10 rad-6 mb-20">تصفية</button>
       
            <button type="reset" onclick="window.location='?'" class="bc-dark-gray c-white sid-icon p-10 rad-6 mb-20">إعادة تعيين </button>         
          
        </form>
        </div>

</section>



<section class=" pb-20 add w-100per">
    <?php $conn=pg_connect("host=localhost dbname=lost_found_db user=postgres password=14112006");
    $email=isset($_SESSION['email']) ? $_SESSION['email'] : '';
    $location=isset($_GET['location']) ? $_GET['location'] : '';
    $type=isset($_GET['type']) ? $_GET['type'] : '';
    $sql="SELECT * FROM items WHERE 1=1";
    if (!empty($location)) {
        $sql .= " AND location = '" . pg_escape_string($location) . "'";
    }
    if (!empty($type)) {
        $sql .= " AND type = '" . pg_escape_string($type) . "'";
    }
    $sql .= " ORDER BY date DESC";
    $result=pg_query($conn, $sql);
    ?>
        <div class="item-list between-flex p-20 fjustify-center add m-20 card bn w-100per f-r">
           <?php while($row=pg_fetch_assoc($result)):
            ?>  
             <div class="item-card bc-light-gray rad-6 shadow-dark-gray p-10 card mt-5 w-40per m-20">
                <img class="w-280 h-200 br-6 mb-10 display-item-img" src="images/<?php echo htmlspecialchars($row['image']); ?>" alt="صورة العنصر المفقود">
                <h3 class="c-g txt-c mb-10 "><?php echo htmlspecialchars($row['name']); ?></h3>
                <p class="c-black mb-10"><strong>الوصف:</strong> <?php echo htmlspecialchars($row['description']); ?></p>
                <p class="c-black mb-10"><strong>مكان العثور:</strong> <?php echo htmlspecialchars($row['location']); ?></p>
                <p class="c-black mb-10"><strong>تاريخ العثور:</strong><?php echo htmlspecialchars($row['date']); ?></p>
                <p class="c-black mb-10"> <strong>رقم التواصل:</strong> <?php echo htmlspecialchars($row['number']); ?></p>
                
                <?php if (isset($_SESSION['email']) && $_SESSION['email'] == $email): ?>
                <form action="phpfiles/deleteitem.php" method="post" class="p-10 m-20 n-shadow">
                <input type="hidden" name="item_id" value="<?php echo htmlspecialchars($row['id']); ?>">
                <button class="bc-purple c-white sid-icon p-10 rad-6 mb-10">حذف العنصر</button>
                </form>
                
                <?php endif; ?>
                
            </div>             
            <?php endwhile; ?> 
        </div>
        
</section>
</main>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
