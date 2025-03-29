<?php
session_start();
require_once "../login/php/config.php";

// Debug connection
if (!$con) {
    die("Database connection error: " . mysqli_connect_error());
}

// التحقق من تسجيل الدخول
if (!isset($_SESSION['id'])) {
    header("Location: ../login/index.php");
    exit();
}

// التحقق من أن المستخدم سائق
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'driver') {
    header("Location: ../index.php");
    exit();
}

$user_id = $_SESSION['id'];

// استعلام لجلب بيانات المستخدم الأساسية
$user_query = "SELECT * FROM users WHERE Id = '$user_id'";
$user_result = mysqli_query($con, $user_query) or die("Error in users query: " . mysqli_error($con));

if (!$user_result || mysqli_num_rows($user_result) == 0) {
    header("Location: ../login/index.php");
    exit();
}

$user_data = mysqli_fetch_assoc($user_result);

// استعلام لجلب بيانات ملف السائق
$driver_query = "SELECT * FROM driver_profiles WHERE user_id = '$user_id'";
$driver_result = mysqli_query($con, $driver_query) or die("Error in driver profiles query: " . mysqli_error($con));

if ($driver_result && mysqli_num_rows($driver_result) > 0) {
    $driver_profile = mysqli_fetch_assoc($driver_result);
} else {
    // إنشاء ملف سائق جديد إذا لم يكن موجوداً
    $create_profile = "INSERT INTO driver_profiles 
                      (user_id, rating, total_ratings, active_status, join_date) 
                      VALUES ('$user_id', 0, 0, 'available', NOW())";
                      
    $insert_result = mysqli_query($con, $create_profile);
    
    if (!$insert_result) {
        die("Error creating driver profile: " . mysqli_error($con));
    }
    
    $driver_query = "SELECT * FROM driver_profiles WHERE user_id = '$user_id'";
    $driver_result = mysqli_query($con, $driver_query) or die("Error fetching new profile: " . mysqli_error($con));
    $driver_profile = mysqli_fetch_assoc($driver_result);
}

// The rest of your code remains the same

// استعلام لجلب بيانات المركبة
$vehicle_query = "SELECT * FROM vehicles WHERE driver_id = '$user_id'";
$vehicle_result = mysqli_query($con, $vehicle_query);

if ($vehicle_result && mysqli_num_rows($vehicle_result) > 0) {
    $vehicle_data = mysqli_fetch_assoc($vehicle_result);
} else {
    $vehicle_data = [
        'vehicle_type' => 'لم يتم تحديد بعد',
        'model' => 'لم يتم تحديد بعد',
        'color' => 'لم يتم تحديد بعد',
        'plate_number' => 'لم يتم تحديد بعد',
        'passenger_capacity' => 4,
        'vehicle_image' => 'default-vehicle.jpg'
    ];
}

// استعلام لجلب المستندات
$docs_query = "SELECT * FROM documents WHERE driver_id = '$user_id'";
$docs_result = mysqli_query($con, $docs_query);
$documents = [];

if ($docs_result && mysqli_num_rows($docs_result) > 0) {
    while ($doc = mysqli_fetch_assoc($docs_result)) {
        $documents[$doc['document_type']] = $doc;
    }
}

// الحصول على عدد الإشعارات غير المقروءة
$notifications_query = "SELECT COUNT(*) as unread_count FROM notifications WHERE user_id = '$user_id' AND is_read = 0";
$notifications_result = mysqli_query($con, $notifications_query);
$unread_count = 0;

if ($notifications_result) {
    $unread_count = mysqli_fetch_assoc($notifications_result)['unread_count'];
}

// تعيين متغيرات افتراضية للحقول الغير موجودة في جدول المستخدمين
$profile_img = 'default-avatar.png'; // صورة افتراضية
$user_name = $user_data['Username']; // استخدام حقل Username بدلاً من name
?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>رايد - الملف الشخصي للسائق</title>
  <meta content="الملف الشخصي للسائق في تطبيق رايد" name="description">
  <meta content="سائق, ملف شخصي, رايد, توصيل" name="keywords">

  <!-- Favicons -->
  <link href="../assets/img/favicon.png" rel="icon">
  <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;500;600;700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS Files -->
  <link href="../assets/css/main.css" rel="stylesheet">
  <link href="../assets/css/driver-dashboard.css" rel="stylesheet">
  <link href="../assets/css/responsive.css" rel="stylesheet">
  
  <style>
    .doc-icon, .location-icon {
        width: 40px;
        height: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
    }
    .vehicle-image-container {
        height: 200px;
        overflow: hidden;
    }
    .vehicle-image-container img {
        height: 100%;
        object-fit: cover;
    }
  </style>
