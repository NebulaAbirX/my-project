<?php 
   session_start();
   include("php/config.php");
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>تسجيل الدخول</title>
</head>
<body>
    <div class="container">
        <div class="box form-box">
            <?php 
                if(isset($_POST['submit'])){
                    $email_or_username = mysqli_real_escape_string($con, $_POST['email']);
                    $password = mysqli_real_escape_string($con, $_POST['password']);
                    
                    if(!$con) {
                        echo "<div class='message'><p>خطأ في الاتصال بقاعدة البيانات: " . mysqli_connect_error() . "</p></div>";
                        exit;
                    }
                    
                    // Check either email OR username - MODIFIED QUERY
                    $check_query = "SELECT * FROM users WHERE Email='$email_or_username' OR Username='$email_or_username'";
                    $check_result = mysqli_query($con, $check_query);
                    
                    if(!$check_result) {
                        echo "<div class='message'><p>خطأ في الاستعلام: " . mysqli_error($con) . "</p></div>";
                        exit;
                    }
                    
                    if(mysqli_num_rows($check_result) > 0) {
                        // User exists, now check password
                        $row = mysqli_fetch_assoc($check_result);
                        
                        // Check if password matches
                        if($row['Password'] == $password) {
                            // Login successful
                            $_SESSION['valid'] = $row['Email'];
                            $_SESSION['username'] = $row['Username'];
                            $_SESSION['role'] = $row['Role'];
                            $_SESSION['id'] = $row['Id'];
                            
                            // Redirect based on role
                            if($row['Role'] == "سائق"){
                                header("Location: ../driver/driver.php");
                            } else {
                                header("Location: ../passenger/passenger-dashbord.html");
                            }
                            exit;
                        } else {
                            echo "<div class='message'>
                                    <p>كلمة المرور غير صحيحة</p>
                                  </div> <br>";
                            echo "<a href='index.php'><button class='btn'>العودة</button></a>";
                        }
                    } else {
                        echo "<div class='message'>
                                <p>البريد الإلكتروني أو اسم المستخدم غير موجود</p>
                              </div> <br>";
                        // For debugging only - remove in production
                        echo "<small style='color:#888'>تم البحث عن: " . $email_or_username . "</small><br>";
                        echo "<a href='index.php'><button class='btn'>العودة</button></a>";
                    }
                } else {
            ?>
            <header>تسجيل الدخول</header>
            <form action="" method="post">
                <div class="field input">
                    <label for="email">البريد الإلكتروني أو اسم المستخدم</label>
                    <input type="text" name="email" id="email" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="password">كلمة المرور</label>
                    <input type="password" name="password" id="password" autocomplete="off" required>
                </div>

                <div class="field">
                    <input type="submit" class="btn" name="submit" value="تسجيل الدخول" required>
                </div>
                <div class="links">
                    ليس لديك حساب؟ <a href="register.php">سجل الآن</a>
                </div>
            </form>
            <?php } ?>
        </div>
    </div>
</body>
</html>
home.php