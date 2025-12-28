<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $case['title'] ?> - إيثار</title>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans+Arabic:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --primary: #0f766e;
            --primary-glow: rgba(15, 118, 110, 0.15);
            --secondary: #f59e0b;
            --secondary-glow: rgba(245, 158, 11, 0.15);
            --accent: #ef4444;
            --dark: #0f172a;
            --light: #f8fafc;
            --gray: #64748b;
            --white: #ffffff;
            --glass: rgba(255, 255, 255, 0.8);
            --glass-border: rgba(255, 255, 255, 0.2);
            --shadow-sm: 0 1px 3px 0 rgb(0 0 0 / 0.1);
            --shadow-md: 0 4px 6px -1px rgb(0 0 0 / 0.1);
            --shadow-lg: 0 20px 25px -5px rgb(0 0 0 / 0.1);
            --radius-sm: 0.5rem;
            --radius-md: 0.75rem;
            --radius-lg: 1.25rem;
            --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'IBM Plex Sans Arabic', sans-serif;
            background-color: #f1f5f9;
            color: var(--dark);
            line-height: 1.6;
            -webkit-font-smoothing: antialiased;
        }

        .fade-in {
            animation: fadeInUp 0.6s ease-out forwards;
        }

        .container {
            max-width: 1100px;
            margin: 0 auto;
            padding: 0 1.5rem;
        }

        /* Navbar */
        .navbar {
            background: var(--glass);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border-bottom: 1px solid var(--glass-border);
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .navbar-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
            height: 80px;
        }

        .logo {
            font-size: 1.75rem;
            font-weight: 800;
            color: var(--primary);
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .nav-links {
            display: flex;
            gap: 2rem;
            align-items: center;
        }

        .nav-link {
            font-weight: 600;
            color: var(--gray);
            font-size: 0.95rem;
        }

        .nav-link:hover, .nav-link.active {
            color: var(--primary);
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 0.6rem 1.5rem;
            border-radius: var(--radius-md);
            font-weight: 700;
            cursor: pointer;
            transition: var(--transition);
            border: none;
            font-family: inherit;
            font-size: 0.95rem;
            gap: 0.5rem;
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--primary) 0%, #0d9488 100%);
            color: var(--white);
            box-shadow: 0 4px 15px var(--primary-glow);
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px var(--primary-glow);
        }

        .btn-outline {
            background: transparent;
            border: 2px solid var(--primary);
            color: var(--primary);
        }

        .btn-outline:hover {
            background: var(--primary-glow);
        }

        /* Main Content */
        .main-content {
            padding: 4rem 0;
        }

        .case-card {
            background: var(--white);
            border-radius: var(--radius-lg);
            box-shadow: var(--shadow-lg);
            overflow: hidden;
            display: flex;
            flex-direction: column;
        }

        .case-header-image {
            width: 100%;
            height: 400px;
            position: relative;
        }

        .case-header-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .case-badge {
            position: absolute;
            top: 1.5rem;
            right: 1.5rem;
            background: var(--glass);
            backdrop-filter: blur(8px);
            padding: 0.5rem 1.25rem;
            border-radius: 2rem;
            font-weight: 700;
            color: var(--primary);
            box-shadow: var(--shadow-md);
            z-index: 10;
        }

        .case-body {
            padding: 3rem;
        }

        .case-title {
            font-size: 2.5rem;
            font-weight: 800;
            margin-bottom: 1rem;
            color: var(--dark);
            line-height: 1.2;
        }

        .case-meta {
            display: flex;
            gap: 1.5rem;
            margin-bottom: 2.5rem;
            color: var(--gray);
            font-size: 1rem;
            font-weight: 600;
            border-bottom: 1px solid #f1f5f9;
            padding-bottom: 1.5rem;
        }

        .case-layout {
            display: grid;
            grid-template-columns: 1.6fr 1fr;
            gap: 3rem;
        }

        .case-description h3 {
            font-size: 1.5rem;
            font-weight: 800;
            margin-bottom: 1.5rem;
            color: var(--dark);
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .case-description h3::after {
            content: '';
            flex: 1;
            height: 2px;
            background: #f1f5f9;
        }

        .case-description p {
            font-size: 1.1rem;
            color: #475569;
            line-height: 1.8;
            white-space: pre-line;
        }

        .donation-box {
            background: #f8fafc;
            padding: 2.5rem;
            border-radius: var(--radius-lg);
            border: 1px solid #f1f5f9;
            height: fit-content;
            position: sticky;
            top: 120px;
            box-shadow: var(--shadow-md);
        }

        .progress-container {
            margin-bottom: 2.5rem;
        }

        .progress-bar {
            background-color: #e2e8f0;
            height: 12px;
            border-radius: 6px;
            margin-bottom: 1rem;
            overflow: hidden;
        }

        .progress-fill {
            background: linear-gradient(90deg, var(--primary) 0%, #2dd4bf 100%);
            height: 100%;
            border-radius: 6px;
            transition: width 1.5s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .funding-stats {
            display: flex;
            justify-content: space-between;
            font-weight: 800;
            font-size: 1.25rem;
            margin-bottom: 0.5rem;
        }

        .amount-collected {
            color: var(--primary);
        }

        .amount-required {
            color: var(--gray);
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-label {
            display: block;
            margin-bottom: 0.75rem;
            font-weight: 700;
            color: var(--dark);
        }

        .form-input {
            width: 100%;
            padding: 1rem 1.25rem;
            border: 2px solid #e2e8f0;
            border-radius: var(--radius-md);
            font-family: inherit;
            font-size: 1rem;
            transition: var(--transition);
            outline: none;
        }

        .form-input:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 4px var(--primary-glow);
        }

        .secure-note {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            margin-top: 1.5rem;
            color: #94a3b8;
            font-size: 0.9rem;
            font-weight: 600;
        }

        /* Donors List */
        .donor-item {
            background: white;
            padding: 1.25rem;
            border-radius: var(--radius-md);
            margin-bottom: 1rem;
            border: 1px solid #f1f5f9;
            transition: var(--transition);
        }

        .donor-item:hover {
            transform: translateX(-5px);
            border-color: var(--primary-glow);
            box-shadow: var(--shadow-sm);
        }

        /* Footer */
        .footer {
            background-color: var(--dark);
            color: var(--white);
            padding: 5rem 0 2rem;
        }

        .footer-grid {
            display: grid;
            grid-template-columns: 2fr 1fr 1fr;
            gap: 4rem;
            margin-bottom: 4rem;
        }

        .footer-col h4 {
            font-size: 1.25rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
            position: relative;
            padding-bottom: 0.75rem;
        }

        .footer-col h4::after {
            content: '';
            position: absolute;
            bottom: 0;
            right: 0;
            width: 40px;
            height: 2px;
            background: var(--primary);
        }

        .footer-links a {
            color: #94a3b8;
            transition: var(--transition);
        }

        .footer-links a:hover {
            color: white;
            padding-right: 0.5rem;
        }

        .footer-bottom {
            border-top: 1px solid rgba(255, 255, 255, 0.05);
            padding-top: 2rem;
            text-align: center;
            color: #64748b;
        }

        @media (max-width: 992px) {
            .case-layout {
                grid-template-columns: 1fr;
                gap: 3rem;
            }
            
            .case-header-image {
                height: 300px;
            }

            .case-body {
                padding: 2rem;
            }

            .donation-box {
                position: static;
            }

            .footer-grid {
                grid-template-columns: 1fr 1fr;
            }
        }

        @media (max-width: 768px) {
            .case-title {
                font-size: 2rem;
            }
            
            .nav-links {
                display: none;
            }

            .footer-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar">
        <div class="container navbar-content">
            <a href="/" class="logo">
                <svg width="28" height="28" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z" fill="currentColor"/>
                </svg>
                <span>إيثار</span>
            </a>
            
            <div class="nav-links">
                <a href="<?= base_url('') ?>" class="nav-link active">الرئيسية</a>
                <a href="<?= base_url('cases') ?>" class="nav-link">الحالات</a>
                <a href="<?= base_url('blood-donation') ?>" class="nav-link">تبرع بالدم</a>
                <a href="<?= base_url('campaigns') ?>" class="nav-link">حملات التوعية</a>
                <a href="<?= base_url('about') ?>" class="nav-link">من نحن</a>
                <a href="<?= base_url('contact') ?>" class="nav-link">اتصل بنا</a>
            </div>

            <div style="display: flex; gap: 0.5rem;">
                <a href="#" class="btn btn-outline btn-sm">دخول</a>
                <a href="#" class="btn btn-primary btn-sm">حساب جديد</a>
            </div>
        </div>
    </nav>

    <section class="container main-content fade-in">
        <div class="case-card">
            <div class="case-header-image">
                <img src="<?= $case['image'] ?>" alt="<?= $case['title'] ?>">
                <span class="case-badge"><?= $case['category'] ?></span>
            </div>
            
            <div class="case-body">
                <h1 class="case-title"><?= $case['title'] ?></h1>
                
                <div class="case-meta">
                    <span style="display: flex; align-items: center; gap: 0.5rem;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
                        <?= $case['city'] ?>
                    </span>
                    <span style="display: flex; align-items: center; gap: 0.5rem;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
                        تم النشر: <?= date('Y/m/d', strtotime($case['created_at'])) ?>
                    </span>
                </div>

                <div class="case-layout">
                    <!-- Right Column: Description -->
                    <div class="case-description">
                        <h3>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
                            تفاصيل الحالة
                        </h3>
                        <p><?= $case['description'] ?></p>
                    </div>

                    <!-- Left Column: Donation Form & Donors List -->
                    <div>
                        <?php if(!session()->has('id') || (session('id') != $case['user_id'] && session('role') != 'admin')): ?>
                        <div class="donation-box">
                            <!-- ... existing donation form ... -->
                            <div class="progress-container">
                                <?php 
                                    $percent = 0;
                                    if (isset($case['amount_required']) && $case['amount_required'] > 0) {
                                        $percent = min(100, round(($case['amount_collected'] / $case['amount_required']) * 100));
                                    }
                                ?>
                                <div class="funding-stats">
                                    <span class="amount-collected"><?= number_format($case['amount_collected']) ?> د.ل</span>
                                    <span class="amount-required">من <?= number_format($case['amount_required']) ?> د.ل</span>
                                </div>
                                <div class="progress-bar">
                                    <div class="progress-fill" style="width: <?= $percent ?>%"></div>
                                </div>
                                <div style="text-align: left; font-size: 0.85rem; color: var(--gray); font-weight: 500;">
                                    <?= $percent ?>% مكتمل
                                </div>
                            </div>

                            <form action="/payment/init" method="POST">
                                <input type="hidden" name="case_id" value="<?= $case['id'] ?>">
                                <div class="form-group">
                                    <label class="form-label">البريد الإلكتروني للمساهمة</label>
                                    <input type="email" name="email" class="form-input" placeholder="example@gmail.com" required>
                                    <p style="font-size: 0.85rem; color: #64748b; margin-top: 0.5rem; font-weight: 500;">يمكنك الدفع ببطاقة ائتمان أو بكرت الشحن</p>
                                </div>

                                <button type="submit" class="btn btn-primary btn-block">
                                    ساهم الآن
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg>
                                </button>
                                
                                <div class="secure-note">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                                        <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                                    </svg>
                                    <span>تبرع آمن ومحمي 100%</span>
                                </div>
                            </form>
                        </div>
                        <?php else: ?>
                            <!-- Patient/Admin View -->
                            <div class="donation-box">
                                <h3 style="margin-bottom: 1rem;">بيانات الحالة</h3>
                                <p><strong>الكنية:</strong> <?= $case['patient_nickname'] ?? 'مريض' ?></p>
                                <p><strong>الحالة:</strong> <?= $case['status'] ?></p>
                                
                                <?php if(session('role') == 'admin' || session('id') == $case['user_id']): ?>
                                    <h4 style="margin-top: 2rem; margin-bottom: 1.5rem; border-top: 1px solid #f1f5f9; padding-top: 1.5rem; font-weight: 800;">قائمة المتبرعين</h4>
                                    <?php if(empty($donations)): ?>
                                        <div style="text-align: center; padding: 2rem; background: white; border-radius: var(--radius-md); color: var(--gray);">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="#e2e8f0" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="margin-bottom: 1rem;"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg>
                                            <p>لا يوجد تبرعات حتى الآن.</p>
                                        </div>
                                    <?php else: ?>
                                        <div style="max-height: 400px; overflow-y: auto; padding-left: 0.5rem;">
                                            <?php foreach($donations as $donation): ?>
                                            <div class="donor-item">
                                                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 0.5rem;">
                                                    <strong style="color: var(--dark);"><?= $donation['donor_name'] ?></strong>
                                                    <span style="color: var(--primary); font-weight: 800; font-size: 1.1rem;"><?= number_format($donation['amount']) ?> د.ل</span>
                                                </div>
                                                
                                                <?php if(session('role') == 'admin'): ?>
                                                    <div style="font-size: 0.9rem; color: var(--gray); display: flex; flex-direction: column; gap: 0.25rem;">
                                                        <span style="display: flex; align-items: center; gap: 0.5rem;">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
                                                            <?= $donation['donor_email'] ?? '-' ?>
                                                        </span>
                                                        <span style="display: flex; align-items: center; gap: 0.5rem;">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
                                                            <?= $donation['donor_phone'] ?? '-' ?>
                                                        </span>
                                                    </div>
                                                <?php elseif(session('id') == $case['user_id']): ?>
                                                    <div style="font-size: 0.9rem; color: var(--gray);">
                                                        <span style="display: flex; align-items: center; gap: 0.5rem;">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
                                                            <?= $donation['donor_phone'] ?? 'غير متوفر' ?>
                                                        </span>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                            <?php endforeach; ?>
                                        </div>
                                    <?php endif; ?>
                                <?php endif; ?>

                                <div style="margin-top: 1.5rem; text-align: center;">
                                    <?php if(session('role') == 'admin'): ?>
                                        <a href="/admin/cases" class="btn btn-outline btn-sm">العودة للوحة التحكم</a>
                                    <?php else: ?>
                                        <a href="/patient/my-requests" class="btn btn-outline btn-sm">العودة لطلباتي</a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="footer-grid">
                <div class="footer-col">
                    <h4>عن إيثار</h4>
                    <p style="color: #94a3b8; font-size: 0.85rem;">منصة ليبية لتسهيل المساعدات الطبية.</p>
                </div>
                <div class="footer-col">
                    <ul class="footer-links">
                        <li><a href="#">من نحن</a></li>
                        <li><a href="#">اتصل بنا</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>تواصل معنا</h4>
                    <ul class="footer-links">
                        <li>info@ethar.ly</li>
                        <li>طرابلس، ليبيا</li>
                    </ul>
                </div>
            </div>
            <div class="footer-bottom">
                <p>© 2025 إيثار</p>
            </div>
        </div>
    </footer>

</body>
</html>
