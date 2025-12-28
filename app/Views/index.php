<?php
// Cases are passed from the controller
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>إيثار - منصة التكافل الصحي الليبية</title>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans+Arabic:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        html {
            scroll-behavior: smooth;
        }
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

        @keyframes pulse {
            0% { transform: scale(1); box-shadow: 0 0 0 0 rgba(239, 68, 68, 0.4); }
            70% { transform: scale(1.05); box-shadow: 0 0 0 10px rgba(239, 68, 68, 0); }
            100% { transform: scale(1); box-shadow: 0 0 0 0 rgba(239, 68, 68, 0); }
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
            overflow-x: hidden;
        }

        .fade-in {
            animation: fadeInUp 0.6s ease-out forwards;
        }

        .container {
            max-width: 1200px;
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
            transition: var(--transition);
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
            transition: var(--transition);
        }
        
        .logo:hover {
            transform: scale(1.05);
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
            position: relative;
            padding: 0.5rem 0;
            text-decoration: none;
        }

        .nav-link::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 0;
            height: 2px;
            background: var(--primary);
            transition: var(--transition);
        }

        .nav-link:hover::after, .nav-link.active::after {
            width: 100%;
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
            transform: translateY(-2px);
        }

        /* Hero Section */
        .hero {
            background: radial-gradient(circle at top right, #134e4a, #0f172a);
            color: var(--white);
            padding: 6rem 0;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .hero::before {
            content: '';
            position: absolute;
            top: 0; left: 0; right: 0; bottom: 0;
            background: url("data:image/svg+xml,%3Csvg width='100' height='100' viewBox='0 0 100 100' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M11 18c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm48 25c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm-43-7c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm63 31c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM34 90c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm56-76c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM12 86c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zm66-3c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zm-46-43c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zm10-17c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zm24 56c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zm40-33c.552 0 1-.448 1-1s-.448-1-1-1-1 .448-1 1 .448 1 1 1zm-1 46c.552 0 1-.448 1-1s-.448-1-1-1-1 .448-1 1 .448 1 1 1zM42 90c.552 0 1-.448 1-1s-.448-1-1-1-1 .448-1 1 .448 1 1 1zm57-85c.552 0 1-.448 1-1s-.448-1-1-1-1 .448-1 1 .448 1 1 1zM25 18c.552 0 1-.448 1-1s-.448-1-1-1-1 .448-1 1 .448 1 1 1zm23 66c.552 0 1-.448 1-1s-.448-1-1-1-1 .448-1 1 .448 1 1 1zM21 47c.552 0 1-.448 1-1s-.448-1-1-1-1 .448-1 1 .448 1 1 1zm57 0c.552 0 1-.448 1-1s-.448-1-1-1-1 .448-1 1 .448 1 1 1zM33 7c.552 0 1-.448 1-1s-.448-1-1-1-1 .448-1 1 .448 1 1 1zM72 20c.552 0 1-.448 1-1s-.448-1-1-1-1 .448-1 1 .448 1 1 1zm-58 45c.552 0 1-.448 1-1s-.448-1-1-1-1 .448-1 1 .448 1 1 1zm67 1c.552 0 1-.448 1-1s-.448-1-1-1-1 .448-1 1 .448 1 1 1zM12 10c.552 0 1-.448 1-1s-.448-1-1-1-1 .448-1 1 .448 1 1 1zm60 71c.552 0 1-.448 1-1s-.448-1-1-1-1 .448-1 1 .448 1 1 1zM16 27c.552 0 1-.448 1-1s-.448-1-1-1-1 .448-1 1 .448 1 1 1zm57 52c.552 0 1-.448 1-1s-.448-1-1-1-1 .448-1 1 .448 1 1 1z' fill='%23ffffff' fill-opacity='0.05' fill-rule='evenodd'/%3E%3C/svg%3E");
            opacity: 0.4;
        }

        .hero-content {
            position: relative;
            z-index: 1;
            max-width: 900px;
            margin: 0 auto;
        }

        .hero h1 {
            font-size: 3.5rem;
            font-weight: 800;
            margin-bottom: 1.5rem;
            line-height: 1.1;
            background: linear-gradient(to bottom, #fff, #ccfbf1);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .hero p {
            font-size: 1.25rem;
            margin-bottom: 3rem;
            color: #94a3b8;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
        }

        .search-box {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            padding: 1rem;
            border-radius: var(--radius-lg);
            display: flex;
            gap: 1rem;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
            max-width: 800px;
            margin: 0 auto;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .search-input {
            flex: 1;
            padding: 1rem 1.5rem;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: var(--radius-md);
            color: white;
            font-family: inherit;
            outline: none;
            font-size: 1rem;
            transition: var(--transition);
        }

        .search-input option {
            background: #0f172a;
            color: white;
        }

        .search-input:focus {
            background: rgba(255, 255, 255, 0.1);
            border-color: var(--primary);
        }

        .search-btn {
            background: linear-gradient(135deg, var(--secondary) 0%, #d97706 100%);
            color: var(--white);
            padding: 1rem 2.5rem;
            border: none;
            border-radius: var(--radius-md);
            font-weight: 700;
            cursor: pointer;
            transition: var(--transition);
            box-shadow: 0 4px 15px var(--secondary-glow);
        }

        .search-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px var(--secondary-glow);
        }

        /* Section Headers */
        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
            margin-bottom: 3rem;
            padding-bottom: 1rem;
            border-bottom: 2px solid #e2e8f0;
        }

        .section-title {
            font-size: 2.25rem;
            font-weight: 800;
            color: var(--dark);
            position: relative;
        }

        .section-title::after {
            content: '';
            position: absolute;
            bottom: -1.25rem;
            right: 0;
            width: 80px;
            height: 4px;
            background: var(--secondary);
            border-radius: 2px;
        }

        .filters {
            display: flex;
            gap: 0.75rem;
        }

        .filter-btn {
            background: var(--white);
            border: 1px solid #e2e8f0;
            padding: 0.6rem 1.25rem;
            border-radius: var(--radius-md);
            font-size: 0.95rem;
            font-weight: 600;
            color: var(--gray);
            transition: var(--transition);
            text-decoration: none;
        }

        .filter-btn:hover, .filter-btn.active {
            background: var(--primary);
            color: var(--white);
            border-color: var(--primary);
            box-shadow: 0 4px 12px var(--primary-glow);
        }

        /* Cards Grid */
        .cases-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
            gap: 2rem;
            margin-bottom: 5rem;
        }

        .card {
            background: var(--white);
            border-radius: var(--radius-lg);
            overflow: hidden;
            box-shadow: var(--shadow-md);
            transition: var(--transition);
            display: flex;
            flex-direction: column;
            border: 1px solid #f1f5f9;
        }

        .card:hover {
            transform: translateY(-10px);
            box-shadow: var(--shadow-lg);
        }

        .card-image {
            height: 220px;
            position: relative;
            overflow: hidden;
        }
        
        .card-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: var(--transition);
        }

        .card:hover .card-image img {
            transform: scale(1.1);
        }

        .card-badge {
            position: absolute;
            top: 1rem;
            right: 1rem;
            background: var(--glass);
            backdrop-filter: blur(8px);
            padding: 0.4rem 1rem;
            border-radius: 2rem;
            font-size: 0.8rem;
            font-weight: 700;
            color: var(--primary);
            box-shadow: var(--shadow-sm);
            z-index: 2;
        }

        .card-critical {
            border: 2px solid var(--accent);
        }

        .critical-badge {
            position: absolute;
            top: 1rem;
            left: 1rem;
            background: var(--accent);
            color: white;
            padding: 0.4rem 1rem;
            border-radius: 2rem;
            font-size: 0.8rem;
            font-weight: 800;
            box-shadow: 0 4px 12px rgba(239, 68, 68, 0.3);
            z-index: 2;
            animation: pulse 2s infinite;
        }

        .card-body {
            padding: 1.5rem;
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        .card-title {
            font-size: 1.25rem;
            margin-bottom: 0.75rem;
            color: var(--dark);
            font-weight: 700;
            line-height: 1.4;
        }

        .card-meta {
            display: flex;
            gap: 1rem;
            font-size: 0.9rem;
            color: var(--gray);
            margin-bottom: 1.25rem;
            font-weight: 500;
        }

        .card-desc {
            color: var(--gray);
            margin-bottom: 1.5rem;
            font-size: 0.95rem;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
            line-height: 1.6;
        }

        .progress-container {
            margin-top: auto;
            margin-bottom: 1.5rem;
        }

        .progress-bar {
            background-color: #f1f5f9;
            height: 10px;
            border-radius: 5px;
            margin-bottom: 0.75rem;
            overflow: hidden;
        }

        .progress-fill {
            background: linear-gradient(90deg, var(--primary) 0%, #2dd4bf 100%);
            height: 100%;
            border-radius: 5px;
            transition: width 1s ease-in-out;
        }

        .funding-stats {
            display: flex;
            justify-content: space-between;
            font-size: 0.9rem;
            font-weight: 700;
        }

        .amount-collected {
            color: var(--primary);
        }

        .card-footer {
            padding-top: 1rem;
            border-top: 1px solid #f1f5f9;
        }

        .btn-block {
            width: 100%;
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
            color: var(--white);
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

        .footer-links li {
            margin-bottom: 1rem;
        }

        .footer-links a {
            color: #94a3b8;
            font-weight: 500;
            transition: var(--transition);
        }

        .footer-links a:hover {
            color: var(--white);
            padding-right: 0.5rem;
        }

        .footer-bottom {
            border-top: 1px solid rgba(255, 255, 255, 0.05);
            padding-top: 2rem;
            text-align: center;
            color: #64748b;
            font-size: 0.95rem;
        }

        /* Map Section */
        .map-wrapper {
            background: var(--white);
            border-radius: var(--radius-lg);
            padding: 1.5rem;
            box-shadow: var(--shadow-lg);
            margin-bottom: 4rem;
            border: 1px solid #f1f5f9;
        }

        /* Responsive */
        @media (max-width: 992px) {
            .footer-grid {
                grid-template-columns: 1fr 1fr;
            }
        }

        @media (max-width: 768px) {
            .hero h1 {
                font-size: 2.5rem;
            }
            
            .nav-links {
                display: none;
            }
            
            .search-box {
                flex-direction: column;
                padding: 1rem;
            }
            
            .search-btn {
                width: 100%;
            }

            .footer-grid {
                grid-template-columns: 1fr;
                gap: 2rem;
            }

            .section-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 1.5rem;
            }
        }
    </style>
    <?php
    function time_ago($timestamp) {
        if (!$timestamp) return 'غير محدد';
        $time_ago = strtotime($timestamp);
        $cur_time = time();
        $time_elapsed = $cur_time - $time_ago;
        $seconds = $time_elapsed;
        $minutes = round($time_elapsed / 60);
        $hours = round($time_elapsed / 3600);
        $days = round($time_elapsed / 86400);
        $weeks = round($time_elapsed / 604800);
        $months = round($time_elapsed / 2600640);
        $years = round($time_elapsed / 31207680);

        if ($seconds <= 60) return "الآن";
        else if ($minutes <= 60) return ($minutes == 1) ? "منذ دقيقة" : "منذ $minutes دقيقة";
        else if ($hours <= 24) return ($hours == 1) ? "منذ ساعة" : "منذ $hours ساعة";
        else if ($days <= 7) return ($days == 1) ? "منذ يوم" : "منذ $days أيام";
        else if ($weeks <= 4.3) return ($weeks == 1) ? "منذ أسبوع" : "منذ $weeks أسابيع";
        else if ($months <= 12) return ($months == 1) ? "منذ شهر" : "منذ $months شهور";
        else return ($years == 1) ? "منذ سنة" : "منذ $years سنوات";
    }
    ?>
</head>
<body>

    <!-- Navbar -->
    <?php 
        $currentCat = $currentCategory ?? service('request')->getGet('category');
        $currentCityName = $currentCity ?? service('request')->getGet('city');
        
        if (!function_exists('getFilterUrl')) {
            function getFilterUrl($cat, $city) {
                $params = [];
                if ($cat) $params['category'] = $cat;
                if ($city) $params['city'] = $city;
                $queryString = !empty($params) ? '?' . http_build_query($params) : '';
                return base_url($queryString) . '#cases';
            }
        }
    ?>
    <nav class="navbar">
        <div class="container navbar-content">
            <a href="<?= base_url('') ?>" class="logo">
                <svg width="28" height="28" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z" fill="currentColor"/>
                </svg>
                <span>إيثار</span>
            </a>
            
            <div class="nav-links">
                <a href="<?= base_url('') ?>" class="nav-link active">الرئيسية</a>
                <a href="<?= base_url('#cases') ?>" class="nav-link">الحالات</a>
                <a href="<?= base_url('blood-donation') ?>" class="nav-link">تبرع بالدم</a>
                <a href="<?= base_url('campaigns') ?>" class="nav-link">حملات التوعية</a>
                <a href="#about" class="nav-link">من نحن</a>
                <a href="tel:+218945338966" class="nav-link">اتصل بنا</a>
            </div>

            <div style="display: flex; gap: 0.5rem;">
                <?php if(session()->get('isLoggedIn')): ?>
                    <a href="<?= session()->get('role') == 'admin' ? base_url('admin') : base_url('patient/dashboard') ?>" class="btn btn-primary btn-sm">لوحة التحكم</a>
                    <a href="<?= base_url('logout') ?>" class="btn btn-outline btn-sm">خروج</a>
                <?php else: ?>
                    <a href="<?= base_url('login') ?>" class="btn btn-outline btn-sm" style="text-decoration: none;">تسجيل الدخول</a>
                    <a href="<?= base_url('register') ?>" class="btn btn-primary btn-sm" style="text-decoration: none;">اشتراك</a>
                <?php endif; ?>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero">
        <div class="container hero-content fade-in">
            <h1>يداً بيد.. نصنع فرقاً</h1>
            <p>منصة إيثار تربط بين المرضى المحتاجين وأهل الخير في ليبيا، لضمان وصول المساعدات لمن يستحقها بكل شفافية وأمان.</p>
            
            <!-- Interactive Map Section -->
            <div class="map-wrapper fade-in" style="animation-delay: 0.2s;">
                <h3 style="margin-bottom: 1.5rem; color: var(--dark); font-weight: 800; display: flex; align-items: center; justify-content: center; gap: 0.5rem;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="var(--primary)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
                    توزيع الحالات حسب المدن
                </h3>
                
                <div style="position: relative; width: 100%; padding-bottom: 82%;">
                    <img src="/libya_map_v2.jpg" alt="خريطة ليبيا" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: cover; border-radius: var(--radius-md);">
                    
                    <svg viewBox="0 0 612 500" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;">
                        <?php 
                            $cities = [
                                'طرابلس' => ['x' => 190, 'y' => 45],
                                'الزاوية' => ['x' => 165, 'y' => 50],
                                'مصراتة' => ['x' => 238, 'y' => 68],
                                'بنغازي' => ['x' => 385, 'y' => 80],
                                'سبها' => ['x' => 210, 'y' => 225]
                            ];
                            
                            $currentCity = service('request')->getGet('city');
                            
                            foreach($cities as $name => $coords): 
                                $count = $cityStats[$name] ?? 0;
                                $radius = $count > 0 ? 14 + ($count * 0.5) : 8; 
                                $opacity = $count > 0 ? 1 : 0.7;
                                $color = $count > 0 ? 'var(--secondary)' : '#94a3b8';
                                
                                if ($currentCity == $name) {
                                    $color = 'var(--accent)';
                                }
                        ?>
                        <g class="city-marker" style="cursor: pointer; transition: var(--transition);" onclick="window.location.href='<?= getFilterUrl($currentCat, $name) ?>'">
                            <circle cx="<?= $coords['x'] ?>" cy="<?= $coords['y'] ?>" r="<?= $radius ?>" fill="<?= $color ?>" fill-opacity="<?= $opacity ?>" stroke="white" stroke-width="2" style="filter: drop-shadow(0 4px 6px rgba(0,0,0,0.1));">
                                <title><?= $name ?>: <?= $count ?> حالات</title>
                            </circle>
                            <?php if ($count > 0): ?>
                                <text x="<?= $coords['x'] ?>" y="<?= $coords['y'] ?>" dy="0.35em" text-anchor="middle" fill="white" font-size="11" font-weight="800"><?= $count ?></text>
                            <?php endif; ?>
                            <text x="<?= $coords['x'] ?>" y="<?= $coords['y'] + $radius + 15 ?>" text-anchor="middle" fill="var(--dark)" font-size="12" font-weight="800" style="text-shadow: 0 0 4px white;"><?= $name ?></text>
                        </g>
                        <?php endforeach; ?>
                    </svg>
                </div>
            </div>

            <form action="#cases" method="GET" class="search-box fade-in" style="animation-delay: 0.4s;">
                <select name="category" class="search-input">
                    <option value="">كل التخصصات</option>
                    <option value="طبية" <?= service('request')->getGet('category') == 'طبية' ? 'selected' : '' ?>>طبية</option>
                    <option value="جراحية" <?= service('request')->getGet('category') == 'جراحية' ? 'selected' : '' ?>>جراحية</option>
                    <option value="أدوية" <?= service('request')->getGet('category') == 'أدوية' ? 'selected' : '' ?>>أدوية</option>
                    <option value="أجهزة" <?= service('request')->getGet('category') == 'أجهزة' ? 'selected' : '' ?>>أجهزة طبية</option>
                    <option value="علاج طبيعي" <?= service('request')->getGet('category') == 'علاج طبيعي' ? 'selected' : '' ?>>علاج طبيعي</option>
                </select>
                <select name="city" class="search-input">
                    <option value="">كل المدن</option>
                    <option value="طرابلس" <?= $currentCity == 'طرابلس' ? 'selected' : '' ?>>طرابلس</option>
                    <option value="بنغازي" <?= $currentCity == 'بنغازي' ? 'selected' : '' ?>>بنغازي</option>
                    <option value="مصراتة" <?= $currentCity == 'مصراتة' ? 'selected' : '' ?>>مصراتة</option>
                    <option value="سبها" <?= $currentCity == 'سبها' ? 'selected' : '' ?>>سبها</option>
                    <option value="الزاوية" <?= $currentCity == 'الزاوية' ? 'selected' : '' ?>>الزاوية</option>
                </select>
                <button type="submit" class="search-btn">تصفية الحالات</button>
            </form>
        </div>
    </section>

    <!-- Cases Section -->
    <section class="container" id="cases" style="margin-top: 2rem;">
        <div class="section-header">
            <h2 class="section-title" id="section-title">حالات تنتظر مساعدتك</h2>
            
            <div class="filters">
                <a href="<?= getFilterUrl('', $currentCityName) ?>" class="filter-btn <?= !$currentCat ? 'active' : '' ?>">الكل</a>
                <a href="<?= getFilterUrl('طبية', $currentCityName) ?>" class="filter-btn <?= $currentCat == 'طبية' ? 'active' : '' ?>">طبية</a>
                <a href="<?= getFilterUrl('جراحية', $currentCityName) ?>" class="filter-btn <?= $currentCat == 'جراحية' ? 'active' : '' ?>">جراحية</a>
                <a href="<?= getFilterUrl('أدوية', $currentCityName) ?>" class="filter-btn <?= $currentCat == 'أدوية' ? 'active' : '' ?>">أدوية</a>
                <a href="<?= getFilterUrl('أجهزة', $currentCityName) ?>" class="filter-btn <?= $currentCat == 'أجهزة' ? 'active' : '' ?>">أجهزة طبية</a>
                <a href="<?= getFilterUrl('علاج طبيعي', $currentCityName) ?>" class="filter-btn <?= $currentCat == 'علاج طبيعي' ? 'active' : '' ?>">علاج طبيعي</a>
            </div>
        </div>

        <div class="cases-grid">
            <?php $i = 0; foreach ($cases as $case): $i++; ?>
            <div class="card <?= ($case['is_critical'] ?? 0) == 1 ? 'card-critical' : '' ?> fade-in" style="animation-delay: <?= 0.1 * ($i % 6) ?>s;">
                <div class="card-image">
                    <img src="<?= $case['image'] ?>" alt="<?= $case['title'] ?>" loading="lazy">
                    <span class="card-badge"><?= $case['category'] ?></span>
                    <?php if (($case['is_critical'] ?? 0) == 1): ?>
                        <span class="critical-badge">⚠️ حالة حرجة</span>
                    <?php endif; ?>
                </div>
                <div class="card-body">
                    <h3 class="card-title"><?= $case['patient_nickname'] ?: 'حالة' ?>: <?= $case['title'] ?></h3>
                    <div class="card-meta">
                        <span style="display: flex; align-items: center; gap: 0.25rem;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
                            <?= $case['city'] ?>
                        </span>
                        <span style="display: flex; align-items: center; gap: 0.25rem;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
                            <?= time_ago($case['approved_at'] ?? $case['created_at']) ?>
                        </span>
                    </div>
                    <p class="card-desc"><?= $case['description'] ?></p>
                    
                    <div class="progress-container">
                        <?php 
                            $percent = 0;
                            if (isset($case['amount_required']) && $case['amount_required'] > 0) {
                                $percent = min(100, round(($case['amount_collected'] / $case['amount_required']) * 100));
                            }
                        ?>
                        <div class="progress-bar">
                            <div class="progress-fill" style="width: <?= $percent ?>%"></div>
                        </div>
                        <div class="funding-stats">
                            <span class="amount-collected"><?= number_format($case['amount_collected'] ?? 0) ?> د.ل</span>
                            <span style="color: var(--gray); font-weight: 500;">من <?= number_format($case['amount_required'] ?? 0) ?> د.ل</span>
                        </div>
                    </div>

                    <div class="card-footer">
                        <a href="/case/<?= $case['id'] ?>" class="btn btn-primary btn-block">
                            ساهم الآن
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg>
                        </a>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer" id="about">
        <div class="container">
            <div class="footer-grid">
                <div class="footer-col">
                    <h4>عن إيثار</h4>
                    <p style="color: #94a3b8; font-size: 0.9rem; line-height: 1.6; margin-bottom: 1rem;">
                        إيثار هي منصة إنسانية ليبية تهدف إلى سد الفجوة بين المرضى المحتاجين وأهل الخير. نحن نسعى لتوفير بيئة آمنة وشفافة لجمع التبرعات للحالات الطبية الحرجة، وتسهيل الوصول إلى المتبرعين بالدم في جميع أنحاء ليبيا.
                    </p>
                    <p style="color: #94a3b8; font-size: 0.9rem; line-height: 1.6;">
                        مهمتنا هي ضمان وصول المساعدات لمن يستحقها فعلاً من خلال نظام مراجعة دقيق وتوثيق كامل لكل حالة، مع الحفاظ على خصوصية وكرامة المرضى.
                    </p>
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