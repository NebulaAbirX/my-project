<?php 
   session_start();
   include("login/php/config.php");
   
   // Check if user is logged in
   if(!isset($_SESSION['valid'])){
     header("Location: login/index.php");
     exit;
   }
   
   // Check if user is a driver
   $id = $_SESSION['id'];
   $query = mysqli_query($con, "SELECT * FROM users WHERE Id=$id");
   
   if($result = mysqli_fetch_assoc($query)){
       $username = $result['Username'];
       $email = $result['Email'];
       $role = $result['Role'];
       
       // If not a driver, redirect to appropriate page
       if($role != "سائق"){
           header("Location: passenger.php"); // Create this file for passengers
           exit;
       }
   }
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>رايد - الملف الشخصي للسائق</title>
  <meta name="description" content="إدارة الملف الشخصي للسائق في تطبيق رايد لمشاركة الركوب">
  <meta name="keywords" content="مشاركة الركوب، سائق، ملف شخصي، تطبيق ويب تقدمي">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&family=Tajawal:wght@400;500;700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">
  <link href="assets/css/driver-dashboard.css" rel="stylesheet">

  <!-- PWA Meta Tags -->
  <meta name="theme-color" content="#3498db">
  <link rel="manifest" href="manifest.json">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">

  <style>
    .status-badge {
      padding: 0.35rem 0.6rem;
      border-radius: 2rem;
      font-size: 0.8rem;
      font-weight: 500;
    }
    .status-online {
      background-color: #28a745;
      color: white;
    }
    .status-offline {
      background-color: #6c757d;
      color: white;
    }
    .dashboard-card {
      background: #fff;
      border-radius: 8px;
      padding: 1.5rem;
      box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
      margin-bottom: 1.5rem;
    }
    .progress-sm {
      height: 8px;
    }
    .doc-item {
      border: 1px solid #e9ecef;
      border-radius: 8px;
      overflow: hidden;
      transition: all 0.3s ease;
    }
    .doc-item:hover {
      box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
    }
    .doc-overlay {
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background-color: rgba(0, 0, 0, 0.5);
      opacity: 0;
      display: flex;
      align-items: center;
      justify-content: center;
      transition: all 0.3s ease;
    }
    .doc-item:hover .doc-overlay {
      opacity: 1;
    }
    .doc-item img {
      width: 100%;
      height: 150px;
      object-fit: cover;
    }
    .rating-summary {
      position: relative;
      height: 5px;
      background-color: #e9ecef;
      border-radius: 5px;
      margin-bottom: 8px;
    }
    .rating-bar {
      position: absolute;
      height: 100%;
      background-color: #ffc107;
      border-radius: 5px;
    }
    .rating-count {
      font-size: 0.8rem;
      color: #6c757d;
    }
    .achievement-badge {
      display: inline-block;
      text-align: center;
      margin: 0.5rem;
    }
    .achievement-badge i {
      font-size: 2rem;
      padding: 1rem;
      border-radius: 50%;
      background-color: #f8f9fa;
      margin-bottom: 0.5rem;
      display: inline-block;
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
        <a href="index.html" class="logo d-flex align-items-center">
          <span class="fs-4 fw-bold text-primary">رايد</span>
          <span class="badge bg-primary ms-2 text-uppercase">السائق</span>
        </a>
      </div>
      
      <div class="d-flex align-items-center gap-3">
        <!-- إضافة زر الإشعارات -->
        <div class="dropdown">
          <button class="btn btn-link position-relative text-dark p-0" type="button" id="notificationsDropdown" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="bi bi-bell-fill fs-5"></i>
            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
              3
              <span class="visually-hidden">إشعارات غير مقروءة</span>
            </span>
          </button>
          <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="notificationsDropdown" style="width: 300px; max-height: 400px; overflow-y: auto;">
            <li><h6 class="dropdown-header">الإشعارات</h6></li>
            <li><hr class="dropdown-divider"></li>
            <li>
              <a class="dropdown-item d-flex align-items-center py-2" href="#">
                <div class="flex-shrink-0">
                  <i class="bi bi-car-front text-primary bg-light p-2 rounded-circle"></i>
                </div>
                <div class="flex-grow-1 ms-3">
                  <h6 class="mb-0 fw-bold">طلب رحلة جديد</h6>
                  <p class="mb-0 text-muted small">من العميل سارة العبدالله</p>
                  <small class="text-muted">منذ 5 دقائق</small>
                </div>
              </a>
            </li>
            <li><hr class="dropdown-divider"></li>
            <li>
              <a class="dropdown-item d-flex align-items-center py-2" href="#">
                <div class="flex-shrink-0">
                  <i class="bi bi-cash text-success bg-light p-2 rounded-circle"></i>
                </div>
                <div class="flex-grow-1 ms-3">
                  <h6 class="mb-0 fw-bold">تأكيد استلام دفعة نقدية</h6>
                  <p class="mb-0 text-muted small">تم تسجيل استلام 65 ر.س من العميل</p>
                  <small class="text-muted">منذ ساعتين</small>
                </div>
              </a>
            </li>
            <li><hr class="dropdown-divider"></li>
            <li>
              <a class="dropdown-item d-flex align-items-center py-2" href="#">
                <div class="flex-shrink-0">
                  <i class="bi bi-star-fill text-warning bg-light p-2 rounded-circle"></i>
                </div>
                <div class="flex-grow-1 ms-3">
                  <h6 class="mb-0 fw-bold">تقييم جديد (5 نجوم)</h6>
                  <p class="mb-0 text-muted small">قام العميل محمد بتقييمك بـ 5 نجوم</p>
                  <small class="text-muted">منذ 4 ساعات</small>
                </div>
              </a>
            </li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item text-center" href="#">عرض جميع الإشعارات</a></li>
          </ul>
        </div>
        <img src="assets/img/avatar-1.webp" alt="صورة السائق" class="rounded-circle" width="40" height="40">
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
            <img src="assets/img/avatar-1.webp" alt="صورة السائق" class="rounded-circle mb-2" width="80" height="80">
            <h6 class="mb-0">أحمد محمد</h6>
            <p class="text-muted small mb-2">ID: S-578942</p>
          </div>
          
          <ul class="nav nav-pills flex-column mb-auto sidebar-nav">
            <li class="nav-item">
              <a href="driver.html" class="nav-link">
                <i class="bi bi-speedometer2 me-2"></i>
                لوحة التحكم
              </a>
            </li>
            <li>
              <a href="trips.html" class="nav-link">
                <i class="bi bi-car-front me-2"></i>
                الرحلات
              </a>
            </li>
            <li>
              <a href="earnings.html" class="nav-link">
                <i class="bi bi-wallet me-2"></i>
                الأرباح
              </a>
            </li>
            <li>
              <a href="chat.html" class="nav-link">
                <i class="bi bi-chat-dots me-2"></i>
                الدردشات
              </a>
            </li>
            <li>
              <a href="profile.html" class="nav-link active">
                <i class="bi bi-person me-2"></i>
                الملف الشخصي
              </a>
            </li>
            <li>
              <a href="settings.html" class="nav-link">
                <i class="bi bi-gear me-2"></i>
                الإعدادات
              </a>
            </li>
            <li>
              <a href="support.html" class="nav-link">
                <i class="bi bi-question-circle me-2"></i>
                الدعم الفني
              </a>
            </li>
          </ul>
          <hr>
          <a href="login/php/logout.php" class="nav-link">
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
                <button class="btn btn-outline-primary btn-sm">
                  <i class="bi bi-pencil me-1"></i> تعديل الملف
                </button>
              </div>

              <!-- Replace the profile information section with this -->
<div class="col-md-4 mb-4 mb-md-0">
  <div class="text-center">
    <div class="position-relative mb-3 d-inline-block">
      <img src="assets/img/avatar-1.webp" alt="صورة السائق" class="rounded-circle mb-2" width="150" height="150">
      <button class="btn btn-sm btn-primary rounded-circle position-absolute bottom-0 start-0" style="width: 35px; height: 35px;">
        <i class="bi bi-camera"></i>
      </button>
    </div>
    <h4 class="mb-1"><?php echo $username; ?></h4>
    <p class="text-muted mb-2">ID: S-<?php echo $id; ?></p>
    <div class="d-flex justify-content-center align-items-center mb-3">
      <span class="me-1 text-warning"><i class="bi bi-star-fill"></i> 4.9</span>
      <span class="text-muted small">(254 تقييم)</span>
    </div>
    <div class="badge bg-success mb-3"><?php echo $role; ?></div>
    <!-- Rest of this section remains the same -->
  </div>
</div>

<!-- Update the contact information section -->
<div class="col-md-8">
  <div class="row g-3">
    <div class="col-md-6">
      <div class="mb-3">
        <label class="small text-muted mb-1">اسم المستخدم</label>
        <p class="mb-0"><?php echo $username; ?></p>
      </div>
    </div>
    <div class="col-md-6">
      <div class="mb-3">
        <label class="small text-muted mb-1">البريد الإلكتروني</label>
        <p class="mb-0"><?php echo $email; ?></p>
      </div>
    </div>
    <div class="col-md-6">
      <div class="mb-3">
        <label class="small text-muted mb-1">نوع المستخدم</label>
        <p class="mb-0"><?php echo $role; ?></p>
      </div>
    </div>
    <!-- Rest of contact information -->
  </div>
</div>  </section>

          <!-- Performance Section -->
          <section id="performance" class="mb-4">
            <div class="dashboard-card">
              <h5 class="mb-4"><i class="bi bi-graph-up me-2"></i> الأداء والإحصائيات</h5>
              
              <div class="row">
                <!-- Statistics Cards -->
                <div class="col-md-8 mb-4 mb-md-0">
                  <div class="row g-3 mb-4">
                    <div class="col-md-4">
                      <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body text-center">
                          <div class="text-primary mb-2">
                            <i class="bi bi-car-front fs-3"></i>
                          </div>
                          <h6 class="mb-0">354</h6>
                          <p class="text-muted small mb-0">إجمالي الرحلات</p>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body text-center">
                          <div class="text-success mb-2">
                            <i class="bi bi-people fs-3"></i>
                          </div>
                          <h6 class="mb-0">186</h6>
                          <p class="text-muted small mb-0">عملاء مخدومون</p>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body text-center">
                          <div class="text-info mb-2">
                            <i class="bi bi-geo-alt fs-3"></i>
                          </div>
                          <h6 class="mb-0">7,245 كم</h6>
                          <p class="text-muted small mb-0">إجمالي المسافة</p>
                        </div>
                      </div>
                    </div>
                  </div>
                  
                  <!-- Performance Metrics -->
                  <div class="card border-0 shadow-sm">
                    <div class="card-body">
                      <h6 class="mb-3">مؤشرات الأداء</h6>
                      <div class="mb-3">
                        <div class="d-flex justify-content-between mb-1">
                          <span class="small">معدل القبول</span>
                          <span class="small">92%</span>
                        </div>
                        <div class="progress progress-sm">
                          <div class="progress-bar bg-success" role="progressbar" style="width: 92%" aria-valuenow="92" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                      </div>
                      <div class="mb-3">
                        <div class="d-flex justify-content-between mb-1">
                          <span class="small">معدل إكمال الرحلات</span>
                          <span class="small">98%</span>
                        </div>
                        <div class="progress progress-sm">
                          <div class="progress-bar bg-success" role="progressbar" style="width: 98%" aria-valuenow="98" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                      </div>
                      <div class="mb-3">
                        <div class="d-flex justify-content-between mb-1">
                          <span class="small">معدل الدقة في الوصول</span>
                          <span class="small">89%</span>
                        </div>
                        <div class="progress progress-sm">
                          <div class="progress-bar bg-primary" role="progressbar" style="width: 89%" aria-valuenow="89" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                      </div>
                      <div>
                        <div class="d-flex justify-content-between mb-1">
                          <span class="small">رضا العملاء</span>
                          <span class="small">95%</span>
                        </div>
                        <div class="progress progress-sm">
                          <div class="progress-bar bg-success" role="progressbar" style="width: 95%" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                
                <!-- Rating Breakdown -->
                <div class="col-md-4">
                  <div class="card border-0 shadow-sm h-100">
                    <div class="card-body">
                      <h6 class="mb-3">تصنيف التقييمات</h6>
                      <div class="mb-2">
                        <div class="d-flex justify-content-between align-items-center mb-1">
                          <div class="d-flex align-items-center">
                            <span class="me-1">5</span>
                            <i class="bi bi-star-fill text-warning"></i>
                          </div>
                          <span class="rating-count">214</span>
                        </div>
                        <div class="rating-summary">
                          <div class="rating-bar" style="width: 84%"></div>
                        </div>
                      </div>
                      <div class="mb-2">
                        <div class="d-flex justify-content-between align-items-center mb-1">
                          <div class="d-flex align-items-center">
                            <span class="me-1">4</span>
                            <i class="bi bi-star-fill text-warning"></i>
                          </div>
                          <span class="rating-count">32</span>
                        </div>
                        <div class="rating-summary">
                          <div class="rating-bar" style="width: 13%"></div>
                        </div>
                      </div>
                      <div class="mb-2">
                        <div class="d-flex justify-content-between align-items-center mb-1">
                          <div class="d-flex align-items-center">
                            <span class="me-1">3</span>
                            <i class="bi bi-star-fill text-warning"></i>
                          </div>
                          <span class="rating-count">6</span>
                        </div>
                        <div class="rating-summary">
                          <div class="rating-bar" style="width: 2%"></div>
                        </div>
                      </div>
                      <div class="mb-2">
                        <div class="d-flex justify-content-between align-items-center mb-1">
                          <div class="d-flex align-items-center">
                            <span class="me-1">2</span>
                            <i class="bi bi-star-fill text-warning"></i>
                          </div>
                          <span class="rating-count">2</span>
                        </div>
                        <div class="rating-summary">
                          <div class="rating-bar" style="width: 1%"></div>
                        </div>
                      </div>
                      <div class="mb-3">
                        <div class="d-flex justify-content-between align-items-center mb-1">
                          <div class="d-flex align-items-center">
                            <span class="me-1">1</span>
                            <i class="bi bi-star-fill text-warning"></i>
                          </div>
                          <span class="rating-count">0</span>
                        </div>
                        <div class="rating-summary">
                          <div class="rating-bar" style="width: 0%"></div>
                        </div>
                      </div>
                      <div class="text-center mt-4">
                        <h5>4.9 <small class="text-muted">/ 5</small></h5>
                        <p class="small text-muted mb-0">بناءً على 254 تقييم</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>

          <!-- Vehicle Information -->
          <section id="vehicle-info" class="mb-4">
            <div class="dashboard-card">
              <div class="d-flex justify-content-between align-items-center mb-4">
                <h5><i class="bi bi-car-front-fill me-2"></i> معلومات المركبة</h5>
                <button class="btn btn-outline-primary btn-sm">
                  <i class="bi bi-pencil me-1"></i> تعديل
                </button>
              </div>

              <div class="row">
                <div class="col-md-4 mb-4 mb-md-0">
                  <div class="position-relative mb-3">
                    <img src="assets/img/car-example.jpg" alt="صورة السيارة" class="img-fluid rounded" style="width: 100%; height: 200px; object-fit: cover;">
                    <button class="btn btn-sm btn-primary position-absolute bottom-0 end-0 m-2">
                      <i class="bi bi-camera"></i> تغيير الصورة
                    </button>
                  </div>
                </div>
                <div class="col-md-8">
                  <div class="row">
                    <div class="col-md-6 mb-3">
                      <label class="small text-muted mb-1">نوع المركبة</label>
                      <p class="mb-0">تويوتا كامري</p>
                    </div>
                    <div class="col-md-6 mb-3">
                      <label class="small text-muted mb-1">موديل</label>
                      <p class="mb-0">2021</p>
                    </div>
                    <div class="col-md-6 mb-3">
                      <label class="small text-muted mb-1">لون المركبة</label>
                      <p class="mb-0">أبيض</p>
                    </div>
                    <div class="col-md-6 mb-3">
                      <label class="small text-muted mb-1">رقم اللوحة</label>
                      <p class="mb-0">ح ر د 5432</p>
                    </div>
                    <div class="col-md-6 mb-3">
                      <label class="small text-muted mb-1">تاريخ انتهاء الفحص الفني</label>
                      <p class="mb-0">15 نوفمبر 2025</p>
                    </div>
                    <div class="col-md-6 mb-3">
                      <label class="small text-muted mb-1">تاريخ انتهاء التأمين</label>
                      <p class="mb-0">20 ديسمبر 2025</p>
                    </div>
                    <div class="col-md-6 mb-3">
                      <label class="small text-muted mb-1">عدد المقاعد</label>
                      <p class="mb-0">4</p>
                    </div>
                    <div class="col-md-6 mb-3">
                      <label class="small text-muted mb-1">فئة المركبة</label>
                      <p class="mb-0">مميز</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>

          <!-- Documents Section -->
          <section id="documents" class="mb-4">
            <div class="dashboard-card">
              <div class="d-flex justify-content-between align-items-center mb-4">
                <h5><i class="bi bi-file-earmark-text me-2"></i> الوثائق الرسمية</h5>
                <button class="btn btn-outline-primary btn-sm">
                  <i class="bi bi-cloud-arrow-up me-1"></i> تحميل وثيقة
                </button>
              </div>

              <div class="row">
                <div class="col-6 col-md-3 mb-4">
                  <div class="position-relative doc-item">
                    <img src="assets/img/id-card-placeholder.jpg" alt="الهوية الوطنية">
                    <div class="doc-overlay">
                      <button class="btn btn-sm btn-primary">عرض</button>
                    </div>
                    <div class="p-2 bg-light">
                      <h6 class="mb-0 small fw-bold">الهوية الوطنية</h6>
                      <p class="small text-muted mb-0">تم التحقق <i class="bi bi-check-circle-fill text-success ms-1"></i></p>
                    </div>
                  </div>
                </div>
                <div class="col-6 col-md-3 mb-4">
                  <div class="position-relative doc-item">
                    <img src="assets/img/license-placeholder.jpg" alt="رخصة القيادة">
                    <div class="doc-overlay">
                      <button class="btn btn-sm btn-primary">عرض</button>
                    </div>
                    <div class="p-2 bg-light">
                      <h6 class="mb-0 small fw-bold">رخصة القيادة</h6>
                      <p class="small text-muted mb-0">تم التحقق <i class="bi bi-check-circle-fill text-success ms-1"></i></p>
                    </div>
                  </div>
                </div>
                <div class="col-6 col-md-3 mb-4">
                  <div class="position-relative doc-item">
                    <img src="assets/img/insurance-placeholder.jpg" alt="وثيقة التأمين">
                    <div class="doc-overlay">
                      <button class="btn btn-sm btn-primary">عرض</button>
                    </div>
                    <div class="p-2 bg-light">
                      <h6 class="mb-0 small fw-bold">وثيقة التأمين</h6>
                      <p class="small text-muted mb-0">تم التحقق <i class="bi bi-check-circle-fill text-success ms-1"></i></p>
                    </div>
                  </div>
                </div>
                <div class="col-6 col-md-3 mb-4">
                  <div class="position-relative doc-item">
                    <img src="assets/img/vehicle-reg-placeholder.jpg" alt="استمارة المركبة">
                    <div class="doc-overlay">
                      <button class="btn btn-sm btn-primary">عرض</button>
                    </div>
                    <div class="p-2 bg-light">
                      <h6 class="mb-0 small fw-bold">استمارة المركبة</h6>
                      <p class="small text-muted mb-0">تم التحقق <i class="bi bi-check-circle-fill text-success ms-1"></i></p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>

          <!-- Achievements Section -->
          <section id="achievements" class="mb-4">
            <div class="dashboard-card">
              <h5 class="mb-4"><i class="bi bi-trophy me-2"></i> الإنجازات والشارات</h5>

              <div class="text-center">
                <div class="achievement-badge">
                  <i class="bi bi-award text-primary"></i>
                  <p class="small mb-0">سائق ممتاز</p>
                </div>
                <div class="achievement-badge">
                  <i class="bi bi-hand-thumbs-up text-success"></i>
                  <p class="small mb-0">أعلى تقييم</p>
                </div>
                <div class="achievement-badge">
                  <i class="bi bi-gem text-warning"></i>
                  <p class="small mb-0">100+ رحلة</p>
                </div>
                <div class="achievement-badge">
                  <i class="bi bi-lightning-charge text-danger"></i>
                  <p class="small mb-0">سرعة استجابة</p>
                </div>
                <div class="achievement-badge">
                  <i class="bi bi-check2-circle text-success"></i>
                  <p class="small mb-0">عام من الخدمة</p>
                </div>
                <div class="achievement-badge">
                  <i class="bi bi-stars text-info"></i>
                  <p class="small mb-0">مفضل العملاء</p>
                </div>
              </div>

              <hr class="my-4">

              <h6 class="mb-3">آخر التعليقات من العملاء</h6>
              <div class="card mb-3">
                <div class="card-body">
                  <div class="d-flex mb-3">
                    <img src="assets/img/avatar-3.webp" alt="صورة العميل" class="rounded-circle me-2" width="40" height="40">
                    <div>
                      <h6 class="mb-0">سارة العبدالله</h6>
                      <div class="d-flex align-items-center">
                        <span class="me-2 text-warning">
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                        </span>
                        <small class="text-muted">قبل 3 أيام</small>
                      </div>
                    </div>
                  </div>
                  <p class="mb-0">سائق ممتاز ومهذب جدا. السيارة نظيفة والرحلة كانت مريحة. سأختاره مجددا بالتأكيد.</p>
                </div>
              </div>
              
              <div class="card mb-3">
                <div class="card-body">
                  <div class="d-flex mb-3">
                    <img src="assets/img/avatar-5.webp" alt="صورة العميل" class="rounded-circle me-2" width="40" height="40">
                    <div>
                      <h6 class="mb-0">خالد القحطاني</h6>
                      <div class="d-flex align-items-center">
                        <span class="me-2 text-warning">
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                        </span>
                        <small class="text-muted">قبل أسبوع</small>
                      </div>
                    </div>
                  </div>
                  <p class="mb-0">وصل في الوقت المحدد بالضبط وكانت القيادة آمنة وممتازة. كما أن المسار الذي اختاره كان الأسرع للوصول. أنصح بشدة بالتعامل معه.</p>
                </div>
              </div>
              
              <div class="text-center mt-3">
                <button class="btn btn-outline-primary btn-sm">عرض جميع التعليقات (42)</button>
              </div>
            </div>
          </section>
        </div>
      </div>
    </div>
  </div>

  <footer class="footer py-4 mt-5 bg-light">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <p class="mb-0">&copy; 2025 رايد. جميع الحقوق محفوظة</p>
        </div>
        <div class="col-md-6">
          <div class="text-md-end">
            <a href="#" class="text-muted me-3">شروط الاستخدام</a>
            <a href="#" class="text-muted me-3">سياسة الخصوصية</a>
            <a href="#" class="text-muted">اتصل بنا</a>
          </div>
        </div>
      </div>
    </div>
  </footer>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>

  <!-- Main JS File -->
  <script src="assets/js/main.js"></script>

  <!-- PWA Service Worker Registration -->
  <script>
    if ('serviceWorker' in navigator) {
      window.addEventListener('load', () => {
        navigator.serviceWorker.register('/serviceWorker.js')
          .then(reg => console.log('Service Worker registered'))
          .catch(err => console.log('Service Worker not registered', err));
      });
    }
  </script>
</body>
</html>
(254 تقييم)