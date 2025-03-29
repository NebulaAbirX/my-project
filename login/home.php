<?php 
   session_start();

   include("php/config.php");
   if(!isset($_SESSION['valid'])){
    header("Location: index.php");
   }
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>الصفحة الرئيسية</title>
</head>
<body>
    <div class="nav">
        <div class="logo">
            <p><a href="home.php">الشعار</a> </p>
        </div>

        <div class="right-links">

            <?php 
            
            $id = $_SESSION['id'];
            $query = mysqli_query($con,"SELECT*FROM users WHERE Id=$id");

            while($result = mysqli_fetch_assoc($query)){
                $res_Uname = $result['Username'];
                $res_Email = $result['Email'];
                $res_Role = $result['Role']; // تغيير من Age إلى Role
                $res_id = $result['Id'];
            }
            
            echo "<a href='edit.php?Id=$res_id'>تعديل الملف الشخصي</a>";
            ?>

            <a href="php/logout.php"> <button class="btn">تسجيل الخروج</button> </a>

        </div>
    </div>
    <main>

       <div class="main-box top">
          <div class="top">
            <div class="box">
                <p>مرحباً <b><?php echo $res_Uname ?></b>، أهلاً بك</p>
            </div>
            <div class="box">
                <p>بريدك الإلكتروني هو <b><?php echo $res_Email ?></b>.</p>
            </div>
          </div>
          <div class="bottom">
            <div class="box">
                <p>ونوع حسابك هو <b><?php echo $res_Role ?></b>.</p> 
                <!-- تغيير النص من "عمرك" إلى "نوع حسابك" -->
            </div>
          </div>
       </div>

    </main>
</body>
</html>
