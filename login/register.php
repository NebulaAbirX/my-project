tutorial\register.php
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>التسجيل</title>
</head>
<body>
      <div class="container">
        <div class="box form-box">

        <?php 
         
         include("php/config.php");
         if(isset($_POST['submit'])){
            $username = $_POST['username'];
            $email = $_POST['email'];
            $role = $_POST['role']; // تغيير من age إلى role
            $password = $_POST['password'];

         //verifying the unique email

         $verify_query = mysqli_query($con,"SELECT Email FROM users WHERE Email='$email'");

         if(mysqli_num_rows($verify_query) !=0 ){
            echo "<div class='message'>
                      <p>هذا البريد الإلكتروني مستخدم، الرجاء استخدام بريد آخر!</p>
                  </div> <br>";
            echo "<a href='javascript:self.history.back()'><button class='btn'>رجوع</button>";
         }
         else{

            mysqli_query($con,"INSERT INTO users(Username,Email,Role,Password) VALUES('$username','$email','$role','$password')" );

            echo "<div class='message'>
                      <p>تم التسجيل بنجاح!</p>
                  </div> <br>";
            echo "<a href='index.php'><button class='btn'>تسجيل الدخول الآن</button>";
         

         }

         }else{
         
        ?>

            <header>إنشاء حساب</header>
            <form action="" method="post">
                <div class="field input">
                    <label for="username">اسم المستخدم</label>
                    <input type="text" name="username" id="username" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="email">البريد الإلكتروني</label>
                    <input type="text" name="email" id="email" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="role">نوع المستخدم</label>
                    <select name="role" id="role" required>
                        <option value="" disabled selected>اختر نوع المستخدم</option>
                        <option value="سائق" >سائق</option>
                        <option value="راكب">راكب</option>
                    </select>
                </div>
                <div class="field input">
                    <label for="password">كلمة المرور</label>
                    <input type="password" name="password" id="password" autocomplete="off" required>
                </div>

                <div class="field">
                    
                    <input type="submit" class="btn" name="submit" value="تسجيل" required>
                </div>
                <div class="links">
                    لديك حساب بالفعل؟ <a href="index.php">تسجيل الدخول</a>
                </div>
            </form>
        </div>
        <?php } ?>
      </div>
</body>
</html>