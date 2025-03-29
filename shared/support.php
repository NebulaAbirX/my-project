<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>رايد - الدعم الفني</title>
  <meta content="مركز الدعم الفني لسائقي تطبيق رايد" name="description">
  <meta content="دعم فني, مساعدة, سائقين, توصيل" name="keywords">

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
          <a class="btn btn-sm btn-light position-relative" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="bi bi-bell fs-5"></i>
            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
              3
            </span>
          </a>
          <div class="dropdown-menu dropdown-menu-end p-0">
            <div class="notification-header d-flex justify-content-between align-items-center p-3 border-bottom">
              <h6 class="m-0">الإشعارات (3)</h6>
              <a href="#" class="text-decoration-none small">تعيين الكل كمقروء</a>
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
              <!-- More notifications -->
            </div>
            <div class="notification-footer p-2 text-center border-top">
              <a href="#" class="text-decoration-none small">عرض كل الإشعارات</a>
            </div>
          </div>
        </div>
        <!-- Profile pic -->
        <img src="../assets/img/avatar-1.webp" alt="صورة السائق" class="rounded-circle" width="40" height="40">
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
            <img src="../assets/img/avatar-1.webp" alt="صورة السائق" class="rounded-circle mb-2" width="80" height="80">
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
              <a href="support.php" class="nav-link active">
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
          <!-- Support Section -->
          <section id="support" class="mb-5">
            <div class="dashboard-card">
              <div class="d-flex justify-content-between align-items-center mb-4">
                <h5><i class="bi bi-question-circle me-2"></i> الدعم الفني</h5>
              </div>
              
              <!-- Support content here -->
              <div class="row">
                <div class="col-lg-4 mb-4">
                  <div class="card border-0 shadow-sm h-100">
                    <div class="card-body text-center p-4">
                      <i class="bi bi-chat-dots text-primary fs-1 mb-3"></i>
                      <h5>دردشة مباشرة</h5>
                      <p class="text-muted">تحدث مباشرة مع أحد ممثلي خدمة العملاء</p>
                      <a href="#" class="btn btn-primary">بدء الدردشة</a>
                    </div>
                  </div>
                </div>
                
                <div class="col-lg-4 mb-4">
                  <div class="card border-0 shadow-sm h-100">
                    <div class="card-body text-center p-4">
                      <i class="bi bi-telephone text-primary fs-1 mb-3"></i>
                      <h5>اتصل بنا</h5>
                      <p class="text-muted">تواصل مع فريق الدعم الفني عبر الهاتف</p>
                      <p class="fw-bold">800-123-4567</p>
                      <small class="text-muted">متاح 24/7</small>
                    </div>
                  </div>
                </div>
                
                <div class="col-lg-4 mb-4">
                  <div class="card border-0 shadow-sm h-100">
                    <div class="card-body text-center p-4">
                      <i class="bi bi-envelope text-primary fs-1 mb-3"></i>
                      <h5>البريد الإلكتروني</h5>
                      <p class="text-muted">أرسل لنا استفسارك عبر البريد الإلكتروني</p>
                      <a href="mailto:support@ride-app.com" class="btn btn-outline-primary">مراسلة الدعم</a>
                    </div>
                  </div>
                </div>
              </div>
              
              <!-- FAQ Section -->
              <div class="mt-5">
                <h5 class="mb-4">الأسئلة الشائعة</h5>
                <div class="accordion" id="faqAccordion">
                  <!-- FAQ items -->
                  <div class="accordion-item">
                    <h2 class="accordion-header">
                      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
                        كيف يمكنني تحديث معلومات حسابي؟
                      </button>
                    </h2>
                    <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
                      <div class="accordion-body">
                        يمكنك تحديث معلومات حسابك من خلال الانتقال إلى صفحة <strong>الملف الشخصي</strong> ثم الضغط على زر <strong>تعديل الملف</strong>. يمكنك هناك تغيير بياناتك الشخصية ومعلومات التواصل.
                      </div>
                    </div>
                  </div>
                  
                  <div class="accordion-item">
                    <h2 class="accordion-header">
                      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
                        كيف يمكنني تتبع أرباحي؟
                      </button>
                    </h2>
                    <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                      <div class="accordion-body">
                        يمكنك تتبع أرباحك من خلال زيارة صفحة <strong>الأرباح</strong> من القائمة الجانبية. ستجد هناك تفاصيل عن الأرباح اليومية والأسبوعية والشهرية، بالإضافة إلى تاريخ المدفوعات السابقة.
                      </div>
                    </div>
                  </div>
                  
                  <div class="accordion-item">
                    <h2 class="accordion-header">
                      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq3">
                        ماذا أفعل في حالة وجود مشكلة مع أحد العملاء؟
                      </button>
                    </h2>
                    <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                      <div class="accordion-body">
                        في حالة وجود مشكلة مع أحد العملاء، يرجى الاتصال بفريق الدعم الفني على الفور على الرقم <strong>800-123-4567</strong>. سيقوم فريق الدعم بمساعدتك في حل المشكلة ومتابعة الموضوع معك.
                      </div>
                    </div>
                  </div>
                  
                  <div class="accordion-item">
                    <h2 class="accordion-header">
                      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq4">
                        كيف يمكنني تغيير كلمة المرور الخاصة بي؟
                      </button>
                    </h2>
                    <div id="faq4" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                      <div class="accordion-body">
                        لتغيير كلمة المرور، انتقل إلى صفحة <strong>الإعدادات</strong> من القائمة الجانبية، ثم اضغط على تبويب <strong>الأمان</strong>. ستجد هناك خيار تغيير كلمة المرور حيث يتوجب عليك إدخال كلمة المرور الحالية والجديدة.
                      </div>
                    </div>
                  </div>
                  
                  <div class="accordion-item">
                    <h2 class="accordion-header">
                      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq5">
                        كيف يتم احتساب تقييمي كسائق؟
                      </button>
                    </h2>
                    <div id="faq5" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                      <div class="accordion-body">
                        يتم احتساب تقييمك بناءً على تقييمات العملاء بعد كل رحلة. يمكن للعملاء تقييمك من 1 إلى 5 نجوم، ويتم حساب متوسط التقييمات. للحفاظ على تقييم جيد، احرص على تقديم خدمة ممتازة والالتزام بقواعد السلامة على الطريق.
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
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/aos/aos.js"></script>
  <script src="../assets/vendor/swiper/swiper-bundle.min.js"></script>
  
  <!-- Main JS Files -->
  <script src="../assets/js/main.js"></script>
</body>
</html>