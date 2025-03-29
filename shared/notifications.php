<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>رايد - الإشعارات</title>
  <meta content="الإشعارات والتنبيهات في تطبيق رايد" name="description">
  <meta content="إشعارات, تنبيهات, رايد, توصيل" name="keywords">

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
</head>

<body class="driver-dashboard rtl">
  <!-- Header -->
  <header id="header" class="header shadow-sm fixed-top bg-white">
    <div class="container-fluid d-flex justify-content-between align-items-center">
      <div class="d-flex align-items-center">
        <button class="btn btn-sm d-lg-none me-2" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebar">
          <i class="bi bi-list fs-4"></i>
        </button>
        <a href="../index.html" class="logo d-flex align-items-center">
          <span class="fs-4 fw-bold text-primary">رايد</span>
          <span class="badge bg-primary ms-2 text-uppercase">السائق</span>
        </a>
      </div>
      
      <div class="d-flex align-items-center gap-3">
        <!-- Notifications -->
        <div class="dropdown">
          <a class="btn btn-sm btn-primary position-relative" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="bi bi-bell fs-5"></i>
            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
              5
            </span>
          </a>
          <div class="dropdown-menu dropdown-menu-end p-0">
            <div class="notification-header d-flex justify-content-between align-items-center p-3 border-bottom">
              <h6 class="m-0">الإشعارات (5)</h6>
              <a href="notifications.html" class="text-decoration-none small">عرض الكل</a>
            </div>
            <div class="notification-body">
              <a href="#" class="dropdown-item p-3 border-bottom">
                <div class="d-flex">
                  <div class="flex-shrink-0">
                    <i class="bi bi-cash-coin text-success fs-4"></i>
                  </div>
                  <div class="flex-grow-1 ms-3">
                    <p class="mb-0 fw-medium">تم إيداع مبلغ 60 ريال في حسابك</p>
                    <p class="small text-muted mb-0">منذ 15 دقيقة</p>
                  </div>
                </div>
              </a>
              <a href="#" class="dropdown-item p-3 border-bottom">
                <div class="d-flex">
                  <div class="flex-shrink-0">
                    <i class="bi bi-car-front text-primary fs-4"></i>
                  </div>
                  <div class="flex-grow-1 ms-3">
                    <p class="mb-0 fw-medium">لديك طلب رحلة جديد بانتظار قبولك</p>
                    <p class="small text-muted mb-0">منذ 5 دقائق</p>
                  </div>
                </div>
              </a>
            </div>
            <div class="notification-footer p-2 text-center border-top">
              <a href="notifications.html" class="text-decoration-none small">عرض كل الإشعارات</a>
            </div>
          </div>
        </div>
        <!-- Profile pic -->
        <img src="../assets/img/avatar-1.webp" alt="صورة المستخدم" class="rounded-circle" width="40" height="40">
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
            <img src="../assets/img/avatar-1.webp" alt="صورة المستخدم" class="rounded-circle mb-2" width="80" height="80">
            <h6 class="mb-0">أحمد محمد</h6>
            <p class="text-muted small mb-2">ID: S-12345</p>
            <div class="d-flex justify-content-center align-items-center">
              <span class="me-1 text-warning"><i class="bi bi-star-fill"></i> 4.9</span>
              <span class="text-muted small">(254 تقييم)</span>
            </div>
          </div>
          <ul class="nav nav-pills flex-column mb-auto sidebar-nav">
            <li class="nav-item">
              <a href="../driver/driver.php" class="nav-link">
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
            <li>
              <a href="../driver/earnings.php" class="nav-link">
                <i class="bi bi-wallet me-2"></i>
                الأرباح
              </a>
            </li>
            <li>
              <a href="../chat.html" class="nav-link">
                <i class="bi bi-chat-dots me-2"></i>
                الدردشات
              </a>
            </li>
            <li>
              <a href="../profile/driver-profile.html" class="nav-link">
                <i class="bi bi-person me-2"></i>
                الملف الشخصي
              </a>
            </li>
            <li>
              <a href="../driver/documents.php" class="nav-link">
                <i class="bi bi-file-earmark-text me-2"></i>
                المستندات
              </a>
            </li>
            <li>
              <a href="notifications.html" class="nav-link active">
                <i class="bi bi-bell me-2"></i>
                الإشعارات
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
          
          <!-- Notifications Header -->
          <section id="notifications-header" class="mb-4">
            <div class="dashboard-card">
              <div class="d-flex justify-content-between align-items-center mb-4">
                <h5 class="mb-0"><i class="bi bi-bell me-2"></i> الإشعارات</h5>
                <div>
                  <button class="btn btn-outline-primary btn-sm me-2">
                    <i class="bi bi-check-all me-1"></i> تعيين الكل كمقروء
                  </button>
                  <div class="dropdown d-inline-block">
                    <button class="btn btn-outline-secondary btn-sm dropdown-toggle" type="button" id="filterDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                      <i class="bi bi-filter me-1"></i> تصفية
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="filterDropdown">
                      <li><a class="dropdown-item active" href="#">الكل</a></li>
                      <li><a class="dropdown-item" href="#">الرحلات</a></li>
                      <li><a class="dropdown-item" href="#">المدفوعات</a></li>
                      <li><a class="dropdown-item" href="#">التقييمات</a></li>
                      <li><a class="dropdown-item" href="#">الأنظمة</a></li>
                    </ul>
                  </div>
                </div>
              </div>
              
              <!-- Notifications List -->
              <div class="notifications-list">
                <!-- Notification item - Today -->
                <h6 class="text-muted small fw-bold mt-4 mb-3">اليوم</h6>
                
                <!-- Unread notification -->
                <div class="notification-item unread">
                  <div class="d-flex">
                    <div class="flex-shrink-0">
                      <div class="notification-icon bg-primary text-white">
                        <i class="bi bi-car-front"></i>
                      </div>
                    </div>
                    <div class="flex-grow-1 ms-3">
                      <div class="d-flex justify-content-between align-items-center">
                        <h6 class="mb-0 fw-medium">طلب رحلة جديد</h6>
                        <span class="text-muted small">منذ 5 دقائق</span>
                      </div>
                      <p class="mb-1">لديك طلب رحلة جديد من منطقة حي النزهة إلى وسط المدينة</p>
                      <div>
                        <button class="btn btn-sm btn-primary">قبول</button>
                        <button class="btn btn-sm btn-outline-secondary ms-2">رفض</button>
                      </div>
                      <div class="notification-actions mt-2">
                        <button class="btn btn-sm btn-link p-0">
                          <i class="bi bi-check"></i> تعيين كمقروء
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
                
                <!-- Unread notification -->
                <div class="notification-item unread mt-3">
                  <div class="d-flex">
                    <div class="flex-shrink-0">
                      <div class="notification-icon bg-success text-white">
                        <i class="bi bi-cash-coin"></i>
                      </div>
                    </div>
                    <div class="flex-grow-1 ms-3">
                      <div class="d-flex justify-content-between align-items-center">
                        <h6 class="mb-0 fw-medium">إيداع جديد</h6>
                        <span class="text-muted small">منذ 15 دقيقة</span>
                      </div>
                      <p class="mb-0">تم إيداع مبلغ 60 ريال في حسابك لإكمال رحلة #12345</p>
                      <div class="notification-actions mt-2">
                        <button class="btn btn-sm btn-link p-0">
                          <i class="bi bi-check"></i> تعيين كمقروء
                        </button>
                        <a href="../driver/earnings.php" class="btn btn-sm btn-link text-decoration-none ms-3">
                          عرض التفاصيل
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
                
                <!-- Unread notification -->
                <div class="notification-item unread mt-3">
                  <div class="d-flex">
                    <div class="flex-shrink-0">
                      <div class="notification-icon bg-warning text-white">
                        <i class="bi bi-star"></i>
                      </div>
                    </div>
                    <div class="flex-grow-1 ms-3">
                      <div class="d-flex justify-content-between align-items-center">
                        <h6 class="mb-0 fw-medium">تقييم جديد</h6>
                        <span class="text-muted small">منذ 45 دقيقة</span>
                      </div>
                      <p class="mb-0">حصلت على تقييم 5 نجوم من العميل "محمد"</p>
                      <div class="d-flex align-items-center text-warning mt-1">
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                      </div>
                      <div class="notification-actions mt-2">
                        <button class="btn btn-sm btn-link p-0">
                          <i class="bi bi-check"></i> تعيين كمقروء
                        </button>
                        <a href="#" class="btn btn-sm btn-link text-decoration-none ms-3">
                          عرض التفاصيل
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
                
                <!-- Yesterday notifications -->
                <h6 class="text-muted small fw-bold mt-4 mb-3">الأمس</h6>
                
                <!-- Read notification -->
                <div class="notification-item mt-3">
                  <div class="d-flex">
                    <div class="flex-shrink-0">
                      <div class="notification-icon bg-info text-white">
                        <i class="bi bi-card-checklist"></i>
                      </div>
                    </div>
                    <div class="flex-grow-1 ms-3">
                      <div class="d-flex justify-content-between align-items-center">
                        <h6 class="mb-0 fw-medium">تذكير بالمستندات</h6>
                        <span class="text-muted small">أمس, 14:30</span>
                      </div>
                      <p class="mb-0">استمارة سيارتك ستنتهي خلال 30 يوم، يرجى تحديثها</p>
                      <div class="notification-actions mt-2">
                        <a href="../driver/documents.php" class="btn btn-sm btn-link text-decoration-none p-0">
                          تحديث المستندات
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
                
                <!-- Read notification -->
                <div class="notification-item mt-3">
                  <div class="d-flex">
                    <div class="flex-shrink-0">
                      <div class="notification-icon bg-secondary text-white">
                        <i class="bi bi-megaphone"></i>
                      </div>
                    </div>
                    <div class="flex-grow-1 ms-3">
                      <div class="d-flex justify-content-between align-items-center">
                        <h6 class="mb-0 fw-medium">تنبيه نظام</h6>
                        <span class="text-muted small">أمس, 10:15</span>
                      </div>
                      <p class="mb-0">تم تحديث سياسة الخصوصية الخاصة بالتطبيق، يرجى الاطلاع عليها</p>
                      <div class="notification-actions mt-2">
                        <a href="#" class="btn btn-sm btn-link text-decoration-none p-0">
                          قراءة المزيد
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
                
                <!-- Older notifications -->
                <h6 class="text-muted small fw-bold mt-4 mb-3">هذا الأسبوع</h6>
                
                <!-- Read notification -->
                <div class="notification-item mt-3">
                  <div class="d-flex">
                    <div class="flex-shrink-0">
                      <div class="notification-icon bg-primary text-white">
                        <i class="bi bi-award"></i>
                      </div>
                    </div>
                    <div class="flex-grow-1 ms-3">
                      <div class="d-flex justify-content-between align-items-center">
                        <h6 class="mb-0 fw-medium">مكافأة الالتزام</h6>
                        <span class="text-muted small">قبل 3 أيام</span>
                      </div>
                      <p class="mb-0">تهانينا! حققت مكافأة الالتزام الأسبوعية بقيمة 100 ريال</p>
                      <div class="notification-actions mt-2">
                        <a href="../driver/earnings.php" class="btn btn-sm btn-link text-decoration-none p-0">
                          عرض التفاصيل
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
                
                <!-- Read notification -->
                <div class="notification-item mt-3">
                  <div class="d-flex">
                    <div class="flex-shrink-0">
                      <div class="notification-icon bg-danger text-white">
                        <i class="bi bi-exclamation-triangle"></i>
                      </div>
                    </div>
                    <div class="flex-grow-1 ms-3">
                      <div class="d-flex justify-content-between align-items-center">
                        <h6 class="mb-0 fw-medium">إشعار مروري</h6>
                        <span class="text-muted small">قبل 5 أيام</span>
                      </div>
                      <p class="mb-0">هناك ازدحام مروري في منطقة العمل المفضلة لديك</p>
                      <div class="notification-actions mt-2">
                        <a href="#" class="btn btn-sm btn-link text-decoration-none p-0">
                          عرض البدائل
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              
              <!-- Pagination -->
              <div class="d-flex justify-content-center mt-4">
                <nav aria-label="تصفح الإشعارات">
                  <ul class="pagination">
                    <li class="page-item disabled">
                      <a class="page-link" href="#" tabindex="-1" aria-disabled="true">السابق</a>
                    </li>
                    <li class="page-item active" aria-current="page">
                      <a class="page-link" href="#">1</a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                      <a class="page-link" href="#">التالي</a>
                    </li>
                  </ul>
                </nav>
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
          <p class="mb-0">© 2024 رايد. جميع الحقوق محفوظة.</p>
        </div>
        <div class="col-md-6 text-md-end">
          <a href="#" class="text-decoration-none text-muted me-3">سياسة الخصوصية</a>
          <a href="#" class="text-decoration-none text-muted me-3">الشروط والأحكام</a>
          <a href="#" class="text-decoration-none text-muted">تواصل معنا</a>
        </div>
      </div>
    </div>
  </footer>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/aos/aos.js"></script>
  <script src="../assets/vendor/swiper/swiper-bundle.min.js"></script>
  
  <!-- Main JS Files -->
  <script src="../assets/js/main.js"></script>
</body>
</html>