</head>

<body class="driver-dashboard rtl">
  <!-- Header -->
  <header id="header" class="header shadow-sm fixed-top bg-white">
    <div class="container-fluid d-flex justify-content-between align-items-center">
      <div class="d-flex align-items-center">
        <button class="btn btn-sm d-lg-none me-2" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebar">
          <i class="bi bi-list fs-4"></i>
        </button>
        <a href="../index.php" class="logo d-flex align-items-center">
          <span class="fs-4 fw-bold text-primary">رايد</span>
          <span class="badge bg-primary ms-2 text-uppercase">السائق</span>
        </a>
      </div>
      
      <div class="d-flex align-items-center gap-3">
        <!-- Notifications -->
        <div class="dropdown">
          <a class="btn btn-sm btn-light position-relative" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="bi bi-bell fs-5"></i>
            <?php if ($unread_count > 0): ?>
            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
              <?php echo $unread_count; ?>
            </span>
            <?php endif; ?>
          </a>
          <div class="dropdown-menu dropdown-menu-end p-0">
            <div class="notification-header d-flex justify-content-between align-items-center p-3 border-bottom">
              <h6 class="m-0">الإشعارات (<?php echo $unread_count; ?>)</h6>
              <a href="../shared/notifications.php" class="text-decoration-none small">عرض الكل</a>
            </div>
            <div class="notification-body">
              <?php
              // عرض آخر 3 إشعارات
              $recent_query = "SELECT * FROM notifications WHERE user_id = '$user_id' ORDER BY created_at DESC LIMIT 3";
              $recent_result = mysqli_query($con, $recent_query);
              
              if ($recent_result && mysqli_num_rows($recent_result) > 0) {
                  while ($notification = mysqli_fetch_assoc($recent_result)) {
                      echo '<a href="#" class="dropdown-item p-3 border-bottom">';
                      echo '<div class="d-flex">';
                      echo '<div class="flex-shrink-0">';
                      echo '<i class="bi bi-' . $notification['icon'] . ' text-' . $notification['icon_bg'] . ' fs-4"></i>';
                      echo '</div>';
                      echo '<div class="flex-grow-1 ms-3">';
                      echo '<p class="mb-0 fw-medium">' . $notification['title'] . '</p>';
                      // تنسيق التاريخ
                      $date = new DateTime($notification['created_at']);
                      $now = new DateTime();
                      $diff = $now->diff($date);
                      
                      if ($diff->d == 0) {
                          if ($diff->h == 0) {
                              $time_ago = "منذ " . $diff->i . " دقيقة";
                          } else {
                              $time_ago = "منذ " . $diff->h . " ساعة";
                          }
                      } else if ($diff->d == 1) {
                          $time_ago = "أمس";
                      } else {
                          $time_ago = "منذ " . $diff->d . " يوم";
                      }
                      
                      echo '<p class="small text-muted mb-0">' . $time_ago . '</p>';
                      echo '</div>';
                      echo '</div>';
                      echo '</a>';
                  }
              } else {
                  echo '<div class="p-3 text-center">لا توجد إشعارات جديدة</div>';
              }
              ?>
            </div>
            <div class="notification-footer p-2 text-center border-top">
              <a href="../shared/notifications.php" class="text-decoration-none small">عرض كل الإشعارات</a>
            </div>
          </div>
        </div>
        <!-- Profile pic -->
        <img src="../assets/img/<?php echo $profile_img; ?>" alt="صورة السائق" class="rounded-circle" width="40" height="40">
      </div>
    </div>
  </header>
  
  <div class="container-fluid">
    <div class="row">
      <!-- Sidebar -->
      <div class="col-lg-3 col-xl-2 offcanvas-lg offcanvas-start" tabindex="-1" id="sidebar">
        <div class="offcanvas-header d-lg-none">
          <h5 class="offcanvas-title">القائمة</h5>
          <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#sidebar" aria-label="Close"></button>
        </div>
        <div class="d-flex flex-column flex-shrink-0 p-3 h-100">
          <div class="text-center mb-4 d-lg-none">
            <img src="../assets/img/<?php echo $profile_img; ?>" alt="صورة السائق" class="rounded-circle mb-2" width="80" height="80">
            <h6 class="mb-0"><?php echo $user_name; ?></h6>
            <p class="text-muted small mb-2">ID: S-<?php echo $user_id; ?></p>
            <div class="d-flex justify-content-center align-items-center">
              <span class="me-1 text-warning"><i class="bi bi-star-fill"></i> <?php echo number_format($driver_profile['rating'], 1); ?></span>
              <span class="text-muted small">(<?php echo $driver_profile['total_ratings']; ?> تقييم)</span>
            </div>
          </div>
          <ul class="nav nav-pills flex-column mb-auto sidebar-nav">
            <!-- Navigation items remain the same -->
            <li class="nav-item">
              <a href="../driver/dashboard.php" class="nav-link">
                <i class="bi bi-speedometer2 me-2"></i>
                لوحة التحكم
              </a>
            </li>
            <li>
              <a href="../driver/trips.php" class="nav-link">
                <i class="bi bi-car-front me-2"></i>
                الرحلات
              </a>
            </li>
            <!-- Other nav items remain the same -->
          </ul>
          <hr>
          <a href="../login/php/logout.php" class="nav-link">
            <i class="bi bi-box-arrow-right me-2"></i>
            تسجيل الخروج
          </a>
        </div>
      </div>
      
      <!-- Main Content -->
      <div class="col-lg-9 col-xl-10 py-5 ms-auto" style="margin-top: 60px;">
        <div class="container-fluid">
          
          <!-- Profile Information -->
          <section id="profile-info" class="mb-4">
            <div class="dashboard-card">
              <div class="d-flex justify-content-between align-items-center mb-4">
                <h5 class="mb-0"><i class="bi bi-person-circle me-2"></i> الملف الشخصي</h5>
                <a href="edit-driver-profile.php" class="btn btn-outline-primary btn-sm">
                  <i class="bi bi-pencil me-1"></i> تعديل الملف
                </a>
              </div>

              <div class="row">
                <!-- Profile Picture and Basic Info -->
                <div class="col-md-4 mb-4 mb-md-0">
                  <div class="text-center">
                    <div class="position-relative mb-3 d-inline-block">
                      <img src="../assets/img/<?php echo $profile_img; ?>" alt="صورة السائق" class="rounded-circle mb-2" width="150" height="150">
                      <a href="edit-driver-profile.php?section=photo" class="btn btn-sm btn-primary rounded-circle position-absolute bottom-0 start-0" style="width: 35px; height: 35px;">
                        <i class="bi bi-camera"></i>
                      </a>
                    </div>
                    <h4 class="mb-1"><?php echo $user_name; ?></h4>
                    <p class="text-muted mb-2">
                      سائق منذ 
                      <?php 
                      if (!empty($driver_profile['join_date'])) {
                          $join_date = new DateTime($driver_profile['join_date']);
                          echo $join_date->format('F Y');
                      } else {
                          echo "غير محدد";
                      }
                      ?>
                    </p>
                    <div class="d-flex justify-content-center align-items-center mb-3">
                      <span class="me-1 text-warning"><i class="bi bi-star-fill"></i> <?php echo number_format($driver_profile['rating'], 1); ?></span>
                      <span class="text-muted small">(<?php echo $driver_profile['total_ratings']; ?> تقييم)</span>
                    </div>
                    <div class="badge bg-primary mb-3">سائق محترف</div>
                    <div>
                      <button class="btn btn-sm btn-outline-primary me-2">
                        <i class="bi bi-share me-1"></i> مشاركة الملف
                      </button>
                      <button class="btn btn-sm btn-outline-secondary">
                        <i class="bi bi-cloud-arrow-down me-1"></i> QR Code
                      </button>
                    </div>
                  </div>
                </div>

                <!-- Contact and Personal Information -->
                <div class="col-md-8">
                  <div class="row g-3">
                    <div class="col-md-6">
                      <div class="mb-3">
                        <label class="small text-muted mb-1">اسم المستخدم</label>
                        <p class="mb-0"><?php echo $user_data['Username']; ?></p>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="mb-3">
                        <label class="small text-muted mb-1">البريد الإلكتروني</label>
                        <p class="mb-0"><?php echo $user_data['Email']; ?></p>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="mb-3">
                        <label class="small text-muted mb-1">رقم الهاتف</label>
                        <p class="mb-0">غير محدد</p>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="mb-3">
                        <label class="small text-muted mb-1">تاريخ الميلاد</label>
                        <p class="mb-0">
                        <?php 
                        if (!empty($driver_profile['birth_date'])) {
                            $birth_date = new DateTime($driver_profile['birth_date']);
                            echo $birth_date->format('d/m/Y');
                        } else {
                            echo 'غير محدد';
                        }
                        ?>
                        </p>
                      </div>
                    </div>
                    <!-- Rest of profile information remains the same -->
                  </div>
                </div>
              </div>
            </div>
          </section>

          <!-- Rest of the document content remains the same -->
          
        </div>
      </div>
    </div>
  </div>

  <!-- Footer and JavaScript includes remain the same -->

</body>
</html>