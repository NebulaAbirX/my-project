<?php
   session_start();
   include("../login/php/config.php");
   
   // Check if user is logged in
   if(!isset($_SESSION['valid'])){
     header("Location: ../login/index.php");
     exit;
   }
   
   // Get user data
   $id = $_SESSION['id'];
   $query = mysqli_query($con,"SELECT * FROM users WHERE Id=$id");
   
   if($result = mysqli_fetch_assoc($query)){
     $username = $result['Username'];
     $email = $result['Email'];
     $role = $result['Role'];
   }
?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>رايد - لوحة تحكم السائق</title>
  <meta name="description" content="لوحة تحكم السائق في تطبيق رايد لمشاركة الركوب">
  <meta name="keywords" content="مشاركة الركوب، سائق، تطبيق ويب تقدمي، دخل إضافي">

  <!-- CSS Path Corrections -->
<!-- Favicons -->
<link href="../assets/img/favicon.png" rel="icon">
<link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

<!-- Vendor CSS Files -->
<link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
<link href="../assets/vendor/aos/aos.css" rel="stylesheet">
<link href="../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

<!-- Main CSS File -->
<link href="../assets/css/main.css" rel="stylesheet">
<link href="../assets/css/driver-dashboard.css" rel="stylesheet">

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
    .status-toggle {
      position: relative;
      display: inline-block;
      width: 50px;
      height: 24px;
    }
    .status-toggle input {
      opacity: 0;
      width: 0;
      height: 0;
    }
    .slider {
      position: absolute;
      cursor: pointer;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background-color: #ccc;
      transition: .4s;
      border-radius: 24px;
    }
    .slider:before {
      position: absolute;
      content: "";
      height: 18px;
      width: 18px;
      left: 3px;
      bottom: 3px;
      background-color: white;
      transition: .4s;
      border-radius: 50%;
    }
    input:checked + .slider {
      background-color: #28a745;
    }
    input:focus + .slider {
      box-shadow: 0 0 1px #28a745;
    }
    input:checked + .slider:before {
      transform: translateX(26px);
    }
    .dashboard-card {
      background: #fff;
      border-radius: 8px;
      padding: 1.5rem;
      box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
      margin-bottom: 1.5rem;
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
        <a href="driver.php" class="logo d-flex align-items-center">
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
        <img src="../assets/img/avatar-1.webp" alt="صورة السائق" class="rounded-circle" width="40" height="40">      </div>
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
            <img src="../assets/img/avatar-1.webp" alt="صورة السائق" class="rounded-circle mb-2" width="80" height="80">
            <h6 class="mb-0">أحمد محمد</h6>
            <p class="text-muted small mb-2">ID: S-578942</p>
          </div>
          
          <ul class="nav nav-pills flex-column mb-auto sidebar-nav">
            <li class="nav-item">
              <a href="driver.php" class="nav-link active">
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
              <a href="earnings.php" class="nav-link">
                <i class="bi bi-wallet me-2"></i>
                الأرباح
              </a>
            </li>
            <li>
            <a href="../ChatApp - CodingNepal/ChatApp - CodingNepal/users.php" class="nav-link">
  <i class="bi bi-chat-dots me-2"></i> الدردشة
</a>
            </li>
            <li>
              <a href="../profile.php" class="nav-link">
                <i class="bi bi-person me-2"></i>
                الملف الشخصي
              </a>
            </li>
           
            <li>
              <a href="../settings.php" class="nav-link">
                <i class="bi bi-gear me-2"></i>
                الإعدادات
              </a>
            </li>
            <li>
              <a href="support.php" class="nav-link">
                <i class="bi bi-question-circle me-2"></i>
                الدعم الفني
              </a>
            </li>
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
          <!-- Profile Section -->
          <section id="profile" class="mb-5">
            <div class="dashboard-card">
              <div class="d-flex justify-content-between align-items-center mb-4">
                <h5><i class="bi bi-person-circle me-2"></i> الملف الشخصي</h5>
                <button class="btn btn-sm btn-outline-primary">تعديل الملف</button>
              </div>
              <div class="row">
                <!-- Profile Section - Replace static data -->
<div class="col-lg-4 mb-4 mb-lg-0">
  <div class="card border-0 shadow-sm">
    <div class="card-body text-center">
      <img src="../assets/img/avatar-1.webp" alt="صورة السائق" class="rounded-circle mb-3" width="120" height="120">
      <h5 class="mb-0"><?php echo $username; ?></h5>
      <p class="text-muted">سائق منذ 2023</p>
      <div class="d-flex justify-content-center align-items-center mb-3">
        <span class="me-1 text-warning"><i class="bi bi-star-fill"></i> 4.9</span>
        <span class="text-muted small">(254 تقييم)</span>
      </div>
      <div class="mt-3">
        <span class="status-text me-2">حالتك:</span>
        <span id="statusBadge" class="status-badge status-offline">غير متصل</span>
      </div>
    </div>
  </div>
</div>
                </div>
                <div class="col-lg-8">
                  <div class="card border-0 shadow-sm h-100">
                    <div class="card-body">
                      <div class="row">
                      <div class="col-md-6 mb-3">
  <label class="form-label text-muted small">الاسم الكامل</label>
  <p class="mb-0 fw-medium"><?php echo $username; ?></p>
</div>    
                        <div class="col-md-6 mb-3">
                          <label class="form-label text-muted small">رقم الهاتف</label>
                          <p class="mb-0 fw-medium">05xxxxxxxx</p>
                        </div>
                        <div class="col-md-6 mb-3">
  <label class="form-label text-muted small">البريد الإلكتروني</label>
  <p class="mb-0 fw-medium"><?php echo $email; ?></p>
</div>
<div class="col-md-6 mb-3">
  <label class="form-label text-muted small">نوع المستخدم</label>
  <p class="mb-0 fw-medium"><?php echo $role; ?></p>
</div>
                        <div class="col-md-6 mb-3">
                          <label class="form-label text-muted small">تاريخ الانضمام</label>
                          <p class="mb-0 fw-medium">15 يناير 2023</p>
                        </div>
                        <div class="col-md-6 mb-3">
                          <label class="form-label text-muted small">المدينة</label>
                          <p class="mb-0 fw-medium">الرياض</p>
                        </div>
                        <div class="col-md-6 mb-3">
                          <label class="form-label text-muted small">رقم السيارة</label>
                          <p class="mb-0 fw-medium">ح د ك 5428</p>
                        </div>
                        <div class="col-md-6 mb-3">
                          <label class="form-label text-muted small">نوع السيارة</label>
                          <p class="mb-0 fw-medium">تويوتا كامري 2022</p>
                        </div>
                        <div class="col-md-6 mb-3">
                          <label class="form-label text-muted small">لون السيارة</label>
                          <p class="mb-0 fw-medium">أبيض</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-12 mt-4">
                  <h6 class="mb-3">الوثائق المرفقة</h6>
                  <div class="row">
                    <div class="col-6 col-md-3 mb-3">
                      <div class="card">
                        <div class="card-body p-2 text-center">
                          <i class="bi bi-file-earmark-text text-primary fs-3"></i>
                          <p class="small mb-0 mt-2">رخصة القيادة</p>
                          <a href="#" class="btn btn-sm btn-link text-muted">عرض</a>
                        </div>
                      </div>
                    </div>
                    <div class="col-6 col-md-3 mb-3">
                      <div class="card">
                        <div class="card-body p-2 text-center">
                          <i class="bi bi-file-earmark-text text-primary fs-3"></i>
                          <p class="small mb-0 mt-2">استمارة السيارة</p>
                          <a href="#" class="btn btn-sm btn-link text-muted">عرض</a>
                        </div>
                      </div>
                    </div>
                    <div class="col-6 col-md-3 mb-3">
                      <div class="card">
                        <div class="card-body p-2 text-center">
                          <i class="bi bi-file-earmark-text text-primary fs-3"></i>
                          <p class="small mb-0 mt-2">تأمين السيارة</p>
                          <a href="#" class="btn btn-sm btn-link text-muted">عرض</a>
                        </div>
                      </div>
                    </div>
                    <div class="col-6 col-md-3 mb-3">
                      <div class="card">
                        <div class="card-body p-2 text-center">
                          <i class="bi bi-file-earmark-text text-primary fs-3"></i>
                          <p class="small mb-0 mt-2">الهوية الوطنية</p>
                          <a href="#" class="btn btn-sm btn-link text-muted">عرض</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>

          <!-- Messages Section -->
          <section id="messages" class="mb-5">
            <div class="dashboard-card">
              <div class="d-flex justify-content-between align-items-center mb-4">
                <h5><i class="bi bi-chat-dots me-2"></i> الدردشات</h5>
                <div>
                  <button class="btn btn-sm btn-outline-primary me-2">
                    <i class="bi bi-search me-1"></i> البحث
                  </button>
                  <div class="dropdown d-inline-block">
                    <button class="btn btn-sm btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                      <i class="bi bi-plus-circle me-1"></i> دردشة جديدة
                    </button>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="#"><i class="bi bi-people me-2"></i> مع راكب</a></li>
                      <li><a class="dropdown-item" href="#"><i class="bi bi-headset me-2"></i> مع الدعم الفني</a></li>
                    </ul>
                  </div>
                </div>
              </div>
              
              <div class="row">
                <!-- قائمة المحادثات -->
                <div class="col-md-4 mb-4 mb-md-0">
                  <div class="card border-0 shadow-sm" style="height: 500px;">
                    <div class="card-header bg-white border-bottom-0 py-3">
                      <div class="input-group">
                        <input type="text" class="form-control" placeholder="البحث في الدردشات...">
                        <button class="btn btn-outline-secondary" type="button"><i class="bi bi-search"></i></button>
                      </div>
                    </div>
                    <div class="card-body p-0" style="overflow-y: auto;">
                      <div class="list-group list-group-flush">
                        <!-- دردشة نشطة -->
                        <a href="#chat1" class="list-group-item list-group-item-action active py-3 px-3" aria-current="true">
                          <div class="d-flex align-items-center">
                            <div class="position-relative me-3">
                              <img src="../assets/img/avatar-3.webp" alt="صورة العميل" class="rounded-circle" width="50" height="50">
                              <span class="position-absolute bottom-0 start-0 badge rounded-circle bg-success p-1 border border-white" style="width: 12px; height: 12px;"></span>
                            </div>
                            <div class="flex-grow-1 overflow-hidden">
                              <div class="d-flex justify-content-between align-items-center">
                                <h6 class="mb-0 text-truncate">سارة العبدالله</h6>
                                <small class="text-muted">الآن</small>
                              </div>
                              <p class="text-truncate mb-0">شكراً جزيلاً لك، سأكون في انتظارك</p>
                            </div>
                          </div>
                        </a>
                        
                        <!-- المزيد من الدردشات -->
                        <a href="#chat2" class="list-group-item list-group-item-action py-3 px-3">
                          <div class="d-flex align-items-center">
                            <div class="position-relative me-3">
                              <img src="../assets/img/avatar-4.webp" alt="صورة العميل" class="rounded-circle" width="50" height="50">
                              <span class="position-absolute bottom-0 start-0 badge rounded-circle bg-secondary p-1 border border-white" style="width: 12px; height: 12px;"></span>
                            </div>
                            <div class="flex-grow-1 overflow-hidden">
                              <div class="d-flex justify-content-between align-items-center">
                                <h6 class="mb-0 text-truncate">نورة السعيد</h6>
                                <small class="text-muted">11:20 ص</small>
                              </div>
                              <p class="text-truncate mb-0">وصلت بسلامة، شكراً جزيلاً لك</p>
                            </div>
                          </div>
                        </a>
                        
                        <a href="#chat3" class="list-group-item list-group-item-action py-3 px-3">
                          <div class="d-flex align-items-center">
                            <div class="position-relative me-3">
                              <div class="bg-primary rounded-circle d-flex align-items-center justify-content-center text-white" style="width: 50px; height: 50px;">
                                <i class="bi bi-headset fs-4"></i>
                              </div>
                              <span class="position-absolute bottom-0 start-0 badge rounded-circle bg-danger p-1 border border-white" style="width: 12px; height: 12px;"></span>
                            </div>
                            <div class="flex-grow-1 overflow-hidden">
                              <div class="d-flex justify-content-between align-items-center">
                                <h6 class="mb-0 text-truncate">الدعم الفني</h6>
                                <small class="text-muted">أمس</small>
                              </div>
                              <p class="text-truncate mb-0 fw-bold">مرحباً أحمد، هل يمكنني مساعدتك بخصوص...</p>
                            </div>
                          </div>
                        </a>
                        
                        <a href="#chat4" class="list-group-item list-group-item-action py-3 px-3">
                          <div class="d-flex align-items-center">
                            <div class="position-relative me-3">
                              <img src="../assets/img/avatar-2.webp" alt="صورة العميل" class="rounded-circle" width="50" height="50">
                              <span class="position-absolute bottom-0 start-0 badge rounded-circle bg-secondary p-1 border border-white" style="width: 12px; height: 12px;"></span>
                            </div>
                            <div class="flex-grow-1 overflow-hidden">
                              <div class="d-flex justify-content-between align-items-center">
                                <h6 class="mb-0 text-truncate">محمد العتيبي</h6>
                                <small class="text-muted">الأمس</small>
                              </div>
                              <p class="text-truncate mb-0">حسناً، سأنتظرك عند بوابة الجامعة</p>
                            </div>
                          </div>
                        </a>
                        
                        <a href="#chat5" class="list-group-item list-group-item-action py-3 px-3">
                          <div class="d-flex align-items-center">
                            <div class="position-relative me-3">
                              <img src="../assets/img/avatar-5.webp" alt="صورة العميل" class="rounded-circle" width="50" height="50">
                              <span class="position-absolute bottom-0 start-0 badge rounded-circle bg-secondary p-1 border border-white" style="width: 12px; height: 12px;"></span>
                            </div>
                            <div class="flex-grow-1 overflow-hidden">
                              <div class="d-flex justify-content-between align-items-center">
                                <h6 class="mb-0 text-truncate">خالد القحطاني</h6>
                                <small class="text-muted">الثلاثاء</small>
                              </div>
                              <p class="text-truncate mb-0">شكراً على الرحلة الرائعة</p>
                            </div>
                          </div>
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
                
                <!-- محتوى المحادثة -->
                <div class="col-md-8">
                  <div class="card border-0 shadow-sm" style="height: 500px;">
                    <div class="card-header bg-white py-3">
                      <div class="d-flex justify-content-between align-items-center">
                        <div class="d-flex align-items-center">
                          <img src="../assets/img/avatar-3.webp" alt="صورة العميل" class="rounded-circle me-3" width="40" height="40">
                          <div>
                            <h6 class="mb-0">سارة العبدالله</h6>
                            <small class="text-success">متصل الآن</small>
                          </div>
                        </div>
                        <div>
                          <button class="btn btn-sm btn-light me-1" title="معلومات الرحلة">
                            <i class="bi bi-info-circle"></i>
                          </button>
                          <button class="btn btn-sm btn-light me-1" title="الاتصال">
                            <i class="bi bi-telephone"></i>
                          </button>
                          <div class="dropdown d-inline-block">
                            <button class="btn btn-sm btn-light dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                              <i class="bi bi-three-dots-vertical"></i>
                            </button>
                            <ul class="dropdown-menu">
                              <li><a class="dropdown-item" href="#"><i class="bi bi-archive me-2"></i> أرشفة المحادثة</a></li>
                              <li><a class="dropdown-item" href="#"><i class="bi bi-bell-slash me-2"></i> كتم الإشعارات</a></li>
                              <li><hr class="dropdown-divider"></li>
                              <li><a class="dropdown-item text-danger" href="#"><i class="bi bi-exclamation-triangle me-2"></i> الإبلاغ عن مشكلة</a></li>
                            </ul>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="card-body p-3" style="overflow-y: auto; height: 360px;">
                      <!-- تاريخ -->
                      <div class="text-center mb-3">
                        <span class="badge bg-light text-dark">اليوم، 3:10 م</span>
                      </div>
                      
                      <!-- رسالة من الطرف الآخر -->
                      <div class="d-flex mb-3">
                        <img src="../assets/img/avatar-3.webp" alt="صورة العميل" class="rounded-circle align-self-start me-2" width="30" height="30">
                        <div class="bg-light rounded p-3" style="max-width: 75%;">
                          <p class="mb-0">مرحباً، أنا بانتظارك أمام المجمع التجاري. هل أنت قريب؟</p>
                          <small class="text-muted">3:10 م</small>
                        </div>
                      </div>
                      
                      <!-- رسالة من السائق -->
                      <div class="d-flex justify-content-end mb-3">
                        <div class="bg-primary text-white rounded p-3" style="max-width: 75%;">
                          <p class="mb-0">مرحباً سارة، نعم أنا قريب، سأصل خلال 5 دقائق تقريباً</p>
                          <small class="text-white-50">3:12 م</small>
                        </div>
                      </div>
                      
                      <!-- رسالة من الطرف الآخر -->
                      <div class="d-flex mb-3">
                        <img src="../assets/img/avatar-3.webp" alt="صورة العميل" class="rounded-circle align-self-start me-2" width="30" height="30">
                        <div class="bg-light rounded p-3" style="max-width: 75%;">
                          <p class="mb-0">تمام، أنا أرتدي معطف أزرق وأقف بجانب مدخل المطعم الإيطالي</p>
                          <small class="text-muted">3:15 م</small>
                        </div>
                      </div>
                      
                      <!-- رسالة من السائق -->
                      <div class="d-flex justify-content-end mb-3">
                        <div class="bg-primary text-white rounded p-3" style="max-width: 75%;">
                          <p class="mb-0">حسناً، وصلت للتو. سيارتي تويوتا كامري بيضاء، رقم اللوحة ح د ك 5428</p>
                          <small class="text-white-50">3:18 م</small>
                        </div>
                      </div>
                      
                      <!-- رسالة من الطرف الآخر -->
                      <div class="d-flex mb-3">
                        <img src="../assets/img/avatar-3.webp" alt="صورة العميل" class="rounded-circle align-self-start me-2" width="30" height="30">
                        <div class="bg-light rounded p-3" style="max-width: 75%;">
                          <p class="mb-0">رأيتك، أنا قادمة إليك</p>
                          <small class="text-muted">3:19 م</small>
                        </div>
                      </div>
                      
                      <!-- رسالة من الطرف الآخر -->
                      <div class="d-flex mb-3">
                        <img src="../assets/img/avatar-3.webp" alt="صورة العميل" class="rounded-circle align-self-start me-2" width="30" height="30">
                        <div class="bg-light rounded p-3" style="max-width: 75%;">
                          <p class="mb-0">شكراً جزيلاً لك، سأكون في انتظارك</p>
                          <small class="text-muted">3:30 م</small>
                        </div>
                      </div>
                    </div>
                    <div class="card-footer bg-white py-3">
                      <div class="input-group">
                        <button class="btn btn-outline-secondary" type="button"><i class="bi bi-emoji-smile"></i></button>
                        <button class="btn btn-outline-secondary" type="button"><i class="bi bi-paperclip"></i></button>
                        <input type="text" class="form-control" placeholder="اكتب رسالتك هنا...">
                        <button class="btn btn-primary" type="button"><i class="bi bi-send"></i></button>
                      </div>
                      <div class="mt-2 text-muted small">
                        <i class="bi bi-info-circle me-1"></i>
                        يرجى الالتزام بسياسة الاستخدام الآمن للدردشات. لا تشارك معلومات شخصية أو حساسة.
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>
          
          <!-- Settings Section -->
          <section id="settings" class="mb-5">
            <div class="dashboard-card">
              <div class="d-flex justify-content-between align-items-center mb-4">
                <h5><i class="bi bi-gear me-2"></i> الإعدادات</h5>
                <button class="btn btn-sm btn-outline-primary">حفظ التغييرات</button>
              </div>
              
              <!-- إعدادات الحالة -->
              <div class="card mb-4">
                <div class="card-body">
                  <h6 class="card-title mb-3">حالة التوفر</h6>
                  <div class="d-flex align-items-center">
                    <span class="status-text me-3">حالتك:</span>
                    <span id="statusBadge" class="status-badge status-offline">غير متصل</span>
                    <label class="status-toggle ms-3">
                      <input type="checkbox" id="statusToggle">
                      <span class="slider"></span>
                    </label>
                    <span class="ms-3 text-muted small">قم بتفعيل هذا الخيار عندما تكون متاحاً لاستقبال طلبات الرحلات</span>
                  </div>
                </div>
              </div>
              
              <!-- إعدادات المدفوعات (تم تحديثها لتوضيح أن الدفع نقدي فقط) -->
              <div class="card mb-4">
                <div class="card-body">
                  <h6 class="card-title mb-3">إعدادات المدفوعات</h6>
                  <div class="alert alert-info">
                    <i class="bi bi-info-circle-fill me-2"></i>
                    <strong>تنبيه:</strong> حالياً، يتم قبول الدفع النقدي فقط من العملاء مباشرةً. لا يدعم التطبيق الدفع عبر الإنترنت.
                  </div>
                  
                  <div class="form-check form-switch mb-3">
                    <input class="form-check-input" type="checkbox" id="cashNotify" checked>
                    <label class="form-check-label" for="cashNotify">تلقي إشعارات تأكيد المدفوعات النقدية</label>
                  </div>
                  
                  <div class="mb-3">
                    <label for="preferredMoneyOption" class="form-label">الخيار المفضل للتعامل النقدي</label>
                    <select class="form-select" id="preferredMoneyOption">
                      <option value="exact" selected>المبلغ المضبوط فقط</option>
                      <option value="change">أقبل تقديم الباقي للعميل</option>
                    </select>
                  </div>
                  
                  <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" id="requestReceipt" checked>
                    <label class="form-check-label" for="requestReceipt">إصدار إيصال للعميل عند طلبه</label>
                  </div>
                </div>
              </div>
              
              <!-- إعدادات التقييم (قسم جديد) -->
              <div class="card mb-4">
                <div class="card-body">
                  <h6 class="card-title mb-3">إعدادات التقييم</h6>
                  <div class="alert alert-warning">
                    <i class="bi bi-star-fill me-2"></i>
                    <strong>هام:</strong> التقييمات تؤثر مباشرة على ترتيبك في قائمة السائقين وظهور الطلبات لك.
                  </div>
                  
                  <div class="form-check form-switch mb-3">
                    <input class="form-check-input" type="checkbox" id="autoRateReminder" checked>
                    <label class="form-check-label" for="autoRateReminder">تذكير العميل بتقييمك بعد الرحلة</label>
                  </div>
                  
                  <div class="form-check form-switch mb-3">
                    <input class="form-check-input" type="checkbox" id="ratingNotification" checked>
                    <label class="form-check-label" for="ratingNotification">إشعارات التقييمات الجديدة</label>
                  </div>
                  
                  <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" id="showRatingHistory">
                    <label class="form-check-label" for="showRatingHistory">عرض سجل تقييماتي للركاب الجدد</label>
                  </div>
                </div>
              </div>
              
              <!-- إعدادات عامة -->
              <div class="card">
                <div class="card-body">
                  <h6 class="card-title mb-3">إعدادات عامة</h6>
                  <div class="mb-3">
                    <label for="languageSelect" class="form-label">اللغة</label>
                    <select class="form-select" id="languageSelect">
                      <option value="ar" selected>العربية</option>
                      <option value="en">English</option>
                    </select>
                  </div>
                  <div class="form-check form-switch mb-3">
                    <input class="form-check-input" type="checkbox" id="darkMode">
                    <label class="form-check-label" for="darkMode">الوضع الداكن</label>
                  </div>
                  <div class="form-check form-switch mb-3">
                    <input class="form-check-input" type="checkbox" id="notifications" checked>
                    <label class="form-check-label" for="notifications">الإشعارات</label>
                  </div>
                </div>
              </div>
            </div>
          </section>

          <!-- Support Section -->
          <section id="support" class="mb-5">
            <div class="dashboard-card">
              <div class="d-flex justify-content-between align-items-center mb-4">
                <h5><i class="bi bi-question-circle me-2"></i> الدعم الفني</h5>
              </div>

              <div class="row mb-4">
                <div class="col-md-6 mb-3 mb-md-0">
                  <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body p-4 text-center">
                      <i class="bi bi-headset text-primary fs-1 mb-3"></i>
                      <h5 class="mb-3">اتصل بنا مباشرة</h5>
                      <p class="text-muted mb-4">فريقنا متاح على مدار الساعة لمساعدتك في أي مشكلة قد تواجهها</p>
                      <button class="btn btn-primary">
                        <i class="bi bi-chat-dots me-2"></i> بدء محادثة مع الدعم
                      </button>
                    </div>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body p-4 text-center">
                      <i class="bi bi-file-earmark-text text-success fs-1 mb-3"></i>
                      <h5 class="mb-3">قاعدة المعرفة</h5>
                      <p class="text-muted mb-4">تعرف على إجابات الأسئلة الشائعة والحلول للمشاكل المعروفة</p>
                      <button class="btn btn-success">
                        <i class="bi bi-book me-2"></i> استكشاف قاعدة المعرفة
                      </button>
                    </div>
                  </div>
                </div>
              </div>

              <div class="mt-4">
                <h6 class="mb-3">الأسئلة الشائعة</h6>
                <div class="accordion" id="faqAccordion">
                  <div class="accordion-item">
                    <h2 class="accordion-header" id="faqHeading1">
                      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapse1" aria-expanded="false" aria-controls="faqCollapse1">
                        كيف يتم احتساب أرباحي من الرحلات؟
                      </button>
                    </h2>
                    <div id="faqCollapse1" class="accordion-collapse collapse" aria-labelledby="faqHeading1" data-bs-parent="#faqAccordion">
                      <div class="accordion-body">
                        يتم احتساب أرباحك على أساس المسافة المقطوعة، مدة الرحلة، ووقت الذروة. تستلم 80% من قيمة الرحلة الإجمالية، بينما يأخذ التطبيق 20% كرسوم خدمة. يمكنك مراجعة التفاصيل الكاملة في قسم الأرباح والمدفوعات.
                      </div>
                    </div>
                  </div>
                  <div class="accordion-item">
                    <h2 class="accordion-header" id="faqHeading2">
                      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapse2" aria-expanded="false" aria-controls="faqCollapse2">
                        ماذا أفعل إذا رفض العميل الدفع النقدي؟
                      </button>
                    </h2>
                    <div id="faqCollapse2" class="accordion-collapse collapse" aria-labelledby="faqHeading2" data-bs-parent="#faqAccordion">
                      <div class="accordion-body">
                        في حالة رفض العميل الدفع، يرجى التواصل مع الدعم الفني فوراً. سنتواصل مع العميل لحل المشكلة. احتفظ بجميع التفاصيل مثل رقم الرحلة، وقتها، واسم العميل. في الحالات القصوى، قد نضطر لاتخاذ إجراءات ضد العميل بما في ذلك الحظر من التطبيق.
                      </div>
                    </div>
                  </div>
                  <div class="accordion-item">
                    <h2 class="accordion-header" id="faqHeading3">
                      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapse3" aria-expanded="false" aria-controls="faqCollapse3">
                        كيف يمكنني تحسين تقييمي؟
                      </button>
                    </h2>
                    <div id="faqCollapse3" class="accordion-collapse collapse" aria-labelledby="faqHeading3" data-bs-parent="#faqAccordion">
                      <div class="accordion-body">
                        لتحسين تقييمك، التزم بالمعايير التالية: الحفاظ على نظافة السيارة، الالتزام بالمواعيد، اتباع مسارات الرحلة المقترحة، التعامل بلطف واحترافية مع العملاء، تشغيل تكييف الهواء حسب الطلب، والحفاظ على هدوء الرحلة. يمكنك أيضاً تذكير العملاء بتقييمك بعد الرحلة بشكل لطيف.
                      </div>
                    </div>
                  </div>
                </div>
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
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/php-email-form/validate.js"></script>
  <script src="../assets/vendor/aos/aos.js"></script>
  <script src="../assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="../assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="../assets/vendor/purecounter/purecounter_vanilla.js"></script>

  <!-- Main JS File -->
  <script src="../assets/js/main.js"></script>

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

  <!-- Status Toggle Script -->
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const statusToggle = document.getElementById('statusToggle');
      const statusBadge = document.getElementById('statusBadge');
      
      statusToggle.addEventListener('change', function() {
        if (this.checked) {
          statusBadge.textContent = 'متصل';
          statusBadge.classList.remove('status-offline');
          statusBadge.classList.add('status-online');
        } else {
          statusBadge.textContent = 'غير متصل';
          statusBadge.classList.remove('status-online');
          statusBadge.classList.add('status-offline');
        }
      });

      // سكريبت لمعالجة الرسائل
      const chatInput = document.querySelector('.card-footer .form-control');
      const sendButton = document.querySelector('.card-footer .btn-primary');
      const chatBody = document.querySelector('.card-body[style*="overflow-y: auto; height: 360px;"]');
      
      function sendMessage() {
        const message = chatInput.value.trim();
        if (message) {
          const time = new Date().toLocaleTimeString('ar-SA', {hour: '2-digit', minute:'2-digit'});
          
          const messageHTML = `
            <div class="d-flex justify-content-end mb-3">
              <div class="bg-primary text-white rounded p-3" style="max-width: 75%;">
                <p class="mb-0">${message}</p>
                <small class="text-white-50">${time}</small>
              </div>
            </div>
          `;
          
          if (chatBody) {
            chatBody.insertAdjacentHTML('beforeend', messageHTML);
            chatInput.value = '';
            
            // التمرير إلى أسفل لرؤية آخر رسالة
            chatBody.scrollTop = chatBody.scrollHeight;
          }
        }
      }
      
      if (sendButton && chatInput) {
        sendButton.addEventListener('click', sendMessage);
        
        chatInput.addEventListener('keypress', function(e) {
          if (e.key === 'Enter') {
            e.preventDefault();
            sendMessage();
          }
        });
        
        // التأكد من أن منطقة الدردشة تظهر آخر الرسائل عند التحميل
        if (chatBody) {
          chatBody.scrollTop = chatBody.scrollHeight;
        }
      }
    });
  
</body>
</html> 
chat