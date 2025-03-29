<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>رايد - الملف الشخصي للراكب</title>
  <meta content="الملف الشخصي للراكب في تطبيق رايد" name="description">
  <meta content="راكب, ملف شخصي, رايد, توصيل" name="keywords">

  <!-- Favicons -->
  <link href="../../assets/img/favicon.png" rel="icon">
  <link href="../../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;500;600;700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../../assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="../../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS Files -->
  <link href="../../assets/css/main.css" rel="stylesheet">
  <link href="../../assets/css/passenger-dashboard.css" rel="stylesheet">
  <link href="../../assets/css/responsive.css" rel="stylesheet">
</head>

<body class="passenger-dashboard rtl">
  <!-- Header -->
  <header id="header" class="header shadow-sm fixed-top bg-white">
    <div class="container-fluid d-flex justify-content-between align-items-center">
      <div class="d-flex align-items-center">
        <button class="btn btn-sm d-lg-none me-2" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebar">
          <i class="bi bi-list fs-4"></i>
        </button>
        <a href="../../index.html" class="logo d-flex align-items-center">
          <span class="fs-4 fw-bold text-primary">رايد</span>
          <span class="badge bg-success ms-2 text-uppercase">الراكب</span>
        </a>
      </div>
      
      <div class="d-flex align-items-center gap-3">
        <!-- Notifications -->
        <div class="dropdown">
          <a class="btn btn-sm btn-light position-relative" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="bi bi-bell fs-5"></i>
            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
              2
            </span>
          </a>
          <div class="dropdown-menu dropdown-menu-end p-0">
            <div class="notification-header d-flex justify-content-between align-items-center p-3 border-bottom">
              <h6 class="m-0">الإشعارات (2)</h6>
              <a href="#" class="text-decoration-none small">تعيين الكل كمقروء</a>
            </div>
            <div class="notification-body">
              <a href="#" class="dropdown-item p-3 border-bottom">
                <div class="d-flex">
                  <div class="flex-shrink-0">
                    <i class="bi bi-ticket-perforated text-success fs-4"></i>
                  </div>
                  <div class="flex-grow-1 ms-3">
                    <p class="mb-0 fw-medium">تم تطبيق الخصم بنجاح على رحلتك التالية</p>
                    <p class="small text-muted mb-0">منذ 10 دقائق</p>
                  </div>
                </div>
              </a>
              <a href="#" class="dropdown-item p-3 border-bottom">
                <div class="d-flex">
                  <div class="flex-shrink-0">
                    <i class="bi bi-star text-warning fs-4"></i>
                  </div>
                  <div class="flex-grow-1 ms-3">
                    <p class="mb-0 fw-medium">لم تقم بتقييم آخر رحلة. قم بالتقييم الآن</p>
                    <p class="small text-muted mb-0">منذ ساعتين</p>
                  </div>
                </div>
              </a>
            </div>
            <div class="notification-footer p-2 text-center border-top">
              <a href="#" class="text-decoration-none small">عرض كل الإشعارات</a>
            </div>
          </div>
        </div>
        <!-- Profile pic -->
        <img src="../../assets/img/avatar-2.webp" alt="صورة الراكب" class="rounded-circle" width="40" height="40">
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
            <img src="../../assets/img/avatar-2.webp" alt="صورة الراكب" class="rounded-circle mb-2" width="80" height="80">
            <h6 class="mb-0">سارة أحمد</h6>
            <p class="text-muted small mb-2">ID: P-54321</p>
            <div class="badge bg-success mb-2">راكب مميز</div>
          </div>
          <ul class="nav nav-pills flex-column mb-auto sidebar-nav">
            <li class="nav-item">
              <a href="../dashboard.php" class="nav-link">
                <i class="bi bi-speedometer2 me-2"></i>
                لوحة التحكم
              </a>
            </li>
            <li>
              <a href="../trips.php" class="nav-link">
                <i class="bi bi-car-front me-2"></i>
                رحلاتي
              </a>
            </li>
            <li>
              <a href="../book-ride.php" class="nav-link">
                <i class="bi bi-pin-map me-2"></i>
                حجز رحلة جديدة
              </a>
            </li>
            <li>
              <a href="../../chat.php" class="nav-link">
                <i class="bi bi-chat-dots me-2"></i>
                الدردشات
              </a>
            </li>
            <li>
              <a href="user-profile.html" class="nav-link active">
                <i class="bi bi-person me-2"></i>
                الملف الشخصي
              </a>
            </li>
            <li>
              <a href="../payment.php" class="nav-link">
                <i class="bi bi-credit-card me-2"></i>
                الدفع والفواتير
              </a>
            </li>
            <li>
              <a href="../../shared/support.php" class="nav-link">
                <i class="bi bi-question-circle me-2"></i>
                الدعم الفني
              </a>
            </li>
          </ul>
          <hr>
          <a href="../../login/php/logout.php" class="nav-link">
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
                <a href="edit-profile.php" class="btn btn-outline-primary btn-sm">
                  <i class="bi bi-pencil me-1"></i> تعديل الملف
                </a>
              </div>

              <div class="row">
                <!-- Profile Picture and Basic Info -->
                <div class="col-md-4 mb-4 mb-md-0">
                  <div class="text-center">
                    <div class="position-relative mb-3 d-inline-block">
                      <img src="../../assets/img/avatar-2.webp" alt="صورة الراكب" class="rounded-circle mb-2" width="150" height="150">
                      <button class="btn btn-sm btn-primary rounded-circle position-absolute bottom-0 start-0" style="width: 35px; height: 35px;">
                        <i class="bi bi-camera"></i>
                      </button>
                    </div>
                    <h4 class="mb-1">سارة أحمد</h4>
                    <p class="text-muted mb-2">مستخدم منذ يناير 2023</p>
                    <div class="badge bg-success mb-3">راكب مميز</div>
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
                        <label class="small text-muted mb-1">الاسم الكامل</label>
                        <p class="mb-0">سارة أحمد عبدالله</p>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="mb-3">
                        <label class="small text-muted mb-1">البريد الإلكتروني</label>
                        <p class="mb-0">sarah@example.com</p>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="mb-3">
                        <label class="small text-muted mb-1">رقم الهاتف</label>
                        <p class="mb-0">+966 5XX XXX XXX</p>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="mb-3">
                        <label class="small text-muted mb-1">تاريخ الميلاد</label>
                        <p class="mb-0">15/04/1992</p>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="mb-3">
                        <label class="small text-muted mb-1">الجنس</label>
                        <p class="mb-0">أنثى</p>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="mb-3">
                        <label class="small text-muted mb-1">اللغة المفضلة</label>
                        <p class="mb-0">العربية</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>

          <!-- Favorite Locations -->
          <section id="favorite-locations" class="mb-4">
            <div class="dashboard-card">
              <div class="d-flex justify-content-between align-items-center mb-4">
                <h5 class="mb-0"><i class="bi bi-geo-alt me-2"></i> الأماكن المفضلة</h5>
                <button class="btn btn-outline-primary btn-sm">
                  <i class="bi bi-plus-lg me-1"></i> إضافة مكان
                </button>
              </div>

              <div class="table-responsive">
                <table class="table table-hover align-middle">
                  <thead class="table-light">
                    <tr>
                      <th scope="col">الاسم</th>
                      <th scope="col">العنوان</th>
                      <th scope="col">النوع</th>
                      <th scope="col">الإجراءات</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>
                        <div class="d-flex align-items-center">
                          <div class="location-icon me-3 bg-primary text-white">
                            <i class="bi bi-house"></i>
                          </div>
                          <span>المنزل</span>
                        </div>
                      </td>
                      <td>حي النزهة، الرياض</td>
                      <td><span class="badge bg-light text-dark">سكني</span></td>
                      <td>
                        <div class="btn-group btn-group-sm">
                          <button type="button" class="btn btn-outline-secondary">
                            <i class="bi bi-pencil"></i>
                          </button>
                          <button type="button" class="btn btn-outline-danger">
                            <i class="bi bi-trash"></i>
                          </button>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <div class="d-flex align-items-center">
                          <div class="location-icon me-3 bg-info text-white">
                            <i class="bi bi-building"></i>
                          </div>
                          <span>العمل</span>
                        </div>
                      </td>
                      <td>طريق الملك فهد، الرياض</td>
                      <td><span class="badge bg-light text-dark">عمل</span></td>
                      <td>
                        <div class="btn-group btn-group-sm">
                          <button type="button" class="btn btn-outline-secondary">
                            <i class="bi bi-pencil"></i>
                          </button>
                          <button type="button" class="btn btn-outline-danger">
                            <i class="bi bi-trash"></i>
                          </button>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <div class="d-flex align-items-center">
                          <div class="location-icon me-3 bg-success text-white">
                            <i class="bi bi-shop"></i>
                          </div>
                          <span>المول</span>
                        </div>
                      </td>
                      <td>الرياض بارك، الرياض</td>
                      <td><span class="badge bg-light text-dark">تسوق</span></td>
                      <td>
                        <div class="btn-group btn-group-sm">
                          <button type="button" class="btn btn-outline-secondary">
                            <i class="bi bi-pencil"></i>
                          </button>
                          <button type="button" class="btn btn-outline-danger">
                            <i class="bi bi-trash"></i>
                          </button>
                        </div>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </section>

          <!-- Preferences -->
          <section id="preferences" class="mb-4">
            <div class="dashboard-card">
              <h5 class="mb-4"><i class="bi bi-sliders me-2"></i> تفضيلات الرحلات</h5>
              
              <div class="row">
                <div class="col-md-6 mb-4">
                  <div class="card border-0 shadow-sm h-100">
                    <div class="card-body">
                      <h6 class="card-title d-flex align-items-center">
                        <i class="bi bi-shield-check me-2 text-success"></i>
                        خيارات الأمان
                      </h6>
                      <div class="mt-3">
                        <div class="form-check form-switch mb-3">
                          <input class="form-check-input" type="checkbox" id="shareTrip" checked>
                          <label class="form-check-label" for="shareTrip">مشاركة تفاصيل الرحلة مع جهة اتصال موثوقة</label>
                        </div>
                        <div class="form-check form-switch mb-3">
                          <input class="form-check-input" type="checkbox" id="verifiedDrivers" checked>
                          <label class="form-check-label" for="verifiedDrivers">تفضيل السائقين المتحقق منهم فقط</label>
                        </div>
                        <div class="form-check form-switch">
                          <input class="form-check-input" type="checkbox" id="safetyCenter">
                          <label class="form-check-label" for="safetyCenter">تفعيل تنبيهات مركز الأمان</label>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                
                <div class="col-md-6 mb-4">
                  <div class="card border-0 shadow-sm h-100">
                    <div class="card-body">
                      <h6 class="card-title d-flex align-items-center">
                        <i class="bi bi-car-front me-2 text-primary"></i>
                        خيارات المركبة
                      </h6>
                      <div class="mt-3">
                        <div class="form-check form-switch mb-3">
                          <input class="form-check-input" type="checkbox" id="airConditioned" checked>
                          <label class="form-check-label" for="airConditioned">مكيفة فقط</label>
                        </div>
                        <div class="form-check form-switch mb-3">
                          <input class="form-check-input" type="checkbox" id="nonSmoking" checked>
                          <label class="form-check-label" for="nonSmoking">منع التدخين</label>
                        </div>
                        <div class="form-check form-switch">
                          <input class="form-check-input" type="checkbox" id="petFriendly">
                          <label class="form-check-label" for="petFriendly">صديقة للحيوانات الأليفة</label>
                        </div>
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
  <script src="../../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../../assets/vendor/aos/aos.js"></script>
  <script src="../../assets/vendor/swiper/swiper-bundle.min.js"></script>
  
  <!-- Main JS Files -->
  <script src="../../assets/js/main.js"></script>
</body>
</html>