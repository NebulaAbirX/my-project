\tutorial\edit.php
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
    <title>تعديل الملف الشخصي</title>
</head>
<body>
    <div class="nav">
        <div class="logo">
            <p><a href="home.php">الشعار</a></p>
        </div>

        <div class="right-links">
            <a href="#">تعديل الملف الشخصي</a>
            <a href="php/logout.php"> <button class="btn">تسجيل الخروج</button> </a>
        </div>
    </div>
    <div class="container">
        <div class="box form-box">
            <?php 
               if(isset($_POST['submit'])){
                $username = $_POST['username'];
                $email = $_POST['email'];
                $role = $_POST['role']; // تغيير من age إلى role

                $id = $_SESSION['id'];

                $edit_query = mysqli_query($con,"UPDATE users SET Username='$username', Email='$email', Role='$role' WHERE Id=$id ") or die("حدث خطأ");

                if($edit_query){
                    echo "<div class='message'>
                    <p>تم تحديث الملف الشخصي!</p>
                </div> <br>";
              echo "<a href='home.php'><button class='btn'>العودة للرئيسية</button>";
       
                }
               }else{

                $id = $_SESSION['id'];
                $query = mysqli_query($con,"SELECT*FROM users WHERE Id=$id ");

                while($result = mysqli_fetch_assoc($query)){
                    $res_Uname = $result['Username'];
                    $res_Email = $result['Email'];
                    $res_Role = $result['Role']; // تغيير من Age إلى Role
                }

            ?>
            <header>تعديل الملف الشخصي</header>
            <form action="" method="post">
                <div class="field input">
                    <label for="username">اسم المستخدم</label>
                    <input type="text" name="username" id="username" value="<?php echo $res_Uname; ?>" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="email">البريد الإلكتروني</label>
                    <input type="text" name="email" id="email" value="<?php echo $res_Email; ?>" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="role">نوع المستخدم</label>
                    <select name="role" id="role" required>
                        <option value="سائق" <?php if($res_Role == "سائق") echo "selected"; ?>>سائق</option>
                        <option value="راكب" <?php if($res_Role == "راكب") echo "selected"; ?>>راكب</option>
                    </select>
                </div>
                
                <div class="field">
                    
                    <input type="submit" class="btn" name="submit" value="تحديث" required>
                </div>
                
            </form>
        </div>
        <?php } ?>
      </div>
</body>
</html>
